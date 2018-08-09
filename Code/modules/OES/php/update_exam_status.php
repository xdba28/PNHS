<?php
//Update exam status of exam based on current time and exam content
	require 'connect.php';
	$mysqli->autocommit(true);
	date_default_timezone_set("Asia/Manila");
	$current_date = date('Y-m-d H:i:s');

	$select_exam = $mysqli->query("UPDATE oes_exam SET exam_status = CASE WHEN '$current_date' < exam_opendate or no_of_items = 0 THEN 'Unposted' WHEN '$current_date' > exam_opendate and '$current_date' < exam_closedate and no_of_items > 0 THEN 'Open' ELSE 'Closed' END");
	if($select_exam){
		$mysqli->commit();
	}
	
?>