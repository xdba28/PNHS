<?php
session_start();
if(isset($_POST['attempt_exam_btn'])){
	$exam_no = $_POST['exam_no'];
	
	require 'load_exam_content.php';
	
}
?>