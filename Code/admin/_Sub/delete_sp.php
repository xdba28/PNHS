<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	if(isset($_SESSION['user_data'])) {
			if(isset($_GET['id']) AND is_numeric($_GET['id'])) {
				$id = $mysqli->real_escape_string($_GET['id']);
				$img_query="SELECT * FROM `cms_image` WHERE `cms_album_ID`=7 AND `cms_image_ID`='$id';";
				$get_img = $mysqli->query($img_query);
				if($get_img) {
					while($img = $get_img->fetch_assoc()) {
						$img_name = $img['cms_image_name'];
						$img_dir = $img['cms_image_dir'];
					}
					if(file_exists("../../uploads/".$img_dir."/".$img_name)) {
						if(unlink("../../uploads/".$img_dir."/".$img_name)) {
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
					$news_query="DELETE FROM `cms_image` WHERE `cms_image_ID`='$id';";
					$del_news = $mysqli->query($news_query);
					if($del_news) {
						$_SESSION['msg']='Successfully Deleted';
						header('Location: ../edit_sp.php');
					}
					else {
						$_SESSION['msg']='Delete Failed';
						header('Location: ../edit_sp.php');
					}
				}
				else {
					$_SESSION['msg']='Delete Failed';
					header('Location: ../edit_sp.php');
				}
			}
			else {
				header('Location: ../edit_sp.php');
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>