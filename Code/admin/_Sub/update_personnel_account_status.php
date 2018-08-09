<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	if(isset($_SESSION['user_data'])) {
			if(isset($_GET['id']) AND is_numeric($_GET['id']) AND isset($_GET['do']) AND is_numeric($_GET['do'])) {
				$id = $mysqli->real_escape_string($_GET['id']);
				$do = $mysqli->real_escape_string($_GET['do']);
				if($do == 1) {
					$news_query="UPDATE `cms_account` SET `status` = '1' WHERE `cms_account`.`emp_no` = '$id';";
				}
				else if($do == 0) {
					$news_query="UPDATE `cms_account` SET `status` = '0' WHERE `cms_account`.`emp_no` = '$id';";
				}
				else {
					$_SESSION['msg']='Update Status Failed';
					header('Location: ../personnel_accounts.php');
				}
				$delete_acct = $mysqli->query($news_query);
				if($delete_acct) {
					$_SESSION['msg']='Successfully Updated Status';
					header('Location: ../personnel_accounts.php');
				}
				else {
					$_SESSION['msg']='Update Status Failed';
					header('Location: ../personnel_accounts.php');
				}
			}
			else {
				header('Location: ../personnel_accounts.php');
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>