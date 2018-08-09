<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	if(isset($_SESSION['user_data'])) {
			if(isset($_POST['submit']) AND isset($_POST['hist']) AND is_string($_POST['hist'])) {
				$hist = $mysqli->real_escape_string($_POST['hist']);
				$hist_query="UPDATE `cms_site_content` SET `cms_content_desc` = '$hist' WHERE `cms_site_content`.`cms_content_label` = 'history';";
				$insert_hist = $mysqli->query($hist_query);
				if($insert_hist) {
					$_SESSION['msg']='Successfully Updated';
					header('Location: ../edit_history.php');
				}
				else {
					$_SESSION['msg']='Update Failed';
					header('Location: ../edit_history.php');
				}
			}
			else {
				header('Location: ../edit_history.php');
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>