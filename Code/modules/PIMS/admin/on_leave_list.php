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
                        <div class="panel-heading">
                            <h3>On-Leave Personnel</h3>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Employee Name</th>
											<th>Place</th>
                                            <th>Purpose</th>
                                            <th>Start of Leave</th>
                                            <th>Time of Return</th>
                                            <th>Leave Duration</th>
                                            
                                        </tr>
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
<div id="wrapper">
<?php include 'include/footer.php';?>
</div>
    

            <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

	<link rel="stylesheet" href="../js/printJS/jquery.dataTables.min.css">
	<link rel="stylesheet" href="../js/printJS/buttons.dataTables.min.css">
	<script src="../js/printJS/dataTables.buttons.min.js"></script>
	<script src="../js/printJS/buttons.flash.min.js"></script>
	<script src="../js/printJS/jszip.min.js"></script>
	<script src="../js/printJS/pdfmake.min.js"></script>
	<script src="../js/printJS/vfs_fonts.js"></script>
	<script src="../js/printJS/buttons.html5.min.js"></script>
	<script src="../js/printJS/buttons.print.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true,
			dom: 'Bfrtip',
			buttons: [
				'copy', 'excel', 'pdf', 'print'
			]
        });
    });
    </script>
    <script  src="../js/index.js"></script>

</body>

<!------- ALL PHP CUSTOMS HERE ONLY ------->
		<?php
			include("../myfunc/on_leave_list1.php");
		?>
<!----------------------------------------->
</html>
