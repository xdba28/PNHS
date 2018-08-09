<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	if(isset($_SESSION['user_data'])) {
			if(isset($_POST['submit'])) {
				$gpta = $mysqli->real_escape_string($_POST['gpta']);
				$gpta_query="UPDATE `cms_site_content` SET `cms_content_desc` = '$gpta' WHERE `cms_site_content`.`cms_content_label` = 'gpta';";
				$insert_gpta = $mysqli->query($gpta_query);
				if($insert_gpta) {
					$_SESSION['msg']=$_SESSION['msg'].'Success';
					header('Location: ../edit_gpta.php');
				}
				else {
					$_SESSION['msg']=$_SESSION['msg'].'Failed';
					header('Location: ../edit_gpta.php');
				}
			}
			else {
				header('Location: ../edit_gpta.php');
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>