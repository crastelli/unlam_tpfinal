<?php

Abstract Class Fn
{
	static $page_login      = 'admin_login.php';
	static $page_home_panel = 'admin_home.php';

	//access => 0 (PAGINA DE LOGEO)
	//access => 1 (PAGINAS INTERNAS DE LA APP)
	static function FnCheckAccess($access=0)
	{
		if(!isset($_SESSION["usuario"]))
		{
			if($access != 0) header("Location: " . Fn::$page_login);
		}else{
			if($access == 0) header("Location: " . Fn::$page_home_panel);
		}
	}	
	static function FnCheckAccessAdmin()
	{
		if(!isset($_SESSION["usuario"]))
		{
			header("Location: " . Fn::$page_login);
		}else{
			if($_SESSION["usuario"]->root == 1)
			{
				header("Location: " . Fn::$page_home_panel);
			}else{
				header("Location: " . Fn::$page_login);
			}
		}
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
									$obj->msg   = 'Error al ingresar los datos.';
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
									$obj->msg   = 'Datos enviados, revice su casilla de correo';
									$obj->class = 'success';
									break;							
							case 1:
									$obj->msg   = 'Error al ingresar los datos.';
									$obj->class = 'danger';
									break;
							case 0:
							default:
									$obj->msg   = 'Ingrese los datos por favor.';
									$obj->class = 'info';
									break;
						}
						break;

			default:
				break;
		}

		return $obj;
	}


}
