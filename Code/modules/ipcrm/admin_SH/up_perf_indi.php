<!DOCTYPE html>
<?php
	include 'connection.php';
 
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Browser's Tab Title -->
    <title>Admin</title>
      
        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="../css/w3/w3.css">
    
    <!-- Documents Path --->
    <link rel="stylesheet" href=".docs/docs.min.css">
    
    <!--Include your modified CSS below as needed-->
    <link rel="stylesheet" href="../css/w3/blue.css">
    <link rel="stylesheet" href="../css/w3/yellow.css">
    <link rel="stylesheet" href="../css/w3/w3.css">
    <link rel="stylesheet" href="../css/sideNav.css">
    <link rel="stylesheet" href="../css/backToTop.css">
    <link rel="stylesheet" href="../css/alert.css">
    
    <!-- Icons CSS -->
    <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css" type="text/css">
    
    <!-- Browser's Tab Image -->
    <link rel="shortcut icon" href="../docs/pnhs_img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../docs/img/pnhs_favicon.ico" type="image/x-icon">
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="../css/w3/w3.css">
    
    <!-- Documents Path --->
    <link rel="stylesheet" href="..docs/docs.min.css">
    
    <!--Include your modified CSS below as needed-->
    <link rel="stylesheet" href="../css/w3/blue.css">
    <link rel="stylesheet" href="../css/w3/yellow.css">
    <link rel="stylesheet" href="../css/w3/w3.css">
    <link rel="stylesheet" href="../css/sidebar-menu.css">
    
    <!-- Icons CSS -->
    <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css" type="text/css">
    
    <!-- DataTables Responsive CSS -->
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    
    <!-- Browser's Tab Image -->
    <link rel="shortcut icon" href="../docs/img/pnhs_favicon.ico" type="image/x-icon">
    <link rel="icon" href="../docs/img/pnhs_favicon.ico" type="image/x-icon">
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../Template (reference)/vendor/jquery/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="../Template (reference)/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Bootstrap -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
		.table{
			margin-bottom:100px;
		}
	</style>
	</head>

<body>
<div class="w3-theme-bd5 w3-card-4 navbar navbar-fixed-top" style="background-color:rgba(42,101,149,0.95)!important">
<div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed fa fa-bars hidden-sm hidden-md hidden-lg" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
      </button>
      <a class="navbar-brand" style="padding-top:5px;margin-left:5px" href="../pages/index.html"><img src="../docs/img/pnhs_logo.png" style="max-width:40px;margin-left:50px;margin-right:50px"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <form class="navbar-form navbar-left hidden-sm">
        </form>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><i class="fa fa-bell fa-fw"></i> Notification</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user">  <?php echo $nrow['Name']; ?></i>  <b class="caret"></b></a>
            <ul class="dropdown-menu">
             
              <li class="divider"></li>
              <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
    </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
<hr class="w3-theme-yd2" style="height:3px; border:0; margin-top:0px; margin-bottom:0px;">
<hr class="w3-theme-bd2" style="height:3px; border:0; margin-top:0px; margin-bottom:0px;">
</div>
<div class="row">
    <div class="col-lg-2 col-md-3 col-sm-3 hidden-xs">
        <div class="navbar navbar-fixed-top" style="width:200px; margin-top:56px">
            <ul class="sidebar-menu">
              <li class="sidebar-header">MAIN NAVIGATION</li>
              <li><a href="ipcrms_index2.php"><i class="fa fa-home"></i> <span>Home</span></a></li>      
                <li><a href="ipcrms_update.php"><i class="fa fa-circle-o"></i> Update Form</a></li>  
              <li>
                <a href="#">
                  <i class="fa fa-files-o"></i>
                  <span>View Form</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                  <li><a href="view_formMasterTeacher.php"><i class="fa fa-circle-o"></i> Master Teacher</a></li>
                  <li><a href="view_formTeacher.php"><i class="fa fa-circle-o"></i> Teacher I-III</a></li>    
                </ul>
              </li>
              <li>
                <a href="ipcrms_rating.php">
                  <i class="fa fa-pie-chart"></i>
                  <span>Overall Rating</span>
                </a>
              </li>
             <li>
                  <a href="ipcrms_monitor.php">
                      <i class="fa fa-list "></i>
                      <span>Submission</span></a></li>
            <li>
                  <a href="ipcrms_trans_rec.php">
                      <i class="fa fa-check "></i>
                      <span>Reports</span></a></li>
              <li class="sidebar-header">
                <a data-toggle="modal" data-target="#popup2">SET DEADLINE</a>	
  		      </li>    
              <li style="padding-bottom:100%"></li>     
     <br><br><br><br><br><br><br><br>    
            </ul>
        </div>
    </div><div class="col-lg-10 col-md-9 col-sm-9">
