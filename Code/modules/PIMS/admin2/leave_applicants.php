<?php
    session_start();
    include("../myfunc/session3.php");
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'include/header2.php';?>

<body>
<?php include 'include/topnav.php';?>


<?php include 'include/sidenav.php';?>

<br><br>

    <div id="wrapper" style="margin-left: 60px;">
        
        <div class="container">
                    <div class="col-lg-11">

                <div class="row">
                            <div class="panel-heading">
                                <h3><img src="../img/update2.gif" style="width: 50px; height: 50px;">&emsp;LEAVE APPLICANTS</h3><br>
                            </div>
                            <div class="panel-body">
                            
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" >
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Personnel</th>
                                            <th>Leave Type</th>
                                            <th>Date Submitted</th>
                                            <th>Place to visit</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id = "tbody1">
										
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
<?php include 'include/footer.php';?>
</div>

    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
    <script>
		
		
		// tooltip 
		$('.tooltip').tooltip({
			selector: "[data-toggle=tooltip]",
			container: "body"
		})
		
		$(document).ready(function() {
			$('#dataTables-example').DataTable({
				responsive: true
			});
		});
    </script>
    <script  src="../js/index.js"></script>


</body>
	<!------- ALL PHP CUSTOMS HERE ONLY ------->
		<?php
			include("../myfunc/leave_applicants1.php");
		?>
	<!----------------------------------------->
</html>
