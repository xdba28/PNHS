<?php
	// Name: CronJob2.php
	// Cycle: Run everyday every 12 MN
	// Purpose: To update the leave_status of the personnel in pims_leave_balance
	// 
	// Note: Please don't modify the code below
	include("../db_connect.php");
	$errorNo = 0;
	$rollbackCall = 0;
	
	
	$query = "select * from pims_leave_balance; ";
	$result = mysqli_query($_SESSION['pims_data']['connection'] , $query);
	while($row = mysqli_fetch_array($result)){
		$query1 = "select * from pims_leave where leave_bal_id = " . $row['leave_bal_ID'] . " and leave_application_status = 'Approved' order by leave_start desc; ";
		$result1 = mysqli_query($_SESSION['pims_data']['connection'] , $query1);
			
			$row1 = mysqli_fetch_array($result1);
			
			$leave_start = strtotime($row1['leave_start']);
			$leave_end = strtotime($row1['leave_end']);
			$current_date = strtotime("now");
			
			if ( $current_date < $leave_start ){ // Upcoming part
				$query2 = "update pims_leave_balance set leave_status = 'Upcoming' where leave_bal_ID = ".$row['leave_bal_ID']."; ";
				if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query2 );
				if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
				if ( $errorNo != 0 && $rollbackCall == 0 ){
					mysqli_rollback($_SESSION['pims_data']['connection']);
					$errorString = mysqli_error($_SESSION['pims_data']['connection']);
					$rollbackCall++;
				}
			}
			else if ( $current_date >= $leave_start && $current_date <= $leave_end ){ // On-Leave
				$query2 = "update pims_leave_balance set leave_status = 'On-Leave' where leave_bal_ID = ".$row['leave_bal_ID']."; ";
				if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query2 );
				if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
				if ( $errorNo != 0 && $rollbackCall == 0 ){
					mysqli_rollback($_SESSION['pims_data']['connection']);
					$errorString = mysqli_error($_SESSION['pims_data']['connection']);
					$rollbackCall++;
				}
			}
			else if ( $current_date > $leave_end ){ // Finished
				if ( $row['leave_status'] == "On-Leave" ){
					$query2 = "update pims_leave_balance set leave_status = 'Finished' where leave_bal_ID = ".$row['leave_bal_ID']."; ";
					if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , $query2 );
					if ( $errorNo == 0 ) $errorNo = mysqli_errno($_SESSION['pims_data']['connection']);
					if ( $errorNo != 0 && $rollbackCall == 0 ){
						mysqli_rollback($_SESSION['pims_data']['connection']);
						$errorString = mysqli_error($_SESSION['pims_data']['connection']);
						$rollbackCall++;
					}
				}
			}
		
	}
	
	
	if ( $errorNo == 0 ){
		mysqli_commit($_SESSION['pims_data']['connection']);
	}
	else{
		mysqli_rollback($_SESSION['pims_data']['connection']);
		$errorString = mysqli_error($_SESSION['pims_data']['connection']);
	}
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] );
	
	if ( $errorNo != 0 ){
		echo "An error has occured. Rolling back changes<br />Recent error: " . $errorString;
	}
	
?>