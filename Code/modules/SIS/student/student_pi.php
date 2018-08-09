<?php
session_start();
include_once('../db_con_i.php');
	include("../session.php");

if(isset($_GET['lrn']))
{
	
    $lrn = base64_decode($_GET["lrn"]);
}
else
{
    header('Location: student_list.php');
}

$get_student = $mysqli->query("SELECT * FROM sis_student WHERE lrn = $lrn")
                        or die("Error: ".$mysqli->error);

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

// $date_enroll = $row['date_enrolled'];
// $enroll_ex = explode("-", $date_enroll);
// $enroll_month = date('F', mktime(0, 0, 0, $enroll_ex[1]));

if(!is_null($row['trnsf_in_date']))
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
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!-- Browser's Tab Title -->
        <title>Student Information System</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="../css1/style.css">

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

        <!-- Browser's Tab Image -->
        <link rel="shortcut icon" href="../docs/pnhs_img/favicon.ico" type="image/x-icon">
        <link rel="icon" href="../docs/img/pnhs_favicon.ico" type="image/x-icon">

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script href="../Template%20(reference)/vendor/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script href="../Template%20(reference)/vendor/bootstrap/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>

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

<?php include("../topnav.php");?>
    <div id="wrapper" style="padding-top:40px">
	<?php include("../sidenav.php");?>
        <div class="container-fluid w3-card-2" style="max-width:1100px; height:70px; margin:50px 0px 0px 43px; border-radius:8px; padding-left:50px; padding-right:50px; background-color:#356d9a; color:#dfe7ef">
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
                    <?php echo "Grade " . $yr_lvl . " - " . $sec . '<br>' . "Sex: " . $row['sis_gender'] . " | Age: " . $year;?>
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
                    <div class="container thumbnail w3-card-4" style="max-width:200px; height:200px; margin-top:140px">
					<?php
						if(empty($row['sis_image']))
						{
							echo '
							<img src="../docs/img/2x2.png">';
						}
						else
						{
							echo '
							<img src="../pics/' . $row['sis_image'] . '">';
						}
					?>
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
                                                            <td><?php echo $row['lrn'];?></td>
                                                        </tr>
                                                        <tr class="hidden-xl hidden-lg hidden-md hidden-sm">
                                                            <td>Grade level & Section</td>
                                                            <td><?php echo $yr_lvl . "-" . $sec?></td>
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
															<td><?php 
																if(!is_null($row['trnsf_in_date']))
																{																
																	echo $trnsf_month . ' ' . $trnsf_ex[2] . ', ' . $trnsf_ex[0];
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
                                                                <?php echo $row['ethnic'];?>
                                                            </td>
														</tr>
														<tr>
															<td>Elementary School</td>
															<td><?php echo $row['sis_elem'];}?></td>
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

                                            <div class="tab-pane fade in" id="Parents">
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
                                                                <td><b>Father<b></td>
                                                                <td>
                                                                    <?php echo $row['sis_f_fname'] ." ". $row['sis_f_mname'] . " " . $row['sis_f_lname'] . ", " . $row['sis_f_ext'];?>
                                                                </td>
                                                                <td><b>Contact Num</b></td>
                                                                <td><?php echo $row['f_contact'];?></td>
															</tr>
															<tr>
																<td><b>Occupation</b></td>
																<td><?php echo $row['sis_f_work'];?></td>
															</tr>
                                                            <tr>
                                                                <td><b>Mother</b></td>
                                                                <td>
                                                                    <?php echo $row['sis_m_fname'] . " " . $row['sis_m_mname'] . " " . $row['sis_m_lname'] . ", " . $row['sis_m_ext'];?>
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
                                                                    <?php echo $row['sis_g_fname'] . " " . $row['sis_g_mname'] . " " . $row['sis_g_lname'] . ", " . $row['sis_g_ext'];?>
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
												<?php
													// SELECT LRN SIS_STU_REC ID
													// FOR GRADE 7
													$get_stu_rec_id_7 = $mysqli->query("SELECT rec_id FROM sis_stu_rec, css_section
																						WHERE sis_stu_rec.section_id = css_section.SECTION_ID
																						AND css_section.YEAR_LEVEL = '7'
																						AND lrn = '$lrn'")
																			or die("<script>alert('Error in fetching grade 7 record');</script>");
													$res = $get_stu_rec_id_7->fetch_assoc();
													$rec_id_7 = $res['rec_id'];

													function get_grade($sub, $rec, $qua)
													{
														include('../db_con_i.php');
														$get_grade = $mysqli->query("SELECT grade_val FROM sis_grade, sis_stu_rec, css_subject
																					WHERE sis_grade.rec_id = sis_stu_rec.rec_id
																					AND sis_grade.subject_id = css_subject.subject_id
																					AND css_subject.sub_desc = '$sub'
																					AND sis_stu_rec.rec_id = '$rec'
																					AND sis_grade_quarter = '$qua'");
														$res = $get_grade->fetch_assoc();
														$grade = $res['grade_val'];
														echo '<td><center>' . $grade . '</center></td>';
													}

													function get_remark($sub, $rec, $qua)
													{
														include('../db_con_i.php');
														$get_remark = $mysqli->query("SELECT grade_remarks FROM sis_grade, sis_stu_rec, css_subject
																					WHERE sis_grade.rec_id = sis_stu_rec.rec_id
																					AND sis_grade.subject_id = css_subject.subject_id
																					AND css_subject.sub_desc = '$sub'
																					AND sis_stu_rec.rec_id = '$rec'
																					AND sis_grade_quarter = '$qua'");
														$res = $get_remark->fetch_assoc();
														$grade_remark = $res['grade_remarks'];
														echo '<td><center>' . $grade_remark . '</center></td>';
													}

													function get_attendance_pre($rec, $month)
													{
														include('../db_con_i.php');
														$get_attend = $mysqli->query("SELECT total_days_present as pre
																					FROM sis_attendance, sis_stu_rec, css_section, css_school_yr
																					WHERE sis_stu_rec.section_id = css_section.SECTION_ID
																					AND sis_stu_rec.sy_id = css_school_yr.sy_id
																					AND sis_stu_rec.rec_id = sis_attendance.rec_id
																					AND sis_stu_rec.rec_id = '$rec'
																					AND attend_month = '$month'");
														$res = $get_attend->fetch_assoc();
														$present = $res['pre'];
														echo '<td>' . $present . '</td>';
													}

													function get_attendance_abs($rec, $month)
													{
														include('../db_con_i.php');
														$get_attend = $mysqli->query("SELECT total_days_absent as abs
																					FROM sis_attendance, sis_stu_rec, css_section, css_school_yr
																					WHERE sis_stu_rec.section_id = css_section.SECTION_ID
																					AND sis_stu_rec.sy_id = css_school_yr.sy_id
																					AND sis_stu_rec.rec_id = sis_attendance.rec_id
																					AND sis_stu_rec.rec_id = '$rec'
																					AND attend_month = '$month'");
														$res = $get_attend->fetch_assoc();
														$absent = $res['abs'];
														echo '<td>' . $absent . '</td>';
													}

													function get_final($rec, $qua)
													{
														include('../db_con_i.php');
														$get_grade = $mysqli->query("SELECT grade_val, grade_remarks FROM sis_grade, sis_stu_rec
																			WHERE sis_stu_rec.rec_id = sis_grade.rec_id
																			AND subject_id IS NULL
																			AND sis_stu_rec.rec_id = '$rec'
																			AND sis_grade_quarter = '$qua'");
														$res = $get_grade->fetch_assoc();
														$grade = $res['grade_val'];
														$remark = $res['grade_remarks'];
														echo '
														<td><center>' . $grade . '</center></td>
														<td><center>' . $remark . '</center></td>';
													}


												?>
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
														<td>Filipino</td>
														<?php
														get_grade('Filipino', $rec_id_7, '1st');
														get_grade('Filipino', $rec_id_7, '2nd');
														get_grade('Filipino', $rec_id_7, '3rd');
														get_grade('Filipino', $rec_id_7, '4th');
														get_grade('Filipino', $rec_id_7, 'Average');
														get_remark('Filipino', $rec_id_7, 'Average');
														?>
													</tr>
													<tr>
														<td>English</td>
														<?php
														get_grade('English', $rec_id_7, '1st');
														get_grade('English', $rec_id_7, '2nd');
														get_grade('English', $rec_id_7, '3rd');
														get_grade('English', $rec_id_7, '4th');
														get_grade('English', $rec_id_7, 'Average');
														get_remark('English', $rec_id_7, 'Average');
														?>
													</tr>
													<tr>
														<td>Mathematics</td>
														<?php
														get_grade('Mathematics', $rec_id_7, '1st');
														get_grade('Mathematics', $rec_id_7, '2nd');
														get_grade('Mathematics', $rec_id_7, '3rd');
														get_grade('Mathematics', $rec_id_7, '4th');
														get_grade('Mathematics', $rec_id_7, 'Average');
														get_remark('Mathematics', $rec_id_7, 'Average');
														?>
													</tr>
													<tr>
														<td>Science</td>
														<?php
														get_grade('Science', $rec_id_7, '1st');
														get_grade('Science', $rec_id_7, '2nd');
														get_grade('Science', $rec_id_7, '3rd');
														get_grade('Science', $rec_id_7, '4th');
														get_grade('Science', $rec_id_7, 'Average');
														get_remark('Science', $rec_id_7, 'Average');
														?>
													</tr>
													<tr>
														<td>Aranling Panlipunan</td>
														<?php
														get_grade('Araling Panlipunan', $rec_id_7, '1st');
														get_grade('Araling Panlipunan', $rec_id_7, '2nd');
														get_grade('Araling Panlipunan', $rec_id_7, '3rd');
														get_grade('Araling Panlipunan', $rec_id_7, '4th');
														get_grade('Araling Panlipunan', $rec_id_7, 'Average');
														get_remark('Araling Panlipunan', $rec_id_7, 'Average');
														?>
													</tr>
													<tr>
														<td>Technology and Livelihood Eduacation (TLE)</td>
														<?php
														get_grade('Technology and Livelihood Education', $rec_id_7, '1st');
														get_grade('Technology and Livelihood Education', $rec_id_7, '2nd');
														get_grade('Technology and Livelihood Education', $rec_id_7, '3rd');
														get_grade('Technology and Livelihood Education', $rec_id_7, '4th');
														get_grade('Technology and Livelihood Education', $rec_id_7, 'Average');
														get_remark('Technology and Livelihood Education', $rec_id_7, 'Average');
														?>
													</tr>
													<tr>
														<td>MAPEH</td>
														<?php
														get_grade('MAPEH', $rec_id_7, '1st');
														get_grade('MAPEH', $rec_id_7, '2nd');
														get_grade('MAPEH', $rec_id_7, '3rd');
														get_grade('MAPEH', $rec_id_7, '4th');
														get_grade('MAPEH', $rec_id_7, 'Average');
														get_remark('MAPEH', $rec_id_7, 'Average');
														?>
													</tr>
													<tr>
														<td>Edukasyon sa Pagpapakatao (EsP)</td>
														<?php
														get_grade('Edukasyon sa Pagpapakatao', $rec_id_7, '1st');
														get_grade('Edukasyon sa Pagpapakatao', $rec_id_7, '2nd');
														get_grade('Edukasyon sa Pagpapakatao', $rec_id_7, '3rd');
														get_grade('Edukasyon sa Pagpapakatao', $rec_id_7, '4th');
														get_grade('Edukasyon sa Pagpapakatao', $rec_id_7, 'Average');
														get_remark('Edukasyon sa Pagpapakatao', $rec_id_7, 'Average');
														?>
													</tr>
                                                    <tr>
                                                        <td><b>Genral Average</b></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
														<?php
														get_final($rec_id_7, 'Final');
														?>
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
												<td>Mga araw na pumasok</td>
												<?php 
												get_attendance_pre($rec_id_7, 'June');
												get_attendance_pre($rec_id_7, 'July');
												get_attendance_pre($rec_id_7, 'August');
												get_attendance_pre($rec_id_7, 'September');
												get_attendance_pre($rec_id_7, 'October');
												get_attendance_pre($rec_id_7, 'November');
												get_attendance_pre($rec_id_7, 'December');
												get_attendance_pre($rec_id_7, 'January');
												get_attendance_pre($rec_id_7, 'February');
												get_attendance_pre($rec_id_7, 'March');
												get_attendance_pre($rec_id_7, 'April');
												// get_attendance_pre($rec_id_7, 'May');
												?>
												<td></td>
                                            </tr>
                                            <tr>
												<td>Mga araw na hindi pumasok</td>
												<?php 
												get_attendance_abs($rec_id_7, 'June');
												get_attendance_abs($rec_id_7, 'July');
												get_attendance_abs($rec_id_7, 'August');
												get_attendance_abs($rec_id_7, 'September');
												get_attendance_abs($rec_id_7, 'October');
												get_attendance_abs($rec_id_7, 'November');
												get_attendance_abs($rec_id_7, 'December');
												get_attendance_abs($rec_id_7, 'January');
												get_attendance_abs($rec_id_7, 'February');
												get_attendance_abs($rec_id_7, 'March');
												get_attendance_abs($rec_id_7, 'April');
												// get_attendance_abs($rec_id_7, 'May');
												?>
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
                                <center>
                                     <?php
                            $emp = $_SESSION['user_data']['acct']['emp_no'];
                            $get_RK = $mysqli->query("SELECT pims_personnel.emp_No as emp_
																	FROM pims_personnel, pims_employment_records, pims_job_title
																	WHERE pims_personnel.emp_No = pims_employment_records.emp_No
																	AND pims_job_title.job_title_code = pims_employment_records.job_title_code
																	AND pims_job_title.job_title_name = 'Record Keeper'")
															or die("<script>alert('Error getting record keeper');</script>");
		
										$res = $get_RK->fetch_assoc();
										
										if($emp == $res['emp_'])
										{
                            ?>
		  
                                <div class="w3-button w3-circle w3-card-4 w3-green" title="Release F-137" style="height:50px;width:50px;padding:12px">
                                    <a href="#myModal<?php echo $lrn;?>" data-toggle="modal">
                                    <i class="fa fa-files-o fa-2x" data-toggle="modal" data-target="#myModal"> &nbsp;&nbsp;</i>
                                    </a>
								</div>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <?php
                                        }
                                    ?>
								
								<button type="button" onclick="print7()" class="w3-button w3-circle w3-card-4 w3-theme-bd3" title="Print F-138" style="height:50px;width:50px;padding:12px">
										<i class="fa fa-print fa-2x"> &nbsp;&nbsp;</i>
								</button>
                                <!-- <a href="student_f138.php?v=<?php echo $lrn;?>&g=<?php echo "7";?>">
                                <div class="w3-button w3-circle w3-card-4 w3-theme-bd3" title="Print F-138" style="height:50px;width:50px;padding:12px">
									<i class="fa fa-print fa-2x"> &nbsp;&nbsp;</i>
                                </div>&nbsp;&nbsp;&nbsp;&nbsp;
                                </a> -->
                                </center>
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
													<?php
														// SELECT LRN SIS_STU_REC ID
														// FOR GRADE 8
														$get_stu_rec_id_8 = $mysqli->query("SELECT rec_id FROM sis_stu_rec, css_section
																							WHERE sis_stu_rec.section_id = css_section.SECTION_ID
																							AND css_section.YEAR_LEVEL = '8'
																							AND lrn = '$lrn'")
																				or die("<script>alert('Error in fetching grade 7 record');</script>");
														$res = $get_stu_rec_id_8->fetch_assoc();
														$rec_id_8 = $res['rec_id'];	
	
													?>
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
															<td>Filipino</td>
															<?php
															get_grade('Filipino', $rec_id_8, '1st');
															get_grade('Filipino', $rec_id_8, '2nd');
															get_grade('Filipino', $rec_id_8, '3rd');
															get_grade('Filipino', $rec_id_8, '4th');
															get_grade('Filipino', $rec_id_8, 'Average');
															get_remark('Filipino', $rec_id_8, 'Average');
															?>
														</tr>
														<tr>
															<td>English</td>
															<?php
															get_grade('English', $rec_id_8, '1st');
															get_grade('English', $rec_id_8, '2nd');
															get_grade('English', $rec_id_8, '3rd');
															get_grade('English', $rec_id_8, '4th');
															get_grade('English', $rec_id_8, 'Average');
															get_remark('English', $rec_id_8, 'Average');
															?>
														</tr>
														<tr>
															<td>Mathematics</td>
															<?php
															get_grade('Mathematics', $rec_id_8, '1st');
															get_grade('Mathematics', $rec_id_8, '2nd');
															get_grade('Mathematics', $rec_id_8, '3rd');
															get_grade('Mathematics', $rec_id_8, '4th');
															get_grade('Mathematics', $rec_id_8, 'Average');
															get_remark('Mathematics', $rec_id_8, 'Average');
															?>
														</tr>
														<tr>
															<td>Science</td>
															<?php
															get_grade('Science', $rec_id_8, '1st');
															get_grade('Science', $rec_id_8, '2nd');
															get_grade('Science', $rec_id_8, '3rd');
															get_grade('Science', $rec_id_8, '4th');
															get_grade('Science', $rec_id_8, 'Average');
															get_remark('Science', $rec_id_8, 'Average');
															?>
														</tr>
														<tr>
															<td>Aranling Panlipunan</td>
															<?php
															get_grade('Araling Panlipunan', $rec_id_8, '1st');
															get_grade('Araling Panlipunan', $rec_id_8, '2nd');
															get_grade('Araling Panlipunan', $rec_id_8, '3rd');
															get_grade('Araling Panlipunan', $rec_id_8, '4th');
															get_grade('Araling Panlipunan', $rec_id_8, 'Average');
															get_remark('Araling Panlipunan', $rec_id_8, 'Average');
															?>
														</tr>
														<tr>
															<td>Technology and Livelihood Eduacation (TLE)</td>
															<?php
															get_grade('Technology and Livelihood Education', $rec_id_8, '1st');
															get_grade('Technology and Livelihood Education', $rec_id_8, '2nd');
															get_grade('Technology and Livelihood Education', $rec_id_8, '3rd');
															get_grade('Technology and Livelihood Education', $rec_id_8, '4th');
															get_grade('Technology and Livelihood Education', $rec_id_8, 'Average');
															get_remark('Technology and Livelihood Education', $rec_id_8, 'Average');
															?>
														</tr>
														<tr>
															<td>MAPEH</td>
															<?php
															get_grade('MAPEH', $rec_id_8, '1st');
															get_grade('MAPEH', $rec_id_8, '2nd');
															get_grade('MAPEH', $rec_id_8, '3rd');
															get_grade('MAPEH', $rec_id_8, '4th');
															get_grade('MAPEH', $rec_id_8, 'Average');
															get_remark('MAPEH', $rec_id_8, 'Average');
															?>
														</tr>
														<tr>
															<td>Edukasyon sa Pagpapakatao (EsP)</td>
															<?php
															get_grade('Edukasyon sa Pagpapakatao', $rec_id_8, '1st');
															get_grade('Edukasyon sa Pagpapakatao', $rec_id_8, '2nd');
															get_grade('Edukasyon sa Pagpapakatao', $rec_id_8, '3rd');
															get_grade('Edukasyon sa Pagpapakatao', $rec_id_8, '4th');
															get_grade('Edukasyon sa Pagpapakatao', $rec_id_8, 'Average');
															get_remark('Edukasyon sa Pagpapakatao', $rec_id_8, 'Average');
															?>
														</tr>
														<tr>
															<td><b>Genral Average</b></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
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
													<td>Mga araw na pumasok</td>
													<?php 
													get_attendance_pre($rec_id_8, 'June');
													get_attendance_pre($rec_id_8, 'July');
													get_attendance_pre($rec_id_8, 'August');
													get_attendance_pre($rec_id_8, 'September');
													get_attendance_pre($rec_id_8, 'October');
													get_attendance_pre($rec_id_8, 'November');
													get_attendance_pre($rec_id_8, 'December');
													get_attendance_pre($rec_id_8, 'January');
													get_attendance_pre($rec_id_8, 'February');
													get_attendance_pre($rec_id_8, 'March');
													get_attendance_pre($rec_id_8, 'April');
													// get_attendance_pre($rec_id_8, 'May');
													?>
													<td></td>
												</tr>
												<tr>
													<td>Mga araw na hindi pumasok</td>
													<?php 
													get_attendance_abs($rec_id_8, 'June');
													get_attendance_abs($rec_id_8, 'July');
													get_attendance_abs($rec_id_8, 'August');
													get_attendance_abs($rec_id_8, 'September');
													get_attendance_abs($rec_id_8, 'October');
													get_attendance_abs($rec_id_8, 'November');
													get_attendance_abs($rec_id_8, 'December');
													get_attendance_abs($rec_id_8, 'January');
													get_attendance_abs($rec_id_8, 'February');
													get_attendance_abs($rec_id_8, 'March');
													get_attendance_abs($rec_id_8, 'April');
													// get_attendance_abs($rec_id_8, 'May');
													?>
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
									<center>
                                         <?php
                            $emp = $_SESSION['user_data']['acct']['emp_no'];
                            $get_RK = $mysqli->query("SELECT pims_personnel.emp_No as emp_
																	FROM pims_personnel, pims_employment_records, pims_job_title
																	WHERE pims_personnel.emp_No = pims_employment_records.emp_No
																	AND pims_job_title.job_title_code = pims_employment_records.job_title_code
																	AND pims_job_title.job_title_name = 'Record Keeper'")
															or die("<script>alert('Error getting record keeper');</script>");
		
										$res = $get_RK->fetch_assoc();
										
										if($emp == $res['emp_'])
										{
                            ?>
		  
									<div class="w3-button w3-circle w3-card-4 w3-green" title="Release F-137" style="height:50px;width:50px;padding:12px">
										<a href="#myModal<?php echo $lrn;?>" data-toggle="modal">
										<i class="fa fa-files-o fa-2x" data-toggle="modal" data-target="#myModal"> &nbsp;&nbsp;</i>
										</a>
									</div>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <?php
                                        }
                                        ?>
									
									<button type="button" onclick="print8()" class="w3-button w3-circle w3-card-4 w3-theme-bd3" title="Print F-138" style="height:50px;width:50px;padding:12px">
											<i class="fa fa-print fa-2x"> &nbsp;&nbsp;</i>
									</button>
									<!-- <a href="student_f138.php?v=<?php echo $lrn;?>&g=<?php echo "8";?>">
									<div class="w3-button w3-circle w3-card-4 w3-theme-bd3" title="Print F-138" style="height:50px;width:50px;padding:12px">
										<i class="fa fa-print fa-2x"> &nbsp;&nbsp;</i>
									</div>&nbsp;&nbsp;&nbsp;&nbsp;
									</a> -->
									</center>
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
														<?php
															// SELECT LRN SIS_STU_REC ID
															// FOR GRADE 9
															$get_stu_rec_id_9 = $mysqli->query("SELECT rec_id FROM sis_stu_rec, css_section
																								WHERE sis_stu_rec.section_id = css_section.SECTION_ID
																								AND css_section.YEAR_LEVEL = '9'
																								AND lrn = '$lrn'")
																					or die("<script>alert('Error in fetching grade 7 record');</script>");
															$res = $get_stu_rec_id_9->fetch_assoc();
															$rec_id_9 = $res['rec_id'];	
		
														?>
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
																<td>Filipino</td>
																<?php
																get_grade('Filipino', $rec_id_9, '1st');
																get_grade('Filipino', $rec_id_9, '2nd');
																get_grade('Filipino', $rec_id_9, '3rd');
																get_grade('Filipino', $rec_id_9, '4th');
																get_grade('Filipino', $rec_id_9, 'Average');
																get_remark('Filipino', $rec_id_9, 'Average');
																?>
															</tr>
															<tr>
																<td>English</td>
																<?php
																get_grade('English', $rec_id_9, '1st');
																get_grade('English', $rec_id_9, '2nd');
																get_grade('English', $rec_id_9, '3rd');
																get_grade('English', $rec_id_9, '4th');
																get_grade('English', $rec_id_9, 'Average');
																get_remark('English', $rec_id_9, 'Average');
																?>
															</tr>
															<tr>
																<td>Mathematics</td>
																<?php
																get_grade('Mathematics', $rec_id_9, '1st');
																get_grade('Mathematics', $rec_id_9, '2nd');
																get_grade('Mathematics', $rec_id_9, '3rd');
																get_grade('Mathematics', $rec_id_9, '4th');
																get_grade('Mathematics', $rec_id_9, 'Average');
																get_remark('Mathematics', $rec_id_9, 'Average');
																?>
															</tr>
															<tr>
																<td>Science</td>
																<?php
																get_grade('Science', $rec_id_9, '1st');
																get_grade('Science', $rec_id_9, '2nd');
																get_grade('Science', $rec_id_9, '3rd');
																get_grade('Science', $rec_id_9, '4th');
																get_grade('Science', $rec_id_9, 'Average');
																get_remark('Science', $rec_id_9, 'Average');
																?>
															</tr>
															<tr>
																<td>Aranling Panlipunan</td>
																<?php
																get_grade('Araling Panlipunan', $rec_id_9, '1st');
																get_grade('Araling Panlipunan', $rec_id_9, '2nd');
																get_grade('Araling Panlipunan', $rec_id_9, '3rd');
																get_grade('Araling Panlipunan', $rec_id_9, '4th');
																get_grade('Araling Panlipunan', $rec_id_9, 'Average');
																get_remark('Araling Panlipunan', $rec_id_9, 'Average');
																?>
															</tr>
															<tr>
																<td>Technology and Livelihood Eduacation (TLE)</td>
																<?php
																get_grade('Technology and Livelihood Education', $rec_id_9, '1st');
																get_grade('Technology and Livelihood Education', $rec_id_9, '2nd');
																get_grade('Technology and Livelihood Education', $rec_id_9, '3rd');
																get_grade('Technology and Livelihood Education', $rec_id_9, '4th');
																get_grade('Technology and Livelihood Education', $rec_id_9, 'Average');
																get_remark('Technology and Livelihood Education', $rec_id_9, 'Average');
																?>
															</tr>
															<tr>
																<td>MAPEH</td>
																<?php
																get_grade('MAPEH', $rec_id_9, '1st');
																get_grade('MAPEH', $rec_id_9, '2nd');
																get_grade('MAPEH', $rec_id_9, '3rd');
																get_grade('MAPEH', $rec_id_9, '4th');
																get_grade('MAPEH', $rec_id_9, 'Average');
																get_remark('MAPEH', $rec_id_9, 'Average');
																?>
															</tr>
															<tr>
																<td>Edukasyon sa Pagpapakatao (EsP)</td>
																<?php
																get_grade('Edukasyon sa Pagpapakatao', $rec_id_9, '1st');
																get_grade('Edukasyon sa Pagpapakatao', $rec_id_9, '2nd');
																get_grade('Edukasyon sa Pagpapakatao', $rec_id_9, '3rd');
																get_grade('Edukasyon sa Pagpapakatao', $rec_id_9, '4th');
																get_grade('Edukasyon sa Pagpapakatao', $rec_id_9, 'Average');
																get_remark('Edukasyon sa Pagpapakatao', $rec_id_9, 'Average');
																?>
															</tr>
															<tr>
																<td><b>Genral Average</b></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
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
														<td>Mga araw na pumasok</td>
														<?php 
														get_attendance_pre($rec_id_9, 'June');
														get_attendance_pre($rec_id_9, 'July');
														get_attendance_pre($rec_id_9, 'August');
														get_attendance_pre($rec_id_9, 'September');
														get_attendance_pre($rec_id_9, 'October');
														get_attendance_pre($rec_id_9, 'November');
														get_attendance_pre($rec_id_9, 'December');
														get_attendance_pre($rec_id_9, 'January');
														get_attendance_pre($rec_id_9, 'February');
														get_attendance_pre($rec_id_9, 'March');
														get_attendance_pre($rec_id_9, 'April');
														// get_attendance_pre($rec_id_9, 'May');
														?>
														<td></td>
													</tr>
													<tr>
														<td>Mga araw na hindi pumasok</td>
														<?php 
														get_attendance_abs($rec_id_9, 'June');
														get_attendance_abs($rec_id_9, 'July');
														get_attendance_abs($rec_id_9, 'August');
														get_attendance_abs($rec_id_9, 'September');
														get_attendance_abs($rec_id_9, 'October');
														get_attendance_abs($rec_id_9, 'November');
														get_attendance_abs($rec_id_9, 'December');
														get_attendance_abs($rec_id_9, 'January');
														get_attendance_abs($rec_id_9, 'February');
														get_attendance_abs($rec_id_9, 'March');
														get_attendance_abs($rec_id_9, 'April');
														// get_attendance_abs($rec_id_9, 'May');
														?>
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
										<center>
                                             <?php
                            $emp = $_SESSION['user_data']['acct']['emp_no'];
                            $get_RK = $mysqli->query("SELECT pims_personnel.emp_No as emp_
																	FROM pims_personnel, pims_employment_records, pims_job_title
																	WHERE pims_personnel.emp_No = pims_employment_records.emp_No
																	AND pims_job_title.job_title_code = pims_employment_records.job_title_code
																	AND pims_job_title.job_title_name = 'Record Keeper'")
															or die("<script>alert('Error getting record keeper');</script>");
		
										$res = $get_RK->fetch_assoc();
										
										if($emp == $res['emp_'])
										{
                            ?>
		  
										<div class="w3-button w3-circle w3-card-4 w3-green" title="Release F-137" style="height:50px;width:50px;padding:12px">
											<a href="#myModal<?php echo $lrn;?>" data-toggle="modal">
											<i class="fa fa-files-o fa-2x" data-toggle="modal" data-target="#myModal"> &nbsp;&nbsp;</i>
											</a>
										</div>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <?php
                                        }
                                            ?>
										
										<button type="button" onclick="print9()" class="w3-button w3-circle w3-card-4 w3-theme-bd3" title="Print F-138" style="height:50px;width:50px;padding:12px">
												<i class="fa fa-print fa-2x"> &nbsp;&nbsp;</i>
										</button>
										<!-- <a href="student_f138.php?v=<?php echo $lrn;?>&g=<?php echo "9";?>">
										<div class="w3-button w3-circle w3-card-4 w3-theme-bd3" title="Print F-138" style="height:50px;width:50px;padding:12px">
											<i class="fa fa-print fa-2x"> &nbsp;&nbsp;</i>
										</div>&nbsp;&nbsp;&nbsp;&nbsp;
										</a> -->
										</center>
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
														<?php
															// SELECT LRN SIS_STU_REC ID
															// FOR GRADE 9
															$get_stu_rec_id_9 = $mysqli->query("SELECT rec_id FROM sis_stu_rec, css_section
																								WHERE sis_stu_rec.section_id = css_section.SECTION_ID
																								AND css_section.YEAR_LEVEL = '9'
																								AND lrn = '$lrn'")
																					or die("<script>alert('Error in fetching grade 7 record');</script>");
															$res = $get_stu_rec_id_9->fetch_assoc();
															$rec_id_9 = $res['rec_id'];	
		
														?>
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
																<td>Filipino</td>
																<?php
																get_grade('Filipino', $rec_id_9, '1st');
																get_grade('Filipino', $rec_id_9, '2nd');
																get_grade('Filipino', $rec_id_9, '3rd');
																get_grade('Filipino', $rec_id_9, '4th');
																get_grade('Filipino', $rec_id_9, 'Average');
																get_remark('Filipino', $rec_id_9, 'Average');
																?>
															</tr>
															<tr>
																<td>English</td>
																<?php
																get_grade('English', $rec_id_9, '1st');
																get_grade('English', $rec_id_9, '2nd');
																get_grade('English', $rec_id_9, '3rd');
																get_grade('English', $rec_id_9, '4th');
																get_grade('English', $rec_id_9, 'Average');
																get_remark('English', $rec_id_9, 'Average');
																?>
															</tr>
															<tr>
																<td>Mathematics</td>
																<?php
																get_grade('Mathematics', $rec_id_9, '1st');
																get_grade('Mathematics', $rec_id_9, '2nd');
																get_grade('Mathematics', $rec_id_9, '3rd');
																get_grade('Mathematics', $rec_id_9, '4th');
																get_grade('Mathematics', $rec_id_9, 'Average');
																get_remark('Mathematics', $rec_id_9, 'Average');
																?>
															</tr>
															<tr>
																<td>Science</td>
																<?php
																get_grade('Science', $rec_id_9, '1st');
																get_grade('Science', $rec_id_9, '2nd');
																get_grade('Science', $rec_id_9, '3rd');
																get_grade('Science', $rec_id_9, '4th');
																get_grade('Science', $rec_id_9, 'Average');
																get_remark('Science', $rec_id_9, 'Average');
																?>
															</tr>
															<tr>
																<td>Araling Panlipunan</td>
																<?php
																get_grade('Araling Panlipunan', $rec_id_9, '1st');
																get_grade('Araling Panlipunan', $rec_id_9, '2nd');
																get_grade('Araling Panlipunan', $rec_id_9, '3rd');
																get_grade('Araling Panlipunan', $rec_id_9, '4th');
																get_grade('Araling Panlipunan', $rec_id_9, 'Average');
																get_remark('Araling Panlipunan', $rec_id_9, 'Average');
																?>
															</tr>
															<tr>
																<td>Technology and Livelihood Eduacation (TLE)</td>
																<?php
																get_grade('Technology and Livelihood Education', $rec_id_9, '1st');
																get_grade('Technology and Livelihood Education', $rec_id_9, '2nd');
																get_grade('Technology and Livelihood Education', $rec_id_9, '3rd');
																get_grade('Technology and Livelihood Education', $rec_id_9, '4th');
																get_grade('Technology and Livelihood Education', $rec_id_9, 'Average');
																get_remark('Technology and Livelihood Education', $rec_id_9, 'Average');
																?>
															</tr>
															<tr>
																<td>MAPEH</td>
																<?php
																get_grade('MAPEH', $rec_id_9, '1st');
																get_grade('MAPEH', $rec_id_9, '2nd');
																get_grade('MAPEH', $rec_id_9, '3rd');
																get_grade('MAPEH', $rec_id_9, '4th');
																get_grade('MAPEH', $rec_id_9, 'Average');
																get_remark('MAPEH', $rec_id_9, 'Average');
																?>
															</tr>
															<tr>
																<td>Edukasyon sa Pagpapakatao (EsP)</td>
																<?php
																get_grade('Edukasyon sa Pagpapakatao', $rec_id_9, '1st');
																get_grade('Edukasyon sa Pagpapakatao', $rec_id_9, '2nd');
																get_grade('Edukasyon sa Pagpapakatao', $rec_id_9, '3rd');
																get_grade('Edukasyon sa Pagpapakatao', $rec_id_9, '4th');
																get_grade('Edukasyon sa Pagpapakatao', $rec_id_9, 'Average');
																get_remark('Edukasyon sa Pagpapakatao', $rec_id_9, 'Average');
																?>
															</tr>
															<tr>
																<td><b>Genral Average</b></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
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
														<td>Mga araw na pumasok</td>
														<?php 
														get_attendance_pre($rec_id_9, 'June');
														get_attendance_pre($rec_id_9, 'July');
														get_attendance_pre($rec_id_9, 'August');
														get_attendance_pre($rec_id_9, 'September');
														get_attendance_pre($rec_id_9, 'October');
														get_attendance_pre($rec_id_9, 'November');
														get_attendance_pre($rec_id_9, 'December');
														get_attendance_pre($rec_id_9, 'January');
														get_attendance_pre($rec_id_9, 'February');
														get_attendance_pre($rec_id_9, 'March');
														get_attendance_pre($rec_id_9, 'April');
														// get_attendance_pre($rec_id_9, 'May');
														?>
														<td></td>
													</tr>
													<tr>
														<td>Mga araw na hindi pumasok</td>
														<?php 
														get_attendance_abs($rec_id_9, 'June');
														get_attendance_abs($rec_id_9, 'July');
														get_attendance_abs($rec_id_9, 'August');
														get_attendance_abs($rec_id_9, 'September');
														get_attendance_abs($rec_id_9, 'October');
														get_attendance_abs($rec_id_9, 'November');
														get_attendance_abs($rec_id_9, 'December');
														get_attendance_abs($rec_id_9, 'January');
														get_attendance_abs($rec_id_9, 'February');
														get_attendance_abs($rec_id_9, 'March');
														get_attendance_abs($rec_id_9, 'April');
														// get_attendance_abs($rec_id_9, 'May');
														?>
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
										<center>
										<div class="w3-button w3-circle w3-card-4 w3-green" title="Release F-137" style="height:50px;width:50px;padding:12px">
											<a href="#myModal<?php echo $lrn;?>" data-toggle="modal">
											<i class="fa fa-files-o fa-2x" data-toggle="modal" data-target="#myModal"> &nbsp;&nbsp;</i>
											</a>
										</div>&nbsp;&nbsp;&nbsp;&nbsp;
										
										<button type="button" onclick="print9()" class="w3-button w3-circle w3-card-4 w3-theme-bd3" title="Print F-138" style="height:50px;width:50px;padding:12px">
												<i class="fa fa-print fa-2x"> &nbsp;&nbsp;</i>
										</button>
										<!-- <a href="student_f138.php?v=<?php echo $lrn;?>&g=<?php echo "9";?>">
										<div class="w3-button w3-circle w3-card-4 w3-theme-bd3" title="Print F-138" style="height:50px;width:50px;padding:12px">
											<i class="fa fa-print fa-2x"> &nbsp;&nbsp;</i>
										</div>&nbsp;&nbsp;&nbsp;&nbsp;
										</a> -->
										</center>
											</div>









									</div>
							</div>
						</div>
					</div>

								




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
		
                            <?php
                            $emp = $_SESSION['user_data']['acct']['emp_no'];
                            $get_RK = $mysqli->query("SELECT pims_personnel.emp_No as emp_
																	FROM pims_personnel, pims_employment_records, pims_job_title
																	WHERE pims_personnel.emp_No = pims_employment_records.emp_No
																	AND pims_job_title.job_title_code = pims_employment_records.job_title_code
																	AND pims_job_title.job_title_name = 'Record Keeper'")
															or die("<script>alert('Error getting record keeper');</script>");
		
										$res = $get_RK->fetch_assoc();
										
										if($emp == $res['emp_'])
										{
                            ?>
		  
							<br>
                            <form action="update.php" method="get" enctype="multipart/form-data">
                        	<center>
                            <input hidden name="lrn" id="lrn" value="<?php echo base64_encode($lrn);?>">
                            <button type="submit" class="btn w3-hover-blue w3-theme-bl1 w3-card-2" >
                                <i class="fa fa-edit"></i>&nbsp;Update
                            </button>
                            &nbsp;&nbsp;&nbsp;	
							<a href="process/transfer_out.php?n=<?php echo base64_encode($lrn);?>">
                            <button type="submit" form="del" class="btn w3-hover-red w3-theme-rl1 w3-card-2">
                                &nbsp;Transfer Out&nbsp;
                            </button>
                        </a>
                        </center>
                        </form>
                        <br>
                        <br>

                            <?php
                            }
                            ?>


                        </div>
                    </div>
                    <!-- End of Tab Content -->
                </div>
                <!-- End of Panel Body-->
            </div>
            <!-- End of Col -->
        </div>
        <br><br><br><br><br><br><br><br>
        <!-- Edn of Row -->
        
    </div>
	<?php 
            include("../footer.php");
        ?>
        
<script src='../js1/jquery.min.js'></script>
<script src='../js1/bootstrap.min.js'></script>
<script src="../js/index.js"></script>
<script src="../../../js/metisMenu.min.js"></script>
<script src="../../../js/sb-admin-2.min.js"></script>


<script src="../js/sweetalert.js"></script>

	<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
$(document).ready(function () {
	$('#dataTables-example').DataTable({
		responsive: true
	});
});

function print7()
{
	window.location = 'student_f138.php?v=<?php echo $lrn;?>&g=<?php echo "7";?>'
}

function print8()
{
	window.location = 'student_f138.php?v=<?php echo $lrn;?>&g=<?php echo "8";?>'
}

function print9()
{
	window.location = 'student_f138.php?v=<?php echo $lrn;?>&g=<?php echo "9";?>'
}

function print10()
{
	window.location = 'student_f138.php?v=<?php echo $lrn;?>&g=<?php echo "10";?>'
}

</script>
</body>

</html>