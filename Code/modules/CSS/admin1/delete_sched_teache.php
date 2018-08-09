<?php
session_start(); 
include "db_conn.php";
$sec_id = $_SESSION['sec'];
$yr_id = $_SESSION['yr_id'];
if(!empty($_POST['sub_id'])){
	$sub_id = $_POST['sub_id'];
	if($sub_id==50011){
		$query = mysqli_query($conn, "SELECT emp_rec_ID FROM css_schedule, css_school_yr
								WHERE css_schedule.emp_rec_ID is NULL
                              	AND css_schedule.SY_ID=css_school_yr.SY_ID
								AND css_school_yr.SY_ID=$yr_id AND subject_id=$sub_id AND SECTION_ID=$sec_id");
		if(mysqli_num_rows($query)!=1){
			$query = mysqli_query($conn, "SELECT DISTINCT pims_employment_records.emp_rec_ID, P_fname, P_lname
								FROM css_schedule, pims_employment_records, pims_personnel, css_school_yr
								WHERE pims_employment_records.emp_rec_ID=css_schedule.emp_rec_ID
                              	AND pims_employment_records.emp_No=pims_personnel.emp_No
                              	AND css_schedule.SY_ID=css_school_yr.SY_ID
								AND css_school_yr.SY_ID=$yr_id AND subject_id=$sub_id AND SECTION_ID=$sec_id");
		}

	}
	else{
		$query = mysqli_query($conn, "SELECT DISTINCT pims_employment_records.emp_rec_ID, P_fname, P_lname
								FROM css_schedule, pims_employment_records, pims_personnel, css_school_yr
								WHERE pims_employment_records.emp_rec_ID=css_schedule.emp_rec_ID
                              	AND pims_employment_records.emp_No=pims_personnel.emp_No
                              	AND css_schedule.SY_ID=css_school_yr.SY_ID
								AND css_school_yr.SY_ID=$yr_id AND subject_id=$sub_id AND SECTION_ID=$sec_id");
	}
	echo '
	<div class="col-sm-5 input-column" style="text-align:right">
       	<select class="form-control" name = "teach_id" required>
			<option value="">Select</option>';
	foreach ($query as $row) {
		if(empty($row['emp_rec_ID'])){
			echo '<option value="'.$row['emp_rec_ID'].'">No Teacher</option>';
		}
		else{
			echo '<option value="'.$row['emp_rec_ID'].'">'.$row['P_fname']." ".$row['P_lname'].'</option>';
		}
	}
	echo '</select></div>';
}
else{
		echo '
	<div class="col-sm-5 input-column" style="text-align:right">
       	<select class="form-control" name = "teach_id" required>
			<option value="">Select</option>';
	echo '</select></div>';
}

?>