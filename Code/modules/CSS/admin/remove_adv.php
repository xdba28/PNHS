<?php
session_start(); 
include "db_conn.php";
if(!empty($_POST['sec_id'])){
	$sec= $_POST['sec_id'];
  $query = mysqli_query($conn, "LOCK TABLES css_section WRITE");
  $query = mysqli_query($conn, "START TRANSACTION");
  $query = mysqli_query($conn, "SET AUTOCOMMIT = 0");
	$query = mysqli_query($conn, "UPDATE css_section SET emp_rec_ID=null, ROOM_NO=null WHERE SECTION_ID=$sec");
  $query = mysqli_query($conn, "COMMIT");
  $query = mysqli_query($conn, "UNLOCK TABLES");
  if($query===false){
    echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Error')
            window.location.href='adviser.php';
            </SCRIPT>");
  }
  else
  echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Adviser and Room removed!')
            window.location.href='adviser.php';
            </SCRIPT>");
}
else{
  echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Error')
            window.location.href='adviser.php';
            </SCRIPT>");
}
?>