<?php
session_start(); 
include "db_conn.php";

if(!empty($_POST['sec_id'])){
  $sec_id = $_POST['sec_id'];
  $query = mysqli_query($conn, "LOCK TABLES css_schedule, css_school_yr, pims_employment_records, pims_personnel READ");
	$teacher = mysqli_query($conn, "SELECT DISTINCT pims_employment_records.emp_rec_ID, P_fname, P_lname 
									FROM pims_employment_records, pims_personnel, css_schedule, css_school_yr 
									WHERE pims_employment_records.emp_No=pims_personnel.emp_No AND css_schedule.emp_rec_ID=pims_employment_records.emp_rec_ID AND css_schedule.sy_id=css_school_yr.sy_id
									AND status='used'
									AND faculty_type='Teaching' order by P_fname");
				
	$teacher_w_ad = mysqli_query($conn, "SELECT css_section.emp_rec_ID, SECTION_ID, SECTION_NAME, YEAR_LEVEL, P_fname, P_lname
									FROM pims_employment_records, pims_personnel, css_section, css_school_yr
									WHERE pims_employment_records.emp_No=pims_personnel.emp_No
									AND pims_employment_records.emp_rec_ID=css_section.emp_rec_ID
									AND css_section.SY_ID=css_school_yr.SY_ID
									AND status='used'
									AND faculty_type='Teaching'");
	$emps = array();
	  foreach ($teacher_w_ad as $key) {
		$emps[] = $key['emp_rec_ID'];
	  }
  

  
  $query = mysqli_query($conn, "UNLOCK TABLES");
  echo '
  <select class="form-control " name="teach_id" required id="select2">
    <option value="">Select</option>';
	
									foreach ($teacher as $key) {
									  $c=0;
									  if(count($emps)!=0){
										for ($i=0; $i < count($emps); $i++) { 
										  if($emps[$i]==$key['emp_rec_ID']){
											$c++;
										  }
										}
									  }
										if($c==0){
										  echo'
										  <option value="'.$key['emp_rec_ID'].'">'.$key['P_fname'].' '.$key['P_lname'].'</option>';
										}
									}
}
else{
  echo '
  <select class="form-control " name="teach_id" required id="select2">
    <option value="">Select</option>';
  
  echo '</select>';
}
?>
<script src="../js/select2.min.js"></script>
