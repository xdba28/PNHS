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
    </head>
    <body>
<div id="wrapper">
<?php
        include("../include/sidenav.php");
  ?>
                <div class="container">
                  <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header" style= "color:#337ab7; font-size: 30px; font-family:Georgia;"><center>REPORTS</center></h3>	
		<br>
	<center><div class="col-md-6">
        
                    <form action="../fpdf/ris.php" method="post">
                    <div class="panel panel-info container-fluid">
					    <br><h6><i>Requisition and Issuance Slip

							<div class="col-xs-5" style="float:right">
							<select class="form-control" name = "ris" id = "ris"  class="form-control col-xl-1" style="margin-top:0px">
							 <?php
							$fetch_ris = mysqli_query($mysqli, "SELECT ris_no FROM pms_ris WHERE pms_ris.req_status = 'Approved'")
									or die(mysqli_error($mysqli));
									
									while($row = mysqli_fetch_array($fetch_ris))
									{
										echo'<option value="'.$row['ris_no'].'">RIS NO. '.strtoupper($row['ris_no']).'</option>';
									}
							?>
							</select>
							</div>                            
                        
                        </i></h6><br>
                        <!-- /.panel-body -->
                        <div class="panel-heading row" style="text-align:right">
 						                              
                            <button type="submit" style="float:right;margin-right:15px" class="btn btn-primary btn-square btn-sm" title="View/Print" name = "submit_ris"><i class="fa fa-print fa-fw"></i> Print</button>						

                        </div>                        
                        </div></form>
					<br>
        
                    <form action="../fpdf/PR.php" method="post">
                    <div class="panel panel-info container-fluid" >

                        <br><h6><i>Purchase Request
							<div class="col-xs-5" style="float:right">
							<select class="form-control" name="pr" id = "pr">
                            <?php
							$fetch_pr = mysqli_query($mysqli, "SELECT pr_no FROM pms_pr WHERE pms_pr.pr_status = 'Approved'")
									or die(mysqli_error($mysqli));
									
									while($row = mysqli_fetch_array($fetch_pr))
									{
										echo'<option value="'.$row['pr_no'].'">PR NO. '.strtoupper($row['pr_no']).'</option>';
									}
							?>
							</select>
							</div>
							                       
                        </i></h6><br>
                        <div class="panel-heading row" style="text-align:right">
                            <button type="submit" name="submit_pr" style="float:right;margin-right:15px" class="btn btn-primary btn-square btn-sm" title="View/Print"><i class="fa fa-print fa-fw"></i> Print</button>
                        </div>
                        
                        <!-- /.panel-body -->
                        </div></form>
        <br>
        
                        <form action="../fpdf/purchase_order.php" method="post">
                        <div class="panel panel-info container-fluid">

                        <br><h6><i>Purchase Order
							<div class="col-xs-5" style="float:right">
							<select class="form-control" name="po" id="po">
                           <?php
							$fetch_po = mysqli_query($mysqli, "SELECT po_no FROM pms_po ORDER BY po_no asc")
									or die(mysqli_error($mysqli));
									
									while($row = mysqli_fetch_array($fetch_po))
									{
										echo'<option value="'.$row['po_no'].'">PO NO. '.strtoupper($row['po_no']).'</option>';
									}
							?>
							</select>
							</div>
							                       
                        </i></h6><br>
                        <div class="panel-heading row" style="text-align:right">
                            <button type="submit" name="submit_po" style="float:right;margin-right:15px" class="btn btn-primary btn-square btn-sm" title="View/Print"><i class="fa fa-print fa-fw"></i> Print</button>
                        </div>
                        
                        <!-- /.panel-body -->
                            </div></form>
        
                </div></center>
                    
                    <center><div class="col-md-6">
                        
                    <form action="../fpdf/IAR.php" method="post">
                    <div class="panel panel-info container-fluid">
					    <br><h6><i>Inspection and Acceptance Report

							<div class="col-xs-5" style="float:right">
							<select class="form-control" name = "iar" id = "iar"  class="form-control col-xl-1" style="margin-top:0px">
							<?php
							$fetch_iar = mysqli_query($mysqli, "SELECT iar_no FROM pms_iar ORDER BY iar_no asc")
									or die(mysqli_error($mysqli));
									
									while($row = mysqli_fetch_array($fetch_iar))
									{
										echo'<option value="'.$row['iar_no'].'">IAR NO. '.($row['iar_no']).'</option>';
									}
							?>
							</select>
							</div>                            
                        
                        </i></h6><br>
                        <!-- /.panel-body -->
                        <div class="panel-heading row" style="text-align:right">
 						                              
                            <button type="submit" style="float:right;margin-right:15px" class="btn btn-primary btn-square btn-sm" title="View/Print" name = "submit_iar"><i class="fa fa-print fa-fw"></i> Print</button>							

                        </div>                        
                        </div></form>
                        
					<br>
                        
                    <form action="../fpdf/delivery_report.php" method="post">
                    <div class="panel panel-info container-fluid" >

                        <br><h6><i>Item Delivery Report
							<div class="col-xs-5" style="float:right">
                            <select class="form-control" name = "del" id = "del"  class="form-control col-xl-1" style="margin-top:0px">
							<!--<input name="date" type="date" value="<?php echo $date;?>" class="form-control"></i> -->
                            <option>Choose Received Date</option>
                            <?php
							$fetch_del = mysqli_query($mysqli, "SELECT received_date FROM pms_iar")
									or die(mysqli_error($mysqli));
									
									while($row = mysqli_fetch_array($fetch_del))
									{
                                        echo'<option value="'.$row['received_date'].'">'.strtoupper($row['received_date']).'</option>';
									}
							?>
                            </select>
							</div>
							                       
                        </i></h6><br>
                        <div class="panel-heading row" style="text-align:right">
						<button type="submit" name="submit_del" style="float:right;margin-right:15px" class="btn btn-primary btn-square btn-sm" title="View/Print"><i class="fa fa-print fa-fw"></i> Print</button>
                        </div>
                        
                        <!-- /.panel-body -->
                        </div></form>
        
                </div></center>
                    
				
				
							
				
</div>
</div>
</div>  
 </div>              </div>
                <br>
                <br>
                <br>
                <br>
                <br>
               </div> 
          	<?php 	include("../include/footer.php"); ?>
            
            <script src='../js/jquery.min.js'></script>
            <script src='../js/bootstrap.min.js'></script>
            <script src="../js/index.js"></script>
        </body>
    </html>