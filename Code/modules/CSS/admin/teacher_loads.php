<?php
include "db_conn.php";
include "../func.php";
include "../session.php";


if(empty($_GET['range1']) && empty($_GET['range2'])){
  $r1 = "";
  $r2 = "";
}
else{
  $r2 = $_GET['range2'];
  $r1 = $_GET['range2'];
}

$sy_check = mysqli_query($conn, "SELECT * FROM css_school_yr WHERE status='used'");

if(mysqli_num_rows($sy_check)!=1){
	echo "<script> alert('Sorry, you must add new school year schedule first.'); window.location.href='year_level.php';</script>";
	die();
}

if(empty($_SESSION['sy'])){
	echo "<script> alert('Sorry, you must add new school year schedule first.'); window.location.href='year_level.php';</script>";
	die();
}

$query = mysqli_query($conn, "LOCK tables css_school_yr, pims_personnel, pims_employment_records, css_section, css_school_yr READ");

$sy = mysqli_query($conn, "SELECT * FROM css_school_yr");

$teacher = mysqli_query($conn, "SELECT emp_rec_ID, P_fname, P_lname FROM pims_employment_records, pims_personnel
                                WHERE pims_employment_records.emp_No=pims_personnel.emp_No 
                                AND faculty_type='Teaching' ORDER BY P_fname");

$query = mysqli_query($conn, "UNLOCK TABLES");
//$all_room = mysqli_query($conn, "SELECT * FROM css_room ORDER BY ROOM_NO");


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
	
    <link rel="stylesheet" href="../css/select2.min.css">
    
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
					<center><h2 style="padding-bottom: 30px; padding-top: 50px"> Teacher's Loads<br></h2></center>

					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#max">Set max loads</a></li>
						<li><a data-toggle="tab" href="#with">Teacher with loads</a></li>
						<li><a data-toggle="tab" href="#without">Teacher without loads</a></li>
					</ul>
					
					<div class="tab-content">
					
					
					<div id="max" class="tab-pane fade in active">
					<br>
					
					<div class="row">
						   <div class="col-md-5">
							 <div class="panel panel-default">
							   <div class="panel-heading">Assign Max Loads</div>
							   <div class="panel-body">
								 <form class="form-horizontal" action="teacher_loads_process.php" method="POST">
									<div class="form-group"> 
									   <label for="inputEmail3" class="col-md-4 control-label" style="margin-left:-17px">Teacher &nbsp;&nbsp;&nbsp;&nbsp;:</label>
									   <div class="col-md-8">
											 <select class="form-control" name = "teach_load" required="" id="select2">
											 	<?php 
											 	foreach ($teacher as $key) {
											 		echo '<option value='.$key['emp_rec_ID'].'>'.$key['P_fname'].' '.$key['P_lname'].'</option>';
											 	}
											 	?>
												</select>
										</div>
									</div>

								   <div class="form-group"> 
									   <label for="inputEmail3" class="col-md-4 control-label" style="margin-left:-17px">Max Loads :</label>
									   <div class="col-md-8">
											<input class="form-control" name="num_load" type="number" required="" min="3" max="8"></input>
									   </div>
									</div>
									
									<div class="form-group">
									   <div class="col-md-offset-4 col-md-1" style="margin-left:160px">
										<button type="submit" class="btn save">Set</button>
									   </div>
									</div>
									</form>
								</div>
							 </div>
							</div>
							 
							<div class="col-md-7">
							<div class="panel panel-default">
							<div class="panel-heading">Teacher set max loads</div>
							<div class="panel-body">
							<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example4">
								<thead>
									<tr>
									<th>Name</th>
									<th style="width:100px">Max Loads</th>
									</tr>
								</thead>
								<?php
								foreach ($teacher as $key) {
							$max_l = mysqli_query($conn, "SELECT max_load FROM css_loads WHERE emp_rec_id=".$key['emp_rec_ID']."");
							$max = mysqli_fetch_row($max_l);
							if($r1=="" && $r2==""){
							  if($max[0]!=0){
									 echo '
									 <tr>
										<td>'.$key['P_fname'].' '.$key['P_lname'].'</td>
								<td>'.$max[0].'</td>       
							  </tr>';
							  }
							}
							else{
							  if($r1 <= $max[0] && $r2 >= $max[0]){
							   echo '
							   <tr>
								<td>'.$key['P_fname'].' '.$key['P_lname'].'</td>
								<td>'.$max[0].'</td>       
							  </tr>';
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
					
					<div id="with" class="tab-pane fade in">
					<br>
					
					<div class="row">
						<div class="col-md-12">
						<div class="panel panel-default">
						<div class="panel-heading">Teacher total loads list</div>
						<div class="panel-body">
						<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example2">
							<thead>
								<tr>
								<th>Name</th>
								<th style="width:100px">Total Loads</th>
								</tr>
							</thead>
							<?php
							foreach ($teacher as $key) {
						$ass = mysqli_query($conn, "SELECT COUNT(emp_rec_id) FROM css_schedule, css_school_yr 
										WHERE css_school_yr.sy_id=css_schedule.sy_id AND status='used' 
									   AND emp_rec_ID=".$key['emp_rec_ID']."");
						$row = mysqli_fetch_row($ass);
						if($r1=="" && $r2==""){
						  if($row[0]!=0){
								 echo '
								 <tr>
									<td>'.$key['P_fname'].' '.$key['P_lname'].'</td>
							<td>'.$row[0].'</td>       
						  </tr>';
						  }
						}
						else{
						  if($r1 <= $row[0] && $r2 >= $row[0]){
						   echo '
						   <tr>
							<td>'.$key['P_fname'].' '.$key['P_lname'].'</td>
							<td>'.$row[0].'</td>       
						  </tr>';
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
					 
					<div id="without" class="tab-pane fade in">
					<div class="row"><br> 
						<div class="col-md-12">
						<div class="panel panel-default">
						<div class="panel-heading">Teacher total loads list</div>
						<div class="panel-body">
						<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
								<th>Name</th>
								<th style="width:100px">Total Loads</th>
								</tr>
							</thead>
							<?php
					  foreach ($teacher as $key) {
						$ass = mysqli_query($conn, "SELECT COUNT(emp_rec_id) FROM css_schedule, css_school_yr 
										WHERE css_school_yr.sy_id=css_schedule.sy_id AND status='used' 
									   AND emp_rec_ID=".$key['emp_rec_ID']."");
						$row = mysqli_fetch_row($ass);
						if($row[0]==0)
						echo '
						<tr>
						<td>'.$key['P_fname'].' '.$key['P_lname'].'</td>
						  <td>'.$row[0].'</td>       
						</tr>';
					  }
					  ?>
						</table>
						</div>
						</div>
						</div>
					 </div>
					 </div>
					 
					 </div>

				</div><br><br> <!-- DIV FOR CONTAINER -->
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
<script src="../js/select2.min.js"></script>

<!-- DataTables JavaScript -->
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap.min.js"></script>
    <script src="../js/dataTables.responsive.js"></script>
	
	<script>
		$('#select2').select2();
	</script>

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

	
<!-- SCRIPT -->   

</body>
</html>
