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
			$echo = $echo . " $('#sename1').val('".$row['spouse_lastname']."'); ";
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
		
		mysqli_close( $_SESSION['pims_data']['connection'] );
		unset( $_SESSION['pims_data']['connection'] );
		
		echo "<script> " . $echo . " </script>";
	}

?>