<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	//echo '<pre>'; echo print_r($_FILES); echo '</pre>';
	//echo '<pre>'; echo print_r($_REQUEST); echo '</pre>'; die();
	if(isset($_SESSION['user_data'])) {
			if(isset($_POST['submit']) AND isset($_FILES['file']) AND is_array($_FILES['file']) AND isset($_POST['title']) AND is_string($_POST['title']) AND isset($_POST['sy1']) AND is_numeric($_POST['sy1']) AND isset($_POST['sy2']) AND is_numeric($_POST['sy2'])) {
					$sy1 = $mysqli->real_escape_string($_POST['sy1']);
					$sy2 = $mysqli->real_escape_string($_POST['sy2']);
					$title = $mysqli->real_escape_string($_POST['title']);
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
							if($fileSize <= 2097152) {
								$str1 = date('[Y-m-d][H-i-s]',time());
								$str2 = mt_rand();
								$fileNameNew = $str1.'-'.$str2.'.'.$fileActualExt;
								$fileDestination = 'orgchart';
								move_uploaded_file($fileTmpName, '../../uploads/orgchart/'.$fileNameNew);
								$img_query="INSERT INTO `cms_orgchart` (`cms_orgchart_ID`, `cms_orgchart_year1`, `cms_orgchart_year2`, `cms_orgchart_title`, `cms_orgchart_img_name`, `cms_orgchart_date`, `cms_orgchart_time`) VALUES (NULL, '$sy1', '$sy2', '$title', '$fileNameNew', CURRENT_DATE(), CURRENT_TIME());";
								//$mysqli->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
								$insert_img = $mysqli->query($img_query);
								if($insert_img) {
									//++$num_suc_files;
									$_SESSION['msg']='Successfully Added';
									header('Location: ../orgchart.php');
								}
								else {
									//$num_err_files+=1000;
									//$mysqli->rollback();
									$_SESSION['msg']='Adding Failed';
									header('Location: ../orgchart.php');
								}
							}
						}
					}
			}
			else {
				$_SESSION['msg']='Upload Failed';
				header('Location: ../orgchart.php');
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>