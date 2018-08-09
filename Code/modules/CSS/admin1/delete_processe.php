<?php
session_start(); 
include "db_conn.php";
$yr_id = $_SESSION['yr_id'];
if(!empty($_POST['sec'])){
	$sec_id = $_POST['sec'];
}
if(!empty($_POST['teach_id'])){
	$teach_id = $_POST['teach_id'];
}
else{
	$teach_id = "null";
}
if(!empty($_POST['sub_id'])){
	$sub_id = $_POST['sub_id'];
}


$query1 = mysqli_query($conn, "LOCK TABLES css_schedule WRITE");
if($teach_id=="null"){
	$query = mysqli_query($conn, "DELETE FROM css_schedule
							WHERE subject_id=$sub_id AND emp_rec_ID is NULL
							AND SECTION_ID=$sec_id");
}
else{
	$query = mysqli_query($conn, "DELETE FROM css_schedule
							WHERE subject_id=$sub_id AND emp_rec_ID=$teach_id 
							AND SECTION_ID=$sec_id");
}
$query1 = mysqli_query($conn, "UNLOCK TABLES");
if($query === false){
	echo ("<SCRIPT LANGUAGE='JavaScript'>
        	window.alert('Error: cant delete')
   		    window.location.href='edit_sched.php?yr=".$yr_id."';
            </SCRIPT>");
            die();
}
else{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
        	window.alert('Successfully Deleted')
        	window.location.href='edit_sched.php?yr=".$yr_id."';
            </SCRIPT>");
	
}
?>