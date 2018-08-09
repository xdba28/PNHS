<?php
	session_start();
	include("db_connect.php");
	
	$errorNo = 0;
	$rollbackCall = 0;
	
	$query = "select ed_back from pims_educational_background where emp_No = " . $_GET['id'] . "; ";
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	
	if ( mysqli_num_rows($result) > 0 ){
		$row = mysqli_fetch_array($result);
		
		if ( $_POST['highSchool2'] == null ){
			$ssn = "null";
		}
		else{
			$ssn = "'" . $_POST['highSchool2'] . "'";
		}
		
		if ( $_POST['highSchoolFrom2'] == null ){
			$say = "null";
		}
		else{
			$say = "'" . $_POST['highSchoolFrom2'] . "-" . $_POST['highSchoolTo2'] . "'";
		}
		
		if ( $_POST['college2'] == null ){
			$tsn = "null";
		}
		else{
			$tsn = "'" . $_POST['college2'] . "'";
		}
		
		if ( $_POST['collegeFrom2'] == null ){
			$tay = "null";
		}
		else{
			$tay = "'" . $_POST['collegeFrom2'] . "-" . $_POST['collegeTo2'] . "'";
		}
		
		if ( $_POST['collegeDegree2'] == null ){
			$td = "null";
		}
		else{
			$td = "'" . $_POST['collegeDegree2'] . "'";
		}
		
		if ( $_POST['honorAward2'] == null ){
			$hor = "null";
		}
		else{
			$hor = "'" . $_POST['honorAward2'] . "'";
		}
		
		if ( $_POST['affiliation2'] == null ){
			$a = "null";
		}
		else{
			$a = "'" . $_POST['affiliation2'] . "'";
		}
		
		
		$query = "update pims_educational_background set
					elementary_school_name = '".$_POST['elementary2']."' ,
					elementary_academic_yr = '".$_POST['elementaryFrom2']."-".$_POST['elementaryTo2']."' ,
					secondary_school_name = ".$ssn." ,
					secondary_academic_yr = ".$say." ,
					tertiary_school_name = ".$tsn." ,
					tertiary_academic_yr = ".$tay." ,
					tertiary_degrees = ".$td." ,
					honor_or_award = ".$hor." ,
					affiliations = ".$a."
					where ed_back = ". $row['ed_back'] ."; ";
	}
	else{
		
		if ( $_POST['highSchool2'] == null ){
			$ssn = "null";
		}
		else{
			$ssn = "'" . $_POST['highSchool2'] . "'";
		}
		
		if ( $_POST['highSchoolFrom2'] == null ){
			$say = "null";
		}
		else{
			$say = "'" . $_POST['highSchoolFrom2'] . "-" . $_POST['highSchoolTo2'] . "'";
		}
		
		if ( $_POST['college2'] == null ){
			$tsn = "null";
		}
		else{
			$tsn = "'" . $_POST['college2'] . "'";
		}
		
		if ( $_POST['collegeFrom2'] == null ){
			$tay = "null";
		}
		else{
			$tay = "'" . $_POST['collegeFrom2'] . "-" . $_POST['collegeTo2'] . "'";
		}
		
		if ( $_POST['collegeDegree2'] == null ){
			$td = "null";
		}
		else{
			$td = "'" . $_POST['collegeDegree2'] . "'";
		}
		
		if ( $_POST['honorAward2'] == null ){
			$hor = "null";
		}
		else{
			$hor = "'" . $_POST['honorAward2'] . "'";
		}
		
		if ( $_POST['affiliation2'] == null ){
			$a = "null";
		}
		else{
			$a = "'" . $_POST['affiliation2'] . "'";
		}
		
		$query = "insert pims_educational_background set
					elementary_school_name = '".$_POST['elementary2']."' ,
					elementary_academic_yr = '".$_POST['elementaryFrom2']."-".$_POST['elementaryTo2']."' ,
					secondary_school_name = ".$ssn." ,
					secondary_academic_yr = ".$say." ,
					tertiary_school_name = ".$tsn." ,
					tertiary_academic_yr = ".$tay." ,
					tertiary_degrees = ".$td." ,
					honor_or_award = ".$hor." ,
					affiliations = ".$a." ,
					emp_No = ". $_GET['id'] ."; ";
	}
		
	if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		
	if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
	if ( $errorNo != 0 && $rollbackCall == 0 ){
		mysqli_rollback($_SESSION['pims_data']['connection']);
		$errorString = mysqli_error($_SESSION['pims_data']['connection']);
		$rollbackCall++;
	}
	
	if ( $errorNo == 0 ){
		mysqli_commit($_SESSION['pims_data']['connection']);
	}
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] );
	
	if ( $errorNo == 0 ){
		echo "alertify.success('Educational Background Updated'); ";
	}
	else{
		echo "alertify.error('An error has occured. Rolling back changes<br />Recent error: " . $errorString . "'); ";
	}
?>