<?php

//header("Location: http://google.com");
//die();

require_once('common.php');
require_once('user/User.class.php');

$currentPage = $translator->translate('Account');

$smarty->assign('currentPage', $currentPage);
$smarty->assign('user_id', $_SESSION['account_id']);

$smarty->display('account.tpl');

?>
