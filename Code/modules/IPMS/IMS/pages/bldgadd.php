<!DOCTYPE html>
<html lang="en" >
<?php 
    include("../db/dbcon.php");
    include("../session.php");




?>


<head>
  <meta charset="UTF-8">
  <title>PAG-ASA National High School</title>
    <link href="http://fonts.googleapis.com/css?family=Dosis:400,500,700" rel="stylesheet" type="text/css">
    <link rel='stylesheet prefetch' href='../css/bootstrap.min.css'>
    <link rel="icon" href="../img/pnhs_favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/w3.css">
    <link rel="stylesheet" href="../css/notif.css">

    <!-- MetisMenu CSS -->
    <link href="../vendor/dist/css/sb-admin-2.css" rel="stylesheet">
    
    <!-- Icons CSS -->
    <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css" type="text/css">
   
    
    <!-- Latest compiled and minified JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../vendor/jquery/jquery.min.js"></script>
 
  
</head>
<body>

<body>
<?php include("../topnav.php");?> 
<div id="wrapper">
        
    
         <!-- Sidebar -->
        <?php include("../sidenav.php");?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
			 
            <div class="container" style="margin-left: 45px">
                <br> <br>
				<form> <br>&nbsp;&nbsp;
					<input class="btn btn-primary btn" type="button" value="Go back" onclick="history.back()">
					</input>
				</form>
		
		<div class="row">
				<div class="col-lg-10 col-md-9 col-sm-9 col-xs-7">			
						<div class="row">
						<div class="col-lg-11">
							<h1><center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add Building</br></center></h1><br>
						</div>
							<!-- /.col-lg-11 -->
						</div>
				
				<div class="container">
					<div class="row">
						<div class="col-lg-11">
							<div class="well">
								<form action="bldgadd.php" method="post">

								<div class="row">
								<div class="col-md-6 mb-3">
								  <label for="validationDefault01">Facility Type</label>
								  <input type="text" name="type" class="form-control" id="validationDefault01" placeholder="Facility Type" value="" required>
								</div>
								<div class="col-md-6 mb-3">
								  <label for="validationDefault02">Fund Source</label>
								  <input type="text" name="fund" class="form-control" id="validationDefault02" placeholder="Fund Source" value="" required>
								</div>
							  </div>
							  <br>
								<div class="row">
								<div class="col-md-6 mb-3">
								  <label for="validationDefault03">Specific Fund Source</label>
								  <input type="text" name="spec_fund" class="form-control" id="validationDefault03" placeholder="Specific Fund Source" value="" required>
								</div>
								<div class="col-md-6 mb-3">
								  <label for="validationDefault04">Number of Storeys</label>
								  <input type="number" name="storey" class="form-control" id="validationDefault04" placeholder="Number of Storeys" value="" required>
								</div>
							  </div>
								<br>
								<div class="row">
								<div class="col-md-6 mb-3">
								  <label for="validationDefault05">Number of Rooms</label>
								  <input type="number" name="rooms" class="form-control" id="validationDefault05" placeholder="Number of Rooms" required>
								</div>
								<div class="col-md-3 mb-3">
								  <label for="validationDefault06">Year Completed</label>
								  <input type="number" name="year" class="form-control" id="validationDefault06" placeholder="Year Completed" required>								 
								</div>
								<div class="col-md-3 mb-3">
								  <label for="validationDefault07">Dimension</label>
								  <input type="text" name="dim" class="form-control" id="validationDefault07" placeholder="Dimension" required>
								  </div>
								</div>
							  
								<br>	
									
									
									<div class="form-group">
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									
				
				  <input a href="building.php" class="btn btn-primary btn" type="submit" name='submit' value='Submit' class="form-control" >
				</div>
							</div>
							</div>                                   
                                        
                                </form>													  
						</div>
						<!-- /.col-lg-4 -->
							</br>
							
							
							
					</div>
					<!-- /.row -->			
				</div>
				<!-- /.container -->
				</div>
			</div> <br><br>
			<!-- /.row -->	
		
	
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/alert.js"></script>
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script  src="../js/index.js"></script>
<script src="../js/metisMenu.min.js"></script>
<script src="../js/sb-admin-2.min.js"></script>

    
<!-- Footer -->
<footer class="w3-theme-bd5">
         <div class="container">
            <div class="col-lg-3 col-md-3">
               <h3 class="h3">PNHS</h3>
               <h6>All Rights Reserved &copy; 2018</h6>
            </div>
            <div class="col-lg-3 col-md-3">
               <h1 class="h3">ADDRESS</h1>
               <h6><b>Pag-asa National Highschool</b><br><span>PNHS Building, Rawis, East Service<br>  Road, Legazpi City, PH 2424</span></h6>
            </div>
            <div class="col-lg-3 col-md-3">
               <h3 class="h3">CONTACT US</h3>
               <h6 class="w3-justify">
                  <b>Phone:</b>
                  <span>(+632) 887-2232</span>
                  <br>
                  <b>E-mail:</b> 
                  <span>officialpnhs@pnhs.gov.ph</span>
                  <br>
               </h6>
            </div>
             <div class="col-lg-3 col-md-3">
               <h3 class="h3">FOLLOW US ON:</h3>
                  <a href="#"><i class="fa fa-bullseye w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-phone w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-facebook w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-twitter w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-google-plus w3-xlarge" aria-hidden="true"></i></a>
            </div>
         </div>
      </footer>
    </div>
    <!-- /#wrapper -->
	
</body>
</html>


<?php

if(isset($_POST['submit']))
{
		$type=mysqli_real_escape_string($mysqli,$_POST['type']);
		$fund=mysqli_real_escape_string($mysqli,$_POST['fund']);
		$spec=mysqli_real_escape_string($mysqli,$_POST['spec_fund']);
		$storey=mysqli_real_escape_string($mysqli,$_POST['storey']);
		$rooms=mysqli_real_escape_string($mysqli,$_POST['rooms']);
		$dim=mysqli_real_escape_string($mysqli,$_POST['dim']);
		$year=mysqli_real_escape_string($mysqli,$_POST['year']);
	


	$sql1="INSERT INTO `ims_facility`(`fac_type`, `fund_source`, `specfic_fund`, `fac_storey`, `num_rooms`, `year_completed`, `dimension`) VALUES ('$type','$fund','$spec','$storey','$rooms','$year','$dim')";
	

	mysqli_query($mysqli,$sql1);
	?>
<script type="text/javascript">

alert("New Building Successfully Added");
window.location="building.php";


</script>

	<?php
}


?>