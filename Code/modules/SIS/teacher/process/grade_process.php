<?php
require_once '../../Classes/PHPExcel.php';
include_once('../../db_con_i.php');
session_start();
include('../../func.php');
include('../../session.php');

if(isset($_POST['file']))
{
	$file = $_POST['file'];
}
else
{
	header('Location: ../student_list.php');
}

$target_dir = "../../excel/Grade Process/";
$target_file = $target_dir . basename($_POST['file']);      // excel directory + file name
$excel_file_type = pathinfo($target_file,PATHINFO_EXTENSION);
$excel_read = PHPExcel_IOFactory::identify($target_file);
$objPHPExcel = PHPExcel_IOFactory::createReader($excel_read);
$objPHPExcel->setReadDataOnly(true);
$objPHPExcel = $objPHPExcel->load($target_file);
$stu_worksheet = $objPHPExcel->getSheet(0);


$excel_temp = mysqli_real_escape_string($mysqli, trim($stu_worksheet->getCell('A' . '1')->getCalculatedValue()));

if($excel_temp == 'PAGASA GRADE FORM')
{

$grade_sec = $stu_worksheet->getCell('D' . '1')->getCalculatedValue();
$subject = $stu_worksheet->getCell('D' . '2')->getCalculatedValue();
$quarter = $stu_worksheet->getCell('D' . '3')->getCalculatedValue();
$sy = $stu_worksheet->getCell('D' . '4')->getCalculatedValue();
$_1stM = $stu_worksheet->getCell('E' . '4')->getCalculatedValue();
$_2ndM = $stu_worksheet->getCell('G' . '4')->getCalculatedValue();
$_3rdM = $stu_worksheet->getCell('I' . '4')->getCalculatedValue();

	$set_autocommit = $mysqli->query("SET AUTOCOMMIT = 1");
	$start_trans = $mysqli->query("START TRANSACTION");

	foreach($stu_worksheet->getRowIterator() as $row)
	{
		$rowIndex = $row->getRowIndex();
		if($rowIndex==1||$rowIndex==2||$rowIndex==3||$rowIndex==4||$rowIndex==5)continue;

		$lrn =	  $stu_worksheet->getCell('A' . $rowIndex)->getCalculatedValue();
		$grade =  $stu_worksheet->getCell('C' . $rowIndex)->getCalculatedValue();
		$remark = $stu_worksheet->getCell('D' . $rowIndex)->getCalculatedValue();
		$M1_pre = $stu_worksheet->getCell('E' . $rowIndex)->getCalculatedValue();
		$M1_abs = $stu_worksheet->getCell('F' . $rowIndex)->getCalculatedValue();
		$M2_pre = $stu_worksheet->getCell('G' . $rowIndex)->getCalculatedValue();
		$M2_abs = $stu_worksheet->getCell('H' . $rowIndex)->getCalculatedValue();
		$M3_pre = $stu_worksheet->getCell('I' . $rowIndex)->getCalculatedValue();
		$M3_abs = $stu_worksheet->getCell('J' . $rowIndex)->getCalculatedValue();

		$get_subject = $mysqli->query("SELECT subject_id FROM css_subject WHERE sub_desc = '$subject'")
								or die("<script>alert('Error in fetching subject ID');</script>");
		$res = $get_subject->fetch_assoc();
		$subject_id = $res['subject_id'];

		$GS_ex = explode("-", $grade_sec);
		$get_stu_rec = $mysqli->query("SELECT rec_id FROM sis_stu_rec, css_section, css_school_yr
										WHERE sis_stu_rec.section_id = css_section.SECTION_ID
										AND sis_stu_rec.sy_id = css_school_yr.sy_id
										AND lrn = '$lrn'
										AND section_name = '$GS_ex[1]'
										AND year_level = '$GS_ex[0]'
										AND status = 'active'")
								or die("<script>alert('Error in feching student record');</script>");
		$res = $get_stu_rec->fetch_assoc();
		$rec_id = $res['rec_id'];

		if(empty($subject) && $quarter == 'Final')
		{
			$insert_grade = $mysqli->query("INSERT INTO sis_grade(rec_id, grade_val, grade_remarks, sis_grade_quarter)
											VALUES('$rec_id', '$grade', '$remark', '$quarter')")
									or die($mysqli->error);
		}
		else
		{
			$insert_grade = $mysqli->query("INSERT INTO sis_grade(rec_id, subject_id, grade_val, grade_remarks, sis_grade_quarter)
											VALUES('$rec_id', '$subject_id', '$grade', '$remark', '$quarter')")
									or die("<script>alert('Error in inserting grade');</script>");
		}

		if($quarter != 'Final' && $quarter != 'Average')
		{
			if($quarter == '1st' || $quarter == '3rd')
			{
				if($_1stM != '' && $_2ndM != '' && $_3rdM != '')
				{
					$insert_attendance_M1 = $mysqli->query("INSERT INTO sis_attendance(attend_month, total_days_present, total_days_absent, rec_id)
														VALUES('$_1stM', '$M1_pre', '$M1_abs', '$rec_id')")
												or die("<script>alert('Error in inserting 1st month');</script>");
	
					$insert_attendance_M2 = $mysqli->query("INSERT INTO sis_attendance(attend_month, total_days_present, total_days_absent, rec_id)
														VALUES('$_2ndM', '$M2_pre', '$M2_abs', '$rec_id')")
												or die("<script>alert('Error in inserting 2nd month');</script>");
					
					$insert_attendance_M2 = $mysqli->query("INSERT INTO sis_attendance(attend_month, total_days_present, total_days_absent, rec_id)
														VALUES('$_3rdM', '$M3_pre', '$M3_abs', '$rec_id')")
												or die("<script>alert('Error in inserting 3rd month');</script>");
				}
			}
			elseif($quarter == '2nd' || $quarter == '4th')
			{
				if($_1stM != '' && $_2ndM != '')
				{
					$insert_attendance_M1 = $mysqli->query("INSERT INTO sis_attendance(attend_month, total_days_present, total_days_absent, rec_id)
															VALUES('$_1stM', '$M1_pre', '$M1_abs', '$rec_id')")
													or die("<script>alert('Error in inserting 1st month');</script>");
	
					$insert_attendance_M2 = $mysqli->query("INSERT INTO sis_attendance(attend_month, total_days_present, total_days_absent, rec_id)
														VALUES('$_2ndM', '$M2_pre', '$M2_abs', '$rec_id')")
													or die("<script>alert('Error in inserting 2nd month');</script>");
				}
			}
		}
	}
	$commit = $mysqli->query("COMMIT");
?>
<script>
	alert('Successfully submitted grade!');
	window.location = '../student_list.php';
</script>
<?php
}
elseif($excel_temp == "Report on Learner\'s Observed Values")
{
	$grade_sec = $stu_worksheet->getCell('M' . '2')->getCalculatedValue();
	$quarter = $stu_worksheet->getCell('M' . '3')->getCalculatedValue();
	$sy = $stu_worksheet->getCell('M' . '4')->getCalculatedValue();

	$set_autocommit = $mysqli->query("SET AUTOCOMMIT = 1");
	$start_trans = $mysqli->query("START TRANSACTION");

	foreach($stu_worksheet->getRowIterator() as $row)
	{
		$rowIndex = $row->getRowIndex();
		if($rowIndex==1||$rowIndex==2||$rowIndex==3||$rowIndex==4||$rowIndex==5)continue;

		$lrn = $stu_worksheet->getCell('A' . $rowIndex)->getCalculatedValue();
		$cv_1_1 = $stu_worksheet->getCell('C' . $rowIndex)->getCalculatedValue();
		$cv_1_2 = $stu_worksheet->getCell('D' . $rowIndex)->getCalculatedValue();
		$cv_2_1 = $stu_worksheet->getCell('E' . $rowIndex)->getCalculatedValue();
		$cv_2_2 = $stu_worksheet->getCell('F' . $rowIndex)->getCalculatedValue();
		$cv_3 = $stu_worksheet->getCell('G' . $rowIndex)->getCalculatedValue();
		$cv_4_1 = $stu_worksheet->getCell('H' . $rowIndex)->getCalculatedValue();
		$cv_4_2 = $stu_worksheet->getCell('I' . $rowIndex)->getCalculatedValue();

		$GS_ex = explode("-", $grade_sec);
		$get_stu_rec = $mysqli->query("SELECT rec_id FROM sis_stu_rec, css_section, css_school_yr
										WHERE sis_stu_rec.section_id = css_section.SECTION_ID
										AND sis_stu_rec.sy_id = css_school_yr.sy_id
										AND lrn = '$lrn'
										AND section_name = '$GS_ex[1]'
										AND year_level = '$GS_ex[0]'
										AND status = 'active'")
								or die("<script>alert('Error in feching student record');</script>");
		
		$res = $get_stu_rec->fetch_assoc();
		$rec_id = $res['rec_id'];

		$insert_cv = $mysqli->query("INSERT INTO sis_cv(rec_id, sis_cv_quarter, cv_1_1, cv_1_2,
														cv_2_1, cv_2_2, cv_3, cv_4_1, cv_4_2)
												VALUES('$rec_id', '$quarter', '$cv_1_1', '$cv_1_2',
													'$cv_2_1', '$cv_2_2', '$cv_3', '$cv_4_1', '$cv_4_2')")
										or die("<script>alert('Error in adding core value data');</script>");
	}
	$commit = $mysqli->query("COMMIT");
}
?>
<script>
	alert('Successfully submitted values!');
	window.location = '../student_list.php';
</script>