<?php
	// Name: updateNormalView1.php
	// Cycle: Upon Call
	// Purpose: To load basic personnel data on profile.php page
	// 
	// Note: Please don't modify the code below
	
	session_start();
	include("db_connect.php");
	
	// --------------------- NAME ------------------------
	$query = "select * from pims_personnel where emp_No = ".$_SESSION['pims_data']['emp_id']."; ";
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	$row = mysqli_fetch_array( $result );
	
	$nameStr = "Name: " . $row['P_lname'] . ", " . $row['P_fname'];
	if ( $row['P_mname'] != null ) $nameStr = $nameStr . " " . $row['P_mname'];
	if ( $row['P_extension_name'] != null ) $nameStr = $nameStr . " " . $row['P_extension_name'];
	
	// --------------------- NAME ------------------------
	
	// --------------------- SEX ------------------------
	$sexStr = "Sex: " . $row['pims_gender'];
	// --------------------- SEX ------------------------
	
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
	$ageStr = "Age: " . $age;
	// --------------------- AGE ------------------------
	
	// --------------------- ContactNo ------------------------
	$contactNoStr = "Contact No.: " . $row['pims_contact_no'];
	// --------------------- ContactNo ------------------------
	
	// --------------------- Civil Status ------------------------
	$civilStatusStr = "Civil Status: " . $row['civil_status'];
	// --------------------- Civil Status ------------------------
	
	// --------------------- Email ------------------------
	$emailStr = "Email Address: " . $row['P_email'];
	// --------------------- Email ------------------------
	
	// --------------------- PermAdd ------------------------
	$permaddStr = "Permanent Address:";
	if ( $row['perm_address_house_no'] != null ) $permaddStr = $permaddStr . " " . $row['perm_address_house_no'];
	if ( $row['perm_address_street'] != null ) $permaddStr = $permaddStr . " " . $row['perm_address_street'];
	$permaddStr = $permaddStr . " " . $row['perm_address_barangay'];
	$permaddStr = $permaddStr . ", " . $row['perm_address_municipality_city'];
	$permaddStr = $permaddStr . ", " . $row['perm_address_province'];
	$permaddStr = $permaddStr . " " . $row['perm_address_zipCode'];
	
	// --------------------- PermAdd ------------------------
	
	// --------------------- TempAdd ------------------------
	$tempaddStr = "Temporary Address:";
	if ( $row['temp_address_house_no'] != null ) $tempaddStr = $tempaddStr . " " . $row['temp_address_house_no'];
	if ( $row['temp_address_street'] != null ) $tempaddStr = $tempaddStr . " " . $row['temp_address_street'];
	$tempaddStr = $tempaddStr . " " . $row['temp_address_barangay'];
	$tempaddStr = $tempaddStr . ", " . $row['temp_address_municipality_city'];
	$tempaddStr = $tempaddStr . ", " . $row['temp_address_province'];
	$tempaddStr = $tempaddStr . " " . $row['temp_address_zipCode'];
	// --------------------- TempAdd ------------------------
	
	
	// --------------------- Employee No. ------------------------
	
	$empNoStr = "Employee No.: " . $_SESSION['pims_data']['emp_id'];
	
	// --------------------- Employee No. ------------------------ 	
	
	$query = "select emp_No , job_title_code , date_joined , appointment_date from pims_employment_records where emp_No = ".$_SESSION['pims_data']['emp_id']."; ";
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	
	if ( mysqli_num_rows($result) > 0 ){
		$row = mysqli_fetch_array( $result );
		// --------------------- Job Title Code ------------------------ 
			$query2 = "select job_title_name from pims_job_title where job_title_code = '".$row['job_title_code']."' ;";
			$result2 = mysqli_query( $_SESSION['pims_data']['connection'] , $query2 );
			$row2 = mysqli_fetch_array($result2);
			$jobTitleStr = "Job Title Code: " . $row['job_title_code'] . " - " . $row2['job_title_name'];
			$jobTitleStr = "$('#personalInformation1').append($('<div>".$jobTitleStr."</div>').attr( { class : 'col-md-6' } ));";
		// --------------------- Job Title Code ------------------------ 
		
		// --------------------- Date of Joining ------------------------
		
			$dateOfJoining = "";
		
			$year = substr( $row['date_joined'] , 0 , 4 );
			$month = substr ( $row['date_joined'] , 5 , 2 );
			$date = substr ( $row['date_joined'] , 8 , 2 );
			
			switch($month){
					case "01": $dateOfJoining = "January"; break;
					case "02": $dateOfJoining = "February"; break;
					case "03": $dateOfJoining = "March"; break;
					case "04": $dateOfJoining = "April"; break;
					case "05": $dateOfJoining = "May"; break;
					case "06": $dateOfJoining = "June"; break;
					case "07": $dateOfJoining = "July"; break;
					case "08": $dateOfJoining = "August"; break;
					case "09": $dateOfJoining = "September"; break;
					case "10": $dateOfJoining = "October"; break;
					case "11": $dateOfJoining = "November"; break;
					case "12": $dateOfJoining = "December"; break;
			}
			
			
			$dateOfJoiningStr = "$('#personalInformation1').append($('<div>Date of Joining: " . $dateOfJoining . " " . $date . ", " . $year ."</div>').attr( { class : 'col-md-6' } ));";
			
		
		// --------------------- Date of Joining ------------------------ 
		
		// --------------------- Date of Original Appointment ------------------------ 
		
			$OriginalAppointment = "";
		
			$year = substr( $row['date_joined'] , 0 , 4 );
			$month = substr ( $row['date_joined'] , 5 , 2 );
			$date = substr ( $row['date_joined'] , 8 , 2 );
			
			switch($month){
					case "01": $OriginalAppointment = "January"; break;
					case "02": $OriginalAppointment = "February"; break;
					case "03": $OriginalAppointment = "March"; break;
					case "04": $OriginalAppointment = "April"; break;
					case "05": $OriginalAppointment = "May"; break;
					case "06": $OriginalAppointment = "June"; break;
					case "07": $OriginalAppointment = "July"; break;
					case "08": $OriginalAppointment = "August"; break;
					case "09": $OriginalAppointment = "September"; break;
					case "10": $OriginalAppointment = "October"; break;
					case "11": $OriginalAppointment = "November"; break;
					case "12": $OriginalAppointment = "December"; break;
			}
			
			$dateOfOriginalAppointmentStr = "$('#personalInformation1').append($('<div>Date of Original Appointment: " . $OriginalAppointment . " " . $date . ", " . $year . "</div>').attr( { class : 'col-md-6' } ));";
		
		
		// --------------------- Date of Original Appointment ------------------------ 
	}
	else{
		$jobTitleStr = "";
		$dateOfJoiningStr = "";
		$dateOfOriginalAppointmentStr = "";
	}
	
	
	
	
	
	
	
	
	  
	// --------------------- Tertiary/College: Year Graduated: ------------------------ 
	$query = "select * from pims_educational_background where emp_No = ".$_SESSION['pims_data']['emp_id']."; ";
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	
	if ( mysqli_num_rows($result) ){
		$educationalBackground = "";
		$row = mysqli_fetch_array( $result );
	
		$tertiaryNameStr = "Tertiary/College: " . $row['tertiary_school_name'];
		$educationalBackground = $educationalBackground . " $('#educationalBackground1').append( $('<div>".$tertiaryNameStr."</div>').attr( { class : 'col-md-6' } ) ); ";
		$tertiaryYearStr = "Year Graduated: " . $row['tertiary_academic_yr'];
		$educationalBackground = $educationalBackground . " $('#educationalBackground1').append( $('<div>".$tertiaryYearStr."</div>').attr( { class : 'col-md-6' } ) ); ";
		
		// --------------------- Tertiary/College: Year Graduated: ------------------------ 
		
		// --------------------- Secondary/High School: Year Graduated: ------------------------ 
		$secondaryNameStr = "Secondary/High School: " . $row['secondary_school_name'];
		$educationalBackground = $educationalBackground . " $('#educationalBackground1').append( $('<div>".$secondaryNameStr."</div>').attr( { class : 'col-md-6' } ) ); ";
		$secondaryYearStr = "Year Graduated: " . $row['secondary_academic_yr'];
		$educationalBackground = $educationalBackground . " $('#educationalBackground1').append( $('<div>".$secondaryYearStr."</div>').attr( { class : 'col-md-6' } ) ); ";
		// --------------------- Secondary/High School: Year Graduated: ------------------------ 
		
		// --------------------- Primary/Elementary: Year Graduated: ------------------------ 
		$primaryNameStr = "Primary/Elementary: " . $row['elementary_school_name'];
		$educationalBackground = $educationalBackground . " $('#educationalBackground1').append( $('<div>".$primaryNameStr."</div>').attr( { class : 'col-md-6' } ) ); ";
		$primaryYearStr = "Year Graduated: " . $row['elementary_academic_yr'];
		$educationalBackground = $educationalBackground . " $('#educationalBackground1').append( $('<div>".$primaryYearStr."</div>').attr( { class : 'col-md-6' } ) ); ";
		// --------------------- Primary/Elementary: Year Graduated: ------------------------ 
		
	}
	else{
		$educationalBackground = "$('#eduDiv1').attr( { style : 'display: none' } ); ";
	}
	
	
	
	// --------------------- Other Information ------------------------ 
	$toBeEcho2 = "";
	// --------------------- Nationality ------------------------ 
	$query = "select nationality , pims_religion , bloodtype from pims_personnel where emp_No = ".$_SESSION['pims_data']['emp_id']."; ";
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	$row = mysqli_fetch_array( $result );
	
	if ( $row['nationality'] != null ){
		
		$nationalityStr = "Nationality: " . $row['nationality'] ;
		$toBeEcho2 = $toBeEcho2 . " $('#forOtherInformation').append($('<div>".$nationalityStr."</div>').attr('class', 'col-md-6')); ";
	}
	
	// --------------------- Nationality ------------------------
	
	// --------------------- Religion ------------------------
	if ( $row['pims_religion'] != null ){
		
		$religionStr = "Religion: " . $row['pims_religion'] ;
		$toBeEcho2 = $toBeEcho2 . " $('#forOtherInformation').append($('<div>".$religionStr."</div>').attr('class', 'col-md-6')); ";
		
	}
	// --------------------- Religion ------------------------
	
	// --------------------- Bloodtype ------------------------
	if ( $row['bloodtype'] != null ){
		
		$bloodtypeStr = "Bloodtype: " . $row['bloodtype'] ;
		$toBeEcho2 = $toBeEcho2 . " $('#forOtherInformation').append($('<div>".$bloodtypeStr."</div>').attr('class', 'col-md-6')); ";
	}
	// --------------------- Bloodtype ------------------------
	
	// --------------------- Tertiary degrees ------------------------ 
	$query = "select tertiary_degrees , honor_or_award , affiliations from pims_educational_background where emp_No = ".$_SESSION['pims_data']['emp_id']."; ";
	$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
	$row = mysqli_fetch_array( $result );
	
	if ( $row['tertiary_degrees'] != null ){
		
		$tertiaryDegreesStr = "Tertiary degrees: " . $row['tertiary_degrees'] ;
		$toBeEcho2 = $toBeEcho2 . " $('#forOtherInformation').append($('<div>".$tertiaryDegreesStr."</div>').attr('class', 'col-md-6')); ";
	}
	
	// --------------------- Tertiary degrees ------------------------
	
	// --------------------- Honor/Awards ------------------------
	if ( $row['honor_or_award'] != null ){
		
		$honorAwardsStr = "Honor/Awards: " . $row['honor_or_award'] ;
		$toBeEcho2 = $toBeEcho2 . " $('#forOtherInformation').append($('<div>".$honorAwardsStr."</div>').attr('class', 'col-md-6')); ";
	}
	// --------------------- Honor/Awards ------------------------
	
	// --------------------- Affiliations ------------------------
	if ( $row['affiliations'] != null ){
		
		$affiliationsStr = "Affiliations: " . $row['affiliations'] ;
		$toBeEcho2 = $toBeEcho2 . " $('#forOtherInformation').append($('<div>".$affiliationsStr."</div>').attr('class', 'col-md-6')); ";
	}
	// --------------------- Honor/Awards ------------------------
	
	
	// --------------------- Other Information ------------------------ 
	
	mysqli_close( $_SESSION['pims_data']['connection'] );
	unset( $_SESSION['pims_data']['connection'] );
	
	
	$toBeEcho1 = "
		$('#forName').text('".$nameStr."');
		$('#forAge').text('".$ageStr."');
		$('#forSex').text('".$sexStr."');
		$('#forBirthday').text('".$birthdayStr."');
		$('#forContactNo').text('".$contactNoStr."');
		$('#forCivilStatus').text('".$civilStatusStr."');
		$('#forEmail').text('".$emailStr."');
		$('#forPermanentAddress').text('".$permaddStr."');
		$('#forTemporaryAddress').text('".$tempaddStr."');
		$('#personalInformation1').empty();
		$('#educationalBackground1').empty();
		$('#forOtherInformation').empty();
		$('#personalInformation1').append($('<div>".$empNoStr."</div>').attr( { class : 'col-md-6' } ));
		".$jobTitleStr."
		".$dateOfJoiningStr."
		".$dateOfOriginalAppointmentStr."
		".$educationalBackground." 
		".$toBeEcho2."
		";
		
		
		
	echo $toBeEcho1;
		
		
	
		
?>
