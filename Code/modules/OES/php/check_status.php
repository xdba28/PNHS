<?php
//Checks status of every exam: unposted, open, or closed;

	if(isset($_POST['exam_no'])){
		$exam_no = base64_url_decode($_POST['exam_no']);
		$get_stats = $mysqli->query("select exam_status from oes_exam where exam_no = '$exam_no'");
		
		if($get_stats){
			$result = $get_stats->fetch_assoc();
			echo json_encode($result);
		}
	}

?>