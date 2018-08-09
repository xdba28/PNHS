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
						</center>
    
            <div id="page-wrapper">
				<div class="container-fluid">
					<!-- Page Heading -->
					<div class="row">
						<div class="col-lg-12">
							<center>
                            <h3 class="page-header">
								<strong>Update Form</strong>
							</h3>
                            </center>    
						</div>
					</div>
                    <div class="w3-container w3-theme-bl4">
     <ul class="nav navbar-nav navbar-center">
        <li><a href="update_kra.php">KRA</a></li>
        <li><a href="update_objectives.php">OBJECTIVES </a></li>
        <li><a href="update_timeline.php">TIMELINE </a></li>
        <li><a href="update_weight.php">Weight per KRA </a></li>
        <li><a href="update_perf_indi.php">PERFORMANCE INDICATOR </a></li>
    </ul>
</div><!-- /.navbar-collapse -->
    <hr class="w3-theme-bd2" style="height:2px; border:1; margin-top:0px; margin-bottom:0px;">
</nav>
			<div id="page-wrapper">
				<div class="container-fluid">
					<!-- Page Heading -->
					<div class="row">
						<div class="col-lg-12">
							<h3 class="page-header">Update Objectives</h3> 
						</div>
						</div>
						
						<table class="table table-hover table-responsive table-bordered">
							<tr>
								<td>MFO</td>
								<td>Action</td>
							</tr>
							<form method="get" action="up_mfo.php">
								<?php
									$qry = mysql_query("Select * from ipcrms_mfo");
									if($qry){
										while($row=mysql_fetch_array($qry)){
											$id=$row['MFO_ID'];
											$mfo_desc=$row['MFO_Description'];
											
											echo"<tr>
												<td>".$mfo_desc."</td>
												<td><button type='submit' name='id' value=".$id." class='btn btn-primary'>Select</button></td>
												
											</tr>";
										}
										
									}
								?>
							
						</table>
						</form>
            <div class="container">
                <br><br><br><br><br>
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"><h5>Submit</h5></button>
                <a href="update_kra.php"> <button class="btn btn-default" type="button" class="btn btn-info btn-lg" data-target="#myModal"><h4>Cancel</h4></button></a>
                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
      <!-- Modal content-->
                        <div class="row center">
				            <div class="modalbox success col-sm-8 col-md-6 col-lg-5 center animate">
						      <div class="icon">
								<span class="glyphicon glyphicon-ok"></span>
						      </div>
						<!--/.icon-->
						    <h1>Success!</h1>
						    <p>KRA <br>has been updated.</p>
                            <a href="ipcrms_index.php"> <button type="button" class="redo btn">Ok</button></a>
					       <span class="change">-- Click to see opposite state --</span>
				            </div>
				<!--/.success-->
		                  </div>
		<!--/.row-->
		  <div class="row">
				<div class="modalbox error col-sm-8 col-md-6 col-lg-5 center animate">
						<div class="icon">
								<span class="glyphicon glyphicon-thumbs-down"></span>
						</div>
						<!--/.icon-->
						<h1>Oh no!</h1>
						<p>Oops! Something went wrong,
								<br> you should try again.</p>
						<button type="button" class="redo btn">Try again</button>
					<span class="change">-- Click to see opposite state --</span>
				</div>
				<!--/.success-->
		  </div>
		<!--/.row-->/

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
    <div class="row">
        <div class="col-lg-4 col-md-4 w3-left">
            <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PANAHAS</h2>
            <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alright Reserved &copy; 2017</h6>
        </div>
        <div class="col-lg-4 col-md-4 w3-right">
            <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contact Us:</h5>
            <a href="#"><i class="fa fa-bullseye w3-xlarge"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="#"><i class="fa fa-phone w3-xlarge"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="#"><i class="fa fa-facebook w3-xlarge"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="#"><i class="fa fa-twitter w3-xlarge"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="#"><i class="fa fa-google-plus w3-xlarge"></i></a>
        </div>
    </div>
</footer>
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