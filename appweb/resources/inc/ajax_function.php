<?php
require "../../config/ini.php";

try {
    global $Admin;
	$Admin = new Admin;
	global $Empresa;
	$Empresa = new Empresa;
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
	case 'admin-login'          : echo FnAdminLogin(); break;
	case 'admin-recuperarpw'    : echo FnAdminRecuperarPw(); break;
	case 'admin-logout'         : echo FnAdminLogout(); break;
	case 'admin-perfil-admin'   : echo FnAdminPerfilAdmin(); break;
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
		// POST -->
		$email = trim(strtolower($_POST["email"]));
		$pw    = trim($_POST["pw"]);
		$acc   = $_POST["acc"];
		// <!--

		if($Admin->FnExiste($email))
		{
			$us = $Admin->FnLogin($email, $pw);
			if(!is_null($us)) $err = Usuario::setAccesoAdmin($us);
		}elseif($Empresa->FnExiste($email))
		{
			$us = $Empresa->FnLogin($email, $pw);
			if(!is_null($us)) $err = Usuario::setAccesoEmpresa($us);
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
	$returnJSON = $msjJSON = null;
	$acc = '';
	$err = 1;

	if(isset($_POST["email"]))
	{
		// POST -->
		$email   = trim(strtolower($_POST["email"]));
		$acc     = $_POST["acc"];
		// <!--

		if($Admin->FnExiste($email))
		{
			$err = $Admin->FnRecuperarPw($email);
		}elseif($Empresa->FnExiste($email))
		{
			$err = $Empresa->FnRecuperarPw($email);
		}

	}
	
	$msjJSON = Fn::FnGetMsg($acc, $err);

	$returnJSON = [ "status" => $msjJSON, "data_extra" => null ];
	return json_encode($returnJSON);
}

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
		
		$upload           = Fn::uploadFile($archivo, "logo_empresa");
		 
		if($upload["err"] == -1) $logo = $upload["archivo_nombre"];
		else{
			$msjJSON    = Fn::FnGetMsg($acc, $upload["err"]);
			$returnJSON = $msjJSON;
			return json_encode($returnJSON);
		}

		$err = $Empresa->FnGuardarPerfil($id, $idzona, $idrubro, $lat_long, $nombre_referente, $dni_referente, $nombre, $razon_social, $logo, $telefono, $direccion, $descripcion, $email, $pw);
	}
	$msjJSON  = Fn::FnGetMsg($acc, $err);

	$returnJSON = [ "status" => $msjJSON, "data_extra" => [ "logo" => $logo ] ];
	return json_encode($returnJSON);
}