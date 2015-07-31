<?php
require "../../config/ini.php";

try {
	global $Admin;
	$Admin   = new Admin;
	global $Empresa;
	$Empresa = new Empresa;
	global $Rubro;
	$Rubro   = new Rubro;
	global $Zona;
	$Zona    = new Zona;
	global $Correo;
	$Correo  = new Correo;
} catch (Exception $e) {
    echo $e->getMessage();
    die;
}

if(empty($_POST))
{
	header("Location: ".BASE_URL._DIR_TMP_."404.php");
	die;
}

$acc = (isset($_POST["acc"]))? $_POST["acc"] : null;

/**
	# ACCIONES
*/
switch($acc)
{
	// Backend -->
	case 'admin-login'                    : echo FnAdminLogin(); break;
	case 'admin-recuperarpw'              : echo FnAdminRecuperarPw(); break;
	case 'admin-logout'                   : echo FnAdminLogout(); break;
	case 'admin-perfil-admin'             : echo FnAdminPerfilAdmin(); break;
	case 'admin-perfil-empresa'           : echo FnAdminPerfilEmpresa(); break;
	case 'admin-rubro-editar'             : echo FnAdminEditarRubro(); break;
	case 'admin-rubro-borrar'             : echo FnAdminBorrarRubro(); break;
	case 'admin-rubro-habilitar'          : echo FnAdminHabilitarRubro(); break;
	case 'admin-zona-editar'              : echo FnAdminEditarZona(); break;
	case 'admin-zona-borrar'              : echo FnAdminBorrarZona(); break;
	case 'admin-zona-habilitar'           : echo FnAdminHabilitarZona(); break;
	case 'admin-empresa-editar'           : echo FnAdminEditarEmpresa(); break;
	case 'admin-empresa-borrar'           : echo FnAdminBorrarEmpresa(); break;
	case 'admin-empresa-habilitar'        : echo FnAdminHabilitarEmpresa(); break;
	case 'admin-empresa-premium'          : echo FnAdminEmpresaPremium(); break;
	case 'admin-empresa-imagen-editar'    : echo FnAdminImagenEmpresa(); break;
	case 'admin-empresa-imagen-borrar'    : echo FnAdminImagenEmpresaBorrar(); break;
	case 'admin-empresa-imagen-habilitar' : echo FnAdminHabilitarImagenEmpresa(); break;
	case 'admin-empresa-video-editar'     : echo FnAdminVideoEmpresa(); break;
	case 'admin-empresa-video-borrar'     : echo FnAdminVideoEmpresaBorrar(); break;
	case 'admin-empresa-video-habilitar'  : echo FnAdminHabilitarVideoEmpresa(); break;
	// FrontEnd -->
	case 'info-empresa'                   : echo FnGetInfoEmpresa(); break;
	case 'calificacion-empresa'           : echo FnSetCalificacionEmpresa(); break;
	case 'enviar-solicitud'           	  : echo FnEnviarSolicitud(); break;
	default                               : break;
}

/**
	# FUNCIONES
*/
function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

/**
	# LOGIN
*/
function FnAdminLogout()
{
	$returnJSON = null;
	$err        = Usuario::FnLogout();
	$returnJSON = [ "status" => [ "codErr" => $err ], "data_extra" => null ];
	return json_encode($returnJSON);
}

