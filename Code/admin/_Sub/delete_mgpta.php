<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	if(isset($_SESSION['user_data'])) {
			if(!isset($_POST['delete_gpta']) and empty($_POST['delete_gpta'])) {
				$_SESSION['msg']='Must Select Content.';
				header('Location: ../gpta.php');
			}
			else if(isset($_POST['s']) AND isset($_POST['delete_gpta']) AND is_array($_POST['delete_gpta'])) {
				$idary = $_POST['delete_gpta'];
				$success_no = 0;
				$fail_no = 0;
				echo '<br>1<br>';
				for($cnt=0 ; $cnt < count($idary); ++$cnt) {
					$id = $idary[$cnt];
					$mysqli->autocommit(FALSE);
					$mysqli->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
					$news_query="DELETE FROM `cms_gpta` WHERE `cms_gpta`.`cms_gpta_ID` = '$id';";
					$delete_news = $mysqli->query($news_query);
					if($delete_news) {
						$mysqli->commit();
						++$success_no;
					}
					else {
						$mysqli->rollback();
						++$fail_no;
					}
				}
				$mysqli->autocommit(TRUE);
				$num = count($idary);
				$_SESSION['msg']='Deleted '.$success_no.' Achievement(s)';
				header('Location: ../gpta.php');
			}
			else {
				$_SESSION['msg']='Failed to delete '.$success_no.' Achievement(s)';
				header('Location: ../gpta.php');
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>