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
		else if ( $table == "pims_educational_background" || $table == "PIMS_EDUCATIONAL_BACKGROUND" ){
			switch($column){
				case 'elementary_school_name':
					$return1 = "Elementary: School Name";
					break;
				case 'elementary_academic_yr':
					$return1 = "Elementary: Academic year";
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
				case 'honor_or_award':
					$return1 = "Honor or Award";
					break;
				case 'affiliations':
					$return1 = "Affiliation";
					break;
			}
		}
		else if ( $table == "pims_family_background" || $table == "PIMS_FAMILY_BACKGROUND" ){
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
				case 'father_fname':
					$return1 = "Father: First Name";
					break;
				case 'father_mname':
					$return1 = "Father: Middle Name";
					break;
				case 'father_lname':
					$return1 = "Father: Last Name";
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
				case 'no_of_siblings':
					$return1 = "Family: Number of siblings";
					break;
			}
		}
		
		return $return1;
	}
?>