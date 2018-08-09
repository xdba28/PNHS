<?php
session_start(); 
include "db_conn.php";



if(!empty($_POST['sec_name']) && !empty($_POST['grade'])){
  $grade = $_POST['grade'];
  $name=$_POST['sec_name'];

  $check = mysqli_query($conn, "SELECT SY_ID FROM css_school_yr WHERE STATUS='used'");
  $check_name = mysqli_query($conn, "SELECT SECTION_NAME FROM css_section, css_school_yr 
                            WHERE css_section.sy_id=css_school_yr.sy_id 
                            AND YEAR_LEVEL=$grade AND STATUS='used'");
  foreach ($check_name as $key) {
	if(strcasecmp($name, $key['SECTION_NAME'])==0 ){
      echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Duplicate data: Section ".$name." already created.')
            window.location.href='list_sections.php';
            </SCRIPT>");
            die();
    }
  }
  $row = mysqli_fetch_row($check);
	
  $query = mysqli_query($conn, "LOCK TABLE css_section WRITE");
  $query = mysqli_query($conn, "START TRANCACTION");
  $query = mysqli_query($conn, "SET AUTOCOMMIT = 0");
	$query = mysqli_query($conn, "INSERT INTO css_section VALUES (null, '$name', $grade, null, null, $row[0])");
  $query = mysqli_query($conn, "COMMIT");
  $query = mysqli_query($conn, "UNLOCK TABLES");
	echo ("<SCRIPT LANGUAGE='JavaScript'>
           	window.alert('Section ".$name." added')
            window.location.href='list_sections.php';
            </SCRIPT>");
            die();
}
else if (!empty($_POST['sec_id']) && !empty($_POST['teach_id']) && !empty($_POST['room_id'])) {
  $teach_id=$_POST['teach_id'];
  $room_id=$_POST['room_id'];
  $sec=$_POST['sec_id'];

  $check_emp = mysqli_query($conn, "SELECT SECTION_NAME FROM css_section, css_school_yr 
                                WHERE css_section.sy_id=css_school_yr.sy_id
                                AND status='used'
                                AND emp_rec_ID=$teach_id");
  $ct = mysqli_num_rows($check_emp);
  if($ct!=0){
    $str = mysqli_fetch_row($check_emp);
    echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Error: ".$str[0]." has already an adviser!')
            window.location.href='adviser.php';
            </SCRIPT>");
          die();
  }
  $check_room = mysqli_query($conn, "SELECT * FROM css_section, css_school_yr 
                                WHERE css_section.sy_id=css_school_yr.sy_id
                                AND status='used'
                                AND ROOM_NO=$room_id");
  $cr = mysqli_num_rows($check_room);
  if($cr!=0){
    echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Error: Room ".$room_id." is assigned on other section!')
            window.location.href='adviser.php';
            </SCRIPT>");
          die();
  }
  $query = mysqli_query($conn, "LOCK TABLES css_section WRITE");
  $query = mysqli_query($conn, "START TRANCACTION");
  $query = mysqli_query($conn, "SET AUTOCOMMIT = 0");
  $query = mysqli_query($conn, "UPDATE css_section SET emp_rec_ID=$teach_id, ROOM_NO=$room_id WHERE SECTION_ID=$sec");
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
            window.alert('Section updated')
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