<?php
	// Name: profile4.php
	// 
	// Purpose: To update the family background and educational background on the edit page of profile
	// 
	// Note: Please don't modify the code below
	
	include("db_connect.php");
	
	$echo = "";
	
	$query = "select * from pims_family_background where emp_No = ".$_SESSION['pims_data']['emp_id']." ; ";
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	if ( mysqli_num_rows($result) > 0 ){
		$row = mysqli_fetch_array( $result );
		
		$echo = $echo . " $('#ffname1').val('".$row['father_fname']."'); ";
		$echo = $echo . " $('#fmname1').val('".$row['father_mname']."'); ";
		$echo = $echo . " $('#flname1').val('".$row['father_lname']."'); ";
		$echo = $echo . " $('#fbirthdate1').val('".$row['father_birthdate']."'); ";
		$echo = $echo . " $('#foccupation1').val('".$row['father_occupation']."'); ";
		$echo = $echo . " $('#mfname1').val('".$row['mother_fname']."'); ";
		$echo = $echo . " $('#mmname1').val('".$row['mother_mname']."'); ";
		$echo = $echo . " $('#mmaidenname1').val('".$row['mother_maidenname']."'); ";
		$echo = $echo . " $('#mlname1').val('".$row['mother_lname']."'); ";
		$echo = $echo . " $('#mbirthdate1').val('".$row['mother_birthdate']."'); ";
		$echo = $echo . " $('#moccupation1').val('".$row['mother_occupation']."'); ";
		$echo = $echo . " $('#nos1').val('".$row['no_of_siblings']."'); ";
	}
	
	$query = "select * from pims_educational_background where emp_no = ".$_SESSION['pims_data']['emp_id']." ; ";
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	if ( mysqli_num_rows($result) > 0 ){
		$row = mysqli_fetch_array( $result );
		
		$echo = $echo . " $('#elementary2').val('".$row['elementary_school_name']."'); ";
		$eF = substr( $row['elementary_academic_yr'] , 0 , 4 );
		$eT = substr( $row['elementary_academic_yr'] , 5 , 4 );
		$echo = $echo . " $('#elementaryFrom2').val('".$eF."'); ";
		$echo = $echo . " $('#elementaryTo2').val('".$eT."'); ";
		$echo = $echo . " $('#highSchool2').val('".$row['secondary_school_name']."'); ";
		$sF = substr( $row['secondary_academic_yr'] , 0 , 4 );
		$sT = substr( $row['secondary_academic_yr'] , 5 , 4 );
		$echo = $echo . " $('#highSchoolFrom2').val('".$sF."'); ";
		$echo = $echo . " $('#highSchoolTo2').val('".$sT."'); ";
		$echo = $echo . " $('#college2').val('".$row['tertiary_school_name']."'); ";
		$tF = substr( $row['tertiary_academic_yr'] , 0 , 4 );
		$tT = substr( $row['tertiary_academic_yr'] , 5 , 4 );
		$echo = $echo . " $('#collegeFrom2').val('".$tF."'); ";
		$echo = $echo . " $('#collegeTo2').val('".$tT."'); ";
		$echo = $echo . " $('#collegeDegree2').val('".$row['tertiary_degrees']."'); ";
		$echo = $echo . " $('#honorAward2').val('".$row['honor_or_award']."'); ";
		$echo = $echo . " $('#affiliation2').val('".$row['affiliations']."'); ";
	}
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] );
	
	echo "<script> " . $echo . "</script>";
?>