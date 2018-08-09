<?php
require('mc_table.php');

include_once('connect.php');
session_start();
$aid = $_SESSION['user_data']['acct']['cms_account_ID'];


//query to get MIR
$po = $_GET['po'];

					$account = mysqli_query($mysqli, "SELECT *, LEFT(P_mname, 1) FROM cms_account, pims_personnel 
								WHERE cms_account_ID = '".$aid."'
								AND cms_account.emp_no = pims_personnel.emp_No");
								
							$acc = mysqli_fetch_array($account);
							
							
							$prep = strtoupper($acc['P_fname'].' '.$acc['LEFT(P_mname, 1)'].'. '.$acc['P_lname']);	
//query

$pdf=new PDF_MC_Table('P','mm','LEGAL');
$pdf->AddPage();
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0);
$pdf->SetDrawColor(0,0,0);
$pdf->SetLineWidth(.3);

    $pdf->SetFont('Arial','', 10);
    $pdf->Cell(0,4,'Republic of the Philippines',0,1,'C',true);
    $pdf->SetFont('Times','B', 10);
    $pdf->Cell(0,4,'DEPARTMENT OF EDUCATION',0,0,'C',true);
    $pdf->SetFont('Arial','B', 11);
	$pdf->Ln();
	$pdf->Cell(0,4,'SCHOOLS DIVISION OF LEGAZPI CITY',0,0,'C',true);
	$pdf->Ln();
    $pdf->SetFont('Times','B', 12);
	$pdf->Ln();
    $pdf->Cell(0,10,'PURCHASE ORDER',0,0,'C',true);
$pdf->Ln();
$pdf->Ln();
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(90,5,'Supplier: _____________________________________________________________',0,0,'L',true);
    $pdf->Cell(0,5,'Purchase Order No/Date: ________________________',0,1,'R',true);
    $pdf->Cell(90,5,'Address: _____________________________________________________________',0,0,'L',true);
    $pdf->Cell(0,5,'Purchase Request No: __________________________',0,1,'R',true);
    $pdf->Cell(0,5,'Mode of Procurement: __________________________',0,1,'R',true);
$pdf->Ln();
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(255,255,255);
    $pdf->SetLineWidth(.3);    
    $pdf->SetFont('Arial','',10);
    $pdf->Multicell(0,5,"     Gentlemen :
                        Please furnish this office the following articles subject to the terms and conditions contained herein:",1,1,'C');
$pdf->Ln();
    $pdf->SetFont('Arial','',10);    
    $pdf->Cell(100,5,'Place of Delivery: _____________________________________________________________',0,0,'L',true);
    $pdf->Cell(0,5,'Delivery Term: ________________________',0,1,'R',true);
    $pdf->Cell(100,5,'Date of Delivery: _____________________________________________________________',0,0,'L',true);
    $pdf->Cell(0,5,'Payment Term: ________________________',0,1,'R',true);
$pdf->Ln();
    $pdf->SetFont('Arial','B',10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.3);

	$pdf->SetWidths(array(25,25,25,80,20,20));
    $pdf->Row(array("Stock NO.","Unit","Quantity","Description","Unit Cost","Amount"));
    $pdf->SetFont('Arial','',10);

$fetch_r = mysqli_query($mysqli, "SELECT * FROM pms_ris, pms_pr, pms_pr_con, pms_ris_req, pms_po, pms_po_con, pims_personnel
                                        WHERE pms_ris.emp_no = pims_personnel.emp_no
                                        AND pms_ris.ris_no = pms_ris_req.ris_no
                                        AND pms_ris.ris_no = pms_pr.pr_no
                                        AND pms_pr.pr_no = pms_pr_con.pr_no
                                        AND pms_po.po_no = pms_po_con.po_no
                                        AND pms_pr_con.pr_id = pms_po_con.pr_id 
                                        AND pms_po.po_no = '".$po."'")
    or die(mysqli_error($mysqli));
    while($r = mysqli_fetch_array($fetch_r)){
                                              
         $pdf->Row(array("","{$r['req_unit']}","{$r['req_qty']}","{$r['req_desc']} {$r['req_item']}","{$r['unit_cost']}","{$r['tot_amt']}"));
    ;}

    $pdf->Row(array("","","","","",""));
    $pdf->Row(array("","","","","",""));
    $pdf->Row(array("","","","","",""));
    $pdf->Row(array("","","","","",""));
    $pdf->Row(array("","","","","",""));
    $pdf->Row(array("","","","","",""));
    $pdf->Row(array("","","","","",""));
    $pdf->Row(array("","","","","",""));
    $pdf->Row(array("","","","","",""));
    $pdf->Row(array("","","","","",""));
    $pdf->Row(array("","","","","",""));
    $pdf->Row(array("","","","","",""));
    $pdf->Row(array("","","","","",""));
    $pdf->Row(array("","","","","",""));
    $pdf->Row(array("","","","","",""));
    $pdf->Row(array("","","","","",""));

	$pdf->SetWidths(array(175,20));
    $pdf->SetFont('Arial','B',10);
    $pdf->Row(array("Total Amount in Words:",""));
$pdf->Ln();
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(255,255,255);
    $pdf->SetLineWidth(.3);    
    $pdf->SetFont('Arial','',10);
    $pdf->Multicell(0,5,"                          In case of failure to make the full delivery within the time specified above, penalty of one-tenth (1/10) of one percent for every day of delay shall be imposed.",1,1,'C');
	$pdf->Ln();
	$pdf->Ln();
    $pdf->Cell(230,10,'Very Truly yours, ',0,0,'C',true);
	$pdf->Ln();
    $pdf->Cell(302,5,'_________________________________',0,1,'C',true);
    $pdf->Cell(304,4,'Secondary School Principal',0,1,'C',true);
    $pdf->Cell(30,10,'Conforme:',0,1,'C',true);
    $pdf->Cell(100,5,'_________________________________',0,1,'C',true);
    $pdf->SetFont('Arial','I',9);
    $pdf->Cell(100,3,'(Singature over printed name)',0,1,'C',true);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(100,10,'______________________________________',0,1,'C',true);
    $pdf->Cell(100,4,'Date',0,1,'C',true);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
    $pdf->Cell(40,4,'Funds Available:',1,1,'C',true);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

    $pdf->Cell(100,5,'______________________________________',0,0,'C',true);
    $pdf->Cell(89,5,'Amount:                                      _________________',0,1,'C',true);
    $pdf->Cell(100,5,'Accountant',0,0,'C',true);
    $pdf->Cell(89,5,'Obligation Request No:              _________________',0,1,'C',true);











$pdf->output();
?>