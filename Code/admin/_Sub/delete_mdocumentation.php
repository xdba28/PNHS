<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	//print '<pre>' . htmlspecialchars(print_r(get_defined_vars(), true)) . '</pre>'; die();
	if(isset($_SESSION['user_data'])) {
			if(!isset($_POST['delete_doc']) and empty($_POST['delete_doc'])) {
				$_SESSION['msg']='Must Select Album.';
				header('Location: ../documentation.php');
			}
			else if(isset($_POST['s']) AND isset($_POST['delete_doc']) AND is_array($_POST['delete_doc'])) {
				$idary = $_POST['delete_doc'];
				$success_no = 0;
				$fail_no = 0;
				for($cnt=0 ; $cnt < count($idary); ++$cnt) {
					$id = $idary[$cnt];
					$album_query="SELECT * FROM `cms_album` WHERE `cms_album_ID`='$id';";
					$get_album = $mysqli->query($album_query);
					if($get_album) {
						if($get_album->num_rows > 0) {
							while($album = $get_album->fetch_assoc()) {
								$album_name = $album['cms_album_folder'];
							}
							$doc_query="SELECT * FROM `cms_image` WHERE `cms_album_ID`='$id';";
							$get_doc = $mysqli->query($doc_query);
							$cnt=0;
							$img_del = array();
							while($doc = $get_doc->fetch_assoc()) {
								$imgid = $doc['cms_image_ID'];
								$id = $doc['cms_album_ID'];
								$name = $doc['cms_image_name'];
								$alb = $doc['cms_album_name'];
								$dir = $doc['cms_image_dir'];
								$date = dateFormat($doc['cms_image_date']);
								$cap = $doc['cms_img_cap'];
								if(file_exists("../../uploads/docu/".$album_name."/".$name)) {
									if(unlink("../../uploads/docu/".$album_name."/".$name)) {
										$img_del[$cnt] = true;
									}
									else {
										$img_del[$cnt] = false;
									}
								}
								else {
									$img_del[$cnt] = true;
								}
								++$cnt;
							}
							for($cnt=0; $cnt<count($img_del); ++$cnt) {
								if($img_del[$cnt]==true) {
									++$suc;
								}
								else if($img_del[$cnt]==true) {
									++$fail;
								}
							}
							if($suc == count($img_del)) {
								if(file_exists("../../uploads/docu/".$album_name)) {
									if(rmdir("../../uploads/docu/".$album_name)) {
										$isrmdir = true;
									}
									else {
										$isrmdir = false;
									}
								}
							}
						}
						else {
							if(file_exists("../../uploads/docu/".$album_name)) {
								if(rmdir("../../uploads/docu/".$album_name)) {
									$isrmdir = true;
								}
								else {
									$isrmdir = false;
								}
							}
							else {
								$isrmdir = true;
							}
						}
					}
					if(isset($isrmdir) AND $isrmdir==true) {
						$del_album_query="DELETE FROM `cms_album` WHERE `cms_album`.`cms_album_ID` = '$id';";
						$delete_album = $mysqli->query($del_album_query);
						if($delete_album) {
							++$success_no;
							//$_SESSION['msg']='Deleted';
							//header('Location: ../documentation.php');
						}
					}
					else {
						++$fail_no;
					}
				}
				//$mysqli->commit();
				//$mysqli->autocommit(TRUE);
				$num = count($idary);
				$_SESSION['msg']='Deleted '.$success_no.' Album(s)';
				header('Location: ../documentation.php');
			}
			else {
				$_SESSION['msg']='Failed to delete '.$success_no.' Album(s)';
				header('Location: ../documentation.php');
			}
	}
	else {
		header('Location: ../../index.php');
	}
	//print '<pre>' . htmlspecialchars(print_r(get_defined_vars(), true)) . '</pre>';
?>