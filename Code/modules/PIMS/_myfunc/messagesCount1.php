<?php
	session_start();
	include("db_connect.php");
	
	$echo = 0;
	
	$query = "select p_part_id from pims_participant where p_user_one = ".$_SESSION['pims_data']['cms_id']." or p_user_two = ".$_SESSION['pims_data']['cms_id']."; ";
	$result = mysqli_query($_SESSION['pims_data']['connection'],$query);
	
	while ( $row = mysqli_fetch_array($result) ){
		$query1 = "select * from pims_messages where p_part_id = ".$row['p_part_id']." and p_status = '0' and cms_account_id != ".$_SESSION['pims_data']['cms_id']."; ";
		$result1 = mysqli_query($_SESSION['pims_data']['connection'],$query1);
		$num = mysqli_num_rows($result1);
		if ( $num > 0 ) $echo++;
	}
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] ); 

	echo $echo;
?>