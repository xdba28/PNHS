<?php
include_once('../DB Con.php');
session_start();

if(isset($_SESSION['user_data']['acct']['cms_username']) && isset($_SESSION['user_data']['acct']['cms_password']) && $_SESSION['user_data']['acct']['cms_account_type']=='user')
{
	$_SESSION['user_data']['acct']['cms_account_ID'];
	$_SESSION['user_data']['acct']['cms_account_type'];
}
else
{
	header('Location: ../login.php');
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
.btn-bs-file{
    position:relative;
}
.btn-bs-file input[type="file"]{
    position: absolute;
    top: -9999999;
    filter: alpha(opacity=0);
    opacity: 0;
    width:0;
    height:0;
    outline: none;
    cursor: inherit;
}
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

<a id="back-to-top" href="#" class="w3-circle w3-card-4" alt="Return to Top" data-toggle="tooltip" data-placement="left">
    <span class="glyphicon glyphicon-chevron-up"></span>
</a>
    
    <div class="container">
        <h1 class="page-header w3-center">Student List</h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default w3-card-4">
             
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <center>
                            <div class="w3-button w3-circle w3-card-4 w3-green" style="height:50px;width:50px;padding:12px" data-toggle="modal" data-target="#myModal3">
                                <i class="fa fa-upload fa-2x"> &nbsp;&nbsp;</i>
                            </div><br>
                                <h5>Upload Grade</h5>
                            </center>
                            <thead class="w3-theme-bl1">
                                <tr>
                                    <th>LRN</th>
                                    <th>Lastname</th>
                                    <th>Firstname</th>
                                    <th>Middlename</th>
                                    <th>Status</th>
                                    <th>Grade Level & Section</th>
                                    <th>School Year</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                <?php
                            $get_student = mysql_query("SELECT lrn, stu_fname, stu_status, stu_lname, stu_mname FROM sis_student WHERE stu_status = 'Enrolled'")
                                                        or die("Error: get_student: " .mysql_error());

                                    while($row = mysql_fetch_array($get_student))
                                    {
                                                $lrn = $row['lrn'];
                                                $lname = $row['stu_lname'];
                                                $fname = $row['stu_fname'];
                                                $mname = $row['stu_mname'];
                                                echo
                                                '<tr>
                                                    <td>' . $lrn  . '</td>
                                                    <td>' . $row['stu_lname'] . '</td>
                                                    <td>' . $row['stu_fname'] . '</td>
                                                    <td>' . $row['stu_mname'] . '</td>
                                                    <td>' . $row['stu_status'] . '</td>';

                                            
                                            $get_section = mysql_query("SELECT YEAR_LEVEL, SECTION_NAME, year FROM sis_stu_rec, css_section, css_school_yr
                                                        WHERE sis_stu_rec.section_id = css_section.SECTION_ID
                                                        AND sis_stu_rec.sy_id = css_school_yr.sy_id
                                                        AND lrn = $lrn")
                                                    or die("Error: get_section: ".mysqlerror());

                                            while($row = mysql_fetch_array($get_section))
                                            {
                                                echo
                                                    '<td>'. $row['YEAR_LEVEL'] . " - " . $row['SECTION_NAME'] . '</td>
                                                    <td>' . $row['year'] . '</td>'; 
                                            }//get_section while end
                                        
                            ?>

                            <td><center>
                            <a href="stu/student_pi.php?lrn=<?php echo $lrn;?>">
                            <button class="w3-card-4 w3-theme-bl1 w3-hover-blue w3-xsmall" style="border:0;margin-left:10px">
                            <i class="fa fa-eye" Title="View"></i>
                            </button>
                            </a>
                            </center>                 

                               
              
                    <?php
                    }
                    ?>
                            
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
    
<!-- Excel button Modal -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <center><h4 class="modal-title" id="myModalLabel">Upload Grade</h4></center>
      </div>
      <div class="modal-body">
        <center>
        <label class="btn-bs-file">
            <form action="grade_excel_val.php" method="post" enctype="multipart/form-data">
                <div class="btn w3-card-4 w3-theme-bd3 w3-hover-blue w3-xlarge" style="width:175px;margin:50px">
                    <i class="fa fa-paperclip fa-5x"></i>
                    <p class="w3-medium">Select File<input type="file" name="sample" id="sample"></p>
                </div>
        </label>
        </center>
      </div>
        
      <div class="modal-footer">
          <center><button type="submit" class="btn w3-hover-green btn-success w3-card-2">Submit</button></center>
      </div>
      </form>

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
    $('#dataTables-example').DataTable({
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
            <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alright Reserved &copy; 2017</h6>
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
