<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	if(isset($_SESSION['user_data'])) {
			if(isset($_GET['id']) AND is_numeric($_GET['id'])) {
				$dir = NULL;
				$id = $mysqli->real_escape_string($_GET['id']);
				$img_query="SELECT * FROM `cms_image` WHERE `cms_album_ID`=12 AND `cms_image_ID`='$id';";
				$get_img = $mysqli->query($img_query);
				if($get_img) {
					while($img = $get_img->fetch_assoc()) {
						$img_name = $img['cms_image_name'];
						$img_dir = $img['cms_image_dir'];
					}
					if(unlink("../../uploads/".$img_dir."/".$img_name)) {
						$unlinked = true;
					}
					else {
						$unlinked = false;
					}
				}
				if(isset($unlinked) AND $unlinked==true) {
					$news_query="DELETE FROM `cms_image` WHERE `cms_image_ID`='$id';";
					$delete_news = $mysqli->query($news_query);
					if($delete_news) {
						$_SESSION['msg']='Deleted';
						header('Location: ../edit_header.php');
					}
					else {
						$_SESSION['msg']='Failed';
						header('Location: ../edit_header.php');
					}
				}
				else {
					$_SESSION['msg']='Failed';
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