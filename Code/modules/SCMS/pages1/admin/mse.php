
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
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Browser's Tab Title -->
    <title>Admin</title>
      
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../../css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="../../css/w3.css">
    
    <!-- Documents Path -->
    <link rel="stylesheet" href="../../docs/docs.min.css">
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

    <!-- Bootstrap -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
				<li class="active">Medicine</li>
			</ol>
                
			<!--Add Medicine Modal -->
            <div id="addmed" class="modal fade" role="dialog">
                <div class="modal-dialog modal-md">
                    <form method="post" class="form-horizontal" role="form">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h5 class="modal-title"><b>Add Medicine</b></h5>
                        </div>
                        <div class="modal-body"  style="margin-right:10px;">
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="gen_name">Generic Name:</label>
                                    <div class="col-sm-6 " style="padding-bottom:10px;">
                                        <input type="text" class="form-control" id="gen_name" name="gen_name" placeholder="Generic Name" autofocus required>
                                    </div>
                                    <label class="control-label col-sm-4" for="brand_name">Brand Name:</label>
                                    <div class="col-sm-6" style="padding-bottom:10px;">
                                        <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="Brand Name" required>
                                    </div>
                                    <label class="control-label col-sm-4" for="stocks">Stocks:</label>
                                    <div class="col-sm-6" style="padding-bottom:10px;">
                                        <input type="number" class="form-control" min = "1" id="stocks" name="stocks" placeholder="Stocks" required>
                                    </div>
									<label class="control-label col-sm-4" for="exp_date">Expiration Date:</label>
                                    <div class="col-sm-6" >
                                        <input type="date" class="form-control" id="exp_date" name="exp_date" required>
                                    </div>
                                </div>

                        </div>
                        <div class="modal-footer" style="margin-right:10px;">
                            <button type="submit" class="btn btn-primary" name="add_med"><span class="glyphicon glyphicon-plus"></span> Add</button>
                            <button type="button" class="btn btn-info" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>

                <div class="col-lg-12">
                    <h1 class="page-header">Medicine<small><small> Add, Edit Medicine</small></small>
						<a href="#addmed" data-toggle="modal"><button type="button" style="float:right;margin-bottom:10px" class="btn btn-success" title="Add Medicine"><span class='fa fa-plus' aria-hidden='true'></span> Medicine</button></a>    
                    </h1>

                    <div class="row row-ribbon bg-info text-default" style="padding-left: 20px">
                    <br><p><strong>Note: </strong> Medicine stocks are updated automatically.</p><br>
                    </div>

				<br>		
				<div class="panel panel-primary">
                        <div class="panel-body tooltip-demo">
                            <table width="100%" class="table table-bordered table-striped table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                                        <th><small>Brand Name</small></th>
														<th><small>Generic Name</small></th>
														<th><small>In Stock</small></th>
														<th><small>Expiration date</small></th>
    												    <th><small>Action</small></th>
													</tr>
												</thead>
												<tbody>
													<?php
														mysqli_query($mysqli, "LOCK TABLES scms_medicine READ");
														$fetch_medicine = mysqli_query($mysqli, "SELECT * FROM scms_medicine")
														or die(mysqli_error($mysqli));
														
														while($medicine = mysqli_fetch_array($fetch_medicine))
														{
														echo'
														<tr class="odd gradeX">
														<td><small>'.strtoupper($medicine['brand_name']).'</small></td>
														<td><small>'.strtoupper($medicine['gen_name']).'</small></td>
														<td class="center"><small>'.$medicine['stocks'].'</small></td>
														<td><small>'.$medicine['exp_date'].'</small></td>
  														<td>
                                                        <div class="btn-group" role="group" aria-label="...">
                                                            <a href="#add'.$medicine['med_no'].'" data-toggle="modal"><button type="button" class= "btn btn-info btn-square btn-sm"  title="Add Stocks"><span class="fa fa-plus" aria-hidden="true" ></span></button></a>
                                                        </div>															
    												    </td>                                                      
														</tr>';
														
													?>
													
											<!-- Modal--> 
													<div class="modal fade" id="add<?php echo $medicine['med_no']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
														
														<div class="modal-dialog">
                                                            <form method="post" class="form-horizontal" role="form">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                    <h5 class="modal-title" id="myModalLabel"><b>Add Stocks</b></h5>
																</div>
																<div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-sm-4" style="text-align:right;" for="brand_name">Brand Name:</label>
																			<div class="col-sm-6" style="padding-bottom:5px;">
                                                                                <input type="hidden" name="medno" value="<?php echo $medicine['med_no']; ?>">
																				<input type="text" class="form-control" id="brand" name="brand" placeholder="Brand Name" required readonly value="<?php echo $medicine['brand_name'];?>">
																			</div>
                                                                            <label class="control-label col-sm-4" style="text-align:right;"for="gen_name">Generic Name:</label>
																			<div class="col-sm-6" style="padding-bottom:5px;">
																				<input type="text" class="form-control" id="gen" name="gen" placeholder="Gen Name" required readonly value="<?php echo $medicine['gen_name']; ?>">
																			</div>
                                                                            <label class="control-label col-sm-4" style="text-align:right;" for="quantity">Quantity:</label><br><br><br>
																			<div class="col-sm-6">
																				<input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity" required min="1">
																			</div><br>
                                                                      </div>
																  </div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
																	<button type="submit" class="btn btn-primary" name = "save_medqty">Add</button>
																</div>
															</div>
															<!-- /.modal-content -->
														
														<!-- /.modal-dialog -->
														</form>
													</div></div>
												<!-- /.modal -->
													
													<?php
														}mysqli_query($mysqli, "UNLOCK TABLES");
																		 //Update Items
															if(isset($_POST['save_medqty'])){
																$medno = $_POST['medno'];
																$qty = $_POST['quantity'];
																
																mysqli_query($mysqli, "LOCK TABLES scms_medicine WRITE");
																$fetch_presqty = mysqli_query($mysqli, "SELECT stocks 
																FROM scms_medicine
																WHERE med_no = '".$medno."'") 
																or die(mysqli_error($mysqli));
																
																$presqty = mysqli_fetch_array($fetch_presqty);
																
																
																$stocks = $presqty['stocks'] + $qty;
																
																mysqli_autocommit($mysqli, FALSE);
																$update_presqty = mysqli_query($mysqli, "UPDATE scms_medicine SET 
																	stocks='".$stocks."'
																	WHERE med_no='".$medno."'");
																	
																if($update_presqty)
																{
																	echo '<script>
																	alert("Successfully saved!");
																	window.location.href="mse.php";
																	</script>';
																	mysqli_commit($mysqli);
																	
																 } 
																else
																{
																	echo '<script>
																	alert("Cannot save patient record!");
																	window.location.href="mse.php";
																	</script>';
																	mysqli_rollback($mysqli);
																}
																mysqli_query($mysqli, "UNLOCK TABLES");
															}
													?>
													
												</tbody>
											</table>
											<!-- /.table-responsive -->
                       </div>
                        <!-- /.panel-body -->
                    </div>
                    </div> 
				<?php		  //Add Item        
                    if(isset($_POST['add_med'])){
                        $gen = $_POST['gen_name'];
                        $brand = $_POST['brand_name'];
                        $stocks = $_POST['stocks'];
                        $exp = $_POST['exp_date'];
						mysqli_autocommit($mysqli, FALSE);
						mysqli_query($mysqli, "LOCK TABLES scms_medicine WRITE");
						$fetch_m = mysqli_query($mysqli, "SELECT COUNT(med_no) FROM scms_medicine")
						or die(mysqli_error($mysqli));
						$fetch_me = mysqli_fetch_array($fetch_m);
						$medno = $fetch_me['COUNT(med_no)'] + 1;
						
						
                        $sql = mysqli_query($mysqli, "INSERT INTO scms_medicine
						(med_no, gen_name, brand_name, stocks, exp_date)
						VALUES ('".$medno."', '".$gen."', '".$brand."', '".$stocks."', '".$exp."')")
						or die(mysqli_error($mysqli));
                        
						if($sql)
						{
								echo '<script>
								alert("Successfully saved!");
								window.location.href="mse.php";
								</script>';
								mysqli_commit($mysqli);
						 } 
						else
						{
							echo '<script>
								alert("Cannot save customer record!");
								window.location.href="mse.php";
								</script>';
								mysqli_rollback($mysqli);
						}
						mysqli_query($mysqli, "UNLOCK TABLES");
                    }

					
				?>					
        </div>
            <br><br><br>
            <!-- Footer --> 
            <?php include "../../pages/include/footer.php"; ?>
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
<script src="../../vendor/datatables-responsive/dataTables.responsive.js"></script>     
<script src="../../js/metisMenu.min.js"></script>     <script src="../../js/sb-admin-2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
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
