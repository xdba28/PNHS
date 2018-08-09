<?php


$po=$_GET['po'];
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
                        <h3 class="page-header" style = "color:#337ab7; font-size: 30px; font-family:Georgia;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PO. <?php echo $po ?>| <i>List of Requested Items</i></h3>	
  
						<div class="col-lg-12">
						 <div class="row">
								<div class="col-md-1">
								
								</div>
								<div class="col-md-1"><a href="po_request.php" button type="button" class="bbtn btn-outline btn btn-info btn"><i class="fa fa-reply fa-sm"> Back</i></button></a></div>
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
						<div class="panel panel-info">
							<div class="panel-heading">
							</div>
							<br>
								<div class="panel-body">
									<div class="table-responsive">
										<table width="100%" class="table table-striped table-bordered table-hover" border='2' id="dataTables-example">
											<thead>
											<tr class="info">
											<th class="col-xs-1"><center>Unit</center></th>
											<th class="col-xs-1"><center>Quantity</center></th>
											<th class="col-xs-3"><center>Item Name</center></th>
											<th class="col-xs-3"><center>Item Description</center></th>
											<th class="col-xs-1"><center>Cost</center></th>
											<th class="col-xs-1"><center>Expected Date of Delivery</center></th>                                 
											</tr>
											</thead>
											
											<tbody>
												<?php
												$sql = mysqli_query($mysqli, "SELECT * FROM pms_ris, pms_ris_req, pms_pr, pms_pr_con, pms_po_con, pms_po WHERE pms_ris.ris_no = pms_ris_req.ris_no
												AND pms_pr.pr_no = pms_pr_con.pr_no
												AND pms_po.po_no = pms_po_con.po_no
												AND pms_ris_req.req_item_id = pms_pr_con.req_item_id
												AND pms_pr_con.pr_id  = pms_po_con.pr_id
												AND pms_po.po_no = $po")or die(mysqli_error($mysqli));
                                                $total = 0;
												 while($row = mysqli_fetch_array($sql))
												{
												$fetch_items = mysqli_query($mysqli, "SELECT * FROM pms_ris_req WHERE ris_no = '".$row['ris_no']."'")
												 or die(mysqli_error($mysqli));
								       
												echo'
												<tr class="">
												<td><center>'.$row['req_unit'].'</center></td>
												<td><center>'.$row['req_qty'].'</center></td>
												<td><center>'.$row['req_item'].'</center></td>
												<td><center>'.$row['req_desc'].'</center></td>
												<td><center>₱'.$row['tot_amt'].'.00</center></td>
												<td><center>'.$row['delivery_date'].'</center></td></tr>';
												$total = $row['tot_amt'] + $total;
												 }
											  ?>
											  <tr>
                                                    <td><center></center></td>
                                                    <td><center></center></td>
                                                    <td><center></center></td>
                                                  <td><center><b>Total Cost: </b></center></td>
                                                    <td><center>₱<?php echo $total;?>.00</center></td>
													<td><center></center></td>
											  </tr>
		   
											</tbody>

										</table>
									</div>
									<div class="row">
										<center>
										<div class="col-md-12">
										<form method = "post">
											<input type = "hidden" name = "po" value = "<?php echo $po ?>">
											<button type="submit" name = "approve" class="bbtn btn-outline btn btn-info btn">Approve</button>
											<button type="submit" name = "deny" class="bbtn btn-outline btn btn-danger btn">Deny</button>
										<form>
											 
											<?php
												$sql1 = mysqli_query($mysqli, "SELECT * FROM pms_ris, pms_ris_req, pms_pr, pms_pr_con, pms_po_con, pms_po WHERE pms_ris.ris_no = pms_ris_req.ris_no
												AND pms_pr.pr_no = pms_pr_con.pr_no
												AND pms_po.po_no = pms_po_con.po_no
												AND pms_ris_req.req_item_id = pms_pr_con.req_item_id
												AND pms_pr_con.pr_id  = pms_po_con.pr_id
												AND pms_po.po_no = $po")or die(mysqli_error($mysqli));
                                                $total = 0;
												 while($jam = mysqli_fetch_array($sql1))
												 {

											if(isset($_POST['approve']))
											{

												$pono = $_POST['po'];
												mysqli_autocommit($mysqli, FALSE);
 
												if($jam['payment_term'] == 'Check')
												{
												$update_po = mysqli_query($mysqli, "UPDATE pms_po SET 
												po_status='Approved1',po_sp_seen='0'
												WHERE po_no='".$pono."'");
												}
												else
												{
												$update_po = mysqli_query($mysqli, "UPDATE pms_po SET 
												po_status='Approved'
												WHERE po_no='".$pono."'");
												}

												if($update_po)
												{
													echo '<script>
													alert("Purchase Order Approved!");
													window.location.href="po_request.php";
													</script>';
													mysqli_commit($mysqli);
													
												 } 
												else
												{
													echo '<script>
													alert("Cannot save  record!");
													window.location.href="po_request.php";
													</script>';
													mysqli_rollback($mysqli);
												}

											}
											if(isset($_POST['deny']))
											{
												$pono = $_POST['po'];
												mysqli_autocommit($mysqli, FALSE);
												$update_po = mysqli_query($mysqli, "UPDATE pms_po SET 
												po_status='Denied',po_sp_seen='0'
												WHERE po_no='".$pono."'");
												if($update_po)
												{
													echo '<script>
													alert("Purchase Order Denied!");
													window.location.href="po_request.php";
													</script>';
													mysqli_commit($mysqli);
													
												 } 
												else
												{
													echo '<script>
													alert("Cannot save record!");
													window.location.href="po_request.php";
													</script>';
													mysqli_rollback($mysqli);
												}
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
    
 
$('.est').on('change', function(){

    var subtotal = 0;
    $('.est').each(function(){
        var $this = $(this);
        var quantity = parseInt($this.val());
        var price = parseFloat($this.siblings('.tot).val())
        subtotal+=quantity*price;
    })
    $('.total').text(total);

})
$('.est').trigger('change')
</script> 
        </body>
    </html>