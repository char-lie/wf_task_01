<?php

require_once('common.php');
require_once('user/User.class.php');

$currentPage = $translator->translate('Registration');

$smarty->assign('currentPage', $currentPage);

$smarty->assign('emailValue', getVar('input-email'));

if (getVar('continue-registration-buttoon') === 'ok') {
    $ur = new User(getVar('input-email'), getVar('password-input'));
    if ($ur->isPasswordCorrect() && $ur->isEmailCorrect()) {
        $ur->save();
        $_SESSION['user_id'] = $ur->id;
        $smarty->display('continue-registration.tpl');
    }
    else {
        $smarty->display('registration.tpl');
    }
}
else {
    $smarty->display('registration.tpl');
}

?>
