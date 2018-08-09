<?php
	session_start();
	if(isset($_POST['sched_id'])){
		require 'connect.php';
		require 'func.php';
		$sched_id = base64_url_decode($_POST['sched_id']);
		$mysqli->autocommit(false);
		$sel_sy = $mysqli->query("select sect.year_level, sect.section_name, sy.year from css_schedule sched, css_section sect, css_school_yr sy where sched.section_id = sect.SECTION_ID and sched.sy_id = sy.sy_id and sched.SCHED_ID = '$sched_id'");
		if($sel_sy && $sel_sy->num_rows > 0){
			while($row = $sel_sy->fetch_assoc()){
				$sel_det[] = $row;
			}
			$data = array();
			$data = array(
				"section_name" => $sel_det[0]['section_name'],
				"year_level" => $sel_det[0]['year_level'],
				"school_year" => $sel_det[0]['year']
			);
			echo json_encode($data);
		}
	}

?>