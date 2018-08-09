<?php
	error_reporting(0);
	$q = $_GET['q'];
	
	if ( $q == "getpersonneledittinginfo" ){
		getpersonneledittinginfo();
	}
	
	if ( $q == "getpersonnelbackgroundedittinginfo" ){
		getpersonnelbackgroundedittinginfo();
	}
	
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
	
	if ( $q == "submitcivilservice" ){
		submitcivilservice();
	}
	
	function submitcivilservice(){
		include("db_connect.php");
		
		$errorNo = 0;
		$rollbackCall = 0;
		$insertSuccessful = 0;
		
		$query = "insert into pims_profile_updates set emp_No = ".$_GET['id']." , p_update_date = now() , p_update_status = 'Pending' , p_update_table = '8'; ";
		if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
		if ( $errorNo != 0 && $rollbackCall == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$errorString = mysqli_error($_SESSION['pims_data']['connection']);
			$rollbackCall++;
		}
		if ( $errorNo == 0 ) $pu_id = mysqli_insert_id($_SESSION['pims_data']['connection']);
		
		$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'career_service' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['career_service1']."'; ";
		if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
		if ( $errorNo == 0 ) $insertSuccessful++;
		if ( $errorNo != 0 && $rollbackCall == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$errorString = mysqli_error($_SESSION['pims_data']['connection']);
			$rollbackCall++;
		}
		
		$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'rating' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['rating1']."'; ";
		if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
		if ( $errorNo == 0 ) $insertSuccessful++;
		if ( $errorNo != 0 && $rollbackCall == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$errorString = mysqli_error($_SESSION['pims_data']['connection']);
			$rollbackCall++;
		}
		
		$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'exam_date' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['exam_date1']."'; ";
		if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
		if ( $errorNo == 0 ) $insertSuccessful++;
		if ( $errorNo != 0 && $rollbackCall == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$errorString = mysqli_error($_SESSION['pims_data']['connection']);
			$rollbackCall++;
		}
		
		$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'exam_place' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['exam_place1']."'; ";
		if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
		if ( $errorNo == 0 ) $insertSuccessful++;
		if ( $errorNo != 0 && $rollbackCall == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$errorString = mysqli_error($_SESSION['pims_data']['connection']);
			$rollbackCall++;
		}
		
		$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'license_no' , p_data_column = 'p_data_int' , p_data_int = '".$_POST['license_no1']."'; ";
		if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
		if ( $errorNo == 0 ) $insertSuccessful++;
		if ( $errorNo != 0 && $rollbackCall == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$errorString = mysqli_error($_SESSION['pims_data']['connection']);
			$rollbackCall++;
		}
		
		$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'license_validity_date' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['license_validity_date1']."'; ";
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
				$echo = "alertify.success('Civil Service update is up to approval now'); ";
			}
			else{
				$echo = "alertify.error('An error has occured. Rolling back changes<br />Recent error: " . $errorString . "'); ";
			}
		}
		else if ( $insertSuccessful == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$echo = "alertify.log('No Civil Service changes, rolling back request'); ";
		}
		
		mysqli_close( $_SESSION['pims_data']['connection'] );
		unset( $_SESSION['pims_data']['connection'] );
		
		echo $echo;
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
		
		$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'conducted_by' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['conducted_by1']."'; ";
		if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
		if ( $errorNo == 0 ) $insertSuccessful++;
		if ( $errorNo != 0 && $rollbackCall == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$errorString = mysqli_error($_SESSION['pims_data']['connection']);
			$rollbackCall++;
		}
		
		$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'training_type' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['training_type1']."'; ";
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
			
			// ------------ vocational_school_name UPDATES ---------------
				if ( $row['vocational_school_name'] != $_POST['vocational_school_name1'] && !(empty($row['vocational_school_name']) && empty($_POST['vocational_school_name1'])) ){
					if ( $_POST['vocational_school_name1'] == null ){
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'vocational_school_name' , p_data_column = 'p_data_text' , p_data_text = null; ";
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
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'vocational_school_name' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['vocational_school_name1']."'; ";
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
			// ------------ vocational_school_name UPDATES ---------------
			
			// ------------ vocational_course UPDATES ---------------
				if ( $row['vocational_course'] != $_POST['vocational_course1'] && !(empty($row['vocational_course']) && empty($_POST['vocational_course1'])) ){
					if ( $_POST['vocational_course1'] == null ){
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'vocational_course' , p_data_column = 'p_data_text' , p_data_text = null; ";
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
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'vocational_course' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['vocational_course1']."'; ";
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
			// ------------ vocational_course UPDATES ---------------
			
			// ------------ vocational_academic_yr UPDATES ---------------
				if ( $row['vocational_academic_yr'] != $_POST['vocational_academic_yrfr']."-".$_POST['vocational_academic_yrto'] && !(empty($row['vocational_academic_yr']) && empty($_POST['vocational_academic_yrfr']) && empty($_POST['vocational_academic_yrto'])) ){
					if ( $_POST['vocational_academic_yrfr'] == null || $_POST['vocational_academic_yrto'] == null ){
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'vocational_academic_yr' , p_data_column = 'p_data_text' , p_data_text = null; ";
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
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'vocational_academic_yr' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['vocational_academic_yrfr']."-".$_POST['vocational_academic_yrto']."'; ";
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
			// ------------ vocational_academic_yr UPDATES ---------------
			
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
			
			// ------------ gradStud_school UPDATES ---------------
				if ( $row['gradStud_school'] != $_POST['gradStud_school1'] && !(empty($row['gradStud_school']) && empty($_POST['gradStud_school1'])) ){
					if ( $_POST['gradStud_school1'] == null ){
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'gradStud_school' , p_data_column = 'p_data_text' , p_data_text = null; ";
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
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'gradStud_school' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['gradStud_school1']."'; ";
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
			// ------------ gradStud_school UPDATES ---------------
			
			// ------------ gradStud_course UPDATES ---------------
				if ( $row['gradStud_course'] != $_POST['gradStud_course1'] && !(empty($row['gradStud_course']) && empty($_POST['gradStud_course1'])) ){
					if ( $_POST['gradStud_course1'] == null ){
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'gradStud_course' , p_data_column = 'p_data_text' , p_data_text = null; ";
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
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'gradStud_course' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['gradStud_course1']."'; ";
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
			// ------------ gradStud_course UPDATES ---------------
			
			// ------------ gradStud_yr UPDATES ---------------
				if ( $row['gradStud_yr'] != $_POST['gradStud_yrfr']."-".$_POST['gradStud_yrto'] && !(empty($row['gradStud_yr']) && empty($_POST['gradStud_yrfr']) && empty($_POST['gradStud_yrto'])) ){
					if ( $_POST['gradStud_yrfr'] == null || $_POST['gradStud_yrto'] == null ){
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'gradStud_yr' , p_data_column = 'p_data_text' , p_data_text = null; ";
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
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'gradStud_yr' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['gradStud_yrfr']."-".$_POST['gradStud_yrto']."'; ";
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
			// ------------ gradStud_yr UPDATES ---------------
			
			// ------------- honor_or_award UPDATE --------------------
			if ( $row['honor_or_award'] != $_POST['honor_or_award1'] && !(empty($row['honor_or_award']) && empty($_POST['honor_or_award1'])) ){
				if ( $_POST['honor_or_award1'] == null ){
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
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'honor_or_award' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['honor_or_award1']."'; ";
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
			if ( $row['affiliations'] != $_POST['affiliations1'] && !(empty($row['affiliations']) && empty($_POST['affiliations1'])) ){
				if ( $_POST['affiliations1'] == null ){
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
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'affiliations' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['affiliations1']."'; ";
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
			// ------------- highest_units UPDATE --------------------
			if ( $row['highest_units'] != $_POST['highest_units1'] && !(empty($row['highest_units']) && empty($_POST['highest_units1'])) ){
				if ( $_POST['highest_units1'] == null ){
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'highest_units' , p_data_column = 'p_data_text' , p_data_text = null; ";
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
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'highest_units' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['highest_units1']."'; ";
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
			// ------------- highest_units UPDATE --------------------
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
			
			// ------------ vocational_school_name UPDATES ---------------
					if ( $_POST['vocational_school_name1'] == null ){
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'vocational_school_name' , p_data_column = 'p_data_text' , p_data_text = null; ";
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
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'vocational_school_name' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['vocational_school_name1']."'; ";
						if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
						if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
						if ( $errorNo == 0 ) $insertSuccessful++;
						if ( $errorNo != 0 && $rollbackCall == 0 ){
							mysqli_rollback($_SESSION['pims_data']['connection']);
							$errorString = mysqli_error($_SESSION['pims_data']['connection']);
							$rollbackCall++;
						}
					}
			// ------------ vocational_school_name UPDATES ---------------
			
			// ------------ vocational_course UPDATES ---------------
					if ( $_POST['vocational_course1'] == null ){
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'vocational_course' , p_data_column = 'p_data_text' , p_data_text = null; ";
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
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'vocational_course' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['vocational_course1']."'; ";
						if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
						if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
						if ( $errorNo == 0 ) $insertSuccessful++;
						if ( $errorNo != 0 && $rollbackCall == 0 ){
							mysqli_rollback($_SESSION['pims_data']['connection']);
							$errorString = mysqli_error($_SESSION['pims_data']['connection']);
							$rollbackCall++;
						}
					}
			// ------------ vocational_course UPDATES ---------------
			
			// ------------ vocational_academic_yr UPDATES ---------------
					if ( $_POST['vocational_academic_yrfr'] == null || $_POST['vocational_academic_yrto'] == null ){
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'vocational_academic_yr' , p_data_column = 'p_data_text' , p_data_text = null; ";
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
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'vocational_academic_yr' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['vocational_academic_yrfr']."-".$_POST['vocational_academic_yrto']."'; ";
						if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
						if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
						if ( $errorNo == 0 ) $insertSuccessful++;
						if ( $errorNo != 0 && $rollbackCall == 0 ){
							mysqli_rollback($_SESSION['pims_data']['connection']);
							$errorString = mysqli_error($_SESSION['pims_data']['connection']);
							$rollbackCall++;
						}
					}
			// ------------ vocational_academic_yr UPDATES ---------------
			
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
			
			// ------------ gradStud_school UPDATES ---------------
					if ( $_POST['gradStud_school1'] == null ){
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'gradStud_school' , p_data_column = 'p_data_text' , p_data_text = null; ";
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
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'gradStud_school' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['gradStud_school1']."'; ";
						if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
						if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
						if ( $errorNo == 0 ) $insertSuccessful++;
						if ( $errorNo != 0 && $rollbackCall == 0 ){
							mysqli_rollback($_SESSION['pims_data']['connection']);
							$errorString = mysqli_error($_SESSION['pims_data']['connection']);
							$rollbackCall++;
						}
					}
			// ------------ gradStud_school UPDATES ---------------
			
			// ------------ gradStud_course UPDATES ---------------
					if ( $_POST['gradStud_course1'] == null ){
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'gradStud_course' , p_data_column = 'p_data_text' , p_data_text = null; ";
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
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'gradStud_course' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['gradStud_course1']."'; ";
						if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
						if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
						if ( $errorNo == 0 ) $insertSuccessful++;
						if ( $errorNo != 0 && $rollbackCall == 0 ){
							mysqli_rollback($_SESSION['pims_data']['connection']);
							$errorString = mysqli_error($_SESSION['pims_data']['connection']);
							$rollbackCall++;
						}
					}
			// ------------ gradStud_course UPDATES ---------------
			
			// ------------ gradStud_yr UPDATES ---------------
					if ( $_POST['gradStud_yrfr'] == null || $_POST['gradStud_yrto'] == null ){
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'gradStud_yr' , p_data_column = 'p_data_text' , p_data_text = null; ";
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
						$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'gradStud_yr' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['gradStud_yrfr']."-".$_POST['gradStud_yrto']."'; ";
						if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
						if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
						if ( $errorNo == 0 ) $insertSuccessful++;
						if ( $errorNo != 0 && $rollbackCall == 0 ){
							mysqli_rollback($_SESSION['pims_data']['connection']);
							$errorString = mysqli_error($_SESSION['pims_data']['connection']);
							$rollbackCall++;
						}
					}
			// ------------ gradStud_yr UPDATES ---------------
			
			// ------------- honor_or_award UPDATE --------------------
				if ( $_POST['honor_or_award1'] == null ){
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
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'honor_or_award' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['honor_or_award1']."'; ";
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
				if ( $_POST['affiliations1'] == null ){
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
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'affiliations' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['affiliations1']."'; ";
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
			// ------------- highest_units UPDATE --------------------
				if ( $_POST['highest_units1'] == null ){
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'highest_units' , p_data_column = 'p_data_text' , p_data_text = null; ";
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
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'highest_units' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['highest_units1']."'; ";
					if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
					if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
					if ( $errorNo == 0 ) $insertSuccessful++;
					if ( $errorNo != 0 && $rollbackCall == 0 ){
						mysqli_rollback($_SESSION['pims_data']['connection']);
						$errorString = mysqli_error($_SESSION['pims_data']['connection']);
						$rollbackCall++;
					}
				}
			// ------------- highest_units UPDATE --------------------
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
			
			// ------------ spouse_occupation UPDATES ---------------
				if ( $row['spouse_occupation'] != $_POST['soccupation1'] && !(empty($row['spouse_occupation']) && empty($_POST['soccupation1'])) ){
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'spouse_occupation' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['soccupation1']."'; ";
					if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
					if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
					if ( $errorNo == 0 ) $insertSuccessful++;
					if ( $errorNo != 0 && $rollbackCall == 0 ){
						mysqli_rollback($_SESSION['pims_data']['connection']);
						$errorString = mysqli_error($_SESSION['pims_data']['connection']);
						$rollbackCall++;
					}
				}
			// ------------ spouse_occupation UPDATES ---------------
			
			// ------------ spouse_business_name UPDATES ---------------
				if ( $row['spouse_business_name'] != $_POST['employerbusinessname1'] && !(empty($row['spouse_business_name']) && empty($_POST['employerbusinessname1'])) ){
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'spouse_business_name' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['employerbusinessname1']."'; ";
					if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
					if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
					if ( $errorNo == 0 ) $insertSuccessful++;
					if ( $errorNo != 0 && $rollbackCall == 0 ){
						mysqli_rollback($_SESSION['pims_data']['connection']);
						$errorString = mysqli_error($_SESSION['pims_data']['connection']);
						$rollbackCall++;
					}
				}
			// ------------ spouse_business_name UPDATES ---------------
			
			// ------------ spouse_business_addr UPDATES ---------------
				if ( $row['spouse_business_addr'] != $_POST['businessaddress1'] && !(empty($row['spouse_business_addr']) && empty($_POST['businessaddress1'])) ){
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'spouse_business_addr' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['businessaddress1']."'; ";
					if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
					if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
					if ( $errorNo == 0 ) $insertSuccessful++;
					if ( $errorNo != 0 && $rollbackCall == 0 ){
						mysqli_rollback($_SESSION['pims_data']['connection']);
						$errorString = mysqli_error($_SESSION['pims_data']['connection']);
						$rollbackCall++;
					}
				}
			// ------------ spouse_business_addr UPDATES ---------------
			
			// ------------ spouse_tel_no UPDATES ---------------
				if ( $row['spouse_tel_no'] != $_POST['steleponenumber1'] && !(empty($row['spouse_tel_no']) && empty($_POST['steleponenumber1'])) ){
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'spouse_tel_no' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['steleponenumber1']."'; ";
					if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
					if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
					if ( $errorNo == 0 ) $insertSuccessful++;
					if ( $errorNo != 0 && $rollbackCall == 0 ){
						mysqli_rollback($_SESSION['pims_data']['connection']);
						$errorString = mysqli_error($_SESSION['pims_data']['connection']);
						$rollbackCall++;
					}
				}
			// ------------ spouse_tel_no UPDATES ---------------
			
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
			
			// ------------ father_extension_name UPDATES ---------------
				if ( $row['father_extension_name'] != $_POST['fename1'] && !(empty($row['father_extension_name']) && empty($_POST['fename1'])) ){
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'father_extension_name' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['fename1']."'; ";
					if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
					if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
					if ( $errorNo == 0 ) $insertSuccessful++;
					if ( $errorNo != 0 && $rollbackCall == 0 ){
						mysqli_rollback($_SESSION['pims_data']['connection']);
						$errorString = mysqli_error($_SESSION['pims_data']['connection']);
						$rollbackCall++;
					}
				}
			// ------------ father_extension_name UPDATES ---------------
			
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
			
			// ------------ children_name UPDATES ---------------
				if ( $row['children_name'] != $_POST['childrenname1'] && !(empty($row['children_name']) && empty($_POST['childrenname1'])) ){
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'children_name' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['childrenname1']."'; ";
					if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
					if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
					if ( $errorNo == 0 ) $insertSuccessful++;
					if ( $errorNo != 0 && $rollbackCall == 0 ){
						mysqli_rollback($_SESSION['pims_data']['connection']);
						$errorString = mysqli_error($_SESSION['pims_data']['connection']);
						$rollbackCall++;
					}
				}
			// ------------ children_name UPDATES ---------------
			
			// ------------ children_birthdate UPDATES ---------------
				if ( $row['children_birthdate'] != $_POST['childrenbday1'] && !(empty($row['children_birthdate']) && empty($_POST['childrenbday1'])) ){
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'children_birthdate' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['childrenbday1']."'; ";
					if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
					if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
					if ( $errorNo == 0 ) $insertSuccessful++;
					if ( $errorNo != 0 && $rollbackCall == 0 ){
						mysqli_rollback($_SESSION['pims_data']['connection']);
						$errorString = mysqli_error($_SESSION['pims_data']['connection']);
						$rollbackCall++;
					}
				}
			// ------------ children_birthdate UPDATES ---------------
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
			
			// ------------ spouse_occupation UPDATES ---------------
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'spouse_occupation' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['soccupation1']."'; ";
					if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
					if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
					if ( $errorNo == 0 ) $insertSuccessful++;
					if ( $errorNo != 0 && $rollbackCall == 0 ){
						mysqli_rollback($_SESSION['pims_data']['connection']);
						$errorString = mysqli_error($_SESSION['pims_data']['connection']);
						$rollbackCall++;
					}
			// ------------ spouse_occupation UPDATES ---------------
			
			// ------------ spouse_business_name UPDATES ---------------
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'spouse_business_name' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['employerbusinessname1']."'; ";
					if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
					if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
					if ( $errorNo == 0 ) $insertSuccessful++;
					if ( $errorNo != 0 && $rollbackCall == 0 ){
						mysqli_rollback($_SESSION['pims_data']['connection']);
						$errorString = mysqli_error($_SESSION['pims_data']['connection']);
						$rollbackCall++;
					}
			// ------------ spouse_business_name UPDATES ---------------
			
			// ------------ spouse_business_addr UPDATES ---------------
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'spouse_business_addr' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['businessaddress1']."'; ";
					if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
					if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
					if ( $errorNo == 0 ) $insertSuccessful++;
					if ( $errorNo != 0 && $rollbackCall == 0 ){
						mysqli_rollback($_SESSION['pims_data']['connection']);
						$errorString = mysqli_error($_SESSION['pims_data']['connection']);
						$rollbackCall++;
					}
			// ------------ spouse_business_addr UPDATES ---------------
			
			// ------------ spouse_tel_no UPDATES ---------------
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'spouse_tel_no' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['steleponenumber1']."'; ";
					if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
					if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
					if ( $errorNo == 0 ) $insertSuccessful++;
					if ( $errorNo != 0 && $rollbackCall == 0 ){
						mysqli_rollback($_SESSION['pims_data']['connection']);
						$errorString = mysqli_error($_SESSION['pims_data']['connection']);
						$rollbackCall++;
					}
			// ------------ spouse_tel_no UPDATES ---------------
			
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
			
			// ------------ father_extension_name UPDATES ---------------
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'father_extension_name' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['fename1']."'; ";
					if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
					if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
					if ( $errorNo == 0 ) $insertSuccessful++;
					if ( $errorNo != 0 && $rollbackCall == 0 ){
						mysqli_rollback($_SESSION['pims_data']['connection']);
						$errorString = mysqli_error($_SESSION['pims_data']['connection']);
						$rollbackCall++;
					}
			// ------------ father_extension_name UPDATES ---------------
			
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
			
			// ------------ children_name UPDATES ---------------
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'children_name' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['childrenname1']."'; ";
					if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
					if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
					if ( $errorNo == 0 ) $insertSuccessful++;
					if ( $errorNo != 0 && $rollbackCall == 0 ){
						mysqli_rollback($_SESSION['pims_data']['connection']);
						$errorString = mysqli_error($_SESSION['pims_data']['connection']);
						$rollbackCall++;
					}
			// ------------ children_name UPDATES ---------------
			
			// ------------ children_birthdate UPDATES ---------------
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'children_birthdate' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['childrenbday1']."'; ";
					if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
					if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
					if ( $errorNo == 0 ) $insertSuccessful++;
					if ( $errorNo != 0 && $rollbackCall == 0 ){
						mysqli_rollback($_SESSION['pims_data']['connection']);
						$errorString = mysqli_error($_SESSION['pims_data']['connection']);
						$rollbackCall++;
					}
			// ------------ children_birthdate UPDATES ---------------
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
		
		$query = "insert into pims_profile_updates set emp_No = ".$_GET['id']." , p_update_date = now() , p_update_status = 'Pending' , p_update_table = '1'; ";
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
		
		// ---- PROFILE PICTURE UPDATE --------
		if ( $_POST['profilepicturechange'] == "profilepicturechange" ){
			if ( $_POST['profilepicturereset'] == "profilepicturereset" ){
				$imageData = base64_encode(file_get_contents('../../img/nopic.png') );
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
			else{
				$imageData = base64_encode(file_get_contents($_FILES["Picture1"]["tmp_name"] ) );
				$imageType = $_FILES["Picture1"]["type"];
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
		// ---- PROFILE PICTURE UPDATE --------
		
		// ------------- pims_gender UPDATE --------------------
		if ( $row['pims_gender'] != $_POST['gender1'] && !(empty($row['pims_gender']) && empty($_POST['gender1'])) ){
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
		if ( $row['pims_birthdate'] != $_POST['birthdate1'] && !(empty($row['pims_birthdate']) && empty($_POST['birthdate1'])) ){
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
		
		// ------------- place_of_birth UPDATE --------------------
		if ( $row['place_of_birth'] != $_POST['birthplace1'] && !(empty($row['place_of_birth']) && empty($_POST['birthplace1'])) ){
			$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'place_of_birth' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['birthplace1']."'; ";
			if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
			if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
			if ( $errorNo == 0 ) $insertSuccessful++;
			if ( $errorNo != 0 && $rollbackCall == 0 ){
				mysqli_rollback($_SESSION['pims_data']['connection']);
				$errorString = mysqli_error($_SESSION['pims_data']['connection']);
				$rollbackCall++;
			}
		}
		// ------------- place_of_birth UPDATE --------------------
		
		// ------------- height_m UPDATE --------------------
		if ( $row['height_m'] != $_POST['height1'] && !(empty($row['height_m']) && empty($_POST['height1'])) ){
			$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'height_m' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['height1']."'; ";
			if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
			if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
			if ( $errorNo == 0 ) $insertSuccessful++;
			if ( $errorNo != 0 && $rollbackCall == 0 ){
				mysqli_rollback($_SESSION['pims_data']['connection']);
				$errorString = mysqli_error($_SESSION['pims_data']['connection']);
				$rollbackCall++;
			}
		}
		// ------------- height_m UPDATE --------------------
		
		// ------------- weight_kg UPDATE --------------------
		if ( $row['weight_kg'] != $_POST['weight1'] && !(empty($row['weight_kg']) && empty($_POST['weight1'])) ){
			$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'weight_kg' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['weight1']."'; ";
			if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
			if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
			if ( $errorNo == 0 ) $insertSuccessful++;
			if ( $errorNo != 0 && $rollbackCall == 0 ){
				mysqli_rollback($_SESSION['pims_data']['connection']);
				$errorString = mysqli_error($_SESSION['pims_data']['connection']);
				$rollbackCall++;
			}
		}
		// ------------- weight_kg UPDATE --------------------
		
		// ------------- nationality UPDATE --------------------
		if ( $row['nationality'] != $_POST['nationality1'] && !(empty($row['nationality']) && empty($_POST['nationality1'])) ){
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
		if ( $row['civil_status'] != $_POST['civilStatus1'] && !(empty($row['civil_status']) && empty($_POST['civilStatus1'])) ){
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
		// ------------- civil_status UPDATE --------------------
		
		// ------------- bloodtype UPDATE --------------------
		if ( $row['bloodtype'] != $_POST['bloodType1'] && !(empty($row['bloodtype']) && empty($_POST['bloodType1'])) ){
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
		if ( $row['GSIS_No'] != $_POST['gsis1'] && !(empty($row['GSIS_No']) && empty($_POST['gsis1'])) ){
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
		
		// ------------- PAG_IBIG_id UPDATE --------------------
		if ( $row['PAG_IBIG_id'] != $_POST['pagibig1'] && !(empty($row['PAG_IBIG_id']) && empty($_POST['pagibig1'])) ){
			$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'PAG_IBIG_id' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['pagibig1']."'; ";
			if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
			if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
			if ( $errorNo == 0 ) $insertSuccessful++;
			if ( $errorNo != 0 && $rollbackCall == 0 ){
				mysqli_rollback($_SESSION['pims_data']['connection']);
				$errorString = mysqli_error($_SESSION['pims_data']['connection']);
				$rollbackCall++;
			}
		}
		// ------------- PAG_IBIG_id UPDATE --------------------
		
		// ------------- SSS_no UPDATE --------------------
		if ( $row['SSS_no'] != $_POST['sss1'] && !(empty($row['SSS_no']) && empty($_POST['sss1'])) ){
			$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'SSS_no' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['sss1']."'; ";
			if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
			if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
			if ( $errorNo == 0 ) $insertSuccessful++;
			if ( $errorNo != 0 && $rollbackCall == 0 ){
				mysqli_rollback($_SESSION['pims_data']['connection']);
				$errorString = mysqli_error($_SESSION['pims_data']['connection']);
				$rollbackCall++;
			}
		}
		// ------------- SSS_no UPDATE --------------------
		
		// ------------- TIN_no UPDATE --------------------
		if ( $row['TIN_no'] != $_POST['tin1'] && !(empty($row['TIN_no']) && empty($_POST['tin1'])) ){
			$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'TIN_no' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['tin1']."'; ";
			if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
			if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
			if ( $errorNo == 0 ) $insertSuccessful++;
			if ( $errorNo != 0 && $rollbackCall == 0 ){
				mysqli_rollback($_SESSION['pims_data']['connection']);
				$errorString = mysqli_error($_SESSION['pims_data']['connection']);
				$rollbackCall++;
			}
		}
		// ------------- TIN_no UPDATE --------------------
		
		// ------------- PHILHEALTH_no UPDATE --------------------
		if ( $row['PHILHEALTH_no'] != $_POST['philhealth1'] && !(empty($row['PHILHEALTH_no']) && empty($_POST['philhealth1'])) ){
			$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'PHILHEALTH_no' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['philhealth1']."'; ";
			if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
			if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
			if ( $errorNo == 0 ) $insertSuccessful++;
			if ( $errorNo != 0 && $rollbackCall == 0 ){
				mysqli_rollback($_SESSION['pims_data']['connection']);
				$errorString = mysqli_error($_SESSION['pims_data']['connection']);
				$rollbackCall++;
			}
		}
		// ------------- PHILHEALTH_no UPDATE --------------------
		
		// ------------- pims_contact_no UPDATE --------------------
		if ( $row['pims_contact_no'] != $_POST['contactNo1'] && !(empty($row['pims_contact_no']) && empty($_POST['contactNo1'])) ){
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
		
		// ------------- pims_telephone_no UPDATE --------------------
		if ( $row['pims_telephone_no'] != $_POST['telephoneNo1'] && !(empty($row['pims_telephone_no']) && empty($_POST['telephoneNo1'])) ){
			$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'pims_telephone_no' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['telephoneNo1']."'; ";
			if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
			if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
			if ( $errorNo == 0 ) $insertSuccessful++;
			if ( $errorNo != 0 && $rollbackCall == 0 ){
				mysqli_rollback($_SESSION['pims_data']['connection']);
				$errorString = mysqli_error($_SESSION['pims_data']['connection']);
				$rollbackCall++;
			}
		}
		// ------------- pims_telephone_no UPDATE --------------------
		
		// ------------- P_email UPDATE --------------------
		if ( $row['P_email'] != $_POST['emailAddress1'] && !(empty($row['P_email']) && empty($_POST['emailAddress1'])) ){
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
		if ( $row['pims_religion'] != $_POST['religion1'] && !(empty($row['pims_religion']) && empty($_POST['religion1'])) ){
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
		
		// ------------- dual_citznshp_by_birth UPDATE --------------------
		if ( $row['dual_citznshp_by_birth'] != $_POST['dual_citznshp_by_birth1'] && !(empty($row['dual_citznshp_by_birth']) && empty($_POST['dual_citznshp_by_birth1'])) ){
			$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'dual_citznshp_by_birth' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['dual_citznshp_by_birth1']."'; ";
			if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
			if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
			if ( $errorNo == 0 ) $insertSuccessful++;
			if ( $errorNo != 0 && $rollbackCall == 0 ){
				mysqli_rollback($_SESSION['pims_data']['connection']);
				$errorString = mysqli_error($_SESSION['pims_data']['connection']);
				$rollbackCall++;
			}
		}
		// ------------- dual_citznshp_by_birth UPDATE --------------------
		
		// ------------- dual_citznshp_by_naturalization UPDATE --------------------
		if ( $row['dual_citznshp_by_naturalization'] != $_POST['dual_citznshp_by_naturalization1'] && !(empty($row['dual_citznshp_by_naturalization']) && empty($_POST['dual_citznshp_by_naturalization1'])) ){
			$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'dual_citznshp_by_naturalization' , p_data_column = 'p_data_text' , p_data_text = '".$_POST['dual_citznshp_by_naturalization1']."'; ";
			if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
			if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
			if ( $errorNo == 0 ) $insertSuccessful++;
			if ( $errorNo != 0 && $rollbackCall == 0 ){
				mysqli_rollback($_SESSION['pims_data']['connection']);
				$errorString = mysqli_error($_SESSION['pims_data']['connection']);
				$rollbackCall++;
			}
		}
		// ------------- dual_citznshp_by_naturalization UPDATE --------------------
		
		// ------------- ADDRESS UPDATE --------------------
		if ( $_POST['checkBoxSame1'] == "checkBoxSame1" ){
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
			
			// ------------- temp_address_subdivision_village - perm_address_subdivision_village UPDATE --------------------
				if ( $_POST['permSubdivisionVillage1'] == null ){
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'temp_address_subdivision_village' , p_data_column = 'p_data_text' , p_data_text = null; ";
					if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
					if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
					if ( $errorNo == 0 ) $insertSuccessful++;
					if ( $errorNo != 0 && $rollbackCall == 0 ){
						mysqli_rollback($_SESSION['pims_data']['connection']);
						$errorString = mysqli_error($_SESSION['pims_data']['connection']);
						$rollbackCall++;
					}
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'perm_address_subdivision_village' , p_data_column = 'p_data_text' , p_data_text = null; ";
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
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'temp_address_subdivision_village' , p_data_column = 'p_data_text' , p_data_text = ".$_POST['permSubdivisionVillage1']."; ";
					if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
					if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
					if ( $errorNo == 0 ) $insertSuccessful++;
					if ( $errorNo != 0 && $rollbackCall == 0 ){
						mysqli_rollback($_SESSION['pims_data']['connection']);
						$errorString = mysqli_error($_SESSION['pims_data']['connection']);
						$rollbackCall++;
					}
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'perm_address_subdivision_village' , p_data_column = 'p_data_text' , p_data_text = ".$_POST['permSubdivisionVillage1']."; ";
					if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
					if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
					if ( $errorNo == 0 ) $insertSuccessful++;
					if ( $errorNo != 0 && $rollbackCall == 0 ){
						mysqli_rollback($_SESSION['pims_data']['connection']);
						$errorString = mysqli_error($_SESSION['pims_data']['connection']);
						$rollbackCall++;
					}
				}
			// ------------- temp_address_subdivision_village - perm_address_subdivision_village UPDATE --------------------
		}
		else{
			// ------------- temp_address_barangay UPDATE --------------------
			if ( $row['temp_address_barangay'] !== $_POST['tempBarangay1'] && !(empty($row['temp_address_barangay']) && empty($_POST['tempBarangay1'])) ){
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
			if ( $row['perm_address_barangay'] !== $_POST['permBarangay1'] && !(empty($row['perm_address_barangay']) && empty($_POST['permBarangay1'])) ){
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
			if ( $row['temp_address_municipality_city'] !== $_POST['tempMunicipalityCity1'] && !(empty($row['temp_address_municipality_city']) && empty($_POST['tempMunicipalityCity1'])) ){
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
			if ( $row['perm_address_municipality_city'] !== $_POST['permMunicipalityCity1'] && !(empty($row['perm_address_municipality_city']) && empty($_POST['permMunicipalityCity1'])) ){
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
			if ( $row['temp_address_province'] !== $_POST['tempProvince1'] && !(empty($row['temp_address_province']) && empty($_POST['tempProvince1'])) ){
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
			if ( $row['perm_address_province'] !== $_POST['permProvince1'] && !(empty($row['perm_address_province']) && empty($_POST['permProvince1'])) ){
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
			if ( $row['temp_address_zipCode'] !== $_POST['tempZipCode1'] && !(empty($row['temp_address_zipCode']) && empty($_POST['tempZipCode1'])) ){
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
			if ( $row['perm_address_zipCode'] !== $_POST['permZipCode1'] && !(empty($row['perm_address_zipCode']) && empty($_POST['permZipCode1'])) ){
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
			if ( $row['temp_address_street'] !== $_POST['tempStreet1'] && !(empty($row['temp_address_street']) && empty($_POST['tempStreet1'])) ){
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
			if ( $row['perm_address_street'] !== $_POST['permStreet1'] && !(empty($row['perm_address_street']) && empty($_POST['permStreet1'])) ){
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
			if ( $row['temp_address_house_no'] !== $_POST['tempHouseNo1'] && !(empty($row['temp_address_house_no']) && empty($_POST['tempHouseNo1'])) ){
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
			if ( $row['perm_address_house_no'] !== $_POST['permHouseNo1'] && !(empty($row['perm_address_house_no']) && empty($_POST['permHouseNo1'])) ){
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
			
			// ------------- temp_address_subdivision_village UPDATE --------------------
			if ( $row['temp_address_subdivision_village'] !== $_POST['tempSubdivisionVillage1'] && !(empty($row['temp_address_subdivision_village']) && empty($_POST['tempSubdivisionVillage1'])) ){
				if ( $_POST['tempSubdivisionVillage1'] == null ){
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'temp_address_subdivision_village' , p_data_column = 'p_data_text' , p_data_text = null; ";
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
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'temp_address_subdivision_village' , p_data_column = 'p_data_text' , p_data_text = ".$_POST['tempSubdivisionVillage1']."; ";
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
			// ------------- temp_address_subdivision_village UPDATE --------------------
			
			// ------------- perm_address_subdivision_village UPDATE --------------------
			if ( $row['perm_address_subdivision_village'] !== $_POST['permSubdivisionVillage1'] && !(empty($row['perm_address_subdivision_village']) && empty($_POST['permSubdivisionVillage1'])) ){
				if ( $_POST['tempSubdivisionVillage1'] == null ){
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'perm_address_subdivision_village' , p_data_column = 'p_data_text' , p_data_text = null; ";
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
					$query = "insert into pims_profile_update_list set p_update_id = ".$pu_id." , p_column_name = 'perm_address_subdivision_village' , p_data_column = 'p_data_text' , p_data_text = ".$_POST['permSubdivisionVillage1']."; ";
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
			// ------------- perm_address_subdivision_village UPDATE --------------------
		}
		
		
		// ------------- ADDRESS UPDATE --------------------
		
		if ( $errorNo == 0 && $insertSuccessful > 0 ){
			mysqli_commit($_SESSION['pims_data']['connection']);
			if ( $errorNo == 0 ){
				$echo = "alertify.success('Your Personal Information Updates has been successfully upload. It will be reviewed by the administrators.'); ";
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
	
	function getpersonnelbackgroundedittinginfo(){
		// For: profile.php
		// Purpose: To load personnel family background and educational background data on profile.php page for editting
		include("db_connect.php");
	
		$echo = "";
		
		$query = "select * from pims_family_background where emp_No = ".$_SESSION['pims_data']['emp_id']." ; ";
		$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		if ( mysqli_num_rows($result) > 0 ){
			$row = mysqli_fetch_array( $result );
			
			$echo = $echo . " $('#slname1').val('".$row['spouse_lastname']."'); ";
			$echo = $echo . " $('#sfname1').val('".$row['spouse_firstname']."'); ";
			$echo = $echo . " $('#smname1').val('".$row['spouse_middlename']."'); ";
			$echo = $echo . " $('#sename1').val('".$row['spouse_extension_name']."'); ";
			$echo = $echo . " $('#soccupation1').val('".$row['spouse_occupation']."'); ";
			$echo = $echo . " $('#employerbusinessname1').val('".$row['spouse_business_name']."'); ";
			$echo = $echo . " $('#businessaddress1').val('".$row['spouse_business_addr']."'); ";
			$echo = $echo . " $('#steleponenumber1').val('".$row['spouse_tel_no']."'); ";
			$echo = $echo . " $('#ffname1').val('".$row['father_fname']."'); ";
			$echo = $echo . " $('#fmname1').val('".$row['father_mname']."'); ";
			$echo = $echo . " $('#flname1').val('".$row['father_lname']."'); ";
			$echo = $echo . " $('#fename1').val('".$row['father_extension_name']."'); ";
			$echo = $echo . " $('#fbirthdate1').val('".$row['father_birthdate']."'); ";
			$echo = $echo . " $('#foccupation1').val('".$row['father_occupation']."'); ";
			$echo = $echo . " $('#mfname1').val('".$row['mother_fname']."'); ";
			$echo = $echo . " $('#mmname1').val('".$row['mother_mname']."'); ";
			$echo = $echo . " $('#mmaidenname1').val('".$row['mother_maidenname']."'); ";
			$echo = $echo . " $('#mlname1').val('".$row['mother_lname']."'); ";
			$echo = $echo . " $('#mbirthdate1').val('".$row['mother_birthdate']."'); ";
			$echo = $echo . " $('#moccupation1').val('".$row['mother_occupation']."'); ";
			$echo = $echo . " $('#childrenname1').val('".$row['children_name']."'); ";
			$echo = $echo . " $('#childrenbday1').val('".$row['children_birthdate']."'); ";
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
			$echo = $echo . " $('#vocational_school_name1').val('".$row['vocational_school_name']."'); ";
			$echo = $echo . " $('#vocational_course1').val('".$row['vocational_course']."'); ";
			$eF = substr( $row['vocational_academic_yr'] , 0 , 4 );
			$eT = substr( $row['vocational_academic_yr'] , 5 , 4 );
			$echo = $echo . " $('#vocational_academic_yrfr').val('".$eF."'); ";
			$echo = $echo . " $('#vocational_academic_yrto').val('".$eT."'); ";
			$echo = $echo . " $('#college2').val('".$row['tertiary_school_name']."'); ";
			$tF = substr( $row['tertiary_academic_yr'] , 0 , 4 );
			$tT = substr( $row['tertiary_academic_yr'] , 5 , 4 );
			$echo = $echo . " $('#collegeFrom2').val('".$tF."'); ";
			$echo = $echo . " $('#collegeTo2').val('".$tT."'); ";
			$echo = $echo . " $('#collegeDegree2').val('".$row['tertiary_degrees']."'); ";
			$echo = $echo . " $('#gradStud_school1').val('".$row['gradStud_school']."'); ";
			$echo = $echo . " $('#gradStud_course1').val('".$row['gradStud_course']."'); ";
			$eF = substr( $row['gradStud_yr'] , 0 , 4 );
			$eT = substr( $row['gradStud_yr'] , 5 , 4 );
			$echo = $echo . " $('#gradStud_yrfr').val('".$eF."'); ";
			$echo = $echo . " $('#gradStud_yrto').val('".$eT."'); ";
			$echo = $echo . " $('#honor_or_award1').val('".$row['honor_or_award']."'); ";
			$echo = $echo . " $('#affiliations1').val('".$row['affiliations']."'); ";
			$echo = $echo . " $('#highest_units1').val('".$row['highest_units']."'); ";
		}
		
		mysqli_close( $_SESSION['pims_data']['connection'] );
		unset( $_SESSION['pims_data']['connection'] );
		
		echo "<script> " . $echo . "</script>";
	}
	
	function getpersonneledittinginfo(){
		// For: profile.php
		// Purpose: To load basic personnel data on edit_profile.php page for editting
		include("db_connect.php");
	
		$query = "select * from pims_personnel where emp_No = ".$_SESSION['pims_data']['emp_id']."; ";
		$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		$row = mysqli_fetch_array( $result );
		
		
		$nameStr = "NAME: " . $row['P_lname'] . ", " . $row['P_fname'];
		if ( $row['P_mname'] != null ) $nameStr = $nameStr . " " . $row['P_mname'];
		if ( $row['P_extension_name'] != null ) $nameStr = $nameStr . " " . $row['P_extension_name'];
		
		
		
		$echo = '
		$("#name1").html("'.$nameStr.'");
		
		if ( "'.$row['pims_gender'].'" == "Male" ){
			$("input:radio[name=gender1]:nth(0)").attr("checked",true);
		}
		else if ( "'.$row['pims_gender'].'" == "Female" ){
			$("input:radio[name=gender1]:nth(1)").attr("checked",true);
		}
		
		$("#birthdate1").val("'.$row['pims_birthdate'].'");
		$("#birthplace1").val("'.$row['place_of_birth'].'");
		$("#nationality1").val("'.$row['nationality'].'");
		
		if ( "'.$row['civil_status'].'" == "SINGLE" ){
			$("input:radio[name=civilStatus1]:nth(0)").attr("checked",true);
		}
		else if ( "'.$row['civil_status'].'" == "MARRIED" ){
			$("input:radio[name=civilStatus1]:nth(1)").attr("checked",true);
		}
		else if ( "'.$row['civil_status'].'" == "LIVE-IN" ){
			$("input:radio[name=civilStatus1]:nth(2)").attr("checked",true);
		}
		else if ( "'.$row['civil_status'].'" == "SEPARATED" ){
			$("input:radio[name=civilStatus1]:nth(3)").attr("checked",true);
		}
		else if ( "'.$row['civil_status'].'" == "WIDOW" ){
			$("input:radio[name=civilStatus1]:nth(4)").attr("checked",true);
		}
		else if ( "'.$row['civil_status'].'" == "WIDOWER" ){
			$("input:radio[name=civilStatus1]:nth(5)").attr("checked",true);
		}
		else if ( "'.$row['civil_status'].'" == "DIVORCED" ){
			$("input:radio[name=civilStatus1]:nth(6)").attr("checked",true);
		}
		
		$("#bloodType1").val("'.$row['bloodtype'].'");
		$("#gsis1").val("'.$row['GSIS_No'].'");
		$("#pagibig1").val("'.$row['PAG_IBIG_id'].'");
		$("#sss1").val("'.$row['SSS_no'].'");
		$("#tin1").val("'.$row['TIN_no'].'");
		$("#philhealth1").val("'.$row['PHILHEALTH_no'].'");
		$("#contactNo1").val("'.$row['pims_contact_no'].'");
		$("#telephoneNo1").val("'.$row['pims_telephone_no'].'");
		$("#emailAddress1").val("'.$row['P_email'].'");
		$("#religion1").val("'.$row['pims_religion'].'");
		$("#height1").val("'.$row['height_m'].'");
		$("#weight1").val("'.$row['weight_kg'].'");
		$("#dual_citznshp_by_birth1").val("'.$row['dual_citznshp_by_birth'].'");
		$("#dual_citznshp_by_naturalization1").val("'.$row['dual_citznshp_by_naturalization'].'");
		
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
		
		$query = "select * from pims_employment_records where emp_No = ".$_SESSION['pims_data']['emp_id']."; ";
		$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		$row = mysqli_fetch_array( $result );
		
		$echo = $echo . ' $("#spanpersonneltype").html("'.$row['faculty_type'].'"); ';
		
		$echo = $echo . ' $("#complete_item_no1").val("'.$row['complete_item_no'].'"); ';
		$echo = $echo . ' $("#work_stat1").val("'.$row['work_stat'].'"); ';
		$echo = $echo . ' $("#role_type1").val("'.$row['role_type'].'"); ';
		$echo = $echo . ' $("#emp_status1").val("'.$row['emp_status'].'"); ';
		$echo = $echo . ' $("#date_joined1").val("'.$row['date_joined'].'"); ';
		$echo = $echo . ' $("#date_retired1").val("'.$row['date_retired'].'"); ';
		$echo = $echo . ' $("#div_code1").val("'.$row['div_code'].'"); ';
		$echo = $echo . ' $("#biometric_ID1").val("'.$row['biometric_ID'].'"); ';
		$echo = $echo . ' $("#school_ID1").val("'.$row['school_ID'].'"); ';
		$echo = $echo . ' $("#appointment_date1").val("'.$row['appointment_date'].'"); ';
		$echo = $echo . ' $("#faculty_type1").val("'.$row['faculty_type'].'"); ';
		
		$echo = $echo . ' $("#jobTitle1").val("'.$row['job_title_code'].'"); ';
		
		$echo = $echo . ' $("#department1").val("'.$row['dept_ID'].'"); ';
		
		mysqli_close( $_SESSION['pims_data']['connection'] );
		unset( $_SESSION['pims_data']['connection'] );
		
		echo "<script> " . $echo . " </script>";
	}

?>