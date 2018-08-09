<?php
session_start();
include_once('../db_con_i.php');
include('../session.php');

if(isset($_GET['lrn']))
{
    $lrn = base64_decode($_GET['lrn']);
}
else
{
    header('Location: student_list.php');
}

$get_all_section = $mysqli->query("SELECT SECTION_NAME, YEAR_LEVEL FROM css_section, css_school_yr
									WHERE css_section.sy_id = css_school_yr.sy_id
									AND status = 'active'")
                    or die("Error get_section: " .$mysqli->error);

$get_section = $mysqli->query("SELECT rec_id, css_section.SECTION_NAME AS section, css_section.YEAR_LEVEL AS lvl 
							FROM sis_stu_rec, css_section, css_school_yr
                            WHERE sis_stu_rec.section_id = css_section.SECTION_ID
							AND sis_stu_rec.sy_id = css_school_yr.sy_id
							AND status = 'active'
                            AND sis_stu_rec.lrn = '$lrn'")
                    or die("Error get_section: " .$mysqli->error);

$section = $get_section->fetch_assoc();
$sec =  $section['section'];
$yr_lvl = $section['lvl'];
$rec = $section['rec_id'];

$get_sy = $mysqli->query("SELECT year FROM css_school_yr, sis_stu_rec
                        WHERE css_school_yr.sy_id = sis_stu_rec.sy_id
						AND status = 'active'
                        AND lrn = '$lrn'")
                or die("Error get_sy: " . $mysqli->error);

$res = mysqli_fetch_assoc($get_sy);
$sy1 = $res['year'];

$get_student = $mysqli->query("SELECT * FROM sis_student WHERE lrn = '$lrn'")
                        or die("Error get_section: " . $mysqli->error);

while($row = $get_student->fetch_array())
{
    $status = $row['stu_status'];
	$contact = $row['stu_contact'];
	$img = $row['sis_image'];
	$elem = $row['sis_elem'];
	$acc = $row['accelerated'];
	$cct = $row['cct_recepient'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

	<!--new design-->

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
	    
    <script href="../Template%20(reference)/vendor/jquery.min.js"></script>
    <script href="../Template%20(reference)/vendor/bootstrap/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>
<?php include('../topnav.php');?>
<div style="padding-top:30px;" id="wrapper">
<?php 
 include("../sidenav.php"); 
?>

<div class="container-fluid w3-card-2" style="max-width:1310px; height:70px; margin-top:50px; border-radius:8px;background-color:#356d9a; color:#dfe7ef">
    <ul class="nav">
        <li><center><h1>Student Information Form</h1></center></li>
    </ul>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-md-4 w3-center">
            <div class="container thumbnail w3-card-4" style="max-width:300px; height:300px; margin-top:25px;position:relative">
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
                <form id="stu" action="process/update_student.php" method="post" enctype="multipart/form-data">
            </div>
            <center>
            <input type="file" name="pic" id="pic">
            </center>
        </div>
		
		
        <div class="col-lg-9 col-md-8">
			
			<div class="panel-body" style="max-width:100%; height:100%; margin-top:10px">
                        <!-- <ul class="nav nav-tabs nav-justified">
                            <li class="active">
                                <a href="#Stud_info" data-toggle="tab">
                                    <h3>Student Information</h3>
                                </a>
							</li>
						</ul> -->
		<div class="tab-pane fade in active" id="Stud_info">
            <div class="panel-body" style="max-width:100%; height:100%; margin-top:10px">
                <ul class="nav nav-pills nav-justified">
                    <li class="active">
						<a href="#General" data-toggle="tab">
							<h3>General</h3>
						</a>
					</li>
                    <li>
						<a href="#Parents" data-toggle="tab">
							<h3>Parents/Guardian</h3>
						</a>
					</li>
                    <li>
						<a href="#UpGrade" data-toggle="tab">
							<h3>Update Grade</h3>
						</a>
					</li>
                </ul>
                
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="General">
                        <h4><b>General Information</b></h4> 
                        <div class="table-responsive">
							<table>
								<tbody>
									<tr>
										<td>LRN</td>
                                        <td><input readonly class="form-control" name="lrn" id="lrn" value="<?php echo $row['lrn'];?>"></td>
                                    </tr>
                                    <tr>
										<td>Name</td>
                                        <td><input class="form-control" required placeholder="First" name="first" id="first" value="<?php echo $row['stu_fname'];?>"></td>
                                        <td><input class="form-control" required placeholder="Middle" name="middle" id="middle" value="<?php echo $row['stu_mname'];?>"></td>
                                        <td><input class="form-control" required placeholder="Last" name="last" id="last" value="<?php echo $row['stu_lname'];?>"></td>
                                    </tr>
                                    <tr>
										<td>Date of Birth</td>
                                        <td><input required class="form-control" required type="date" name="birth" value="<?php echo $row['sis_b_day'];?>"></td>
									</td>
								</tr>
								<tr>
									<td>Place of Birth&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td><input class="form-control" required name="plc_birth" id="plc_birth" value="<?php echo $row['plc_birth'];?>"></td>
								</tr>
								<tr>
									<td>Address</td>
									<td><input class="form-control" placeholder="House number" name="house_no" id="house_no" value="<?php echo $row['house_no'];?>"></td>
									<td><input class="form-control" placeholder="Street" name="street" id="street" value="<?php echo $row['street'];?>"></td>
								</tr>
								<tr>
									<td></td>
									<td><input class="form-control" required placeholder="Barangay" name="brng" id="brng" value="<?php echo $row['brng'];?>"></td>
									<td><input class="form-control" required placeholder="Municipality" name="munic" id="munic" value="<?php echo $row['munic'];?>"></td>
								</tr>
								<tr>
									<td>Sex</td>
									<td><input class="form-control" name="gender" id="gender" readonly value="<?php echo $row['sis_gender'];?>"</td>
								</tr>
								<tr>
									<td>Religion</td>
									<td><input class="form-control" required name="religion" id="religion" value="<?php echo $row['sis_religion'];?>"></td>
								</tr>
								<tr>
									<td>Mother Tongue</td>
									<td><input class="form-control" required name="m_tounge" id="m_tounge" value="<?php echo $row['m_tounge'];?>"></td>
								</tr>
								<tr>
									<td>Ethnic</td>
									<td><input class="form-control" name="ethnic" id="ethnic" value="<?php echo $row['ethnic'];?>"></td>
								</tr>
								<tr>
									<td>Grade Level & Section</td>
									<td>
										<select class="form-control" name="section" id="section">
										<?php
										while($row = $get_all_section->fetch_array())
										{
											if($yr_lvl == $row['YEAR_LEVEL'] && $sec == $row['SECTION_NAME'])
											{
												echo '
												<option selected value=' . $yr_lvl . '-' . $sec . '>' . $yr_lvl . '-' . $sec . '</option>';
											}
											else
											{
												echo '
												<option value=' . $row['YEAR_LEVEL'] . "-" . $row['SECTION_NAME'] . '>' . $row['YEAR_LEVEL'] . "-" . $row['SECTION_NAME'] . '</option>'; 
											}
										}
										?>
										</select>
									</td>
								</tr>
								<tr>
									<td>School Year</td>
									<td><input readonly class="form-control" name="sy" id="sy" value="<?php echo $sy1;?>"></td>
								</tr>
								<tr>
									<td>Status</td>
									<td><input required class="form-control" name="status" id="status" value="<?php echo $status;}?>"></td>
								</tr>
								<tr>
									<td>Elementary School</td>
									<td><input type="text" required class="form-control" name="elem" value="<?php echo $elem;?>"></td>
								</tr>
								<tr>
									<td>Cellphone Number &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
									<td><input class="form-control" name="contact" id="contact" value="<?php echo $contact;?>"></td>
								</tr>
									<tr>
										<td>Accelerated</td>
										<td>
											<select class="form-control" name="acce" id="acce">
												<option> --</option>
												<?php
												if($acc == 'Yes')
												{
													echo '
													<option selected value=' . $acc . '>' . $acc . '</option>';
												}
												else
												{
													echo '
													<option value="Yes">Yes</option>';
												}
												
												if($acc = 'No')
												{
													echo '
													<option selected value=' . $acc . '>' . $acc . '</option>';
												}
												else
												{
													echo '
													<option value="No">No</option>';
												}
												?>
											</td>
										</tr>
										<tr>
											<td>CCT Recepient</td>
											<td><input class="form-control" type="text" name="cct" value="<?php echo $cct;?>">
											</tr>
										</tbody>
									</table>
								</div>
									<br>
									<button ondblclick="validate()" form="stu" type="submit" class="btn w3-hover-green btn-success w3-card-2">
										<i class="fa fa-check"></i>&nbsp;Update</button>
										
										<a href="student_pi.php?lrn=<?php echo base64_encode($lrn);?>"><button type="button" class="btn w3-hover-red w3-theme-rl1 w3-card-2"><i class="fa fa-close"></i>&nbsp;Back</button></a>
							</div>
					<div class="tab-pane fade" id="Parents">
										<h4><b>Parents Information</b></h4>
										<div class="table-responsive">
                            <table class="table">
                                <thead>
<?php
$get_parent_guardian = $mysqli->query("SELECT * FROM sis_parent_guardian WHERE lrn = '$lrn'")
                            or die("Error get_parent_guardian: " . $mysqli->error);

        while($row = mysqli_fetch_array($get_parent_guardian))
        {
            $f_fname = $row['sis_f_fname'];
            $f_mname = $row['sis_f_mname'];
			$f_lname = $row['sis_f_lname'];
			$f_work = $row['sis_f_work'];
            $m_fname = $row['sis_m_fname'];
            $m_mname = $row['sis_m_mname'];
			$m_lname = $row['sis_m_lname'];
			$m_work = $row['sis_m_work'];
            $g_fname = $row['sis_g_fname'];
            $g_mname = $row['sis_g_mname'];
            $g_lname = $row['sis_g_lname'];
            $relat = $row['guardian_relation'];
            $cont_f = $row['f_contact'];
            $cont_m = $row['m_contact'];
			$cont_g = $row['g_contact'];
			$f_ext = $row['sis_f_ext'];
			$m_ext = $row['sis_m_ext'];
			$g_ext = $row['sis_g_ext'];
?>
                                    <tr>
                                        <th>#</th>
                                        <th>First name</th>
                                        <th>Middle name</th>
                                        <th>Last name</th>
                                    </tr>
                                </thead>
						<tbody>
							<tr>
                                <td>Father's Name</td>
                                <td><input class="form-control"  placeholder="First" value="<?php echo $f_fname;?>" name="f_fname" id="f_fname"></td>
                                <td><input class="form-control" required placeholder="Middle" value="<?php echo $f_mname;?>" name="f_mname" id="f_mname"></td>
                                <td><input class="form-control" required placeholder="Last" value="<?php echo $f_lname;?>" name="f_lname" id="f_lname"></td>
							</tr>
							<tr>
								<td>Father's Extension Name</td>
								<td><input type="text" class="form-control" placeholder="eg. Jr. Sr." name="F_ext" value="<?php echo $f_ext?>"></td>
							</tr>
							<tr>
								<td>Father's Occupation</td>
								<td><input type="text" class="form-control" name="f_work" value="<?php echo $f_work;?>"></td>
							</tr>
                            <tr>
                                <td>Father's Contact</td>
                                <td><input class="form-control" placeholder="###" value="<?php echo $cont_f;?>" name="cont_f" id="cont_f"></td>
                            </tr>
                            <tr>
                                <td>Mother's Name</td>
                                <td><input class="form-control" placeholder="First" value="<?php echo $m_fname;?>" name="m_fname" id="m_fname"></td>
                                <td><input class="form-control"  placeholder="Middle" value="<?php echo $m_mname;?>" name="m_mname" id="m_mname"></td>
                                <td><input class="form-control" placeholder="Last" value="<?php echo $m_lname;?>" name="m_lname" id="m_lname"></td>
							</tr>
							<tr>
								<td>Mother's Extention Name</td>
								<td><input type="text" class="form-control" placeholder="eg. Jr. Sr." name="M_ext" value="<?php echo $f_ext?>"></td>
							</tr>
							<tr>
								<td>Mother's Occupation</td>
								<td><input type="text" class="form-control" name="m_work" value="<?php echo $m_work?>"></td>
							</tr>
                            <tr>
                                <td>Mother's Conctact</td>
                                <td><input class="form-control" placeholder="###" value="<?php echo $cont_m;?>" name="cont_m" id="cont_m"></td>
                            </tr>
                            <tr>
                                <td>Guardian's Name</td>
                                <td><input class="form-control" placeholder="First" value="<?php echo $g_fname;?>" name="g_fname" id="g_fname"></td>
                                <td><input class="form-control" placeholder="Middle" value="<?php echo $g_mname;?>" name="g_mname" id="g_mname"></td>
                                <td><input class="form-control" placeholder="Last" value="<?php echo $g_lname;?>" name="g_lname" id="g_lname"></td>
                                <td><small><sup>*To be filled only if the student is in guardianship</sup></small></td>
							</tr>
							<tr>
								<td>Guardian's Extention Name</td>
								<td><input type="text" class="form-control" placeholder="eg. Jr. Sr." name="G_ext" value="<?php echo $g_ext?>"></td>
							</tr>
                            <tr>
                                <td>Guardian's Relationship</td>
                                <td><input class="form-control" name="rela" value="<?php echo $relat;?>" id="rela"></td>
                            </tr>
                            <tr>
                                <td>Guardian's Contact</td>
                                <td><input class="form-control" placeholder="###" value="<?php echo $cont_g;?>" name="cont_g" id="cont_g" value="<?php }?>"></td>
                            </tr>
                        </tbody>
							</table>
							<input type="hidden" name="img" value="<?php echo $img?>">
							<button ondblclick="validate()" form="stu" type="submit" class="btn w3-hover-green btn-success w3-card-2">
							<i class="fa fa-check"></i>&nbsp;Update</button>
							
							<a href="student_pi.php?lrn=<?php echo base64_encode($lrn);?>"><button type="button" class="btn w3-hover-red w3-theme-rl1 w3-card-2"><i class="fa fa-close"></i>&nbsp;Back</button></a>
							</div>

						</div>
						<div class="tab-pane" id="UpGrade">
								<h4><b>Update Grade</b></h4>
								<div class="table-responsive">
									<table class="table">
										<tbody>
											<tr>
												<td>Subject:</td>
												<td>
													<select id="sub" name="subject" class="form-control">
														<option value=""> --</option>
														<option value="Filipino">Filipino</option>
														<option value="English">English</option>
														<option value="Mathematics">Mathematics</option>
														<option value="Science">Science</option>
														<option value="Araling Panlipunan">Araling Panlipunan</option>
														<option value="Technology and Livelihood Education">Technology and Livelihood Eduacation (TLE)</option>
														<option value="MAPEH">MAPEH</option>
														<option value="Edukasyon sa Pagpapakatao">Edukasyon sa Pagpapakatao (EsP)</option>
														<option value="NULL">Genral Average</option>
													</select>
												</td>
												<br>
											</tr>
											<tr>
												<td>Quarter:</td>
												<td>
													<select id="qua" name="quarter" class="form-control">
														<option value=""> --</option>
														<option value="1st">1st</option>
														<option value="2nd">2nd</option>
														<option value="3rd">3rd</option>
														<option value="4th">4th</option>
														<option value="Average">Average Grade</option>
														<option value="Final">Final</option>
													</select>
												</td>
											</tr>
											<tr>
												<td>Grade Value:</td>
												<td>
													<div id="grade_value">
														<input id="grade" type="number" name="grade" class="form-control" value="">
													</div>
												</td>
											</tr>
										</tbody>
									</table>					
									<br>

								</tr>
								<input type="hidden" name="img" value="<?php echo $img?>">
								<button ondblclick="validate()" form="stu" type="submit" class="btn w3-hover-green btn-success w3-card-2">
								<i class="fa fa-check"></i>&nbsp;Update</button>
								
								<a href="student_pi.php?lrn=<?php echo base64_encode($lrn);?>"><button type="button" class="btn w3-hover-red w3-theme-rl1 w3-card-2"><i class="fa fa-close"></i>&nbsp;Back</button></a>
								</div>
							</div>		
                    
                    
                    
						
<?php

$get_active_grade = $mysqli->query("SELECT rec_id, year_level FROM sis_stu_rec, css_section, css_school_yr
									WHERE sis_stu_rec.section_id = css_section.section_id
									AND sis_stu_rec.sy_id = css_school_yr.sy_id
									AND css_school_yr.status = 'active'
									AND lrn = '$lrn'")
						or die("1".$mysqli->error);
	$res_active = $get_active_grade->fetch_assoc();
	$array_active = array($res_active['rec_id'], $res_active['year_level']);
	$RC_LVL = implode(":", $array_active);

$get_stu_rec_id_7 = $mysqli->query("SELECT rec_id FROM sis_stu_rec, css_section
						WHERE sis_stu_rec.section_id = css_section.SECTION_ID
						AND css_section.YEAR_LEVEL = '7'
						AND lrn = '$lrn'")
				or die("<script>alert('Error in fetching grade 7 record');</script>");
$res = $get_stu_rec_id_7->fetch_assoc();
$rec_id_7 = $res['rec_id'];

$get_stu_rec_id_8 = $mysqli->query("SELECT rec_id FROM sis_stu_rec, css_section
						WHERE sis_stu_rec.section_id = css_section.SECTION_ID
						AND css_section.YEAR_LEVEL = '8'
						AND lrn = '$lrn'")
				or die("<script>alert('Error in fetching grade 8 record');</script>");
$res = $get_stu_rec_id_8->fetch_assoc();
$rec_id_8 = $res['rec_id'];

$get_stu_rec_id_9 = $mysqli->query("SELECT rec_id FROM sis_stu_rec, css_section
						WHERE sis_stu_rec.section_id = css_section.SECTION_ID
						AND css_section.YEAR_LEVEL = '9'
						AND lrn = '$lrn'")
				or die("<script>alert('Error in fetching grade 9 record');</script>");
$res = $get_stu_rec_id_9->fetch_assoc();
$rec_id_9 = $res['rec_id'];

$get_stu_rec_id_10 = $mysqli->query("SELECT rec_id FROM sis_stu_rec, css_section
						WHERE sis_stu_rec.section_id = css_section.SECTION_ID
						AND css_section.YEAR_LEVEL = '10'
						AND lrn = '$lrn'")
				or die("<script>alert('Error in fetching grade 10 record');</script>");
$res = $get_stu_rec_id_10->fetch_assoc();
$rec_id_10 = $res['rec_id'];

function get_grade_7($sub, $rec, $qua, $act)
{
	include('../db_con_i.php');
	$act_ex = explode(":", $act);

	$get_grade = $mysqli->query("SELECT grade_val FROM sis_grade, sis_stu_rec, css_subject
								WHERE sis_grade.rec_id = sis_stu_rec.rec_id
								AND sis_grade.subject_id = css_subject.subject_id
								AND css_subject.sub_desc = '$sub'
								AND sis_stu_rec.rec_id = '$rec'
								AND sis_grade_quarter = '$qua'");
	$res = $get_grade->fetch_assoc();
	$grade = $res['grade_val'];
	if(mysqli_num_rows($get_grade) == 0)
	{
		echo '
		<td><input type="number" disabled class="form-control" min="65" max="100"></td>';
	}
	elseif($act_ex[0] == $rec && $act_ex[1] == 7)
	{
		echo '
		<td><input type="number" class="form-control" name="' . $qua.':'.$sub . '" value="' . $grade . '" min="65" max="100"></td>';
	}
	else
	{
		echo '
		<td><input type="number" class="form-control" disabled value="' . $grade . '" min="65" max="100"></td>';
	}
}

function get_grade_8($sub, $rec, $qua, $act)
{
	include('../db_con_i.php');
	$act_ex = explode(":", $act);

	$get_grade = $mysqli->query("SELECT grade_val FROM sis_grade, sis_stu_rec, css_subject
								WHERE sis_grade.rec_id = sis_stu_rec.rec_id
								AND sis_grade.subject_id = css_subject.subject_id
								AND css_subject.sub_desc = '$sub'
								AND sis_stu_rec.rec_id = '$rec'
								AND sis_grade_quarter = '$qua'");
	$res = $get_grade->fetch_assoc();
	$grade = $res['grade_val'];
	if(mysqli_num_rows($get_grade) == 0)
	{
		echo '
		<td><input type="number" disabled class="form-control" min="65" max="100"></td>';
	}
	elseif($act_ex[0] == $rec && $act_ex[1] == 8)
	{
		echo '
		<td><input type="number" class="form-control" name="' . $qua.':'.$sub . '" value="' . $grade . '" min="65" max="100"></td>';
	}
	else
	{
		echo '
		<td><input type="number" class="form-control" disabled value="' . $grade . '" min="65" max="100"></td>';
	}
}

function get_grade_9($sub, $rec, $qua, $act)
{
	include('../db_con_i.php');
	$act_ex = explode(":", $act);

	$get_grade = $mysqli->query("SELECT grade_val FROM sis_grade, sis_stu_rec, css_subject
								WHERE sis_grade.rec_id = sis_stu_rec.rec_id
								AND sis_grade.subject_id = css_subject.subject_id
								AND css_subject.sub_desc = '$sub'
								AND sis_stu_rec.rec_id = '$rec'
								AND sis_grade_quarter = '$qua'");
	$res = $get_grade->fetch_assoc();
	$grade = $res['grade_val'];
	if(mysqli_num_rows($get_grade) == 0)
	{
		echo '
		<td><input type="number" disabled class="form-control" min="65" max="100"></td>';
	}
	elseif($act_ex[0] == $rec && $act_ex[1] == 9)
	{
		echo '
		<td><input type="number" class="form-control" name="' . $qua.':'.$sub . '" value="' . $grade . '" min="65" max="100"></td>';
	}
	else
	{
		echo '
		<td><input type="number" class="form-control" disabled value="' . $grade . '" min="65" max="100"></td>';
	}
}

function get_grade_10($sub, $rec, $qua, $act)
{
	include('../db_con_i.php');
	$act_ex = explode(":", $act);

	$get_grade = $mysqli->query("SELECT grade_val FROM sis_grade, sis_stu_rec, css_subject
								WHERE sis_grade.rec_id = sis_stu_rec.rec_id
								AND sis_grade.subject_id = css_subject.subject_id
								AND css_subject.sub_desc = '$sub'
								AND sis_stu_rec.rec_id = '$rec'
								AND sis_grade_quarter = '$qua'");
	$res = $get_grade->fetch_assoc();
	$grade = $res['grade_val'];
	if(mysqli_num_rows($get_grade) == 0)
	{
		echo '
		<td><input type="number" disabled class="form-control" min="65" max="100"></td>';
	}
	elseif($act_ex[0] == $rec && $act_ex[1] == 10)
	{
		echo '
		<td><input type="number" class="form-control" name="' . $qua.':'.$sub . '" value="' . $grade . '" min="65" max="100"></td>';
	}
	else
	{
		echo '
		<td><input type="number" class="form-control" disabled value="' . $grade . '" min="65" max="100"></td>';
	}
}
?>

				</div>
				</div>
                </div>
            </div>
        </div>
        
	</div>
<script src="../Template%20(reference)/vendor/jquery/jquery.min.js"></script>
<script src="../Template%20(reference)/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../js/index.js"></script>
<script src="../../../js/metisMenu.min.js"></script>
<script src="../../../js/sb-admin-2.min.js"></script>
<script src="../js/sweetalert.js"></script>
<script src="../mustache/mustache.js"></script>

<script>
function validate()
{
	var lrn = document.forms["stu"]["lrn"].value;
	var f_fname = document.forms["stu"]["f_fname"].value;
	var f_mname = document.forms["stu"]["f_mname"].value;
	var f_lname = document.forms["stu"]["f_lname"].value;
	var m_fname = document.forms["stu"]["m_fname"].value;
	var m_mname = document.forms["stu"]["m_mname"].value;
	var m_lname = document.forms["stu"]["m_lname"].value;

	if(f_fname == '' || f_mname == '' || f_lname == '')
	{
		swal('Father\'s full name input required');
	}

	if(m_mname == '' || m_mname == '' || m_lname == '')
	{
		swal('Mother\'s full name input required');
	}
}

var sub = 0, qua = 0;
var lrn = <?php echo $lrn;?>;

var $div = $('#grade_value');

$('#sub').on('change', function()
{
	sub = $('#sub').val();
	grade_val()
})

$('#qua').on('change', function()
{
	qua = $('#qua').val();
	grade_val()
})

function grade_val()
{
	if(sub != '' && qua != '')
	{
		$.ajax(
		{
			type: 'POST',
			url: 'data_js/ajax_php/update_ajax.php',
			data: {
				quarter: qua,
				subject: sub,
				lrn: lrn
			},
			success: function(data)
			{
				if(data.length != 0)
				{
					$('#grade').val(data);
				}
				else
				{
					swal('No grade for this subject');
					$('#grade').val('');
				}
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
					console.log('jqXHR:');
					console.log(jqXHR);
					console.log('textStatus:');
					console.log(textStatus);
					console.log('errorThrown:');
					console.log(errorThrown);
				window.alert("Request Not sent");
			}
		})
	}
	else
	{
		$('#grade').val('');
	}
}
</script>
<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });
});
</script>
</div>
</div>
</div>
<?php include('../footer.php');?>
</body>
</html>
