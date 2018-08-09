<?php
session_start(); 
include "db_conn.php";

if(!empty($_POST['cred']) && !empty($_POST['sub_id']) && !empty($_POST['teach_id'])){
	$cred = $_POST['cred'];
	$sub = $_POST['sub_id'];
	$emp = $_POST['teach_id'];

  $sql_query = mysqli_query($conn, "SELECT subject_name FROM css_credentials, css_subject, pims_employment_records
                              WHERE css_subject.subject_id=css_credentials.subject_id
                              AND css_credentials.emp_rec_id = pims_employment_records.emp_rec_id AND css_credentials.emp_rec_id = $emp AND css_credentials.subject_id=$sub");
  $sql = mysqli_fetch_row($sql_query);
  $row = mysqli_query($conn, "SELECT sub_desc FROM css_subject WHERE subject_id = $sub");
  $subj_name = mysqli_fetch_row($row);
  
  if(!empty($sql)){
    echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Error: ".$subj_name[0]." is already assigned.')
            window.location.href='assign_teacher.php';
            </SCRIPT>");
    die();
  }

  $query1 = mysqli_query($conn, "LOCK TABLES css_credentials WRITE");
  $query1 = mysqli_query($conn, "START TRANSACTION");
  $query1 = mysqli_query($conn, "SET AUTOCOMMIT = 0");
	$query = mysqli_query($conn, "INSERT INTO css_credentials VALUES (null, $emp, '$cred', $sub)");
  $query1 = mysqli_query($conn, "COMMIT");
  $query1 = mysqli_query($conn, "UNLOCK TABLES");
	if($query===false){
    echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Error')
            window.location.href='assign_teacher.php';
            </SCRIPT>");
  	}
  else{
  	echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Successfuly added!')
            window.location.href='assign_teacher.php';
            </SCRIPT>");
	}
}
else{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Error')
            window.location.href='assign_teacher.php';
            </SCRIPT>");
}
?>