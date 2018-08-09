<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	if(isset($_SESSION['user_data'])) {
			if(isset($_POST['submit']) AND isset($_POST['shs']) AND is_string($_POST['shs'])) {
				$shs = $mysqli->real_escape_string($_POST['shs']);
				$shs_query="UPDATE `cms_site_content` SET `cms_content_desc` = '$shs' WHERE `cms_site_content`.`cms_content_label` = 'senior high school';";
				$insert_shs = $mysqli->query($shs_query);
				if($insert_shs) {
					$_SESSION['msg']='Successfully Updated';
					header('Location: ../edit_shs.php');
				}
				else {
					$_SESSION['msg']='Update Failed';
					header('Location: ../edit_shs.php');
				}
			}
			else {
				header('Location: ../edit_shs.php');
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>