<?php
//error_reporting(~0);
error_reporting(E_ALL);
ini_set("display_errors",1);
require "environment.php";

/* Constants */
define('DS',DIRECTORY_SEPARATOR);

require __DIR__."/../core/application/AApplication.php";
use \bamboo\core\application\AApplication;

class BlueSeal extends AApplication {}

$BlueSeal = new BlueSeal('BlueSeal','pickyshop',dirname(__DIR__));
$BlueSeal->setDefaultLanguage('it');
$BlueSeal->enableDebugging();
if (getenv('ENV') == 'dev') {
	$BlueSeal->enableDebugging();
}