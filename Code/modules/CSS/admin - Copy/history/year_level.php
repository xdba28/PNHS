<?php
include "db_conn.php";
include "../../func.php";
include "../../session.php";



if(!empty($_GET['yr'])){
$_SESSION['yr'] = $_GET['yr'];
$yr = $_GET['yr'];
$_SESSION['sy_id'] = $yr;

include "db_conn.php";


$sy = mysqli_query($conn, "SELECT * FROM css_school_yr");
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
			echo '<link rel="stylesheet" href="../../css/w3/blue.css">';
		}
		elseif ($_SESSION['screen_width'] > 1142 ) {
			echo '<link rel="stylesheet" href="../../css/bootstrap/css/bootstrap.min2.css">';
			echo '<link rel="stylesheet" href="../../css/w3/blue2.css">';

		}
		else{
			echo '<link rel="stylesheet" href="../../css/bootstrap/css/bootstrap.min3.css">';
			echo '<link rel="stylesheet" href="../../css/w3/blue3.css">';
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
											  <br> <br>
											  
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
							 
								<form action="save_process.php" method="POST" class="form-horizontal custom-form">
								  <div class="form-group">

									  <div class="col-md-10 col-md-offset-1">
										<br>
										  <div>
											<div class="form-group" style="text-align:right">
											  <p style="text-align: center;">Are you sure you want to save?</p>
											  <br>
											  
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

					<center><h2 style="padding-bottom: 10px;"> Schedule for Academic Year <?php
					$query = mysqli_query($conn, "SELECT year FROM css_school_yr WHERE css_school_yr.SY_ID=$yr ");
					$row = mysqli_fetch_row($query);
					echo '(S.Y. '.$row[0].')';
					?><br></h2></center>

					<!-- MAIN CONTENT START HERE -->
						<!-- buttons sa taas ng tables (start) -->
                           <div id="button_bars"> 
                            <a href="../../fpdf/report_year_level.php">
                            <button class="a create btn btn-sm" type="button" data-toggle="modal" data-target="#" style="margin-right:6px; margin-top:5px">
                              <i class="fa fa-print"> Print</i>
                            </button>
                            </a>
                            <!-- buttons sa taas ng tables (end) -->
                          </div>
                       

						<!-- Selecting sections (start) -->
						<!-- Modal button end-->
 
						<!--- TABLES START -->

						  <ul class="nav nav-tabs">
						  <li class="active"><a data-toggle="tab" href="#home">Grade 7</a></li>
						  
							<li><a data-toggle="tab" href="#menu1">Grade 8</a></li>
						  
							<li><a data-toggle="tab" href="#menu2">Grade 9</a></li>
						  
							<li><a data-toggle="tab" href="#menu3">Grade 10</a></li>
						  
						  </ul>

						  <div class="tab-content">
							<!--- PLUS AND MINUS BUTTON -->
							
							<!--- PLUS AND MINUS BUTTON END -->
							
							
						  <!-- GRADE 7 -->	  
						<div id="home" class="tab-pane fade in active">  
						<div class=" pane--table1">
						  <div class="pane-hScroll">
							<br>
							<table>
								<thead>
									<tr class="headings">
										<th class="column-title" style="text-align:center;font-size:13px">Time </th>
										<?php 
					                    include "in_year_lvl1.php";
					                    for($i=0; $i<count($times); $i++){?>
					                    <th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">
					                    <?php echo substr($times[$i], 0, -3)."-".substr($timee[$i], 0, -3);?></th>
					                    <?php  }?>
										<th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center"></th> 
									</tr>
									<tr>
										<th class="time col-md-1 " style="font-size:13px; text-align:center; padding-top:10px">Room # & Section</th> 
									</tr>
								</thead>
							</table>

							<div class="pane-vScroll">
							  <table>
												<tbody style="text-align: center; font-size: 15px">
												<?php
												  $x = 0;
												  foreach($section as $sec_name) {
													$sec = mysqli_query($conn, "SELECT P_fname, P_lname, ROOM_NO 
																	FROM css_section, pims_personnel, pims_employment_records 
																	WHERE css_section.emp_rec_ID=pims_employment_records.emp_rec_ID
																	AND pims_employment_records.emp_No=pims_personnel.emp_No
																	AND SECTION_ID=".$sec_name['SECTION_ID']."");
													$row = mysqli_fetch_row($sec);
													$ad = substr($row[0], 0, 1).". ".$row[1];
													if($ad=='. '){
													  $ad = "";
													}
												  ?>
												  <td class="time" style="padding-top: 25px; text-align: center;"><?php echo $sec_name['SECTION_NAME']."<br>".$ad."<br>".$row[2]?>
												  </td>
													<?php
													for($y=0; $y<8; $y++){?>
													<td class="" style="padding-bottom:none">
													  
													  <div class="form-group">
														<div class="search-box">
														<?php
														if(!empty($days_p[$x][$y]) && $days_p[$x][$y]=='regular'){
														  if(!empty($subject_p[$x][$y])){
															echo '<p align="center">'.$subject_p[$x][$y].'<br></p>';
															if(!empty($teacher_p[$x][$y])){
															  echo '<p align="center">'.$teacher_p[$x][$y].'</p>';
															}
														  }
														}
														else if(!empty($sched_p[$x][$y])){
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
						<div id="menu1" class="tab-pane fade">  
						<div class=" pane--table1">
						  <div class="pane-hScroll2">
						  <br>
							<table>
							<thead>
							  <tr class="headings">
								<th class="column-title" style="text-align: center;font-size:13px">Time </th>
								<?php
			                    $times = null;
			                    include "in_year_lvl2.php";
			                    for($i=0; $i<count($times); $i++){?>
			                    <th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">
			                    <?php echo substr($times[$i], 0, -3)."-".substr($timee[$i], 0, -3);?></th>
			                    <?php  }?> 
								<th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center"></th> 
								</tr>
							  <tr>
								<th class="time col-md-1 " style="font-size:13px; text-align:center; padding-top:10px">Room # & Section</th> 
							  </tr>
							</thead>
							</table>

							<div class="pane-vScroll2">
							  <table>
												<tbody style="text-align: center; font-size: 15px">
												<?php 
												  $x = 0;
												  
												  foreach($section as $sec_name) {
													$sec = mysqli_query($conn, "SELECT P_fname, P_lname, ROOM_NO 
																	FROM css_section, pims_personnel, pims_employment_records 
																	WHERE css_section.emp_rec_ID=pims_employment_records.emp_rec_ID
																	AND pims_employment_records.emp_No=pims_personnel.emp_No
																	AND SECTION_ID=".$sec_name['SECTION_ID']."");
													$row = mysqli_fetch_row($sec);
													$ad = substr($row[0], 0, 1).". ".$row[1];
													if($ad=='. '){
													  $ad = "";
													}
												  ?>
												  <td class="time" style="padding-top: 25px; text-align: center;"><?php echo $sec_name['SECTION_NAME']."<br>".$ad."<br>".$row[2]?>
												  </td>
													<?php
													for($y=0; $y<8; $y++){?>
													<td class="" style="padding-bottom:none">
													  
													  <div class="form-group">
														<div class="search-box">
														<?php
														if(!empty($days_p[$x][$y]) && $days_p[$x][$y]=='regular'){
														  if(!empty($subject_p[$x][$y])){
															echo '<p align="center">'.$subject_p[$x][$y].'<br></p>';
															if(!empty($teacher_p[$x][$y])){
															  echo '<p align="center">'.$teacher_p[$x][$y].'</p>';
															}
														  }
														}
														else if(!empty($sched_p[$x][$y])){
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
						<div id="menu2" class="tab-pane fade">  
						<div class=" pane--table1">
						  <div class="pane-hScroll3">
						  <br>
							<table>
							<thead>
							  <tr class="headings">
								<th class="column-title" style="text-align:center;font-size:13px">Time </th>
								<?php 
				                $times = null;
				                include "in_year_lvl3.php";
				                for($i=0; $i<count($times); $i++){?>
				                <th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">
				                <?php echo substr($times[$i], 0, -3)."-".substr($timee[$i], 0, -3);?></th>
				                <?php  }?>
								<th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center"></th> 
							  </tr>
							  <tr>
								<th class="time col-md-1 " style="font-size:13px; text-align:center; padding-top:10px">Room # & Section</th> 
							  </tr>
							</thead>
							</table>

							<div class="pane-vScroll3">
							  <table>
												<tbody style="text-align: center; font-size: 15px">
												<?php
												include "in_year_lvl3.php";
												  $x = 0;
												  foreach($section as $sec_name) {
													$sec = mysqli_query($conn, "SELECT P_fname, P_lname, ROOM_NO 
																	FROM css_section, pims_personnel, pims_employment_records 
																	WHERE css_section.emp_rec_ID=pims_employment_records.emp_rec_ID
																	AND pims_employment_records.emp_No=pims_personnel.emp_No
																	AND SECTION_ID=".$sec_name['SECTION_ID']."");
													$row = mysqli_fetch_row($sec);
													$ad = substr($row[0], 0, 1).". ".$row[1];
													if($ad=='. '){
													  $ad = "";
													}
												  ?>
												  <td class="time" style="padding-top: 25px; text-align: center;"><?php echo $sec_name['SECTION_NAME']."<br>".$ad."<br>".$row[2]?>
												  </td>
													<?php
													for($y=0; $y<8; $y++){?>
													<td class="" style="padding-bottom:none">
													  
													  <div class="form-group">
														<div class="search-box">
														<?php
														if(!empty($days_p[$x][$y]) && $days_p[$x][$y]=='regular'){
														  if(!empty($subject_p[$x][$y])){
															echo '<p align="center">'.$subject_p[$x][$y].'<br></p>';
															if(!empty($teacher_p[$x][$y])){
															  echo '<p align="center">'.$teacher_p[$x][$y].'</p>';
															}
														  }
														}
														else if(!empty($sched_p[$x][$y])){
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
						<!-- GRADE 9 END -->
						<div class="modal fade" id="school_year" role="dialog">
						  
						</div>
						<!-- GRADE 10 -->	  
						<div id="menu3" class="tab-pane fade">  
						<div class=" pane--table1">
						  <div class="pane-hScroll4">
						  <br>
							<table>
							<thead>
							  <tr class="headings">
								<th class="column-title" style="text-align: center;font-size:13px">Time </th>
								<?php
				                $times = null; 
				                include "in_year_lvl4.php";
				                for($i=0; $i<count($times); $i++){?>
				                <th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">
				                <?php echo substr($times[$i], 0, -3)."-".substr($timee[$i], 0, -3);?></th>
				                <?php  }?> 
								<th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center"></th> 
								</tr>
							  <tr>
								<th class="time col-md-1 " style="font-size:13px; text-align:center; padding-top:10px">Room # & Section</th> 
							  </tr>
							</thead>
							</table>

							<div class="pane-vScroll4">
							  <table>
												<tbody style="text-align: center; font-size: 15px">
												<?php 
												  $x = 0;
												  include "in_year_lvl4.php";
												  foreach($section as $sec_name) {
													$sec = mysqli_query($conn, "SELECT P_fname, P_lname, ROOM_NO 
																	FROM css_section, pims_personnel, pims_employment_records 
																	WHERE css_section.emp_rec_ID=pims_employment_records.emp_rec_ID
																	AND pims_employment_records.emp_No=pims_personnel.emp_No
																	AND SECTION_ID=".$sec_name['SECTION_ID']."");
													$row = mysqli_fetch_row($sec);
													$ad = substr($row[0], 0, 1).". ".$row[1];
												  ?>
												  <td class="time" style="padding-top: 25px; text-align: center;"><?php echo $sec_name['SECTION_NAME']."<br>".$ad."<br>".$row[2]?>
												  </td>
													<?php
													for($y=0; $y<8; $y++){?>
													<td class="" style="padding-bottom:none">
													  
													  <div class="form-group">
														<div class="search-box">
														<?php
														if(!empty($days_p[$x][$y]) && $days_p[$x][$y]=='regular'){
														  if(!empty($subject_p[$x][$y])){
															echo '<p align="center">'.$subject_p[$x][$y].'<br></p>';
															if(!empty($teacher_p[$x][$y])){
															  echo '<p align="center">'.$teacher_p[$x][$y].'</p>';
															}
														  }
														}
														else if(!empty($sched_p[$x][$y])){
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
<script  src="../../js/index.js"></script>
<script  src="../../js/index1.js"></script>
<script  src="../../js/index2.js"></script>
<script  src="../../js/index3.js"></script>
<script  src="../../js/index4.js"></script>
  <script src="../../../../js/metisMenu.min.js"></script>
  <script src="../../../../js/sb-admin-2.min.js"></script>

<script>
	$.sidebarMenu($('.sidebar-menu'))
</script>


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