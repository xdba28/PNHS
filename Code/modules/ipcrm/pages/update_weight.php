<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Browser's Tab Title -->
    <title>PANAHAS Template</title>
      
      
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
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
              </span>
          </div>
        </form>

    <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><i class="fa fa-user fa-fw"></i> Admin Profile</a></li>
        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
        <li class="divider"></li>
        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
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
                  <span>Layout Options</span>
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
              <li><a href="../../documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
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
                  <span>Layout Options</span>
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
              <li><a href="../../documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
              <li class="sidebar-header">LABELS</li>
              <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
              <li style="padding-bottom:100%"></li>
            </ul>
        </div>
    </div>
<div class="col-lg-10 col-md-9 col-sm-9">
<div class="container-fluid" style="height:700px;max-width:100%;margin-top:70px;margin-right:20px;margin-left:20px;margin-bottom:10px">
<div class="w3-container w3-theme-bl4">
     <ul class="nav navbar-nav navbar-center">
        <li><a href="update_kra.php">KRA</a></li>
        <li><a href="update_objectives.php" >OBJECTIVES </a></li>
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
							<h3 class="page-header">
								Update Weight per KRA
							</h3>
						</div>
					</div>
					<div class="vessel">
						<div class="row">
							<div class="col-lg-6">
								<form method="GET" class="form-group">
								<?php
									$id=$_GET['id'];
									$query="SELECT * FROM `weight` WHERE `weight_ID`='$id'";
									$q_query=mysql_query($query);
									$data=mysql_fetch_assoc($q_query);
								?>
								<input type="hidden" name="id" value="<?php echo $id; ?>">
								<label class="control-label" for="weight1">Category ID:</label>
								
								<select name="weight1" id="" class="form-control" required>
									<?php
									$cat=$_GET['cat'];
										$gquery=mysql_query("SELECT * FROM `category` WHERE `category_label`='$cat'");
										$gfetch=mysql_fetch_assoc($gquery);

									?>
									<option value="<?php echo $gfetch['category_ID']; ?>">
										<?php
											echo $cat;
										?>
									</option>
									<?php
										$categoryquery=mysql_query("SELECT * FROM `category` where category_label!='$cat'");
										while($row=mysql_fetch_assoc($categoryquery))
										{
											echo '<option value="'.$row['category_ID'].'">'.$row['category_label'].'</option>';
										}
									?>
								</select>
								<br>
								<label class="control-label" for="weight2">Weight per KRA Description:</label>
								<textarea class="form-control" type="textfield" name="weight"><?php echo $data['weight_desc']; ?></textarea>
								<br>
								<input class="btn btn-primary btn-md" type="submit" name="submitnewweight" value="Update Weight per KRA">
								<button type="submit" name="cancel" class="btn btn-default">Cancel</button>
								<?php 
								
								if(isset($_POST['cancel']))
									{
										header('Location: Category.php');
									}
									?>
								</form>
								<?php
									if(isset($_GET['submweightght']))
									{
										//$update1=$_POST['weight1'];
										$id=$_GET['id'];
										$update1=$_GET['weight1'];
										$update2=mysql_escape_string($_GET['weight2']);
										$query="UPDATE `weight` SET `category_ID` = '$update1', `weight_desc`='$update2' WHERE `weight`.`weight_ID`='$id';";
										//echo $query;
										mysql_query($query);
									
                                        //echo "<script>location.href='#.php';
										//	alert('Performance Indicator is successfully updated! '); </script>";
										echo "<script>sweetAlert({
											  type:'success',
											  title: 'Performance Indicator is successfully updated!',
											  });</script>";
											  header("Refresh:2; url= #.php");
                                        if(isset($_GET['cancel']))
									{
										header('Location: #.php');
									}
								?>
							</div>
							<div class="col-lg-6">

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
    
<!-- Include all compiled plugins (below), or include individual files as needed -->
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
<footer class="container-fluid w3-theme-bd5 hidden-lg hidden-md hidden-sm" style="padding-top:10px;padding-bottom:20px">
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
</body>

</html>