<?php
session_start(); 
include "db_conn.php";

if(!empty($_POST['emp_cred'])){
	$emp = $_POST['emp_cred'];
	$inc = mysqli_query($conn, "SELECT emp_rec_ID FROM pims_employment_records, pims_field 
			WHERE pims_employment_records.emp_No=pims_field.emp_No AND pims_field.emp_No = '$emp'");
	$row = mysqli_fetch_row($inc);
	$emp_id = $row[0];
	$inc_d = mysqli_query($conn, "DELETE FROM css_credentials WHERE emp_rec_id='$emp_id'");

	$inc1 = mysqli_query($conn, "SELECT major FROM pims_field, pims_personnel, pims_employment_records 
								WHERE pims_field.emp_No=pims_personnel.emp_No AND pims_personnel.emp_No=pims_employment_records.emp_No AND pims_employment_records.emp_rec_ID='$emp_id'");
	$sub = mysqli_fetch_row($inc1);
	if(mysqli_num_rows($inc1)!=0){
		$sql = mysqli_query($conn, "INSERT INTO css_credentials VALUES(null, '$emp_id', 'Major', '$sub[0]')");
	}

	$inc2 = mysqli_query($conn, "SELECT minor FROM pims_field, pims_personnel, pims_employment_records 
								WHERE pims_field.emp_No=pims_personnel.emp_No AND pims_personnel.emp_No=pims_employment_records.emp_No AND pims_employment_records.emp_rec_ID='$emp_id'");
	$sub = mysqli_fetch_row($inc2);
	if(mysqli_num_rows($inc2)!=0){
		$sql = mysqli_query($conn, "INSERT INTO css_credentials VALUES(null, '$emp_id', 'Minor', '$sub[0]')");
	}

	$inc3 = mysqli_query($conn, "SELECT related FROM pims_field, pims_personnel, pims_employment_records 
								WHERE pims_field.emp_No=pims_personnel.emp_No AND pims_personnel.emp_No=pims_employment_records.emp_No AND pims_employment_records.emp_rec_ID='$emp_id'");
	$sub = mysqli_fetch_row($inc3);
	if(mysqli_num_rows($inc3)!=0){
		$sql = mysqli_query($conn, "INSERT INTO css_credentials VALUES(null, '$emp_id', 'Related', '$sub[0]')");
	}
	if($inc1 && $inc2 && $inc3){
		echo ("<SCRIPT LANGUAGE='JavaScript'>
				  window.alert('Update Successful')
				  window.location.href='assign_teacher.php';
				  </SCRIPT>");
				  die();
	}
	else{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
				  window.alert('Update Failed')
				  window.location.href='assign_teacher.php';
				  </SCRIPT>");
				  die();
	}
}
else{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
				  window.alert('Please Select Teacher!')
				  window.location.href='assign_teacher.php';
				  </SCRIPT>");
				  die();
}
?>