
<!DOCTYPE html>
<html lang="en" >
    <?php
    include("func.php");
	include("dbcon.php");
	include("../session.php");
	
	$name=mysql_query("SELECT concat(p_fname,' ',p_lname) as Name,job_title_name, pims_job_title.job_title_code as job_title_code FROM pims_personnel,pims_employment_records,pims_job_title
	WHERE pims_personnel.emp_no=pims_employment_records.emp_no
	AND pims_job_title.job_title_code=pims_employment_records.job_title_code
	AND pims_personnel.emp_no=$emp");
	$nrow=mysql_fetch_assoc($name);
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
    </head>
    <body>
        <div id="wrapper">
            <?php 
				include("../sidenav.php");
				include("../navbar.php");

				?>
<br><br>			
<div class="container-fluid" style="max-width:100%;margin-right:100px;margin-left:100px">
		<article>				
 				<div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="display:none">
                            </div>
	
    </center>
					<thead>
    <div class="container-fluid">
					<!-- Page Heading -->
					<div class="row">
						<div class="col-lg-13">
							<h3 class="page-header">
								<center>
                        <ul class="w3-ul w3-border-top">
                            <li class="w3-theme-bd4">
                                    <strong>Update Form</strong> 
                            </li>
                        </ul>    
                                 </center>
                            </h3> 
						</div>
					</div>
    </div>
<br>                        
<ul class="w3-ul w3-border-top">
<div class="w3-container w3-theme-bl1">
     <ul class="nav navbar-nav navbar-center">
        <li><a href="update_kra.php">KRA & Objectives</a></li>
        <li><a href="update_timeline.php">TIMELINE </a></li>
        <li><a href="update_weight.php">Weight per KRA </a></li>
        <li><a href="update_perf_indi.php">PERFORMANCE INDICATOR </a></li>
    </ul>
    						</div>
					</div>
    </div>    
</div><!-- /.navbar-collapse -->
</nav>
			<div id="page-wrapper">
				<div class="container-fluid">
					<!-- Page Heading -->
					<div class="row">
						<div class="col-lg-12">
							<h3 class="page-header">Update KRA & Performance Indicator</h3> 
						</div>
						</div>
						<div class="col-lg-12">
					<!--	<table class="table table-condensed table-hover table-bordered table-responsive">
						<tr>
							<td width="35%">KRA</td>
							<td></td>
							<td>Objectives</td>
							
						</tr>	
						
						<?php
						
							$id=$_GET['id'];
							$qry = mysql_query("Select ipcrms_kra.KRA_ID, ipcrms_obj.OBJ_ID, ipcrms_obj.kra_obj, ipcrms_kra.KRA_Description, ipcrms_perf_indicator.perf_id, ipcrms_perf_indicator.perf_5, ipcrms_perf_indicator.perf_4, ipcrms_perf_indicator.perf_3, ipcrms_perf_indicator.perf_2, ipcrms_perf_indicator.perf_1
							from ipcrms_obj, ipcrms_kra, ipcrms_mfo, ipcrms_perf_indicator 
							where ipcrms_mfo.MFO_ID =".$id." and ipcrms_kra.MFO_ID = ipcrms_mfo.MFO_ID and ipcrms_kra.KRA_ID = ipcrms_obj.KRA_ID and ipcrms_obj.OBJ_ID=ipcrms_perf_indicator.OBJ_ID ");
							if($qry){
								while($row=mysql_fetch_array($qry)){
									$kra_desc = $row['KRA_Description'];
									$kra_obj = $row['kra_obj'];
									$kra_id = $row['KRA_ID'];
									$obj_id = $row['OBJ_ID'];
									$perf_id = $row['perf_id'];
									$perf_5 = $row['perf_5'];
									$perf_4 = $row['perf_4'];
									$perf_3 = $row['perf_3'];
									$perf_2 = $row['perf_2'];
									$perf_1 = $row['perf_1'];
									
									echo '
											<form method="get" action="up_pro.php">
											<tr>
												<td><input type="text" class="form-control" name="kra" value="'.$kra_desc.'"/><td>
												<td><textarea cols="100" rows="10" class="form-control" name="kra_obj" value="'.$kra_obj.'">'.$kra_obj.'</textarea></td>
												<input type="hidden" value="'.$kra_id.' name="kra_id" />
												<td><textarea cols="100" rows="3" class="form-control" name="perf_5" value="'.$perf_5.'">'.$perf_5.'</textarea></td>
												<td><textarea cols="100" rows="3" class="form-control" name="perf_4" value="'.$perf_4.'">'.$perf_4.'</textarea></td>
												<td><textarea cols="100" rows="3" class="form-control" name="perf_3" value="'.$perf_3.'">'.$perf_3.'</textarea></td>
												<td><textarea cols="100" rows="3" class="form-control" name="perf_2" value="'.$perf_2.'">'.$perf_2.'</textarea></td>
												<td><textarea cols="100" rows="3" class="form-control" name="perf_1" value="'.$perf_1.'">'.$perf_1.'</textarea></td>
												<input type="hidden" value="'.$perf_id.' name="perf_id">
												<td><input type ="submit" class="btn btn-primary" ></td>
												
											</tr>
									';
								}
							}
						?> 
								</table>-->
						
						<table class="table table-hover table-responsive table-condensed">
							<tr>
								<td><b>KRA</b></td>
								<td><b>Objectives</b></td>
								<td><b>Action</b></td>
							</tr>
							
							<?php 
								$id=$_GET['id'];
								$qry = mysql_query("Select ipcrms_obj.OBJ_ID, ipcrms_kra.KRA_Description, ipcrms_kra.KRA_ID, ipcrms_obj.kra_obj,  ipcrms_perf_indicator.perf_id, ipcrms_perf_indicator.perf_5,ipcrms_perf_indicator.perf_4, ipcrms_perf_indicator.perf_3, ipcrms_perf_indicator.perf_2, ipcrms_perf_indicator.perf_1 
								from ipcrms_kra, ipcrms_obj, ipcrms_perf_indicator
								where ipcrms_kra.MFO_ID = ".$id." and ipcrms_obj.KRA_ID = ipcrms_kra.KRA_ID and ipcrms_obj.OBJ_ID=ipcrms_perf_indicator.OBJ_ID ");
								if($qry){
									while($row=mysql_fetch_array($qry)){
										$kra_desc = $row['KRA_Description'];
										$kra_id = $row['KRA_ID'];
										$kra_obj=$row['kra_obj'];
										$obj_id=$row['OBJ_ID'];
										$perf_id = $row['perf_id'];
										$perf_5 = $row['perf_5'];
										$perf_4 = $row['perf_4'];
										$perf_3 = $row['perf_3'];
										$perf_2 = $row['perf_2'];
										$perf_1 = $row['perf_1'];
										
										echo'
											<form action="up_pro.php" method="get">
											<tr>
												<input type="hidden" name="kra_id" value="'.$kra_id.'">
												<input type="hidden" name="obj_id" value="'.$obj_id.'">
												<input type="hidden" value="'.$perf_id.' name="perf_id">
												<td><input type="text" class="form-control" name="kra" value="'.$kra_desc.'" /></td>
												<td><textarea name="kra_obj" value="'.$kra_obj.'" cols="30" rows="10" class="form-control">'.$kra_obj.'</textarea></td>
												<td><textarea cols="30" rows="5" class="form-control" name="perf_5" value="'.$perf_5.',">'.$perf_5.'</textarea></td>
												<td><textarea cols="30" rows="3" class="form-control" name="perf_4" value=" '.$perf_4.'">'.$perf_4.'</textarea></td>
												<td><textarea cols="30" rows="3" class="form-control" name="perf_3" value="'.$perf_3.'">'.$perf_3.'</textarea></td>
												<td><textarea cols="30" rows="3" class="form-control" name="perf_2" value="'.$perf_2.'">'.$perf_2.'</textarea></td>
												<td><textarea cols="30" rows="3" class="form-control" name="perf_1" value="'.$perf_1.'">'.$perf_1.'</textarea></td>
												
												<td><button type="submit" class="btn btn-primary">Update</button></td>
											</tr>
											</form>
										';
										
									}
								}
							?>
						</table>
								</div>
						
		<!--/.row-->

      </div>
    </div>
</div>
  </div>    
    </div>    

				</div>
    
			</div>
		</div>
     </div>
</div>
</div>
<br><br><br><br>
<?php 
include("footer.php");
?>

</div>
            <script src='pages/js/jquery.min.js'></script>
            <script src='pages/js/bootstrap.min.js'></script>
            <script  src="pages/js/index.js"></script>

</body>
</html>