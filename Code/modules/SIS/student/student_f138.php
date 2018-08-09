<?php
include('../db_con_i.php');
session_start();
include("../session.php");

if(isset($_GET['v']))
{
    $lrn = $_GET['v'];
    $level = $_GET['g'];
}
else
{
    header('Location: student_list.php');
}

$get_section = $mysqli->query("SELECT section_name FROM sis_stu_rec, css_section, css_school_yr
								WHERE sis_stu_rec.section_id = css_section.section_id
								AND sis_stu_rec.sy_id = css_school_yr.sy_id
								AND year_level = '$level'")
						or die("<script>alert('Error in fetching section');</script>");

	$res = $get_section->fetch_assoc();
	$sec = $res['section_name'];

$get_stu_rec_id_7 = $mysqli->query("SELECT rec_id FROM sis_stu_rec, css_section
									WHERE sis_stu_rec.section_id = css_section.SECTION_ID
									AND css_section.YEAR_LEVEL = '$level'
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

// $cv = 'cv_1_1';



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Browser's Tab Title -->
    <title>Form 138</title>
    
    <link href="../Template%20(reference)/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- Browser's Tab Image -->
    <link rel="shortcut icon" href="../docs/pnhs_img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../docs/img/pnhs_favicon.ico" type="image/x-icon">

<style>
#myBtn1 {
    bottom: 20px; /* Place the button at the bottom of the page */
    right: 30px; /* Place the button 30px from the right */
    z-index: 99; /* Make sure it does not overlap */
    border: none; /* Remove borders */
    outline: none; /* Remove outline */
    background-color: green; /* Set a background color */
    color: white; /* Text color */
    cursor: pointer; /* Add a mouse pointer on hover */
    padding: 15px; /* Some padding */
    border-radius: 10px; /* Rounded corners */
    margin-top:10px;
}

#myBtn2 {
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
    margin-top:10px;
}


#myBtn:hover {
    background-color: #555; /* Add a dark-grey background on hover */
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
    <table>
        <tr>
            <td style="padding:20px">
                <table>
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
                            <td><center></center></td>
                            <td><center>
							<?php

							?>
							</center></td>
                            <td><center></center></td>
                            <td><center></center></td>
                        </tr>
                    </tbody>
                </table>
                <table style="margin-top:20px">
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
                <table style="margin-top:20px;margin-bottom:45px">
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
							// get_attendance_pre($rec_id_7, 'May');
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
            </td>
            <!--End of col-->
<?php

