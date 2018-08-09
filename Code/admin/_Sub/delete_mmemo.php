<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	if(isset($_SESSION['user_data'])) {
			if(!isset($_POST['delete_memo']) and empty($_POST['delete_memo'])) {
				$_SESSION['msg']='Must Select Memo.';
				header('Location: ../memo.php');
			}
			else if(isset($_POST['s']) AND isset($_POST['delete_memo']) AND is_array($_POST['delete_memo'])) {
				$idary = $_POST['delete_memo'];
				$success_no = 0;
				$fail_no = 0;
				echo '<br>1<br>';
				for($cnt=0 ; $cnt < count($idary); ++$cnt) {
					$id = $idary[$cnt];
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
						++$success_no;
						$mysqli->commit();
						$mysqli->autocommit(TRUE);
						//++$success_no;
						//$_SESSION['msg']='Deleted';
						//header('Location: ../memo.php');
					}
					else {
						++$fail_no;
						$mysqli->rollback();
						$mysqli->autocommit(TRUE);
						//++$fail_no;
						//$_SESSION['msg']='Failed';
						//header('Location: ../memo.php');
					}
				}
				//$mysqli->commit();
				$mysqli->autocommit(TRUE);
				$num = count($idary);
				$_SESSION['msg']='Deleted '.$success_no.' Memo(s)';
				header('Location: ../memo.php');
			}
			else {
				$_SESSION['msg']='Failed to delete '.$success_no.' Memo(s)';
				header('Location: ../memo.php');
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>