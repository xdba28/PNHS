<?php
	session_start();
	include("db_connect.php");
		
	$echo = 0;
	
	$query = "select leave_credits from pims_leave_balance where emp_No = ".$_SESSION['pims_data']['emp_id']."; ";
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	$row = mysqli_fetch_array( $result );
	$echo = $row['leave_credits'];
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] );
	
	echo $echo;
?>