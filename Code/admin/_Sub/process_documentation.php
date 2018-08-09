<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	//echo '<pre>'; echo print_r($_FILES); echo '</pre>';
	if(isset($_SESSION['user_data'])) {
			if(isset($_POST['submit']) AND isset($_POST['id']) AND is_numeric($_POST['id']) AND isset($_POST['aln']) AND is_string($_POST['aln'])) {
				$id = $mysqli->real_escape_string($_POST['id']);
				$aln = $mysqli->real_escape_string($_POST['aln']);
				if(!isset($_FILES['file'])) {
					$_SESSION['msg']='No images selected.';
					header('Location: ../view_album.php?id='.$id);
					die();
				}
				if(count($_FILES['file']['name']) > 20 AND count($_FILES['file']['tmp_name']) > 20 AND count($_FILES['file']['size']) > 20 AND count($_FILES['file']['error']) > 20 AND count($_FILES['file']['type']) > 20) {
					$_SESSION['msg']='Maximum of 20 files only.';
					header('Location: ../view_album.php?id='.$id);
					die();
				}
				//die();
				$num_suc_files = 0;
				//$num_err_files = 0;
				for($i=0; $i<count($_FILES['file']['name']); ++$i) {
					$fileName = $_FILES['file']['name'][$i];
					$fileTmpName = $_FILES['file']['tmp_name'][$i];
					$fileSize = $_FILES['file']['size'][$i];
					$fileError = $_FILES['file']['error'][$i];
					$fileType = $_FILES['file']['type'][$i];
					$fileExt = explode('.', $fileName);
					$fileActualExt = strtolower(end($fileExt));
					$allowed = array('jpg', 'jpeg', 'png');
					$num_files = count($_FILES['file']['name']);
					if(in_array($fileActualExt, $allowed)) {
						if($fileError === 0) {
							if($fileSize <= 2097152) {
								$str1 = date('[Y-m-d][H-i-s]',time());
								$str2 = mt_rand();
								$fileNameNew = $str1.'-'.$str2.'.'.$fileActualExt;
								$fileDestination = 'docu';
								move_uploaded_file($fileTmpName, '../../uploads/docu/'.$aln.'/'.$fileNameNew);
								$mysqli->autocommit(FALSE);
								$mysqli->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
								$img_query="INSERT INTO `cms_image` (`cms_image_ID`, `cms_album_ID`, `cms_image_name`, `cms_image_dir`, `cms_album_name`, `cms_image_date`, `cms_image_time`) VALUES (NULL, '$id', '$fileNameNew', '$fileDestination', '$aln', CURRENT_DATE(), CURRENT_TIME());";
								$insert_img = $mysqli->query($img_query);
								if($insert_img) {
									++$num_suc_files;
									$mysqli->commit();
									$mysqli->autocommit(TRUE);
								}
								else {
									//$num_err_files+=1000;
									$mysqli->rollback();
									$mysqli->autocommit(TRUE);
								}
							}
						}
					}
				}
				$mysqli->autocommit(TRUE);
				$_SESSION['msg']='Successfully uploaded '.$num_suc_files.' Images.';
				header('Location: ../view_album.php?id='.$id);
			}
			else {
				header('Location: ../view_album.php?id='.$id);
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>