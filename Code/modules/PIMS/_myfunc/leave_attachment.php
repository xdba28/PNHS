<?php
	// Name: leave_attachment.php
	// 
	// Purpose: To download the attachment of the personnels leave 
	// 
	// Note: Please don't modify the code below
	session_start();
	include("db_connect.php");
	
	$id = $_GET['id'];
	$results = mysqli_query( $_SESSION['pims_data']['connection'] , "select attachment , attachment_name from PIMS_LEAVE where leave_ID = ".$id." ;" );
	while ( $d = mysqli_fetch_array($results) ){
		$Data = $d['attachment'];
		$Name = $d['attachment_name'];
	}
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] );
	header('Content-Disposition: attachment; filename="'.$Name.'"');
	echo base64_decode($Data);
?>
