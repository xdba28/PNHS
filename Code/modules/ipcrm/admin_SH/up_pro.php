<?php 

	include 'connection.php';
 
	$kra_id = $_GET['kra_id'];
	$kra_desc = $_GET['kra'];
	$kra_obj =$_GET['kra_obj'];
	$obj_id=$_GET['obj_id'];
	$perf_id = $_GET['perf_id'];
	$perf_5 = $_GET['perf_5'];
	$perf_4 = $_GET['perf_4'];
	$perf_3 = $_GET['perf_3'];
	$perf_2 = $_GET['perf_2'];
	$perf_1 = $_GET['perf_1'];
	echo $obj_id;
	echo $perf_id; 
	
	$qry =mysql_query("UPDATE ipcrms_kra, ipcrms_obj, ipcrms_perf_indicator
	set ipcrms_kra.KRA_Description = '".$kra_desc."' , ipcrms_obj.kra_obj ='".$kra_obj."' , ipcrms_perf_indicator.perf_5='".$perf_5."' , ipcrms_perf_indicator.perf_4='".$perf_4."' , ipcrms_perf_indicator.perf_3='".$perf_3."' , ipcrms_perf_indicator.perf_2='".$perf_2."' , ipcrms_perf_indicator.perf_1='".$perf_1."'
	where ipcrms_kra.KRA_ID = ".$kra_id." and ipcrms_obj.OBJ_ID = ".$obj_id." and ipcrms_perf_indicator.perf_id=".$perf_id." ");
	header ("Location:update_perf_indi.php");
?>