<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	if(isset($_SESSION['user_data'])) {
			//echo print_r($_REQUEST); die();
			if(isset($_POST['s']) AND isset($_POST['delete_news']) AND is_array($_POST['delete_news'])) {
				$idary = $_POST['delete_news'];
				$success_no = 0;
				$fail_no = 0;
				echo '<br>1<br>';
				for($cnt=0 ; $cnt < count($idary); ++$cnt) {
					$id = $idary[$cnt];
					//echo print_r($idary); die();
					$fd_dir =  NULL;
					$news_query="SELECT * FROM `cms_news` WHERE `cms_news_ID` = '$id';";
					$get_news = $mysqli->query($news_query);
					while($news = $get_news->fetch_assoc()) {
						$fd_dir = $news['cms_news_img_dir'];
					}
					$mysqli->autocommit(FALSE);
					$mysqli->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
					echo '<br>2<br>';
					$news_query="DELETE FROM `cms_news` WHERE `cms_news_ID`='$id';";
					$delete_news = $mysqli->query($news_query);
					if(!empty($fd_dir)) {
						if(file_exists("../../uploads/".$fd_dir)) {
							if(unlink("../../uploads/".$fd_dir)) {
								$unlinked = true;
								echo '<br>3<br>';
							}
							else {
								$unlinked = false;
								echo '<br>4<br>';
							}
						}
						else {
							$unlinked = true;
						}
					}
					else {
						$no_img = true;
					}
					if(((isset($unlinked) AND $unlinked==true) OR $no_img) AND $delete_news AND $get_news) {
						echo '<br>5<br>';
						$mysqli->commit();
						++$success_no;
					}
					else {
						echo '<br>6<br>';
						$mysqli->rollback();
						++$fail_no;
					}
					/*
					if(($delete_news AND isset($unlinked) AND $unlinked==true) OR ($delete_news AND isset($no_img) AND $no_img==true)) {
						$mysqli->commit();
						$mysqli->autocommit(TRUE);
						$_SESSION['msg']='Deleted';
						//header('Location: ../news.php');
					}
					else {
						$mysqli->rollback();
						$mysqli->autocommit(TRUE);
						$_SESSION['msg']='Failed';
						//header('Location: ../news.php');
					}*/
				}
				//$mysqli->commit();
				$mysqli->autocommit(TRUE);
				$num = count($idary);
				$_SESSION['msg']='Deleted '.$success_no.' / '.$num;
				header('Location: ../news.php');
			}
			else {
				header('Location: ../news.php');
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>