<?php
	// Name: nav1.php
	// 
	// Purpose: To hide some parts of the div for the user who has don't access on it
	// 
	// Note: Please don't modify the code below
	include("db_connect.php");
	
	$echo = 0;
	
	
	$query = "select * from pims_leave_balance where leave_status = 'On-Leave'; ";
	$result = mysqli_query($_SESSION['pims_data']['connection'],$query);
	$num = mysqli_num_rows($result);
	if ( $num > 0 ){
		$echo = $num;
	}
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] );
	
	echo $echo;
?>