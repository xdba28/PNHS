<?php
	// Name: db_connect.php
	// 
	// Purpose: Configuration file for connecting to the database AND database TRANSACTION INITIATION
	// 
	// Note: Please don't modify the code below
	
	// declaration of variables
	
	$address = "localhost";
    $user = "root";
    $pass = "";
	$db = "class_db";
	
	// connecting to the database
	$connection = @mysqli_connect( $address , $user, $pass , $db );
	
	// connection warning
	if ( mysqli_connect_errno() ) {
	   echo "Couldn't connect to MySQL: ". $mysqli_connect_error() ;
	}
	if ( isset( $_SESSION['pims_data']['connection'] ) ){
		unset($_SESSION['pims_data']['connection']);
	}
    $_SESSION['pims_data']['connection'] = $connection;
	
	mysqli_autocommit($_SESSION['pims_data']['connection'],FALSE);
	
    // dont forget to include 
	// mysqli_close( $_SESSION['pims_data']['connection'] );
	// unset( $_SESSION['pims_data']['connection'] ); 
	// in the next code;
?>