<?php
	session_start();
	include("../myfunc/session1.php");
?>
	

<!DOCTYPE html>
<html lang="en">

<?php include 'include/header2.php';?>

<body>
	<?php include 'include/topnav.php';?>
        

    <?php include 'include/sidenav.php';?>
 <br><br><br><br>

    <div id="wrapper" style="margin-left: 60px;"

        <div class="container">    
        		<div class="col-lg-11">    
                        <div class="row">
                            
                            <div class="panel-body">
                            <h3>HISTORY OF MY PROFILE UPDATES</h3>
                            <a style="float: right;" href="profile.php" >GO BACK TO PROFILE <i class="fa  fa-arrow-circle-right"></i></a><br>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" >
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Date Submitted</th>
											<th>Details</th>
											<th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id = "tbody1" >
									
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        </div>
                </div>
            </div>
        </div>
        <div id="wrapper">
    <?php include 'include/footer.php'; ?>
</div>




</body>
	<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
    <script  src="../js/index.js"></script>
	<script>

		function viewDetails(id){
						$.ajax({
	     					url: '../myfunc/profile_updates2.php?id=' + id,
	    					contentType: false,
	        				cache: false,
	        				processData:false,
	    					success: function(data, textStatus, jqXHR)
	    						{	
	 								alertify.alert("<b>UPDATE LIST</b></br>" + data);
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
		

	</script> 
</html>
	<?php
		include("../myfunc/profile_updates1v2.php"); // error pa po ... hahaha 1/7/18 5:15 PM
	?>
	
