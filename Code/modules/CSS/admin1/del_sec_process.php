<?php
session_start(); 
include "db_conn.php";

if(!empty($_POST['sec_id'])){
	$query = mysqli_query($conn, "LOCK TABLES css_section WRITE");
  $query = mysqli_query($conn, "START TRANSACTION");
  $query = mysqli_query($conn, "SET AUTOCOMMIT=0");
	$query = mysqli_query($conn, "DELETE FROM css_section WHERE SECTION_ID=".$_POST['sec_id']."");
  $query = mysqli_query($conn, "COMMIT");
  $query = mysqli_query($conn, "UNLOCK TABLES");
	echo ("<SCRIPT LANGUAGE='JavaScript'>
           	window.alert('Delete successful.')
            window.location.href='list_sections.php';
            </SCRIPT>");
}
else{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
           	window.alert('Sorry, delete failed.')
            window.location.href='list_sections.php';
            </SCRIPT>");
}
?>