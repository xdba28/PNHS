<?php
include('PHPExcel/Classes/PHPExcel.php');
include('db_con_i.php');
include('../../php/_Func.php');

$file_name = 'PNHS Account List.xlsx';

$objPHPExcel = new PHPExcel();

$emp_worksheet = $objPHPExcel->setActiveSheetIndex(0);
$emp_worksheet->setTitle('Employee');

$style = array(
	'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
	)
);

$emp_worksheet->getDefaultStyle()->applyFromArray($style);

$emp_worksheet->setCellValue('A1', 'Employee Name')
			  ->setCellValue('B1', 'Job Title')
			  ->setCellValue('C1', 'Username')
			  ->setCellValue('D1', 'Password');

$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth('28');
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth('30');
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth('14');
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth('19');

$get_employee = $mysqli->query("SELECT P_fname, P_mname, P_lname, P_extension_name, job_title_name,
										cms_username, cms_password 

									FROM cms_account, pims_personnel,
										pims_employment_records, pims_job_title

								WHERE  pims_personnel.emp_No = cms_account.emp_no
								AND	   pims_personnel.emp_No = pims_employment_records.emp_No
								AND    pims_job_title.job_title_code = pims_employment_records.job_title_code
								AND	   lrn is NULL")
						or die($mysqli->error);

$emp_excel_row = 2;

while($data_row = $get_employee->fetch_array())
{
	$emp_worksheet->setCellValue('A'.$emp_excel_row, $data_row['P_lname'].', '.$data_row['P_fname'].' '.$data_row['P_mname'].' '.$data_row['P_extension_name'])
					->setCellValue('B'.$emp_excel_row, $data_row['job_title_name'])
					->setCellValue('C'.$emp_excel_row, pcrypt($data_row['cms_password'], "dcrypt"))
					->setCellValue('D'.$emp_excel_row, $data_row['cms_username']);
	$emp_excel_row++;
}

$stu_worksheet = $objPHPExcel->createSheet(1);
$stu_worksheet->setTitle('Student');

$stu_worksheet->setCellValue('A1', 'Student Name')
			  ->setCellValue('B1', 'Username')
			  ->setCellValue('C1', 'Password');

$stu_worksheet->getColumnDimension('A')->setWidth('29');
$stu_worksheet->getColumnDimension('B')->setWidth('19');
$stu_worksheet->getColumnDimension('C')->setWidth('17');
			  
$get_student = $mysqli->query("SELECT stu_fname, stu_mname, stu_lname, cms_username, cms_password 

							   FROM sis_student, cms_account
							   
							   WHERE sis_student.lrn = cms_account.lrn
							   AND emp_no is NULL")
						or die($mysqli->error);

$stu_excel_row = 2;

while($stu_row = $get_student->fetch_array())
{
	$stu_worksheet->setCellValue('A'.$stu_excel_row, $stu_row['stu_lname'].', '.$stu_row['stu_fname'].' '.$stu_row['stu_mname'])
				  ->setCellValue('B'.$stu_excel_row, $stu_row['cms_username'])
				  ->setCellValue('C'.$stu_excel_row, pcrypt($stu_row['cms_password'], "dcrypt"));
	$stu_excel_row++;
}

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"); // format type
	header("Content-Disposition: attachment;filename=\"$file_name\""); // file name
	$objWriter->save('php://output');
?>