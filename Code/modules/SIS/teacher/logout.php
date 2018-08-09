<?php 
include_once ('DB Con.php');

session_start();
unset($_SESSION['user_data']['acct']['cms_username']);
unset($_SESSION['user_data']['acct']['cms_account_ID']);
unset($_SESSION['user_data']['acct']['cms_account_type']);
unset($_SESSION['user_data']['acct']['cms_password']);

session_destroy();

header('Location: ../../../../login.php');


?>