<?php
	require 'connect.php';
	$mysqli->autocommit(false);
	$no_img = $mysqli->query("select sub.subject_id from css_subject sub where sub.subject_id not in (select img.subject_id from oes_subject_image img) order by sub.subject_id asc");
	if($no_img){
		if($no_img->num_rows > 0){
			while($img = $no_img->fetch_array()){
				$sub_id[] = $img;
			}
			foreach($sub_id as $sub){
				$subj_id = $sub['subject_id'];
				$ins_img = $mysqli->query("insert into oes_subject_image(img_id,subject_id,img_loc) values(NULL,'$subj_id','img/subject-img/no-image.jpg')");
				if($ins_img){
					$mysqli->commit();
				} else {
					$mysqli->rollback();
				}
			}
			print_r($sub_id);
		}
	}
?>