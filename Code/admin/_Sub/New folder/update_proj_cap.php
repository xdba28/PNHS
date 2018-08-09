<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	if(isset($_SESSION['user_data'])) {
			if(isset($_POST['submit'])) {
				$acct_id = $mysqli->real_escape_string($_SESSION['user_data']['acct']['cms_account_ID']);
				$id = $mysqli->real_escape_string($_POST['id']);
				$cap = $mysqli->real_escape_string($_POST['cap']);
				$name = $mysqli->real_escape_string($_POST['name']);
				$cap_query="UPDATE `cms_image` SET `cms_img_cap` = '$cap', `cms_image_title` = '$name' WHERE `cms_image`.`cms_image_ID` = $id;";
				$update_cap = $mysqli->query($cap_query);
				if($update_cap) {
					$_SESSION['msg'].='Updated';
					header('Location: ../edit_projects.php');
				}
				else {
					$_SESSION['msg'].='Failed';
					header('Location: ../edit_projects.php?id='.$id);
				}
			}
			else {
				header('Location: ../edit_projects.php?id='.$id);
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>