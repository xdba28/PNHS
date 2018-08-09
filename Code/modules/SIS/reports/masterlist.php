<?php
include('fpdf.php');
include('../db_con_i.php');
$sched_id = 2;
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
        $pdf->Image('../img/pnhs_logo.png',46,10,21);
        $pdf->Image('../img/pnhs_logo.png',150,10,21);
		$pdf->Cell(0,4,'',0,1,'C',true);
	    $pdf->SetFont('Arial','B',10);
        $pdf->SetFillColor(59, 138, 136);
		$pdf->SetTextColor(255);
	    $pdf->Cell(195,7,'Grade 7 - DILIGENCE',0,1,'C',true);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0);
	    $pdf->Cell(15,7,'No.',0,0,'C',true);
        $pdf->Cell(25,7,'LRN',0,0,'C',true);
	    $pdf->Cell(66,7,'NAME',0,0,'C',true);
	    $pdf->Cell(22.2,7,'ADDRESS',0,1,'C',true);
        $pdf->Cell(195.2,7,'Male',0,1,'C',true);
		$pdf->SetTextColor(0);
        $pdf->SetFont('Helvetica','B',8);
		
		$male = $mysqli->query("SELECT sis_student.lrn, concat(sis_student.stu_lname, ', ', sis_student.stu_fname, ' ', COALESCE(sis_student.stu_mname, ''), '' ) as 'Full Name', concat(sis_student.house_no, ' ', sis_student.street, ' ', sis_student.brng, ' ', sis_student.munic) as addr FROM sis_student, sis_stu_rec, css_section, css_school_yr WHERE sis_student.lrn = sis_stu_rec.lrn
        AND sis_stu_rec.section_id = css_section.SECTION_ID
        AND sis_stu_rec.sy_id = css_school_yr.sy_id
        AND sis_gender = 'Male'
        AND css_section.YEAR_LEVEL = '7'");
		if($male->num_rows > 0){
			while($row = $male->fetch_array()){
				$rese[] = $row;
			}
            $bct=1;
			foreach($rese as $get_res){
				$one = $get_res['lrn'];
				$two = $get_res['Full Name'];
				$three = $get_res['addr'];
				
                $pdf->Cell(15,6,$bct,0,0,'C',true);
				$pdf->Cell(25,6,$one,0,0,'C',true);
				$pdf->Cell(65,6,$two,0,0,'L',true);
				$pdf->Cell(90.2,6,$three,0,1,'L',true);
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
                    $pdf->Cell(25,7,'LRN',0,0,'C',true);
                    $pdf->Cell(15,7,'No.',0,0,'C',true);
                    $pdf->Cell(16,7,'NAME',0,0,'C',true);
                    $pdf->Cell(47.5,7,'',0,0,'C',true);
                    $pdf->Cell(22.2,7,'ADDRESS',0,1,'C',true);
                    $pdf->Cell(195.2,7,'Male',0,1,'C',true);
                    $pdf->SetTextColor(0);
                    $pdf->SetFont('Helvetica','B',8);
					++$rowcount;
                }
                $bct++;
			}
		}
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(195.2,7,'Female',0,1,'C',true);
        ++$rowcount;
        $pdf->SetFont('Helvetica','B',8);
        $female = $mysqli->query("SELECT sis_student.lrn, concat(sis_student.stu_lname, ', ', sis_student.stu_fname, ' ', COALESCE(sis_student.stu_mname, ''), '' ) as 'Full Name', concat(sis_student.house_no, ' ', sis_student.street, ' ', sis_student.brng, ' ', sis_student.munic) as addr FROM sis_student, sis_stu_rec, css_section, css_school_yr
        WHERE sis_student.lrn = sis_stu_rec.lrn
        AND sis_stu_rec.section_id = css_section.SECTION_ID
        AND sis_stu_rec.sy_id = css_school_yr.sy_id
        AND sis_gender = 'Female'
        AND css_section.SECTION_NAME = 'DILIGENCE'
        AND css_section.YEAR_LEVEL = '7'");
		if($female->num_rows > 0){
			while($row = $female->fetch_array()){
				$res[] = $row;
			}
            $gct=1;
			foreach($res as $get_res){
				$a = $get_res['lrn'];
				$b = $get_res['Full Name'];
				$c = $get_res['addr'];
				
				$pdf->Cell(15,6,$gct,0,0,'C',true);	
				$pdf->Cell(25,6,$a,0,0,'C',true);
				$pdf->Cell(65,6,$b,0,0,'L',true);
				$pdf->Cell(90.2,6,$c,0,1,'L',true);
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
                    $pdf->Cell(195.2,7,'Grade 7 - DILIGENCE',0,1,'C',true);
                    $pdf->SetFillColor(255, 255, 255);
                    $pdf->SetTextColor(0);
                    $pdf->Cell(25,7,'LRN',0,0,'C',true);
                    $pdf->Cell(15,7,'No.',0,0,'C',true);
                    $pdf->Cell(16,7,'NAME',0,0,'C',true);
                    $pdf->Cell(47.5,7,'',0,0,'C',true);
                    $pdf->Cell(22.2,7,'ADDRESS',0,1,'C',true);
                    $pdf->Cell(195.2,7,'Female',0,1,'C',true);
                    $pdf->SetTextColor(0);
                    $pdf->SetFont('Helvetica','B',8);
					$pdf->Ln();
					++$rowcount;
                }
                $bct++;
			}
		}
        //NEW SECTION
        $pdf->Cell(0,4,'',0,1,'C',true);
	    $pdf->SetFont('Arial','B',10);
        $pdf->SetFillColor(59, 138, 136);
		$pdf->SetTextColor(255);
        $pdf->Cell(195.2,7,'Grade 8 - DAEDALUS',0,1,'C',true);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0);
        $pdf->Cell(25,7,'LRN',0,0,'C',true);
	    $pdf->Cell(15,7,'No.',0,0,'C',true);
	    $pdf->Cell(16,7,'NAME',0,0,'C',true);
	    $pdf->Cell(47.5,7,'',0,0,'C',true);
	    $pdf->Cell(22.2,7,'ADDRESS',0,1,'C',true);
        $pdf->Cell(195.2,7,'Male',0,1,'C',true);
		$pdf->SetTextColor(0);
        $pdf->SetFont('Helvetica','B',8);
		
		$malew = $mysqli->query("SELECT sis_student.lrn, concat(sis_student.stu_lname, ', ', sis_student.stu_fname, ' ', COALESCE(sis_student.stu_mname, ''), '' ) as 'Full Name', concat(sis_student.house_no, ' ', sis_student.street, ' ', sis_student.brng, ' ', sis_student.munic) as addr FROM sis_student, sis_stu_rec, css_section, css_school_yr WHERE sis_student.lrn = sis_stu_rec.lrn AND sis_stu_rec.section_id = css_section.SECTION_ID AND sis_stu_rec.sy_id = css_school_yr.sy_id AND sis_gender = 'Male' AND css_section.SECTION_NAME = 'DAEDALUS' AND css_section.YEAR_LEVEL = '8' ");
		if($malew->num_rows > 0){
			while($row = $malew->fetch_array()){
				$resq[] = $row;
			}
            $bct=1;
			foreach($resq as $get_res){
				$one = $get_res['lrn'];
				$two = $get_res['Full Name'];
				$three = $get_res['addr'];
				
                $pdf->Cell(15,6,$bct,0,0,'C',true);
				$pdf->Cell(25,6,$one,0,0,'C',true);
				$pdf->Cell(65,6,$two,0,0,'L',true);
				$pdf->Cell(90.2,6,$three,0,1,'L',true);
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
                    $pdf->Cell(25,7,'LRN',0,0,'C',true);
                    $pdf->Cell(15,7,'No.',0,0,'C',true);
                    $pdf->Cell(16,7,'NAME',0,0,'C',true);
                    $pdf->Cell(47.5,7,'',0,0,'C',true);
                    $pdf->Cell(22.2,7,'ADDRESS',0,1,'C',true);
                    $pdf->Cell(195.2,7,'Male',0,1,'C',true);
                    $pdf->SetTextColor(0);
                    $pdf->SetFont('Helvetica','B',8);
					++$rowcount;
                }
                $bct++;
			}
		}
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(195.2,7,'Female',0,1,'C',true);
        ++$rowcount;
        $pdf->SetFont('Helvetica','B',8);
        $femalew = $mysqli->query("SELECT sis_student.lrn, concat(sis_student.stu_lname, ', ', sis_student.stu_fname, ' ', COALESCE(sis_student.stu_mname, ''), '' ) as 'Full Name', concat(sis_student.house_no, ' ', sis_student.street, ' ', sis_student.brng, ' ', sis_student.munic) as addr FROM sis_student, sis_stu_rec, css_section, css_school_yr WHERE sis_student.lrn = sis_stu_rec.lrn AND sis_stu_rec.section_id = css_section.SECTION_ID AND sis_stu_rec.sy_id = css_school_yr.sy_id AND sis_gender = 'Female' AND css_section.YEAR_LEVEL = '8' ");
		if($femalew->num_rows > 0){
			while($row = $femalew->fetch_array()){
				$resr[] = $row;
			}
            $gct=1;
			foreach($resr as $get_res){
				$a = $get_res['lrn'];
				$b = $get_res['Full Name'];
				$c = $get_res['addr'];
				
				$pdf->Cell(15,6,$gct,0,0,'C',true);	
				$pdf->Cell(25,6,$a,0,0,'C',true);
				$pdf->Cell(65,6,$b,0,0,'L',true);
				$pdf->Cell(90.2,6,$c,0,1,'L',true);
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
                    $pdf->Cell(195.2,7,'Grade 8 - DAEDALUS',0,1,'C',true);
                    $pdf->SetFillColor(255, 255, 255);
                    $pdf->SetTextColor(0);
                    $pdf->Cell(25,7,'LRN',0,0,'C',true);
                    $pdf->Cell(15,7,'No.',0,0,'C',true);
                    $pdf->Cell(16,7,'NAME',0,0,'C',true);
                    $pdf->Cell(47.5,7,'',0,0,'C',true);
                    $pdf->Cell(22.2,7,'ADDRESS',0,1,'C',true);
                    $pdf->Cell(195.2,7,'Female',0,1,'C',true);
                    $pdf->SetTextColor(0);
                    $pdf->SetFont('Helvetica','B',8);
					$pdf->Ln();
					++$rowcount;
                }
                $gct++;
			}
		}
		$pdf->Output(); 

?>