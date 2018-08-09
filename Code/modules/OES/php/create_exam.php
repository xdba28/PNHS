<?php
//Creates exam
	session_start();
	if(isset($_POST['submit_btn'])){
		try{
			require 'connect.php';
			require 'func.php';
		} catch(Exception $con){
			echo "Error:" . $con->getMessage();
		}
		$emp_no = $_SESSION['user_data']['acct']['emp_no'];
		$exam_name = $mysqli->escape_string($_POST['exam_name']);
		$no_items = $mysqli->escape_string($_POST['no_items']);
		date_default_timezone_set("Asia/Manila");
		$duration = $_POST['duration'];
		$passing = $mysqli->escape_string($_POST['passing']);
		$subject_code = base64_url_decode($_POST['exam_create_subject']);
		$emp_no = $_SESSION['user_data']['acct']['emp_no'];
		$exam_type = $_POST['exam_type'];
		$exam_password = $mysqli->escape_string($_POST['password']);
		require 'pass_enc.php';
		$exam_password = $encrypted;
		
		$start_time =  date("H:i", strtotime($_POST['starttime']));
		$start_date = date('Y-m-d', strtotime($_POST['startdate']));
		$end_time =  date("H:i", strtotime($_POST['endtime']));
		$end_date = date('Y-m-d', strtotime($_POST['enddate']));
		
		$start_datetime = $start_date . " " . $start_time;
		$end_datetime = $end_date . " " . $end_time;
		
		$current_date = date("Y-m-d");
		$question_per_page = $_POST['question_per_page'];
		$shuffle = $_POST['shuffle'];
		$review = $_POST['review'];
		try{
			$result = $mysqli->query("INSERT INTO `oes_exam` (`exam_no`, `exam_title`, `exam_type`, `exam_duration`, `exam_status`, `exam_dateadded`, `exam_password`,  `passing_grade`, `exam_opendate`, `exam_closedate`, `question_per_page`, `shuffle`, `no_of_items`,exam_review) VALUES (NULL, '$exam_name', '$exam_type', '$duration', 'Unposted', '$current_date', '$exam_password', '$passing', '$start_datetime', '$end_datetime', '$question_per_page', '$shuffle', '$no_items', '$review')");
			echo $exam_no = $mysqli->insert_id;
			if($result){
				$mysqli->commit();
				
			} else {
				$mysqli->rollback();
			}
		
		
			foreach($_POST['exam_create_class'] as $class){
				$class = base64_url_decode($class);
				$mysqli->autocommit(FALSE);
				$mysqli->begin_transaction();
				try {
					$insert_sched = $mysqli->query("Insert into oes_exam_group(exam_no, sched_id) values ('$exam_no','$class')");
								
					if($result){
						$mysqli->commit();
						echo "<script>
							alert('Exam is created!');
							</script>";
						header('Location: ../exam.php?tab=2');
					} else {
						$mysqli->rollback();
						throw new Exception("There is an error in creating a new exam. Please try again.");
					}
				} catch(Exception $ins_err){
					echo "Create Error: " . $ins_err->getMessage();
				}
			}
		}catch(Excaption $err){
			echo "Creating Exam Error: " . $err->getMessage();
		}
	}
	
?>