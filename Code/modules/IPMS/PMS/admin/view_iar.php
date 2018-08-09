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
                            $pocon=mysqli_query($mysqli,"SELECT distinct pms_iar_con.iar_no,pms_po_con.po_no 
                            FROM pms_po,pms_po_con,pms_supplier,pms_pr,pms_pr_con,pms_ris_req,pms_ris,pms_iar,pms_iar_con
                            WHERE pms_ris.ris_no=pms_ris_req.ris_no
                            AND pms_pr_con.req_item_id=pms_ris_req.req_item_id
                            AND pms_pr.pr_no=pms_pr_con.pr_no
                            AND pms_supplier.company_id=pms_po.company_id
                            AND pms_po.po_no=pms_po_con.po_no
                            AND pms_po_con.pr_id=pms_pr_con.pr_id
                            AND pms_iar.iar_no=pms_iar_con.iar_no
                            AND pms_po_con.po_id=pms_iar_con.po_id
                            AND pms_ris_req.ris_no=$ris");
                            
                            
                        ?>
                        <h3 class="page-header" style = "color:#337ab7; font-size: 30px; font-family:Georgia;"><center>IAR <a href="iar_page.php?pr=<?php echo $pr; ?>&ris=<?php echo $ris; ?>" class="btn tbn-sm btn-primary">Create IAR</a></center></h3>
                        <?php 
                            while($row=mysqli_fetch_assoc($pocon)){ 
                            $po=$row['po_no'];
                            $iar=$row['iar_no'];
                            $comp=mysqli_query($mysqli,"SELECT company_name,po_total FROM pms_po,pms_supplier WHERE pms_po.company_id=pms_supplier.company_id AND pms_po.po_no=$po");
                            $crow=mysqli_fetch_assoc($comp); 
                            $iarcon=mysqli_query($mysqli,"SELECT iar_status,received_date,ins_date,inv_num,iar_date from pms_iar WHERE iar_no=$iar");
                            $iar=mysqli_fetch_assoc($iarcon);
                        ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <?php echo $crow['company_name']; ?>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <br>
                                                </div>
                                                <div class="col-md-2">
                                                    <label>IAR Status:</label><?php echo $iar['iar_status']; ?>
                                                </div>
                                                <div class="col-md-2">
                                                    <label>IAR Date: &nbsp;&nbsp;&nbsp;&nbsp;</label><?php echo $iar['iar_date']; ?>
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Invoice Number:</label><?php echo $iar['inv_num']; ?>
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Date Received:</label><?php echo $iar['received_date']; ?>
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Date Inspected:</label><?php echo $iar['ins_date']; ?>
                                                </div>
                                                <div class="col-md-1">
                                                    <br>
                                                </div>
                                            </div>
                                            <br>
                                            <form method="POST">
                                            <div class="table-responsive">
                                                <table width="100%" class="table table-striped table-bordered table-hover" border='2' id="dataTables-example">

                                                    <thead>
                                                        <tr class="info">
                                                            <th class="col-xs-2"><center>Item Name</center></th>
                                                            <th class="col-xs-1"><center>Unit</center></th>
                                                            <th class="col-xs-3"><center>Description</center></th>
                                                            <th class="col-xs-1"><center>Qty</center></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                            $risitems=mysqli_query($mysqli,"SELECT req_item,req_unit,req_desc,received_qty
                                                            FROM pms_po,pms_po_con,pms_supplier,pms_pr,pms_pr_con,pms_ris_req,pms_ris,pms_iar,pms_iar_con
                                                            WHERE pms_ris.ris_no=pms_ris_req.ris_no
                                                            AND pms_pr_con.req_item_id=pms_ris_req.req_item_id
                                                            AND pms_pr.pr_no=pms_pr_con.pr_no
                                                            AND pms_supplier.company_id=pms_po.company_id
                                                            AND pms_po.po_no=pms_po_con.po_no
                                                            AND pms_po_con.pr_id=pms_pr_con.pr_id
                                                            AND pms_iar.iar_no=pms_iar_con.iar_no
                                                            AND pms_iar_con.po_id=pms_po_con.po_id
                                                            AND pms_po_con.po_no=$po group by pms_iar.iar_no");
                                                            $x=0;
                                                            while($row=mysqli_fetch_assoc($risitems)){ ?>

                                                            <tr>
                                                                <td><center><?php echo $row['req_item'];?></center></td>
                                                                <td><center><?php echo $row['req_unit'];?></center></td>
                                                                <td><center><?php echo $row['req_desc'];?></center></td>
                                                                <td><center><?php echo $row['received_qty'];?></center></td>
                                                            </tr>
                                                        <?php
                                                            $x++;
                                                            }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            </form>
                                        </div>
                                     </div>
                                </div>
                            </div>
                            <hr>
                        
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