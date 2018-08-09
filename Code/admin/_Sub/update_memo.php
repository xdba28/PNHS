<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	if(isset($_SESSION['user_data'])) {
			if(isset($_POST['submit']) AND isset($_POST['id']) AND isset($_POST['subj']) AND isset($_POST['date']) AND isset($_POST['desc'])) {
				$acct_id = $mysqli->real_escape_string($_SESSION['user_data']['acct']['cms_account_ID']);
				$subj = $mysqli->real_escape_string($_POST['subj']);
				$date = $mysqli->real_escape_string($_POST['date']);
				$desc = $mysqli->real_escape_string($_POST['desc']);
				$id = $mysqli->real_escape_string($_POST['id']);

				$fd_title = $fd_desc = $fd_date = $fd_id = $fd_dir = $fd_cap = $fd_auth = NULL;
				$news_query="SELECT * FROM `cms_memo` WHERE `cms_memo_ID` = ".$id.";";
				$get_news = $mysqli->query($news_query);
				while($news = $get_news->fetch_assoc()) {
					$fd_dir = $news['cms_memo_pdf_dir'];
				}
				//echo '<pre>'; echo print_r($_FILES); echo '</pre>';
				//echo $fd_dir;
				//die();
				if(isset($_FILES['file'])) {
					$fileName = $_FILES['file']['name'];
					$fileTmpName = $_FILES['file']['tmp_name'];
					$fileSize = $_FILES['file']['size'];
					$fileError = $_FILES['file']['error'];
					$fileType = $_FILES['file']['type'];
					$fileExt = explode('.', $fileName);
					$fileActualExt = strtolower(end($fileExt));
					$allowed = array('pdf');
					if(in_array($fileActualExt, $allowed)) {
						if($fileError === 0) {
							if($fileSize <= 2097152) {
								$str1 = date('[Y-m-d][H-i-s]',time());
								$str2 = mt_rand();
								$fileNameNew = $str1.'-'.$str2.'.'.$fileActualExt;
								$fileDestination = 'memo/'.$fileNameNew;
								//move_uploaded_file($fileTmpName, '../../uploads/news/'.$fileNameNew);
								$status = true;
							}
						}
					}
				}
				//echo $fileDestination;
				//die();
				$mysqli->autocommit(FALSE);
				$mysqli->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
				if(isset($fileDestination) AND $status==true) {
					$news_query="UPDATE `cms_memo` SET `cms_subject` = '$subj', `cms_memo_description` = '$desc', `cms_memo_date` = '$date', `cms_recipient` = '$recipient', `cms_memo_pdf_dir` = '$fileDestination' WHERE `cms_memo`.`cms_memo_ID` = '$id';";
				}
				else {
					$news_query="UPDATE `cms_memo` SET `cms_subject` = '$subj', `cms_memo_description` = '$desc', `cms_memo_date` = '$date', `cms_recipient` = '$recipient' WHERE `cms_memo`.`cms_memo_ID` = '$id';";
				}
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
				$insert_news = $mysqli->query($news_query);
				if($insert_news) {
					//$_SESSION['msg'].=$_SESSION['msg'].'<p>Upload Successful.</p>';
					if(isset($status) AND $status==true AND isset($unlinked) AND $unlinked==true) {
						move_uploaded_file($fileTmpName, '../../uploads/memo/'.$fileNameNew);
						//$_SESSION['msg'].='c';
					}
					$mysqli->commit();
					$mysqli->autocommit(TRUE);
					$_SESSION['msg']='Successfully Updated';
					header('Location: ../memo.php');
				}
				else {
					$mysqli->rollback();
					$mysqli->autocommit(TRUE);
					//$_SESSION['msg'].=$_SESSION['msg'].'<p>Upload Failed.</p>';
					$_SESSION['msg']='Update Failed';
					header('Location: ../edit_memo.php?id='.$id);
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