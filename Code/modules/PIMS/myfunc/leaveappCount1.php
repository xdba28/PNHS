<?php
	include("db_connect.php");
	
	$echo = 0;
	
	$query = "select * from pims_leave where leave_application_status = 'Pending'; ";
	$result = mysqli_query($_SESSION['pims_data']['connection'],$query);
	$num = mysqli_num_rows($result);
	if ( $num > 0 ){
		$echo = $num;
	}
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] ); 
	
	echo $echo;
?>