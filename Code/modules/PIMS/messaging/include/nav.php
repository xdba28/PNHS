<?php
	include("../myfunc/nav1.php");
?>
<div style="z-index: 4;width: 100%;position: relative;">
<!-- Navigation -->
        <nav class="w3-theme-bd5 w3-card-4" style="width: 100%;background-color:rgba(42,101,149,0.95)!important; position: fixed;" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand w3-card-4" href="#"><img src="../img/pnhs_logo.png" width="75px" height="75px"></a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <hr class="hidden-sm hidden-md hidden-lg" style="height:10px; border:0">
        <!--
			<ul class="nav navbar-nav navbar-left">

            <li><a href="../../../index.php">Home</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> About Us <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="../../../history.php">History</a></li>
                  <li><a href="../../../vision and mission.php">Vision & Mission</a></li>
                  <li><a href="../../../hymn.php">PNHS Hymn</a></li>
                  <li><a href="../../../achievements.php">Achievements</a></li>
                  <li><a href="../../../map.php">Location and Campus Map</a></li>
                  <li><a href="../../../orgchart.php">Organizational Chart</a></li> -->
                  <!--<li data-toggle="modal" data-target="#acknowledgement" id="login"><a>Acknowledgement</a></li>--> <!--
                  <li ><a href="../../../acknowledgement.php">Acknowledgement</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Programs <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="../../../hs.php">High School</a></li>
                  <li><a href="../../../shs.php">Senior High School</a></li>
                </ul>
              </li>
              <li> <a href="../../../SP.php"><span> School Progress </span></a></li>
              <li><a href="../../../contact.php">Contact Us</a></li>

            </ul> -->
        
<ul class="nav navbar-nav navbar-right">
				<!--
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>
				-->
				<!--
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
					-->
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<?php echo '<img alt="User Pic" style = " margin: 0 auto; max-height: 30px; max-width: 30px; " src = "../myfunc/showimageprofile.php?id='.$_SESSION['pims_data']['emp_id'].'" class="img-square ims-responsive"> '; ?> <label style="max-height: 10px; " ><?php echo $_SESSION['pims_data']['name'] ?></label> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="../personnel/"><i class="fa fa-user fa-fw"></i> Profile</a></li>
                        <?php
							//if ( isset($_SESSION['pims_data']['pims_priv_admin']) && $_SESSION['pims_data']['pims_priv_admin'] == '1' ){
								include("../myfunc/db_connect.php");
								
								$query = "select job_title_code from pims_employment_records where emp_No = ".$_SESSION['pims_data']['emp_id']."; ";
								$result = mysqli_query( $_SESSION['pims_data']['connection'] , $query );
								$row = mysqli_fetch_array($result);
								if ( $row['job_title_code'] == "ICTD" ){
									echo'
									<li><a href="../admin/"><i class="fa fa-user fa-fw"></i><b> Admin</b></a>
									</li>
									';
								}
								else if ( $row['job_title_code'] == "SECSP2" ){
									echo'
									<li><a href="../admin2/"><i class="fa fa-user fa-fw"></i><b> Admin</b></a>
									</li>
									';
								}
								mysqli_close( $_SESSION['pims_data']['connection'] );
								unset( $_SESSION['pims_data']['connection'] ); 
							//}
						?>
                        <!--<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a></li>-->
                        <li class="divider"></li>
                        <li><a href="../myfunc/login2.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->


        </div>
        </div>
        <hr class="w3-theme-yd2" style="height:3px; border:0; margin-top:0px; margin-bottom:0px;">
        <hr class="w3-theme-bd2" style="height:3px; border:0; margin-top:0px; margin-bottom:0px;">
            <!-- /.navbar-header -->




        </nav>
        </div>
<br><br><br>
        <div class="navbar-default sidebar" role="navigation" style="color: black;position: fixed;" id = "sideNav1">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
					<center><li class="sidebar-header"><h5>MESSENGER</h5></li></center>
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input id = "myInput" type="text" onkeyup="myFunction()" class="form-control" placeholder="Search Faculty Recently">
                                <span class="input-group-btn">
								<div class="btn btn-default">
                                    <img src = "../img/dots.gif" style = "height:15px; width:15px ;">
                                </div>
								</span>
                            </div>
                        </li>
						<!--
                        <li>
                            <a href="#"><i class="fa fa-folder-open fa-fw"></i> View<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="emp_rec.php">Employment Records</a>
                                </li>
                                <li>
                                    <a href="service_rec.php">Service Record</a>
                                </li>
                                <li>
                                    <a href="perf_rec.php">Performance Report</a>
                                </li>
                                <li>
                                    <a href="training.php">Training Programs</a>
                                </li>
                            </ul>
                        </li>

                        <li id = "leaveDropDown1" >
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Leave Application<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="leave_history.php">Leave History</a>
                                </li>
                                <li>
                                    <a href="leave_apply.php">Apply</a>
                                </li>
                            </ul>
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-pencil fa-fw"></i> Create Exam</a>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-table fa-fw"></i> Class Schedule</a>
                        </li>
						
					
						-->
						<table id = "myTable" width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
							
						</table>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
			<?php
				include("myfunc/nav1.php")
			?>