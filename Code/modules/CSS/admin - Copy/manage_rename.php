<?php
include "db_conn.php";

if(!empty($_POST['btn']) && !empty($_POST['year'])){
	$syid = $_POST['btn'];
	$year = $_POST['year'];
	$sql = mysqli_query($conn, "UPDATE css_school_yr SET year='$year' WHERE sy_id=$syid");
	header("location: manage.php");
}
else{
	header("location: year_level.php");
}

?>