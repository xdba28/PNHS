<?php
include("../../db_connect.php");
session_start();

include("../include/session.php");  


if(isset($_SESSION['user_data']['acct']['cms_username']) && isset($_SESSION['user_data']['acct']['cms_account_ID']) && $_SESSION['user_data']['priv']['scms_priv'] == 1)
{
	$_SESSION['user_data']['acct']['cms_account_ID'];
	
	$fetch_account = mysqli_query($connect, "SELECT * FROM cms_account
	WHERE cms_account_ID = '".$_SESSION['user_data']['acct']['cms_account_ID']."'")
	or die(mysqli_error($connect));
	
	$account = mysqli_fetch_array($fetch_account);
	
	if($account['emp_no'] == NULL && $_SESSION['user_data']['priv']['cms_account_type']=='user')
	{
		$_SESSION['user_data']['acct']['no'] = 3;
		header('Location: stuper/index.php');
		
	}
	else if($account['lrn'] == NULL)
	{
		$fetch_roletype = mysqli_query($connect, "SELECT * FROM pims_personnel, pims_employment_records, pims_job_title
		WHERE pims_employment_records.emp_No = pims_personnel.emp_No
        AND pims_employment_records.job_title_code=pims_job_title.job_title_code
		AND pims_personnel.emp_No = '".$account['emp_no']."'")
		or die(mysqli_error($connect));
		
		$roletype = mysqli_fetch_array($fetch_roletype);
		
		if($roletype['faculty_type'] == "Non Teaching" && $roletype['job_title_code'] == 'NURS1' && $_SESSION['user_data']['priv']['cms_account_type']=='admin')
		{
			$_SESSION['user_data']['acct']['no'] = 1;
			header('Location: admin/index.php');
		}
		else if($roletype['faculty_type'] == "Teaching")
		{
			$fetch_mapeh = mysqli_query($connect, "SELECT * FROM pims_employment_records, pims_department
				WHERE pims_employment_records.dept_ID =  pims_department.dept_ID
				AND pims_employment_records.emp_rec_ID = '".$roletype['emp_rec_ID']."'")
				or die(mysqli_error($connect));
				
			$mapeh = mysqli_fetch_array($fetch_mapeh);
			
			if($mapeh['dept_name'] == "MAPEH Department" && $_SESSION['user_data']['priv']['cms_account_type']=='admin')
			{
				$_SESSION['user_data']['acct']['no'] = 2;
				header('Location: mapeh/index.php');
			}
			else if($_SESSION['user_data']['priv']['cms_account_type']=='user')
			{
				$_SESSION['user_data']['acct']['no'] = 3;
				header('Location: stuper/index.php');			
			}
			else{
				header('Location: admin_idx.php');
			}
		}
		else if($_SESSION['user_data']['priv']['cms_account_type']=='user')
		{
			$_SESSION['user_data']['acct']['no'] = 3;
			header('Location: stuper/index.php');			
		}
			
	}
	else
	{
			header('Location: admin_idx.php');
	}
}
else
{
	header('Location: admin_idx.php');
}


?>