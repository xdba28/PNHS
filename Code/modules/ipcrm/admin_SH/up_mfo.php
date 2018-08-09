
<!DOCTYPE html>
<html lang="en" >
    <?php
    include("../func.php");
	include("../dbcon.php");
	include("../session.php");
	
	$name=mysqli_query($mysqli,"SELECT concat(p_fname,' ',p_lname) as Name,job_title_name, pims_job_title.job_title_code as job_title_code FROM pims_personnel,pims_employment_records,pims_job_title
	WHERE pims_personnel.emp_no=pims_employment_records.emp_no
	AND pims_job_title.job_title_code=pims_employment_records.job_title_code
	AND pims_personnel.emp_no=$emp");
	$nrow=mysqli_fetch_assoc($name);
	$_SESSION['job_title']=$nrow['job_title_name'];
	$_SESSION['job_code']=$nrow['job_title_code'];
	
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
		<!-- DataTables CSS -->
	    <link href="pages/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
	    <link href="pages/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
	    <!-- DataTables Responsive CSS -->
	    <link href="pages/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
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
			<br><br><br><br>	
				<br><div class="page-title" align="center"><span>Update Form</span></div>
				
			<br><br>			
			<div class="container-fluid" style="max-width:100%;margin-right:100px;margin-left:100px">			
			
						<div class="container-fluid" id="fadein">
							<!-- Page Heading -->
							<div class="col-lg-12">
								<table class="table table-hover table-responsive table-condensed">
									<tr style="background-color:#73acda;height:70px">
										<td><b>KRA</b></td>
										<td><b>Objectives</b></td>
										<td><b>Timeline</b></td>
										<td><b>Weight per KRA</b></td>
										<td><b>Performance Indicator</b></td>

										<td><b>Action</b></td>
									</tr>
							
									<?php 
										$id=$_GET['id'];
										$qry = mysqli_query($mysqli,"Select ipcrms_obj.OBJ_ID, ipcrms_kra.KRA_Description, ipcrms_kra.KRA_ID, ipcrms_obj.kra_obj, ipcrms_obj.timeline, ipcrms_obj.kra_wpk, ipcrms_perf_indicator.perf_id, ipcrms_perf_indicator.perf_5 , ipcrms_perf_indicator.perf_4 , ipcrms_perf_indicator.perf_3 , ipcrms_perf_indicator.perf_2 , ipcrms_perf_indicator.perf_1
										from ipcrms_kra, ipcrms_obj, ipcrms_perf_indicator
										where ipcrms_kra.MFO_ID = ".$id." 
										and ipcrms_obj.KRA_ID = ipcrms_kra.KRA_ID
										and ipcrms_perf_indicator.OBJ_ID = ipcrms_obj.OBJ_ID");
										if($qry){
											while($row=mysqli_fetch_array($qry)){
												$kra_desc = $row['KRA_Description'];
												$kra_id = $row['KRA_ID'];
												$kra_obj=$row['kra_obj'];
												$obj_id=$row['OBJ_ID'];
												$tim=$row['timeline'];
												$kra_wpk=$row['kra_wpk'];
												$perf_id=$row['perf_id'];
												$perf_5=$row['perf_5'];
												$perf_4=$row['perf_4'];
												$perf_3=$row['perf_3'];
												$perf_2=$row['perf_2'];
												$perf_1=$row['perf_1'];
												
												echo'
													<form action="up_process.php" method="get">
													<tr>
														<input type="hidden" name="kra_id" value="'.$kra_id.'">
														<input type="hidden" name="obj_id" value="'.$obj_id.'">
														<input type="hidden" name="perf_id" value="'.$perf_id.'">
														<td><textarea name="kra" value="'.$kra_desc.'" cols="25" rows="22" class="form-control">'.$kra_desc.'</textarea></td>
														<td><textarea name="kra_obj" value="'.$kra_obj.'" cols="35" rows="22" class="form-control">'.$kra_obj.'</textarea></td>
														<td><textarea name="timeline" value="'.$tim.'" cols="13" rows="4" class="form-control">'.$tim.'</textarea></td>
														<td><textarea name="kra_wpk" value="'.$kra_wpk.'" cols="2" rows="4" class="form-control">'.$kra_wpk.'</textarea></td>
														<td><textarea name="perf_5" value="'.$perf_5.'" cols="35" rows="4" class="form-control">'.$perf_5.'</textarea>
														<textarea name="perf_4" value="'.$perf_4.'" cols="30" rows="4" class="form-control">'.$perf_4.'</textarea>
														<textarea name="perf_3" value="'.$perf_3.'" cols="30" rows="4" class="form-control">'.$perf_3.'</textarea>
														<textarea name="perf_2" value="'.$perf_2.'" cols="30" rows="4" class="form-control">'.$perf_2.'</textarea>
														<textarea name="perf_1" value="'.$perf_1.'" cols="30" rows="4" class="form-control">'.$perf_1.'</textarea>
														<td>
														
														
														<button id="enabled" type="submit" name = "submit" class="form-control btn btn-danger">Update</button><a data-toggle="modal" data-target="#Update"></a>
									</td>
													</tr>
													</form>
												';
												
											}
										}
									?>
								</table>
							</div>
						</div>
			</div>
			
<!-- Modal -->


								<div class="modal fade" id="Update">
								<div class="modal-dialog modal-sm">
								<br><br><br><br>
									<div class="modal-content">
										<div class="modal-body" align="center">
										<label class="style2"><span class="style3 fa fa-check-square-o  " aria-hidden="true"></span>&nbsp;Success!</label><br>
										<center><p>Form has been updated.</p></center>
											<br>
                            			<a href="update_kra.php"> <button type="button" class="btn btn-success">Ok</button></a>
										</div>
									</div>
								</div>
							</div>	
							
			<br><br><br><br>
			
			<style>
											.style{
												font-family: 'Montserrat', sans-serif;
												font-size: 15px;												}
											.style2{
												font-family: 'Montserrat', sans-serif;
												font-size: 40px; color:green;
											}
											.style3{
												font-size:35px;
												color:gray;
												}
			</style>
			
			<?php 
			include("footer.php");
			?>

		</div>
            <script src='pages/js/jquery.min.js'></script>
            <script src='pages/js/bootstrap.min.js'></script>
            <script  src="pages/js/index.js"></script>

            <script src='pages/js/sb-admin-2.min.js'></script>
            <script src='pages/js/metisMenu.min.js'></script>

	</body>
</html>