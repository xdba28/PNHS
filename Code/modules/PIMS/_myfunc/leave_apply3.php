<?php
	// Name: leave_apply3.php
	// 
	// Purpose: Submits the leave request of the personnel
	// 
	// Note: Please don't modify the code below
	session_start();
	include("db_connect.php");
	
	$errorNo = 0;
	$rollbackCall = 0;
	
	$id = $_GET['id'];
	
	// ---------------- GETTING leave_bal_ID --------
		$query = "select leave_bal_ID from pims_leave_balance where emp_No = " . $id . "; ";
		$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		if ( mysqli_num_rows($result) > 0 ){
			$row = mysqli_fetch_array($result);
			$leave_bal_ID = $row['leave_bal_ID'];
		}
		else{
			$query = "insert into pims_leave_balance set leave_credits = 0 , leave_status = 'Unknown' , emp_No = ".$id." ; ";
			if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
			if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
			if ( $errorNo != 0 && $rollbackCall == 0 ){
				mysqli_rollback($_SESSION['pims_data']['connection']);
				$errorString = mysqli_error($_SESSION['pims_data']['connection']);
				$rollbackCall++;
			}
			if ( $errorNo == 0 ) $leave_bal_ID = mysqli_insert_id($_SESSION['pims_data']['connection']);
		}
		
	
	// ----------------------------------------------
	
	// ---------------- ATTACHMENT ------------------
	
		if ( $_FILES["attachment1"]["tmp_name"] == "" ){
			
			if ( $_POST['placeToBeVisited1'] == null ){
				$placeToBeVisited = "null";
			}
			else{
				$placeToBeVisited = "'" . $_POST['placeToBeVisited1'] . "'";
			}
			
			if ( $_POST['purpose1'] == null ){
				$purpose= "null";
			}
			else{
				$purpose = "'" . $_POST['purpose1'] . "'";
			}
			
			$query = "insert into pims_leave ( leave_application_status , type , date_submitted , date_responded , leave_start , leave_end , place_to_be_visited , purpose , attachment , attachment_type , attachment_name , approved_by , leave_bal_ID ) values ( 'Pending' , '".$_POST['type1']."' , now() , '0000-00-00' , '".$_POST['startOfLeave1']."' , '".$_POST['timeOfReturn1']."' , ".$placeToBeVisited." , ".$purpose." , null , null , null , 'None' , ".$leave_bal_ID."); "; 
			if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
			if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
			if ( $errorNo != 0 && $rollbackCall == 0 ){
				mysqli_rollback($_SESSION['pims_data']['connection']);
				$errorString = mysqli_error($_SESSION['pims_data']['connection']);
				$rollbackCall++;
			}
			
			
			//$query = "update pims_leave_balance set leave_credits = leave_credits - 1 , leave_status = 'Pending' where emp_No = " . $id . "; ";
			$query = "update pims_leave_balance set leave_status = 'Pending' where emp_No = " . $id . "; ";
			if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
			if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
			if ( $errorNo != 0 && $rollbackCall == 0 ){
				mysqli_rollback($_SESSION['pims_data']['connection']);
				$errorString = mysqli_error($_SESSION['pims_data']['connection']);
				$rollbackCall++;
			}
			
		}
		else{
			if ( $_POST['placeToBeVisited1'] == null ){
				$placeToBeVisited = "null";
			}
			else{
				$placeToBeVisited = "'" . $_POST['placeToBeVisited1'] . "'";
			}
			
			if ( $_POST['purpose1'] == null ){
				$purpose= "null";
			}
			else{
				$purpose = "'" . $_POST['purpose1'] . "'";
			}
			
			$fileType = $_FILES["attachment1"]["type"];
			$fileName = $_FILES["attachment1"]["name"];
			$fileData = base64_encode(file_get_contents($_FILES["attachment1"]["tmp_name"] ) );
			$query = "insert into pims_leave ( leave_application_status , type , date_submitted , date_responded , leave_start , leave_end , place_to_be_visited , purpose , attachment , attachment_type , attachment_name , approved_by , leave_bal_ID ) values ( 'Pending' , '".$_POST['type1']."' , now() , '0000-00-00' , '".$_POST['startOfLeave1']."' , '".$_POST['timeOfReturn1']."' , ".$placeToBeVisited." , ".$purpose." , '".$fileData."' , '".$fileType."' , '".$fileName."' , 'None' , ".$leave_bal_ID."); "; 
			if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
			if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
			if ( $errorNo != 0 && $rollbackCall == 0 ){
				mysqli_rollback($_SESSION['pims_data']['connection']);
				$errorString = mysqli_error($_SESSION['pims_data']['connection']);
				$rollbackCall++;
			}
			
			//$query = "update pims_leave_balance set leave_credits = leave_credits - 1 , leave_status = 'Pending' where emp_No = " . $id . "; ";
			$query = "update pims_leave_balance set leave_status = 'Pending' where emp_No = " . $id . "; ";
			if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
			if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
			if ( $errorNo != 0 && $rollbackCall == 0 ){
				mysqli_rollback($_SESSION['pims_data']['connection']);
				$errorString = mysqli_error($_SESSION['pims_data']['connection']);
				$rollbackCall++;
			}
		}
	
	
	// ---------------------------------------------- 
	
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
		echo "alertify.error('An error has occured. Rolling back changes<br />Recent error: " . $errorNo . " ');  ";
	}
	else{
		echo "alertify.success('Leave submitted'); ";
	}
	
?>