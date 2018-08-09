<?php
	session_start();
	include("../../myfunc/db_connect.php");
	
	$errorNo = 0;
	$errorString = "";
	$rollbackCall = 0;
	
	$query = "insert into pims_messages set cms_account_ID = ".$_GET['s']." , p_message = '".$_POST['textAreaMessage']."' , p_status = '0' , p_time = now() , p_part_id = ".$_GET['f']."; ";
	
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
	
	echo $errorString;
?>