<?php
	session_start();
	require 'connect.php';
	require 'func.php';
	if(isset($_POST['exam_no']) && !empty($_SESSION['user_data']['acct']['emp_no'])){
		$exam_no = base64_url_decode($_POST['exam_no']);
		$emp_no = $_SESSION['user_data']['acct']['emp_no'];
		
		$get_exam = $mysqli->query("select distinct ex.exam_type, subj.sub_desc from oes_exam ex, oes_exam_group ex_g, css_schedule sched, css_subject subj where ex.exam_no = ex_g.exam_no and ex_g.sched_id = sched.SCHED_ID and sched.subject_id = subj.subject_id and ex.exam_no = '$exam_no'");
		$get_teacher = $mysqli->query("select concat(p_fname, ' ' , p_mname, ' ', p_lname) as teacher_name from pims_personnel where emp_no = '$emp_no'");
		
		if($get_exam && $get_teacher){
			if($get_exam->num_rows > 0 && $get_teacher->num_rows > 0){
				$data = array();
				$exam_row = $get_exam->fetch_assoc();
				$teacher_row = $get_teacher->fetch_assoc();
				$data = array(
					"teacher_name" => $teacher_row['teacher_name'],
					"exam_type" => $exam_row['exam_type'],
					"subject_name" => $exam_row['sub_desc']
				);
				echo json_encode($data);
			}
		}
	}
?>