<?php
//Display exam details
	session_start();
	if(isset($_POST['subject_code'])){
		require "connect.php";
		require 'func.php';
		$subject_id = base64_url_decode($_POST['subject_code']);
		$emp_no = $_SESSION['user_data']['acct']['emp_no'];
		try{
			$get_group = $mysqli->query("select ex.*,  sect.section_name, subj.subject_id from oes_exam_group ex, css_schedule sched, pims_employment_records emp_rec, css_section sect, css_subject subj where ex.sched_id = sched.sched_id and sched.emp_rec_id = emp_rec.emp_rec_id and sched.section_id = sect.section_id and sched.subject_id = subj.subject_id and emp_rec.emp_No = '$emp_no' and sched.subject_id = '$subject_id' order by ex.exam_no asc");
			$data = array();
			if($get_group){
				if($get_group->num_rows > 0){
					while($row_group = $get_group->fetch_array()){
						$exam_group[] = $row_group;
					}
					$ex_no = array();
					foreach($exam_group as $ex){
						$exam_no = $ex['exam_no'];
						if (!in_array($exam_no, $ex_no)) {
							$ex_no[] = $exam_no;
						}
					}
					foreach($ex_no as $ex_n){
						$exam_no = $ex_n;
						$get_exam = $mysqli->query("select * from oes_exam where exam_no = '$exam_no' LOCK IN SHARE MODE");
							while($row_exam = $get_exam->fetch_array()){
								$exam[] = $row_exam;
							}
					}
					function decrypt($exam_password){
						$input = $exam_password;

							$cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
							$qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $input ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
						return $qDecoded;
					}
					
					foreach($exam as $exam_ex){
						$exam_no = $exam_ex['exam_no'];
						$class = '';
						$sched_id = '';
						$subject_id = '';
						foreach($exam_group as $ex_g){
							
							if($exam_no == $ex_g['exam_no']){
								$class = $ex_g['section_name'] .",". $class;
								$sched_id = base64_url_encode($ex_g['sched_id']).",". $sched_id;
								$subject_id = base64_url_encode($ex_g['subject_id']);
							}
						}
						$exam_password = $exam_ex['exam_password'];
						$exam_password = decrypt($exam_password);
						$startdate = $exam_ex['exam_opendate'];
						$enddate = $exam_ex['exam_closedate'];
						
						$opendate = explode(" ", $startdate);
						$closedate = explode(" ", $enddate);
						$startdate = $opendate[0];
						$startdate = date('F d, Y', strtotime($startdate));
						$starttime = $opendate[1];
						$starttime = date('h:iA', strtotime($starttime));
						$enddate = $closedate[0];
						$enddate = date('F d, Y', strtotime($enddate));
						$endtime= $closedate[1];
						$endtime = date('h:iA', strtotime($endtime));
						$data[] = array(
							'exam_no' => $exam_no,
							'exam_title' => $exam_ex['exam_title'],
							'no_items' => $exam_ex['no_of_items'],
							'duration' => $exam_ex['exam_duration'],
							'stats' => $exam_ex['exam_status'],
							'date_created' => $exam_ex['exam_dateadded'],
							'exam_password' => $exam_password,
							'exam_type' => $exam_ex['exam_type'],
							'passing' => $exam_ex['passing_grade'],
							'startdate' => $startdate,
							'starttime' => $starttime,
							'enddate' => $enddate,
							'endtime' => $endtime,
							'question_per_page' => $exam_ex['question_per_page'],
							'shuffle' => $exam_ex['shuffle'],
							'exam_subject' => $subject_id,
							'sched_id' => $sched_id,
							'section_name' => $class,
							'exam_review' => $exam_ex['exam_review']
						);
						
						
						
						
					}
					foreach($data as $key=>$dat){
						$data[$key]['exam_no'] = base64_url_encode($dat['exam_no']);
					}
					echo json_encode($data);
				}
			}else {
				$mysqli->rollback();
				throw new Exception("There is an error in retrieving the exams. Please try again.");
			}
		} catch(Exception $exam_err){
			echo "Retrieving Error! " . $exam_err->getMessage();
		}
		$mysqli->close();
	}
?>