<?php
//Select password of an exam
if(isset($_POST['exam_no'])){
	require 'connect.php';
	require 'func.php';
	$exam_no = base64_url_decode($_POST['exam_no']);
	
	$result = $mysqli->query("select exam_password from oes_exam where exam_no = '$exam_no'");
	$data = array();
	if($result){
		$res = $result->fetch_assoc();
		$exam_password = $res['exam_password'];
	}
	require 'pass_dec.php';
	$exam_password = $decrypted;
	

	echo  $exam_password;
	$mysqli->close();
}
?>