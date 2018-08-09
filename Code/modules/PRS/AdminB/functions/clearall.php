<?php
 
 include('../../connection.php');
 include('../../sanitise.php');

 
if(isset($_POST['submit'])){
//database connection


$qry = mysqli_query($mysqli,"SELECT * FROM pims_personnel, prs_mtr ,pims_employment_records
							   WHERE month(prs_mtr.time_issued) = month(now())
							   AND year(prs_mtr.time_issued) = year(now())
							   AND 	pims_personnel.emp_No=prs_mtr.emp_No
							   AND   pims_personnel.emp_No=pims_employment_records.emp_No
							   AND pims_employment_records.faculty_type='Non Teaching'	");
  
							   
							   $qrycheck = mysqli_query($mysqli,"SELECT count(prs_mtr.time_issued) as count FROM pims_personnel, prs_mtr ,pims_employment_records
							   WHERE month(prs_mtr.time_issued) = month(now())
							   AND year(prs_mtr.time_issued) = year(now())
							   AND 	pims_personnel.emp_No=prs_mtr.emp_No
							   AND   pims_personnel.emp_No=pims_employment_records.emp_No
							   AND pims_employment_records.faculty_type='Non Teaching'	");
							   $checkrow = mysqli_fetch_assoc($qrycheck);
							   $check = $checkrow['count'];
							 
			
	if($check > 0)
	{
					echo "<script>alert('Late Deduction Has Been Already Updated For This Month!'); </script>";
					echo "<script> window.location='../nonteaching.php' </script>";
					
					
	}else{

			$emp = mysqli_query($mysqli,"SELECT * FROM pims_personnel, pims_employment_records, prs_salary_record, prs_allowance, prs_salary
						Where pims_personnel.emp_No=pims_employment_records.emp_No
						AND pims_employment_records.faculty_type='Teaching'
						AND pims_personnel.emp_No=prs_salary_record.emp_No
						AND prs_salary.salary_id = prs_salary_record.salary_id");
			while($emprow = mysqli_fetch_assoc($emp))
			{
				$emp_No = $emprow['emp_No'];
				
				$clear = 0;
				
				$insert = mysqli_query($mysqli,"INSERT INTO prs_mtr (emp_No, monthly_cost, time) values ('$emp_No', '0', '0')");
				
				
			}
					echo "<script>alert('Late Deduction Has Been  Updated For This Month!'); </script>";
					echo "<script> window.location='../teaching.php' </script>";
								

	}			
								
								
								}
				
				//header('Location: ../../../profile.php');
				    

?>						