function FnAdminLogin()
{
	global $Admin;
	global $Empresa;
	$returnJSON = $msjJSON = null;
	$acc = '';
	$err = 1;

	if(isset($_POST["email"]) && isset($_POST["pw"]))
	{
		$acc = $_POST["acc"];
		if (!isset($_COOKIE["bloqueo_usuario"]))
		{
			// POST -->
			$email = trim(strtolower($_POST["email"]));
			$pw    = trim($_POST["pw"]);
			// <!--
			
			$minutos_reset   = 1; // minutos donde la cookie se resetea en un rango de tiempo antes de los 3 intentos
			$minutos_bloqueo = 5; // minutos de bloqueo

			if($Admin->FnExiste($email))
			{
				$us = $Admin->FnLogin($email, $pw);
				if(!is_null($us))
				{
					$err = Usuario::setAccesoAdmin($us);
					setcookie("usuario", '', time() - 60);
				}else{
					// Ingreso erroneo
					if (isset($_COOKIE["usuario"]))
					{
						$valor = $_COOKIE["usuario"] + 1;
						if($valor >= 3)
						{
							setcookie("bloqueo_usuario", 1, time() + 60*$minutos_bloqueo);
						}else setcookie("usuario", $valor, time() + 60*$minutos_reset);
					}else{
						setcookie("usuario", 1, time() + 60*$minutos_reset);
					}
				}
			}elseif($Empresa->FnExiste($email))
			{
				$us = $Empresa->FnLogin($email, $pw);
				if(!is_null($us))
				{
					$err = Usuario::setAccesoEmpresa($us);
					setcookie("usuario", '', time() - 60);
				}else{
					// Ingreso erroneo
					if (isset($_COOKIE["usuario"]))
					{
						$valor = $_COOKIE["usuario"] + 1;
						if($valor >= 3)
						{
							setcookie("bloqueo_usuario", 1, time() + 60*$minutos_bloqueo);
						}else setcookie("usuario", $valor, time() + 60*$minutos_reset);
					}else{
						setcookie("usuario", 1, time() + 60*$minutos_reset);
					}
				}
			}
		}else{
			$err = 2;
		}
	}

	$msjJSON = Fn::FnGetMsg($acc, $err);

	$returnJSON = [ "status" => $msjJSON, "data_extra" => null ];
	return json_encode($returnJSON);
}

function FnAdminRecuperarPw()
{
	global $Admin;
	global $Empresa;
	global $Correo;

	$returnJSON = $msjJSON = null;
	$acc = '';
	$err = 1;

	if(isset($_POST["email"]))
	{
		// POST -->
		$email   = trim(strtolower($_POST["email"]));
		$acc     = $_POST["acc"];
		// <!--
		$err = 1;
		if($Admin->FnExiste($email))
		{
			$info = $Admin->FnRecuperarPw($email);
			if(!is_null($info))
			{
				$npass = randomPassword();
				$Admin->FnModificarPassword($info->id, $npass);
				//Envio email
				$subject = 'Cambio de Contraseña - Milugar.com';
				$body    = 'Su nueva contraseña es: <b>'.$npass.'</b>';
				$body   .= '<br />Una vez ingresado a la aplicación dirígete a la sección "Mi Perfil" y cámbiala para mayor seguridad.';
				$name    = $info->nombre;
				$address = array();
				array_push($address, (object)array("email" => $info->email) );
				$cc      = False;
				$error = $Correo->Enviar($subject, $address, $body, $name, $cc);
				if($error == '') $err = -1;
			}
		}elseif($Empresa->FnExiste($email))
		{
			$info = $Empresa->FnRecuperarPw($email);
			if(!is_null($info))
			{
				$npass = randomPassword();
				$Empresa->FnModificarPassword($info->id, $npass);
				//Envio email
				$subject = 'Cambio de Contraseña - Milugar.com';
				$body    = 'Su nueva contraseña es: <b>'.$npass.'</b>';
				$body   .= '<br />Una vez ingresado a la aplicación dirígete a la sección "Mi Perfil" y cámbiala para mayor seguridad.';
				$name    = $info->nombre;
				$address = array();
				array_push($address, (object)array("email" => $info->email) );
				$cc      = False;
				$error = $Correo->Enviar($subject, $address, $body, $name, $cc);
				if($error == '') $err = -1;
			}
		}
	}
	
	$msjJSON = Fn::FnGetMsg($acc, $err);

	$returnJSON = [ "status" => $msjJSON, "data_extra" => null ];
	return json_encode($returnJSON);
}
// <!--

/**
	# PERFIL
*/
function FnAdminPerfilAdmin()
{
	global $Admin;
	$returnJSON = $msjJSON = null;
	$acc = '';
	$err = 1;

	if(isset($_POST["id"]))
	{
		// POST -->
		$id        = $_POST["id"];
		$nombre    = $_POST["nombre"];
		$telefono  = $_POST["telefono"];
		$direccion = $_POST["direccion"];
		$email     = trim(strtolower($_POST["email"]));
		$pw        = ($_POST["pw"] != '********')? $_POST["pw"] : '';
		$acc       = $_POST["acc"];
		// <!--
		$err       = $Admin->FnGuardarPerfil($id, $nombre, $telefono, $direccion, $email, $pw);
	}
	$msjJSON   = Fn::FnGetMsg($acc, $err);
	
	$returnJSON = [ "status" => $msjJSON, "data_extra" => null ];
	return json_encode($returnJSON);
}

