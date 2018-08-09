<?php
session_start(); 
include "db_conn.php";

$times=array('06:30:00', '07:20:00', '08:10:00', '09:10:00', '10:00:00', '10:50:00', '11:40:00', '12:30:00', '01:20:00', '02:10:00', '03:10:00', '04:00:00', '04:50:00', '05:40:00');
$timee=array('07:20:00', '08:10:00', '09:00:00', '10:00:00', '10:50:00', '11:40:00', '12:30:00', '01:20:00', '02:10:00', '03:00:00', '04:00:00', '04:50:00', '05:40:00', '06:30:00');
$time=array('06:30 - 07:20', '07:20 - 08:10', '08:10 - 09:00', '09:10 - 10:00', '10:00 - 10:50', '10:50 - 11:40', '11:40 - 12:30', '12:30 - 01:20', '01:20 - 02:10', '02:10 - 03:00', '03:10 - 04:00', '04:00 - 04:50', '04:50 - 05:40', '05:40 - 06:30');


//Santillan, Abby
$emp_no = $_SESSION['user_data']['acct']['emp_no'];

$query = mysqli_query($conn, "LOCK TABLES pims_personnel, pims_employment_records, css_schedule, css_section, css_school_yr READ");
$query = mysqli_query($conn, "SELECT emp_rec_ID FROM pims_personnel, pims_employment_records
                              WHERE pims_employment_records.emp_No=pims_personnel.emp_No
                              AND pims_personnel.emp_No=$emp_no");
if(mysqli_num_rows($query)==0){
  echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Error: wala kang record sa pims ;)')
        window.history.go(-1);
        </SCRIPT>");
        die();
}

