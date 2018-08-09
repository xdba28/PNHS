<?php
	// Name: leave_history3.php
	// 
	// Purpose: To cancel a particular leave of the personnel from applying
	// 
	// Note: Please don't modify the code below
	session_start();
	include("db_connect.php");
	
	$errorNo = 0;
	$rollbackCall = 0;
	
	$leave_id = $_GET['id'];
	
	$query = "update pims_leave set leave_application_status = 'User-Cancel' , date_responded = now() where leave_ID = " . $leave_id . "; ";
	if ( $errorNo == 0 ) mysqli_query($_SESSION['pims_data']['connection'] , $query);
	if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
	if ( $errorNo != 0 && $rollbackCall == 0 ){
		mysqli_rollback($_SESSION['pims_data']['connection']);
		$errorString = mysqli_error($_SESSION['pims_data']['connection']);
		$rollbackCall++;
	}
	
	$query = "select leave_bal_id from pims_leave where leave_ID = " . $leave_id . "; ";
	$result = mysqli_query($_SESSION['pims_data']['connection'] , $query);
	$row = mysqli_fetch_array( $result );
	
	$query = "update pims_leave_balance set leave_credits = leave_credits + 1 , leave_status = 'Unknown' where leave_bal_ID = " . $row['leave_bal_id'] . "; ";
	if ( $errorNo == 0 ) mysqli_query($_SESSION['pims_data']['connection'] , $query);
	if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
	if ( $errorNo != 0 && $rollbackCall == 0 ){
		mysqli_rollback($_SESSION['pims_data']['connection']);
		$errorString = mysqli_error($_SESSION['pims_data']['connection']);
		$rollbackCall++;
	}
	
	if ( $errorNo == 0 ){
		mysqli_commit($_SESSION['pims_data']['connection']);
	}
	else{
		mysqli_rollback($_SESSION['pims_data']['connection']);
		$errorString = mysqli_error($_SESSION['pims_data']['connection']);
	}
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] );
	
	if ( $errorNo != 0 ){
		echo "An error has occured. Rolling back changes<br />Recent error: " . $errorString;
	}
	else{
		echo "Canceled successfully";
	}
	

?>