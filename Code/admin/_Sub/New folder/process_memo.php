<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	if(isset($_SESSION['user_data'])) {
			if(isset($_POST['submit']) AND isset($_POST['subj']) AND isset($_POST['date']) AND isset($_POST['desc'])) {
				$acct_id = $mysqli->real_escape_string($_SESSION['user_data']['acct']['cms_account_ID']);
				$subj = $mysqli->real_escape_string($_POST['subj']);
				$date = $mysqli->real_escape_string($_POST['date']);
				$desc = $mysqli->real_escape_string($_POST['desc']);
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
							if($fileSize < 2000000) {
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
				$mysqli->autocommit(FALSE);
				$mysqli->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
				$news_query="INSERT INTO `cms_memo` (`cms_memo_ID`, `cms_subject`, `cms_memo_description`, `cms_memo_date`, `cms_account_id`, `cms_memo_pdf_dir`) VALUES (NULL, '$subj', '$desc', '$date', '8', '$fileDestination');";
				$insert_news = $mysqli->query($news_query);
				if($insert_news) {
					//$_SESSION['msg'].=$_SESSION['msg'].'<p>Upload Successful.</p>';
					if(isset($status) AND $status==true) {
						move_uploaded_file($fileTmpName, '../../uploads/memo/'.$fileNameNew);
					}
					$mysqli->commit();
					$mysqli->autocommit(TRUE);
					$_SESSION['msg']='Success';
					header('Location: ../memo.php');
				}
				else {
					$mysqli->rollback();
					$mysqli->autocommit(TRUE);
					//$_SESSION['msg'].=$_SESSION['msg'].'<p>Upload Failed.</p>';
					$_SESSION['msg']='Failed';
					header('Location: ../add_memo.php');
				}
			}
			else {
				header('Location: ../add_memo.php');
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>