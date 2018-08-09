		function resetAlertify() {
			$("#toggleCSS").attr("href", "../myfunc/alertify.js-0.3.11/themes/alertify.default.css");
			alertify.set({
				labels : {
					ok     : "OK",
					cancel : "Cancel"
				},
				delay : 5000,
				buttonReverse : false,
				buttonFocus   : "ok"
			});
		}
		
		$(document).ready(function(){
			$("[name=civilStatus1]").change(function(){
				if ( $("[name=civilStatus1]:checked").val() == "Others" ){
					$( "#civilStatusOthers1" ).css("display","block");
				}
				else{
					$( "#civilStatusOthers1" ).css("display","none");
				}
			});
		});
		
		$( "#checkBoxSame1" ).click(function() {
			
			if ($('#checkBoxSame1').is(':checked')){
				$( "#tempAddressDiv1" ).css("display","none");
				resetAlertify();
				alertify.log("Temporary address will be the same as your permanent address");
			}
			else{
				$( "#tempAddressDiv1" ).css("display","block");
				resetAlertify();
				alertify.log("Temporary address won't be the same as your permanent address");
			}
		});		
		$( "#checkBoxSame2" ).click(function() {
			
			if ($('#checkBoxSame2').is(':checked')){
				$( "#leaveCredits2div" ).css("display","block");
			}
			else{
				$( "#leaveCredits2div" ).css("display","none");
			}
		});	
		
		
		function verifyUniqueName( idun , callback ){
						$.ajax({
							async: false, 
	     					url: '../myfunc/add_personnel4.php?id=' + idun,
							type: 'GET',
	        				data:  "f=" + $('#fname1').val() + "&l=" + $('#lname1').val() + "&m=" + $('#mname1').val() ,
	    					contentType: false,
	        				cache: false,
	        				processData:false,
	    					success: function(data, textStatus, jqXHR)
	    						{	
	 								callback(data);
	    						},
	    					error: function(jqXHR, textStatus, errorThrown) 
	    						{	
									resetAlertify();
									alertify.error(jqXHR);
	     						}          
	    				});
		}
		
		function verifyCompleteItemNo( idctn , callback ){
						$.ajax({
							async: false, 
	     					url: '../myfunc/add_personnel5.php?id=' + idctn,
							type: 'GET',
	        				data: "c=" + $('#completeItemNo1').val() ,
	    					contentType: false,
	        				cache: false,
	        				processData:false,
	    					success: function(data, textStatus, jqXHR)
	    						{	
	 								callback(data);
	    						},
	    					error: function(jqXHR, textStatus, errorThrown) 
	    						{	
									resetAlertify();
									alertify.error(jqXHR);
	     						}          
	    				});
		}
		
		function verifyBiometricsID( idbid , callback ){
						$.ajax({
							async: false, 
	     					url: '../myfunc/add_personnel6.php?id=' + idbid,
							type: 'GET',
	        				data: "b=" + $('#biometricID1').val() ,
	    					contentType: false,
	        				cache: false,
	        				processData:false,
	    					success: function(data, textStatus, jqXHR)
	    						{	
	 								callback(data);
	    						},
	    					error: function(jqXHR, textStatus, errorThrown) 
	    						{	
									resetAlertify();
									alertify.error(jqXHR);
	     						}          
	    				});
		}
		
		function submitForm1(idF){
			
			var check = 0;
			var checkCivilStatus1 = 0;
			if ($('#checkBoxSame1').is(':checked')) var checkBox1 = 1;
			else var checkBox1 = 0;
			
			// ---- NAME VERIFICATION ----
				
				
					if ($('#lname1').val().length > 0) {
						if ($('#lname1').val().length > 45) {
							resetAlertify();
							alertify.log("Last name is too long", "", 0);
							check++;
						}
					}
					else{
						resetAlertify();
						alertify.log("Last name is required", "", 0);
						check++;
					}
					
					if ($('#fname1').val().length > 0) {
						if ($('#fname1').val().length > 45) {
							resetAlertify();
							alertify.log("First name is too long", "", 0);
							check++;
						}
					}
					else{
						resetAlertify();
						alertify.log("First name is required", "", 0);
						check++;
					}
					
					if ($('#mname1').val().length > 0) {
						if ($('#mname1').val().length > 45) {
							resetAlertify();
							alertify.log("Middle name is too long", "", 0);
							check++;
						}
					}
					
					if ($('#extension_name1').val().length > 0) {
						if ($('#extension_name1').val().length > 5) {
							resetAlertify();
							alertify.log("Extension name is too long", "", 0);
							check++;
						}
					}
		
					verifyUniqueName( idF , function(test){
						if ( test == "true" ){
							resetAlertify();
							alertify.log("The name is already exists", "", 0);
							check++;
						}
					});
				
			
			// ---- BIRTHDAY VERIFICATION ----
			if ( $('#birthdate1').val() == "" ){
				resetAlertify();
				alertify.log("Birthday may be empty or invalid", "", 0);
				check++;
			}
			else{
				var bd = new Date($('#birthdate1').val());
				var cd = new Date();
				if ( bd >= cd ){
					resetAlertify();
					alertify.log("Birthday can't be later than today", "", 0);
					check++;
				}
			}
			
			// ---- NATIONALITY VERIFICATION ----
			if ($('#nationality1').val().length > 0) {
				if ($('#nationality1').val().length > 45) {
					resetAlertify();
					alertify.log("Nationality is too long", "", 0);
					check++;
				}
			}
			else{
				resetAlertify();
				alertify.log("Nationality is required", "", 0);
				check++;
			}
			
			// ---- CIVIL STATUS VERIFICATION ----
			
			if ( $("[name=civilStatus1]:checked").val() == "Others" ){
				if ($('#civilStatusOthers1').val().length > 0) {
					if ($('#civilStatusOthers1').val().length > 20) {
						resetAlertify();
						alertify.log("Civil Status is too long", "", 0);
						check++;
					}
					else{
						checkCivilStatus1 = 1;
					}
				}
				else{
					resetAlertify();
					alertify.log("Please fill the Civil Status others form", "", 0);
					check++;
				}
			}
			
			// ---- BLOOD TYPE VERIFICATION ----
			if ($('#bloodType1').val().length > 5) {
					resetAlertify();
					alertify.log("Blood Type is too long", "", 0);
					check++;
			}
			
			// ---- GSIS NO. VERIFICATION ----
			if ($('#gsis1').val().length > 25) {
					resetAlertify();
					alertify.log("GSIS No. is too long", "", 0);
					check++;
			}
			
			// ---- CONTACT NO. VERIFICATION ----
			if ($('#contactNo1').val().length > 20) {
					resetAlertify();
					alertify.log("Contact Number is too long", "", 0);
					run = 0;
			}
			
			// ---- EMAIL ADDRESS VERIFICATION ----
			if ($('#emailAddress1').val().length > 45) {
					resetAlertify();
					alertify.log("Email Address is too long", "", 0);
					check++;
			}
			
			if ($('#religion1').val().length > 0) {
					if ($('#religion1').val().length > 45) {
						resetAlertify();
						alertify.log("Mother's occupation is too long", "", 0);
						check++;
					}
			}
			
			
			if ( checkBox1 == 0 ){
				
				if ($('#tempStreet1').val().length > 110) {
					resetAlertify();
					alertify.log("Temporary Address: Street is too long", "", 0);
					check++;
				}
				
				
				if ( $('#tempHouseNo1').val() < 0 ){
					resetAlertify();
					alertify.log("Temporary Address: House No. can't be negative", "", 0);
					check++;
				}
				
				
				if ($('#tempBarangay1').val().length > 0) {
					if ($('#tempBarangay1').val().length > 45) {
						resetAlertify();
						alertify.log("Temporary Address: Barangay is too long", "", 0);
						check++;
					}
				}
				else{
					resetAlertify();
					alertify.log("Temporary Address: Barangay is required", "", 0);
					check++;
				}
				
				if ($('#tempMunicipalityCity1').val().length > 0) {
					if ($('#tempMunicipalityCity1').val().length > 45) {
						resetAlertify();
						alertify.log("Temporary Address: Municipality/City is too long", "", 0);
						check++;
					}
				}
				else{
					resetAlertify();
					alertify.log("Temporary Address: Municipality/City is required", "", 0);
					check++;
				}
				
				if ($('#tempProvince1').val().length > 0) {
					if ($('#tempProvince1').val().length > 45) {
						resetAlertify();
						alertify.log("Temporary Address: Province is too long", "", 0);
						check++;
					}
				}
				else{
					resetAlertify();
					alertify.log("Temporary Address: Province is required", "", 0);
					check++;
				}
				
				if ($('#tempZipCode1').val().length > 0) {
					
					if ( $('#tempZipCode1').val() < 0 ){
						resetAlertify();
						alertify.log("Temporary Address: Zip Code can't be negative", "", 0);
						check++;
					}
					
				}
				else{
					resetAlertify();
					alertify.log("Temporary Address: Zip Code is required", "", 0);
					check++;
				}
				
			}
			
			if ($('#permStreet1').val().length > 110) {
					resetAlertify();
					alertify.log("Permanent Address: Street is too long", "", 0);
					check++;
			}
			
			
			if ( $('#permHouseNo1').val() < 0 ){
				resetAlertify();
				alertify.log("Permanent Address: House No. can't be negative", "", 0);
				check++;
			}
			
			
			if ($('#permBarangay1').val().length > 0) {
				if ($('#permBarangay1').val().length > 45) {
					resetAlertify();
					alertify.log("Permanent Address: Barangay is too long", "", 0);
					check++;
				}
			}
			else{
				resetAlertify();
				alertify.log("Permanent Address: Barangay is required", "", 0);
				check++;
			}
			
			if ($('#permMunicipalityCity1').val().length > 0) {
				if ($('#permMunicipalityCity1').val().length > 45) {
					resetAlertify();
					alertify.log("Permanent Address: Municipality/City is too long", "", 0);
					check++;
				}
			}
			else{
				resetAlertify();
				alertify.log("Permanent Address: Municipality/City is required", "", 0);
				check++;
			}
			
			if ($('#permProvince1').val().length > 0) {
				if ($('#permProvince1').val().length > 45) {
					resetAlertify();
					alertify.log("Permanent Address: Province is too long", "", 0);
					check++;
				}
			}
			else{
				resetAlertify();
				alertify.log("Permanent Address: Province is required", "", 0);
				check++;
			}
			
			if ($('#permZipCode1').val().length > 0) {
				
				if ( $('#permZipCode1').val() < 0 ){
					resetAlertify();
					alertify.log("Permanent Address: Zip Code can't be negative", "", 0);
					check++;
				}
				
			}
			else{
				resetAlertify();
				alertify.log("Permanent Address: Zip Code is required", "", 0);
				check++;
			}
			
			// -------------------------------------------------------
			
				if ($('#flname1').val().length > 0) {
					if ($('#flname1').val().length > 45) {
						resetAlertify();
						alertify.log("Father: Last Name is too long", "", 0);
						check++;
					}
				}
				else{
					resetAlertify();
					alertify.log("Father: Last Name is required", "", 0);
					check++;
				}
				
				if ($('#ffname1').val().length > 0) {
					if ($('#ffname1').val().length > 45) {
						resetAlertify();
						alertify.log("Father: First Name is too long", "", 0);
						check++;
					}
				}
				else{
					resetAlertify();
					alertify.log("Father: First Name is required", "", 0);
					check++;
				}
				
				if ($('#fmname1').val().length > 0) {
					if ($('#fmname1').val().length > 45) {
						resetAlertify();
						alertify.log("Father: Middle Name is too long", "", 0);
						check++;
					}
				}
				else{
					resetAlertify();
					alertify.log("Father: Middle Name is required", "", 0);
					check++;
				}
				
				if ( $('#fbirthdate1').val() == "" ){
				resetAlertify();
				alertify.log("Father's Birthday may be empty or invalid", "", 0);
				check++;
				}
				else{
					var bd = new Date($('#fbirthdate1').val());
					var cd = new Date();
					if ( bd >= cd ){
						resetAlertify();
						alertify.log("Father's Birthday can't be later than today", "", 0);
						check++;
					}
				}
				
				if ($('#foccupation1').val().length > 0) {
					if ($('#foccupation1').val().length > 45) {
						resetAlertify();
						alertify.log("Father: Occupation is too long", "", 0);
						check++;
					}
				}
				else{
					resetAlertify();
					alertify.log("Father: Occupation is required", "", 0);
					check++;
				}
				
				
				
				
				if ($('#mmaidenname1').val().length > 0) {
					if ($('#mmaidenname1').val().length > 45) {
						resetAlertify();
						alertify.log("Mother: Maiden Name is too long", "", 0);
						check++;
					}
				}
				else{
					resetAlertify();
					alertify.log("Mother: Maiden Name is required", "", 0);
					check++;
				}
				
				if ($('#mlname1').val().length > 0) {
					if ($('#mlname1').val().length > 45) {
						resetAlertify();
						alertify.log("Mother: Last Name is too long", "", 0);
						check++;
					}
				}
				else{
					resetAlertify();
					alertify.log("Mother: Last Name is required", "", 0);
					check++;
				}
				
				if ($('#mfname1').val().length > 0) {
					if ($('#mfname1').val().length > 45) {
						resetAlertify();
						alertify.log("Mother: First Name is too long", "", 0);
						check++;
					}
				}
				else{
					resetAlertify();
					alertify.log("Mother: First Name is required", "", 0);
					check++;
				}
				
				if ($('#mmname1').val().length > 0) {
					if ($('#mmname1').val().length > 45) {
						resetAlertify();
						alertify.log("Mother: Middle Name is too long", "", 0);
						check++;
					}
				}
				else{
					resetAlertify();
					alertify.log("Mother: Middle Name is required", "", 0);
					check++;
				}
				
				if ( $('#mbirthdate1').val() == "" ){
				resetAlertify();
				alertify.log("Mother's Birthday may be empty or invalid", "", 0);
				check++;
				}
				else{
					var bd = new Date($('#mbirthdate1').val());
					var cd = new Date();
					if ( bd >= cd ){
						resetAlertify();
						alertify.log("Mother's Birthday can't be later than today", "", 0);
						check++;
					}
				}
				
				if ($('#moccupation1').val().length > 0) {
					if ($('#moccupation1').val().length > 45) {
						resetAlertify();
						alertify.log("Mother's occupation is too long", "", 0);
						check++;
					}
				}
				else{
					resetAlertify();
					alertify.log("Mother's occupation is required", "", 0);
					check++;
				}
				
				if ( $('#nos1').val() === "" ){
					resetAlertify();
					alertify.log("No. of children is required", "", 0);
					check++;
				}
				else if ( $('#nos1').val() < 0 ){
					resetAlertify();
					alertify.log("No. of children can't be negative", "", 0);
					check++;
				}
			
			// -------------------------------------------------------
				
				if ($('#elementary2').val().length > 0) {
					if ($('#elementary2').val().length > 110) {
						resetAlertify();
						alertify.log("Elementary: School Name is too long", "", 0);
						check++;
					}
				}
				else{
					resetAlertify();
					alertify.log("Elementary: School Name is required", "", 0);
					check++;
				}
				
				if ( $('#elementaryFrom2').val() === "" ){
					resetAlertify();
					alertify.log("Elementary: From Academic year is required", "", 0);
					check++;
				}
				else if ( $('#elementaryFrom2').val() < 0 ){
					resetAlertify();
					alertify.log("Elementary: From Academic year can't be negative", "", 0);
					check++;
				}
				else if ( $('#elementaryFrom2').val() < 1000 ){
					resetAlertify();
					alertify.log("Elementary: From Academic year can't be lower than a thousand digit", "", 0);
					check++;
				}
				else if ( $('#elementaryFrom2').val() > 9999 ){
					resetAlertify();
					alertify.log("Elementary: From Academic year can't be higher than a thousand digit", "", 0);
					check++;
				}
				
				if ( $('#elementaryTo2').val() === "" ){
					resetAlertify();
					alertify.log("Elementary: To Academic year is required", "", 0);
					check++;
				}
				else if ( $('#elementaryTo2').val() < 0 ){
					resetAlertify();
					alertify.log("Elementary: To Academic year can't be negative", "", 0);
					check++;
				}
				else if ( $('#elementaryTo2').val() < 1000 ){
					resetAlertify();
					alertify.log("Elementary: To Academic year can't be lower than a thousand digit", "", 0);
					check++;
				}
				else if ( $('#elementaryTo2').val() > 9999 ){
					resetAlertify();
					alertify.log("Elementary: To Academic year can't be higher than a thousand digit", "", 0);
					check++;
				}
				
				if ( $('#elementaryFrom2').val() !== "" && $('#elementaryTo2').val() !== "" ){
					if ( $('#elementaryFrom2').val() > $('#elementaryTo2').val() ){
						resetAlertify();
						alertify.log("Elementary: From Academic year can't be higher than the Elementary: To Academic year", "", 0);
						check++;
					}
					else if ( $('#elementaryFrom2').val() == $('#elementaryTo2').val() ){
						resetAlertify();
						alertify.log("Elementary: From Academic year can't be the same as the Elementary: To Academic year", "", 0);
						check++;
					}
				}
				
				if ($('#highSchool2').val().length > 45) {
					resetAlertify();
					alertify.log("High School: School Name is too long", "", 0);
					check++;
				}
				
				if ( $('#highSchoolFrom2').val() === "" && $('#highSchoolTo2').val() !== "" ){
					resetAlertify();
					alertify.log("High School: To Academic year is together with From Academic year", "", 0);
					check++;
				}
				else if ( $('#highSchoolFrom2').val() !== "" && $('#highSchoolTo2').val() === "" ){
					resetAlertify();
					alertify.log("High School: From Academic year is together with To Academic year", "", 0);
					check++;
				}
				else if ( $('#highSchoolFrom2').val() !== "" && $('#highSchoolTo2').val() !== "" ){
					if ( $('#highSchoolFrom2').val() === "" ){
						resetAlertify();
						alertify.log("High School: From Academic year is required", "", 0);
						check++;
					}
					else if ( $('#highSchoolFrom2').val() < 0 ){
						resetAlertify();
						alertify.log("High School: From Academic year can't be negative", "", 0);
						check++;
					}
					else if ( $('#highSchoolFrom2').val() < 1000 ){
						resetAlertify();
						alertify.log("High School: From Academic year can't be lower than a thousand digit", "", 0);
						check++;
					}
					else if ( $('#highSchoolFrom2').val() > 9999 ){
						resetAlertify();
						alertify.log("High School: From Academic year can't be higher than a thousand digit", "", 0);
						check++;
					}
					
					if ( $('#highSchoolTo2').val() === "" ){
						resetAlertify();
						alertify.log("High School: To Academic year is required", "", 0);
						check++;
					}
					else if ( $('#highSchoolTo2').val() < 0 ){
						resetAlertify();
						alertify.log("High School: To Academic year can't be negative", "", 0);
						check++;
					}
					else if ( $('#highSchoolTo2').val() < 1000 ){
						resetAlertify();
						alertify.log("High School: To Academic year can't be lower than a thousand digit", "", 0);
						check++;
					}
					else if ( $('#highSchoolTo2').val() > 9999 ){
						resetAlertify();
						alertify.log("High School: To Academic year can't be higher than a thousand digit", "", 0);
						check++;
					}
					
					if ( $('#highSchoolFrom2').val() > $('#highSchoolTo2').val() ){
					resetAlertify();
					alertify.log("High School: From Academic year can't be higher than the High School: To Academic year", "", 0);
					check++;
					}
					else if ( $('#highSchoolFrom2').val() == $('#highSchoolTo2').val() ){
						resetAlertify();
						alertify.log("High School: From Academic year can't be the same as the High School: To Academic year", "", 0);
						check++;
					}
				}
				
				if ($('#college2').val().length > 110) {
					resetAlertify();
					alertify.log("College: School Name is too long", "", 0);
					check++;
				}
				
				if ($('#collegeDegree2').val().length > 55) {
					resetAlertify();
					alertify.log("College: Degree is too long", "", 0);
					check++;
				}
				
				if ( $('#collegeFrom2').val() === "" && $('#collegeTo2').val() !== "" ){
					resetAlertify();
					alertify.log("College: To Academic year is together with From Academic year", "", 0);
					check++;
				}
				else if ( $('#collegeFrom2').val() !== "" && $('#collegeTo2').val() === "" ){
					resetAlertify();
					alertify.log("College: From Academic year is together with To Academic year", "", 0);
					check++;
				}
				else if ( $('#collegeFrom2').val() !== "" && $('#collegeTo2').val() !== "" ){
					if ( $('#collegeFrom2').val() === "" ){
						resetAlertify();
						alertify.log("College: From Academic year is required", "", 0);
						check++;
					}
					else if ( $('#collegeFrom2').val() < 0 ){
						resetAlertify();
						alertify.log("College: From Academic year can't be negative", "", 0);
						check++;
					}
					else if ( $('#collegeFrom2').val() < 1000 ){
						resetAlertify();
						alertify.log("College: From Academic year can't be lower than a thousand digit", "", 0);
						check++;
					}
					else if ( $('#collegeFrom2').val() > 9999 ){
						resetAlertify();
						alertify.log("College: From Academic year can't be higher than a thousand digit", "", 0);
						check++;
					}
					
					if ( $('#collegeTo2').val() === "" ){
						resetAlertify();
						alertify.log("College: To Academic year is required", "", 0);
						check++;
					}
					else if ( $('#collegeTo2').val() < 0 ){
						resetAlertify();
						alertify.log("College: To Academic year can't be negative", "", 0);
						check++;
					}
					else if ( $('#collegeTo2').val() < 1000 ){
						resetAlertify();
						alertify.log("College: To Academic year can't be lower than a thousand digit", "", 0);
						check++;
					}
					else if ( $('#collegeTo2').val() > 9999 ){
						resetAlertify();
						alertify.log("College: To Academic year can't be higher than a thousand digit", "", 0);
						check++;
					}
					
					if ( $('#collegeFrom2').val() > $('#collegeTo2').val() ){
						resetAlertify();
						alertify.log("College: From Academic year can't be higher than the College: To Academic year", "", 0);
						check++;
					}
					else if ( $('#collegeFrom2').val() == $('#collegeTo2').val() ){
						resetAlertify();
						alertify.log("College: From Academic year can't be the same as the College: To Academic year", "", 0);
						check++;
					}
				}
				
				if ($('#honorAward2').val().length > 220) {
					resetAlertify();
					alertify.log("Honor or Award is too long", "", 0);
					check++;
				}
				
				if ($('#affiliation2').val().length > 220) {
					resetAlertify();
					alertify.log("Affiliation is too long", "", 0);
					check++;
				}
			
			
			
			// -------------- NEW VERIFICATION -----------------
			if ($('#checkBoxSame2').is(':checked')){
				if ( $('#leaveCredits2').val() === "" ){
					resetAlertify();
					alertify.log("Leave Credits is required", "", 0);
					check++;
				}
				else if ( $('#leaveCredits2').val() < 0 ){
					resetAlertify();
					alertify.log("Leave Credits can't be negative", "", 0);
					check++;
				}
			}
			
			
				if ($('#completeItemNo1').val().length > 0) {
					if ($('#completeItemNo1').val().length > 45) {
						resetAlertify();
						alertify.log("Complete item No. is too long", "", 0);
						check++;
					}
				}
				else{
					resetAlertify();
					alertify.log("Complete item No. is required", "", 0);
					check++;
				}
				verifyCompleteItemNo( idF , function(test){
					if ( test == "true" ){
						resetAlertify();
						alertify.log("Complete item No. already exists", "", 0);
						check++;
					}
				});
			
			if ($('#roleType1').val().length > 0) {
				if ($('#roleType1').val().length > 45) {
					resetAlertify();
					alertify.log("Role Type is too long", "", 0);
					check++;
				}
			}
			else{
				resetAlertify();
				alertify.log("Role Type is required", "", 0);
				check++;
			}
			
			if ( $('#dateJoined1').val() == "" ){
				resetAlertify();
				alertify.log("Date joined may be empty or invalid", "", 0);
				check++;
			}
			else{
				var bd = new Date($('#dateJoined1').val());
				var cd = new Date();
				if ( bd >= cd ){
					resetAlertify();
					alertify.log("Date joined can't be later than today", "", 0);
					check++;
				}
			}
			
			if ( $('#divCode1').val() === "" ){
				resetAlertify();
				alertify.log("Division code is required", "", 0);
				check++;
			}
			else if ( $('#divCode1').val() < 0 ){
				resetAlertify();
				alertify.log("Division code can't be negative", "", 0);
				check++;
			}

			
				if ($('#biometricID1').val().length > 0) {
					if ($('#biometricID1').val().length > 45) {
						resetAlertify();
						alertify.log("Biometric ID is too long", "", 0);
						check++;
					}
				}
				else{
					resetAlertify();
					alertify.log("Biometric ID is required", "", 0);
					check++;
				}
				verifyBiometricsID( idF , function(test){
					if ( test == "true" ){
						resetAlertify();
						alertify.log("Biometric ID already exist", "", 0);
						check++;
					}
				});
			
			if ( $('#schoolID1').val() === "" ){
				resetAlertify();
				alertify.log("School ID is required", "", 0);
				check++;
			}
			else if ( $('#schoolID1').val() < 0 ){
				resetAlertify();
				alertify.log("School ID can't be negative", "", 0);
				check++;
			}
			
			if ( $('#appointmentDate1').val() == "" ){
				resetAlertify();
				alertify.log("Appointment Date may be empty or invalid", "", 0);
				check++;
			}
			else{
				var bd = new Date($('#appointmentDate1').val());
				var cd = new Date();
				if ( bd >= cd ){
					resetAlertify();
					alertify.log("Appointment Date can't be later than today", "", 0);
					check++;
				}
			}
		
			if ( check == 0  ){
				submitForm1_2(idF,checkBox1,checkCivilStatus1);
			}
			
		}
		
		
		function submitForm1_2(idF2,var1,var2){
			
			
						var formURL1 = "../myfunc/update_personnel2.php?id="+idF2+"&";
						var imgVal = $('#Picture1').val(); 
						if(imgVal=='') 
						{ 
							resetAlertify();
							
							alertify.set({ labels: {
								ok     : "Yes",
								cancel : "No"
							} });
							alertify.set({ buttonReverse: true });
							
							alertify.confirm("You left the profile picture blank. This will make your picture as is", function (e) {
								if (e) {
									resetAlertify();
									alertify.log("Please wait. While processing your request. This shouldn't take long.");
									formURL1 = formURL1 + "pic=0&same=" + var1 + "&cs=" + var2 ;
									submitForm1_1(formURL1);
									
								} else {
									
									resetAlertify();
									alertify.set({ labels: {
										ok     : "Continue",
										cancel : "Cancel"
									} });
									alertify.set({ buttonReverse: true });
									alertify.confirm("Setting your profile picture to default. Continue?", function (e) {
										if (e) {
											resetAlertify();
											alertify.log("Please wait. While processing your request. This shouldn't take long.");
											formURL1 = formURL1 + "pic=1&same=" + var1 + "&cs=" + var2 ;
											submitForm1_1(formURL1);
										} else {
											resetAlertify();
											alertify.error("Canceled");
										}
									});
									
								}
							});
						}
						else{
							resetAlertify();
							alertify.log("Please wait. While processing your request. This shouldn't take long.");
							formURL1 = formURL1 + "pic=1&same=" + var1 + "&cs=" + var2 ;
							submitForm1_1(formURL1);
						}
			
			
		}
		
		function submitForm1_1(URL){
			
			$("#form1").submit(function(e){
						var formObj1 = $(this);
						var formURL1 = URL;
	    				var formData1 = new FormData(this);
	   					$.ajax({
	     					url: formURL1,
							type: 'POST',
	        				data:  formData1,
	    					mimeType:"multipart/form-data",
	    					contentType: false,
	        				cache: false,
	        				processData:false,
	    					success: function(data, textStatus, jqXHR)
	    						{	
	 								eval(data);
	    						},
	    					error: function(jqXHR, textStatus, errorThrown) 
	    						{	
									resetAlertify();
									alertify.error(jqXHR);
	     						}          
	    				});
	    				e.preventDefault(); //Prevent Default action. 
	    				e.unbind();
					}); 
					
			$("#form1").submit();
		}
		
		// -------------------------------------
		
		
		function submitForm2_1(id2){
			
			$("#form2").submit(function(e){
						var formObj1 = $(this);
						var formURL1 = "../myfunc/profile5.php?id=" + id2;
	    				var formData1 = new FormData(this);
	   					$.ajax({
	     					url: formURL1,
							type: 'POST',
	        				data:  formData1,
	    					mimeType:"multipart/form-data",
	    					contentType: false,
	        				cache: false,
	        				processData:false,
	    					success: function(data, textStatus, jqXHR)
	    						{	
	 								eval(data);
									submitForm3_1(id2);
	    						},
	    					error: function(jqXHR, textStatus, errorThrown) 
	    						{	
									resetAlertify();
									alertify.error(jqXHR);
	     						}          
	    				});
	    				e.preventDefault(); //Prevent Default action. 
	    				e.unbind();
					}); 
					
			
			$("#form2").submit();
		}
		
		
		
		
		// --------------------------------------------------------------------
		
		
		function submitForm3_1(id3){
			
			$("#form3").submit(function(e){
						var formObj1 = $(this);
						var formURL1 = "../myfunc/profile6.php?id=" + id3;
	    				var formData1 = new FormData(this);
	   					$.ajax({
	     					url: formURL1,
							type: 'POST',
	        				data:  formData1,
	    					mimeType:"multipart/form-data",
	    					contentType: false,
	        				cache: false,
	        				processData:false,
	    					success: function(data, textStatus, jqXHR)
	    						{	
	 								eval(data);
									submitForm4_1(id3);
	    						},
	    					error: function(jqXHR, textStatus, errorThrown) 
	    						{	
									resetAlertify();
									alertify.error(jqXHR);
	     						}          
	    				});
	    				e.preventDefault(); //Prevent Default action. 
	    				e.unbind();
					}); 
					
			
			$("#form3").submit();
		}
		
		function submitForm4_1(id4){
			$("#form4").submit(function(e){
						var formObj1 = $(this);
						if ( $('#checkBoxSame2').is(':checked') ){
							var formURL1 = "../myfunc/add_personnel3.php?id=" + id4 + "&lc=1";
						}
						else{
							var formURL1 = "../myfunc/add_personnel3.php?id=" + id4 + "&lc=0";
						}
						var formData1 = new FormData(this);
	   					$.ajax({
	     					url: formURL1,
							type: 'POST',
	        				data:  formData1,
	    					mimeType:"multipart/form-data",
	    					contentType: false,
	        				cache: false,
	        				processData:false,
	    					success: function(data, textStatus, jqXHR)
	    						{	
	 								eval(data);
									$('#submitButton4').prop('disabled', false);
									$('#checkBoxSame2').prop('disabled', false);
									$('#checkBoxSame1').prop('disabled', false);
	    						},
	    					error: function(jqXHR, textStatus, errorThrown) 
	    						{	
									resetAlertify();
									alertify.error(jqXHR);
	     						}          
	    				});
	    				e.preventDefault(); //Prevent Default action. 
	    				e.unbind();
					}); 
					
			
			$("#form4").submit();
		}
		
		function finalEditSubmit(ide){
			$('#submitButton4').prop('disabled', true);
			$('#checkBoxSame2').prop('disabled', true);
			$('#checkBoxSame1').prop('disabled', true);
			submitForm1(ide);
			$('#submitButton4').prop('disabled', false);
			$('#checkBoxSame2').prop('disabled', false);
			$('#checkBoxSame1').prop('disabled', false);
		}
		