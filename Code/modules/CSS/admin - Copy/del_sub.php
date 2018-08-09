<?php
session_start(); 
include "db_conn.php";

if(!empty($_POST['sub_id'])){
	$id = $_POST['sub_id'];
	$query = mysqli_query($conn, "LOCK TABLES css_subject WRITE");
	$query = mysqli_query($conn, "DELETE FROM css_subject WHERE subject_id=$id");
	$query = mysqli_query($conn, "UNLOCK TABLES");
	if($query===false){
		echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Error')
                window.location.href='subjects.php';
                </SCRIPT>");
	}
	else{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Delete successful!')
                window.location.href='subjects.php';
                </SCRIPT>");
	}
}
else{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Error')
                window.location.href='subjects.php';
                </SCRIPT>");
}

?>