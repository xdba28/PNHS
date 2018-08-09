<?php
session_start(); 
include "db_conn.php";
$room = mysqli_query($conn, "SELECT * FROM room");
$section = mysqli_query($conn, "SELECT * FROM section");
$teacher = mysqli_query($conn, "SELECT * FROM teacher");
$subject = mysqli_query($conn, "SELECT * FROM subject");
$teacher_p = unserialize(file_get_contents('files/teacher.txt'));
$subject_p = unserialize(file_get_contents('files/subject.txt'));

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
    <link rel="icon" href="../docs/img/pnhs_favicon.ico" type="image/x-icon">
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../Template (reference)/vendor/jquery/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="../Template (reference)/vendor/bootstrap/js/bootstrap.min.js"></script>

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
                      background-color: #53ABCF;
                      text-align: center;
                      font-size:15px; 
                      color: #fff;
                    }
                    .time{
                      background-color: #57BCE5;
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
                                                
                    /* The container <div> - needed to position the dropdown content */
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
                    .table{
                      table-layout: fixed;
                      width: 1000px;
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
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
              </span>
          </div>
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
                <a href="#">
                  <i class="fa fa-calendar"></i> <span>Create Schedule</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                  <li><a href="#"><i class="fa fa-circle-o"></i> Grade 7</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> Grade 8</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> Grade 9</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> Grade 10</a></li>
                </ul>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-files-o"></i>
                  <span>Layout Options</span>
                  <span class="label label-primary pull-right">4</span>
                </a>
                <ul class="sidebar-submenu" style="display: none;">
                  <li><a href="top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
                  <li><a href="boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
                  <li><a href="fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
                  <li class=""><a href="collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="../widgets.html">
                  <i class="fa fa-th"></i> <span>Widgets</span>
                  <small class="label pull-right label-info">new</small>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-pie-chart"></i>
                  <span>Charts</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                  <li><a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
                  <li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
                  <li><a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
                  <li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
                </ul>
              </li>
             
              <li>
                <a href="#">
                  <i class="fa fa-folder"></i> <span>Examples</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                  <li><a href="../examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
                  <li><a href="../examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
                  <li><a href="../examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
                  <li><a href="../examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
                  <li><a href="../examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
                  <li><a href="../examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
                  <li><a href="../examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
                  <li><a href="../examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
                  <li><a href="../examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
                </ul>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-share"></i> <span>Multilevel</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                  <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                  <li>
                    <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="sidebar-submenu">
                      <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                      <li>
                        <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="sidebar-submenu">
                          <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                          <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                </ul>
              </li>
              <li><a href="../../documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
              <li class="sidebar-header">LABELS</li>
              <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
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
                <a href="#">
                  <i class="fa fa-calendar"></i> <span>Create Schedule</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                  <li><a href="#"><i class="fa fa-circle-o"></i> Grade 7</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> Grade 8</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> Grade 9</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> Grade 10</a></li>
                </ul>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-files-o"></i>
                  <span>Layout Options</span>
                  <span class="label label-primary pull-right">4</span>
                </a>
                <ul class="sidebar-submenu" style="display: none;">
                  <li><a href="top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
                  <li><a href="boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
                  <li><a href="fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
                  <li class=""><a href="collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="../widgets.html">
                  <i class="fa fa-th"></i> <span>Widgets</span>
                  <small class="label pull-right label-info">new</small>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-pie-chart"></i>
                  <span>Charts</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                  <li><a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
                  <li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
                  <li><a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
                  <li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
                </ul>
              </li>
             
              <li>
                <a href="#">
                  <i class="fa fa-folder"></i> <span>Examples</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                  <li><a href="../examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
                  <li><a href="../examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
                  <li><a href="../examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
                  <li><a href="../examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
                  <li><a href="../examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
                  <li><a href="../examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
                  <li><a href="../examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
                  <li><a href="../examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
                  <li><a href="../examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
                </ul>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-share"></i> <span>Multilevel</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                  <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                  <li>
                    <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="sidebar-submenu">
                      <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                      <li>
                        <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="sidebar-submenu">
                          <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                          <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                </ul>
              </li>
              <li><a href="../../documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
              <li class="sidebar-header">LABELS</li>
              <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
              <li style="padding-bottom:100%"></li>
            </ul>
        </div>
    </div>
    <div class="col-lg-10 col-md-9 col-sm-9">
        <div class="container-fluid" style="height:700px;max-width:100%;margin-top:70px;margin-right:20px;margin-left:20px;margin-bottom:10px">


<body>
    

<!-- -----------------------------CONTENT STARTS HERE--------------------------------- -->

<!-- MODAL IN CREATING SUBJECT (start)-->
<div class="modal fade" id="CModal" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header modal-info" style="background-color:#3f90bd">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:#FFF"><b>Add Subject</b></h4>
      </div>
           <br>
         
            <form class="form-horizontal custom-form" action="process.php" method="POST">
              <div class="form-group">
                <div class="col-md-10 col-md-offset-1">
                      <label class="control-label" for="name-input-field" style="padding-left: 105px">
                        Select Day/s: &nbsp;
                        </label>
                        <div class="btn-group" data-toggle="buttons">
                          <label class="btn btn-info active">
                            <input type="checkbox" value="Regular" name="day[]" checked autocomplete="off">Reg.
                          </label>
                          <label class="btn btn-info">
                            <input type="checkbox" value="M" name="day[]" autocomplete="off">Mon.
                          </label>
                          <label class="btn btn-info">
                            <input type="checkbox" value="T" name="day[]" autocomplete="off">Tues.
                          </label>
                          <label class="btn btn-info">
                            <input type="checkbox" value="W" name="day[]" autocomplete="off">Wed.
                          </label>
                          <label class="btn btn-info">
                            <input type="checkbox" value="Th" name="day[]" autocomplete="off">Thurs.
                          </label>                    
                          <label class="btn btn-info">
                            <input type="checkbox" value="F" name="day[]" autocomplete="off">Fri.
                          </label>
                        </div><br>
                    
                      <div class="form-group" style="float: left;width:350px">
                        <div class="label-column">
                             <label class="control-label" for="name-input-field">Subject:</label>
                          </div>
                          <div class="input-column" style="text-align:right; padding-right: 55px">
                            <select class="form-control" name = "sub[]" id = "">
                              <option>Select Subject</option>
                            <?php foreach ($subject as $subj) {?>
                              <option value="<?php echo $subj['SUBJ_NAME']?>" ><?php echo $subj['SUBJ_NAME']?></option>
                            <?php  
                               } 
                            ?>
                            </select>
                          </div>
                          <div class="label-column">
                             <label class="control-label" for="name-input-field">Teacher:</label>
                          </div>
                          <div class="input-column" style="text-align:right; padding-right: 55px">
                            <select class="form-control" name = "teach[]" id = "">
                              <option>Select Teacher</option>
                            <?php foreach ($teacher as $prof) {?>
                              <option value="<?php echo $prof['TEACHER_NAME']?>" ><?php echo $prof['TEACHER_NAME']?></option>
                            <?php  
                               } 
                            ?>
                            </select>
                          </div>
                          <div class="label-column">
                            <label class="control-label" for="name-input-field">Section:</label>
                          </div>
                          <div class="input-column" style="text-align:right; padding-right: 55px">
                             <select class="form-control" name = "sec" id = "">
                                  <option>Select Section</option>
                                  <?php
                                  $sec_count=0;
                                  foreach ($section as $sec) { ?>
                                    <option value="<?php echo $sec_count." ".$sec['SECTION_ID']?>" ><?php echo $sec['SECTION_NAME']?></option>
                                  <?php
                                    $sec_count++;
                                  } 
                                  ?>  
                              </select>
                          </div>
                          <div class="label-column">
                             <label class="control-label" for="name-input-field">Start Time:</label>
                          </div>
                          <div class="input-column" style="text-align:right; padding-right: 55px">
                             <input name="time_s" class="form-control" type="time" required>
                          </div> 
                          <div class="label-column">
                             <label class="control-label" for="name-input-field">End Time:</label>
                          </div>
                          <div class="input-column" style="text-align:right; padding-right: 55px">
                             <input name="time_e" class="form-control" type="time" required>
                          </div> 
                      </div><br>
                      <div class="form-group" style="float: right;width: 450px;">
                        <table style="text-align: center;">
                          <tr>
                            <th colspan="3" style="text-align: center;background-color:#a1bbff;width: 550px;color: #fff;border-bottom:solid;"><h3>Teacher's Information</h3></th>
                          </tr>
                          <tr style="border-bottom:solid;border-color: #fff;">
                            <th style="text-align: center; background-color:#d4e0ff;"><h4>Major</h4></th>
                            <th style="text-align: center; background-color:#d4e0ff;"><h4>Minor</h4></th> 
                            <th style="text-align: center; background-color:#d4e0ff;"><h4>Related</h4></th>
                          </tr>
                          </table>
                          <div style="overflow-y: scroll;height: 200px; text-align: center;">
                          <center>
                          <table style="padding: 17px">
                          <tr style="background-color:#f5f5f5; ">
                            <td>
                            <input type="checkbox">&nbsp;&nbsp;Jules Ballaran&nbsp;&nbsp;&nbsp;</td>
                            <td>
                            <input type="checkbox">&nbsp;&nbsp;Noel Layante&nbsp;&nbsp;&nbsp;</td> 
                            <td>
                            <input type="checkbox">&nbsp;&nbsp;Jomar Bandol&nbsp;&nbsp;&nbsp;</td>
                          </tr>
                          <tr>
                            <td>
                            <input type="checkbox"> Jules Ballaran</td>
                            <td>
                            <input type="checkbox"> Noel Layante</td> 
                            <td>
                            <input type="checkbox"> Jomar Bandol</td>
                          </tr>
                          <tr style="background-color:#f5f5f5; ">
                            <td>
                            <input type="checkbox"> Jules Ballaran</td>
                            <td>
                            <input type="checkbox"> Noel Layante</td> 
                            <td>
                            <input type="checkbox"> Jomar Bandol</td>
                          </tr>
                          <tr>
                            <td>
                            <input type="checkbox"> Jules Ballaran</td>
                            <td>
                            <input type="checkbox"> Noel Layante</td> 
                            <td>
                            <input type="checkbox"> Jomar Bandol</td>
                          </tr>
                          <tr style="background-color:#f5f5f5; ">
                            <td>
                            <input type="checkbox"> Jules Ballaran</td>
                            <td>
                            <input type="checkbox"> Noel Layante</td> 
                            <td>
                            <input type="checkbox"> Jomar Bandol</td>
                          </tr>
                          <tr>
                            <td>
                            <input type="checkbox"> Jules Ballaran</td>
                            <td>
                            <input type="checkbox"> Noel Layante</td> 
                            <td>
                            <input type="checkbox"> Jomar Bandol</td>
                          </tr>
                          <tr style="background-color:#f5f5f5;">
                            <td>
                            <input type="checkbox"> Jules Ballaran</td>
                            <td>
                            <input type="checkbox"> Noel Layante</td> 
                            <td>
                            <input type="checkbox"> Jomar Bandol</td>
                          </tr>
                          <tr style="background-color:#f5f5f5;">
                            <td>
                            <input type="checkbox"> Jules Ballaran</td>
                            <td>
                            <input type="checkbox"> Noel Layante</td> 
                            <td>
                            <input type="checkbox"> Jomar Bandol</td>
                          </tr>
                          <tr style="background-color:#f5f5f5;">
                            <td>
                            <input type="checkbox"> Jules Ballaran</td>
                            <td>
                            <input type="checkbox"> Noel Layante</td> 
                            <td>
                            <input type="checkbox"> Jomar Bandol</td>
                          </tr>
                          <tr style="background-color:#f5f5f5;">
                            <td>
                            <input type="checkbox"> Jules Ballaran</td>
                            <td>
                            <input type="checkbox"> Noel Layante</td> 
                            <td>
                            <input type="checkbox"> Jomar Bandol</td>
                          </tr>
                          <tr style="background-color:#f5f5f5;">
                            <td>
                            <input type="checkbox"> Jules Ballaran</td>
                            <td>
                            <input type="checkbox"> Noel Layante</td> 
                            <td>
                            <input type="checkbox"> Jomar Bandol</td>
                          </tr>
                          <tr style="background-color:#f5f5f5;">
                            <td>
                            <input type="checkbox"> Jules Ballaran</td>
                            <td>
                            <input type="checkbox"> Noel Layante</td> 
                            <td>
                            <input type="checkbox"> Jomar Bandol</td>
                          </tr>
                          </table>
                        </center>
                      </div>
                    </div> 
                </div>
              </div>  
                          <center>
                          <div style="padding-bottom: 10px">
                            <button class="btn btn-primary btn-sm" name = "submit" type="submit">Save Edit
                            </button>
                          </div>                             
                          </center>
            </form>
    </div>
  </div><br>
</div><br>
<!-- MODAL IN CREATING SUBJECT (end) -->

<!-- MODAL IN EDITING SUBJECT (start)-->
<div class="modal fade" id="EModal" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="background-color:#eef3ff">
      <div class="modal-header modal-info" style="background-color:#3f90bd">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:#FFF"><b>Edit Subject Info</b></h4>
      </div>
      <div> 
           <br>
         
            <form class="form-horizontal custom-form">
              <div class="form-group">

                  <div class="col-md-10 col-md-offset-1">
                    <br>
                      <div>
                        <label class="control-label" for="name-input-field" style="padding-left: 105px">
                        Select Day: &nbsp;
                        </label>
                        <div class="btn-group" data-toggle="buttons">
                          <label class="btn btn-info active">
                            <input type="checkbox" checked autocomplete="off">Mon.
                          </label>
                          <label class="btn btn-info">
                            <input type="checkbox" autocomplete="off">Tues.
                          </label>
                          <label class="btn btn-info">
                            <input type="checkbox" autocomplete="off">Wed.
                          </label>
                          <label class="btn btn-info">
                            <input type="checkbox" autocomplete="off">Thurs.
                          </label>                    
                          <label class="btn btn-info">
                            <input type="checkbox" autocomplete="off">Fri.
                          </label>
                          <label class="btn btn-info">
                            <input type="checkbox" autocomplete="off">Sat.
                          </label>
                          <label class="btn btn-info">
                            <input type="checkbox" autocomplete="off">Sun.
                          </label>
                        </div>
                          <br> <br>

                        <div class="form-group" style="text-align:right">
                        <div class="col-sm-4 label-column">
                             <label class="control-label" for="name-input-field">Subject:</label>
                          </div>
                          <div class="col-sm-5 input-column" style="text-align:right">
                             <input name="" class="form-control" type="text" required placeholder="GET nalang sa previous suject">
                          </div>
                          <br> <br>
                          <div class="col-sm-4 label-column">
                             <label class="control-label" for="name-input-field">Adviser:</label>
                          </div>
                          <div class="col-sm-5 input-column" style="text-align:right">
                             <input name="" class="form-control" type="text" required placeholder="Name of Tearcher">
                          </div>
                          <br> <br>
                          <div class="col-sm-4 label-column">
                            <label class="control-label" for="name-input-field">Room #:</label>
                          </div>
                          <div class="col-sm-5 input-column" style="text-align:right">
                             <select class="form-control" name = "" id = "">
                                  <option>Select here</option>
                                  <option>101</option>
                                  <option>102</option>
                                  <option>103</option>
                                  <option>104</option>
                                  <option>105</option>
                                  <option>106</option>
                                  <option>107</option>  
                                </select>
                          </div> 
                          <br> <br>
                          <div class="col-sm-4 label-column">
                             <label class="control-label" for="name-input-field">Start Time:</label>
                          </div>
                          <div class="col-sm-5 input-column" style="text-align:right">
                             <input name="" class="form-control" type="time" required>
                          </div>
                          <br> <br>
                          <div class="col-sm-4 label-column">
                             <label class="control-label" for="name-input-field">End Time:</label>
                          </div>
                          <div class="col-sm-5 input-column" style="text-align:right">
                             <input name="" class="form-control" type="time" required>
                          </div>
                          <br> <br>
                          <center>
                            <button class="btn btn-primary btn-sm" name = "submit" type="submit">Save Edit
                            </button>
                          </center>
                        </div>
                      </div>
                  
                  </div>
              </div> 
            </form>
      </div>
    </div><br>
  </div><br>
</div>
<!-- MODAL IN EDITING SUBJECT (end) -->

<!-- MODAL IN Deleting SUBJECT (start)-->
<div class="modal fade" id="DModal" role="dialog">
   <div class="modal-dialog modal-lsm">
     <div class="modal-content">
       <div class="modal-header modal-info" style="background-color:#3f90bd">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:#FFF"><b>Delete Subject</b></h4>
       </div>
       <div> 
           <br>
         
            <form class="form-horizontal custom-form">
              <div class="form-group">

    
                  <div class="col-md-10 col-md-offset-1" style="background-color: #e3ebff">
                  <div>
                    <div class="panel" style="background-color:#7392e0 ">
                      <div class="panel-heading">
                        <h3 class="panel-title" style="color:#FFF"><b>Select Subject to Delete</b></h3>
                      </div>
                    </div> 
                  </div>
                  

                <div class="form-group" style="text-align:right">
                    <div class="col-sm-4 label-column">
                       <label class="control-label" for="name-input-field">Start Time:</label>
                    </div>
                    <div class="col-sm-5 input-column" style="text-align:right">
                       <input name="prodName" class="form-control" type="time">
                    </div>
                          <br> <br>
                    <div class="col-sm-4 label-column">
                       <label class="control-label" for="name-input-field">End Time:</label>
                    </div>
                    <div class="col-sm-5 input-column" style="text-align:right">
                       <input name="prodName" class="form-control" type="time">
                    </div>
                          <br> <br>
                    <div class="col-sm-4 label-column">
                       <label class="control-label" for="name-input-field">Type:</label>
                    </div>
                    <div class="col-sm-5 input-column" style="text-align:right">
                       <input name="prodName" class="form-control" type="text" required placeholder="Lab/Lecture">
                    </div>
                          <br> <br>
                    <div class="col-sm-4 label-column">
                       <label class="control-label" for="name-input-field">Tearcher's Name:</label>
                    </div>
                    <div class="col-sm-5 input-column" style="text-align:right">
                       <input name="prodName" class="form-control" type="text" required placeholder="Name of Tearcher">
                    </div>

                </div>

                </div></div>
                 <br>
              </form></div>
            </div>
          <br>
     </div>
    <br>
</div>
<!-- MODAL IN Deleting SUBJECT (end) -->
 
 <!-- Tables -->   
                           <!-- buttons sa taas ng tables (start) -->
                           <div id="button_bars">
                           <a  href="save_process.php"> 
                            <button class="a btn btn-sm  btn-success" style="margin-right:5px; margin-top:5px">
                              <i class="fa fa-check"> Save</i>
                            </button>
                            </a>
                            <button class="a btn btn-sm btn-danger" type="button" data-toggle="modal" data-target="#DModal" style="margin-right:5px; margin-top:5px">
                              <i class="fa fa-plus"> Delete</i>
                            </button>
                            <button class="a btn btn-sm btn-info" type="button" data-toggle="modal" data-target="#EModal" style="margin-right:5px; margin-top:5px">
                              <i class="fa fa-plus"> Edit</i>
                            </button>
                            <button class="a btn btn-sm btn-warning" type="button" data-toggle="modal" data-target="#CModal" style="margin-right:5px; margin-top:5px">
                              <i class="fa fa-plus"> Create</i>
                            </button>
                            <!-- buttons sa taas ng tables (end) -->
                          </div>
                        </ul>
            <div class="" style="padding-top:15px; padding-bottom:25px;">

                       <!-- Selecting sections (start) -->
                       <div class="dropdown">
                        <button class="dropbtn">
                            <a href="#" style="color:#000;">Select Section<b class="caret"></b></a>
                        </button>
                            <div style="overflow-y:scroll; height:150px; width:170px" class="dropdown-content"> 
                              <a data-toggle="tab" href="#men">STEC</a>
                              <a data-toggle="tab" href="#men1">SPA</a>
                              <a data-toggle="tab" href="#men2">Artistry</a>  
                              <a data-toggle="tab" href="#men3">Benevolence</a>
                              <a data-toggle="tab" href="#men4">Chastity</a>
                              <a data-toggle="tab" href="#men5">Effectiveness</a>
                              <a data-toggle="tab" href="#men6">Fidelity</a>
                              <a data-toggle="tab" href="#men7">Generosity</a>
                              <a data-toggle="tab" href="#men8">Humility</a>
                              <a data-toggle="tab" href="#men9">Integrity</a>
                              <a data-toggle="tab" href="#men10">Justice</a>
                              <a data-toggle="tab" href="#men11">Knowledge</a> 
                            </div> 
                        </div> 
                        <!-- Selecting sections (end) -->
               
                    <!-- section title (start) -->
 <!-- Tables -->  

                        <ul class="nav nav-tabs" style="padding-top:25px;">
                          <li class="active"><a data-toggle="tab" href="#home">Grade 7</a></li>
                          <li><a data-toggle="tab" href="#menu1">Grade 8</a></li>
                          <li><a data-toggle="tab" href="#menu2">Grade 9</a></li>
                          <li><a data-toggle="tab" href="#menu3">Grade 10</a></li> 
                        </ul>
 

                  <center>
                    <div style="padding-top:15px; padding-bottom:25px;">
                      <table class="table">


                        <thead>
                          <tr class="headings">
                            <th class="column-title" style="text-align: center;font-size:13px">Time </th>
                            <th rowspan="2" class="column-title" style="padding-bottom:20px;">6:30-7:20</th>
                            <th rowspan="2" class="column-title" style="padding-bottom:20px;">7:20-8:10</th>
                            <th rowspan="2" class="column-title" style="padding-bottom:20px;">8:10-9:00</th>
                            <th rowspan="2" class="column-title" style="padding-bottom:20px;">9:10-10:00</th>
                            <th rowspan="2" class="column-title" style="padding-bottom:20px;">10:00-10:50</th>
                            <th rowspan="2" class="column-title" style="padding-bottom:20px;">10:50-11:40</th>
                            <th rowspan="2" class="column-title" style="padding-bottom:20px;">11:40-12:30</th> 
                          </tr>
                        
                            <tr>
                              <th class="time col-md-1 " style="font-size:13px; text-align:center; padding-top:10px">Room # & Section</th> 
                            </tr>
                        </thead>
 



                        <tbody style="text-align: center; font-size: 15px">
                          <?php 
                          $sec7 = mysqli_query($conn, "SELECT * FROM section WHERE YEAR_LEVEL=7");
                          $x = 0;
                          foreach($sec7 as $sec_name) {
                          ?>
                          <td class="time" style="padding-top: 25px;"><?php echo $sec_name['SECTION_NAME'];?>
                          <div class="form-group">
                                <center>
                                  <div class="input-column" style="width:75px; text-align:center">
                                     <select class="form-control" name = "prodCategory" id = "prodCategory">
                                          <option> &nbsp;&nbsp;&nbsp;# &nbsp;&nbsp;</option>
                                          <option>101</option>
                                          <option>102</option>
                                          <option>103</option>
                                          <option>104</option>
                                          <option>105</option>
                                          <option>106</option>
                                          <option>107</option>  
                                     </select>
                                  </div>
                                </center>
                              </div>
                            </td>
                            <?php
                            for($y=0; $y<7; $y++){?>
                            <td class="" style="padding-bottom:none">
                              
                              <div class="form-group">
                                <div class="search-box">         
                                <input type="text" value="<?php 
                                if(!empty($subject_p[$x][$y])){
                                  echo $subject_p[$x][$y];
                                }
                                else{
                                  echo "";
                                }
                                ?>" readonly="true" autocomplete="off" class="form-control" name="regName" required = "required"/>  
                                <div class="result"></div>  
                              </div>
                              </div>
                              
                              <div class="search-box">          
                                <input type="text" value="<?php
                                if(!empty($teacher_p[$x][$y])){
                                  echo $teacher_p[$x][$y];
                                }
                                else{
                                  echo "";
                                }
                                ?>" readonly="true" autocomplete="off" class="form-control" name="regName" required = "required"/>  
                                <div class="result"></div>  
                              </div>
                            </td>
                            <?php }?>
                          </tr>
                          <?php $x++; }?>
                        </tbody>
                      </table>
                    </div>
                  </center>

 

 <!-- Tables -->   

    
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../Template%20(reference)/vendor/jquery/jquery-3.0.0.min.js"></script>
<script src="../js/sidebar-menu.js"></script>
<script src="../js/sideNav.js"></script>
<script>
$.sidebarMenu($('.sidebar-menu'))
</script>
    
<!-- Footer -->

</body>

</html>
