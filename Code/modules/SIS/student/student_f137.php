<?php
include_once('../db_con_i.php');
session_start();
include("../session.php");

if(isset($_GET['l']))
{
	$lrn = $_GET['l'];
}
else
{
	header('Location: ../student_list.php');
}

$get_student = $mysqli->query("SELECT * FROM sis_student WHERE lrn = $lrn");
$get_stu_parent = $mysqli->query("SELECT * FROM sis_parent_guardian WHERE lrn = $lrn");

$get_section_7 = $mysqli->query("SELECT SECTION_NAME, year FROM sis_stu_rec, css_section, css_school_yr
								WHERE sis_stu_rec.section_id = css_section.SECTION_ID
								AND sis_stu_rec.sy_id = css_school_yr.sy_id
								AND YEAR_lEVEL = '7'
								AND lrn = $lrn")
					or die("<script>alert('Error in fetching sectoin data');</script>");

$get_section_8 = $mysqli->query("SELECT SECTION_NAME, year FROM sis_stu_rec, css_section, css_school_yr
								WHERE sis_stu_rec.section_id = css_section.SECTION_ID
								AND sis_stu_rec.sy_id = css_school_yr.sy_id
								AND YEAR_lEVEL = '8'
								AND lrn = $lrn")
					or die("<script>alert('Error in fetching sectoin data');</script>");

$get_section_9 = $mysqli->query("SELECT SECTION_NAME, year FROM sis_stu_rec, css_section, css_school_yr
								WHERE sis_stu_rec.section_id = css_section.SECTION_ID
								AND sis_stu_rec.sy_id = css_school_yr.sy_id
								AND YEAR_lEVEL = '9'
								AND lrn = $lrn")
					or die("<script>alert('Error in fetching sectoin data');</script>");

$get_section_10 = $mysqli->query("SELECT SECTION_NAME, year FROM sis_stu_rec, css_section, css_school_yr
								WHERE sis_stu_rec.section_id = css_section.SECTION_ID
								AND sis_stu_rec.sy_id = css_school_yr.sy_id
								AND YEAR_lEVEL = '10'
								AND lrn = $lrn")
					or die("<script>alert('Error in fetching sectoin data');</script>");


	$pg = $get_stu_parent->fetch_assoc();
	$stu = $get_student->fetch_assoc();

	$sec7 = $get_section_7->fetch_assoc();
				
    $bday = $stu['sis_b_day'];
    $bdate = explode("-", $bday);
	$month = date('F', mktime(0, 0, 0, $bdate[1]));
	

	$get_stu_rec_id_7 = $mysqli->query("SELECT rec_id FROM sis_stu_rec, css_section
									WHERE sis_stu_rec.section_id = css_section.SECTION_ID
									AND css_section.YEAR_LEVEL = '7'
									AND lrn = '$lrn'")
						or die("<script>alert('Error in fetching grade record');</script>");
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
		echo '<td><center>' . $present . '</center></td>';
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
		echo '<td><center>' . $absent . '</center></td>';
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


$total_present = $mysqli->query("SELECT SUM(total_days_present) AS day FROM sis_attendance, sis_stu_rec, css_school_yr
							WHERE sis_stu_rec.rec_id = sis_attendance.rec_id
							AND sis_stu_rec.sy_id = css_school_yr.sy_id
							AND status = 'active'
							AND lrn = '$lrn'")
					or die($mysqli->error);
$t_pres = $total_present->fetch_assoc();

$total_absent = $mysqli->query("SELECT SUM(total_days_absent) AS day FROM sis_attendance, sis_stu_rec, css_school_yr
						WHERE sis_stu_rec.rec_id = sis_attendance.rec_id
						AND sis_stu_rec.sy_id = css_school_yr.sy_id
						AND status = 'active'
						AND lrn = '$lrn'")
				or die($mysqli->error);
$t_abs = $total_absent->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Browser's Tab Title -->
    <title>Form 137</title>
    
    <link href="../Template%20(reference)/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- Browser's Tab Image -->
    <link rel="shortcut icon" href="../docs/pnhs_img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../docs/img/pnhs_favicon.ico" type="image/x-icon">

<style>
#myBtn {
    display: none; /* Hidden by default */
    position: fixed; /* Fixed/sticky position */
    bottom: 20px; /* Place the button at the bottom of the page */
    right: 30px; /* Place the button 30px from the right */
    z-index: 99; /* Make sure it does not overlap */
    border: none; /* Remove borders */
    outline: none; /* Remove outline */
    background-color: red; /* Set a background color */
    color: white; /* Text color */
    cursor: pointer; /* Add a mouse pointer on hover */
    padding: 15px; /* Some padding */
    border-radius: 10px; /* Rounded corners */
}

#myBtn:hover {
    background-color: #555; /* Add a dark-grey background on hover */
}
.affix {
    top: 20px;
}
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    font-size:13px;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 2px;
}
th {
    text-align:center;
}
</style>
</head>

<body>
<div id="tbExport">
    <img src="../docs/img/depeddivileg.png" style="max-width:100px;position:absolute;margin-left:50px">
    <img src="../docs/img/pnhs_logo.png" style="max-width:100px;position:absolute;margin-left:560px">
    <center>
        Republic of the Philippines<br>
        Department of Education<br>
        Region V (Bicol)<br>
        PAG-ASA NATIONAL HIGH SCHOOL<br>
        Rawis, Legazpi City<br>
        SECONDARY STUDENT'S PERMANENT RECORD
    </center>
    
    <table style="margin-top:10px">
        <tbody>
            <tr>
                <td><b>Name</b></td>
                <td colspan="2"><?php echo $stu['stu_lname'] . ", " . $stu['stu_fname'] . " " . $stu['stu_mname'];?></td>
                <td><b>Address</b></td>
                <td colspan="2"><?php echo $stu['house_no'] . ", " . $stu['street'] . ", " . $stu['brng'] . ", " . $stu['munic'];?></td>
                <td><b>Date of Birth</b></td>
                <td><?php echo $month . " " . $bdate[2] . ", " . $bdate[0];?></td>
            </tr>
            <tr>
                <td><b>Sex</b></td>
                <td><?php echo $stu['sis_gender'];?></td>
                <td colspan="3"><b>Course Finished in Primary School</b></td>
                <td>Welding</td>
                <td><b>Place of Birth</b></td>
                <td><?php echo $stu['plc_birth'];?></td>
            </tr>
            <tr>
                <td><b>LRN</b></td>
                <td><?php echo $stu['lrn'];?></td>
                <td><b>Parents/Guardian</b></td>
                <td colspan="3"><?php echo $pg['sis_f_fname'] . ' ' . $pg['sis_f_mname'] . ' ' . $pg['sis_f_lname'];?></td>
                <td><b>Occupation</b></td>
                <td><?php echo $pg['sis_f_work'];?></td>
            </tr>
        </tbody>
    </table>
    <hr style="max-width:100%;height:3px;background-color:black">
    <table style="margin-top:10px">
        <tbody>
            <tr>
                <td><b>School</b></td>
                <td colspan="3">Gubat National High School</td>
                <td colspan="3"><b>Total Number of Years of Study at Present</b></td>
                <td>7</td>
            </tr>
            <tr>
                <td><b>Curiculom</b></td>
                <td>DepEd Basic Curiculom</td>  
                <td><b>Grade</b></td>
                <td>7</td>
                <td><b>Section</b></td>
                <td><?php echo $sec7['SECTION_NAME'];?></td>
                <td><b>School Year</b></td>
                <td><?php echo $sec7['year'];?></td>
            </tr>
        </tbody>
    </table>
    <table style="margin-top:10px">
        <thead>
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
				<?php
				get_grade('Filipino', $rec_id_7, '1st');
				get_grade('Filipino', $rec_id_7, '2nd');
				get_grade('Filipino', $rec_id_7, '3rd');
				get_grade('Filipino', $rec_id_7, '4th');
				get_grade('Filipino', $rec_id_7, 'Average');
				get_remark('Filipino', $rec_id_7, 'Average');
				?>
				<td></td>
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
				<td></td>
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
				<td></td>
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
				<td></td>
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
				<td></td>
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
				<td></td>
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
				<td></td>
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
				<td></td>
			</tr>
			<tr>
                <td><b>General Average</b></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center><?php get_final($rec_id_7, 'Final');?></center></td>
                <td><center></center></td>
            </tr>
        </tbody>
    </table>
    <table style="margin-top:10px">
        <thead>
            <tr>
                <th rowspan="2"></th>
                <th colspan="11">Month</th>
                <th rowspan="2">Total</th>
            </tr>
            <tr>
                <th>Jun</th>
                <th>Jul</th>
                <th>Aug</th>
                <th>Sep</th>
                <th>Oct</th>
                <th>Nov</th>
                <th>Dec</th>
                <th>Jan</th>
                <th>Feb</th>
                <th>Mar</th>
                <th>Apr</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>No. of Days Present</td>
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
				?>
                <td><center><?php echo $t_pres['day']?></center></td>
            </tr>
            <tr>
                <td>No. of Days Absent</td>
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
				<td><center><?php echo $t_abs['day']?></center></td>
            </tr>
        </tbody>
    </table>
    <table style="margin-top:10px">
        <tr>
            <td>
                <table>
                    <tbody>
                        <tr>
                            <td>May paunang yunit sa</td>
                            <td><td>
                        </tr>
                        <tr>
                            <td>Kulang ng yunt sa</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Kabuuang taon sa paaralan hanggang sa kasalukuyan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Kabuuang yunit sa kasalukuyan</td>
                            <td></td>
                        </tr> 
                    </tbody>
                </table>
            </td>
            <td>
                <table>
                    <tbody>
                        <tr>
                            <td style="padding:20px">
                                <hr style="width:130px;height:1px;background-color:black;margin-top:25px">
                                <h4 style="margin-top:1px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Adviser</h4>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>
    <hr style="max-width:100%;height:3px;background-color:black">
    <table style="margin-top:10px">
        <tbody>
            <tr>
                <td><b>School</b></td>
                <td colspan="3">Gubat National High School</td>
                <td colspan="3"><b>Total Number of Years of Study at Present</b></td>
                <td>7</td>
            </tr>
            <tr>
                <td><b>Curiculom</b></td>
                <td>DepEd Basic Curiculom</td>  
                <td><b>Grade</b></td>
                <td>VII</td>
                <td><b>Section</b></td>
                <td>SPED</td>
                <td><b>School Year</b></td>
                <td>2017-3000</td>
            </tr>
        </tbody>
    </table>
    <table style="margin-top:10px">
        <thead>
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
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
            </tr>
            <tr>
                <td>English</td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
            </tr>
            <tr>
                <td>Mathematics</td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
            </tr>
            <tr>
                <td>Science</td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
            </tr>
            <tr>
                <td>Araling Panlipunan (AP)</td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
            </tr>
            <tr>
                <td>Technology and Livelihood Education (TLE)</td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
            </tr>
            <tr>
                <td>MAPEH</td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
            </tr>
            <tr>
                <td>Edukasyon sa Pagpapakatao (Esp)</td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
            </tr>
            <tr>
                <td><b>General Average</b></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
            </tr>
        </tbody>
    </table>
    <table style="margin-top:10px">
        <th>Legend</th>
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
        </tbody>
    </table>
    <table style="margin-top:10px">
        <thead>
            <tr>
                <th rowspan="2"></th>
                <th colspan="11">Month</th>
                <th rowspan="2">Total</th>
            </tr>
            <tr>
                <th>Jun</th>
                <th>Jul</th>
                <th>Aug</th>
                <th>Sep</th>
                <th>Oct</th>
                <th>Nov</th>
                <th>Dec</th>
                <th>Jan</th>
                <th>Feb</th>
                <th>Mar</th>
                <th>Apr</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>No. of Days Present</td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
            </tr>
            <tr>
                <td>No. of Days Absent</td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
            </tr>
        </tbody>
    </table>
    <table style="margin-top:10px">
        <tr>
            <td>
                <table>
                    <tbody>
                        <tr>
                            <td>May paunang yunit sa</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Kulang ng yunt sa</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Kabuuang taon sa paaralan hanggang sa kasalukuyan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Kabuuang yunit sa kasalukuyan</td>
                            <td></td>
                        </tr> 
                    </tbody>
                </table>
            </td>
            <td>
                <table>
                    <tbody>
                        <tr>
                            <td style="padding:20px">
                                <hr style="width:130px;height:1px;background-color:black;margin-top:25px">
                                <h4 style="margin-top:1px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Adviser</h4>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>
    <hr style="max-width:100%;height:3px;background-color:black">
    <table style="margin-top:10px">
        <tbody>
            <tr>
                <td><b>School</b></td>
                <td colspan="3">Gubat National High School</td>
                <td colspan="3"><b>Total Number of Years of Study at Present</b></td>
                <td>7</td>
            </tr>
            <tr>
                <td><b>Curiculom</b></td>
                <td>DepEd Basic Curiculom</td>  
                <td><b>Grade</b></td>
                <td>VII</td>
                <td><b>Section</b></td>
                <td>SPED</td>
                <td><b>School Year</b></td>
                <td>2017-3000</td>
            </tr>
        </tbody>
    </table>
    <table style="margin-top:10px">
        <thead>
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
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
            </tr>
            <tr>
                <td>English</td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
            </tr>
            <tr>
                <td>Mathematics</td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
            </tr>
            <tr>
                <td>Science</td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
            </tr>
            <tr>
                <td>Araling Panlipunan (AP)</td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
            </tr>
            <tr>
                <td>Technology and Livelihood Education (TLE)</td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
            </tr>
            <tr>
                <td>MAPEH</td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
            </tr>
            <tr>
                <td>Edukasyon sa Pagpapakatao (Esp)</td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
            </tr>
            <tr>
                <td><b>General Average</b></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
            </tr>
        </tbody>
    </table>
    <table style="margin-top:10px">
        <thead>
            <tr>
                <th rowspan="2"></th>
                <th colspan="11">Month</th>
                <th rowspan="2">Total</th>
            </tr>
            <tr>
                <th>Jun</th>
                <th>Jul</th>
                <th>Aug</th>
                <th>Sep</th>
                <th>Oct</th>
                <th>Nov</th>
                <th>Dec</th>
                <th>Jan</th>
                <th>Feb</th>
                <th>Mar</th>
                <th>Apr</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>No. of Days Present</td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
            </tr>
            <tr>
                <td>No. of Days Absent</td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
            </tr>
        </tbody>
    </table>
    <table style="margin-top:10px">
        <tr>
            <td>
                <table>
                    <tbody>
                        <tr>
                            <td>May paunang yunit sa</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Kulang ng yunt sa</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Kabuuang taon sa paaralan hanggang sa kasalukuyan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Kabuuang yunit sa kasalukuyan</td>
                            <td></td>
                        </tr> 
                    </tbody>
                </table>
            </td>
            <td>
                <table>
                    <tbody>
                        <tr>
                            <td style="padding:20px">
                                <hr style="width:130px;height:1px;background-color:black;margin-top:25px">
                                <h4 style="margin-top:1px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Adviser</h4>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>
    <hr style="max-width:100%;height:3px;background-color:black">
    <table style="margin-top:10px">
        <tbody>
            <tr>
                <td><b>School</b></td>
                <td colspan="3">Gubat National High School</td>
                <td colspan="3"><b>Total Number of Years of Study at Present</b></td>
                <td>7</td>
            </tr>
            <tr>
                <td><b>Curiculom</b></td>
                <td>DepEd Basic Curiculom</td>  
                <td><b>Grade</b></td>
                <td>VII</td>
                <td><b>Section</b></td>
                <td>SPED</td>
                <td><b>School Year</b></td>
                <td>2017-3000</td>
            </tr>
        </tbody>
    </table>
    <table style="margin-top:10px">
        <thead>
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
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
            </tr>
            <tr>
                <td>English</td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
            </tr>
            <tr>
                <td>Mathematics</td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
            </tr>
            <tr>
                <td>Science</td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
            </tr>
            <tr>
                <td>Araling Panlipunan (AP)</td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
            </tr>
            <tr>
                <td>Technology and Livelihood Education (TLE)</td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
            </tr>
            <tr>
                <td>MAPEH</td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
            </tr>
            <tr>
                <td>Edukasyon sa Pagpapakatao (Esp)</td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
            </tr>
            <tr>
                <td><b>General Average</b></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
            </tr>
        </tbody>
    </table>
    <table style="margin-top:10px">
        <th>Legend</th>
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
        </tbody>
    </table>
    <table style="margin-top:10px">
        <thead>
            <tr>
                <th rowspan="2"></th>
                <th colspan="11">Month</th>
                <th rowspan="2">Total</th>
            </tr>
            <tr>
                <th>Jun</th>
                <th>Jul</th>
                <th>Aug</th>
                <th>Sep</th>
                <th>Oct</th>
                <th>Nov</th>
                <th>Dec</th>
                <th>Jan</th>
                <th>Feb</th>
                <th>Mar</th>
                <th>Apr</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>No. of Days Present</td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
            </tr>
            <tr>
                <td>No. of Days Absent</td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
                <td><center></center></td>
            </tr>
        </tbody>
    </table>
    <table style="margin-top:10px">
        <tr>
            <td>
                <table>
                    <tbody>
                        <tr>
                            <td>May paunang yunit sa</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Kulang ng yunt sa</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Kabuuang taon sa paaralan hanggang sa kasalukuyan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Kabuuang yunit sa kasalukuyan</td>
                            <td></td>
                        </tr> 
                    </tbody>
                </table>
            </td>
            <td>
                <table>
                    <tbody>
                        <tr>
                            <td style="padding:20px">
                                <hr style="width:130px;height:1px;background-color:black;margin-top:25px">
                                <h4 style="margin-top:1px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Adviser</h4>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>
    <hr style="max-width:100%;height:3px;background-color:black">
    </div>

    <button id="myBtn" onclick="printDiv('tbExport')" class="btn btn-primary" data-spy="affix" data-offset-top="500">
    <i class="fa fa-print">  Print</i>
    </button>

    <script>
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};
    
    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("myBtn").style.display = "block";
        } else {
            document.getElementById("myBtn").style.display = "none";
        }
    }

        function printDiv(divName) {
         var printContents = document.getElementById(divName).innerHTML;
         var originalContents = document.body.innerHTML;
    
         document.body.innerHTML = printContents;
    
         window.print();
    
         document.body.innerHTML = originalContents;
    }
    </script>
</body>
</html>