<?php
	function translate1($table,$column){
		$return1 = "";
		if ( $table == "pims_personnel" || $table == "PIMS_PERSONNEL" ){
			switch($column){
				case 'P_picture':
					$return1 = "Profile Picture";
					break;
				case 'P_fname':
					$return1 = "First Name";
					break;
				case 'P_mname':
					$return1 = "Middle Name";
					break;
				case 'P_lname':
					$return1 = "Last Name";
					break;
				case 'P_extension_name':
					$return1 = "Extension Name";
					break;
				case 'P_email':
					$return1 = "Email Address";
					break;
				case 'pims_gender':
					$return1 = "Gender";
					break;
				case 'pims_age':
					$return1 = "Age";
					break;
				case 'pims_birthdate':
					$return1 = "Birthdate";
					break;
				case 'place_of_birth':
					$return1 = "Place of Birth";
					break;
				case 'height_m':
					$return1 = "Height";
					break;
				case 'weight_kg':
					$return1 = "Weight";
					break;
				case 'temp_address_street':
					$return1 = "Temporary Address: Street";
					break;
				case 'temp_address_house_no':
					$return1 = "Temporary Address: House No.";
					break;
				case 'temp_address_subdivision_village':
					$return1 = "Temporary Address: Subdivision/Village";
					break;
				case 'temp_address_barangay':
					$return1 = "Temporary Address: Barangay";
					break;
				case 'temp_address_municipality_city':
					$return1 = "Temporary Address: Municipality/City";
					break;
				case 'temp_address_province':
					$return1 = "Temporary Address: Province";
					break;
				case 'temp_address_zipCode':
					$return1 = "Temporary Address: Zip Code";
					break;
				case 'perm_address_street':
					$return1 = "Permanent Address: Street";
					break;
				case 'perm_address_house_no':
					$return1 = "Permanent Address: House No.";
					break;
				case 'perm_address_subdivision_village':
					$return1 = "Permanent Address: Subdivision/Village";
					break;
				case 'perm_address_barangay':
					$return1 = "Permanent Address: Barangay";
					break;
				case 'perm_address_municipality_city':
					$return1 = "Permanent Address: Municipality/City";
					break;
				case 'perm_address_province':
					$return1 = "Permanent Address: Province";
					break;
				case 'perm_address_zipCode':
					$return1 = "Permanent Address: Zip Code";
					break;
				case 'nationality':
					$return1 = "Nationality";
					break;
				case 'dual_citznshp_by_birth':
					$return1 = "Dual Citizenship by Birth";
					break;
				case 'dual_citznshp_by_naturalization':
					$return1 = "Dual Citizenship by Naturalization";
					break;
				case 'bloodtype':
					$return1 = "Blood Type";
					break;
				case 'civil_status':
					$return1 = "Civil Status";
					break;
				case 'pims_religion':
					$return1 = "Religion";
					break;
				case 'pims_image_type':
					$return1 = "Image Type";
					break;
				case 'pims_contact_no':
					$return1 = "Contact Number";
					break;
				case 'pims_telephone_no':
					$return1 = "Telephone Number";
					break;
				case 'GSIS_No':
					$return1 = "GSIS Number";
					break;
				case 'PAG_IBIG_id':
					$return1 = "PAGIBIG ID";
					break;
				case 'SSS_no':
					$return1 = "SSS Number";
					break;
				case 'TIN_no':
					$return1 = "TIN Number";
					break;
				case 'PHILHEALTH_no':
					$return1 = "PhilHealth Number";
					break;
			}
		}
		else if ( strtolower($table) == strtolower("pims_educational_background") ){
			switch($column){
				case 'elementary_school_name':
					$return1 = "Elementary: School Name";
					break;
				case 'elementary_academic_yr':
					$return1 = "Elementary: Academic year";
					break;
				case 'vocational_school_name':
					$return1 = "Vocational: School name";
					break;
				case 'vocational_course':
					$return1 = "Vocational: Course";
					break;
				case 'vocational_academic_yr':
					$return1 = "Vocational: Academic year";
					break;
				case 'secondary_school_name':
					$return1 = "High School: School Name";
					break;
				case 'secondary_academic_yr':
					$return1 = "High School: Academic year";
					break;
				case 'tertiary_school_name':
					$return1 = "College: School Name";
					break;
				case 'tertiary_academic_yr':
					$return1 = "College: Academic year";
					break;
				case 'tertiary_degrees':
					$return1 = "College: Degree";
					break;
				case 'gradStud_school':
					$return1 = "Graduate School: School Name";
					break;
				case 'gradStud_yr':
					$return1 = "Graduate School: Academic year";
					break;
				case 'gradStud_course':
					$return1 = "Graduate School: Course";
					break;
				case 'honor_or_award':
					$return1 = "Honor or Award";
					break;
				case 'affiliations':
					$return1 = "Affiliation";
					break;
				case 'highest_units':
					$return1 = "Highest Units";
					break;
			}
		}
		else if ( strtolower($table) == strtolower("pims_family_background") ){
			switch($column){
				case 'spouse_firstname':
					$return1 = "Spouse: First Name";
					break;
				case 'spouse_middlename':
					$return1 = "Spouse: Middle Name";
					break;
				case 'spouse_lastname':
					$return1 = "Spouse: Last Name";
					break;
				case 'spouse_extension_name':
					$return1 = "Spouse: Extension Name";
					break;
				case 'spouse_occupation':
					$return1 = "Spouse: Occupation";
					break;
				case 'spouse_business_name':
					$return1 = "Spouse: Business Name";
					break;
				case 'spouse_tel_no':
					$return1 = "Spouse: Telephone Number";
					break;
				case 'spouse_business_addr':
					$return1 = "Spouse: Business Address";
					break;
				case 'father_fname':
					$return1 = "Father: First Name";
					break;
				case 'father_mname':
					$return1 = "Father: Middle Name";
					break;
				case 'father_lname':
					$return1 = "Father: Last Name";
					break;
				case 'father_extension_name':
					$return1 = "Father: Extension Name";
					break;
				case 'father_birthdate':
					$return1 = "Father: Birthdate";
					break;
				case 'father_occupation':
					$return1 = "Father: Occupation";
					break;
				case 'mother_fname':
					$return1 = "Mother: First Name";
					break;
				case 'mother_mname':
					$return1 = "Mother: Middle Name";
					break;
				case 'mother_maidenname':
					$return1 = "Mother: Maiden Name";
					break;
				case 'mother_lname':
					$return1 = "Mother: Last Name";
					break;
				case 'mother_birthdate':
					$return1 = "Mother: Birthdate";
					break;
				case 'mother_occupation':
					$return1 = "Mother: Occupation";
					break;
				case 'children_name':
					$return1 = "Family: Children Name";
					break;
				case 'children_birthdate':
					$return1 = "Family: Children Birthdate";
					break;
			}
		}
		else if ( strtolower($table) == strtolower("pims_work_experience") ){
			switch($column){
				case 'we_date_from':
					$return1 = "Date from";
					break;
				case 'we_date_to':
					$return1 = "Date to";
					break;
				case 'we_position':
					$return1 = "Position";
					break;
				case 'we_department':
					$return1 = "Department";
					break;
				case 'agency':
					$return1 = "Agency";
					break;
				case 'office':
					$return1 = "Office";
					break;
				case 'company':
					$return1 = "Company";
					break;
				case 'we_monthly_salary':
					$return1 = "Monthly Salary";
					break;
				case 'pay_grade':
					$return1 = "Pay Grade";
					break;
				case 'appointment_status':
					$return1 = "Appoinment Status";
					break;
				case 'govt_service':
					$return1 = "Governtment Service";
					break;
			}
		}
		else if ( strtolower($table) == strtolower("pims_training_programs") ){
			switch($column){
				case 'training_title':
					$return1 = "Training Title";
					break;
				case 'location':
					$return1 = "Location";
					break;
				case 'date_start':
					$return1 = "Date Start";
					break;
				case 'date_finish':
					$return1 = "Date Finish";
					break;
				case 'no_of_hours':
					$return1 = "Number of hours";
					break;
				case 'conducted_by':
					$return1 = "Sponsored by";
					break;
				case 'training_type':
					$return1 = "Training type";
					break;
				case 'others':
					$return1 = "Other information";
					break;
			}
		}
		else if ( strtolower($table) == strtolower("pims_employment_records")  ){
			switch($column){
				case 'complete_item_no':
					$return1 = "Complete Item Number";
					break;
				case 'work_stat':
					$return1 = "Work Status";
					break;
				case 'role_type':
					$return1 = "Role Type";
					break;
				case 'emp_status':
					$return1 = "Employment Status";
					break;
				case 'date_joined':
					$return1 = "Date Joined";
					break;
				case 'date_retired':
					$return1 = "Date Retired";
					break;
				case 'div_code':
					$return1 = "Division Code";
					break;
				case 'biometric_ID':
					$return1 = "Biometric ID";
					break;
				case 'school_ID':
					$return1 = "School ID";
					break;
				case 'appointment_date':
					$return1 = "Appointment Date";
					break;
				case 'faculty_type':
					$return1 = "Faculty Type";
					break;
				case 'job_title_code':
					$return1 = "Job Title Code";
					break;
				case 'dept_ID':
					$return1 = "Department";
					break;
			}
		}
		else if ( strtolower($table) == strtolower("pims_cs_eligibility") ){
			switch($column){
				case 'career_service':
					$return1 = "Career Service";
					break;
				case 'rating':
					$return1 = "Rating";
					break;
				case 'exam_date':
					$return1 = "Examination Date";
					break;
				case 'exam_place':
					$return1 = "Examination Place";
					break;
				case 'license_no':
					$return1 = "License Number";
					break;
				case 'license_validity_date':
					$return1 = "License Validity Date";
					break;
			}
		}
		else if ( strtolower($table) == strtolower("pims_voluntary_work") ){
			switch($column){
				case 'org_name_address':
					$return1 = "Organization Name & Address";
					break;
				case 'vw_date_from':
					$return1 = "Date From";
					break;
				case 'vw_date_to':
					$return1 = "Date To";
					break;
				case 'vw_no_of_hrs':
					$return1 = "Number of hours";
					break;
				case 'vw_position':
					$return1 = "Position";
					break;
			}
		}
		
		return $return1;
	}
?>