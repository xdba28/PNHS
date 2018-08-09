<?php
//Get exam contents for examination
if(isset($_POST['exam_no'])){
	
	
	$get_exam = $mysqli->query("select ex.*, concat(pers.p_fname, ' ', pers.p_lname) as teacher from oes_exam ex, oes_exam_group ex_g, css_schedule sched, pims_employment_records emp_rec, pims_personnel pers where ex.exam_no = ex_g.exam_no and ex_g.sched_id = sched.sched_id and sched.emp_rec_id = emp_rec.emp_rec_id and emp_rec.emp_no = pers.emp_no and ex.exam_no = '$exam_no' LOCK IN SHARE MODE");
	if($get_exam->num_rows > 0){
		$row = $get_exam->fetch_assoc();
		$question_per_page = $row['question_per_page'];
		$exam_title = $row['exam_title'];
		$shuffle = $row['shuffle'];
		$no_items = $row['no_of_items'];
		$duration = $row['exam_duration'];
		$teacher = $row['teacher'];
		$passing = $row['passing_grade'];
		$_POST['exam_no'] = $exam_no;
		require 'student_exam_contents.php';
		if($shuffle == "Yes"){
			shuffle($data);
		}
		$ct_data = count($data);
		if($question_per_page == 0){
			$question_per_page = $ct_data;
			$question_page = 1;
		} else {
			$question_page = $cont_rows / $question_per_page;
			$question_page =  ceil($question_page);
		}
		$page = 1;
	} else {
		header("Location: my_subjects.php");
	}
}
?>