function FnAdminPerfilEmpresa()
{
	global $Empresa;
	$returnJSON = $msjJSON = null;
	$acc = $logo = '';
	$err = 1;

	$returnJSON = null;

	if(isset($_POST["id"]))
	{
		// POST -->
		$id               = $_POST["id"];
		$nombre           = $_POST["nombre"];
		$nombre_referente = $_POST["nombre_referente"];
		$dni_referente    = $_POST["dni_referente"];		
		$razon_social     = $_POST["razon_social"];
		$telefono         = $_POST["telefono"];
		$direccion        = $_POST["direccion"];
		$lat_long         = $_POST["lat_long"];
		$idzona           = $_POST["idzona"];
		$idrubro          = $_POST["idrubro"];
		$descripcion      = $_POST["descripcion"];
		$archivo          = $_FILES["logo"];
		$email            = trim(strtolower($_POST["email"]));
		$pw               = ($_POST["pw"] != '********')? $_POST["pw"] : '';
		$logo             = null;
		$acc              = $_POST["acc"];
		// <!--
		
		$upload           = Fn::uploadFile($archivo, "logo_empresa", True);
		 
		if($upload["err"] == -1) $logo = $upload["archivo_nombre"];
		else{
			$msjJSON    = Fn::FnGetMsg($acc, $upload["err"]);
			$returnJSON = $msjJSON;
			return json_encode($returnJSON);
		}

		$err = $Empresa->FnEditar($id, $idzona, $idrubro, $lat_long, $nombre_referente, $dni_referente, $nombre, $razon_social, $logo, $telefono, $direccion, $descripcion, $email, $pw);
	}
	$msjJSON  = Fn::FnGetMsg($acc, $err);

	$returnJSON = [ "status" => $msjJSON, "data_extra" => [ "logo" => $logo ] ];
	return json_encode($returnJSON);
}
// <!--

/**
	RUBROS
*/
function FnAdminEditarRubro()
{
	global $Rubro;
	$returnJSON = $msjJSON = null;
	$acc = $icono = '';
	$err = 1;

	$returnJSON = null;

	if(isset($_POST["id"]))
	{
		// POST -->
		$id          = $_POST["id"];
		$descripcion = $_POST["descripcion"];
		$archivo     = $_FILES["icono"];
		$icono       = null;
		$acc         = $_POST["acc"];
		// <!--
		
		$upload = Fn::uploadFile($archivo, "icono_rubro", True);
		 
		if($upload["err"] == -1) $icono = $upload["archivo_nombre"];
		else{
			$msjJSON    = Fn::FnGetMsg($acc, $upload["err"]);
			$returnJSON = $msjJSON;
			return json_encode($returnJSON);
		}

		if($id > 0) $err = $Rubro->FnEditar($id, $descripcion, $icono);
		else $err = $Rubro->FnGuardar($descripcion, $icono);		
	}
	$msjJSON  = Fn::FnGetMsg($acc, $err);

	$returnJSON = [ "status" => $msjJSON, "data_extra" => [ "logo" => $icono ] ];
	return json_encode($returnJSON);
}

function FnAdminBorrarRubro()
{
	global $Rubro;
	$returnJSON = $msjJSON = null;
	$err = 1;

	$returnJSON = null;

	if(isset($_POST["id"]))
	{
		// POST -->
		$id  = $_POST["id"];
		$acc = $_POST["acc"];
		// <!--

		if($id > 0) $err = $Rubro->FnBorrar($id);	
	}
	$msjJSON  = Fn::FnGetMsg($acc, $err);

	$returnJSON = [ "status" => $msjJSON, "data_extra" => null ];
	return json_encode($returnJSON);
}

function FnAdminHabilitarRubro()
{
	global $Rubro;
	$returnJSON = $msjJSON = null;
	$err = 1;

	$returnJSON = null;

	if(isset($_POST["id"]))
	{
		// POST -->
		$id         = $_POST["id"];
		$habilitado = $_POST["habilitado"];
		$acc        = $_POST["acc"];
		// <!--

		if($id > 0) $err = $Rubro->FnHabilitar($id, $habilitado);	
	}
	$msjJSON  = Fn::FnGetMsg($acc, $err);

	$returnJSON = [ "status" => $msjJSON, "data_extra" => null ];
	return json_encode($returnJSON);
}
// <!-- 

