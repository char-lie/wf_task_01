<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

define('UTILS_DIR', './utils/');
define('SMARTY_DIR', './smarty-3.1/libs/');
define('TRANSLATOR_DIR', './translation/');
define('SITE_CLASSES_DIR', './site/');
define('USER_CLASS_DIR', './user/');
define('FORM_CLASS_DIR', './form/');

require_once(SITE_CLASSES_DIR.'Site.class.php');
require_once(SITE_CLASSES_DIR.'SiteGuest.class.php');
require_once(SITE_CLASSES_DIR.'SiteUser.class.php');

$site = NULL;

if (isset($_SESSION['user_id'])) {
    $site = new SiteUser('pretty');
}
else {
    $site = new SiteGuest('pretty');
}

$site->loadPage();
$site->displayPage();

?>
