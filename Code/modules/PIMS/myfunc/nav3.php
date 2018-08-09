<?php
	// Name: nav1.php
	// 
	// Purpose: To hide some parts of the div for the user who has don't access on it
	// 
	// Note: Please don't modify the code below
	include("db_connect.php");
	
	$echo = "";
	
	$query = "select * from pims_leave_balance where emp_No = " . $_SESSION['pims_data']['emp_id'] . "; ";
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	
	if ( mysqli_num_rows($result) <= 0 ){
		$echo = $echo . "
		$( document ).ready(function(){
			$('#leaveDropDown1').attr({ style : 'display: none' });
		});
		";
	}
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] );
	
	echo  $echo ;
?>