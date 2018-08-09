<?php
	session_start();
	include("../myfunc/session1.php");
?>
	

<!DOCTYPE html>
<html lang="en">

<?php include 'include/header2.php';?>

<body>

    <?php include 'include/topnav.php';?><br>
        <div id="wrapper">
        <?php include 'include/sidenav.php';?>

        <div class="container">       
        <div class="col-lg-10">
                            
                            <div class="panel-body">
                            <h3 style="text-align: center;">HISTORY OF LEAVE APPLICATION</h3><br>
                            <div>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" >
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Date Submitted</th>
											<th>Place to visit</th>
                                            <th>Date Responded</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id = "leaveTable1" >
									
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        
                        </div>

        </div>
        <?php include 'include/footer.php'; ?>
        </div>


	<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
	<script src = "../js/_leave_history1.js" ></script>
    <script  src="../js/index.js"></script>

</body>

</html>
	
	<!------- ALL PHP CUSTOMS HERE ONLY ------->
	<?php
		include("../myfunc/leave_history1.php");
	?>
	<!----------------------------------------->
