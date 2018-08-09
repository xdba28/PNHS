<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	//echo print_r($_REQUEST); die();
	if(isset($_SESSION['user_data'])) {
			if(isset($_POST['p_file']) AND isset($_FILES['file']) AND is_array($_FILES['file'])) {
				$fd_dir = $fd_alb = NULL;
				$img_query="SELECT * FROM `cms_principal` LIMIT 1;";
				$get_img = $mysqli->query($img_query);
				while($img = $get_img->fetch_assoc()) {
					$fd_dir = $img['cms_principal_img_dir'];
				}
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
								$fileDestination = 'principal/'.$fileNameNew;
								$status = true;
							}
						}
					}
				}
				$mysqli->autocommit(FALSE);
				$mysqli->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
				$img_query="UPDATE `cms_principal` SET `cms_principal_img_dir` = '$fileDestination';";
				$insert_img = $mysqli->query($img_query);
				if($insert_img) {
					if(isset($status) AND $status==true) {
						move_uploaded_file($fileTmpName, '../../uploads/principal/'.$fileNameNew);
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
					}
					$mysqli->commit();
					$mysqli->autocommit(TRUE);
					$_SESSION['msg']='Success';
					header('Location: ../edit_principal.php');
				}
				else {
					$mysqli->rollback();
					$mysqli->autocommit(TRUE);
					$_SESSION['msg']='Failed';
					header('Location: ../edit_principal.php');
				}
			}

			if(isset($_POST['p_con']) AND isset($_POST['name']) AND isset($_POST['prin']) AND isset($_POST['rank'])) {
				$name = $mysqli->real_escape_string($_POST['name']);
				$prin = $mysqli->real_escape_string($_POST['prin']);
				$rank = $mysqli->real_escape_string($_POST['rank']);
				$prin_query="UPDATE `cms_principal` SET `cms_principal_content` = '$prin', `cms_principal_name` = '$name', `cms_principal_rank` = '$rank';";
				$insert_prin = $mysqli->query($prin_query);
				if($insert_prin) {
					$_SESSION['msg']='Successfully Updated';
					header('Location: ../edit_principal.php');
				}
				else {
					$_SESSION['msg']='Update Failed';
					header('Location: ../edit_principal.php');
				}
			}
			else {
				header('Location: ../edit_principal.php');
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>