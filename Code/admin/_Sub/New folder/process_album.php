<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	if(isset($_SESSION['user_data'])) {
			if(isset($_POST['submit'])) {
				$acct_id = $mysqli->real_escape_string($_SESSION['user_data']['acct']['cms_account_ID']);
				$newalbum = $mysqli->real_escape_string($_POST['newalbum']);
				$new_album_query="INSERT INTO `cms_album` (`cms_album_ID`, `cms_account_ID`, `cms_album_name`, `cms_album_desc`, `gallery_type`, `cms_album_date_created`, `cms_album_time_created`) VALUES (NULL, '$acct_id', '$newalbum', '', 'documentation', CURRENT_DATE(), CURRENT_TIME());";
				$insert_new_album = $mysqli->query($new_album_query);
				if($insert_new_album) {
					mkdir('../../uploads/docu/'.$newalbum);
					$_SESSION['msg']='Album Created.<br>';
					header('Location: ../documentation.php');
				}
				else {
					$_SESSION['msg']='Error.<br>';
					header('Location: ../documentation.php');
				}
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>