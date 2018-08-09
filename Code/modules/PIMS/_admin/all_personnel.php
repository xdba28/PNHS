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
                            <h3>PNHS PERSONNEL</h3>
                        </div>
                        
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Surname</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Gender</th>
										<th>Age</th>
										<th>Status</th>
                                    </tr>
                                </thead>
                                <tbody id = "tbody1">
								
                                
                                </tbody>
                            </table>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
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
	<!-- My Custom JavaScript -->
	<script src="../js/_all_teaching1.js"></script>
</html>
<!------- ALL PHP CUSTOMS HERE ONLY ------->
		<?php
			include("../myfunc/all_personnel1.php");
		?>
<!----------------------------------------->
