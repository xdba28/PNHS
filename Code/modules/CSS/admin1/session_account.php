<?php
	if( ( !isset($_SESSION['user_data']['acct']['cms_account_ID']) || empty($_SESSION['user_data']['acct']['cms_account_ID']) ) && ( !isset($_SESSION['user_data']['acct']['cms_account_type']) || empty($_SESSION['user_data']['acct']['cms_account_type']) ) && ( !isset($_SESSION['user_data']['acct']['cms_username']) || empty($_SESSION['user_data']['acct']['cms_username']) ) && ( !isset($_SESSION['user_data']['acct']['cms_password']) || empty($_SESSION['user_data']['acct']['cms_password']) ))
	{
		header("Location: ../../../index.php");
	}
?>