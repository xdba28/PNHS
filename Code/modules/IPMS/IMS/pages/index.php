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
<?php include("../topnav.php");?>
<div id="wrapper">
        
    
        <!-- Sidebar -->
        <?php include("../sidenav.php");?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
			 
            <div class="container">
                <br> <br>
                    
				<form>
					<input class="btn btn-primary btn" type="button" value="Go back" onclick="history.back()">
					</input>
				</form> 
				
						<div class="row">
						<div class="col-lg-16">
						<br>
							<div>
							<h2><center>&nbsp;&nbsp;&nbsp;
							Inventory Management System</center></h2>
							</div>
						</div>
							<!-- /.col-lg-11 -->
						</div>
				<br>
				<div class="container">
					<div class="row">
						<div class="col-lg-15"> 
							<div class="w3-theme-bl3 well" > 
								<h5 align="justify"> The Inventory System for Pag-asa National High school is a tracking system that informs the supply officer the quantity, 
								liable employee and status of the supplies and equipment. The system aims to prevent an unexpected shortage of equipment or supplies. The inventory 
								system is categorized into two, the supplies and the equipment. Supplies are items which can be consumed while the equipment are items that are not 
								consumed, rather they are used and does need repairing whenever it is needed. The inventory is updated each time an item is added or claimed so the 
								supply officer would know the available supplies for use in the following days. Reports provided by the inventory system; Storage, borrow and building 
								Reports. Transaction plays a big role in the inventory system. Items could be transferred, borrowed, returned and requested using the pages provided by 
								the system. The supply officer should be the only one who would access the inventory system, thus making him an admin.</h5>
								 													  
							</div>
							</br> <br> 
							
							<div class="col-lg-12"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="building.php" title="Building"> <img src="../docs/img/building.png" align="center" width="200px" height="200px"></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="equip.php" title="Equipment"><img src="../docs/img/equipment.png" align="center" width="200px" height="200px"></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="supply.php" title="Supply"><img src="../docs/img/supply.png" align="center" width="200px" height="200px"></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							
							</div>
						</div>
								<!-- /.col-lg-4 -->						
					</div>					
				</div>
				<br> <br> 
			</div>	<br> <br> <br> <br> 
			
		


<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/alert.js"></script>
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script  src="../js/index.js"></script>
<script src="../js/metisMenu.min.js"></script>
<script src="../js/sb-admin-2.min.js"></script>


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