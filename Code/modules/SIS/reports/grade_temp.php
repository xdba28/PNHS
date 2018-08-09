<?php
include('../PHPExcel/Classes/PHPExcel.php'); // including of PHPExcel library
session_start();
include("../session.php");

$file_name = 'Grade Form.xlsx';

$objPHPExcel = new PHPExcel();

$excel_worksheet = $objPHPExcel->setActiveSheetIndex(0);

$exam_worksheet = $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:B4');
$exam_worksheet = $objPHPExcel->setActiveSheetIndex(0)->mergeCells('E1:J3');
$exam_worksheet = $objPHPExcel->setActiveSheetIndex(0)->mergeCells('E4:F4');
$exam_worksheet = $objPHPExcel->setActiveSheetIndex(0)->mergeCells('G4:H4');
$exam_worksheet = $objPHPExcel->setActiveSheetIndex(0)->mergeCells('I4:J4');

$excel_worksheet->setCellValue('A1', 'PAGASA GRADE FORM')
			   ->setCellValue('A5', 'LRN')
			   ->setCellValue('B5', 'Student Name')
			   ->setCellValue('C1', 'Grade & Section')
			   ->setCellValue('C2', 'Subject')
			   ->setCellValue('C3', 'Quarter')
			   ->setCellValue('C4', 'School Year')
			   ->setCellValue('C5', 'Grade')
			   ->setCellValue('D5', 'Mother Tongue')
			   ->setCellValue('E1', 'ATTENDANCE')
			   ->setCellValue('E4', 'MONTH')
			   ->setCellValue('E5', 'Present')
			   ->setCellValue('F5', 'Absent')
			   ->setCellValue('G4', 'MONTH')
			   ->setCellValue('G5', 'Present')
			   ->setCellValue('H5', 'Absent')
			   ->setCellValue('I4', 'MONTH')
			   ->setCellValue('I5', 'Present')
			   ->setCellValue('J5', 'Absent');

$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth('31');
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth('27');
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth('15');
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth('18');
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth('8');
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth('8');
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth('8');
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth('8');
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth('8');
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth('8');

$style = array(
	'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
	)
);

$excel_worksheet->getDefaultStyle()->applyFromArray($style);
	
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"); // format type
	header("Content-Disposition: attachment;filename=\"$file_name\""); // file name
	$objWriter->save('php://output');
?>