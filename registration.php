<?php

require_once('common.php');
require_once('user/User.class.php');

$currentPage = $translator->translate('Registration');

$smarty->assign('currentPage', $currentPage);

$email      = getVar('input-email');
$password   = getVar('password-input');

$smarty->assign('emailValue', $email);

if (getVar('continue-registration-buttoon') === 'ok') {
    $ur = new User($email, $password);
    if ($ur->isPasswordCorrect() && $ur->isEmailCorrect()) {
        $ur->signUp();
        $ur->signIn();
        $_SESSION['account_id'] = $ur->id;
        header("Location: /account.php");
        die();
    }
    else {
        $smarty->display('registration.tpl');
    }
}
else {
    $smarty->display('registration.tpl');
}

?>
