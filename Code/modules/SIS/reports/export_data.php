<html>
<head>

<title>PHP TEST FIELD</title>

</head>

<?php
// noobly made
include_once('db_con_i.php');
require_once 'Classes/PHPExcel.php';
$exp_exl = new PHPExcel();
$column = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", 
				"N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z",
				"AA", "AB", "AC", "AD", "AE", "AF", "AG", "AH", "AI", "AJ", "AK", "AL", "AM");

$count = 2;

$exp_exl->setActiveSheetIndex(0)
		->setCellValue($column[0] . 1, "LRN")
		->setCellValue($column[1] . 1, "First")
		->setCellValue($column[2] . 1, "Middle")
		->setCellValue($column[3] . 1, "Last")
		->setCellValue($column[4] . 1, "Birthday")
		->setCellValue($column[5] . 1, "Place of Birth")
		->setCellValue($column[6] . 1, "Gender")
		->setCellValue($column[7] . 1, "Religion")
		->setCellValue($column[8] . 1, "Mother Tounge")
		->setCellValue($column[9] . 1, "Ethnic")
		->setCellValue($column[10] . 1, "Status")
		->setCellValue($column[11] . 1, "Contact")
		->setCellValue($column[12] . 1, "Email")
		->setCellValue($column[13] . 1, "House Number")
		->setCellValue($column[14] . 1, "Street")
		->setCellValue($column[15] . 1, "Barangay")
		->setCellValue($column[16] . 1, "Municipality")
		->setCellValue($column[17] . 1, "Year Level")
		->setCellValue($column[18] . 1, "Section")
		->setCellValue($column[19] . 1, "School Year");

$get_student = $mysqli->query("SELECT * FROM sis_student")
		or die("Error " . $mysqli->error);

	while($row = $get_student->fetch_array())
	{
		$bday = explode("-", $row['sis_b_day']);
		$exp_exl->setActiveSheetIndex(0)
				->setCellValue($column[0] . $count, $row['lrn'])
				->setCellValue($column[1] . $count, $row['stu_fname'])
				->setCellValue($column[2] . $count, $row['stu_mname'])
				->setCellValue($column[3] . $count, $row['stu_lname'])
				->setCellValue($column[4] . $count, $bday[1] . "/" . $bday[2] . "/" . $bday[0])
				->setCellValue($column[5] . $count, $row['plc_birth'])
				->setCellValue($column[6] . $count, $row['sis_gender'])
				->setCellValue($column[7] . $count, $row['sis_religion'])
				->setCellValue($column[8] . $count, $row['m_tounge'])
				->setCellValue($column[9] . $count, $row['ethnic'])
				->setCellValue($column[10] . $count, $row['stu_status'])
				->setCellValue($column[11] . $count, $row['stu_contact'])
				->setCellValue($column[13] . $count, $row['house_no'])
				->setCellValue($column[14] . $count, $row['street'])
				->setCellValue($column[15] . $count, $row['brng'])
				->setCellValue($column[16] . $count, $row['munic']);

		$lrn = $row['lrn'];
		$get_section = $mysqli->query("SELECT SECTION_NAME, YEAR_LEVEL, year
									FROM sis_stu_rec, css_section, sis_student, css_school_yr
									WHERE sis_student.lrn = sis_stu_rec.lrn
									AND sis_stu_rec.section_id = css_section.SECTION_ID
									AND sis_stu_rec.sy_id = css_school_yr.sy_id
									AND sis_student.lrn = $lrn")
								or die("Error get_section: " . $mysqli->error);

		$res = $get_section->fetch_assoc();

		$exp_exl->setActiveSheetIndex(0)
				->setCellValue($column[17] . $count, $res['YEAR_LEVEL'])
				->setCellValue($column[18] . $count, $res['SECTION_NAME'])
				->setCellValue($column[19] . $count, $res['year']);

		$count++;
	}

	$exp_exl->setActiveSheetIndex(0);
	$wrt_exl = PHPExcel_IOFactory::createWriter($exp_exl, 'Excel2007'); // PHPExcel libraby create Excel
	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"); // format type
	header("Content-Disposition: attachment; filename=\"results.xlsx\""); // file name
	ob_clean();
	$wrt_exl->save('php://output');
	
?>

</html>