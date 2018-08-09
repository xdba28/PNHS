<?php
	$exam_no = $_GET['exam'];
	$_POST['exam_no'] = $exam_no;
	$_GET['returnurl']=$_GET['returnurl'];
	header("Location: ../student_exam.php");
?>