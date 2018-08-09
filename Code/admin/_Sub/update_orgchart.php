<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	if(isset($_SESSION['user_data'])) {
			if(isset($_POST['submit']) AND isset($_POST['id']) AND is_numeric($_POST['id']) AND isset($_POST['title']) AND is_string($_POST['title']) AND isset($_POST['sy1']) AND is_numeric($_POST['sy1']) AND isset($_POST['sy2']) AND is_numeric($_POST['sy2'])) {
				$acct_id = $mysqli->real_escape_string($_SESSION['user_data']['acct']['cms_account_ID']);
				$id = $mysqli->real_escape_string($_POST['id']);
				$title = $mysqli->real_escape_string($_POST['title']);
				$sy1 = $mysqli->real_escape_string($_POST['sy1']);
				$sy2 = $mysqli->real_escape_string($_POST['sy2']);

				$fd_dir = '';
				$orgid = $mysqli->real_escape_string($_POST['id']);
				$org_query="SELECT * FROM `cms_orgchart` WHERE `cms_orgchart_ID` = '$orgid';";
				$get_org = $mysqli->query($org_query);
				while($org = $get_org->fetch_assoc()) {
					$fd_dir = $org['cms_orgchart_img_name'];
				}
				//echo '<pre>'; echo print_r($_FILES); echo '</pre>'; die();
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
					$allowed = array('jpg', 'jpeg', 'png');
					if(in_array($fileActualExt, $allowed)) {
						if($fileError === 0) {
							if($fileSize <= 2097152) {
								$str1 = date('[Y-m-d][H-i-s]',time());
								$str2 = mt_rand();
								$fileNameNew = $str1.'-'.$str2.'.'.$fileActualExt;
								$fileDestination = 'orgchart/'.$fileNameNew;
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
					$news_query="UPDATE `cms_orgchart` SET `cms_orgchart_title` = '$title', `cms_orgchart_img_name` = '$fileNameNew', `cms_orgchart_year1` = '$sy1', `cms_orgchart_year2` = '$sy2' WHERE `cms_orgchart`.`cms_orgchart_ID` = '$id';";
				}
				else {
					$news_query="UPDATE `cms_orgchart` SET `cms_orgchart_title` = '$title', `cms_orgchart_year1` = '$sy1', `cms_orgchart_year2` = '$sy2' WHERE `cms_orgchart`.`cms_orgchart_ID` = '$id';";
				}
				if(file_exists("../../uploads/orgchart/".$fd_dir)) {
					if(unlink("../../uploads/orgchart/".$fd_dir)) {
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
						move_uploaded_file($fileTmpName, '../../uploads/orgchart/'.$fileNameNew);
						//$_SESSION['msg'].='c';
					}
					$mysqli->commit();
					$mysqli->autocommit(TRUE);
					$_SESSION['msg']='Successfully Updated';
					header('Location: ../orgchart.php');
				}
				else {
					$mysqli->rollback();
					$mysqli->autocommit(TRUE);
					//$_SESSION['msg'].=$_SESSION['msg'].'<p>Upload Failed.</p>';
					$_SESSION['msg']='Update Failed';
					header('Location: ../edit_orgchart.php?id='.$id);
				}
			}
			else {
				header('Location: ../orgchart.php');
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>