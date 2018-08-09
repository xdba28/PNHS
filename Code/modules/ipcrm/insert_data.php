<?php
include 'connection.php';

date_default_timezone_set('Asia/Manila');
$date=date("Y-m-d");


session_start();

$aid=$_SESSION['user_data']['acct']['cms_account_ID'];
$eid=$_SESSION['user_data']['acct']['emp_no'];
$name=mysql_query("SELECT concat(p_fname,' ',p_lname) as Name,job_title_name FROM pims_personnel,pims_employment_records,pims_job_title
WHERE pims_personnel.emp_no=pims_employment_records.emp_no
AND pims_job_title.job_title_code=pims_employment_records.job_title_code
AND pims_personnel.emp_no=$eid");
$nrow=mysql_fetch_assoc($name);
$_SESSION['job_title']=$nrow['job_title_name'];	
$jt=$_SESSION['job_title'];



$mfoid = $_GET['mfoid'];
if($mfoid == 2){
	$qry = mysql_query("Select ipcrms_obj.OBJ_ID, ipcrms_mfo.MFO_ID, ipcrms_kra.KRA_ID, ipcrms_obj.kra_wpk from ipcrms_obj, ipcrms_mfo, ipcrms_kra where ipcrms_kra.MFO_ID=".$mfoid." and ipcrms_obj.KRA_ID = ipcrms_kra.KRA_ID and ipcrms_kra.MFO_ID=ipcrms_mfo.MFO_ID ");
		if($qry){	
			while($row = mysql_fetch_array($qry)){
			$objID = $row['OBJ_ID'];
			$wpk = $row['kra_wpk'];
			
			$emp_no = $eid;
			$q = $_GET['q'.$objID.''];
			$e = $_GET['e'.$objID.''];
			$t = $_GET['t'.$objID.''];
			$syy = $_GET['sy'];
		
			
			$rating = ($q + $e + $t)/3;
			$score = $rating * $wpk ;
			
			
		$qryy = mysql_query("Insert into ipcrms_content (ipcr_res_id, q_val, e_val, t_val, OBJ_ID, rating , score, emp_No, Status, date_submitted,sy_id) 
							values('', '$q', '$e', '$t', '$objID', '$rating', '$score', '$emp_no' , 'Pending', '$date',$syy)");

	
		
		
		echo "<SCRIPT LANGUAGE= 'JavaScript'>
								window.location = 'user_form11dis.php';
							</SCRIPT>";
			}
		}
}
else{
	$qry = mysql_query("Select ipcrms_obj.OBJ_ID, ipcrms_mfo.MFO_ID, ipcrms_kra.KRA_ID, ipcrms_obj.kra_wpk from ipcrms_obj, ipcrms_mfo, ipcrms_kra where ipcrms_kra.MFO_ID=".$mfoid." and ipcrms_obj.KRA_ID = ipcrms_kra.KRA_ID and ipcrms_kra.MFO_ID=ipcrms_mfo.MFO_ID ");
	if($qry){	
		while($row = mysql_fetch_array($qry)){
		$objID = $row['OBJ_ID'];
		$wpk = $row['kra_wpk'];
		
		$emp_no = $eid;
		$q = $_GET['q'.$objID.''];
		$e = $_GET['e'.$objID.''];
		$t = $_GET['t'.$objID.''];
		$syy = $_GET['sy'];
	
		
		$rating = ($q + $e + $t)/3;
		$score = $rating * $wpk  ;
		$oa+=number_format($score,2);
		
	$qryy = mysql_query("Insert into ipcrms_content (ipcr_res_id, q_val, e_val, t_val, OBJ_ID, rating , score, emp_No, Status, date_submitted,sy_id) values ('', '$q', '$e', '$t', '$objID', '$rating', '$score', '$emp_no' , 'Pending', '$date',$syy)");
	


		
		echo "<SCRIPT LANGUAGE= 'JavaScript'>
								window.location = 'user_form11dis.php';
							</SCRIPT>";
		 
		}
	}
	
}

	
?>