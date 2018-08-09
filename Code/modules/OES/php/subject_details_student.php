<?php
//Get details of an exam
	if(isset($_GET['scid'])){
		require 'connect.php';
		$sched_id = base64_url_decode($_GET['scid']);
		$lrn = $username = $_SESSION['user_data']['acct']['lrn'];
		try{
			
			$result = $mysqli->query("select sched.*, sect.section_name, subj.sub_desc,subj.subject_name, pers.emp_No, pers.P_fname, pers.P_lname from css_schedule sched, css_subject subj, pims_employment_records emp_rec, pims_personnel pers, css_section sect where sched.emp_rec_id = emp_rec.emp_rec_id and emp_rec.emp_no = pers.emp_no and sched.subject_id = subj.subject_id and sched.section_id = sect.section_id and sched.sched_id = '$sched_id' group by sched.SCHED_ID LOCK IN SHARE MODE");
			
			if(($det_rows = $result->num_rows) > 0){
				while($row = $result->fetch_array()){
					$subject_details[] = $row;
				}
			}
			else {
				header("location: my_subjects.php");
			}
			$result->close();
			//
			$result = $mysqli->query("select ex.* from oes_exam ex, oes_exam_group ex_g where ex.exam_no = ex_g.exam_no and ex_g.sched_id = '$sched_id' and ex.exam_status ='Open' order by exam_opendate desc");
			
			if(($exam_row = $result->num_rows) > 0){
				while($row = $result->fetch_array()){
					$exam[] = $row;
				}
				$ex_state = array();
				foreach($exam as $ex){
					if($ex['exam_status'] == "Open"){
						$exam_no = $ex['exam_no'];
						$get_ans = $mysqli->query("select * from oes_exam_result where exam_no = '$exam_no' and lrn = '$lrn'");
						if($get_ans->num_rows == 1){
							$exam_state = 'View Result';
							
						} else{
							$exam_state = 'Start Exam';
						}
					}
					$ex_state[] = $exam_state;
				}
				foreach($exam as $key=>$ex){
					$ex['exam_no'] = base64_url_encode($ex['exam_no']);
					$ex[0] = $ex['exam_no'];
					$ex1 = array_slice($ex, 0, 16);
					$ex = array_slice($ex, 18, 10);
					$ex = array_merge($ex1, $ex);
					$exam[$key] = $ex;
					array_push($exam[$key], $ex_state[$key]);
				}
				usort($exam, function($a, $b) {
					return $a[12] >= $b[12];
				});
			}
			$result->close();
			
			
		}catch(Exception $sub_err){
			echo "<script>alert('Retrieving Error:' + ".$sub_err->getMessage().")</script>";
		}
	} else {
		header("Location: my_subjects.php");
	}
?>