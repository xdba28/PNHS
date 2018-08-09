<!DOCTYPE html>
<html lang="en" >
    <?php
	include("../connect.php");
	include("../include/session.php");
    ?>
    <head>
        <meta charset="UTF-8">
        <title>PAG-ASA National High School</title>
        <link href="http://fonts.googleapis.com/css?family=Dosis:400,500,700" rel="stylesheet" type="text/css">
        <link rel='stylesheet prefetch' href='../css/bootstrap.min.css'>
        <link rel="icon" href="../img/pnhs_favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/w3.css">
            <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
        <!-- MetisMenu CSS -->
    <link href="../vendor/dist/css/sb-admin-2.css" rel="stylesheet">
    </head>
    <body>
        

<?php 
include("../include/topnav.php"); 
?>
        
<div id="wrapper">
 <?php 
       include("../include/sidenav.php");
  ?>
    <div id="page-content-wrapper">

                <div class="container">
                    	<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
				<div style="overflow-x:auto;">
                    <h3 class="page-header" style= "color:#337ab7; font-size: 30px; font-family:Georgia;"><center>REPORTS</center></h3>	
		
		
		
	<!-- .panel-heading -->
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
  
				<br><div class="col-md-12">
                         <h3><strong>&nbsp;&nbsp;&nbsp;Requisition and Issue Slip</strong></h3><br>
						<div class="col-md-4" style="float:center" >
						<div class="panel panel-success container-fluid" >
							<div class="panel-heading">
								<h3 class="panel-title" ><center>Approved</center></h3></div>
								<?php
								$ris = mysqli_query($mysqli,"SELECT COUNT(ris_no) AS ris FROM pms_ris WHERE req_status = 'Approved'");
								$a = mysqli_fetch_array($ris);
								if($a['ris'] ==0){
									echo'<div class="panel-body"><span><center><h3>0<h3></center> </span></div>
								<center><a href="ris_record.php"><button class="btn btn-success">See More</button></a><center>';
								}
								else{
								echo'
								<div class="panel-body"><span><center><h3> '.($a['ris']).'</h3></center> </span></div>
								<center><a href="ris_record.php"><button class="btn btn-success">See More</button></a><center>';
								}
								?>
						
						<br>
						</div><br><hr>
				        </div>
                        <div class="col-md-4" style="float:center" >
						<div class="panel panel-info container-fluid" >
							<div class="panel-heading">
								<h3 class="panel-title" ><center>Pending</center></h3></div>
								<?php
								$ris = mysqli_query($mysqli,"SELECT COUNT(ris_no) AS ris FROM pms_ris WHERE req_status = 'Pending'");
								$a = mysqli_fetch_array($ris);
								if($a['ris'] ==0){
									echo'<div class="panel-body"><span><center><h3>0<h3></center> </span></div>
								<center><a href="ris_rec_pending.php"><button class="btn btn-info">See More</button></a><center>';
								}
								else{
								echo'
								<div class="panel-body"><span><center><h3> '.($a['ris']).'</h3></center> </span></div>
								<center><a href="ris_rec_pending.php"><button class="btn btn-info">See More</button></a><center>';
								}
								?>
						
						<br>
						</div><br><hr>
				        </div>
                        <div class="col-md-4" style="float:center" >
						<div class="panel panel-danger container-fluid" >
							<div class="panel-heading ">
								<h3 class="panel-title" ><center>Denied</center></h3></div>
								<?php
								$ris = mysqli_query($mysqli,"SELECT COUNT(ris_no) AS ris FROM pms_ris WHERE req_status = 'Denied'");
								$a = mysqli_fetch_array($ris);
								if($a['ris'] ==0){
									echo'<div class="panel-body"><span><center><h3>0<h3></center> </span></div>
								<center><a href="ris_rec_denied.php"><button class="btn btn-danger">See More</button></a><center>';
								}
								else{
								echo'
								<div class="panel-body"><span><center><h3> '.($a['ris']).'</h3></center> </span></div>
								<center><a href="ris_rec_denied.php"><button class="btn btn-danger">See More</button></a><center>';
								}
								?>
						
						<br>
						</div><br><hr>
				        </div>
                                </div><br>
                                
                          <h3><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Purchase Requests</strong></h3><br>
						<div class="col-md-4" style="float:center" >
						<div class="panel panel-success container-fluid" >
							<div class="panel-heading">
								<h3 class="panel-title" ><center>Approved</center></h3></div>
								<?php
								$pr = mysqli_query($mysqli,"SELECT COUNT(pr_no) AS pr FROM pms_pr WHERE pr_status = 'Approved'");
								$b = mysqli_fetch_array($pr);
								if($b['pr'] ==0){
									echo'<div class="panel-body"><span><center><h3>0<h3></center> </span></div>
								<center><a href="pr_rec.php"><button class="btn btn-success">See More</button></a><center>';
								}
								else{
								echo'
								<div class="panel-body"><span><center><h3> '.($b['pr']).'</h3></center> </span></div>
								<center><a href="pr_rec.php"><button class="btn btn-success">See More</button></a><center>';
								}
								?>
						
						<br>
						</div><br><hr>
				        </div>
                        <div class="col-md-4" style="float:center" >
						<div class="panel panel-info container-fluid" >
							<div class="panel-heading">
								<h3 class="panel-title" ><center>Pending</center></h3></div>
								<?php
								$pr = mysqli_query($mysqli,"SELECT COUNT(pr_no) AS pr FROM pms_pr WHERE pr_status = 'Pending'");
								$b = mysqli_fetch_array($pr);
								if($b['pr'] ==0){
									echo'<div class="panel-body"><span><center><h3>0<h3></center> </span></div>
								<center><a href="pr_rec_pending.php"><button class="btn btn-info">See More</button></a><center>';
								}
								else{
								echo'
								<div class="panel-body"><span><center><h3> '.($b['pr']).'</h3></center> </span></div>
								<center><a href="pr_rec_pending.php"><button class="btn btn-info">See More</button></a><center>';
								}
								?>
						
						<br>
						</div><br><hr>
				        </div>
                        <div class="col-md-4" style="float:center" >
						<div class="panel panel-danger container-fluid" >
							<div class="panel-heading ">
								<h3 class="panel-title" ><center>Denied</center></h3></div>
								<?php
								$pr = mysqli_query($mysqli,"SELECT COUNT(pr_no) AS pr FROM pms_pr WHERE pr_status = 'Denied'");
								$b = mysqli_fetch_array($pr);
								if($b['pr'] ==0){
									echo'<div class="panel-body"><span><center><h3>0<h3></center> </span></div>
								<center><a href="pr_rec_denied.php"><button class="btn btn-danger">See More</button></a><center>';
								}
								else{
								echo'
								<div class="panel-body"><span><center><h3> '.($b['pr']).'</h3></center> </span></div>
								<center><a href="pr_rec_denied.php"><button class="btn btn-danger">See More</button></a><center>';
								}
								?>
						
						<br>
						</div><br><hr>
				        </div>
                                <br><hr>               
                         <h3><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Purchase Orders</strong></h3><br>
						<div class="col-md-4" style="float:center" >
						<div class="panel panel-success container-fluid" >
							<div class="panel-heading">
								<h3 class="panel-title" ><center>Approved</center></h3></div>
								<?php
								$po = mysqli_query($mysqli,"SELECT COUNT(po_no) AS po FROM pms_po WHERE po_status = 'Approved'");
								$b = mysqli_fetch_array($po);
								if($b['po'] ==0){
									echo'<div class="panel-body"><span><center><h3>0<h3></center> </span></div>
								<center><a href="po_rec.php"><button class="btn btn-success">See More</button></a><center>';
								}
								else{
								echo'
								<div class="panel-body"><span><center><h3> '.($b['po']).'</h3></center> </span></div>
								<center><a href="po_rec.php"><button class="btn btn-success">See More</button></a><center>';
								}
								?>
						
						<br>
						</div><br><hr>
				        </div>
                        <div class="col-md-4" style="float:center" >
						<div class="panel panel-info container-fluid" >
							<div class="panel-heading">
								<h3 class="panel-title" ><center>Pending</center></h3></div>
								<?php
								$po = mysqli_query($mysqli,"SELECT COUNT(po_no) AS po FROM pms_po WHERE po_status = 'Pending'");
								$c = mysqli_fetch_array($po);
								if($c['po'] ==0){
									echo'<div class="panel-body"><span><center><h3>0<h3></center> </span></div>
								<center><a href="po_rec_pending.php"><button class="btn btn-info">See More</button></a><center>';
								}
								else{
								echo'
								<div class="panel-body"><span><center><h3> '.($c['po']).'</h3></center> </span></div>
								<center><a href="po_rec_pending.php"><button class="btn btn-info">See More</button></a><center>';
								}
								?>
						<br>
						</div><br><hr>
				        </div>
                        <div class="col-md-4" style="float:center" >
						<div class="panel panel-danger container-fluid" >
							<div class="panel-heading ">
								<h3 class="panel-title" ><center>Denied</center></h3></div>
								<?php
								$po = mysqli_query($mysqli,"SELECT COUNT(po_no) AS po FROM pms_po WHERE po_status = 'Denied'");
								$c = mysqli_fetch_array($po);
								if($c['po'] ==0){
									echo'<div class="panel-body"><span><center><h3>0<h3></center> </span></div>
								<center><a href="po_rec_denied.php"><button class="btn btn-danger">See More</button></a><center>';
								}
								else{
								echo'
								<div class="panel-body"><span><center><h3> '.($c['po']).'</h3></center> </span></div>
								<center><a href="po_rec_denied.php"><button class="btn btn-danger">See More</button></a><center>';
								}
								?>
						
						<br>
						</div><br><hr>
				        </div>
                                <br><hr>
                <!-- /.col-lg-4 -->   

                        </div>

                </div>
				
</div>
</div>
</div>
</div>
                </div>
				</div>
                <br>
                <br>
                <br>
                <br>
                <br>
<?php 	include("../include/footer.php"); ?>
            </div>

            
            <script src='../js/jquery.min.js'></script>
            <script src='../js/bootstrap.min.js'></script>
            <script src="../js/index.js"></script>
            <script src='../js/sb-admin-2.min.js'></script>
            <script src='../js/metisMenu.min.js'></script>
        </body>
    </html>