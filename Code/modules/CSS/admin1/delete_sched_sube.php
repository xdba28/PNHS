<?php
session_start(); 
include "db_conn.php";
$sec_id = null;
$yr_id = $_SESSION['yr_id'];
if(!empty($_POST['sec_id'])){
	$sec_id = $_POST['sec_id'];
	$query = mysqli_query($conn, "SELECT DISTINCT css_schedule.subject_id, subject_name
								FROM css_schedule, css_subject, css_school_yr
								WHERE css_schedule.subject_id=css_subject.subject_id
								AND css_schedule.SY_ID=css_school_yr.SY_ID
								AND css_school_yr.SY_ID=$yr_id AND SECTION_ID=$sec_id");
	echo '
	<div class="col-sm-5 input-column" style="text-align:right">
    	<select class="form-control" name = "sub_id" onchange="del_teach(this.value)" required>
			<option value="">Select</option>';
	foreach ($query as $row) {
		echo '<option value="'.$row['subject_id'].'">'.$row['subject_name'].'</option>';
	}
	echo '</select></div>';
}
else{
	echo '
	<div class="col-sm-5 input-column" style="text-align:right">
    	<select class="form-control" name = "sub_id" onchange="del_teach(this.value)" required>
			<option value="">Select</option>';
	echo '</select></div>';
}
$_SESSION['sec'] = $sec_id;
?>