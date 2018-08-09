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
                        <h3 class="page-header" style = "color:#337ab7; font-size: 30px; font-family:Georgia;"><center>Purchase Request</center></h3>	
                        <div class="col-md-12">
						<div class="row">
            <div class="col-md-1">
            <a href="ris_page.php" button type="button" class="bbtn btn-outline btn btn-success btn"><i class="fa fa-reply fa-sm">Back</i></button></a>
            </div>
            <div class="col-md-11"></div>
            </div><br>
                            <?php
                                $ris=$_GET['ris'];
                                $sql1 = mysqli_query($mysqli, "SELECT ris_no,pms_ris.emp_no,concat(p_fname,' ',p_lname) as Name,req_date from pms_ris,pims_personnel WHERE pims_personnel.emp_no=pms_ris.emp_no AND pms_ris.ris_no=$ris");
                                $row1=mysqli_fetch_assoc($sql1);
                                
                                $checkpr=mysqli_query($mysqli,"SELECT pms_pr.pr_no FROM pms_pr_con,pms_pr,pms_ris_req,pms_ris 
                                WHERE pms_pr.pr_no=pms_pr_con.pr_no 
                                AND pms_ris_req.req_item_id=pms_pr_con.req_item_id
                                AND pms_ris.ris_no=pms_ris_req.ris_no
                                AND pms_ris_req.ris_no=$ris");
                                $chk=mysqli_num_rows($checkpr);
                                $no=mysqli_fetch_assoc($checkpr);
                                if(empty($chk)){ ?>
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <?php echo $row1['Name']." RIS no: ".$row1['ris_no']; ?>
                                </div>
                                <br>
                                <?php
                                $ris=$_GET['ris'];
                                $sql = mysqli_query($mysqli, "SELECT pms_ris_req.req_item_id,req_desc,req_item,req_qty,req_unit,concat(p_fname,' ',p_lname) as Name,req_date from pms_ris,pims_personnel,pms_ris_req WHERE pms_ris.ris_no=pms_ris_req.ris_no AND pims_personnel.emp_no=pms_ris.emp_no AND pms_ris_req.ris_no=$ris");

                                ?>
                                <div class="panel-body">
                                    <form method="POST">
                                    <div class="table-responsive">
                                        <table width="100%" class="table table-striped table-bordered table-hover" border='2' id="dataTables-example">

                                            <thead>
                                            <tr class="info">
                                                <th class="col-xs-3"><center>Item Name</center></th>
                                                <th class="col-xs-3"><center>Description</center></th>
                                                <th class="col-xs-1"><center>Quantity</center></th>
                                                <th class="col-xs-1"><center>Unit</center></th>
                                                <th class="col-xs-2"><center>Est Unit Cost</center></th>
                                                <th class="col-xs-2"><center>Total Cost</center></th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php  
                                                $x=1;
                                                $num=mysqli_num_rows($sql);
                                                while($row = mysqli_fetch_array($sql)){

                                                ?>

                                                <tr>
												<?php if ($num == $x) { ?>
														<input type="hidden" id="num_row" value="<?php echo $num;?>">
												<?php } ?>	
													<input type="hidden" id="num_<?php echo $x?>" value="<?php echo $x?>">
                                                    <input value="<?php echo $row['req_item_id'];?>" type="hidden" name="item[]">
                                                    <td><center><?php echo $row['req_item'];?></center></td>
                                                    <td><center><?php echo $row['req_desc'];?></center></td>
                                                    <td><center><input value="<?php echo $row['req_qty'];?>" type="hidden" id="qty_<?php echo $x?>"><?php echo $row['req_qty'];?></center></td>
                                                    <td><center><?php echo $row['req_unit'];?></center></td>
                                                    <td><center>
                                                        <div class="input-group">
                                                            <span class="input-group-addon" id="basic-addon1">&#8369;</span>
                                                            <input type="text" name="est[]" id="est_<?php echo $x?>" onChange="cal(<?php echo $x; ?>)" class="form-control est" placeholder="Estimated Cost" aria-describedby="basic-addon1" required>
                                                        </div>
                                                    </center></td>
                                                    <td><center>
                                                        <div class="input-group">
                                                            <span class="input-group-addon" id="basic-addon1">&#8369;</span>
                                                            <input type="text" name="tot[]" id="total_cost_<?php echo $x?>" onchange="calc()" class="form-control tot" placeholder="Total Cost" aria-describedby="basic-addon1" required></input>
                                                        </div>
                                                    </center></td>
                                                </tr>
                                            <?php 
                                                $x++;
                                                }
                                                ?>
                                                <tr>
                                                    <td><center></center></td>
                                                    <td><center></center></td>
                                                    <td><center></center></td>
                                                    <td><center>Total : </center></td>
                                                    <td><center>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">&#8369;</span>
                                                            <input type="text" disabled class="form-control"  id = "total_est" placeholder="     ----">
                                                        </div>
                                                    </center></td>
                                                    <td><center>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">&#8369;</span>
                                                            <input type="text" disabled id="total_unit_cost"  class="form-control" placeholder="     ----">
                                                        </div>
                                                    </center></td>
                                                </tr>
                                            </tbody>


                                        </table>
                                    </div>
                                        <center><button name="pr" class="btn btn-primary">Create Purchase Request</button></center>
                                    </form>
                                    <?php 
                                        if(isset($_POST['pr'])){
                                            $total=0;
                                            for($i=0;$i<$num;$i++){
                                                $tot=$_POST['tot'];
                                                $total+=$tot[$i];
                                            }
                                            $ttotal=number_format($total,2);
                                            mysqli_query($mysqli,"set autocommit=0");
                                            mysqli_query($mysqli,"start transaction");
                                            mysqli_query($mysqli,"LOCK TABLES PMS_pr,pms_pr_con WRITE");
                                            $nris=mysqli_query($mysqli,"INSERT INTO pms_pr(pr_total,pr_date,pr_status) VALUES($total,'$date','Pending')");
                                            if($nris){
                                                $id=mysqli_insert_id($mysqli);
                                                $er=0;
                                                $ok=0;
                                                $pr=$id;
                                                
                                                for($i=0;$i<$num;$i++){
                                                    $item=$_POST['item'];
                                                    $u_cost=$_POST['est'];
                                                    $t_cost=$_POST['tot'];
                                                    $pritem=mysqli_query($mysqli,"INSERT INTO pms_pr_con(pr_no,req_item_id,est_unit_cost,est_cost) VALUES ($id,$item[$i],$u_cost[$i],$t_cost[$i])");
                                                    if($pritem){
                                                        $ok+=1;
                                                    }else{
                                                        $er+=1;
                                                    }
                                                }
                                                if($er>=1){
                                                    mysqli_query($mysqli,"ROLLBACK");
                                                    echo "<script>alert('Purchase Request Error!'); window.location='pr_page.php?ris=$ris';</script>";
                                                }else{
                                                     $update_ris=mysqli_query($mysqli,"UPDATE pms_ris SET req_status = 'Approved' WHERE ris_no = $ris");
                                                    if($update_ris){
                                                        mysqli_query($mysqli,"COMMIT");
                                                echo "<script>alert('Purchase Request Sent!'); window.location='../fpdf/PR.php?pr=$id&ris=$ris';</script>";
                                                    
                                                    }else{
                                                        mysqli_query($mysqli,"ROLLBACK");
                                                echo "<script>alert('Purchase Request Error!'); window.location='pr_page.php?ris=$ris';</script>";
                                                    }
                                                    
                                                }
                                                
                                            }else{
                                                mysqli_query($mysqli,"ROLLBACK");
                                                echo "<script>alert('Purchase Request Error!'); window.location='pr_page.php?ris=$ris';</script>";
                                            }
                                            mysqli_query($mysqli,"UNLOCK TABLES");
                                        }

                                        ?>  
                                    <!-- /.table-responsive -->
                                </div>
                             </div>
                            <?php
                                }else{ 
                                $sql = mysqli_query($mysqli, "SELECT req_item,req_qty,req_unit,req_desc,est_unit_cost,est_cost FROM pms_pr_con,pms_pr,pms_ris_req,pms_ris 
                                WHERE pms_pr.pr_no=pms_pr_con.pr_no 
                                AND pms_ris_req.req_item_id=pms_pr_con.req_item_id
                                AND pms_ris.ris_no=pms_ris_req.ris_no
                                AND pms_ris_req.ris_no=$ris");
								
                                $tot_c=mysqli_query($mysqli, "SELECT pms_pr.pr_no,pr_total,pr_status FROM pms_pr_con,pms_pr,pms_ris_req,pms_ris 
                                WHERE pms_pr.pr_no=pms_pr_con.pr_no 
                                AND pms_ris_req.req_item_id=pms_pr_con.req_item_id
                                AND pms_ris.ris_no=pms_ris_req.ris_no
                                AND pms_ris_req.ris_no=$ris");
                                $totr=mysqli_fetch_assoc($tot_c);
                                $pr_no=$totr['pr_no'];
                            ?>
                            <div class="row">
                                <div class="col-md-10"><br></div>
                                <div class="col-md-2">
                                        
                                </div>
                            </div>
                            <br>
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <?php echo $row1['Name'];?>
                                    <br>
                                    <?php echo "PR no:"; echo $no['pr_no']; ?>
                                    <br>
                                    Status: <?php
                                        if($totr['pr_status']=='Approved'){
                                            echo "<span class='label label-success'>Approved</span>";
                                        }else if($totr['pr_status']=='Denied'){
                                            echo "<span class='label label-danger'>Denied</span>";
                                        }else{
                                            echo "<span class='label label-warning'>Pending</span>";
                                        }
                                    ?>
                                </div>
                                <div class="panel-body">
                                    <form method="POST">
                                    <div class="table-responsive">
                                        <table width="100%" class="table table-striped table-bordered table-hover" border='2' id="dataTables-example">

                                            <thead>
                                            <tr class="info">
                                                <th class="col-xs-3"><center>Item Name</center></th>
                                                <th class="col-xs-3"><center>Description</center></th>
                                                <th class="col-xs-1"><center>Quantity</center></th>
                                                <th class="col-xs-1"><center>Unit</center></th>
                                                <th class="col-xs-2"><center>Est Unit Cost</center></th>
                                                <th class="col-xs-2"><center>Total Cost</center></th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php  
                                                while($row = mysqli_fetch_array($sql)){

                                                ?>

                                                <tr>
                                                    <td><center><?php echo $row['req_item'];?></center></td>
                                                    <td><center><?php echo $row['req_desc'];?></center></td>
                                                    <td><center><?php echo $row['req_qty'];?></center></td>
                                                    <td><center><?php echo $row['req_unit'];?></center></td>
                                                    <td><center><?php echo $row['est_unit_cost'];?></center></td>
                                                    <td><center><?php echo $row['est_cost'];?></center></td>
                                                </tr>
                                            <?php 
                                                }
                                                
                                                ?>
                                                <tr>
                                                    <td><center></center></td>
                                                    <td><center></center></td>
                                                    <td><center></center></td>
                                                    <td><center></center></td>
                                                    <td><center>Items Total Cost: </center></td>
                                                    <td><center><?php echo $totr['pr_total'];?></center></td>
                                                </tr>
                                            </tbody>


                                        </table>
                                    </div>
                                        
                                    </form>
                                    <!-- /.table-responsive -->
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

			            <!-- SCRIPT FOR TOTAL COST AND TOTAL OF TOTAL COST -->
<script>
    function cal($i)
    {
		var x = document.getElementById('num_'+$i).value;
		var num_row = document.getElementById('num_row').value;
        var est = document.getElementById('est_'+x).value;
        var quantity = document.getElementById('qty_'+x).value;
		var total1 = est * quantity;
		
		if (num_row == x ) {
			document.getElementById('total_cost_'+x).value = (total1).toFixed(2);
			var sum = 0;
			for ($y=1; $y <= x ; $y++) {
				var num1 = document.getElementById('total_cost_'+$y).value;
				num1 = parseInt(num1);
				sum = sum + num1;

			}
			document.getElementById('total_unit_cost').value = (sum).toFixed(2);;
		}
		else {	
			document.getElementById('total_cost_'+x).value = (total1).toFixed(2);
		}
    }
    
</script>   

<!-- SCRIPT FOR TOTAL OF ESTIMATED COST -->
<script type='text/javascript'>
$(window).load(function(){
$.fn.Total = function() {
var total = 0;
this.each(function() {
   var num = parse($(this).val());
   total += num;
});
var total = total.toFixed(2);
document.getElementById('total_est').value = (total);
};


function parse(num_parse) {
    return (num_parse != '') ? parseFloat(num_parse) : 0;
}

$(document).ready(function(){
$('input[name^="est"]').bind('keyup', function() {
   $('#total_est').html( $('input[name^="est"]').Total());
});
});
});

</script>
        </body>
    </html>