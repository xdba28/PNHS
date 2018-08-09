<?php
session_start(); 
include "db_conn.php";
$query = mysqli_query($conn, "SELECT year FROM css_school_yr WHERE STATUS='active'");
$row = mysqli_fetch_row($query);
$yr = explode("-", $row[0]);
$yr1 = (int)$yr[0];
$yr2 = (int)$yr[1];


if(!empty($_POST['sy_year'])){
	$sy_year = $_POST['sy_year'];
	$yr3 = explode("-", $sy_year);
	if(count($yr3)==2){
  		$yr4 = (int)$yr3[0];
  		$yr5 = (int)$yr3[1];
  	}
  	else{
  		echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Error school year')
                window.location.href='other_module_page.php';
                </SCRIPT>");
  		die();
  	}

  if($yr4>$yr1 && $yr5>$yr2){
    $sy_year = $yr4."-".$yr5;
    $query = mysqli_query($conn, "INSERT INTO css_school_yr VALUES (null, '$sy_year', 'used')");
		$query = mysqli_query($conn, "SELECT SY_ID FROM css_school_yr WHERE status='used'");
		$row = mysqli_fetch_row($query);
    $sec_active = mysqli_query($conn, "SELECT SECTION_NAME, YEAR_LEVEL FROM css_section, css_school_yr 
											WHERE css_section.SY_ID=css_school_yr.SY_ID AND status='active'");
		foreach ($sec_active as $key) {
			$name = $key['SECTION_NAME'];
			$year = $key['YEAR_LEVEL'];
			$query = mysqli_query($conn, "INSERT INTO css_section VALUES (null, '$name', $year, null, null, $row[0])");
		}
    $time_active = mysqli_query($conn, "SELECT am_s, am_e, pm_s, pm_e FROM css_time, css_school_yr 
                      WHERE css_time.sy_id=css_school_yr.SY_ID AND status='active'");
    foreach ($time_active as $key) {
      $am_s = $key['am_s'];
      $am_e = $key['am_e'];
      $pm_s = $key['pm_s'];
      $pm_e = $key['pm_e'];
      $query = mysqli_query($conn, "INSERT INTO css_time VALUES (null, $row[0], '$am_s', '$am_e', '$pm_s', '$pm_e')");
    }
	}
	else{
  		echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Error school year')
                window.location.href='other_module_page.php';
                </SCRIPT>");
  		die();
  	}
}
$_SESSION['sy'] = 1;
header("location: index.php");
?>