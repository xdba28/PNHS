<?php
	error_reporting(0);
	$q = $_GET['q'];
	
	
	if ( $q == "submitpersonalinfomation" ){
		submitpersonalinfomation();
	}
	
	if ( $q == "submitemploymentrecord" ){
		submitemploymentrecord();
	}
	
	if ( $q == "submitfamilybackground" ){
		submitfamilybackground();
	}
	
	if ( $q == "submiteducationalbackground" ){
		submiteducationalbackground();
	}
	
	
	function submiteducationalbackground(){
		include("db_connect.php");
		
		$errorNo = 0;
		$rollbackCall = 0;
		$insertSuccessful = 0;
		
		$echo = "";
		
		$query = "insert into pims_educational_background set 
			
			elementary_school_name = ".vvin($_POST['elementary2']).",
			secondary_school_name = ".vvin($_POST['highSchool2']).",
			vocational_school_name = ".vvin($_POST['vocational_school_name1']).",
			vocational_course = ".vvin($_POST['vocational_course1']).",
			tertiary_school_name = ".vvin($_POST['college2']).",
			tertiary_degrees = ".vvin($_POST['collegeDegree2']).",
			gradStud_school = ".vvin($_POST['gradStud_school1']).",
			gradStud_course = ".vvin($_POST['gradStud_course1']).",
			highest_units = ".vvin($_POST['highest_units1']).",
			honor_or_award = ".vvin($_POST['honor_or_award1']).",
			affiliations = ".vvin($_POST['affiliations1']).",
			emp_No = ".vvin($_GET['id']).",
			
			
			
			
		
		";
		
		if ( empty($_POST['elementaryFrom2']) || empty($_POST['elementaryTo2']) ){
			$query = $query . " elementary_academic_yr = null, ";
		}
		else{
			$query = $query . " elementary_academic_yr = '".$_POST['elementaryFrom2']."-".$_POST['elementaryTo2']."', ";
		}
		
		if ( empty($_POST['highSchoolFrom2']) || empty($_POST['highSchoolTo2']) ){
			$query = $query . " secondary_academic_yr = null, ";
		}
		else{
			$query = $query . " secondary_academic_yr = '".$_POST['highSchoolFrom2']."-".$_POST['highSchoolTo2']."', ";
		}
		
		if ( empty($_POST['vocational_academic_yrfr']) || empty($_POST['vocational_academic_yrto']) ){
			$query = $query . " vocational_academic_yr = null, ";
		}
		else{
			$query = $query . " vocational_academic_yr = '".$_POST['vocational_academic_yrfr']."-".$_POST['vocational_academic_yrto']."', ";
		}
		
		if ( empty($_POST['collegeFrom2']) || empty($_POST['collegeTo2']) ){
			$query = $query . " tertiary_academic_yr = null, ";
		}
		else{
			$query = $query . " tertiary_academic_yr = '".$_POST['collegeFrom2']."-".$_POST['collegeTo2']."', ";
		}
		
		if ( empty($_POST['gradStud_yrfr']) || empty($_POST['gradStud_yrto']) ){
			$query = $query . " gradStud_yr = null; ";
		}
		else{
			$query = $query . " gradStud_yr = '".$_POST['gradStud_yrfr']."-".$_POST['gradStud_yrto']."'; ";
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
			$echo = $echo . "alertify.success('Done'); ";
		}
		else{
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$echo = $echo . "alertify.log('Error4'); ";
			$myfile = fopen("log4.txt", "w");
			fwrite($myfile, $query);
			fclose($myfile);
		}
		
		mysqli_close( $_SESSION['pims_data']['connection'] );
		unset( $_SESSION['pims_data']['connection'] ); 
		
		echo $echo;
	}
		
	function submitfamilybackground(){
		include("db_connect.php");
		
		$errorNo = 0;
		$rollbackCall = 0;
		$insertSuccessful = 0;
		
		$echo = "";
		
		$query = "insert into pims_family_background set 
			
			spouse_firstname = ".vvin($_POST['sfname1']).",
			spouse_middlename = ".vvin($_POST['smname1']).",
			spouse_lastname = ".vvin($_POST['slname1']).",
			spouse_extension_name = ".vvin($_POST['sename1']).",
			spouse_occupation = ".vvin($_POST['soccupation1']).",
			spouse_business_name = ".vvin($_POST['employerbusinessname1']).",
			spouse_business_addr = ".vvin($_POST['businessaddress1']).",
			spouse_tel_no = ".vvin($_POST['steleponenumber1']).",
			father_fname = ".vvin($_POST['ffname1']).",
			father_mname = ".vvin($_POST['fmname1']).",
			father_lname = ".vvin($_POST['flname1']).",
			father_extension_name = ".vvin($_POST['fename1']).",
			father_birthdate = ".vvin($_POST['fbirthdate1']).",
			father_occupation = ".vvin($_POST['foccupation1']).",
			mother_fname = ".vvin($_POST['mfname1']).",
			mother_mname = ".vvin($_POST['mmname1']).",
			mother_maidenname = ".vvin($_POST['mmaidenname1']).",
			mother_lname = ".vvin($_POST['mlname1']).",
			mother_birthdate = ".vvin($_POST['mbirthdate1']).",
			mother_occupation = ".vvin($_POST['moccupation1']).",
			children_name = ".vvin($_POST['childrenname1']).",
			children_birthdate = ".vvin($_POST['childrenbday1']).",
			emp_No = ".vvin($_GET['id']).";
			
			
			
			
		
		";
		
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
		else{
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$echo = $echo . "alertify.log('Error3'); ";
			$myfile = fopen("log3.txt", "w");
			fwrite($myfile, $query);
			fclose($myfile);
		}
		
		mysqli_close( $_SESSION['pims_data']['connection'] );
		unset( $_SESSION['pims_data']['connection'] ); 
		
		echo $echo;
	}
		
	function submitemploymentrecord(){
		include("db_connect.php");
		
		$errorNo = 0;
		$rollbackCall = 0;
		$insertSuccessful = 0;
		
		$echo = "";
		
		$query = "insert into pims_employment_records set 
			
			complete_item_no = ".vvin($_POST['complete_item_no1']).",
			work_stat = ".vvin($_POST['work_stat1']).",
			role_type = ".vvin($_POST['role_type1']).",
			emp_status = ".vvin($_POST['emp_status1']).",
			date_joined = ".vvin($_POST['date_joined1']).",
			date_retired = ".vvin($_POST['date_retired1']).",
			div_code = ".vvin($_POST['div_code1']).",
			biometric_ID = ".vvin($_POST['biometric_ID1']).",
			school_ID = ".vvin($_POST['school_ID1']).",
			appointment_date = ".vvin($_POST['appointment_date1']).",
			faculty_type = ".vvin($_POST['faculty_type1']).",
			job_title_code = ".vvin($_GET['job']).",
			dept_ID = ".vvin($_GET['dept']).",
			emp_No = ".vvin($_GET['id']).";
		
		";
		
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
		else{
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$echo = $echo . "alertify.log('Error2'); ";
			$myfile = fopen("log2.txt", "w");
			fwrite($myfile, $query);
			fclose($myfile);
		}
		
		mysqli_close( $_SESSION['pims_data']['connection'] );
		unset( $_SESSION['pims_data']['connection'] ); 
		
		echo $echo;
	}
	
	function submitpersonalinfomation(){
		include("db_connect.php");
		
		$errorNo = 0;
		$rollbackCall = 0;
		
		$echo = "";
		
			if ( $_FILES["Picture1"]['name'] == "" ){
				$imageData = base64_encode(file_get_contents('../../img/nopic.png') );
				$imageType = 'image/png';
			}
			else{
				$imageData = base64_encode(file_get_contents($_FILES["Picture1"]["tmp_name"] ) );
				$imageType = $_FILES["Picture1"]["type"];
			}
		// ---- PROFILE PICTURE UPDATE --------
		
		if ( $_POST['checkBoxSame1'] == "checkBoxSame1" ){
			$query = "insert into pims_personnel set 
			
				P_picture = ".vvin($imageData).", 
				pims_image_type = ".vvin($imageType).",
				emp_No = ".vvin($_POST['emp_No1']).",
				P_fname = ".vvin($_POST['fname1']).",
				P_mname = ".vvin($_POST['mname1']).",
				P_lname = ".vvin($_POST['lname1']).",
				P_extension_name = ".vvin($_POST['extension_name1']).",
				P_email = ".vvin($_POST['emailAddress1']).",
				pims_gender = ".vvin($_POST['gender1']).",
				pims_birthdate = ".vvin($_POST['birthdate1']).",
				place_of_birth = ".vvin($_POST['birthplace1']).",
				height_m = ".vvin($_POST['height1']).",
				weight_kg = ".vvin($_POST['weight1']).",
				temp_address_street = ".vvin($_POST['permStreet1']).",
				temp_address_house_no = ".vvin($_POST['permHouseNo1']).",
				temp_address_subdivision_village = ".vvin($_POST['permSubdivisionVillage1']).",
				temp_address_barangay = ".vvin($_POST['permBarangay1']).",
				temp_address_municipality_city = ".vvin($_POST['permMunicipalityCity1']).",
				temp_address_province = ".vvin($_POST['permProvince1']).",
				temp_address_zipCode = ".vvin($_POST['permZipCode1']).",
				perm_address_street = ".vvin($_POST['permStreet1']).",
				perm_address_house_no = ".vvin($_POST['permHouseNo1']).",
				perm_address_subdivision_village = ".vvin($_POST['permSubdivisionVillage1']).",
				perm_address_barangay = ".vvin($_POST['permBarangay1']).",
				perm_address_municipality_city = ".vvin($_POST['permMunicipalityCity1']).",
				perm_address_province = ".vvin($_POST['permProvince1']).",
				perm_address_zipCode = ".vvin($_POST['permZipCode1']).",
				nationality = ".vvin($_POST['nationality1']).",
				dual_citznshp_by_birth = ".vvin($_POST['dual_citznshp_by_birth1']).",
				dual_citznshp_by_naturalization = ".vvin($_POST['dual_citznshp_by_naturalization1']).",
				bloodtype = ".vvin($_POST['bloodType1']).",
				civil_status = ".vvin($_POST['civilStatus1']).",
				pims_religion = ".vvin($_POST['religion1']).",
				pims_contact_no = ".vvin($_POST['contactNo1']).",
				pims_telephone_no = ".vvin($_POST['telephoneNo1']).",
				GSIS_No = ".vvin($_POST['gsis1']).",
				PAG_IBIG_id = ".vvin($_POST['pagibig1']).",
				SSS_no = ".vvin($_POST['sss1']).",
				TIN_no = ".vvin($_POST['tin1']).",
				PHILHEALTH_no = ".vvin($_POST['philhealth1']).";
			
			";
		}
		else{
			$query = "insert into pims_personnel set 
			
				P_picture = ".vvin($imageData).", 
				pims_image_type = ".vvin($imageType).",
				emp_No = ".vvin($_POST['emp_No1']).",
				P_fname = ".vvin($_POST['fname1']).",
				P_mname = ".vvin($_POST['mname1']).",
				P_lname = ".vvin($_POST['lname1']).",
				P_extension_name = ".vvin($_POST['extension_name1']).",
				P_email = ".vvin($_POST['emailAddress1']).",
				pims_gender = ".vvin($_POST['gender1']).",
				pims_birthdate = ".vvin($_POST['birthdate1']).",
				place_of_birth = ".vvin($_POST['birthplace1']).",
				height_m = ".vvin($_POST['height1']).",
				weight_kg = ".vvin($_POST['weight1']).",
				temp_address_street = ".vvin($_POST['tempStreet1']).",
				temp_address_house_no = ".vvin($_POST['tempHouseNo1']).",
				temp_address_subdivision_village = ".vvin($_POST['tempSubdivisionVillage1']).",
				temp_address_barangay = ".vvin($_POST['tempBarangay1']).",
				temp_address_municipality_city = ".vvin($_POST['tempMunicipalityCity1']).",
				temp_address_province = ".vvin($_POST['tempProvince1']).",
				temp_address_zipCode = ".vvin($_POST['tempZipCode1']).",
				perm_address_street = ".vvin($_POST['permStreet1']).",
				perm_address_house_no = ".vvin($_POST['permHouseNo1']).",
				perm_address_subdivision_village = ".vvin($_POST['permSubdivisionVillage1']).",
				perm_address_barangay = ".vvin($_POST['permBarangay1']).",
				perm_address_municipality_city = ".vvin($_POST['permMunicipalityCity1']).",
				perm_address_province = ".vvin($_POST['permProvince1']).",
				perm_address_zipCode = ".vvin($_POST['permZipCode1']).",
				nationality = ".vvin($_POST['nationality1']).",
				dual_citznshp_by_birth = ".vvin($_POST['dual_citznshp_by_birth1']).",
				dual_citznshp_by_naturalization = ".vvin($_POST['dual_citznshp_by_naturalization1']).",
				bloodtype = ".vvin($_POST['bloodType1']).",
				civil_status = ".vvin($_POST['civilStatus1']).",
				pims_religion = ".vvin($_POST['religion1']).",
				pims_contact_no = ".vvin($_POST['contactNo1']).",
				pims_telephone_no = ".vvin($_POST['telephoneNo1']).",
				GSIS_No = ".vvin($_POST['gsis1']).",
				PAG_IBIG_id = ".vvin($_POST['pagibig1']).",
				SSS_no = ".vvin($_POST['sss1']).",
				TIN_no = ".vvin($_POST['tin1']).",
				PHILHEALTH_no = ".vvin($_POST['philhealth1']).";
			
			";
		}
		
		if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
		if ( $errorNo != 0 && $rollbackCall == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$errorString = mysqli_error($_SESSION['pims_data']['connection']);
			$rollbackCall++;
		}
		if ( $errorNo == 0 ) $echo = $echo . " globalvar_personnelID = " . mysqli_insert_id($_SESSION['pims_data']['connection']) . "; " ;
		
		
		
		
		
		
		$query = "select emp_No , pims_birthdate , pims_age from pims_personnel; ";
		$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		while ( $row = mysqli_fetch_array( $result ) ){
			if ( !empty($row['pims_birthdate']) ){
				// --------------------- BDAY ------------------------
				$year = substr( $row['pims_birthdate'] , 0 , 4 );
				$month = substr ( $row['pims_birthdate'] , 5 , 2 );
				$date = substr ( $row['pims_birthdate'] , 8 , 2 );
				
				switch($month){
						case "01": $birthdayStr = "January"; break;
						case "02": $birthdayStr = "February"; break;
						case "03": $birthdayStr = "March"; break;
						case "04": $birthdayStr = "April"; break;
						case "05": $birthdayStr = "May"; break;
						case "06": $birthdayStr = "June"; break;
						case "07": $birthdayStr = "July"; break;
						case "08": $birthdayStr = "August"; break;
						case "09": $birthdayStr = "September"; break;
						case "10": $birthdayStr = "October"; break;
						case "11": $birthdayStr = "November"; break;
						case "12": $birthdayStr = "December"; break;
				}
				
				$birthdayStr = "Date of Birth: " . $birthdayStr . " " . $date . ", " . $year;
				// --------------------- BDAY ------------------------
				
				// --------------------- AGE ------------------------
				//date in mm/dd/yyyy format; or it can be in other formats as well
				$birthDate = $month."-".$date."-".$year;
				//explode the date to get month, day and year
				$birthDate = explode("-", $birthDate);
				//get age from date or birthdate
				$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
					? ((date("Y") - $birthDate[2]) - 1)
					: (date("Y") - $birthDate[2]));
				
				if ( empty($row['pims_age']) || $age != $row['pims_age'] ){
					if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , "update pims_personnel set pims_age = ".$age." where emp_No = ".$row['emp_No']."; " );
					if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
					if ( $errorNo != 0 && $rollbackCall == 0 ){
						mysqli_rollback($_SESSION['pims_data']['connection']);
						$errorString = mysqli_error($_SESSION['pims_data']['connection']);
						$rollbackCall++;
					}
				}
			}
		}
		
		$username = $_POST['fname1'] . "_" . $_POST['lname1'];
		$password = pcrypt( $_POST['fname1'] . "_pnhs", 'ecrypt' );
		
		
		$query = "insert into cms_account set cms_username = '".$username."' , cms_password = '".$password."' , cms_cpasswd = '0' , emp_no = ".$_POST['emp_No1']." , status = '1' , superadmin = '0' , cms_current_log_date = now() , cms_current_log_time = now(); ";
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
		else{
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$echo = $echo . "alertify.log('Error1'); ";
			$myfile = fopen("log.txt", "w");
			fwrite($myfile, $query);
			fclose($myfile);
		}
		
		mysqli_close( $_SESSION['pims_data']['connection'] );
		unset( $_SESSION['pims_data']['connection'] ); 
		
		echo $echo;
	}
	
	function pcrypt( $string, $action) {
	    if(is_string($string)) {
	    	$string = trim($string);
			$secret_key = '696c6f7665706e6873';
    		$secret_iv = '07c67e8365667569';
		    $output = '<unknownvalue>';
		    $encrypt_method = "AES-256-CBC";
		    $key = hash('sha256', $secret_key);
		    $iv = substr(hash('sha256', $secret_iv), 0, 16);
		    if( $action == 'ecrypt' ) {
		        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $secret_key, 0, $secret_iv));
		    }
		    else if($action == 'dcrypt') {
		        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $secret_key, 0, $secret_iv);
		        if(empty($output)) {
		        	$output = '<unknownvalue>';
		        }
		    }
		    return $output;
	    }
	    else {
	    	return '<unknownvalue>';
	    }
	}
	
	function vvin($x){
		if ( empty($x) ){
			return "null";
		}
		else{
			return "'" . $x . "'";
		}
	}
	
?>