$get_student = $mysqli->query("SELECT stu_fname, stu_mname, stu_lname, sis_b_day, sis_gender
                            FROM sis_student WHERE lrn = '$lrn'")
                    or die("<script>alert('Error in fetching student data');</script>");

$res = $get_student->fetch_assoc();
$fname = $res['stu_fname'];
$mname = $res['stu_mname'];
$lname = $res['stu_lname'];
$bday = $res['sis_b_day'];
$gender = $res['sis_gender'];

$cur_year = date('Y');
$cur_month = date('m');
$cur_day = date('d');

$bdate = explode("-", $bday);

$year = $cur_year - $bdate[0];

if($cur_month==$bdate[1])
{
	if($cur_day==$bdate[2])
	{

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



?>
            <td style="padding:20px">
                <table>
                    <tbody>
                        <tr>
                            <td><center><b>Name</b></center></td>
                            <td><center><?php echo $lname . ", " . $fname . " " . $mname;?></center></td>
                        </tr>
                        <tr>
                            <td><center><b>Age</b><center></td>
                            <td><center><?php echo $year;?></center></td>
                        </tr>
                        <tr>
                            <td><center><b>Sex</b><center></td>
                            <td><center><?php echo $gender;?></center></td>
                        </tr>
                        <tr>
                            <td><center><b>Grade & Section</b><center></td>
                            <td><center><?php echo $level . '-' . $sec;?></center></td>
                        </tr>
                        <!-- <tr>
                            <td><b>Section</b></td>
                            <td><?php //echo $sec;?></td>
                        </tr> -->
                        <tr>
                            <td><center><b>LRN</b><center></td>
                            <td><center><?php echo $lrn;?></center></td>
                        </tr>
                    </tbody>
                </table>
                <table style="margin-top:20px">
                    <thead class="w3-theme-yl4">
					<?php
					function get_cv($cv, $lrn)
					{
						include('../db_con_i.php');
						$get_cv = $mysqli->query("SELECT $cv, sis_cv_quarter FROM sis_cv, sis_stu_rec, css_school_yr
													WHERE sis_stu_rec.rec_id = sis_cv.rec_id
													AND sis_stu_rec.sy_id = css_school_yr.sy_id
													AND lrn = '$lrn'
													AND status = 'active'
													ORDER BY sis_cv_quarter")
										or die($mysqli->error);
						$num_row = mysqli_num_rows($get_cv);
						$empty_row = 4 - $num_row;
						while($row = $get_cv->fetch_array())
						{
							echo '
							<td><center>'. $row[$cv] .'</center></td>';
						}
						
						while($empty_row!=0)
						{
							echo '
							<td><center></center></td>';
							$empty_row--;
						}
					}

					?>
                        <tr>
                            <th rowspan="2">Core Values</th>
                            <th rowspan="2">Behavior Statement</th>
                            <th colspan="4">QUARTER</th>
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
                            <td rowspan="2">Maka-Diyos</td>
                            <td>Expresses one's spiritual beliefs while respecting the spiritual beliefs of others.</td>
							<?php 
							get_cv('cv_1_1', $lrn);
							?>
                        </tr>
                        <tr>
                            <td>Shows adherence to ethical princinples by upholding truth.</td>
							<?php
							get_cv('cv_1_2', $lrn);
							?>
                        </tr>
                        <tr>
                            <td rowspan="2">Makatao</td>
                            <td>Is sensetive to individual, social, and cultural difference.</td>
							<?php
							get_cv('cv_2_1', $lrn);
							?>
                        </tr>
                        <tr>
                            <td>Demonstrates contributions toward solidarity.</td>
							<?php
							get_cv('cv_2_2', $lrn);
							?>
                        </tr>
                        <tr>
                            <td>Makakalikasan</td>
                            <td>Cares for the enviroment and utilizes resources wisely, judiciously, and economically.</td>
							<?php
							get_cv('cv_3', $lrn);
							?>
                        </tr>
                        <tr>
                            <td rowspan="2">Makabansa</td>
                            <td>Demonstrates pride in being a Filipino; exercises the rights and responsibilities if Filipino citizen.</td>
							<?php
							get_cv('cv_4_1', $lrn);
							?>
                        </tr>
                        <tr>
                            <td>Demonstrates appropriate behavior in carrying out activities in the school, community, and country.</td>
							<?php
							get_cv('cv_4_2', $lrn);
							?>
                        </tr>
                    </tbody>
                </table>
                <table style="margin-top:20px;border:2px">
                    <thead>
                        <th>Marking</th>
                        <th>Non-numerical Rating</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><center><b>AO</b></center></td>
                            <td><center>Always Observed</center></td>
                        </tr>
                        <tr>
                            <td><center><b>SO</b></center></td>
                            <td><center>Sometimes Observed</center></td>
                        </tr>
                        <tr>
                            <td><center><b>RO</b></center></td>
                            <td><center>Rarely Observed</center></td>
                        </tr>
                        <tr>
                            <td><center><b>NO</b></center></td>
                            <td><center>Not Observed</center></td>
                        </tr>
                    </tbody>
                </table>
                <table>
                    <tbody>
                        <tr>
                            <td style="padding:0px">
                                <hr style="width:200px;height:1px;background-color:black;margin-left:280px;margin-top:25px">
                                <h4 style="margin-left:360px;margin-top:3px">Adviser</h4>
                                <hr style="width:200px;height:1px;background-color:black;margin-left:15px;margin-top:0px">
                                <h4 style="margin-left:80px;margin-top:0px">Principal III</h4>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <!--End of col-->
        </tr>
        <!--End of row-->
    </table>
    </div>
    <center><button id="myBtn1" onclick="printDiv('tbExport')" class="btn w3-hover-green btn-success w3-card-2"><i class="fa fa-print">  Print</i></button>
    <a href="student_pi.php?lrn=<?php echo base64_encode($lrn);?>"><button id="myBtn2">  Back</button></a></center>

    <script>
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