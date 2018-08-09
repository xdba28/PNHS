<?php

include_once('../../DB Con.php');

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

$lrn = $_GET["lrn"];

$get_student = mysql_query("SELECT * FROM sis_student WHERE lrn = $lrn")
                        or die("Error: ".mysql_error());

while($row = mysql_fetch_array($get_student))
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


$get_section = mysql_query("SELECT css_section.SECTION_NAME AS section, css_section.YEAR_LEVEL AS lvl, css_section.SECTION_ID AS id
        FROM sis_stu_rec, css_section
        WHERE sis_stu_rec.section_id = css_section.SECTION_ID
        AND sis_stu_rec.lrn = $lrn")
        or die("Error get_section: " .mysql_error());

$section = mysql_fetch_assoc($get_section);
$sec =  $section['section'];
$yr_lvl = $section['lvl'];
$sec_id = $section['id'];

$print_f137 = mysql_query("SELECT stu_lname, stu_fname, stu_mname, SECTION_NAME, YEAR_LEVEL
                            FROM sis_student, sis_stu_rec, css_section
                            WHERE sis_student.lrn = sis_stu_rec.lrn
                            AND sis_stu_rec.section_id = css_section.SECTION_ID
                            AND sis_student.lrn = $lrn")
                    or die("Error print_f137: " .mysql_error());

    $res = mysql_fetch_assoc($print_f137);
    $lname = $res['stu_lname'];
    $mname = $res['stu_mname'];
    $fname = $res['stu_fname'];
    $sec_name = $res['SECTION_NAME'];
    $lvl = $res['YEAR_LEVEL'];    

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
        <script href="../Template%20(reference)/vendor/bootstrap/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>

<script>
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
</script>
    </head>
    <body>

        <nav class="navbar-fixed-top w3-theme-bd5 w3-card-4" style="background-color:rgba(42,101,149,0.95)!important" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed fa fa-bars hidden-sm hidden-md hidden-lg" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                        aria-expanded="false">
                    </button>
                    <a class="navbar-brand w3-card-4" href="../../../../admin_idx.php">
                        <img src="../docs/img/pnhs_logo.png" width="75px" height="75px">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <hr class="hidden-sm hidden-md hidden-lg" style="height:10px; border:0">

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../student_list.php">Student List</a></li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Manage Account
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-user fa-fw"></i> Admin Profile</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="../../logout.php">
                                        <i class="fa fa-sign-out fa-fw"></i> Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
            <hr class="w3-theme-yd2" style="height:3px; border:0; margin-top:0px; margin-bottom:0px;">
            <hr class="w3-theme-bd2" style="height:3px; border:0; margin-top:0px; margin-bottom:0px;">
        </nav>
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
                            <li>
                                <a href="#Acad_rec" data-toggle="tab">
                                    <h3>Academic Records</h3>
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
                                                    </tbody>
                                                </table>
                                            </div>

                                            <h4>
                                                <b>Contact Information</b>
                                            </h4>
                                            <div class="table-responsive">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td>Cellphone Number &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                            <td>
                                                                <?php echo $row['stu_contact'];?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>e-Mail</td>
                                                            <td>
                                                                <?php echo $row['sis_email'];?>
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

									$get_parent = mysql_query("SELECT * FROM sis_parent_guardian WHERE lrn = $lrn")
															or die("Error get_parent: " .mysql_error());
									while($row = mysql_fetch_array($get_parent))
									{

								?>

                                            <div class="tab-pane fade" id="Parents">
                                                <h4>
                                                    <b>Parents Information</b>
                                                </h4>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Father</th>
                                                                <th>Mother</th>
                                                                <th>Guardian</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Name</td>
                                                                <td>
                                                                    <?php echo $row['sis_father'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['sis_mother'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['sis_guardian'];?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Cellphone Number</td>
                                                                <td>
                                                                    <?php echo $row['pg_contact']; }?>
                                                                </td>
                                                                <td></td>
                                                                <td></td>
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
                            <div class="tab-pane fade in" id="Acad_rec">
                            <div class="container" style="max-width:100%;margin-top:50px">                        
                            <div class="panel-body" style="max-width:100%; height:100%">
                                <ul class="nav nav-pills nav-justified">
                                    <li class="active"><a href="#7" data-toggle="tab"><h5>7th Grade</h5></a></li>
                                    <li><a href="#8" data-toggle="tab"><h5>8th Grade</h5></a></li>
                                    <li><a href="#9" data-toggle="tab"><h5>9th Grade</h5></a></li>
                                    <li><a href="#10" data-toggle="tab"><h5>10th Grade</h5></a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="7">
                                        <div class="table-responsive">
                                            <table class="table" style="margin-top:20px;table-border:0px">
                                                <tbody>
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead class="w3-theme-yl4">
                                                    <tr>
                                                        <th rowspan="2">MGA ASIGNATURA</th>
                                                        <th colspan="4">MARKAHAN</th>
                                                        <th rowspan="2">KABUUANG MARKA</th>
                                                        <th rowspan="2">GINAWANG AKSYON</th>
                                                    </tr>
                                                    <tr>
                                                        <th>1</th>
                                                        <th>2</th>
                                                        <th>3</th>
                                                        <th>4</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                <?php
                $get_grade_section = mysql_query("SELECT css_schedule.sched_id AS sched, sis_stu_rec.rec_id AS rec,
                                                    css_subject.subject_name as subj

                                                    FROM css_school_yr, sis_grade, css_section, css_schedule, sis_stu_rec, sis_student,
                                                    css_subject
                                                    WHERE sis_grade.sched_id = css_schedule.SCHED_ID
                                                    AND sis_stu_rec.rec_id = sis_grade.rec_id
                                                    AND css_schedule.sy_id = css_school_yr.sy_id
                                                    AND css_schedule.SECTION_ID = css_section.SECTION_ID
                                                    AND sis_student.lrn = sis_stu_rec.lrn
                                                    AND sis_stu_rec.section_id = css_section.SECTION_ID
                                                    AND sis_stu_rec.sy_id = css_school_yr.sy_id
                                                    AND css_schedule.subject_id = css_subject.subject_id
                                                    AND css_school_yr.status = 'active' AND sis_student.lrn = '$lrn'
                                                    GROUP BY css_schedule.SCHED_ID")
                                                or die("Error get_grade_section: " .mysql_error());
                                                    
                    while($row = mysql_fetch_array($get_grade_section))
                    {
                        $sched = $row['sched'];
                        $rec = $row['rec'];
                        $subject = $row['subj'];
                
                ?>
                                    <tr>
                                        <td><?php echo $subject . '</td>';  

                                    $get_grade_value = mysql_query("SELECT sis_grade.grade_val AS grade, sis_grade.sis_grade_quarter AS qrt 
                                                                    FROM sis_grade, sis_stu_rec, css_schedule, css_subject, css_section
                                                                    WHERE sis_grade.rec_id = sis_stu_rec.rec_id
                                                                    AND css_schedule.subject_id = css_subject.subject_id
                                                                    AND css_section.SECTION_ID = css_schedule.SECTION_ID
                                                                    AND sis_grade.sched_id = '$sched'
                                                                    AND sis_grade.rec_id = '$rec'
                                                                    AND css_section.SECTION_ID = '$sec_id'
                                                                    AND css_subject.subject_name = '$subject'")
                                                                or die("Error get_grade_value: " .mysql_error());
                                    
                                            while($row = mysql_fetch_array($get_grade_value))
                                            {
                                                echo '<td>' . $row['grade'] . '</td>';
                                            }
                                    
                                            $get_grade_remark = mysql_query("SELECT grade_remarks FROM sis_grade
                                                                            WHERE sched_id = '$sched'
                                                                            AND rec_id = '$rec'
                                                                            AND sis_grade_quarter = 'Average'")
                                                                    or die("Error get_grade_remark: " .mysql_query());
                                            $res = mysql_fetch_assoc($get_grade_remark);
                                            $ave_remark = $res['grade_remarks'];
                                            
                                            echo '<td>' . $ave_remark . '</td>';
                                        }
                                    
                                    
                                    $get_final_grade = mysql_query("SELECT grade_val, grade_remarks FROM sis_student, sis_grade, sis_stu_rec
                                                                    WHERE sis_student.lrn = sis_stu_rec.lrn
                                                                    AND sis_stu_rec.rec_id = sis_grade.rec_id
                                                                    AND sis_grade_quarter = 'Final'
                                                                    AND sis_student.lrn = $lrn")
                                                                or die("Error get_final_grade: " .mysql_error());
                                        $res = mysql_fetch_assoc($get_final_grade);
                                        $final = $res['grade_val'];
                                        $remark = $res['grade_remarks'];
                                    
                                                                        ?>

                                                        
                                                    <tr>
                                                        <td><b>Genral Average</b></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><?php echo $final;?></td>
                                                        <td><?php echo $remark;?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead class="w3-theme-yl4">
                                            <tr>
                                                <th>Pangkurikulom na Taon</th>
                                                <th>Hun</th>
                                                <th>Hul</th>
                                                <th>Ago</th>
                                                <th>Set</th>
                                                <th>Okt</th>
                                                <th>Nob</th>
                                                <th>Dis</th>
                                                <th>Ene</th>
                                                <th>Peb</th>
                                                <th>Mar</th>
                                                <th>Abr</th>
                                                <th>Kabuuan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Mga araw na may pasok</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Mga araw na pumasok</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>May paunang yunit sa</td>
                                                <td>##</td>
                                            </tr>
                                            <tr>
                                                <td>Kulang ng yunt sa</td>
                                                <td>##</td>
                                            </tr>
                                            <tr>
                                                <td>Kabuuang taon sa paaralan hanggang sa kasalukuyan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                <td>##</td>
                                            </tr>
                                            <tr>
                                                <td>Kabuuang yunit sa kasalukuyan</td>
                                                <td>##</td>
                                            </tr> 
                                        </tbody>
                                    </table>
                                </div>
                                    
                                <div class="table-responsive">
                                    <table class="table" style="margin-top:20px;table-border:0px">
                                        <thead>
                                            <th>Legend</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><b>A</b> (Advanced) 90% and above</td>
                                                <td><b>AP</b> (Approaching Proficiency) 80% to 84%</td>
                                                <td><b>B</b> (Begining) 74% and below</td>
                                            </tr>
                                            <tr>
                                                <td><b>P</b> (Proficiency) 85% to 89%</td>
                                                <td><b>D</b> (Developing) 75% to 79%</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                                        

                                    </div>
                
                            <div class="tab-pane fade in" id="8">
                            <div class="table-responsive">
                            <table class="table" style="margin-top:20px;table-border:0px">
                                <tbody>
                                   
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead class="w3-theme-yl4">
                                    <tr>
                                        <th rowspan="2">MGA ASIGNATURA</th>
                                        <th colspan="4">MARKAHAN</th>
                                        <th rowspan="2">KABUUANG MARKA</th>
                                        <th rowspan="2">GINAWANG AKSYON</th>
                                        <th rowspan="2">MGA YUNIT NA NAKUHA</th>
                                    </tr>
                                    <tr>
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Filipino</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                    </tr>
                                    <tr>
                                        <td>English</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                    </tr>
                                    <tr>
                                        <td>Mathematics</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                    </tr>
                                    <tr>
                                        <td>Science</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                    </tr>
                                    <tr>
                                        <td>Araling Panlipunan (AP)</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                    </tr>
                                    <tr>
                                        <td>Technology and Livelihood Education (TLE)</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                    </tr>
                                    <tr>
                                        <td>MAPEH</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                    </tr>
                                    <tr>
                                        <td>Edukasyon sa Pagpapakatao (Esp)</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                    </tr>
                                    <tr>
                                        <td><b>Genral Average</b></td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                        <td>###</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->

                            </div>

                                        <div class="tab-pane fade in" id="9">
                                        <div class="table-responsive">
                                        <table class="table" style="margin-top:20px;table-border:0px">
                                            <tbody>
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead class="w3-theme-yl4">
                                                <tr>
                                                    <th rowspan="2">MGA ASIGNATURA</th>
                                                    <th colspan="4">MARKAHAN</th>
                                                    <th rowspan="2">KABUUANG MARKA</th>
                                                    <th rowspan="2">GINAWANG AKSYON</th>
                                                    <th rowspan="2">MGA YUNIT NA NAKUHA</th>
                                                </tr>
                                                <tr>
                                                    <th>1</th>
                                                    <th>2</th>
                                                    <th>3</th>
                                                    <th>4</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Filipino</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                </tr>
                                                <tr>
                                                    <td>English</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                </tr>
                                                <tr>
                                                    <td>Mathematics</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                </tr>
                                                <tr>
                                                    <td>Science</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                </tr>
                                                <tr>
                                                    <td>Araling Panlipunan (AP)</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                </tr>
                                                <tr>
                                                    <td>Technology and Livelihood Education (TLE)</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                </tr>
                                                <tr>
                                                    <td>MAPEH</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                </tr>
                                                <tr>
                                                    <td>Edukasyon sa Pagpapakatao (Esp)</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Genral Average</b></td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                        
        
                                        </div>

                                        <div class="tab-pane fade in" id="10">
                                        <div class="table-responsive">
                                        <table class="table" style="margin-top:20px;table-border:0px">
                                            <tbody>
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead class="w3-theme-yl4">
                                                <tr>
                                                    <th rowspan="2">MGA ASIGNATURA</th>
                                                    <th colspan="4">MARKAHAN</th>
                                                    <th rowspan="2">KABUUANG MARKA</th>
                                                    <th rowspan="2">GINAWANG AKSYON</th>
                                                    <th rowspan="2">MGA YUNIT NA NAKUHA</th>
                                                </tr>
                                                <tr>
                                                    <th>1</th>
                                                    <th>2</th>
                                                    <th>3</th>
                                                    <th>4</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Filipino</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                </tr>
                                                <tr>
                                                    <td>English</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                </tr>
                                                <tr>
                                                    <td>Mathematics</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                </tr>
                                                <tr>
                                                    <td>Science</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                </tr>
                                                <tr>
                                                    <td>Araling Panlipunan (AP)</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                </tr>
                                                <tr>
                                                    <td>Technology and Livelihood Education (TLE)</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                </tr>
                                                <tr>
                                                    <td>MAPEH</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                </tr>
                                                <tr>
                                                    <td>Edukasyon sa Pagpapakatao (Esp)</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Genral Average</b></td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                    <td>###</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>


                                            </div>
                                            <!-- /.table-responsive -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Tab Content -->
                </div>
                <!-- End of Panel Body-->
            </div>
            <!-- End of Col -->
        </div>
        <!-- Edn of Row -->

        <!-- Excel button Modal -->
        <div class="modal fade" id="myModal<?php echo $lrn?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <center><h4 class="modal-title" id="myModalLabel">Release Form 137 for:</h4></center>
              </div>
              <div class="modal-body">
                <center>
                <form action="process/form137_rel.php" method="post" id="f137">
                    <table>
                        <tr>
                            <td><b>LRN</b></td>
                            
                            <td><input form="f137" type="hidden" name="lrn" id="lrn" value="<?php echo $lrn;?>"><?php echo $lrn;?></td>
                        </tr>
                        <tr>
                            <td><b>Name</b></td>
                            
                            <td><?php echo $lname . ", " . $fname . " " . $mname;?></td>
                        </tr>
                        <tr>
                            <td><b>Grade & Section</b></td>
                            
                            <td><?php echo $lvl . " - " . $sec_name;?></td>
                        </tr>
                        <tr>
                            <td><b>Date Released</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            
                            <td><input form="f137" type="hidden" name="date" id="date" value="<?php echo date('Y-m-d')?>">
                            <?php echo date('F d, Y')?></td>
                        </tr>
                    </table>
                </center>
              </div>
                
              <div class="modal-footer">
                  <center>
                    <input form="f137" hidden name="lrn" id="lrn" value="<?php echo $lrn;?>">
                    <button form="f137" type="submit" class="btn w3-hover-green btn-success w3-card-2">Print</button>
                </form>
                  </center>
              </div>
                
            </div>
          </div>
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