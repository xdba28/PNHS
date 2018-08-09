<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	if(isset($_SESSION['user_data'])) {
			if(isset($_GET['id']) AND is_numeric($_GET['id'])) {
				$id = $mysqli->real_escape_string($_GET['id']);
				$news_query="SET foreign_key_checks = 0; DELETE FROM `dms_receiver` WHERE `dms_receiver`.`cms_account_id` = '$id'; DELETE FROM `cms_account` WHERE `cms_account`.`cms_account_ID` = '$id'; DELETE FROM `cms_privilege` WHERE `cms_privilege`.`cms_account_id` = '$id'; SET foreign_key_checks = 1;";
				$delete_acct = $mysqli->multi_query($news_query);
				if($delete_acct) {
					$_SESSION['msg']='Successfully Deleted';
					header('Location: ../student_accounts.php');
				}
				else {
					$_SESSION['msg']='Delete Failed';
					header('Location: ../student_accounts.php');
				}
			}
			else {
				header('Location: ../student_accounts.php');
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>