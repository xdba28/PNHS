<?php
include "db_conn.php";
include "../../func.php";
include "../../session.php";


if(!empty($_GET['yr']) || !empty($_GET['gradelvl'])){
$yr = $_GET['yr'];
$_SESSION['sy_id'] = $yr;
$_SESSION['name'] = "report_department_";
include "db_conn.php";


$sy = mysqli_query($conn, "SELECT * FROM css_school_yr");
if(empty($_GET['gradelvl'])){
  $gradelvl = 7;  
}
else{
  $gradelvl = $_GET['gradelvl'];
}

if($gradelvl==7 || $gradelvl==9){
	$time_sql = mysqli_query($conn, "SELECT am_s FROM css_time, css_school_yr 
									WHERE css_time.sy_id=css_school_yr.sy_id AND css_school_yr.sy_id=$yr");
    foreach ($time_sql as $key) {
      $times[] = $key['am_s'];
    }
    
    $time_sql = mysqli_query($conn, "SELECT am_e FROM css_time, css_school_yr 
									WHERE css_time.sy_id=css_school_yr.sy_id AND css_school_yr.sy_id=$yr");
    foreach ($time_sql as $key) {
      $timee[] = $key['am_e'];
    }
	//$times=array('06:30:00', '07:20:00', '08:10:00', '09:10:00', '10:00:00', '10:50:00', '11:40:00');
    //$timee=array('07:20:00', '08:10:00', '09:00:00', '10:00:00', '10:50:00', '11:40:00', '12:30:00');
    //$timeee=array('07:20', '08:10', '09:00', '10:00', '10:50', '11:40', '12:30');
}
else{
	$time_sql = mysqli_query($conn, "SELECT pm_s FROM css_time, css_school_yr 
									WHERE css_time.sy_id=css_school_yr.sy_id AND css_school_yr.sy_id=$yr");
    foreach ($time_sql as $key) {
      $times[] = $key['pm_s'];
    }
    $time_sql = mysqli_query($conn, "SELECT pm_e FROM css_time, css_school_yr 
									WHERE css_time.sy_id=css_school_yr.sy_id AND css_school_yr.sy_id=$yr");
    foreach ($time_sql as $key) {
      $timee[] = $key['pm_e'];
    }
	//$times=array('12:30:00', '01:20:00', '02:10:00', '03:10:00', '04:00:00', '04:50:00', '05:40:00');
    //$timee=array('01:20:00', '02:10:00', '03:00:00', '04:00:00', '04:50:00', '05:40:00', '06:30:00');
    //$timeee=array('01:20', '02:10', '03:00', '04:00', '04:50', '05:40', '06:30');
}

$year_title_query = mysqli_query($conn, "SELECT year FROM css_school_yr WHERE sy_id = $yr");
$yr_title = mysqli_fetch_row($year_title_query);

?>

<!DOCTYPE html>
<html lang="en" >

	
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Browser's Tab Title -->
    <title>New S.Y. Class Schedule</title>
      
    <!-- Latest compiled and minified CSS -->
	<?php if ($_SESSION['screen_width'] >= 1600 ) {
			echo '<link rel="stylesheet" href="../../css/bootstrap/css/bootstrap.min.css">';
			echo '<link rel="stylesheet" href="../../css/w3/css_dept.css">';
		}
		elseif ($_SESSION['screen_width'] > 1142 ) {
			echo '<link rel="stylesheet" href="../../css/bootstrap/css/bootstrap.min2.css">';
			echo '<link rel="stylesheet" href="../../css/w3/css_dept2.css">';

		}
		else{
			echo '<link rel="stylesheet" href="../../css/bootstrap/css/bootstrap.min3.css">';
			echo '<link rel="stylesheet" href="../../css/w3/css_dept3.css">';
		}
	?>	

    <!-- Optional theme -->
    <link rel="stylesheet" href="../../css/w3/w3.css">
	<link rel="stylesheet" href="../../css/style.css">

    <!-- Documents Path --->
    <link rel="stylesheet" href="../../docs/docs.min.css">
    
    <!--Include your modified CSS below as needed-->
    <link rel="stylesheet" href="../../css/w3/yellow.css">
    <link rel="stylesheet" href="../../css/sidebar-menu.css">
    
    <!-- Icons CSS -->
    <link rel="stylesheet" href="../../css/font-awesome/css/font-awesome.min.css" type="text/css">
    
    <!-- Browser's Tab Image -->
    <link rel="shortcut icon" href="../../docs/img/pnhs_favicon.ico" type="image/x-icon">
    <link rel="icon" href="../../docs/img/pnhs_logoicon.jpg" type="image/x-icon">
	
	    <!-- DataTables CSS -->
    <link href="../../css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../../css/dataTables.responsive.css" rel="stylesheet">
	
    <!-- MetisMenu CSS -->
    <link href="../../css/metisMenu.min.css" rel="stylesheet">
	
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../../js/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="../../js/bootstrap.min.js"></script>

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
                    table {
                      table-layout: fixed;
                      width: 1040px;
					  word-wrap:break-word;
                    }
</style>
	
    <body>
	<?php include("topnav.php"); ?>
        <div id="wrapper" style = "height:115%">
            <?php include("sidenav.php"); ?>
				
                <div class="container">
					
					<center><h2 style="padding-bottom: 10px; padding-top: 20px"> Teacher's Schedule of Classes<?php
					$query = mysqli_query($conn, "SELECT year FROM css_school_yr WHERE css_school_yr.SY_ID=$yr ");
					$row = mysqli_fetch_row($query);
					echo ' (S.Y. '.$row[0].')';
					?><br></h2></center>

					 
					<!--- TABLES START -->
					<div class="container">
					  <div class="dropdown" style = "margin-left: -19px">
						<button class="dropbtn">
						  <a href="#" style="color:#000;">Select Grade <b class="caret"></b></a>
						</button>  
						<div style="overflow-y:scroll; height:150px; width:170px" class="dropdown-content"> 
						  <?php echo'
						  <a href="department.php?gradelvl=7&yr='.$yr.'">Grade 7</a>
						  <a href="department.php?gradelvl=8&yr='.$yr.'">Grade 8</a>
						  <a href="department.php?gradelvl=9&yr='.$yr.'">Grade 9</a>  
						  <a href="department.php?gradelvl=10&yr='.$yr.'">Grade 10</a>';
						  ?>
						</div> 
					  </div>
					</div>
					<br> 

					<!-- MODALS PRINT BUTTON -->   
					  <div id="button_bars">
						<a href="../../fpdf/report_department.php">
						<button class="a btn btn-sm  create" style="margin-right:6px; margin-top:5px">
						  <i class="fa fa-print"> Print</i>
						</button>
						</a>
					  </div>
					<!-- MODALS PRINT BUTTON END -->


					  <ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#english">English</a></li>
						<li><a data-toggle="tab" href="#science">Science</a></li>
						<li><a data-toggle="tab" href="#math">Math</a></li>
						<li><a data-toggle="tab" href="#filipino">Filipino</a></li>
						<li><a data-toggle="tab" href="#mapeh">Mapeh</a></li>
						<li><a data-toggle="tab" href="#ap">AP</a></li>
						<li><a data-toggle="tab" href="#esp">EsP</a></li>
						<li><a data-toggle="tab" href="#tle">TLE</a></li>
					  </ul>
					  
					  
					  
					<!-- TAB CONTENT FOR DEPARTMENT START -->
					  
					  <div class="tab-content">

					<!-- ENGLISH DEPARTMENT -->      
					<div id="english" class="tab-pane fade in active">

					  <!-- ENGLISH DEPARTMENT TAB CONTENT FOR GRADE LEVEL -->
					  <div class="tab-content">
						
						<!-- GRADE 7 -->
						<div id="english_grade7" class="tab-pane fade in active">
						  <table><br>
							<thead>
							  <tr class="headings">
								<th class="column-title" style="text-align:center;font-size:13px">Time </th>
							  <?php
							  for ($i=0; $i <count($times); $i++) {
								echo '<th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">'.substr($times[$i], 0, -3)."-".substr($timee[$i], 0, -3).'</th>';
							  }
							  ?> 
							  </tr>
							  <tr>
								<th class="time col-md-1 " style="font-size:13px; text-align:center; padding-top:10px">Teachers</th> 
							  </tr>
							  </thead>
								<tbody style="text-align: center; font-size: 15px">
								   <?php 
								   $eng = mysqli_query($conn, "SELECT * FROM pims_personnel, pims_employment_records
															  WHERE pims_personnel.emp_No=pims_employment_records.emp_No
															  AND dept_ID=6");
								   foreach ($eng as $key) {
									$teach_id = $key['emp_rec_ID'];
								   echo'<tr>';
									  $sec = mysqli_query($conn, "SELECT SECTION_NAME, SECTION_ID FROM css_section, css_school_yr 
																  WHERE YEAR_LEVEL = $gradelvl
																  AND css_section.SY_ID=css_school_yr.SY_ID
																  AND css_school_yr.SY_ID=$yr
																  AND emp_rec_ID=$teach_id");
									  $row = mysqli_fetch_row($sec);
									$teach_str = substr($key['P_fname'], 0, 1).". ".$key['P_lname'];
									
									echo '<td class="time" style="">'.$teach_str.'<br><br>';
									if(!empty($row[0])) {
									  echo '<p style="font-size:13px">'.$gradelvl."-".$row[0].'</p></td>';
									 }
									 $sched = mysqli_query($conn, "SELECT SECTION_NAME, DAY, TIME_START, TIME_END
																	FROM css_schedule, css_section, css_school_yr 
																	WHERE css_schedule.emp_rec_ID=$teach_id
																	AND css_schedule.SY_ID=css_school_yr.SY_ID
																	AND css_section.YEAR_LEVEL=$gradelvl 
																	AND css_schedule.SECTION_ID=css_section.SECTION_ID
																	AND css_school_yr.SY_ID=$yr");
									 $p=array();
									foreach ($sched as $row) {
									  for ($i=0; $i <count($times); $i++) { 
										if($times[$i]==$row['TIME_START']){
										  if($row['DAY']=='regular'){
											$p[$i] = $gradelvl."-".$row['SECTION_NAME'];
										  }
										  else{
											$p[$i] = $gradelvl."-".$row['SECTION_NAME']."<br>".$row['DAY'];  
										  }
										}
									  }
									}
									  for($i=0; $i<count($times); $i++) {
										if(!empty($p[$i])){
										  echo '<td style="text-align:center;vertical-align:middle">'.$p[$i].'</td>';  
										}
										else{
										  echo '<td style="text-align:center;vertical-align:middle"></td>';
										}
										
									  }  
										
									} 
									echo '<tr>';
									
									?>
								</tbody>
						  </table><br><br><br>
						</div>
						<!-- GRADE 7 END -->
						
						<!-- GRADE 8 -->
						
						<!-- GRADE 8 END -->

						<!-- GRADE 9 -->
						
						<!-- GRADE 9 END -->
						
						<!-- GRADE 10 -->
						
						<!-- GRADE 10 END -->
						
					  </div>
					  <!-- ENGLISH DEPARTMENT TAB CONTENT FOR GRADE LEVEL END-->
					</div>
					<!-- ENGLISH DEPARTMENT END -->    


					<!-- SCIENCE DEPARTMENT -->      
					<div id="science" class="tab-pane fade in">


					  
					  <!-- SCIENCE DEPARTMENT TAB CONTENT FOR GRADE LEVEL -->
					  <div class="tab-content">
						
						<!-- GRADE 7 -->
						<div id="science_grade7" class="tab-pane fade in active">
					  
						  <table><br>
							<thead>
							  <tr class="headings">
								<th class="column-title" style="text-align:center;font-size:13px">Time </th>
							  <?php
							  for ($i=0; $i <count($times); $i++) {
								echo '<th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">'.substr($times[$i], 0, -3)."-".substr($timee[$i], 0, -3).'</th>';
							  }
							  ?> 
							  </tr>
							  <tr>
								<th class="time col-md-1 " style="font-size:13px; text-align:center; padding-top:10px">Teachers</th> 
							  </tr>
							  </thead>
								<tbody style="text-align: center; font-size: 15px">
								   <?php 
								   $eng = mysqli_query($conn, "SELECT * FROM pims_personnel, pims_employment_records
															  WHERE pims_personnel.emp_No=pims_employment_records.emp_No
															  AND dept_ID=3");
								   foreach ($eng as $key) {
									$teach_id = $key['emp_rec_ID'];
								   echo'<tr>';
									  $sec = mysqli_query($conn, "SELECT SECTION_NAME, SECTION_ID FROM css_section, css_school_yr 
																  WHERE YEAR_LEVEL = $gradelvl
																  AND css_section.SY_ID=css_school_yr.SY_ID
																  AND css_school_yr.SY_ID=$yr
																  AND emp_rec_ID=$teach_id");
									  $row = mysqli_fetch_row($sec);
									$teach_str = substr($key['P_fname'], 0, 1).". ".$key['P_lname'];
									
									echo '<td class="time" style="">'.$teach_str.'<br><br>';
									if(!empty($row[0])) {
									  echo '<p style="font-size:13px">'.$gradelvl."-".$row[0].'</p></td>';
									 }
									 $sched = mysqli_query($conn, "SELECT SECTION_NAME, DAY, TIME_START, TIME_END
																	FROM css_schedule, css_section, css_school_yr 
																	WHERE css_schedule.emp_rec_ID=$teach_id
																	AND css_schedule.SY_ID=css_school_yr.SY_ID
																	AND css_section.YEAR_LEVEL=$gradelvl 
																	AND css_schedule.SECTION_ID=css_section.SECTION_ID
																	AND css_school_yr.SY_ID=$yr");
									 $p=array();
									foreach ($sched as $row) {
									  for ($i=0; $i <count($times); $i++) { 
										if($times[$i]==$row['TIME_START']){
										  if($row['DAY']=='regular'){
											$p[$i] = $gradelvl."-".$row['SECTION_NAME'];
										  }
										  else{
											$p[$i] = $gradelvl."-".$row['SECTION_NAME']."<br>".$row['DAY'];  
										  }
										}
									  }
									}
									  for($i=0; $i<count($times); $i++) {
										if(!empty($p[$i])){
										  echo '<td style="text-align:center;vertical-align:middle">'.$p[$i].'</td>';  
										}
										else{
										  echo '<td style="text-align:center;vertical-align:middle"></td>';
										}
										
									  }  
										
									} 
									echo '<tr>';
									
									?>
								</tbody>
						  </table><br><br><br>
						</div>
						<!-- GRADE 7 END -->
						
						<!-- GRADE 8 -->
						
						<!-- GRADE 8 END -->

						<!-- GRADE 9 -->
						
						<!-- GRADE 9 END -->
						
						<!-- GRADE 10 -->
						
						<!-- GRADE 10 END -->
						
					  </div>
					  <!-- SCIENCE DEPARTMENT TAB CONTENT FOR GRADE LEVEL END-->
					</div>
					<!-- SCIENCE DEPARTMENT END -->

					<!-- MATH DEPARTMENT -->     
					<div id="math" class="tab-pane fade in">
					 
					  <!-- MATH DEPARTMENT TAB CONTENT FOR GRADE LEVEL -->
					  <div class="tab-content">
						
						<!-- GRADE 7 -->
						<div id="math_grade7" class="tab-pane fade in active">
					  
						  <table><br>
							<thead>
							  <tr class="headings">
								<th class="column-title" style="text-align:center;font-size:13px">Time </th>
							  <?php
							  for ($i=0; $i <count($times); $i++) {
								echo '<th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">'.substr($times[$i], 0, -3)."-".substr($timee[$i], 0, -3).'</th>';
							  }
							  ?> 
							  </tr>
							  <tr>
								<th class="time col-md-1 " style="font-size:13px; text-align:center; padding-top:10px">Teachers</th> 
							  </tr>
							  </thead>
								<tbody style="text-align: center; font-size: 15px">
								   <?php 
								   $eng = mysqli_query($conn, "SELECT * FROM pims_personnel, pims_employment_records
															  WHERE pims_personnel.emp_No=pims_employment_records.emp_No
															  AND dept_ID=1");
								   foreach ($eng as $key) {
									$teach_id = $key['emp_rec_ID'];
								   echo'<tr>';
									  $sec = mysqli_query($conn, "SELECT SECTION_NAME, SECTION_ID FROM css_section, css_school_yr 
																  WHERE YEAR_LEVEL = $gradelvl
																  AND css_section.SY_ID=css_school_yr.SY_ID
																  AND css_school_yr.SY_ID=$yr
																  AND emp_rec_ID=$teach_id");
									  $row = mysqli_fetch_row($sec);
									$teach_str = substr($key['P_fname'], 0, 1).". ".$key['P_lname'];
									
									echo '<td class="time" style="">'.$teach_str.'<br><br>';
									if(!empty($row[0])) {
									  echo '<p style="font-size:13px">'.$gradelvl."-".$row[0].'</p></td>';
									 }
									 $sched = mysqli_query($conn, "SELECT SECTION_NAME, DAY, TIME_START, TIME_END
																	FROM css_schedule, css_section, css_school_yr 
																	WHERE css_schedule.emp_rec_ID=$teach_id
																	AND css_schedule.SY_ID=css_school_yr.SY_ID
																	AND css_section.YEAR_LEVEL=$gradelvl 
																	AND css_schedule.SECTION_ID=css_section.SECTION_ID
																	AND css_school_yr.SY_ID=$yr");
									 $p=array();
									foreach ($sched as $row) {
									  for ($i=0; $i <count($times); $i++) { 
										if($times[$i]==$row['TIME_START']){
										  if($row['DAY']=='regular'){
											$p[$i] = $gradelvl."-".$row['SECTION_NAME'];
										  }
										  else{
											$p[$i] = $gradelvl."-".$row['SECTION_NAME']."<br>".$row['DAY'];  
										  }
										}
									  }
									}
									  for($i=0; $i<count($times); $i++) {
										if(!empty($p[$i])){
										  echo '<td style="text-align:center;vertical-align:middle">'.$p[$i].'</td>';  
										}
										else{
										  echo '<td style="text-align:center;vertical-align:middle"></td>';
										}
										
									  }  
										
									} 
									echo '<tr>';
									
									?>
								</tbody>
						  </table><br><br><br>
						</div>
						<!-- GRADE 7 END -->
						
						<!-- GRADE 8 -->
						
						<!-- GRADE 8 END -->

						<!-- GRADE 9 -->
						
						<!-- GRADE 9 END -->
						
						<!-- GRADE 10 -->
						
						<!-- GRADE 10 END -->
						
					  </div>
					  <!-- MATH DEPARTMENT TAB CONTENT FOR GRADE LEVEL END-->
					</div>
					<!-- MATH DEPARTMENT END -->

					<!-- FILIPINO DEPARTMENT -->     
					<div id="filipino" class="tab-pane fade in">

					 
					  
					  <!-- FILIPINO DEPARTMENT TAB CONTENT FOR GRADE LEVEL -->
					  <div class="tab-content">
						
						<!-- GRADE 7 -->
						<div id="filipino_grade7" class="tab-pane fade in active">
					  
						  <table><br>
							<thead>
							  <tr class="headings">
								<th class="column-title" style="text-align:center;font-size:13px">Time </th>
							  <?php
							  for ($i=0; $i <count($times); $i++) {
								echo '<th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">'.substr($times[$i], 0, -3)."-".substr($timee[$i], 0, -3).'</th>';
							  }
							  ?> 
							  </tr>
							  <tr>
								<th class="time col-md-1 " style="font-size:13px; text-align:center; padding-top:10px">Teachers</th> 
							  </tr>
							  </thead>
								<tbody style="text-align: center; font-size: 15px">
								   <?php 
								   $eng = mysqli_query($conn, "SELECT * FROM pims_personnel, pims_employment_records
															  WHERE pims_personnel.emp_No=pims_employment_records.emp_No
															  AND dept_ID=5");
								   foreach ($eng as $key) {
									$teach_id = $key['emp_rec_ID'];
								   echo'<tr>';
									  $sec = mysqli_query($conn, "SELECT SECTION_NAME, SECTION_ID FROM css_section, css_school_yr 
																  WHERE YEAR_LEVEL = $gradelvl
																  AND css_section.SY_ID=css_school_yr.SY_ID
																  AND css_school_yr.SY_ID=$yr
																  AND emp_rec_ID=$teach_id");
									  $row = mysqli_fetch_row($sec);
									$teach_str = substr($key['P_fname'], 0, 1).". ".$key['P_lname'];
									
									echo '<td class="time" style="">'.$teach_str.'<br><br>';
									if(!empty($row[0])) {
									  echo '<p style="font-size:13px">'.$gradelvl."-".$row[0].'</p></td>';
									 }
									 $sched = mysqli_query($conn, "SELECT SECTION_NAME, DAY, TIME_START, TIME_END
																	FROM css_schedule, css_section, css_school_yr 
																	WHERE css_schedule.emp_rec_ID=$teach_id
																	AND css_schedule.SY_ID=css_school_yr.SY_ID
																	AND css_section.YEAR_LEVEL=$gradelvl 
																	AND css_schedule.SECTION_ID=css_section.SECTION_ID
																	AND css_school_yr.SY_ID=$yr");
									 $p=array();
									foreach ($sched as $row) {
									  for ($i=0; $i <count($times); $i++) { 
										if($times[$i]==$row['TIME_START']){
										  if($row['DAY']=='regular'){
											$p[$i] = $gradelvl."-".$row['SECTION_NAME'];
										  }
										  else{
											$p[$i] = $gradelvl."-".$row['SECTION_NAME']."<br>".$row['DAY'];  
										  }
										}
									  }
									}
									  for($i=0; $i<count($times); $i++) {
										if(!empty($p[$i])){
										  echo '<td style="text-align:center;vertical-align:middle">'.$p[$i].'</td>';  
										}
										else{
										  echo '<td style="text-align:center;vertical-align:middle"></td>';
										}
										
									  }  
										
									} 
									echo '<tr>';
									
									?>
								</tbody>
						  </table><br><br><br>
						</div>
						<!-- GRADE 7 END -->
						
						<!-- GRADE 8 -->
						
						<!-- GRADE 8 END -->

						<!-- GRADE 9 -->
						
						<!-- GRADE 9 END -->
						
						<!-- GRADE 10 -->
						
						<!-- GRADE 10 END -->
						
					  </div>
					  <!-- FILIPINO DEPARTMENT TAB CONTENT FOR GRADE LEVEL END-->
					</div>
					<!-- FILIPINO DEPARTMENT END -->

					<!-- MAPEH DEPARTMENT -->      
					<div id="mapeh" class="tab-pane fade in">


					  
					  <!-- MAPEH DEPARTMENT TAB CONTENT FOR GRADE LEVEL -->
					  <div class="tab-content">
						
						<!-- GRADE 7 -->
						<div id="mapeh_grade7" class="tab-pane fade in active">
					  
						  <table><br>
							<thead>
							  <tr class="headings">
								<th class="column-title" style="text-align:center;font-size:13px">Time </th>
							  <?php
							  for ($i=0; $i <count($times); $i++) {
								echo '<th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">'.substr($times[$i], 0, -3)."-".substr($timee[$i], 0, -3).'</th>';
							  }
							  ?> 
							  </tr>
							  <tr>
								<th class="time col-md-1 " style="font-size:13px; text-align:center; padding-top:10px">Teachers</th> 
							  </tr>
							  </thead>
								<tbody style="text-align: center; font-size: 15px">
								   <?php 
								   $eng = mysqli_query($conn, "SELECT * FROM pims_personnel, pims_employment_records
															  WHERE pims_personnel.emp_No=pims_employment_records.emp_No
															  AND dept_ID=10");
								   foreach ($eng as $key) {
									$teach_id = $key['emp_rec_ID'];
								   echo'<tr>';
									  $sec = mysqli_query($conn, "SELECT SECTION_NAME, SECTION_ID FROM css_section, css_school_yr 
																  WHERE YEAR_LEVEL = $gradelvl
																  AND css_section.SY_ID=css_school_yr.SY_ID
																  AND css_school_yr.SY_ID=$yr
																  AND emp_rec_ID=$teach_id");
									  $row = mysqli_fetch_row($sec);
									$teach_str = substr($key['P_fname'], 0, 1).". ".$key['P_lname'];
									
									echo '<td class="time" style="">'.$teach_str.'<br><br>';
									if(!empty($row[0])) {
									  echo '<p style="font-size:13px">'.$gradelvl."-".$row[0].'</p></td>';
									 }
									 $sched = mysqli_query($conn, "SELECT SECTION_NAME, DAY, TIME_START, TIME_END
																	FROM css_schedule, css_section, css_school_yr 
																	WHERE css_schedule.emp_rec_ID=$teach_id
																	AND css_schedule.SY_ID=css_school_yr.SY_ID
																	AND css_section.YEAR_LEVEL=$gradelvl 
																	AND css_schedule.SECTION_ID=css_section.SECTION_ID
																	AND css_school_yr.SY_ID=$yr");
									 $p=array();
									foreach ($sched as $row) {
									  for ($i=0; $i <count($times); $i++) { 
										if($times[$i]==$row['TIME_START']){
										  if($row['DAY']=='regular'){
											$p[$i] = $gradelvl."-".$row['SECTION_NAME'];
										  }
										  else{
											$p[$i] = $gradelvl."-".$row['SECTION_NAME']."<br>".$row['DAY'];  
										  }
										}
									  }
									}
									  for($i=0; $i<count($times); $i++) {
										if(!empty($p[$i])){
										  echo '<td style="text-align:center;vertical-align:middle">'.$p[$i].'</td>';  
										}
										else{
										  echo '<td style="text-align:center;vertical-align:middle"></td>';
										}
										
									  }  
										
									} 
									echo '<tr>';
									
									?>
								</tbody>
						  </table><br><br><br>
						</div>
						<!-- GRADE 7 END -->
						
						<!-- GRADE 8 -->
						
						<!-- GRADE 8 END -->

						<!-- GRADE 9 -->
						
						<!-- GRADE 9 END -->
						
						<!-- GRADE 10 -->
						
						<!-- GRADE 10 END -->
						
					  </div>
					  <!-- MAPEH DEPARTMENT TAB CONTENT FOR GRADE LEVEL END-->
					</div>
					<!-- MAPEH DEPARTMENT END-->

					<!-- AP DEPARTMENT -->     
					<div id="ap" class="tab-pane fade in">

					  
					  <!-- AP DEPARTMENT TAB CONTENT FOR GRADE LEVEL -->
					  <div class="tab-content">
						
						<!-- GRADE 7 -->
						<div id="ap_grade7" class="tab-pane fade in active">
					  
						  <table><br>
							<thead>
							  <tr class="headings">
								<th class="column-title" style="text-align:center;font-size:13px">Time </th>
							  <?php
							  for ($i=0; $i <count($times); $i++) {
								echo '<th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">'.substr($times[$i], 0, -3)."-".substr($timee[$i], 0, -3).'</th>';
							  }
							  ?> 
							  </tr>
							  <tr>
								<th class="time col-md-1 " style="font-size:13px; text-align:center; padding-top:10px">Teachers</th> 
							  </tr>
							  </thead>
								<tbody style="text-align: center; font-size: 15px">
								   <?php 
								   $eng = mysqli_query($conn, "SELECT * FROM pims_personnel, pims_employment_records
															  WHERE pims_personnel.emp_No=pims_employment_records.emp_No
															  AND dept_ID=12");
								   foreach ($eng as $key) {
									$teach_id = $key['emp_rec_ID'];
								   echo'<tr>';
									  $sec = mysqli_query($conn, "SELECT SECTION_NAME, SECTION_ID FROM css_section, css_school_yr 
																  WHERE YEAR_LEVEL = $gradelvl
																  AND css_section.SY_ID=css_school_yr.SY_ID
																  AND css_school_yr.SY_ID=$yr
																  AND emp_rec_ID=$teach_id");
									  $row = mysqli_fetch_row($sec);
									$teach_str = substr($key['P_fname'], 0, 1).". ".$key['P_lname'];
									
									echo '<td class="time" style="">'.$teach_str.'<br><br>';
									if(!empty($row[0])) {
									  echo '<p style="font-size:13px">'.$gradelvl."-".$row[0].'</p></td>';
									 }
									 $sched = mysqli_query($conn, "SELECT SECTION_NAME, DAY, TIME_START, TIME_END
																	FROM css_schedule, css_section, css_school_yr 
																	WHERE css_schedule.emp_rec_ID=$teach_id
																	AND css_schedule.SY_ID=css_school_yr.SY_ID
																	AND css_section.YEAR_LEVEL=$gradelvl 
																	AND css_schedule.SECTION_ID=css_section.SECTION_ID
																	AND css_school_yr.SY_ID=$yr");
									 $p=array();
									foreach ($sched as $row) {
									  for ($i=0; $i <count($times); $i++) { 
										if($times[$i]==$row['TIME_START']){
										  if($row['DAY']=='regular'){
											$p[$i] = $gradelvl."-".$row['SECTION_NAME'];
										  }
										  else{
											$p[$i] = $gradelvl."-".$row['SECTION_NAME']."<br>".$row['DAY'];  
										  }
										}
									  }
									}
									  for($i=0; $i<count($times); $i++) {
										if(!empty($p[$i])){
										  echo '<td style="text-align:center;vertical-align:middle">'.$p[$i].'</td>';  
										}
										else{
										  echo '<td style="text-align:center;vertical-align:middle"></td>';
										}
										
									  }  
										
									} 
									echo '<tr>';
									
									?>
								</tbody>
						  </table><br><br><br>
						</div>
						<!-- GRADE 7 END -->
						
						<!-- GRADE 8 -->
						
						<!-- GRADE 8 END -->

						<!-- GRADE 9 -->
						
						<!-- GRADE 9 END -->
						
						<!-- GRADE 10 -->
						
						<!-- GRADE 10 END -->
						
					  </div>
					  <!-- AP DEPARTMENT TAB CONTENT FOR GRADE LEVEL END-->
					</div>
					<!-- AP DEPARTMENT END -->

					<!-- EsP DEPARTMENT-->      
					<div id="esp" class="tab-pane fade in">

					 
					  
					  <!-- EsP DEPARTMENT TAB CONTENT FOR GRADE LEVEL -->
					  <div class="tab-content">
						
						<!-- GRADE 7 -->
						<div id="esp_grade7" class="tab-pane fade in active">
					  
						  <table><br>
							<thead>
							  <tr class="headings">
								<th class="column-title" style="text-align:center;font-size:13px">Time </th>
							  <?php
							  for ($i=0; $i <count($times); $i++) {
								echo '<th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">'.substr($times[$i], 0, -3)."-".substr($timee[$i], 0, -3).'</th>';
							  }
							  ?> 
							  </tr>
							  <tr>
								<th class="time col-md-1 " style="font-size:13px; text-align:center; padding-top:10px">Teachers</th> 
							  </tr>
							  </thead>
								<tbody style="text-align: center; font-size: 15px">
								   <?php 
								   $eng = mysqli_query($conn, "SELECT * FROM pims_personnel, pims_employment_records
															  WHERE pims_personnel.emp_No=pims_employment_records.emp_No
															  AND dept_ID=11");
								   foreach ($eng as $key) {
									$teach_id = $key['emp_rec_ID'];
								   echo'<tr>';
									  $sec = mysqli_query($conn, "SELECT SECTION_NAME, SECTION_ID FROM css_section, css_school_yr 
																  WHERE YEAR_LEVEL = $gradelvl
																  AND css_section.SY_ID=css_school_yr.SY_ID
																  AND css_school_yr.SY_ID=$yr
																  AND emp_rec_ID=$teach_id");
									  $row = mysqli_fetch_row($sec);
									$teach_str = substr($key['P_fname'], 0, 1).". ".$key['P_lname'];
									
									echo '<td class="time" style="">'.$teach_str.'<br><br>';
									if(!empty($row[0])) {
									  echo '<p style="font-size:13px">'.$gradelvl."-".$row[0].'</p></td>';
									 }
									 $sched = mysqli_query($conn, "SELECT SECTION_NAME, DAY, TIME_START, TIME_END
																	FROM css_schedule, css_section, css_school_yr 
																	WHERE css_schedule.emp_rec_ID=$teach_id
																	AND css_schedule.SY_ID=css_school_yr.SY_ID
																	AND css_section.YEAR_LEVEL=$gradelvl 
																	AND css_schedule.SECTION_ID=css_section.SECTION_ID
																	AND css_school_yr.SY_ID=$yr");
									 $p=array();
									foreach ($sched as $row) {
									  for ($i=0; $i <count($times); $i++) { 
										if($times[$i]==$row['TIME_START']){
										  if($row['DAY']=='regular'){
											$p[$i] = $gradelvl."-".$row['SECTION_NAME'];
										  }
										  else{
											$p[$i] = $gradelvl."-".$row['SECTION_NAME']."<br>".$row['DAY'];  
										  }
										}
									  }
									}
									  for($i=0; $i<count($times); $i++) {
										if(!empty($p[$i])){
										  echo '<td style="text-align:center;vertical-align:middle">'.$p[$i].'</td>';  
										}
										else{
										  echo '<td style="text-align:center;vertical-align:middle"></td>';
										}
										
									  }  
										
									} 
									echo '<tr>';
									
									?>
								</tbody>
						  </table><br><br><br>
						</div>
						<!-- GRADE 7 END -->
						
						<!-- GRADE 8 -->
						
						<!-- GRADE 8 END -->

						<!-- GRADE 9 -->
						
						<!-- GRADE 9 END -->
						
						<!-- GRADE 10 -->
						
						<!-- GRADE 10 END -->
						
					  </div>
					  <!-- EsP DEPARTMENT TAB CONTENT FOR GRADE LEVEL END-->
					</div>
					<!-- EsP DEPARTMENT END -->

					<!-- TLE DEPARTMENT -->      
					<div id="tle" class="tab-pane fade in">

					  
					  
					  <!-- TLE DEPARTMENT TAB CONTENT FOR GRADE LEVEL -->
					  <div class="tab-content">
						
						<!-- GRADE 7 -->
						<div id="tle_grade7" class="tab-pane fade in active">
					  
						  <table><br>
							<thead>
							  <tr class="headings">
								<th class="column-title" style="text-align:center;font-size:13px">Time </th>
							  <?php
							  for ($i=0; $i <count($times); $i++) {
								echo '<th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">'.substr($times[$i], 0, -3)."-".substr($timee[$i], 0, -3).'</th>';
							  }
							  ?> 
							  </tr>
							  <tr>
								<th class="time col-md-1 " style="font-size:13px; text-align:center; padding-top:10px">Teachers</th> 
							  </tr>
							  </thead>
								<tbody style="text-align: center; font-size: 15px">
								   <?php 
								   $eng = mysqli_query($conn, "SELECT * FROM pims_personnel, pims_employment_records
															  WHERE pims_personnel.emp_No=pims_employment_records.emp_No
															  AND dept_ID=4");
								   foreach ($eng as $key) {
									$teach_id = $key['emp_rec_ID'];
								   echo'<tr>';
									  $sec = mysqli_query($conn, "SELECT SECTION_NAME, SECTION_ID FROM css_section, css_school_yr 
																  WHERE YEAR_LEVEL = $gradelvl
																  AND css_section.SY_ID=css_school_yr.SY_ID
																  AND css_school_yr.SY_ID=$yr
																  AND emp_rec_ID=$teach_id");
									  $row = mysqli_fetch_row($sec);
									$teach_str = substr($key['P_fname'], 0, 1).". ".$key['P_lname'];
									
									echo '<td class="time" style="">'.$teach_str.'<br><br>';
									if(!empty($row[0])) {
									  echo '<p style="font-size:13px">'.$gradelvl."-".$row[0].'</p></td>';
									 }
									 $sched = mysqli_query($conn, "SELECT SECTION_NAME, DAY, TIME_START, TIME_END
																	FROM css_schedule, css_section, css_school_yr 
																	WHERE css_schedule.emp_rec_ID=$teach_id
																	AND css_schedule.SY_ID=css_school_yr.SY_ID
																	AND css_section.YEAR_LEVEL=$gradelvl 
																	AND css_schedule.SECTION_ID=css_section.SECTION_ID
																	AND css_school_yr.SY_ID=$yr");
									 $p=array();
									foreach ($sched as $row) {
									  for ($i=0; $i <count($times); $i++) { 
										if($times[$i]==$row['TIME_START']){
										  if($row['DAY']=='regular'){
											$p[$i] = $gradelvl."-".$row['SECTION_NAME'];
										  }
										  else{
											$p[$i] = $gradelvl."-".$row['SECTION_NAME']."<br>".$row['DAY'];  
										  }
										}
									  }
									}
									  for($i=0; $i<count($times); $i++) {
										if(!empty($p[$i])){
										  echo '<td style="text-align:center;vertical-align:middle">'.$p[$i].'</td>';  
										}
										else{
										  echo '<td style="text-align:center;vertical-align:middle"></td>';
										}
										
									  }  
										
									} 
									echo '<tr>';
									
									?>
								</tbody>
						  </table><br><br><br>
						</div>
						<!-- GRADE 7 END -->
						
						<!-- GRADE 8 -->
						
						<!-- GRADE 8 END -->

					  </div>
					  <!-- TLE DEPARTMENT TAB CONTENT FOR GRADE LEVEL END-->
					</div>
					<!-- TLE DEPARTMENT END -->
					<div class="modal fade" id="school_year" role="dialog">
					  
					</div>
					<!-- TAB CONTENT FOR DEPARTMENT END -->

						  
					</div>
					
					<!-- MAIN CONTENT END HERE -->
	
				</div><br> <!-- DIV FOR CONTAINER -->
	<!-- FOOOTER --->
	<?php 
		include "../../include/footer.php";
	?>
	<!-- FOOOTER --->
	</div> <!-- DIV FOR WRAPPER -->

    
<!-- SCRIPT -->
<script src="../../js/jquery-3.2.1.min.js"></script>
<script src="../../js/sidebar-menu.js"></script>
<script src="../../js/sideNav.js"></script>
<script src="../../js/jquery.stickytableheaders.js"></script>
<script src="../../js/index.js"></script>
  <script src="../../../../js/metisMenu.min.js"></script>
  <script src="../../../../js/sb-admin-2.min.js"></script>

<script>
$.sidebarMenu($('.sidebar-menu'))
</script>
<script>
      $("table").stickyTableHeaders({ scrollableArea: $(".scrollable-area")[0], "fixedOffset": 0 });
</script>
<!-- SCRIPT -->
<script type="text/javascript">
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

<!-- SCRIPT -->
	
</body>
</html>

<?php
}
?>