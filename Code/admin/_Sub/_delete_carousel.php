<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	if(isset($_SESSION['user_data'])) {
			if(isset($_GET['id']) AND is_numeric($_GET['id'])) {
				$dir = NULL;
				$id = $mysqli->real_escape_string($_GET['id']);
				$img_query="SELECT * FROM `cms_carousel` WHERE `cms_carousel_ID`='$id';";
				$get_img = $mysqli->query($img_query);
				if($get_img) {
					while($img = $get_img->fetch_assoc()) {
						$img_name = $img['cms_carousel_name'];
					}
					if(file_exists("../../uploads/header/".$img_name)) {
						if(unlink("../../uploads/header/".$img_name)) {
							$unlinked = true;
						}
						else {
							$unlinked = false;
						}
					}
					else {
						$unlinked = true;
					}
				}
				if(isset($unlinked) AND $unlinked==true) {
					$news_query="DELETE FROM `cms_carousel` WHERE `cms_carousel_ID`='$id';";
					$delete_news = $mysqli->query($news_query);
					if($delete_news) {
						$_SESSION['msg']='Successfully Deleted';
						header('Location: ../edit_header.php');
					}
					else {
						$_SESSION['msg']='Delete Failed';
						header('Location: ../edit_header.php');
					}
				}
				else {
					$_SESSION['msg']='Delete Failed';
					header('Location: ../edit_header.php');
				}
			}
			else {
				header('Location: ../edit_header.php');
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>