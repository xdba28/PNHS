<?php
	session_start();
	include("db_connect.php");
	
	$id = $_GET['id'];
	$results = mysqli_query( $_SESSION['pims_data']['connection'] , "select P_picture , pims_image_type from pims_personnel where emp_No = ".$id."; " );
	while ( $d = mysqli_fetch_array($results) ){
		$imageData = $d['P_picture'];
		$imageType = $d['pims_image_type'];
	}
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] );
	header("Content-type: ".$imageType);
	echo base64_decode($imageData);
?>
