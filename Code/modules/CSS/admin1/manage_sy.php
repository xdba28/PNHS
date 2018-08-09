<?php
session_start(); 
include "db_conn.php";
//include "session_account.php";



$sy = mysqli_query($conn, "SELECT * FROM css_school_yr");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Browser's Tab Title -->
    <title>School Year</title>
      
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="../css/w3/w3.css">
    
    <!-- Documents Path --->
    <link rel="stylesheet" href="..docs/docs.min.css">
    
    <!-- Select 2 dropdown search --->
    <link rel="stylesheet" href="../css/select2.min.css">
	
    <!--Include your modified CSS below as needed-->
    <link rel="stylesheet" href="../css/w3/blue.css">
    <link rel="stylesheet" href="../css/w3/yellow.css">
    <link rel="stylesheet" href="../css/w3/w3.css">
    <link rel="stylesheet" href="../css/sidebar-menu.css">
    
    <!-- Icons CSS -->
    <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css" type="text/css">
    
    <!-- Browser's Tab Image -->
    <link rel="shortcut icon" href="../docs/img/pnhs_favicon.ico" type="image/x-icon">
    <link rel="icon" href="../docs/img/pnhs_logoicon.jpg" type="image/x-icon">
    
    <!-- DataTables CSS -->
    <link href="../css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../css/dataTables.responsive.css" rel="stylesheet">
	
    <!-- MetisMenu CSS -->
    <link href="../css/metisMenu.min.css" rel="stylesheet">
	
    <link href="../css/sb-admin-2.css" rel="stylesheet">
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Bootstrap -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
        <style>
        /*A class for form controls*/
        .inputstl { 
            padding: 9px; 
            border: solid 1px #B3FFB3; 
            outline: 0; 
            background: -webkit-gradient(linear, left top, left 25, from(#FFFFFF), color-stop(4%, #A4FFA4), to(#FFFFFF)); 
            background: -moz-linear-gradient(top, #FFFFFF, #A4FFA4 1px, #FFFFFF 25px); 
            box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px; 
            -moz-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px; 
            -webkit-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px; 

            } 

                    /* Style The tables */
                    .column-title{
                      background-color: #246884;
                      text-align: center;
                      font-size:15px; 
                      color: #fff;
                    }
                    .time{
                      background-color: #153948;
                      color: #fff;
                    }
                    .check{
                      width: 28px;
                      height: 28px;
                      position: relative;
                      margin: 20px auto;
                      background: #fcfff4;
                      background: linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
                      border-radius: 50px;
                      box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0,0,0,0.5);
                    }    
                    /* Style The Dropdown Button */
                    .dropbtn {
                        background-color:transparent;
                        color:#999;
                        text-align: right;
                        font-size: 13px;
                        border: none;
                        cursor: pointer;
                    }
                                                
                    /* The container div - needed to position the dropdown content */
                    .dropdown {
                        position: relative;
                        display: inline-block;
                    }
                                       
                    /* Dropdown Content (Hidden by Default) */
                    .dropdown-content {
                        display: none;
                        position: absolute;
                        background-color: #f9f9f9;
                        min-width: 100px;
                        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                        z-index: 1;
                    }
                     
                    /* Links inside the dropdown */
                    .dropdown-content a {
                        color: black;
                        padding: 9px 25px;
                        text-decoration: none;
                        display: block;
                        font-size: 13px;

                    }
                    /* Change color of dropdown links on hover */
                    .dropdown-content a:hover {background-color:#B8BDED}                    
          
                    /* Show the dropdown menu on hover */
                    .dropdown:hover .dropdown-content {
                        display: block;
                    }          
                    
                    /* Change the background color of the dropdown button when the dropdown content is shown */
                    .dropdown:hover .dropbtn {
                        background-color:transparent; 
                    }
                    .a{
                      float: right;
                      margin: 0;
                    }
                    .table {
                      table-layout: fixed;
                      border: 1px;
                      width: 1040px;
					             word-wrap:break-word;
                    }
</style>

<div class="w3-theme-bd5 w3-card-4 navbar navbar-fixed-top" style="background-color:rgba(42,101,149,0.95)!important">
<div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed fa fa-bars hidden-sm hidden-md hidden-lg" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
      </button>
      <a class="navbar-brand" style="padding-top:5px;margin-left:5px" href="../../../admin_idx.php"><img src="../docs/img/pnhs_logo.png" style="max-width:40px;margin-left:50px;margin-right:50px"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <form class="navbar-form navbar-left hidden-sm">
        </form>

    <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><i class="fa fa-user fa-fw"></i> Admin Profile</a></li>
        <li class="divider"></li>
        <li><a href="session_destroy.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
        <nav style="max-width:100%" class="hidden-xl hidden-lg hidden-md hidden-sm">
            <ul class="sidebar-menu">
              <li class="sidebar-header">MAIN NAVIGATION</li>
              <li>
                <a href="#">
                  <i class="fa fa-calendar"></i>
                  <span  data-toggle="tooltip" data-placement="top" title="Tooltip on top">Schedule</span><i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="sidebar-submenu" style="display: none;">
                <?php
                if(!empty($_SESSION['sy'])){
                  echo'
                  <li><a href="index.php"><i class="fa fa-circle-o"></i> Create</a></li>';
                }
                else{
                  echo'
                  <li><a data-toggle="modal" data-target="#school_year" href="index.php" onclick="check_sy(this.value)"><i class="fa fa-circle-o"></i> Create</a></li>';
                }
                ?>
                  <li><a href="adviser.php"><i class="fa fa-circle-o"></i> Assign Adviser</a></li>
                  <li><a href="teacher_loads.php"><i class="fa fa-circle-o"></i> Teacher Loads</a></li>
                </ul>
              </li>
			  
              <li>
                <a href="#">
                  <i class="fa fa-gear"></i>
                  <span>Options</span><i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="sidebar-submenu" style="display: none;">
                  <li><a href="assign_teacher.php"><i class="fa fa-circle-o"></i> Assign Teachers</a></li>
                  <li><a href="list_sections.php"><i class="fa fa-circle-o"></i> Sections</a></li>
                  <li><a href="subjects.php"><i class="fa fa-circle-o"></i> Subjects</a></li>
                </ul>
              </li>
			  
              <li>
                <a href="#">
                  <i class="fa fa-files-o"></i>
                  <span>View Schedule</span><i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="sidebar-submenu" style="display: none;">
                  <li><a href="year_level.php"><i class="fa fa-circle-o"></i> Year Level</a></li>
                  <li><a href="department.php"><i class="fa fa-circle-o"></i> Department</a></li>
                 
                </ul>
              </li>
			  
              <li>
                <a href="#">
                  <i class="fa fa-book"></i>
                  <span>School Year</span><i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="sidebar-submenu" style="display: none;">
				
				<li> 
					<a href="#">
					<i class="fa fa-check"></i>
					<span>Active</span><i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="sidebar-submenu" style="display: none;">
						<?php
						$active = 0;
						foreach ($sy as $key) {
							if($key['status']=='active'){
								echo '<li style="margin-left:-20px"><a href="year_level.php"><i class="fa fa-circle-o"></i>'; 
								echo 'S.Y.'.$key['year'].'</a></li>';
								$active = 1;
							}
						}
						if ($active != 1) {
							echo '<li style="color:#8aa4af">&nbsp;&nbsp;No active schedule</li>';
						}
						?>
					</ul>
					
					<a href="#">
					<i class="fa fa-list"></i>
					<span>History</span><i class="fa fa-angle-left pull-right"></i>
					</a>
					
					<ul class="sidebar-submenu" style="display: none;">
						<div class="scrollbar" id="style-4">
						<div class="force-overflow">
						<?php
						$history = 0;
						foreach ($sy as $key) {
							if($key['status']=='inactive'){
								echo '<li ><a href="history/year_level.php?yr='.$key['sy_id'].'"><i class="fa fa-circle-o"></i> S.Y. '.$key['year'].'</a></li>';
								$history = 1;
							}
						}
						if ($history != 1) {
							echo '<li ><a>No history schedules</a></li>';
						}
						?>
						</div>
						</div>
					</ul>
				</li>
                </ul>
			  </li>
			  
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
                  <i class="fa fa-calendar"></i>
                  <span>Schedule</span><i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="sidebar-submenu" style="display: none;">
                <?php
                if(!empty($_SESSION['sy'])){
                  echo'
                  <li><a data-toggle="tooltip" data-placement="right" title="Creates a new school year" href="index.php"><i class="fa fa-circle-o"></i> Create</a></li>';
                }
                else{
                  echo'
                  <li><a data-toggle="modal" data-target="#school_year" href="index.php" onclick="check_sy(this.value)"><i class="fa fa-circle-o"></i> Create</a></li>';
                }
                ?>
                  <li><a data-toggle="tooltip" data-placement="right" title="Remove/Adds sections every year level" href="list_sections.php"><i class="fa fa-circle-o"></i> Sections</a></li>
                  <li><a data-toggle="tooltip" data-placement="right" title="Assign teachers to their respective advisory classes" href="adviser.php"><i class="fa fa-circle-o"></i> Assign Adviser</a></li>
                  <li><a  data-toggle="tooltip" data-placement="right" title="For viewing every teacher's load"  href="teacher_loads.php"><i class="fa fa-circle-o"></i> Teacher Loads</a></li>
                </ul>
              </li>
			  
              <li>
                <a href="#">
                  <i class="fa fa-gear"></i>
                  <span>Options</span><i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="sidebar-submenu" style="display: none;">
                  <li>
                  <a href="#"><i class="fa fa-check"></i><span>Edit Schedule</span><i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="sidebar-submenu" style="display: none;">
                    <?php
                      $edit_sched = 0;
                      foreach ($sy as $key) {
                        if($key['status']!='used'){
                          echo '<li style="margin-left:-5px"><a href="edit_sched.php?yr='.$key['sy_id'].'" title="View schedule for S.Y. '.$key['year'].'."><i class="fa fa-circle"></i>'; 
                          echo 'S.Y.'.$key['year'].'</a></li>';
                          $edit_sched = 1;
                        }
                      }
                      if ($edit_sched != 1) {
                        echo '<li style="color:#8aa4af">&nbsp;&nbsp;No schedule</li>';
                      }
                      ?>
                    </ul>
                    </li>

                  <li><a data-toggle="tooltip" data-placement="right" title="Assigns Teachers to their respective subject"  href="assign_teacher.php"><i class="fa fa-circle-o"></i> Assign Teachers</a></li>
                  <li><a data-toggle="tooltip" data-placement="right" title="Remove/Adds subject every year level" href="subjects.php"><i class="fa fa-circle-o"></i> Subjects</a></li>
                </ul>
                <ul class="sidebar-submenu" style="display: none;">
                  <li><a data-toggle="tooltip" data-placement="right" title="Assigns Teachers to their respective subject"  href="assign_teacher.php"><i class="fa fa-circle-o"></i> Assign Teachers</a></li>
                  <li><a data-toggle="tooltip" data-placement="right" title="Remove/Adds subject every year level" href="subjects.php"><i class="fa fa-circle-o"></i> Subjects</a></li>
                </ul>
              </li>
			  
              <li>
                <a href="#">
                  <i class="fa fa-files-o"></i>
                  <span>View Schedule</span><i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="sidebar-submenu" style="display: none;">
                  <li><a data-toggle="tooltip" data-placement="right" title="View schedules per year level"  href="year_level.php"><i class="fa fa-circle-o"></i> Year Level</a></li>
                  <li><a data-toggle="tooltip" data-placement="right" title="View schedules per department" href="department.php"><i class="fa fa-circle-o"></i> Department</a></li>
                 
                </ul>
              </li>
			  
              <li>
                <a href="#">
                  <i class="fa fa-book"></i>
                  <span>School Year</span><i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="sidebar-submenu" style="display: none;">
				
				<li> 
					<a href="#">
					<i class="fa fa-check"></i>
					<span>Active</span><i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="sidebar-submenu" style="display: none;">
						<?php
						$active = 0;
						foreach ($sy as $key) {
							if($key['status']=='active'){
								echo '<li style="margin-left:-20px"><a href="year_level.php" title="View schedule for S.Y. '.$key['year'].'."><i class="fa fa-circle-o"></i>'; 
								echo 'S.Y.'.$key['year'].'</a></li>';
								$active = 1;
							}
						}
						if ($active != 1) {
							echo '<li style="color:#8aa4af">&nbsp;&nbsp;No active schedule</li>';
						}
						?>
					</ul>
					
					<a href="#">
					<i class="fa fa-list"></i>
					<span>History</span><i class="fa fa-angle-left pull-right"></i>
					</a>
					
					<ul class="sidebar-submenu" style="display: none;">
						<div class="scrollbar" id="style-4">
						<div class="force-overflow">
						<?php
						$history = 0;
						foreach ($sy as $key) {
							if($key['status']=='inactive'){
								echo '<li ><a href="history/year_level.php?yr='.$key['sy_id'].'" title="View schedule for S.Y. '.$key['year'].'."><i class="fa fa-circle-o"></i> S.Y. '.$key['year'].'</a></li>';
								$history = 1;
							}
						}
						if ($history != 1) {
							echo '<li ><a>No history schedules</a></li>';
						}
						?>
						</div>
						</div>
					</ul>
				</li>
                </ul>
			  </li>
              <li style="padding-bottom:1000%"></li>
            </ul>
        </div>
    </div>
  
  
<div class="col-lg-10 col-md-9 col-sm-9">
<div class="container-fluid" style="height:auto;min-height:550px;max-width:100%;margin-top:100px;margin-left:10px;margin-bottom:10px">


<body>
<!-- -----------------------------CONTENT STARTS HERE--------------------------------- -->

<center><h2 style="padding-bottom: 10px;">School Year<br></h2></center>

<div class="container">	
	<div class="tab-content">
		<div id="add" class="tab-pane fade in active">
         <div class="row"><br>
           <div class="col-md-12">
             <div class="panel panel-default">
               <div class="panel-heading">Assign Teacher</div>
               <div class="panel-body">
				      
				       </div>
             </div>
           </div>
		     </div>
		</div>
		
		
		<!--
		<div id="no_adviser" class="tab-pane fade in">
         <div class="row"><br>
			<div class="col-md-7">
				<div class="panel panel-default">
					<div class="panel-heading">Teachers Not Assign</div>
					<div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example4">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                    </tr>
                                </thead>
								<tr>
									<td>Gin</td>
								</tr>
								<tr>
									<td>Eraser Head</td>
								</tr>
							</table>
					</div>
				</div>
			</div>		 
		 </div>
		</div>
		-->
	</div>
	
</div>	  
  


<!-- -----------------------------CONTENT ENDS HERE--------------------------------- -->
</div> 
</div> 
</div>

<!-- FOOOTER --->
 
<footer class="container-fluid w3-theme-bd5 hidden-xs " style="padding-top:10px;padding-bottom:20px;margin-left:200px">
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

<!-- FOOOTER --->

    
<!-- SCRIPT -->
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/sidebar-menu.js"></script>
<script src="../js/sideNav.js"></script>
<script  src="../js/index.js"></script>
<script  src="../js/index2.js"></script>
<script  src="../js/index3.js"></script>
<script  src="../js/index4.js"></script>
<script src="../js/select2.min.js"></script>

	<script>
		$('#select2').select2();
	</script>

<!-- DataTables JavaScript -->
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap.min.js"></script>
    <script src="../js/dataTables.responsive.js"></script>

<!-- Page-Level Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
	
    <script>
    $(document).ready(function() {
        $('#dataTables-example2').DataTable({
            responsive: true
        });
    });
    </script>
	
    <script>
    $(document).ready(function() {
        $('#dataTables-example3').DataTable({
            responsive: true
        });
    });
    </script>	
	
    <script>
    $(document).ready(function() {
        $('#dataTables-example4').DataTable({
            responsive: true
        });
    });
    </script>

	

	
<!-- Page-Level Scripts - Tables - Use for reference END -->

	
<script>
	$.sidebarMenu($('.sidebar-menu'))
</script>


<script type="text/javascript">
</script>

<!-- SCRIPT -->

</body>
</html>
	