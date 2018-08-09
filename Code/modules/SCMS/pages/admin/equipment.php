<?php

include("../../db_connect.php");
session_start();
include("../include/session.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link rel="stylesheet" href="../../css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../docs/docs.min.css">
    <link rel="stylesheet" href="../../css/w3.css">
    <link rel="stylesheet" href="../../css/sidebar-menu.css">
    <link rel="stylesheet" href="../../css/s.css">
    <link rel="stylesheet" href="../../css/style.css">
	<link rel="stylesheet" href="../../css/metisMenu.min.css" type="text/css">
	    <!-- DataTables CSS -->
    <link href="../../Template (reference)/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../../Template (reference)/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
	
    
    <!-- Icons CSS -->
    <link rel="stylesheet" href="../../css/font-awesome/css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
    <!-- Browser's Tab Image -->
    <link rel="shortcut icon" href="../../docs/img/pnhs_favicon.ico" type="image/x-icon">
    <link rel="icon" href="../../docs/img/pnhs_favicon.ico" type="image/x-icon">
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../../Template (reference)/vendor/jquery/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="../../Template (reference)/vendor/bootstrap/js/bootstrap.min.js"></script>
	<style>
	body {
        color: #404E67;
        background: #FFFFFF;
		font-family: 'arial', sans-serif;
	}	
	.icon-background4 {
    color: #36f40b;
	}
	</style>
</head>

    <body>
            
                <?php include("../include/topnav.php"); ?>
        <div id="wrapper">
		<?php include("../include/sidenav.php"); ?>
            <div id="page-content-wrapper">
            <div class="container-fluid" style="margin-right:40px;margin-left:70px;">
			<ol class="breadcrumb">
				<li><a href="index.php">School Clinic</a></li>
				<li class="active">Manage</li>
				<li class="active">Equipment</li>
			</ol>
                
			<!--Add Equipment Modal -->
            <div id="addequip" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <!-- Modal content-->
                            <form method="post" class="form-horizontal" role="form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h5 class="add_equip"><b>Add Equipment</b></h5>
                        </div>
                        <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="name">Code:</label>
                                    <div class="col-sm-6" style="text-align:right;padding-bottom:10px;">
                                        <input type="text" class="form-control" id="code" name="code" placeholder="code" autofocus required>
                                    </div>
                                     <label class="control-label col-sm-4" for="name">Name:</label>
                                    <div class="col-sm-6" style="text-align:right;padding-bottom:10px;">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" autofocus required>
                                    </div>                                   
                                </div>
                                    
                                </div>
             


                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="add_equip"><span class="glyphicon glyphicon-plus"></span> Add</button>
                            <button type="button" class="btn btn-info" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
                <div class="col-lg-12">
                    <h1 class="page-header">Equipment <small><small> Add, Edit and Out Equipment</small></small>
					<a href="#addequip" data-toggle="modal"><button type="button" style="float:right;margin-bottom:10px" class="btn btn-success" title="Add Equipment"><span class='fa fa-plus' aria-hidden='true'></span> Equipment</button></a>                        
                    </h1>
				</div>
                <!-- /.col-lg-12 -->
				
				<div class="col-lg-12">
                    <div class="row row-ribbon bg-info text-default" style="padding-left: 20px">
                    <br><p><strong>Note: </strong> Equipment stocks must be monitored regularly.</p><br>
                    </div>
                </div>    
				
                <div class="col-lg-12">
                        <div class="panel-body">
									
									<div class="row">
									<div class="col-lg-12">
									<div class="panel panel-primary">
									<div class="panel-body">
											<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables3-example">
												<thead>
													<tr>
														<th><small>Code</small></th>
														<th><small>Name</small></th>
														<th><small>Status</small></th>
                                                        <th><small>Action</small></th>                                                       
													</tr>
												</thead>
												<tbody>
													<?php
														$fetch_equipment = mysqli_query($mysqli, "SELECT * FROM scms_equipment")
														or die(mysqli_error($mysqli));
														
														$equipm = 0;
														while($equipment = mysqli_fetch_array($fetch_equipment))
														{
														
														$equipm++;
														
														echo'
														<tr class="odd gradeX">
														<td><small>'.$equipment['equip_code'].'</small></td>
														<td><small>'.strtoupper($equipment['equip_name']).'</small></td>
														<td><small>'.$equipment['equip_status'].'</small></td>
                                                        <td>
                                                            <div class="btn-group" role="group" aria-label="...">
                                                            <a href="#editequip'.$equipm.'"  data-toggle="modal"><button type="button"  class= "btn btn-info btn-square btn-sm" title="Edit Status"><span class="fa fa-edit" aria-hidden="true"></span></button></a>';														/*	
                                                            if($equipment['equip_stocks'] == 0)
															{
																echo'
																<a href="#minusequip'.$equipm.'" data-toggle="modal"><button disabled type="button"  class= "btn btn-primary btn-square btn-sm" title="Out Stocks"><span class="fa fa-minus" aria-hidden="truea"></span></button></a>'; 
                                                            }
															else
															{
																echo'
																<a href="#minusequip'.$equipm.'" data-toggle="modal"><button type="button"  class= "btn btn-primary btn-square btn-sm" title="Out Stocks"><span class="fa fa-minus" aria-hidden="true"></span></button></a>'; 
                                                           
															} 
															
															echo'
															<a href="#addequip'.$equipm.'"  data-toggle="modal"><button type="button"  class= "btn btn-info btn-square btn-sm" title="Add Stocks"><span class="fa fa-plus" aria-hidden="true"></span></button></a> */
                                                         echo '                      
                                                             </div>                                                           
														</td> 
														</tr>
														
														'; 
													?>
													
													<!-- Modal--> 
													<!-- <div class="modal fade" id="addequip<?php echo $equipm;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
														<form method="post" class="form-horizontal form-label-left" role="form">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																	<h4 class="modal-title" id="myModalLabel"><b>Add Stocks</b></h4>
																</div>
																<div class="modal-body">
                                                                    <div class="form-group">
                                                                        <input type="hidden" name="equipcode" value="<?php echo $equipment['equip_code']; ?>">
																		<label class="control-label col-sm-4" style="text-align:right;"for="equipname">Name:</label>
																			<div class="col-sm-6" style="padding-bottom:10px;">
																				<input type="text" class="form-control" id="name" name="name" placeholder="Brand Name" required readonly value="<?php echo $equipment['equip_name'];?>">
																			</div>
																		<label class="control-label col-sm-4" style="text-align:right;" for="quantity">Quantity:</label>
																			<div class="col-sm-6" style="padding-bottom:10px;">
																				<input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity" required min="1">
																			</div>
																  </div><br><br><br>
																  
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
																	<button type="submit" class="btn btn-primary" name = "save_equipqty">Add</button>
																</div>
															</div>
															<!-- /.modal-content -->
														</div>
														<!-- /.modal-dialog -->
														</form>
													</div> 
												<!-- /.modal -->
												<!-- out Modal--> 
												<!--	<div class="modal fade" id="minusequip<?php echo $equipm;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
														<form method="post" class="form-horizontal form-label-left" role="form">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                    <h5 class="modal-title" id="myModalLabel"><b>Out Stocks</b></h5>
																</div>
																<div class="modal-body">
																<div class="form-group">
																<input type="hidden" name="equipcode" value="<?php echo $equipment['equip_code']; ?>">
                                                                    <label class="control-label col-sm-4" style="text-align:right;"for="name">Name:</label>
																			<div class="col-sm-6" style="padding-bottom:10px;">
																				<input type="text" class="form-control" id="name" name="name" placeholder="Brand Name" required readonly value="<?php echo $equipment['equip_name'];?>">
																			</div>
																		<label class="control-label col-sm-4" style="text-align:right;" for="quantity">Quantity:</label>
																			<div class="col-sm-6" style="padding-bottom:10px;">
																				<input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity" required min="1" max = "<?php echo $equipment['equip_stocks'];?>">
																			</div>
																  </div><br><br><br>
																  
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
																	<button type="submit" class="btn btn-primary" name = "minus_equipqty">Out</button>
																</div>
															</div>
															<!-- /.modal-content -->
														</div>
														<!-- /.modal-dialog -->
														</form>
													</div> 
												<!-- /.modal -->
												<!-- edit Modal--> 
													<div class="modal fade" id="editequip<?php echo $equipm;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
														<form method="post" class="form-horizontal form-label-left" role="form">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																	<h4 class="modal-title" id="myModalLabel"><b>Edit Status</b></h4>
																</div>
																<div class="modal-body">
                                                                    <div class="form-group">
                                                                        <input type="hidden" name="equipcode" value="<?php echo $equipment['equip_code']; ?>">
																		<label class="control-label col-sm-4" style="text-align:right;"for="equipname">Name:</label>
																			<div class="col-sm-6" style="padding-bottom:10px;">
																				<input type="text" class="form-control" id="name" name="name" placeholder="Brand Name" required readonly value="<?php echo $equipment['equip_name'];?>">
																			</div>
																		<label class="control-label col-sm-4" style="text-align:right;" for="status">Status:</label>
																			<div class="col-sm-6" style="padding-bottom:10px;padding-bottom:10px;">
																				<select name = "stat" id = "stat" style="float:right" class="btn btn-default col-sm-12">
																				<option value = "NULL" disabled selected></option>
																				<option value = "Working fine">Working fine</option>
																				<option value = "Need repair">Need repair</option>
																				<option value = "Needs replacement">Needs replacement</option>
																				</select>
																			</div>
																  </div><br><br><br>
																  
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
																	<button type="submit" class="btn btn-primary" name = "save_equipedit">Save</button>
																</div>
															</div>
															<!-- /.modal-content -->
														</div>
														<!-- /.modal-dialog -->
														</form>
													</div>
												<!-- /.modal -->
													<?php
														}
														
															mysqli_query($mysqli, "LOCK TABLES scms_equipment WRITE");
																		 //Update Items
															if(isset($_POST['save_equipqty'])){
																$code = $_POST['equipcode'];
																$qty = $_POST['quantity'];
																
																$fetch_presequipqty = mysqli_query($mysqli, "SELECT equip_stocks 
																FROM scms_equipment
																WHERE equip_code = '".$code."'") 
																or die(mysqli_error($mysqli));
																
																$presequipqty = mysqli_fetch_array($fetch_presequipqty);
																$stocks = $presequipqty['equip_stocks'] + $qty;
																
																mysqli_autocommit($mysqli, FALSE);
																$update_presequipqty = mysqli_query($mysqli, "UPDATE scms_equipment SET 
																	equip_stocks='".$stocks."'
																	WHERE equip_code='".$code."'");
																
																	
																if($update_presequipqty)
																{
																	echo '<script>
																	alert("Successfully saved!");
																	window.location.href="equipment.php";
																	</script>';
																	mysqli_commit($mysqli);
																 } 
																else
																{
																	echo '<script>
																	alert("ERROR!");
																	window.location.href="equipment.php";
																	</script>';
																	mysqli_rollback($mysqli);
																}
															}
															
															//Minus Equipment
															if(isset($_POST['minus_equipqty'])){
																$code = $_POST['equipcode'];
																$qty = $_POST['quantity'];
																
																$fetch_presequipqty = mysqli_query($mysqli, "SELECT equip_stocks 
																FROM scms_equipment
																WHERE equip_code = '".$code."'") 
																or die(mysqli_error($mysqli));
																
																$presequipqty = mysqli_fetch_array($fetch_presequipqty);
																$stocks = $presequipqty['equip_stocks'] - $qty;
																
																mysqli_autocommit($mysqli, FALSE);
																$update_presequipqty = mysqli_query($mysqli, "UPDATE scms_equipment SET 
																	equip_stocks='".$stocks."'
																	WHERE equip_code='".$code."'");
																	
																if($update_presequipqty)
																{
																	echo '<script>
																	alert("Successfully saved!");
																	window.location.href="equipment.php";
																	</script>';
																	mysqli_commit($mysqli);
																 } 
																else
																{
																	echo '<script>
																	alert("ERROR!");
																	window.location.href="equipment.php";
																	</script>';
																	mysqli_rollback($mysqli);
																}
															}
															
															//Edit Equipment
															if(isset($_POST['save_equipedit'])){
																$code = $_POST['equipcode'];
																
																if(empty($_POST['stat']))
																{
																	$stat = "NULL";
																}
																else
																{
																	$stat = $_POST['stat'];
																}
																
																$fetch_presequipqty = mysqli_query($mysqli, "SELECT * 
																FROM scms_equipment
																WHERE equip_code = '".$code."'") 
																or die(mysqli_error($mysqli));
																
																if($stat == "NULL")
																{
																	echo '<script>
																	alert("Please select status!");
																	window.location.href="equipment.php";
																	</script>';
																	mysqli_rollback($mysqli);
																}
																else{
																
																	mysqli_autocommit($mysqli, FALSE);
																	$update_presequipqty = mysqli_query($mysqli, "UPDATE scms_equipment SET 
																		equip_status='".$stat."'
																		WHERE equip_code='".$code."'");
																		
																	if($update_presequipqty)
																	{
																		echo '<script>
																		alert("Successfully saved!");
																		window.location.href="equipment.php";
																		</script>';
																		mysqli_commit($mysqli);
																	 } 
																	else
																	{
																		echo '<script>
																		alert("ERROR!");
																		window.location.href="equipment.php";
																		</script>';
																		mysqli_rollback($mysqli);
																	}
																}
															}
															
															
													?>
													
												</tbody>
											</table>
											<!-- /.table-responsive -->
											
										</div>
										<!-- /.panel-body -->
									</div>
									<!-- /.panel -->
									</div>
									</div>
									
                                    
							
				<?php		  //Add Item        
 
					
					if(isset($_POST['add_equip'])){
                        $name = $_POST['name'];
						$code = $_POST['code'];
						$status = "Working fine";
						
						$fetch_e = mysqli_query($mysqli, "SELECT COUNT(equip_code) FROM scms_equipment")
						or die(mysqli_error($mysqli));
						$fetch_eq = mysqli_fetch_array($fetch_e);
						mysqli_autocommit($mysqli, FALSE);
                        $sql = mysqli_query($mysqli, "INSERT INTO scms_equipment
						(equip_code, equip_name, equip_status)
						VALUES ('".$code."', '".$name."', '".$status."')")
						or die(mysqli_error($mysqli));
                        
						if($sql)
						{
								echo '<script>
								alert("Successfully saved!");
								window.location.href="equipment.php";
								</script>';
								mysqli_commit($mysqli);
						 } 
						else
						{
							echo '<script>
								alert("Cannot save customer record!");
								window.location.href="equipment.php";
								</script>';
								mysqli_rollback($mysqli);
						}
                    }
					mysqli_query($mysqli, "UNLOCK TABLES");
				?>

							<!--Add Medicine Modal -->

            </div>
			
            </div>				
               
	</div>
		<br><br><br>
            <!-- Footer --> 
            <?php include "../../pages/include/footer.php"; ?>
        </div>
    </div>
    
    <script src="../../js/index.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../js/alert.js"></script>
<script src="../../js/slideshow.js"></script>
<script src="../../js/backToTop.js"></script>
<script src="../../js/sideNavII.js"></script>
<script src="../../js/showNav.js"></script>
<script src="../../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script> 
<script src="../../vendor/datatables-responsive/dataTables.responsive.js"></script>     
<script src="../../js/metisMenu.min.js"></script>     <script src="../../js/sb-admin-2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTables3-example').DataTable({
            responsive: true
        });
    });
    </script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../Template%20(reference)/vendor/jquery/jquery-3.0.0.min.js"></script>
<script src="../../js/sidebar-menu.js"></script>
<script src="../../js/sideNav.js"></script>
<script>
$.sidebarMenu($('.sidebar-menu'))
</script>


</body>

</html>
