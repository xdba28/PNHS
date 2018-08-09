<?php
include "db_conn.php";
include "../func.php";
include "../session.php";


//$times=array('06:30:00', '07:20:00', '08:10:00', '09:10:00', '10:00:00', '10:50:00', '11:40:00', '12:30:00', '01:20:00', '02:10:00', '03:10:00', '04:00:00', '04:50:00', '05:40:00');
//$timee=array('07:20:00', '08:10:00', '09:00:00', '10:00:00', '10:50:00', '11:40:00', '12:30:00', '01:20:00', '02:10:00', '03:00:00', '04:00:00', '04:50:00', '05:40:00', '06:30:00');
//$time=array('06:30 - 07:20', '07:20 - 08:10', '08:10 - 09:00', '09:10 - 10:00', '10:00 - 10:50', '10:50 - 11:40', '11:40 - 12:30', '12:30 - 01:20', '01:20 - 02:10', '02:10 - 03:00', '03:10 - 04:00', '04:00 - 04:50', '04:50 - 05:40', '05:40 - 06:30');


//Santillan, Abby
//$emp_no = $_SESSION['user_data']['acct']['emp_no'];
$emp_no = $emp=$_SESSION['user_data']['acct']['emp_no'];
$lock = mysqli_query($conn, "LOCK TABLES pims_personnel, pims_employment_records, css_schedule, css_section, css_school_yr READ");
$query = mysqli_query($conn, "SELECT emp_rec_ID FROM pims_personnel, pims_employment_records
                              WHERE pims_employment_records.emp_No=pims_personnel.emp_No
                              AND pims_personnel.emp_No=$emp_no");
							  							  
if(mysqli_num_rows($query)==0){
			echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('Sorry, you do not have schedule yet. Please check next time.')
			window.location.href='../../../index.php';
			</SCRIPT>");
			die();
}

foreach ($query as $key) {
  $emp_rec = $key['emp_rec_ID'];
}
$yr=null;
if(!empty($_GET['yr'])){
  $yr = $_GET['yr'];
  $_SESSION['sy_id'] = $yr;
}
else{
	$query = mysqli_query($conn, "SELECT sy_id FROM css_school_yr WHERE status = 'active' ");
	$row = mysqli_fetch_row($query);
	$yr = $row[0];
	$_SESSION['sy_id'] = $yr;
}
	$time_sql = mysqli_query($conn, "SELECT am_s FROM css_time WHERE sy_id=$yr");
    foreach ($time_sql as $key) {
      $times[] = $key['am_s'];
    }
    $time_sql = mysqli_query($conn, "SELECT pm_s FROM css_time WHERE sy_id=$yr");
    foreach ($time_sql as $key) {
      $times[] = $key['pm_s'];
    }
    $time_sql = mysqli_query($conn, "SELECT am_e FROM css_time WHERE sy_id=$yr");
    foreach ($time_sql as $key) {
      $timee[] = $key['am_e'];
    }
    $time_sql = mysqli_query($conn, "SELECT pm_e FROM css_time WHERE sy_id=$yr");
    foreach ($time_sql as $key) {
      $timee[] = $key['pm_e'];
    }
 	$time = array_merge($times, $timee);
$sy_query = mysqli_query($conn, "SELECT DISTINCT css_school_yr.sy_id, year, P_fname, P_lname 
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


	if (mysqli_num_rows($sy_query) != 0) {
		foreach ($sy_query as $key) {
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
		  for ($i=0; $i < count($times); $i++) { 
			if($key['TIME_START']==$times[$i]){
			  $ts=$i;
			  break;
			}
		  }
		  for ($i=0; $i < count($times); $i++) { 
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
	}
	else {
			echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('Sorry, you do not have schedule yet. Please check next time.'),window.location.href='../../../index.php';</SCRIPT>");
			die();

	}
  
?>
<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Browser's Tab Title -->
    <title>New S.Y. Class Schedule</title>
      
    <!-- Latest compiled and minified CSS -->
	<?php if ($_SESSION['screen_width'] >= 1600 ) {
			echo '<link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">';
			echo '<link rel="stylesheet" href="../css/w3/blue.css">';
		}
		elseif ($_SESSION['screen_width'] > 1142 ) {
			echo '<link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min2.css">';
			echo '<link rel="stylesheet" href="../css/w3/blue2.css">';

		}
		else{
			echo '<link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min3.css">';
			echo '<link rel="stylesheet" href="../css/w3/blue3.css">';
		}
	?>
	
    <!-- Optional theme -->
    <link rel="stylesheet" href="../css/w3/w3.css">
	<link rel="stylesheet" href="../css/style.css">

    <!-- Documents Path --->
    <link rel="stylesheet" href="..docs/docs.min.css">
    
    <!--Include your modified CSS below as needed-->
    <link rel="stylesheet" href="../css/w3/yellow.css">
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
	<body onload="myFunction()">
	<?php include("../topnav.php"); ?>
        <div id="wrapper" style = "height:115%">
            <?php include("../sidenav.php"); ?>	
			
			<?php 	if (mysqli_num_rows($sy_query) != 0) { ?>
						<center><h2 style="padding-bottom: 10px;padding-top:50px"> <?php echo $name.' Schedule';
						$query = mysqli_query($conn, "SELECT year FROM css_school_yr WHERE status = 'used' ");
						$row = mysqli_fetch_row($query);
						echo ' (S.Y. '.$year.')';
						?><br></h2></center>
				<?php }  
					else {?>
						<center><h2 style="padding-bottom: 10px;padding-top: 50px;">Sorry, you have no schedule yet.<br></h2></center>
				<?php }?>
				<!-- MODALS PRINT BUTTON -->   
				  

			
            <div id="main" class="container-fluid">
				<div class="tab-content" style="margin-left:145px">

					<div id="button_bars" style="width:92%"> 
					<?php if (mysqli_num_rows($sy_query) != 0) { ?>
							
							<form action="../fpdf/report_teacher.php" method="post">
							<input type="text" hidden value=<?php echo $year;?> name="yr"></input>
							<input type="text" hidden value=<?php echo $adv_sec;?> name="adv"></input>
							<input type="text" hidden value=<?php echo $count;?> name="load"></input>
							<input type="text" hidden value=<?php echo $name;?> name="name"></input>
							<input type="text" hidden value=<?php echo $room;?> name="room"></input>

							<button class="a btn btn-sm  create" style="position:right" type="submit">
							  <i class="fa fa-print"> Print</i>
							</button>
							</form>
							
						  <div class="dropdown" style="width:92%">
							<button class="dropbtn">
							  <a href="#" style="color:#000;">Select Grade <b class="caret"></b></a>
							</button>  
							<div style="overflow-y:scroll; height:150px; width:170px" class="dropdown-content"> 
							  <?php foreach ($sy_query as $key) {
							  echo '<a href="teacher.php?yr='.$key['sy_id'].'">'.$key['year'].'</a>';
							  }?>
							</div> 
						  </div>
					<?php } ?>
					<br><br>
					</div>
				
					<table style="width:92%"><br>
						<thead>
							<tr class="headings">
								<td width="100px" class="column-title" style="text-align:center;font-size:18px;background-color:#356d9a;color:#eee">TIME</td>
								<td width="100px" class="column-title" style="text-align:center;background-color:#356d9a"><p style="font-size:18px;color:#eee">CLASSES</p></td>
							</tr>
						</thead>
						
						<tbody style="text-align: center; font-size: 15px">
							<?php 
								for ($i=0; $i < count($times); $i++) { 
									if(empty($print[$i])){
										$print[$i]="--------";
									}
								}
								
								for ($i=0; $i < count($times); $i++) { 
									if($i%2 == 0) {
										echo'
										<tr>
										<td class="" width="30%"><b>'.substr($time[$i], 0, -3).'-'.substr($time[$i+1], 0, -3).'</b></td>
										<td class="" height="70px">'.$print[$i].'</td>
										</tr>
										';			
									}
									else {
										echo'
										<tr>
										<td class="" width="30%" style="background-color:#f4f4f5"><b>'.substr($time[$i], 0, -3).'-'.substr($time[$i+1], 0, -3).'</b></td>
										<td class="" height="70px" style="background-color:#f4f4f5">'.$print[$i].'</td>
										</tr>
										';
									}

								} 
							?>
							
						<tr>
							<td class="" width="30%"><b>ADVISER</b></td>
							
							<?php
							if (mysqli_num_rows($sy_query) != 0) {
								echo '<td class="" height="70px"><b>'.$adv_sec.'</b><br><?php echo $room?></td>';
							}
							else {
								echo '<td class="" height="70px"><b></td>';
							}

							echo '
						</tr>
						<tr>
							<td class="" width="30%"><b>TOTAL LOADS</b></td>';
							if (mysqli_num_rows($sy_query) != 0) {
								echo '<td class="" height="70px">'.$count.'</td>';
							}
							else {
								echo '<td class="" height="70px"></td>';
							}
						?>
						</tr>
						</tbody>
					</table>
				</div><br><br><br>
			</div>
            <?php 
                include("../include/footer.php");
            ?>
        </div>
		
<!-- SCRIPT -->
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/sidebar-menu.js"></script>
<script src="../js/sideNav.js"></script>
<script src="../js/index.js"></script>
  <script src="../../../js/metisMenu.min.js"></script>
  <script src="../../../js/sb-admin-2.min.js"></script>
<script>
$.sidebarMenu($('.sidebar-menu'))
</script>
<script src="../js/jquery.stickytableheaders.js"></script>
<script>
			$("table").stickyTableHeaders({ scrollableArea: $(".scrollable-area")[0], "fixedOffset": 0 });
</script>

<!--- Live search-->

<!-- SCRIPT -->
        
	</body>
</html>