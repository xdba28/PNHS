
<?php
session_start(); 
include "db_conn.php";


if(empty($_SESSION['sy'])){
  header("location: year_level.php");
}

$sy = mysqli_query($conn, "SELECT * FROM css_school_yr");


if(!empty($_SESSION['grade'])){
  $grade = $_SESSION['grade'];
}
else{
  $grade = 7;
  $_SESSION['grade'] = $grade;
}
//$room = mysqli_query($conn, "SELECT * FROM css_room");
$section = mysqli_query($conn, "SELECT SECTION_ID, SECTION_NAME FROM css_section, css_school_yr 
                                WHERE status='used' AND css_section.SY_ID=css_school_yr.SY_ID 
                                AND YEAR_LEVEL=$grade");
$teacher = mysqli_query($conn, "SELECT * FROM pims_personnel");
$subject = mysqli_query($conn, "SELECT * FROM css_subject");

if($grade==7 || $grade==9){
    $times=array('06:30:00', '07:20:00', '08:10:00', '09:10:00', '10:00:00', '10:50:00', '11:40:00');
    $timee=array('07:20:00', '08:10:00', '09:00:00', '10:00:00', '10:50:00', '11:40:00', '12:30:00');
    $timess=array('12:30:00', '01:20:00', '02:10:00', '03:10:00', '04:00:00', '04:50:00', '05:40:00');
}
else{
    $times=array('12:30:00', '01:20:00', '02:10:00', '03:10:00', '04:00:00', '04:50:00', '05:40:00');
    $timee=array('01:20:00', '02:10:00', '03:00:00', '04:00:00', '04:50:00', '05:40:00', '06:30:00');
    $timess=array('06:30:00', '07:20:00', '08:10:00', '09:10:00', '10:00:00', '10:50:00', '11:40:00');
    
}
$query = mysqli_query($conn, "LOCK TABLES css_schedule, css_school_yr, pims_personnel, css_subject, pims_employment_records READ");
$sched = mysqli_query($conn, "SELECT subject_name,  P_fname, P_lname, SECTION_NAME, TIME_START, 
                              TIME_END, DAY, css_schedule.subject_id
                              FROM css_schedule, css_subject, pims_employment_records, pims_personnel,
                              css_section, css_school_yr
                              WHERE pims_employment_records.emp_rec_ID=css_schedule.emp_rec_ID
                              AND pims_employment_records.emp_No=pims_personnel.emp_No
                              AND css_schedule.SECTION_ID = css_section.SECTION_ID
                              AND css_schedule.subject_id = css_subject.subject_id
                              AND css_schedule.SY_ID = css_school_yr.SY_ID 
                              AND css_section.YEAR_LEVEL = $grade
                              AND status = 'used'");
$query = mysqli_query($conn, "UNLOCK TABLES");

$ts=null;
$te=null;
$c=0;
foreach ($sched as $row) {
  $teach_str = substr($row['P_fname'], 0, 1).". ".$row['P_lname'];
  $sub = $row['subject_id'];
  
  $co=0;
  foreach ($section as $key) {
    if($key['SECTION_NAME']==$row['SECTION_NAME']){
      break;
    }
    else
      $co++;
  }

  for($i=0; $i<7; $i++){
    if($times[$i]==$row['TIME_START']){
      $ts = $i;
    }
  }

  for($i=0; $i<7; $i++){
    if($timee[$i]==$row['TIME_END']){
      $te = $i;
    }
  }
  $check = 0;
  for($i=0; $i<7; $i++){
    if($timess[$i]==$row['TIME_START']){
      $check = 1;
    }
  }

  if($check==1){
    $tss=substr($row['TIME_START'], 0, -3);
    $tee=substr($row['TIME_END'], 0, -3);

    $sched_p[$co][7]="";

    if($row['DAY']=='regular'){
	  if($sub==50010) {
		  if($sched_p[$co][7]==""){
			  $sched_p[$co][7] .= $row['subject_name'].'<br>'.$tss."-".$tee.'<br>'.$teach_str.'<br>';
		  }
		  else {
			  $sched_p[$co][7] .= $teach_str.'<br>';
		  }
	  }
	  else {
		  $sched_p[$co][7] .= $row['subject_name'].'/'.$teach_str.'<br>'.$tss."-".$tee;
	  }
	}
	else {
		if($sub==50010){
			if($sched_p[$co][7]!=""){
			  $sched_p[$co][7] .= $row['subject_name'].'<br>'.$tss."-".$tee.'('.$row['DAY'].')<br>'.$teach_str.'<br>';
			}
			else {
			  $sched_p[$co][7] .= $teach_str.'<br>';
			}
		}
		else {
			  $sched_p[$co][7] .= $row['subject_name'].'/'.$teach_str.'('.$row['DAY'].')<br>'.$tss."-".$tee;
		}
	}
  }
	else{
    $query = mysqli_query($conn, "SELECT SCHED_ID FROM css_schedule, css_school_yr
                                  WHERE css_schedule.SY_ID=css_school_yr.SY_ID AND status='used' 
                                  GROUP BY subject_id, SECTION_ID");
    $_SESSION['count_checker'] = mysqli_num_rows($query);
    $query = mysqli_query($conn, "SELECT SECTION_ID FROM css_section, css_school_yr
                                  WHERE css_section.SY_ID=css_school_yr.SY_ID AND status='used'");
    $_SESSION['cell_count'] = mysqli_num_rows($query) * 7;
  }

  $day[$c] = $row['DAY'];
  
  while($ts<=$te){
    if($row['DAY']!='regular'){
      if(empty($sched_p[$co][$ts])){
        $sched_p[$co][$ts]=$row['subject_name'].'/'.$teach_str.'('.$row['DAY'].')<br>';
      }
      else{
        $sched_p[$co][$ts] .= $row['subject_name'].'/'.$teach_str.'('.$row['DAY'].')<br>';
      }
    }
    else{
      if($row['subject_name']=='Specialization'){
        if(empty($sched_p[$co][$ts])){
          $sched_p[$co][$ts] = $row['subject_name']."<br>";
        }
        $sched_p[$co][$ts] .= $teach_str."<br>";
      }
      else{
        $sched_p[$co][$ts] = $row['subject_name']."<br>".$teach_str;
      }
    }
  $ts++;
  }
  $c++;
}
include "empty_teach.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Browser's Tab Title -->
    <title>New Schedule</title>
      
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
    <link rel="icon" href="../docs/img/pnhs_logoicon.jpg" type="image/x-icon">
	<link href="../css/fixed_table_rc.css" type="text/css" rel="stylesheet" media="all" />

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
                    table {
                      table-layout: fixed;
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
                  <span>Schedule</span><i class="fa fa-angle-left pull-right"></i>
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
              <li style="padding-bottom:1000%"></li>
            </ul>
        </div>
    </div>
  
  
<div class="col-lg-10 col-md-9 col-sm-9">
<div class="container-fluid" style="height:auto;min-height:550px;max-width:100%;margin-top:50px;margin-left:10px;margin-bottom:10px">


<body>
<!-- -----------------------------CONTENT STARTS HERE--------------------------------- -->

<!-- MODAL IN CREATING SUBJECT (start)-->
<div class="tables">  
<div class="modal fade" id="CModal" role="dialog">

  </div><br>
</div>

<div class="modal fade" id="school_year" role="dialog">
  
</div>
<!-- MODAL IN CREATING SUBJECT (end) -->

<!-- MODAL IN EDITING SUBJECT (start)-->

<!-- MODAL IN EDITING SUBJECT (end) -->

<!-- MODAL IN Deleting SUBJECT (start)-->
<div class="modal fade" id="DModal" role="dialog">
  
</div>
<!-- MODAL IN Deleting SUBJECT (end) -->

<!-- MODAL IN ADDING SECTION (start) -->
<!--
<div class="modal fade" id="add_section" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="background-color:#fff;">
      <div class="modal-header modal-info" style="background-color:#1e4f75">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:#FFF"><b>Add Section</b></h4>
      </div>
      <div> 
           <br>
         
            <form action="add_sec.php" method="POST" class="form-horizontal custom-form">
              <div class="form-group">

                  <div class="col-md-10 col-md-offset-1">
                    <br>
                      <div>
                        <div class="form-group" style="text-align:right">
                          

                          <div class="col-sm-4 label-column">
                             <label class="control-label" for="name-input-field" >Section Name &nbsp;:</label>
                          </div>
                          <div class="col-sm-5 input-column" style="text-align:right">
                             <input name="sec_name" class="form-control" type="text" required>
                          </div>
                          <br><br><br>
                          
                          <center>
                            <button class="btn btn-primary save fa fa-check" name = "submit" type="submit"> Save
                            </button>
                          </center>

                        </div>
                      </div>
                  
                  </div>
              </div> 
            </form>
      </div>
    </div><br>
  </div><br>
</div>
-->
<!-- MODAL IN ADDING SECTION (end) -->

<!-- SAVING SCHEDULE (start) -->
<div class="modal fade" id="SModal" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="background-color:#fff;">
      <div class="modal-header modal-info" style="background-color:#1e4f75">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:#FFF"><b>Save Schedule</b></h4>
      </div>
      <div> 
           <br>
         
            <form class="form-horizontal custom-form" onsubmit="tbn.disabled = true; return true;" action="checker.php" method="POST">
              <div class="form-group">

                  <div class="col-md-10 col-md-offset-1">
                    <br>
                      <div>
                        <div class="form-group" style="text-align:right">
                          <p style="text-align: center;">Are you sure you want to save?</p>
                          <br>
                          
                          <center>
                            <button class="btn btn-primary save fa fa-check" id="tbn" name = "submit" type="submit" onclick="this.form.submit(); this.disabled=true;"> Save
                            </button>
                          </center>

                        </div>
                      </div>
                  
                  </div>
              </div> 
            </form>
      </div>
    </div><br>
  </div><br>
</div>
<!-- SAVING SCHEDULE (end) -->


<!-- MODAL IN DELETING SECTION (start)-->
<div class="modal fade" id="delete_section" role="dialog">
  
</div>
<!-- MODAL IN DELETING SECTION (end) -->
 
<!-- MODAL IN EXTEND SCHEDULE (start) -->
<div class="modal fade" id="extend_sched" role="dialog">
</div><br>
<!-- MODAL IN EXTEND SCHEDULE (end) -->
 
<div class="container">
<!-- Modals button -->   
                           <!-- buttons sa taas ng tables (start) -->
                          <center><h2 style="padding-bottom: 10px;"> Schedule for Academic Year <?php
                            $query = mysqli_query($conn, "SELECT year FROM css_school_yr WHERE status = 'used' ");
                            $row = mysqli_fetch_row($query);
							echo $row[0];
                          ?><br></h2></center>
						   
                           <div id="button_bars"> 
                            <button class="a btn btn-sm  save" type="button" data-toggle="modal" data-target="#SModal" style="margin-right:6px; margin-top:5px" >
                              <i class="fa fa-check"> <b>Save</b></i>
                            </button>
                            <button class="a btn btn-sm create" onclick="del(this.value)" type="button" data-toggle="modal" data-target="#DModal" style="margin-right:5px; margin-top:5px">
                              <i class="fa fa-plus"> Delete</i>
                            </button>
                            <button class="a create btn btn-sm" onclick="create(this.value)" type="button" data-toggle="modal" data-target="#CModal" style="margin-right:5px; margin-top:5px">
                              <i class="fa fa-plus"> Create</i>
                            </button>
                            <!-- buttons sa taas ng tables (end) -->
                          </div>
                        </ul>

                       <!-- Selecting sections (start) -->
 <!-- Modal button end-->
 
<!--- TABLES START -->
  <ul class="nav nav-tabs">
  <?php
  if($grade==7) 
    echo '<li class="active"><a data-toggle="tab" onclick="grade7(this.value)" href="#home">Grade 7</a></li>';
  else
    echo '<li><a data-toggle="tab" onclick="grade7(this.value)" href="#home">Grade 7</a></li>';
  if($grade==8)
    echo '<li class="active"><a data-toggle="tab" onload="grade8(this.value)" onclick="grade8(this.value)" href="#menu1">Grade 8</a></li>';
  else
    echo '<li><a data-toggle="tab" onclick="grade8(this.value)" href="#menu1">Grade 8</a></li>';
  if($grade==9)
    echo '<li class="active"><a data-toggle="tab" onclick="grade9(this.value)" href="#menu2">Grade 9</a></li>';
  else
    echo '<li><a data-toggle="tab" onclick="grade9(this.value)" href="#menu2">Grade 9</a></li>';
  if($grade==10)
    echo '<li class="active"><a data-toggle="tab" onclick="grade10(this.value)" href="#menu3">Grade 10</a></li>';
  else
    echo '<li><a data-toggle="tab" onclick="grade10(this.value)" href="#menu3">Grade 10</a></li>';
  ?>
  </ul>

  <div class="tab-content">
	<!--- PLUS AND MINUS BUTTON -->
  <!--
	<button class="btn btn-default btn-circle" type="button" data-toggle="modal" data-target="#add_section" style="margin-left:-30px; margin-top:58px;position:absolute">
	  <i class="fa fa-plus"></i>
	</button>
	<button class="btn btn-default btn-circle" onclick="del_sec(this.value)" type="button" data-toggle="modal" data-target="#delete_section" style="margin-left:-30px; margin-top:85px;position:absolute">
	  <i class="fa fa-minus"></i>
	</button>	
-->
	<!--- PLUS AND MINUS BUTTON END -->
	
	
  <!-- GRADE 7 -->	  
<?php 
if($grade==7)
  echo '<div id="home" class="tab-pane fade in active">';
else
  echo '<div id="home" class="tab-pane fade">';
?>
  
<br>
	<div class="dwrapper">

      <table  id="fixed_hdr1" class="table">
	  		<thead>
			<tr class="headings">
				<th rowspan="2" class="column-title" style="padding-bottom: 20px; text-align: center; width: 161px;height:100px"">6:30-7:20</th>
				<th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">7:20-8:10</th>
				<th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">8:10-9:00</th>
				<th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">9:10-10:00</th>
				<th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">10:00-10:50</th>
				<th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">10:50-11:40</th>
				<th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">11:40-12:30</th>
				<th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center"><button class="btn btn-default btn-circle-table" type="button" data-toggle="modal" data-target="#extend_sched" onclick="extend(this.value)">
				<i class="fa fa-plus"></i>
				</button></th> 
			</tr>
			<tr>
			</tr>
		</thead>
		
                        <tbody style="text-align: center; font-size: 15px">
                        <?php 
                          $x = 0;
                          foreach($section as $sec_name) {
                            $sec = mysqli_query($conn, "SELECT P_fname, P_lname
                                                        FROM css_section,
                                                        pims_employment_records, pims_personnel
                                                        WHERE pims_employment_records.emp_No=pims_personnel.emp_No
                                                        AND pims_employment_records.emp_rec_ID=css_section.emp_rec_ID
                                                        AND SECTION_ID=".$sec_name['SECTION_ID']."");
                            $rom = mysqli_query($conn, "SELECT ROOM_NO FROM css_section
                                                        WHERE SECTION_ID=".$sec_name['SECTION_ID']."");
                            $row = mysqli_fetch_row($sec);
                            $rowr = mysqli_fetch_row($rom);
                            if(empty($row)){
                              $adv = "";
                            }
                            else{
                              $adv = substr($row[0], 0, 1).". ".$row[1];
                            }
                          ?>
                          <td class="time" style="padding-top: 25px; text-align: center;"><?php echo $sec_name['SECTION_NAME']."<br>".$adv."<br>".$rowr[0]?>
                          </td>
                            <?php
                            for($y=0; $y<8; $y++){?>
                            <td class="" style="padding-bottom:none">
                              
                              <div class="form-group">
                                <div class="search-box">
                                <?php
                                if(!empty($sched_p[$x][$y])){
                                  echo '<p align="center">'.$sched_p[$x][$y].'</p>';
                                }
                                ?>  
                                <div class="result"></div>  
                              </div>
                              </div>
                            </td>
                            <?php } ?>
                          </tr>
                          <?php $x++; } ?>
                        </tbody>
      </table>
	</div>

<br><br><br>
</div>
<!-- GRADE 7 END --->	

<!-- GRADE 8 -->	  
<?php 
if($grade==8)
  echo '<div id="menu1" class="tab-pane fade in active">';
else
  echo '<div id="menu1" class="tab-pane fade">';
?>
  
<div class=" pane--table1">
  <div class="pane-hScroll2">
	<br>
    <table>
		<thead>
			<tr class="headings">
				<th class="column-title" style="text-align: center;font-size:13px">Time </th>
				<th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">12:30-1:20</th>
				<th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">1:20-2:10</th>
				<th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">2:10-3:00</th>
				<th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">3:10-4:00</th>
				<th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">4:00-4:50</th>
				<th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">4:50-5:40</th>
				<th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">5:40-6:30</th>
        <th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center"><button class="btn btn-default btn-circle-table" type="button" data-toggle="modal" data-target="#extend_sched" onclick="extend(this.value)">
        <i class="fa fa-plus"></i>
        </button></th>
			</tr>
			<tr>
				<th class="time col-md-1 " style="font-size:13px; text-align:center; padding-top:10px">Room # & Section</th> 
			</tr>
		</thead>
    </table>

    <div class="pane-vScroll2">
      <table>
                        <tbody style="text-align: center; font-size: 15px">
                        <?php 
                          $x = 0;
                          foreach($section as $sec_name) {
                            $sec = mysqli_query($conn, "SELECT P_fname, P_lname
                                                        FROM css_section,
                                                        pims_employment_records, pims_personnel
                                                        WHERE pims_employment_records.emp_No=pims_personnel.emp_No
                                                        AND pims_employment_records.emp_rec_ID=css_section.emp_rec_ID
                                                        AND SECTION_ID=".$sec_name['SECTION_ID']."");
                            $rom = mysqli_query($conn, "SELECT ROOM_NO FROM css_section
                                                        WHERE SECTION_ID=".$sec_name['SECTION_ID']."");
                            $row = mysqli_fetch_row($sec);
                            $rowr = mysqli_fetch_row($rom);
                            if(empty($row)){
                              $adv = "";
                            }
                            else{
                              $adv = substr($row[0], 0, 1).". ".$row[1];
                            }
                          ?>
                          <td class="time" style="padding-top: 25px; text-align: center;"><?php echo $sec_name['SECTION_NAME']."<br>".$adv."<br>".$rowr[0]?>
                          </td>
                            <?php
                            for($y=0; $y<8; $y++){?>
                            <td class="" style="padding-bottom:none">
                              
                              <div class="form-group">
                                <div class="search-box">
                                <?php
                                if(!empty($sched_p[$x][$y])){
                                  echo '<p align="center">'.$sched_p[$x][$y].'</p>';
                                }
                                ?>  
                                <div class="result"></div>  
                              </div>
                              </div>
                            </td>
                            <?php } ?>
                          </tr>
                          <?php $x++; } ?>
                        </tbody>
      </table>
    </div>
  </div>
</div>
<br><br><br>
</div>
<!-- GRADE 8 END -->

<!-- GRADE 9 -->	  
<?php 
if($grade==9)
  echo '<div id="menu2" class="tab-pane fade in active">';
else
  echo '<div id="menu2" class="tab-pane fade">';
?>
  
<div class=" pane--table1">
  <div class="pane-hScroll3">
  <br>
    <table>
    <thead>
      <tr class="headings">
        <th class="column-title" style="text-align:center;font-size:13px">Time </th>
        <th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">6:30-7:20</th>
        <th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">7:20-8:10</th>
        <th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">8:10-9:00</th>
        <th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">9:10-10:00</th>
        <th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">10:00-10:50</th>
        <th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">10:50-11:40</th>
        <th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">11:40-12:30</th>
        <th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center"><button class="btn btn-default btn-circle-table" type="button" data-toggle="modal" data-target="#extend_sched" onclick="extend(this.value)">
        <i class="fa fa-plus"></i>
        </button></th>        
      </tr>
      <tr>
        <th class="time col-md-1 " style="font-size:13px; text-align:center; padding-top:10px">Room # & Section</th> 
      </tr>
    </thead>
    </table>

    <div class="pane-vScroll3">
      <table>
                        <tbody style="text-align: center; font-size: 15px">
                        <?php 
                          $x = 0;
                          foreach($section as $sec_name) {
                            $sec = mysqli_query($conn, "SELECT P_fname, P_lname
                                                        FROM css_section,
                                                        pims_employment_records, pims_personnel
                                                        WHERE pims_employment_records.emp_No=pims_personnel.emp_No
                                                        AND pims_employment_records.emp_rec_ID=css_section.emp_rec_ID
                                                        AND SECTION_ID=".$sec_name['SECTION_ID']."");
                            $rom = mysqli_query($conn, "SELECT ROOM_NO FROM css_section
                                                        WHERE SECTION_ID=".$sec_name['SECTION_ID']."");
                            $row = mysqli_fetch_row($sec);
                            $rowr = mysqli_fetch_row($rom);
                            if(empty($row)){
                              $adv = "";
                            }
                            else{
                              $adv = substr($row[0], 0, 1).". ".$row[1];
                            }
                          ?>
                          <td class="time" style="padding-top: 25px; text-align: center;"><?php echo $sec_name['SECTION_NAME']."<br>".$adv."<br>".$rowr[0]?>
                          </td>
                            <?php
                            for($y=0; $y<8; $y++){?>
                            <td class="" style="padding-bottom:none">
                                <?php
                                if(!empty($sched_p[$x][$y])){
                                  echo '<p align="center">'.$sched_p[$x][$y].'</p>';
                                }
                                ?>  
                            </td>
                            <?php } ?>
                          </tr>
                          <?php $x++; } ?>
                        </tbody>
      </table>
    </div>
  </div>
</div>
<br><br><br>
</div>
<!-- GRADE 9 END -->

<!-- GRADE 10 -->	  
<?php 
if($grade==10)
  echo '<div id="menu3" class="tab-pane fade in active">';
else
  echo '<div id="menu3" class="tab-pane fade">';
?>
  
<div class=" pane--table1">
  <div class="pane-hScroll4">
	<br>
    <table>
		<thead>
			<tr class="headings">
        <th class="column-title" style="text-align: center;font-size:13px">Time </th>
        <th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">12:30-1:20</th>
        <th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">1:20-2:10</th>
        <th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">2:10-3:00</th>
        <th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">3:10-4:00</th>
        <th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">4:00-4:50</th>
        <th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">4:50-5:40</th>
        <th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">5:40-6:30</th> 
        <th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center"><button class="btn btn-default btn-circle-table" type="button" data-toggle="modal" data-target="#extend_sched" onclick="extend(this.value)">
        <i class="fa fa-plus"></i>
        </button></th>
        </tr>
			<tr>
				<th class="time col-md-1 " style="font-size:13px; text-align:center; padding-top:10px">Room # & Section</th> 
			</tr>
		</thead>
    </table>

    <div class="pane-vScroll4">
      <table>
                        <tbody style="text-align: center; font-size: 15px">
                        <?php 
                          $x = 0;
                          foreach($section as $sec_name) {
                            $sec = mysqli_query($conn, "SELECT P_fname, P_lname
                                                        FROM css_section,
                                                        pims_employment_records, pims_personnel
                                                        WHERE pims_employment_records.emp_No=pims_personnel.emp_No
                                                        AND pims_employment_records.emp_rec_ID=css_section.emp_rec_ID
                                                        AND SECTION_ID=".$sec_name['SECTION_ID']."");
                            $rom = mysqli_query($conn, "SELECT ROOM_NO FROM css_section
                                                        WHERE SECTION_ID=".$sec_name['SECTION_ID']."");
                            $row = mysqli_fetch_row($sec);
                            $rowr = mysqli_fetch_row($rom);
                            if(empty($row)){
                              $adv = "";
                            }
                            else{
                              $adv = substr($row[0], 0, 1).". ".$row[1];
                            }
                          ?>
                          <td class="time" style="padding-top: 25px; text-align: center;"><?php echo $sec_name['SECTION_NAME']."<br>".$adv."<br>".$rowr[0]?>
                          </td>
                            <?php
                            for($y=0; $y<8; $y++){?>
                            <td class="" style="padding-bottom:none">
                              
                              <div class="form-group">
                                <div class="search-box">
                                <?php
                                if(!empty($sched_p[$x][$y])){
                                  echo '<p align="center">'.$sched_p[$x][$y].'</p>';
                                }
                                ?>  
                                <div class="result"></div>  
                              </div>
                              </div>
                            </td>
                            <?php } ?>
                          </tr>
                          <?php $x++; } ?>
                        </tbody>
      </table>
    </div>
  </div>
</div>
<br><br><br>
</div>
<!-- GRADE 10 END -->
	  
</div> <!-- FOR <div class="container"> -->  
</div> <!-- FOR   <div class="tab-content"> -->
<!--- TABLES END --->
  
</div> <!-- /DIV FOR LINE 355 or SEARCH FOR <div class="container-fluid" style="height:auto;min-height:500px;max-width:100%;margin-top:70px;margin-right:20px;margin-left:20px;margin-bottom:10px">  -->
</div> <!-- /DIV FOR LINE 354 or SEARCH FOR <div class="col-lg-10 col-md-9 col-sm-9"> --> 
</div> <!-- /DIV FOR LINE 256 or SEARCH FOR <div class="row"> --> 
</div>
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


<script>
	$.sidebarMenu($('.sidebar-menu'))
</script>


<script type="text/javascript">
  function grade7(val){
    $.ajax({
      type: "POST",
      url: "grade_assign7.php",
      data: "grade="+val,
      success: function(data){
        $("#home").html(data);
      }
    });
  }

  function grade8(val){
    $.ajax({
      type: "POST",
      url: "grade_assign8.php",
      data: "grade="+val,
      success: function(data){
        $("#menu1").html(data);
      }
    });
  }

  function grade9(val){
    $.ajax({
      type: "POST",
      url: "grade_assign9.php",
      data: "grade="+val,
      success: function(data){
        $("#menu2").html(data);
      }
    });
  }

  function grade10(val){
    $.ajax({
      type: "POST",
      url: "grade_assign10.php",
      data: "grade="+val,
      success: function(data){
        $("#menu3").html(data);
      }
    });
  }
  function create(val){
    $.ajax({
      type: "POST",
      url: "create_sched.php",
      data: "grade="+val,
      success: function(data){
        $("#CModal").html(data);
      }
    });
  }
  function del(val){
    $.ajax({
      type: "POST",
      url: "delete_sched.php",
      data: "grade="+val,
      success: function(data){
        $("#DModal").html(data);
      }
    });
  }

  function del_sec(val){
    $.ajax({
      type: "POST",
      url: "del_sec.php",
      data: "grade="+val,
      success: function(data){
        $("#delete_section").html(data);
      }
    });
  }

  function assign_adv(val){
    $.ajax({
      type: "POST",
      url: "assign_sec_adviser.php",
      data: "teach_id="+val,
      success: function(data){
        $("#assign_adv").html(data);
      }
    });
  }

  function extend(val){
    $.ajax({
      type: "POST",
      url: "extend_sched.php",
      data: "grade="+val,
      success: function(data){
        $("#extend_sched").html(data);
      }
    });
  }

  function check_sy(val){
    $.ajax({
      type: "POST",
      url: "check_sy.php",
      data: "grade="+val,
      success: function(data){
        $("#school_year").html(data);
      }
    });
  }
</script>	
	<script src="../js/fixed_table_rc.js" type="text/javascript"></script>


<script>
	$(function () {
		$('#fixed_hdr1').fxdHdrCol({
			fixedCols: 1,
			width:     '100%',
			height:    400,
			colModal: [
			   { width: 50, align: 'center' },
			   { width: 110, align: 'center' },
			   { width: 170, align: 'left' },
			   { width: 250, align: 'left' },
			   { width: 100, align: 'left' },
			   { width: 70, align: 'left' },
			   { width: 100, align: 'left' },
			   { width: 100, align: 'center' },
			   { width: 90, align: 'left' },
			   { width: 400, align: 'left' }
			]					
		});
		
		$('#fixed_hdr2').fxdHdrCol({
			fixedCols: 0,
			width: "100%",
			height: 400,
			colModal: [
			{ width: 50, align: 'center' },
			{ width: 110, align: 'center' },
			{ width: 170, align: 'left' },
			{ width: 250, align: 'left' },
			{ width: 100, align: 'left' },
			{ width: 70, align: 'left' },
			{ width: 100, align: 'left' },
			{ width: 100, align: 'center' },
			{ width: 90, align: 'left' },
			{ width: 400, align: 'left' }
			],
			sort: true
		});
		$('#fixed_hdr3').fxdHdrCol({
			fixedCols: 0,
			width: "100%",
			height: 200,
			colModal: [{width: 30, align: 'center'},
			{width: 90, align: 'center'},
			{width: 200, align: 'left'},
			{width: 100, align: 'center'},
			{width: 70, align: 'center'},
			{width: 250, align: 'center'}
			]
		});
		
		$('#fixed_hdr_test28').fxdHdrCol({
		    fixedCols: 4,
		    width: 700,
		    height: 300,
		    colModal: [
		      { width: 50, align: 'center' }, 
		      { width: 70, align: 'center' }, 
		      { width: 70, align: 'center' }, 
		      { width: 70, align: 'center' }, 
		      { width: 70, align: 'center' }, 
		      { width: 70, align: 'center' }, 
		      { width: 70, align: 'center' }, 
		      { width: 70, align: 'center' }, 
		      { width: 70, align: 'center' }, 
		      { width: 70, align: 'center' }, 
		      { width: 70, align: 'center' }, 
		      { width: 70, align: 'center' }
		    ],
		    sort: false
		  })
	});
	</script><!-- SCRIPT -->

</body>
</html>
	