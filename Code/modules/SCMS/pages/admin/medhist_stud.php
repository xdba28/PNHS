<?php
include_once('db_connect.php');
session_start();

if(isset($_SESSION['user_data']['acct']['cms_username']) && isset($_SESSION['user_data']['acct']['cms_account_ID']) && $_SESSION['user_data']['priv']['scms_priv'] == 1)
{	
	if($_SESSION['user_data']['acct']['no'] == 1)
	{
		$_SESSION['user_data']['acct']['cms_account_ID'];
		
		$fetch_wholename = mysqli_query($mysqli, "SELECT * FROM pims_personnel, cms_account
			WHERE cms_account.emp_no = pims_personnel.emp_No
			AND cms_account.cms_account_ID = '".$_SESSION['user_data']['acct']['cms_account_ID']."'")
			or die(mysqli_error($mysqli));
			
		$wholename = mysqli_fetch_array($fetch_wholename);
	}
	else if($_SESSION['user_data']['acct']['no'] == 2)
	{
		header('Location: ../mapeh/index.php');
	}
	else if($_SESSION['user_data']['acct']['no'] == 3)
	{
		header('Location: ../stuper/index.php');
	}
}
else
{
	header('Location: ../login.php');	
}

	$lrn = $_GET['lrn'];

	$q_getstud = mysqli_query($mysqli, "SELECT *, LEFT(stu_mname, 1) FROM sis_student 
		WHERE lrn='".$lrn."'")
		or die ("Error: ".mysqli_error($mysqli));

	$row =mysqli_fetch_array($q_getstud);
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
    <link rel="stylesheet" href="../../css/t.css">
    
    
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
    .snip1578 {
  font-family: 'Open Sans', Arial, sans-serif;
  position: relative;
  display: inline-block;
  margin: 40px 1px;
  min-width: 230px;
  max-width: 315px;
  width: 100%;
  color: #000;
  text-align: left;
  font-size: 16px;
  background: #d9edf7;
  border-radius: 5px;
}

.snip1578 *,
.snip1578:before,
.snip1578:after {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-transition: all 0.4s ease;
  transition: all 0.4s ease;
}

.snip1578 img {
  max-width: 35%;
  margin-top: -15px;
  margin-left: 60%;
  margin-bottom: 15px;
  backface-visibility: hidden;
  vertical-align: top;
  border-radius: 5px;
}

.snip1578 figcaption {
  position: absolute;
  top: 0;
  right: 40%;
  left: 0;
  bottom: 0;
  padding: 15px;
}

.snip1578 h3 {
  margin: 0;
  font-size: 1.1em;
  font-weight: normal;
}



/* Demo purposes only */

</style>        
    
	<style>
body {
        color: #404E67;
        background: #F5F7FA;
		font-family: 'arial', sans-serif;
	}	
	.icon-background4 {
    color: #36f40b;
	}
        dt{
            font-size: small;
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
                <div class="col-lg-12">
                    <h1 class="page-header">Profile <small><small> Personal Profile and Medical Record</small></small>
                   </h1>
                 </div>
                <!-- /.col-lg-12 -->
				
                <div class="col-lg-12">
				<div class="col-lg-4" >
                    <figure class="snip1578">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/profile-sample1.jpg" />
                        <figcaption>
							<h3>
                                <?php if($row['stu_mname'] == NULL)
								{
									echo strtoupper($row['stu_lname'].', '.$row['stu_fname']);
								}		
								else
								{
									echo strtoupper($row['stu_lname'].', '.$row['stu_fname'].' '.$row['LEFT(stu_mname, 1)'].'.');
								}
								?>
                            </h3>
							<div><h6>Student</h6></div>
                    </figure>
                    <div class="panel panel-info" style="background-color:#d9edf7;">
                    <dl class="dl-horizontal" >
                      <br><dt>Last name</dt>
                      <dd><?php echo strtoupper ($row['stu_lname']);?></dd>
                      <dt>First name</dt>
                      <dd><?php echo strtoupper ($row['stu_fname']);?></dd>
                      <dt>Middle name</dt>
                      <dd><?php echo strtoupper($row['stu_mname']);?></dd>
                      <dt>Gender</dt>
                      <dd><?php echo strtoupper($row['sis_gender']);?></dd>
					  <dt>Date of Birth</dt>
                      <dd><?php echo strtoupper($row['sis_b_day']);?></dd>
                      <dt>Address</dt>
                      <dd><?php echo strtoupper($row['street'].' '.$row['brng'].', '.$row['munic']);?></dd>
                      <dt>Status</dt>
                      <dd><?php echo strtoupper($row['stu_status']);?></dd>
                      <dt>Religion</dt>
                      <dd><?php echo strtoupper($row['sis_religion']);?></dd>
                      <dt>Contact Number</dt>
                      <dd><?php echo strtoupper($row['stu_contact']);?></dd>
                      <dt>Email Address</dt>
                          <dd><?php echo $row['sis_email'];?></dd>  
					 </dl>
                    </div><br><br><br>
				</div>
				
				<div class="col-lg-8">
                    <div class="panel panel-primary">
                            
                        <!-- /.panel-heading -->
                        <div class="panel-body tooltip-demo">
						<div class="panel panel-primary" >
						<figure>
							<h2>Medical Record</h2>
							<figcaption>
							<h4>Last Updated:</h4>
							<?php
							$fetch_medrec = mysqli_query($mysqli, "SELECT * FROM sis_student, cms_account, scms_medrec
							WHERE cms_account.lrn = sis_student.lrn 
							AND cms_account.cms_account_ID = scms_medrec.cms_account_ID
							AND sis_student.lrn = '".$lrn."'
							ORDER BY medrec_id DESC")
							or die(mysqli_error($mysqli));
							
							$medrec = mysqli_fetch_array($fetch_medrec);
							?>
							<p><?php echo $medrec['date_of_update'];?>
							
							<button style="float:right" type="button" class="btn btn-primary" data-toggle="collapse" data-target="#viewdetails">View</button>
							</p>
							</figcaption>
                            </figure>
						</div>
							<div class="span4 collapse-group">
							<div class="collapse" id="viewdetails">
							<div class="primary">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h3>Health Information</h3><br>
                                    <form role="form">
                                        <div class="form-group">
 			                            <input type="hidden" name="acc_id" id = "acc_id" value="<?php echo $_SESSION['user_data']['acct']['cms_account_ID']; ?>">
                                           
                                            <label>Allergies</label><br>
                                        <input type="text" name="allergies" id="allergies" required="required" class="form-control" placeholder="">
                                        </di>                                           
                                            <p class="help-block">Example: Pollen</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Do you wear eyeglasses?</label><span class="required"></span><br>
                                            <label class="radio-inline">
                                                <input type="radio" name="eye" id="eye1" value="Yes" checked>Yes
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="eye" id="eye2" value="No">No
                                            </label>
                                        </div> 
                                        <div class="form-group">
                                        <label>Description</label><br>
                                        <input type="text" name="eyedesc" id="eyedesc" required="required" class="form-control" placeholder="">
                                        </di>
                                            <p class="help-block">Example: Nearsighted</p>                                    
                                        </div>
                                        <div class="form-group">
                                            <label>Do you have an ear condition?</label><span class="required"></span><br>
                                            <label class="radio-inline">
                                                <input type="radio" name="ear" id="ear1" value="Yes" checked>Yes
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="ear" id="ear1" value="No">No
                                            </label>
                                        </div> 
                                        <div class="form-group">
                                        <label>Description</label><br>
                                        <input type="text" name="eardesc" id="eardesc" required="required" class="form-control" placeholder="">
                                        </di>
                                            <p class="help-block">Example: Middle ear infection</p>                                    
                                        </div> <hr>
                                       <h3>Illness History</h3>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th><small>#</small></th>
                                                            <th><small>Illness</small></th>
                                                            <th><small>Record</small></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $fetch_ill = mysqli_query($mysqli, "SELECT * FROM scms_illness")
                                                        or die(mysqli_error($mysqli));

                                                        $illcount = 0;
                                                        while($ill = mysqli_fetch_array($fetch_ill))
                                                        {
                                                            $illcount++;

                                                            echo'
                                                            <tr>
                                                            <td><small>'.$illcount.'</small></td>
                                                            <td><small>'.$ill['illness_name'].'</small></td>
                                                            <td>
                                                                  <label>
                                                                    <input type="checkbox" value="<small>'.$ill['illness_no'].'</small>" name="ill[]">
                                                                  </label>
                                                            </td>
                                                            </tr>
                                                            ';
                                                        }
                                                        ?>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.table-responsive -->
                                        </div>  

                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
								<h3>For Emergency</h3><br>
                                        <div class="form-group">
                                            <label>Name<span class="required"></span></label>
                                            <input type="text" name="name" required="required" class="form-control" placeholder="First Name/Last Name">
                                        </div>
										<div class="form-group">
                                            <label>Relationship<span class="required"></span></label>
                                            <input type="text" name="rel" required="required" class="form-control" placeholder="">
                                        </div>
										<div class="form-group">
                                            <label>Contact Number<span class="required"></span></label>
                                            <input type="text" maxlength="10" minlength="10" name="num" required="required" class="form-control" placeholder="">
                                        </div><br><br><br><br><br><br><br><br><br><hr>									
                                    </form>								
                              							
                                    <h3>Immunization Record</h3>
                                    <div class="panel-body">
                                    <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th><small>#</small></th>
                                                        <th><small>Immunization</small></th>
                                                        <th><small>Record</small></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $fetch_immune = mysqli_query($mysqli, "SELECT * FROM scms_immunization")
                                                    or die(mysqli_error($mysqli));

                                                    $immunecount = 0;
                                                    while($immune = mysqli_fetch_array($fetch_immune))
                                                    {
                                                        $immunecount++;

                                                        echo'
                                                        <tr>
                                                        <td><small>'.$immunecount.'</small></td>
                                                        <td><small>'.$immune['vaccine_name'].'</small></td>
                                                        <td>
                                                              <label>
                                                                <input type="checkbox" value="<small>'.$immune['vaccine_no'].'</small>" name="immune[]">
                                                              </label>
                                                        </td>
                                                        </tr>
                                                        ';
                                                    }
                                                    ?>

                                                </tbody>
                                            </table>
                                        </div> 
                                        </div>

										</form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->

						</div>
							</div>
							<a href="update_medrec_stud.php"><button type="button" style="float:right;margin-right:20px;" class="btn btn-primary btn-square btn-n" data-toggle="tooltip" data-placement="left" title="Update medical record">
							<i class="fa fa-tasks"></i> Update</button></a>
							</div>
							</div>
                        </div>
                        <!-- /.panel-body -->
                    </div><br><br><br>
                    <!-- /.panel -->
                </div>
               
		</div>		
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
