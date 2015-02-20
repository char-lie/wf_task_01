<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('user/Register.class.php');

$ur = new User_Register($_GET['email'], $_GET['password']);

echo $ur->isEmailCorrect();
echo $ur->isPasswordCorrect();

?>
