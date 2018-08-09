<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	//echo print_r($_REQUEST); die();
	if(isset($_SESSION['user_data'])) {
			if(isset($_POST['s']) AND isset($_POST['delete_img']) AND is_array($_POST['delete_img'])) {
				$idary = $_POST['delete_img'];
				$success_no = 0;
				$fail_no = 0;
				echo '<br>1<br>';
				for($cnt=0 ; $cnt < count($idary); ++$cnt) {
					$id = $idary[$cnt];

					$dir = NULL;
					$al = $mysqli->real_escape_string($_POST['al']);
					$img_query="SELECT * FROM `cms_image` WHERE `cms_album_ID`='$al' AND `cms_image_ID`='$id';";
					$get_img = $mysqli->query($img_query);
					if($get_img) {
						while($img = $get_img->fetch_assoc()) {
							$img_name = $img['cms_image_name'];
							$alb = $img['cms_album_name'];
						}
						if(file_exists("../../uploads/docu/".$alb."/".$img_name)) {
							if(unlink("../../uploads/docu/".$alb."/".$img_name)) {
								$unlinked = true;
							}
							else {
								$unlinked = false;
							}
						}
						else {
							$unlinked = true;
						}
					}
					if(isset($unlinked) AND $unlinked==true) {
						$album_query="DELETE FROM `cms_image` WHERE `cms_image_ID`='$id';";
						$delete_album = $mysqli->query($album_query);
						if($delete_album) {
							++$success_no;
							//$_SESSION['msg']='Deleted';
							//header('Location: ../view_album.php?id='.$al);
						}
						else {
							//$_SESSION['msg']='Failed';
							//header('Location: ../view_album.php?id='.$al);
						}
					}
					else {
						++$fail_no;
						//$_SESSION['msg']='Failed';
						//header('Location: ../view_album.php?id='.$al);
					}
					//$mysqli->autocommit(TRUE);
					$num = count($idary);
					$_SESSION['msg']='Deleted '.$success_no.' / '.$num;
					header('Location: ../view_album.php?id='.$al);
				}
			}
			else {
				header('Location: ../view_album.php?id='.$al);
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>