<div class="container-fluid" style="height:700px;max-width:100%;margin-top:70px;margin-right:20px;margin-left:20px;margin-bottom:10px">
       <center>
							<div class="modal fade" id="popup2" role="dialog" style="top:130;">
								<div class="modal-dialog">
										<!-- Modal content-->
						<div class="modal-content" style="width: 600;background-color: rgb(255, 255, 255);">
						<div class="modal-header" style="padding:10px 80px;">
					       <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
						</div>
					<div class="modal-body" style="padding:20px 80px;">
                        <p><font size="4" color="black">
                            <strong>SETTING DEADLINE</strong> </font></p>
                                <br>
                        <font size="2" color="black">
                                <strong>Set Date </strong>
                                    <input type="date" id="edit_startdate" name="edit_startdate">
                                &nbsp;&nbsp;&nbsp;
                                <strong>Set Time </strong>
                                    <input type="time" class="timepicker edit_starttime" name="edit_starttime">
                                </font>
                        <br><br><br>
                        <button type="button" class="btn btn-primary">SUBMIT</button>
					</div>
						</div>
                                    
              
								</div>
						  </div>  
<br><br>			
<div class="container-fluid" style="max-width:100%;margin-right:100px;margin-left:100px">
		<article>				
 				<div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="display:none">
                            </div>
	
    </center>
					<thead>
    <div class="container-fluid">
					<!-- Page Heading -->
					<div class="row">
						<div class="col-lg-13">
							<h3 class="page-header">
								<center>
                        <ul class="w3-ul w3-border-top">
                            <li class="w3-theme-bd4">
                                    <strong>Update Form</strong> 
                            </li>
                        </ul>    
                                 </center>
                            </h3> 
						</div>
					</div>
    </div>
<br>                        
<ul class="w3-ul w3-border-top">
<div class="w3-container w3-theme-bl1">
     <ul class="nav navbar-nav navbar-center">
        <li><a href="update_kra.php">KRA & Objectives</a></li>
        <li><a href="update_timeline.php">TIMELINE </a></li>
        <li><a href="update_weight.php">Weight per KRA </a></li>
        <li><a href="update_perf_indi.php">PERFORMANCE INDICATOR </a></li>
    </ul>
    						</div>
					</div>
    </div>    
