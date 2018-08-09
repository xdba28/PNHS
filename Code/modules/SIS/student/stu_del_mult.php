<?php
include_once('../db_con_i.php');
session_start();

if(!empty($_SESSION['user_data']['acct']['emp_no']))
{
    $_SESSION['user_data']['acct']['emp_no'];
}
elseif(empty($_SESSION['user_data']['acct']['emp_no']))
{
    $_SESSION['user_data']['acct']['lrn'];
}
else
{
    header('Location: ../../../admin_idx.php');
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
    <title>Student Information System</title>

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
    <link rel="stylesheet" href="../css/w3/red.css">
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
<style>
.w3-theme-bd5 {color:#fff !important; background-color:#074b83 !important}
@media (max-width:768px){
    footer{
        padding: 1em 5em!important;
    }
}
@media (max-width:530px){
    footer{
        padding: 1em!important;
    }
}
footer{
    padding: 0 15em 0.5em!important;
}
footer a{
    padding-right: 1em;
}
footer a i{
    margin-top: 5px;
}
footer .w3-justify span{
    margin-left: 1em;
}
.col-md-3, .col-lg-3{
  position: relative;
  min-height: 1px;
  padding-right: 15px;
  padding-left: 15px;
}
@media (min-width: 992px) {
  .col-md-3{
    float: left;
    width: 25%;
  }
}
@media (min-width: 1200px) {
  .col-lg-3{
    float: left;
    width: 25%;
  }
}
.w3-justify{text-align:justify!important}
</style>
</head>

<body>

<nav class="navbar-fixed-top w3-theme-bd5 w3-card-4" style="background-color:rgba(42,101,149,0.95)!important" role="navigation">
<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed fa fa-bars hidden-sm hidden-md hidden-lg" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
      </button>
      <a class="navbar-brand w3-card-4" href="../../../admin_idx.php"><img src="../docs/img/pnhs_logo.png" width="75px" height="75px"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <hr class="hidden-sm hidden-md hidden-lg" style="height:10px; border:0">

      <ul class="nav navbar-nav navbar-right">
        <li><a href="student_list.php">Student List</a></li>
        <li><a href="student_f137_history.php">F137 History</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Manage Account <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#"><i class="fa fa-user fa-fw"></i> Admin Profile</a></li>
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
        <h1 class="page-header w3-center">Delete Multiple Students</h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default w3-card-4">
             
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead class="w3-theme-bl1">
                                <tr>
                                    <th>#</th>
                                    <th>LRN</th>
                                    <th>Lastname</th>
                                    <th>Firstname</th>
                                    <th>Middle Name</th>
                                    <th>Grade Level & Section</th>
                                    <th>School Year</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php

                            $get_student = $mysqli->query("SELECT lrn, stu_lname, stu_fname, stu_mname FROM sis_student")
                                                    or die("Error get_student: " . $mysqli->error);

                                while($row = mysqli_fetch_array($get_student))
                                {
                                    $lrn = $row['lrn'];
                                    echo '<td><center>
                                    <input form="del" type="checkbox" name="stu[] id="stu[]" value=' . $row['lrn'] . '>
                                    <td>' . $row['lrn'] . '</td>
                                    <td>' . $row['stu_lname'] . '</td>
                                    <td>' . $row['stu_fname'] . '</td>
                                    <td>' . $row['stu_mname'] . '</td>';
                                                                        
                                    $get_section = $mysqli->query("SELECT YEAR_LEVEL, SECTION_NAME, year FROM sis_stu_rec, css_section, css_school_yr
                                                                WHERE sis_stu_rec.section_id = css_section.SECTION_ID
                                                                AND sis_stu_rec.sy_id = css_school_yr.sy_id
                                                                AND lrn = $lrn")
                                                    or die("Error: get_section: ". $mysqli->error);

                                    while($row = mysqli_fetch_array($get_section))
                                    {
                                        echo
                                            '<td>'. $row['YEAR_LEVEL'] . " - " . $row['SECTION_NAME'] . '</td>
                                            <td>' . $row['year'] . '</tr>'; 
                                    }
                                }
                                ?>
                   
                            </tbody>
                        </table>
                        <center>

                        <form action="stu_del_mult_val.php" method="post" enctype="multipart/form-data" id="del">
                        <button form="del" type="submit" class="btn w3-hover-red btn-danger w3-card-2">
                        <i class="fa fa-trash-o"></i>&nbsp;&nbsp;Delete Selected&nbsp;
                        </button>
                        
                        <a href="student_list.php">
                        <button type="button" class="btn w3-hover-red w3-theme-rl1 w3-card-2">
                        <i class="fa fa-close"></i>&nbsp;&nbsp;Back&nbsp;
                        </button></a>

                        </center>
                        <!-- /.table-responsive -->
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
<script src="../js/sideNav.js"></script>
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
    
<footer class="w3-theme-bd5">
<div class="row">
   <div class="col-lg-3 col-md-3">
      <h1 class="h3">PNHS SIS</h1>
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
</body>

</html>
