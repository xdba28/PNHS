<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	if(isset($_SESSION['user_data'])) {
			if(isset($_GET['id']) AND is_numeric($_GET['id'])) {
				$id = $mysqli->real_escape_string($_GET['id']);

				$fd_dir =  NULL;
				$news_query="SELECT * FROM `cms_news` WHERE `cms_news_ID` = ".$id.";";
				$get_news = $mysqli->query($news_query);
				while($news = $get_news->fetch_assoc()) {
					$fd_dir = $news['cms_news_img_dir'];
				}

				$mysqli->autocommit(FALSE);
				$mysqli->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
				//echo print_r($_REQUEST); die();
				$news_query="DELETE FROM `cms_news` WHERE `cms_news_ID`='$id';";
				$delete_news = $mysqli->query($news_query);
				if(file_exists("../../uploads/".$fd_dir)) {
					if(unlink("../../uploads/".$fd_dir)) {
						$unlinked = true;
					}
					else {
						$unlinked = false;
					}
				}
				else {
					$unlinked = true;
				}
				if($delete_news AND isset($unlinked) AND $unlinked==true) {
					$mysqli->commit();
					$mysqli->autocommit(TRUE);
					$_SESSION['msg']='Deleted';
					header('Location: ../news.php');
				}
				else {
					$mysqli->rollback();
					$mysqli->autocommit(TRUE);
					$_SESSION['msg']='Failed';
					header('Location: ../news.php');
				}
			}
			else {
				header('Location: ../news.php');
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>