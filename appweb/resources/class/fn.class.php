<?php
Abstract Class Fn
{
	static $page_login      = 'admin_login.php';
	static $page_home_panel = 'admin_home.php';

	//access => 0 (PAGINA DE LOGEO)
	//access => 1 (PAGINAS INTERNAS DE LA APP - TODO EL RESTO QUE NO SEA LOGIN)
	static function FnCheckAccess($access=0)
	{
		if(!isset($_SESSION["usuario"]))
		{
			if($access != 0) header("Location: " . BASE_URL._DIR_INC_.Fn::$page_login);
		}else{
			if($access == 0) header("Location: " . BASE_URL._DIR_INC_.Fn::$page_home_panel);
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
							case 1:
									$obj->msg   = 'ERROR: al ingresar los datos.';
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
									$obj->msg   = 'ERROR: al ingresar los datos.';
									$obj->class = 'danger';
									break;
							case 0:
							default:
									$obj->msg   = 'Ingrese los datos por favor.';
									$obj->class = 'info';
									break;
						}
						break;
			case 'admin-perfil-usuario':
						switch ($err)
						{
							case -1:
									$obj->msg   = 'AVISO: Datos guardatos con éxito.';
									$obj->class = 'success';
									break;							
							case 1:
									$obj->msg   = 'ERROR: al ingresar los datos.';
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
									$obj->msg   = 'ERROR: al ingresar los datos.';
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
			default:
				break;
		}

		return $obj;
	}


}
