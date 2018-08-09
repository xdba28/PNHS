<?php
	session_start();
	include("db_connect.php");
	
	$errorNo = 0;
	$rollbackCall = 0;
	$echo = "";
	
	if ( $_GET['s'] == 1 ){
		$query = "update pims_profile_updates set p_update_status = 'Approved' where p_update_id = ".$_GET['id']."; ";
		if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
		if ( $errorNo != 0 && $rollbackCall == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$errorString = $errorNo;
			$rollbackCall++;
		}
		
		$query = "select * from pims_profile_updates , pims_profile_update_list where pims_profile_updates.p_update_id = pims_profile_update_list.p_update_id and pims_profile_updates.p_update_id = ".$_GET['id']."; ";
		$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		while ( $row = mysqli_fetch_array($result) ){
			if ( $row['p_column_name'] == 'P_picture' ){
				$query1 = " update pims_personnel set P_picture = '".$row['p_data_blob']."' , pims_image_type = '".$row['p_data_text']."' where emp_No = ".$row['emp_No']." ";
			}
			else{
				if ( $row['p_update_table'] == '1' ){
					if ( $row[$row['p_data_column']] == null ){
						$query1 = " update pims_personnel set ".$row['p_column_name']." = null where emp_No = ".$row['emp_No']." ";
					}
					else{
						if ( $row['p_data_column'] == "p_data_int" ){
							$query1 = " update pims_personnel set ".$row['p_column_name']." = ".$row[$row['p_data_column']]." where emp_No = ".$row['emp_No']." ";
						}
						else{
							$query1 = " update pims_personnel set ".$row['p_column_name']." = '".$row[$row['p_data_column']]."' where emp_No = ".$row['emp_No']." ";
						}
					}
				}
				else if ( $row['p_update_table'] == '2' ){
					if ( $row[$row['p_data_column']] == null ){
						$query1 = " update pims_family_background set ".$row['p_column_name']." = null where emp_No = ".$row['emp_No']." ";
					}
					else{
						if ( $row['p_data_column'] == "p_data_int" ){
							$query1 = " update pims_family_background set ".$row['p_column_name']." = ".$row[$row['p_data_column']]." where emp_No = ".$row['emp_No']." ";
						}
						else{
							$query1 = " update pims_family_background set ".$row['p_column_name']." = '".$row[$row['p_data_column']]."' where emp_No = ".$row['emp_No']." ";
						}
					}
				}
				else if ( $row['p_update_table'] == '3' ){
					if ( $row[$row['p_data_column']] == null ){
						$query1 = " update pims_educational_background set ".$row['p_column_name']." = null where emp_No = ".$row['emp_No']." ";
					}
					else{
						if ( $row['p_data_column'] == "p_data_int" ){
							$query1 = " update pims_educational_background set ".$row['p_column_name']." = ".$row[$row['p_data_column']]." where emp_No = ".$row['emp_No']." ";
						}
						else{
							$query1 = " update pims_educational_background set ".$row['p_column_name']." = '".$row[$row['p_data_column']]."' where emp_No = ".$row['emp_No']." ";
						}
					}
				}
			}
			if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query1 );
			if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
			if ( $errorNo != 0 && $rollbackCall == 0 ){
				mysqli_rollback($_SESSION['pims_data']['connection']);
				$errorString = $errorNo;
				$rollbackCall++;
			}
		}
	}
	else if ( $_GET['s'] == 2 ){
		$query = "update pims_profile_updates set p_update_status = 'Disapproved' where p_update_id = ".$_GET['id']."; ";
		if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
		if ( $errorNo != 0 && $rollbackCall == 0 ){
			mysqli_rollback($_SESSION['pims_data']['connection']);
			$errorString = $errorNo;
			$rollbackCall++;
		}
	}
	
	if ( $errorNo == 0 ){
		mysqli_commit($_SESSION['pims_data']['connection']);
	}
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] ); 
	
	if ( $errorNo == 0 ){
		$echo = "alertify.success('Done'); setTimeout(function() { window.location.href = 'view_profile_updates.php?id=".$_GET['id']."'; }, 2000); ";
	}
	else{
		$echo = "alertify.error('An error has occured. Rolling back changes<br />Recent error: " . $errorString . "'); ";
	}
	
	echo $echo;
?>