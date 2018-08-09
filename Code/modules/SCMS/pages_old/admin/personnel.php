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
    <link rel="stylesheet" href="../../css/style.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="../../css/w3.css">
    
    <!-- Documents Path -->
    <link rel="stylesheet" href="../../docs/docs.min.css">
    <link rel="stylesheet" href="../../css/sidebar-menu.css">
    <link rel="stylesheet" href="../../css/s.css">
    <link rel="stylesheet" href="../../css/style.css">
	<link rel="stylesheet" href="../../css/metisMenu.min.css" type="text/css">
    
    
	    <!-- DataTables CSS -->
    <link href="../../Template (reference)/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../../Template (reference)/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
	
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
        background: #FFFFFF;
		font-family: 'arial', sans-serif;
	}	
	.icon-background4 {
    color: #36f40b;
	}
	</style>
</head>

<body>

            <?php include("../include/topnav.php"); ?>
    <div id="wrapper">
        <?php include("../include/sidenav.php"); ?>
        <div id="page-content-wrapper">
            <div class="container-fluid" style="margin-right:40px;margin-left:70px;">
			<ol class="breadcrumb">
				<li><a href="index.php">School Clinic</a></li>
				<li class="active">Personnel Medical Records</li>
			</ol>
                <div class="col-lg-12">
					<h1 class="page-header">Masterlist <small><small>Personnel Medical Records</small></small>       
                    </h1>
                 </div>
                <!-- /.col-lg-12 -->
				<div class="col-lg-12">
                    <div class="row row-ribbon bg-info text-default" style="padding-left: 20px">
                    <br><p><strong>Note: </strong> These are the list of personnel with their Medical Records.</p><br>
                    </div><br>
                </div> 
				<br>
			
				<div class="col-lg-12">
						
				<div class="panel panel-primary">
                        <div class="panel-body tooltip-demo">
                            <table width="100%" class="table table-bordered table-striped table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><small>Name</small></th>
                                        <th><small>Sex</small></th>
                                        <th><small>Age</small></th>
                                        <th><small>View</small></th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php
									mysqli_query($mysqli, "LOCK TABLES pims_personnel, cms_account READ");
									$fetch_personnel = mysqli_query($mysqli, "SELECT * FROM pims_personnel, cms_account
										WHERE pims_personnel.emp_No = cms_account.emp_no")
									or die(mysqli_error($mysqli));
									
									$p_count = 1;
									while($personnel = mysqli_fetch_array($fetch_personnel))
									{	
										echo'
										<tr class="odd gradeX">
										<td><small>'.$p_count.'</small></td>
                                        <td><small>'.strtoupper($personnel['P_lname']).', '.strtoupper($personnel['P_fname']).'</small></td>
                                        <td><small>'.$personnel['pims_gender'].'</small></td>
                                        <td><small>'.$personnel['pims_age'].'</small></td>
										<td><a href="medhist.php?id='.base64_url_encode($personnel['cms_account_ID']).'"><button  class="btn btn-info"  style="padding-top:2px;padding-bottom:2px;"><small>Profile</small></button></a></td>
										</tr>';
										$p_count++;
									}
									mysqli_query($mysqli, "UNLOCK TABLES");
									?>
                                    
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                       </div>
                        <!-- /.panel-body -->
                    </div>
                    </div>
                    <!-- /.panel -->
    </div>
            <br><br><br>            
			<!-- Footer --> 
            <?php include "../../pages/include/footer.php"; ?>
        </div>
    </div>
        	
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../js/alert.js"></script>
    <script src="../../js/index.js"></script>
<script src="../../js/slideshow.js"></script>
<script src="../../js/backToTop.js"></script>
<script src="../../js/sideNavII.js"></script>
<script src="../../js/showNav.js"></script>
<script src="../../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../../vendor/datatables-responsive/dataTables.responsive.js"></script>
<script src="../../vendor/datatables-responsive/dataTables.responsive.js"></script>     
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
<script>
$.sidebarMenu($('.sidebar-menu'))
</script>
<script>
    // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })
    </script>
	

</body>

</html>
