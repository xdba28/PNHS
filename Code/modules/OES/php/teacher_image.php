<?php
	require 'connect.php';
	$sched_id = $_GET['scid'];
	$get_img = $mysqli->query("select pers.P_picture, pers.pims_image_type from pims_personnel pers, pims_employment_records emp_rec, css_schedule sched where sched.emp_rec_id = emp_rec.emp_rec_id and emp_rec.emp_no = pers.emp_no and sched.sched_id = '$sched_id' group by sched.SCHED_ID LOCK IN SHARE MODE");
	
	if($get_img && $get_img->num_rows > 0){
		$img = $get_img->fetch_assoc();
		$img_datatype = $img['pims_image_type'];
		$img_data = $img['P_picture'];
		header("Content-type: " . $img_datatype);
		echo $img_data;
	}
?>