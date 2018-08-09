
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
							<h3 class="page-header">Update PERFORMANCE INDICATOR</h3> 
						</div>
						</div>
						
						<table class="table table-hover table-responsive table-bordered">
							<tr>
								<td><b>MFO</b></td>
								<td><b>Action</b></td>
							</tr>
							<form method="get" action="up_fo.php">
								<?php
									$qry = mysql_query("Select * from ipcrms_mfo");
									if($qry){
										while($row=mysql_fetch_array($qry)){
											$id=$row['MFO_ID'];
											$mfo_desc=$row['MFO_Description'];
											
											echo"<tr>
												<td>".$mfo_desc."</td>
												<td><button type='submit' name='id' value=".$id." class='btn btn-primary'>Select</button></td>
												
											</tr>";
										}
										
									}
								?>
							
						</table>
						</form>
            <div class="container"><!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
      <!-- Modal content-->
                        <div class="row center">
				            <div class="modalbox success col-sm-8 col-md-6 col-lg-5 center animate">
						      <div class="icon">
								<span class="glyphicon glyphicon-ok"></span>
						      </div>
						<!--/.icon-->
						    <h1>Success!</h1>
						    <p>KRA <br>has been updated.</p>
                            <a href="ipcrms_index.php"> <button type="button" class="redo btn">Ok</button></a>
					       <span class="change">-- Click to see opposite state --</span>
				            </div>
				<!--/.success-->
		                  </div>
		<!--/.row-->
		  <div class="row">
				<div class="modalbox error col-sm-8 col-md-6 col-lg-5 center animate">
						<div class="icon">
								<span class="glyphicon glyphicon-thumbs-down"></span>
						</div>
						<!--/.icon-->
						<h1>Oh no!</h1>
						<p>Oops! Something went wrong,
								<br> you should try again.</p>
						<button type="button" class="redo btn">Try again</button>
					<span class="change">-- Click to see opposite state --</span>
				</div>
				<!--/.success-->
		  </div>
		<!--/.row-->/

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