<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

define('SMARTY_DIR', './smarty-3.1/libs/');
require_once(SMARTY_DIR.'Smarty.class.php');

$smarty = new Smarty();
$smarty->clearAllCache();
$smarty->testInstall();

?>
