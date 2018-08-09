<?php
	include("db_connect.php");
	
	$echo = "false";
	
	if ( isset($_GET['id']) ){
		if (!($_GET['b'] == "")){
			$query = "select * from pims_employment_records where biometric_ID = '".$_GET['b']."' and emp_No != ".$_GET['id']." ; ";
			$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
			
			if ( mysqli_num_rows($result) > 0 ){
				$echo = "true";
			}
		}
	}
	else{
		if (!($_GET['b'] == "")){
			$query = "select * from pims_employment_records where biometric_ID = '".$_GET['b']."'; ";
			$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
			
			if ( mysqli_num_rows($result) > 0 ){
				$echo = "true";
			}
		}
	}
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] ); 

	echo $echo;
?>