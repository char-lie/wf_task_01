<?php

//header("Location: http://google.com");
//die();

require_once('common.php');
require_once('user/User.class.php');

$currentPage = $translator->translate('Registration');

$smarty->assign('currentPage', $currentPage);

//$_SESSION['user_id'] = 10;

$user = new User($_SESSION['user_id']); 
$user->load();

$smarty->assign('user_id', $user->id);
$smarty->assign('user_email', $user->email);

$smarty->display('account.tpl');

?>
