<?php
require "config.php";

if(!isset($_SESSION)) session_start();

function __autoload($class_name)
{
    if(file_exists(ROOT_DIR._DIR_CLASS_.strtolower($class_name).'.class.php')) {
        require_once(ROOT_DIR._DIR_CLASS_.strtolower($class_name).'.class.php');    
    } else {
        throw new Exception("No se pudo cargar la clase ".strtolower($class_name));
    }
}
?>