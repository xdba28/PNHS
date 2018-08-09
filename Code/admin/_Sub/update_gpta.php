<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	if(isset($_SESSION['user_data'])) {
			if(isset($_POST['submit']) AND isset($_POST['gpta']) AND is_string($_POST['gpta']) AND isset($_POST['sy1']) AND is_numeric($_POST['sy1']) AND isset($_POST['sy2']) AND is_numeric($_POST['sy2'])) {
				$sy1 = $mysqli->real_escape_string($_POST['sy1']);
				$sy2 = $mysqli->real_escape_string($_POST['sy2']);
				$gpta = $mysqli->real_escape_string($_POST['gpta']);
				$id = $mysqli->real_escape_string($_POST['id']);
				$gpta_query="UPDATE `cms_gpta` SET `cms_gpta_content` = '$gpta', `cms_gpta_year1` = '$sy1', `cms_gpta_year2` = '$sy2' WHERE `cms_gpta_ID` = '$id';";
				$insert_gpta = $mysqli->query($gpta_query);
				if($insert_gpta) {
					$_SESSION['msg']=$_SESSION['msg'].'Successfully Updated';
					header('Location: ../gpta.php');
				}
				else {
					$_SESSION['msg']=$_SESSION['msg'].'Update Failed';
					header('Location: ../add_gpta.php');
				}
			}
			else {
				header('Location: ../add_gpta.php');
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>