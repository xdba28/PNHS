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

	function validateEmail(email) {
		var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		return re.test(String(email).toLowerCase());
	}
	
	// -- PART OF CODE WHERE THE SUBMITTING OF PERSONAL INFORMATION
	var globalvar_personnelID = 0;
	
	$( "#dual_citznshp_by_birth1dummy" ).click(function() {
			$('#dual_citznshp_by_birth1').val($('#dual_citznshp_by_naturalization1').val());
			$('#dual_citznshp_by_naturalization1').val("");
			$('#dual_citznshp_by_birth1div').css("display","block");
			$('#dual_citznshp_by_naturalization1div').css("display","none");
	});	
	
	$( "#dual_citznshp_by_naturalization1dummy" ).click(function() {
			$('#dual_citznshp_by_naturalization1').val($('#dual_citznshp_by_birth1').val());
			$('#dual_citznshp_by_birth1').val("");
			$('#dual_citznshp_by_birth1div').css("display","none");
			$('#dual_citznshp_by_naturalization1div').css("display","block");
	});	
	
	$("#form1").submit(function(e){
			var formObj1 = $(this);
			var formURL1 = "../myfunc/new/add_personnel.php?q=submitpersonalinfomation";
	    	var formData1 = new FormData(this);
	   		$.ajax({
	     		url: formURL1,
				type: "POST",
	        	data:  formData1,
	    		mimeType:"multipart/form-data",
	    		contentType: false,
	        	cache: false,
	       		processData:false,
	    		success: function(data, textStatus, jqXHR)
	    			{	
						resetAlertify();
	 					eval(data);
						$("#form6").submit();
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
	
	function verifypersonalinformation(){
		var notgoodcount = 0;
		
		// ---- emp_No VERIFICATION ----
		if ( notgoodcount == 0 ){
			if ( $("#emp_No1").val().length <= 0 ){
				resetAlertify();
				alertify.log("Error found: Employee ID is required", "", 0);
				notgoodcount++;
			}
			else if ( $("#emp_No1").val() < 0 ){
				resetAlertify();
				alertify.log("Error found: Employee ID cannot be negative", "", 0);
				notgoodcount++;
			}
		}
		
		if ( notgoodcount == 0 ){
			if ( $("#lname1").val().length <= 0 ){
				resetAlertify();
				alertify.log("Error found: Your Last name is required", "", 0);
				notgoodcount++;
			}
			else if ( $("#lname1").val().length > 45 ){
				resetAlertify();
				alertify.log("Error found: Your Last name is too long. Make sure it is less than 45 characters.", "", 0);
				notgoodcount++;
			}
		}
		
		if ( notgoodcount == 0 ){
			if ( $("#fname1").val().length <= 0 ){
				resetAlertify();
				alertify.log("Error found: Your First name is required", "", 0);
				notgoodcount++;
			}
			else if ( $("#fname1").val().length > 45 ){
				resetAlertify();
				alertify.log("Error found: Your First name is too long. Make sure it is less than 45 characters.", "", 0);
				notgoodcount++;
			}
		}
		
		if ( notgoodcount == 0 ){
			if ( $("#mname1").val().length > 45 ){
				resetAlertify();
				alertify.log("Error found: Your Middle name is too long. Make sure it is less than 45 characters.", "", 0);
				notgoodcount++;
			}
		}
		
		if ( notgoodcount == 0 ){
			if ( $("#mname1").val().length > 5 ){
				resetAlertify();
				alertify.log("Error found: Your Extension name is too long. Make sure it is less than 5 characters.", "", 0);
				notgoodcount++;
			}
		}
		// ---- emp_No VERIFICATION ----
		
		// ---- GENDER VERIFICATION ----
		if ( notgoodcount == 0 ){
			if ( $("[name=gender1]:checked").val() == undefined ){
				resetAlertify();
				alertify.log("Error found: Select Gender", "", 0);
				notgoodcount++;
			}
		}
		// ---- GENDER VERIFICATION ----
		
		if ( notgoodcount == 0 ){
		// ---- BIRTHDAY VERIFICATION ----
			if ( $('#birthdate1').val() == "" ){
				resetAlertify();
				alertify.log("Error found: Birthday may be empty or invalid", "", 0);
				notgoodcount++;
			}
			else{
				var bd = new Date($('#birthdate1').val());
				var cd = new Date();
				if ( bd >= cd ){
					resetAlertify();
					alertify.log("Error found: Birthday can't be later than today", "", 0);
					notgoodcount++;
				}
			}
		// ---- BIRTHDAY VERIFICATION ----
		}
		
		if ( notgoodcount == 0 ){
		// ---- BIRTHPLACE VERIFICATION ----
			if ( $("#birthplace1").val().length >= 115 ){
				resetAlertify();
				alertify.log("Error found: Birth Place is very long. Make sure it is less than 155 characters.", "", 0);
				notgoodcount++;
			}
		// ---- BIRTHPLACE VERIFICATION ----
		}
		
		if ( notgoodcount == 0 ){
		// ---- NATIONALITY VERIFICATION ----
			if ( $("#nationality1").val().length == 0 ){
				resetAlertify();
				alertify.log("Error found: Nationality is empty or invalid", "", 0);
				notgoodcount++;
			}
			else if ( $("#nationality1").val().length >= 45 ){
				resetAlertify();
				alertify.log("Error found: Birth Place is very long. Make sure it is less than 45 characters.", "", 0);
				notgoodcount++;
			}
		// ---- NATIONALITY VERIFICATION ----
		}
		
		if ( notgoodcount == 0 ){
		// ---- CIVIL STATUS VERIFICATION ----
			if ( $("[name=civilStatus1]:checked").val() == undefined ){
				resetAlertify();
				alertify.log("Error found: Select your civil status", "", 0);
				notgoodcount++;
			}
		// ---- CIVIL STATUS VERIFICATION ----
		}
		
		if ( notgoodcount == 0 ){
		// ---- BLOODTYPE VERIFICATION ----
			if ( $("#bloodType1").val().length >= 5 ){
				resetAlertify();
				alertify.log("Error found: Blood Type too long. Please make sure that it is less than 5 characters", "", 0);
				notgoodcount++;
			}
		// ---- BLOODTYPE VERIFICATION ----
		}
		
		if ( notgoodcount == 0 ){
		// ---- GSIS VERIFICATION ----
			if ( $("#gsis1").val().length >= 25 ){
				resetAlertify();
				alertify.log("Error found: GSIS ID No. too long. Please make sure that it is less than 25 characters", "", 0);
				notgoodcount++;
			}
		// ---- GSIS VERIFICATION ----
		}
		
		if ( notgoodcount == 0 ){
		// ---- PAGIBIG VERIFICATION ----
			if ( $("#pagibig1").val().length >= 45 ){
				resetAlertify();
				alertify.log("Error found: PAGIBIG ID too long. Please make sure that it is less than 45 characters", "", 0);
				notgoodcount++;
			}
		// ---- PAGIBIG VERIFICATION ----
		}
		
		if ( notgoodcount == 0 ){
		// ---- SSS VERIFICATION ----
			if ( $("#sss1").val().length >= 45 ){
				resetAlertify();
				alertify.log("Error found: SSS No. too long. Please make sure that it is less than 45 characters", "", 0);
				notgoodcount++;
			}
		// ---- SSS VERIFICATION ----
		}
		
		if ( notgoodcount == 0 ){
		// ---- TIN VERIFICATION ----
			if ( $("#tin1").val().length >= 45 ){
				resetAlertify();
				alertify.log("Error found: TIN No. too long. Please make sure that it is less than 45 characters", "", 0);
				notgoodcount++;
			}
		// ---- TIN VERIFICATION ----
		}
		
		if ( notgoodcount == 0 ){
		// ---- PHILHEALTH VERIFICATION ----
			if ( $("#philhealth1").val().length >= 45 ){
				resetAlertify();
				alertify.log("Error found: PHILHEALTH No. too long. Please make sure that it is less than 45 characters", "", 0);
				notgoodcount++;
			}
		// ---- PHILHEALTH VERIFICATION ----
		}
		
		if ( notgoodcount == 0 ){
		// ---- CONTACT NO VERIFICATION ----
			if ( $("#contactNo1").val().length >= 20 ){
				resetAlertify();
				alertify.log("Error found: Contact No. too long. Please make sure that it is less than 20 characters", "", 0);
				notgoodcount++;
			}
		// ---- CONTACT NO VERIFICATION ----
		}
		
		if ( notgoodcount == 0 ){
		// ---- TELEPHONE NO VERIFICATION ----
			if ( $("#telephoneNo1").val().length >= 45 ){
				resetAlertify();
				alertify.log("Error found: Telephone No. too long. Please make sure that it is less than 45 characters", "", 0);
				notgoodcount++;
			}
		// ---- TELEPHONE NO VERIFICATION ----
		}
		
		if ( notgoodcount == 0 ){
		// ---- EMAIL ADDRESS VERIFICATION ----
			if ( $("#emailAddress1").val().length >= 45 ){
				resetAlertify();
				alertify.log("Error found: Email Address. too long. Please make sure that it is less than 45 characters", "", 0);
				notgoodcount++;
			}
			else if ( !validateEmail($("#emailAddress1").val()) ){
				resetAlertify();
				alertify.log("Error found: Not a valid Email Address", "", 0);
				notgoodcount++;
			}
		// ---- EMAIL ADDRESS VERIFICATION ----
		}
		
		if ( notgoodcount == 0 ){
		// ---- RELIGION VERIFICATION ----
			if ( $("#religion1").val().length >= 45 ){
				resetAlertify();
				alertify.log("Error found: Religion is too long. Please make sure that it is less than 45 characters", "", 0);
				notgoodcount++;
			}
		// ---- RELIGION VERIFICATION ----
		}
		
		if ( notgoodcount == 0 ){
		// ---- HEIGHT VERIFICATION ----
			if ( $("#height1").val().length == 0 ){
				resetAlertify();
				alertify.log("Error found: Height is needed", "", 0);
				notgoodcount++;
			}
			else if ( $("#height1").val().length < 0 ){
				resetAlertify();
				alertify.log("Error found: Height cannot be negative", "", 0);
				notgoodcount++;
			}
		// ---- HEIGHT VERIFICATION ----
		}
		
		if ( notgoodcount == 0 ){
		// ---- WEIGHT VERIFICATION ----
			if ( $("#weight1").val().length == 0 ){
				resetAlertify();
				alertify.log("Error found: Weight is needed", "", 0);
				notgoodcount++;
			}
			else if ( $("#weight1").val().length < 0 ){
				resetAlertify();
				alertify.log("Error found: Weight cannot be negative", "", 0);
				notgoodcount++;
			}
		// ---- WEIGHT VERIFICATION ----
		}
		
		if ( notgoodcount == 0 ){
		// ---- dual_citznshp_by_birth VERIFICATION ----
			if ( $("#dual_citznshp_by_birth1").val().length >= 55 ){
				resetAlertify();
				alertify.log("Error found: Dual Citizenship by Birth is too long. Please make sure that it is less than 55 characters", "", 0);
				notgoodcount++;
			}
		// ---- dual_citznshp_by_birth VERIFICATION ----
		}
		
		if ( notgoodcount == 0 ){
		// ---- dual_citznshp_by_birth VERIFICATION ----
			if ( $("#dual_citznshp_by_naturalization1").val().length >= 55 ){
				resetAlertify();
				alertify.log("Error found: Dual Citizenship by Nationality is too long. Please make sure that it is less than 55 characters", "", 0);
				notgoodcount++;
			}
		// ---- dual_citznshp_by_birth VERIFICATION ----
		}
		
			if ( !($('#checkBoxSame1').is(':checked')) ){
				
				if ( notgoodcount == 0 ){
				if ($('#tempStreet1').val().length > 110) {
					resetAlertify();
					alertify.log("Temporary Address: Street is too long", "", 0);
					notgoodcount++;
				}
				}
				
				if ( notgoodcount == 0 ){
				if ( $('#tempHouseNo1').val() < 0 ){
					resetAlertify();
					alertify.log("Temporary Address: House No. can't be negative", "", 0);
					notgoodcount++;
				}
				}
				
				if ( notgoodcount == 0 ){
				if ($('#tempSubdivisionVillage1').val().length > 55) {
					resetAlertify();
					alertify.log("Temporary Address: Subdivision/Village is too long", "", 0);
					notgoodcount++;
				}
				}
				
				if ( notgoodcount == 0 ){
				if ($('#tempBarangay1').val().length > 0) {
					if ($('#tempBarangay1').val().length > 45) {
						resetAlertify();
						alertify.log("Temporary Address: Barangay is too long", "", 0);
						notgoodcount++;
					}
				}
				}
				
				if ( notgoodcount == 0 ){
				if ($('#tempMunicipalityCity1').val().length > 0) {
					if ($('#tempMunicipalityCity1').val().length > 45) {
						resetAlertify();
						alertify.log("Temporary Address: Municipality/City is too long", "", 0);
						notgoodcount++;
					}
				}
				else{
					resetAlertify();
					alertify.log("Temporary Address: Municipality/City is required", "", 0);
					notgoodcount++;
				}
				}
				
				if ( notgoodcount == 0 ){
				if ($('#tempProvince1').val().length > 0) {
					if ($('#tempProvince1').val().length > 45) {
						resetAlertify();
						alertify.log("Temporary Address: Province is too long", "", 0);
						notgoodcount++;
					}
				}
				else{
					resetAlertify();
					alertify.log("Temporary Address: Province is required", "", 0);
					notgoodcount++;
				}
				}
				
				if ( notgoodcount == 0 ){
				if ($('#tempZipCode1').val().length > 0) {
					
					if ( $('#tempZipCode1').val() < 0 ){
						resetAlertify();
						alertify.log("Temporary Address: Zip Code can't be negative", "", 0);
						notgoodcount++;
					}
					
				}
				else{
					resetAlertify();
					alertify.log("Temporary Address: Zip Code is required", "", 0);
					notgoodcount++;
				}
				}
				
			}
			
			if ( notgoodcount == 0 ){
			if ($('#permStreet1').val().length > 110) {
					resetAlertify();
					alertify.log("Permanent Address: Street is too long", "", 0);
					notgoodcount++;
			}
			}
			
			if ( notgoodcount == 0 ){
			if ( $('#permHouseNo1').val() < 0 ){
				resetAlertify();
				alertify.log("Permanent Address: House No. can't be negative", "", 0);
				notgoodcount++;
			}
			}
			
			if ( notgoodcount == 0 ){
			if ($('#permSubdivisionVillage1').val().length > 55) {
					resetAlertify();
					alertify.log("Permanent Address: Subdivision/Village is too long", "", 0);
					notgoodcount++;
			}
			}
			
			if ( notgoodcount == 0 ){
			if ($('#permBarangay1').val().length > 0) {
				if ($('#permBarangay1').val().length > 45) {
					resetAlertify();
					alertify.log("Permanent Address: Barangay is too long", "", 0);
					notgoodcount++;
				}
			}
			}
			
			if ( notgoodcount == 0 ){
			if ($('#permMunicipalityCity1').val().length > 0) {
				if ($('#permMunicipalityCity1').val().length > 45) {
					resetAlertify();
					alertify.log("Permanent Address: Municipality/City is too long", "", 0);
					notgoodcount++;
				}
			}
			else{
				resetAlertify();
				alertify.log("Permanent Address: Municipality/City is required", "", 0);
				notgoodcount++;
			}
			}
			
			if ( notgoodcount == 0 ){
			if ($('#permProvince1').val().length > 0) {
				if ($('#permProvince1').val().length > 45) {
					resetAlertify();
					alertify.log("Permanent Address: Province is too long", "", 0);
					notgoodcount++;
				}
			}
			else{
				resetAlertify();
				alertify.log("Permanent Address: Province is required", "", 0);
				notgoodcount++;
			}
			}
			
			if ( notgoodcount == 0 ){
			if ($('#permZipCode1').val().length > 0) {
				
				if ( $('#permZipCode1').val() < 0 ){
					resetAlertify();
					alertify.log("Permanent Address: Zip Code can't be negative", "", 0);
					notgoodcount++;
				}
				
			}
			else{
				resetAlertify();
				alertify.log("Permanent Address: Zip Code is required", "", 0);
				notgoodcount++;
			}
			}
		
		return notgoodcount;
	}
	
	
	$("#form2").submit(function(e){
			var formObj1 = $(this);
			var formURL1 = "../myfunc/new/add_personnel.php?q=submitfamilybackground&id=" + globalvar_personnelID;
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
						resetAlertify();
	 					eval(data);
						$("#form3").submit();
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
	
	function verifyfamilybackground(){
		var notgoodcount = 0;
		
		if ( notgoodcount == 0 ){
		if ( $("#slname1").val().length > 0 ){
			
			if ( notgoodcount == 0 ){
			if ( $("#sfname1").val().length <= 0 ){
				resetAlertify();
				alertify.log("Error found: Please complete spouse's name", "", 0);
				notgoodcount++;
			}
			else if ( $("#sfname1").val().length > 45 ){
				resetAlertify();
				alertify.log("Error found: Spouse's First Name is too long. Please shorten it to less than 45 characters", "", 0);
				notgoodcount++;
			}
			}
			
			if ( notgoodcount == 0 ){
			if ( $("#smname1").val().length > 45 ){
				resetAlertify();
				alertify.log("Error found: Spouse's Middle Name is too long. Please shorten it to less than 45 characters", "", 0);
				notgoodcount++;
			}
			}
			
			if ( notgoodcount == 0 ){
			if ( $("#sename1").val().length > 45 ){
				resetAlertify();
				alertify.log("Error found: Spouse's Extension Name is too long. Please shorten it to less than 45 characters", "", 0);
				notgoodcount++;
			}
			}
			
		}
		else if ( $("#sfname1").val().length > 0 || $("#smname1").val().length > 0 || $("#sename1").val().length > 0 ){
			resetAlertify();
			alertify.log("Error found: Please complete spouse's name", "", 0);
			notgoodcount++;
		}
		}
		
		if ( notgoodcount == 0 ){
		if ( $("#soccupation1").val().length > 40 ){
			resetAlertify();
			alertify.log("Error found: Spouse's occupation is too long. Please shorten it to less than 40 characters", "", 0);
			notgoodcount++;
		}
		}
		
		if ( notgoodcount == 0 ){
		if ( $("#employerbusinessname1").val().length > 40 ){
			resetAlertify();
			alertify.log("Error found: Spouse's Business name is too long. Please shorten it to less than 40 characters", "", 0);
			notgoodcount++;
		}
		}
		
		if ( notgoodcount == 0 ){
		if ( $("#businessaddress1").val().length > 40 ){
			alertify.log("Error found: Spouse's Busine is too long. Please shorten it to less than 40 characters", "", 0);
			resetAlertify();
			notgoodcount++;
		}
		}
		
		if ( notgoodcount == 0 ){
		if ( $("#steleponenumber1").val().length > 40 ){
			resetAlertify();
			alertify.log("Error found: Spouse's Telephone Number is too long. Please shorten it to less than 40 characters", "", 0);
			notgoodcount++;
		}
		}
		
		if ( notgoodcount == 0 ){
		if ( $("#flname1").val().length > 0 ){
			if ( notgoodcount == 0 ){
			if ( $("#ffname1").val().length <= 0 ){
				resetAlertify();
				alertify.log("Error found: Please complete father's name", "", 0);
				notgoodcount++;
			}
			else if ( $("#ffname1").val().length > 45 ){
				resetAlertify();
				alertify.log("Error found: Father's First Name is too long. Please shorten it to less than 45 characters", "", 0);
				notgoodcount++;
			}
			}
			
			if ( notgoodcount == 0 ){
			if ( $("#fmname1").val().length > 45 ){
				resetAlertify();
				alertify.log("Error found: Father's Middle Name is too long. Please shorten it to less than 45 characters", "", 0);
				notgoodcount++;
			}
			}
			
			if ( notgoodcount == 0 ){
			if ( $("#fename1").val().length > 45 ){
				resetAlertify();
				alertify.log("Error found: Father's Extension Name is too long. Please shorten it to less than 45 characters", "", 0);
				notgoodcount++;
			}
			}
			
		}
		else if ( $("#ffname1").val().length > 0 || $("#fmname1").val().length > 0 || $("#fename1").val().length > 0 ){
			resetAlertify();
			alertify.log("Error found: Please complete father's name", "", 0);
			notgoodcount++;
		}
		}
		
		if ( notgoodcount == 0 ){
		if ( new Date($('#fbirthdate1').val()) >= new Date() ){
			resetAlertify();
			alertify.log("Error found: Father's Birthday can't be later than today", "", 0);
			notgoodcount++;
		}
		}
		
		if ( notgoodcount == 0 ){
		if ( $("#foccupation1").val().length > 45 ){
			resetAlertify();
			alertify.log("Error found: Father's occupation is too long. Please shorten it to less than 45 characters", "", 0);
			notgoodcount++;
		}
		}
		
		if ( notgoodcount == 0 ){
		if ( $("#mlname1").val().length > 0 ){
			if ( notgoodcount == 0 ){
			if ( $("#mfname1").val().length <= 0 || $("#mmaidenname1").val().length <= 0 ){
				resetAlertify();
				alertify.log("Error found: Please complete mother's name", "", 0);
				notgoodcount++;
			}
			else if ( $("#mfname1").val().length > 45 ){
				resetAlertify();
				alertify.log("Error found: Mother's First Name is too long. Please shorten it to less than 45 characters", "", 0);
				notgoodcount++;
			}
			else if ( $("#mmaidenname1").val().length > 45 ){
				resetAlertify();
				alertify.log("Error found: Mother's Maiden Name is too long. Please shorten it to less than 45 characters", "", 0);
				notgoodcount++;
			}
			}
			
			if ( notgoodcount == 0 ){
			if ( $("#mmname1").val().length > 45 ){
				resetAlertify();
				alertify.log("Error found: Mother's Middle Name is too long. Please shorten it to less than 45 characters", "", 0);
				notgoodcount++;
			}
			}
			
			
		}
		else if ( $("#mmaidenname1").val().length > 0 || $("#mfname1").val().length > 0 || $("#mmname1").val().length > 0 ){
			resetAlertify();
			alertify.log("Error found: Please complete Mother's name", "", 0);
			notgoodcount++;
		}
		}
		
		if ( notgoodcount == 0 ){
		if ( new Date($('#mbirthdate1').val()) >= new Date() ){
			resetAlertify();
			alertify.log("Error found: Mother's Birthday can't be later than today", "", 0);
			notgoodcount++;
		}
		}
		
		if ( notgoodcount == 0 ){
		if ( $("#moccupation1").val().length > 45 ){
			resetAlertify();
			alertify.log("Error found: Mother's occupation is too long. Please shorten it to less than 45 characters", "", 0);
			notgoodcount++;
		}
		}
		
		if ( notgoodcount == 0 ){
		if ( $("#childrenname1").val().length <= 0 ){
			resetAlertify();
			alertify.log("Error found: Chidlren name is required.", "", 0);
			notgoodcount++;
		}
		else if ( $("#childrenname1").val().length > 45 ){
			resetAlertify();
			alertify.log("Error found: Chidlren name is too long. Please make sure it is less than 45 characters.", "", 0);
			notgoodcount++;
		}
		}
		
		if ( notgoodcount == 0 ){
		if ( $("#childrenbday1").val().length <= 0 ){
			resetAlertify();
			alertify.log("Error found: Children Birthday is required.", "", 0);
			notgoodcount++;
		}
		else if ( new Date($("#childrenbday1").val()) > new Date() ){
			resetAlertify();
			alertify.log("Error found: Children Birthday is required.", "", 0);
			notgoodcount++;
		}
		}
		
		return notgoodcount;
	}
	
	
	$("#form3").submit(function(e){
			var formObj1 = $(this);
			var formURL1 = "../myfunc/new/add_personnel.php?q=submiteducationalbackground&id=" + globalvar_personnelID;
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
						resetAlertify();
	 					eval(data);
						$("#submitButton8").prop("disabled", false);
						alertify.success("Success.");
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
	function verifyeducationalbackground(){
		var notgoodcount = 0;
		
		if ($('#elementary2').val().length > 0) {
			if ($('#elementary2').val().length > 110) {
				resetAlertify();
				alertify.log("Elementary: School Name is too long", "", 0);
				notgoodcount++;
			}
		}
		
		if ( notgoodcount == 0 ){
		if ( $('#elementaryFrom2').val() < 0 ){
			resetAlertify();
			alertify.log("Elementary: From Academic year can't be negative", "", 0);
			notgoodcount++;
		}
		else if ( $('#elementaryFrom2').val() < 1000 && $('#elementaryFrom2').val() > 0 ){
			resetAlertify();
			alertify.log("Elementary: From Academic year can't be lower than a thousand digit", "", 0);
			notgoodcount++;
		}
		else if ( $('#elementaryFrom2').val() > 9999 ){
			resetAlertify();
			alertify.log("Elementary: From Academic year can't be higher than a thousand digit", "", 0);
			notgoodcount++;
		}
		}
		
		if ( notgoodcount == 0 ){
		if ( $('#elementaryTo2').val() < 0 ){
			resetAlertify();
			alertify.log("Elementary: To Academic year can't be negative", "", 0);
			notgoodcount++;
		}
		else if ( $('#elementaryTo2').val() < 1000 && $('#elementaryTo2').val() > 0 ){
			resetAlertify();
			alertify.log("Elementary: To Academic year can't be lower than a thousand digit", "", 0);
			notgoodcount++;
		}
		else if ( $('#elementaryTo2').val() > 9999 ){
			resetAlertify();
			alertify.log("Elementary: To Academic year can't be higher than a thousand digit", "", 0);
			notgoodcount++;
		}
		}
		
		if ( notgoodcount == 0 ){
		if ( $('#elementaryFrom2').val() !== "" && $('#elementaryTo2').val() !== "" ){
			if ( $('#elementaryFrom2').val() > $('#elementaryTo2').val() ){
				resetAlertify();
				alertify.log("Elementary: From Academic year can't be higher than the Elementary: To Academic year", "", 0);
				notgoodcount++;
			}
			else if ( $('#elementaryFrom2').val() == $('#elementaryTo2').val() ){
				resetAlertify();
				alertify.log("Elementary: From Academic year can't be the same as the Elementary: To Academic year", "", 0);
				notgoodcount++;
			}
		}
		}
		
		if ( notgoodcount == 0 ){
		if ($('#highSchool2').val().length > 45) {
			resetAlertify();
			alertify.log("High School: School Name is too long", "", 0);
			notgoodcount++;
		}
		}
		
		if ( notgoodcount == 0 ){
		if ( $('#highSchoolFrom2').val() === "" && $('#highSchoolTo2').val() !== "" ){
			resetAlertify();
			alertify.log("High School: To Academic year is together with From Academic year", "", 0);
			notgoodcount++;
		}
		else if ( $('#highSchoolFrom2').val() !== "" && $('#highSchoolTo2').val() === "" ){
			resetAlertify();
			alertify.log("High School: From Academic year is together with To Academic year", "", 0);
			notgoodcount++;
		}
		else if ( $('#highSchoolFrom2').val() !== "" && $('#highSchoolTo2').val() !== "" ){
			if ( $('#highSchoolFrom2').val() === "" ){
				resetAlertify();
				alertify.log("High School: From Academic year is required", "", 0);
				notgoodcount++;
			}
			else if ( $('#highSchoolFrom2').val() < 0 ){
				resetAlertify();
				alertify.log("High School: From Academic year can't be negative", "", 0);
				notgoodcount++;
			}
			else if ( $('#highSchoolFrom2').val() < 1000 && $('#highSchoolFrom2').val() > 0 ){
				resetAlertify();
				alertify.log("High School: From Academic year can't be lower than a thousand digit", "", 0);
				notgoodcount++;
			}
			else if ( $('#highSchoolFrom2').val() > 9999 ){
				resetAlertify();
				alertify.log("High School: From Academic year can't be higher than a thousand digit", "", 0);
				notgoodcount++;
			}
			
			if ( $('#highSchoolTo2').val() === "" ){
				resetAlertify();
				alertify.log("High School: To Academic year is required", "", 0);
				notgoodcount++;
			}
			else if ( $('#highSchoolTo2').val() < 0 ){
				resetAlertify();
				alertify.log("High School: To Academic year can't be negative", "", 0);
				notgoodcount++;
			}
			else if ( $('#highSchoolTo2').val() < 1000 && $('#highSchoolTo2').val() > 0 ){
				resetAlertify();
				alertify.log("High School: To Academic year can't be lower than a thousand digit", "", 0);
				notgoodcount++;
			}
			else if ( $('#highSchoolTo2').val() > 9999 ){
				resetAlertify();
				alertify.log("High School: To Academic year can't be higher than a thousand digit", "", 0);
				notgoodcount++;
			}
			
			if ( $('#highSchoolFrom2').val() > $('#highSchoolTo2').val() ){
			resetAlertify();
			alertify.log("High School: From Academic year can't be higher than the High School: To Academic year", "", 0);
			notgoodcount++;
			}
			else if ( $('#highSchoolFrom2').val() == $('#highSchoolTo2').val() ){
				resetAlertify();
				alertify.log("High School: From Academic year can't be the same as the High School: To Academic year", "", 0);
				notgoodcount++;
			}
		}
		}
		
		if ( notgoodcount == 0 ){
		if ($('#vocational_school_name1').val().length > 0) {
			if ($('#vocational_school_name1').val().length > 45) {
				resetAlertify();
				alertify.log("Vocational: School Name is too long", "", 0);
				notgoodcount++;
			}
		}
		}
		
		if ( notgoodcount == 0 ){
		if ($('#vocational_course1').val().length > 0) {
			if ($('#vocational_course1').val().length > 45) {
				resetAlertify();
				alertify.log("Vocational: Course is too long", "", 0);
				notgoodcount++;
			}
		}
		}
		
		if ( notgoodcount == 0 ){
		if ( $('#vocational_academic_yrfr').val() < 0 ){
			resetAlertify();
			alertify.log("Vocational: From Academic year can't be negative", "", 0);
			notgoodcount++;
		}
		else if ( $('#vocational_academic_yrft').val() < 1000 && $('#vocational_academic_yrft').val() > 0 ){
			resetAlertify();
			alertify.log("Vocational: From Academic year can't be lower than a thousand digit", "", 0);
			notgoodcount++;
		}
		else if ( $('#vocational_academic_yrft').val() > 9999 ){
			resetAlertify();
			alertify.log("Vocational: From Academic year can't be higher than a thousand digit", "", 0);
			notgoodcount++;
		}
		}
		
		if ( notgoodcount == 0 ){
		if ( $('#vocational_academic_yrto').val() < 0 ){
			resetAlertify();
			alertify.log("Vocational: To Academic year can't be negative", "", 0);
			notgoodcount++;
		}
		else if ( $('#vocational_academic_yrto').val() < 1000 && $('#vocational_academic_yrto').val() > 0 ){
			resetAlertify();
			alertify.log("Vocational: To Academic year can't be lower than a thousand digit", "", 0);
			notgoodcount++;
		}
		else if ( $('#vocational_academic_yrto').val() > 9999 ){
			resetAlertify();
			alertify.log("Vocational: To Academic year can't be higher than a thousand digit", "", 0);
			notgoodcount++;
		}
		}
		
		if ( notgoodcount == 0 ){
		if ( $('#vocational_academic_yrft').val() !== "" && $('#vocational_academic_yrto').val() !== "" ){
			if ( $('#vocational_academic_yrfr').val() > $('#vocational_academic_yrto').val() ){
				resetAlertify();
				alertify.log("Elementary: From Academic year can't be higher than the Elementary: To Academic year", "", 0);
				notgoodcount++;
			}
			else if ( $('#vocational_academic_yrfr').val() == $('#vocational_academic_yrto').val() ){
				resetAlertify();
				alertify.log("Elementary: From Academic year can't be the same as the Elementary: To Academic year", "", 0);
				notgoodcount++;
			}
		}
		}
		
		if ( notgoodcount == 0 ){
		if ($('#college2').val().length > 110) {
			resetAlertify();
			alertify.log("College: School Name is too long", "", 0);
			notgoodcount++;
		}
		}
		
		if ( notgoodcount == 0 ){
		if ($('#collegeDegree2').val().length > 55) {
			resetAlertify();
			alertify.log("College: Degree is too long", "", 0);
			notgoodcount++;
		}
		}
		
		if ( notgoodcount == 0 ){		
		if ( $('#collegeFrom2').val() === "" && $('#collegeTo2').val() !== "" ){
			resetAlertify();
			alertify.log("College: To Academic year is together with From Academic year", "", 0);
			notgoodcount++;
		}
		else if ( $('#collegeFrom2').val() !== "" && $('#collegeTo2').val() === "" ){
			resetAlertify();
			alertify.log("College: From Academic year is together with To Academic year", "", 0);
			notgoodcount++;
		}
		else if ( $('#collegeFrom2').val() !== "" && $('#collegeTo2').val() !== "" ){
			if ( $('#collegeFrom2').val() === "" ){
				resetAlertify();
				alertify.log("College: From Academic year is required", "", 0);
				notgoodcount++;
			}
			else if ( $('#collegeFrom2').val() < 0 ){
				resetAlertify();
				alertify.log("College: From Academic year can't be negative", "", 0);
				notgoodcount++;
			}
			else if ( $('#collegeFrom2').val() < 1000 && $('#collegeFrom2').val() > 0 ){
				resetAlertify();
				alertify.log("College: From Academic year can't be lower than a thousand digit", "", 0);
				notgoodcount++;
			}
			else if ( $('#collegeFrom2').val() > 9999 ){
				resetAlertify();
				alertify.log("College: From Academic year can't be higher than a thousand digit", "", 0);
				notgoodcount++;
			}
					
			if ( $('#collegeTo2').val() === "" ){
				resetAlertify();
				alertify.log("College: To Academic year is required", "", 0);
				notgoodcount++;
			}
			else if ( $('#collegeTo2').val() < 0 ){
				resetAlertify();
				alertify.log("College: To Academic year can't be negative", "", 0);
				notgoodcount++;
			}
			else if ( $('#collegeTo2').val() < 1000 && $('#collegeTo2').val() > 0 ){
				resetAlertify();
				alertify.log("College: To Academic year can't be lower than a thousand digit", "", 0);
				notgoodcount++;
			}
			else if ( $('#collegeTo2').val() > 9999 ){
				resetAlertify();
				alertify.log("College: To Academic year can't be higher than a thousand digit", "", 0);
				notgoodcount++;
			}
					
			if ( $('#collegeFrom2').val() > $('#collegeTo2').val() ){
				resetAlertify();
				alertify.log("College: From Academic year can't be higher than the College: To Academic year", "", 0);
				notgoodcount++;
			}
			else if ( $('#collegeFrom2').val() == $('#collegeTo2').val() ){
				resetAlertify();
				alertify.log("College: From Academic year can't be the same as the College: To Academic year", "", 0);
				notgoodcount++;
			}
		}
		
		if ( notgoodcount == 0 ){
		if ($('#gradStud_school1').val().length > 0) {
			if ($('#gradStud_school1').val().length > 45) {
				resetAlertify();
				alertify.log("Gradute School: School Name is too long", "", 0);
				notgoodcount++;
			}
		}
		}
		
		if ( notgoodcount == 0 ){
		if ($('#gradStud_course1').val().length > 0) {
			if ($('#gradStud_course1').val().length > 45) {
				resetAlertify();
				alertify.log("Graduate School: Course is too long", "", 0);
				notgoodcount++;
			}
		}
		}
		
		if ( notgoodcount == 0 ){
		if ( $('#gradStud_yrfr').val() < 0 ){
			resetAlertify();
			alertify.log("Graduate School: From Academic year can't be negative", "", 0);
			notgoodcount++;
		}
		else if ( $('#gradStud_yrfr').val() < 1000 && $('#gradStud_yrfr').val() > 0 ){
			resetAlertify();
			alertify.log("Graduate School: From Academic year can't be lower than a thousand digit", "", 0);
			notgoodcount++;
		}
		else if ( $('#gradStud_yrfr').val() > 9999 ){
			resetAlertify();
			alertify.log("Graduate School: From Academic year can't be higher than a thousand digit", "", 0);
			notgoodcount++;
		}
		}
		
		if ( notgoodcount == 0 ){
		if ( $('#gradStud_yrto').val() < 0 ){
			resetAlertify();
			alertify.log("Graduate School: To Academic year can't be negative", "", 0);
			notgoodcount++;
		}
		else if ( $('#gradStud_yrto').val() < 1000 && $('#gradStud_yrto').val() > 0 ){
			resetAlertify();
			alertify.log("Graduate School: To Academic year can't be lower than a thousand digit", "", 0);
			notgoodcount++;
		}
		else if ( $('#gradStud_yrto').val() > 9999 ){
			resetAlertify();
			alertify.log("Graduate School: To Academic year can't be higher than a thousand digit", "", 0);
			notgoodcount++;
		}
		}
		
		if ( notgoodcount == 0 ){
		if ( $('#gradStud_yrfr').val() !== "" && $('#gradStud_yrto').val() !== "" ){
			if ( $('#gradStud_yrfr').val() > $('#gradStud_yrto').val() ){
				resetAlertify();
				alertify.log("Graduate School: From Academic year can't be higher than the Graduate School To Academic year", "", 0);
				notgoodcount++;
			}
			else if ( $('#gradStud_yrfr').val() == $('#gradStud_yrto').val() ){
				resetAlertify();
				alertify.log("Graduate School: From Academic year can't be the same as the Graduate School To Academic year", "", 0);
				notgoodcount++;
			}
		}
		}
		
		}
		
		if ( notgoodcount == 0 ){		
		if ($('#honor_or_award1').val().length > 220) {
			resetAlertify();
			alertify.log("Honor or Award is too long", "", 0);
			notgoodcount++;
		}
		}
		
		if ( notgoodcount == 0 ){		
		if ($('#highest_units1').val() < 0) {
			resetAlertify();
			alertify.log("Highest Units cannot be negative", "", 0);
			notgoodcount++;
		}
		}
		
		
		if ( notgoodcount == 0 ){		
		if ($('#affiliations1').val().length > 110) {
			resetAlertify();
			alertify.log("Affiliation is too long", "", 0);
			notgoodcount++;
		}
		}
		
		return notgoodcount;
	}
	
	
	$("#form4").submit(function(e){
			var formObj1 = $(this);
			var formURL1 = "../myfunc/new/edit_profile.php?q=submitworkexperience&id=" + globalvar_personnelID;
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
						resetAlertify();
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
	
	function verifyworkexperience(){
		var notgoodcount = 0;
		
		if ( notgoodcount == 0 ){
		if ( $('#we_date_from1').val().length <= 0 ){
			resetAlertify();
			alertify.log("Error found: Please complete the form", "", 0);
			notgoodcount++;
		}
		else if ( $('#we_date_to1').val().length <= 0 ){
			resetAlertify();
			alertify.log("Error found: Please complete the form", "", 0);
			notgoodcount++;
		}
		else if ( $('#we_date_from1').val() > $('#we_date_to1').val() ){
			resetAlertify();
			alertify.log("Error found: From date cannot be later than To date", "", 0);
			notgoodcount++;
		}
		}
		
		if ( notgoodcount == 0 ){
		if ( $('#we_position1').val().length <= 0 ){
			resetAlertify();
			alertify.log("Error found: Please complete the form", "", 0);
			notgoodcount++;
		}
		else if ( $('#we_position1').val().length > 55 ){
			resetAlertify();
			alertify.log("Error found: Position is too long. Please make sure it is less than 55 characters", "", 0);
			notgoodcount++;
		}
		}
		
		if ( notgoodcount == 0 ){
		if ( $('#company1').val().length <= 0 ){
			resetAlertify();
			alertify.log("Error found: Please complete the form", "", 0);
			notgoodcount++;
		}
		else if ( $('#company1').val().length > 100 ){
			resetAlertify();
			alertify.log("Error found: Agency/Company is too long. Please make sure it is less than 100 characters", "", 0);
			notgoodcount++;
		}
		}
		
		return notgoodcount;
	}
	
	$("#form5").submit(function(e){
			var formObj1 = $(this);
			var formURL1 = "../myfunc/new/edit_profile.php?q=submittrainingsattended&id=" + globalvar_personnelID;
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
						resetAlertify();
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
	
	function verifytrainingsattended(){
		var notgoodcount = 0;
		
		if ( notgoodcount == 0 ){
		if ( $('#training_title1').val().length <= 0 ){
			resetAlertify();
			alertify.log("Error found: Please complete the form", "", 0);
			notgoodcount++;
		}
		else if( $('#training_title1').val().length > 110 ){
			resetAlertify();
			alertify.log("Error found: Training Title too long. Please make sure it is less than 110 characters.", "", 0);
			notgoodcount++;
		}
		}
		
		if ( notgoodcount == 0 ){
		if ( $('#location1').val().length <= 0 ){
			resetAlertify();
			alertify.log("Error found: Please complete the form", "", 0);
			notgoodcount++;
		}
		else if( $('#location1').val().length > 45 ){
			resetAlertify();
			alertify.log("Error found: Location too long. Please make sure it is less than 45 characters.", "", 0);
			notgoodcount++;
		} 	
		}
		
		if ( notgoodcount == 0 ){
		if ( $('#date_start1').val().length <= 0 ){
			resetAlertify();
			alertify.log("Error found: Please complete the form", "", 0);
			notgoodcount++;
		}
		}
		
		if ( notgoodcount == 0 ){
		if ( $('#date_finish1').val().length <= 0 ){
			resetAlertify();
			alertify.log("Error found: Please complete the form", "", 0);
			notgoodcount++;
		}
		}
		
		if ( notgoodcount == 0 ){
		if ( new Date($('#date_start1').val()) > new Date($('#date_finish1').val()) ){
			resetAlertify();
			alertify.log("Error found: Date Start cannot be greater than date finish", "", 0);
			notgoodcount++;
		}
		}
		
		if ( notgoodcount == 0 ){
		if ( $('#no_of_hours1').val().length <= 0 ){
			resetAlertify();
			alertify.log("Error found: Please complete the form", "", 0);
			notgoodcount++;
		}
		else if ( $('#no_of_hours1').val() <= 0 ){
			resetAlertify();
			alertify.log("Error found: Number of hours cannot be negative", "", 0);
			notgoodcount++;
		}
		}
		
		if ( notgoodcount == 0 ){
		if ( $('#conducted_by1').val().length <= 0 ){
			resetAlertify();
			alertify.log("Error found: Please complete the form", "", 0);
			notgoodcount++;
		}
		else if ( $('#conducted_by1').val().length > 45 ){
			resetAlertify();
			alertify.log("Error found: Sponsor By is too long. Please make sure it is less than 45 characters", "", 0);
			notgoodcount++;
		}
		}
		
		
		return notgoodcount;
	}
	
	
	$("#form6").submit(function(e){
			var formObj1 = $(this);
			var formURL1 = "../myfunc/new/add_personnel.php?q=submitemploymentrecord&id=" + globalvar_personnelID + "&job=" + $('#jobTitle1').val() + "&dept=" + $('#department1').val() ;
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
						resetAlertify();
	 					eval(data);
						$("#form2").submit();
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
	
	function verifyemploymentrecord(){
		var notgoodcount = 0;
		
		if ( notgoodcount == 0 ){
		if ( $('#complete_item_no1').val().length <= 0 ){
			resetAlertify();
			alertify.log("Error found: Complete item number is required", "", 0);
			notgoodcount++;
		}
		else if ( $('#complete_item_no1').val().length > 45 ){
			resetAlertify();
			alertify.log("Error found: Complete item number is too long. Please make sure it is less than 45 characters.", "", 0);
			notgoodcount++;
		}
		}
		
		if ( notgoodcount == 0 ){
		if ( $('#work_stat1').val() == "" || $('#work_stat1').val() == null ){
			resetAlertify();
			alertify.log("Error found: Work Status is required", "", 0);
			notgoodcount++;
		}
		}
		
		if ( notgoodcount == 0 ){
		if ( $('#role_type1').val() == "" || $('#work_stat1').val() == null ){
			resetAlertify();
			alertify.log("Error found: Work Status is required", "", 0);
			notgoodcount++;
		}
		}
		
		if ( notgoodcount == 0 ){
		if ( $('#emp_status1').val() == "" || $('#work_stat1').val() == null ){
			resetAlertify();
			alertify.log("Error found: Work Status is required", "", 0);
			notgoodcount++;
		}
		}
		
		if ( notgoodcount == 0 ){
		if ( $('#date_joined1').val().length <= 0 ){
			resetAlertify();
			alertify.log("Error found: Date Joined is required", "", 0);
			notgoodcount++;
		}
		}
		
		if ( notgoodcount == 0 ){
		if ( $('#div_code1').val().length <= 0 ){
			resetAlertify();
			alertify.log("Error found: Division Code is required", "", 0);
			notgoodcount++;
		}
		else if ( $('#div_code1').val() < 0 ){
			resetAlertify();
			alertify.log("Error found: Division Code cannot be negative", "", 0);
			notgoodcount++;
		}
		}
		
		if ( notgoodcount == 0 ){
		if ( $('#biometric_ID1').val().length <= 0 ){
			resetAlertify();
			alertify.log("Error found: Biometric ID is required", "", 0);
			notgoodcount++;
		}
		else if ( $('#biometric_ID1').val().length > 45 ){
			resetAlertify();
			alertify.log("Error found: Biometric ID is too long. Make sure it is less than 45 characters", "", 0);
			notgoodcount++;
		}
		}
		
		if ( notgoodcount == 0 ){
		if ( $('#school_ID1').val().length <= 0 ){
			resetAlertify();
			alertify.log("Error found: School ID is required", "", 0);
			notgoodcount++;
		}
		else if ( $('#school_ID1').val() < 0 ){
			resetAlertify();
			alertify.log("Error found: School ID cannot be negative", "", 0);
			notgoodcount++;
		}
		}
		
		if ( notgoodcount == 0 ){
		if ( $('#appointment_date1').val().length <= 0 ){
			resetAlertify();
			alertify.log("Error found: Appointment Date is required", "", 0);
			notgoodcount++;
		}
		}
		
		return notgoodcount;
	}
	
	
	$("#form7").submit(function(e){
			var formObj1 = $(this);
			var formURL1 = "../myfunc/new/edit_profile.php?q=submitform7&id=" + globalvar_personnelID;
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
						resetAlertify();
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
	
	function verifyform7(){
		var notgoodcount = 0;
		
		if ( notgoodcount == 0 ){
		if ( $('#jobTitle1').val().length < 0 ){
			resetAlertify();
			alertify.log("Error found: Job Title is required", "", 0);
			notgoodcount++;
		}
		}
		
		return notgoodcount;
	}
	
	function submitallforms(){
		$("#submitButton8").prop("disabled", true);
		var vat1 = 0;
		var1 = verifypersonalinformation();
		if ( var1 == 0 ) var1 = verifypersonalinformation();
		if ( var1 == 0 ) var1 = verifyemploymentrecord();
		if ( var1 == 0 ) var1 = verifyfamilybackground();
		if ( var1 == 0 ) var1 = verifyeducationalbackground();
		if ( var1 == 0 ){
			resetAlertify();
			alertify.log("Please wait. While processing your request. This shouldn't take long.");
			$("#form1").submit();
		}
		$("#submitButton8").prop("disabled", false);
	}
	