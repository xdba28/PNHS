<?php
include('PHPExcel/PHPExcel/Classes/PHPExcel.php'); // including of PHPExcel library
include('../php/connect.php');
include('../php/func.php');
session_start();
if(isset($_GET['exam_no']) && isset($_GET['sched_id'])){
	$exam_no = base64_url_decode($_GET['exam_no']);
	$sched_id = base64_url_decode($_GET['sched_id']);
	$get_det = $mysqli->query("select ex.exam_title, sect.section_name, sect.year_level, sy.year  from oes_exam ex, oes_exam_group ex_g, css_schedule sched, css_section sect, css_school_yr sy where ex_g.exam_no = ex.exam_no and ex_g.sched_id = sched.sched_id and sched.section_id = sect.section_id and sched.sy_id = sy.sy_id and ex_g.exam_no = '$exam_no' and ex_g.sched_id = '$sched_id'");

	if($get_det){
		$det = $get_det->fetch_assoc();
		$section = $det['section_name'];
		$sy = $det['year'];
		$year_lvl = $det['year_level'];
		$exam_title = $det['exam_title'];
		
	}
	$file_name = $exam_title." Excel Result " . $year_lvl."-".$section . '.xlsx';

	$objPHPExcel = new PHPExcel();
	$exam_worksheet = $objPHPExcel->setActiveSheetIndex(0);
	$exam_worksheet = $objPHPExcel->getActiveSheet(0)->mergeCells('A1:F2');
	$exam_worksheet = $objPHPExcel->getActiveSheet(0)->mergeCells('B3:C3');
	$exam_worksheet = $objPHPExcel->getActiveSheet(0)->mergeCells('E3:F3');

	$exam_worksheet->setCellValue('A1', $exam_title)
				   ->setCellValue('A3', 'Year & Section:')
				   ->setCellValue('D3', 'School Year:')
				   ->setCellValue('A4', 'LRN')
				   ->setCellValue('B4', 'Student Name')
				   ->setCellValue('C4', 'Score')
				   ->setCellValue('D4', 'Grade')
				   ->setCellValue('E4', 'Remarks')
				   ->setCellValue('F4', 'Date Taken');

	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth('17');
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth('26');
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth('9');
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth('12');
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth('10');
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth('25');



	$style = array(
		'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
		)
	);
	$styleArray = array(
		'borders' => array(
			'outline' => array(
				'style' => PHPExcel_Style_Border::BORDER_THICK,
				'color' => array('argb' => '00000000'),
			),
		),
	);
	$styleArray2 = array(
		'borders' => array(
			'outline' => array(
				'style' => PHPExcel_Style_Border::BORDER_THIN,
				'color' => array('argb' => '00000000'),
			),
		),
	);

	$exam_worksheet->getDefaultStyle()->applyFromArray($style);
	$objPHPExcel->getActiveSheet()->getStyle('A4:F4')->getFont()->setBold( true );
	$objPHPExcel->getActiveSheet()->getStyle('A3')->getFont()->setBold( true );
	$objPHPExcel->getActiveSheet()->getStyle('D3')->getFont()->setBold( true );
	$objPHPExcel->getActiveSheet()->getStyle("A1")->getFont()->setSize(20);

	$exam_worksheet->getStyle("D")->getNumberFormat()->setFormatCode('0.00'); 
	$exam_worksheet->setCellValue('B3', $year_lvl . " - " .$section)
				   ->setCellValue('E3', $sy);

	$get_lrn = $mysqli->query("select res.*, stud.lrn, concat(stud.stu_lname, ', ', stud.stu_fname) as student_name from oes_exam_result res, oes_exam_group ex_g, css_schedule sched, sis_stu_rec stu_rec, sis_student stud, css_section sect where res.exam_no = ex_g.exam_no and ex_g.sched_id = sched.sched_id and sched.section_id = stu_rec.section_id and sched.section_id = sect.section_id and res.lrn = stu_rec.lrn and stu_rec.lrn = stud.lrn and res.exam_no = '$exam_no' and ex_g.sched_id = '$sched_id' order by student_name asc LOCK IN SHARE MODE") or die($mysqli->error);
				for($i=4; $i<5; $i++){
					$exam_worksheet->getStyle('A'.$i)->applyFromArray($styleArray2);
					$exam_worksheet->getStyle('B'.$i)->applyFromArray($styleArray2);
					$exam_worksheet->getStyle('C'.$i)->applyFromArray($styleArray2);
					$exam_worksheet->getStyle('D'.$i)->applyFromArray($styleArray2);
					$exam_worksheet->getStyle('E'.$i)->applyFromArray($styleArray2);
					$exam_worksheet->getStyle('F'.$i)->applyFromArray($styleArray2);
				}
				$excel_row = 5;
				
					
					while($data_row = $get_lrn->fetch_array()){
						$exam_datetime = $data_row['exam_datetime'];
						$exam_datetime = explode(" ", $exam_datetime);
						$examdate = $exam_datetime[0];
						$examdate = date('F d, Y', strtotime($examdate));
						$examtime = $exam_datetime[1];
						$examtime = date('h:iA', strtotime($examtime));
						$examtaken = $examdate . " " . $examtime;
						$stud_name = $data_row['student_name'];
						$stud_name = $mysqli->escape_string($stud_name);
						$exam_equiv = $data_row['equivalent_grade'];
						$exam_equiv = number_format($exam_equiv,2,".",",");
						
						$exam_worksheet->setCellValue('A'.$excel_row, $data_row['lrn'])
									->setCellValue('B'.$excel_row, $data_row['student_name'])
									->setCellValue('C'.$excel_row, $data_row['exam_score'])
									->setCellValue('D'.$excel_row, $exam_equiv)
									->setCellValue('E'.$excel_row, $data_row['result_remarks'])
									->setCellValue('F'.$excel_row, $examtaken);
						$exam_worksheet->getStyle('A'.$excel_row)->applyFromArray($styleArray2);
						$exam_worksheet->getStyle('B'.$excel_row)->applyFromArray($styleArray2);
						$exam_worksheet->getStyle('C'.$excel_row)->applyFromArray($styleArray2);
						$exam_worksheet->getStyle('D'.$excel_row)->applyFromArray($styleArray2);
						$exam_worksheet->getStyle('E'.$excel_row)->applyFromArray($styleArray2);
						$exam_worksheet->getStyle('F'.$excel_row)->applyFromArray($styleArray2);
						$excel_row++;
					}
					$excel_row = $excel_row - 1;
		
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"); // format type
		header("Content-Disposition: attachment;filename=\"$file_name\""); // file name
		$objWriter->save('php://output');
} else if(isset($_GET['exam_no'])){
	$exam_no = base64_url_decode($_GET['exam_no']);
	$get_det = $mysqli->query("select ex.exam_title, sect.year_level, sy.year  from oes_exam ex, oes_exam_group ex_g, css_schedule sched, css_section sect, css_school_yr sy where ex_g.exam_no = ex.exam_no and ex_g.sched_id = sched.sched_id and sched.section_id = sect.section_id and sched.sy_id = sy.sy_id and ex_g.exam_no = '$exam_no'");

	if($get_det){
		$det = $get_det->fetch_assoc();
		$sy = $det['year'];
		$year_lvl = $det['year_level'];
		$exam_title = $det['exam_title'];
		
	}
	$file_name =  $exam_title.' Excel Result ' ."- ".$year_lvl . '.xlsx';
	$objPHPExcel = new PHPExcel();
	$exam_worksheet = $objPHPExcel->setActiveSheetIndex(0);
	$exam_worksheet = $objPHPExcel->getActiveSheet(0)->mergeCells('A1:G2');
	$exam_worksheet = $objPHPExcel->getActiveSheet(0)->mergeCells('C3:D3');
	$exam_worksheet = $objPHPExcel->getActiveSheet(0)->mergeCells('E3:G3');

	$exam_worksheet->setCellValue('A1', $exam_title)
				   ->setCellValue('A3', 'Year:')
				   ->setCellValue('C3', 'School Year:')
				   ->setCellValue('A4', 'LRN')
				   ->setCellValue('B4', 'Student Name')
				   ->setCellValue('C4', 'Section')
				   ->setCellValue('D4', 'Score')
				   ->setCellValue('E4', 'Grade')
				   ->setCellValue('F4', 'Remarks')
				   ->setCellValue('G4', 'Date Taken');

	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth('17');
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth('26');
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth('15');
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth('8');
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth('10');
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth('10');
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth('25');



	$style = array(
		'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
		)
	);
	$styleArray2 = array(
		'borders' => array(
			'outline' => array(
				'style' => PHPExcel_Style_Border::BORDER_THIN,
				'color' => array('argb' => '00000000'),
			),
		),
	);

	$exam_worksheet->getDefaultStyle()->applyFromArray($style);
	$objPHPExcel->getActiveSheet()->getStyle('A4:G4')->getFont()->setBold( true );
	$objPHPExcel->getActiveSheet()->getStyle('A3')->getFont()->setBold( true );
	$objPHPExcel->getActiveSheet()->getStyle('C3')->getFont()->setBold( true );
	$objPHPExcel->getActiveSheet()->getStyle("A1")->getFont()->setSize(20);

	$exam_worksheet->getStyle("E")->getNumberFormat()->setFormatCode('0.00'); 
	$exam_worksheet->setCellValue('B3', $year_lvl)
				   ->setCellValue('E3', $sy);

	$get_lrn = $mysqli->query("select res.*, concat(stud.stu_lname, ', ', stud.stu_fname) as student_name, sect.section_name from oes_exam_result res, oes_exam_group ex_g, css_schedule sched, sis_stu_rec stu_rec, sis_student stud, css_section sect where res.exam_no = ex_g.exam_no and ex_g.sched_id = sched.sched_id and sched.section_id = stu_rec.section_id and sched.section_id = sect.section_id and res.lrn = stu_rec.lrn and stu_rec.lrn = stud.lrn and res.exam_no = '$exam_no' order by student_name asc LOCK IN SHARE MODE") or die($mysqli->error);
				for($i=4; $i<5; $i++){
					$exam_worksheet->getStyle('A'.$i)->applyFromArray($styleArray2);
					$exam_worksheet->getStyle('B'.$i)->applyFromArray($styleArray2);
					$exam_worksheet->getStyle('C'.$i)->applyFromArray($styleArray2);
					$exam_worksheet->getStyle('D'.$i)->applyFromArray($styleArray2);
					$exam_worksheet->getStyle('E'.$i)->applyFromArray($styleArray2);
					$exam_worksheet->getStyle('F'.$i)->applyFromArray($styleArray2);
					$exam_worksheet->getStyle('G'.$i)->applyFromArray($styleArray2);
				}
				$excel_row = 5;
				
					
					while($data_row = $get_lrn->fetch_array()){
						$exam_datetime = $data_row['exam_datetime'];
						$exam_datetime = explode(" ", $exam_datetime);
						$examdate = $exam_datetime[0];
						$examdate = date('F d, Y', strtotime($examdate));
						$examtime = $exam_datetime[1];
						$examtime = date('h:iA', strtotime($examtime));
						$examtaken = $examdate . " " . $examtime;
						$stud_name = $data_row['student_name'];
						$stud_name = $mysqli->escape_string($stud_name);
						$stud_sect = $data_row['section_name'];
						$stud_sect = $mysqli->escape_string($stud_sect);
						$exam_equiv = $data_row['equivalent_grade'];
						$exam_equiv = number_format($exam_equiv,2,".",",");
						
						$exam_worksheet->setCellValue('A'.$excel_row, $data_row['lrn'])
									->setCellValue('B'.$excel_row, $data_row['student_name'])
									->setCellValue('C'.$excel_row, $stud_sect)
									->setCellValue('D'.$excel_row, $data_row['exam_score'])
									->setCellValue('E'.$excel_row, $exam_equiv)
									->setCellValue('F'.$excel_row, $data_row['result_remarks'])
									->setCellValue('G'.$excel_row, $examtaken);
						$exam_worksheet->getStyle('A'.$excel_row)->applyFromArray($styleArray2);
						$exam_worksheet->getStyle('B'.$excel_row)->applyFromArray($styleArray2);
						$exam_worksheet->getStyle('C'.$excel_row)->applyFromArray($styleArray2);
						$exam_worksheet->getStyle('D'.$excel_row)->applyFromArray($styleArray2);
						$exam_worksheet->getStyle('E'.$excel_row)->applyFromArray($styleArray2);
						$exam_worksheet->getStyle('F'.$excel_row)->applyFromArray($styleArray2);
						$exam_worksheet->getStyle('G'.$excel_row)->applyFromArray($styleArray2);
						$excel_row++;
					}
					$excel_row = $excel_row - 1;
		
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"); // format type
		header("Content-Disposition: attachment;filename=\"$file_name\""); // file name
		$objWriter->save('php://output');
} else if(isset($_GET['subj']) && !empty($_SESSION['user_data']['acct']['emp_no'])){
	$subj = base64_url_decode($_GET['subj']);
	$emp_no = $_SESSION['user_data']['acct']['emp_no'];
	$get_det = $mysqli->query("select subj.sub_desc, sy.year from css_subject subj, css_school_yr sy, css_schedule sched, pims_employment_records emp_rec where sched.subject_id = subj.subject_id and sched.emp_rec_id = emp_rec.emp_rec_id and sched.sy_id = sy.sy_id and sched.subject_id = '$subj' and emp_rec.emp_no = '$emp_no' LOCK IN SHARE MODE");
	
	if($get_det){
		$det = $get_det->fetch_assoc();
		$subject_name = $det['sub_desc'];
		$year = $det['year'];
		
	}
	$file_name =  $subject_name.' Excel Result ' ."- ".$year . '.xlsx';
	$objPHPExcel = new PHPExcel();
	$exam_worksheet = $objPHPExcel->setActiveSheetIndex(0);
	$exam_worksheet = $objPHPExcel->getActiveSheet(0)->mergeCells('A1:G2');
	$exam_worksheet = $objPHPExcel->getActiveSheet(0)->mergeCells('B3:C3');
	$exam_worksheet = $objPHPExcel->getActiveSheet(0)->mergeCells('A4:B4');
	$exam_worksheet = $objPHPExcel->getActiveSheet(0)->mergeCells('C4:D4');

	$exam_worksheet->setCellValue('A1', $subject_name)
				   ->setCellValue('A3', 'School Year:')
				   ->setCellValue('A4', 'Exam Name')
				   ->setCellValue('C4', 'Section')
				   ->setCellValue('E4', 'No. of Passed')
				   ->setCellValue('F4', 'No. of Failed')
				   ->setCellValue('G4', 'No. of Takers');

	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth('20');
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth('20');
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth('15');
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth('15');
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth('15');
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth('15');
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth('15');



	$style = array(
		'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
		)
	);
	$styleArray2 = array(
		'borders' => array(
			'outline' => array(
				'style' => PHPExcel_Style_Border::BORDER_THIN,
				'color' => array('argb' => '00000000'),
			),
		),
	);

	$exam_worksheet->getDefaultStyle()->applyFromArray($style);
	$objPHPExcel->getActiveSheet()->getStyle('A4:G4')->getFont()->setBold( true );
	$objPHPExcel->getActiveSheet()->getStyle('A3')->getFont()->setBold( true );
	$objPHPExcel->getActiveSheet()->getStyle("A1")->getFont()->setSize(20);

	$exam_worksheet->setCellValue('B3', $year);
	for($i=4; $i<5; $i++){
					$exam_worksheet->getStyle('A'.$i)->applyFromArray($styleArray2);
					$exam_worksheet->getStyle('B'.$i)->applyFromArray($styleArray2);
					$exam_worksheet->getStyle('C'.$i)->applyFromArray($styleArray2);
					$exam_worksheet->getStyle('D'.$i)->applyFromArray($styleArray2);
					$exam_worksheet->getStyle('E'.$i)->applyFromArray($styleArray2);
					$exam_worksheet->getStyle('F'.$i)->applyFromArray($styleArray2);
					$exam_worksheet->getStyle('G'.$i)->applyFromArray($styleArray2);
				}
	
	$sel_ex = $mysqli->query("select distinct(ex_g.exam_no) from oes_exam_group ex_g, css_schedule sched where sched.sched_id = ex_g.sched_id and sched.subject_id = '$subj' order by ex_g.exam_no LOCK IN SHARE MODE");
		if($sel_ex){
			if($sel_ex->num_rows > 0){
				while($exams = $sel_ex->fetch_array()){
					$exam_det[] = $exams;
				}
				$excel_row = 5;
				foreach($exam_det as $ex_sel){
					$exam_section = "";
					
					$exam_no = $ex_sel['exam_no'];
					$ex_sect = $mysqli->query("select sect.section_name from css_section sect, css_schedule sched, oes_exam_group ex_g where ex_g.sched_id = sched.SCHED_ID and sched.section_id = sect.SECTION_ID and ex_g.exam_no = '$exam_no'");
					
							
							
							if($ex_sect){
								if($ex_sect->num_rows > 0){
									$exam_sect = array();
									while($row = $ex_sect->fetch_array()){
										$exam_sect[] = $row;
										
									}
									
									foreach($exam_sect as $ex_section){
										$exam_section =   $ex_section['section_name'] . " ". $exam_section;
									}
								}
							}
					$get_ex = $mysqli->query("select ex.exam_no, ex.exam_title, SUM(res.result_remarks = 'Passed!') AS no_passed, SUM(res.result_remarks = 'Failed.') AS no_failed, SUM(res.exam_no = '$exam_no') AS no_taker from oes_exam ex, oes_exam_result res where ex.exam_no = res.exam_no and ex.exam_no = '$exam_no' LOCK IN SHARE MODE");
					
					$data_row = array();
					while($data_row = $get_ex->fetch_array()){
						$rows[] = $data_row;
						$exam_worksheet = $objPHPExcel->getActiveSheet(0)->mergeCells('A'.$excel_row.':B'.$excel_row);
						$exam_worksheet = $objPHPExcel->getActiveSheet(0)->mergeCells('C'.$excel_row.':D'.$excel_row);
						
						$exam_worksheet->setCellValue('A'.$excel_row, $data_row['exam_title'])
									->setCellValue('C'.$excel_row, $exam_section)
									->setCellValue('E'.$excel_row, $data_row['no_passed'])
									->setCellValue('F'.$excel_row, $data_row['no_failed'])
									->setCellValue('G'.$excel_row, $data_row['no_taker']);
						$exam_worksheet->getStyle('A'.$excel_row)->applyFromArray($styleArray2);
						$exam_worksheet->getStyle('B'.$excel_row)->applyFromArray($styleArray2);
						$exam_worksheet->getStyle('C'.$excel_row)->applyFromArray($styleArray2);
						$exam_worksheet->getStyle('D'.$excel_row)->applyFromArray($styleArray2);
						$exam_worksheet->getStyle('E'.$excel_row)->applyFromArray($styleArray2);
						$exam_worksheet->getStyle('F'.$excel_row)->applyFromArray($styleArray2);
						$exam_worksheet->getStyle('G'.$excel_row)->applyFromArray($styleArray2);
						$excel_row++;
					}
					$exam_question = "";
				}
				
			}
		}
		
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"); // format type
		header("Content-Disposition: attachment;filename=\"$file_name\""); // file name
		$objWriter->save('php://output');
}

?>