<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	if(isset($_SESSION['user_data'])) {
			if(isset($_GET['id']) AND is_numeric($_GET['id'])) {
				$id = $mysqli->real_escape_string($_GET['id']);
				$news_query="DELETE FROM `cms_account` WHERE `cms_account`.`cms_account_ID` = '$id';";
				$delete_acct = $mysqli->query($news_query);
				$news_query="DELETE FROM `cms_privilege` WHERE `cms_privilege`.`cms_account_id` = '$id';";
				$delete_priv = $mysqli->query($news_query);
				if($delete_acct AND $delete_priv) {
					$_SESSION['msg']='Deleted';
					header('Location: ../personnel_accounts.php');
				}
				else {
					$_SESSION['msg']='Failed';
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