/**
	ZONA
*/
function FnAdminEditarZona()
{
	global $Zona;
	$returnJSON = $msjJSON = null;
	$acc = '';
	$err = 1;

	$returnJSON = null;

	if(isset($_POST["id"]))
	{
		// POST -->
		$id          = $_POST["id"];
		$descripcion = $_POST["descripcion"];
		$lat_long    = $_POST["lat_long"];
		$acc         = $_POST["acc"];
		// <!--

		if($id > 0) $err = $Zona->FnEditar($id, $descripcion, $lat_long);
		else $err = $Zona->FnGuardar($descripcion, $lat_long);		
	}
	$msjJSON  = Fn::FnGetMsg($acc, $err);

	$returnJSON = [ "status" => $msjJSON, "data_extra" => null ];
	return json_encode($returnJSON);
}

function FnAdminBorrarZona()
{
	global $Zona;
	$returnJSON = $msjJSON = null;
	$err = 1;

	$returnJSON = null;

	if(isset($_POST["id"]))
	{
		// POST -->
		$id  = $_POST["id"];
		$acc = $_POST["acc"];
		// <!--

		if($id > 0) $err = $Zona->FnBorrar($id);	
	}
	$msjJSON  = Fn::FnGetMsg($acc, $err);

	$returnJSON = [ "status" => $msjJSON, "data_extra" => null ];
	return json_encode($returnJSON);
}

function FnAdminHabilitarZona()
{
	global $Zona;
	$returnJSON = $msjJSON = null;
	$err = 1;

	$returnJSON = null;

	if(isset($_POST["id"]))
	{
		// POST -->
		$id         = $_POST["id"];
		$habilitado = $_POST["habilitado"];
		$acc        = $_POST["acc"];
		// <!--

		if($id > 0) $err = $Zona->FnHabilitar($id, $habilitado);	
	}
	$msjJSON  = Fn::FnGetMsg($acc, $err);

	$returnJSON = [ "status" => $msjJSON, "data_extra" => null ];
	return json_encode($returnJSON);
}

/**
	EMPRESA
*/
function FnAdminEditarEmpresa()
{
	global $Empresa;
	$returnJSON = $msjJSON = null;
	$acc = $logo = '';
	$err = 1;

	$returnJSON = null;

	$acc = $_POST["acc"];

	if( isset($_POST["id"]) && isset($_POST["email"]) && $_POST["email"] != '' )
	{
		// POST -->
		$id               = $_POST["id"];
		$nombre           = $_POST["nombre"];
		$nombre_referente = $_POST["nombre_referente"];
		$dni_referente    = $_POST["dni_referente"];		
		$razon_social     = $_POST["razon_social"];
		$telefono         = $_POST["telefono"];
		$direccion        = $_POST["direccion"];
		$lat_long         = $_POST["lat_long"];
		$idzona           = $_POST["idzona"];
		$idrubro          = $_POST["idrubro"];
		$descripcion      = $_POST["descripcion"];
		$archivo          = $_FILES["logo"];
		$email            = trim(strtolower($_POST["email"]));
		$pw               = ($_POST["pw"] != '********')? $_POST["pw"] : '';
		$logo             = null;;
		// <!--
		
		$upload = Fn::uploadFile($archivo, "logo_empresa", True);
		 
		if($upload["err"] == -1) $logo = $upload["archivo_nombre"];
		else{
			$msjJSON    = Fn::FnGetMsg($acc, $upload["err"]);
			$returnJSON = $msjJSON;
			return json_encode($returnJSON);
		}

		if($id > 0) $err = $Empresa->FnEditar($id, $idzona, $idrubro, $lat_long, $nombre_referente, $dni_referente, $nombre, $razon_social, $logo, $telefono, $direccion, $descripcion, $email, $pw);
		else $err = $Empresa->FnGuardar($idzona, $idrubro, $lat_long, $nombre_referente, $dni_referente, $nombre, $razon_social, $logo, $telefono, $direccion, $descripcion, $email, $pw);

	}
	$msjJSON  = Fn::FnGetMsg($acc, $err);

	$returnJSON = [ "status" => $msjJSON, "data_extra" => [ "logo" => $logo ] ];
	return json_encode($returnJSON);
}