</div><!-- /.navbar-collapse -->
</nav>
			<div id="page-wrapper">
				<div class="container-fluid">
					<!-- Page Heading -->
					<div class="row">
						<div class="col-lg-12">
							<h3 class="page-header">Update Performance Indicator</h3> 
						</div>
						</div>
						<div class="col-lg-12">
					<!--	<table class="table table-condensed table-hover table-bordered table-responsive">
						<tr>
							<td width="35%">KRA</td>
							<td></td>
							<td>Objectives</td>
							
						</tr>	
						
						<?php
						
							$id=$_GET['id'];
							$qry = mysql_query("Select ipcrms_perf_indicator.KRA_ID, ipcrms_obj.OBJ_ID, ipcrms_obj.obj_desc, ipcrms_kra.KRA_description from ipcrms_obj, ipcrms_kra, ipcrms_mfo where ipcrms_mfo.MFO_ID =".$id." and ipcrms_kra.MFO_ID = ipcrms_mfo.MFO_ID and ipcrms_kra.KRA_ID = ipcrms_obj.KRA_ID");
							if($qry){
								while($row=mysql_fetch_array($qry)){
									$kra_desc = $row['KRA_description'];
									$obj = $row['obj_desc'];
									$kra_id = $row['KRA_ID'];
									$obj_id = $row['OBJ_ID'];
									
									echo '
											<form method="get" action="up_process.php">
											<tr>
												<td><input type="text" class="form-control" name="kra" value="'.$kra_desc.'"/><td>
												<td><textarea cols="100" rows="4" class="form-control" name="obj" value="'.$obj.'">'.$obj.'</textarea></td>
												<input type="hidden" value="'.$kra_id.' name="kra_id" />
												<td><input type ="submit" class="btn btn-primary" ></td>
												
											</tr>
									';
								}
							}
						?> 
								</table>-->
						
						<table class="table table-hover table-responsive table-condensed">
							<tr>
								<td><b>KRA</b></td>
								<td><b>Objectives</b></td>
								<td><b>Action</b></td>
							</tr>
							
							<?php 
								$id=$_GET['id'];
								$qry = mysql_query("Select ipcrms_obj.OBJ_ID, ipcrms_kra.KRA_description, ipcrms_kra.KRA_ID, ipcrms_obj.obj_desc from ipcrms_kra, ipcrms_obj where ipcrms_kra.MFO_ID = ".$id." and ipcrms_obj.KRA_ID = ipcrms_kra.KRA_ID");
								if($qry){
									while($row=mysql_fetch_array($qry)){
										$kra_desc = $row['KRA_description'];
										$kra_id = $row['KRA_ID'];
										$obj_desc=$row['obj_desc'];
										$obj_id=$row['OBJ_ID'];
										
										echo'
											<form action="up_process.php" method="get">
											<tr>
												<input type="hidden" name="kra_id" value="'.$kra_id.'">
												<input type="hidden" name="obj_id" value="'.$obj_id.'">
												<td><input type="text" class="form-control" name="kra" value="'.$kra_desc.'" /></td>
												<td><textarea name="obj_desc" value="'.$obj_desc.'" cols="30" rows="4" class="form-control">'.$obj_desc.'</textarea></td>
												<td><button type="submit" class="btn btn-primary">Update</button></td>
											</tr>
											</form>
										';
										
									}
								}
							?>
						</table>
								</div>
						
		<!--/.row-->

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
</div>
<br><br><br><br><br><br><br>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
    
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/alert.js"></script>
<script src="../Template%20(reference)/vendor/jquery/jquery-3.0.0.min.js"></script>
<script src="../js/sidebar-menu.js"></script>
<script src="../js/sideNav.js"></script>
<script>
$.sidebarMenu($('.sidebar-menu'))
</script>
<!-- Footer -->
<footer class="container-fluid w3-theme-bd5 hidden-xs" style="padding-top:10px;padding-bottom:20px;margin-left:200px">
    <footer class="w3-theme-bd5">
         <div class="row">
            <div class="col-lg-3 col-md-3">
               <h1 class="h3">PNHS IPCRMS</h1>
               <h6>All Rights Reserved &copy; 2017</h6>
            </div>
            <div class="col-lg-3 col-md-3">
               <h1 class="h3">ADDRESS</h1>
               <h6><b>Pag-asa National Highschool</b><br><span>PNHS Building, Rawis, East Service<br>  Road, Legazpi City, PH 2424</span></h6>
            </div>
            <div class="col-lg-3 col-md-3">
               <h1 class="h3">CONTACT US</h1>
               <h6 class="w3-justify">
                  <b>Phone:</b>
                  <span>(+632) 887-2232</span>
                  <br>
                  <b>E-mail:</b> 
                  <span>pnhsoes@pnhs.gov.ph</span>
                  <br>
                  
               </h6>
            </div>
             <div class="col-lg-3 col-md-3">
               <h1 class="h3">Follow Us On:</h1>
                  <a href="#"><i class="fa fa-bullseye w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-phone w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-facebook w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-twitter w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-google-plus w3-xlarge" aria-hidden="true"></i></a>
            </div>
         </div>
      </footer>
</footer>
<footer class="container-fluid w3-theme-bd5 hidden-lg hidden-md hidden-sm" style="padding-top:10px;padding-bottom:20px">
    <footer class="w3-theme-bd5">
         <div class="row">
            <div class="col-lg-3 col-md-3">
               <h1 class="h3">PNHS IPCRMS</h1>
               <h6>All Rights Reserved &copy; 2017</h6>
            </div>
            <div class="col-lg-3 col-md-3">
               <h1 class="h3">ADDRESS</h1>
               <h6><b>Pag-asa National Highschool</b><br><span>PNHS Building, Rawis, East Service<br>  Road, Legazpi City, PH 2424</span></h6>
            </div>
            <div class="col-lg-3 col-md-3">
               <h1 class="h3">CONTACT US</h1>
               <h6 class="w3-justify">
                  <b>Phone:</b>
                  <span>(+632) 887-2232</span>
                  <br>
                  <b>E-mail:</b> 
                  <span>pnhsoes@pnhs.gov.ph</span>
                  <br>
                  
               </h6>
            </div>
             <div class="col-lg-3 col-md-3">
               <h1 class="h3">Follow Us On:</h1>
                  <a href="#"><i class="fa fa-bullseye w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-phone w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-facebook w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-twitter w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-google-plus w3-xlarge" aria-hidden="true"></i></a>
            </div>
         </div>
      </footer>
</footer>

</body>
</html>