<?php
include "db_conn.php";
include "../func.php";
include "../session.php";


$sy = mysqli_query($conn, "SELECT * FROM css_school_yr");

/*if(!$_SESSION['sy']==1){
  header("location: other_module_page.php");
}
*/
$dept = mysqli_query($conn, "SELECT * FROM pims_department WHERE dept_ID!=2 AND dept_ID!=7 AND dept_ID!=8");
$sub = mysqli_query($conn, "SELECT * FROM css_subject");

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
</style>
	
    <body>
	<?php include("../topnav.php"); ?>
        <div id="wrapper" style = "height:115%">
            <?php include("../sidenav.php"); ?>	
            
                <div class="container" style="min-height:800px">
					<center><h2 style="padding-bottom: 30px; padding-top: 50px"> Manage Time Schedule<br> </h2></center>
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#add">Manage</a></li>
                        <li ><a data-toggle="tab" href="#add2">Other</a></li>
					</ul>
					
					<div class="tab-content">
						<div id="add" class="tab-pane fade in active">
						<div class="row"><br>
						   <div class="col-md-5">
							 <div class="panel panel-default">
							   <div class="panel-heading">Time</div>
							   <div class="panel-body">
								 <form class="form-horizontal" action="time_process.php" method="POST">

                                    <?php $sql = mysqli_query($conn, "SELECT * FROM css_school_yr, css_time WHERE css_school_yr.sy_id=css_time.sy_id AND status='used'");
                                        $per = mysqli_num_rows($sql);
                                    ?>

                                    <div class="form-group"> 
                                       <label for="inputEmail3" class="col-md-5 control-label" style="margin-left:-15px">No. of Periods&nbsp;&nbsp;&nbsp;:</label>
                                       <div class="col-md-7">
                                            <input class="form-control" type="number" onchange="periods(this.value)" value="<?php echo $per?>" required=""></input>
                                       </div>
                                    </div>


                          <div class="form-group"> 
                                       <label for="inputEmail3" class="col-md-5 control-label" style="margin-left:-15px">Start time &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
                                       <div class="col-md-7">
                                            <input class="form-control" name="time4" type="time" required=""></input>

                                        </div>
                                    </div>

                                   <div class="form-group"> 
                                       <label for="inputEmail3" class="col-md-5 control-label" style="margin-left:-15px">Interval (mins)&nbsp;:</label>
                                       <div class="col-md-7">
                                            <input class="form-control" name="inter4" type="number" required=""></input>
                                       </div>
                                    </div>

                                    <div class="form-group"> 
                                       <label for="inputEmail3" class="col-md-5 control-label" style="margin-left:-15px">Recess (mins)&nbsp;:</label>
                                       <div class="col-md-4">
                                            <input type="number" class="form-control" value="" name="yey" required></input>
                                        </div>
                                       <div class="col-md-3">
                                            <select class="form-control" name="pers4" id="pers1">
                                                <?php 
                                                for ($i=0; $i < $per; $i++) { 
                                                    $ti = $i+1;
                                                    if($ti==1){
                                                        $ti .= "st";
                                                    }
                                                    else if($ti==2){
                                                        $ti .= "nd";
                                                    }
                                                    else if($ti==3){
                                                        $ti .= "rd";
                                                    }
                                                    else{
                                                        $ti .= "th";
                                                    }
                                                
                                                echo '
                                                <option value="'.$i.'">'.$ti.'</option>';
                                                }
                                                ?>
                                            </select>
                                       </div>
                                    </div>
                                </di>
                                    
                                    <div class="form-group">
                                       <div class="col-md-offset-4 col-md-1" style="margin-left:175px">
                                        <button type="submit" class="btn save"  name="update" >Update</button>
                                       </div>
                                    </div>
                                    </form>
								</div>
							 </div>
							 </div>
                             <div class="col-md-7">
                             <div class="panel panel-default">
                               <div class="panel-heading" >Time</div>
                               <div class="panel-body">
                                 <table width="100%" id="time_re" class="table table-striped table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th style="width:70px">Periods</th>
                                    <th>AM</th>
                                    <th>PM</th>
                                  </tr>
                                </thead>
                                <?php
                                $sy2 = mysqli_query($conn, "SELECT sy_id FROM css_school_yr WHERE status = 'used'");
                                $rr = mysqli_fetch_row($sy2);
                                $yr = $rr[0];
                                if(!empty($yr)){
                                $time_ck = mysqli_query($conn, "SELECT * FROM css_time WHERE sy_id=$yr");
                                if(mysqli_num_rows($time_ck)!=0){
                                      $time_sql = mysqli_query($conn, "SELECT am_s FROM css_time WHERE sy_id=$yr");
                                      foreach ($time_sql as $key) {
                                        $times1[] = $key['am_s'];
                                      }
                                      $time_sql = mysqli_query($conn, "SELECT am_e FROM css_time WHERE sy_id=$yr");
                                      foreach ($time_sql as $key) {
                                        $timee1[] = $key['am_e'];
                                      }
                                      for ($i=0; $i < count($times1); $i++) { 
                                        $timea[] = substr($times1[$i], 0, -3)."-".substr($timee1[$i], 0, -3); 
                                      }

                                      $time_sql = mysqli_query($conn, "SELECT pm_s FROM css_time WHERE sy_id=$yr");
                                      foreach ($time_sql as $key) {
                                        $times2[] = $key['pm_s'];
                                      }
                                      $time_sql = mysqli_query($conn, "SELECT pm_e FROM css_time WHERE sy_id=$yr");
                                      foreach ($time_sql as $key) {
                                        $timee2[] = $key['pm_e'];
                                      }
                                      for ($i=0; $i < count($times2); $i++) { 
                                        $timep[] = substr($times2[$i], 0, -3)."-".substr($timee2[$i], 0, -3); 
                                      }
                                      for ($i=0; $i < count($times1); $i++) { 
                                          $t = $i+1;
                                          if($t==1){
                                              $t .= "st";
                                          }
                                          else if($t==2){
                                              $t .= "nd";
                                          }
                                          else if($t==3){
                                              $t .= "rd";
                                          }
                                          else{
                                              $t .= "th";
                                          }
                                          echo '
                                          <tr>
                                              <th>'.$t.'</th>
                                              <th>'.$timea[$i].'</th>
                                              <th>'.$timep[$i].'</th>
                                          </tr>
                                              ';
                                      }
                                    }
                                }
                                ?>
                                </table>
                                </div>
                             </div>
                             </div>
						 </div>
						</div>	
                        <?php 
                            $times1 = null;
                            $times2 = null;
                            $timee1 = null;
                            $timee2 = null;
                            $timea = null;
                            $timep = null;
                        ?>
                        <div id="add2" class="tab-pane fade">
                        <div class="row"><br>
                           <div class="col-md-5">
                             <div class="panel panel-default">
                               <div class="panel-heading">Time</div>
                               <div class="panel-body">
                                 <form class="form-horizontal" action="time_process.php" method="POST">
                                    <?php $sql = mysqli_query($conn, "SELECT * FROM css_school_yr, css_time WHERE css_school_yr.sy_id=css_time.sy_id AND status='used'");
                                        $per = mysqli_num_rows($sql);
                                    ?>
                                <div class="form-group"> 
                                       <label for="inputEmail3" class="col-md-5 control-label" style="margin-left:-15px">No. of Periods&nbsp;:</label>
                                       <div class="col-md-7">
                                            <input class="form-control" type="number" onchange="periods(this.value)" value="<?php echo $per?>" required=""></input>
                                       </div>
                                    </div>

                          <div class="form-group"> 
                                       <label for="inputEmail3" class="col-md-5 control-label" style="margin-left:-15px">Start time&nbsp;:</label>
                                       <div class="col-md-4">
                                            <input type="time" class="form-control" value="" name="time" ></input>
                                        </div>
                                       <div class="col-md-3">
                                            <select class="form-control" name="pers" id="pers2">
                                                <?php 
                                                for ($i=0; $i < $per; $i++) { 
                                                    $ti = $i+1;
                                                    if($ti==1){
                                                        $ti .= "st";
                                                    }
                                                    else if($ti==2){
                                                        $ti .= "nd";
                                                    }
                                                    else if($ti==3){
                                                        $ti .= "rd";
                                                    }
                                                    else{
                                                        $ti .= "th";
                                                    }
                                                
                                                echo '
                                                <option value="'.$i.'">'.$ti.'</option>';
                                                }
                                                ?>
                                            </select>
                                       </div>
                                    </div>
                                </di>
                                   <div class="form-group"> 
                                       <label for="inputEmail3" class="col-md-5 control-label" style="margin-left:-15px">Minutes&nbsp;:</label>
                                       <div class="col-md-7">
                                            <input class="form-control" name="mins" type="number" required=""></input>
                                       </div>
                                       
                                    </div>

                                    <div class="form-group">
                                       <div class="col-md-offset-4 col-md-2" style="margin-left:175px">
                                        <button type="submit" class="btn save">Update</button>
                                       </div>
                                    </div>
                                    </form>
                                </div>
                             </div>
                             </div>
                             <div class="col-md-7">
                             <div class="panel panel-default">
                               <div class="panel-heading" >Time</div>
                               <div class="panel-body">
                                 <table width="100%" id="time_re2" class="table table-striped table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th style="width:70px">Periods</th>
                                    <th>AM</th>
                                    <th>PM</th>
                                  </tr>
                                </thead>
                                <?php
                                $sy2 = mysqli_query($conn, "SELECT sy_id FROM css_school_yr WHERE status = 'used'");
                                $rr = mysqli_fetch_row($sy2);
                                $yr = $rr[0];
                                if(!empty($yr)){
                                $time_ck = mysqli_query($conn, "SELECT * FROM css_time WHERE sy_id=$yr");
                                if(mysqli_num_rows($time_ck)!=0){
                                      $time_sql = mysqli_query($conn, "SELECT am_s FROM css_time WHERE sy_id=$yr");
                                      foreach ($time_sql as $key) {
                                        $times1[] = $key['am_s'];
                                      }
                                      $time_sql = mysqli_query($conn, "SELECT am_e FROM css_time WHERE sy_id=$yr");
                                      foreach ($time_sql as $key) {
                                        $timee1[] = $key['am_e'];
                                      }
                                      for ($i=0; $i < count($times1); $i++) { 
                                        $timea[] = substr($times1[$i], 0, -3)."-".substr($timee1[$i], 0, -3); 
                                      }

                                      $time_sql = mysqli_query($conn, "SELECT pm_s FROM css_time WHERE sy_id=$yr");
                                      foreach ($time_sql as $key) {
                                        $times2[] = $key['pm_s'];
                                      }
                                      $time_sql = mysqli_query($conn, "SELECT pm_e FROM css_time WHERE sy_id=$yr");
                                      foreach ($time_sql as $key) {
                                        $timee2[] = $key['pm_e'];
                                      }
                                      for ($i=0; $i < count($times2); $i++) { 
                                        $timep[] = substr($times2[$i], 0, -3)."-".substr($timee2[$i], 0, -3); 
                                      }
                                      for ($i=0; $i < count($times1); $i++) { 
                                          $t = $i+1;
                                          if($t==1){
                                              $t .= "st";
                                          }
                                          else if($t==2){
                                              $t .= "nd";
                                          }
                                          else if($t==3){
                                              $t .= "rd";
                                                      }
                                          else{
                                              $t .= "th";
                                          }
                                          echo '
                                          <tr>
                                              <th>'.$t.'</th>
                                              <th>'.$timea[$i].'</th>
                                              <th>'.$timep[$i].'</th>
                                          </tr>
                                              ';
                                      }
                                    }
                                }
                                ?>
                                </table>
                                </div>
                             </div>
                             </div>
                         </div>
                        </div>
					</div>
					<br><br>

				</div> <!-- DIV FOR CONTAINER -->
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
<script  src="../js/index2.js"></script>
<script  src="../js/index3.js"></script>
<script  src="../js/index4.js"></script>
  <script src="../../../js/metisMenu.min.js"></script>
  <script src="../../../js/sb-admin-2.min.js"></script>
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


<div class="modal fade" id="school_year" role="dialog">
</div>

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
  function periods(val){
    $.ajax({
      type: "POST",
      url: "time_process.php",
      data: "per="+val,
      success: function(data){
        $("#time_re").html(data);
        $("#time_re2").html(data);
        perss(val);
      }
    });
  }

  function perss(val){
    $.ajax({
      type: "POST",
      url: "time_process.php",
      data: "persy="+val,
      success: function(data){
        $("#pers1").html(data);
        $("#pers2").html(data);
      }
    });
  }
</script>	

<!-- SCRIPT -->    

</body>
</html>

