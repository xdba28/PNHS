<?php
include_once('db_connect.php');

session_start();

if(isset($_SESSION['user_data']['acct']['cms_username']) && isset($_SESSION['user_data']['acct']['cms_account_ID']) && $_SESSION['user_data']['priv']['scms_priv'] == 1)
{
	$_SESSION['user_data']['acct']['cms_account_ID'];
	
	$fetch_account = mysqli_query($connect, "SELECT * FROM cms_account
	WHERE cms_account_ID = '".$_SESSION['user_data']['acct']['cms_account_ID']."'")
	or die(mysqli_error($connect));
	
	$account = mysqli_fetch_array($fetch_account);
	
	if($account['emp_no'] == NULL)
	{
		$_SESSION['user_data']['acct']['no'] = 3;
		header('Location: stuper/index.php');
		
	}
	else if($account['lrn'] == NULL)
	{
		$fetch_roletype = mysqli_query($connect, "SELECT * FROM pims_personnel, pims_employment_records
		WHERE pims_employment_records.emp_No = pims_personnel.emp_No
		AND pims_personnel.emp_No = '".$account['emp_no']."'")
		or die(mysqli_error($connect));
		
		$roletype = mysqli_fetch_array($fetch_roletype);
		
		if($roletype['role_type'] == 'nurse')
		{
			$_SESSION['user_data']['acct']['no'] = 1;
			header('Location: admin/index.php');
		}
		else if($roletype['role_type'] == 'Mapeh Teacher')
		{
			$_SESSION['user_data']['acct']['no'] = 2;
			header('Location: mapeh/index.php');			
		}
		else
		{
			$_SESSION['user_data']['acct']['no'] = 3;
			header('Location: stuper/index.php');			
		}
			
	}
	else
	{
			header('Location: login.php');
	}
}
else
{
	header('Location: login.php');
}


?>