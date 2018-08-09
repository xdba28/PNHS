<?php
session_start(); 
include "db_conn.php";

if(!empty($_POST['cred']) && !empty($_POST['sub_id']) && !empty($_POST['teach_id'])){
	$cred = $_POST['cred'];
	$sub = $_POST['sub_id'];
	$emp = $_POST['teach_id'];
  $query = mysqli_query($conn, "LOCK TABLES css_credentials WRITE");
  $query = mysqli_query($conn, "START TRANSACTION");
  $query = mysqli_query($conn, "SET AUTOCOMMIT = 0");
	$query = mysqli_query($conn, "DELETE FROM css_credentials WHERE emp_rec_id=$emp 
								AND subject_id=$sub AND cred_title='$cred'");
  $query = mysqli_query($conn, "COMMIT");
  $query = mysqli_query($conn, "UNLOCK TABLES");
	if($query===false){
    echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Error')
            window.location.href='assign_teacher.php';
            </SCRIPT>");
  	}
  	else
  	echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Successfuly deleted!')
            window.location.href='assign_teacher.php';
            </SCRIPT>");
	}
else{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Error')
            window.location.href='assign_teacher.php';
            </SCRIPT>");
}
?>