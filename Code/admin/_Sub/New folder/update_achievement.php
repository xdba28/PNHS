<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	if(isset($_SESSION['user_data'])) {
			if(isset($_POST['submit'])) {
				$acct_id = $mysqli->real_escape_string($_SESSION['user_data']['acct']['cms_account_ID']);
				$name = $mysqli->real_escape_string($_POST['name']);
				$date = $mysqli->real_escape_string($_POST['date']);
				$id = $mysqli->real_escape_string($_POST['id']);
				$about = $mysqli->real_escape_string($_POST['about']);
				$ach_query="UPDATE `cms_achievement` SET `cms_achievement_name` = '$name', `cms_achievement_about` = '$about', `cms_achievement_date` = '$date' WHERE `cms_achievement`.`cms_achievement_ID` = '$id';";
				$update_ach = $mysqli->query($ach_query);
				if($update_ach) {
					$_SESSION['msg']='Updated';
					header('Location: ../achievements.php');
				}
				else {
					$_SESSION['msg']='Failed';
					header('Location: ../edit_achievement.php?id='.$id);
				}
			}
			else {
				header('Location: ../edit_achievement.php?id='.$id);
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>
?>