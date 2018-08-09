<?php
	session_start();
	include("db_connect.php");
	
	$errorNo = 0;
	$rollbackCall = 0;
	
	$echo = "";
	
	$query = "select * from  pims_leave where leave_application_status = 'Pending' and leave_ID = ".$_GET['id']."; ";
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	
	if ( mysqli_num_rows($result) > 0 ){
		if ( $_GET['o'] == 1 ) $query = "update pims_leave set date_responded = now() , approved_by = '".$_SESSION['pims_data']['name']."' , leave_application_status = 'Approved' where leave_ID = ".$_GET['id']."; ";
		else if ( $_GET['o'] == 2 ) $query = "update pims_leave set date_responded = now() , approved_by = '".$_SESSION['pims_data']['name']."' , leave_application_status = 'Disapproved' where leave_ID = ".$_GET['id']."; ";
		
		if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
		if ( $errorNo != 0 && $rollbackCall == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$errorString = $errorNo;
			$rollbackCall++;
		}
		
		$query = "select leave_bal_id from pims_leave where leave_ID = ".$_GET['id']."; ";
		$result = mysqli_query($_SESSION['pims_data']['connection'],$query);
		$row = mysqli_fetch_array($result);
		
		if ( $_GET['o'] == 1 ){
			$query = "update pims_leave_balance set leave_credits = leave_credits - 1 where leave_bal_ID = ".$row['leave_bal_id']."; ";
			if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
			if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
			if ( $errorNo != 0 && $rollbackCall == 0 ){
				mysqli_rollback($_SESSION['pims_data']['connection']);
				$errorString = $errorNo;
				$rollbackCall++;
			}
		}
		if ( $_GET['o'] == 2 ){
			//$query = "update pims_leave_balance set leave_credits = leave_credits + 1 , leave_status = 'Unknown' where leave_bal_ID = ".$row['leave_bal_id']."; ";
			$query = "update pims_leave_balance set leave_status = 'Unknown' where leave_bal_ID = ".$row['leave_bal_id']."; ";
			if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
			if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
			if ( $errorNo != 0 && $rollbackCall == 0 ){
				mysqli_rollback($_SESSION['pims_data']['connection']);
				$errorString = $errorNo;
				$rollbackCall++;
			}
		}
		
		if ( $errorNo == 0 ){
			mysqli_commit($_SESSION['pims_data']['connection']);
		}
		if ( $errorNo == 0 ){
			$echo = $echo . " alertify.success('Done'); ";
		}
		else{
			$echo = $echo . " alertify.error('An error has occurred'); ";
		}
	}
	else{
		$echo = $echo . " alertify.error('An error has occurred. Please check if the user cancels their leave request. '); ";
	}
	
	
	
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] ); 
	
	echo $echo . " setTimeout(function() { window.location.href = 'view_application.php?id=".$_GET['id']."'; }, 2000);";
?>