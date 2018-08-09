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
    <link rel="stylesheet" href="../../css/style.css">
	<link rel="stylesheet" href="../../css/metisMenu.min.css" type="text/css">
    
    
    <!-- Documents Path -->
    <link rel="stylesheet" href="../../docs/docs.min.css">
    <link rel="stylesheet" href="../../css/sidebar-menu.css">
    <link rel="stylesheet" href="../../css/s.css">
    
	
    <link rel="stylesheet" href="../../Template (refeence)/vendor/datatables">
    
    <!-- Icons CSS -->
    <link rel="stylesheet" href="../../css/font-awesome/css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
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
	<script>
	function showPat(str) {
	  if (str=="") {
		document.getElementById("txtHint").innerHTML="";
		return;
	  } 
	  if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	  } else { // code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  xmlhttp.onreadystatechange=function() {
		if (this.readyState==4 && this.status==200) {
		  document.getElementById("txtHint").innerHTML=this.responseText;
		}
	  }
	  xmlhttp.open("GET","getpat.php?q="+str,true);
	  xmlhttp.send();
	}
	</script>
	<style>
body {
        color: #404E67;
        background: #FFFFFF;
		font-family: 'arial', sans-serif;
	}	
	.table-wrapper {
		width: 700px;
		margin: 30px auto;
        background: #fff;
        padding: 20px;	
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
    .table-title {
        padding-bottom: 10px;
        margin: 0 0 10px;
    }
    .table-title h2 {
        margin: 6px 0 0;
        font-size: 22px;
    }
    .table-title .add-new {
        float: right;
		height: 30px;
		font-weight: bold;
		font-size: 12px;
		text-shadow: none;
		min-width: 100px;
		border-radius: 50px;
		line-height: 13px;
    }
	.table-title .add-new i {
		margin-right: 4px;
	}
    table.table {
        table-layout: fixed;
    }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
    }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }
    table.table th:last-child {
        width: 100px;
    }
    table.table td a {
		cursor: pointer;
        display: inline-block;
        margin: 0 5px;
		min-width: 24px;
    }    
	table.table td a.add {
        color: #27C46B;
    }
    table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #E34724;
    }
    table.table td i {
        font-size: 19px;
    }
	table.table td a.add i {
        font-size: 24px;
    	margin-right: -1px;
        position: relative;
        top: 3px;
    }    
    table.table .form-control {
        height: 32px;
        line-height: 32px;
        box-shadow: none;
        border-radius: 2px;
    }
	table.table .form-control.error {
		border-color: #f50000;
	}
	table.table td .add {
		display: none;
	}
	.icon-background4 {
    color: #36f40b;
	}
	</style>
</head>

<body>

            <?php include("../include/sidenav.php"); ?>
                <?php include("../include/topnav.php"); ?>
        <div id="wrapper">
            <div id="page-content-wrapper">
            <div class="container-fluid" style="margin-right:40px;margin-left:70px;">
			<ol class="breadcrumb">
				<li><a href="index.php">School Clinic</a></li>
				<li class="active">Patient Records</li>
			</ol>
                <div class="container-fluid">
                    <h1 class="page-header">Patient Records <small><small>Student and Personnel Records</small></small></h1>
                </div>

                <!-- /.col-lg-12 -->
				<div class="col-lg-12">
                    <div class="row row-ribbon bg-info text-default" style="padding-left: 20px">
                    <br><p><strong>Note: </strong> Check the records of patients by month. The corresponding patient count for each month is shown below.</p><br>
                    </div>
                </div>
				<div class="col-lg-12" style="padding-top:25px;padding-bottom:25px;">
				<div class="">
                        <!-- /.panel-heading -->
						
						
                        <div class="panel-body">
						<form action = "">
                            <select style="float:right" class="btn btn-default" name="pats" onchange="showPat(this.value)">
							<?php
							mysqli_query($mysqli, "LOCK TABLES css_school_yr READ");
							$fetch_sy = mysqli_query($mysqli, "SELECT * FROM css_school_yr")
							or die(mysqli_error($mysqli));
							
							while($sy = mysqli_fetch_array($fetch_sy))
							{
								$q = $sy['year'];
								$num =explode("-",$q); 
								
								if($sy['status'] == "active")
								{
									$sys = $num['0'];
									$sye = $num['1'];
									echo'
									<option value="'.$sy['sy_id'].'" selected>'.$q.'</option>';
								}
								else
								{
									echo'
									<option value="'.$sy['sy_id'].'">'.$q.'</option>';
								}
							}//selected
							
							mysqli_query($mysqli, "UNLOCK TABLES");
							?>
							</select>
						</form><!--selected--><br/>
							<hr>
							<div id="txtHint">
								<?php
									$montharr = ["06", "07", "08", "09", "10", "11", "12", "01", "02", "03", "04", "05"];
									$mon = 0;
									mysqli_query($mysqli, "LOCK TABLES scms_consultation READ");
									while($mon < 7)
									{	
										$m = $sys.'-'.$montharr[$mon].'%';
										$monthName = date("F", mktime(0, 0, 0, $montharr[$mon], 12));
										
										$fetch_month = mysqli_query($mysqli,"SELECT COUNT(scms_consultation.patient_id), MONTHNAME(cons_date) FROM scms_consultation
										WHERE cons_date LIKE '".$m."'")
										or die(mysqli_error($mysqli));
										
										$month = mysqli_fetch_array($fetch_month);
										echo'
										<div class="col-lg-3 ">
											<div class="panel panel-primary">
											<a href = "week.php?d='.base64_url_encode($m).'">
												<div class="panel-heading">
													<div class="row">
														<div class="col-xs-3">
															<img src="../../img/patient.png" height=75; width=75;>
														</div>
														<div class="col-xs-9 text-right">
															<div class="huge"<strong>'.$month['COUNT(scms_consultation.patient_id)'].'</strong></div><br>
															<div><strong>'.strtoupper($monthName).'</strong></div>
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
															<div class="huge"<strong>'.$month['COUNT(scms_consultation.patient_id)'].'</strong></div><br>
															<div><strong>'.strtoupper($monthName).'</strong></div>
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
									
								?>
							
							</div>
							

                        </div>
                        </div>
                    </div>
                <!-- /.col-lg-12 -->
	
	</div>
        </div>
		<br><br><br>
        <?php include "../../pages/include/footer.php"; ?>
    </div>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../js/alert.js"></script>
<script src="../../js/slideshow.js"></script>
<script src="../../js/backToTop.js"></script>
<script src="../../js/sideNavII.js"></script>
<script src="../../js/showNav.js"></script>
<script src="../../js/metisMenu.min.js"></script>     
<script src="../../js/sb-admin-2.min.js"></script>
 
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>


<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../Template%20(reference)/vendor/jquery/jquery-3.0.0.min.js"></script>
<script src="../../js/sidebar-menu.js"></script>
<script src="../../js/sideNav.js"></script>
    <script src="../../js/index.js"></script>
<script>
$.sidebarMenu($('.sidebar-menu'))
</script>


</body>

</html>
