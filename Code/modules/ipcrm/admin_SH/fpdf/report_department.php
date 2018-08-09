<?php
session_start(); 
$sy_id = $_SESSION['sy_id'];


include 'db_conn.php';

$query = mysqli_query($conn, "SELECT year FROM css_school_yr WHERE sy_id=$sy_id");
$row = mysqli_fetch_row($query);
require 'mc_table.php';

function GenerateWord()
{
	//Get a random word
		$w= "time";
	return $w;
}

function GenerateSentence()
{

	return $w;
}


$pdf = new PDF_MC_Table('L','mm','Legal');


$times=array('06:30:00', '07:20:00', '08:10:00', '09:10:00', '10:00:00', '10:50:00', '11:40:00',
			'12:30:00', '01:20:00', '02:10:00', '03:10:00', '04:00:00', '04:50:00', '05:40:00');
$timee=array('07:20:00', '08:10:00', '09:00:00', '10:00:00', '10:50:00', '11:40:00', '12:30:00',
			'01:20:00', '02:10:00', '03:00:00', '04:00:00', '04:50:00', '05:40:00', '06:30:00');
$am=array('06:30-07:20', '07:20-08:10', '08:10-09:00', '09:10-10:00', '10:00-10:50', '10:50-11:40', '11:40-12:30', '12:30-01:20', '01:20-02:10', '02:10-03:00', '03:10-04:00', '04:00-04:50', '04:50-05:40', '05:40-06:30');



