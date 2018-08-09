<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	if(isset($_SESSION['user_data'])) {
			if(isset($_POST['submit']) AND isset($_POST['title']) AND isset($_POST['date']) AND isset($_POST['desc'])) {
				$acct_id = $mysqli->real_escape_string($_SESSION['user_data']['acct']['cms_account_ID']);
				$title = $mysqli->real_escape_string($_POST['title']);
				$date = $mysqli->real_escape_string($_POST['date']);
				$desc = $mysqli->real_escape_string($_POST['desc']);
				if(isset($_POST['cap'])) { $cap = $mysqli->real_escape_string($_POST['cap']); } else { $cap = ''; }
				if(isset($_POST['auth'])) { $auth = $mysqli->real_escape_string($_POST['auth']); } else { $auth = ''; }
				if(isset($_FILES['file'])) {
					$fileName = $_FILES['file']['name'];
					$fileTmpName = $_FILES['file']['tmp_name'];
					$fileSize = $_FILES['file']['size'];
					$fileError = $_FILES['file']['error'];
					$fileType = $_FILES['file']['type'];
					$fileExt = explode('.', $fileName);
					$fileActualExt = strtolower(end($fileExt));
					$allowed = array('jpg', 'jpeg', 'png');
					if(in_array($fileActualExt, $allowed)) {
						if($fileError === 0) {
							if($fileSize <= 2097152) {
								$str1 = date('[Y-m-d][H-i-s]',time());
								$str2 = mt_rand();
								$fileNameNew = $str1.'-'.$str2.'.'.$fileActualExt;
								$fileDestination = 'news/'.$fileNameNew;
								//move_uploaded_file($fileTmpName, '../../uploads/news/'.$fileNameNew);
								$status = true;
							}
						}
					}
				}
				$mysqli->autocommit(FALSE);
				$mysqli->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
				$news_query="INSERT INTO `cms_news` (`cms_news_ID`, `cms_title`, `cms_news_description`, `cms_news_date`, `cms_account_id`, `cms_news_img_dir`, `cms_news_img_cap`, `cms_news_writer`, `cms_news_date_created`, `cms_news_time_created`) VALUES ('', '$title', '$desc', '$date', '$acct_id', '$fileDestination', '$cap', '$auth', CURRENT_DATE(), CURRENT_TIME());";
				$insert_news = $mysqli->query($news_query);
				if($insert_news) {
					//$_SESSION['msg'].=$_SESSION['msg'].'<p>Upload Successful.</p>';
					if(isset($status) AND $status==true) {
						move_uploaded_file($fileTmpName, '../../uploads/news/'.$fileNameNew);
					}
					$mysqli->commit();
					$mysqli->autocommit(TRUE);
					$_SESSION['msg']='Successfully Added';
					header('Location: ../news.php');
				}
				else {
					$mysqli->rollback();
					$mysqli->autocommit(TRUE);
					//$_SESSION['msg'].=$_SESSION['msg'].'<p>Upload Failed.</p>';
					$_SESSION['msg']='Adding Failed';
					header('Location: ../add_news.php');
				}
			}
			else {
				header('Location: ../add_news.php');
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>