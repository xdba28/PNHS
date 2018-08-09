<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	if(isset($_SESSION['user_data'])) {
			if(isset($_GET['id']) AND is_numeric($_GET['id'])) {
				$dir = NULL;
				$id = $mysqli->real_escape_string($_GET['id']);
				$al = $mysqli->real_escape_string($_GET['al']);
				$img_query="SELECT * FROM `cms_image` WHERE `cms_album_ID`='$al' AND `cms_image_ID`='$id';";
				$get_img = $mysqli->query($img_query);
				if($get_img) {
					while($img = $get_img->fetch_assoc()) {
						$img_name = $img['cms_image_name'];
						$alb = $img['cms_album_name'];
					}
					if(file_exists("../../uploads/docu/".$alb."/".$img_name)) {
						if(unlink("../../uploads/docu/".$alb."/".$img_name)) {
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
					$album_query="DELETE FROM `cms_image` WHERE `cms_image_ID`='$id';";
					$delete_album = $mysqli->query($album_query);
					if($delete_album) {
						$_SESSION['msg']='Deleted';
						header('Location: ../view_album.php?id='.$al);
					}
					else {
						$_SESSION['msg']='Failed';
						header('Location: ../view_album.php?id='.$al);
					}
				}
				else {
					$_SESSION['msg']='Failed';
					header('Location: ../view_album.php?id='.$al);
				}
			}
			else {
				header('Location: ../view_album.php?id='.$al);
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>