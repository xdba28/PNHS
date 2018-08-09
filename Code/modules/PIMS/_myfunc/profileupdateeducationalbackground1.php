<?php
	session_start();
	include("db_connect.php");
	
	$errorNo = 0;
	$rollbackCall = 0;
	$insertSuccessful = 0;
	
	$query = "insert into pims_profile_updates set emp_No = ".$_SESSION['pims_data']['emp_id']." , p_update_date = now() , p_update_status = 'Pending' , p_update_table = '3'; ";
	if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
	if ( $errorNo != 0 && $rollbackCall == 0 ){
		mysqli_rollback($_SESSION['pims_data']['connection']);
		$errorString = mysqli_error($_SESSION['pims_data']['connection']);
		$rollbackCall++;
	}
	if ( $errorNo == 0 ) $pu_id = mysqli_insert_id($_SESSION['pims_data']['connection']);
	
	$query = "select * from pims_educational_background where emp_No = ".$_SESSION['pims_data']['emp_id']."; ";
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	$num = mysqli_num_rows($result);
	
	if ( $num != 0 ){
		$row = mysqli_fetch_array($result);
		// ------------ elementary_school_name UPDATES ---------------
			if ( $row['elementary_school_name'] != $_POST['elementary2'] ){
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
		// ------------ elementary_school_name UPDATES ---------------
		
		// ------------ elementary_academic_yr UPDATES ---------------
			if ( $row['elementary_academic_yr'] != $_POST['elementaryFrom2']."-".$_POST['elementaryTo2'] ){
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
		// ------------ elementary_academic_yr UPDATES ---------------
		
		// ------------- secondary_school_name UPDATE --------------------
		if ( $row['secondary_school_name'] != $_POST['highSchool2'] ){
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
		if ( $row['secondary_academic_yr'] != $_POST['highSchoolFrom2']."-".$_POST['highSchoolTo2'] ){
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
		if ( $row['tertiary_school_name'] != $_POST['college2'] ){
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
		if ( $row['tertiary_academic_yr'] != $_POST['collegeFrom2']."-".$_POST['collegeTo2'] ){
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
		if ( $row['tertiary_degrees'] != $_POST['collegeDegree2'] ){
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
		if ( $row['honor_or_award'] != $_POST['honorAward2'] ){
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
		if ( $row['affiliations'] != $_POST['affiliation2'] ){
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

?>