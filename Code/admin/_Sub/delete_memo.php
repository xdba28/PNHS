<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	if(isset($_SESSION['user_data'])) {
			if(isset($_GET['id']) AND is_numeric($_GET['id'])) {
				$id = $mysqli->real_escape_string($_GET['id']);

				$fd_title = $fd_desc = $fd_date = $fd_id = $fd_dir = $fd_cap = $fd_auth = NULL;
				$news_query="SELECT * FROM `cms_memo` WHERE `cms_memo_ID` = ".$id.";";
				$get_news = $mysqli->query($news_query);
				while($news = $get_news->fetch_assoc()) {
					$fd_dir = $news['cms_memo_pdf_dir'];
				}

				$mysqli->autocommit(FALSE);
				$mysqli->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
				$news_query="DELETE FROM `cms_memo` WHERE `cms_memo_ID`='$id';";
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
					$_SESSION['msg']='Successfully Deleted';
					header('Location: ../memo.php');
				}
				else {
					$mysqli->rollback();
					$mysqli->autocommit(TRUE);
					$_SESSION['msg']='Delete Failed';
					header('Location: ../memo.php');
				}
			}
			else {
				header('Location: ../memo.php');
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>