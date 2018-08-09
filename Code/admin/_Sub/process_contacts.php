<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	if(isset($_SESSION['user_data'])) {
			if(isset($_POST['submit']) AND isset($_POST['contacts']) AND is_string($_POST['contacts'])) {
				$contacts = $mysqli->real_escape_string($_POST['contacts']);
				$contacts_query="UPDATE `cms_site_content` SET `cms_content_desc` = '$contacts' WHERE `cms_site_content`.`cms_content_label` = 'contacts';";
				$insert_contacts = $mysqli->query($contacts_query);
				if($insert_contacts) {
					$_SESSION['msg']='Successfully Updated';
					header('Location: ../edit_footer.php');
				}
				else {
					$_SESSION['msg']='Update Failed';
					header('Location: ../edit_footer.php');
				}
			}
			else {
				header('Location: ../edit_footer.php');
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>