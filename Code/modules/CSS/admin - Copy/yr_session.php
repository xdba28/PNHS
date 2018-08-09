<?php
session_start();
if(!empty($_GET['yr'])){
	$_SESSION['yr_id'] = $_GET['yr'];
	header("location: edit_sched.php");
}
else{
	header("location: year_level.php");
}
?>