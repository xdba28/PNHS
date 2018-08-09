<?php
	// Name: CronJob1.php
	// Cycle: Run everyday every 12 MN
	// Purpose: To update the pims_age of a personnel if required 
	// 
	// Note: Please don't modify the code below
	include("../db_connect.php");
	$errorNo = 0;
	$rollbackCall = 0;
	
	$query = "select emp_No , pims_birthdate , pims_age from pims_personnel; ";
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	$echo = "";
	while ( $row = mysqli_fetch_array( $result ) ){
		if ( !empty($row['pims_birthdate']) ){
			// --------------------- BDAY ------------------------
			$year = substr( $row['pims_birthdate'] , 0 , 4 );
			$month = substr ( $row['pims_birthdate'] , 5 , 2 );
			$date = substr ( $row['pims_birthdate'] , 8 , 2 );
			
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
			
			if ( empty($row['pims_age']) || $age != $row['pims_age'] ){
				if ( $errorNo == 0 ) mysqli_query( $_SESSION['pims_data']['connection'] , "update pims_personnel set pims_age = ".$age." where emp_No = ".$row['emp_No']."; " );
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