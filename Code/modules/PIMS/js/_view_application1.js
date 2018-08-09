		var onProcess = 0;
		
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
		
		function clickMessage(id){
			window.open('../messaging/chatroom.php?id=' + id , '_blank');
		}
		
		function clickApproved(id){
			if ( onProcess == 0 ){
				onProcess = 1;
				$('#approvedButton').prop("disabled",true);
				resetAlertify();
							
				alertify.set({ labels: {
					ok     : "Yes",
					cancel : "No"
				} });
				alertify.set({ buttonReverse: true });
							
				alertify.confirm("Are you sure you will approve this leave?", function (e) {
					if (e) {
									
						$.ajax({
	     					url: '../myfunc/view_application2.php',
							type: 'GET',
	        				data:  "id=" + id + "&o=1",
	    					contentType: false,
	        				cache: false,
	        				processData:false,
	    					success: function(data, textStatus, jqXHR)
	    						{	
	 								eval(data);
										$.ajax({
					     					url: '../myfunc/CronJob/CronJob2.php',
					    					contentType: false,
					        				cache: false,
					        				processData:false          
					    				});
	    						},
	    					error: function(jqXHR, textStatus, errorThrown) 
	    						{	
									resetAlertify();
									alertify.error(jqXHR);
	     						}          
	    				});
									
					} else {
									
						resetAlertify();
						alertify.error("Cancelled");
						$('#approvedButton').prop("disabled",false);
						onProcess = 0;
					}
				});
			}
		}
		
		function clickDisapproved(id){
			if ( onProcess == 0 ){
				onProcess = 1;
				$('#disapprovedButton').prop("disabled",true);
				resetAlertify();
							
				alertify.set({ labels: {
					ok     : "Yes",
					cancel : "No"
				} });
				alertify.set({ buttonReverse: true });
							
				alertify.confirm("Are you sure you will disapprove this leave?", function (e) {
					if (e) {
									
						$.ajax({
	     					url: '../myfunc/view_application2.php',
							type: 'GET',
	        				data:  "id=" + id + "&o=2",
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
									
					} else {
									
						resetAlertify();
						alertify.error("Cancelled");
						$('#disapprovedButton').prop("disabled",false);
						onProcess = 0;
					}
				});
			}
		}