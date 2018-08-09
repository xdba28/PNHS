<?php
	include("db_connect.php");

	$echo = "";
	
	$query = "select 	PER.complete_item_no ,
						PP.emp_No ,
						PP.P_fname ,
						PP.P_mname , 
						PP.P_lname ,
						PP.P_extension_name ,
						PER.role_type , 
						PER.div_code , 
						PER.biometric_ID , 
						PER.school_ID ,
						PER.emp_status , 
						PER.date_joined , 
						PER.appointment_date , 
						PER.job_title_code , 
						PJT.job_title_name ,
						PER.dept_ID
						from
						PIMS_PERSONNEL as PP ,
						PIMS_EMPLOYMENT_RECORDS as PER ,
						PIMS_JOB_TITLE as PJT
						where
						PP.emp_No = PER.emp_No and 
						PER.job_title_code = PJT.job_title_code and
						PP.emp_No = " . $_SESSION['pims_data']['emp_id'];
	
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	$row = mysqli_fetch_array( $result );
	
	
	$nameStr = $row['P_lname'] . ", " . $row['P_fname'];
	if ( $row['P_mname'] != null ) $nameStr = $nameStr . " " . $row['P_mname'];
	if ( $row['P_extension_name'] != null ) $nameStr = $nameStr . " " . $row['P_extension_name'];
	
	$Date1 = "";
	
	$year1 = substr( $row['date_joined'] , 0 , 4 );
	$month1 = substr ( $row['date_joined'] , 5 , 2 );
	$day1 = substr ( $row['date_joined'] , 8 , 2 );
		
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
	
	$Date2 = "";
	
	$year2 = substr( $row['appointment_date'] , 0 , 4 );
	$month2 = substr ( $row['appointment_date'] , 5 , 2 );
	$day2 = substr ( $row['appointment_date'] , 8 , 2 );
			
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
	
	$echo = " 	$('#for1').html('Complete Item No.:<u>".$row['complete_item_no']."</u>'); 
				$('#for2').html('Employee No.:<u>".$row['emp_No']."</u>');
				$('#for3').html('Name: ".$nameStr."');
				$('#for4').html('Role Type: ".$row['role_type']."');
				$('#for5').html('Division Code: ".$row['div_code']."');
				$('#for6').html('Biometric ID: ".$row['biometric_ID']."');
				$('#for7').html('School ID: ".$row['school_ID']."');
				$('#for9').html('Employment Status: ".$row['emp_status']."');
				$('#for10').html('Date Joined: ".$Date1."');
				$('#for11').html('Date of Original Appointment: ".$Date2."');
				$('#for12').html('Job Title Code: ".$row['job_title_code']."');
				$('#for13').html('Job Title Name: ".$row['job_title_name']."'); ";
	
	
	if ( !empty($row['dept_ID']) ){
		$query1 = "select	PD.dept_name , 
							PD.office_org_code
							from
							PIMS_DEPARTMENT as PD 
							where PD.dept_ID = " . $row['dept_ID'] . "; ";
		$result1 = mysqli_query( $_SESSION['pims_data']['connection'] , $query1 );
		$row1 = mysqli_fetch_array( $result1 );
		
		$echo = $echo . 
			"	$('#for8').html('Region Org. Code: ".$row1['office_org_code']."');
				$('#for14').html('Department: ".$row1['dept_name']."'); ";
	}
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] );
	
	echo "<script>" . $echo . "</script>";
?>