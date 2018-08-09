<?php
include('../PHPExcel/Classes/PHPExcel.php'); // including of PHPExcel library
include('../db_con_i.php');
session_start();
include("../session.php");

$section = '7-DILIGENCE';
$sy = '2017-2018';

$file_name = 'Excel Result ' . $section . '.xlsx';

$objPHPExcel = new PHPExcel();
$exam_worksheet = $objPHPExcel->setActiveSheetIndex(0);
$exam_worksheet = $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:E2');

$exam_worksheet->setCellValue('A1', 'Exam Result')
			   ->setCellValue('A3', 'LRN')
			   ->setCellValue('B3', 'Name')
			   ->setCellValue('C3', 'State')
			   ->setCellValue('D3', 'Score')
			   ->setCellValue('E3', 'Equivalent')
			   ->setCellValue('F3', 'Remarks')
			   ->setCellValue('G3', 'Date Taken')
			   ->setCellValue('F1', 'Year & Section')
			   ->setCellValue('F2', 'School Year');

$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth('17');
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth('26');
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth('9');
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth('9');
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth('10');
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth('14');
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth('18');

$style = array(
	'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
	)
);

$exam_worksheet->getDefaultStyle()->applyFromArray($style);

$objPHPExcel->getActiveSheet()->getStyle("A1")->getFont()->setSize(14);

$sec_ex = explode("-" , $section);

$exam_worksheet->setCellValue('G1', $section)
			   ->setCellValue('G2', $sy);

$get_student = $mysqli->query("SELECT sis_student.lrn as lrn, year,
						stu_fname, stu_mname, stu_lname, exam_score, equivalent_grade, result_remarks, exam_datetime

						FROM sis_student, sis_stu_rec, css_section, css_school_yr, oes_exam_result
								WHERE sis_student.lrn = sis_stu_rec.lrn
								AND sis_stu_rec.section_id = css_section.section_id
								AND sis_stu_rec.sy_id = css_school_yr.sy_id
								AND sis_student.lrn = oes_exam_result.lrn
								AND css_school_yr.year = '$sy'
								AND year_level = '$sec_ex[0]'
								AND section_name = '$sec_ex[1]'")
						or die($mysqli->error);

	$excel_row = 4;

	while($data_row = $get_student->fetch_array())
	{
		$exam_worksheet->setCellValue('A'.$excel_row, $data_row['lrn'])
					->setCellValue('B'.$excel_row, $data_row['stu_fname'] .' '. $data_row['stu_mname'] .' '. $data_row['stu_lname'])
					->setCellValue('C'.$excel_row, 'Finished') // u dun know where to find this data
					->setCellValue('D'.$excel_row, $data_row['exam_score'])
					->setCellValue('E'.$excel_row, $data_row['equivalent_grade'])
					->setCellValue('F'.$excel_row, $data_row['result_remarks'])
					->setCellValue('G'.$excel_row, $data_row['exam_datetime']);
		$excel_row++;
	}
	
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"); // format type
	header("Content-Disposition: attachment;filename=\"$file_name\""); // file name
	$objWriter->save('php://output');
?>