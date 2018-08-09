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
				$about = $mysqli->real_escape_string($_POST['about']);
				$ach_query="INSERT INTO `cms_achievement` (`cms_achievement_ID`, `cms_achievement_name`, `cms_achievement_about`, `cms_achievement_date`, `cms_account_id`, `cms_img_dir`) VALUES (NULL, '$name', '$about', '$date', '$acct_id', NULL);";
				$insert_ach = $mysqli->query($ach_query);
				if($insert_ach) {
					$_SESSION['msg']='Success';
					header('Location: ../achievements.php');
				}
				else {
					$_SESSION['msg']='Failed';
					header('Location: ../add_achievement.php');
				}
			}
			else {
				header('Location: ../add_achievement.php');
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>