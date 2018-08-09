<?php
	session_start();
	include("db_connect.php");
	
	$id = $_GET['id'];
	$results = mysqli_query( $_SESSION['pims_data']['connection'] , "select p_data_blob , p_data_text from pims_profile_update_list where p_update_list_id = ".$id."; " );
	while ( $d = mysqli_fetch_array($results) ){
		$imageData = $d['p_data_blob'];
		$imageType = $d['p_data_text'];
	}
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] );
	header("Content-type: ".$imageType);
	echo base64_decode($imageData);
?>
