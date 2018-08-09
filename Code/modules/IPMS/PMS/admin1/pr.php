<?php


$pr=$_GET['pr'];
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
                        <h3 class="page-header" style = "color:#337ab7; font-size: 30px; font-family:Georgia;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PR. <?php echo $pr ?>| <i>Request Detail</i></h3>    
                        <div class="col-md-12">
                            <div class="row">
								<div class="col-md-1">
								
								</div>
								<div class="col-md-1"><a href="requests.php" button type="button" class="bbtn btn-outline btn btn-info btn"><i class="fa fa-reply fa-sm"> Back</i></button></a></div>
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
										<th class="col-xs-2"><center>Quantity</center></th>
										<th class="col-xs-1"><center>Unit</center></th>
										<th class="col-xs-3"><center>Item Name</center></th>
										<th class="col-xs-3"><center>Item Description</center></th>
										<th class="col-xs-2"><center>Estimated Unit Cost</center></th>
										<th class="col-xs-2"><center>Estimated Total</center></th>                                                
									</tr>
									</thead>
									<tbody>
									   <?php
										$sql = mysqli_query($mysqli, "SELECT * FROM pms_pr, pms_pr_con, pms_ris_req
										WHERE pms_ris_req.req_item_id = pms_pr_con.req_item_id
										AND pms_pr.pr_no = pms_pr_con.pr_no
										AND pms_pr.pr_no = $pr")
										or die(mysqli_error($mysqli));
										$total_unit = 0;
										$total_cost = 0;
										while($row = mysqli_fetch_array($sql))
										{ 
										echo '
												<tr class="odd gradeX">
												<td><center>'.$row['req_qty'].'</center></td>
												<td><center>'.$row['req_unit'].'</center></td>
												<td><center>'.$row['req_item'].'</center></td>
												<td><center>'.$row['req_desc'].'</center></td>
												<td><center>₱'.$row['est_unit_cost'].'.00</center></td>
												<td><center>₱'.$row['est_cost'].'.00</center></td>
												</tr>   ';
												$total_unit = $total_unit + $row['est_unit_cost'];
												$total_cost = $total_cost + $row['est_cost'];
										  }?>
									</tbody>
									<tr>
										<td><center></center></td>
										<td><center></center></td>
										<td><center></center></td>
										<td><center><b>Total: </center></td>
										<td><center>₱<?php echo $total_unit;?>.00</center></td>
										<td><center>₱<?php echo $total_cost;?>.00</center></td>
									</tr>
									</table>
									</div>
								</div>
				
								<div class="row">
									<div class="col-md-4"><br></div>
									<div class="col-md-4">
										<form method = "post">
										<input type = "hidden" name = "pr" value = "<?php echo $pr?>"></input>
										<button type="submit" name="approve" class="btn btn-block btn-success">Approve</button>
										<button type="submit" name="deny" class="btn btn-block btn-danger">Deny</button><br>
										</form>
										
								<?php
									if(isset($_POST['approve']))
									{
										$prno = $_POST['pr'];
										mysqli_autocommit($mysqli, FALSE);
										$update_pr = mysqli_query($mysqli, "UPDATE pms_pr SET 
										pr_status='Approved',pr_sp_seen='0'
										WHERE pr_no= $prno");
										if($update_pr)
										{
											echo '<script>
											alert("Purchase Request Approved!");
											window.location.href="requests.php";
											</script>';
											mysqli_commit($mysqli);
											
										 } 
										else
										{
											echo '<script>
											alert("Purchase Request Approval Error!");
											window.location.href="requests.php";
											</script>';
											mysqli_rollback($mysqli);
										}
									}
									if(isset($_POST['deny']))
									{
										$prno = $_POST['pr'];
										mysqli_autocommit($mysqli, FALSE);
										$update_pr = mysqli_query($mysqli, "UPDATE pms_pr SET 
										pr_status='Denied',pr_sp_seen='0'
										WHERE pr_no='".$prno."'");
										if($update_pr)
										{
											echo '<script>
											alert("Purchase Request Denied!");
											window.location.href="requests.php";
											</script>';
											mysqli_commit($mysqli);
											
										 } 
										else
										{
											echo '<script>
											alert("Purchase Request Denial Error!");
											window.location.href="requests.php";
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