<?php
Abstract Class Fn
{
	static $page_login      = 'admin_login.php';
	static $page_home_panel = 'admin_home.php';

	//acceso => 0 (PAGINA DE LOGEO)
	//acceso => 1 (PAGINAS INTERNAS DE LA APP - TODO EL RESTO QUE NO SEA LOGIN)
	static function FnCheckAccess($acceso=0)
	{
		if(!isset($_SESSION["usuario"]))
		{
			if($acceso != 0) header("Location: " . BASE_URL._DIR_INC_.Fn::$page_login);
		}else{
			if($acceso == 0) header("Location: " . BASE_URL._DIR_INC_.Fn::$page_home_panel);
		}
	}
	//Incluir este metodo en las paginas restringidas por los usuarios comunes ( no root )	
	static function FnCheckAccessAdmin()
	{
		if(!isset($_SESSION["usuario"]))
		{
			header("Location: " . BASE_URL._DIR_INC_.Fn::$page_login);
		}else{
			if($_SESSION["usuario"]["root"] == 0)
			{
				header("Location: " . BASE_URL._DIR_INC_.Fn::$page_home_panel);
			}
		}
	}

	static function FnGetDatosAccess()
	{
		if(isset($_SESSION["usuario"]))
		{
			return (Object) $_SESSION["usuario"];
		}else return null;
	}

	static function FnParseString($str)
	{
		$string = str_replace("á", "a", $str);
		$string = str_replace("é", "e", $string);
		$string = str_replace("í", "i", $string);
		$string = str_replace("ó", "o", $string);
		$string = str_replace("ú", "u", $string);
		$string = str_replace("ñ", "n", $string);
		return $string;
	}

	static function FnGetMsg($acc, $err)
	{
		$obj = new StdClass();
		$obj->accErr = $acc;
		$obj->codErr = $err;

		switch ($acc)
		{
			case 'admin-login':
						switch ($err)
						{
							case 2:
									$obj->msg   = 'ERROR: Usuario bloqueado por varios intentos erroneos. Debe esperar unos minutos y volver a intentarlo.';
									$obj->class = 'danger';
									break;
							case 1:
									$obj->msg   = 'ERROR: Hubo un problema al ingresar los datos.';
									$obj->class = 'danger';
									break;
							case 0:
							default:
									$obj->msg   = 'Ingrese los datos por favor.';
									$obj->class = 'info';
									break;
						}
						break;

			case 'admin-recuperarpw':
						switch ($err)
						{
							case -1:
									$obj->msg   = 'AVISO: Datos enviados, revice su casilla de correo';
									$obj->class = 'success';
									break;							
							case 1:
									$obj->msg   = 'ERROR: Hubo un problema al ingresar los datos.';
									$obj->class = 'danger';
									break;
							case 0:
							default:
									$obj->msg   = 'Ingrese los datos por favor.';
									$obj->class = 'info';
									break;
						}
						break;
			case 'admin-perfil-admin':
						switch ($err)
						{
							case -1:
									$obj->msg   = 'AVISO: Datos guardatos con éxito.';
									$obj->class = 'success';
									break;							
							case 1:
									$obj->msg   = 'ERROR: Hubo un problema al ingresar los datos.';
									$obj->class = 'danger';
									break;
							default:break;
						}
						break;
			case 'admin-perfil-empresa':
						switch ($err)
						{
							case -1:
									$obj->msg   = 'AVISO: Datos guardatos con éxito.';
									$obj->class = 'success';
									break;							
							case 1:
									$obj->msg   = 'ERROR: Hubo un problema al ingresar los datos.';
									$obj->class = 'danger';
									break;
							case 2:
									$obj->msg   = 'ADVERTENCIA: Ya existe una empresa registrada con el mismo email.';
									$obj->class = 'warning';
									break;
							case 3:
									$obj->msg   = 'ADVERTENCIA: El archivo que intenta subir debe ser una imagen (JPG, PNG) menor a 1MG';
									$obj->class = 'warning';
									break;
							case 4:
									$obj->msg   = 'ADVERTENCIA: Hubo un error al intentar subir el archivo.';
									$obj->class = 'warning';
									break;
							default:break;
						}
						break;
			case 'admin-rubro-editar':
						switch ($err)
						{					
							case 1:
									$obj->msg   = 'ERROR: Hubo un problema al ingresar los datos.';
									$obj->class = 'danger';
									break;
							default:break;
						}
						break;
			case 'admin-rubro-borrar':
						switch ($err)
						{
							case -1:
									$obj->msg   = 'AVISO: Registro borrado con éxito.';
									$obj->class = 'success';
									break;							
							case 1:
									$obj->msg   = 'ERROR: Hubo un problema al ingresar los datos.';
									$obj->class = 'danger';
									break;
							default:break;
						}
						break;
			case 'admin-rubro-habilitar':
						switch ($err)
						{
							case -1:
									$obj->msg   = 'AVISO: Registro actualizado con éxito.';
									$obj->class = 'success';
									break;							
							case 1:
									$obj->msg   = 'ERROR: Hubo un problema al realizar la operación';
									$obj->class = 'danger';
									break;
							default:break;
						}
						break;
			case 'admin-zona-editar':
						switch ($err)
						{					
							case 1:
									$obj->msg   = 'ERROR: Hubo un problema al ingresar los datos.';
									$obj->class = 'danger';
									break;
							default:break;
						}
						break;
			case 'admin-zona-borrar':
						switch ($err)
						{
							case -1:
									$obj->msg   = 'AVISO: Registro borrado con éxito.';
									$obj->class = 'success';
									break;							
							case 1:
									$obj->msg   = 'ERROR: Hubo un problema al ingresar los datos.';
									$obj->class = 'danger';
									break;
							default:break;
						}
						break;
			case 'admin-zona-habilitar':
						switch ($err)
						{
							case -1:
									$obj->msg   = 'AVISO: Registro actualizado con éxito.';
									$obj->class = 'success';
									break;							
							case 1:
									$obj->msg   = 'ERROR: Hubo un problema al realizar la operación';
									$obj->class = 'danger';
									break;
							default:break;
						}
						break;
			case 'admin-empresa-editar':
						switch ($err)
						{											
							case 1:
									$obj->msg   = 'ERROR: Hubo un problema al ingresar los datos.';
									$obj->class = 'danger';
									break;
							case 2:
									$obj->msg   = 'ADVERTENCIA: Ya existe una empresa registrada con el mismo email.';
									$obj->class = 'warning';
									break;
							case 3:
									$obj->msg   = 'ADVERTENCIA: El archivo que intenta subir debe ser una imagen (JPG, PNG) menor a 1MG';
									$obj->class = 'warning';
									break;
							case 4:
									$obj->msg   = 'ADVERTENCIA: Hubo un error al intentar subir el archivo.';
									$obj->class = 'warning';
									break;
							default:break;
						}
						break;
			case 'admin-empresa-borrar':
						switch ($err)
						{
							case -1:
									$obj->msg   = 'AVISO: Registro borrado con éxito.';
									$obj->class = 'success';
									break;							
							case 1:
									$obj->msg   = 'ERROR: Hubo un problema al ingresar los datos.';
									$obj->class = 'danger';
									break;
							default:break;
						}
						break;
			case 'admin-empresa-habilitar':
						switch ($err)
						{
							case -1:
									$obj->msg   = 'AVISO: Registro actualizado con éxito.';
									$obj->class = 'success';
									break;							
							case 1:
									$obj->msg   = 'ERROR: Hubo un problema al realizar la operación';
									$obj->class = 'danger';
									break;
							default:break;
						}
						break;
			case 'admin-empresa-premium':
						switch ($err)
						{
							case -1:
									$obj->msg   = 'AVISO: Registro actualizado con éxito.';
									$obj->class = 'success';
									break;							
							case 1:
									$obj->msg   = 'ERROR: Hubo un problema al realizar la operación';
									$obj->class = 'danger';
									break;
							default:break;
						}
						break;
			case 'admin-empresa-imagen-editar':
						switch ($err)
						{					
							case 1:
									$obj->msg   = 'ERROR: Hubo un problema al realizar la operación';
									$obj->class = 'danger';
									break;
							case 3:
									$obj->msg   = 'ADVERTENCIA: El archivo que intenta subir debe ser una imagen (JPG, PNG) menor a 1MG';
									$obj->class = 'warning';
									break;									
							default:break;
						}
						break;
			case 'admin-empresa-imagen-borrar':
						switch ($err)
						{				
							case -1:
									$obj->msg   = 'AVISO: Registro eliminado con éxito.';
									$obj->class = 'success';
									break;		
							case 1:
									$obj->msg   = 'ERROR: Hubo un problema al realizar la operación';
									$obj->class = 'danger';
									break;
							case 3:
									$obj->msg   = 'ADVERTENCIA: El archivo que intenta subir debe ser una imagen (JPG, PNG) menor a 1MG';
									$obj->class = 'warning';
									break;									
							default:break;
						}
						break;
			case 'admin-empresa-video-editar':
						switch ($err)
						{					
							case 1:
									$obj->msg   = 'ERROR: Hubo un problema al realizar la operación';
									$obj->class = 'danger';
									break;
							case 3:
									$obj->msg   = 'ADVERTENCIA: El archivo que intenta subir debe ser una imagen (JPG, PNG) menor a 1MG';
									$obj->class = 'warning';
									break;									
							default:break;
						}
						break;
			case 'admin-empresa-video-borrar':
						switch ($err)
						{				
							case -1:
									$obj->msg   = 'AVISO: Registro eliminado con éxito.';
									$obj->class = 'success';
									break;		
							case 1:
									$obj->msg   = 'ERROR: Hubo un problema al realizar la operación';
									$obj->class = 'danger';
									break;
							case 3:
									$obj->msg   = 'ADVERTENCIA: El archivo que intenta subir debe ser una imagen (JPG, PNG) menor a 1MG';
									$obj->class = 'warning';
									break;									
							default:break;
						}
						break;
			default:
				break;
		}

		return $obj;
	}


	// SUBIDA DE ARCHIVOS -->
	static function uploadFile($archivo, $path)
	{
		$err            = -1;
		$archivo_nombre = '';

		if($archivo["error"] == UPLOAD_ERR_OK)
		{
			$num_rand       = explode(" ", microtime());
			$num_rand       = substr($num_rand[1], -3);
			$archivo_nombre = $num_rand."_".Fn::FnParseString(str_replace(" ", "", basename($archivo['name'])));
			$temporal       = $archivo['tmp_name'];
			$tamano         = ($archivo['size'] / 1000 / 1000);
			$type           = $archivo['type'];
			$ext_permitidas = array("image/jpeg", "image/png");

			if( in_array($type, $ext_permitidas) && $tamano <= 1)
			{
				if (!move_uploaded_file($temporal, ROOT_DIR._DIR_UPLOAD_.$path._DS_.$archivo_nombre))
				{
					$err = 4;
				}else{
					// Si la imagen subió la achico a un tamaño general para el logo
					list($ancho, $alto) = getimagesize(ROOT_DIR._DIR_UPLOAD_.$path._DS_.$archivo_nombre);
					$archivo_nombre_n = "imagen".$archivo_nombre;
					Fn::resizeImagen(ROOT_DIR._DIR_UPLOAD_.$path, $archivo_nombre, 250, 250, $archivo_nombre_n, $type);
				    @unlink(ROOT_DIR._DIR_UPLOAD_.$path._DS_.$archivo_nombre);
				    $archivo_nombre = $archivo_nombre_n; // asi guardo en la db el nombre que quedo en la img
				}
			}else{
				$err = 3;
			}
		}

		return ['archivo_nombre' => $archivo_nombre, 'err' => $err];
	}
	// <--


	// Funcion para achicar la imagen
	static function resizeImagen($ruta, $foto, $alto, $ancho, $foto_n, $ext)
	{
	    $rutaImagenOriginal = $ruta._DS_.$foto;
	    switch ($ext)
	    {
	    	case 'image/png'	: $img_original = imagecreatefrompng($rutaImagenOriginal);
	    						  break;
	    	case 'image/jpeg'   :
	    	default 			: $img_original = imagecreatefromjpeg($rutaImagenOriginal);
	    						  break;
	    }
	 	$max_ancho = $ancho;
	    $max_alto = $alto;

	    list($ancho,$alto) = getimagesize($rutaImagenOriginal);
	    $x_ratio = $max_ancho / $ancho;
	    $y_ratio = $max_alto / $alto;

	    if( ($ancho <= $max_ancho) && ($alto <= $max_alto) )
	    {
	    	$ancho_final = $ancho;
	        $alto_final = $alto;
	    } elseif (($x_ratio * $alto) < $max_alto)
	    {
	        $alto_final = ceil($x_ratio * $alto);
	        $ancho_final = $max_ancho;
	    } else{
	        $ancho_final = ceil($y_ratio * $ancho);
	        $alto_final = $max_alto;
	    }

	    $tmp=imagecreatetruecolor($ancho_final,$alto_final);

	    if( $ext == 'image/png')
	    {
			imagealphablending($tmp, false);
			imagesavealpha($tmp,true);
			$transparent = imagecolorallocatealpha($tmp, 255, 255, 255, 127);
			imagefilledrectangle($tmp, 0, 0, $ancho_final, $alto_final, $transparent);
			imagecopyresampled($tmp, $img_original, 0, 0, 0, 0, $ancho_final, $alto_final, $ancho, $alto);
	    }

	    imagecopyresampled($tmp,$img_original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
		imagepng($tmp, $ruta._DS_.$foto_n);
		imagedestroy($img_original);
	}


}
