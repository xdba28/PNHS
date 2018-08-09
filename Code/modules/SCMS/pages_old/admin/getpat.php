<?php

include("../../db_connect.php");
session_start();
include("../include/session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Browser's Tab Title -->
    <title>Admin</title>
      
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../../css/bootstrap/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="../../css/w3.css">
    
    <!-- Documents Path --->
    <link rel="stylesheet" href="../../docs/docs.min.css">
    <link rel="stylesheet" href="../../css/sidebar-menu.css">
    <link rel="stylesheet" href="../../css/s.css">
    
    
    <!-- Icons CSS -->
    <link rel="stylesheet" href="../../css/font-awesome/css/font-awesome.min.css" type="text/css">
    
    <!-- Browser's Tab Image -->
    <link rel="shortcut icon" href="../../docs/img/pnhs_favicon.ico" type="image/x-icon">
    <link rel="icon" href="../../docs/img/pnhs_favicon.ico" type="image/x-icon">
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../../Template (reference)/vendor/jquery/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="../../Template (reference)/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Bootstrap -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
	body {
        color: #404E67;
        background: #F5F7FA;
		font-family: 'arial', sans-serif;
	}	
	.icon-background4 {
    color: #36f40b;
	}
	</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

include_once('db_connect.php');
mysqli_query($mysqli, "LOCK TABLES css_school_yr, scms_consultation READ");
$sql= mysqli_query($mysqli, "SELECT * FROM css_school_yr WHERE sy_id = '".$q."'")
or die(mysqli_error($mysqli));

$sy = mysqli_fetch_array($sql);

	$w = $sy['year'];
	$num =explode("-",$w); 
	$sys = $num['0'];
	$sye = $num['1'];

	$montharr = ["06", "07", "08", "09", "10", "11", "12", "01", "02", "03", "04", "05"];
	$mon = 0;
	while($mon < 7)
	{	
		$m = $sys.'-'.$montharr[$mon].'%';
		$monthName = date("F", mktime(0, 0, 0, $montharr[$mon], 12));
		
		$fetch_month = mysqli_query($mysqli,"SELECT COUNT(scms_consultation.patient_id), MONTHNAME(cons_date) FROM scms_consultation
		WHERE cons_date LIKE '".$m."'")
		or die(mysqli_error($mysqli));
		
		$month = mysqli_fetch_array($fetch_month);
		echo'
		<div class="col-lg-3">
			<div class="panel panel-primary">
			<a href = "week.php?d='.base64_url_encode($m).'">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
							<img src="../../img/patient.png" height=75; width=75;>
						</div>
						<div class="col-xs-9 text-right">
							<div class="huge"><strong>'.$month['COUNT(scms_consultation.patient_id)'].'</strong></div><br>
							<div>'.strtoupper($monthName).'</div>
						</div>
					</div>
				</div>
			</a>
			</div>
		</div>
		';
		$mon++;
	}
	
	
	while($mon < 12)
	{	
		$m = $sye.'-'.$montharr[$mon].'%';
		$monthName = date("F", mktime(0, 0, 0, $montharr[$mon], 12));
		
		$fetch_month = mysqli_query($mysqli,"SELECT COUNT(scms_consultation.patient_id), MONTHNAME(cons_date) FROM scms_consultation
		WHERE cons_date LIKE '".$m."'")
		or die(mysqli_error($mysqli));
		
		$month = mysqli_fetch_array($fetch_month);
		echo'
		<div class="col-lg-3">
			<div class="panel panel-primary">
			<a href = "week.php?d='.base64_url_encode($m).'">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
							<img src="../../img/patient.png" height=75; width=75;>
						</div>
						<div class="col-xs-9 text-right">
							<div class="huge"><strong>'.$month['COUNT(scms_consultation.patient_id)'].'</strong></div><br>
							<div>'.strtoupper($monthName).'</div>
						</div>
					</div>
				</div>
			</a>
			</div>
		</div>
		';
		$mon++;
	}
	mysqli_query($mysqli, "UNLOCK TABLES");


mysqli_close($mysqli);
?>
</body>
</html>