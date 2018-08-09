<?php
session_start(); 
include "db_conn.php";

if(!empty($_POST['sub_id'])){
  $sub_id = $_POST['sub_id'];
  $teacher = mysqli_query($conn, "SELECT pims_employment_records.emp_rec_ID, P_fname, P_lname 
                                  FROM css_subject, pims_department, pims_personnel, pims_employment_records
                                  WHERE css_subject.dept_ID=pims_department.dept_ID
                                  AND pims_department.dept_ID=pims_employment_records.dept_ID
                                  AND pims_employment_records.emp_No=pims_personnel.emp_No
                                  AND css_subject.subject_id=$sub_id");
  echo '

  <option>Select</option>';
  foreach ($teacher as $key) {
    echo '<option value="'.$key['emp_rec_ID'].'">'.$key['P_fname'].' '.$key['P_lname'].'</option>';
  }
}
?>
