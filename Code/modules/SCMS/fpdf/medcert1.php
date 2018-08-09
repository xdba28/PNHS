
<?php
require 'fpdf.php';
      
include_once('db_connect.php');
session_start();
$session = $_SESSION['user_data']['acct']['cms_account_ID'];

//query to get pat id

$patno = base64_url_decode($_GET['patno']);
mysqli_query($mysqli, "LOCK TABLES css_school_yr READ");
$fetch_schoolyr = mysqli_query($mysqli, "SELECT * FROM css_school_yr ORDER BY year DESC LIMIT 1")
										or die(mysqli_error($mysqli));
$schoolyr = mysqli_fetch_array($fetch_schoolyr);
mysqli_query($mysqli, "UNLOCK TABLES");
$c = date('F d, Y');

					$account = mysqli_query($mysqli, "SELECT *, LEFT(P_mname, 1) FROM cms_account, pims_personnel 
								WHERE cms_account_ID = '".$session."'
								AND cms_account.emp_no = pims_personnel.emp_No");
								
							$acc = mysqli_fetch_array($account);
							
							
							$prep = strtoupper($acc['P_fname'].' '.$acc['P_lname']);


$pdf=new FPDF('P','mm','LETTER');
$pdf->AddPage();
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0);
$pdf->SetDrawColor(0,0,0);
$pdf->SetLineWidth(.7);

    $pdf->SetFont('Times','B', 12);
    $pdf->Cell(0,5,'DEPARTMENT OF EDUCATION',0,0,'C',true);
    $pdf->SetFont('Times','', 12);
	$pdf->Ln();
	$pdf->Cell(0,5,'REGION V(Bicol)',0,0,'C',true);
    $pdf->SetFont('Arial','B', 12);
	$pdf->Ln();
	$pdf->Cell(0,5,'SCHOOLS DIVISION OF LEGAZPI CITY',0,0,'C',true);
	$pdf->SetFont('Times','', 12);
	$pdf->Ln();
	$pdf->Cell(0,5,'PAG-ASA NATIONAL HIGH SCHOOL',0,0,'C',true);
    $pdf->SetFont('Arial','B', 12);
	$pdf->Ln();
	$pdf->Cell(0,5,'Rawis, Legazpi City',0,0,'C',true);
	$pdf->Ln();
	$pdf->Ln();
    $pdf->SetFont('Times','B', 12);
    $pdf->Cell(0,7,'SCHOOL CLINIC',0,0,'C',true);
	$pdf->Ln();
	$pdf->Cell(0,7,'PROOF OF CONSULTATION',0,0,'C',true);
	$pdf->Ln();
	$pdf->Image('pnhs_logo.png',40,13,23);
$pdf->Ln();

$pdf->Cell(185,3,"Date:  {$c}",0,1,'R',true);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
		$pdf->SetFont('Times','',14);
		$pdf->SetFillColor(255, 255, 255);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(255,255,255);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','');

mysqli_query($mysqli, "LOCK TABLES scms_consultation, scms_prescription, cms_account, sis_student, sis_stu_rec, css_section, pims_personnel READ");		
$fetch_consult = mysqli_query($mysqli,"SELECT * FROM scms_consultation, scms_prescription, cms_account
										WHERE scms_consultation.patient_id = '".$patno."'
                                        AND scms_prescription.patient_id = '".$patno."'
                                        AND cms_account.cms_account_ID = scms_consultation.cms_account_ID
										GROUP BY scms_consultation.patient_id
										ORDER BY scms_consultation.patient_id DESC")
										or die("Error: Could not fetch rows!".mysqli_error($mysqli));



                                    $count = 1;
									while($row = mysqli_fetch_array($fetch_consult))
									{
										if($row['emp_no'] == NULL)
										{
											$f_name = mysqli_query($mysqli, "SELECT * FROM sis_student, cms_account, sis_stu_rec, css_section, scms_consultation
											WHERE sis_student.lrn = '".$row['lrn']."'
											AND sis_stu_rec.lrn = '".$row['lrn']."'
											AND sis_stu_rec.section_id= css_section.SECTION_ID
											AND sis_student.lrn = cms_account.lrn
											AND scms_consultation.patient_id = '".$patno."'")
											or die("Error: ".mysqli_error($mysqli));
											$name = mysqli_fetch_array($f_name);
											$sec = strtoupper($name['YEAR_LEVEL'].'-'.$name['SECTION_NAME']);
											if($name['stu_mname'] == NULL)
											{
												$n = strtoupper($name['stu_lname'].', '.$name['stu_fname']);
											}
											else
											{
												$n = strtoupper($name['stu_lname'].', '.$name['stu_fname'].' '.$name['stu_mname'].'.');
											}
											$diag = strtoupper($name['diagnosis']);
											  
										}
										else if($row['lrn'] == NULL)
										{
											$f_name = mysqli_query($mysqli, "SELECT * FROM pims_personnel, cms_account, scms_consultation
											WHERE pims_personnel.emp_No = '".$row['emp_no']."'
											AND pims_personnel.emp_No = cms_account.emp_no
											AND scms_consultation.patient_id = '".$patno."'")
											or die("Error: ".mysqli_error($mysqli));
											$name = mysqli_fetch_array($f_name);
											if($name['P_mname'] == NULL)
											{
												$n = strtoupper($name['P_lname'].', '.$name['P_fname']);
											}
											else
											{
												$n = strtoupper($name['P_lname'].', '.$name['P_fname'].' '.$name['P_mname'].'.');
											}
											$sec = "N/A";
											$diag = strtoupper($name['diagnosis']);
											
									}
									mysqli_query($mysqli, "UNLOCK TABLES");
									

$pdf->MultiCell(200,7,"               This is to certify that  {$n}  of  {$sec}  was seen/examined and found to be suffering from {$diag}. However, he/she is well and fit to attend his/her classes.",1,'L',false);

                                    }
$pdf->Ln();
$pdf->Ln();


$pdf->Cell(135,5,'Signed by: ',0,1,'R',true);   
$pdf->Ln();
$pdf->SetFont('Arial','U',12);
$pdf->Cell(180,5,"{$prep}",0,1,'R',true);
$pdf->SetFont('Arial','',12);
$pdf->Cell(170,5,"School Nurse",0,1,'R',true);
$filename = 'Proof of Consultation-'.$n.'.pdf';

$pdf->output($filename, "I");
?>