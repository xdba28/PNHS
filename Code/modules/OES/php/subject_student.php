<?php
//Get the subject which the student is enrolled in
	if(!empty($_SESSION['user_data']['acct']['lrn'])){
		$lrn = $_SESSION['user_data']['acct']['lrn'];
		
		try{
			require 'connect.php';
			$result = $mysqli->query("select sched.SCHED_ID, subj.subject_id, subj.sub_desc, pers.emp_No, pers.P_fname, pers.P_lname from css_schedule sched, css_subject subj, pims_employment_records emp_rec, pims_personnel pers, sis_stu_rec stu_rec where sched.section_id = stu_rec.section_id and sched.emp_rec_id = emp_rec.emp_rec_id and emp_rec.emp_no = pers.emp_no and sched.subject_id = subj.subject_id and stu_rec.lrn = '$lrn' order by subj.sub_desc asc LOCK IN SHARE MODE");
			
			if($result){
				$result_rows = $result->num_rows;
				if($result_rows > 0){
					while($row = $result->fetch_array()){
						$student_subject[] = $row;
					}
					foreach($student_subject as $key=>$stud){
						$student_subject[$key]['SCHED_ID'] = base64_url_encode($stud['SCHED_ID']);
					}
				}
			}
			else {
				throw new Exception("There is an error in retrieving the subjects. Please try again.");
			}
		} catch(Exception $sub_err){
			echo "Retrieving Error: " . $sub_err->getMessage();
		}
		$result->close();
	}
?>