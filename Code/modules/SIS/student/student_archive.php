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
</head>

<body>

<nav class="navbar-fixed-top w3-theme-bd5 w3-card-4" style="background-color:rgba(42,101,149,0.95)!important" role="navigation">
<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed fa fa-bars hidden-sm hidden-md hidden-lg" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
      </button>
      <a class="navbar-brand w3-card-4" href="../index.php"><img src="../docs/img/pnhs_logo.png" width="75px" height="75px"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <hr class="hidden-sm hidden-md hidden-lg" style="height:10px; border:0">

      <ul class="nav navbar-nav navbar-right">
        <li><a href="student_list(new).php">Student List</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Manage Account <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#"><i class="fa fa-user fa-fw"></i> Admin Profile</a></li>
              <li class="divider"></li>
              <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
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

<div class="panel-body" style="max-width:100%; height:100%; margin-top:50px">
    <ul class="nav nav-tabs nav-justified">
        <li class="active"><a href="#Graduated" data-toggle="tab"><h5>Graduated</h5></a></li>
        <li><a href="#Transferred" data-toggle="tab"><h5>Transferred</h5></a></li>
        <li><a href="#Dropped" data-toggle="tab"><h5>Dropped</h5></a></li>
    </ul>
    
    <div class="tab-content">
        <div class="tab-pane fade in active" id="Graduated">
                <div class="table-responsive">
                    <div class="container">
                        <h1 class="page-header w3-center">Graduated</h1>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default w3-card-4">
                             
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example1">
                                            <thead class="w3-theme-bl1">
                                                <tr>
                                                    <th>LRN</th>
                                                    <th>Lastname</th>
                                                    <th>Firstname</th>
                                                    <th>Middle Name</th>
                                                    <th>Date Graduated</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                
                                                    <td><a href="../pages/student_pi.html">01421</a></td>
                                                    <td>Guim</td>
                                                    <td>Emmanuel</td>
                                                    <td>Candia</td>
                                                    <td>Senior</td>

                
                                                </tr>
                                                <tr>
                
                                                    <td>03831</td>
                                                    <td>Luces</td>
                                                    <td>Karen Mae</td>
                                                    <td>Dioneda</td>
                                                    <td>Senior</td>

                
                                                </tr>
                                                <tr>
                
                                                    <td>09123</td>
                                                    <td>Lagonoy</td>
                                                    <td>Precy Ann</td>
                                                    <td>Petallo</td>
                                                    <td>Senior</td>

                
                                                </tr>
                                                <tr>
                
                                                    <td>05532</td>
                                                    <td>Atanacio</td>
                                                    <td>Marie Antonete</td>
                                                    <td>Estares</td>
                                                    <td>Senior</td>

                
                                                </tr>
                                                <tr>
                
                                                    <td>03333</td>
                                                    <td>Policarpio</td>
                                                    <td>Giselle</td>
                                                    <td>Lunas</td>
                                                    <td>Senior</td>

                
                                                </tr>
                                                <tr>
                
                                                    <td>04412</td>
                                                    <td>Pan</td>
                                                    <td>Rose Angela</td>
                                                    <td>Espinocilla</td>
                                                    <td>Senior</td>

                                                </tr>
                                            </tbody>
                                        </table>
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
                </div>
            </div>
        <div class="tab-pane fade in" id="Transferred">
                <div class="table-responsive">
                    <div class="container">
                        <h1 class="page-header w3-center">Transferred</h1>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default w3-card-4">
                             
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example2">
                                            <thead class="w3-theme-bl1">
                                                <tr>
                                                    <th>LRN</th>
                                                    <th>Lastname</th>
                                                    <th>Firstname</th>
                                                    <th>Middle Name</th>
                                                    <th>Date Transferred</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                
                                                    <td><a href="../pages/student_pi.html">01421</a></td>
                                                    <td>Guim</td>
                                                    <td>Emmanuel</td>
                                                    <td>Candia</td>
                                                    <td>Senior</td>

                
                                                </tr>
                                                <tr>
                
                                                    <td>03831</td>
                                                    <td>Luces</td>
                                                    <td>Karen Mae</td>
                                                    <td>Dioneda</td>
                                                    <td>Senior</td>

                
                                                </tr>
                                                <tr>
                
                                                    <td>09123</td>
                                                    <td>Lagonoy</td>
                                                    <td>Precy Ann</td>
                                                    <td>Petallo</td>
                                                    <td>Senior</td>

                
                                                </tr>
                                                <tr>
                
                                                    <td>05532</td>
                                                    <td>Atanacio</td>
                                                    <td>Marie Antonete</td>
                                                    <td>Estares</td>
                                                    <td>Senior</td>

                
                                                </tr>
                                                <tr>
                
                                                    <td>03333</td>
                                                    <td>Policarpio</td>
                                                    <td>Giselle</td>
                                                    <td>Lunas</td>
                                                    <td>Senior</td>

                
                                                </tr>
                                                <tr>
                
                                                    <td>04412</td>
                                                    <td>Pan</td>
                                                    <td>Rose Angela</td>
                                                    <td>Espinocilla</td>
                                                    <td>Senior</td>

                                                </tr>
                                            </tbody>
                                        </table>
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
                </div>
            </div>
        <div class="tab-pane fade in" id="Dropped">
                <div class="table-responsive">
                    <div class="container">
                        <h1 class="page-header w3-center">Dropped</h1>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default w3-card-4">
                             
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example3">
                                            <thead class="w3-theme-bl1">
                                                <tr>
                                                    <th>LRN</th>
                                                    <th>Lastname</th>
                                                    <th>Firstname</th>
                                                    <th>Middle Name</th>
                                                    <th>Date Dropped</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                
                                                    <td><a href="../pages/student_pi.html">01421</a></td>
                                                    <td>Guim</td>
                                                    <td>Emmanuel</td>
                                                    <td>Candia</td>
                                                    <td>Senior</td>

                
                                                </tr>
                                                <tr>
                
                                                    <td>03831</td>
                                                    <td>Luces</td>
                                                    <td>Karen Mae</td>
                                                    <td>Dioneda</td>
                                                    <td>Senior</td>

                
                                                </tr>
                                                <tr>
                
                                                    <td>09123</td>
                                                    <td>Lagonoy</td>
                                                    <td>Precy Ann</td>
                                                    <td>Petallo</td>
                                                    <td>Senior</td>

                
                                                </tr>
                                                <tr>
                
                                                    <td>05532</td>
                                                    <td>Atanacio</td>
                                                    <td>Marie Antonete</td>
                                                    <td>Estares</td>
                                                    <td>Senior</td>

                
                                                </tr>
                                                <tr>
                
                                                    <td>03333</td>
                                                    <td>Policarpio</td>
                                                    <td>Giselle</td>
                                                    <td>Lunas</td>
                                                    <td>Senior</td>

                
                                                </tr>
                                                <tr>
                
                                                    <td>04412</td>
                                                    <td>Pan</td>
                                                    <td>Rose Angela</td>
                                                    <td>Espinocilla</td>
                                                    <td>Senior</td>
                                                </tr>
                                            </tbody>
                                        </table>
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
                </div>
            </div>
        </div>
    </div>
    

