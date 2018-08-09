<?php
include 'connect.php';

session_start();
if (isset($_SESSION['user_data'])){
$emp_no=$_SESSION['user_data']['acct']['emp_no'];
$aid=$_SESSION['user_data']['acct']['cms_account_ID'];
$n=mysqli_query($mysqli, "SELECT concat(p_fname,' ',p_lname) as Name,dept_name  FROM pims_personnel,pims_employment_records,pims_department
WHERE pims_personnel.emp_No=pims_employment_records.emp_No
AND pims_employment_records.dept_id=pims_department.dept_id
AND pims_personnel.emp_No=$emp_no");

$na = mysqli_fetch_assoc($n);
$name = $na['Name'];
}else{
echo "<script>alert('You are not allowed in this module!'); window.location='../../../../admin_idx.php';</script>";
}



?>


<!DOCTYPE HTML>
<html lang="en">
<head>

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Browser's Tab Title -->
    <title>PNHS - Inventory System</title>
	
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="../css/w3/w3.css">
	
	<!--Include your modified CSS below as needed-->
    <link rel="stylesheet" href="../css/w3/blue.css">
    <link rel="stylesheet" href="../css/w3/yellow.css">
    <link rel="stylesheet" href="../css/w3/w3.css">
	<link rel="stylesheet" href="../css/sidebar-menu.css">
	<link rel="stylesheet" href="../css/footercss.css">
	
	<!-- Icons CSS -->
    <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css" type="text/css">
    
    <!-- Browser's Tab Image -->
    <link rel="shortcut icon" href="../docs/pnhs_img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../docs/img/pnhs_favicon.ico" type="image/x-icon">
	
	<link href="../dist/css/sb-admin-2.css" rel="stylesheet">
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    
	<!-- Bootstrap -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

	<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="js/horizontalChart.js"></script>

</head>

<body>

<style>
.chart { margin: 70px 0 0; }

@media screen and (min-width: 768px) {

.chart {
  margin: 70px 0 50px 0;
  padding: 0 30px 30px;
  background-color: #eeeeee;
}

}

.chart__container {
  position: relative;
  padding: 5px;
  margin-top: 30px;
  background-color: #fff;
  box-sizing: border-box;
  -webkit-box-shadow: none;
  -ms-box-shadow: none;
  -moz-box-shadow: none;
  -o-box-shadow: none;
  box-shadow: none;
}

@media screen and (min-width: 768px) {

.chart__container {
  -webkit-box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.1);
  -ms-box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.1);
  -moz-box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.1);
  -o-box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.1);
  box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.1);
}

}

@media screen and (min-width: 768px) {

.chart__container { padding: 30px; }

}

.chart__axis-y {
  padding: 40px 0 15px;
  color: rgba(0, 0, 0, 0.6);
  position: relative;
  z-index: 1;
  text-align: left;
  top: -16px;
  left: 15px;
  font-weight: 600;
  font-size: 12px;
}

@media screen and (min-width: 768px) {

.chart__axis-y {
  width: 120px;
  padding: 15px 0;
  text-align: right;
  font-size: 14px;
  font-weight: 700;
  top: 0;
  left: 0;
}

}

@media screen and (min-width: 1024px) {

.chart__axis-y { width: 170px; }

}

.chart__axis-x {
  width: 100%;
  padding-top: 10px;
  padding-right: 15px;
  padding-bottom: 15px;
  padding-left: 15px;
  color: rgba(0, 0, 0, 0.6);
  box-sizing: border-box;
  font-size: 11px;
}

@media screen and (min-width: 768px) {

.chart__axis-x {
  padding-top: 15px;
  padding-left: 145px;
  font-size: 14px;
}

}

@media screen and (min-width: 1024px) {

.chart__axis-x {
  padding-left: 195px;
  font-size: 16px;
}

}

.chart__label-y {
  display: block;
  height: 55px;
  position: relative;
  padding: 5px 35px 5px 0;
  box-sizing: border-box;
  line-height: 1.1;
}

.chart__label-y:before {
  content: '';
  display: none;
  position: absolute;
  top: 15px;
  right: 0;
  height: 1px;
  background-color: #000;
  width: 10px;
}

@media screen and (min-width: 768px) {

.chart__label-y:before { display: block; }

}

.chart__label-x {
  display: inline-block;
  width: 10%;
  position: relative;
  right: -10px;
  padding-top: 10px;
  text-align: right;
}

