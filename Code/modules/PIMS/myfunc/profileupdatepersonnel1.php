<?php

	session_start();
	include("db_connect.php");
	
	$errorNo = 0;
	$rollbackCall = 0;
	$insertSuccessful = 0;

	$query = "insert into pims_profile_updates set emp_No = ".$_SESSION['pims_data']['emp_id']." , p_update_date = now() , p_update_status = 'Pending' , p_update_table = '1'; ";
	if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
	if ( $errorNo != 0 && $rollbackCall == 0 ){
		mysqli_rollback($_SESSION['pims_data']['connection']);
		$errorString = mysqli_error($_SESSION['pims_data']['connection']);
		$rollbackCall++;
	}
	if ( $errorNo == 0 ) $pu_id = mysqli_insert_id($_SESSION['pims_data']['connection']);
	
	$query = "select * from pims_personnel where emp_No = ".$_SESSION['pims_data']['emp_id']."; ";
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	$row = mysqli_fetch_array($result);
	
	// ------------- PICTURE UPDATE --------------------
	$imageType = $_FILES["Picture1"]["type"];
	if ( $_GET['pic'] == 1 ){
		if ( substr($imageType,0,5) == "image"){
			$imageData = base64_encode(file_get_contents($_FILES["Picture1"]["tmp_name"] ) );
			$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'P_picture' , p_data_column = 'p_data_blob' , p_data_blob = '".$imageData."' , p_data_text = '".$imageType."'; ";
			if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
			if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
			if ( $errorNo == 0 ) $insertSuccessful++;
			if ( $errorNo != 0 && $rollbackCall == 0 ){
				mysqli_rollback($_SESSION['pims_data']['connection']);
				$errorString = mysqli_error($_SESSION['pims_data']['connection']);
				$rollbackCall++;
			}
		}
		else{
			$imageData = base64_encode(file_get_contents('../img/nopic.png') );
			$imageType = 'image/png';
			$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'P_picture' , p_data_column = 'p_data_blob' , p_data_blob = '".$imageData."' , p_data_text = '".$imageType."'; ";
			if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
			if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
			if ( $errorNo == 0 ) $insertSuccessful++;
			if ( $errorNo != 0 && $rollbackCall == 0 ){
				mysqli_rollback($_SESSION['pims_data']['connection']);
				$errorString = mysqli_error($_SESSION['pims_data']['connection']);
				$rollbackCall++;
			}
		}
	}
	// ------------- PICTURE UPDATE --------------------
	
	// ------------- pims_gender UPDATE --------------------
	if ( $row['pims_gender'] != $_POST['gender1'] ){
		$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'pims_gender' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['gender1']."'; ";
		if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
		if ( $errorNo == 0 ) $insertSuccessful++;
		if ( $errorNo != 0 && $rollbackCall == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$errorString = mysqli_error($_SESSION['pims_data']['connection']);
			$rollbackCall++;
		}
	}
	// ------------- pims_gender UPDATE --------------------
	
	// ------------- pims_birthdate UPDATE --------------------
	if ( $row['pims_birthdate'] != $_POST['birthdate1'] ){
		$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'pims_birthdate' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['birthdate1']."'; ";
		if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
		if ( $errorNo == 0 ) $insertSuccessful++;
		if ( $errorNo != 0 && $rollbackCall == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$errorString = mysqli_error($_SESSION['pims_data']['connection']);
			$rollbackCall++;
		}
	}
	// ------------- pims_birthdate UPDATE --------------------
	
	// ------------- nationality UPDATE --------------------
	if ( $row['nationality'] != $_POST['nationality1'] ){
		$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'nationality' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['nationality1']."'; ";
		if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
		if ( $errorNo == 0 ) $insertSuccessful++;
		if ( $errorNo != 0 && $rollbackCall == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$errorString = mysqli_error($_SESSION['pims_data']['connection']);
			$rollbackCall++;
		}
	}
	// ------------- nationality UPDATE --------------------
	
	// ------------- civil_status UPDATE --------------------
	if ( $_GET['cs'] == 1 ){
		if ( $row['civil_status'] != $_POST['civilStatusOthers1'] ){
			$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'civil_status' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['civilStatusOthers1']."'; ";
			if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
			if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
			if ( $errorNo == 0 ) $insertSuccessful++;
			if ( $errorNo != 0 && $rollbackCall == 0 ){
				mysqli_rollback($_SESSION['pims_data']['connection']);
				$errorString = mysqli_error($_SESSION['pims_data']['connection']);
				$rollbackCall++;
			}
		}
	}
	else if ( $_GET['cs'] == 0 ){
		if ( $row['civil_status'] != $_POST['civilStatus1'] ){
			$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'civil_status' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['civilStatus1']."'; ";
			if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
			if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
			if ( $errorNo == 0 ) $insertSuccessful++;
			if ( $errorNo != 0 && $rollbackCall == 0 ){
				mysqli_rollback($_SESSION['pims_data']['connection']);
				$errorString = mysqli_error($_SESSION['pims_data']['connection']);
				$rollbackCall++;
			}
		}
	}
	// ------------- civil_status UPDATE --------------------
	
	// ------------- bloodtype UPDATE --------------------
	if ( $row['bloodtype'] != $_POST['bloodType1'] ){
		$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'bloodtype' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['bloodType1']."'; ";
		if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
		if ( $errorNo == 0 ) $insertSuccessful++;
		if ( $errorNo != 0 && $rollbackCall == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$errorString = mysqli_error($_SESSION['pims_data']['connection']);
			$rollbackCall++;
		}
	}
	// ------------- bloodtype UPDATE --------------------
	
	// ------------- GSIS_No UPDATE --------------------
	if ( $row['GSIS_No'] != $_POST['gsis1'] ){
		$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'GSIS_No' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['gsis1']."'; ";
		if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
		if ( $errorNo == 0 ) $insertSuccessful++;
		if ( $errorNo != 0 && $rollbackCall == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$errorString = mysqli_error($_SESSION['pims_data']['connection']);
			$rollbackCall++;
		}
	}
	// ------------- GSIS_No UPDATE --------------------
	
	// ------------- pims_contact_no UPDATE --------------------
	if ( $row['pims_contact_no'] != $_POST['contactNo1'] ){
		$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'pims_contact_no' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['contactNo1']."'; ";
		if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
		if ( $errorNo == 0 ) $insertSuccessful++;
		if ( $errorNo != 0 && $rollbackCall == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$errorString = mysqli_error($_SESSION['pims_data']['connection']);
			$rollbackCall++;
		}
	}
	// ------------- pims_contact_no UPDATE --------------------
	
	// ------------- P_email UPDATE --------------------
	if ( $row['P_email'] != $_POST['emailAddress1'] ){
		$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'P_email' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['emailAddress1']."'; ";
		if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
		if ( $errorNo == 0 ) $insertSuccessful++;
		if ( $errorNo != 0 && $rollbackCall == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$errorString = mysqli_error($_SESSION['pims_data']['connection']);
			$rollbackCall++;
		}
	}
	// ------------- P_email UPDATE --------------------
	
	// ------------- pims_religion UPDATE --------------------
	if ( $row['pims_religion'] != $_POST['religion1'] ){
		$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'pims_religion' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['religion1']."'; ";
		if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
		if ( $errorNo == 0 ) $insertSuccessful++;
		if ( $errorNo != 0 && $rollbackCall == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$errorString = mysqli_error($_SESSION['pims_data']['connection']);
			$rollbackCall++;
		}
	}
	// ------------- pims_religion UPDATE --------------------
	
	// ------------- ADDRESS UPDATE --------------------
	if ( $_GET['same'] == 1 ){
		// ------------- temp_address_barangay - perm_address_barangay UPDATE --------------------
			$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'temp_address_barangay' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['permBarangay1']."'; ";
			if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
			if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
			if ( $errorNo == 0 ) $insertSuccessful++;
			if ( $errorNo != 0 && $rollbackCall == 0 ){
				mysqli_rollback($_SESSION['pims_data']['connection']);
				$errorString = mysqli_error($_SESSION['pims_data']['connection']);
				$rollbackCall++;
			}
			$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'perm_address_barangay' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['permBarangay1']."'; ";
			if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
			if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
			if ( $errorNo == 0 ) $insertSuccessful++;
			if ( $errorNo != 0 && $rollbackCall == 0 ){
				mysqli_rollback($_SESSION['pims_data']['connection']);
				$errorString = mysqli_error($_SESSION['pims_data']['connection']);
				$rollbackCall++;
			}
		// ------------- temp_address_barangay - perm_address_barangay UPDATE --------------------
		// ------------- temp_address_municipality_city - perm_address_municipality_city UPDATE --------------------
			$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'temp_address_municipality_city' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['permMunicipalityCity1']."'; ";
			if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
			if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
			if ( $errorNo == 0 ) $insertSuccessful++;
			if ( $errorNo != 0 && $rollbackCall == 0 ){
				mysqli_rollback($_SESSION['pims_data']['connection']);
				$errorString = mysqli_error($_SESSION['pims_data']['connection']);
				$rollbackCall++;
			}
			$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'perm_address_municipality_city' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['permMunicipalityCity1']."'; ";
			if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
			if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
			if ( $errorNo == 0 ) $insertSuccessful++;
			if ( $errorNo != 0 && $rollbackCall == 0 ){
				mysqli_rollback($_SESSION['pims_data']['connection']);
				$errorString = mysqli_error($_SESSION['pims_data']['connection']);
				$rollbackCall++;
			}
		// ------------- temp_address_municipality_city - perm_address_municipality_city UPDATE --------------------
		// ------------- temp_address_province - perm_address_province UPDATE --------------------
			$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'temp_address_province' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['permProvince1']."'; ";
			if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
			if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
			if ( $errorNo == 0 ) $insertSuccessful++;
			if ( $errorNo != 0 && $rollbackCall == 0 ){
				mysqli_rollback($_SESSION['pims_data']['connection']);
				$errorString = mysqli_error($_SESSION['pims_data']['connection']);
				$rollbackCall++;
			}
			$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'perm_address_province' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['permProvince1']."'; ";
			if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
			if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
			if ( $errorNo == 0 ) $insertSuccessful++;
			if ( $errorNo != 0 && $rollbackCall == 0 ){
				mysqli_rollback($_SESSION['pims_data']['connection']);
				$errorString = mysqli_error($_SESSION['pims_data']['connection']);
				$rollbackCall++;
			}
		// ------------- temp_address_province - perm_address_province UPDATE --------------------
		// ------------- temp_address_zipCode - perm_address_zipCode UPDATE --------------------
			$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'temp_address_zipCode' , p_data_column = 'p_data_int' , p_data_int = ".$_POST['permZipCode1']."; ";
			if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
			if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
			if ( $errorNo == 0 ) $insertSuccessful++;
			if ( $errorNo != 0 && $rollbackCall == 0 ){
				mysqli_rollback($_SESSION['pims_data']['connection']);
				$errorString = mysqli_error($_SESSION['pims_data']['connection']);
				$rollbackCall++;
			}
			$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'perm_address_zipCode' , p_data_column = 'p_data_int' , p_data_int = ".$_POST['permZipCode1']."; ";
			if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
			if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
			if ( $errorNo == 0 ) $insertSuccessful++;
			if ( $errorNo != 0 && $rollbackCall == 0 ){
				mysqli_rollback($_SESSION['pims_data']['connection']);
				$errorString = mysqli_error($_SESSION['pims_data']['connection']);
				$rollbackCall++;
			}
		// ------------- temp_address_zipCode - perm_address_zipCode UPDATE --------------------
		// ------------- temp_address_street - perm_address_street UPDATE --------------------
			if ( $_POST['permStreet1'] == null ){
				$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'temp_address_street' , p_data_column = 'p_data_text' , p_data_text = null; ";
				if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
				if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
				if ( $errorNo == 0 ) $insertSuccessful++;
				if ( $errorNo != 0 && $rollbackCall == 0 ){
					mysqli_rollback($_SESSION['pims_data']['connection']);
					$errorString = mysqli_error($_SESSION['pims_data']['connection']);
					$rollbackCall++;
				}
				$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'perm_address_street' , p_data_column = 'p_data_text' , p_data_text = null; ";
				if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
				if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
				if ( $errorNo == 0 ) $insertSuccessful++;
				if ( $errorNo != 0 && $rollbackCall == 0 ){
					mysqli_rollback($_SESSION['pims_data']['connection']);
					$errorString = mysqli_error($_SESSION['pims_data']['connection']);
					$rollbackCall++;
				}
			}
			else{
				$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'temp_address_street' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['permStreet1']."'; ";
				if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
				if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
				if ( $errorNo == 0 ) $insertSuccessful++;
				if ( $errorNo != 0 && $rollbackCall == 0 ){
					mysqli_rollback($_SESSION['pims_data']['connection']);
					$errorString = mysqli_error($_SESSION['pims_data']['connection']);
					$rollbackCall++;
				}
				$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'perm_address_street' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['permStreet1']."'; ";
				if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
				if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
				if ( $errorNo == 0 ) $insertSuccessful++;
				if ( $errorNo != 0 && $rollbackCall == 0 ){
					mysqli_rollback($_SESSION['pims_data']['connection']);
					$errorString = mysqli_error($_SESSION['pims_data']['connection']);
					$rollbackCall++;
				}
			}
		// ------------- temp_address_street - perm_address_street UPDATE --------------------
		// ------------- temp_address_house_no - perm_address_house_no UPDATE --------------------
			if ( $_POST['permHouseNo1'] == null ){
				$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'temp_address_house_no' , p_data_column = 'p_data_int' , p_data_int = null; ";
				if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
				if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
				if ( $errorNo == 0 ) $insertSuccessful++;
				if ( $errorNo != 0 && $rollbackCall == 0 ){
					mysqli_rollback($_SESSION['pims_data']['connection']);
					$errorString = mysqli_error($_SESSION['pims_data']['connection']);
					$rollbackCall++;
				}
				$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'perm_address_house_no' , p_data_column = 'p_data_int' , p_data_int = null; ";
				if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
				if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
				if ( $errorNo == 0 ) $insertSuccessful++;
				if ( $errorNo != 0 && $rollbackCall == 0 ){
					mysqli_rollback($_SESSION['pims_data']['connection']);
					$errorString = mysqli_error($_SESSION['pims_data']['connection']);
					$rollbackCall++;
				}
			}
			else{
				$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'temp_address_house_no' , p_data_column = 'p_data_int' , p_data_int = ".$_POST['permHouseNo1']."; ";
				if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
				if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
				if ( $errorNo == 0 ) $insertSuccessful++;
				if ( $errorNo != 0 && $rollbackCall == 0 ){
					mysqli_rollback($_SESSION['pims_data']['connection']);
					$errorString = mysqli_error($_SESSION['pims_data']['connection']);
					$rollbackCall++;
				}
				$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'perm_address_house_no' , p_data_column = 'p_data_int' , p_data_int = ".$_POST['permHouseNo1']."; ";
				if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
				if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
				if ( $errorNo == 0 ) $insertSuccessful++;
				if ( $errorNo != 0 && $rollbackCall == 0 ){
					mysqli_rollback($_SESSION['pims_data']['connection']);
					$errorString = mysqli_error($_SESSION['pims_data']['connection']);
					$rollbackCall++;
				}
			}
		// ------------- temp_address_house_no - perm_address_house_no UPDATE --------------------
	}
	else{
		// ------------- temp_address_barangay UPDATE --------------------
		if ( $row['temp_address_barangay'] !== $_POST['tempBarangay1'] ){
			$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'temp_address_barangay' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['tempBarangay1']."'; ";
			if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
			if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
			if ( $errorNo == 0 ) $insertSuccessful++;
			if ( $errorNo != 0 && $rollbackCall == 0 ){
				mysqli_rollback($_SESSION['pims_data']['connection']);
				$errorString = mysqli_error($_SESSION['pims_data']['connection']);
				$rollbackCall++;
			}
		}
		// ------------- temp_address_barangay UPDATE --------------------
		
		// ------------- perm_address_barangay UPDATE --------------------
		if ( $row['perm_address_barangay'] !== $_POST['permBarangay1'] ){
			$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'perm_address_barangay' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['permBarangay1']."'; ";
			if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
			if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
			if ( $errorNo == 0 ) $insertSuccessful++;
			if ( $errorNo != 0 && $rollbackCall == 0 ){
				mysqli_rollback($_SESSION['pims_data']['connection']);
				$errorString = mysqli_error($_SESSION['pims_data']['connection']);
				$rollbackCall++;
			}
		}
		// ------------- perm_address_barangay UPDATE --------------------
		
		// ------------- temp_address_municipality_city UPDATE --------------------
		if ( $row['temp_address_municipality_city'] !== $_POST['tempMunicipalityCity1'] ){
			$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'temp_address_municipality_city' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['tempMunicipalityCity1']."'; ";
			if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
			if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
			if ( $errorNo == 0 ) $insertSuccessful++;
			if ( $errorNo != 0 && $rollbackCall == 0 ){
				mysqli_rollback($_SESSION['pims_data']['connection']);
				$errorString = mysqli_error($_SESSION['pims_data']['connection']);
				$rollbackCall++;
			}
		}
		// ------------- temp_address_municipality_city UPDATE --------------------
		
		// ------------- perm_address_municipality_city UPDATE --------------------
		if ( $row['perm_address_municipality_city'] !== $_POST['permMunicipalityCity1'] ){
			$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'perm_address_municipality_city' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['permMunicipalityCity1']."'; ";
			if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
			if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
			if ( $errorNo == 0 ) $insertSuccessful++;
			if ( $errorNo != 0 && $rollbackCall == 0 ){
				mysqli_rollback($_SESSION['pims_data']['connection']);
				$errorString = mysqli_error($_SESSION['pims_data']['connection']);
				$rollbackCall++;
			}
		}
		// ------------- perm_address_municipality_city UPDATE --------------------
		
		// ------------- temp_address_province UPDATE --------------------
		if ( $row['temp_address_province'] !== $_POST['tempProvince1'] ){
			$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'temp_address_province' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['tempProvince1']."'; ";
			if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
			if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
			if ( $errorNo == 0 ) $insertSuccessful++;
			if ( $errorNo != 0 && $rollbackCall == 0 ){
				mysqli_rollback($_SESSION['pims_data']['connection']);
				$errorString = mysqli_error($_SESSION['pims_data']['connection']);
				$rollbackCall++;
			}
		}
		// ------------- temp_address_province UPDATE --------------------
		
		// ------------- perm_address_province UPDATE --------------------
		if ( $row['perm_address_province'] !== $_POST['permProvince1'] ){
			$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'perm_address_province' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['permProvince1']."'; ";
			if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
			if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
			if ( $errorNo == 0 ) $insertSuccessful++;
			if ( $errorNo != 0 && $rollbackCall == 0 ){
				mysqli_rollback($_SESSION['pims_data']['connection']);
				$errorString = mysqli_error($_SESSION['pims_data']['connection']);
				$rollbackCall++;
			}
		}
		// ------------- perm_address_province UPDATE --------------------
		
		// ------------- temp_address_zipCode UPDATE --------------------
		if ( $row['temp_address_zipCode'] !== $_POST['tempZipCode1'] ){
			$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'temp_address_zipCode' , p_data_column = 'p_data_int' , p_data_int = ".$_POST['tempZipCode1']."; ";
			if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
			if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
			if ( $errorNo == 0 ) $insertSuccessful++;
			if ( $errorNo != 0 && $rollbackCall == 0 ){
				mysqli_rollback($_SESSION['pims_data']['connection']);
				$errorString = mysqli_error($_SESSION['pims_data']['connection']);
				$rollbackCall++;
			}
		}
		// ------------- temp_address_zipCode UPDATE --------------------
		
		// ------------- perm_address_zipCode UPDATE --------------------
		if ( $row['perm_address_zipCode'] !== $_POST['permZipCode1'] ){
			$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'perm_address_zipCode' , p_data_column = 'p_data_int' , p_data_int = ".$_POST['permZipCode1']."; ";
			if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
			if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
			if ( $errorNo == 0 ) $insertSuccessful++;
			if ( $errorNo != 0 && $rollbackCall == 0 ){
				mysqli_rollback($_SESSION['pims_data']['connection']);
				$errorString = mysqli_error($_SESSION['pims_data']['connection']);
				$rollbackCall++;
			}
		}
		// ------------- perm_address_zipCode UPDATE --------------------
		
		// ------------- temp_address_street UPDATE --------------------
		if ( $row['temp_address_street'] !== $_POST['tempStreet1'] ){
			if ( $_POST['tempStreet1'] == null ){
				$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'temp_address_street' , p_data_column = 'p_data_text' , p_data_text = null; ";
				if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
				if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
				if ( $errorNo == 0 ) $insertSuccessful++;
				if ( $errorNo != 0 && $rollbackCall == 0 ){
					mysqli_rollback($_SESSION['pims_data']['connection']);
					$errorString = mysqli_error($_SESSION['pims_data']['connection']);
					$rollbackCall++;
				}
			}
			else{
				$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'temp_address_street' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['tempStreet1']."'; ";
				if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
				if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
				if ( $errorNo == 0 ) $insertSuccessful++;
				if ( $errorNo != 0 && $rollbackCall == 0 ){
					mysqli_rollback($_SESSION['pims_data']['connection']);
					$errorString = mysqli_error($_SESSION['pims_data']['connection']);
					$rollbackCall++;
				}
			}
		}
		// ------------- temp_address_street UPDATE --------------------
		
		// ------------- perm_address_street UPDATE --------------------
		if ( $row['perm_address_street'] !== $_POST['permStreet1'] ){
			if ( $_POST['permStreet1'] == null ){
				$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'perm_address_street' , p_data_column = 'p_data_text' , p_data_text = null; ";
				if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
				if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
				if ( $errorNo == 0 ) $insertSuccessful++;
				if ( $errorNo != 0 && $rollbackCall == 0 ){
					mysqli_rollback($_SESSION['pims_data']['connection']);
					$errorString = mysqli_error($_SESSION['pims_data']['connection']);
					$rollbackCall++;
				}
			}
			else{
				$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'perm_address_street' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['permStreet1']."'; ";
				if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
				if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
				if ( $errorNo == 0 ) $insertSuccessful++;
				if ( $errorNo != 0 && $rollbackCall == 0 ){
					mysqli_rollback($_SESSION['pims_data']['connection']);
					$errorString = mysqli_error($_SESSION['pims_data']['connection']);
					$rollbackCall++;
				}
			}
		}
		// ------------- perm_address_street UPDATE --------------------
		
		// ------------- temp_address_house_no UPDATE --------------------
		if ( $row['temp_address_house_no'] !== $_POST['tempHouseNo1'] ){
			if ( $_POST['tempHouseNo1'] == null ){
				$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'temp_address_house_no' , p_data_column = 'p_data_int' , p_data_int = null; ";
				if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
				if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
				if ( $errorNo == 0 ) $insertSuccessful++;
				if ( $errorNo != 0 && $rollbackCall == 0 ){
					mysqli_rollback($_SESSION['pims_data']['connection']);
					$errorString = mysqli_error($_SESSION['pims_data']['connection']);
					$rollbackCall++;
				}
			}
			else{
				$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'temp_address_house_no' , p_data_column = 'p_data_int' , p_data_int = ".$_POST['tempHouseNo1']."; ";
				if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
				if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
				if ( $errorNo == 0 ) $insertSuccessful++;
				if ( $errorNo != 0 && $rollbackCall == 0 ){
					mysqli_rollback($_SESSION['pims_data']['connection']);
					$errorString = mysqli_error($_SESSION['pims_data']['connection']);
					$rollbackCall++;
				}
			}
		}
		// ------------- temp_address_house_no UPDATE --------------------
		
		// ------------- perm_address_house_no UPDATE --------------------
		if ( $row['perm_address_house_no'] !== $_POST['permHouseNo1'] ){
			if ( $_POST['permHouseNo1'] == null ){
				$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'perm_address_house_no' , p_data_column = 'p_data_int' , p_data_int = null; ";
				if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
				if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
				if ( $errorNo == 0 ) $insertSuccessful++;
				if ( $errorNo != 0 && $rollbackCall == 0 ){
					mysqli_rollback($_SESSION['pims_data']['connection']);
					$errorString = mysqli_error($_SESSION['pims_data']['connection']);
					$rollbackCall++;
				}
			}
			else{
				$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'perm_address_house_no' , p_data_column = 'p_data_int' , p_data_int = ".$_POST['permHouseNo1']."; ";
				if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
				if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
				if ( $errorNo == 0 ) $insertSuccessful++;
				if ( $errorNo != 0 && $rollbackCall == 0 ){
					mysqli_rollback($_SESSION['pims_data']['connection']);
					$errorString = mysqli_error($_SESSION['pims_data']['connection']);
					$rollbackCall++;
				}
			}
		}
		// ------------- perm_address_house_no UPDATE --------------------
	}
	
	
	// ------------- ADDRESS UPDATE --------------------
	
	if ( $errorNo == 0 && $insertSuccessful > 0 ){
		mysqli_commit($_SESSION['pims_data']['connection']);
		if ( $errorNo == 0 ){
			$echo = "alertify.success('Personal Information update/s is up to approval now'); ";
		}
		else{
			$echo = "alertify.error('An error has occured. Rolling back changes<br />Recent error: " . $errorString . "'); ";
		}
	}
	else if ( $insertSuccessful == 0 ){
		mysqli_rollback($_SESSION['pims_data']['connection']);
		$echo = "alertify.log('No Personal Information changes, rolling back request'); ";
	}
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] );
	
	echo $echo;
	
?>