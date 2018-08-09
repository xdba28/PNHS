<?php
//Build the results of student's exam into table & pdf
session_start();
if(isset($_POST['exam']) && isset($_POST['sect_name'])){
require '../fpdf/fpdf.php';
require 'connect.php';
require 'func.php';
$exam_no = base64_url_decode($_POST['exam']);
$sched_id = base64_url_decode($_POST['sect_name']);
$sev=27;
$rowcount = 0;
$pdf = new FPDF('P','mm','Letter');
		$pdf->AddPage();
		$pdf->SetFont('Courier','B',10);
		$pdf->SetFillColor(255, 255, 255);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(0,0,0);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
	    $pdf->Cell(0,3.5,'Republic of the Philippines',0,1,'C',true);
		$pdf->Cell(0,3.5,'Pag-Asa National High School',0,1,'C',true);
		$pdf->Cell(0,3.5,'Rawis, Legazpi City',0,1,'C',true);
		$pdf->Cell(0,3.5,'Online Examination System',0,1,'C',true);
		$pdf->Cell(0,4.5,'',0,1,'C',true);
        $pdf->Image('../img/pnhs_in_logo.png',46,7,21);
        $pdf->Image('../img/pnhs_logo.png',150,7,21);
		$pdf->Cell(0,7.25,'',0,1,'C',true);
		$get_exam = $mysqli->query("select * from oes_exam where exam_no = '$exam_no'");
		if($get_exam){
			$ex = $get_exam->fetch_assoc();
			$exam_title = $ex['exam_title'];
			$no_items = $ex['no_of_items'];
		}
		$pdf->Cell(0,4,$exam_title,0,1,'C',true);
		$pdf->Cell(0,4,"Exam Result",0,1,'C',true);
		$get_sched = $mysqli->query("select concat(pers.p_lname, ', ', pers.p_fname ) as teacher_name, subj.sub_desc, sy.year, sect.year_level, sect.section_name from css_schedule sched, pims_personnel pers, pims_employment_records emp_rec, css_subject subj, css_school_yr sy, css_section sect where sched.emp_rec_id = emp_rec.emp_rec_ID and emp_rec.emp_no = pers.emp_No and sched.subject_id = subj.subject_id and sched.sy_id = sy.sy_id and sched.section_id = sect.SECTION_ID and sched.SCHED_ID = '$sched_id'");
		if($get_sched){
			if($get_sched->num_rows > 0){
				$exam_det = $get_sched->fetch_assoc();
				$sy = $exam_det['year'];
				$teacher_name = $exam_det['teacher_name'];
				$teacher_name = $mysqli->escape_string($teacher_name);
				$section = $exam_det['section_name'];
				$section = $mysqli->escape_string($section);
				$subject = $exam_det['sub_desc'];
				$subject = $mysqli->escape_string($subject);
                $year_level = $exam_det['year_level'];
			}
		}
		$pdf->Cell(0,4,'S.Y. : '.$sy,0,1,'C',true);
		$pdf->Cell(0,4,'',0,1,'C',true);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(100,7,'Section : '.$section,0,0,'L',true);
		$pdf->Cell(60,7,'Subject Name : '.$subject,0,1,'L',true);
		$pdf->Cell(100,7,'Subject Teacher : '.$teacher_name,0,0,'L',true);
		date_default_timezone_set("Asia/Manila");
		$current_date = date('F d Y g:ia \o\n l');;
		$pdf->Cell(60,7,'Printed Date : '.$current_date,0,1,'L',true);
        $pdf->Ln();
		$pdf->Cell(100,7,'Total Score : '.$no_items,0,0,'L',true);
		 $pdf->Ln();
	    $pdf->SetFont('Courier','B',10);
		$pdf->SetFillColor(0, 153, 255);
		$pdf->SetTextColor(255);
	    $pdf->Cell(102.1,7,'Student Name',1,0,'C',true);
	    $pdf->Cell(27.7,7,'Score',1,0,'C',true);
	    $pdf->Cell(27.7,7,'Grade',1,0,'C',true);
	    $pdf->Cell(37.7,7,'Remarks',1,1,'C',true);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0);
        $pdf->SetFont('Helvetica','B',8);
		
		$get_lrn = $mysqli->query("select res.*, concat(stud.stu_lname, ', ', stud.stu_fname ) as student_name from oes_exam_result res, sis_stu_rec stu_rec, sis_student stud, css_schedule sched where res.lrn = stu_rec.lrn and stu_rec.lrn = stud.lrn and stu_rec.section_id = sched.section_id and res.exam_no = '$exam_no' and sched.sched_id = '$sched_id' order by student_name asc LOCK IN SHARE MODE");
		if($get_lrn->num_rows > 0){
			while($row = $get_lrn->fetch_array()){
				$res[] = $row;
			}
			
			foreach($res as $get_res){
				$stud_name = $get_res['student_name'];
				$stud_name = $mysqli->escape_string($stud_name);
					$exam_score = $get_res['exam_score'];
					$exam_equiv = $get_res['equivalent_grade'];
					$exam_equiv = number_format($exam_equiv,2,".",",");
					$exam_remark = $get_res['result_remarks'];
					
				
				$pdf->Cell(102.1,7,$stud_name,1,0,'C',true);
				$pdf->Cell(27.7,7,$exam_score,1,0,'C',true);
				$pdf->Cell(27.7,7,$exam_equiv,1,0,'C',true);
				$pdf->Cell(37.7,7,$exam_remark,1,1,'C',true);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->SetTextColor(0);
				++$rowcount;
			}
		}
		$pdf->Output($year_level.' - '.$section.' '. $exam_title.' '.'Exam Result.pdf', 'I'); 
} else if(isset($_POST['questioncreate_subject']) && !empty($_SESSION['user_data']['acct']['emp_no']) && empty($_POST['exam'])){
	require '../fpdf/fpdf.php';
	require 'connect.php';
	require 'func.php';
    require 'cellfit.php';
    
	$sub_id = base64_url_decode($_POST['questioncreate_subject']);
	$emp_no = $_SESSION['user_data']['acct']['emp_no'];
	$sev=27;
	$rowcount = 0;
	$pdf=new PDF_MC_Table();
    $pdf->SetWidths(array(55,45,30,30,30));
		$pdf->AddPage();
		$pdf->SetFont('Courier','B',10);
		$pdf->SetFillColor(255, 255, 255);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(0,0,0);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
	    $pdf->Cell(0,3.5,'Republic of the Philippines',0,1,'C',true);
		$pdf->Cell(0,3.5,'Pagasa National High School',0,1,'C',true);
		$pdf->Cell(0,3.5,'Rawis, Legazpi City',0,1,'C',true);
		$pdf->Cell(0,3.5,'Online Examination System',0,1,'C',true);
		$pdf->Cell(0,4.5,'',0,1,'C',true);
        $pdf->Image('../img/pnhs_in_logo.png',46,7,21);
        $pdf->Image('../img/pnhs_logo.png',150,7,21);
		$pdf->Cell(0,7.25,'',0,1,'C',true);
		$get_det = $mysqli->query("select concat(pers.p_lname, ', ', pers.p_fname ) as teacher_name, subj.sub_desc, sy.year from css_schedule sched, pims_employment_records emp_rec, css_subject subj, css_school_yr sy, pims_personnel pers where sched.subject_id = subj.subject_id and sched.sy_id = sy.sy_id and sched.emp_rec_id = emp_rec.emp_rec_ID and emp_rec.emp_No = pers.emp_No and sched.subject_id = '$sub_id' and pers.emp_No = '$emp_no'");
		if($get_det){
			if($get_det->num_rows > 0){
				$ex = $get_det->fetch_assoc();
				$teacher_name = $ex['teacher_name'];
				$subject = $ex['sub_desc'];
				$sy = $ex['year'];
				$pdf->Cell(0,4,"Subject Exam Result",0,1,'C',true);
				$pdf->Cell(0,4,'S.Y. : '.$sy,0,1,'C',true);
				$pdf->Cell(0,4,'',0,1,'C',true);
				$pdf->SetFont('Arial','B',10);
				$pdf->Cell(100,7,'Subject Name : '.$subject,0,0,'L',true);
				$pdf->Cell(60,7,'Subject Teacher : '.$teacher_name,0,1,'L',true);
				date_default_timezone_set("Asia/Manila");
				$current_date = date('F d Y g:ia \o\n l');
				$pdf->Cell(100,7,'Printed Date : '.$current_date,0,0,'L',true);
				$pdf->Ln();
				$pdf->Ln();
				$pdf->SetFont('Courier','B',10);
				$pdf->SetFillColor(0, 153, 255);
				$pdf->SetTextColor(255);
				$pdf->Cell(55,7,'Exam Name',1,0,'C',true);
				$pdf->Cell(45,7,'Section',1,0,'C',true);
				$pdf->Cell(30,7,'No. of Passed',1,0,'C',true);
				$pdf->Cell(30,7,'No. of Failed',1,0,'C',true);
				$pdf->Cell(30,7,'No. of Taker',1,1,'C',true);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->SetTextColor(0);
				$pdf->SetFont('Helvetica','B',8);
				
				$sel_ex = $mysqli->query("select distinct(ex_g.exam_no) from oes_exam_group ex_g, css_schedule sched where sched.sched_id = ex_g.sched_id and sched.subject_id = '$sub_id' LOCK IN SHARE MODE");
				if($sel_ex){
					if($sel_ex->num_rows > 0){
						while($exams = $sel_ex->fetch_array()){
							$exam_det[] = $exams;
						}
						$data = array();
						
						foreach($exam_det as $ex_sel){
							$exam_section = "";
							$exam_sect = array();
							$exam_no = $ex_sel['exam_no'];
							$ex_sect = $mysqli->query("select sect.section_name from css_section sect, css_schedule sched, oes_exam_group ex_g where ex_g.sched_id = sched.SCHED_ID and sched.section_id = sect.SECTION_ID and ex_g.exam_no = '$exam_no'");
							
							if($ex_sect){
								if($ex_sect->num_rows > 0){
									
									while($row = $ex_sect->fetch_array()){
										$exam_sect[] = $row;
										
									}
									foreach($exam_sect as $ex_section){
										$exam_section =   $ex_section['section_name'] . " ". $exam_section;
									}
								}
							}
							$exam = $mysqli->query("select concat(ex.exam_title,' (', ex.exam_type,')') as exam_title, SUM(res.result_remarks = 'Passed!') AS no_passed, SUM(res.result_remarks = 'Failed.') AS no_failed, SUM(res.exam_no = '$exam_no') AS no_taker from oes_exam ex, oes_exam_result res where ex.exam_no = res.exam_no and ex.exam_no = '$exam_no' LOCK IN SHARE MODE");
							
							if($exam){
								if($exam->num_rows > 0){
									$ex = $exam->fetch_assoc();
									$ex_title = $ex['exam_title'];
									if($ex['no_passed'] == NULL){
										$ex['no_passed'] = 0;
									}
									if($ex['no_failed'] == NULL){
										$ex['no_failed'] = 0;
									}
									if($ex['no_taker'] == NULL){
										$ex['no_taker'] = 0;
									}
                                    //Please do not delete the whitespaces below
                                    $pdf->Row(array($ex_title, $exam_section,'                 '.$ex['no_failed'],'                 '.$ex['no_taker'],'                 '.$ex['no_taker']));
									$pdf->SetFillColor(255, 255, 255);
									$pdf->SetTextColor(0);
									++$rowcount;
								}
							}
						}
					}
				}
				
				
				$pdf->Output($subject.' - '.$teacher_name.' '. $sy.' '.'Subject Exam Result.pdf', 'I'); 
			}
		}
} else if(isset($_POST['exam']) && empty($_POST['sect_name'])){
require '../fpdf/fpdf.php';
require 'connect.php';
require 'func.php';
$exam_no = base64_url_decode($_POST['exam']);
$sev=27;
$rowcount = 0;
    $pdf = new FPDF('P','mm','Letter');
		$pdf->AddPage();
		$pdf->SetFont('Courier','B',10);
		$pdf->SetFillColor(255, 255, 255);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(0,0,0);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
	    $pdf->Cell(0,3.5,'Republic of the Philippines',0,1,'C',true);
		$pdf->Cell(0,3.5,'Pag-Asa National High School',0,1,'C',true);
		$pdf->Cell(0,3.5,'Rawis, Legazpi City',0,1,'C',true);
		$pdf->Cell(0,3.5,'Online Examination System',0,1,'C',true);
		$pdf->Cell(0,4.5,'',0,1,'C',true);
        $pdf->Image('../img/pnhs_in_logo.png',46,7,21);
        $pdf->Image('../img/pnhs_logo.png',150,7,21);
		$pdf->Cell(0,7.25,'',0,1,'C',true);
		$get_exam = $mysqli->query("select * from oes_exam where exam_no = '$exam_no'");
		if($get_exam){
			$ex = $get_exam->fetch_assoc();
			$exam_title = $ex['exam_title'];
			$no_items = $ex['no_of_items'];
		}
		$pdf->Cell(0,4,$exam_title,0,1,'C',true);
		$pdf->Cell(0,4,"Exam Result",0,1,'C',true);
		$get_sched = $mysqli->query("select concat(pers.p_lname, ', ', pers.p_fname) as teacher_name, subj.sub_desc, sy.year, sect.year_level, sect.section_name from oes_exam_group ex_g, css_schedule sched, pims_personnel pers, pims_employment_records emp_rec, css_subject subj, css_school_yr sy, css_section sect where ex_g.sched_id = sched.SCHED_ID and sched.emp_rec_id = emp_rec.emp_rec_ID and emp_rec.emp_no = pers.emp_No and sched.subject_id = subj.subject_id and sched.sy_id = sy.sy_id and sched.section_id = sect.SECTION_ID and ex_g.exam_no = '$exam_no'");
		if($get_sched){
			if($get_sched->num_rows > 0){
				$exam_det = $get_sched->fetch_assoc();
				$sy = $exam_det['year'];
				$teacher_name = $exam_det['teacher_name'];
				$teacher_name = $mysqli->escape_string($teacher_name);
				$section = $exam_det['section_name'];
				$section = $mysqli->escape_string($section);
				$subject = $exam_det['sub_desc'];
				$subject = $mysqli->escape_string($subject);
                $year_level = $exam_det['year_level'];
			}
		}
		$pdf->Cell(0,4,'S.Y. : '.$sy,0,1,'C',true);
		$pdf->Cell(0,4,'',0,1,'C',true);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(100,7,'Subject Name : '.$subject,0,0,'L',true);
		$pdf->Cell(60,7,'Subject Teacher : '.$teacher_name,0,1,'L',true);
		date_default_timezone_set("Asia/Manila");
		$current_date = date('F d Y g:ia \o\n l');
		$pdf->Cell(100,7,'Printed Date : '.$current_date,0,0,'L',true);
		
        $pdf->Ln();
		$pdf->Cell(100,7,'Total Score : '.$no_items,0,0,'L',true);
		 $pdf->Ln();
	    $pdf->SetFont('Courier','B',10);
		$pdf->SetFillColor(0, 153, 255);
		$pdf->SetTextColor(255);
	    $pdf->Cell(90,7,'Student Name',1,0,'C',true);
	    $pdf->Cell(35,7,'Section',1,0,'C',true);
	    $pdf->Cell(20,7,'Score',1,0,'C',true);
	    $pdf->Cell(20,7,'Grade',1,0,'C',true);
	    $pdf->Cell(30,7,'Remarks',1,1,'C',true);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0);
        $pdf->SetFont('Helvetica','B',8);
		
		$get_lrn = $mysqli->query("select res.*, concat(stud.stu_lname, ', ', stud.stu_fname) as student_name, sect.section_name from oes_exam_result res, oes_exam_group ex_g, css_schedule sched, sis_stu_rec stu_rec, sis_student stud, css_section sect where res.exam_no = ex_g.exam_no and ex_g.sched_id = sched.sched_id and sched.section_id = stu_rec.section_id and sched.section_id = sect.section_id and res.lrn = stu_rec.lrn and stu_rec.lrn = stud.lrn and res.exam_no = '$exam_no' order by student_name asc LOCK IN SHARE MODE");
		if($get_lrn->num_rows > 0){
			while($row = $get_lrn->fetch_array()){
				$res[] = $row;
			}
			
			foreach($res as $get_res){
				$stud_name = $get_res['student_name'];
				$stud_name = $mysqli->escape_string($stud_name);
					$exam_score = $get_res['exam_score'];
					$stud_sect = $get_res['section_name'];
					$exam_equiv = $get_res['equivalent_grade'];
					$exam_equiv = number_format($exam_equiv,2,".",",");
					$exam_remark = $get_res['result_remarks'];
					
				
				$pdf->Cell(90,7,$stud_name,1,0,'C',true);
				$pdf->Cell(35,7,$stud_sect,1,0,'C',true);
				$pdf->Cell(20,7,$exam_score,1,0,'C',true);
				$pdf->Cell(20,7,$exam_equiv,1,0,'C',true);
				$pdf->Cell(30,7,$exam_remark,1,1,'C',true);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->SetTextColor(0);
				++$rowcount;
			}
		}
		$pdf->Output($year_level. ' '. $exam_title.' '.'Exam Result.pdf', 'I'); 
}
?>