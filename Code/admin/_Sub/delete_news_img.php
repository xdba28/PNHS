<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	//die();
	if(isset($_SESSION['user_data'])) {
			if(isset($_GET['a']) AND is_numeric($_GET['a'])) {
				$dir = NULL;
				$id = $mysqli->real_escape_string($_GET['a']);
				$img_query="SELECT * FROM `cms_news` WHERE `cms_news_ID`='$id';";
				$get_img = $mysqli->query($img_query);
				if($get_img) {
					while($img = $get_img->fetch_assoc()) {
						$img_name = $img['cms_news_img_dir'];
					}
					if(file_exists("../../uploads/".$img_name)) {
						if(unlink("../../uploads/".$img_name)) {
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
					$news_query="UPDATE `cms_news` SET `cms_news_img_dir` = '' WHERE `cms_news`.`cms_news_ID` = '$id';";
					$delete_news = $mysqli->query($news_query);
					if($delete_news) {
						$_SESSION['msg']='Successfully Deleted';
						header('Location: ../edit_news.php?id='.$id);
					}
					else {
						$_SESSION['msg']='Delete Failed';
						header('Location: ../edit_news.php?id='.$id);
					}
				}
				else {
					$_SESSION['msg']='Delete Failed';
					header('Location: ../edit_news.php?id='.$id);
				}
			}
			else {
				header('Location: ../edit_news.php?id='.$id);
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>