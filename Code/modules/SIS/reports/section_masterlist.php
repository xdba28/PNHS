<?php
session_start();
include('../FPDF/fpdf.php');
include('../db_con_i.php');
include("../session.php");

if(!isset($_GET['section']))
{
	header('Location: ../student/stat.php');
}

$section = $_GET['section'];

$file_name = 'PNHS '.$section.' MASTERLIST';

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
	    $pdf->Cell(0,3,'Republic of the Philippines',0,1,'C',true);
		$pdf->Cell(0,3.5,'Department of Education',0,1,'C',true);
		$pdf->Cell(0,3.5,'Region V',0,1,'C',true);
		$pdf->Cell(0,3.5,'Pag-Asa National High School',0,1,'C',true);
		$pdf->Cell(0,3.5,'Rawis, Legazpi City',0,1,'C',true);
        $get_sched = $mysqli->query("select year from css_school_yr where status = 'active'"); //Query to get the current school year.
		if($get_sched){
			if($get_sched->num_rows > 0){
				$details = $get_sched->fetch_assoc();
				$sy = $details['year'];
			}
        }
        $pdf->Cell(0,3.5,'S.Y. : '.$sy,0,1,'C',true); //$pdf->Cell(0,3.5,'S.Y. : '.$sy,0,1,'C',true); //Print it here.
		$pdf->Cell(0,4.5,'',0,1,'C',true);
        $pdf->Image('../docs/img/pnhs_in_logo.png',40,10,21);
        $pdf->Image('../img/pnhs_logo.png',150,10,21);
		$pdf->Cell(0,4,'',0,1,'C',true);
	    $pdf->SetFont('Arial','B',10);
        $pdf->SetFillColor(59, 138, 136);
		$pdf->SetTextColor(255);
	    $pdf->Cell(195.2,7, $section.' MASTER LIST',0,1,'C',true);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0);
        $pdf->Cell(195.2,7,'MALE',0,1,'C',true);
		$pdf->SetTextColor(0);
		$pdf->SetFont('Helvetica','B',8);
		
		$sec_ex = explode("-", $section);
		
		$male = $mysqli->query("SELECT sis_student.lrn, concat(sis_student.stu_lname, ', ', sis_student.stu_fname, ' ', COALESCE(sis_student.stu_mname, ''), '' ) as 'Full Name' 
								FROM sis_student, sis_stu_rec, css_section, css_school_yr
								WHERE sis_student.lrn = sis_stu_rec.lrn
								AND sis_stu_rec.section_id = css_section.SECTION_ID
								AND sis_stu_rec.sy_id = css_school_yr.sy_id
								AND sis_gender = 'Male'
								AND css_section.SECTION_NAME = '$sec_ex[1]'
								AND css_section.YEAR_LEVEL = '$sec_ex[0]'");

		if($male->num_rows > 0){
			while($row = $male->fetch_array()){
				$rese[] = $row;
			}
            $bct=1;
			foreach($rese as $get_res){				
				$pdf->Cell(195.2,6,$bct.'. '.$get_res['Full Name'],0,1,'C',true);//edit the numbering with incrementing variable..
				$pdf->SetFillColor(255, 255, 255);
				$pdf->SetTextColor(0);
				++$rowcount;
				if($rowcount==$sev){
					$sev=0;
					$rowcount=0;
					$pdf->AddPage();
				}
				if($rowcount==35){
					$sev=0;
					$rowcount=0;
					$pdf->AddPage();
				}
				if($pdf->PageNo()!=1 AND $rowcount==0){
					$pdf->SetFont('Arial','B',10);
                    $pdf->SetFillColor(59, 138, 136);
                    $pdf->SetTextColor(255);
                    $pdf->SetFillColor(255, 255, 255);
                    $pdf->SetTextColor(0);
                    $pdf->Cell(195.2,7,'Male',0,1,'C',true);
                    $pdf->SetTextColor(0);
                    $pdf->SetFont('Helvetica','B',8);
					++$rowcount;
                }
                $bct++;
			}
		}
        $pdf->Ln();
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(195.2,7,'FEMALE',0,1,'C',true);
        ++$rowcount;
        $pdf->SetFont('Helvetica','B',8);
        $female = $mysqli->query("SELECT sis_student.lrn, concat(sis_student.stu_lname, ', ', sis_student.stu_fname, ' ', COALESCE(sis_student.stu_mname, ''), '' ) as 'Full Name' FROM sis_student, sis_stu_rec, css_section, css_school_yr
						WHERE sis_student.lrn = sis_stu_rec.lrn
						AND sis_stu_rec.section_id = css_section.SECTION_ID
						AND sis_stu_rec.sy_id = css_school_yr.sy_id
						AND sis_gender = 'Female'
						AND css_section.SECTION_NAME = '$sec_ex[1]'
						AND css_section.YEAR_LEVEL = '$sec_ex[0]'");
		if($female->num_rows > 0){
			while($row = $female->fetch_array()){
				$res[] = $row;
			}
            $gct=1;
			foreach($res as $get_res){
				$pdf->Cell(195.2,6,$gct.'. '.$get_res['Full Name'],0,0,'C',true);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->SetTextColor(0);
				++$rowcount;
				if($rowcount==$sev){
					$sev=0;
					$rowcount=0;
					$pdf->AddPage();
				}
				if($rowcount==35){
					$sev=0;
					$rowcount=0;
					$pdf->AddPage();
				}
				if($pdf->PageNo()!=1 AND $rowcount==0){
					$pdf->SetFont('Arial','B',10);
                    $pdf->SetFillColor(59, 138, 136);
                    $pdf->SetTextColor(255);
                    $pdf->Cell(195.2,7,'Grade 7',0,1,'C',true);
                    $pdf->SetFillColor(255, 255, 255);
                    $pdf->SetTextColor(0);
                    $pdf->Cell(195.2,7,'FEMALE',0,1,'C',true);
                    $pdf->SetTextColor(0);
                    $pdf->SetFont('Helvetica','B',8);
					$pdf->Ln();
					++$rowcount;
                }
                $gct++;
			}
		}
		// $pdf->Output('PNHS SECTION MASTERLIST.pdf', 'D');
		$pdf->Output();
?>