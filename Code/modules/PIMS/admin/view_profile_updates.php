<?php
    session_start();
    error_reporting(0);
    include("../myfunc/session2.php");
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'include/header2.php';?>

<body>

<?php include 'include/topnav.php';?>


<?php include 'include/sidenav.php';?>

<br><br><br><br>

    <div id="wrapper" style="margin-left: 60px;">
        
        <div class="container">
                    <div class="col-lg-11">
                        <div class="panel-heading">
                        <center><h3>UPDATING PERSONNEL INFORMATION</h3></center>
                        </div>

			<div class="row">
			<div>
			<div class="panel-body">
                <div class="row">
                            
                    <div class="panel-body">
                            

                    <div class="col-lg-4">
                        <div class="pic-holder" id = "picHolder1">
                            <img id = "img1" src = "" alt = "Pic" style='height: 257px; width: 242px;'>
                        </div><br>
                        <label>PERSONNEL: <span id = "span1"></span></label><br>
						<label>UPDATE PROFILE STATUS:</label> <span id = "spanStatus1"></span><br><br>
						<span id = "spanButtons1"></span><br><br>
                    </div>

                    <div class="col-lg-4" > 
						<div class="panel-outline panel-primary">
						<div class="panel-heading" >CURRENT PERSONNEL DETAILS</div>
						<div class="panel-body" id = "appendhere2" >
						</div>
						</div>
                    </div>
					<div class="col-lg-4"> 
						<div class="panel-outline panel-green">
						<div class="panel-heading" >UPDATED INFORMATION</div>
						<div class="panel-body" id = "appendhere">
						</div>
						</div>
                    </div>
                    </div>
                </div>
			</div>
			</div>
			</div>


    </div>
    </div>
    </div>
    </div>
    </div>
<div id="wrapper">
<?php include 'include/footer.php';?>
</div>
    <!--
    <script>
    $.sidebarMenu($('.sidebar-menu'))
    </script>
	-->

    <script>
    // tooltip 
    $('.tooltip').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })
    </script>
 

	<script>
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
			window.open('../messaging/chatroom.php?id='+id , '_blank' );
		}
		
		function viewDetails(id){
			$.ajax({
	     		url: '../myfunc/profile_updates2v2.php?id=' + id,
	    		contentType: false,
	        	cache: false,
	        	processData:false,
	    		success: function(data, textStatus, jqXHR)
	    			{	
	 					$('#appendhere').html(data);
	    			},
	    		error: function(jqXHR, textStatus, errorThrown) 
	    			{	
						resetAlertify();
						alertify.error(jqXHR);
	     			}          
	    	});
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
								
				alertify.confirm("Are you sure to <font color = 'green'>Approve</font> this profile update request and apply changes?", function (e) {
					if (e) {
						$.ajax({
				     		url: '../myfunc/approvalProfileUpdates.php?id=' + id + '&s=1',
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
					}else{
						resetAlertify();
						alertify.error("Cancelled");
						$('#approvedButton').prop("disabled",true);
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
								
				alertify.confirm("Are you sure to <font color = 'red'>Disapprove</font> this profile update request?", function (e) {
					if (e) {
						$.ajax({
				     		url: '../myfunc/approvalProfileUpdates.php?id=' + id + '&s=2',
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
									$('#disapprovedButton').prop("disabled",false);
									onProcess = 0;
				     			}          
				    	});
					}else{
						resetAlertify();
						alertify.error("Cancelled");
					}
				});
			}
		}
	</script>
    <script  src="../js/index.js"></script>
</body>
	<!------- ALL PHP CUSTOMS HERE ONLY ------->
		<?php
			include("../myfunc/view_profile_updates1.php");
		?>
	<!----------------------------------------->
</html>
