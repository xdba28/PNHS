<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	if(isset($_SESSION['user_data'])) {
			if(isset($_GET['id']) AND is_numeric($_GET['id'])) {
				$id = $mysqli->real_escape_string($_GET['id']);
				$news_query="DELETE FROM `cms_image` WHERE `cms_image_ID`='$id';";
				$delete_news = $mysqli->query($news_query);
				if($delete_news) {
					$_SESSION['msg']='Deleted';
					header('Location: ../edit_principal.php');
				}
				else {
					$_SESSION['msg']='Failed';
					header('Location: ../edit_principal.php');
				}
			}
			else {
				header('Location: ../edit_principal.php');
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>