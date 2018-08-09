<?php
include('../PHPExcel/Classes/PHPExcel.php'); // including of PHPExcel library
session_start();
include("../session.php");

$file_name = 'Past Grade Form.xlsx';

$objPHPExcel = new PHPExcel();

$style = array(
	'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
	)
);

$excel_worksheet = $objPHPExcel->setActiveSheetIndex(0);

$excel_worksheet = $objPHPExcel->createSheet(0);

$excel_worksheet->setTitle("Grade 7");

$excel_worksheet->setCellValue('A1', 'Subject')
			   ->setCellValue('B1', '1st Quarter')
			   ->setCellValue('C1', '2nd Quarter')
			   ->setCellValue('D1', '3rd Quarter')
			   ->setCellValue('E1', '4th Quarter')
			   ->setCellValue('F1', 'Average Grade')
			   ->setCellValue('A2', 'Filipino')
			   ->setCellValue('A3', 'English')
			   ->setCellValue('A4', 'Mathematics')
			   ->setCellValue('A5', 'Science')
			   ->setCellValue('A6', 'Aranling Panlipunan')
			   ->setCellValue('A7', 'Technology and Livelihood Eduacation (TLE)')
			   ->setCellValue('A8', 'MAPEH')
			   ->setCellValue('A9', 'Edukasyon sa Pagpapakatao (EsP)')
			   ->setCellValue('A11', 'Genral Average');

$excel_worksheet->getColumnDimension('A')->setWidth('40');
$excel_worksheet->getColumnDimension('B')->setWidth('13');
$excel_worksheet->getColumnDimension('C')->setWidth('13');
$excel_worksheet->getColumnDimension('D')->setWidth('13');
$excel_worksheet->getColumnDimension('E')->setWidth('13');
$excel_worksheet->getColumnDimension('F')->setWidth('15');
			   
$excel_worksheet->getDefaultStyle()->applyFromArray($style);

$excel_worksheet = $objPHPExcel->setActiveSheetIndex(1);

$excel_worksheet = $objPHPExcel->createSheet(1);

$excel_worksheet->setTitle("Grade 8");

$excel_worksheet->setCellValue('A1', 'Subject')
			   ->setCellValue('B1', '1st Quarter')
			   ->setCellValue('C1', '2nd Quarter')
			   ->setCellValue('D1', '3rd Quarter')
			   ->setCellValue('E1', '4th Quarter')
			   ->setCellValue('F1', 'Average Grade')
			   ->setCellValue('A2', 'Filipino')
			   ->setCellValue('A3', 'English')
			   ->setCellValue('A4', 'Mathematics')
			   ->setCellValue('A5', 'Science')
			   ->setCellValue('A6', 'Aranling Panlipunan')
			   ->setCellValue('A7', 'Technology and Livelihood Eduacation (TLE)')
			   ->setCellValue('A8', 'MAPEH')
			   ->setCellValue('A9', 'Edukasyon sa Pagpapakatao (EsP)')
			   ->setCellValue('A11', 'Genral Average');

$excel_worksheet->getColumnDimension('A')->setWidth('40');
$excel_worksheet->getColumnDimension('B')->setWidth('13');
$excel_worksheet->getColumnDimension('C')->setWidth('13');
$excel_worksheet->getColumnDimension('D')->setWidth('13');
$excel_worksheet->getColumnDimension('E')->setWidth('13');
$excel_worksheet->getColumnDimension('F')->setWidth('15');

$excel_worksheet->getDefaultStyle()->applyFromArray($style);

$excel_worksheet = $objPHPExcel->setActiveSheetIndex(2);

$excel_worksheet = $objPHPExcel->createSheet(2);

$excel_worksheet->setTitle("Grade 9");

$excel_worksheet->setCellValue('A1', 'Subject')
			   ->setCellValue('B1', '1st Quarter')
			   ->setCellValue('C1', '2nd Quarter')
			   ->setCellValue('D1', '3rd Quarter')
			   ->setCellValue('E1', '4th Quarter')
			   ->setCellValue('F1', 'Average Grade')
			   ->setCellValue('A2', 'Filipino')
			   ->setCellValue('A3', 'English')
			   ->setCellValue('A4', 'Mathematics')
			   ->setCellValue('A5', 'Science')
			   ->setCellValue('A6', 'Aranling Panlipunan')
			   ->setCellValue('A7', 'Technology and Livelihood Eduacation (TLE)')
			   ->setCellValue('A8', 'MAPEH')
			   ->setCellValue('A9', 'Edukasyon sa Pagpapakatao (EsP)')
			   ->setCellValue('A11', 'Genral Average');

$excel_worksheet->getColumnDimension('A')->setWidth('40');
$excel_worksheet->getColumnDimension('B')->setWidth('13');
$excel_worksheet->getColumnDimension('C')->setWidth('13');
$excel_worksheet->getColumnDimension('D')->setWidth('13');
$excel_worksheet->getColumnDimension('E')->setWidth('13');
$excel_worksheet->getColumnDimension('F')->setWidth('15');

$excel_worksheet->getDefaultStyle()->applyFromArray($style);

$excel_worksheet = $objPHPExcel->setActiveSheetIndex(3);

$excel_worksheet = $objPHPExcel->createSheet(3);

$excel_worksheet->setTitle("Grade 10");

$excel_worksheet->setCellValue('A1', 'Subject')
			   ->setCellValue('B1', '1st Quarter')
			   ->setCellValue('C1', '2nd Quarter')
			   ->setCellValue('D1', '3rd Quarter')
			   ->setCellValue('E1', '4th Quarter')
			   ->setCellValue('F1', 'Average Grade')
			   ->setCellValue('A2', 'Filipino')
			   ->setCellValue('A3', 'English')
			   ->setCellValue('A4', 'Mathematics')
			   ->setCellValue('A5', 'Science')
			   ->setCellValue('A6', 'Aranling Panlipunan')
			   ->setCellValue('A7', 'Technology and Livelihood Eduacation (TLE)')
			   ->setCellValue('A8', 'MAPEH')
			   ->setCellValue('A9', 'Edukasyon sa Pagpapakatao (EsP)')
			   ->setCellValue('A11', 'Genral Average');

$excel_worksheet->getColumnDimension('A')->setWidth('40');
$excel_worksheet->getColumnDimension('B')->setWidth('13');
$excel_worksheet->getColumnDimension('C')->setWidth('13');
$excel_worksheet->getColumnDimension('D')->setWidth('13');
$excel_worksheet->getColumnDimension('E')->setWidth('13');
$excel_worksheet->getColumnDimension('F')->setWidth('15');			   

$excel_worksheet->getDefaultStyle()->applyFromArray($style);

$objPHPExcel->removeSheetByIndex(4);

$excel_worksheet = $objPHPExcel->setActiveSheetIndex(0);
	
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"); // format type
	header("Content-Disposition: attachment;filename=\"$file_name\""); // file name
	$objWriter->save('php://output');
?>