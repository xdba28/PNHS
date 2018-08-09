<?php
	include 'connection.php';
	$mfo_id=$_GET['mfo_id'];
	$time = $_GET['time'];
	$qry=mysql_query("Update ipcrms_kra set timeline = '".$time."' where MFO_ID = '".$mfo_id."' ");
	header ("Location:update_kra.php");
 ?>