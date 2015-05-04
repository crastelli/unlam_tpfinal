<?php
require "config.php";

if(!isset($_SESSION)) session_start();

function __autoload($class_name)
{
    if(file_exists("../class/".strtolower($class_name).'.class.php')) {
        require_once("../class/".strtolower($class_name).'.class.php');    
    } else {
        throw new Exception("No se pudo cargar la clase ".strtolower($class_name));
    }
}
?>