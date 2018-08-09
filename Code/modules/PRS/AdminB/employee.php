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
					        <div class="container-fluid" style="height:700px;max-width:100%;margin-right:20px;margin-left:20px;margin-bottom:10px">
        		
				
			<div class="row">
		<div class="col-lg-12">
		<h3 class="page-header"><i class="fa fa-laptop"></i> PERSONNEL SELECT</h3>
	 <ol class="breadcrumb">
	<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
	<li><i class="fa fa-laptop"></i><a href="personnel.php">Personnel Select</a></li>

	 </ol>
		</div>
			</div>


                <!--======== CONTENT STARTS HERE=============-->			
								<br>
					<br>
			
			 <div class="col-lg-12">
			 <center>
			 <table style="width: 400px;" >
				<tbody>
				<tr>
				<td><a href="teaching.php" target="_self"><img src="../assets/images/teach.png" width="300"></a></td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				
				<td><a href="nonteaching.php" target="_self"><img src="../assets/images/nteach.png" width="300"></a></td>
				</tr>
				<tr>
				</tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td> 	
				<tr>
				<td><h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <mark> Teaching Staff </mark> </h4></td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td><h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <mark>Non-Teaching Staff </mark></h4></td>
				</tr>
				</tbody>
				</table>

			 </center>
                   			
			 </div>
			

			    <!--======== CONTENT ENDS HERE=============-->		
 

        <br>
       
         </div>
					
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