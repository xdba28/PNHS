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
	
	function leaveOnClickDetails(id){
		resetAlertify();
							
		alertify.set({ labels: {
			ok     : "Close",
			cancel : "Cancel Request"
		} });
							
		$.ajax({
				url: '../myfunc/leave_history2.php?id=' + id,
				success: function(data){
						eval(data);
				}
					
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
	
	$(document).ready(function() {
		$('#dataTables-example').DataTable({
			responsive: true
		});
	});