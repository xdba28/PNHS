<?php
session_start();
include("../db_con_i.php");
include("../func.php");
include("../session.php");


$get_student = $mysqli->query("SELECT * FROM sis_student WHERE lrn = $lrn")
                        or die("Error: ".$mysql->error);

while($row = $get_student->fetch_array())
{

$bday = $row['sis_b_day'];

$cur_year = date('Y');
$cur_month = date('m');
$cur_day = date('d');

$bdate = explode("-", $bday);

$year = $cur_year - $bdate[0];

if($cur_month==$bdate[1])
{
	if($cur_day==$bdate[2])
	{
        $year++;
	}
	else if($cur_day > $bdate[2])
	{

	}
	else
	{
		$year--;
	}
}
else if($cur_month < $bdate[1])
{
	$year--;
}
else if($cur_month > $bday[1])
{

}

$month = date('F', mktime(0, 0, 0, $bdate[1]));

if(isset($row['trnsf_in_date']))
{
    $trnsf = $row['trnsf_in_date'];
    $trnsf_ex = explode("-", $trnsf);
	$trnsf_month = date('F', mktime(0, 0, 0, $trnsf_ex[1]));
}


$get_section = $mysqli->query("SELECT css_section.SECTION_NAME AS section, css_section.YEAR_LEVEL AS lvl, css_section.SECTION_ID AS id
        FROM sis_stu_rec, css_section
        WHERE sis_stu_rec.section_id = css_section.SECTION_ID
        AND sis_stu_rec.lrn = $lrn")
        or die("Error get_section: " . $mysqli->error);

$section = $get_section->fetch_assoc();
$sec =  $section['section'];
$yr_lvl = $section['lvl'];
$sec_id = $section['id'];

$print_f137 = $mysqli->query("SELECT stu_lname, stu_fname, stu_mname, SECTION_NAME, YEAR_LEVEL
                            FROM sis_student, sis_stu_rec, css_section
                            WHERE sis_student.lrn = sis_stu_rec.lrn
                            AND sis_stu_rec.section_id = css_section.SECTION_ID
                            AND sis_student.lrn = $lrn")
                    or die("Error print_f137: " . $mysqli->error);

    $res = $print_f137->fetch_assoc();
    $lname = $res['stu_lname'];
    $mname = $res['stu_mname'];
    $fname = $res['stu_fname'];
    $sec_name = $res['SECTION_NAME'];
    $lvl = $res['YEAR_LEVEL'];    

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
	<!-- new design-->

	<meta charset="UTF-8">
	<title>PAG-ASA National High School</title>
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css1/style.css">

    <!-- DataTables CSS -->
    <link href="../Template%20(reference)/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../Template%20(reference)/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="../Template%20(reference)/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    
    <!-- Custom Fonts -->
    <link href="../Template%20(reference)/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!--Include your modified CSS below as needed-->
    <link rel="stylesheet" href="../css/w3/blue.css">
    <link rel="stylesheet" href="../css/w3/yellow.css">
    <link rel="stylesheet" href="../css/w3/red.css">
    <link rel="stylesheet" href="../css/w3/w3.css">
    <link rel="stylesheet" href="../css/backToTop.css">

    <!-- Browser's Tab Image -->
    <link rel="shortcut icon" href="../docs/pnhs_img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../docs/img/pnhs_favicon.ico" type="image/x-icon">


		<!-- new design-->
		
        <!-- MetisMenu CSS -->
        <!-- <link href="../Template%20(reference)/vendor/metisMenu/metisMenu.min.css" rel="stylesheet"> -->

        <!-- DataTables CSS -->
        <!-- <link href="../Template%20(reference)/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet"> -->

        <!-- DataTables Responsive CSS -->
        <!-- <link href="../Template%20(reference)/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet"> -->

        <!-- Custom Fonts -->
        <!-- <link href="../Template%20(reference)/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->

        <!--Include your modified CSS below as needed-->
        <!-- <link rel="stylesheet" href="../css/w3/blue.css">
        <link rel="stylesheet" href="../css/w3/yellow.css">
        <link rel="stylesheet" href="../css/w3/red.css">
        <link rel="stylesheet" href="../css/w3/w3.css">
        <link rel="stylesheet" href="../css/sideNav.css">
        <link rel="stylesheet" href="../css/backToTop.css"> -->

        <!-- Browser's Tab Image -->
        <!-- <link rel="shortcut icon" href="../docs/pnhs_img/favicon.ico" type="image/x-icon">
        <link rel="icon" href="../docs/img/pnhs_favicon.ico" type="image/x-icon"> -->

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script href="../Template%20(reference)/vendor/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script href="../Template%20(reference)/vendor/bootstrap/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    </head>
    <body>
		<?php include('../topnav.php');
			  include('../sidenav.php');?>
        <!-- <nav class="navbar-fixed-top w3-theme-bd5 w3-card-4" style="background-color:rgba(42,101,149,0.95)!important" role="navigation">
            <div class="container"> -->
                <!-- Brand and toggle get grouped for better mobile display -->
                <!-- <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed fa fa-bars hidden-sm hidden-md hidden-lg" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                        aria-expanded="false">
                    </button>
                    <a class="navbar-brand w3-card-4" href="../../../../admin_idx.php">
                        <img src="../docs/img/pnhs_logo.png" width="75px" height="75px">
                    </a>
                </div> -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <!-- <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <hr class="hidden-sm hidden-md hidden-lg" style="height:10px; border:0">

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../../CSS/user/section.php">Class Schedule</a></li>
                        <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i>Logout</a></li>
                        

                    </ul>
                </div> -->
                <!-- /.navbar-collapse -->
            <!-- </div> -->
            <!-- /.container-fluid -->
            <!-- <hr class="w3-theme-yd2" style="height:3px; border:0; margin-top:0px; margin-bottom:0px;">
            <hr class="w3-theme-bd2" style="height:3px; border:0; margin-top:0px; margin-bottom:0px;">
        </nav> -->
        <div class="container" style="padding:35px; background:rga(0,0,0,0.5)"></div>

        <div class="container-fluid w3-card-2" style="max-width:1310px; height:70px; margin-top:50px; border-radius:8px; padding-left:50px; padding-right:50px; background-color:#356d9a; color:#dfe7ef">
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <center>
                        <h1>
                            <?php echo "Name: " . $row['stu_lname'] . ", " . $row['stu_fname'] . " " . $row['stu_mname'];?>
                        </h1>
                    </center>
                </li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="hidden-xs" style="padding-top:12px; padding-left:20px">
                    <?php echo "Grade " . $yr_lvl . " - " . $sec . '<br>' . "Gender: " . $row['sis_gender'] . " | Age: " . $year;?>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden-xs">
                    <h3>
                        <?php echo "LRN: " . $row['lrn']; ?>
                    </h3>
                </li>
            </ul>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-4 w3-center">
                    <div class="container thumbnail w3-card-4" style="max-width:300px; height:300px; margin-top:140px">
                        <img src="2x2.png">
                    </div>
                   
                </div>

                <div class="col-lg-9 col-md-8">
                    <div class="panel-body" style="max-width:100%; height:100%; margin-top:10px">
                        <ul class="nav nav-tabs nav-justified">
                            <li class="active">
                                <a href="#Stud_info" data-toggle="tab">
                                    <h3>Student Informations</h3>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content w3-theme-yl5">
                            <div class="tab-pane fade in active" id="Stud_info">

                                <div class="panel-body" style="max-width:100%; height:100%; margin-top:50px">
                                    <ul class="nav nav-pills nav-justified">
                                        <li class="active">
                                            <a href="#General" data-toggle="tab">
                                                <h5>General</h5>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#Parents" data-toggle="tab">
                                                <h5>Parents</h5>
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="tab-content" style="margin:50px">
                                        <div class="tab-pane fade in active" id="General">
                                            <h4>
                                                <b>General Information</b>
                                            </h4>
                                            <div class="table-responsive">
                                                <table>
                                                    <tbody>
                                                        <tr class="hidden-xl hidden-lg hidden-md hidden-sm">
                                                            <td>LRN</td>
                                                            <td>####################</td>
                                                        </tr>
                                                        <tr class="hidden-xl hidden-lg hidden-md hidden-sm">
                                                            <td>Year lvl</td>
                                                            <td>####################</td>
                                                        </tr>
                                                        <tr class="hidden-xl hidden-lg hidden-md hidden-sm">
                                                            <td>Bloc</td>
                                                            <td>####################</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Date of Birth</td>
                                                            <td>
                                                                <?php echo $month . " " . $bdate[2] . ", " . $bdate[0];?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Place of Birth</td>
                                                            <td>
                                                                <?php echo $row['plc_birth'];?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Address</td>
                                                            <td>
                                                                <?php echo $row['house_no'] . ", " . $row['street'] . ", " . $row['brng'] . ", " . $row['munic'];?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Religion</td>
                                                            <td>
                                                                <?php echo $row['sis_religion'];?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Status</td>
                                                            <td>
                                                                <?php echo $row['stu_status'];?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Transfer in Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                            <td>
                                                                <?php
                                                                if($row['trnsf_in_date']=='0000-00-00')
                                                                {

                                                                }
                                                                else
                                                                {
                                                                    echo $row['trnsf_in_date'];
                                                                }
                                                                ?>
                                                            </td>
														</tr>
														<tr>
                                                            <td>Cellphone Number &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                            <td>
                                                                <?php echo $row['stu_contact'];?>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <h4>
                                                <b>Additional Information</b>
                                            </h4>
                                            <div class="table-responsive">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td>Mother Tounge &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                            <td>
                                                                <?php echo $row['m_tounge'];?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Ethnic</td>
                                                            <td>
                                                                <?php echo $row['ethnic']; }?>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <?php

									$get_parent = $mysqli->query("SELECT * FROM sis_parent_guardian WHERE lrn = $lrn")
															or die("Error get_parent: " . $mysqli->error);
									while($row = $get_parent->fetch_array())
									{

								?>

                                            <div class="tab-pane fade" id="Parents">
                                                <h4>
                                                    <b>Parents Information</b>
                                                </h4>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
														<tr>
                                                                <td><b>Father's Name<b></td>
                                                                <td>
                                                                    <?php echo $row['sis_f_fname'] ." ". $row['sis_f_mname'] . " " . $row['sis_f_lname'];?>
                                                                </td>
                                                                <td><b>Contact Num</b></td>
                                                                <td><?php echo $row['f_contact'];?></td>
															</tr>
															<tr>
																<td><b>Occupation</b></td>
																<td><?php echo $row['sis_f_work'];?></td>
															</tr>
                                                            <tr>
                                                                <td><b>Mother's Name</b></td>
                                                                <td>
                                                                    <?php echo $row['sis_m_fname'] . " " . $row['sis_m_mname'] . " " . $row['sis_m_lname'];?>
                                                                </td>
                                                                <td><b>Contact Num</b></td>
                                                                <td><?php echo $row['m_contact'];?></td>
															</tr>
															<tr>
																<td><b>Occupation</b></td>
																<td><?php echo $row['sis_m_work'];?></td>
															</tr>
                                                            <tr>
                                                                <td><b>Guardian</b></td>
                                                                <td>
                                                                    <?php echo $row['sis_g_fname'] . " " . $row['sis_g_mname'] . " " . $row['sis_g_lname'];?>
																</td>
																<td><b>Contact Num</b></td>
                                                                <td><?php echo $row['g_contact'];?></td>
                                                            <tr>
																<td><b>Guardian Relationship</b></td>
																<td><?php echo $row['guardian_relation'];}?></td>
															</tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                    </div>
                                    <!-- End of Tab Content -->
                                </div>
                                <!-- End of Panel Body -->
                            </div>
                            <!-- End of Tab Pane -->

                        </div>
                    </div>
                    <!-- End of Tab Content -->
                </div>
                <!-- End of Panel Body-->
            </div>
            <!-- End of Col -->
        </div>
        <!-- Edn of Row -->


        
        <script src="../js/alert.js"></script>
        <script src="../js/slideshow.js"></script>
        <script src="../js/backToTop.js"></script>
        <script src="../js/sideNavII.js"></script>
        <script src="../js/showNav.js"></script>

        <!-- jQuery -->
        <script src="../Template%20(reference)/vendor/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../Template%20(reference)/vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function () {
                $('#dataTables-example').DataTable({
                    responsive: true
                });
            });
        </script>
        </div>
        <!-- End of Container Fluid -->
<?php include('../footer.php');?>
</body>
</html>