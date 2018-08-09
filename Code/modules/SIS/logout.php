<?php 
include_once ('db_con_i.php');

session_start();
unset($_SESSION['user_data']['acct']['cms_username']);
unset($_SESSION['user_data']['acct']['cms_account_ID']);
unset($_SESSION['user_data']['acct']['cms_account_type']);
unset($_SESSION['user_data']['acct']['cms_password']);
session_destroy();
?>

<script>
	alert('Sucessfully Logged Out');
	window.location = "../../admin_idx.php";
</script>