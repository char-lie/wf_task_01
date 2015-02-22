<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

define('UTILS_DIR', './utils/');
define('SMARTY_DIR', './smarty-3.1/libs/');
define('TRANSLATOR_DIR', './translation/');
define('SITE_CLASSES_DIR', './site/');
define('USER_CLASS_DIR', './user/');

require_once('site/Site.class.php');

$site = new Site('pretty');

$site->loadPage();
$site->displayPage();

?>
