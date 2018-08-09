<?php
include "db_conn.php";
include "../func.php";
include "../session.php";

$_SESSION['modal'] = 1;

$screen_width = $_SESSION['screen_width'];

$_SESSION['sec_id'] = null;
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


  $sql = mysqli_query($conn, "SELECT sy_id FROM css_school_yr WHERE status='used'");
  $row = mysqli_fetch_row($sql);
  $yr_id = $row[0];
  $time_ck = mysqli_query($conn, "SELECT * FROM css_time WHERE sy_id=$yr_id");
  if(mysqli_num_rows($time_ck)==0){
    echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Please add Time at Options')
          window.location.href='time.php';
          </SCRIPT>");
          die();
  }
if($grade==7 || $grade==9){
    $time_sql = mysqli_query($conn, "SELECT am_s FROM css_time WHERE sy_id=$yr_id");
    foreach ($time_sql as $key) {
      $times[] = $key['am_s'];
    }
    
    $time_sql = mysqli_query($conn, "SELECT am_e FROM css_time WHERE sy_id=$yr_id");
    foreach ($time_sql as $key) {
      $timee[] = $key['am_e'];
    }
    $time_sql = mysqli_query($conn, "SELECT pm_s FROM css_time WHERE sy_id=$yr_id");
    foreach ($time_sql as $key) {
      $timess[] = $key['pm_s'];
    }
    //$times=array('06:30:00', '07:20:00', '08:10:00', '09:10:00', '10:00:00', '10:50:00', '11:40:00');
    //$timee=array('07:20:00', '08:10:00', '09:00:00', '10:00:00', '10:50:00', '11:40:00', '12:30:00');
    //$timess=array('12:30:00', '01:20:00', '02:10:00', '03:10:00', '04:00:00', '04:50:00', '05:40:00');
}
else{
    $time_sql = mysqli_query($conn, "SELECT pm_s FROM css_time WHERE sy_id=$yr_id");
    foreach ($time_sql as $key) {
      $times[] = $key['pm_s'];
    }
    $time_sql = mysqli_query($conn, "SELECT pm_e FROM css_time WHERE sy_id=$yr_id");
    foreach ($time_sql as $key) {
      $timee[] = $key['pm_e'];
    }
    $time_sql = mysqli_query($conn, "SELECT am_s FROM css_time WHERE sy_id=$yr_id");
    foreach ($time_sql as $key) {
      $timess[] = $key['am_s'];
    }
    //$times=array('12:30:00', '01:20:00', '02:10:00', '03:10:00', '04:00:00', '04:50:00', '05:40:00');
    //$timee=array('01:20:00', '02:10:00', '03:00:00', '04:00:00', '04:50:00', '05:40:00', '06:30:00');
    //$timess=array('06:30:00', '07:20:00', '08:10:00', '09:10:00', '10:00:00', '10:50:00', '11:40:00');
    
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

  for($i=0; $i<count($times); $i++){
    if($times[$i]==$row['TIME_START']){
      $ts = $i;
    }
  }

  for($i=0; $i<count($times); $i++){
    if($timee[$i]==$row['TIME_END']){
      $te = $i;
    }
  }
  $check = 0;
  for($i=0; $i<count($times); $i++){
    if($timess[$i]==$row['TIME_START']){
      $check = 1;
    }
  }

  if($check==1){
    $tss=substr($row['TIME_START'], 0, -3);
    $tee=substr($row['TIME_END'], 0, -3);

    $sched_p[$co][count($times)]="";

    if($row['DAY']=='regular'){
	  if($sub==50010) {
		  if($sched_p[$co][count($times)]==""){
			  $sched_p[$co][count($times)] .= $row['subject_name'].'<br>'.$tss."-".$tee.'<br>'.$teach_str.'<br>';
		  }
		  else {
			  $sched_p[$co][count($times)] .= $teach_str.'<br>';
		  }
	  }
	  else {
		  $sched_p[$co][count($times)] .= $row['subject_name'].'/'.$teach_str.'<br>'.$tss."-".$tee;
	  }
	}
	else {
		if($sub==50010){
			if($sched_p[$co][count($times)]!=""){
			  $sched_p[$co][count($times)] .= $row['subject_name'].'<br>'.$tss."-".$tee.'('.$row['DAY'].')<br>'.$teach_str.'<br>';
			}
			else {
			  $sched_p[$co][count($times)] .= $teach_str.'<br>';
			}
		}
		else {
			  $sched_p[$co][count($times)] .= $row['subject_name'].'/'.$teach_str.'('.$row['DAY'].')<br>'.$tss."-".$tee;
		}
	}
  }
	else{
    $query = mysqli_query($conn, "SELECT SCHED_ID FROM css_schedule, css_school_yr
                                  WHERE css_schedule.SY_ID=css_school_yr.SY_ID AND status='used' 
                                  GROUP BY TIME_START, TIME_END, SECTION_ID");
    $_SESSION['count_checker'] = mysqli_num_rows($query);
    $query = mysqli_query($conn, "SELECT SECTION_ID FROM css_section, css_school_yr
                                  WHERE css_section.SY_ID=css_school_yr.SY_ID AND status='used'");
    $_SESSION['cell_count'] = mysqli_num_rows($query) * count($times);

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

<?php 
//check adviser
  $_SESSION['adviser_checker']=0;
  $_SESSION['adviser_checker_count']=0;
  $query = mysqli_query($conn, "SELECT SECTION_ID FROM css_section, css_school_yr WHERE css_section.SY_ID=css_school_yr.SY_ID AND status='used'");
  $_SESSION['adviser_checker'] = mysqli_num_rows($query);
  $query = mysqli_query($conn, "SELECT SECTION_ID FROM css_section, css_school_yr WHERE css_section.SY_ID=css_school_yr.SY_ID AND status='used' AND emp_rec_id is not null");
  $_SESSION['adviser_checker_count'] = mysqli_num_rows($query);
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
	<?php if ($screen_width >= 1600 ) {
			echo '<link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">';
			echo '<link rel="stylesheet" href="../css/w3/blue.css">';
		}
		elseif ($screen_width > 1142 ) {
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
</style>
	
    <body> 
    <?php include("../topnav.php"); ?>       
		<div id="wrapper" style = "min-height:115%">            
		    <?php include("../sidenav.php"); ?> 
                <div class="container" style="min-height:800px">
<!-- -----------------------------CONTENT STARTS HERE--------------------------------- -->

<!-- MODAL IN CREATING SUBJECT (start)-->
<div class="tables">  
<div class="modal fade" id="CModal" role="dialog">

  </div><br>
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
  
<div class=" pane--table1">
  <div class="pane-hScroll">
	<br>
    <table>
		<thead>
			<?php 
        if(mysqli_num_rows($section)==0){
          echo '<center><h4 style="padding-bottom: 10px;">Add Section first</h4></center>';
        }
        else{
        ?>
      <tr class="headings">
        <th class="column-title" style="text-align: center;font-size:13px">Time </th>
        <?php for($i=0; $i<count($times); $i++){?>
        <th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">
        <?php echo substr($times[$i], 0, -3)."-".substr($timee[$i], 0, -3);?></th>
        <?php  }?> 
        <th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center"><button class="btn btn-default btn-circle-table" type="button" data-toggle="modal" data-target="#extend_sched" onclick="extend(this.value)">
        <i class="fa fa-plus"></i>
        </button></th>  
      </tr>
      <tr>
        <th class="time col-md-1 " style="font-size:13px; text-align:center; padding-top:10px">Room # & Section</th> 
      </tr>
      <?php }?>
		</thead>
    </table>

    <div class="pane-vScroll">
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
                            for($y=0; $y<count($times)+1; $y++){?>
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
			<?php 
        if(mysqli_num_rows($section)==0){
          echo '<center><h4 style="padding-bottom: 10px;">Add Section first</h4></center>';
        }
        else{
        ?>
      <tr class="headings">
        <th class="column-title" style="text-align: center;font-size:13px">Time </th>
        <?php for($i=0; $i<count($times); $i++){?>
        <th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">
        <?php echo substr($times[$i], 0, -3)."-".substr($timee[$i], 0, -3);?></th>
        <?php  }?> 
        <th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center"><button class="btn btn-default btn-circle-table" type="button" data-toggle="modal" data-target="#extend_sched" onclick="extend(this.value)">
        <i class="fa fa-plus"></i>
        </button></th>  
      </tr>
      <tr>
        <th class="time col-md-1 " style="font-size:13px; text-align:center; padding-top:10px">Room # & Section</th> 
      </tr>
      <?php }?>
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
                            for($y=0; $y<count($times)+1; $y++){?>
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
      <?php 
        if(mysqli_num_rows($section)==0){
          echo '<center><h4 style="padding-bottom: 10px;">Add Section first</h4></center>';
        }
        else{
        ?>
      <tr class="headings">
        <th class="column-title" style="text-align: center;font-size:13px">Time </th>
        <?php for($i=0; $i<count($times); $i++){?>
        <th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">
        <?php echo substr($times[$i], 0, -3)."-".substr($timee[$i], 0, -3);?></th>
        <?php  }?> 
        <th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center"><button class="btn btn-default btn-circle-table" type="button" data-toggle="modal" data-target="#extend_sched" onclick="extend(this.value)">
        <i class="fa fa-plus"></i>
        </button></th>  
      </tr>
      <tr>
        <th class="time col-md-1 " style="font-size:13px; text-align:center; padding-top:10px">Room # & Section</th> 
      </tr>
      <?php }?>
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
                            for($y=0; $y<count($times)+1; $y++){?>
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
			<?php 
        if(mysqli_num_rows($section)==0){
          echo '<center><h4 style="padding-bottom: 10px;">Add Section first</h4></center>';
        }
        else{
        ?>
      <tr class="headings">
        <th class="column-title" style="text-align: center;font-size:13px">Time </th>
        <?php for($i=0; $i<count($times); $i++){?>
        <th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">
        <?php echo substr($times[$i], 0, -3)."-".substr($timee[$i], 0, -3);?></th>
        <?php  }?> 
        <th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center"><button class="btn btn-default btn-circle-table" type="button" data-toggle="modal" data-target="#extend_sched" onclick="extend(this.value)">
        <i class="fa fa-plus"></i>
        </button></th>  
      </tr>
      <tr>
        <th class="time col-md-1 " style="font-size:13px; text-align:center; padding-top:10px">Room # & Section</th> 
      </tr>
      <?php }?>
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
                            for($y=0; $y<count($times)+1; $y++){?>
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
  
</div> 
</div> 
</div>
</div> <!-- DIV FOR CONTAINER -->
</div> <!-- DIV FOR WRAPPER -->
<!-- FOOOTER --->
<?php 
	include "../include/footer.php";
?>
<!-- FOOOTER --->
</div> <!-- DIV FOR WRAPPER -->


    
<!-- SCRIPT -->
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/sidebar-menu.js"></script>
<script src="../js/sideNav.js"></script>
<script  src="../js/index.js"></script>
<script  src="../js/index1.js"></script>
<script  src="../js/index2.js"></script>
<script  src="../js/index3.js"></script>
<script  src="../js/index4.js"></script>
  <script src="../../../js/metisMenu.min.js"></script>
  <script src="../../../js/sb-admin-2.min.js"></script>

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

</script>

	



<!-- SCRIPT -->

</body>
</html>
	