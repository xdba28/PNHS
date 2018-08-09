<?php
	include("db_connect.php");
	
	$echo = "";
	
	$query = "select * from pims_job_title; ";
	$result = mysqli_query($_SESSION['pims_data']['connection'] , $query );
	
	while( $row = mysqli_fetch_array($result) ){
		$echo = $echo . " <option value = '".$row['job_title_code']."' >".$row['job_title_name']."</option> ";
	}
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] ); 
	
	echo $echo;
?>