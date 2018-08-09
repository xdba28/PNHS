<?php
include "db_conn.php";
include "../func.php";
include "../session.php";
//include "session_account.php";


//lrn of student?
//$lrn = 201733;
$lrn = $_SESSION['user_data']['acct']['lrn'];

if(empty($lrn)){
    echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('You are not login as student')
        window.location.href='../../../../pnhs';
        </SCRIPT>");
        die();
}

$yr=null;
if(!empty($_GET['yr'])){
  $yr = $_GET['yr'];
  $_SESSION['sy_id'] = $yr;

}
else{
  $sql = mysqli_query($conn, "SELECT css_school_yr.sy_id FROM sis_stu_rec, css_school_yr 
                          WHERE sis_stu_rec.sy_id=css_school_yr.sy_id
                          AND lrn  = $lrn ORDER BY css_school_yr.sy_id DESC LIMIT 1");
  $temp = mysqli_fetch_row($sql);
  $yr = $temp[0];
  $_SESSION['sy_id'] = $yr;
}
$query = mysqli_query($conn, "LOCK TABLES css_school_yr, css_subject, css_section, css_schedule, pims_employment_records, pims_personnel READ");
$sy_query = mysqli_query($conn, "SELECT rec_id, css_school_yr.sy_id, year
                          FROM sis_stu_rec, css_school_yr 
                          WHERE sis_stu_rec.sy_id=css_school_yr.sy_id
                          AND lrn  = $lrn");

$rows=mysqli_num_rows($sy_query);
if($rows==0){
  echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('You dont have schedule yet.')
        window.location.href='../../../';
        </SCRIPT>");
        die();
}
// $sy_l = mysqli_query($conn, "SELECT css_school_yr.sy_id, year
//                           FROM sis_stu_rec, css_school_yr 
//                           WHERE sis_stu_rec.sy_id=css_school_yr.sy_id
//                           AND lrn  = $lrn ORDER BY sy_id DESC LIMIT 1");
// $latest = mysqli_fetch_row($sy_l);


foreach ($sy_query as $key) {
    $sy_id = $key['sy_id'];
    $year = $key['year'];
    $stud_id = $key['rec_id'];
  if($yr==$key['sy_id']){
    break;
  }
}


$ts=null;
$te=null;  
$section = mysqli_query($conn, "SELECT css_section.SECTION_ID,SECTION_NAME, YEAR_LEVEL, ROOM_NO
                                FROM css_section, css_school_yr, sis_stu_rec
                                WHERE css_section.SECTION_ID=sis_stu_rec.section_id
                                AND css_section.sy_id=css_school_yr.sy_id
                                AND css_section.sy_id=$sy_id
                                AND rec_id=$stud_id");

foreach ($section as $key) {
  $s_id = $key['SECTION_ID'];
  $s = $key['SECTION_NAME'];
  $grade = $key['YEAR_LEVEL'];
}

$ad = mysqli_query($conn, "SELECT ROOM_NO, P_fname, P_lname 
                          FROM css_section, css_school_yr, pims_personnel, pims_employment_records 
                          WHERE css_school_yr.sy_id=css_section.sy_id AND css_section.sy_id=$sy_id
                          AND pims_personnel.emp_No=pims_employment_records.emp_No
                          AND pims_employment_records.emp_rec_ID=css_section.emp_rec_ID
                          AND SECTION_ID=$s_id");
if(mysqli_num_rows($ad)==1){
  $row = mysqli_fetch_row($ad);
  $adv_sec = $row[1]." ".$row[2];
  $room = "ROOM ".$row[0];
}
else{
  $adv_sec = "";
  $room = "";  
}

if($grade==7 || $grade==9){
    $time_sql = mysqli_query($conn, "SELECT am_s FROM css_time WHERE sy_id=$yr");
    foreach ($time_sql as $key) {
      $times[] = $key['am_s'];
    }
    
    $time_sql = mysqli_query($conn, "SELECT am_e FROM css_time WHERE sy_id=$yr");
    foreach ($time_sql as $key) {
      $timee[] = $key['am_e'];
    }
    $time_sql = mysqli_query($conn, "SELECT pm_s FROM css_time WHERE sy_id=$yr");
    foreach ($time_sql as $key) {
      $timess2[] = $key['pm_s'];
    }
}
else{
    $time_sql = mysqli_query($conn, "SELECT pm_s FROM css_time WHERE sy_id=$yr");
    foreach ($time_sql as $key) {
      $times[] = $key['pm_s'];
    }
    $time_sql = mysqli_query($conn, "SELECT pm_e FROM css_time WHERE sy_id=$yr");
    foreach ($time_sql as $key) {
      $timee[] = $key['pm_e'];
    }
    $time_sql = mysqli_query($conn, "SELECT am_s FROM css_time WHERE sy_id=$yr");
    foreach ($time_sql as $key) {
      $timess2[] = $key['am_s'];
    }
    
}
/*
if($grade==7 || $grade==9){
    $times=array('06:30:00', '07:20:00', '08:10:00', '09:10:00', '10:00:00', '10:50:00', '11:40:00');
    $timee=array('07:20:00', '08:10:00', '09:00:00', '10:00:00', '10:50:00', '11:40:00', '12:30:00');
    $timess=array('06:30', '07:20', '08:10', '09:10', '10:00', '10:50', '11:40');
    $timeee=array('07:20', '08:10', '09:00', '10:00', '10:50', '11:40', '12:30');
    $timess2=array('12:30:00', '01:20:00', '02:10:00', '03:10:00', '04:00:00', '04:50:00', '05:40:00');
}
else{
    $times=array('12:30:00', '01:20:00', '02:10:00', '03:10:00', '04:00:00', '04:50:00', '05:40:00');
    $timee=array('01:20:00', '02:10:00', '03:00:00', '04:00:00', '04:50:00', '05:40:00', '06:30:00');
    $timess=array('12:30', '01:20', '02:10', '03:10', '04:00', '04:50', '05:40');
    $timeee=array('01:20', '02:10', '03:00', '04:00', '04:50', '05:40', '06:30');
    $timess2=array('06:30:00', '07:20:00', '08:10:00', '09:10:00', '10:00:00', '10:50:00', '11:40:00');
}
*/
$query = mysqli_query($conn, "UNLOCK TABLES");
?>

<?php
    $print=null;

		$lock = mysqli_query($conn, "LOCK TABLES css_schedule, css_subject, css_section, css_school_yr, pims_personnel, pims_employment_records READ");
        $query = mysqli_query($conn, "SELECT TIME_START, TIME_END, subject_name, P_fname, P_lname, DAY
                              FROM css_schedule, css_subject, pims_employment_records, pims_personnel, css_school_yr
                              WHERE css_schedule.subject_id=css_subject.subject_id
                              AND pims_employment_records.emp_rec_ID=css_schedule.emp_rec_ID
                              AND pims_employment_records.emp_No=pims_personnel.emp_No
                              AND css_schedule.SY_ID=css_school_yr.SY_ID
                              AND css_school_yr.SY_ID=$sy_id
                              AND SECTION_ID = $s_id");
        $sec = mysqli_query($conn, "SELECT P_lname, P_fname 
                                    FROM pims_employment_records, pims_personnel, css_section
                                    WHERE pims_employment_records.emp_No=pims_personnel.emp_No
                                    AND css_section.emp_rec_ID=pims_employment_records.emp_rec_ID
                                    AND SECTION_ID = $s_id");
        $lock = mysqli_query($conn, "UNLOCK TABLES");
		
		if(mysqli_num_rows($query) == 0){
			echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('Sorry, you do not have schedule yet. Please check next time.')
			window.location.href='../../../index.php';
			</SCRIPT>");
			die();
		}
		
        foreach ($query as $row) {
          for ($i=0; $i < count($times); $i++) { 
            if($times[$i]==$row['TIME_START']){
              $ts = $i;
              break;
            }
          }
          for ($i=0; $i < count($times); $i++) { 
            if($timee[$i]==$row['TIME_END']){
              $te = $i;
              break;
            }
          }

          $teach_str = substr($row['P_fname'], 0, 1).". ".$row['P_lname'];

          $check = 0;
          for($i=0; $i<count($times); $i++){
            if($timess2[$i]==$row['TIME_START']){
              $check = 1;
            }
          }

        if($check==1){
          $tss=substr($row['TIME_START'], 0, -3);
          $tee=substr($row['TIME_END'], 0, -3);
          if(empty($print1[count($times)])){
            $print1[count($times)]="";
          }
          if(empty($print2[count($times)])){
            $print2[count($times)]="";
          }
          if(empty($print3[count($times)])){
            $print3[count($times)]="";
          }
          if(empty($print4[count($times)])){
            $print4[count($times)]="";
          }
          if(empty($print5[count($times)])){
            $print5[count($times)]="";
          }
          if($row['DAY']=='regular'){
            $print1[count($times)] .= $row['subject_name']."/".$teach_str."<br>".$tss."-".$tee;
            $print2[count($times)] .= $row['subject_name']."/".$teach_str."<br>".$tss."-".$tee;
            $print3[count($times)] .= $row['subject_name']."/".$teach_str."<br>".$tss."-".$tee;
            $print4[count($times)] .= $row['subject_name']."/".$teach_str."<br>".$tss."-".$tee;
            $print5[count($times)] .= $row['subject_name']."/".$teach_str."<br>".$tss."-".$tee;
          }
          else{
            $day_var = explode("-", $row['DAY']);
            for ($i=0; $i < count($day_var); $i++) { 
              if($day_var[$i]=='M'){
                $print1[count($times)] .= $row['subject_name'].'/'.$teach_str."<br>".$tss."-".$tee;
              }
              else if($day_var[$i]=='T'){
                $print2[count($times)] .= $row['subject_name'].'/'.$teach_str."<br>".$tss."-".$tee;
              }
              else if($day_var[$i]=='W'){
                $print3[count($times)] .= $row['subject_name'].'/'.$teach_str."<br>".$tss."-".$tee;
              }
              else if($day_var[$i]=='Th'){
                $print4[count($times)] .= $row['subject_name'].'/'.$teach_str."<br>".$tss."-".$tee;
              }
              else if($day_var[$i]=='F'){
                $print5[count($times)] .= $row['subject_name'].'/'.$teach_str."<br>".$tss."-".$tee;
              }
            }
          }
        }
          
          while($ts<=$te){
            if($row['DAY']!='regular'){
              if(empty($print[$ts])){
                $day_var = explode("-", $row['DAY']);
                for ($i=0; $i < count($day_var); $i++) { 
                  if($day_var[$i]=='M'){
                    $print1[$ts] = $row['subject_name']."<br>".$teach_str;
                  }
                  else if($day_var[$i]=='T'){
                    $print2[$ts] = $row['subject_name']."<br>".$teach_str;
                  }
                  else if($day_var[$i]=='W'){
                    $print3[$ts] = $row['subject_name']."<br>".$teach_str;
                  }
                  else if($day_var[$i]=='Th'){
                    $print4[$ts] = $row['subject_name']."<br>".$teach_str;
                  }
                  else if($day_var[$i]=='F'){
                    $print5[$ts] = $row['subject_name']."<br>".$teach_str;
                  }
                }
              }
              else{
                $print1[$ts] = $row['subject_name']."<br>".$teach_str;
                $print2[$ts] = $row['subject_name']."<br>".$teach_str;
                $print3[$ts] = $row['subject_name']."<br>".$teach_str;
                $print4[$ts] = $row['subject_name']."<br>".$teach_str;
                $print5[$ts] = $row['subject_name']."<br>".$teach_str;
              }
            }
            else{
              if($row['subject_name']=='Specialization'){
                if(empty($print1[$ts])){
                  $print1[$ts] = $row['subject_name']."<br>".$teach_str;
                  $print2[$ts] = $row['subject_name']."<br>".$teach_str;
                  $print3[$ts] = $row['subject_name']."<br>".$teach_str;
                  $print4[$ts] = $row['subject_name']."<br>".$teach_str;
                  $print5[$ts] = $row['subject_name']."<br>".$teach_str;
                }
                else{
                  $print1[$ts] .= "<br>".$teach_str;
                  $print2[$ts] .= "<br>".$teach_str;
                  $print3[$ts] .= "<br>".$teach_str;
                  $print4[$ts] .= "<br>".$teach_str;
                  $print5[$ts] .= "<br>".$teach_str;
                }
              }
              else{
                $print1[$ts] = $row['subject_name']."<br>".$teach_str;
                $print2[$ts] = $row['subject_name']."<br>".$teach_str;
                $print3[$ts] = $row['subject_name']."<br>".$teach_str;
                $print4[$ts] = $row['subject_name']."<br>".$teach_str;
                $print5[$ts] = $row['subject_name']."<br>".$teach_str;
              }
            }
            $ts++;
          }
        }
        for ($i=0; $i < count($times)+1; $i++) { 
          if(empty($print1[$i])){
            $print1[$i]="";
          }
          if(empty($print2[$i])){
            $print2[$i]="";
          }
          if(empty($print3[$i])){
            $print3[$i]="";
          }
          if(empty($print4[$i])){
            $print4[$i]="";
          }
          if(empty($print5[$i])){
            $print5[$i]="";
          }
        }
        $_SESSION['print_section1'] = serialize($print1);
        $_SESSION['print_section2'] = serialize($print2);
        $_SESSION['print_section3'] = serialize($print3);
        $_SESSION['print_section4'] = serialize($print4);
        $_SESSION['print_section5'] = serialize($print5);
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
					.table th, td, tr {
					  padding: 8px;
					  border: 1px solid #ddd;
					  width: 160px;
					  word-wrap:break-word;
					}
</style>

<body onload="myFunction()">
	<?php 
	include("../topnav.php"); 
	?>
        <div id="wrapper" style = "height:100%">

			<?php 
				if (isset($_SESSION['user_data']['acct']['emp_no'])) {
					include("../sidenav.php"); 
				}
			?> 
			
			<?php 	if (mysqli_num_rows($query) != 0) { ?>
						<center>
							<h2 style="padding-bottom:10px;padding-top:50px;margin-left:120px"> Schedule of <?php
							$query = mysqli_query($conn, "SELECT year FROM css_school_yr WHERE status = 'used' ");
							$row = mysqli_fetch_row($query);
							echo 'Grade '.$grade.'-'.$s.' (S.Y. '.$year.')';
							?>
							</h2>
							
							<?php if($adv_sec != NULL) {
								echo '
									<h4 style="margin-left:120px;font-family:times;font-size:25px"><b>'.$adv_sec.'</b></h4>
									<h6 style="margin-left:120px;font-size:19px"><i>'.$room.'</i></h6>
									<p style="margin-left:120px">(Adviser)</p>
								';
							} else {
								echo '
									<h4 style="margin-left:120px;font-family:times;font-size:25px"><b>No Adviser</b></h4>
								';
							}								
							?>
						</center>
				<?php }  
					else {?>
						<center><h2 style="padding-bottom: 10px;padding-top: 50px;">Sorry, you have no schedule yet.<br></h2></center>
				<?php }?>
			
		
			
            <div id="main" class="container-fluid">
				<div class="tab-content" style="margin-left:120px">
					<div id="button_bars" style="width:92%"> 

						<?php if (mysqli_num_rows($query) != 0) { ?>
									
						<?php echo '
						<a href="../fpdf/report_class.php?yr='.$year.'&adv='.$adv_sec.'&section='.$s.'&grade='.$grade.'&room='.$room.'">'; ?>
						<button class="a btn btn-sm  create">
						  <i class="fa fa-print"> Print</i>
						</button>
									
						<div class="dropdown" style="width:92%">
							<button class="dropbtn">
								<a href="#" style="color:#000;">Select Grade <b class="caret"></b></a>
							</button>  
							
							<div style="overflow-y:scroll; height:150px; width:170px" class="dropdown-content"> 
								<?php foreach ($sy_query as $key) {
									echo '<a href="section.php?yr='.$key['sy_id'].'">'.$key['year'].'</a>';
								}?>
							</div> 
						</div>
							<?php } ?>
						<br><br>
					</div> 

					<table style="width:92%"><br>
						<thead>
							<tr class="headings">
								<th class="column-title" style="text-align:center;font-size:13px"><b>Day </b></th>
								<th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">Monday</th>
								<th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">Tuesday</th> 
								<th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">Wednesday</th> 
								<th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">Thursday</th> 
								<th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">Friday</th> 
							</tr>
							<tr>
								<th class="time col-md-1 " style="font-size:13px; text-align:center; padding-top:10px"><b>Time</b>	</th> 
							</tr>
						</thead>
						
						<tbody style="text-align: center; font-size: 18px; font-family:times">
							<?php

							for ($i=0; $i < count($times)+1; $i++) {
								if($i!=count($times)) {
									if($i%2 == 0) {
										echo '<tr>    
											<td class="" width="30%" style="color:#ffff;background-color:#153948">'.substr($times[$i], 0, -3).' - '.substr($timee[$i], 0, -3).'</b></td>';					
									}
									else {
										echo '<tr>    
											<td class="" width="30%" style="color:#ffff;background-color:#153948">'.substr($times[$i], 0, -3).' - '.substr($timee[$i], 0, -3).'</b></td>';						
								   }
								}
								else {
									echo '<tr>    
									 <td class="" width="30%" style="color:#ffff;background-color:#153948"><b></b></td>';
								}

									if($i%2 == 0) {
										echo '<td class="" height="70px" style="background-color:#f4f4f5">'.$print1[$i].'</td>';
										echo '<td class="" height="70px" style="background-color:#f4f4f5">'.$print2[$i].'</td>';
										echo '<td class="" height="70px" style="background-color:#f4f4f5">'.$print3[$i].'</td>';
										echo '<td class="" height="70px" style="background-color:#f4f4f5">'.$print4[$i].'</td>';
										echo '<td class="" height="70px" style="background-color:#f4f4f5">'.$print5[$i].'</td>';
									}
									else {
										echo '<td class="" height="70px">'.$print1[$i].'</td>';
										echo '<td class="" height="70px">'.$print2[$i].'</td>';
										echo '<td class="" height="70px">'.$print3[$i].'</td>';
										echo '<td class="" height="70px">'.$print4[$i].'</td>';
										echo '<td class="" height="70px">'.$print5[$i].'</td>';
									}
							  echo '</tr>';
							} 
							?>
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
			$("table").stickyTableHeaders({ scrollableArea: $(".scrollable-area")[0], "fixedOffset": 50 });
</script>

<!--- Live search-->

<!-- SCRIPT -->
        
	</body>
</html>