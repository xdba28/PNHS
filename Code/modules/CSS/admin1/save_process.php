<?php 
include "db_conn.php";
session_start();

$query = mysqli_query($conn, "UPDATE css_school_yr SET STATUS='inactive' WHERE STATUS='active'");
$query = mysqli_query($conn, "UPDATE css_school_yr SET STATUS='active' WHERE STATUS='used'");
$_SESSION['sy'] = 0;
$_SESSION['modal'] = 0;
header("Location: year_level.php");

?>