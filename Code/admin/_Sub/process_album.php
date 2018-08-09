<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	if(isset($_SESSION['user_data'])) {
			if(isset($_POST['submit']) AND isset($_POST['newalbum'])) {
				$acct_id = $mysqli->real_escape_string($_SESSION['user_data']['acct']['cms_account_ID']);
				$newalbum = $mysqli->real_escape_string($_POST['newalbum']);

				$str1 = date('[Y-m-d][H-i-s]',time());
				$str2 = mt_rand();
				$fileNameNew = $str1.'-'.$str2;

				if(mkdir('../../uploads/docu/'.$fileNameNew)) {
					$mysqli->autocommit(FALSE);
					$mysqli->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
					$new_album_query="INSERT INTO `cms_album` (`cms_album_ID`, `cms_account_ID`, `cms_album_name`, `cms_album_folder`, `cms_album_desc`, `gallery_type`, `cms_album_date_created`, `cms_album_time_created`) VALUES (NULL, '$acct_id', '$newalbum', '$fileNameNew', '', 'documentation', CURRENT_DATE(), CURRENT_TIME());";
					$insert_new_album = $mysqli->query($new_album_query);
					if($insert_new_album) {
						$mysqli->commit();
						$mysqli->autocommit(TRUE);
						$_SESSION['msg']='Album Created.<br>';
						header('Location: ../documentation.php');
					}
					else {
						$mysqli->rollback();
						$mysqli->autocommit(TRUE);
						$_SESSION['msg']='Failed';
						header('Location: ../documentation.php');
						die();
					}
				}
				else {
					$_SESSION['msg']='Failed';
					header('Location: ../documentation.php');
				}
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>