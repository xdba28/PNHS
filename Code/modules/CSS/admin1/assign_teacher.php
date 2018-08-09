<?php
include "db_conn.php";
include "../func.php";
include "../session.php";
//include "session_account.php";


$query = mysqli_query($conn, "LOCK TABLES css_school_yr, pims_employment_records, pims_personnel, css_credentials, css_subject READ");
$sy = mysqli_query($conn, "SELECT * FROM css_school_yr");
$emps = mysqli_query($conn, "SELECT emp_rec_ID, P_fname, P_lname FROM pims_employment_records, pims_personnel
                            WHERE pims_employment_records.emp_No=pims_personnel.emp_No
                            AND faculty_type='Teaching' ORDER BY P_fname");
$emp_count = mysqli_num_rows($emps);
$cred = mysqli_query($conn, "SELECT DISTINCT css_credentials.emp_rec_id 
                            FROM css_credentials, pims_employment_records
                            WHERE css_credentials.emp_rec_ID=pims_employment_records.emp_rec_ID
                            AND faculty_type='Teaching'");
$cred_count = mysqli_num_rows($cred);
$subj = mysqli_query($conn, "SELECT subject_id, sub_desc FROM css_subject WHERE subject_id!=50009
                            AND subject_id!=50005 AND subject_id!=50012 AND subject_id!=50008 
                            AND subject_id!=50010");
/*if($emp_count!=$cred_count){
  header("Location: assign_cred.php");
}*/
$query = mysqli_query($conn, "UNLOCK TABLES");
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
    
    <!-- Select 2 dropdown search --->
    <link rel="stylesheet" href="../css/select2.min.css">
	
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
					<center><h2 style="padding-bottom: 30px; padding-top: 50px">Teacher's Specializations<br></h2></center>
					<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#add">Assign</a></li>
					<li><a data-toggle="tab" href="#del">Delete</a></li>
						<!--<li><a data-toggle="tab" href="#no_adviser">Not Assign</a></li>-->
					</ul>
					
					<div class="tab-content">
						<div id="add" class="tab-pane fade in active">
						 <div class="row"><br>
						   <div class="col-md-5">

						   	<!-- <div class="panel panel-default">
							   <div class="panel-heading">Update Teacher Credentials</div>
							   <div class="panel-body">
								 <form class="form-horizontal" action="update_cred_process.php" method="post">
								   <div class="form-group"> 
									   <label for="inputEmail3" class="col-md-4 control-label" style="margin-left:-10px">Teacher &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
									   <?php 
									   	$inc = mysqli_query($conn, "SELECT * FROM pims_field, pims_personnel, pims_employment_records WHERE pims_field.emp_No=pims_personnel.emp_No AND pims_personnel.emp_No=pims_employment_records.emp_No");
									   ?>
									   <div class="col-md-8">
											<select class="form-control " name="emp_cred" required="" onchange="update_cred(this.value)">
												<option value="">Select</option>
												<?php 
													foreach ($inc as $key) {
														echo '<option value="'.$key['emp_No'].'">'.$key['P_fname'].' '.$key['P_lname'].'</option>';
													}
												?>
											</select>
											<br>
									   </div>
									   <div id="update_cred">
										   <label for="inputEmail3" class="col-md-4 control-label" style="margin-left:-10px">Major &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
										   <div class="col-md-8">
										   		<input type="text" value="" class="form-control" disabled=""><br>
										   	</div>
										   <label for="inputEmail3" class="col-md-4 control-label" style="margin-left:-10px">Minor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
										   <div class="col-md-8">
										   		<input type="text" value="" class="form-control" disabled=""><br>
										   	</div>
										   <label for="inputEmail3" class="col-md-4 control-label" style="margin-left:-10px">Related &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
										   <div class="col-md-8">
										   		<input type="text" value="" class="form-control" disabled=""><br>
									   	</div>
									   	</div>
									</div>
								   
									
									
									<div class="form-group">
									   <div class="col-md-offset-4 col-md-1" style="margin-left:182px">
										<button type="submit" class="btn save">Update</button>
									   </div>
									</div>
									</form>
								</div>
							 </div> -->

							 <div class="panel panel-default">
							   <div class="panel-heading">Assign Teacher</div>
							   <div class="panel-body">
								 <form class="form-horizontal" action="assign_teacher_process.php" method="post">
								   <div class="form-group"> 
									   <label for="inputEmail3" class="col-md-4 control-label" style="margin-left:-10px">Assign &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
									   <div class="col-md-8">
											<select class="form-control " name="cred" required="">
												<option value="">Select</option>
								<option value="Major">Major</option>
								<option value="Minor">Minor</option>
								<option value="Related">Related</option>
											</select> 
									   </div>
									</div>
								   <div class="form-group"> 
									   <label for="inputEmail3" class="col-md-4 control-label" style="margin-left:-10px">Subject &nbsp;&nbsp;&nbsp;&nbsp;:</label>
									   <div class="col-md-8">
											<select class="form-control " name="sub_id" required="">
												<option value="">Select</option>
								<?php
								foreach ($subj as $key) {
								  echo '<option value="'.$key['subject_id'].'">'.$key['sub_desc'].'</option>';
								}
								?>
											</select> 
									   </div>
									</div>
									<div class="form-group">
									   <label for="inputEmail3" class="col-md-4 control-label" style="margin-left:-10px">Teacher &nbsp;&nbsp;&nbsp;:</label>
									   <div class="col-md-8" >
											<select class="form-control" name="teach_id" id="select21" required="">
												<option>Select</option>
								<?php
								foreach ($emps as $key) {
								  echo '<option value="'.$key['emp_rec_ID'].'">'.$key['P_fname'].' '.$key['P_lname'].'</option>';
								}
								?>
											</select> 
									   </div>
									</div>
									
									<div class="form-group">
									   <div class="col-md-offset-4 col-md-1" style="margin-left:182px">
										<button type="submit" class="btn save">Ok</button>
									   </div>
									</div>
									</form>
								</div>
							 </div>
							 </div>
							 
							<div class="col-md-7">
								<div class="panel panel-default" >
									<div class="panel-heading">Teacher Specializations List</div>
									<div class="panel-body">
							  <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
								<thead>
								  <tr>
									<th>Name</th>
									<th style="width:70px">Major</th>
									<th style="width:70px">Minor</th>
									<th style="width:70px">Related</th>
								  </tr>
								</thead>
								<?php
								foreach ($emps as $key) {
								  $ma="";
								  $mi="";
								  $re="";
								  echo '
								  <tr>
								  <td>'.$key['P_fname'].' '.$key['P_lname'].'</td>';

								  $sub = mysqli_query($conn, "SELECT sub_desc FROM css_subject, css_credentials
															  WHERE css_credentials.subject_id=css_subject.subject_id
															  AND cred_title='Major'
															  AND emp_rec_ID=".$key['emp_rec_ID']."");
								  foreach ($sub as $row) {
									$ma .= $row['sub_desc'].'<br>';
								  }
								  echo'
								  <td style="text-align:center">'.$ma.'</td>';
								  $sub = mysqli_query($conn, "SELECT sub_desc FROM css_subject, css_credentials
															  WHERE css_credentials.subject_id=css_subject.subject_id
															  AND cred_title='Minor'
															  AND emp_rec_ID=".$key['emp_rec_ID']."");
								  foreach ($sub as $row) {
									$mi .= $row['sub_desc'].'<br>';
								  }
								  echo'
								  <td style="text-align:center">'.$mi.'</td>';
								  $sub = mysqli_query($conn, "SELECT sub_desc FROM css_subject, css_credentials
															  WHERE css_credentials.subject_id=css_subject.subject_id
															  AND cred_title='Related'
															  AND emp_rec_ID=".$key['emp_rec_ID']."");
								  foreach ($sub as $row) {
									$re .= $row['sub_desc'].'<br>';
								  }
								  echo'
								  <td style="text-align:center">'.$re.'</td>';
								}
								?>
											</table>
									</div>
								</div>
							</div>
						 </div>
						</div>
						
						<div id="del" class="tab-pane fade in">
						 <div class="row"><br>
						   <div class="col-md-5">
							 <div class="panel panel-default">
							   <div class="panel-heading">Delete Assigned Teacher</div>
							   <div class="panel-body">
								 <form class="form-horizontal" action="del_assign_process.php" method="post">
								   <div class="form-group"> 
									   <label for="inputEmail3" class="col-md-4 control-label" style="margin-left:-10px">Assign &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
									   <div class="col-md-8">
											<select class="form-control " name="cred" onchange="sub1(this.value)" required="">
												<option value="">Select</option>
												<option value="Major">Major in</option>
												<option value="Minor">Minor in</option>
												<option value="Related">Related in</option>
											</select> 
									   </div>
									</div>
									
								   <div class="form-group"> 
									   <label for="inputEmail3" class="col-md-4 control-label" style="margin-left:-10px">Subject &nbsp;&nbsp;&nbsp;&nbsp;:</label>
									   <div class="col-md-8" id="sub1">
											<select class="form-control " name="sub_id" onchange="teach2(this.value)" required="">
												<option va.>Select</option>
											</select> 
									   </div>
									</div>
								   <div class="form-group"> 
									   <label for="inputEmail3" class="col-md-4 control-label" style="margin-left:-10px">Teacher &nbsp;&nbsp;&nbsp;:</label>
									   <div class="col-md-8 " id="teach2">
											<select class="form-control " name="teach_id" required="">
												<option value="">Select</option>
											</select> 
									   </div>
									</div>
							   
									
									<div class="form-group">
									   <div class="col-md-offset-4 col-md-1" style="margin-left:182px">
										<button type="submit" class="btn save">Ok</button>
									   </div>
									</div>
									</form>
								</div>
							 </div>
							 </div>
							 
							<div class="col-md-7">
								<div class="panel panel-default">
									<div class="panel-heading">Teacher Specializations List</div>
									<div class="panel-body">
											<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example3">
												<thead>
													<tr>
														<th>Name</th>
														<th style="width:70px">Major</th>
														<th style="width:70px">Minor</th>
														<th style="width:70px">Related</th>
													</tr>
												</thead>
												<?php
								foreach ($emps as $key) {
								  $ma="";
								  $mi="";
								  $re="";
								  echo '
								  <tr>
								  <td>'.$key['P_fname'].' '.$key['P_lname'].'</td>';

								  $sub = mysqli_query($conn, "SELECT sub_desc FROM css_subject, css_credentials
															  WHERE css_credentials.subject_id=css_subject.subject_id
															  AND cred_title='Major'
															  AND emp_rec_ID=".$key['emp_rec_ID']."");
								  foreach ($sub as $row) {
									$ma .= $row['sub_desc'].'<br>';
								  }
								  echo'
								  <td style="text-align:center">'.$ma.'</td>';
								  $sub = mysqli_query($conn, "SELECT sub_desc FROM css_subject, css_credentials
															  WHERE css_credentials.subject_id=css_subject.subject_id
															  AND cred_title='Minor'
															  AND emp_rec_ID=".$key['emp_rec_ID']."");
								  foreach ($sub as $row) {
									$mi .= $row['sub_desc'].'<br>';
								  }
								  echo'
								  <td style="text-align:center">'.$mi.'</td>';
								  $sub = mysqli_query($conn, "SELECT sub_desc FROM css_subject, css_credentials
															  WHERE css_credentials.subject_id=css_subject.subject_id
															  AND cred_title='Related'
															  AND emp_rec_ID=".$key['emp_rec_ID']."");
								  foreach ($sub as $row) {
									$re .= $row['sub_desc'].'<br>';
								  }
								  echo'
								  <td style="text-align:center">'.$re.'</td>';
								}
								?>
											</table>
									</div>
								</div>
							</div>
						 </div>
						</div>
					</div>

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
<script src="../js/select2.min.js"></script>
  <script src="../../../js/metisMenu.min.js"></script>
  <script src="../../../js/sb-admin-2.min.js"></script>
	<script>
		$('#select2').select2();
	</script>

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


<script type="text/javascript">
  function sub1(val){
    $.ajax({
      type: "POST",
      url: "del_assign_sub.php",
      data: "cred="+val,
      success: function(data){
        $("#sub1").html(data);
      }
    });
  }

  function teach2(val){
    $.ajax({
      type: "POST",
      url: "del_assign_teach.php",
      data: "sub="+val,
      success: function(data){
        $("#teach2").html(data);
      }
    });
  }

  function update_cred(val){
    $.ajax({
      type: "POST",
      url: "update_cred.php",
      data: "cred="+val,
      success: function(data){
        $("#update_cred").html(data);
      }
    });
  }

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
</script>

	
</body>
</html>
