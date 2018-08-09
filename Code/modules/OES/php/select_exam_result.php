<?php
//Display result of student in an exam only if it is still open.
	if(isset($_POST['exam_no']) && isset($_POST['sched_id'])){
		require 'connect.php';
		require 'func.php';
		$exam_no = base64_url_decode($_POST['exam_no']);
		$sched_id = base64_url_decode($_POST['sched_id']);
		$get_lrn = $mysqli->query("SELECT stud.lrn, concat(stud.stu_fname, ' ', stud.stu_lname) as student_name, section_name from sis_student stud, sis_stu_rec stu_rec, css_schedule sched, css_section sect where sched.section_id = stu_rec.section_id and sched.sy_id = stu_rec.sy_id and  sect.section_id = sched.section_id and stu_rec.lrn = stud.lrn and sched.SCHED_ID = '$sched_id'");
		$result = array();
		if($get_lrn->num_rows > 0){
			while($row = $get_lrn->fetch_array()){
				$res[] = $row;
			}
			
			foreach($res as $get_res){
				$lrn = $get_res['lrn'];
				$stud_name = $get_res['student_name'];
				$stud_sect = $get_res['section_name'];
				$exam_score = '';
				$exam_equiv = '';
				$exam_remark = '';
				
				$get_result = $mysqli->query("Select * from oes_exam_result where lrn = '$lrn' and exam_no = '$exam_no'");
				
				if($get_result->num_rows > 0){
					$rows = $get_result->fetch_assoc();
					$exam_score = $rows['exam_score'];
					$exam_equiv = $rows['equivalent_grade'];
					$exam_remark = $rows['result_remarks'];
					$exam_status = 'Finished';
				} else {
					$exam_score = 'N/A';
					$exam_equiv = 'N/A';
					$exam_remark = 'N/A';
					$exam_status = 'Not Finished';
				}
				$result[] = array(
					'lrn' => $lrn,
					'student_name' => $stud_name,
					'stud_sect' => $stud_sect,
					'exam_score' => $exam_score,
					'exam_equiv' => $exam_equiv,
					'exam_remark' => $exam_remark,
					'exam_status' => $exam_status
				);
			}
			echo json_encode($result);
		}
	}
?>