<?php
session_start(); 
include "db_conn.php";
include "session_account.php";


//lrn of student?
$lrn = $_SESSION['user_data']['acct']['lrn'];

$yr=null;
if(!empty($_GET['yr'])){
  $yr = $_GET['yr'];
}
$query = mysqli_query($conn, "LOCK TABLES css_school_yr, css_subject, css_section, css_schedule, pims_employment_records, pims_personnel READ");
$sy = mysqli_query($conn, "SELECT rec_id, css_school_yr.sy_id, year
                          FROM sis_stu_rec, css_school_yr 
                          WHERE sis_stu_rec.sy_id=css_school_yr.sy_id
                          AND lrn  = $lrn ORDER BY sy_id");

$sy_l = mysqli_query($conn, "SELECT css_school_yr.sy_id, year
                          FROM sis_stu_rec, css_school_yr 
                          WHERE sis_stu_rec.sy_id=css_school_yr.sy_id
                          AND lrn  = $lrn ORDER BY sy_id DESC LIMIT 1");
$latest = mysqli_fetch_row($sy_l);


foreach ($sy as $key) {
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
                                AND rec_id=$stud_id AND css_school_yr.status != 'used'");
$rows=mysqli_num_rows($section);
if($rows==0){
  echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Sorry, you do not have any recorded schedules.')
        window.history.go(-1);
        </SCRIPT>");
        die();
}
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

$query = mysqli_query($conn, "UNLOCK TABLES");
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
        <li><a href="../../SIS/stu/student_pi.php?lrn=<?php echo $lrn;?>"><i class="fa fa-user fa-fw"></i> Student Profile</a></li>
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
				echo '<li style="margin-left:-20px"><a href="section.php?yr='.$latest[0].'"><i class="fa fa-circle-o"></i> S.Y. '.$latest[1].'</a></li>';
            }
			else {
                echo '<li style="margin-left:-20px"><a>No active schedule</a></li>';
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
                echo '<li><a href="section.php?yr='.$key['sy_id'].'"><i class="fa fa-circle-o"></i> S.Y. '.$key['year'].'</a></li>';
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
<div class="container-fluid" style="height:auto;min-height:550px;max-width:100%;margin-top:95px;margin-left:10px;margin-bottom:10px">


<body>
<!-- -----------------------------CONTENT STARTS HERE--------------------------------- -->

<center><h2 style="padding-bottom: 10px;"> Schedule of <?php
$query = mysqli_query($conn, "SELECT year FROM css_school_yr WHERE status = 'used' ");
$row = mysqli_fetch_row($query);
echo ''.$grade.'-'.$s.' (S.Y. '.$year.')';
?><br></h2></center>


<!-- MODALS PRINT BUTTON -->   
  <div id="button_bars"> 
    <?php echo '
    <a href="../fpdf/report_class.php?yr='.$year.'&adv='.$adv_sec.'&section='.$s.'&grade='.$grade.'&room='.$room.'">'; ?>
    <button class="a btn btn-sm  create" style="margin-right:6px; margin-top:5px">
      <i class="fa fa-print"> Print</i>
    </button>
    <br>
    </a>
  </div>
<!-- MODALS PRINT BUTTON END -->   
 
<!--- TABLES START -->




		
  <!-- GRADE 7 -->	  	

<?php
    $print=null;

		    $query1 = mysqli_query($conn, "LOCK TABLES css_schedule, css_subject, css_section, css_school_yr, pims_personnel, pims_employment_records READ");
        $query = mysqli_query($conn, "SELECT TIME_START, TIME_END, subject_name, P_fname, P_lname, DAY, css_subject.subject_id
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
        $query1 = mysqli_query($conn, "UNLOCK TABLES");
        foreach ($query as $row) {
          $sub = $row['subject_id'];
          for ($i=0; $i < 7; $i++) { 
            if($times[$i]==$row['TIME_START']){
              $ts = $i;
              break;
            }
          }
          for ($i=0; $i < 7; $i++) { 
            if($timee[$i]==$row['TIME_END']){
              $te = $i;
              break;
            }
          }

          $teach_str = substr($row['P_fname'], 0, 1).". ".$row['P_lname'];

          $check = 0;
          for($i=0; $i<7; $i++){
            if($timess2[$i]==$row['TIME_START']){
              $check = 1;
            }
          }
        
        if($check==1){
          $tss=substr($row['TIME_START'], 0, -3);
          $tee=substr($row['TIME_END'], 0, -3);
          if(empty($print[7])){
            $print[7]="";
          }
          if($row['DAY']=='regular'){
            if($sub==50010){
              if($print[7]==""){
                $print[7] .= $row['subject_name']."\n".$tss."-".$tee;
              }
              else{
                $print[7] .= "\n".$teach_str;
              }
            }
            else{
              $print[7] .= $row['subject_name'].'/'.$teach_str.'<br>'.$tss."-".$tee;
            }
          }
          else{
            if($sub==50010){
              if($print[7]==""){
                $print[7] .= $row['subject_name']."\n".$tss."-".$tee." ".$row['DAY'];
              }
              else{
                $print[7] .= "\n".$teach_str;
              }
            }
            else{
              $print[7] .= $row['subject_name'].'/'.$teach_str.'('.$row['DAY'].")<br>".$tss."-".$tee;
            }
          }
        }
          
          while($ts<=$te){
            if($row['DAY']!='regular'){
              if(empty($print[$ts])){
                $print[$ts]=$row['subject_name']."/".$teach_str." (".$row['DAY'].")"."<br>";
              }
              else{
                $print[$ts].=$row['subject_name']."/".$teach_str." (".$row['DAY'].")"."<br>";
              }
            }
            else{
              if($sub==50010){
                if(empty($print[$ts])){
                  $print[$ts] = $row['subject_name']."<br>".$teach_str."\n";
                }
                else{
                  $print[$ts] .= $teach_str."<br>";
                }
              }
              else{
                $print[$ts] = $row['subject_name']."<br>".$teach_str;
              }
            }
            $ts++;
          }
        }
        $_SESSION['print_section'] = serialize($print);
?>
<div id="g7">
	<table style="width:100%" id="table"><br>
                        <thead>
                          <tr class="headings">
                            <td width="100px" class="column-title" style="text-align:center">TIME</td>
                            <td width="100px" class="column-title" style="text-align:center"><p style="font-size:25px;"><?php echo $grade." - ".$s?></p><?php echo $room?></td>
                          </tr>
                        </thead>
                        <tbody style="text-align: center; font-size: 15px">
                        <?php
                        for ($i=0; $i < 8; $i++) {
                          if($i!=7){
                            echo '<tr>    
							   <td class="" width="30%" style="color:#24688"><b>'.$timess[$i].' - '.$timeee[$i].'</b></td>';
                          }
                          else{
                            echo '<tr>    
                             <td class="" width="30%" style="color:#24688"><b></b></td>';
                          }
                            if(!empty($print[$i])){
							               echo '<td class="" height="70px">'.$print[$i].'</td>';
                            }
                            else{
                             echo '<td class="" height="70px"></td>'; 
                            }
                          echo '</tr>';
                        } 
                        ?>
              
              <tr>
               <td class="" width="30%"><b>ADVISER</b></td>
               <td class="" height="70px"><?php echo $adv_sec ?></td>
              </tr>
                        </tbody>
                      </table>
      </div>

<!-- GRADE 7 END -->	  
	  
	  
<!-- GRADE 8 -->	  


<!-- GRADE 10 END -->	
 <!-- FOR <div class="container"> -->  
 <!-- FOR   <div class="tab-content"> -->
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

<!-- FOOOTER -->

    
<!-- SCRIPT 
<script type="text/javascript">
  function sec7(val){
    $.ajax({
      type: "POST",
      url: "sec7.php",
      data: "sec="+val,
      success: function(data){
        $("#home").html(data);
      }
    });
  }

  function sec8(val){
    $.ajax({
      type: "POST",
      url: "sec8.php",
      data: "sec="+val,
      success: function(data){
        $("#menu1").html(data);
      }
    });
  }

  function sec9(val){
    $.ajax({
      type: "POST",
      url: "sec9.php",
      data: "sec="+val,
      success: function(data){
        $("#menu2").html(data);
      }
    });
  }

  function sec10(val){
    $.ajax({
      type: "POST",
      url: "sec10.php",
      data: "sec="+val,
      success: function(data){
        $("#menu3").html(data);
      }
    });
  }

  function g7(val){
    $.ajax({
      type: "POST",
      url: "sec.php",
      data: "sec7="+val,
      success: function(data){
        $("#g7").html(data);
      }
    });
  }

  function g8(val){
    $.ajax({
      type: "POST",
      url: "sec.php",
      data: "sec8="+val,
      success: function(data){
        $("#g8").html(data);
      }
    });
  }

  function g9(val){
    $.ajax({
      type: "POST",
      url: "sec.php",
      data: "sec9="+val,
      success: function(data){
        $("#g9").html(data);
      }
    });
  }

  function g10(val){
    $.ajax({
      type: "POST",
      url: "sec.php",
      data: "sec10="+val,
      success: function(data){
        $("#g10").html(data);
      }
    });
  }
</script>
-->
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/sidebar-menu.js"></script>
<script src="../js/sideNav.js"></script>
<script>
$.sidebarMenu($('.sidebar-menu'))
</script>
<script src="../js/jquery.freezeheader.js"></script>
    <script>
    $(document).ready(function () {
        $("#table").freezeHeader();
    })
</script>
<!-- SCRIPT -->

</body>
</html>
	