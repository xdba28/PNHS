	var countCredits = 0;
	
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
	
	function updateCreditCount(){
		$.ajax({
	     	url: '../myfunc/leaveCreditsCount1.php',
	    	contentType: false,
	        cache: false,
	        processData:false,
	    	success: function(data, textStatus, jqXHR)
	    		{	
					if ( data != countCredits ){
						$('#number1').text(data);
						countCredits = data;
					}
					setTimeout(updateCreditCount, 1000)
	    		},
	    	error: function(jqXHR, textStatus, errorThrown) 
	    		{	
					resetAlertify();
					alertify.error(jqXHR);
	     		}          
	    });
	}
	
	function formSubmit1(id){

		/*$.ajax({
				url: '../myfunc/leave_apply2.php?id=' + id,
				success: function(data){
						if( data == "true" ){
							formSubmit1_1(id);
						}
						else{
							resetAlertify();
							alertify.alert( data + ". Please check it out at the leave history page.");
						}
					}
					
			});
		*/
		formSubmit1_1(id);
	}
	
	function formSubmit1_1(id){
		
		var timeCheck1 = 0;
		var check = 0;
		
		if ( $('#startOfLeave1').val() == "" ){
			resetAlertify();
			alertify.log("Your start of leave may be empty or invalid", "", 0);
			timeCheck1++;
			check++;
		}
		
		if ( $('#timeOfReturn1').val() == "" ){
			resetAlertify();
			alertify.log("Your end of leave may be empty or invalid", "", 0);
			timeCheck1++;
			check++;
		}
		
		if ( timeCheck1 == 0 ){
			var sol = new Date($('#startOfLeave1').val());
			var tor = new Date($('#timeOfReturn1').val());
			
			if ( sol.getTime() === tor.getTime() ){
				resetAlertify();
				alertify.log("Your start of leave can't be the same as your end of leave", "", 0);
				check++;
			}
			
			if ( sol.getTime() > tor.getTime() ){
				resetAlertify();
				alertify.log("Your start of leave can't be later than your end of leave", "", 0);
				check++;
			}
		}
		
		if ( $('input[name=type1]:checked').val() == null ){
			resetAlertify();
			alertify.log("Please select whether for Personal or Official Leave", "", 0);
			check++;
		}
		
		if ($('#placeToBeVisited1').val().length > 110) {
					resetAlertify();
					alertify.log("Place to be Visited is too long", "", 0);
					run = 0;
		}
		
		if ( check == 0 ){
			formSubmit1_2(id);
		}
		
	}
	
	function formSubmit1_2(id){
			$('#submitButton1').prop('disabled', true);
			resetAlertify();
			alertify.log("Please wait. While processing your request. This shouldn't take long.");
			
			$("#form1").submit(function(e){
						var formObj1 = $(this);
						var formURL1 = "../myfunc/leave_apply3.php?id=" + id;
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
									$('#submitButton1').prop('disabled', false);
									resetAlertify();
	 								eval(data);
	    						},
	    					error: function(jqXHR, textStatus, errorThrown) 
	    						{	
									$('#submitButton1').prop('disabled', false);
									resetAlertify();
									alertify.error(jqXHR);
	     						}          
	    				});
	    				e.preventDefault(); //Prevent Default action. 
	    				e.unbind();
					}); 
					
			
			$("#form1").submit();
	}
	
	
	