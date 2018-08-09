<?php
	// Name: leave_apply2.php
	// 
	// Purpose: A verification php where checks if a user has a pending leave apply request
	// 
	// Note: Please don't modify the code below
	session_start();
	include("db_connect.php");
	
	$echo = "";
	
	$query = "select pims_leave_balance.leave_status as leave_stat from pims_leave_balance where pims_leave_balance.emp_No = ".$_GET['id']."; ";
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	if ( mysqli_num_rows($result) == 0 ){
		$echo = "true";
	}
	else{
		$count = "0";
		while ( $row = mysqli_fetch_array($result) ){
			if ( $row['leave_stat'] == "Pending" ){
				 $count = "You currently have a pending leave request";
				 break;
			}
			if ( $row['leave_stat'] == "Upcoming" ){
				 $count = "You currently have a upcoming leave";
				 break;
			}
			if ( $row['leave_stat'] == "On-Leave" ){
				 $count = "You are on Leave";
				 break;
			}
		}
		
		if ( $count == "0" ) $echo = "true";
		else $echo = $count;
	}
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] ); 
	
	echo $echo;
?>