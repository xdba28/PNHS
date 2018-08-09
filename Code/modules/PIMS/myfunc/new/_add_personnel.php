<?php
	error_reporting(0);
	$q = $_GET['q'];
	
	if ( $q == "submitpersonalinfomation" ){
		submitpersonalinfomation();
	}
	
	if ( $q == "submitfamilybackground" ){
		submitfamilybackground();
	}
	
	if ( $q == "submiteducationalbackground" ){
		submiteducationalbackground();
	}
	
	if ( $q == "submitworkexperience" ){
		submitworkexperience();
	}
	
	if ( $q == "submittrainingsattended" ){
		submittrainingsattended();
	}
	
	if ( $q == "submitemploymentrecord" ){
		submitemploymentrecord();
	}
	
	if ( $q == "submitform7" ){
		submitform7();
	}
	
	
	function submitform7(){
		include("db_connect.php");
		
		$errorNo = 0;
		$rollbackCall = 0;
		$insertSuccessful = 0;
		
		$query = "insert into pims_profile_updates set emp_No = ".$_GET['id']." , p_update_date = now() , p_update_status = 'Pending' , p_update_table = '7'; ";
		if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
		if ( $errorNo != 0 && $rollbackCall == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$errorString = mysqli_error($_SESSION['pims_data']['connection']);
			$rollbackCall++;
		}
		if ( $errorNo == 0 ) $pu_id = mysqli_insert_id($_SESSION['pims_data']['connection']);
		
		$query = "select job_title_code , dept_ID from pims_employment_records where emp_No = ".$_GET['id']."; ";
		$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		$num = mysqli_num_rows($result);
		
		if ( $num > 0 ){
			$row = mysqli_fetch_array($result);
			// ------------ job_title_code UPDATES ---------------
				if ( $row['job_title_code'] !== $_POST['jobTitle1'] && !(empty($row['job_title_code']) && empty($_POST['jobTitle1'])) ){
					if ( $_POST['jobTitle1'] == "null" ){
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'job_title_code' , p_data_column = 'p_data_text' , p_data_text = null; ";
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
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'job_title_code' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['jobTitle1']."'; ";
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
			// ------------ job_title_code UPDATES ---------------
			
			// ------------ dept_ID UPDATES ---------------
				if ( $row['dept_ID'] !== $_POST['department1'] && !(empty($row['dept_ID']) && empty($_POST['department1'])) ){
					if ( $_POST['department1'] == null ){
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'dept_ID' , p_data_column = 'p_data_int' , p_data_int = null; ";
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
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'dept_ID' , p_data_column = 'p_data_int' , p_data_int = ".$_POST['department1']."; ";
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
			// ------------ dept_ID UPDATES ---------------
		}
		
		if ( $errorNo == 0 && $insertSuccessful > 0 ){
			mysqli_commit($_SESSION['pims_data']['connection']);
			if ( $errorNo == 0 ){
				$echo = "alertify.success('Job Title and Department update is up to approval now'); ";
			}
			else{
				$echo = "alertify.error('An error has occured. Rolling back changes<br />Recent error: " . $errorString . "'); ";
			}
		}
		else if ( $insertSuccessful == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$echo = "alertify.log('No Job Title and Department changes, rolling back request'); ";
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
		
		$query = "insert into pims_profile_updates set emp_No = ".$_GET['id']." , p_update_date = now() , p_update_status = 'Pending' , p_update_table = '6'; ";
		if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
		if ( $errorNo != 0 && $rollbackCall == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$errorString = mysqli_error($_SESSION['pims_data']['connection']);
			$rollbackCall++;
		}
		if ( $errorNo == 0 ) $pu_id = mysqli_insert_id($_SESSION['pims_data']['connection']);
		
		$query = "select * from pims_employment_records where emp_No = ".$_GET['id']."; ";
		$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		$num = mysqli_num_rows($result);
		
		
		if ( $num != 0 ){
			// ------------ complete_item_no UPDATES ---------------
				if ( $row['complete_item_no'] !== $_POST['complete_item_no1'] && !(empty($row['complete_item_no']) && empty($_POST['complete_item_no1'])) ){
					if ( $_POST['complete_item_no1'] == null ){
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'complete_item_no' , p_data_column = 'p_data_text' , p_data_text = null; ";
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
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'complete_item_no' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['complete_item_no1']."'; ";
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
			// ------------ complete_item_no UPDATES ---------------
			
			// ------------ work_stat UPDATES ---------------
				if ( $row['work_stat'] !== $_POST['work_stat1'] && !(empty($row['work_stat']) && empty($_POST['work_stat1'])) ){
					if ( $_POST['work_stat1'] == null ){
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'work_stat' , p_data_column = 'p_data_text' , p_data_text = null; ";
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
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'work_stat' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['work_stat1']."'; ";
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
			// ------------ work_stat UPDATES ---------------
			
			// ------------ role_type UPDATES ---------------
				if ( $row['role_type'] !== $_POST['role_type1'] && !(empty($row['role_type']) && empty($_POST['role_type1'])) ){
					if ( $_POST['role_type1'] == null ){
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'role_type' , p_data_column = 'p_data_text' , p_data_text = null; ";
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
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'role_type' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['role_type1']."'; ";
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
			// ------------ role_type UPDATES ---------------
			
			// ------------ emp_status UPDATES ---------------
				if ( $row['emp_status'] !== $_POST['emp_status1'] && !(empty($row['emp_status']) && empty($_POST['emp_status1'])) ){
					if ( $_POST['emp_status1'] == null ){
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'emp_status' , p_data_column = 'p_data_text' , p_data_text = null; ";
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
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'emp_status' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['emp_status1']."'; ";
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
			// ------------ emp_status UPDATES ---------------
			
			// ------------ date_joined UPDATES ---------------
				if ( $row['date_joined'] !== $_POST['date_joined1'] && !(empty($row['date_joined']) && empty($_POST['date_joined1'])) ){
					if ( $_POST['date_joined1'] == null ){
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'date_joined' , p_data_column = 'p_data_text' , p_data_text = null; ";
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
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'date_joined' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['date_joined1']."'; ";
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
			// ------------ date_joined UPDATES ---------------
			
			// ------------ date_retired UPDATES ---------------
				if ( $row['date_retired'] !== $_POST['date_retired1'] && !(empty($row['date_retired']) && empty($_POST['date_retired1'])) ){
					if ( $_POST['date_retired1'] == null ){
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'date_retired' , p_data_column = 'p_data_text' , p_data_text = null; ";
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
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'date_retired' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['date_retired1']."'; ";
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
			// ------------ date_retired UPDATES ---------------
			
			// ------------ div_code1 UPDATES ---------------
				if ( $row['div_code'] !== $_POST['div_code1'] && !(empty($row['div_code']) && empty($_POST['div_code1'])) ){
					if ( $_POST['div_code1'] == null ){
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'div_code' , p_data_column = 'p_data_int' , p_data_int = null; ";
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
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'div_code' , p_data_column = 'p_data_int' , p_data_int = ".$_POST['div_code1']."; ";
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
			// ------------ div_code1 UPDATES ---------------
			
			// ------------ biometric_ID1 UPDATES ---------------
				if ( $row['biometric_ID'] !== $_POST['biometric_ID1'] && !(empty($row['biometric_ID']) && empty($_POST['biometric_ID1'])) ){
					if ( $_POST['biometric_ID1'] == null ){
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'biometric_ID' , p_data_column = 'p_data_text' , p_data_text = null; ";
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
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'biometric_ID' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['biometric_ID1']."'; ";
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
			// ------------ biometric_ID1 UPDATES ---------------
			
			// ------------ school_ID UPDATES ---------------
				if ( $row['school_ID'] !== $_POST['school_ID1'] && !(empty($row['school_ID']) && empty($_POST['school_ID1'])) ){
					if ( $_POST['school_ID1'] == null ){
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'school_ID' , p_data_column = 'p_data_int' , p_data_int = null; ";
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
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'school_ID' , p_data_column = 'p_data_int' , p_data_int = ".$_POST['school_ID1']."; ";
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
			// ------------ school_ID UPDATES ---------------
			
			// ------------ appointment_date UPDATES ---------------
				if ( $row['appointment_date'] !== $_POST['appointment_date1'] && !(empty($row['appointment_date']) && empty($_POST['appointment_date1'])) ){
					if ( $_POST['appointment_date1'] == null ){
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'appointment_date' , p_data_column = 'p_data_text' , p_data_text = null; ";
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
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'appointment_date' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['appointment_date1']."'; ";
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
			// ------------ appointment_date UPDATES ---------------
			
		}
		
		
		
		if ( $errorNo == 0 && $insertSuccessful > 0 ){
			mysqli_commit($_SESSION['pims_data']['connection']);
			if ( $errorNo == 0 ){
				$echo = "alertify.success('Employment Records update is up to approval now'); ";
			}
			else{
				$echo = "alertify.error('An error has occured. Rolling back changes<br />Recent error: " . $errorString . "'); ";
			}
		}
		else if ( $insertSuccessful == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$echo = "alertify.log('No Employment Records changes, rolling back request'); ";
		}
		
		mysqli_close( $_SESSION['pims_data']['connection'] );
		unset( $_SESSION['pims_data']['connection'] );
		
		echo $echo;
	}
	
	function submittrainingsattended(){
		include("db_connect.php");
		
		$errorNo = 0;
		$rollbackCall = 0;
		$insertSuccessful = 0;
		
		$query = "insert into pims_profile_updates set emp_No = ".$_GET['id']." , p_update_date = now() , p_update_status = 'Pending' , p_update_table = '5'; ";
		if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
		if ( $errorNo != 0 && $rollbackCall == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$errorString = mysqli_error($_SESSION['pims_data']['connection']);
			$rollbackCall++;
		}
		if ( $errorNo == 0 ) $pu_id = mysqli_insert_id($_SESSION['pims_data']['connection']);
		
		$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'training_title' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['training_title1']."'; ";
		if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
		if ( $errorNo == 0 ) $insertSuccessful++;
		if ( $errorNo != 0 && $rollbackCall == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$errorString = mysqli_error($_SESSION['pims_data']['connection']);
			$rollbackCall++;
		}
		
		$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'location' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['location1']."'; ";
		if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
		if ( $errorNo == 0 ) $insertSuccessful++;
		if ( $errorNo != 0 && $rollbackCall == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$errorString = mysqli_error($_SESSION['pims_data']['connection']);
			$rollbackCall++;
		}
		
		$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'date_start' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['date_start1']."'; ";
		if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
		if ( $errorNo == 0 ) $insertSuccessful++;
		if ( $errorNo != 0 && $rollbackCall == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$errorString = mysqli_error($_SESSION['pims_data']['connection']);
			$rollbackCall++;
		}
		
		$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'date_finish' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['date_finish1']."'; ";
		if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
		if ( $errorNo == 0 ) $insertSuccessful++;
		if ( $errorNo != 0 && $rollbackCall == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$errorString = mysqli_error($_SESSION['pims_data']['connection']);
			$rollbackCall++;
		}
		
		$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'no_of_hours' , p_data_column = 'p_data_int' , p_data_int = ".$_POST['no_of_hours1']."; ";
		if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
		if ( $errorNo == 0 ) $insertSuccessful++;
		if ( $errorNo != 0 && $rollbackCall == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$errorString = mysqli_error($_SESSION['pims_data']['connection']);
			$rollbackCall++;
		}
		
		if ( $errorNo == 0 && $insertSuccessful > 0 ){
			mysqli_commit($_SESSION['pims_data']['connection']);
			if ( $errorNo == 0 ){
				$echo = "alertify.success('Training Programs update is up to approval now'); ";
			}
			else{
				$echo = "alertify.error('An error has occured. Rolling back changes<br />Recent error: " . $errorString . "'); ";
			}
		}
		else if ( $insertSuccessful == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$echo = "alertify.log('No Training Programs changes, rolling back request'); ";
		}
		
		mysqli_close( $_SESSION['pims_data']['connection'] );
		unset( $_SESSION['pims_data']['connection'] );
		
		echo $echo;
	}
	
	function submitworkexperience(){
		include("db_connect.php");
		
		$errorNo = 0;
		$rollbackCall = 0;
		$insertSuccessful = 0;
		
		$query = "insert into pims_profile_updates set emp_No = ".$_GET['id']." , p_update_date = now() , p_update_status = 'Pending' , p_update_table = '4'; ";
		if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
		if ( $errorNo != 0 && $rollbackCall == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$errorString = mysqli_error($_SESSION['pims_data']['connection']);
			$rollbackCall++;
		}
		if ( $errorNo == 0 ) $pu_id = mysqli_insert_id($_SESSION['pims_data']['connection']);
		
		$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'we_date_from' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['we_date_from1']."'; ";
		if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
		if ( $errorNo == 0 ) $insertSuccessful++;
		if ( $errorNo != 0 && $rollbackCall == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$errorString = mysqli_error($_SESSION['pims_data']['connection']);
			$rollbackCall++;
		}
		
		$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'we_date_to' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['we_date_to1']."'; ";
		if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
		if ( $errorNo == 0 ) $insertSuccessful++;
		if ( $errorNo != 0 && $rollbackCall == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$errorString = mysqli_error($_SESSION['pims_data']['connection']);
			$rollbackCall++;
		}
		
		$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'we_position' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['we_position1']."'; ";
		if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
		if ( $errorNo == 0 ) $insertSuccessful++;
		if ( $errorNo != 0 && $rollbackCall == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$errorString = mysqli_error($_SESSION['pims_data']['connection']);
			$rollbackCall++;
		}
		
		$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'company' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['company1']."'; ";
		if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
		if ( $errorNo == 0 ) $insertSuccessful++;
		if ( $errorNo != 0 && $rollbackCall == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$errorString = mysqli_error($_SESSION['pims_data']['connection']);
			$rollbackCall++;
		}
		
		if ( $errorNo == 0 && $insertSuccessful > 0 ){
			mysqli_commit($_SESSION['pims_data']['connection']);
			if ( $errorNo == 0 ){
				$echo = "alertify.success('Work Experience update is up to approval now'); ";
			}
			else{
				$echo = "alertify.error('An error has occured. Rolling back changes<br />Recent error: " . $errorString . "'); ";
			}
		}
		else if ( $insertSuccessful == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$echo = "alertify.log('No Work Experience changes, rolling back request'); ";
		}
		
		mysqli_close( $_SESSION['pims_data']['connection'] );
		unset( $_SESSION['pims_data']['connection'] );
		
		echo $echo;
	}
	
	function submiteducationalbackground(){
		session_start();
		include("db_connect.php");
		
		$errorNo = 0;
		$rollbackCall = 0;
		$insertSuccessful = 0;
		
		$query = "insert into pims_profile_updates set emp_No = ".$_GET['id']." , p_update_date = now() , p_update_status = 'Pending' , p_update_table = '3'; ";
		if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
		if ( $errorNo != 0 && $rollbackCall == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$errorString = mysqli_error($_SESSION['pims_data']['connection']);
			$rollbackCall++;
		}
		if ( $errorNo == 0 ) $pu_id = mysqli_insert_id($_SESSION['pims_data']['connection']);
		
		$query = "select * from pims_educational_background where emp_No = ".$_GET['id']."; ";
		$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		$num = mysqli_num_rows($result);
		
		if ( $num != 0 ){
			$row = mysqli_fetch_array($result);
			// ------------ elementary_school_name UPDATES ---------------
				if ( $row['elementary_school_name'] != $_POST['elementary2'] && !(empty($row['elementary_school_name']) && empty($_POST['elementary2'])) ){
					if ( $_POST['elementary2'] == null ){
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'elementary_school_name' , p_data_column = 'p_data_text' , p_data_text = null; ";
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
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'elementary_school_name' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['elementary2']."'; ";
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
			// ------------ elementary_school_name UPDATES ---------------
			
			// ------------ elementary_academic_yr UPDATES ---------------
				if ( $row['elementary_academic_yr'] != $_POST['elementaryFrom2']."-".$_POST['elementaryTo2'] && !(empty($row['elementary_academic_yr']) && empty($_POST['elementaryFrom2']) && empty($_POST['elementaryTo2'])) ){
					if ( $_POST['elementaryFrom2'] == null || $_POST['elementaryTo2'] == null ){
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'elementary_academic_yr' , p_data_column = 'p_data_text' , p_data_text = null; ";
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
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'elementary_academic_yr' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['elementaryFrom2']."-".$_POST['elementaryTo2']."'; ";
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
			// ------------ elementary_academic_yr UPDATES ---------------
			
			// ------------- secondary_school_name UPDATE --------------------
			if ( $row['secondary_school_name'] != $_POST['highSchool2'] && !(empty($row['secondary_school_name']) && empty($_POST['highSchool2'])) ){
				if ( $_POST['highSchool2'] == null ){
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'secondary_school_name' , p_data_column = 'p_data_text' , p_data_text = null; ";
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
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'secondary_school_name' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['highSchool2']."'; ";
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
			// ------------- secondary_school_name UPDATE --------------------
			
			// ------------- secondary_academic_yr UPDATE --------------------
			if ( $row['secondary_academic_yr'] != $_POST['highSchoolFrom2']."-".$_POST['highSchoolTo2'] && !(empty($row['secondary_academic_yr']) && empty($_POST['highSchoolFrom2']) && empty($_POST['highSchoolTo2'])) ){
				if ( $_POST['highSchoolFrom2'] == null ){
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'secondary_academic_yr' , p_data_column = 'p_data_text' , p_data_text = null; ";
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
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'secondary_academic_yr' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['highSchoolFrom2']."-".$_POST['highSchoolTo2']."'; ";
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
			// ------------- secondary_academic_yr UPDATE --------------------
			
			// ------------- tertiary_school_name UPDATE --------------------
			if ( $row['tertiary_school_name'] != $_POST['college2'] && !(empty($row['tertiary_school_name']) && empty($_POST['college2'])) ){
				if ( $_POST['college2'] == null ){
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'tertiary_school_name' , p_data_column = 'p_data_text' , p_data_text = null; ";
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
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'tertiary_school_name' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['college2']."'; ";
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
			// ------------- tertiary_school_name UPDATE --------------------
			
			// ------------- tertiary_academic_yr UPDATE --------------------
			if ( $row['tertiary_academic_yr'] != $_POST['collegeFrom2']."-".$_POST['collegeTo2'] && !(empty($row['tertiary_academic_yr']) && empty($_POST['collegeFrom2']) && empty($_POST['collegeTo2'])) ){
				if ( $_POST['collegeFrom2'] == null ){
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'tertiary_academic_yr' , p_data_column = 'p_data_text' , p_data_text = null; ";
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
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'tertiary_academic_yr' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['collegeFrom2']."-".$_POST['collegeTo2']."'; ";
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
			// ------------- tertiary_academic_yr UPDATE --------------------
			
			// ------------- tertiary_degrees UPDATE --------------------
			if ( $row['tertiary_degrees'] != $_POST['collegeDegree2'] && !(empty($row['tertiary_degrees']) && empty($_POST['collegeDegree2'])) ){
				if ( $_POST['collegeDegree2'] == null ){
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'tertiary_degrees' , p_data_column = 'p_data_text' , p_data_text = null; ";
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
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'tertiary_degrees' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['collegeDegree2']."'; ";
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
			// ------------- tertiary_degrees UPDATE --------------------
			
			// ------------- honor_or_award UPDATE --------------------
			if ( $row['honor_or_award'] != $_POST['honorAward2'] && !(empty($row['honor_or_award']) && empty($_POST['honorAward2'])) ){
				if ( $_POST['honorAward2'] == null ){
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'honor_or_award' , p_data_column = 'p_data_text' , p_data_text = null; ";
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
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'honor_or_award' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['honorAward2']."'; ";
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
			// ------------- honor_or_award UPDATE --------------------
			
			// ------------- affiliations UPDATE --------------------
			if ( $row['affiliations'] != $_POST['affiliation2'] && !(empty($row['affiliations']) && empty($_POST['affiliation2'])) ){
				if ( $_POST['affiliation2'] == null ){
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'affiliations' , p_data_column = 'p_data_text' , p_data_text = null; ";
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
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'affiliations' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['affiliation2']."'; ";
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
			// ------------- affiliations UPDATE --------------------
		}
		else{
			// ------------ elementary_school_name UPDATES ---------------
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'elementary_school_name' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['elementary2']."'; ";
					if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
					if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
					if ( $errorNo == 0 ) $insertSuccessful++;
					if ( $errorNo != 0 && $rollbackCall == 0 ){
						mysqli_rollback($_SESSION['pims_data']['connection']);
						$errorString = mysqli_error($_SESSION['pims_data']['connection']);
						$rollbackCall++;
					}
			// ------------ elementary_school_name UPDATES ---------------
			
			// ------------ elementary_academic_yr UPDATES ---------------
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'elementary_academic_yr' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['elementaryFrom2']."-".$_POST['elementaryTo2']."'; ";
					if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
					if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
					if ( $errorNo == 0 ) $insertSuccessful++;
					if ( $errorNo != 0 && $rollbackCall == 0 ){
						mysqli_rollback($_SESSION['pims_data']['connection']);
						$errorString = mysqli_error($_SESSION['pims_data']['connection']);
						$rollbackCall++;
					}
			// ------------ elementary_academic_yr UPDATES ---------------
			
			// ------------- secondary_school_name UPDATE --------------------
				if ( $_POST['highSchool2'] == null ){
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'secondary_school_name' , p_data_column = 'p_data_text' , p_data_text = null; ";
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
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'secondary_school_name' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['highSchool2']."'; ";
					if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
					if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
					if ( $errorNo == 0 ) $insertSuccessful++;
					if ( $errorNo != 0 && $rollbackCall == 0 ){
						mysqli_rollback($_SESSION['pims_data']['connection']);
						$errorString = mysqli_error($_SESSION['pims_data']['connection']);
						$rollbackCall++;
					}
				}
			// ------------- secondary_school_name UPDATE --------------------
			
			// ------------- secondary_academic_yr UPDATE --------------------
				if ( $_POST['highSchoolFrom2'] == null ){
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'secondary_academic_yr' , p_data_column = 'p_data_text' , p_data_text = null; ";
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
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'secondary_academic_yr' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['highSchoolFrom2']."-".$_POST['highSchoolTo2']."'; ";
					if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
					if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
					if ( $errorNo == 0 ) $insertSuccessful++;
					if ( $errorNo != 0 && $rollbackCall == 0 ){
						mysqli_rollback($_SESSION['pims_data']['connection']);
						$errorString = mysqli_error($_SESSION['pims_data']['connection']);
						$rollbackCall++;
					}
				}
			// ------------- secondary_academic_yr UPDATE --------------------
			
			// ------------- tertiary_school_name UPDATE --------------------
				if ( $_POST['college2'] == null ){
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'tertiary_school_name' , p_data_column = 'p_data_text' , p_data_text = null; ";
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
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'tertiary_school_name' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['college2']."'; ";
					if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
					if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
					if ( $errorNo == 0 ) $insertSuccessful++;
					if ( $errorNo != 0 && $rollbackCall == 0 ){
						mysqli_rollback($_SESSION['pims_data']['connection']);
						$errorString = mysqli_error($_SESSION['pims_data']['connection']);
						$rollbackCall++;
					}
				}
			// ------------- tertiary_school_name UPDATE --------------------
			
			// ------------- tertiary_academic_yr UPDATE --------------------
				if ( $_POST['collegeFrom2'] == null ){
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'tertiary_academic_yr' , p_data_column = 'p_data_text' , p_data_text = null; ";
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
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'tertiary_academic_yr' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['collegeFrom2']."-".$_POST['collegeTo2']."'; ";
					if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
					if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
					if ( $errorNo == 0 ) $insertSuccessful++;
					if ( $errorNo != 0 && $rollbackCall == 0 ){
						mysqli_rollback($_SESSION['pims_data']['connection']);
						$errorString = mysqli_error($_SESSION['pims_data']['connection']);
						$rollbackCall++;
					}
				}
			// ------------- tertiary_academic_yr UPDATE --------------------
			
			// ------------- tertiary_degrees UPDATE --------------------
				if ( $_POST['collegeDegree2'] == null ){
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'tertiary_degrees' , p_data_column = 'p_data_text' , p_data_text = null; ";
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
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'tertiary_degrees' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['collegeDegree2']."'; ";
					if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
					if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
					if ( $errorNo == 0 ) $insertSuccessful++;
					if ( $errorNo != 0 && $rollbackCall == 0 ){
						mysqli_rollback($_SESSION['pims_data']['connection']);
						$errorString = mysqli_error($_SESSION['pims_data']['connection']);
						$rollbackCall++;
					}
				}
			// ------------- tertiary_degrees UPDATE --------------------
			
			// ------------- honor_or_award UPDATE --------------------
				if ( $_POST['honorAward2'] == null ){
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'honor_or_award' , p_data_column = 'p_data_text' , p_data_text = null; ";
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
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'honor_or_award' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['honorAward2']."'; ";
					if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
					if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
					if ( $errorNo == 0 ) $insertSuccessful++;
					if ( $errorNo != 0 && $rollbackCall == 0 ){
						mysqli_rollback($_SESSION['pims_data']['connection']);
						$errorString = mysqli_error($_SESSION['pims_data']['connection']);
						$rollbackCall++;
					}
				}
			// ------------- honor_or_award UPDATE --------------------
			
			// ------------- affiliations UPDATE --------------------
				if ( $_POST['affiliation2'] == null ){
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'affiliations' , p_data_column = 'p_data_text' , p_data_text = null; ";
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
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'affiliations' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['affiliation2']."'; ";
					if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
					if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
					if ( $errorNo == 0 ) $insertSuccessful++;
					if ( $errorNo != 0 && $rollbackCall == 0 ){
						mysqli_rollback($_SESSION['pims_data']['connection']);
						$errorString = mysqli_error($_SESSION['pims_data']['connection']);
						$rollbackCall++;
					}
				}
			// ------------- affiliations UPDATE --------------------
		}
		
		
		if ( $errorNo == 0 && $insertSuccessful > 0 ){
			mysqli_commit($_SESSION['pims_data']['connection']);
			if ( $errorNo == 0 ){
				$echo = "alertify.success('Educational Background update/s is up to approval now'); ";
			}
			else{
				$echo = "alertify.error('An error has occured. Rolling back changes<br />Recent error: " . $errorString . "'); ";
			}
		}
		else if ( $insertSuccessful == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$echo = "alertify.log('No Educational Background changes, rolling back request'); ";
		}
		
		mysqli_close( $_SESSION['pims_data']['connection'] );
		unset( $_SESSION['pims_data']['connection'] );
		
		echo $echo;
	}
	
	function submitfamilybackground(){
		session_start();
		include("db_connect.php");
		
		$errorNo = 0;
		$rollbackCall = 0;
		$insertSuccessful = 0;
		
		$query = "insert into pims_profile_updates set emp_No = ".$_GET['id']." , p_update_date = now() , p_update_status = 'Pending' , p_update_table = '2'; ";
		if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
		if ( $errorNo != 0 && $rollbackCall == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$errorString = mysqli_error($_SESSION['pims_data']['connection']);
			$rollbackCall++;
		}
		if ( $errorNo == 0 ) $pu_id = mysqli_insert_id($_SESSION['pims_data']['connection']);
		
		$query = "select * from pims_family_background where emp_No = ".$_GET['id']."; ";
		$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		$num = mysqli_num_rows($result);
		
		
		// ------------------------------------------------------------
		
		if ( $num != 0 ){
			$row = mysqli_fetch_array($result);
			// ------------ spouse_firstname UPDATES ---------------
				if ( $row['spouse_firstname'] != $_POST['sfname1'] && !(empty($row['spouse_firstname']) && empty($_POST['sfname1'])) ){
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'spouse_firstname' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['sfname1']."'; ";
					if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
					if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
					if ( $errorNo == 0 ) $insertSuccessful++;
					if ( $errorNo != 0 && $rollbackCall == 0 ){
						mysqli_rollback($_SESSION['pims_data']['connection']);
						$errorString = mysqli_error($_SESSION['pims_data']['connection']);
						$rollbackCall++;
					}
				}
			// ------------ spouse_firstname UPDATES ---------------
			
			// ------------ spouse_middlename UPDATES ---------------
				if ( $row['spouse_middlename'] != $_POST['smname1'] && !(empty($row['spouse_middlename']) && empty($_POST['smname1'])) ){
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'spouse_middlename' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['smname1']."'; ";
					if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
					if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
					if ( $errorNo == 0 ) $insertSuccessful++;
					if ( $errorNo != 0 && $rollbackCall == 0 ){
						mysqli_rollback($_SESSION['pims_data']['connection']);
						$errorString = mysqli_error($_SESSION['pims_data']['connection']);
						$rollbackCall++;
					}
				}
			// ------------ spouse_middlename UPDATES ---------------
			
			// ------------ spouse_lastname UPDATES ---------------
				if ( $row['spouse_lastname'] != $_POST['slname1'] && !(empty($row['spouse_lastname']) && empty($_POST['slname1'])) ){
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'spouse_lastname' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['slname1']."'; ";
					if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
					if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
					if ( $errorNo == 0 ) $insertSuccessful++;
					if ( $errorNo != 0 && $rollbackCall == 0 ){
						mysqli_rollback($_SESSION['pims_data']['connection']);
						$errorString = mysqli_error($_SESSION['pims_data']['connection']);
						$rollbackCall++;
					}
				}
			// ------------ spouse_lastname UPDATES ---------------
			
			// ------------ spouse_extension_name UPDATES ---------------
				if ( $row['spouse_extension_name'] != $_POST['sename1'] && !(empty($row['spouse_extension_name']) && empty($_POST['sename1'])) ){
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'spouse_extension_name' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['sename1']."'; ";
					if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
					if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
					if ( $errorNo == 0 ) $insertSuccessful++;
					if ( $errorNo != 0 && $rollbackCall == 0 ){
						mysqli_rollback($_SESSION['pims_data']['connection']);
						$errorString = mysqli_error($_SESSION['pims_data']['connection']);
						$rollbackCall++;
					}
				}
			// ------------ spouse_extension_name UPDATES ---------------
			
			// ------------ father_lname UPDATES ---------------
				if ( $row['father_lname'] != $_POST['flname1'] && !(empty($row['father_lname']) && empty($_POST['flname1'])) ){
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
				if ( $row['father_fname'] != $_POST['ffname1'] && !(empty($row['father_fname']) && empty($_POST['ffname1'])) ){
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
				if ( $row['father_mname'] != $_POST['fmname1'] && !(empty($row['father_mname']) && empty($_POST['fmname1'])) ){
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
				if ( $row['father_birthdate'] != $_POST['fbirthdate1'] && !(empty($row['father_birthdate']) && empty($_POST['fbirthdate1'])) ){
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
				if ( $row['father_occupation'] != $_POST['foccupation1'] && !(empty($row['father_occupation']) && empty($_POST['foccupation1'])) ){
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
				if ( $row['mother_maidenname'] != $_POST['mmaidenname1'] && !(empty($row['mother_maidenname']) && empty($_POST['mmaidenname1'])) ){
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
				if ( $row['mother_lname'] != $_POST['mlname1'] && !(empty($row['mother_lname']) && empty($_POST['mlname1'])) ){
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
				if ( $row['mother_fname'] != $_POST['mfname1'] && !(empty($row['mother_fname']) && empty($_POST['mfname1'])) ){
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
				if ( $row['mother_mname'] != $_POST['mmname1'] && !(empty($row['mother_mname']) && empty($_POST['mmname1'])) ){
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
				if ( $row['mother_birthdate'] != $_POST['mbirthdate1'] && !(empty($row['mother_birthdate']) && empty($_POST['mbirthdate1'])) ){
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
				if ( $row['mother_occupation'] != $_POST['moccupation1'] && !(empty($row['mother_occupation']) && empty($_POST['moccupation1'])) ){
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
				if ( $row['no_of_siblings'] != $_POST['nos1'] && !(empty($row['no_of_siblings']) && empty($_POST['nos1'])) ){
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
			// ------------ spouse_firstname UPDATES ---------------
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'spouse_firstname' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['sfname1']."'; ";
					if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
					if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
					if ( $errorNo == 0 ) $insertSuccessful++;
					if ( $errorNo != 0 && $rollbackCall == 0 ){
						mysqli_rollback($_SESSION['pims_data']['connection']);
						$errorString = mysqli_error($_SESSION['pims_data']['connection']);
						$rollbackCall++;
					}
			// ------------ spouse_firstname UPDATES ---------------
			
			// ------------ spouse_middlename UPDATES ---------------
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'spouse_middlename' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['smname1']."'; ";
					if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
					if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
					if ( $errorNo == 0 ) $insertSuccessful++;
					if ( $errorNo != 0 && $rollbackCall == 0 ){
						mysqli_rollback($_SESSION['pims_data']['connection']);
						$errorString = mysqli_error($_SESSION['pims_data']['connection']);
						$rollbackCall++;
					}
			// ------------ spouse_middlename UPDATES ---------------
			
			// ------------ spouse_lastname UPDATES ---------------
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'spouse_lastname' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['slname1']."'; ";
					if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
					if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
					if ( $errorNo == 0 ) $insertSuccessful++;
					if ( $errorNo != 0 && $rollbackCall == 0 ){
						mysqli_rollback($_SESSION['pims_data']['connection']);
						$errorString = mysqli_error($_SESSION['pims_data']['connection']);
						$rollbackCall++;
					}
			// ------------ spouse_lastname UPDATES ---------------
			
			// ------------ spouse_extension_name UPDATES ---------------
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'spouse_extension_name' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['sename1']."'; ";
					if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
					if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
					if ( $errorNo == 0 ) $insertSuccessful++;
					if ( $errorNo != 0 && $rollbackCall == 0 ){
						mysqli_rollback($_SESSION['pims_data']['connection']);
						$errorString = mysqli_error($_SESSION['pims_data']['connection']);
						$rollbackCall++;
					}
			// ------------ spouse_extension_name UPDATES ---------------
			
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
		
		// ------------------------------------------------------------
		
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
	}
	
	function submitpersonalinfomation(){
		// For: profile.php
		// Purpose: To submit updates for Personal Information
		
		session_start();
		include("db_connect.php");
		
		$errorNo = 0;
		$rollbackCall = 0;
		$insertSuccessful = 0;
		
		// ---- THE REAL CODE ----
		
		if ( empty($_FILES["Picture1"]["tmp_name"]) ){
			$imageData = base64_encode(file_get_contents('../../img/nopic.png') );
			$imageType = 'image/png';
		}
		else{
			$imageData = base64_encode(file_get_contents($_FILES["Picture1"]["tmp_name"] ) );
			$imageType = $_FILES["Picture1"]["type"];
		}
		
		if ( $_POST['checkBoxSame1'] == "checkBoxSame1" ){
			$query = "
				insert into pims_personnel set
				emp_No = '".$_POST['emp_No1']."',
				P_picture = '".$imageData."',
				P_fname = '".$_POST['fname1']."',
				P_mname = '".$_POST['mname1']."',
				P_lname = '".$_POST['lname1']."',
				P_extension_name = '".$_POST['extension_name1']."',
				P_email = '".$_POST['emailAddress1']."',
				pims_gender = '".$_POST['gender1']."',
				pims_birthdate = '".$_POST['birthdate1']."',
				place_of_birth = '".$_POST['birthplace1']."',
				height_m = '".$_POST['height1']."',
				weight_kg = '".$_POST['weight1']."',
				temp_address_street = '".$_POST['permStreet1']."',
				temp_address_house_no = '".$_POST['permHouseNo1']."',
				temp_address_subdivision_village = '".$_POST['permSubdivisionVillage1']."',
				temp_address_barangay = '".$_POST['tempBarangay1']."',
				temp_address_municipality_city = '".$_POST['permMunicipalityCity1']."',
				temp_address_province = '".$_POST['permProvince1']."',
				temp_address_zipCode = '".$_POST['permZipCode1']."',
				perm_address_street = '".$_POST['permStreet1']."',
				perm_address_house_no = '".$_POST['permHouseNo1']."',
				perm_address_subdivision_village = '".$_POST['permSubdivisionVillage1']."',
				perm_address_barangay = '".$_POST['permBarangay1']."',
				perm_address_municipality_city = '".$_POST['permMunicipalityCity1']."',
				perm_address_province = '".$_POST['permProvince1']."',
				perm_address_zipCode = '".$_POST['permZipCode1']."',
				nationality = '".$_POST['nationality1']."',
				dual_citznshp_by_birth = '".$_POST['dual_citznshp_by_birth1']."',
				dual_citznshp_by_naturalization = '".$_POST['dual_citznshp_by_naturalization1']."',
				bloodtype = '".$_POST['bloodType1']."',
				civil_status = '".$_POST['civilStatus1']."',
				pims_religion = '".$_POST['religion1']."',
				pims_image_type = '".$imageType."',
				pims_contact_no = '".$_POST['contactNo1']."',
				pims_telephone_no = '".$_POST['telephoneNo1']."',
				GSIS_No = '".$_POST['gsis1']."',
				PAG_IBIG_id = '".$_POST['pagibig1']."',
				SSS_no = '".$_POST['sss1']."',
				TIN_no = '".$_POST['tin1']."',
				PHILHEALTH_no = '".$_POST['philhealth1']."'
			";
		}
		else{
			$query = "
				insert into pims_personnel set
				emp_No = '".$_POST['emp_No1']."',
				P_picture = '".$imageData."',
				P_fname = '".$_POST['fname1']."',
				P_mname = '".$_POST['mname1']."',
				P_lname = '".$_POST['lname1']."',
				P_extension_name = '".$_POST['extension_name1']."',
				P_email = '".$_POST['emailAddress1']."',
				pims_gender = '".$_POST['gender1']."',
				pims_birthdate = '".$_POST['birthdate1']."',
				place_of_birth = '".$_POST['birthplace1']."',
				height_m = '".$_POST['height1']."',
				weight_kg = '".$_POST['weight1']."',
				temp_address_street = '".$_POST['tempStreet1']."',
				temp_address_house_no = '".$_POST['tempHouseNo1']."',
				temp_address_subdivision_village = '".$_POST['tempSubdivisionVillage1']."',
				temp_address_barangay = '".$_POST['tempBarangay1']."',
				temp_address_municipality_city = '".$_POST['tempMunicipalityCity1']."',
				temp_address_province = '".$_POST['tempProvince1']."',
				temp_address_zipCode = '".$_POST['tempZipCode1']."',
				perm_address_street = '".$_POST['permStreet1']."',
				perm_address_house_no = '".$_POST['permHouseNo1']."',
				perm_address_subdivision_village = '".$_POST['permSubdivisionVillage1']."',
				perm_address_barangay = '".$_POST['permBarangay1']."',
				perm_address_municipality_city = '".$_POST['permMunicipalityCity1']."',
				perm_address_province = '".$_POST['permProvince1']."',
				perm_address_zipCode = '".$_POST['permZipCode1']."',
				nationality = '".$_POST['nationality1']."',
				dual_citznshp_by_birth = '".$_POST['dual_citznshp_by_birth1']."',
				dual_citznshp_by_naturalization = '".$_POST['dual_citznshp_by_naturalization1']."',
				bloodtype = '".$_POST['bloodType1']."',
				civil_status = '".$_POST['civilStatus1']."',
				pims_religion = '".$_POST['religion1']."',
				pims_image_type = '".$imageType."',
				pims_contact_no = '".$_POST['contactNo1']."',
				pims_telephone_no = '".$_POST['telephoneNo1']."',
				GSIS_No = '".$_POST['gsis1']."',
				PAG_IBIG_id = '".$_POST['pagibig1']."',
				SSS_no = '".$_POST['sss1']."',
				TIN_no = '".$_POST['tin1']."',
				PHILHEALTH_no = '".$_POST['philhealth1']."'
			";
		}
		if ( $errorNo == 0 ) $result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
			if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
			if ( $errorNo == 0 ) $insertSuccessful++;
			if ( $errorNo != 0 && $rollbackCall == 0 ){
				mysqli_rollback($_SESSION['pims_data']['connection']);
				$errorString = mysqli_error($_SESSION['pims_data']['connection']);
				$rollbackCall++;
			}
			if ( $errorNo == 0 ) $lastinsertid = mysqli_insert_id($result);
		// ---- THE REAL CODE ----
		
		if ( $errorNo == 0 && $insertSuccessful > 0 ){
			mysqli_commit($_SESSION['pims_data']['connection']);
			if ( $errorNo == 0 ){
				$echo = " globalvar_personnelID = ".$lastinsertid."; ";
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
	}
	
?>