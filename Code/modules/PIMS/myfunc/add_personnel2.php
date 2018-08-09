<?php
	include("db_connect.php");
	
	$echo = " <option value = 'null' >None</option> ";
	
	$query = "select * from pims_department; ";
	$result = mysqli_query($_SESSION['pims_data']['connection'] , $query );
	
	while( $row = mysqli_fetch_array($result) ){
		$echo = $echo . " <option value = '".$row['dept_ID']."' >".$row['dept_name']." - ".$row['office_org_code']."</option> ";
	}
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] ); 
	
	echo $echo;
?>