<?php
	
	if(isset($_POST['sched_id'])){
		require 'connect.php';
		require 'func.php';
		$sched_id = base64_url_decode($_POST['sched_id']);

		$exam_type = $mysqli->query("select ex.* from oes_exam ex, oes_exam_group ex_g where ex.exam_no = ex_g.exam_no and ex_g.sched_id = '$sched_id'");
		$type = array();
		if($exam_type->num_rows > 0){
			while($row = $exam_type->fetch_array()){
				$type[] = array(
					'exam_no' => $row['exam_no'],
					'exam_title' => $row['exam_title'],
					'exam_type' => $row['exam_type']
				);
			}
			foreach($type as $key=>$ty){
				$type[$key]['exam_no'] = base64_url_encode($ty['exam_no']);
			}
			echo json_encode($type);
		}
	}

?>