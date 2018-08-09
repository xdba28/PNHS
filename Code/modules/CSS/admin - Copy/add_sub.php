<?php
session_start(); 
include "db_conn.php";

if(!empty($_POST['dept']) && !empty($_POST['sub_name']) && !empty($_POST['sub_desc'])){
	$name = $_POST['sub_name'];
	$dept = $_POST['dept'];
	$desc = $_POST['sub_desc'];

	$check_name = mysqli_query($conn, "SELECT subject_name, sub_desc FROM css_subject 
                            WHERE subject_name='$name' OR sub_desc='$desc'");
  	foreach ($check_name as $key) {
    	if($name==$key['subject_name'] || $desc==$key['sub_desc']){
      		echo ("<SCRIPT LANGUAGE='JavaScript'>
            	window.alert('Duplicate data: ".$desc." already created.')
            	window.location.href='subjects.php';
            	</SCRIPT>");
            	die();
    	}
  	}

	$query1 = mysqli_query($conn, "LOCK TABLE css_subject WRITE");
	$query2 = mysqli_query($conn, "START TRANSACTION");
	$query2 = mysqli_query($conn, "SET AUTOCOMMIT = 0");
	if(strcasecmp($name, "specialization")==0 || strcasecmp($desc, "specialization")==0){
		$query = mysqli_query($conn, "INSERT INTO css_subject VALUES (50010, '$name', '$desc', $dept)");
	}
	else if(strcasecmp($name, "research")==0 || strcasecmp($desc, "research")==0){
		$query = mysqli_query($conn, "INSERT INTO css_subject VALUES (50008, '$name', '$desc', $dept)");
	}
	else if(strcasecmp($name, "enh. sci")==0 || strcasecmp($desc, "enh. sci")==0){
		$query = mysqli_query($conn, "INSERT INTO css_subject VALUES (50005, '$name', '$desc', $dept)");
	}
	else if(strcasecmp($name, "enh. math")==0 || strcasecmp($desc, "enh. math")==0){
		$query = mysqli_query($conn, "INSERT INTO css_subject VALUES (50009, '$name', '$desc', $dept)");
	}
	else if(strcasecmp($name, "enh. eng")==0 || strcasecmp($desc, "enh. eng")==0){
		$query = mysqli_query($conn, "INSERT INTO css_subject VALUES (50012, '$name', '$desc', $dept)");
	}
	else if(strcasecmp($name, "tle")==0 || strcasecmp($desc, "tle")==0){
		$query = mysqli_query($conn, "INSERT INTO css_subject VALUES (50011, '$name', '$desc', $dept)");
	}
	else{
		$query = mysqli_query($conn, "INSERT INTO css_subject VALUES (null, '$name', '$desc', $dept)");
	}
	$query2 = mysqli_query($conn, "COMMIT");
	$query1 = mysqli_query($conn, "UNLOCK TABLES");
	if($query===false){
		echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Error')
                window.location.href='subjects.php';
                </SCRIPT>");
	}
	else{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('".$name." added!')
                window.location.href='subjects.php';
                </SCRIPT>");
	}
}
else{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Error')
                window.location.href='subjects.php';
                </SCRIPT>");
}

?>