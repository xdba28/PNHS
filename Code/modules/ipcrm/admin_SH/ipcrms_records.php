<?php
include("func.php");
	include("connection.php");
	include("../session.php");

$aid=$_SESSION['user_data']['acct']['cms_account_ID'];
$eid=$_SESSION['user_data']['acct']['emp_no'];
$name=mysql_query("SELECT concat(p_fname,' ',p_lname) as Name,job_title_name, pims_job_title.job_title_code as job_title_code FROM pims_personnel,pims_employment_records,pims_job_title
WHERE pims_personnel.emp_no=pims_employment_records.emp_no
AND pims_job_title.job_title_code=pims_employment_records.job_title_code
AND pims_personnel.emp_no=$eid");
$nrow=mysql_fetch_assoc($name);
$_SESSION['job_title']=$nrow['job_title_name'];
$_SESSION['job_code']=$nrow['job_title_code'];

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
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"> <?php echo $nrow['Name']; ?></i>  <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li class="divider"></li>
								<li>
									<a href="../logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
								</li>
        <nav style="max-width:100%" class="hidden-xl hidden-lg hidden-md hidden-sm">
            <ul class="sidebar-menu">
              <li class="sidebar-header">MAIN NAVIGATION</li>
              <li>
                <a href="#">
                  <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                  <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                  <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
                </ul>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-files-o"></i>
                  <span>Form</span>
                  <span class="label label-primary pull-right">4</span>
                </a>
                <ul class="sidebar-submenu" style="display: none;">
                  <li><a href="top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
                  <li><a href="boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
                  <li><a href="fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
                  <li class=""><a href="collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="../widgets.html">
                  <i class="fa fa-th"></i> <span>Widgets</span>
                  <small class="label pull-right label-info">new</small>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-pie-chart"></i>
                  <span>Charts</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                  <li><a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
                  <li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
                  <li><a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
                  <li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
                </ul>
              </li>
             
              <li>
                <a href="#">
                  <i class="fa fa-folder"></i> <span>Examples</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                  <li><a href="../examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
                  <li><a href="../examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
                  <li><a href="../examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
                  <li><a href="../examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
                  <li><a href="../examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
                  <li><a href="../examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
                  <li><a href="../examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
                  <li><a href="../examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
                  <li><a href="../examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
                </ul>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-share"></i> <span>Multilevel</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                  <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                  <li>
                    <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="sidebar-submenu">
                      <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                      <li>
                        <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="sidebar-submenu">
                          <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                          <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                </ul>
              </li>
              <li><a href="../../documentation/index.html"><i class="fa fa-record"></i> <span>Records</span></a></li>
              <li class="sidebar-header">LABELS</li>
              <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            </ul>
        </nav>
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
    </div>
    <div class="col-lg-10 col-md-9 col-sm-9">
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
<br>				<div class="container-fluid">
					<!-- Page Heading -->
					<div class="row">
						<div class="col-lg-12">
							<h3 class="page-header">
								<center>
                        <ul class="w3-ul w3-border-top">
                            <li class="w3-theme-bd4">
                                    <strong>Add on Form</strong> 
                            </li>
                        </ul>    
                                 </center>
                            </h3> 
						</div>
					</div>
    </div>
<article>				
				<div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            </div>
	
    </center>
    <div class="panel-body">
		<div class="col-lg-12">
            <div class="table-responsive">
                 <table class="table table-bordered table-hover table-striped">
					<thead>
						<h3>Requests</h3>
                    <br>    
					<div>
					<div class="row" >
                        <div class="col-md-8" >
						<div class="col-md-8">
							<button class="btn btn-primary btn-block" >View Requestlist</button><!--MODAL--->
						</div>
                        </div>
					</div>
					</div>
                    <br> 
                        <tr align="center">
                          <th><strong>ID</strong></th>
                          <th><strong>Personnel's Name</strong></th>
                          <th><strong>Department</strong></th>
                          <th><strong>Request</strong></th>
						  <th><strong>Action</strong></th>
                        </tr>
                      </thead>
                       <tbody>
					   <?php
					   
						$qry = mysql_query("Select pims_personnel.P_fname, pims_department.dept_name from pims_department, pims_personnel, pims_employment_records where pims_employment_records.emp_No=pims_personnel.emp_No and pims_employment_records.dept_ID=pims_department.dept_ID");
							
                        echo    '<tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
                             </tr>' ; 

						?>
                            </tbody>
                 </table>
            </div>
		</div>
    </div>
   </center>
</div>
</div>	
</article>

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