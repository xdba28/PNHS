<?php

	// Name: leave_history1.php
	// 
	// Purpose: To load the data of the table and the remaining credits in the leave_history page
	// 
	// Note: Please don't modify the code below
	
	include("db_connect.php");
		
	$echo = "";
	
	// --------------------- REMAINING CREDITS ------------------------
	$query = "select * from pims_leave_balance where emp_No = ".$_SESSION['pims_data']['emp_id']."; ";
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	$row = mysqli_fetch_array( $result );
		
	$echo = $echo . " updateCreditCount(); ";
	// --------------------- REMAINING CREDITS ------------------------
	
	// --------------------- HISTORY OF LEAVE APPLICATION ------------------------
	$counter = 1;
	
	if ( mysqli_num_rows($result) > 0 ){
		$query = "select * from pims_leave where leave_bal_id = ".$row['leave_bal_ID']." order by leave_ID DESC; ";
		$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		
		
		
		while ( $row = mysqli_fetch_array( $result ) ){
			
			$Date1 = "";
		
			$year1 = substr( $row['date_submitted'] , 0 , 4 );
			$month1 = substr ( $row['date_submitted'] , 5 , 2 );
			$day1 = substr ( $row['date_submitted'] , 8 , 2 );
			
			switch($month1){
					case "01": $Date1 = "January"; break;
					case "02": $Date1 = "February"; break;
					case "03": $Date1 = "March"; break;
					case "04": $Date1 = "April"; break;
					case "05": $Date1 = "May"; break;
					case "06": $Date1 = "June"; break;
					case "07": $Date1 = "July"; break;
					case "08": $Date1 = "August"; break;
					case "09": $Date1 = "September"; break;
					case "10": $Date1 = "October"; break;
					case "11": $Date1 = "November"; break;
					case "12": $Date1 = "December"; break;
			}
			$Date1 = $Date1 . " " . $day1 . ", " . $year1;
			
			if ( $row['date_responded'] != null ){
				$Date2 = "";
		
				$year2 = substr( $row['date_submitted'] , 0 , 4 );
				$month2 = substr ( $row['date_submitted'] , 5 , 2 );
				$day2 = substr ( $row['date_submitted'] , 8 , 2 );
				
				switch($month2){
						case "01": $Date2 = "January"; break;
						case "02": $Date2 = "February"; break;
						case "03": $Date2 = "March"; break;
						case "04": $Date2 = "April"; break;
						case "05": $Date2 = "May"; break;
						case "06": $Date2 = "June"; break;
						case "07": $Date2 = "July"; break;
						case "08": $Date2 = "August"; break;
						case "09": $Date2 = "September"; break;
						case "10": $Date2 = "October"; break;
						case "11": $Date2 = "November"; break;
						case "12": $Date2 = "December"; break;
				}
				$Date2 = $Date2 . " " . $day2 . ", " . $year2;
			}
			else{
				$Date2 = "";
			}
			$num_padded = sprintf("%02d", $counter++);
			$thData = "<td>".$num_padded."</td> <td>".$Date1."</td> <td>".$row['place_to_be_visited']."</td> <td>".$Date2."</td> <td>".$row['leave_application_status']."</td>";
			
			if ( $row['leave_application_status'] == "Pending" ){
				
				$echo = $echo . " $('#leaveTable1').append($('<tr> " . $thData . " </tr>').attr({'class': 'info' , 'onclick' : 'leaveOnClickDetails(".$row['leave_ID'].");' , 'style' : 'cursor: pointer'  })); ";
			
			}
			else if ( $row['leave_application_status'] == "User-Cancel" ){
				
				$echo = $echo . " $('#leaveTable1').append($('<tr> " . $thData . " </tr>').attr({'class': 'warning' , 'onclick' : 'leaveOnClickDetails(".$row['leave_ID'].");' , 'style' : 'cursor: pointer'  })); ";
			
			}
			else if ( $row['leave_application_status'] == "Disapproved" ){
				
				$echo = $echo . " $('#leaveTable1').append($('<tr> " . $thData . " </tr>').attr({'class': 'danger' , 'onclick' : 'leaveOnClickDetails(".$row['leave_ID'].");' , 'style' : 'cursor: pointer'  })); ";
			
			}
			else if ( $row['leave_application_status'] == "Approved" ){
				
				$echo = $echo . " $('#leaveTable1').append($('<tr> " . $thData . " </tr>').attr({'class': 'success' , 'onclick' : 'leaveOnClickDetails(".$row['leave_ID'].");' , 'style' : 'cursor: pointer'  })); ";
			
			}
			
		}
	
	}
	
	// --------------------- HISTORY OF LEAVE APPLICATION ------------------------
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] );
	
	echo "<script> " . $echo . " </script>";


?>