<?php
include "db_conn.php";
$query = mysqli_query($conn, "LOCK TABLES pims_employment_records, css_credentials READ");
$emp = mysqli_query($conn, "SELECT * FROM pims_employment_records WHERE faculty_type='Teaching'");

$cred = mysqli_query($conn, "SELECT DISTINCT css_credentials.emp_rec_id 
							FROM css_credentials, pims_employment_records
                            WHERE css_credentials.emp_rec_ID=pims_employment_records.emp_rec_ID
                            AND faculty_type='Teaching'");
$query = mysqli_query($conn, "UNLOCK TABLES");
foreach ($cred as $key) {
	$emp_id[] = $key['emp_rec_ID'];
}

foreach ($emp as $key) {
	$c=0;
	for ($i=0; $i < count($emp_id); $i++) { 
		if($emp_id[$i]==$key['emp_rec_ID']){
			$c++;
		}
	}
	if($c==0){
		$id = $key['emp_rec_ID'];
		$query = mysqli_query($conn, "SELECT subject_id FROM pims_employment_records, pims_department, css_subject
									WHERE pims_employment_records.dept_ID=pims_department.dept_ID
									AND pims_department.dept_ID=css_subject.dept_ID
									AND subject_id!=50009 AND subject_id!=50005 AND subject_id!=50012
									AND pims_employment_records.emp_rec_ID=$id");
		$sub_id = mysqli_fetch_row($query);
		
		$query = mysqli_query($conn, "INSERT INTO css_credentials VALUES (null, $id, 'Major', $sub_id[0])");
	}
}
header("Location: assign_teacher.php");

?>