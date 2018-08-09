<?php
session_start(); 
include "db_conn.php";
if(!empty($_POST['grade'])){
  $grade = $_POST['grade'];
  $section = mysqli_query($conn, "SELECT SECTION_ID, SECTION_NAME FROM css_section, css_school_yr 
                                WHERE status='used' AND css_section.SY_ID=css_school_yr.SY_ID 
                                AND YEAR_LEVEL=$grade");
  echo '
  <select class="form-control " name="sec_id"  onchange="e_teach2(this.value)" required> 
  <option value="">Select</option>';
  foreach ($section as $key) {
    echo '<option value="'.$key['SECTION_ID'].'">'.$key['SECTION_NAME'].'</option>';
  }
  echo '</select>';
}
else if(!empty($_POST['grade4'])){
  $grade = $_POST['grade4'];
  $section = mysqli_query($conn, "SELECT SECTION_ID, SECTION_NAME FROM css_section, css_school_yr 
                                WHERE status='used' AND css_section.SY_ID=css_school_yr.SY_ID 
                                AND YEAR_LEVEL=$grade AND emp_rec_ID IS NULL");
  echo '
  <select class="form-control " name="sec_id"  onchange="e_teach2(this.value)" required> 
  <option value="">Select</option>';
  foreach ($section as $key) {
    echo '<option value="'.$key['SECTION_ID'].'">'.$key['SECTION_NAME'].'</option>';
  }
  echo '</select>';
}
else{
	echo '
  <select class="form-control " name="sec_id"  onchange="e_teach2(this.value)" required> 
  <option value="">Select</option>';
  echo '</select>';
}
if(!empty($_POST['grade2'])){
  $grade = $_POST['grade2'];
  $teacher_w_ad = mysqli_query($conn, "SELECT css_section.emp_rec_ID, SECTION_ID, SECTION_NAME, YEAR_LEVEL, P_fname, P_lname
                                FROM pims_employment_records, pims_personnel, css_section, css_school_yr
                                WHERE pims_employment_records.emp_No=pims_personnel.emp_No
                                AND pims_employment_records.emp_rec_ID=css_section.emp_rec_ID
                                AND css_section.SY_ID=css_school_yr.SY_ID
                                AND status='used' AND YEAR_LEVEL=$grade
                                AND faculty_type='Teaching'");

  $c = mysqli_num_rows($teacher_w_ad);
  if($c!=0){
    foreach ($teacher_w_ad as $key) {
    echo'    
      <option value="'.$key['SECTION_ID'].'">'.$key['SECTION_NAME'].' '.substr($key['P_fname'], 0, 1).'. '.$key['P_lname'].'</option>';
    }
  }
}
?>

