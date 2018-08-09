<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Form(Edit)</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
    </style>
</head>

<body>

<div id="wrapper">

<!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed fa fa-bars hidden-sm hidden-md hidden-lg" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            </button>
            <a class="navbar-brand" href="index.html">ADMIN</a>
        </div>
        <!-- /.navbar-header -->
        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-messages">
                    <li>
                        <a href="#">
                            <div>
                                <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                            </div>
                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <strong>John Smith</strong>
                                <span class="pull-right text-muted">
                                    <em>Yesterday</em>
                                </span>
                            </div>
                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>Read All Messages</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                        <!-- /.dropdown-messages -->
            </li>
            <!-- /.dropdown -->

                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-comment fa-fw"></i> New Comment
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                        <span class="pull-right text-muted small">12 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i> Message Sent
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-tasks fa-fw"></i> New Task
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="#">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- /.dropdown-alerts -->
                    </li>
                    <!-- /.dropdown -->
                     <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                                </div>
                                <!-- /input-group -->
                            </li>
                            <li>
                                <a href="index.php"><i class="fa fa-home fa-fw"></i> Home</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Rating<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="MasterForm.html">Master Teacher</a>
                                    </li>
                                    <li>
                                        <a href="TeacherForm.php">Teacher I-III</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms<span class="fa arrow"></span></a>
                             <ul class="nav nav-second-level">
                                    <li>
                                        <a href="RatingMT.php">Master Teacher</a>
                                    </li>
                                    <li>
                                        <a href="TeacherForm.php">Teacher I-III</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="#">Second Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Second Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level <span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="#">Third Level Item</a>
                                            </li>
                                            <li>
                                                <a href="#">Third Level Item</a>
                                            </li>
                                            <li>
                                                <a href="#">Third Level Item</a>
                                            </li>
                                            <li>
                                                <a href="#">Third Level Item</a>
                                            </li>
                                        </ul>
                                        <!-- /.nav-third-level -->
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                                               </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Teaching Form</h1>
              </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <br>
<br> <br> 
    
<form>
  <fieldset>
         <div align="center">
             <strong>Department of Education<br></strong>
             Region V(Bicol)<br> 
             Schools Division of Legaspi City <br> 
             <strong>PAG-ASA NATIONAL HIGH SCHOOL</strong><br> 
             Rawis, Legaspi City<br>
       </div>

      <h5><center><img src="panahas/htdocs/docs/img/leg.png" width="70px" height="70px"> &nbsp; &nbsp; &nbsp;<strong> &nbsp;INDIVIDUAL PERFORMANCE COMMITMENT AND REVIEW FORM</strong> &nbsp; &nbsp; &nbsp; &nbsp;<img src="./docs/img/pnhs_logo.PNG" width="70px" height="70px">
          </center>
      </h5>
        <tr>
            <td width="50%">
                <p><br>
                </p>
        </td>
 
    <td width="20%"><table width="100%" border="0" cellspacing="10">
      <tr>
        <td width="63%">Name of Employee:&nbsp;   
          <input type="text" name="name2" /></td>
            <td width="37%">Name of Rater:&nbsp;
              <input type="text" name="shortdesc2" /></td>
      </tr>
      <tr>
        <td>Position: &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            <input type="text" name="position" /></td>
        <td>Position:&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
            <input type="text" name="shortdesc3" /></td>
      </tr>
      <tr>
        <td>Rating Period:&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text" name="rating period" /></td>
        <td>Date of Review:
          <input type="text" name="shortdesc4" /></td>
      </tr>
      <tr>
        <td height="25">School/District:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text" name="rating period2" /></td>
        <td>&nbsp;</td>
      </tr>
    </table>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    <table width="100%" height="1423" border="1"> 
      <tr>
        <td width="12%" rowspan="2"><div align="center">MFO's</div></td>
        <td width="10%" rowspan="2"><div align="center">KRA's</div></td>
        <td width="13%" rowspan="2"><div align="center">OBJECTIVES</div></td>
        <td width="7%" rowspan="2"><div align="center">Timeline</div></td>
        <td width="7%" rowspan="2"><div align="center">Weight per KRA</div></td>
        <td width="25%" rowspan="2"><p align="center">PERFORMANCE INDICATOR</p>
          <p align="center">(Quality, Efficiency, Timeliness)</p></td>
        <td height="45" colspan="4"><div align="center">ACTUAL RESULTS</div></td>
      </tr>
      <tr>
        <td width="6%" height="37"><div align="center">Q</div></td>
        <td width="6%"><div align="center">E</div></td>
        <td width="6%"><div align="center">T</div></td>
        <td width="7%"><div align="center">Ave.</div></td>
      </tr>
      <tr>
        <td height="424">Basic Education Services (Delivery)</td>
        <td>Curriculum Delivery</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>
          <p>5-5 of the action steps/activities were done and met with valid MOV's.</p>
          <p>4-4 of the action steps/activities were done and met with valid MOV's.</p>
          <p>3-3 of the action steps/activities were done and met with valid MOV's.</p>
          <p>2-2 of the action steps/activities were done and met with valid MOV's.</p>
          <p>1-1 of the action steps/activities were done and met with valid MOV's.</p></td>
        <td><p class="style3">
        <center>
            <input type="radio" name="size" id="size_1" value="small"> 5</p>
          <p class="style3">
            <input type="radio" name="size" id="size_2" value="medium"> 4</p>
          <p class="style3">
            <input type="radio" name="size" id="size_3" value="large"> 3</p>
          <p class="style3">
            <input type="radio" name="size" id="size_4" value="large">
            2          </p>
          <span class="style3">
          <input type="radio" name="size" id="size_5" value="large">
          1
          </span>
          <span class="style3">
          <label for="size_3"></label>
          </span>
        </center>    
          <label for="size_3"></label></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td></td>
      </tr>
      <tr>
        <td height="523"><p>Improved</p>
          <p>PL/MPS in written/ performance based evaluation</p></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><p>5- Has spent 180-days non-negotiable contact time with students without tardiness in reporting to school and the class</p>
          <p>4- Has spent 180-day non-negotiable contact tiime with students with 1-2 instances of tardiness</p>
          <p>3- Has spent 180-day non-negotiable contact tiime with students with 5-6 instances of tardiness</p>
          <p>2- Has spent 180-day non-negotiable contact tiime with students with 5-6 instances of tardiness</p>
          <p>1- Has spent 180-day non-negotiable contact tiime with students with 7 or more instances of tardiness</p></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </table>
    <p>&nbsp;</p></td>
  
</tr>
<!-- /.panel-heading -->
    <div align="center"><BR>
        <table width="85%" border="0">
            <tr>
             <td width="32%">
               <div align="center">
                <input type="text" name="name" />
                   <br>Ratee
               </div>
             </td>
             <td width="39%">
                <div align="center">
                 <input type="text" name="name" />
                    <br>Rater
                </div>
             </td>
             <td width="29%">
                <div align="center">
                 <input type="text" name="name" />
                    <br>Approving Autority
                </div>
             </td>
            </tr>
          </table>
     </div>
  </fieldset>
</form>
   </form>
<p>
    <h5><button type="button" class="btn btn-primary"
        <a href="forms.php"><i class="fa fa-print fa-fw"></i> P R I N T</a>    
    </h5>
</p>                            

      </div>
                </div>
                <!-- /.col-lg-4 -->
        
    
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>