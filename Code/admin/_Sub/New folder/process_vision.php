<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	if(isset($_SESSION['user_data'])) {
			if(isset($_POST['submit'])) {
				$visn = $mysqli->real_escape_string($_POST['visn']);
				$visn_query="UPDATE `cms_site_content` SET `cms_content_desc` = '$visn' WHERE `cms_site_content`.`cms_content_label` = 'vision';";
				$insert_visn = $mysqli->query($visn_query);
				if($insert_visn) {
					$_SESSION['msg']='Success';
					header('Location: ../edit_vision.php');
				}
				else {
					$_SESSION['msg']='Failed';
					header('Location: ../edit_vision.php');
				}
			}
			else {
				header('Location: ../edit_vision.php');
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>