<?php

require_once('common.php');

if (isset($_POST['input-email']) and isset($_POST['password-input'])) {
    require_once('user/User.class.php');
    $user = new User(getVar('input-email'), getVar('password-input')); 
    if ($user->load()) {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;

        header("Location: /account.php");
        die();
    }
}

$currentPage = $translator->translate('Log in');

$smarty->assign('currentPage', $currentPage);

$smarty->display('login.tpl');

?>
