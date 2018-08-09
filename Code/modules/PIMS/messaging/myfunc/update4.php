<?php
	session_start();
	include("../../myfunc/db_connect.php");
	
	$errorNo = 0;
	$rollbackCall = 0;
	
	$id = $_GET['id'];
	
	$query = " update pims_messages set p_status = '1' where p_mes_id = ".$_GET['id']."; ";
	
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
?>