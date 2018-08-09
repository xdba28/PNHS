		function resetAlertify() {
			$("#toggleCSS").attr("href", "myfunc/alertify.js-0.3.11/themes/alertify.default.css");
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
		
		function loginnow1(){
			var error = 0;
			$('#submitButton1').prop('disabled', true);
			if ( $('[name=username]').val() == "" ){
				resetAlertify();
				alertify.error("Username is blank");
				error++;
			}
			
			if ( $('[name=password]').val() == "" ){
				resetAlertify();
				alertify.error("Password is blank");
				error++;
			}
			
			if ( error == 0 ){
				loginnow2();
			}
			else{
				$('#submitButton1').prop('disabled', false);
			}
		}
	
		function loginnow2(){
			$("#form1").submit(function(e){
						var formObj1 = $(this);
						var formURL1 = "myfunc/login1.php";
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
	 								if ( data == "failed" ){
										resetAlertify();
										alertify.error("Invalid username or password. Please try again");
									}
									else{
										resetAlertify();
										alertify.success("Successfully logged in.<br />Welcome back <b>" + data + "</b><br />Redirecting within seconds");
										setTimeout(function() {
											window.location.href = "index.html";
										}, 3000);
									}
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