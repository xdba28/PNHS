<?php
session_start(); 
include "db_conn.php";


if(!empty($_SESSION['grade'])){
  $grade = $_SESSION['grade'];
}
else{
  $grade = 7;
  $_SESSION['grade'] = $grade;
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
    <title>PANAHAS Template</title>
      
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="../css/w3/w3.css">
    
    <!-- Documents Path --->
    <link rel="stylesheet" href="..docs/docs.min.css">
    
    <!--Include your modified CSS below as needed-->
    <link rel="stylesheet" href="../css/w3/blue.css">
    <link rel="stylesheet" href="../css/w3/yellow.css">
    <link rel="stylesheet" href="../css/w3/w3.css">
    <link rel="stylesheet" href="../css/sidebar-menu.css">
    
    <!-- Icons CSS -->
    <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css" type="text/css">
    
    <!-- Browser's Tab Image -->
    <link rel="shortcut icon" href="../docs/img/pnhs_favicon.ico" type="image/x-icon">
    <link rel="icon" href="../docs/img/pnhs_logoicon.jpg" type="image/x-icon">
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Bootstrap -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
        <style>
                    /* Style The tables */
                    .column-title{
                      background-color: #246884;
                      text-align: center;
                      font-size:15px; 
                      color: #fff;
                    }
                    .time{
                      background-color: #153948;
                      color: #fff;
                    }
                    .check{
                      width: 28px;
                      height: 28px;
                      position: relative;
                      margin: 20px auto;
                      background: #fcfff4;
                      background: linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
                      border-radius: 50px;
                      box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0,0,0,0.5);
                    }    
                    /* Style The Dropdown Button */
                    .dropbtn {
                        background-color:transparent;
                        color:#999;
                        text-align: right;
                        font-size: 13px;
                        border: none;
                        cursor: pointer;
                    }
                                                
                    /* The container div - needed to position the dropdown content */
                    .dropdown {
                        position: relative;
                        display: inline-block;
                    }
                                       
                    /* Dropdown Content (Hidden by Default) */
                    .dropdown-content {
                        display: none;
                        position: absolute;
                        background-color: #f9f9f9;
                        min-width: 100px;
                        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                        z-index: 1;
                    }
                     
                    /* Links inside the dropdown */
                    .dropdown-content a {
                        color: black;
                        padding: 9px 25px;
                        text-decoration: none;
                        display: block;
                        font-size: 13px;

                    }
                    /* Change color of dropdown links on hover */
                    .dropdown-content a:hover {background-color:#B8BDED}                    
          
                    /* Show the dropdown menu on hover */
                    .dropdown:hover .dropdown-content {
                        display: block;
                    }          
                    
                    /* Change the background color of the dropdown button when the dropdown content is shown */
                    .dropdown:hover .dropbtn {
                        background-color:transparent; 
                    }
                    .a{
                      float: right;
                      margin: 0;
                    }
                    .table {
                      table-layout: fixed;
                      width: 1170px;
					  word-wrap:break-word;
                    }
</style>

<div class="w3-theme-bd5 w3-card-4 navbar navbar-fixed-top" style="background-color:rgba(42,101,149,0.95)!important">
<div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed fa fa-bars hidden-sm hidden-md hidden-lg" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
      </button>
      <a class="navbar-brand" style="padding-top:5px;margin-left:5px" href="../pages/index.html"><img src="../docs/img/pnhs_logo.png" style="max-width:40px;margin-left:50px;margin-right:50px"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <form class="navbar-form navbar-left hidden-sm">
        </form>

    <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><i class="fa fa-user fa-fw"></i> Admin Profile</a></li>
        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
        <li class="divider"></li>
        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
        <nav style="max-width:100%" class="hidden-xl hidden-lg hidden-md hidden-sm">
            <ul class="sidebar-menu">
              <li class="sidebar-header">MAIN NAVIGATION</li>
              <li>
                <a href="../widgets.html">
                  <i class="fa fa-edit"></i> <span>Create Schedule</span>
                </a>
              </li>
			  
              <li>
                <a href="#">
                  <i class="fa fa-eye"></i>
                  <span>View Schedule</span>
                </a>
                <ul class="sidebar-submenu" style="display: none;">
                  <li><a href="top-nav.html"><i class="fa fa-circle-o"></i> Year Level</a></li>
                  <li><a href="boxed.html"><i class="fa fa-circle-o"></i> Department</a></li>
                  <li><a href="fixed.html"><i class="fa fa-circle-o"></i> Teacher</a></li>
                  <li class=""><a href="collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Class</a>
                  </li>
                </ul>
              </li>
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
              <li class="sidebar-header">MAIN NAVIGATION</li>
              <li>
                <a data-toggle="modal" data-target="#school_year" onclick="check_sy(this.value)">
                  <i class="fa fa-edit"></i> <span>Create Schedule</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-eye"></i>
                  <span>View Schedule</span>
                </a>
                <ul class="sidebar-submenu" style="display: none;">
                  <li><a href="year_level.php"><i class="fa fa-circle-o"></i> Year Level</a></li>
                  <li><a href="department.php"><i class="fa fa-circle-o"></i> Department</a></li>
                  <li><a href="teacher.php"><i class="fa fa-circle-o"></i> Teacher</a></li>
                  <li class=""><a href="section.php"><i class="fa fa-circle-o"></i> Class</a>
                  </li>
                </ul>
              </li>
              <li style="padding-bottom:1000%"></li>
            </ul>
        </div>
    </div>
  
  
<div class="col-lg-10 col-md-9 col-sm-9">
<div class="container-fluid" style="height:auto;min-height:550px;max-width:100%;margin-top:30px;margin-left:10px;margin-bottom:10px">


<body>
<!-- -----------------------------CONTENT STARTS HERE--------------------------------- -->


<!-- MODAL IN DELETING SECTION (end) -->
 
<!-- MODAL IN SCHOOL YEAR (start)-->
<div class="modal fade" id="school_year" role="dialog">
  
</div>
<!-- MODAL IN SCHOOL YEAR (end) --> 

<!-- MODAL IN EXTEND SCHEDULE (start) -->

 <!-- Modal button end-->
 
<!--- TABLES START -->

<!--- TABLES END --->
  
</div> <!-- /DIV FOR LINE 355 or SEARCH FOR <div class="container-fluid" style="height:auto;min-height:500px;max-width:100%;margin-top:70px;margin-right:20px;margin-left:20px;margin-bottom:10px">  -->
</div> <!-- /DIV FOR LINE 354 or SEARCH FOR <div class="col-lg-10 col-md-9 col-sm-9"> --> 
</div> <!-- /DIV FOR LINE 256 or SEARCH FOR <div class="row"> --> 

<!-- FOOOTER --->
 
<footer class="container-fluid w3-theme-bd5 hidden-xs " style="padding-top:10px;padding-bottom:20px;margin-left:200px">
    <div class="row">
        <div class="col-lg-4 col-md-4 w3-left">
            <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PANAHAS</h2>
            <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alright Reserved &copy; 2017</h6>
        </div>
        <div class="col-lg-4 col-md-4 w3-right">
            <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contact Us:</h5>
            <a href="#"><i class="fa fa-bullseye w3-xlarge"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="#"><i class="fa fa-phone w3-xlarge"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="#"><i class="fa fa-facebook w3-xlarge"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="#"><i class="fa fa-twitter w3-xlarge"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="#"><i class="fa fa-google-plus w3-xlarge"></i></a>
        </div>
    </div>
</footer>

<footer class="container-fluid w3-theme-bd5 hidden-lg hidden-md hidden-sm" style="padding-top:10px;padding-bottom:20px">
    <div class="row">
        <div class="col-lg-4 col-md-4 w3-left">
            <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PANAHAS</h2>
            <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alright Reserved &copy; 2017</h6>
        </div>
        <div class="col-lg-4 col-md-4 w3-right">
            <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contact Us:</h5>
            <a href="#"><i class="fa fa-bullseye w3-xlarge"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="#"><i class="fa fa-phone w3-xlarge"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="#"><i class="fa fa-facebook w3-xlarge"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="#"><i class="fa fa-twitter w3-xlarge"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="#"><i class="fa fa-google-plus w3-xlarge"></i></a>
        </div>
    </div>
</footer>

<!-- FOOOTER --->

    
<!-- SCRIPT -->
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/sidebar-menu.js"></script>
<script src="../js/sideNav.js"></script>
<script  src="../js/index.js"></script>
<script  src="../js/index2.js"></script>
<script  src="../js/index3.js"></script>
<script  src="../js/index4.js"></script>


<script>
	$.sidebarMenu($('.sidebar-menu'))
</script>


<script type="text/javascript">
  function check_sy(val){
    $.ajax({
      type: "POST",
      url: "check_sy.php",
      data: "grade="+val,
      success: function(data){
        $("#school_year").html(data);
      }
    });
  }

</script>	

<!-- SCRIPT -->

</body>
</html>
	