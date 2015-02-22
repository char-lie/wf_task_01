<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

define('SMARTY_DIR', './smarty-3.1/libs/');
define('TRANSLATOR_DIR', './translation/');

require_once('site/Site.class.php');

$site = new Site('pretty');

$site->loadPage();
$site->displayPage();

?>
