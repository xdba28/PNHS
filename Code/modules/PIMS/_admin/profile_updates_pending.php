<?php
    session_start();
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

                <div class="row">

                <div class="col-lg-6">
                <div class="panel-heading">
                            <h3><img src="../img/update2.gif" style="width: 100px; height: 100px;"> &emsp;PENDING REQUESTS</h3><br>
                            <i>Click one to view</i>
                </div>
                   <div class="panel-body">
                            <div>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" >
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Personnel</th>
                                            <th>Date Modified</th>
                                        </tr>
                                    </thead>
                                    <tbody id = "tbody1">
									
                                    </tbody>
                                </table>
                            </div>
                        </div>
            </div> 
    <br><br>
            <div class="col-lg-6" id="tab" style = "display: none" >
                
                <div class="panel panel-default">
                    <div class="panel-heading"><h2 id = "name1" ></h2></div>
                    <div class="panel-body">
                        <img id = "imgtab1" src="../img/nopic.png" style="width: 100px; height: 100px;">
                        <br><br>
                        <label>Updated Information:</label>
                        <div class="row show-grid" id = "appendhere">
						
                        </div>
                        <br>
                        <a href="" id = "atab2"><button class="btn btn-outline btn-primary">View Updates</button></a>&emsp;
                        <a href="" id = "atab1"><button class="btn btn-outline btn-primary">View Personnel</button></a>
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
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
	<script>
		

		function loadSideMenu(id,id2){
			$('#tab').attr({ 'style':'display: none' });
			$('#atab1').attr({ 'href':'browse_profile.php?id='+id });
			$('#atab2').attr({ 'href':'view_profile_updates.php?id='+id2 });
			$('#appendhere').empty();
			$('#imgtab1').attr({ 'src':'../myfunc/showimageprofile.php?id='+id });
			
							$.ajax({
		     					url: '../myfunc/profile_updates_pending2.php?id=' +id+ '&id2=' + id2,
		    					contentType: false,
		        				cache: false,
		        				processData:false,
		    					success: function(data, textStatus, jqXHR)
		    						{	
		 								eval(data);
										$('#tab').attr({ 'style':'display: block' });
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
    <script  src="../js/index.js"></script>


<?php
	include("../myfunc/profile_updates_pending1.php");
?>
</body>
</html>