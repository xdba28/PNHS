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
	$r = intval($_GET['r']);

	include_once('db_connect.php');
	
	mysqli_query($mysqli, "LOCK TABLES scms_bmi_rec, cms_account, sis_student, sis_stu_rec, css_section READ");

	$fetch_status = mysqli_query($mysqli, "SELECT scms_bmi_rec.nutri_status, 
				COUNT(CASE WHEN sis_student.sis_gender='Male' THEN 1 END) As Male, 
				COUNT(CASE WHEN sis_student.sis_gender='Female' THEN 1 END) As Female, 
				COUNT(scms_bmi_rec.bmi_no) AS Total, 
				CONCAT(css_section.year_level,'-',css_section.section_name) AS YR_SEC
				FROM scms_bmi_rec, cms_account, sis_student, sis_stu_rec, css_section 
				WHERE cms_account.cms_account_ID = scms_bmi_rec.cms_account_ID 
				AND cms_account.lrn = sis_student.LRN AND sis_student.LRN = sis_stu_rec.LRN 
				AND sis_stu_rec.section_ID = css_section.section_ID 
				AND css_section.section_ID = '".$r."' 
				GROUP BY scms_bmi_rec.nutri_status")
		or die(mysqli_error($mysqli));
				
		$total = ['0', '0', '0', '0', '0'];
		$male = ['0', '0', '0', '0', '0'];
		$female = ['0', '0', '0', '0', '0'];
		$stat = ["Severely Wasted", "Wasted", "Normal", "Overweight", "Obese"];
		$ftotal = 0;
		while($st = mysqli_fetch_array($fetch_status))
		{
			if($st['nutri_status'] == 'Severely Wasted')
			{
				$total[0] = $st['Total'];
				$male[0] = $st['Male'];
				$female[0] = $st['Female'];
			}
			else if($st['nutri_status'] == 'Wasted')
			{
				$total[1] = $st['Total'];
				$male[1] = $st['Male'];
				$female[1] = $st['Female'];
			}
			else if($st['nutri_status'] == 'Normal')
			{
				$total[2] = $st['Total'];
				$male[2] = $st['Male'];
				$female[2] = $st['Female'];
			}
			else if($st['nutri_status'] == 'Overweight')
			{
				$total[3] = $st['Total'];
				$male[3] = $st['Male'];
				$female[3] = $st['Female'];
			}
			else if($st['nutri_status'] == 'Obese')
			{
				$total[4] = $st['Total'];
				$male[4] = $st['Male'];
				$female[4] = $st['Female'];
			}
			$ftotal = $st['Total'] + $ftotal;
		}
				
		echo' 
		
			<h6 style = "padding-left: 15px;font-size:12px;font-family:Arial;">Total Students: <b>'.$ftotal.'</b></h6><hr style = "padding-top: 0px; margin-top: 0px; margin-bottom: 0px; border-color: silver;">';
		echo'<div class="panel-body">
			<div class="table-responsive"><small>
			<table class="table table-striped table-bordered table-hover">
			<thead>
			<tr>
				<th>Status</th>
				<th>Male</th>
				<th>Female</th>
				<th>Total</th>
			</tr>
			</thead>
			<tbody>';
				
		$statcount = 0;
		while($statcount < 5)
		{
			
				echo'<tr>
				<td>'.$stat[$statcount].'</td>
				<td>'.$male[$statcount].'</td>
				<td>'.$female[$statcount].'</td>
				<td>'.$total[$statcount].'</td>
				</tr>';
			
			$statcount++;
		}
		echo'
		</tbody>
		</table></small>
		</div>
	</div>';

	mysqli_query($mysqli, "UNLOCK TABLES");
	mysqli_close($mysqli);
?>
</body>
</html>