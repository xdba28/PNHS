<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	if(isset($_SESSION['user_data'])) {
			if(isset($_POST['submit']) AND isset($_POST['hs']) AND is_string($_POST['hs'])) {
				$hs = $mysqli->real_escape_string($_POST['hs']);
				$hs_query="UPDATE `cms_site_content` SET `cms_content_desc` = '$hs' WHERE `cms_site_content`.`cms_content_label` = 'high school';";
				$insert_hs = $mysqli->query($hs_query);
				if($insert_hs) {
					$_SESSION['msg']='Successfully Updated';
					header('Location: ../edit_hs.php');
				}
				else {
					$_SESSION['msg']='Update Failed';
					header('Location: ../edit_hs.php');
				}
			}
			else {
				header('Location: ../edit_hs.php');
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>