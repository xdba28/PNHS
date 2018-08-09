<?php
include "db_conn.php";


if(!empty($_POST['syid'])){
	$syid = $_POST['syid'];
	$sql = mysqli_query($conn, "DELETE FROM css_school_yr WHERE sy_id=$syid");
	header("location: manage.php");
}
else{
	header("location: year_level.php");
}

?>