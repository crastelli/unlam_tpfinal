<?php
date_default_timezone_set("America/Argentina/Buenos_Aires");

// --->
define('_DS_', DIRECTORY_SEPARATOR);
// Defines
define('ROOT_DIR', '/var/www/html/milugar/');//linux
// define('ROOT_DIR', 'C:/Apache24/htdocs/milugar/');//windows
define('BASE_URL', 'http://localhost/milugar/');
// -->
/*define('_DIR_ASSETS_', 'appweb'._DS_.'assets'._DS_);
define('_DIR_INC_', 'appweb'._DS_.'resources'._DS_.'inc'._DS_);
define('_DIR_CLASS_', 'appweb'._DS_.'resources'._DS_.'class'._DS_);
define('_DIR_TMP_', 'appweb'._DS_.'resources'._DS_.'template'._DS_);
define('_DIR_PLG_', 'appweb'._DS_.'resources'._DS_.'plugins'._DS_);
define('_DIR_UPLOAD_', 'appweb'._DS_.'upload'._DS_);*/
define('_DIR_ASSETS_', 'appweb/assets/');
define('_DIR_INC_', 'appweb/resources/inc/');
define('_DIR_CLASS_', 'appweb/resources/class/');
define('_DIR_TMP_', 'appweb/resources/template/');
define('_DIR_PLG_', 'appweb/resources/plugins/');
define('_DIR_UPLOAD_', 'appweb/upload/');

define('ENVIRONMENT', 'development');

switch (ENVIRONMENT)
{
	case 'development':
		error_reporting(-1);
		ini_set('display_errors', 1);
	break;

	case 'testing':
	case 'production':
		error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT);
		ini_set('display_errors', 0);
	break;

	default:
		header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
		echo 'The application environment is not set correctly.';
		exit(1); // EXIT_ERROR
}