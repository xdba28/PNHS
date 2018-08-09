<?php
include('connection.php');
session_start();
 if(isset($_SESSION['user_data']))
	{
		$emp = $_SESSION['user_data']['acct']['emp_no'];
		$aid = $_SESSION['user_data']['acct']['cms_account_ID'];
		$qry= mysql_query ("SELECT pims_employment_records.job_title_code FROM pims_personnel, pims_employment_records, pims_job_title
						Where pims_personnel.emp_No=pims_employment_records.emp_No
						AND pims_job_title.job_title_code=pims_employment_records.job_title_code
						AND pims_employment_records.emp_No=$emp");
		$row = mysql_fetch_assoc($qry);
		if($row['job_title_code']=="ADAID3"){
			echo "<script>window.location='adminB/admin/index.php';</script>";
		}else{
			echo "<script>window.location='admin/index.php';</script>";
		}

	
    }
	
?>