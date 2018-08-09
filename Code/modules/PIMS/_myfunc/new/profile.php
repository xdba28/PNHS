<?php
	error_reporting(0);
	$q = $_GET['q'];
	
	if ( $q == "getpersonnelinfo" ){
		getpersonnelinfo();
	}
	
	if ( $q == "getfamilyinfo" ){
		getfamilyinfo();
	}
	
	if ( $q == "geteducationabackground" ){
		geteducationabackground();
	}
	
	if ( $q == "getcseligibility" ){
		getcseligibility();
	}
	
	if ( $q == "getworkexperience" ){
		getworkexperience();
	}
	
	if ( $q == "getsampletrainingprograms" ){
		getsampletrainingprograms();
	}
	
	function getsampletrainingprograms(){
		// For: profile.php
		// Purpose: To load personnel sample Training Program record data on profile.php page
		
		include("db_connect.php");
		
		$echo = "";
		
		$query = "select * from pims_training_programs where emp_No = ".$_SESSION['pims_data']['emp_id']."; ";
		$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		
		$count1 = 1;
		
		if ( mysqli_num_rows($result) > 0 ){
			while($row = mysqli_fetch_array( $result )){
				
				if ( !empty($row['training_title']) ){
					if ( mysqli_num_rows($result) > 1 ){
						$echo = $echo . " $('#workExperiencenv').append('<div class= col-md-12  >".$row['training_title']."</div>'); ";
					}
					else{
						$echo = $echo . " $('#workExperiencenv').append('<div class= col-md-12  >".$count1.". ".$row['training_title']."</div>'); ";
					}
				}
				else{
					if ( mysqli_num_rows($result) > 1 ){
						$echo = $echo . " $('#workExperiencenv').append('<div class= col-md-12  >Training @ ".$row['location']."</div>'); ";
					}
					else{
						$echo = $echo . " $('#workExperiencenv').append('<div class= col-md-12  >".$count1.". Training @ ".$row['location']."</div>'); ";
					}
				}
				
				$count1++;
				
				if ( $count1 > 5 ){
					$echo = $echo . " $('#workExperiencenv').append('<div class= col-md-12  >Click See All Training to see all.</div>'); ";
					break;
				}
			}
		}
		
		if ( $count1 == 1 ){
			$echo = $echo . " $('#trainingProgramsnv').append('<div class= col-md-12  >No information to load.</div>'); ";
		}
		
		mysqli_close( $_SESSION['pims_data']['connection'] );
		unset( $_SESSION['pims_data']['connection'] );
		
		echo "<script> " . $echo . "</script>";
	}
	
	function getworkexperience(){
		// For: profile.php
		// Purpose: To load personnel Work Experience data on profile.php page
		
		include("db_connect.php");
		
		$echo = "";
		
		$query = "select * from pims_work_experience where emp_No = ".$_SESSION['pims_data']['emp_id']."; ";
		$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		
		$count1 = 0;
		$count2 = 0;
			
		if ( mysqli_num_rows($result) > 0 ){
			
			while($row = mysqli_fetch_array( $result )){
				if ( !empty($row['we_date_from']) && !empty($row['we_date_to']) ){
					$timestamp1 = strtotime($row['we_date_from']);
					$timestamp2 = strtotime($row['we_date_to']);
					$echo = $echo . " $('#workExperiencenv').append('<div class= col-md-6  >Date: ".date("M d,Y" , $timestamp1 )." - ".date("M d,Y" , $timestamp2 )."</div>'); ";
					$count2++;
				}
				
				if ( !empty($row['we_position']) ){
					$echo = $echo . " $('#workExperiencenv').append('<div class= col-md-6  >Position: ".$row['we_position']."</div>'); ";
					$count2++;
				}
				else{
					$echo = $echo . " $('#workExperiencenv').append('<div class= col-md-6  >Position: Not Available</div>'); ";
					$count2++;
				}
				
				if ( !empty($row['company']) ){
					$echo = $echo . " $('#workExperiencenv').append('<div class= col-md-6  >Company: ".$row['company']."</div>'); ";
					$count2++;
				}
				else{
					$echo = $echo . " $('#workExperiencenv').append('<div class= col-md-6  >Company: Not Available</div>'); ";
					$count2++;
				}
				
				if ( !empty($row['we_department']) ){
					$echo = $echo . " $('#workExperiencenv').append('<div class= col-md-6  >Department: ".$row['we_department']."</div>'); ";
					$count2++;
				}
				else{
					$echo = $echo . " $('#workExperiencenv').append('<div class= col-md-6  >Department: Not Available</div>'); ";
					$count2++;
				}
				
				if ( !empty($row['agency']) ){
					$echo = $echo . " $('#workExperiencenv').append('<div class= col-md-6  >Agency: ".$row['agency']."</div>'); ";
					$count2++;
				}
				else{
					$echo = $echo . " $('#workExperiencenv').append('<div class= col-md-6  >Agency: Not Available</div>'); ";
					$count2++;
				}
				
				if ( !empty($row['office']) ){
					$echo = $echo . " $('#workExperiencenv').append('<div class= col-md-6  >Office: ".$row['office']."</div>'); ";
					$count2++;
				}
				else{
					$echo = $echo . " $('#workExperiencenv').append('<div class= col-md-6  >Office: Not Available</div>'); ";
					$count2++;
				}
				
				if ( !empty($row['we_monthly_salary']) ){
					$echo = $echo . " $('#workExperiencenv').append('<div class= col-md-6  >Monthly Salary: ".$row['we_monthly_salary']."</div>'); ";
					$count2++;
				}
				else{
					$echo = $echo . " $('#workExperiencenv').append('<div class= col-md-6  >Monthly Salary: Not Available</div>'); ";
					$count2++;
				}
				
				if ( !empty($row['pay_grade']) ){
					$echo = $echo . " $('#workExperiencenv').append('<div class= col-md-6  >Pay Grade: ".$row['pay_grade']."</div>'); ";
					$count2++;
				}
				else{
					$echo = $echo . " $('#workExperiencenv').append('<div class= col-md-6  >Pay Grade: Not Available</div>'); ";
					$count2++;
				}
				
				if ( !empty($row['appointment_status']) ){
					$echo = $echo . " $('#workExperiencenv').append('<div class= col-md-6  >Appointment Status: ".$row['appointment_status']."</div>'); ";
					$count2++;
				}
				else{
					$echo = $echo . " $('#workExperiencenv').append('<div class= col-md-6  >Appointment Status: Not Available</div>'); ";
					$count2++;
				}
				
				if ( !empty($row['govt_service']) ){
					$echo = $echo . " $('#workExperiencenv').append('<div class= col-md-6  >Is Government Service: ".$row['govt_service']."</div>'); ";
					$count2++;
				}
				
				if ( $count2 % 2 != 0 ){
					$echo = $echo . " $('#workExperiencenv').append('<div class= col-md-6  >&nbsp</div>'); ";
				}
				
				$count1++;
				$count2 = 0;
			}
		}
		
		if ( $count1 == 0 ){
			$echo = $echo . " $('#workExperiencenv').append('<div class= col-md-12  >No information to load.</div>'); ";
		}
		
		mysqli_close( $_SESSION['pims_data']['connection'] );
		unset( $_SESSION['pims_data']['connection'] );
		
		echo "<script> " . $echo . "</script>";
	}
	
	function getcseligibility(){
		// For: profile.php
		// Purpose: To load personnel Civil Service Eligibility data on profile.php page
		include("db_connect.php");
		
		$echo = "";
		
		$query = "select * from pims_cs_eligibility where emp_No = ".$_SESSION['pims_data']['emp_id']."; ";
		$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		
		$count1 = 0;
		$count2 = 0;
			
		if ( mysqli_num_rows($result) > 0 ){
			
			while($row = mysqli_fetch_array( $result )){
				if ( !empty($row['career_service']) ){
					$echo = $echo . " $('#csBackgroundnv').append('<div class= col-md-6  >Career ServIce: ".$row['career_service']."</div>'); ";
					$count2++;
				}
				
				if ( !empty($row['exam_place']) ){
					$echo = $echo . " $('#csBackgroundnv').append('<div class= col-md-6  >Exam Place: ".$row['exam_place']."</div>'); ";
					$count2++;
				}
				
				if ( !empty($row['exam_date']) ){
					$timestamp = strtotime($row['exam_date']);
					$echo = $echo . " $('#csBackgroundnv').append('<div class= col-md-6  >Exam Date: ".date("M d,Y" , $timestamp )."</div>'); ";
					$count2++;
				}
				
				if ( !empty($row['rating']) ){
					$echo = $echo . " $('#csBackgroundnv').append('<div class= col-md-6  >Exam Rating: ".$row['rating']."</div>'); ";
					$count2++;
				}
				
				if ( !empty($row['license_no']) ){
					$echo = $echo . " $('#csBackgroundnv').append('<div class= col-md-6  >License No.: ".$row['license_no']."</div>'); ";
					$count2++;
				}
				
				if ( !empty($row['license_validity_date']) ){
					$timestamp = strtotime($row['license_validity_date']);
					$echo = $echo . " $('#csBackgroundnv').append('<div class= col-md-6  >License validity date: ".date("M d,Y" , $timestamp )."</div>'); ";
					$count2++;
				}
				
				if ( $count2 % 2 != 0 ){
					$echo = $echo . " $('#csBackgroundnv').append('<div class= col-md-6  >&nbsp</div>'); ";
				}
				
				$count1++;
				$count2 = 0;
			}
		}
		
		if ( $count1 == 0 ){
			$echo = $echo . " $('#csBackgroundnv').append('<div class= col-md-12  >No information to load.</div>'); ";
		}
		
		mysqli_close( $_SESSION['pims_data']['connection'] );
		unset( $_SESSION['pims_data']['connection'] );
		
		echo "<script> " . $echo . "</script>";
	}
	
	function geteducationabackground(){
		// For: profile.php
		// Purpose: To load personnel educational background data on profile.php page
		include("db_connect.php");
		
		$echo = "";
		
		$query = "select * from pims_educational_background where emp_No = ".$_SESSION['pims_data']['emp_id']."; ";
		$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		
		if ( mysqli_num_rows($result) > 0 ){
			$row = mysqli_fetch_array( $result );
			if ( !empty($row['elementary_school_name']) ){
				$echo = $echo . " $('#educationalBackgroundnv').append('<div class= col-md-6  >Elementary: ".$row['elementary_school_name']." ( ".$row['elementary_academic_yr']." )</div>'); ";
			}
			
			if ( !empty($row['secondary_school_name']) ){
				$echo = $echo . " $('#educationalBackgroundnv').append('<div class= col-md-6  >Secondary: ".$row['secondary_school_name']." ( ".$row['secondary_academic_yr']." )</div>'); ";
			}
			
			if ( !empty($row['tertiary_school_name']) ){
				$echo = $echo . " $('#educationalBackgroundnv').append('<div class= col-md-6  >Tertiary: ".$row['tertiary_school_name']." ( ".$row['tertiary_academic_yr']." )</div>'); ";
			}
			
			if ( !empty($row['honor_or_award']) ){
				$echo = $echo . " $('#educationalBackgroundnv').append('<div class= col-md-6  >Honor or Award: ".$row['honor_or_award']."</div>'); ";
			}
			
			if ( !empty($row['affiliation']) ){
				$echo = $echo . " $('#educationalBackgroundnv').append('<div class= col-md-6  >Affiliations: ".$row['affiliation']."</div>'); ";
			}
		}
		else{
			$echo = $echo . " $('#educationalBackgroundnv').append('<div class= col-md-12  >No information to load.</div>'); ";
		}
		
		mysqli_close( $_SESSION['pims_data']['connection'] );
		unset( $_SESSION['pims_data']['connection'] );
		
		echo "<script> " . $echo . "</script>";
	}

	function getpersonnelinfo(){
		// For: profile.php
		// Purpose: To load basic personnel data on profile.php page
		
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
		if ( $row['perm_address_barangay'] != null ) $permaddStr = $permaddStr . " " . $row['perm_address_barangay'];
		$permaddStr = $permaddStr . ", " . $row['perm_address_municipality_city'];
		if ( $row['perm_address_province'] != null ) $permaddStr = $permaddStr . " " . $row['perm_address_province'];
		$permaddStr = $permaddStr . " " . $row['perm_address_zipCode'];
		
		// --------------------- PermAdd ------------------------
		
		// --------------------- TempAdd ------------------------
		$tempaddStr = "Temporary Address:";
		if ( $row['temp_address_house_no'] != null ) $tempaddStr = $tempaddStr . " " . $row['temp_address_house_no'];
		if ( $row['temp_address_street'] != null ) $tempaddStr = $tempaddStr . " " . $row['temp_address_street'];
		$tempaddStr = $tempaddStr . " " . $row['temp_address_barangay'];
		$tempaddStr = $tempaddStr . ", " . $row['temp_address_municipality_city'];
		if ( $row['temp_address_province'] != null ) $tempaddStr = $tempaddStr . " " . $row['temp_address_province'];
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
			$('#personalInformation1').append($('<div>".$empNoStr."</div>').attr( { class : 'col-md-6' } ));
			".$jobTitleStr."
			".$dateOfJoiningStr."
			".$dateOfOriginalAppointmentStr."
			".$educationalBackground." 
			".$toBeEcho2."
			";
			
			
			
		echo "<script>" . $toBeEcho1 . "</script>" ;
	}

	function getfamilyinfo(){
		// For: profile.php
		// Purpose: To load personnel family data on profile.php page
		
		include("db_connect.php");
		
		$query = "select * from pims_family_background where emp_No = ".$_SESSION['pims_data']['emp_id']."; ";
		$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
		
		
		$echo = "";
		
		if ( mysqli_num_rows($result) > 0 ){
			$row = mysqli_fetch_array( $result );
			if ( !empty($row['spouse_lastname']) ){
				$echo = $echo . " $('#familyBackgroundnv').append('<div class= col-md-6  >Spouse Name: ".$row['spouse_lastname'].", ".$row['spouse_firstname']." ".$row['spouse_middlename']." ".$row['spouse_extension_name']."</div>'); ";
			}
			
			if ( !empty($row['father_lname']) ){
				$echo = $echo . " $('#familyBackgroundnv').append('<div class= col-md-6  >Father Name: ".$row['father_lname'].", ".$row['father_fname']." ".$row['father_mname']."</div>'); ";
			}
			
			if ( !empty($row['father_birthdate']) ){
				$timestamp = strtotime($row['father_birthdate']);
				$echo = $echo . " $('#familyBackgroundnv').append('<div class= col-md-6  >Father Birthdate: ". date("M d,Y" , $timestamp ) ."</div>'); ";
			}
			
			if ( !empty($row['father_occupation']) ){
				$echo = $echo . " $('#familyBackgroundnv').append('<div class= col-md-6  >Father Occupation: ".$row['father_occupation']."</div>'); ";
			}
		}
		else{
			$echo = $echo . " $('#familyBackgroundnv').append('<div class= col-md-12  >No information to load.</div>'); ";
		}
		
		
		
		
		mysqli_close( $_SESSION['pims_data']['connection'] );
		unset( $_SESSION['pims_data']['connection'] );
		
		echo "<script> " . $echo . " </script>";
	}
?>