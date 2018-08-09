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
                            <h3>ON LEAVE PERSONNEL  </h3>
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
<div id="wrapper">
<?php include 'include/footer.php';?>
</div>
    
<script>
$.sidebarMenu($('.sidebar-menu'))
</script>

            <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>


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
			include("../myfunc/on_leave_list1.php");
		?>
<!----------------------------------------->
</html>