foreach ($query as $key) {
  $emp_rec = $key['emp_rec_ID'];
}
$yr=null;
if(!empty($_GET['yr'])){
  $yr = $_GET['yr'];
}
$sy = mysqli_query($conn, "SELECT DISTINCT css_school_yr.sy_id, year, P_fname, P_lname 
                          FROM css_school_yr, pims_employment_records, css_schedule, pims_personnel
                          WHERE css_school_yr.sy_id=css_schedule.sy_id
                          AND pims_personnel.emp_No=pims_employment_records.emp_No
                          AND css_schedule.emp_rec_id=pims_employment_records.emp_rec_ID
                          AND css_schedule.emp_rec_id=$emp_rec");
$sy_l = mysqli_query($conn, "SELECT DISTINCT css_school_yr.sy_id, year
                          FROM css_school_yr, pims_employment_records, css_schedule, pims_personnel
                          WHERE css_school_yr.sy_id=css_schedule.sy_id
                          AND pims_personnel.emp_No=pims_employment_records.emp_No
                          AND css_schedule.emp_rec_id=pims_employment_records.emp_rec_ID
                          AND css_schedule.emp_rec_id=$emp_rec ORDER BY sy_id DESC LIMIT 1");
$latest = mysqli_fetch_row($sy_l);

foreach ($sy as $key) {
    $sy_id = $key['sy_id'];
    $year = $key['year'];
    $name = $key['P_fname']." ".$key['P_lname'];
  if($yr==$key['sy_id']){
    break;
  }
}
$ts=null;
$te=null;
$print=null;
$ad = mysqli_query($conn, "SELECT YEAR_LEVEL, SECTION_NAME, ROOM_NO FROM css_section, css_school_yr 
                          WHERE css_school_yr.sy_id=css_section.sy_id AND css_section.sy_id=$sy_id
                          AND emp_rec_ID=$emp_rec");
if(mysqli_num_rows($ad)!=0){
  $row = mysqli_fetch_row($ad);
  $adv_sec = $row[0]."-".$row[1];
  $room = "ROOM ".$row[2];
}
else{
  $adv_sec = "";
  $room = "";  
}
$sched = mysqli_query($conn, "SELECT SECTION_NAME, YEAR_LEVEL, TIME_START, TIME_END, DAY
                              FROM css_schedule, css_section, css_school_yr
                              WHERE css_schedule.SECTION_ID=css_section.SECTION_ID
                              AND css_schedule.sy_id=css_school_yr.sy_id
                              AND css_schedule.emp_rec_id=$emp_rec
                              AND css_schedule.sy_id=$sy_id");
if(mysqli_num_rows($sched)==0){
  echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Error: wala kang sched sa year na ito ;)')
        window.location.href='other_module_page.php';
        </SCRIPT>");
        die();
}

$count=mysqli_num_rows($sched);
foreach ($sched as $key) {
  for ($i=0; $i < 14; $i++) { 
    if($key['TIME_START']==$times[$i]){
      $ts=$i;
      break;
    }
  }
  for ($i=0; $i < 14; $i++) { 
    if($key['TIME_END']==$timee[$i]){
      $te=$i;
      break;
    }
  }
  while($ts<=$te){
    if($key['DAY']!='regular'){
      $print[$ts] = $key['YEAR_LEVEL']."-".$key['SECTION_NAME']." (".$key['DAY'].")";
    }
    else{
      $print[$ts] = $key['YEAR_LEVEL']."-".$key['SECTION_NAME'];
    }
    $ts++;
  }
  $_SESSION['print_teacher'] = serialize($print);
}

$query = mysqli_query($conn, "UNLOCK TABLES");

  
/*$section = mysqli_query($conn, "SELECT SECTION_ID, SECTION_NAME FROM section, sy 
                                WHERE section.SY_ID=sy.SY_ID AND STATUS='active' AND YEAR_LEVEL=$grade");
$rows=mysqli_num_rows($section);
if($rows==0){
  echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Error: no schedule created')
        window.location.href='index.php';
        </SCRIPT>");
        die();
}*/
?>

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
<body>

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
                    .table {
                      table-layout: auto;
                      width: 1020px;
					  word-wrap:break-word;
                    }

					
/* Formatting search box */
    .search-box{
		margin-top: 24px;
		margin-left: -13px;
        width: 310px;
        position: relative;
        display: inline-block;
		font-size: 14px;
		border-radius: 4px;
    }
    .search-box input[type="text"]{
        height: 32px;
		padding: 6px 12px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
    }
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
		overflow-y:auto;
		height:180px;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
		background: #fffff;
    }
    /* Formatting result items */
		.result p {
		margin: 0;
		padding: 7px 10px;
		border: 1px solid #CCCCCC;
		border-top: none;
		cursor: pointer;
		background: white;
	}
    .result p:hover{
        background: #f2f2f2;
    }
	
</style>

<div class="w3-theme-bd5 w3-card-4 navbar navbar-fixed-top" style="background-color:rgba(42,101,149,0.95)!important">
<div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed fa fa-bars hidden-sm hidden-md hidden-lg" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
      </button>
      <a class="navbar-brand" style="padding-top:5px;margin-left:5px" href="year_level.php"><img src="../docs/img/pnhs_logo.png" style="max-width:40px;margin-left:50px;margin-right:50px"></a>
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
						<li><a href="year_level.php"><i class="fa fa-circle-o"></i> S.Y. 2016-2017</a></li>
					</ul>
					
					<a href="#">
					<i class="fa fa-list"></i>
					<span>History</span><i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="sidebar-submenu" style="display: none;">
						<li><a href="#"><i class="fa fa-circle-o"></i> S.Y. 2016-2015</a></li>
						<li><a href="#"><i class="fa fa-circle-o"></i> S.Y. 2015-2014</a></li>
						<li><a href="#"><i class="fa fa-circle-o"></i> S.Y. 2014-2013</a></li>
					</ul>
					
				</li>
				  
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
                  <i class="fa fa-book"></i>
                  <span>School Year</span><i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="sidebar-submenu" style="display: none;">
				
				<li> 
          <a href="#">
          <i class="fa fa-check"></i>
          <span>Latest</span><i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="sidebar-submenu" style="display: none;">
            <?php
			if (!empty($latest)) {
				echo '<li style="margin-left:-20px"><a href="teacher.php?yr='.$latest[0].'"><i class="fa fa-circle-o"></i> S.Y. '.$latest[1].'</a></li>';
            }
			else {
                echo '<li><a>No active of schedule</a></li>';
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
              if($key['sy_id']!=$latest[0]){
                echo '<li><a href="teacher.php?yr='.$key['sy_id'].'"><i class="fa fa-circle-o"></i> S.Y. '.$key['year'].'</a></li>';
				$history = 1;
              }
            }
			if ($history == 0) {
                echo '<li><a>No history of schedule</a></li>';

			}
            ?>
			</div>
			</div>
          </ul>
          
        </li>
				  
                  </li>
                </ul>
              </li>
              <li style="padding-bottom:1000%"></li>
            </ul>
        </div>
    </div>
  
  
<div class="col-lg-10 col-md-9 col-sm-9">
<div class="container-fluid" style="height:auto;min-height:550px;max-width:100%;margin-top:75px;margin-left:10px;margin-bottom:10px">


<body>
<!-- -----------------------------CONTENT STARTS HERE--------------------------------- -->

<center><h2 style="padding-bottom: 10px;"> <?php echo $name.' Schedule';
$query = mysqli_query($conn, "SELECT year FROM css_school_yr WHERE status = 'used' ");
$row = mysqli_fetch_row($query);
echo ' (S.Y. '.$year.')';
?><br></h2></center>


<!-- MODALS PRINT BUTTON -->   
  <div id="button_bars"> 
    <?php echo '
    <a href="../fpdf/report_teacher.php?yr='.$year.'&adv='.$adv_sec.'&load='.$count.'&name='.$name.'&room='.$room.'">'; ?>
    <button class="a btn btn-sm  create" style="margin-right:6px; margin-top:24px">
      <i class="fa fa-print"> Print</i>
    </button>
    <br><br>
    </a>
  </div>
<!-- MODALS PRINT BUTTON END -->   
 
<!--- TABLES START -->
<div class="container">
  <div class="tab-content">
		
  <!-- GRADE 7 -->	  	



        
<div id="g7">
	<table id="table" style="width:100%"><br>
                        <thead>
                          <tr class="headings">
                            <td width="100px" class="column-title" style="text-align:center;font-size:18px;">TIME</td>
                            <td width="100px" class="column-title" style="text-align:center"><p style="font-size:18px;">Classes</p></td>
                          </tr>
                        </thead>
          <tbody style="text-align: center; font-size: 15px">
            <?php 
            for ($i=0; $i < 14; $i++) { 
              if(empty($print[$i])){
                $print[$i]="--------";
              }
            }
            for ($i=0; $i < 14; $i++) { 
            echo'
						<tr>
							<td class="" width="30%"><b>'.$time[$i].'</b></td>
							<td class="" height="70px">'.$print[$i].'</td>
						</tr>
			       ';
            } ?>
            <tr>
							<td class="" width="30%"><b>ADVISER</b></td>
							<td class="" height="70px"><b><?php echo $adv_sec?></b><br><?php echo $room?></td>
						</tr>
						<tr>
							<td class="" width="30%"><b>TOTAL LOADS</b></td>
							<td class="" height="70px"><?php echo $count?></td>
						</tr>
                        </tbody>
        </table>
      </div>
	  </div>
<!-- GRADE 7 END -->	  	
</div> <!-- FOR <div class="container"> -->  
</div> <!-- FOR   <div class="tab-content"> -->
<!--- TABLES END -->
  
</div> <!-- /DIV FOR LINE 355 or SEARCH FOR <div class="container-fluid" style="height:auto;min-height:500px;max-width:100%;margin-top:70px;margin-right:20px;margin-left:20px;margin-bottom:10px">  -->
</div> <!-- /DIV FOR LINE 354 or SEARCH FOR <div class="col-lg-10 col-md-9 col-sm-9"> --> 
</div> <!-- /DIV FOR LINE 256 or SEARCH FOR <div class="row"> --> 

<!-- FOOOTER -->
 <br><br><br>
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
<script type="text/javascript">
  
</script>
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/sidebar-menu.js"></script>
<script src="../js/sideNav.js"></script>
<script>
$.sidebarMenu($('.sidebar-menu'))
</script>

<!--- Live search-->
<script src="../js/jquery-1.7.2.min.js"></script>
<script src="../js/jquery.freezeheader.js"></script>
    <script>
    $(document).ready(function () {
        $("#table").freezeHeader();
    })
</script>
<!-- SCRIPT -->

</body>
</html>
	