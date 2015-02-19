<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

define('SMARTY_DIR', './smarty-3.1/libs/');
define('TRANSLATOR_DIR', './translation/');

require_once('site/Site.class.php');
require_once('translation/translation.php');

$translator = new Translator();
$translator->loadTranslation($Translation);

$languageCode = NULL;
if (isset($_GET['select-language'])) {
    setcookie('languageCode', $_GET['select-language']);
    $languageCode = $_GET['select-language'];
}
else if (isset($_COOKIE['languageCode'])) {
    $languageCode = $_COOKIE['languageCode'];
}
if (!array_key_exists($languageCode, $translator->getAvailableLanguages())) {
    $languageCode = $translator->getDefaultLanguage();
}

$smarty = new Smarty_Site($languageCode, 'pretty');
$smarty->setTranslator($translator);
$smarty->clearAllCache();

$navigationElements = array(
    '/index.php'        => $translator->translate('Home'),
    '/registration.php' => $translator->translate('Registration'),
    '/login.php'        => $translator->translate('Login')
);
$currentPage = $translator->translate('Registration');

$smarty->assign('languageCode', $languageCode);
$smarty->assign('languages', $translator->getAvailableLanguages());
$smarty->assign('navigationElements', $navigationElements);
$smarty->assign('currentPage', $currentPage);
$smarty->tAssign('Language');
$smarty->tAssign('languageFormName');
$smarty->tAssign('lblChangeLanguage');
$smarty->tAssign('plhChangeLanguage');


$smarty->tAssign('title', 'registrationTitle');
$smarty->tAssign('registrationFormName');
$smarty->tAssign('lblEmail');
$smarty->tAssign('plhEmail');
$smarty->tAssign('lblPassword');
$smarty->tAssign('plhPassword');
$smarty->tAssign('lblPasswordConfirm');
$smarty->tAssign('plhPasswordConfirm');
$smarty->tAssign('lblContinueReg');
$smarty->tAssign('plhContinueReg');
$smarty->display('registration.tpl');

?>
