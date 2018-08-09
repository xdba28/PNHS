<?php
	session_start();
	if(isset($_POST['subject_code'])){
		require 'connect.php';
		require 'func.php';
		$subject_code = base64_url_decode($_POST['subject_code']);
		
		$sel_ex = $mysqli->query("select distinct(ex_g.exam_no) from oes_exam_group ex_g, css_schedule sched where sched.sched_id = ex_g.sched_id and sched.subject_id = '$subject_code' order by ex_g.exam_no asc LOCK IN SHARE MODE");
		if($sel_ex){
			if($sel_ex->num_rows > 0){
				while($exams = $sel_ex->fetch_array()){
					$exam_det[] = $exams;
				}
				$data = array();
				foreach($exam_det as $ex_sel){
					
					$exam_no = $ex_sel['exam_no'];
					$exam = $mysqli->query("select ex.exam_no, ex.exam_title, SUM(res.result_remarks = 'Passed!') AS no_passed, SUM(res.result_remarks = 'Failed.') AS no_failed, SUM(res.exam_no = '$exam_no') AS no_taker from oes_exam ex, oes_exam_result res where ex.exam_no = res.exam_no and ex.exam_no = '$exam_no' LOCK IN SHARE MODE");
					if($exam){
						if($exam->num_rows > 0){
							$ex = $exam->fetch_assoc();
							$ex_no = base64_url_encode($ex['exam_no']);
							if($ex['no_passed'] == NULL){
								$ex['no_passed'] = 0;
							}
							if($ex['no_failed'] == NULL){
								$ex['no_failed'] = 0;
							}
							if($ex['no_taker'] == NULL){
								$ex['no_taker'] = 0;
							}
							$ex_title = $ex['exam_title'];
							$ex_title = $mysqli->escape_string($ex_title);
							$data[] = array(
								"exam_no" => $ex_no,
								"exam_title" => $ex_title,
								"no_passed" => $ex['no_passed'],
								"no_failed" => $ex['no_failed'],
								"no_taker" => $ex['no_taker']
							);
						}
					}
				}
				echo json_encode($data);
			}
		}
	}else if(isset($_POST['sched_id']) && isset($_POST['exam_no'])){
		require 'connect.php';
		require 'func.php';
		$sched_id = base64_url_decode($_POST['sched_id']);
		$exam_no = base64_url_decode($_POST['exam_no']);
		$get_lrn = $mysqli->query("select res.*, concat(stud.stu_fname, ' ', stud.stu_lname) as student_name, sect.section_name from oes_exam_result res, oes_exam_group ex_g, css_schedule sched, sis_stu_rec stu_rec, sis_student stud, css_section sect where res.exam_no = ex_g.exam_no and ex_g.sched_id = sched.sched_id and sched.section_id = stu_rec.section_id and sched.section_id = sect.section_id and res.lrn = stu_rec.lrn and stu_rec.lrn = stud.lrn and res.exam_no = '$exam_no' and ex_g.sched_id = '$sched_id' LOCK IN SHARE MODE");
		if($get_lrn->num_rows > 0){
			while($row = $get_lrn->fetch_array()){
				$res[] = $row;
			}
			
			foreach($res as $get_res){
				$lrn = $get_res['lrn'];
				
				$stud_name = $get_res['student_name'];
				$stud_name = $mysqli->escape_string($stud_name);
				
				$stud_sect = $get_res['section_name'];
				$stud_sect = $mysqli->escape_string($stud_sect);
				
					$exam_score = $get_res['exam_score'];
					$exam_equiv = $get_res['equivalent_grade'];
					$exam_equiv = number_format($exam_equiv,2,".",",");
					$exam_remark = $get_res['result_remarks'];
					$exam_datetime = $get_res['exam_datetime'];
					$exam_datetime = explode(" ", $exam_datetime);
					$examdate = $exam_datetime[0];
					$examdate = date('F d, Y', strtotime($examdate));
					$examtime = $exam_datetime[1];
					$examtime = date('h:iA', strtotime($examtime));
                    $examtaken = $examdate . " " . $examtime;
					$exam_status = 'Finished';
					$lrn = base64_url_encode($lrn);
					
				
				$data[] = array(
					'lrn' => $lrn,
					'student_name' => $stud_name,
					'stud_sect' => $stud_sect,
					'exam_score' => $exam_score,
					'exam_equiv' => $exam_equiv,
					'exam_remark' => $exam_remark,
					'examtaken' => $examtaken,
					'exam_status' => $exam_status
				);
				usort($data, function($a, $b) {
					return $a["student_name"] <= $b["student_name"];
				});
			}
			echo json_encode($data);
		}
	}else if(isset($_POST['exam_no'])){
		require 'connect.php';
		require 'func.php';
		$exam_no = base64_url_decode($_POST['exam_no']);
		$sel_res = $mysqli->query("select res.*, concat(stud.stu_fname, ' ', stud.stu_lname) as student_name, sect.section_name, sched.sched_id from oes_exam_result res, oes_exam_group ex_g, css_schedule sched, sis_stu_rec stu_rec, sis_student stud, css_section sect where res.exam_no = ex_g.exam_no and ex_g.sched_id = sched.sched_id and sched.section_id = stu_rec.section_id and sched.section_id = sect.section_id and res.lrn = stu_rec.lrn and stu_rec.lrn = stud.lrn and res.exam_no = '$exam_no' order by student_name asc LOCK IN SHARE MODE");
		if($sel_res){
			if($sel_res->num_rows > 0){
				while($res = $sel_res->fetch_array()){
					$result[] = $res;
				}
				$data = array();
				foreach($result as $res_result){
					$exam_datetime = $res_result['exam_datetime'];
					$exam_datetime = explode(" ", $exam_datetime);
					$examdate = $exam_datetime[0];
					$examdate = date('F d, Y', strtotime($examdate));
					$examtime = $exam_datetime[1];
					$examtime = date('h:iA', strtotime($examtime));
                    $examtaken = $examdate . " " . $examtime;
					$lrn = base64_url_encode($res_result['lrn']);
					$sched_id = base64_url_encode($res_result['sched_id']);
					$equiv = $res_result['equivalent_grade'];
					$equiv = number_format($equiv,2,".",",");
					$stud_name = $res_result['student_name'];
					$stud_name = $mysqli->escape_string($stud_name);
					$stud_sect = $res_result['section_name'];
					$stud_sect = $mysqli->escape_string($stud_sect);
					
					
					$data[] = array(
					'lrn' => $lrn,
					'student_name' => $stud_name,
					'stud_sect' => $stud_sect,
					'sched_id' => $sched_id,
					'exam_score' => $res_result['exam_score'],
					'exam_equiv' => $equiv,
					'exam_remark' => $res_result['result_remarks'],
					'examtaken' => $examtaken
					);
				}
				echo json_encode($data);
				
			}
		}
		
	}
	
?>