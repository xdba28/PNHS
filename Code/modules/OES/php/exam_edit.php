<?php
//Edit exam details
	session_start();
	require "connect.php";
	
	$exam_no = $_POST['exam_no'];
	$emp_no = $_SESSION['user_data']['acct']['emp_no'];
	
	$result_two = $mysqli->query("select ex.*,  sect.section_name, subj.sub_desc from oes_exam ex inner join css_schedule sched on ex.sched_id = sched.SCHED_ID inner join css_section sect on sched.SECTION_ID = sect.SECTION_ID inner join css_subject subj on sched.subject_id = subj.subject_int where exam_no= '$exam_no'");
	$exam_edit = array();
	if(($det_numrow = $result_two->num_rows) == 0){
		//
	} else {
		while($row = $result_two->fetch_array()){
			$exam_password = $row['exam_password'];
			require 'pass_dec.php';
			$exam_password = $decrypted;
			$exam_edit[] = array(
				'exam_no' => $row['exam_no'],
				'exam_title' => $row['exam_title'],
				'section_name' => $row['section_name'],
				'no_items' => $row['no_of_items'],
				'duration' => $row['exam_duration'],
				'stats' => $row['exam_status'],
				'date_created' => $row['exam_dateadded'],
				'exam_password' => $exam_password,
				'exam_type' => $row['exam_type'],
				'passing' => $row['passing_grade'],
				'exam_opendate' => $row['exam_opendate'],
				'exam_closedate' => $row['exam_closedate'],
				'question_per_page' => $row['question_per_page'],
				'shuffle' => $row['shuffle'],
				'exam_subject' => $row['sub_desc'],
				'attempt' => $row['allowed_attempts']
			);
		}
							
		$result_two->close();
		echo json_encode($exam_edit);
	}
		$mysqli->close();
?>