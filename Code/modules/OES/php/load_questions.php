<?php
//Load all questions of subject
	require 'connect.php';
	
	$subject_id = $_POST['subject_id'];
	
	$load_ques = $mysqli->query("select ques.* from oes_question_bank ques, css_schedule sched where ques.sched_id = sched.SCHED_ID and sched.subject_id = '$subject_id'");
	
	if($load_ques->num_rows > 0){
		$data = array();
		while($ques_row = $load_ques->fetch_array()){
			$ques_bnk[] = $ques_row;
		}
		foreach($ques_bnk as $ques_load){
			$data[] = array(
				'$question_no' ->$ques_load['question_no'];
				)
		}
	} else {
		echo "bye";
	}
?>