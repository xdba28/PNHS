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
				<li class="active">Supplies</li>
			</ol>
                
			<!--Add Supply Modal -->
            <div id="addsup" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <!-- Modal content-->
                    <form method="post" class="form-horizontal" role="form">
                    <div class="modal-content">
                        <div class="modal-header " >
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h5 class="modal-title"><b>Add Supply</b></h5>
                        </div>
                        <div class="modal-body">
                                <div class="form-group" >
                                    <label class="control-label col-sm-4" for="name">Name:</label>
                                    <div class="col-sm-6"  style="padding-bottom:10px;">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" autofocus required>
                                    </div>
									<label class="control-label col-sm-4" for="stocks">Stocks:</label>
                                    <div class="col-sm-6">
                                        <input type="number"  min = "1" class="form-control" id="stocks" name="stocks" required>
                                    </div>
                             </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="add_sup"><span class="glyphicon glyphicon-plus"></span> Add</button>
                            <button type="button" class="btn btn-info" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
                <div class="col-lg-12">
                    <h1 class="page-header">Supplies <small><small> Add, Edit and Out Supplies</small></small>
						<a href="#addsup" data-toggle="modal"><button type="button" style="float:right;margin-bottom:10px" class="btn btn-success" title="Add Supplies" ><span class='fa fa-plus' aria-hidden='true'></span> Supplies</button></a>                        
                    </h1>
				</div>

                <!-- /.col-lg-12 -->
				<div class="col-lg-12">
                    <div class="row row-ribbon bg-info text-default" style="padding-left: 20px">
                    <br><p><strong>Reminder </strong> Supply stocks must be monitored regularly.</p><br>
                    </div>
                </div>           
				
                <div class="col-lg-12">
                        <div class="panel-body">

									
									<div class="row">
									<div class="col-lg-12">
									<div class="panel panel-primary">
										<div class="panel-body">
											<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables2-example">
												<thead>
													<tr>
														<th><small>Name</small></th>
														<th><small>In Stock</small></th>
                                                        <th><small>Action</small></th>                                                       
													</tr>
												</thead>
												<tbody>
													<?php
														mysqli_query($mysqli, "LOCK TABLES scms_supplies READ");
														$fetch_supplies = mysqli_query($mysqli, "SELECT * FROM scms_supplies")
														or die(mysqli_error($mysqli));
														
														while($supplies = mysqli_fetch_array($fetch_supplies))
														{
														echo'
														<tr class="odd gradeX">
														<td><small>'.strtoupper($supplies['supp_name']).'</small></td>
														<td><small>'.$supplies['supp_stocks'].'</small></td>
														<td>
                                                            <div class="btn-group" role="group" aria-label="...">
                                                            <a href="#addsup'.$supplies['supp_no'].'"  data-toggle="modal"><button type="button" style="float:right;margin-left:1px" class= "btn btn-info btn-square btn-sm" title="Add Stocks" ><span class="fa fa-plus" aria-hidden="true"></span></button></a>';
                                                           if($supplies['supp_stocks'] == 0)
														   {
															   echo'
															   <a href="#minussup'.$supplies['supp_no'].'" data-toggle="modal"><button disabled type="button"  class= "btn btn-primary btn-square btn-sm" title="Out Stocks" ><span class="fa fa-minus" aria-hidden="true"></span></button></a>';                   
														   }
														   else
														   {
															   echo'
															   <a href="#minussup'.$supplies['supp_no'].'" data-toggle="modal"><button type="button"  class= "btn btn-primary btn-square btn-sm" title="Out Stocks" ><span class="fa fa-minus" aria-hidden="true"></span></button></a>';   
														   }
														  
														echo'</div>
                                                             
														</td>                                                       
														</tr>';
														
													?>
													
													<!--add Modal--> 
													<div class="modal fade" id="addsup<?php echo $supplies['supp_no']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
														<form method="post" class="form-horizontal" role="form">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                    <h5 class="modal-title" id="myModalLabel"><b>Add Stocks</b></h5>
																</div>
																<div class="modal-body">
																
																  <div class="form-group">
                                                                      <input type="hidden" name="supno" value="<?php echo $supplies['supp_no']; ?>">
																		<label class="control-label col-sm-4" style="text-align:right;" for="name">Name:</label>
																			<div class="col-sm-6"  style="padding-bottom:10px;">
																				<input type="text" class="form-control" id="name" name="name" placeholder="Supply Name" required readonly value="<?php echo $supplies['supp_name'];?>">
																			</div>
																		<label class="control-label col-sm-4"  style="text-align:right;" for="quantity">Quantity:</label>
																			<div class="col-sm-6">
																				<input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity" required min="1">
																			</div><br><br><br>
                                                                    </div>
																  
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
																	<button type="submit" class="btn btn-primary" name = "save_supqty">Add</button>
																</div>
															</div>
															<!-- /.modal-content -->
														</div>
														<!-- /.modal-dialog -->
														</form>
													</div>
												<!-- /.modal -->
												
												<!--minus Modal--> 
													<div class="modal fade" id="minussup<?php echo $supplies['supp_no']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
														<form method="post" class="form-horizontal" role="form">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                    <h5 class="modal-title" id="myModalLabel"><b>Out Stocks</b></h5>
																</div>
																<div class="modal-body">
																  <div class="form-group">
                                                                      <input type="hidden" name="supno" value="<?php echo $supplies['supp_no']; ?>">
																		<label class="control-label col-sm-4" style="text-align:right;" for="name">Name:</label>
																			<div class="col-sm-6"  style="padding-bottom:10px;">
																				<input type="text" class="form-control" id="name" name="name" placeholder="Supply Name" required readonly value="<?php echo $supplies['supp_name'];?>">
																			</div>
																		<label class="control-label col-sm-4"  style="text-align:right;" for="quantity">Quantity:</label>
																			<div class="col-sm-6">
																				<input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity" required min="1" max = "<?php echo $supplies['supp_stocks'];?>">
																			</div><br><br><br>
                                                                    </div>
                                                                    
																  
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
																	<button type="submit" class="btn btn-primary" name = "minus_supqty">Out</button>
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
														mysqli_query($mysqli, "UNLOCK TABLES");
																		 //Update Items
															if(isset($_POST['save_supqty'])){
																$suppno = $_POST['supno'];
																$qty = $_POST['quantity'];
																mysqli_autocommit($mysqli, FALSE);
																mysqli_query($mysqli, "LOCK TABLES scms_supplies WRITE");
																$fetch_pressupqty = mysqli_query($mysqli, "SELECT supp_stocks 
																FROM scms_supplies
																WHERE supp_no = '".$suppno."'") 
																or die(mysqli_error($mysqli));
																
																$pressupqty = mysqli_fetch_array($fetch_pressupqty);
																$stocks = $pressupqty['supp_stocks'] + $qty;
																
																
																$update_pressupqty = mysqli_query($mysqli, "UPDATE scms_supplies SET 
																	supp_stocks='".$stocks."'
																	WHERE supp_no='".$suppno."'");
																mysqli_commit($mysqli);
																	
																if($update_pressupqty)
																{
																	echo '<script>
																	alert("Successfully saved!");
																	window.location.href="supplies.php";
																	</script>';
																	mysqli_commit($mysqli);
																 } 
																else
																{
																	echo '<script>
																	alert("Cannot update supply!!");
																	window.location.href="supplies.php";
																	</script>';
																	mysqli_rollback($mysqli);
																}
																mysqli_query($mysqli, "UNLOCK TABLES");
															}
															
																 //Minus supply
															if(isset($_POST['minus_supqty'])){
																$suppno = $_POST['supno'];
																$qty = $_POST['quantity'];
																mysqli_autocommit($mysqli, FALSE);
																mysqli_query($mysqli, "LOCK TABLES scms_supplies WRITE");
																$fetch_pressupqty = mysqli_query($mysqli, "SELECT supp_stocks 
																FROM scms_supplies
																WHERE supp_no = '".$suppno."'") 
																or die(mysqli_error($mysqli));
																
																$pressupqty = mysqli_fetch_array($fetch_pressupqty);
																$stocks = $pressupqty['supp_stocks'] - $qty;
																
																
																$update_pressupqty = mysqli_query($mysqli, "UPDATE scms_supplies SET 
																	supp_stocks='".$stocks."'
																	WHERE supp_no='".$suppno."'");
																mysqli_commit($mysqli);
																	
																if($update_pressupqty)
																{
																	echo '<script>
																	alert("Successfully saved!");
																	window.location.href="supplies.php";
																	</script>';
																	mysqli_commit($mysqli);
																 } 
																else
																{
																	echo '<script>
																	alert(Cannot update supply!");
																	window.location.href="supplies.php";
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
									<!-- /.panel -->
									</div>
									</div>
									
                                    
							
				<?php		  //Add Item        


					if(isset($_POST['add_sup'])){
                        $name = $_POST['name'];
                        $stocks = $_POST['stocks'];
						mysqli_autocommit($mysqli, FALSE);
						mysqli_query($mysqli, "LOCK TABLES scms_supplies WRITE");
						$fetch_s = mysqli_query($mysqli, "SELECT COUNT(supp_no) FROM scms_supplies")
						or die(mysqli_error($mysqli));
						$fetch_su = mysqli_fetch_array($fetch_s);
						$suppno = $fetch_su['COUNT(supp_no)'] + 1;
						$level = 0;
						
                        $sql = mysqli_query($mysqli, "INSERT INTO scms_supplies
						(supp_no, supp_name, supp_stocks)
						VALUES ('".$suppno."', '".$name."', '".$stocks."')")
						or die(mysqli_error($mysqli));
                        
						if($sql)
						{
								echo '<script>
								alert("Successfully saved!");
								window.location.href="supplies.php";
								</script>';
								mysqli_commit($mysqli);
						 } 
						else
						{
							echo '<script>
								alert("Cannot add supply!");
								window.location.href="supplies.php";
								</script>';
								mysqli_rollback($mysqli);
						}
						mysqli_query($mysqli, "UNLOCK TABLES");
                    }
					

				?>

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
<script src="../../vendor/datatables-responsive/dataTables.responsive.js"></script>     
<script src="../../js/metisMenu.min.js"></script>     <script src="../../js/sb-admin-2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTables2-example').DataTable({
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
