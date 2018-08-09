<div class="panel-body">

<div class="container">
                    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header" style = "color:#337ab7; font-size: 30px; font-family:Georgia;"><center>SUPPLIER</center></h3>
					<center><button type="button" class="btn btn-outline btn-info btn" title="Add Supplier" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus">  Add</i></button>&nbsp;&nbsp;&nbsp;&nbsp;</br><br>
            
					<form action="insert_supplier.php" method="post">
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
                </div>
				
				<?php
				$sql = mysqli_query($mysqli, "SELECT * FROM pms_supplier")
							or die("Error: ".mysqli_error($mysqli));
				$sql2 = mysqli_query($mysqli, "SELECT pms_ris_req.req_item 
					FROM pms_ris_req, pms_pr_con,pms_po_con, pms_po, pms_supplier
					WHERE 
					pms_ris_req.req_item_id  = pms_pr_con.req_item_id 
					AND pms_pr_con.pr_id = pms_po_con.pr_id 
					AND pms_po_con.po_no  = pms_po.po_no 
					AND pms_po.company_id  = pms_supplier.company_id")
					or die("Error: ".mysqli_error($mysqli));
				?>


						<table id="featured-datatable" class="table table-striped table-hover table-bordered">
								<thead>
									<tr class="info">
								<th><center>Company Name</th>
								<th><center>Address</th>
								<th><center>Contact Number</th>
								<th><center>Status</th>
								<th><center>Transaction</th>
							</tr>
							</thead>
							
							<tbody>				
							<?php
							while($supplier = mysqli_fetch_array($sql))
							{
							   $com = $supplier['company_id']; ?>
							   
							<tr>
								<td><center><?php echo $supplier['company_name'];?></td>
								<td><center><?php echo $supplier['sup_address'];?></td>
								<td><center><?php echo $supplier['sup_contact'];?></td>
								<td><center><?php echo $supplier['supp_status'];?></td>
								<td><center>    
								<?php 
								$query_items = mysqli_query($mysqli, "SELECT * FROM pms_po, pms_po_con, pms_pr_con, pms_ris_req
									WHERE pms_po.po_no = pms_po_con.po_no
									AND pms_pr_con.pr_id = pms_po_con.pr_id
									AND pms_pr_con.req_item_id = pms_ris_req.req_item_id
									AND pms_po.company_id = $com")or die(mysqli_error($mysqli));
									$rows = mysqli_num_rows($query_items);
								?>
								<?php if (!empty($rows)) {?>
								<center><button class= "btn btn-info btn-square btn-sm" value="<?php echo $com;?>" href="view.php" onclick="view(this.value)" data-toggle="modal" data-target="#myModal2"><span class="fa fa-eye" aria-hidden="true" ></span> View</button>&nbsp;&nbsp;&nbsp;&nbsp;
								<?php } 
									else {?>
									<center><button class= "btn btn-info btn-square btn-sm disabled" value="<?php echo $com;?>" href="view.php"><span class="fa fa-eye" aria-hidden="true" ></span> View</button>&nbsp;&nbsp;&nbsp;&nbsp;
								<?php }?>
								</tr>
						</div>
							<?php } ?>
							</tbody>
							</table>
													
							<?php  ?>
							<div id="myModal2" class="modal fade" role="dialog">
							<div id="display"></div

										</div>	