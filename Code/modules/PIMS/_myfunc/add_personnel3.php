<?php
	session_start();
	include("db_connect.php");
	
	$errorNo = 0;
	$rollbackCall = 0;
	
	$id = $_GET['id'];
	
	if ( isset($_GET['lc']) && $_GET['lc'] == 1 ){
		$result = mysqli_query( $_SESSION['pims_data']['connection'] , "select * from pims_leave_balance where emp_No = ".$id.";" );
		if ( mysqli_num_rows($result) > 0 ){
			$query = "update pims_leave_balance set leave_credits = ".$_POST['leaveCredits2']." where emp_No = ".$id."; ";
		}
		else{
			$query = "insert into pims_leave_balance set leave_credits = ".$_POST['leaveCredits2']." , leave_status = 'Unknown' , emp_No = ".$id."; ";
		}
		
		if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
		if ( $errorNo != 0 && $rollbackCall == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$errorString = $errorNo;
			$rollbackCall++;
		}
	}
	
	$query = "select * from pims_employment_records where emp_No = ".$id."; ";
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	if ( mysqli_num_rows($result) > 0 ){
		$query = "update pims_employment_records set ";
		$query = $query . " complete_item_no = '".$_POST['completeItemNo1']."' , ";
		$query = $query . " work_stat = '".$_POST['workStatus1']."' , ";
		$query = $query . " role_type = '".$_POST['roleType1']."' , ";
		$query = $query . " emp_status = '".$_POST['employmentStatus1']."' , ";
		$query = $query . " date_joined = '".$_POST['dateJoined1']."' , ";
		if ( isset($_POST['dateRetired1']) && !$_POST['dateRetired1'] == "" ){
			$query = $query . " date_retired = '".$_POST['dateRetired1']."' , ";
		}
		else{
			$query = $query . " date_retired = null , ";
		}
		$query = $query . " div_code = ".$_POST['divCode1']." , ";
		$query = $query . " biometric_ID = '".$_POST['biometricID1']."' , ";
		$query = $query . " school_ID = ".$_POST['schoolID1']." , ";
		$query = $query . " appointment_date = '".$_POST['appointmentDate1']."' , ";
		$query = $query . " faculty_type = '".$_POST['facultyType1']."' , ";
		$query = $query . " job_title_code = '".$_POST['jobTitle1']."' , ";
		$query = $query . " dept_ID = ".$_POST['department1']." ";
		$query = $query . " where emp_No = ".$id." ;";
	}
	else{
		$query = "insert into pims_employment_records set ";
		$query = $query . " complete_item_no = '".$_POST['completeItemNo1']."' , ";
		$query = $query . " work_stat = '".$_POST['workStatus1']."' , ";
		$query = $query . " role_type = '".$_POST['roleType1']."' , ";
		$query = $query . " emp_status = '".$_POST['employmentStatus1']."' , ";
		$query = $query . " date_joined = '".$_POST['dateJoined1']."' , ";
		$query = $query . " date_retired = null , ";
		$query = $query . " div_code = ".$_POST['divCode1']." , ";
		$query = $query . " biometric_ID = '".$_POST['biometricID1']."' , ";
		$query = $query . " school_ID = ".$_POST['schoolID1']." , ";
		$query = $query . " appointment_date = '".$_POST['appointmentDate1']."' , ";
		$query = $query . " faculty_type = '".$_POST['facultyType1']."' , ";
		$query = $query . " job_title_code = '".$_POST['jobTitle1']."' , ";
		$query = $query . " dept_ID = ".$_POST['department1']." , ";
		$query = $query . " emp_No = ".$id." ;";
	}
	
	if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
	if ( $errorNo != 0 && $rollbackCall == 0 ){
		mysqli_rollback($_SESSION['pims_data']['connection']);
		$errorString = $errorNo;
		$rollbackCall++;
	}
	
	if ( $errorNo == 0 ){
		mysqli_commit($_SESSION['pims_data']['connection']);
	}
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] );
	
	if ( $errorNo == 0 ){
		$echo = "alertify.success('Employment Records Updated'); window.open('browse_profile.php?id=".$_GET['id']."','_self'); ";
	}
	else{
		$echo = "alertify.error('An error has occured. Rolling back changes<br />Recent error: " . $errorString . "'); ";
	}
	
	echo $echo;

?>