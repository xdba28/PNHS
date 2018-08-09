<?php
	include("db_connect.php");
	
	$echo = "false";
	
	if ( $_GET['m'] == "" ){
		$m = "";
	}
	else{
		$m = " and P_mname = '" . $_GET['m'] . "'";
	}
	
	if ( isset($_GET['id']) ){
		if (!( $_GET['f'] == "" && $_GET['l'] == "" )){
			$query = "select * from pims_personnel where P_fname = '".$_GET['f']."' and P_lname = '".$_GET['l']."' ".$m." and emp_No != ".$_GET['id']." ; ";
			$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
			
			if ( mysqli_num_rows($result) > 0 ){
				$echo = "true";
			}
		}
	}
	else{
		if (!( $_GET['f'] == "" && $_GET['l'] == "" )){
			$query = "select * from pims_personnel where P_fname = '".$_GET['f']."' and P_lname = '".$_GET['l']."' ".$m."; ";
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