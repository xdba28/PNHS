<?php
	session_start();
	include("../../myfunc/db_connect.php");
	
	$echo = "";
	
	$query = "select * from pims_messages where p_part_id = ".$_GET['f']." order by p_time desc ";
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	$row = mysqli_fetch_array($result);
	
	$echo = $row['p_mes_id'];
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] ); 
	
	echo $echo;
?>