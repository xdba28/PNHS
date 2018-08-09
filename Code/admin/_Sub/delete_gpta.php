<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	if(isset($_SESSION['user_data'])) {
			if(isset($_GET['id']) AND is_numeric($_GET['id'])) {
				$id = trim($mysqli->real_escape_string($_GET['id']));
				$news_query="DELETE FROM `cms_gpta` WHERE `cms_gpta`.`cms_gpta_ID` = '$id';";
				$delete_news = $mysqli->query($news_query);
				if($delete_news) {
					$_SESSION['msg']='Successfully Deleted';
					header('Location: ../gpta.php');
				}
				else {
					$_SESSION['msg']='Delete Failed';
					header('Location: ../gpta.php');
				}
			}
			else {
				header('Location: ../gpta.php');
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>