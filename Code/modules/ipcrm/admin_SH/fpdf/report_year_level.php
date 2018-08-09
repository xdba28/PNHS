<?php
session_start(); 
$sy_id = $_SESSION['sy_id'];
include 'db_conn.php';
require('mc_table.php');
$grade = 7;
$query = mysqli_query($conn, "SELECT year FROM css_school_yr WHERE sy_id=$sy_id");
$row = mysqli_fetch_row($query);

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
while ($grade<=10) { 
	if($grade==7 || $grade==9){
		$time=array('06:30-07:20', '07:20-08:10', '08:10-09:00', '09:10-10:00', '10:00-10:50', '10:50-11:40', '11:40-12:30', '');
		$times=array('06:30:00', '07:20:00', '08:10:00', '09:10:00', '10:00:00', '10:50:00', '11:40:00');
    	$timee=array('07:20:00', '08:10:00', '09:00:00', '10:00:00', '10:50:00', '11:40:00', '12:30:00');
    	$timess=array('12:30:00', '01:20:00', '02:10:00', '03:10:00', '04:00:00', '04:50:00', '05:40:00');
	}
	else{
		$time=array('12:30-01:20', '01:20-02:10', '02:10-03:00', '03:10-04:00', '04:00-04:50', '04:50-05:40', '05:40-06:30', '');
		$times=array('12:30:00', '01:20:00', '02:10:00', '03:10:00', '04:00:00', '04:50:00', '05:40:00');
    	$timee=array('01:20:00', '02:10:00', '03:00:00', '04:00:00', '04:50:00', '05:40:00', '06:30:00');
    	$timess=array('06:30:00', '07:20:00', '08:10:00', '09:10:00', '10:00:00', '10:50:00', '11:40:00');
	}

	$sec = mysqli_query($conn, "SELECT * FROM css_section, css_school_yr
								WHERE css_section.sy_id=css_school_yr.sy_id
								AND YEAR_LEVEL=$grade AND css_school_yr.sy_id=$sy_id");
	$count = mysqli_num_rows($sec);
	$x=0;
	$c=0;
	$sec_name=null;
	$room=null;
	$sched_p=null;
	$ts=null;
	$te=null;

	foreach ($sec as $key) {
		$sec_name[$c][$x] = $key['SECTION_NAME'];
		$r = mysqli_query($conn, "SELECT ROOM_NO, P_fname, P_lname 
								FROM css_section, pims_personnel, pims_employment_records
								WHERE pims_personnel.emp_No=pims_employment_records.emp_No
								AND pims_employment_records.emp_rec_ID=css_section.emp_rec_id
								AND SECTION_ID=".$key['SECTION_ID']."");
		$row1 = mysqli_fetch_row($r);
		$room[$c][$x] = $row1[0];
		$adv[$c][$x] = substr($row1[1], 0, 1).".".$row1[2];

		$sched = mysqli_query($conn, "SELECT subject_name,  P_fname, P_lname, TIME_START, TIME_END, 
							  DAY, css_subject.subject_id
                              FROM css_schedule, css_subject, pims_employment_records, pims_personnel,
                              css_section, css_school_yr
                              WHERE pims_employment_records.emp_rec_ID=css_schedule.emp_rec_ID
                              AND pims_employment_records.emp_No=pims_personnel.emp_No
                              AND css_schedule.SECTION_ID = css_section.SECTION_ID
                              AND css_schedule.subject_id = css_subject.subject_id
                              AND css_schedule.SY_ID = css_school_yr.SY_ID
                              AND css_school_yr.SY_ID=$sy_id 
                              AND css_section.SECTION_ID=".$key['SECTION_ID']."");

		foreach ($sched as $rows) {
			$teach_str = substr($rows['P_fname'], 0, 1).". ".$rows['P_lname'];
			$sub = $rows['subject_id'];
  			if($sub==50005||$sub==50009||$sub==50012){
    			$teach_str = "";
  			}
			for($i=0; $i<7; $i++){
    			if($times[$i]==$rows['TIME_START']){
      				$ts = $i;
    			}
  			}

			for($i=0; $i<7; $i++){
			    if($timee[$i]==$rows['TIME_END']){
			      $te = $i;
			    }
			}
			$check = 0;
			for($i=0; $i<7; $i++){
			    if($timess[$i]==$rows['TIME_START']){
			      $check = 1;
			    }
			}
		
		if($check==1){
		    $tss=substr($rows['TIME_START'], 0, -3);
		    $tee=substr($rows['TIME_END'], 0, -3);

		      $sched_p[$c][7][$x]="";

		    if($rows['DAY']=='regular'){
      			if($sub==50005||$sub==50009||$sub==50012){
        			$sched_p[$c][7][$x] .= $rows['subject_name'].' '.$teach_str."\n".$tss."-".$tee;
      			}
      			else{
        			$sched_p[$c][7][$x] .= $rows['subject_name'].'/'.$teach_str."\n".$tss."-".$tee;
      			}
    		}
    		else{
      			if($sub==50005||$sub==50009||$sub==50012){
        			$sched_p[$c][7][$x] .= $rows['subject_name'].' '.$teach_str.'('.$rows['DAY'].')'."\n".$tss."-".$tee;
      			}
      			else{
        			$sched_p[$c][7][$x] .= $rows['subject_name'].'/'.$teach_str.'('.$rows['DAY'].')'."\n".$tss."-".$tee;
      			}
    		}
		}

		while($ts<=$te){
		    if($rows['DAY']!='regular'){
		      if(empty($sched_p[$c][$ts][$x])){
		        $sched_p[$c][$ts][$x]=$rows['subject_name'].'/'.$teach_str.' ('.$rows['DAY'].')'."\n".'';
		      }
		      else{
		        $sched_p[$c][$ts][$x] .= $rows['subject_name'].'/'.$teach_str.' ('.$rows['DAY'].')'."\n".'';
		      }
		    }
		    else{
		      if($rows['subject_name']=='Specialization'){
		        if(empty($sched_p[$c][$ts][$x])){
		          $sched_p[$c][$ts][$x] = $rows['subject_name']."\n";
		        }
		        $sched_p[$c][$ts][$x] .= $teach_str."\n";
		      }
		      else{
		        $sched_p[$c][$ts][$x] = $rows['subject_name']."\n".$teach_str;
		      }
		    }
		$ts++;
		}
		}
		include "empty_teach.php";



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

	$count = $count / 9;
	$count = ceil($count);

	for ($c=0; $c < $count; $c++) { 
		
	

	$pdf->AddPage();
	$pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.3);

	// Logo
	//
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
	$pdf->Cell(0,4,'SCHEDULE OF CLASSES'.' (SY '.$row[0].')',0,0,'C',true);
	$pdf->Ln();
	$pdf->Cell(0,4,'GRADE '.$grade.'',0,0,'C',true);
	$pdf->Ln();
	$pdf->Image('pnhs_logo.jpg',125,10,20);
	

	$pdf->Ln();
	$pdf->SetFont('Arial','B',8);

//Table with 20 rows and 4 columns
	$pdf->SetWidths(array(25,34.5,34.5,34.5,34.5,34.5,34.5,34.5,34.5,34.5));
	//srand(microtime()*1000000);
	
	$subj = "Mapeh";
	for ($i=0; $i < 9; $i++) { 
		if(empty($sec_name[$c][$i])){
			$sec_name[$c][$i]="";
		}
		if(empty($room[$c][$i]) || empty($adv[$c][$i])){
			$room[$c][$i]="";
			$adv[$c][$i]="";
		}
	}
	
	$pdf->Row(array("TIME",$sec_name[$c][0],$sec_name[$c][1],$sec_name[$c][2],$sec_name[$c][3],$sec_name[$c][4],$sec_name[$c][5],$sec_name[$c][6],$sec_name[$c][7],$sec_name[$c][8]));
	
	$pdf->Row(array("ROOM NO.",$room[$c][0],$room[$c][1],$room[$c][2],$room[$c][3],$room[$c][4],$room[$c][5],$room[$c][6],$room[$c][7],$room[$c][8]));

	for ($a=0; $a < 8; $a++) { 
		for ($b=0; $b < 9; $b++) { 
			if(empty($sched_p[$c][$a][$b]))
				$sched_p[$c][$a][$b]="";
		}
	}

for ($i=0; $i < 8; $i++) { 
	$pdf->Row(array("\n$time[$i]\n ",$sched_p[$c][$i][0],$sched_p[$c][$i][1],$sched_p[$c][$i][2],$sched_p[$c][$i][3],$sched_p[$c][$i][4],$sched_p[$c][$i][5],$sched_p[$c][$i][6],$sched_p[$c][$i][7],$sched_p[$c][$i][8]));
}

	
	$pdf->Row(array("ADVISER",$adv[$c][0],$adv[$c][1],$adv[$c][2],$adv[$c][3],$adv[$c][4],$adv[$c][5],$adv[$c][6],$adv[$c][7],$adv[$c][8]));
	}
$grade++;
}
	$filename = "Year Level Report S.Y. ".$row[0].".pdf";
	$pdf->Output($filename, "I");
?>
