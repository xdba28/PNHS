<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	if(isset($_SESSION['user_data'])) {
			if(isset($_POST['submit']) AND isset($_POST['glink']) AND is_string($_POST['glink'])) {
				$glink = $mysqli->real_escape_string($_POST['glink']);
				$hist_query="UPDATE `cms_site_content` SET `cms_content_desc` = '$glink' WHERE `cms_site_content`.`cms_content_label` = 'calendar';";
				$insert_hist = $mysqli->query($hist_query);
				if($insert_hist) {
					$_SESSION['msg']='Google Calendar Updated';
					header('Location: ../calendar.php');
				}
				else {
					$_SESSION['msg']='Google Calendar Update Failed';
					header('Location: ../calendar.php');
				}
			}
			else {
				header('Location: ../calendar.php');
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>