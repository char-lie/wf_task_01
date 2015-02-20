<?php

require_once('common.php');

$currentPage = $translator->translate('Home');

$smarty->assign('currentPage', $currentPage);

$smarty->display('index.tpl');

?>
