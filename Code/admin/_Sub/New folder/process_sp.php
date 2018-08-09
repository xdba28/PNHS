<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	//echo '<pre>'; echo print_r($_FILES); echo '</pre>';
	//die();
	if(isset($_SESSION['user_data'])) {
			if(isset($_POST['submit'])) {
				if(!isset($_FILES['file'])) {
					$_SESSION['msg']='No images selected.';
					header('Location: ../edit_sp.php');
					die();
				}
				if(count($_FILES['file']['name']) > 20 AND count($_FILES['file']['tmp_name']) > 20 AND count($_FILES['file']['size']) > 20 AND count($_FILES['file']['error']) > 20 AND count($_FILES['file']['type']) > 20) {
					$_SESSION['msg']='Maximum of 20 files only.';
					//echo 'max num valid';
					header('Location: ../edit_sp.php');
					die();
				}
				//die();
				$mysqli->autocommit(FALSE);
				for($i=0; $i<count($_FILES['file']['name']); ++$i) {
					$fileName = $_FILES['file']['name'][$i];
					$fileTmpName = $_FILES['file']['tmp_name'][$i];
					$fileSize = $_FILES['file']['size'][$i];
					$fileError = $_FILES['file']['error'][$i];
					$fileType = $_FILES['file']['type'][$i];
					$fileExt = explode('.', $fileName);
					$fileActualExt = strtolower(end($fileExt));
					$allowed = array('jpg', 'jpeg', 'png', 'pdf');
					$num_files = count($_FILES['file']['name']);
					//$num_err_files = 0;
					$num_suc_files = 0;
					if(in_array($fileActualExt, $allowed)) {
						if($fileError === 0) {
							if($fileSize < 2000000) {
								$str1 = date('[Y-m-d][H-i-s]',time());
								$str2 = mt_rand();
								$fileNameNew = $str1.'-'.$str2.'.'.$fileActualExt;
								$fileDestination = 'sp';
								move_uploaded_file($fileTmpName, '../../uploads/sp/'.$fileNameNew);
								$img_query="INSERT INTO `cms_image` (`cms_image_ID`, `cms_album_ID`, `cms_image_name`, `cms_image_dir`, `cms_image_date`) VALUES (NULL, '7', '$fileNameNew', '$fileDestination', CURRENT_DATE());";
								$insert_img = $mysqli->query($img_query);
								if($insert_img) {
									++$num_suc_files;
									$mysqli->commit();
								}
								else {
									//$num_err_files+=1000;
									$mysqli->rollback();
								}
							}
						}
					}
				}
				$mysqli->autocommit(TRUE);
				$_SESSION['msg']='Successfully uploaded '.$num_suc_files.' of '.$num_files;
				header('Location: ../edit_sp.php');
			}
			else {
				header('Location: ../edit_sp.php');
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>