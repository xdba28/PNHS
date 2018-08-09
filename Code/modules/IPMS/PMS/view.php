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
 <?php include("../include/sidenav.php"); ?>
  <div id="page-content-wrapper">

                <div class="container">
                               <div id="page-wrapper">
            <div class="row">
                <div class="col-sm-12">
				<br></br>
                    <h3 class="page-header" style = "color:#337ab7; font-size: 30px; font-family:Georgia;"><center>STATUS</center></h3>	
		
		
					<div class="col-lg-10" style="margin-left:100px;">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                        </div>
						  <div class="panel-body"><form action="" method="get">
                                
								<!-- TASK PROGRESS -->
								
								
					<div class="row">
						<div class="col-md-4">
							<div class="widget widget-task-progress clearfix">
								<div class="left">
									<center><b>Requisition and Issue Slip</b></center><br>
									<div class="">
									<center><img style="width:100px;" src="./docs/img/request.png"></center><br>
									</div>
								</div>
								<?php
						$id = $_GET['ris_no'];			
						
						$ris = mysqli_query($mysqli, "SELECT distinct req_status FROM pms_ris , pims_personnel, pms_ris_req  
										WHERE pms_ris.ris_no = pms_ris_req.ris_no 
										AND pms_ris.emp_No = pims_personnel.emp_No
										AND pims_personnel.emp_No = $emp
										AND pms_ris.ris_no = $id")
							or die("Error: ".mysqli_error($mysqli));

					?>
				<?php while($kev = mysqli_fetch_array($ris)){ ?>
								<?php if ($kev['req_status']=='Approved'){ ?> <center><span class="percentage"> <img style="width:50px;" src="./docs/img/check.png"> </span></center><?php }?>
								<?php if ($kev['req_status']=='Pending'){ ?> <center><span class="percentage"> <img style="width:50px;" src="./docs/img/pend.png"> </span></center><?php }?>
								<?php if ($kev['req_status']=='Denied'){ ?> <center><span class="percentage"> <img style="width:50px;" src="./docs/img/wrong.png"> </span></center><?php }?>
								
								<?php } ?>
							</div>
						</div>
						
						
						<div class="col-md-4">
							<div class="widget widget-task-progress clearfix">
								<div class="left">
									<center><b>Purchase Request</b></center><br>
									<div class="">
									<center><img style="width:100px;" src="./docs/img/purchase.png"></center><br>
									</div>
								</div>
								<?php
						$id = $_GET['ris_no'];	
						
						$pr = mysqli_query($mysqli, "SELECT distinct pr_status FROM pms_ris_req, pms_pr_con, pms_pr
															WHERE pms_ris_req.req_item_id = pms_pr_con.req_item_id
															AND pms_pr_con.pr_no = pms_pr.pr_no
															AND ris_no = $id");
						?>
						<?php while($vin = mysqli_fetch_array($pr)){ ?>
								
								<?php if ($vin['pr_status']=='Approved'){ ?> <center><span class="percentage"> <img style="width:50px;" src="./docs/img/check.png"> </span></center><?php }?>
								<?php if ($vin['pr_status']=='Pending'){ ?> <center><span class="percentage"> <img style="width:50px;" src="./docs/img/pend.png"> </span></center><?php }?>
								<?php if ($vin['pr_status']=='Denied'){ ?> <center><span class="percentage"> <img style="width:50px;" src="./docs/img/wrong.png"> </span></center><?php }?>
								
								<?php } ?>

								
							</div>
						</div>
						
						
						<div class="col-md-4">
							<div class="widget widget-task-progress clearfix">
								<div class="center">
									<center><b>Purchase Order</b></center><br>
									<div class="">
									<center><img style="width:100px;" src="./docs/img/order.png"></center><br>
									</div>
								</div>
								<?php
						$id = $_GET['ris_no'];	
						
						$po = mysqli_query($mysqli, "SELECT distinct po_status FROM pms_po, pms_po_con, pms_pr, pms_pr_con, pms_ris, pms_ris_req, pims_personnel
													WHERE pms_po.po_no = pms_po_con.po_no
													AND pms_po_con.pr_id = pms_pr_con.pr_id
													AND pms_pr_con.req_item_id = pms_ris_req.req_item_id
													AND pms_ris_req.ris_no = pms_ris.ris_no
													AND pms_ris.emp_No = pims_personnel.emp_No
													AND pims_personnel.emp_No = $emp
													AND pms_ris.ris_no = $id");
						?>
						<?php while($hey = mysqli_fetch_array($po)){ ?>
						
								<?php if ($hey['po_status']=='Approved'){ ?> <center><span class="percentage"> <img style="width:50px;" src="./docs/img/check.png"> </span></center><?php }?>
								<?php if ($hey['po_status']=='Pending'){ ?> <center><span class="percentage"> <img style="width:50px;" src="./docs/img/pend.png"> </span></center><?php }?>
								<?php if ($hey['po_status']=='Denied'){ ?> <center><span class="percentage"> <img style="width:50px;" src="./docs/img/wrong.png"> </span></center><?php }?>
								
								<?php } ?>
								
							</div>
						</div>
					</div>
					
				
					<!-- END TASK PROGRESS -->
								
								
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
    
</script>
	<script type="text/javascript">

	function myFunction() {
		$.ajax({
			url: "view_notification.php",
			type: "POST",
			processData:false,
			success: function(data){
				$("#notification-count").remove();					
				$("#notification-latest").show();$("#notification-latest").html(data);
			},
			error: function(){}           
		});
	 }
	 
	 $(document).ready(function() {
		$('body').click(function(e){
			if ( e.target.id != 'notification-icon'){
				$("#notification-latest").hide();
			}
		});
	});
		 
	</script>
        </body>
    </html>