<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	if(isset($_SESSION['user_data'])) {
		if(isset($_SESSION['user_data']['acct']['emp_no']) AND (in_array("superadmin", $_SESSION['user_data']['priv']['cms_account_type']) AND in_array("admin", $_SESSION['user_data']['priv']['cms_account_type']))) {
			$keysa = array_search('superadmin', $_SESSION['user_data']['priv']['cms_account_type']);
			$keya = array_search('admin', $_SESSION['user_data']['priv']['cms_account_type']);
	        if($_SESSION['user_data']['priv']['cms_priv'][$keysa]==1 OR $_SESSION['user_data']['priv']['cms_priv'][$keya]==1) {

	        }
	        else {
	        	$_SESSION['msg']='1';
	        	header('Location: ../index.php');
				die();
	        }
	    }
		else {
			$_SESSION['msg']='2';
			header('Location: ../index.php');
			die();
		}
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