$query = mysqli_query($conn, "SELECT dept_ID, dept_name FROM pims_department 
							WHERE dept_ID!=2 AND dept_ID!=7 AND dept_ID!=8");
foreach ($query as $deep) {
	$dept_name = $deep['dept_name'];

$dept = mysqli_query($conn, "SELECT * FROM pims_personnel, pims_employment_records, pims_department
                            WHERE pims_personnel.emp_No=pims_employment_records.emp_No 
                            AND pims_department.dept_ID=pims_employment_records.dept_ID
                            AND pims_department.dept_ID=".$deep['dept_ID']."");
$count = mysqli_num_rows($dept);
$count = $count / 9;
$count = ceil($count);
$c = 0;
$x = 0;
$teach=null;
$sec=null;
$adv=null;
$load=null;

foreach ($dept as $key) {
	$teach[$c][$x] = substr($key['P_fname'], 0, 1).".".$key['P_lname'];
	$sched = mysqli_query($conn, "SELECT SECTION_NAME, YEAR_LEVEL, TIME_START, TIME_END, subject_id
								FROM css_schedule, css_section, css_school_yr
								WHERE css_section.SECTION_ID=css_schedule.SECTION_ID
								AND css_schedule.sy_id=css_school_yr.sy_id AND css_schedule.sy_id=$sy_id
								AND css_schedule.emp_rec_id=".$key['emp_rec_ID']."");
	
	foreach ($sched as $val) {
		for ($i=0; $i < 14; $i++) { 
			if($val['TIME_START']==$times[$i] || $val['TIME_END']==$timee[$i]){
				$sec[$c][$i][$x] = $val['YEAR_LEVEL']."-".$val['SECTION_NAME'];
				if(empty($load[$c][$x]))
					$load[$c][$x]=1;
				else
					$load[$c][$x]++;
				if($val['subject_id']==50010){
					if($val['TIME_START']==$times[$i] && $val['TIME_END']==$timee[$i])
						break;
					else
						$sec[$c][$i+1][$x] = $val['YEAR_LEVEL']."-".$val['SECTION_NAME'];
				}
				break;
			}
			
		}
	}


	$advise = mysqli_query($conn, "SELECT SECTION_NAME, YEAR_LEVEL 
					FROM pims_personnel, pims_employment_records, css_section, css_school_yr
					WHERE pims_personnel.emp_No=pims_employment_records.emp_No
					AND pims_employment_records.emp_rec_ID=css_section.emp_rec_id
					AND css_section.sy_id=css_school_yr.sy_id
					AND css_section.sy_id=$sy_id
					AND css_section.emp_rec_id=".$key['emp_rec_ID']."");
	
		$ad = mysqli_fetch_row($advise);
		$adv[$c][$x] = $ad[1]."-".$ad[0];
	

	$x++;
	if($x==9){
		$c++;
		$x=0;
	}
	else if($x==18){
		$c++;
		$x=0;
	}
	else if($x==27){
		$c++; 
		$x=0;
	}
}




for($c=0; $c < $count; $c++){
	$pdf->AddPage();
	$pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.3);

    $pdf->SetFont('Times','B', 8);
    $pdf->Cell(0,3,'DEPARTMENT OF EDUCATION',0,0,'C',true);
    $pdf->SetFont('Times','', 8);
	$pdf->Ln();
	$pdf->Cell(0,4,'REGION V(Bicol)',0,0,'C',true);
    $pdf->SetFont('Arial','B', 8);
	$pdf->Ln();
	$pdf->Cell(0,4,'SCHOOLS DIVISION OF LEGAZPI CITY',0,0,'C',true);
	$pdf->SetFont('Times','', 8);
	$pdf->Ln();
	$pdf->Cell(0,4,'PAG-ASA NATIONAL HIGH SCHOOL',0,0,'C',true);
    $pdf->SetFont('Arial','B', 8);
	$pdf->Ln();
	$pdf->Cell(0,4,'Rawis, Legazpi City',0,0,'C',true);
	$pdf->Ln();
	$pdf->Ln();
    $pdf->SetFont('Times','B', 8);
	$pdf->Cell(0,4,'TEACHER SCHEDULE OF CLASSES'.' (SY '.$row[0].')',0,0,'C',true);
	$pdf->Ln();
	$pdf->Cell(0,4,$dept_name,0,0,'C',true);
	$pdf->Ln();
	$pdf->Image('pnhs_logo.jpg',125,10,20);
	

	$pdf->Ln();
	$pdf->SetFont('Arial','B',8);

	$pdf->SetWidths(array(25,34.5,34.5,34.5,34.5,34.5,34.5,34.5,34.5,34.5));
	//srand(microtime()*1000000);
		
	// Grade 7 and 9 (MORNING) //
	for ($i=0; $i < 9; $i++) { 
		if(empty($teach[$c][$i])){
			$teach[$c][$i] = "";
			$adv[$c][$i] = "";
		}
	}
	for ($i=0; $i < 9; $i++) { 
		if($adv[$c][$i]=='-'){
			$adv[$c][$i] = "";
		}
	}

	$pdf->Row(array("TIME",$teach[$c][0], $teach[$c][1], $teach[$c][2], $teach[$c][3], $teach[$c][4], $teach[$c][5], $teach[$c][6], $teach[$c][7], $teach[$c][8]));

	for ($a=0; $a < 14; $a++) { 
		for ($b=0; $b < 9; $b++) { 
			if(empty($sec[$c][$a][$b]))
				$sec[$c][$a][$b]="";
		}
	}
	for ($i=0; $i < 7; $i++) { 
	
	$pdf->Row(array("\n$am[$i]","\n".$sec[$c][$i][0]."\n","\n".$sec[$c][$i][1]."\n","\n".$sec[$c][$i][2]."\n ","\n".$sec[$c][$i][3]."","\n".$sec[$c][$i][4]."","\n".$sec[$c][$i][5]."","\n".$sec[$c][$i][6]."","\n".$sec[$c][$i][7]."","\n".$sec[$c][$i][8].""));
	
	}
	
	for ($i=0; $i < 9; $i++) { 
		if(empty($load[$c][$i]))
			$load[$c][$i]="";
	}

}

for($c=0; $c < $count; $c++){
	$pdf->AddPage();
	
	// Grade 8 and 10 (AFTERNOON) //
	
    $pdf->SetFont('Times','B', 8);
    $pdf->Cell(0,3,'DEPARTMENT OF EDUCATION',0,0,'C',true);
    $pdf->SetFont('Times','', 8);
	$pdf->Ln();
	$pdf->Cell(0,4,'REGION V(Bicol)',0,0,'C',true);
    $pdf->SetFont('Arial','B', 8);
	$pdf->Ln();
	$pdf->Cell(0,4,'SCHOOLS DIVISION OF LEGAZPI CITY',0,0,'C',true);
	$pdf->SetFont('Times','', 8);
	$pdf->Ln();
	$pdf->Cell(0,4,'PAG-ASA NATIONAL HIGH SCHOOL',0,0,'C',true);
    $pdf->SetFont('Arial','B', 8);
	$pdf->Ln();
	$pdf->Cell(0,4,'Rawis, Legazpi City',0,0,'C',true);
	$pdf->Ln();
	$pdf->Ln();
    $pdf->SetFont('Times','B', 8);
	$pdf->Cell(0,4,'TEACHER SCHEDULE OF CLASSES'.' (SY '.$row[0].')',0,0,'C',true);
	$pdf->Ln();
	$pdf->Cell(0,4,$dept_name,0,0,'C',true);
	$pdf->Ln();
	$pdf->Image('pnhs_logo.jpg',110,13,23);
	

	$pdf->Ln();
	$pdf->SetFont('Arial','B',8);

	$pdf->SetWidths(array(25,34.5,34.5,34.5,34.5,34.5,34.5,34.5,34.5,34.5));
	//srand(microtime()*1000000);
	
	for ($i=0; $i < 9; $i++) { 
		if(empty($teach[$c][$i])){
			$teach[$c][$i] = "";
			$adv[$c][$i] = "";
		}
	}
	for ($i=0; $i < 9; $i++) { 
		if($adv[$c][$i]=='-'){
			$adv[$c][$i] = "";
		}
	}
	
	$pdf->Row(array("TIME",$teach[$c][0], $teach[$c][1], $teach[$c][2], $teach[$c][3], $teach[$c][4], $teach[$c][5], $teach[$c][6], $teach[$c][7], $teach[$c][8]));

	for ($a=0; $a < 14; $a++) { 
		for ($b=0; $b < 9; $b++) { 
			if(empty($sec[$c][$a][$b]))
				$sec[$c][$a][$b]="";
		}
	}
	for ($i=7; $i < 14; $i++) { 
	
	$pdf->Row(array("\n$am[$i]","\n".$sec[$c][$i][0]."\n","\n".$sec[$c][$i][1]."\n","\n".$sec[$c][$i][2]."\n ","\n".$sec[$c][$i][3]."","\n".$sec[$c][$i][4]."","\n".$sec[$c][$i][5]."","\n".$sec[$c][$i][6]."","\n".$sec[$c][$i][7]."","\n".$sec[$c][$i][8].""));
	
	}
	
	for ($i=0; $i < 9; $i++) { 
		if(empty($load[$c][$i]))
			$load[$c][$i]="";
	}

	$pdf->Row(array("TOTAL loads",$load[$c][0],$load[$c][1],$load[$c][2],$load[$c][3],$load[$c][4],$load[$c][5],$load[$c][6],$load[$c][7],$load[$c][8]));
	$pdf->Row(array("ADVISER",$adv[$c][0],$adv[$c][1],$adv[$c][2],$adv[$c][3],$adv[$c][4],$adv[$c][5],$adv[$c][6],$adv[$c][7],$adv[$c][8]));
}
}
	
	$filename = "Department Report S.Y. ".$row[0].".pdf";
	$pdf->Output($filename, "I");

?>
