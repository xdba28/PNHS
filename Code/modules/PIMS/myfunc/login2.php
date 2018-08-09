<?php
	// Name: login2.php
	// 
	// Purpose: To logout automatically any logged in accoutns
	// 
	// Note: Please don't modify the code below
	session_start();
    session_destroy();
	//if( isset($_SESSION['user_data']['acct']['cms_account_ID']) ){
		unset ( $_SESSION['user_data']['acct']['cms_account_ID'] );
		unset ( $_SESSION['user_data']['acct']['cms_account_type'] );
		unset ( $_SESSION['user_data']['acct']['cms_username'] );
		unset ( $_SESSION['user_data']['acct']['cms_password'] );
		unset ( $_SESSION['pims_data']['emp_id'] );
		unset ( $_SESSION['pims_data']['pims_priv_user'] );
		unset ( $_SESSION['pims_data']['pims_priv_admin'] );
		unset ( $_SESSION['pims_data']['name'] );
		unset ( $_SESSION['pims_data']['messenger'] );
	//}
	
	header("Location: ../../../index.php");
	
?>