<?php
//Connection to database
	$host="localhost";
	$user="root";
	$pass="";
	$db="class_db";
	
	try {
		$mysqli = new mysqli($host, $user, $pass, $db);
		// Checking connection
		if($mysqli->connect_errno){
			throw new Exception($mysqli->connect_error);
		}
	}	catch (Exception $con){
		echo "Connect failed: %s\n" . $con->getMessage();
	}
?>