function FnAdminBorrarEmpresa()
{
	global $Empresa;
	$returnJSON = $msjJSON = null;
	$err = 1;

	$returnJSON = null;

	if(isset($_POST["id"]))
	{
		// POST -->
		$id  = $_POST["id"];
		$acc = $_POST["acc"];
		// <!--

		if($id > 0) $err = $Empresa->FnBorrar($id);	
	}
	$msjJSON  = Fn::FnGetMsg($acc, $err);

	$returnJSON = [ "status" => $msjJSON, "data_extra" => null ];
	return json_encode($returnJSON);
}

function FnAdminHabilitarEmpresa()
{
	global $Empresa;
	$returnJSON = $msjJSON = null;
	$err = 1;

	$returnJSON = null;

	if(isset($_POST["id"]))
	{
		// POST -->
		$id         = $_POST["id"];
		$habilitado = $_POST["habilitado"];
		$acc        = $_POST["acc"];
		// <!--

		if($id > 0) $err = $Empresa->FnHabilitar($id, $habilitado);	
	}
	$msjJSON  = Fn::FnGetMsg($acc, $err);

	$returnJSON = [ "status" => $msjJSON, "data_extra" => null ];
	return json_encode($returnJSON);
}

function FnAdminEmpresaPremium()
{
	global $Empresa;
	$returnJSON = $msjJSON = null;
	$err = 1;

	$returnJSON = null;

	if(isset($_POST["id"]))
	{
		// POST -->
		$id         = $_POST["id"];
		$es_premium = $_POST["es_premium"];
		$acc        = $_POST["acc"];
		// <!--

		if($id > 0) $err = $Empresa->FnEsPremium($id, $es_premium);	
	}
	$msjJSON  = Fn::FnGetMsg($acc, $err);

	$returnJSON = [ "status" => $msjJSON, "data_extra" => null ];
	return json_encode($returnJSON);
}

/**
	IMAGEN EMPRESA
*/
function FnAdminImagenEmpresa()
{
	global $Empresa;
	$returnJSON = $msjJSON = null;
	$acc = $imagen = '';
	$err = 1;

	$returnJSON = null;

	if(isset($_POST["idempresa"]))
	{
		// POST -->
		$idempresa   = $_POST["idempresa"];
		$descripcion = $_POST["descripcion"];
		$titulo      = $_POST["titulo"];
		$archivo     = $_FILES["imagen"];
		$imagen      = null;
		$acc         = $_POST["acc"];
		// <!--
		
		$upload = Fn::uploadFile($archivo, "galeria_imagen_empresa", False);
		 
		if($upload["err"] == -1) $imagen = $upload["archivo_nombre"];
		else{
			$msjJSON    = Fn::FnGetMsg($acc, $upload["err"]);
			$returnJSON = $msjJSON;
			return json_encode($returnJSON);
		}
		
		$err = $Empresa->FnGuardarImagen($idempresa, $titulo, $descripcion, $imagen);

	}
	$msjJSON  = Fn::FnGetMsg($acc, $err);

	$returnJSON = [ "status" => $msjJSON, "data_extra" => [ "logo" => $imagen ] ];
	return json_encode($returnJSON);
}
function FnAdminImagenEmpresaBorrar()
{
	global $Empresa;
	$returnJSON = $msjJSON = null;
	$err = 1;

	$returnJSON = null;

	if(isset($_POST["id"]))
	{
		// POST -->
		$id  = $_POST["id"];
		$acc = $_POST["acc"];
		// <!--

		if($id > 0) $err = $Empresa->FnBorrarImagen($id);	
	}
	$msjJSON  = Fn::FnGetMsg($acc, $err);

	$returnJSON = [ "status" => $msjJSON, "data_extra" => null ];
	return json_encode($returnJSON);
}
function FnAdminHabilitarImagenEmpresa()
{
	global $Empresa;
	$returnJSON = $msjJSON = null;
	$err = 1;

	$returnJSON = null;

	if(isset($_POST["id"]))
	{
		// POST -->
		$id         = $_POST["id"];
		$habilitado = $_POST["habilitado"];
		$acc        = $_POST["acc"];
		// <!--

		if($id > 0) $err = $Empresa->FnHabilitarImagenEmpresa($id, $habilitado);	
	}
	$msjJSON  = Fn::FnGetMsg($acc, $err);

	$returnJSON = [ "status" => $msjJSON, "data_extra" => null ];
	return json_encode($returnJSON);
}