@media screen and (max-width: 1279px) {

.chart__label-x:nth-child(odd) { opacity: 0; }

}

.chart__label-x:before {
  content: '';
  position: absolute;
  top: -10px;
  right: 10px;
  width: 1px;
  background-color: #000;
  height: 10px;
}

@media screen and (min-width: 768px) {

.chart__label-x:before {
  top: -15px;
  right: 20px;
}

}

.chart__box {
  height: 100%;
  width: 100%;
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  padding: 0 15px;
  border-left: 1px solid #000;
  border-bottom: 1px solid #000;
  box-sizing: border-box;
}

@media screen and (min-width: 768px) {

.chart__box {
  padding: 0 25px 0 15px;
  width: calc(100% - 170px + 50px);
}

}

@media screen and (min-width: 1024px) {

.chart__box { width: calc(100% - 170px); }

}

.chart--top { position: relative; }

/*------------------------------------*\
    # CHART - Horizontal bars
\*------------------------------------*/

.chart--horizontal {
  color: rgba(0, 0, 0, 0.6);
  padding-top: 25px;
}

@media screen and (min-width: 768px) {

.chart--horizontal { padding-top: 0; }

}

.chart--horizontal .chart__bars {
  padding: 15px 0 1px;
  background-image: linear-gradient(to top, #fff 13px, transparent 1px), linear-gradient(to left, #eeeeee 1px, transparent 1px);
  background-size: 20% 20px;
  background-position: left;
}

@media screen and (min-width: 1024px) {

.chart--horizontal .chart__bars {
  background-size: 10% 20px;
  background-image: linear-gradient(to top, #fff 13px, transparent 1px), linear-gradient(to left, #e1e1e1 1px, transparent 1px);
}

}

.chart--horizontal .bar__container {
  width: 100%;
  height: 20px;
  position: relative;
  margin: 17.5px 0 35px;
  padding-right: 10px;
  box-sizing: border-box;
  background-clip: content-box;
}

.chart--horizontal .bar__container:first-of-type { margin-top: 5px; }

.chart--horizontal .bar__container:after {
  content: attr(data-value) "%";
  position: absolute;
  left: 100%;
  opacity: 0;
  padding-left: 10px;
  font-size: 14px;
  -webkit-transition: opacity 0s ease-in-out 1.2s;
  -ms-transition: opacity 0s ease-in-out 1.2s;
  -moz-transition: opacity 0s ease-in-out 1.2s;
  -o-transition: opacity 0s ease-in-out 1.2s;
  transition: opacity 0s ease-in-out 1.2s;
}

@media screen and (min-width: 768px) {

.chart--horizontal .bar__container:after { font-size: 16px; }
}

.chart__container.visible .chart--horizontal .bar__container:after {
  opacity: 1;
  -webkit-transition: opacity 0.5s ease-in-out 1.2s;
  -ms-transition: opacity 0.5s ease-in-out 1.2s;
  -moz-transition: opacity 0.5s ease-in-out 1.2s;
  -o-transition: opacity 0.5s ease-in-out 1.2s;
  transition: opacity 0.5s ease-in-out 1.2s;
}

.chart--horizontal .bar {
  height: 20px;
  display: block;
  position: absolute;
  top: 0;
  right: 100%;
  bottom: 0;
  left: 0;
  background-color: rgba(160, 200, 90, 0.5);
  -webkit-transition: all 0s ease-in-out;
  -ms-transition: all 0s ease-in-out;
  -moz-transition: all 0s ease-in-out;
  -o-transition: all 0s ease-in-out;
  transition: all 0s ease-in-out;
}

.chart__container.visible .chart--horizontal .bar {
  -webkit-transition: all 1.2s ease-in-out;
  -ms-transition: all 1.2s ease-in-out;
  -moz-transition: all 1.2s ease-in-out;
  -o-transition: all 1.2s ease-in-out;
  transition: all 1.2s ease-in-out;
  right: 0;
}

.chart--horizontal .bar.bar--danger { background-color: #a0c85a; }

/*------------------------------------*\
    # Others
\*------------------------------------*/

.chart__header { margin-bottom: 10px; }

@media screen and (min-width: 768px) {

.chart__header { margin-bottom: 70px; }

.chart--left .chart__header, .chart--right .chart__header { margin-bottom: 40px; }

}

@media screen and (min-width: 768px) {

.chart__filters--big {
  position: absolute;
  right: 5px;
  top: 0;
  padding: 35px 15px;
}

}

.chart__legend {
  margin: 30px 10px 0;
  padding: 0;
  list-style: none;
  color: rgba(0, 0, 0, 0.6);
  font-size: 14px;
}
 @media screen and (min-width: 768px) {

.chart__legend { margin: 30px 10px 0 20px; }
}

.chart__legend li {
  position: relative;
  padding: 0 10px 10px 15px;
}

.chart__legend span {
  display: inline-block;
  height: 15px;
  width: 15px;
  position: absolute;
  left: -10px;
  top: -3px;
  vertical-align: middle;
  margin: 5px 10px 8px 0;
}

@media screen and (min-width: 1024px) {

.chart--left { margin-right: 15px; }

}

@media screen and (min-width: 1024px) {

.chart--right { margin-left: 15px; }

}

.chart__btn.btn--read-more {
  top: 15px;
  display: block;
  z-index: 4;
}

@media screen and (min-width: 768px) {

.chart__btn.btn--read-more { top: 25px; }

}

.chart__btn.btn--read-more .hide { display: none; }

.chart {
  position: relative;
  max-height: 150px;
  margin-bottom: -70px;
  overflow: hidden;
  -webkit-transition: all 0s ease-in-out;
  -ms-transition: all 0s ease-in-out;
  -moz-transition: all 0s ease-in-out;
  -o-transition: all 0s ease-in-out;
  transition: all 0s ease-in-out;
}

.chart .chart__container {
  -webkit-transition: all 1s ease-in-out;
  -ms-transition: all 1s ease-in-out;
  -moz-transition: all 1s ease-in-out;
  -o-transition: all 1s ease-in-out;
  transition: all 1s ease-in-out;
  opacity: 0;
}

.chart:before {
  content: '';
  background-image: linear-gradient(to bottom, rgba(238, 238, 238, 0.5) 0%, #fff 100px);
  background-repeat: repeat-x;
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: 3;
}

.chart.active {
  max-height: 2000px;
  overflow: visible;
  padding-bottom: 60px;
  margin-bottom: 0;
  color: #000;
  -webkit-transition: all 1s ease-in-out;
  -ms-transition: all 1s ease-in-out;
  -moz-transition: all 1s ease-in-out;
  -o-transition: all 1s ease-in-out;
  transition: all 1s ease-in-out;
}

@media screen and (min-width: 768px) {

.chart.active { padding-bottom: 100px; }

}

.chart.active .chart__container { opacity: 1; }

.chart.active:before { display: none; }

.chart.active .chart__btn {
  position: absolute;
  bottom: 15px;
  left: 0;
  right: 0;
  top: auto;
}
</style>

<script type="text/javascript">

window.onload = function () {
'use strict';
 var data = [{
    "name": "Miasta",
    "axisY": [
        <?php
					  $sql="SELECT fac_type, num_rooms
							FROM IMS_FACILITY
							ORDER BY fac_type";
							$res=mysqli_query($mysqli,$sql);
					  while($row=mysqli_fetch_array($res))
					  { 
						$type=$row['fac_type'];
					  }
					?>
    ],
    "axisX": ["<?php
					  $sql="SELECT fac_type, num_rooms
							FROM IMS_FACILITY
							ORDER BY fac_type";
							$res=mysqli_query($mysqli,$sql);
					  while($row=mysqli_fetch_array($res))
					  { 						
						$rooms=$row['num_rooms'];
					  }
					?>"],
    "bars": [<?php echo $rooms; ?>]
}
}];

$('#default-chart').horizontalChart();

$('#default-chart').horizontalChart({
  data: {},
  animation: true,
  animationOffset: 0,
  animationRepeat: true,
  showValues: true,
  showArrows: false,
  showHorizontalLines: false,
  labelsAboveBars: false
});


}

</script>

<div class="w3-theme-bd5 w3-card-4 navbar navbar-fixed-top" style="background-color:rgba(42,101,149,0.95)!important">
<div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed fa fa-bars hidden-sm hidden-md hidden-lg" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
      </button>
      <a class="navbar-brand" style="padding-top:5px;margin-left:5px" href="../../../../admin_idx.php"><img src="../docs/img/pnhs_logo.png" style="max-width:40px;margin-left:50px;margin-right:50px"></a>
      
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

    <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><i class="fa fa-user fa-fw"></i><?php echo $name;?></a></li>
        <li class="divider"></li>
        <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
	
	<nav style="max-width:100%" class="hidden-xl hidden-lg hidden-md hidden-sm">
		<ul class="nav navbar-nav navbar-right">
        <li><a href="#"><i class="fa fa-user fa-fw"></i><?php echo $name;?></a></li>
        <li class="divider"></li>
        <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>

	<nav style="max-width:100%" class="hidden-xl hidden-lg hidden-md hidden-sm">
		<ul class="sidebar-menu">
			  <li class="sidebar-header">MAIN MENU</li>
              <li><a href="../pages/index.php"><i class="fa fa-home"></i> Home </a></li>
			  <li><a href="../pages/building.php"><i class="fa fa-building-o"></i> List of Buildings </a></li>
			  <li>
				<a href="#">
				  <i class="fa fa-table fa-fw"></i> <span>Storage</span> 
				  <i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="sidebar-submenu">
				  <li><a href="../pages/equip.php"><i class="fa fa-wrench"></i> Equipment </a></li>
				  <li><a href="../pages/supply.php"><i class="fa fa-th"></i> Supply </a></li>
				</ul>
			  </li>
			  <li><a href="../pages/borrowed.php"><i class="fa fa-copy"></i> Borrowed Items </a></li>
			  <li>
				<a href="#">
				  <i class="fa fa-bar-chart-o"></i> <span> Bar Charts</span>
				  <i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="sidebar-submenu">
				  <li><a href="../pages/bcbuilding.php"><i class="fa fa-building-o"></i> Buildings </a></li>
				  <li><a href="../pages/bcequip.php"><i class="fa fa-wrench"></i> Equipment </a></li>
				  <li><a href="../pages/bcsupply.php"><i class="fa fa-th"></i> Supply </a></li>
				</ul>
			  </li>
			  <li>
				<a href="#">
					<i class="fa fa-book"></i> <span> Reports</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="sidebar-submenu">
				  <li><a href="../pages/bldgreport.php"><i class="fa fa-file-o"></i> Building Report </a></li>
				  <li><a href="../pages/borrowreport.php"><i class="fa fa-folder-open-o"></i> Borrow Report </a></li>
				  <li><a href="../pages/annreport.php"><i class="fa fa-folder-o"></i> Storage Report </a></li>	  
				</ul>
			  </li>
			  <li><a href="../pages/equiphistory.php"><i class="fa fa-list-alt"></i> <span> Equipment History </span></a></li>	
			</ul>
		   </nav>
	  </ul>  
</div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
<hr class="w3-theme-yd2" style="height:3px; border:0; margin-top:0px; margin-bottom:0px;">
<hr class="w3-theme-bd2" style="height:3px; border:0; margin-top:0px; margin-bottom:0px;">
</div>
	
<div class="row">
    <div class="col-lg-2 col-md-3 col-sm-3 hidden-xs">
        <div class="navbar navbar-fixed-top" style="width:200px; margin-top:56px">
            <ul class="sidebar-menu">
			  <li class="sidebar-header">MAIN MENU</li>
              <li><a href="../pages/index.php"><i class="fa fa-home"></i> Home </a></li>
			  <li><a href="../pages/building.php"><i class="fa fa-building-o"></i> List of Buildings </a></li>
			  <li>
				<a href="#">
				  <i class="fa fa-table fa-fw"></i> <span>Storage</span> 
				  <i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="sidebar-submenu">
				  <li><a href="../pages/equip.php"><i class="fa fa-wrench"></i> Equipment </a></li>
				  <li><a href="../pages/supply.php"><i class="fa fa-th"></i> Supply </a></li>
				</ul>
			  </li>
			  <li><a href="../pages/borrowed.php"><i class="fa fa-copy"></i> Borrowed Items </a></li>
			  <li>
				<a href="#">
				  <i class="fa fa-bar-chart-o"></i> <span> Bar Charts</span>
				  <i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="sidebar-submenu">
				  <li><a href="../pages/bcbuilding.php"><i class="fa fa-building-o"></i> Buildings </a></li>
				  <li><a href="../pages/bcequip.php"><i class="fa fa-wrench"></i> Equipment </a></li>
				  <li><a href="../pages/bcsupply.php"><i class="fa fa-th"></i> Supply </a></li>
				</ul>
			  </li>
			  <li>
				<a href="#">
					<i class="fa fa-book"></i> <span> Reports</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="sidebar-submenu">
				  <li><a href="../pages/bldgreport.php"><i class="fa fa-file-o"></i> Building Report </a></li>
				  <li><a href="../pages/borrowreport.php"><i class="fa fa-folder-open-o"></i> Borrow Report </a></li>
				  <li><a href="../pages/annreport.php"><i class="fa fa-folder-o"></i> Storage Report </a></li>	  
				</ul>
			  </li>
			  <li><a href="../pages/equiphistory.php"><i class="fa fa-list-alt"></i> <span> Equipment History </span></a></li>		 		  			  
			  <li style="padding-bottom:700%"></li>
            </ul>
        </div>
    </div>
	
	<div class="col-lg-9 col-md-9 col-sm-9">
        <div class="container-fluid" style="height:height:auto;min-height:700px;max-width:100%;margin-top:70px;margin-right:0px;margin-left:0px;margin-bottom:10px">
			<br>
				<form>
					<input class="btn btn-primary btn" type="button" value="Go back" onclick="history.back()">
					</input>
				</form> 
			<div class="col-lg-9">	</br>
				<div class="example-box">
						<div class="example__headline">
							<h2><center>List and Number of Buildings</center></h2>
						</div>
						<div id="default-chart" style="height: 700px; width: 155%;"></div></br>
					</div>
								
			</div>		
		</div>
    </div>
</div>




<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/canvasjs.min.js"> </script>
<script src="../js/alert.js"></script>
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../js/sidebar-menu.js"></script>
<script src="../js/sideNav.js"></script>

<script>
$.sidebarMenu($('.sidebar-menu'))
</script>

<!-- Footer -->
<footer class="container-fluid w3-theme-bd5 hidden-xs" style="padding-top:10px;padding-bottom:20px;margin-left:200px">
    <footer class="w3-theme-bd5">
         <div class="row">
            <div class="col-lg-3 col-md-3">
               <h1 class="h3">PNHS IMS</h1>
               <h6>All Rights Reserved &copy; 2017</h6>
            </div>
            <div class="col-lg-3 col-md-3">
               <h1 class="h3">ADDRESS</h1>
               <h6><b>Pag-asa National Highschool</b><br><span>PNHS Building, Rawis, East Service<br>  Road, Legazpi City, PH 2424</span></h6>
            </div>
            <div class="col-lg-3 col-md-3">
               <h1 class="h3">CONTACT US</h1>
               <h6 class="w3-justify">
                  <b>Phone:</b>
                  <span>(+632) 887-2232</span>
                  <br>
                  <b>E-mail:</b> 
                  <span>pnhsoes@pnhs.gov.ph</span>
                  <br>
                  
               </h6>
            </div>
             <div class="col-lg-3 col-md-3">
               <h1 class="h3">Follow Us On:</h1>
                  <a href="#"><i class="fa fa-bullseye w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-phone w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-facebook w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-twitter w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-google-plus w3-xlarge" aria-hidden="true"></i></a>
            </div>
         </div>
      </footer>
</footer>
<footer class="container-fluid w3-theme-bd5 hidden-lg hidden-md hidden-sm" style="padding-top:10px;padding-bottom:20px">
    <footer class="w3-theme-bd5">
         <div class="row">
            <div class="col-lg-3 col-md-3">
               <h1 class="h3">PNHS IMS</h1>
               <h6>All Rights Reserved &copy; 2017</h6>
            </div>
            <div class="col-lg-3 col-md-3">
               <h1 class="h3">ADDRESS</h1>
               <h6><b>Pag-asa National Highschool</b><br><span>PNHS Building, Rawis, East Service<br>  Road, Legazpi City, PH 2424</span></h6>
            </div>
            <div class="col-lg-3 col-md-3">
               <h1 class="h3">CONTACT US</h1>
               <h6 class="w3-justify">
                  <b>Phone:</b>
                  <span>(+632) 887-2232</span>
                  <br>
                  <b>E-mail:</b> 
                  <span>pnhsoes@pnhs.gov.ph</span>
                  <br>
                  
               </h6>
            </div>
             <div class="col-lg-3 col-md-3">
               <h1 class="h3">Follow Us On:</h1>
                  <a href="#"><i class="fa fa-bullseye w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-phone w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-facebook w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-twitter w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-google-plus w3-xlarge" aria-hidden="true"></i></a>
            </div>
         </div>
      </footer>
</footer>


</body>
</html>