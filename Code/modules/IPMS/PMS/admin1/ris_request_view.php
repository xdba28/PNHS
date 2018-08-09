<?php


$ris=$_GET['ris'];
?>


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
                    <div class="col-sm-12">
					<br>
                        <h3 class="page-header" style = "color:#337ab7; font-size: 30px; font-family:Georgia;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RIS. <?php echo $ris ?> | <i>Request Detail</i></h3>    
                        <div class="col-md-12">
                            <div class="row">
								<div class="col-md-1">
								
								
								</div>
								<div class="col-md-1">
								
								<a href="ris_request.php" button type="button" class="bbtn btn-outline btn btn-success btn"><i class="fa fa-reply fa-sm">Back</i></button></a>
								
								</div>
								<div class="col-md-1"></div>
								<div class="col-md-1"></div>
								<div class="col-md-1"></div>
								<div class="col-md-1"></div>
								<div class="col-md-1"></div>
								<div class="col-md-1"></div>
								<div class="col-md-1"></div>
								<div class="col-md-1"></div>
								<div class="col-md-1">
								</div>
								<div class="col-md-1"></div>
							</div><br>
                    
                    
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                </div>
                                <br>
                                
                                <div class="panel-body">
								<input type="hidden" name="ris" value="">
									<div class="table-responsive">
										<table width="100%" class="table table-striped table-bordered table-hover" border='2' id="dataTables-example">

											<thead>


									<tr class="info">
										<th class="col-xs-1"><center>Qty</center></th>
										<th class="col-xs-3"><center>Unit</center></th>
										<th class="col-xs-3"><center>Item Name</center></th>
										<th class="col-xs-3"><center>Item Description</center></th>
									</tr>
									</thead>
									<tbody>
                                        
                                        
									   <?php
										$sql = mysqli_query($mysqli, "SELECT * FROM pms_ris, pims_personnel,pms_ris_req
										WHERE pms_ris.emp_no = pims_personnel.emp_no
										AND req_status = 'Pending'
										AND pms_ris_req.ris_no = pms_ris.ris_no
										AND pms_ris_req.ris_no = $ris")
										or die(mysqli_error($mysqli));
										$ris_no_prev = 0;
										while($row = mysqli_fetch_array($sql))
										{ 
											echo '
													<tr class="odd gradeX">
													<td><center>'.$row['req_qty'].'</center></td>
													<td><center>'.$row['req_unit'].'</center></td>
													<td><center>'.$row['req_item'].'</center></td>
													<td><center>'.$row['req_desc'].'</center></td>
													</tr> ';
                                            
										}?>
									</tbody>
									</table>
									<?php $purpose = mysqli_query($mysqli, "SELECT reason FROM pms_ris, pms_ris_req WHERE pms_ris.ris_no = pms_ris_req.ris_no AND pms_ris.ris_no = $ris")
									or die (mysqli_error($mysqli));
									$row = mysqli_fetch_array($purpose);?>
									
									<div class="col-xs-11" style="margin-left: 25px">
										<label for="purpose" style="float:left">Purpose</label>
									<input type="text" name="reason" value="<?php echo $row['reason']."\n"; ?>" class="form-control" style="width:100% length:200px" readonly>
									   </div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-4"><br></div>
									<div class="col-md-4">
										<form method = "post">
										<input type = "hidden" name = "ris" value = "<?php echo $ris?>"></input>
										<button type="submit" name="approve" class="btn btn-block btn-success">Approve</button>
										<button type="submit" name="deny" class="btn btn-block btn-danger">Deny</button><br>
										</form>
										
									<?php
									if(isset($_POST['approve']))
									{
										$risno = $_POST['ris'];
										mysqli_autocommit($mysqli, FALSE);
										$update_ris = mysqli_query($mysqli, "UPDATE pms_ris SET 
										req_status='Approved',ris_sp_seen='0'
										WHERE ris_no = $risno");
										if($update_ris)
										{
											echo '<script>
											alert("Requisition and Issuance Slip Approved!");
											window.location.href="ris_request.php";
											</script>';
											mysqli_commit($mysqli);
											
										 } 
										else
										{
											echo '<script>
											alert("Cannot save  record!");
											window.location.href="ris_request.php";
											</script>';
											mysqli_rollback($mysqli);
										}
									}
									if(isset($_POST['deny']))
									{
										$risno = $_POST['ris'];
										mysqli_autocommit($mysqli, FALSE);
										$update_ris = mysqli_query($mysqli, "UPDATE pms_ris SET 
										req_status='Denied',ris_sp_seen='0'
										WHERE ris_no= $risno");
										if($update_ris)
										{
											echo '<script>
											alert("Requisition and Issuance Slip Denied!");
											window.location.href="ris_request.php";
											</script>';
											mysqli_commit($mysqli);
											
										 } 
										else
										{
											echo '<script>
											alert("Cannot save  record!");
											window.location.href="ris_request.php";
											</script>';
											mysqli_rollback($mysqli);
										}
									}
								?>
									</div>
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
			<script>
    var x=document.getElementById('num').value;
    function cal($i)
    {
        var est = document.getElementById('est_'+$i+'').value;
        var quantity = document.getElementById('qty_'+$i+'').value;
        document.getElementById('tot_'+$i+'').value = (est*quantity).toFixed(2);
    }
</script>
        </body>
    </html>