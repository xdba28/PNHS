<?php
//Select class taught by teacher in a subject
	session_start();
	require 'func.php';
	if(isset($_POST['subject_code'])){
		$emp_no = $_SESSION['user_data']['acct']['emp_no'];
		$subject_id = base64_url_decode($_POST['subject_code']);
		
		require 'connect.php';
		$mysqli->autocommit(false);
		$mysqli->begin_transaction();
		try{
			$result = $mysqli->query("select sched.SCHED_ID, sect.SECTION_NAME from css_schedule sched, css_section sect, pims_employment_records emp_rec where sect.section_id = sched.section_id and sched.emp_rec_id = emp_rec.emp_rec_id and sched.subject_id = '$subject_id' and emp_rec.emp_No = '$emp_no' LOCK IN SHARE MODE");
			
			$class = array();
			if($result){
				while($row = $result->fetch_array()){
					$class[] = array(
						'sched_id' => $row[0],
						'section_name' => $row[1],
					);
				}
				foreach($class as $key=>$cls){
					$class[$key]['sched_id'] = base64_url_encode($cls['sched_id']);
				}
									
				$result->close();
				echo json_encode($class);
			} else {
				$mysqli->rollback();
				throw new Exception("There is an error in retrieving the classes. Please try again.");
			}
		} catch(Exception $class_err){
			echo "ERROR! " . $class_err->getMessage();
		}
		$mysqli->close();
	}
?>