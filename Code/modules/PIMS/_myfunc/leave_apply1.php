<?php
	// Name: leave_apply1.php
	// 
	// Purpose: To load the remaining credits and the name of a personnel in the leave_apply page
	// 
	// Note: Please don't modify the code below
	
	include("db_connect.php");
		
	$echo = "";
	
	// --------------------- REMAINING CREDITS ------------------------
	$query = "select * from pims_leave_balance where emp_No = ".$_SESSION['pims_data']['emp_id']."; ";
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	$row = mysqli_fetch_array( $result );
		
	$echo = $echo . " updateCreditCount(); ";
	// --------------------- REMAINING CREDITS ------------------------
	
	// --------------------- NAME ------------------------
	$query = "select * from pims_personnel where emp_No = ".$_SESSION['pims_data']['emp_id']."; ";
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	$row = mysqli_fetch_array( $result );
	
	$nameStr = $row['P_lname'] . ", " . $row['P_fname'];
	if ( $row['P_mname'] != null ) $nameStr = $nameStr . " " . $row['P_mname'];
	if ( $row['P_extension_name'] != null ) $nameStr = $nameStr . " " . $row['P_extension_name'];
	
	$echo = $echo . "$('#name1').val('".$nameStr."'); ";
	// --------------------- NAME ------------------------
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] );
	
	echo "<script>" . $echo . "</script>";

	
?>