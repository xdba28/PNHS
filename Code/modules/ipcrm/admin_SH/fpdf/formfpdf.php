<?php
	include("../../func.php");
    include("../../dbcon.php");
    include("../../session.php");
	require('mc_table.php');

// Page footer
function Footer() 
{
	// Position at 1.5 cm from bottom
	$this->SetY(-10);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// Page number
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}

// Instanciation of inherited class
$pdf = new PDF_MC_Table('L','mm','A4');
	$pdf->AddPage();
	$pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.3);
	$pdf->SetTitle("IPCRF" ,true);

	$pdf->SetFont('Arial','B',8);
	$pdf->SetLineWidth(0.5);
    $pdf->Image('..\docs\img\leg.png',20,15,25);
    $pdf->Cell(50,5);
	$pdf->Cell(180,5,'Department of Education',0,1,'C');
	$pdf->Cell(50,5);
	$pdf->Cell(180,5,'Region V(Bicol)',0,1,'C');
	$pdf->Cell(50,5);
	$pdf->Cell(180,5,'Schools Division of Legaspi City',0,1,'C');
	$pdf->Cell(50,5);
	$pdf->Cell(180,5,'PAG-ASA NATIONAL HIGH SCHOOL',0,1,'C');
	$pdf->Cell(50,5);
	$pdf->Cell(180,5,'Rawis, Legaspi City',0,1,'C');
	$pdf->Cell(50,5);
    $pdf->Image('..\docs\img\pnhs_logo.jpg',255,15,25);
	$pdf->SetFont('Arial','B',10);
	
		// Logo
	
	$pdf->Ln();
	$pdf->Cell(50,5);
	$pdf->Cell(180,5,' INDIVIDUAL PERFORMANCE COMMITMENT AND REVIEW FORM',0,1,'C');
	
	
	$vid = $_GET['emp'];
	$sqry=mysqli_query($mysqli,"SELECT * FROM pims_personnel NATURAL JOIN pims_employment_records  NATURAL JOIN pims_job_title
	where emp_No='$vid'");
	while($row3=mysqli_fetch_assoc($sqry)){
	$pst=$row3['job_title_name'];
	$emp = $row3['P_fname'].' '. $row3['P_mname'] .' '. $row3['P_lname'] ;
	
	$pdf->SetFont('Arial','',8 );
    $pdf->ln();
	$pdf->Cell(10,6);
	$pdf->Cell(35,6,'Name of Employee: ',0,0,'L');
	$pdf->SetFont('Arial','B',8 );
	$pdf->Cell(1,6);
	$pdf->Cell(50,6,''.$emp.' ',1,0,'L');
	
	$pdf->Cell(60,6);
	$pdf->Cell(35,6,'Division: ',0,0,'R');
	$pdf->SetFont('Arial','B',8 );
	$pdf->Cell(1,6);
	$pdf->Cell(50,6,' Legaspi City',1,0,'L');
	
	$pdf->SetFont('Arial','',8 );
	$pdf->Ln(10);
	$pdf->Cell(10,6);
	$pdf->Cell(35,6,'Position: ',0,0,'L');
	$pdf->SetFont('Arial','B',8 );
	$pdf->Cell(1,6);
	$pdf->Cell(50,6,' '.$pst.'',1,0,'L');
	$pdf->SetFont('Arial','',8 );
	$pdf->Cell(60,6);
	$pdf->Cell(35,6,'Rating Period:',0,0,'R');
	$pdf->SetFont('Arial','B',10 );
	$pdf->Cell(1,6);
	$pdf->Cell(50,6,'2017-2018',1,0,'L');
	
	$pdf->SetFont('Arial','B',8);
	$pdf->Ln(10);
	$pdf->Cell(200,9,'TO BE BUILD IN DURING PLANNING',1,0,'C');
	$pdf->Cell(75,9,'TO BE FILLED IN DURING EVALUATION',1,0,'C');
	$pdf->Ln();
	
	$pdf->Cell(20,10,"MFO's",1,0,'C'); 
	$pdf->Cell(20,10,"KRA's",1,0,'C'); 
	$pdf->Cell(50,10,"OBJECTIVES",1,0,'C'); 
	$pdf->Cell(20,10,"TIMELINE",1,0,'C');
	$pdf->SetFont('Arial','B',6);
    $y = $pdf->GetY();
    $x = $pdf->GetX();
    $width = 11;
	$pdf->MultiCell($width,5, "WEIGHT\nfor KRA", "1", 'C');
    $pdf->SetXY($x + $width, $y);   
    $pdf->SetFont('Arial','B',8);    
    $pdf->Cell(79,5,"PERFORMANCE INDICATORS",1,0,'C');
    $pdf->Cell(46,5,"ACTUAL RESULTS",1,0,'C');
    $pdf->Cell(15,10,"RATING",1,0,'C');
    $pdf->Cell(14,10,"SCORE",1,0,'C');
    $pdf->Cell(0,5,'',0,1);
	
		
    //2nd line row
    $pdf->Cell(121,5,'',0,0);
    $pdf->Cell(79,5,'(Quality, Efficiency, Timeliness)',1,0,'C');
    $pdf->Cell(15.5,5,"Q",1,0,'C');
    $pdf->Cell(15.5,5,"E",1,0,'C');
    $pdf->Cell(15,5,"T",1,1,'C');
	
	$qry = mysqli_query($mysqli,"Select ipcrms_content.obj_id,MFO_Description,KRA_Description, kra_obj, timeline, kra_wpk, perf_5, perf_4, perf_3	,perf_2,perf_1
	from ipcrms_kra, ipcrms_obj, ipcrms_mfo, ipcrms_perf_indicator,ipcrms_content 
	where ipcrms_obj.KRA_ID = ipcrms_kra.KRA_ID 
	and ipcrms_kra.MFO_ID=ipcrms_mfo.MFO_ID
	and ipcrms_content.obj_id=ipcrms_obj.obj_id
	and ipcrms_perf_indicator.OBJ_ID=ipcrms_obj.OBJ_ID
	AND ipcrms_content.emp_No=$vid");
	$oa=0;
			while($row = mysqli_fetch_array($qry)){
			$desc = $row['MFO_Description'];
					$kradesc = $row['KRA_Description'];
					$kraobj = $row['kra_obj'];
					$tim = $row['timeline'];
					$kwpk = $row['kra_wpk'];
					$perf_5 = $row['perf_5'];
					$perf_4 = $row['perf_4'];
					$perf_3 = $row['perf_3'];
					$perf_2 = $row['perf_2'];
					$perf_1 = $row['perf_1'];
					$obj=$row['obj_id'];
					
					$krawp = $kwpk * 100;


					
				$vsql=mysqli_query($mysqli,"Select * from ipcrms_content where ipcrms_content.OBJ_ID=$obj 
										and ipcrms_content.emp_No=$vid");
									while($vrow=mysqli_fetch_assoc($vsql)){ 
									$a=$vrow['q_val'];
									$b=$vrow['e_val'];
									$c=$vrow['t_val'];
									$d=$vrow['rating'];
									$e=$vrow['score'];

									
									$rating=($a+$b+$c)/3;
		           					$score=$rating*$kwpk;
		            				$oa+=number_format((float)$score, 2, '.', '');

		            				// check adjectival rating
						            if ($oa >= 4.50) {
						              $adjectivalrate = '<h4 class="cent_text text-success"> <b> Outstanding </b> </h4>';
						              $adj_rate = 'Outstanding';

						            } elseif ($oa >= 3.50 || $oa == 4.49 ) {
						              $adjectivalrate = '<h4 class="cent_text text-success"> <b> Very Satisfactory </b> </h4>';
						              $adj_rate = 'Very Satisfactory';

						            } elseif ($oa >= 2.50 || $oa == 3.49 ) {
						              $adjectivalrate = '<h4 class="cent_text text-primary"> <b> Satisfactory </b> </h4>';
						              $adj_rate = 'Satisfactory';

						            } elseif ($oa >= 1.50 || $oa == 2.49 ) {
						              $adjectivalrate = '<h4 class="cent_text text-warning"> <b> Unsatisfactory </b> </h4>';
						              $adj_rate = 'Unsatisfactory';

						            } elseif ($oa <= 1.49 ) {
						              $adjectivalrate = '<h4 class="cent_text text-danger"> <b> Poor </b> </h4>';
						              $adj_rate = 'Poor';

						            } else {
						              $adjectivalrate = '<h4 class="cent_text text-danger"> <b> ERROR! </b> </h4>';
						            }


				
					//Table with 20 rows and 4 columns
						$pdf->SetWidths(array(20,20,50,20,11,79,15.5,15.5,15,15,14));
						//srand(microtime()*1000000);
	
						
						$pdf->SetFont('Times','B',8);

						for ($i=0; $i < 1; $i++) {
							$pdf->Row(array("$desc", "$kradesc","$kraobj","$tim","".$krawp."%","$perf_5\n\n $perf_4\n\n $perf_3\n\n $perf_2\n\n $perf_1","$a","$b","$c","".number_format((float)$d, 2, '.', '')."","".number_format((float)$e, 2, '.', '').""));
						}



									}

					

					
			}
			$pdf->SetWidths(array(200,46,29));
			$pdf->Row(array("\n*To get the score, the rating is multiplied by the weight assigned\n\n","OVERALL RATING\n_______________________________\nADJECTIVAL RATING ","".number_format((float)$oa, 2, '.', '')."\n___________________\n".$adj_rate."\n"));


	}
	
	
	$sqry1=mysqli_query($mysqli,"SELECT * FROM pims_personnel NATURAL JOIN pims_employment_records  NATURAL JOIN pims_job_title NATURAL JOIN pims_department
	where emp_No='$vid'");
	while($fetchdep = mysqli_fetch_assoc($sqry1)){
		$depp = $fetchdep['dept_ID'];
	}	
			
			
			$fetch_head = mysqli_query($mysqli, "SELECT * FROM pims_employment_records, pims_department, pims_personnel, pims_job_title
			WHERE pims_employment_records.emp_No = pims_personnel.emp_No
			AND pims_employment_records.dept_ID = pims_department.dept_ID
			AND pims_employment_records.job_title_code=pims_job_title.job_title_code
			AND pims_department.dept_ID='$depp'
			AND (pims_job_title.job_title_code='HTEACH1' 
			OR pims_job_title.job_title_code='HTEACH2'
			OR pims_job_title.job_title_code='HTEACH3'
			OR pims_job_title.job_title_code='HTEACH4'
			OR pims_job_title.job_title_code='HTEACH5'
			OR pims_job_title.job_title_code='HTEACH6')");
			$fetch = mysqli_fetch_assoc($fetch_head);
			$dep = $fetch['P_fname'].' '. $fetch['P_mname'] .' '. $fetch['P_lname'] ;
			$pdf->SetFont('Arial','B',10);
			$pdf->Ln(40);	
			$pdf->Cell(10,5);
			$pdf->Cell(50,8,''.$emp.'',0,0,'C');
            $pdf->Cell(50,5);
            $pdf->Cell(50,8,''.$dep.'',0,0,'C');
            $pdf->Cell(50,5);
            $pdf->Cell(50,8,'Jeremy Cruz',0,0,'C');
			$pdf->Ln();
			$pdf->Cell(100,5,'___________________________________',0,0,'J');
            $pdf->Cell(100,5,'___________________________________',0,0,'J');
            $pdf->Cell(100,5,'___________________________________',0,0,'J');
			

			

			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(20,5);
			
			$pdf->SetFont('Arial','',10);
			$pdf->Ln(10);	
			$pdf->Cell(10,5);
			$pdf->Cell(50,3,'Ratee',0,0,'C');
			$pdf->Cell(50,5);
			$pdf->Cell(50,3,'Rater',0,0,'C');
			$pdf->Cell(30,5);
			$pdf->Cell(85,3,'Approving Authority',0,0,'C');

	
$pdf->Output();


?>