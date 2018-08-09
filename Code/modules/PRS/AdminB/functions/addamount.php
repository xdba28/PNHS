<?php
include('../../connection.php');
 include('../../sanitise.php');

if (isset($_POST['submit'])) {


$qry = mysqli_query($mysqli,"SELECT * FROM pims_personnel, prs_mtr , pims_employment_records
							   WHERE month(prs_mtr.time_issued) = month(now())
							   AND year(prs_mtr.time_issued) = year(now())
							   AND 	pims_personnel.emp_No=prs_mtr.emp_No
							   AND  pims_personnel.emp_No=pims_employment_records.emp_No
							   AND pims_employment_records.faculty_type='Teaching'");

			
						   $qrycheck = mysqli_query($mysqli,"SELECT count(prs_mtr.time_issued) as count FROM pims_personnel, prs_mtr ,pims_employment_records
							   WHERE month(prs_mtr.time_issued) = month(now())
							   AND year(prs_mtr.time_issued) = year(now())
							   AND 	pims_personnel.emp_No=prs_mtr.emp_No
							   AND   pims_personnel.emp_No=pims_employment_records.emp_No
							   AND pims_employment_records.faculty_type='Teaching'	");
							   $checkrow = mysqli_fetch_assoc($qrycheck);
							   $check = $checkrow['count'];
							 
			
	if($check > 0)
	{
					echo "<script>alert('Late Deduction Has Been Already Updated For This Month!'); </script>";
					echo "<script> window.location='../teaching.php' </script>";
					
					
	}else{

$ids = array_keys($_POST['id']);
  
  
  foreach ($ids as $index) {
	  
			
		
	
	  $calculate = $_POST['amount'][$index] + $_POST['allowance'][$index] ;
	 $cal = ($calculate / 8 / 60)  * $_POST['time'][$index]  ;
	 
		 $sql =mysqli_query($mysqli," INSERT INTO prs_mtr (emp_No, monthly_cost, time) 
			VALUES('".$_POST['id'][$index]."','$cal','".$_POST['time'][$index]."' )	
			") or  die ("Error"); 		  
	
					
					echo "<script>alert('Late Deduction Has Been Updated!'); </script>";
					echo "<script> window.location='../teaching.php' </script>";
					
				
	
	}
	
	
	
	
	  
	 
	  
	  
			}
							 }


							 
							 
?>


