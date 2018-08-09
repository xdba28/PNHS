<?php
include('../PHPExcel/Classes/PHPExcel.php'); // including of PHPExcel library
session_start();
include("../session.php");

$file_name = 'Add Student Form.xlsx';

$objPHPExcel = new PHPExcel();
$excel_worksheet = $objPHPExcel->setActiveSheetIndex(0);

$excel_worksheet->setCellValue('A1', 'LRN')
			   ->setCellValue('B1', 'First')
			   ->setCellValue('C1', 'Middle')
			   ->setCellValue('D1', 'Last')
			   ->setCellValue('E1', 'Birthdate')
			   ->setCellValue('F1', 'Place of Birth')
			   ->setCellValue('G1', 'Sex')
			   ->setCellValue('H1', 'Religion')
			   ->setCellValue('I1', 'Mother Tongue')
			   ->setCellValue('J1', 'Ethnic')
			   ->setCellValue('K1', 'Status')
			   ->setCellValue('L1', 'Contact')
			   ->setCellValue('M1', 'Elementary School')
			   ->setCellValue('N1', 'House Number')
			   ->setCellValue('O1', 'Street')
			   ->setCellValue('P1', 'Barangay')
			   ->setCellValue('Q1', 'Municipality')
			   ->setCellValue('R1', 'Year Level & Section')
			   ->setCellValue('S1', 'School Year')
			   ->setCellValue('T1', 'Date Enrolled')
			   ->setCellValue('U1', 'Accelerated')
			   ->setCellValue('V1', 'CCT Recepient')
			   ->setCellValue('W1', 'Father\'s First name')
			   ->setCellValue('X1', 'Father\'s Middle name')
			   ->setCellValue('Y1', 'Father\'s Last name')
			   ->setCellValue('Z1', 'Father\'s Occupation')
			   ->setCellValue('AA1', 'Mother\'s First name')
			   ->setCellValue('AB1', 'Mother\'s Middle name')
			   ->setCellValue('AC1', 'Mother\'s Last name')
			   ->setCellValue('AD1', 'Mother\'s Occupation')
			   ->setCellValue('AE1', 'Guardian\'s First name')
			   ->setCellValue('AF1', 'Guardian\'s Middle name')
			   ->setCellValue('AG1', 'Guardian\'s Last name')
			   ->setCellValue('AH1', 'Guardian Relationship')
			   ->setCellValue('AI1', 'Father\'s contact')
			   ->setCellValue('AJ1', 'Mother\'s contact')
			   ->setCellValue('AK1', 'Guadians\'s contact');

$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth('11');
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth('11');
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth('11');
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth('11');
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth('12');
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth('13');
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth('11');
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth('15');
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth('14');
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth('8');
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth('11');
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth('14');
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth('23');
$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth('17');
$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth('26');
$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth('19');
$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth('11');
$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth('13');
$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth('11');
$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth('12');
$objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth('11');
$objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth('14');
$objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth('18');
$objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth('21');
$objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth('18');
$objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth('18');
$objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth('19');
$objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setWidth('21');
$objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setWidth('21');
$objPHPExcel->getActiveSheet()->getColumnDimension('AD')->setWidth('19');
$objPHPExcel->getActiveSheet()->getColumnDimension('AE')->setWidth('21');
$objPHPExcel->getActiveSheet()->getColumnDimension('AF')->setWidth('23');
$objPHPExcel->getActiveSheet()->getColumnDimension('AG')->setWidth('20');
$objPHPExcel->getActiveSheet()->getColumnDimension('AH')->setWidth('22');
$objPHPExcel->getActiveSheet()->getColumnDimension('AI')->setWidth('18');
$objPHPExcel->getActiveSheet()->getColumnDimension('AJ')->setWidth('15');
$objPHPExcel->getActiveSheet()->getColumnDimension('AK')->setWidth('18');

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