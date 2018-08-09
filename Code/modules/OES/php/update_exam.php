<?php
//Update exam details
	session_start();
	if(isset($_POST['edit_save_btn'])){
		try{
			require 'connect.php';
			require 'func.php';
		} catch(Exception $con){
			 "Error:" . $con->getMessage();
		}
		$mysqli->autocommit(false);
		$mysqli->begin_transaction();
		
		$exam_no = base64_url_decode($_POST['exam_no']);
		 $exam_name = $mysqli->escape_string($_POST['edit_exam_name']);
		date_default_timezone_set("Asia/Manila");
		 $duration = $_POST['edit_duration'];
		 $passing = $mysqli->escape_string($_POST['edit_passing']);
		 $emp_no = $_SESSION['user_data']['acct']['emp_no'];
		 $exam_type = $_POST['exam_edit_type'];
		 $exam_password = $mysqli->escape_string($_POST['edit_password']);
		require 'pass_enc.php';
		$exam_password = $encrypted;
		
		$start_time =  date("H:i", strtotime($_POST['edit_starttime']));
		$start_date = date('Y-m-d', strtotime($_POST['edit_startdate']));
		$end_time =  date("H:i", strtotime($_POST['edit_endtime']));
		$end_date = date('Y-m-d', strtotime($_POST['edit_enddate']));
		
		 $start_datetime = $start_date . " " . $start_time;
		 $end_datetime = $end_date . " " . $end_time;
		
		 $question_per_page = $_POST['edit_question_per_page'];
		 $shuffle = $_POST['edit_shuffle'];
		 $review = $_POST['edit_review'];
		
		try{
			$search = $mysqli->query("select * from oes_exam where exam_no = '$exam_no' FOR UPDATE");
			$update = $mysqli->query("UPDATE oes_exam set exam_title = '$exam_name', exam_type = '$exam_type', exam_duration = '$duration', exam_password='$exam_password', passing_grade='$passing', exam_opendate='$start_datetime', exam_closedate='$end_datetime', question_per_page='$question_per_page', shuffle='$shuffle', exam_review='$review' where exam_no = '$exam_no'");
			if($update && $search){
				$del_group = $mysqli->query("delete from oes_exam_group where exam_no = '$exam_no'");
				if($del_group){
					foreach($_POST['edit_class'] as $class){
						
						$class = base64_url_decode($class);
						$ins_class = $mysqli->query("INSERT into oes_exam_group(exam_no,sched_id) values('$exam_no', '$class')");
						if($ins_class){
							$mysqli->commit();
							header('Location: ../exam.php?tab=2');
						} else {
							$mysqli->rollback();
						}
					}
				}
				
			} else {
				$mysqli->rollback();
				throw new Exception("There's an error in updating the exam. Please try again.");
			} 
		} catch(Exception $up_err){
			 "Error! " . $up_err->getMessage();
		}
		
	}
	
?>