/**
	VIDEO EMPRESA
*/
function FnAdminVideoEmpresa()
{
	global $Empresa;
	$returnJSON = $msjJSON = null;
	$acc = '';
	$err = 1;

	$returnJSON = null;

	if(isset($_POST["idempresa"]))
	{
		// POST -->
		$idempresa   = $_POST["idempresa"];
		$descripcion = $_POST["descripcion"];
		$titulo      = $_POST["titulo"];
		$link        = $_POST["link"];
		$acc         = $_POST["acc"];
		// <!--
		
		$err = $Empresa->FnGuardarVideo($idempresa, $titulo, $descripcion, $link);

	}
	$msjJSON  = Fn::FnGetMsg($acc, $err);

	$returnJSON = [ "status" => $msjJSON, "data_extra" => null ];
	return json_encode($returnJSON);
}
function FnAdminVideoEmpresaBorrar()
{
	global $Empresa;
	$returnJSON = $msjJSON = null;
	$err = 1;

	$returnJSON = null;

	if(isset($_POST["id"]))
	{
		// POST -->
		$id  = $_POST["id"];
		$acc = $_POST["acc"];
		// <!--

		if($id > 0) $err = $Empresa->FnBorrarVideo($id);	
	}
	$msjJSON  = Fn::FnGetMsg($acc, $err);

	$returnJSON = [ "status" => $msjJSON, "data_extra" => null ];
	return json_encode($returnJSON);
}
function FnAdminHabilitarVideoEmpresa()
{
	global $Empresa;
	$returnJSON = $msjJSON = null;
	$err = 1;

	$returnJSON = null;

	if(isset($_POST["id"]))
	{
		// POST -->
		$id         = $_POST["id"];
		$habilitado = $_POST["habilitado"];
		$acc        = $_POST["acc"];
		// <!--

		if($id > 0) $err = $Empresa->FnHabilitarVideoEmpresa($id, $habilitado);	
	}
	$msjJSON  = Fn::FnGetMsg($acc, $err);

	$returnJSON = [ "status" => $msjJSON, "data_extra" => null ];
	return json_encode($returnJSON);
}

function FnGetInfoEmpresa()
{
	global $Empresa;

	if(isset($_POST["id"]))
	{
		// POST -->
		$id                    = $_POST["id"];
		// <!--
		$info                  = $Empresa->FnGetById($id);
		$calificacion_positiva = $Empresa->FnTotCalificacionPositiva($id);	
		$calificacion_negativa = $Empresa->FnTotCalificacionNegativa($id);
		
		$info->calificacion_positiva = $calificacion_positiva;	
		$info->calificacion_negativa = $calificacion_negativa;

		return json_encode($info);
	}
	return null;
}

function FnSetCalificacionEmpresa()
{
	global $Empresa;
	$returnJSON = $msjJSON = null;
	$err = 1;

	$returnJSON = null;

	if(isset($_POST["id"]))
	{
		// POST -->
		/**
			ENVIAR EL FACEBOOK ID






















		*/
		$id          = $_POST["id"];
		$estado      = $_POST["estado"];
		$idusuariofb = 18; //$_POST["idusuariofb"];
		$acc         = $_POST["acc"];
		// <!--

		if($id > 0) $err = $Empresa->FnSetCalificacionEmpresa($id, $estado, $idusuariofb);	
	}
	return $err;
}

function FnEnviarSolicitud()
{
	global $Correo;

	$returnJSON = $msjJSON = null;
	$acc = '';
	$err = 1;

	$acc = $_POST["acc"];
	if(
		isset($_POST["email"]) && $_POST["email"] != ''
		&& isset($_POST["email"]) && $_POST["email"] != ''
		&& isset($_POST["mensaje"]) && $_POST["mensaje"] != ''
		)
	{
		// POST -->
		$email   = trim(strtolower($_POST["email"]));
		$nombre  = $_POST["nombre"];
		$mensaje = $_POST["mensaje"];
		// <!--

		//Envio email
		$subject = 'Formulario de contacto - Milugar.com';
		$body   = "<b>Nombre</b>: ".$nombre;
		$body   .= "<br /><b>Email</b>: ".$email;
		$body   .= "<br /><b>Mensaje</b>:<br />&nbsp;-&nbsp;".$mensaje;
		$body   .= "<br /><br />";
		$address = $email;
		$error = $Correo->MiEnviar($subject, $address, $body);
		if($error == '') $err = -1;
	}
	
	$msjJSON = Fn::FnGetMsg($acc, $err);

	$returnJSON = [ "status" => $msjJSON, "data_extra" => null ];
	return json_encode($returnJSON);
}