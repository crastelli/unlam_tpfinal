<?php
require "../class/access.class.php";
require "../class/function.class.php";

if(!isset($_POST))
{
	header("Location: ../template/404.php");
	die;
}

global $objAccess;
$objAccess = new Access;

$acc      = (isset($_POST["acc"]))? $_POST["acc"] : null;
$dataJSON = (isset($_POST["dataJSON"]))? json_decode($_POST["dataJSON"]) : null;

/**
	# ACCIONES
*/
switch($acc)
{
	case 'admin-login'          : echo FnAdminLogin($acc, $dataJSON); break;
	case 'admin-recuperarpw'    : echo FnAdminRecuperarPw($acc, $dataJSON); break;
	case 'admin-logout'         : echo FnAdminLogout($acc); break;
	case 'admin-perfil-usuario' : echo FnAdminPerfilUsuario($acc, $dataJSON); break;
	default: break;
}


/**
	# FUNCIONES
*/

/**
	# LOGIN
*/
function FnAdminLogout($acc)
{
	global $objAccess;

	$returnJSON = null;
	
	$err        = $objAccess->FnLogout();
	$returnJSON = array( "codErr" => $err );
	return json_encode($returnJSON);
}

function FnAdminRecuperarPw($acc, $dataJSON)
{
	global $objAccess;

	$json       = $dataJSON;
	$returnJSON = null;

	if(isset($json->email))
	{
		$email   = trim(strtolower($json->email));
		$err     = $objAccess->FnRecuperarPw($email);
		$msjJSON = Fn::FnGetMsg($acc, $err);
	}else{
		$msjJSON = Fn::FnGetMsg($acc, 1);
	}

	$returnJSON = $msjJSON;
	return json_encode($returnJSON);
}

function FnAdminLogin($acc, $dataJSON)
{
	global $objAccess;

	$json = $dataJSON;
	$returnJSON = null;

	if(isset($json->email) && isset($json->pw))
	{
		$email   = trim(strtolower($json->email));
		$pw      = trim($json->pw);
		$err     = $objAccess->FnSetAccess($email, $pw);
		$msjJSON = Fn::FnGetMsg($acc, $err);
	}else{
		$msjJSON = Fn::FnGetMsg($acc, 1);
	}

	$returnJSON = $msjJSON;
	return json_encode($returnJSON);
}

/**
	# PERFIL
*/
function FnAdminPerfilUsuario($acc, $dataJSON)
{
	global $objAccess;

	$json       = $dataJSON;
	$returnJSON = null;

	if(isset($json->id))
	{
		$id        = $json->id;
		$nombre    = $json->nombre;
		$telefono  = $json->telefono;
		$direccion = $json->direccion;
		$email     = trim(strtolower($json->email));
		$pw        = $json->pw;
		
		$err       = $objAccess->FnAdminGuardarPerfilUsuario($id, $nombre, $telefono, $direccion, $email, $pw);
		$msjJSON   = Fn::FnGetMsg($acc, $err);
	}else{
		$msjJSON = Fn::FnGetMsg($acc, 1);
	}

	$returnJSON = $msjJSON;
	return json_encode($returnJSON);
}
