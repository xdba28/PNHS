<?php
session_start(); 
include "db_conn.php";

if(!empty($_POST['sub'])){
	$sub = $_POST['sub'];
	$cred = $_SESSION['cred'];
	$query = mysqli_query($conn, "SELECT pims_employment_records.emp_rec_ID, P_fname, P_lname 
								FROM css_subject, pims_personnel, pims_employment_records, css_credentials
								WHERE css_subject.subject_id=css_credentials.subject_id
								AND css_credentials.emp_rec_id=pims_employment_records.emp_rec_ID
								AND pims_employment_records.emp_No=pims_personnel.emp_No
								AND css_subject.subject_id=$sub
								AND cred_title='$cred'");
	echo '<select class="form-control " name="teach_id" required>
	<option value="">Select</option>';
	foreach ($query as $key) {
		echo '<option value="'.$key['emp_rec_ID'].'">'.$key['P_fname'].' '.$key['P_lname'].'</option>';
	}
	echo "</select> ";
}
else{
	echo '<select class="form-control " name="teach_id" required>
	<option value="">Select</option>';
	
	echo "</select> ";
}


?>

