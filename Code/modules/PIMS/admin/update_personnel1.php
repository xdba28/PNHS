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
            <div class="row">
            <div class="col-lg-11">
            <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>CHOOSE ONE PERSONNEL TO EDIT AND UPDATE</h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div>
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <a>
                                           <th>#</th>
											<th>Surname</th>
											<th>First Name</th>
											<th>Middle Name</th>
											<th>Gender</th>
											<th>Age</th>
											<th>Status</th>
                                        </tr></a>
                                    </thead>
                                    <tbody id = "tbody1" >
									
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
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

    
      

            <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

	<script src="../js/_update_personnel1_1.js"></script>

    <script>
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
			include("../myfunc/update_personnel1_1.php");
		?>
<!----------------------------------------->
</html>
