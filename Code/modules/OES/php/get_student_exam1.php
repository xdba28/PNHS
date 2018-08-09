<?php
//Get exam contents for reviewing of exam
if(isset($_GET['id'])){
	$exam_no = base64_url_decode($_GET['id']);
	require 'connect.php';
	if(!empty($_SESSION['user_data']['acct']['lrn'])){
		$lrn = $_SESSION['user_data']['acct']['lrn'];
	} else if(!empty($_SESSION['user_data']['acct']['emp_no'])){
		$lrn = base64_url_decode($_GET['lrn']);
	} else {
		header("Location: index.php");
	}
	$get_exam = $mysqli->query("select ex.*, concat(pers.p_fname, ' ', pers.p_lname) as teacher from oes_exam ex, css_schedule sched, pims_employment_records emp_rec, pims_personnel pers, oes_exam_group ex_g where ex.exam_no = ex_g.exam_no and ex_g.sched_id = sched.sched_id and sched.emp_rec_id = emp_rec.emp_rec_id and emp_rec.emp_no = pers.emp_no and ex.exam_no = '$exam_no'");
	
	if($get_exam->num_rows > 0){
		$row = $get_exam->fetch_assoc();
		$question_per_page = $row['question_per_page'];
		$exam_title = $row['exam_title'];
		$shuffle = $row['shuffle'];
		$review = $row['exam_review'];
		$no_items = $row['no_of_items'];
		$duration = $row['exam_duration'];
		$teacher = $row['teacher'];
		$passing = $row['passing_grade'];
		$_POST['exam_no'] = $exam_no;
		require 'student_exam_contents2.php';
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
		header("location: my_subjects.php");
	}
}
?>