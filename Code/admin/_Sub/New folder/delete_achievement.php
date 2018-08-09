<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	if(isset($_SESSION['user_data'])) {
			if(isset($_GET['id']) AND is_numeric($_GET['id'])) {
				$id = $mysqli->real_escape_string($_GET['id']);
				$news_query="DELETE FROM `cms_achievement` WHERE `cms_achievement_ID`='$id';";
				$delete_news = $mysqli->query($news_query);
				if($delete_news) {
					$_SESSION['msg']='Deleted';
					header('Location: ../achievements.php');
				}
				else {
					$_SESSION['msg']='Failed';
					header('Location: ../achievements.php');
				}
			}
			else {
				header('Location: ../achievements.php');
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>