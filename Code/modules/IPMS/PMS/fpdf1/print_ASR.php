<?php
require 'fpdf.php';

include_once('db_connect.php');
session_start();

	if(isset($_POST['submit_sy']))
	{
		$sy = $_POST["sy"];
    }
       
$fetch_schoolyr = mysqli_query($connect, "SELECT CONCAT(sy_start,'-', sy_end) AS SY FROM css_school_yr 
                                        WHERE css_school_yr.sy_id = '".$sy."' ")
										or die(mysqli_error($connect));
$schoolyr = mysqli_fetch_array($fetch_schoolyr);
	
//query to get NSR of a class



$pdf=new FPDF('P','mm','LEGAL');
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
	$pdf->Cell(0,4,'ANNUAL STATISTICS REPORT',0,0,'C',true);
	$pdf->Ln();
	$pdf->Cell(0,4,"SY {$schoolyr['SY']}",0,0,'C',true);
	$pdf->Ln();
	$pdf->Image('pnhs_logo.png',110,13,23);

$pdf->Ln();
$pdf->Ln();
		$pdf->SetFont('Arial','B',8);
		$pdf->SetFillColor(255, 255, 255);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(0,0,0);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');

	    $pdf->Cell(15.1,7,'Quarter',1,0,'C',true);
	    $pdf->Cell(30,7,'Month',1,0,'C',true);
	    $pdf->Cell(32,7,'Notification to Parents',1,0,'C',true);
	    $pdf->Cell(30,7,'Emergency Referrals',1,0,'C',true);
	    $pdf->Cell(10.7,7,'Total',1,0,'C',true);
	    $pdf->Cell(35,7,"First Aid Care Given",1,0,'C',true);
        $pdf->Cell(45,7,'Medical Examination Conducted',1,0,'C',true);

$pdf->Ln();
        $pdf->SetFont('Arial','B',8);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0);
	    $pdf->SetDrawColor(0,0,0);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
                                            
                                    if(isset($_POST['submit_sy']))
											{
												$sy = $_POST['sy'];
												$fetch_sy = mysqli_query($connect, "SELECT * FROM css_school_yr 
													WHERE sy_id = '".$sy."'")
													or die(mysqli_error($connect));
												$fsy = mysqli_fetch_array($fetch_sy);
												
												$month = ["06", "07", "08", "09", "10", "11", "12", "01", "02", "03"];
												$home = '';
												$hos = '';
												$hh = '';
												$aid = '';
												$naid = '';
												$countm = 1;
												for($m = 0; $m < 10; $m++)
												{
													$monthName = date("F", mktime(0, 0, 0, $month[$m], 10));
													if($m < 7)
													{
														$fstart = $fsy['sy_start']."-".$month[$m]."-01";
														$fend = date('Y-m-t',strtotime($fstart));
														
														$fetch_annual = mysqli_query($connect, "SELECT COUNT(CASE WHEN scms_consultation.disposition='Send home' THEN 1 END) As sendhome,
															COUNT(CASE WHEN scms_consultation.disposition='Send to hospital' THEN 1 END) As sendtohospital,
															COUNT(CASE WHEN scms_consultation.treatment='First Aid' THEN 1 END) As firstaid,
															COUNT(CASE WHEN scms_consultation.treatment!='First Aid' THEN 1 END) As notfirstaid
															FROM scms_consultation
															WHERE cons_date BETWEEN '".$fstart."' AND '".$fend."'
															ORDER BY cons_date")
															or die(mysqli_error($connect));
													}
													else
													{
														$fstart = $fsy['sy_end']."-".$month[$m]."-01";
														$fend = date('Y-m-t',strtotime($fstart));
														
														$fetch_annual = mysqli_query($connect, "SELECT COUNT(CASE WHEN scms_consultation.disposition='Send home' THEN 1 END) As sendhome,
															COUNT(CASE WHEN scms_consultation.disposition='Send to hospital' THEN 1 END) As sendtohospital,
															COUNT(CASE WHEN scms_consultation.treatment='First Aid' THEN 1 END) As firstaid,
															COUNT(CASE WHEN scms_consultation.treatment!='First Aid' THEN 1 END) As notfirstaid
															FROM scms_consultation
															WHERE cons_date BETWEEN '".$fstart."' AND '".$fend."'
															ORDER BY cons_date")
															or die(mysqli_error($connect));
													}
													
													$annual = mysqli_fetch_array($fetch_annual);
													$home_hos = $annual['sendtohospital'] + $annual['sendhome'];
													$home += $annual['sendhome'];
													$hos += $annual['sendtohospital'];
													$hh += $home_hos;
													$aid += $annual['firstaid'];
													$naid += $annual['notfirstaid'];
													
													if($m == 0 || $m == 3 || $m == 5 || $m == 8)
													{
	                                                   $pdf->Cell(15.1,7,"{$countm}",1,0,'C',true);
															$countm++;
													}
													else{
	                                                   $pdf->Cell(15.1,7,'',1,0,'C',true);
													}
                                                        $pdf->Cell(30,7,"{$monthName}",1,0,'C',true);
                                                        $pdf->Cell(32,7,"{$annual['sendhome']}",1,0,'C',true);
                                                        $pdf->Cell(30,7,"{$annual['sendtohospital']}",1,0,'C',true);
                                                        $pdf->Cell(10.7,7,"{$home_hos}",1,0,'C',true);
                                                        $pdf->Cell(35,7,"{$annual['firstaid']}",1,0,'C',true);
                                                        $pdf->Cell(45,7,"{$annual['notfirstaid']}",1,0,'C',true); 
                                                        $pdf->Ln();
												}
												
                                                        $pdf->Cell(15,7,"",1,0,'C',true);
												        $pdf->Cell(30,7,"Total",1,0,'C',true);
                                                        $pdf->Cell(32,7,"{$home}",1,0,'C',true);
                                                        $pdf->Cell(30,7,"{$hos}",1,0,'C',true);
                                                        $pdf->Cell(10.7,7,"{$hh}",1,0,'C',true);
                                                        $pdf->Cell(35,7,"{$aid}",1,0,'C',true);
                                                        $pdf->Cell(45,7,"{$naid}",1,0,'C',true);
												

											}
								

$pdf->Ln(); 
$pdf->Ln();
$pdf->Ln(); 
$pdf->Ln();                                
$pdf->Cell(160,5,'Prepared by: ',0,1,'R',true);
$pdf->Cell(189,5,'___________________________',0,1,'R',true);

$pdf->output();
?>