
<?php
include_once('..//db_connect.php');
session_start();
include_once('log.php');

$sec_id = $_GET['sec_id'];

mysqli_query($mysqli, "LOCK TABLES sis_student, cms_account, scms_bmi_rec, sis_stu_rec, css_school_yr, css_section READ");

$fetch_schoolyr = mysqli_query($mysqli, "SELECT * FROM css_school_yr ORDER BY sy_start DESC LIMIT 1")
										or die(mysqli_error($mysqli));
$schoolyr = mysqli_fetch_array($fetch_schoolyr);
									
$fetch_section = mysqli_query($mysqli, "SELECT * FROM sis_stu_rec, css_school_yr, css_section 
	WHERE css_school_yr.sy_id = sis_stu_rec.sy_id 
	AND css_section.section_ID = sis_stu_rec.section_ID 
	AND sis_stu_rec.section_ID = '".$sec_id."' 
	AND sy_start = '".$schoolyr['sy_start']."' 
	GROUP BY css_section.section_ID")
or die(mysqli_error($mysqli));

$section = mysqli_fetch_array($fetch_section);
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
    
    <!-- Documents Path --->
    <link rel="stylesheet" href="../../docs/docs.min.css">
    <link rel="stylesheet" href="../../css/sidebar-menu.css">
    <link rel="stylesheet" href="../../css/s.css">
    
    
    <!-- Icons CSS -->
    <link rel="stylesheet" href="../../css/font-awesome/css/font-awesome.min.css" type="text/css">
    
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
        background: #F5F7FA;
		font-family: 'arial', sans-serif;
	}	
	.icon-background4 {
    color: #36f40b;
	}
	</style>
</head>

<body>
<nav class="w3-theme-bd5 w3-card-4 navbar navbar-fixed-top" style="background-color:rgba(42,101,149,0.95)!important">
<div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed fa fa-bars hidden-sm hidden-md hidden-lg" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
      </button>
      <a class="navbar-brand" style="padding-top:5px;margin-left:5px" href="index.php"><img src="../../docs/img/pnhs_logo.png" style="max-width:40px;margin-left:50px;margin-right:50px"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <form class="navbar-form navbar-left hidden-sm">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
              </span>
          </div>
        </form>

    <ul class="nav navbar-nav navbar-right">
        <li><a href="account.php"><i class="fa fa-user fa-fw"></i> Account</a></li>
        <li class="divider"></li>
        <li><a href="../login.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
        <nav style="max-width:100%" class="hidden-xl hidden-lg hidden-md hidden-sm">
            <ul class="sidebar-menu">
			  <li class="sidebar-header">&nbsp;&nbsp;MAIN NAVIGATION</li>
			  <li><a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
			  <li><a href="daily.php"><i class="fa fa-clock-o fa-fw"></i> <span>Daily Visit Log</span></a></li>
			  <li><a href="patient.php"><i class="fa fa-pencil-square-o"></i> Patient Records</a></li>
			  <li>
                <a href="#">
                  <i class="fa fa-table fa-fw"></i>
                  <span>Medical Records</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
				<li><a href="student.php"><i class="fa fa-circle-o"></i> Students</a></li>
                  <li><a href="personnel.php"><i class="fa fa-circle-o"></i> Personnels</a></li>
                </ul>
              </li>
			  <li class="active">
                <a href="#">
                  <i class="fa fa-stethoscope fa-fw"></i>
                  <span>Manage</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
				<li><a href="medicine.php"><i class="fa fa-circle-o"></i> Medicine</a></li>
                <li><a href="supplies.php"><i class="fa fa-circle-o"></i> Supplies</a></li>
                <li><a href="equipment.php"><i class="fa fa-circle-o"></i> Equipment</a></li>
                </ul>
              </li>
			  <li><a href="reports.php"><i class="fa fa-bar-chart-o fa-fw"></i> Reports</a></li>
			  <li><a href="support.php"><i class="fa fa-gears fa-fw"></i> Support</a></li>
            </ul>
        </nav>
    </ul>
    
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
<hr class="w3-theme-yd2" style="height:3px; border:0; margin-top:0px; margin-bottom:0px;">
<hr class="w3-theme-bd2" style="height:3px; border:0; margin-top:0px; margin-bottom:0px;">
</nav>

