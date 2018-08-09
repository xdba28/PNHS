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
                            $pr=$_GET['pr']; 
                            $po=$_GET['po'];
                            ?>
						<h3 class="page-header" style = "color:#337ab7; font-size: 30px; font-family:Georgia;"><center>Inspection and Acceptance <a href="#myModal" data-toggle="modal" class="btn tbn-sm btn-primary">Add</a>&nbsp;</h3>
                        <?php
                            if(isset($_GET['iar'])){
                                
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
												?>
												
												<?php 
												if ($_SESSION['stat'] == 'Partial') { ?>
													<thead>
														<tr class="info">
															<th class="col-xs-2"><center>Item Name</center></th>
															<th class="col-xs-1"><center>Unit</center></th>
															<th class="col-xs-3"><center>Description</center></th>
															<th class="col-xs-1"><center>Expected Qty</center></th>
															<th class="col-xs-1"><center>Received Qty</center></th>
															<th class="col-xs-1"><center>Next Delivery Date</center></th>

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
															<td><center><input name="next_date" type="date" class="form-control" min="'.$date.'"></input></center></td>
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
                                                $nxtdate=$_POST['next_date'];
                                                $ct=count($item);
                                                $er=0;
                                                $ok=0;
                                                mysqli_query($mysqli,"set autocommit=0");
                                                mysqli_query($mysqli,"start transaction");
                                                mysqli_query($mysqli,"LOCK TABLES PMS_iar_con WRITE");
                                                for($i=0;$i<$ct;$i++){
                                                    $nris=mysqli_query($mysqli,"INSERT INTO pms_iar_con(po_id,received_qty,iar_no,next_del_date) VALUES($item[$i],$qty[$i],$iar,'$nxtdate')");
                                                }
                                                if($i!=$ct){
                                                    mysqli_query($mysqli,"ROLLBACK");
                                                    echo "<script>alert('Item Error!'); window.location='iar_page.php?iar=$iar&pr=$pr&po=$po&ris=$ris';</script>";
                                                }else{
                                                    mysqli_query($mysqli,"COMMIT");
                                                    echo "<script>alert('Success!'); window.location='iar_rec.php?pr=$pr&ris=$ris';</script>";
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
				
<!-- MODAL -->
<div id="myModal" class="modal" data-easein="expandIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="opacity: 1; display: block; transform: perspective(400px) scaleX(1) scaleY(1) translateX(0px); transform-origin: calc(0px + 50%) 50% 0px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Add IARs Details:</h4>
            </div>
            <form method="POST">
            <div class="modal-body">
                
                <div class="row">
                    <div class="col-md-2"><br></div>
                    <div class="col-md-8">
                        <div  class="input-group">
                            <span class="input-group-addon" id="basic-addon2">Invoice Number &nbsp;</span>
                            <input name="inv" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2"><br></div>
                    <div class="col-md-8">
                        <div  class="input-group">
                            <span class="input-group-addon" id="basic-addon2">Purchase Order&nbsp;&nbsp;&nbsp;</span>
                            <select class="form-control" name="po">
                                <option value="">Select PO No.</option>

                                <?php
                                    $supp=mysqli_query($mysqli,"SELECT distinct pms_po.po_no,company_name
                                    FROM pms_po,pms_po_con,pms_supplier,pms_pr,pms_pr_con,pms_ris_req,pms_ris
                                    WHERE pms_ris.ris_no=pms_ris_req.ris_no
                                    AND pms_pr_con.req_item_id=pms_ris_req.req_item_id
                                    AND pms_pr.pr_no=pms_pr_con.pr_no
                                    AND pms_supplier.company_id=pms_po.company_id
                                    AND pms_po.po_no=pms_po_con.po_no
                                    AND pms_po_con.pr_id=pms_pr_con.pr_id
                                    AND pms_ris_req.ris_no=$ris
                                    AND pms_pr.pr_no = $pr
                                    AND pms_po.po_no = $po");
                                    while($dr=mysqli_fetch_assoc($supp)){
                                        echo "<option value='".$dr['po_no']."'>".$dr['po_no']." - ".$dr['company_name']."</option>";
                                    }
                                ?>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2"><br></div>
                    <div class="col-md-8">
                        <div  class="input-group">
                            <span class="input-group-addon" id="basic-addon2">Received Date &nbsp;&nbsp;&nbsp;</span>
                            <input name="rec_date" type="date" value="<?php echo $date;?>" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2"><br></div>
                    <div class="col-md-8">
                        <div  class="input-group">
                            <span class="input-group-addon" id="basic-addon2">Inspection Date &nbsp;</span>
                            <input name="ins_date" type="date" value="<?php echo $date;?>" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2"><br></div>
                    <div class="col-md-8">
                        <div  class="input-group">
                            <span class="input-group-addon" id="basic-addon2">Delivery Status&nbsp;&nbsp;&nbsp;</span>
                            <select required name="stat" class="form-control">
                                <option value="">Select Delivery Status</option>
                                <option value="Partial">Partial</option>
                                <option value="Complete">Complete</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                <button name="go" class="btn btn-primary">Proceed</button>
            </div>
            </form>
            <?php 
                if(isset($_POST['go'])){
                    $po=$_POST['po'];
                    $recdate=$_POST['rec_date'];
                    $insdate=$_POST['ins_date'];
                    $stat=$_POST['stat'];
					$_SESSION['stat'] = $stat;
                    $inv=$_POST['inv'];
                    mysqli_query($mysqli,"set autocommit=0");
                    mysqli_query($mysqli,"start transaction");
                    mysqli_query($mysqli,"LOCK TABLES PMS_IAR WRITE");
                    $inspo=mysqli_query($mysqli,"INSERT INTO pms_iar(iar_status,received_date,iar_date,ins_date,inv_num) VALUES ('$stat','$recdate','$date','$insdate',$inv)");
                    if($inspo){
                        $iar=mysqli_insert_id($mysqli);
                        mysqli_query($mysqli,"COMMIT");
                        echo "<script>alert('IAR Added!'); window.location='create_iar.php?iar=$iar&po=$po&pr=$pr&ris=$ris';</script>";
                    }else{
                        mysqli_query($mysqli,"ROLLBACK");
                        echo "<script>alert('PO Error!'); window.location='iar_page.php?pr=$pr&ris=$ris';</script>";
                    }
                    mysqli_query($mysqli,"UNLOCK TABLES");
                }
            ?>
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
                <br>
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
        </body>
    </html>