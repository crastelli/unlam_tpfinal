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
	case 'admin-login'       : echo FnAdminLogin($dataJSON); break;
	case 'admin-recuperarpw' : echo FnAdminRecuperarPw($dataJSON); break;
	case 'admin-logout'      : echo FnAdminLogout(); break;
	default: break;
}


/**
	# FUNCIONES
*/
function FnAdminLogout()
{
	global $objAccess;

	$returnJSON = null;
	
	$err        = $objAccess->FnLogout();
	$returnJSON = array( "codErr" => $err );
	return json_encode($returnJSON);
}

function FnAdminRecuperarPw($dataJSON)
{
	global $objAccess;

	$json       = $dataJSON;
	$returnJSON = null;

	if(isset($json->email))
	{
		$email   = trim(strtolower($json->email));
		$err     = $objAccess->FnRecuperarPw($email);
		$msjJSON = Fn::FnGetMsg('admin-recuperarpw', $err);
	}else{
		$msjJSON = Fn::FnGetMsg('admin-recuperarpw', 1);
	}

	$returnJSON = $msjJSON;
	return json_encode($returnJSON);
}

function FnAdminLogin($dataJSON)
{
	global $objAccess;

	$json = $dataJSON;
	$returnJSON = null;

	if(isset($json->email) && isset($json->pw))
	{
		$email   = trim(strtolower($json->email));
		$pw      = trim($json->pw);
		$err     = $objAccess->FnSetAccess($email, $pw);
		$msjJSON = Fn::FnGetMsg('admin-login', $err);
	}else{
		$msjJSON = Fn::FnGetMsg('admin-login', 1);
	}

	$returnJSON = $msjJSON;
	return json_encode($returnJSON);
}