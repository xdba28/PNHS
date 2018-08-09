<!DOCTYPE html>
<html lang="en" >
   <?php
    //include("func.php");
    include("session.php");
    ?>
   <?php include("pages/headlink.php");?>
    <body>
        <div id="wrapper">
            <?php include("pages/sidenav.php"); ?>
            <?php include("pages/topnav.php")?>    
            <!---Start Content---->
				<div class="container">
                    <br>
                    <!--Body Start Here-->
					
					
					
					
					<!--End Body Here-->
                </div>
           <!--End Content--->
			   
			   <?php include("pages/footer.php")?> <!--Footer-->
            </div>
            <script src='../js/jquery.min.js'></script>
            <script src='../js/bootstrap.min.js'></script>
            <script  src="../js/index.js"></script>
			
				<!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

	<!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
        </body>
    </html>