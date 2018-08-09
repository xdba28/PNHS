<?php
require 'fpdf.php';

include_once('db_connect.php');
session_start();
$session = $_SESSION['user_data']['acct']['cms_account_ID'];

//query to get month and week
if(isset($_POST['submit_week']))
{
	$w = $_POST['week'];
	$num =explode("-",$w);  
	
	if($num[3] == 0)
	{
		$start = $num[0].'-'.$num[1].'-'.$num[2];
		$end = date('Y-m-t',strtotime($start));
		$weeknum = "";
	}
	else if($num[3] == 1)
	{
		$start = $num[0].'-'.$num[1].'-'.$num[2];
		$end = date( "Y-m-d" ,strtotime('next Saturday', strtotime( $start ) ) );
		$weeknum = "1st Week";
	}
	else if($num[3] == 4)
	{
		$start = $num[0].'-'.$num[1].'-'.$num[2];
		$end = date('Y-m-t',strtotime($start));
		$weeknum = "4th Week";
	}
	else
	{
		$start = $num[0].'-'.$num[1].'-'.$num[2];
		$end = date( "Y-m-d" ,strtotime('+6 day', strtotime( $start ) ) );
		
		if($num[3] == 2)
		{
			$weeknum = "2nd Week";
		}
		else{
			$weeknum = "3rd Week";
		}
	}
}
							

							mysqli_query($mysqli, "LOCK TABLES scms_consultation, scms_prescription, cms_account, sis_student, sis_stu_rec, css_section, pims_personnel, scms_medicine READ");	
							$account = mysqli_query($mysqli, "SELECT *, LEFT(P_mname, 1) FROM cms_account, pims_personnel 
								WHERE cms_account_ID = '".$session."'
								AND cms_account.emp_no = pims_personnel.emp_No");
								
							$acc = mysqli_fetch_array($account);
							
							
							$prep = strtoupper($acc['P_fname'].' '.$acc['P_lname']);
							$fetchmo = mysqli_query($mysqli,"SELECT MONTHNAME(cons_date), YEAR(cons_date), MONTH(cons_date) FROM scms_consultation
										WHERE cons_date BETWEEN '".$start."' AND '".$end."'")
										or die(mysqli_error($mysqli));
							$mo = mysqli_fetch_array($fetchmo);
                            
                            


$pdf=new FPDF('L','mm','LEGAL');
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
    $pdf->SetFont('Times','B', 10);
    $pdf->Cell(0,4,'SCHOOL CLINIC',0,0,'C',true);
	$pdf->Ln();
	$pdf->Cell(0,4,'PATIENT RECORDS',0,0,'C',true);
	$pdf->Ln();
	$pdf->Image('citydiv_logo.png',115,7,21);
	$pdf->Image('pnhs_logo.png',220,7,21);
$pdf->Ln();
$pdf->SetFont('Arial','B',9);
$pdf->Cell(110,3,"MONTH: {$mo['MONTHNAME(cons_date)']} {$weeknum} {$mo['YEAR(cons_date)']}",0,0,'L',true);
$pdf->Ln();
$pdf->Ln();
		$pdf->SetFont('Arial','B',8);
		$pdf->SetFillColor(255, 255, 255);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(0,0,0);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');

	    $pdf->Cell(50.1,7,'Name',1,0,'C',true);
        $pdf->Cell(30.1,7,'Section',1,0,'C',true);
	    $pdf->Cell(25,7,'Date',1,0,'C',true);
	    $pdf->Cell(84,7,'Complaint',1,0,'C',true);
	    $pdf->Cell(50,7,'Diagnosis',1,0,'C',true);
	    $pdf->Cell(50.7,7,'Treatment',1,0,'C',true);
	    $pdf->Cell(45,7,'Medicine',1,0,'C',true);
$pdf->Ln();
        $pdf->SetFont('Arial','',8);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0);
	    $pdf->SetDrawColor(0,0,0);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','');

$fetch_consult = mysqli_query($mysqli, 
										"SELECT * FROM scms_consultation, scms_prescription, cms_account
										WHERE scms_consultation.patient_id = scms_prescription.patient_id
                                        AND cms_account.cms_account_ID = scms_consultation.cms_account_ID
										AND cons_date BETWEEN '".$start."' AND '".$end."'
										GROUP BY scms_consultation.patient_id
										ORDER BY scms_consultation.patient_id DESC")
										or die("Error: Could not fetch rows!".mysqli_error($mysqli));
										
									
									
									$count = 1;
									while($row = mysqli_fetch_array($fetch_consult))
									{
										if($row['emp_no'] == NULL)
										{
											$f_name = mysqli_query($mysqli, "SELECT * FROM sis_student, cms_account, sis_stu_rec, css_section
											WHERE sis_student.lrn = '".$row['lrn']."'
											AND sis_student.lrn = cms_account.lrn
                                            AND sis_student.lrn = sis_stu_rec.lrn
                                            AND sis_stu_rec.section_id = css_section.SECTION_ID")
											or die("Error: ".mysqli_error($mysqli));
											$name = mysqli_fetch_array($f_name);
											$n = $count.'. '.strtoupper($name['stu_lname'].', '.$name['stu_fname']);
                                            $s = strtoupper($name['YEAR_LEVEL'].'-'.$name['SECTION_NAME']);
										}
										else if($row['lrn'] == NULL)
										{
											$f_name = mysqli_query($mysqli, "SELECT * FROM pims_personnel, cms_account
											WHERE pims_personnel.emp_No = '".$row['emp_no']."'
											AND pims_personnel.emp_No = cms_account.emp_no")
											or die("Error: ".mysqli_error($mysqli));
											$name = mysqli_fetch_array($f_name);
											$n = $count.'. '.strtoupper($name['P_lname'].', '.$name['P_fname']);
                                            $s = "{Personnel}";
										}
										
										$patno = $row['patient_id'];
										
										$presc = mysqli_query($mysqli, "SELECT * FROM scms_prescription, scms_medicine 
											WHERE patient_id = '".$patno."' && scms_prescription.med_no = scms_medicine.med_no
											ORDER BY patient_id")
											or die("Error: ".mysqli_error($mysqli));
											
										$med = "";
										$qty = "";
                                        $medqty="";
										while ($pres = mysqli_fetch_array($presc))
										{
											$med =  $pres['brand_name'] . ','. $med ;
											$qty =  $pres['pres_qty'] . ','. $qty ;
                                            $medqty = '('.$pres['pres_qty'] .') '.$pres['brand_name'].' '.$medqty;
										}
                                        $count++;
										mysqli_query($mysqli, "UNLOCK TABLES");

									

	    $pdf->Cell(50.1,7,"{$n}",1,0,'L',true);
        $pdf->Cell(30.1,7,"{$s}",1,0,'C',true);
	    $pdf->Cell(25,7,"{$row['cons_date']}",1,0,'C',true);
	    $pdf->Cell(84,7,"{$row['complaint']}",1,0,'C',true);
	    $pdf->Cell(50,7,"{$row['diagnosis']}",1,0,'C',true);
	    $pdf->Cell(50.7,7,"{$row['treatment']}",1,0,'C',true);
	    $pdf->Cell(45,7,"{$medqty}",1,0,'C',true);
$pdf->Ln();
}
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial','',10);
$pdf->Cell(0,5,'Prepared by: ',0,1,'L',true);
$pdf->SetFont('Arial','U',10);
$pdf->Cell(90,5,"     {$prep}     ",0,1,'C',true);
$pdf->SetFont('Arial','',8);

$filename = 'Monthly Patient Record.pdf';

$pdf->output($filename, "I");
?>