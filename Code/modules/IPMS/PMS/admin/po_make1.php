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
        <link rel="stylesheet" href="../css/awesomplete.css" />
    
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

                  <div id="page-wrapper">                  
                      <div class="container">
                    <div class="col-lg-12">
				        <br>
                        <h3 class="page-header" style = "color:#337ab7; font-size: 30px; font-family:Georgia;"><center>Purchase Order</center></h3>	
                        <?php
                            $ris=$_GET['ris'];
                            $pr=$_GET['pr']; ?>
						<form role="form"  method="post" action = "" id="">
                            <div class="row">
                                <div class="col-lg-12" style="margin-left: 20px">
                                    <table class="table table-responsive" id="dynamic_field">
                                        <thead>
<!--
                                            <tr>
                                                <td colspan="5"><input type='button' name="name" id="add" value="Add" title="Add Item" class="btn btn-success btn-flat" style="float:right"></td>
                                            </tr>
-->
                                            <tr>
                                                <td><center><label>Supplier</label></center></td>
                                                <td><center><label>Delivery Date</label></center></td>
                                                <td><center><label>Delivery Term</label></center></td>
                                                <td><center><label>Payment</label></center></td>
                                            </tr>
                                        </thead>
                                        <tbody>				
                                            <tr id="0">
                                                <td><input type="text" id="sud" name="supp" class="awesomplete form-control" list="suppl">
                                                <datalist id="suppl">
                                                <?php
                                                $supp=mysqli_query($mysqli,"SELECT company_id,company_name FROM pms_supplier");
                                                while($dr=mysqli_fetch_assoc($supp)){
                                                echo "<option value='".$dr['company_name']."'>".$dr['company_name']."</option>";
                                                $compid = $dr['company_name'];
                                                }	
                                                ?>
                                                </datalist>
                                                </td>
                                                <td><input name="date" type="date" value="<?php echo $date;?>" class="form-control"></td>
                                                <td>
                                                 <select required name="dt" class="form-control">
                                                <option value="">Select Delivery Term</option>
                                                <option value="Pick Up">Pick Up</option>
                                                <option value="Delivery">Delivery</option>
                                                </select>
                                                </td>

                                                <td>
                                                <select required name="pay" class="form-control">
                                                    <option value="">Select Payment Method</option>
                                                    <option value="Cash">Cash</option>
                                                    <option value="Check">Check</option>
                                                    <option value="Credit">Credit</option>
                                                </select>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div><!--./col-xs-12 -->	
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12" style="margin-left : 10px ">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                    <tr class="info">
                                                        <th><center></center></th>
                                                        <th class="col-xs-2"><center>Item Name</center></th>
                                                        <th class="col-xs-1"><center>Unit</center></th>
                                                        <th class="col-xs-3"><center>Description</center></th>
                                                        <th class="col-xs-1"><center>Qty</center></th>
                                                        <th class="col-xs-2"><center>Unit Cost</center></th>
                                                        <th class="col-xs-2"><center>Amount</center></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $risitems=mysqli_query($mysqli,"SELECT pr_id,req_item,req_unit,req_desc,req_qty,est_unit_cost
                                                        FROM pms_pr,pms_pr_con,pms_ris_req,pms_ris
                                                        WHERE pms_ris.ris_no=pms_ris_req.ris_no
                                                        AND pms_pr_con.req_item_id=pms_ris_req.req_item_id
                                                        AND pms_pr.pr_no=pms_pr_con.pr_no
                                                        AND pms_pr.pr_no =$pr");
                                                        $x=1;
														$num = mysqli_num_rows($risitems);
                                                        while($row=mysqli_fetch_assoc($risitems)){ ?>
                                                        
                                                        <tr>
														<?php if ($num == $x) { ?>
																<input type="hidden" id="num_row" value="<?php echo $num;?>">
														<?php }?>	
															<input type="hidden" id="num_<?php echo $x;?>" value="<?php echo $x;?>">
                                                            <td><input value="<?php echo $row['pr_id'];?>" type="checkbox" name="item[]"checked></td>
                                                            <td><center><?php echo $row['req_item'];?></center></td>
                                                            <td><center><?php echo $row['req_unit'];?></center></td>
                                                            <td><center><?php echo $row['req_desc'];?></center></td>
                                                            <td><center><input value="<?php echo $row['req_qty'];?>" type="hidden" id="qty_<?php echo $x;?>"><?php echo $row['req_qty'];?></center></td>
                                                      
                                                            <td>
                                                                <center>
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon" id="basic-addon1">&#8369;</span>
                                                                        <input type="text" name="est[<?php echo $row['pr_id'];?>]" id="est_<?php echo $x?>" onChange="cal(<?php echo $x; ?>)" class="form-control est" placeholder="Unit Cost" aria-describedby="basic-addon1" required>
                                                                    </div>
                                                                </center>
                                                            </td>
                                                            <td>
                                                                <center>
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon" id="basic-addon1">&#8369;</span>
                                                                        <input type="text" name="tot[<?php echo $row['pr_id'];?>]" id="total_cost_<?php echo $x;?>" class="form-control tot" placeholder="Total Cost" aria-describedby="basic-addon1" required>
                                                                    </div>
                                                                </center>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                        $x++;
                                                        }
                                                    ?>
                                                <tr>
                                                    <td><center></center></td>
                                                    <td><center></center></td>
                                                    <td><center></center></td>                                                 
													<td><center></center></td>
                                                    <td><center><b>Total : </center></td>
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
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <center><button name="go" class="btn btn-primary">Proceed</button></center>
                                </div>
                            </div>
						</form>
                            <?php 
                if(isset($_POST['go'])){
                    $supp=$_POST['supp'];
                    $deldate=$_POST['date'];
                    $delterm=$_POST['dt'];
                    $pay=$_POST['pay'];
                    mysqli_query($mysqli,"set autocommit=0");
                    mysqli_query($mysqli,"start transaction");
                    mysqli_query($mysqli,"LOCK TABLES PMS_PO WRITE");
                    $inspo=mysqli_query($mysqli,"INSERT INTO pms_po(company_id,po_date,delivery_term,payment_term,delivery_date,po_total,po_status) VALUES ($compid,'$date','$delterm','$pay','$deldate',0,'Pending')");
                    if($inspo){
                        $po=mysqli_insert_id($mysqli);
                        mysqli_query($mysqli,"COMMIT");
                        echo "<script>alert('Purchase Order Added!'); window.location='po_make.php?po=$po&pr=$pr&ris=$ris';</script>";
                    }else{
                        mysqli_query($mysqli,"ROLLBACK");
                        echo "<script>alert('PO Error!'); window.location='po_make.php?pr=$pr&ris=$ris';</script>";
                    }
                    mysqli_query($mysqli,"UNLOCK TABLES");
                }
            ?>
                        <?php 
                                            if(isset($_POST['btn'])){
                                                $item=$_POST['item'];
                                                $est=$_POST['est'];
                                                $tot=$_POST['tot'];
                                                $total=0;
                                                $ct=count($item);
                                                $er=0;
                                                $ok=0;
                                                for($i=0;$i<$ct;$i++){
                                                    $total+=$tot[$item[$i]];
                                                }
                                                mysqli_query($mysqli,"set autocommit=0");
                                                mysqli_query($mysqli,"start transaction");
                                                mysqli_query($mysqli,"LOCK TABLES PMS_po,pms_po_con WRITE");
                                                $poup=mysqli_query($mysqli,"UPDATE pms_po SET po_total=$total WHERE po_no=$po");
                                                if($poup){
                                                    for($i=0;$i<$ct;$i++){
                                                        $nris=mysqli_query($mysqli,"INSERT INTO pms_po_con(po_no,pr_id,unit_cost,tot_amt) VALUES($po,$item[$i],".$est[$item[$i]].",".$tot[$item[$i]]." )");
                                                        if($nris){
                                                            $ok+=1;
                                                        }else{
                                                            $er+=1;
                                                        }
                                                    }
                                                    if($er>=1){
                                                        mysqli_query($mysqli,"ROLLBACK");
                                                        echo "<script>alert('Item Error!'); window.location='po_page.php?pr=$pr&po=$po&ris=$ris';</script>";
                                                    }else{
                                                        $update_pr=mysqli_query($mysqli,"UPDATE pms_pr SET pr_status = 'Approved' WHERE pr_no = $pr");
                                                    if($update_pr){
                                                        mysqli_query($mysqli,"COMMIT");
                                                 echo "<script>alert('Success!'); window.location='pr.php';</script>";     
                                                    
                                                    }else{
                                                        mysqli_query($mysqli,"ROLLBACK");
                                                echo "<script>alert('PR Error!'); window.location='pr_page.php?ris=$ris';</script>";
                                                    }
                                                    }
                                                }else{
                                                    mysqli_query($mysqli,"ROLLBACK");
                                                    echo "<script>alert('PO Error!'); window.location='po_page.php?pr=$pr&po=$po&ris=$ris';</script>";
                                                }
                                                mysqli_query($mysqli,"UNLOCK TABLES");
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
                
            </div>
			<form action="add_supplier.php" method="post">
					<div id="myModal" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myModalLabel">Add Supplier</h4>
						</div><br>
							<input required name="company_name" type="text" class="form-control" style="text-align: center;width:250px" placeholder="Supplier"><br>
							<input name="sup_address" type="text" class="form-control" style="text-align: center;width:250px" placeholder="Address"><br>
							<input name="sup_contact" type="text" class="form-control" style="text-align: center;width:250px" placeholder="Contact No."><br>
							<select class="form-control" name="supp_status"  style="text-align: center;width:250px">
								<option>Active</option>
								<option>Inactive</option>
							</select><br>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary" name="submit" id = "submit" >Submit</button>
							</div>

						</div>
					</div>
					</form>
					</div>

            
            <script src='../js/jquery.min.js'></script>
            <script src='../js/bootstrap.min.js'></script>
            <script src="../js/index.js"></script>
            <script src="../js/awesomplete.js"></script> 
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

<script>

		$(document).ready(function(){
			var i = 1;
			$('#add').click(function(){
				i++;
				$('#dynamic_field').append('<tr id="row'+i+'">'+
				'<td><select class="form-control" name="supp"></select></td>'+'<td><button type="button" class="btn btn-outline btn-info btn" title="Add Supplier" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i></button></td>'+
				'<td><input name="date" type="date" value="" class="form-control"></td>'+
				'<td><select required name="dt" class="form-control"><option value="">Select Delivery Term</option><option value="Pick Up">Pick Up</option><option value="Delivery">Delivery</option></select></td>'+
				'<td><select required name="pay" class="form-control"><option value="">Select Payment Method</option><option value="Cash">Cash</option><option value="Check">Check</option><option value="Credit">Credit</option></select>'+
					
					'<td><center><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></center></td></tr>	');
			});

			$(document).on('click','.btn_remove', function(){
				var button_id= $(this).attr("id");
				$('#row'+button_id+'').remove();
			});

			$('#submit').click(function(){
				$.ajax({
				url:"Reqform.php",
				method:"POST",
				data:$('#add_form').serialize(),
				success:function(data)
				{	
					$('#add_form')[0];			
				}	
				});	
			});
			
		});
	</script>	
        </body>
    </html>