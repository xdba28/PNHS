<?php
	include("db_connect.php");
	
	$echo = "";
	
	$query = "select * from pims_personnel , pims_employment_records where pims_employment_records.emp_No = pims_personnel.emp_No and pims_personnel.emp_No = " . $_GET['id'] . "; ";
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	
	if ( $row = mysqli_fetch_array($result) ){
		$nameStr = $row['P_lname'] . ", " . $row['P_fname'];
		if ( $row['P_mname'] != null ) $nameStr = $nameStr . " " . $row['P_mname'];
		if ( $row['P_extension_name'] != null ) $nameStr = $nameStr . " " . $row['P_extension_name'];
		
		$echo = $echo . " $('#name1').text('".$nameStr."'); ";
		
		if ( $row['dept_ID'] != "" ){
			$row1 = mysqli_fetch_array(mysqli_query( $_SESSION['pims_data']['connection'] , "select * from pims_department where dept_ID = " . $row['dept_ID'] ));
			$echo = $echo . " $('#department1').text('".$row1['dept_name']."'); ";
		}
		else{
			$echo = $echo . " $('#department1').text('None'); ";
		}
		
		$echo = $echo . " $('#facultyType1').text('".$row['faculty_type']."'); ";
		
		$row1 = mysqli_fetch_array(mysqli_query( $_SESSION['pims_data']['connection'] , "select * from pims_job_title where job_title_code = '" . $row['job_title_code'] . "'; " ));
		$echo = $echo . " $('#jobTitle1').text('".$row1['job_title_name']."'); ";
		
		$year = substr( $row['date_joined'] , 0 , 4 );
		$month = substr ( $row['date_joined'] , 5 , 2 );
		$date = substr ( $row['date_joined'] , 8 , 2 );
		switch($month){
				case "01": $Date = "January"; break;
				case "02": $Date = "February"; break;
				case "03": $Date = "March"; break;
				case "04": $Date = "April"; break;
				case "05": $Date = "May"; break;
				case "06": $Date = "June"; break;
				case "07": $Date = "July"; break;
				case "08": $Date = "August"; break;
				case "09": $Date = "September"; break;
				case "10": $Date = "October"; break;
				case "11": $Date = "November"; break;
				case "12": $Date = "December"; break;
		}
		$Date = $Date . " " . $date . ", " . $year;
		$echo = $echo . " $('#hireDate1').text('".$Date."'); ";
		
		$echo = $echo . " $('#gender1').text('".$row['pims_gender']."'); ";
		
		$echo = $echo . " $('#age1').text('".$row['pims_age']."'); ";
		
		$year = substr( $row['pims_birthdate'] , 0 , 4 );
		$month = substr ( $row['pims_birthdate'] , 5 , 2 );
		$date = substr ( $row['pims_birthdate'] , 8 , 2 );
		switch($month){
				case "01": $Date = "January"; break;
				case "02": $Date = "February"; break;
				case "03": $Date = "March"; break;
				case "04": $Date = "April"; break;
				case "05": $Date = "May"; break;
				case "06": $Date = "June"; break;
				case "07": $Date = "July"; break;
				case "08": $Date = "August"; break;
				case "09": $Date = "September"; break;
				case "10": $Date = "October"; break;
				case "11": $Date = "November"; break;
				case "12": $Date = "December"; break;
		}
		$Date = $Date . " " . $date . ", " . $year;
		$echo = $echo . " $('#birthdate1').text('".$Date."'); ";
		
		$permaddStr = "";
		if ( $row['perm_address_house_no'] != null ) $permaddStr = $permaddStr . " " . $row['perm_address_house_no'];
		if ( $row['perm_address_street'] != null ) $permaddStr = $permaddStr . " " . $row['perm_address_street'];
		$permaddStr = $permaddStr . " " . $row['perm_address_barangay'];
		$permaddStr = $permaddStr . ", " . $row['perm_address_municipality_city'];
		$permaddStr = $permaddStr . ", " . $row['perm_address_province'];
		$permaddStr = $permaddStr . " " . $row['perm_address_zipCode'];
		$echo = $echo . " $('#permAdd1').text('".$permaddStr."'); ";
		
		$tempaddStr = "";
		if ( $row['temp_address_house_no'] != null ) $tempaddStr = $tempaddStr . " " . $row['temp_address_house_no'];
		if ( $row['temp_address_street'] != null ) $tempaddStr = $tempaddStr . " " . $row['temp_address_street'];
		$tempaddStr = $tempaddStr . " " . $row['temp_address_barangay'];
		$tempaddStr = $tempaddStr . ", " . $row['temp_address_municipality_city'];
		$tempaddStr = $tempaddStr . ", " . $row['temp_address_province'];
		$tempaddStr = $tempaddStr . " " . $row['temp_address_zipCode'];
		$echo = $echo . " $('#tempAdd1').text('".$tempaddStr."'); ";
		
		$echo = $echo . " $('#email1').text('".$row['P_email']."'); ";
		
		$echo = $echo . " $('#contactNo1').text('".$row['pims_contact_no']."'); ";
		
	}
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] );
	
	echo "<script>" . $echo . "</script>";
?>