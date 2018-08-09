<?php
	// Name: profile3.php
	// 
	// Purpose: To update the PERSONAL INFORMATION of the user in the database
	// 
	// Note: Please don't modify the code below
	// NOT IN USE ANYMORE!!! PLEASE DONT REUSE
	session_start();
	include("db_connect.php");
	
	$errorNo = 0;
	$rollbackCall = 0;
	
	$imageType = $_FILES["Picture1"]["type"];
	
	$id = $_GET['id'];
	
	if ( $_GET['pic'] == 1 ){
		if ( substr($imageType,0,5) == "image"){
			$imageData = base64_encode(file_get_contents($_FILES["Picture1"]["tmp_name"] ) );
			$query = "update pims_personnel set P_picture = '".$imageData."' , pims_image_type = '".$imageType."' where emp_No = ".$id."; ";
			if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		}
		else{
			$imageData = base64_encode(file_get_contents('../img/nopic.png') );
			$imageType = 'image/png';
			$query = "update pims_personnel set P_picture = '".$imageData."' , pims_image_type = '".$imageType."' where emp_No = ".$id."; ";
			if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		}
	}
	
	if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
	if ( $errorNo != 0 && $rollbackCall == 0 ){
		mysqli_rollback($_SESSION['pims_data']['connection']);
		$errorString = mysqli_error($_SESSION['pims_data']['connection']);
		$rollbackCall++;
	}
	
	if ( $_GET['cs'] == 1 ){
		$query = "update pims_personnel set civil_status = '".$_POST['civilStatusOthers1']."' where emp_No = ".$id."; ";
		if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	}
	else if ( $_GET['cs'] == 0 ){
		$query = "update pims_personnel set civil_status = '".$_POST['civilStatus1']."' where emp_No = ".$id."; ";
		if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	}
	
	if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
	if ( $errorNo != 0 && $rollbackCall == 0 ){
		mysqli_rollback($_SESSION['pims_data']['connection']);
		$errorString = mysqli_error($_SESSION['pims_data']['connection']);
		$rollbackCall++;
	}
	
	$query = "update pims_personnel set ";
	
	if ( $_POST['bloodType1'] == null ){
		$query = $query . " bloodtype = null ";
	}
	else{
		$query = $query . " bloodtype = '".$_POST['bloodType1']."' ";
	}
	
	if ( $_POST['gsis1'] == null ){
		$query = $query . " , GSIS_No = null ";
	}
	else{
		$query = $query . " , GSIS_No = '".$_POST['gsis1']."' ";
	}
	
	if ( $_POST['emailAddress1'] == null ){
		$query = $query . " , P_email = null ";
	}
	else{
		$query = $query . " , P_email = '".$_POST['emailAddress1']."' ";
	}
	
	if ( $_POST['contactNo1'] == null ){
		$query = $query . " , pims_contact_no = null ";
	}
	else{
		$query = $query . " , pims_contact_no = '".$_POST['contactNo1']."' ";
	}
	
	$query = $query . " , pims_gender = '".$_POST['gender1']."' ";
	$query = $query . " , pims_birthdate = '".$_POST['birthdate1']."' ";
	$query = $query . " , nationality = '".$_POST['nationality1']."' ";
	
	$query = $query . " where emp_No = ".$id."; ";
	
	if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	
	if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
	if ( $errorNo != 0 && $rollbackCall == 0 ){
		mysqli_rollback($_SESSION['pims_data']['connection']);
		$errorString = mysqli_error($_SESSION['pims_data']['connection']);
		$rollbackCall++;
	}
	
	if ( $_GET['same'] == 1 ){
		
		$query = "update pims_personnel set 
				temp_address_barangay = '".$_POST['permBarangay1']."' ,
				perm_address_barangay = '".$_POST['permBarangay1']."' ,
				temp_address_municipality_city = '".$_POST['permMunicipalityCity1']."' ,
				perm_address_municipality_city = '".$_POST['permMunicipalityCity1']."' ,
				temp_address_zipCode = ".$_POST['permZipCode1'].",
				perm_address_zipCode = ".$_POST['permZipCode1']."
				
		";
		
		if ( $_POST['permStreet1'] == null ){
			$query = $query . " , temp_address_street = null ";
			$query = $query . " , perm_address_street = null ";
		}
		else{
			$query = $query . " , temp_address_street = '".$_POST['permStreet1']."' ";
			$query = $query . " , perm_address_street = '".$_POST['permStreet1']."' ";
		}
		
		if ( $_POST['permHouseNo1'] == null ){
			$query = $query . " , temp_address_house_no = null ";
			$query = $query . " , perm_address_house_no = null ";
		}
		else{
			$query = $query . " , temp_address_house_no = ".$_POST['permHouseNo1']." ";
			$query = $query . " , perm_address_house_no = ".$_POST['permHouseNo1']." ";
		}
//HINALI KO

		if ( $_POST['permProvince1'] == null ){
			$query = $query . " , temp_address_province = null ";
			$query = $query . " , perm_address_province = null ";
		}
		else{
			$query = $query . " , temp_address_province = ".$_POST['permProvince1']." ";
			$query = $query . " , perm_address_province = ".$_POST['permProvince1']." ";
		}

		if ( $_POST['permBarangay1'] == null ){
			$query = $query . " , perm_address_barangay = null ";
		}
		else{
			$query = $query . " , perm_address_barangay= ".$_POST['permBarangay1']." ";
		}

//		

		$query = $query . " where emp_No = ".$id."; ";
		if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		
		if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
		if ( $errorNo != 0 && $rollbackCall == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$errorString = mysqli_error($_SESSION['pims_data']['connection']);
			$rollbackCall++;
		}
		
	}
	else{
		
		$query = "update pims_personnel set 
				perm_address_barangay = '".$_POST['permBarangay1']."' ,
				perm_address_municipality_city = '".$_POST['permMunicipalityCity1']."' ,
				perm_address_province = '".$_POST['permProvince1']."' ,
				perm_address_zipCode = ".$_POST['permZipCode1']."
				
		";
		
		if ( $_POST['permStreet1'] == null ){
			$query = $query . " , perm_address_street = null ";
		}
		else{
			$query = $query . " , perm_address_street = '".$_POST['permStreet1']."' ";
		}
		
		if ( $_POST['permHouseNo1'] == null ){
			$query = $query . " , perm_address_house_no = null ";
		}
		else{
			$query = $query . " , perm_address_house_no = ".$_POST['permHouseNo1']." ";
		}
		$query = $query . " where emp_No = ".$id."; ";
		if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		
		if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
		if ( $errorNo != 0 && $rollbackCall == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$errorString = mysqli_error($_SESSION['pims_data']['connection']);
			$rollbackCall++;
		}
		
		$query = "update pims_personnel set 
				temp_address_barangay = '".$_POST['tempBarangay1']."' ,
				temp_address_municipality_city = '".$_POST['tempMunicipalityCity1']."' ,
				temp_address_province = '".$_POST['tempProvince1']."' ,
				temp_address_zipCode = ".$_POST['tempZipCode1']."
				
		";
		
		if ( $_POST['tempStreet1'] == null ){
			$query = $query . " , temp_address_street = null ";
		}
		else{
			$query = $query . " , temp_address_street = '".$_POST['tempStreet1']."' ";
		}
		
		if ( $_POST['tempHouseNo1'] == null ){
			$query = $query . " , temp_address_house_no = null ";
		}
		else{
			$query = $query . " , temp_address_house_no = ".$_POST['tempHouseNo1']." ";
		}
		$query = $query . " where emp_No = ".$id."; ";
		if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		
		if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
		if ( $errorNo != 0 && $rollbackCall == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$errorString = mysqli_error($_SESSION['pims_data']['connection']);
			$rollbackCall++;
		}
	}

	if ( $errorNo == 0 ){
		mysqli_commit($_SESSION['pims_data']['connection']);
	}
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] );
	
	if ( $errorNo == 0 ){
		echo "alertify.success('Personal Information Updated'); ";
	}
	else{
		echo "alertify.error('An error has occured. Rolling back changes<br />Recent error: " . $errorString . "'); ";
	}
?>