<?php
include 'connection.php';

$count = $_GET['count'];
$roleid = $_GET['roleid'];

if($roleid==1){
	$qry =("Select ipcrms_obj.OBJ_ID from ipcrms_obj where ipcrms_mfo.MFO_ID = ipcrms_kra.MFO_ID ");
	$rec = mysql_query($qry);
	while($row = mysql_fetch_array($rec)){
			$objids =$row['OBJ_ID'];
			echo $objids;

		}
	}

else{
	
	
}
	
?>