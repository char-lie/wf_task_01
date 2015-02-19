<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

define('SMARTY_DIR', './smarty-3.1/libs/');
define('TRANSLATOR_DIR', './translation/');

require_once('site/Site.class.php');
require_once('translation/translation.php');

$translator = new Translator();
$translator->loadTranslation($Translation);

$smarty = new Smarty_Site('ru', 'pretty');
$smarty->setTranslator($translator);
$smarty->clearAllCache();

$smarty->tAssign('title', 'registrationTitle');
$smarty->tAssign('registrationHeading');
$smarty->tAssign('labelEmail');
$smarty->tAssign('labelPassword');
$smarty->tAssign('labelConfPassword');
$smarty->tAssign('continueRegButton');
$smarty->display('registration.tpl');

?>
