<?php

function getVar($varname) {
    return isset($_POST[$varname]) ? $_POST[$varname]:NULL;
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

define('SMARTY_DIR', './smarty-3.1/libs/');
define('TRANSLATOR_DIR', './translation/');

require_once('site/Site.class.php');
require_once('translation/translation.php');

$translator = new Translator();
$translator->loadTranslation($Translation);

$languageCode = NULL;

$smarty = new Smarty_Site($translator, 'pretty');
$languageCode = $smarty->getLanguage();

function translation_plugin($params, $content, $smarty) {
    if (isset($content)) {
        return $smarty->translator->translate($content);
    }
}
$smarty->registerPlugin("block", "translate", "translation_plugin");

$navigationElements = array(
    '/index.php'        => $translator->translate('Home'),
    '/registration.php' => $translator->translate('Registration'),
    '/login.php'        => $translator->translate('Log in')
);

$smarty->assign('languageCode', $languageCode);
$smarty->assign('languages', $translator->getAvailableLanguages());
$smarty->assign('navigationElements', $navigationElements);

?>
