<?php
	/*
		if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		
		if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
		if ( $errorNo != 0 && $rollbackCall == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$errorString = mysqli_error($_SESSION['pims_data']['connection']);
			$rollbackCall++;
		}
	*/
	session_start();
	include("db_connect.php");
	
	$errorNo = 0;
	$rollbackCall = 0;
	
	
	$query = "select fb_ID from pims_family_background where emp_No = " . $_GET['id'] . "; ";
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	
	if ( mysqli_num_rows($result) > 0 ){
		$row = mysqli_fetch_array($result);
		
		$query = "update pims_family_background set
					father_fname = '".$_POST['ffname1']."' ,
					father_mname = '".$_POST['fmname1']."' ,
					father_lname = '".$_POST['flname1']."' ,
					father_birthdate = '".$_POST['fbirthdate1']."' ,
					father_occupation = '".$_POST['foccupation1']."' ,
					mother_fname = '".$_POST['mfname1']."' ,
					mother_mname = '".$_POST['mmname1']."' ,
					mother_maidenname = '".$_POST['mmaidenname1']."' ,
					mother_lname = '".$_POST['mlname1']."' ,
					mother_birthdate = '".$_POST['mbirthdate1']."' ,
					mother_occupation = '".$_POST['moccupation1']."' ,
					no_of_siblings = ".$_POST['nos1']."
					where fb_ID = ". $row['fb_ID'] ."; ";
	}
	else{
		$query = "insert pims_family_background set
					father_fname = '".$_POST['ffname1']."' ,
					father_mname = '".$_POST['fmname1']."' ,
					father_lname = '".$_POST['flname1']."' ,
					father_birthdate = '".$_POST['fbirthdate1']."' ,
					father_occupation = '".$_POST['foccupation1']."' ,
					mother_fname = '".$_POST['mfname1']."' ,
					mother_mname = '".$_POST['mmname1']."' ,
					mother_maidenname = '".$_POST['mmaidenname1']."' ,
					mother_lname = '".$_POST['mlname1']."' ,
					mother_birthdate = '".$_POST['mbirthdate1']."' ,
					mother_occupation = '".$_POST['moccupation1']."' ,
					no_of_siblings = ".$_POST['nos1']." ,
					emp_No = ". $_GET['id'] ."; ";
	}
		
	if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		
	if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
	if ( $errorNo != 0 && $rollbackCall == 0 ){
		mysqli_rollback($_SESSION['pims_data']['connection']);
		$errorString = mysqli_error($_SESSION['pims_data']['connection']);
		$rollbackCall++;
	}
	
	if ( $errorNo == 0 ){
		mysqli_commit($_SESSION['pims_data']['connection']);
	}
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] );
	
	if ( $errorNo == 0 ){
		echo "alertify.success('Family Background Updated'); ";
	}
	else{
		echo "alertify.error('An error has occured. Rolling back changes<br />Recent error: " . $errorString . "'); ";
	}
?>