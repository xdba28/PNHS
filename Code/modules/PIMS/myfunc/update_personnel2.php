<?php
	// Name: update_personnel2.php
	// 
	// Purpose: To update the PERSONAL INFORMATION of the user in the database
	// 
	// Note: Please don't modify the code below
	session_start();
	include("db_connect.php");
	
	$errorNo = 0;
	$rollbackCall = 0;
	
	$echo = "";
	
	$imageType = $_FILES["Picture1"]["type"];
	
	if ( isset($_GET['id']) ){
		$id = $_GET['id'];
		$query = " update pims_personnel set ";
	
			if ( $_GET['pic'] == 1 ){
				if ( substr($imageType,0,5) == "image"){
					$imageData = base64_encode(file_get_contents($_FILES["Picture1"]["tmp_name"] ) );
					$query = $query . " P_picture = '".$imageData."' , pims_image_type = '".$imageType."' , ";
				}
				else{
					$imageData = base64_encode(file_get_contents('../img/nopic.png') );
					$imageType = 'image/png';
					$query = $query . " P_picture = '".$imageData."' , pims_image_type = '".$imageType."' , ";
				}
			}
			
			if ( $_GET['cs'] == 1 ){
				$query = $query . " civil_status = '".$_POST['civilStatusOthers1']."' , ";
			}
			else if ( $_GET['cs'] == 0 ){
				$query = $query . " civil_status = '".$_POST['civilStatus1']."' , ";
			}
			
			$query =  $query . " P_fname = '".$_POST['fname1']."' , ";
			
			if ( $_POST['mname1'] == null ){
				$query = $query . " P_mname = null , ";
			}
			else{
				$query = $query . " P_mname = '".$_POST['mname1']."' , ";
			}
			
			$query = $query . " P_lname = '".$_POST['lname1']."' , ";
			
			if ( $_POST['extension_name1'] == null ){
				$query = $query . " P_extension_name = null , ";
			}
			else{
				$query = $query . " P_extension_name = '".$_POST['extension_name1']."' , ";
			}

			if ( $_POST['bloodType1'] == null ){
				$query = $query . " bloodtype = null , ";
			}
			else{
				$query = $query . " bloodtype = '".$_POST['bloodType1']."' , ";
			}
			
			if ( $_POST['gsis1'] == null ){
				$query = $query . " GSIS_No = null , ";
			}
			else{
				$query = $query . " GSIS_No = '".$_POST['gsis1']."' , ";
			}
			
			if ( $_POST['emailAddress1'] == null ){
				$query = $query . " P_email = null , ";
			}
			else{
				$query = $query . " P_email = '".$_POST['emailAddress1']."' , ";
			}
			
			if ( $_POST['contactNo1'] == null ){
				$query = $query . " pims_contact_no = null , ";
			}
			else{
				$query = $query . " pims_contact_no = '".$_POST['contactNo1']."' , ";
			}
			
			$query = $query . " pims_gender = '".$_POST['gender1']."' , ";
			$query = $query . " pims_birthdate = '".$_POST['birthdate1']."' , ";
			$query = $query . " nationality = '".$_POST['nationality1']."' , ";
			
			$year = substr( $_POST['birthdate1'] , 0 , 4 );
			$month = substr ( $_POST['birthdate1'] , 5 , 2 );
			$date = substr ( $_POST['birthdate1'] , 8 , 2 );
			
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
			$query = $query . " pims_age = '".$age."' , ";
			$query = $query . " pims_religion = '".$_POST['religion1']."' , ";
			
			
			if ( $_GET['same'] == 1 ){
				
				$query = $query . "
						temp_address_barangay = '".$_POST['permBarangay1']."' ,
						perm_address_barangay = '".$_POST['permBarangay1']."' ,
						temp_address_municipality_city = '".$_POST['permMunicipalityCity1']."' ,
						perm_address_municipality_city = '".$_POST['permMunicipalityCity1']."' ,
						temp_address_province = '".$_POST['permProvince1']."' ,
						perm_address_province = '".$_POST['permProvince1']."' ,
						temp_address_zipCode = ".$_POST['permZipCode1'].",
						perm_address_zipCode = ".$_POST['permZipCode1']." ,
						
				";
				
				if ( $_POST['permStreet1'] == null ){
					$query = $query . " temp_address_street = null , ";
					$query = $query . " perm_address_street = null , ";
				}
				else{
					$query = $query . " temp_address_street = '".$_POST['permStreet1']."' , ";
					$query = $query . " perm_address_street = '".$_POST['permStreet1']."' , ";
				}
				
				if ( $_POST['permHouseNo1'] == null ){
					$query = $query . " temp_address_house_no = null , ";
					$query = $query . " perm_address_house_no = null ";
				}
				else{
					$query = $query . " temp_address_house_no = ".$_POST['permHouseNo1']." , ";
					$query = $query . " perm_address_house_no = ".$_POST['permHouseNo1']." ";
				}
//DINAGDAG KO
				if ( $_POST['permBarangay1'] == null ){
					$query = $query . " perm_address_barangay = null ";
				}
				else{
					$query = $query . " perm_address_barangay = ".$_POST['permBarangay1']." ";
				}

				if ( $_POST['permProvince1'] == null ){
					$query = $query . " temp_address_province = null , ";
					$query = $query . " perm_address_province = null ";
				}
				else{
					$query = $query . " temp_address_province = ".$_POST['permProvince1']." , ";
					$query = $query . " perm_address_province = ".$_POST['permProvince1']." ";
				}
//
				
			}
			else{
				
				$query = $query . " perm_address_municipality_city = '".$_POST['permMunicipalityCity1']."' ,
						perm_address_zipCode = ".$_POST['permZipCode1']." ,
						
				";
				
				if ( $_POST['permStreet1'] == null ){
					$query = $query . " perm_address_street = null , ";
				}
				else{
					$query = $query . " perm_address_street = '".$_POST['permStreet1']."' , ";
				}
				
				if ( $_POST['permHouseNo1'] == null ){
					$query = $query . " perm_address_house_no = null , ";
				}
				else{
					$query = $query . " perm_address_house_no = ".$_POST['permHouseNo1']." , ";
				}
				
				$query = $query . " temp_address_barangay = '".$_POST['tempBarangay1']."' ,
						temp_address_municipality_city = '".$_POST['tempMunicipalityCity1']."' ,
						temp_address_zipCode = ".$_POST['tempZipCode1']." ,
						
				";
				
				if ( $_POST['tempStreet1'] == null ){
					$query = $query . " temp_address_street = null , ";
				}
				else{
					$query = $query . " temp_address_street = '".$_POST['tempStreet1']."' , ";
				}
				
				if ( $_POST['tempHouseNo1'] == null ){
					$query = $query . " temp_address_house_no = null ";
				}
				else{
					$query = $query . " temp_address_house_no = ".$_POST['tempHouseNo1']." ";
				}
//DINAGDAG KO
				if ( $_POST['tempProvince1'] == null ){
					$query = $query . " temp_address_province = null ";
				}
				else{
					$query = $query . " temp_address_province = ".$_POST['tempProvince1']." ";
				}
//

			}
			
			$query = $query . " where emp_No = ".$id."; ";
			
			if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
			
			if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
			if ( $errorNo != 0 && $rollbackCall == 0 ){
				mysqli_rollback($_SESSION['pims_data']['connection']);
				$errorString = $errorNo;
				$rollbackCall++;
			}
			else{
				$echo = $echo . " submitForm2_1(".$_GET['id']."); ";
			}

	}
	else{
		
		$query = " insert into pims_personnel set ";
	
			if ( $_GET['pic'] == 1 ){
				if ( substr($imageType,0,5) == "image"){
					$imageData = base64_encode(file_get_contents($_FILES["Picture1"]["tmp_name"] ) );
					$query = $query . " P_picture = '".$imageData."' , pims_image_type = '".$imageType."' , ";
				}
				else{
					$imageData = base64_encode(file_get_contents('../img/nopic.png') );
					$imageType = 'image/png';
					$query = $query . " P_picture = '".$imageData."' , pims_image_type = '".$imageType."' , ";
				}
			}
			
			if ( $_GET['cs'] == 1 ){
				$query = $query . " civil_status = '".$_POST['civilStatusOthers1']."' , ";
			}
			else if ( $_GET['cs'] == 0 ){
				$query = $query . " civil_status = '".$_POST['civilStatus1']."' , ";
			}
			
			$query =  $query . " P_fname = '".$_POST['fname1']."' , ";
			
			if ( $_POST['mname1'] == null ){
				$query = $query . " P_mname = null , ";
			}
			else{
				$query = $query . " P_mname = '".$_POST['mname1']."' , ";
			}
			
			$query = $query . " P_lname = '".$_POST['lname1']."' , ";
			
			if ( $_POST['extension_name1'] == null ){
				$query = $query . " P_extension_name = null , ";
			}
			else{
				$query = $query . " P_extension_name = '".$_POST['extension_name1']."' , ";
			}

			if ( $_POST['bloodType1'] == null ){
				$query = $query . " bloodtype = null , ";
			}
			else{
				$query = $query . " bloodtype = '".$_POST['bloodType1']."' , ";
			}
			
			if ( $_POST['gsis1'] == null ){
				$query = $query . " GSIS_No = null , ";
			}
			else{
				$query = $query . " GSIS_No = '".$_POST['gsis1']."' , ";
			}
			
			if ( $_POST['emailAddress1'] == null ){
				$query = $query . " P_email = null , ";
			}
			else{
				$query = $query . " P_email = '".$_POST['emailAddress1']."' , ";
			}
			
			if ( $_POST['contactNo1'] == null ){
				$query = $query . " pims_contact_no = null , ";
			}
			else{
				$query = $query . " pims_contact_no = '".$_POST['contactNo1']."' , ";
			}
			
			$query = $query . " pims_gender = '".$_POST['gender1']."' , ";
			$query = $query . " pims_birthdate = '".$_POST['birthdate1']."' , ";
			$query = $query . " nationality = '".$_POST['nationality1']."' , ";
			
			$year = substr( $_POST['birthdate1'] , 0 , 4 );
			$month = substr ( $_POST['birthdate1'] , 5 , 2 );
			$date = substr ( $_POST['birthdate1'] , 8 , 2 );
			
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
			$query = $query . " pims_age = '".$age."' , ";
			$query = $query . " pims_religion = '".$_POST['religion1']."' , ";
			
			if ( $_GET['same'] == 1 ){
				
				$query = $query . "
						temp_address_barangay = '".$_POST['permBarangay1']."' ,
						perm_address_barangay = '".$_POST['permBarangay1']."' ,
						temp_address_municipality_city = '".$_POST['permMunicipalityCity1']."' ,
						perm_address_municipality_city = '".$_POST['permMunicipalityCity1']."' ,
						temp_address_province = '".$_POST['permProvince1']."' ,
						perm_address_province = '".$_POST['permProvince1']."' ,
						temp_address_zipCode = ".$_POST['permZipCode1'].",
						perm_address_zipCode = ".$_POST['permZipCode1']." ,
						
				";
				
				if ( $_POST['permStreet1'] == null ){
					$query = $query . " temp_address_street = null , ";
					$query = $query . " perm_address_street = null , ";
				}
				else{
					$query = $query . " temp_address_street = '".$_POST['permStreet1']."' , ";
					$query = $query . " perm_address_street = '".$_POST['permStreet1']."' , ";
				}
				
				if ( $_POST['permHouseNo1'] == null ){
					$query = $query . " temp_address_house_no = null , ";
					$query = $query . " perm_address_house_no = null ";
				}
				else{
					$query = $query . " temp_address_house_no = ".$_POST['permHouseNo1']." , ";
					$query = $query . " perm_address_house_no = ".$_POST['permHouseNo1']." ";
				}
//DINAGDAG KO
				if ( $_POST['permProvince1'] == null ){
					$query = $query . " temp_address_province = null , ";
					$query = $query . " perm_address_province = null , ";
				}
				else{
					$query = $query . " temp_address_province = '".$_POST['permProvince1']."' , ";
					$query = $query . " perm_address_province = '".$_POST['permProvince1']."' , ";
				}
				if ( $_POST['permBarangay1'] == null ){
					$query = $query . " perm_address_barangay = null , ";
				}
				else{
					$query = $query . " temp_address_barangay = '".$_POST['permBarangay1']."' , ";
					$query = $query . " perm_address_barangay = '".$_POST['permBarangay1']."' , ";
				}
//				

			}
			else{
				
				$query = $query . " perm_address_barangay = '".$_POST['permBarangay1']."' ,
						perm_address_municipality_city = '".$_POST['permMunicipalityCity1']."' ,
						perm_address_province = '".$_POST['permProvince1']."' ,
						perm_address_zipCode = ".$_POST['permZipCode1']." ,
						
				";
				
				if ( $_POST['permStreet1'] == null ){
					$query = $query . " perm_address_street = null , ";
				}
				else{
					$query = $query . " perm_address_street = '".$_POST['permStreet1']."' , ";
				}
				
				if ( $_POST['permHouseNo1'] == null ){
					$query = $query . " perm_address_house_no = null , ";
				}
				else{
					$query = $query . " perm_address_house_no = ".$_POST['permHouseNo1']." , ";
				}
				
				$query = $query . " temp_address_barangay = '".$_POST['tempBarangay1']."' ,
						temp_address_municipality_city = '".$_POST['tempMunicipalityCity1']."' ,
						temp_address_zipCode = ".$_POST['tempZipCode1']." ,
						
				";
				
				if ( $_POST['tempStreet1'] == null ){
					$query = $query . " temp_address_street = null , ";
				}
				else{
					$query = $query . " temp_address_street = '".$_POST['tempStreet1']."' , ";
				}
				
				if ( $_POST['tempHouseNo1'] == null ){
					$query = $query . " temp_address_house_no = null ";
				}
				else{
					$query = $query . " temp_address_house_no = ".$_POST['tempHouseNo1']." ";
				}
//DINAGDAG KO
				if ( $_POST['tempProvince1'] == null ){
					$query = $query . " temp_address_province = null ";
				}
				else{
					$query = $query . " temp_address_province = ".$_POST['tempProvince1']." ";
				}
//

			}
			
			if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	
			if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
			if ( $errorNo != 0 && $rollbackCall == 0 ){
				mysqli_rollback($_SESSION['pims_data']['connection']);
				$errorString = $errorNo;
				$rollbackCall++;
			}
			else{
				$varID = mysqli_insert_id($_SESSION['pims_data']['connection']);
				$echo = $echo . " submitForm2_1(".$varID."); ";
			}
			
			
	}
	
	
	
	
	
	
	if ( $errorNo == 0 ){
		mysqli_commit($_SESSION['pims_data']['connection']);
	}
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] );
	
	if ( $errorNo == 0 ){
		$echo = "alertify.success('Personal Information Updated'); " . $echo;
	}
	else{
		$echo = "alertify.error('An error has occured. Rolling back changes<br />Recent error: " . $errorString . "'); ";
	}
	
	echo $echo;
?>