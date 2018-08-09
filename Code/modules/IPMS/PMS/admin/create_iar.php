<!DOCTYPE html>
<html lang="en" >
<?php
date_default_timezone_set('Asia/Manila');
        $date=date("Y-m-d");
?>
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
                        <?php
                            $ris=$_GET['ris'];
                            $pr=$_GET['pr']; ?>
						<h3 class="page-header" style = "color:#337ab7; font-size: 30px; font-family:Georgia;"><center>Inspection and Acceptance </h3>
                        <?php
                            if(isset($_GET['iar'])){
                                $po=$_GET['po'];
                                $iar=$_GET['iar'];
                                $pov=mysqli_query($mysqli,"SELECT company_name from pms_po,pms_supplier WHERE pms_supplier.company_id=pms_po.company_id AND pms_po.po_no=$po");
                                $porow=mysqli_fetch_assoc($pov);
								
                                $query_iar_status = mysqli_query($mysqli,"SELECT iar_status from pms_iar WHERE pms_iar.iar_no = $iar");
                                $iar_status=mysqli_fetch_assoc($query_iar_status);
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
									<?php echo $porow['company_name']; ?>
                                    </div>
                                    <div class="panel-body">
                                        <form method="POST">
                                        <div class="table-responsive">
                                            <table width="100%" class="table table-striped table-bordered table-hover" border='2' id="dataTables-example">
												<?php 
												$risitems=mysqli_query($mysqli,"SELECT * from pms_ris,pims_personnel, pms_pr, pms_pr_con, pms_ris_req, pms_po, pms_po_con, pms_supplier
													  WHERE pims_personnel.emp_no=pms_ris.emp_no 
													  AND pms_po.po_no = pms_po_con.po_no
													  AND pms_po_con.pr_id = pms_pr_con.pr_id
													  AND pms_ris.ris_no = pms_ris_req.ris_no
													  AND pms_ris_req.req_item_id = pms_pr_con.req_item_id
													  AND pms_pr_con.pr_no = pms_pr.pr_no
													  and pms_po.po_no = $po AND pms_supplier.company_id = pms_po.company_id")
												or die(mysqli_error($mysqli)); 
												
												$x=0;
												
												if ($_SESSION['stat'] == 'Partial') { ?>

												<div class="form-group"> 
												   <label for="inputEmail3" class="col-md-3 control-label">Next Delivery Date :</label>
												   <div class="col-md-3">
													<input name="next_date" type="date" class="form-control" min="<?php echo $date;?>"></input>
												   </div>
												</div><br><br>
												<?php }?>
												
												<?php 
												if ($_SESSION['stat'] == 'Partial') { ?>
													<thead>
														<tr class="info">
															<th class="col-xs-2"><center>Item Name</center></th>
															<th class="col-xs-1"><center>Unit</center></th>
															<th class="col-xs-3"><center>Description</center></th>
															<th class="col-xs-1"><center>Expected Qty</center></th>
															<th class="col-xs-1"><center>Received Qty</center></th>

														</tr>
													</thead>
												<?php } else {?>
												

												
													<thead>
														<tr class="info">
															<th class="col-xs-2"><center>Item Name</center></th>
															<th class="col-xs-1"><center>Unit</center></th>
															<th class="col-xs-3"><center>Description</center></th>
															<th class="col-xs-1"><center>Expected Qty</center></th>
															<th class="col-xs-1"><center>Received Qty</center></th>
														</tr>
													</thead>
												<?php } ?>
													

												

													<tbody>
													
												<?php
												while($row=mysqli_fetch_array($risitems)){
												$x++; 
													if ($iar_status['iar_status'] == 'Partial') {
														echo '
														<tr>
															<input value="'.$row['po_id'].'" type="hidden" name="item[]">
															<td><center>'.$row['req_item'].'</center></td>
															<td><center>'.$row['req_unit'].'</center></td>
															<td><center>'.$row['req_desc'].'</center></td>
															<td><center>'.$row['req_qty'].'</center></td>
															<td><center><input type="number" class="form-control" max="'. $row['req_qty'].'" 
															name="qty[]" ></center></td>
														</tr>';
														}
														else {
															echo '
														<tr>
															<input value="'.$row['po_id'].'" type="hidden" name="item[]">
															<td><center>'.$row['req_item'].'</center></td>
															<td><center>'.$row['req_unit'].'</center></td>
															<td><center>'.$row['req_desc'].'</center></td>
															<td><center>'.$row['req_qty'].'</center></td>
															<td><center>'.$row['req_qty'].'</center></td>
															<input type="number" hidden class="form-control" max="'. $row['req_qty'].'" 
															name="qty[]" value="'.$row['req_qty'].'">
														</tr>';
															}
												}
												?>
													</tbody>
                                            </table>
                                        </div>
                                        <center><button name="btn" class="btn btn-primary">Create IAR</button></center>
                                        </form>
                                        
                                        <!-- /.table-responsive -->
                                        <?php 
                                            if(isset($_POST['btn'])){
                                                $item=$_POST['item'];
                                                $qty=$_POST['qty'];
												if ($_SESSION['stat'] == 'Partial') {
                                                $nxtdate=$_POST['next_date'];
												}
                                                $ct=count($item);
                                                $er=0;
                                                $ok=0;
                                                mysqli_query($mysqli,"set autocommit=0");
                                                mysqli_query($mysqli,"start transaction");
                                                mysqli_query($mysqli,"LOCK TABLES PMS_iar_con WRITE");
                                                for($i=0;$i<$ct;$i++){
													if ($_SESSION['stat'] == 'Partial') {
                                                    $nris=mysqli_query($mysqli,"INSERT INTO pms_iar_con(po_id,received_qty,iar_no,next_del_date,status,inserted) VALUES($item[$i],$qty[$i],$iar,'$nxtdate','NOT COMPLETE','0')");
													}
													else {
													$nris=mysqli_query($mysqli,"INSERT INTO pms_iar_con(po_id,received_qty,iar_no,next_del_date,status,inserted) VALUES($item[$i],$qty[$i],$iar,'','COMPLETE','0')");
													}
                                                }
                                                if($i!=$ct){
                                                    mysqli_query($mysqli,"ROLLBACK");
                                                    echo "<script>alert('Inspection and Acceptance Report Error!'); window.location='iar_page.php?iar=$iar&pr=$pr&po=$po&ris=$ris';</script>";
                                                }else{
                                                    mysqli_query($mysqli,"COMMIT");
                                                    echo "<script>alert('Inspection and Acceptance Report Created!'); window.location='iar.php';</script>";
                                                }
                                                mysqli_query($mysqli,"UNLOCK TABLES");
                                            }
                                        ?>
                                    </div>
                                 </div>
                            </div>
                        </div> 
                        <?php        
                            }
                        ?>							
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
<script>
$.sidebarMenu($('.sidebar-menu'))
</script>
			
        </body>
  </html>