<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	if(isset($_SESSION['user_data'])) {
			if(isset($_POST['submit']) AND isset($_POST['hymn']) AND is_string($_POST['hymn'])) {
				$hymn = $mysqli->real_escape_string($_POST['hymn']);
				$hymn_query="UPDATE `cms_site_content` SET `cms_content_desc` = '$hymn' WHERE `cms_site_content`.`cms_content_label` = 'hymn';";
				$insert_hymn = $mysqli->query($hymn_query);
				if($insert_hymn) {
					$_SESSION['msg']='Successfully Updated';
					header('Location: ../edit_hymn.php');
				}
				else {
					$_SESSION['msg']='Update Failed';
					header('Location: ../edit_hymn.php');
				}
			}
			else {
				header('Location: ../edit_hymn.php');
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>