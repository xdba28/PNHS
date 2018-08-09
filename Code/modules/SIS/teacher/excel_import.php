<?php
require_once '../Classes/PHPExcel.php';
include_once('../DB Con.php');

session_start();

if(isset($_SESSION['user_data']['acct']['cms_username']) && isset($_SESSION['user_data']['acct']['cms_password']) && $_SESSION['user_data']['acct']['cms_account_type']=='user')
{
	$_SESSION['user_data']['acct']['cms_account_ID'];
	$_SESSION['user_data']['acct']['cms_account_type'];
}
else
{
	header('Location: ../index.php');	
}
?>


<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Browser's Tab Title -->
    <title>PANAHAS</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="../css/w3/w3.css">
    
    <!-- MetisMenu CSS -->
    <link href="../Template%20(reference)/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../Template%20(reference)/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../Template%20(reference)/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../Template%20(reference)/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../Template%20(reference)/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!--Include your modified CSS below as needed-->
    <link rel="stylesheet" href="../css/w3/blue.css">
    <link rel="stylesheet" href="../css/w3/yellow.css">
    <link rel="stylesheet" href="../css/w3/w3.css">
    <link rel="stylesheet" href="../css/sideNav.css">
    <link rel="stylesheet" href="../css/backToTop.css">

    <!-- Browser's Tab Image -->
    <link rel="shortcut icon" href="../docs/pnhs_img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../docs/img/pnhs_favicon.ico" type="image/x-icon">
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script href="../Template%20(reference)/vendor/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script href="../Template%20(reference)/vendor/bootstrap/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>

<nav class="navbar-fixed-top w3-theme-bd5 w3-card-4" style="background-color:rgba(42,101,149,0.95)!important" role="navigation">
<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed fa fa-bars hidden-sm hidden-md hidden-lg" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
      </button>
      <a class="navbar-brand w3-card-4" href="../pages/index.html"><img src="../docs/img/pnhs_logo.png" width="75px" height="75px"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <hr class="hidden-sm hidden-md hidden-lg" style="height:10px; border:0">
        <form class="navbar-form navbar-left">
          <div class="input-group">
          </div>
        </form>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">Home</a></li>
        <li><a href="student_list.php">Student List</a></li>
        <li><a href="excel_import.php">Grade Import</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Manage Account <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#"><i class="fa fa-user fa-fw"></i> Admin Profile</a></li>
              <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
              <li class="divider"></li>
              <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
            </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
<hr class="w3-theme-yd2" style="height:3px; border:0; margin-top:0px; margin-bottom:0px;">
<hr class="w3-theme-bd2" style="height:3px; border:0; margin-top:0px; margin-bottom:0px;">
</nav>
<div class="container" style="padding:35px; background:rga(0,0,0,0.5)"></div>

<div id="mySidenav" class="sidenav w3-card-4">
  <a href="javascript:void(0)" class="closebtn" style="margin-left:150px" onclick="closeNav()">&times;</a>
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a>
</div>

<div id="main">

<a id="openBtn" onclick="openNav()" alt="Open Side Navigation" data-toggle="tooltip" data-placement="right">
    <span class="glyphicon glyphicon-chevron-right" style="top:45%"></span>
</a>

<a id="back-to-top" href="#" class="w3-circle w3-card-4" alt="Return to Top" data-toggle="tooltip" data-placement="left">
    <span class="glyphicon glyphicon-chevron-up"></span>
</a>
    
    <div class="container">
        <h1 class="page-header w3-center">Grade Import</h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
             
                    <!-- /.panel-heading -->
                    <div class="panel-body">


<form action="excel_save_file.php" method="post" enctype="multipart/form-data">
		Select excel file to upload:
		<br>
    <br>
    Action: &nbsp&nbspSubmit Grades
		<br><br>

		<input type="file" name="excel_file" id="excel_file">
    <br>
		<input type="submit" value="Upload" name="submit">
</form>



                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    
<script src="../js/alert.js"></script>
<script src="../js/slideshow.js"></script>
<script src="../js/backToTop.js"></script>
<script src="../js/sideNavII.js"></script>
<script src="../js/showNav.js"></script>
    
<!-- jQuery -->
<script src="../Template%20(reference)/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../Template%20(reference)/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../Template%20(reference)/vendor/metisMenu/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="../Template%20(reference)/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../Template%20(reference)/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../Template%20(reference)/vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../Template%20(reference)/dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });
});
</script>
</div>
    
<!-- Footer -->
<footer class="w3-container w3-theme-bd5" style="margin-top:20%">
  <h3>Footer</h3>
</footer>

</body>

</html>