<?php
	if(isset($_GET['id'])){
		require 'connect.php';
		$exam_no = $_GET['id'];
		$lrn = $_SESSION['user_data']['acct']['lrn'];
		
		$mysqli->autocommit(false);
		$get_ans = $mysqli->query("select ans.* from oes_exam_answer ans, oes_exam_content cont where cont.content_no = ans.content_no and lrn = '$lrn' and exam_no = '$exam_no' order by ans.answer_no asc LOCK IN SHARE MODE");
		
	if($get_ans->num_rows > 0){
		while($row = $get_ans->fetch_array()){
			$answer[] = $row;
		}
		
	}
	
}
?>