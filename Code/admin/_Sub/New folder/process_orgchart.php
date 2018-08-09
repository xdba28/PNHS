<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	echo '<pre>'; echo print_r($_FILES); echo '</pre>';
	if(isset($_SESSION['user_data'])) {
			if(isset($_POST['submit']) AND isset($_FILES['file']) AND is_array($_FILES['file'])) {
					$fileName = $_FILES['file']['name'];
					$fileTmpName = $_FILES['file']['tmp_name'];
					$fileSize = $_FILES['file']['size'];
					$fileError = $_FILES['file']['error'];
					$fileType = $_FILES['file']['type'];
					$fileExt = explode('.', $fileName);
					$fileActualExt = strtolower(end($fileExt));
					$allowed = array('jpg', 'jpeg', 'png');
					$num_files = count($_FILES['file']['name']);
					if(in_array($fileActualExt, $allowed)) {
						if($fileError === 0) {
							if($fileSize < 2000000) {
								$str1 = date('[Y-m-d][H-i-s]',time());
								$str2 = mt_rand();
								$fileNameNew = $str1.'-'.$str2.'.'.$fileActualExt;
								$fileDestination = 'orgchart';
								move_uploaded_file($fileTmpName, '../../uploads/orgchart/'.$fileNameNew);
								$img_query="INSERT INTO `cms_image` (`cms_image_ID`, `cms_album_ID`, `cms_image_name`, `cms_image_dir`, `cms_album_name`, `cms_image_date`) VALUES (NULL, 20, '$fileNameNew', '$fileDestination', '', CURRENT_DATE());";
								//$mysqli->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
								$insert_img = $mysqli->query($img_query);
								if($insert_img) {
									//++$num_suc_files;
									$_SESSION['msg']='Success';
									//header('Location: ../edit_orgchart.php');
								}
								else {
									//$num_err_files+=1000;
									//$mysqli->rollback();
									$_SESSION['msg']='Failed';
									//header('Location: ../edit_orgchart.php');
								}
							}
						}
					}
			}
			else {
				header('Location: ../edit_orgchart.php');
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>