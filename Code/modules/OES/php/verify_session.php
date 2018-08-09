<?php
//Verify current session
session_start();
if(!empty($_SESSION['user_data']['priv']['cms_account_type'])){
	switch($_SESSION['user_data']['priv']['cms_account_type']){
		case 'user':
		header('Location: home_stud.php');
		break;
		case 'admin':
		header('Location: home_teacher.php');
		break;
	}
}
?>