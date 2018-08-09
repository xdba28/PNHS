<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	if(isset($_SESSION['user_data'])) {
			if(isset($_POST['submit']) AND isset($_POST['id']) AND isset($_POST['name']) AND isset($_POST['desc'])) {
				$acct_id = $mysqli->real_escape_string($_SESSION['user_data']['acct']['cms_account_ID']);
				$name = trim($mysqli->real_escape_string($_POST['name']));
				$id = trim($mysqli->real_escape_string($_POST['id']));
				$desc = trim($mysqli->real_escape_string($_POST['desc']));
				$mysqli->autocommit(FALSE);
				$mysqli->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
				$title_query="SELECT * FROM `cms_album` WHERE `cms_album_ID`='$id';";
				$get_title = $mysqli->query($title_query);
				while($ttle = $get_title->fetch_assoc()) {
					$title = $ttle['cms_album_name'];
				}
				$change_qry = "UPDATE `cms_image` SET `cms_album_name` = '$name' WHERE `cms_album_ID` = '$id';";
				$c_qry = $mysqli->query($change_qry);
				/*
				if(rename('../../uploads/docu/'.$title, '../../uploads/docu/'.$name)) {
					$rename_var = true;
				}
				else {
					$rename_var = false;
				}*/
				$album_query="UPDATE `cms_album` SET `cms_album_name` = '$name', `cms_album_desc` = '$desc' WHERE `cms_album`.`cms_album_ID` = $id;";
				$update_album = $mysqli->query($album_query);
				if($update_album AND $c_qry /*AND $rename_var==true*/) {
					$mysqli->commit();
					$mysqli->autocommit(TRUE);
					$_SESSION['msg']='Successfully Updated';
					header('Location: ../view_album.php?id='.$id);
				}
				else {
					$mysqli->rollback();
					$mysqli->autocommit(TRUE);
					$_SESSION['msg']='Update Failed';
					header('Location: ../edit_documentation.php?id='.$id);
				}
			}
			else {
				header('Location: ../edit_documentation.php?id='.$id);
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>