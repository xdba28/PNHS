<?php
//Get subject taught by teacher
	
		if(!empty($_SESSION['user_data']['acct']['emp_no'])){
			try{
			$emp_no = $_SESSION['user_data']['acct']['emp_no'];
			require 'connect.php';
			$mysqli->autocommit(false);
			$mysqli->begin_transaction();
			$result = $mysqli->query("select distinct subj.subject_id, subj.sub_desc from css_schedule sched, css_subject subj, pims_employment_records emp_rec where sched.subject_id = subj.subject_id and sched.emp_rec_id = emp_rec.emp_rec_ID and emp_rec.emp_No = '$emp_no' order by subj.sub_desc asc LOCK IN SHARE MODE");
			
			if($result && $result->num_rows > 0){
				while($row = $result->fetch_array()){
					$teacher_subject[] = $row;
				}
				$num_rows = $result->num_rows;
				foreach($teacher_subject as $key=>$teacher_subj){
					$teacher_subject[$key]['subject_id'] = base64_url_encode($teacher_subj['subject_id']);
				}
			}else {
				throw new Exception("You have no subjects!");
			}
			$result->close();
			} catch(Exception $sub_err){
				echo "Retrieving Error: " . $sub_err->getMessage();
			}
		} else {
			header("Location: ../../index.php");
		}
?>