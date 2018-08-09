<?php
	session_start();
	include("db_connect.php");
	
	$errorNo = 0;
	$rollbackCall = 0;
	$insertSuccessful = 0;
	
	$query = "insert into pims_profile_updates set emp_No = ".$_SESSION['pims_data']['emp_id']." , p_update_date = now() , p_update_status = 'Pending' , p_update_table = '2'; ";
	if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
	if ( $errorNo != 0 && $rollbackCall == 0 ){
		mysqli_rollback($_SESSION['pims_data']['connection']);
		$errorString = mysqli_error($_SESSION['pims_data']['connection']);
		$rollbackCall++;
	}
	if ( $errorNo == 0 ) $pu_id = mysqli_insert_id($_SESSION['pims_data']['connection']);
	
	$query = "select * from pims_family_background where emp_No = ".$_SESSION['pims_data']['emp_id']."; ";
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	$num = mysqli_num_rows($result);
	
	if ( $num != 0 ){
		$row = mysqli_fetch_array($result);
		// ------------ father_lname UPDATES ---------------
			if ( $row['father_lname'] != $_POST['flname1'] ){
				$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'father_lname' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['flname1']."'; ";
				if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
				if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
				if ( $errorNo == 0 ) $insertSuccessful++;
				if ( $errorNo != 0 && $rollbackCall == 0 ){
					mysqli_rollback($_SESSION['pims_data']['connection']);
					$errorString = mysqli_error($_SESSION['pims_data']['connection']);
					$rollbackCall++;
				}
			}
		// ------------ father_lname UPDATES ---------------
		
		// ------------ father_fname UPDATES ---------------
			if ( $row['father_fname'] != $_POST['ffname1'] ){
				$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'father_fname' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['ffname1']."'; ";
				if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
				if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
				if ( $errorNo == 0 ) $insertSuccessful++;
				if ( $errorNo != 0 && $rollbackCall == 0 ){
					mysqli_rollback($_SESSION['pims_data']['connection']);
					$errorString = mysqli_error($_SESSION['pims_data']['connection']);
					$rollbackCall++;
				}
			}
		// ------------ father_fname UPDATES ---------------
		
		// ------------ father_mname UPDATES ---------------
			if ( $row['father_mname'] != $_POST['fmname1'] ){
				$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'father_mname' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['fmname1']."'; ";
				if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
				if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
				if ( $errorNo == 0 ) $insertSuccessful++;
				if ( $errorNo != 0 && $rollbackCall == 0 ){
					mysqli_rollback($_SESSION['pims_data']['connection']);
					$errorString = mysqli_error($_SESSION['pims_data']['connection']);
					$rollbackCall++;
				}
			}
		// ------------ father_mname UPDATES ---------------
		
		// ------------ father_birthdate UPDATES ---------------
			if ( $row['father_birthdate'] != $_POST['fbirthdate1'] ){
				$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'father_birthdate' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['fbirthdate1']."'; ";
				if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
				if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
				if ( $errorNo == 0 ) $insertSuccessful++;
				if ( $errorNo != 0 && $rollbackCall == 0 ){
					mysqli_rollback($_SESSION['pims_data']['connection']);
					$errorString = mysqli_error($_SESSION['pims_data']['connection']);
					$rollbackCall++;
				}
			}
		// ------------ father_birthdate UPDATES ---------------
		
		// ------------ father_occupation UPDATES ---------------
			if ( $row['father_occupation'] != $_POST['foccupation1'] ){
				$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'father_occupation' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['foccupation1']."'; ";
				if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
				if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
				if ( $errorNo == 0 ) $insertSuccessful++;
				if ( $errorNo != 0 && $rollbackCall == 0 ){
					mysqli_rollback($_SESSION['pims_data']['connection']);
					$errorString = mysqli_error($_SESSION['pims_data']['connection']);
					$rollbackCall++;
				}
			}
		// ------------ father_occupation UPDATES ---------------
		
		// ------------ mother_maidenname UPDATES ---------------
			if ( $row['mother_maidenname'] != $_POST['mmaidenname1'] ){
				$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'mother_maidenname' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['mmaidenname1']."'; ";
				if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
				if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
				if ( $errorNo == 0 ) $insertSuccessful++;
				if ( $errorNo != 0 && $rollbackCall == 0 ){
					mysqli_rollback($_SESSION['pims_data']['connection']);
					$errorString = mysqli_error($_SESSION['pims_data']['connection']);
					$rollbackCall++;
				}
			}
		// ------------ mother_maidenname UPDATES ---------------
		
		// ------------ mother_lname UPDATES ---------------
			if ( $row['mother_lname'] != $_POST['mlname1'] ){
				$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'mother_lname' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['mlname1']."'; ";
				if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
				if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
				if ( $errorNo == 0 ) $insertSuccessful++;
				if ( $errorNo != 0 && $rollbackCall == 0 ){
					mysqli_rollback($_SESSION['pims_data']['connection']);
					$errorString = mysqli_error($_SESSION['pims_data']['connection']);
					$rollbackCall++;
				}
			}
		// ------------ mother_lname UPDATES ---------------
		
		// ------------ mother_fname UPDATES ---------------
			if ( $row['mother_fname'] != $_POST['mfname1'] ){
				$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'mother_fname' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['mfname1']."'; ";
				if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
				if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
				if ( $errorNo == 0 ) $insertSuccessful++;
				if ( $errorNo != 0 && $rollbackCall == 0 ){
					mysqli_rollback($_SESSION['pims_data']['connection']);
					$errorString = mysqli_error($_SESSION['pims_data']['connection']);
					$rollbackCall++;
				}
			}
		// ------------ mother_fname UPDATES ---------------
		
		// ------------ mother_mname UPDATES ---------------
			if ( $row['mother_mname'] != $_POST['mmname1'] ){
				$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'mother_mname' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['mmname1']."'; ";
				if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
				if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
				if ( $errorNo == 0 ) $insertSuccessful++;
				if ( $errorNo != 0 && $rollbackCall == 0 ){
					mysqli_rollback($_SESSION['pims_data']['connection']);
					$errorString = mysqli_error($_SESSION['pims_data']['connection']);
					$rollbackCall++;
				}
			}
		// ------------ mother_mname UPDATES ---------------
		
		// ------------ mother_birthdate UPDATES ---------------
			if ( $row['mother_birthdate'] != $_POST['mbirthdate1'] ){
				$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'mother_birthdate' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['mbirthdate1']."'; ";
				if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
				if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
				if ( $errorNo == 0 ) $insertSuccessful++;
				if ( $errorNo != 0 && $rollbackCall == 0 ){
					mysqli_rollback($_SESSION['pims_data']['connection']);
					$errorString = mysqli_error($_SESSION['pims_data']['connection']);
					$rollbackCall++;
				}
			}
		// ------------ mother_birthdate UPDATES ---------------
		
		// ------------ mother_occupation UPDATES ---------------
			if ( $row['mother_occupation'] != $_POST['moccupation1'] ){
				$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'mother_occupation' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['moccupation1']."'; ";
				if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
				if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
				if ( $errorNo == 0 ) $insertSuccessful++;
				if ( $errorNo != 0 && $rollbackCall == 0 ){
					mysqli_rollback($_SESSION['pims_data']['connection']);
					$errorString = mysqli_error($_SESSION['pims_data']['connection']);
					$rollbackCall++;
				}
			}
		// ------------ mother_occupation UPDATES ---------------
		
		// ------------ no_of_siblings UPDATES ---------------
			if ( $row['no_of_siblings'] != $_POST['nos1'] ){
				$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'no_of_siblings' , p_data_column = 'p_data_int' , p_data_int = ".$_POST['nos1']."; ";
				if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
				if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
				if ( $errorNo == 0 ) $insertSuccessful++;
				if ( $errorNo != 0 && $rollbackCall == 0 ){
					mysqli_rollback($_SESSION['pims_data']['connection']);
					$errorString = mysqli_error($_SESSION['pims_data']['connection']);
					$rollbackCall++;
				}
			}
		// ------------ no_of_siblings UPDATES ---------------
		
	}
	else{
		// ------------ father_lname UPDATES ---------------
				$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'father_lname' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['flname1']."'; ";
				if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
				if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
				if ( $errorNo == 0 ) $insertSuccessful++;
				if ( $errorNo != 0 && $rollbackCall == 0 ){
					mysqli_rollback($_SESSION['pims_data']['connection']);
					$errorString = mysqli_error($_SESSION['pims_data']['connection']);
					$rollbackCall++;
				}
		// ------------ father_lname UPDATES ---------------
		
		// ------------ father_fname UPDATES ---------------
				$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'father_fname' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['ffname1']."'; ";
				if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
				if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
				if ( $errorNo == 0 ) $insertSuccessful++;
				if ( $errorNo != 0 && $rollbackCall == 0 ){
					mysqli_rollback($_SESSION['pims_data']['connection']);
					$errorString = mysqli_error($_SESSION['pims_data']['connection']);
					$rollbackCall++;
				}
		// ------------ father_fname UPDATES ---------------
		
		// ------------ father_mname UPDATES ---------------
				$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'father_mname' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['fmname1']."'; ";
				if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
				if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
				if ( $errorNo == 0 ) $insertSuccessful++;
				if ( $errorNo != 0 && $rollbackCall == 0 ){
					mysqli_rollback($_SESSION['pims_data']['connection']);
					$errorString = mysqli_error($_SESSION['pims_data']['connection']);
					$rollbackCall++;
				}
		// ------------ father_mname UPDATES ---------------
		
		// ------------ father_birthdate UPDATES ---------------
				$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'father_birthdate' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['fbirthdate1']."'; ";
				if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
				if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
				if ( $errorNo == 0 ) $insertSuccessful++;
				if ( $errorNo != 0 && $rollbackCall == 0 ){
					mysqli_rollback($_SESSION['pims_data']['connection']);
					$errorString = mysqli_error($_SESSION['pims_data']['connection']);
					$rollbackCall++;
				}
		// ------------ father_birthdate UPDATES ---------------
		
		// ------------ father_occupation UPDATES ---------------
				$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'father_occupation' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['foccupation1']."'; ";
				if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
				if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
				if ( $errorNo == 0 ) $insertSuccessful++;
				if ( $errorNo != 0 && $rollbackCall == 0 ){
					mysqli_rollback($_SESSION['pims_data']['connection']);
					$errorString = mysqli_error($_SESSION['pims_data']['connection']);
					$rollbackCall++;
				}
		// ------------ father_occupation UPDATES ---------------
		
		// ------------ mother_maidenname UPDATES ---------------
				$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'mother_maidenname' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['mmaidenname1']."'; ";
				if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
				if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
				if ( $errorNo == 0 ) $insertSuccessful++;
				if ( $errorNo != 0 && $rollbackCall == 0 ){
					mysqli_rollback($_SESSION['pims_data']['connection']);
					$errorString = mysqli_error($_SESSION['pims_data']['connection']);
					$rollbackCall++;
				}
		// ------------ mother_maidenname UPDATES ---------------
		
		// ------------ mother_lname UPDATES ---------------
				$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'mother_lname' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['mlname1']."'; ";
				if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
				if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
				if ( $errorNo == 0 ) $insertSuccessful++;
				if ( $errorNo != 0 && $rollbackCall == 0 ){
					mysqli_rollback($_SESSION['pims_data']['connection']);
					$errorString = mysqli_error($_SESSION['pims_data']['connection']);
					$rollbackCall++;
				}
		// ------------ mother_lname UPDATES ---------------
		
		// ------------ mother_fname UPDATES ---------------
				$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'mother_fname' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['mfname1']."'; ";
				if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
				if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
				if ( $errorNo == 0 ) $insertSuccessful++;
				if ( $errorNo != 0 && $rollbackCall == 0 ){
					mysqli_rollback($_SESSION['pims_data']['connection']);
					$errorString = mysqli_error($_SESSION['pims_data']['connection']);
					$rollbackCall++;
				}
		// ------------ mother_fname UPDATES ---------------
		
		// ------------ mother_mname UPDATES ---------------
				$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'mother_mname' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['mmname1']."'; ";
				if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
				if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
				if ( $errorNo == 0 ) $insertSuccessful++;
				if ( $errorNo != 0 && $rollbackCall == 0 ){
					mysqli_rollback($_SESSION['pims_data']['connection']);
					$errorString = mysqli_error($_SESSION['pims_data']['connection']);
					$rollbackCall++;
				}
		// ------------ mother_mname UPDATES ---------------
		
		// ------------ mother_birthdate UPDATES ---------------
				$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'mother_birthdate' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['mbirthdate1']."'; ";
				if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
				if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
				if ( $errorNo == 0 ) $insertSuccessful++;
				if ( $errorNo != 0 && $rollbackCall == 0 ){
					mysqli_rollback($_SESSION['pims_data']['connection']);
					$errorString = mysqli_error($_SESSION['pims_data']['connection']);
					$rollbackCall++;
				}
		// ------------ mother_birthdate UPDATES ---------------
		
		// ------------ mother_occupation UPDATES ---------------
				$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'mother_occupation' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['moccupation1']."'; ";
				if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
				if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
				if ( $errorNo == 0 ) $insertSuccessful++;
				if ( $errorNo != 0 && $rollbackCall == 0 ){
					mysqli_rollback($_SESSION['pims_data']['connection']);
					$errorString = mysqli_error($_SESSION['pims_data']['connection']);
					$rollbackCall++;
				}
		// ------------ mother_occupation UPDATES ---------------
		
		// ------------ no_of_siblings UPDATES ---------------
				$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'no_of_siblings' , p_data_column = 'p_data_int' , p_data_int = ".$_POST['nos1']."; ";
				if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
				if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
				if ( $errorNo == 0 ) $insertSuccessful++;
				if ( $errorNo != 0 && $rollbackCall == 0 ){
					mysqli_rollback($_SESSION['pims_data']['connection']);
					$errorString = mysqli_error($_SESSION['pims_data']['connection']);
					$rollbackCall++;
				}
		// ------------ no_of_siblings UPDATES ---------------
	}
	$echo = "";
	if ( $errorNo == 0 && $insertSuccessful > 0 ){
		mysqli_commit($_SESSION['pims_data']['connection']);
		if ( $errorNo == 0 ){
			$echo = "alertify.success('Family Background update/s is up to approval now'); ";
		}
		else{
			$echo = "alertify.error('An error has occured. Rolling back changes<br />Recent error: " . $errorString . "'); ";
		}
	}
	else if ( $insertSuccessful == 0 ){
		mysqli_rollback($_SESSION['pims_data']['connection']);
		$echo = "alertify.log('No Family Background changes, rolling back request'); ";
	}
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] );
	
	echo $echo;
	
?>