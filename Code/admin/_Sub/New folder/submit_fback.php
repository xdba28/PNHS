<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	//echo print_r($_REQUEST); die();
	if(isset($_SESSION['user_data'])) {
			if(isset($_POST['name']) AND isset($_POST['email']) AND isset($_POST['phone']) AND isset($_POST['message'])) {
				$iname = $mysqli->real_escape_string($_POST['name']);
				$iemail = $mysqli->real_escape_string($_POST['email']);
				$iphone = $mysqli->real_escape_string($_POST['phone']);
				$imessage = $mysqli->real_escape_string($_POST['message']);
				$shs_query="INSERT INTO `cms_site_feedback` (`cms_feedback_ID`, `cms_site_feedback_name`, `cms_site_feedback_email`, `cms_site_feedback_phone`, `cms_site_feedback_content`) VALUES (NULL, '$iname', '$iemail', '$iphone', '$imessage');";
				$insert_shs = $mysqli->query($shs_query);
				if($insert_shs) {
					$_SESSION['msg']='Feedback Sent.';
					header('Location: ../../feedback.php');
				}
				else {
					$_SESSION['msg']='Something went wrong.';
					header('Location: ../../feedback.php');
				}
			}
			else {
				header('Location: ../../feedback.php');
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>