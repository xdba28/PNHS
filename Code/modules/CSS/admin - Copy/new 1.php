<?php
session_start(); 
include "db_conn.php";

$times=array('06:30:00', '07:20:00', '08:10:00', '09:10:00', '10:00:00', '10:50:00', '11:40:00', '12:30:00', '01:20:00', '02:10:00', '03:10:00', '04:00:00', '04:50:00', '05:40:00');
$timee=array('07:20:00', '08:10:00', '09:00:00', '10:00:00', '10:50:00', '11:40:00', '12:30:00', '01:20:00', '02:10:00', '03:00:00', '04:00:00', '04:50:00', '05:40:00', '06:30:00');
$time=array('06:30 - 07:20', '07:20 - 08:10', '08:10 - 09:00', '09:10 - 10:00', '10:00 - 10:50', '10:50 - 11:40', '11:40 - 12:30', '12:30 - 01:20', '01:20 - 02:10', '02:10 - 03:00', '03:10 - 04:00', '04:00 - 04:50', '04:50 - 05:40', '05:40 - 06:30');


//Santillan, Abby
$emp_no = $_SESSION['user_data']['acct']['emp_no'];

$lock = mysqli_query($conn, "LOCK TABLES pims_personnel, pims_employment_records, css_schedule, css_section, css_school_yr READ");
$query = mysqli_query($conn, "SELECT emp_rec_ID FROM pims_personnel, pims_employment_records
                              WHERE pims_employment_records.emp_No=pims_personnel.emp_No
                              AND pims_personnel.emp_No=$emp_no");
if(mysqli_num_rows($query)==0){
  echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Sorry, you don't have schedule yet this school year. Please check next time.)
        window.location.href='index.php';
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
                              AND css_schedule.sy_id=$sy_id AND css_school_yr.status != 'used'");

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

$lock = mysqli_query($conn, "UNLOCK TABLES");

  
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
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<title>PNHS</title>
		<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        
		<link rel="stylesheet" href="css/w3/w3.css">
		<link rel="stylesheet" href="docs/docs.min.css">
		<link rel="stylesheet" href="css/w3/blue.css">
		<link rel="stylesheet" href="css/w3/yellow.css">
<!--		<link rel="stylesheet" href="css/sideNav.css">-->
		<link rel="stylesheet" href="css/backToTop.css">
		<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css" type="text/css">
		<link rel="shortcut icon" href="docs/img/pnhs_favicon.ico" type="image/x-icon">
		<link rel="icon" href="docs/img/pnhs_favicon.ico" type="image/x-icon">
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
        <script src="js/index.js"></script>
		<style>
			body {
				position: relative; 
			}
			.affix {
				top:0;
				width: 100%;
				z-index: 9999 !important;
			}
			.navbar {
				margin-bottom: 0px;
			}
			.affix ~ .container-fluid {
				position: relative;
				top: 50%;
			} 
			.w3-card-4, .w3-hover-shadow:hover {
				box-shadow: none;
			}
			.w3-card-4, .w3 hover-shadow:hover {
				box-shadow: none;
			}
			#main {
				padding: 0px 35px;
			}
			.p-padding {
				padding: 15px;
			}
			#myCarousel {
				height: 400px;
				width: 100%;
			}
			.carousel-img {
				height: 400px;
			}
			#close-btn {
				background-color: #356d9a;
			}
			#nav-logo {
				height: 50px;
				width: 211px;
				padding: 0px;
				margin: 0px;
			}
			.navbar-brand {
				padding-right: 0px;
				padding-top: 0px;
			}
			body {
				font-size: 13px;
				background-color: white; /* #fdff3d */
			}
			.nav-color {
				color: white;
				border-color: #074b83;
			}
			.navbar-default .navbar-nav > li > a {
				color: white;
			}
			.navbar-default .navbar-nav > li > a:focus, 
			.navbar-default .navbar-nav > li > a:hover {
				color: white;
				background-color: #063c68;
			}
			.navbar-default .navbar-toggle {
				color: white;
				border-color: white;
				background-color: #074b83;
			}
			.navbar-default .navbar-toggle .icon-bar {
				background-color: white;
			}
			.carousel-size {
				height: 300px !important;
			}
			.navbar-default .navbar-text {
				background-color: #074b83;
				color: white;
				border-color: #074b83;
			}

			#calendar {
				max-width: 900px;
				margin: 0 auto;
				background: white;
			}
			td {
				height: 50px;
			}
			.today {
				background-color: rgba(42,101,149,100);
				color: white;
			}
			#login {
				cursor: pointer;
			}
			#black {
				color: black;
			}
			#cap_black:hover {
				color: black;
			}
		</style>
	</head>
	<body onload="myFunction()">
	
<?php if(mysqli_num_rows($sched)!=0){
?>
<center><h2 style="padding-bottom: 10px;"> <?php echo $name.' Schedule';
$query = mysqli_query($conn, "SELECT year FROM css_school_yr WHERE status = 'used' ");
$row = mysqli_fetch_row($query);
echo ' (S.Y. '.$year.')';
?><br></h2></center>
<?php }  else {?>
<center><h2 style="padding-bottom: 10px;">Sorry, you have no schedule yet.<br></h2></center>
<?php }?>
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
	
        <div id="wrapper">
            <?php 
                if(isset($_SESSION['user_data'])){
                    include("sidenav.php");
                }
                include("topnav.php");
            ?>
            <div id="main" class="container-fluid">
  <div class="tab-content">
		
  <!-- GRADE 7 -->	  	



        
	<table style="width:100%"><br>
                        <thead>
                          <tr class="headings">
                            <td width="100px" class="column-title" style="text-align:center;font-size:18px;">TIME</td>
                            <td width="100px" class="column-title" style="text-align:center"><p style="font-size:18px;">Section</p></td>
                          </tr>
                        </thead>
          <tbody style="text-align: center; font-size: 15px">
            <?php 
            for ($i=0; $i < 14; $i++) { 
              if(empty($print[$i])){
                $print[$i]="";
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
            <?php 
                include("footer.php");
            ?>
        </div>
		
<!-- SCRIPT -->
<script type="text/javascript">
  
</script>
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/sidebar-menu.js"></script>
<script src="../js/sideNav.js"></script>
<script>
$.sidebarMenu($('.sidebar-menu'))
</script>
<script src="../js/jquery.stickytableheaders.js"></script>
<script>
			$("table").stickyTableHeaders({ scrollableArea: $(".scrollable-area")[0], "fixedOffset": 57 });
</script>

<!--- Live search-->
<script src="../js/jquery-1.7.2.min.js"></script>

<!-- SCRIPT -->
        
	</body>
</html>