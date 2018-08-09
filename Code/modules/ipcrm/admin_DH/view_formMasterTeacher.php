<!DOCTYPE html>
<html lang="en" >
    <?php
    include("../func.php");
	include("../dbcon.php");
	include("../session.php");
	
	
	$name=mysqli_query($mysqli,"SELECT concat(p_fname,' ',p_lname) as Name,job_title_name, dept_ID FROM pims_personnel,pims_employment_records,pims_job_title
	WHERE pims_personnel.emp_no=pims_employment_records.emp_no
	AND pims_job_title.job_title_code=pims_employment_records.job_title_code
	AND pims_personnel.emp_no=$emp");
	$nrow=mysqli_fetch_assoc($name);
	$_SESSION['job_title']=$nrow['job_title_name'];	
	$jt=$_SESSION['job_title'];
	$dept_ID=$nrow['dept_ID'];	
	
    ?>
    <head>
		<meta charset="UTF-8">
        <title>PAG-ASA National High School</title>
        <link href="http://fonts.googleapis.com/css?family=Dosis:400,500,700" rel="stylesheet" type="text/css">
        <link rel='stylesheet prefetch' href='pages/css/bootstrap.min.css'>
        <link rel="icon" href="docs/img/pnhs_favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="pages/css/style.css">
        <link rel="stylesheet" href="pages/css/w3.css">
		<link rel="stylesheet" href="css/ayuson.css">
		<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css" type="text/css">
		<!-- MetisMenu CSS -->
		<link href="pages/css/sb-admin-2.css" rel="stylesheet">
		<link href="pages/css/metisMenu.min.css" rel="stylesheet">
    </head>
    <body>
	  <?php 
		include("topnav.php");
		?>
	
        <div id="wrapper">
            <?php 
				include("sidenav.php");
			?>
				

			<div class="container">
				<div class="jumbotron" style="background-color:#eee">
					<form>		
						<div class="container-fluid ">
							 <div align="center">
								<br>
								<strong>Department of Education<br></strong>
								 Region V(Bicol)<br> 
								 Schools Division of Legaspi City <br> 
								 <strong>PAG-ASA NATIONAL HIGH SCHOOL</strong><br> 
								 Rawis, Legaspi City<br>
       

								<h5><center><img src="../docs/img/leg.png" width="85px" height="85px"> &nbsp; &nbsp; &nbsp;<strong> &nbsp;INDIVIDUAL PERFORMANCE COMMITMENT AND REVIEW FORM</strong> &nbsp; &nbsp; &nbsp; &nbsp;<img src="../docs/img/pnhs_logo.PNG" width="85px" height="85px">
									  </center>
								</h5>
								
								<td width="50%">
									<p><br>
									</p>
								</td>
									<b>
										
									<br>
									</b>
								<div class="row" style="margin-left:30px">
									<div class="col-lg-5" >
										<label for="rating_period" class="control-label"> Employee Name: </label>
										<input type="text" class="form-control" id="name_of_faculty" value="" readonly></input>
									</div>
									<div class="col-lg-5" style="margin-left:100px">
										<label for="rating_period" class="control-label"> Division: </label>
										<input type="text" class="form-control" id="subj_code" value="" readonly></input>
									</div>
									<br><br><br><br>
									<div class="col-lg-5">
										<label for="rating_period" class="control-label"> Position: </label>
										<input type="text" class="form-control" id="subject_taught" value="" readonly></input>
									</div>
									<div class="col-lg-5" style="margin-left:100px">
										<label for="rating_period" class="control-label"> Rating Period: </label>
										<input type="text" class="form-control" id="subject_taught" value="" readonly></input>
									</div>
								</div>



								<br><br><br><br>
								<table class="table table-responsive table-hover table-bordered " >
									<tr>
										<td><div align="center"><b>MFO</b></div></td>
										<td><div align="center"><b>KRA</b></div></td>
										<td width = "20%"><div align="center"><b>OBJECTIVES</b></div></td>
										<td><div align="center"><b>TIMELINE</b></div></td>
										<td><div align="center"><b>Weight per KRA</b></div></td>
										<td><p align="center"><strong>PERFORMANCE  INDICATOR</strong></p>
										<div align="center">(Quality, Efficiency, Timeliness)</div></td>
									</tr>
									<?php			
												
										$qry = mysqli_query ($mysqli, "Select ipcrms_obj.OBJ_ID, ipcrms_mfo.MFO_ID, ipcrms_kra.KRA_ID, ipcrms_mfo.MFO_Description,  ipcrms_kra.KRA_Description, ipcrms_obj.kra_obj, ipcrms_obj.timeline, ipcrms_obj.kra_wpk, ipcrms_perf_indicator.perf_5, ipcrms_perf_indicator.perf_4, ipcrms_perf_indicator.perf_3, ipcrms_perf_indicator.perf_2, ipcrms_perf_indicator.perf_1 
										from ipcrms_mfo, ipcrms_kra, ipcrms_obj, ipcrms_perf_indicator 
										where IPCRMS_MFO.MFO_ID=2 and ipcrms_kra.MFO_ID=ipcrms_mfo.MFO_ID and ipcrms_obj.KRA_ID=ipcrms_kra.KRA_ID and ipcrms_perf_indicator.OBJ_ID=ipcrms_obj.OBJ_ID ");

										while($row=mysqli_fetch_array($qry)){	
										$desc = $row['MFO_Description'];
										$kradesc = $row['KRA_Description'];
										$obj = $row['kra_obj'];
										
										if ( $row['OBJ_ID'] == 27 ){
												$obj_desc=$obj;
												$obj = "";
												for ( $x = 0 ; $x < $StrLen ; $x++ ){
													if (( substr($obj_desc,$x,2) == "1." ) ||
														( substr($obj_desc,$x,2) == "2." ) ||
														 (substr($obj_desc,$x,2) == "3." ) ||
														  (substr($obj_desc,$x,2) == "4." ) ||
														   (substr($obj_desc,$x,2) == "5." ))
													{
														$obj = $obj . "<br><br>" . substr($obj_desc,$x,2);
														$x++;
													}
													else{
														$obj = $obj . substr($obj_desc,$x,1);
													}
												}
											}
											else{
												$obj_desc=$obj;
												$obj = "";
												$StrLen = strlen($obj_desc);
												for ( $x = 0 ; $x < $StrLen ; $x++ ){
													if ( substr($obj_desc,$x,1) == "*" ){
														$obj = $obj . "<br><br>" . substr($obj_desc,$x,1);
													}
													else{
														$obj = $obj . substr($obj_desc,$x,1);
													}
												}
											}
					
					
										$tim = $row['timeline'];
										$kwpk = $row['kra_wpk'];
										$mfoid = $row['MFO_ID'];
										$kraid = $row['KRA_ID'];
										$perf_5 = $row['perf_5'];
										$perf_4 = $row['perf_4'];
										$perf_3 = $row['perf_3'];
										$perf_2 = $row['perf_2'];
										$perf_1 = $row['perf_1'];
										$objid = $row['OBJ_ID'];

										$krawp = $kwpk * 100;
										
										
										$a = $mfoid;
										$b = $kraid; 
										$c = $objid;
										{
										echo '
						
										<tr>
											<td>'.$desc.'</td>
											<td>'.$kradesc.'</td>
											<td>'.$obj.'</td>
											<td>'.$tim.'</td>
											<td>'.$krawp.'%</td>
											<td>'.$perf_5. '<br>' .$perf_4. '<br>'.$perf_3. '<br>'.$perf_2. '<br>'.$perf_1. '</td>
								
										</tr>
						
										';
										$y = $b;
										$bn = $c;
										}
										}
	  
									?>
								</table>	  
							</div>
						</div>
					</form>
				</div>
			</div>


			<?php include("../footer.php");?>
        </div>
            <script src='pages/js/jquery.min.js'></script>
            <script src='pages/js/bootstrap.min.js'></script>
            <script  src="pages/js/index.js"></script>

            <script src='pages/js/sb-admin-2.min.js'></script>
            <script src='pages/js/metisMenu.min.js'></script>
    </body>
</html>