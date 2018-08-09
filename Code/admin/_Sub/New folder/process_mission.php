<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	if(isset($_SESSION['user_data'])) {
			if(isset($_POST['submit'])) {
				$misn = $mysqli->real_escape_string($_POST['misn']);
				$misn_query="UPDATE `cms_site_content` SET `cms_content_desc` = '$misn' WHERE `cms_site_content`.`cms_content_label` = 'mission';";
				$insert_misn = $mysqli->query($misn_query);
				if($insert_misn) {
					$_SESSION['msg']='Success';
					header('Location: ../edit_mission.php');
				}
				else {
					$_SESSION['msg']='Failed';
					header('Location: ../edit_mission.php');
				}
			}
			else {
				header('Location: ../edit_mission.php');
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>