<!-- Add Student(s) button Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <center><h4 class="modal-title" id="myModalLabel">Add Student(s)</h4></center>
      </div>
      <div class="modal-body">
            <div class="row"><center>
                <div class="col-lg-6">
                    <div class="btn w3-card-4 w3-theme-bd3 w3-hover-blue w3-xlarge" style="width:175px;margin:50px" alt="Add Single Student">
                        <i class="fa fa-user fa-5x"></i>
                    <p class="w3-medium">Add Single Student</p>
                    </div><br>
                </div>
                
                <div class="col-lg-6">
                    <div class="btn w3-card-4 w3-theme-bd3 w3-hover-blue w3-xlarge" style="width:175px;margin:50px" alt="Add Single Student">
                        <i class="fa fa-users fa-5x"></i>
                    <p class="w3-medium">Add Multiple Students</p>
                    </div>
                </div></center>
            </div>
      </div>
      <div class="modal-footer"><center>
        <button type="button" class="btn w3-hover-red w3-theme-rl1 w3-card-2" data-dismiss="modal">Close</button></center>
      </div>
    </div>
  </div>
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
    $('#dataTables-example1').DataTable({
        responsive: true
    });
});
$(document).ready(function() {
    $('#dataTables-example2').DataTable({
        responsive: true
    });
});
$(document).ready(function() {
    $('#dataTables-example3').DataTable({
        responsive: true
    });
});
</script>
</div>
    
<!-- Footer -->
<footer class="container-fluid w3-theme-bd5" style="padding-top:10px;padding-bottom:20px;margin-top:10px">
    <div class="row">
        <div class="col-lg-4 col-md-4 w3-left">
            <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PANAHAS</h2>
            <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alrights Reserved &copy; 2017</h6>
        </div>
        <div class="col-lg-4 col-md-4 w3-right">
            <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contact Us:</h5>
            <a href="https://www.google.com.ph/maps/place/PAG+-+ASA+NATIONAL+HIGH+SCHOOL/@13.1722934,123.7471617,814m/data=!3m1!1e3!4m5!3m4!1s0x0:0x6e7c0afd46903d6b!8m2!3d13.1721411!4d123.7476692" target="_blank"><i class="fa fa-bullseye w3-xlarge"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="#"><i class="fa fa-phone w3-xlarge"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="https://facebook.com/Pag-Asa-national-highschool-2017-2018-1382788765144849/?refid=46&sld=eyJzZWFyY2hfc2lkIjoiYTY5MjUzNjBjN2IwYzRjMWIyYzEyYmI4YzQ0YTFjYTgiLCJxdWVyeSI6InBhZy1hc2EgbmF0aW9uYWwgaGlnaHNjaG9vbCIsInNlYXJjaF90eXBlIjoiU2VhcmNoIiwic2VxdWVuY2VfaWQiOjM1NjU4MjQ1MCwicGFnZV9udW1iZXIiOjEsImZpbHRlcl90eXBlIjoiU2VhcmNoIiwiZW50X2lkIjoxMzgyNzg4NzY1MTQ0ODQ5LCJwb3NpdGlvbiI6MiwicmVzdWx0X3R5cGUiOjI3NH0%3D" target="_blank"><i class="fa fa-facebook w3-xlarge"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="#"><i class="fa fa-twitter w3-xlarge"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="#"><i class="fa fa-google-plus w3-xlarge"></i></a>
        </div>
    </div>
</footer>

</body>

</html>
