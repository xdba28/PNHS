<?php
	// Name: login1.php
	// 
	// Purpose: A verification php for logging in
	// 
	// Note: Please don't modify the code below
	session_start();
	include("db_connect.php");
	$echo = "failed";
	$query = "select * from cms_account where cms_username = '".$_POST['username']."' and cms_password = '".$_POST['password']."' ; ";
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	
	if ( mysqli_num_rows($result) <= 0 ){
		$echo = "failed";
	}
	else{
		$row = mysqli_fetch_array($result);
		
		$_SESSION['user_data']['acct']['cms_account_ID'] = $row['cms_account_ID'];
		//$_SESSION['user_data']['acct']['cms_account_type']
		$_SESSION['user_data']['acct']['cms_username'] = $row['cms_username'];
		$_SESSION['user_data']['acct']['cms_password'] = $row['cms_password'];
		$tempid = $row['emp_no'];
		
		$query = "select pims_priv , cms_account_type from cms_privilege where cms_account_id = ".$_SESSION['user_data']['acct']['cms_account_ID']." ; ";
		$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		$row = mysqli_fetch_array($result);
		
		$_SESSION['user_data']['acct']['cms_account_type'] = $row['cms_account_type'];
		$_SESSION['pims_data']['pims_priv'] = $row['pims_priv'];
		
		
		if ( isset($tempid) && empty($tempid) ){
			$echo = "failed";
		}
		else{
			$query = "select * from pims_personnel where emp_No = ".$tempid." ; ";
			$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
			$row = mysqli_fetch_array($result);
			
			$nameStr = $row['P_lname'] . ", " . $row['P_fname'];
			if ( $row['P_mname'] != null ) $nameStr = $nameStr . " " . $row['P_mname'];
			if ( $row['P_extension_name'] != null ) $nameStr = $nameStr . " " . $row['P_extension_name'];
			
			if ( $row['pims_gender'] == "Male" ){
				$echo = "Mr. " . $nameStr;
			}
			else if ( $row['pims_gender'] == "Female" ){
				$echo = "Ms. " . $nameStr;
			}
			else{
				$echo = "Bug";
			}
		}
		
	}
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] );
	
	echo $echo;
?>