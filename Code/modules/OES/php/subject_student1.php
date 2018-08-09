<?php
//Get the subject which the student is enrolled in
	if(!empty($_SESSION['user_data']['acct']['lrn'])){
		$lrn = $_SESSION['user_data']['acct']['lrn'];
		
		try{
			require 'connect.php';
			$result = $mysqli->query("select sched.SCHED_ID, subj.subject_id, subj.sub_desc, subj_img.img_loc, pers.emp_No, pers.P_fname, pers.P_lname from css_schedule sched inner join sis_stu_rec stu_rec on sched.SECTION_ID = stu_rec.section_id inner join pims_employment_records emp_rec on sched.emp_rec_id = emp_rec.emp_rec_ID inner join pims_personnel pers on emp_rec.emp_No = pers.emp_No inner join css_subject subj on sched.subject_id = subj.subject_id inner join oes_subject_image subj_img on sched.subject_id = subj_img.subject_id where stu_rec.lrn = '$lrn'");
			
			if($result){
				while($row = $result->fetch_array()){
					$student_subject[] = $row;
				}
				$num_rows = $result->num_rows;
				foreach($student_subject as $key=>$stud){
					$student_subject[$key]['SCHED_ID'] = base64_url_encode($stud['SCHED_ID']);
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