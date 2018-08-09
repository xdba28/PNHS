<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	if(isset($_SESSION['user_data'])) {
			if(isset($_GET['id']) AND is_numeric($_GET['id'])) {
				$dir = NULL;
				$id = $mysqli->real_escape_string($_GET['id']);
				$img_query="SELECT * FROM `cms_image` WHERE `cms_album_ID`=20 AND `cms_image_ID`='$id';";
				$get_img = $mysqli->query($img_query);
				if($get_img) {
					while($img = $get_img->fetch_assoc()) {
						$img_name = $img['cms_image_name'];
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
					$img_query="DELETE FROM `cms_image` WHERE `cms_image_ID`='$id';";
					$delete_img = $mysqli->query($img_query);
					if($delete_img AND $unlinked) {
						$_SESSION['msg']='Deleted';
						header('Location: ../edit_orgchart.php');
					}
					else {
						$_SESSION['msg']='Failed';
						header('Location: ../edit_orgchart.php');
					}
				}
				else {
					$_SESSION['msg']='Failed';
					header('Location: ../edit_orgchart.php');
				}
			}
			else {
				header('Location: ../edit_orgchart.php');
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>