<?php
	include("db_connect.php");
	
	$id = $_GET['id'];
	
	$query = "select * from pims_personnel where emp_No = ".$id."; ";
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	$row = mysqli_fetch_array( $result );
	
	
	$nameStr = "NAME: " . $row['P_lname'] . ", " . $row['P_fname'];
	if ( $row['P_mname'] != null ) $nameStr = $nameStr . " " . $row['P_mname'];
	if ( $row['P_extension_name'] != null ) $nameStr = $nameStr . " " . $row['P_extension_name'];
	
	
	
	$echo = '
	$("#name1").html("'.$nameStr.'");
	
	$("#lname1").val("'.$row['P_lname'].'");
	$("#fname1").val("'.$row['P_fname'].'");
	$("#mname1").val("'.$row['P_mname'].'");
	$("#extension_name1").val("'.$row['P_extension_name'].'");
	
	$("#religion1").val("'.$row['pims_religion'].'");
	
	if ( "'.$row['pims_gender'].'" == "Male" ){
		$("input:radio[name=gender1]:nth(0)").attr("checked",true);
	}
	else if ( "'.$row['pims_gender'].'" == "Female" ){
		$("input:radio[name=gender1]:nth(1)").attr("checked",true);
	}
	
	$("#birthdate1").val("'.$row['pims_birthdate'].'");
	$("#nationality1").val("'.$row['nationality'].'");
	
	if ( "'.$row['civil_status'].'" == "Single" ){
		$("input:radio[name=civilStatus1]:nth(0)").attr("checked",true);
	}
	else if ( "'.$row['civil_status'].'" == "Married" ){
		$("input:radio[name=civilStatus1]:nth(1)").attr("checked",true);
	}
	else if ( "'.$row['civil_status'].'" == "Widowed" ){
		$("input:radio[name=civilStatus1]:nth(2)").attr("checked",true);
	}
	else if ( "'.$row['civil_status'].'" == "Seperated" ){
		$("input:radio[name=civilStatus1]:nth(3)").attr("checked",true);
	}
	else{
		$("input:radio[name=civilStatus1]:nth(4)").attr("checked",true);
		$("#civilStatusOthers1").val("'.$row['civil_status'].'");
		$("#civilStatusOthers1").attr("style","display: block");
	}
	
	$("#bloodType1").val("'.$row['bloodtype'].'");
	$("#gsis1").val("'.$row['GSIS_No'].'");
	$("#contactNo1").val("'.$row['pims_contact_no'].'");
	$("#emailAddress1").val("'.$row['P_email'].'");
	
	$("#tempStreet1").val("'.$row['temp_address_street'].'");
	$("#tempHouseNo1").val("'.$row['temp_address_house_no'].'");
	$("#tempBarangay1").val("'.$row['temp_address_barangay'].'");
	$("#tempMunicipalityCity1").val("'.$row['temp_address_municipality_city'].'");
	$("#tempProvince1").val("'.$row['temp_address_province'].'");
	$("#tempZipCode1").val("'.$row['temp_address_zipCode'].'");
	
	$("#permStreet1").val("'.$row['perm_address_street'].'");
	$("#permHouseNo1").val("'.$row['perm_address_house_no'].'");
	$("#permBarangay1").val("'.$row['perm_address_barangay'].'");
	$("#permMunicipalityCity1").val("'.$row['perm_address_municipality_city'].'");
	$("#permProvince1").val("'.$row['perm_address_province'].'");
	$("#permZipCode1").val("'.$row['perm_address_zipCode'].'");
	
	';
	
	$query = "select * from pims_family_background where emp_No = ".$id." ; ";
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
	
	$query = "select * from pims_educational_background where emp_no = ".$id." ; ";
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
	
	$query = "select * from pims_leave_balance where emp_no = ".$id." ; ";
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	if ( mysqli_num_rows($result) > 0 ){
		$row = mysqli_fetch_array( $result );
		
		$echo = $echo . " $('#checkBoxSame2').prop('checked', true); ";
		$echo = $echo . " $('#checkBoxSame2div').attr( {'style': 'display: none' } ); ";
		$echo = $echo . " $('#leaveCredits2div').attr( {'style': 'display: block' } ); ";
		$echo = $echo . " $('#leaveCredits2').val('".$row['leave_credits']."'); ";
		
	}
	
	$query = "select * from pims_employment_records where emp_no = ".$id." ; ";
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	if ( mysqli_num_rows($result) > 0 ){
		$row = mysqli_fetch_array( $result );
		
		$echo = $echo . " $('#completeItemNo1').val('".$row['complete_item_no']."'); ";
		$echo = $echo . " $('#workStatus1').val('".$row['work_stat']."'); ";
		$echo = $echo . " $('#roleType1').val('".$row['role_type']."'); ";
		$echo = $echo . " $('#employmentStatus1').val('".$row['emp_status']."'); ";
		$echo = $echo . " $('#dateJoined1').val('".$row['date_joined']."'); ";
		$echo = $echo . " $('#dateRetired1').val('".$row['date_retired']."'); ";
		$echo = $echo . " $('#divCode1').val('".$row['div_code']."'); ";
		$echo = $echo . " $('#biometricID1').val('".$row['biometric_ID']."'); ";
		$echo = $echo . " $('#schoolID1').val('".$row['school_ID']."'); ";
		$echo = $echo . " $('#appointmentDate1').val('".$row['appointment_date']."'); ";
		$echo = $echo . " $('#facultyType1').val('".$row['faculty_type']."'); ";
		$echo = $echo . " $('#jobTitle1').val('".$row['job_title_code']."'); ";
		
		if ( $row['dept_ID'] == "" ){
			$echo = $echo . " $('#department1').val('null'); ";
		}
		else{
			$echo = $echo . " $('#department1').val('".$row['dept_ID']."'); ";
		}
		
	}
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] ); 
	
	echo "<script>" . $echo . "</script>" ;
?>