<div class="row">
    <div class="col-lg-2 col-md-3 col-sm-3 hidden-xs">
        <div class="navbar navbar-fixed-top" style="width:200px; margin-top:56px">
            <ul class="sidebar-menu">
			<li style="padding-left:15px;padding-top:10px;padding-bottom:25px;padding-right:15px">
				  <img src="../../docs/img/kyunga.jpg" class="img-circle pull-left" alt="User Image" style="max-width:60px;border:3px solid white">
				  <small>
				  <a style="float:right;padding-top:10px;color:white"><?php echo ucfirst($wholename['P_fname']).' '.ucfirst($wholename['P_lname']);?><br></a>
				  <a class="text-right" style="padding-left:55px;color:white"><i class="fa fa-circle icon-background4"></i>&ensp;Online</a>
				  </small>
			  <li>
			  <li class="sidebar-header">&nbsp;&nbsp;MAIN NAVIGATION</li>
			  <li><a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
			  <li><a href="daily.php"><i class="fa fa-clock-o fa-fw"></i> <span>Daily Visit Log</span></a></li>
			  <li><a href="patient.php"><i class="fa fa-pencil-square-o"></i> Patient Records</a></li>
			  <li class="active">
                <a href="#">
                  <i class="fa fa-table fa-fw"></i>
                  <span>Medical Records</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
				<li><a href="student.php"><i class="fa fa-circle-o"></i> Students</a></li>
                  <li><a href="personnel.php"><i class="fa fa-circle-o"></i> Personnels</a></li>
                </ul>
              </li>
			  <li>
                <a href="#">
                  <i class="fa fa-stethoscope fa-fw"></i>
                  <span>Manage</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
				<li><a href="mse.php"><i class="fa fa-circle-o"></i> Medicine</a></li>
                <li><a href="supplies.php"><i class="fa fa-circle-o"></i> Supplies</a></li>
                <li><a href="equipment.php"><i class="fa fa-circle-o"></i> Equipment</a></li>
                </ul>
              </li>
			  <li><a href="reports.php"><i class="fa fa-bar-chart-o fa-fw"></i> Reports</a></li>
			  <li><a href="support.php"><i class="fa fa-gears fa-fw"></i> Support</a></li>
              <li style="padding-bottom:100%"></li>
            </ul>
		</div>
	</div>
    <div class="col-lg-10 col-md-9 col-sm-9">
        <div class="container-fluid" style="height:700px;max-width:100%;margin-top:70px;margin-right:20px;margin-left:20px;margin-bottom:10px">
                    <h1 class="page-header">Edit BMI Class<small><small></small></small></h1>
				<br>
				
			
				<div class="col-lg-12">
						
				<div class="panel panel-primary">
                        <div class="panel-body tooltip-demo">
						<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="save_class.php" method="post">
                            <table width="100%" class="table table-striped table-bordered table-hover" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Height (cm)</th>
                                        <th>Weight (kg)</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php
										$fetch_all = mysqli_query($mysqli, "SELECT * FROM sis_student, cms_account, scms_bmi_rec, sis_stu_rec
											WHERE sis_student.lrn = cms_account.lrn
											AND cms_account.cms_account_ID = scms_bmi_rec.cms_account_ID
											AND sis_student.lrn = sis_stu_rec.lrn
											AND section_id = '".$section['SECTION_ID']."'
											AND sy_id = '".$section['sy_id']."'")
											or die(mysqli_error($mysqli));
										$countall = 0;
										while($all = mysqli_fetch_array($fetch_all))
										{
											
											  //date in mm/dd/yyyy format; or it can be in other formats as well
											  $birthDate = $all['sis_b_day'];
											  //explode the date to get month, day and year
											  $birthDate = explode("-", $birthDate);
											  //get age from date or birthdate
											  $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md")
												? ((date("Y") - $birthDate[0]) - 1)
												: (date("Y") - $birthDate[0]));
											  

											$countall++;
											echo'
											<tr class="odd gradeX">
											<td>'.$countall.'</td>
											<td>'.strtoupper($all['stu_lname'].', '.$all['stu_fname']).'</td>	
											<input type="hidden" name="bmino[]"  required="required" value="'.$all['bmi_no'].'"class="form-control col-md-3 col-xs-3" >																						
											<td><input type="text" name="height[]"  required="required" value="'.$all['height'].'"class="form-control col-md-3 col-xs-3" ></td>
											<td><input type="text" name="weight[]"  required="required" value="'.$all['weight'].'"class="form-control col-md-3 col-xs-3" ></td>
											</tr>';
											
										}
										
										mysqli_query($mysqli, "UNLOCK TABLES");
									?>
                                </tbody>
                            </table>
							
																<div class="modal-footer">
																	<button type="submit" class="btn btn-success " name="submit_pat">Submit</button>
																	<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
																</div>
                            </form>
                            <!-- /.table-responsive -->
                            
					<button type="button" style="float:right" class="btn btn-primary btn-circle btn-xl " data-toggle="tooltip" data-placement="left" title="Print BMI"><i class="fa fa-print"></i></button>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    </div>
                    <!-- /.panel -->
	</div>		
	</div>		
	</div>		
	<!--/.row-->

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../js/alert.js"></script>
<script src="../../js/slideshow.js"></script>
<script src="../../js/backToTop.js"></script>
<script src="../../js/sideNavII.js"></script>
<script src="../../js/showNav.js"></script>
<script src="../../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../../vendor/datatables-responsive/dataTables.responsive.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

<script>
    // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })
    </script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../Template%20(reference)/vendor/jquery/jquery-3.0.0.min.js"></script>
<script src="../../js/sidebar-menu.js"></script>
<script src="../../js/sideNav.js"></script>
<script>
$.sidebarMenu($('.sidebar-menu'))
</script>
<script>
    // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })
    </script>

<!-- Footer -->
<?php include "../../pages/include/footer.php"; ?>

</body>

</html>
