<?php
require "../../config/ini.php";

try {
    global $objAccess;
	$objAccess = new Access;
} catch (Exception $e) {
    echo $e->getMessage();
    die;
}

if(empty($_POST))
{
	header("Location: ".BASE_URL._DIR_TML_."404.php");
	die;
}

$acc = (isset($_POST["acc"]))? $_POST["acc"] : null;

/**
	# ACCIONES
*/
switch($acc)
{
	case 'admin-login'          : echo FnAdminLogin(); break;
	case 'admin-recuperarpw'    : echo FnAdminRecuperarPw(); break;
	case 'admin-logout'         : echo FnAdminLogout(); break;
	case 'admin-perfil-usuario' : echo FnAdminPerfilUsuario(); break;
	case 'admin-perfil-empresa' : echo FnAdminPerfilEmpresa(); break;
	default: break;
}

/**
	# FUNCIONES
*/

/**
	# LOGIN
*/
function FnAdminLogout()
{
	global $objAccess;

	$returnJSON = null;
	$err        = $objAccess->FnLogout();
	$returnJSON = [ "status" => [ "codErr" => $err ], "data_extra" => null ];
	return json_encode($returnJSON);
}

function FnAdminRecuperarPw()
{
	global $objAccess;

	$returnJSON = null;

	if(isset($_POST["email"]))
	{
		// POST -->
		$email   = trim(strtolower($_POST["email"]));
		$acc     = $_POST["acc"];
		// <!--
		$err     = $objAccess->FnRecuperarPw($email);
		$msjJSON = Fn::FnGetMsg($acc, $err);
	}else{
		$msjJSON = Fn::FnGetMsg($acc, 1);
	}

	$returnJSON = [ "status" => $msjJSON, "data_extra" => null ];
	return json_encode($returnJSON);
}

function FnAdminLogin()
{
	global $objAccess;
	$returnJSON = null;

	if(isset($_POST["email"]) && isset($_POST["pw"]))
	{
		// POST -->
		$email = trim(strtolower($_POST["email"]));
		$pw    = trim($_POST["pw"]);
		$acc   = $_POST["acc"];
		// <!--
		$err     = $objAccess->FnSetAccess($email, $pw);
		$msjJSON = Fn::FnGetMsg($acc, $err);
	}else{
		$msjJSON = Fn::FnGetMsg($acc, 1);
	}

	$returnJSON = [ "status" => $msjJSON, "data_extra" => null ];
	return json_encode($returnJSON);
}

/**
	# PERFIL
*/
function FnAdminPerfilUsuario()
{
	global $objAccess;
	$returnJSON = null;

	if(isset($_POST["id"]))
	{
		// POST -->
		$id        = $_POST["id"];
		$nombre    = $_POST["nombre"];
		$telefono  = $_POST["telefono"];
		$direccion = $_POST["direccion"];
		$email     = trim(strtolower($_POST["email"]));
		$pw        = $_POST["pw"];
		$acc       = $_POST["acc"];
		// <!--
		$err       = $objAccess->FnAdminGuardarPerfilUsuario($id, $nombre, $telefono, $direccion, $email, $pw);
		$msjJSON   = Fn::FnGetMsg($acc, $err);
	}else{
		$msjJSON = Fn::FnGetMsg($acc, 1);
	}

	$returnJSON = [ "status" => $msjJSON, "data_extra" => null ];
	return json_encode($returnJSON);
}

function FnAdminPerfilEmpresa()
{
	global $objAccess;

	$returnJSON = null;

	if(isset($_POST["id"]))
	{
		// POST -->
		$id           = $_POST["id"];
		$nombre       = $_POST["nombre"];
		$razon_social = $_POST["razon_social"];
		$telefono     = $_POST["telefono"];
		$direccion    = $_POST["direccion"];
		$descripcion  = $_POST["descripcion"];
		$archivo      = $_FILES["logo"];
		$email        = trim(strtolower($_POST["email"]));
		$pw           = $_POST["pw"];
		$acc          = $_POST["acc"];
		// <!--
		$logo         = '';
		$upload       = uploadFile($archivo, "logo_empresa");

		if($upload["err"] == -1) $logo = $upload["archivo_nombre"];
		else{
			$msjJSON    = Fn::FnGetMsg($acc, $upload["err"]);
			$returnJSON = $msjJSON;
			return json_encode($returnJSON);
		}

		$err      = $objAccess->FnAdminGuardarPerfilEmpresa($id, $nombre, $razon_social, $logo, $telefono, $direccion, $descripcion, $email, $pw);
		$msjJSON  = Fn::FnGetMsg($acc, $err);
		$dataJSON = $_POST;
	}else{
		$msjJSON  = Fn::FnGetMsg($acc, 1);
		$dataJSON = null;
	}

	$returnJSON = [ "status" => $msjJSON, "data_extra" => [ "logo" => $logo ] ];
	return json_encode($returnJSON);
}

// SUBIDA DE ARCHIVOS -->
function uploadFile($archivo, $path)
{
	$err            = -1;
	$archivo_nombre = '';

	if($archivo["error"] == UPLOAD_ERR_OK)
	{
		$num_rand       = explode(" ", microtime());
		$num_rand       = substr($num_rand[1], -3);
		$archivo_nombre = $num_rand."-".Fn::FnParseString(str_replace(" ", "", basename($archivo['name'])));
		$temporal       = $archivo['tmp_name'];
		$tamano         = ($archivo['size'] / 1000 / 1000);
		$type           = $archivo['type'];
		$ext_permitidas = array("image/jpeg", "image/png");

		if( in_array($type, $ext_permitidas) && $tamano <= 1)
		{
			if (!move_uploaded_file($temporal, ROOT_DIR._DIR_UPLOAD_.$path._DS_.$archivo_nombre))
			{
				$err = 4;
			}
		}else{
			$err = 3;
		}
	}

	return ['archivo_nombre' => $archivo_nombre, 'err' => $err];
}
// <--