<?php
require('mc_table.php');
include_once('connect.php');
session_start();
$aid = $_SESSION['user_data']['acct']['cms_account_ID'];

$pr = $_GET['pr'];

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

	$pdf->Ln();
    $pdf->SetFont('Arial','', 11);
    $pdf->Cell(0,4,'Department of Education',0,1,'C',true);
    $pdf->Cell(0,4,'DIVISION OF LEGAZPI CITY',0,0,'C',true);
    $pdf->Ln();
    $pdf->SetFont('Times','B', 16);
    $pdf->Cell(0,7,'PURCHASE REQUEST',0,1,'C',true);
	$pdf->Ln();
    $pdf->Ln();
        $pdf->SetFont('Arial','B',10);
    $pdf->Cell(95,5,'Department/Section: _____________________________',0,0,'R',true);
    $pdf->Cell(40,5,'PR No.: ________',0,0,'R',true);
    $pdf->Cell(34,5,'Date: _________',0,1,'R',true);    
    $pdf->Cell(135,5,'SAI No.: ________',0,0,'R',true);
    $pdf->Cell(34,5,'Date: _________',0,1,'R',true);
    $pdf->Cell(95,5,'Name of School:  ______________________________   ',0,0,'C',true);
    $pdf->Cell(40,5,'ALOBS No.: _______',0,0,'R',true);
    $pdf->Cell(34,5,'Date: _________',0,1,'R',true);
    $pdf->Ln();


    $pdf->SetWidths(array(20,20,80,20,25,30));
    $pdf->SetFont('Arial','',10);
    $pdf->Row(array("Quantity", "Unit\nof Issue", "Item Description","Stock\nNumber","Estimated\nUnit Cost","Estimated\nCost"));
    
    $fetch_pr = mysqli_query($mysqli, "SELECT * FROM pms_ris, pms_pr, pms_pr_con, pms_ris_req
    WHERE pms_ris.ris_no = pms_ris_req.ris_no
    AND pms_pr.pr_no = pms_pr_con.pr_no
    AND pms_ris_req.req_item_id = pms_pr_con.req_item_id
    AND pms_pr.pr_no = '".$pr."'")
    or die(mysqli_error($mysqli));
    $t='';
    while($pr = mysqli_fetch_array($fetch_pr)){
    $t=$t+$pr['est_cost'];    
    $pdf->Row(array("{$pr['req_qty']}","{$pr['req_unit']}","{$pr['req_desc']} {$pr['req_item']}","","{$pr['est_unit_cost']}","{$pr['est_cost']}"));
        
    ;}
    $pdf->Row(array("", "", "","","",""));
    $pdf->Row(array("", "", "","","",""));
    $pdf->Row(array("", "", "","","",""));
    $pdf->Row(array("", "", "","","",""));
    $pdf->Row(array("", "", "","","",""));
    $pdf->Row(array("", "", "","","",""));
    $pdf->Row(array("", "", "","","",""));
    $pdf->Row(array("", "", "","","",""));
    $pdf->Row(array("", "", "","","",""));
    $pdf->Row(array("", "", "","","",""));
    $pdf->Row(array("", "", "","","",""));
    $pdf->Row(array("", "", "","","",""));
    $pdf->Row(array("", "", "","","",""));
    $pdf->Row(array("", "", "","","",""));
    $pdf->Row(array("", "", "","","",""));
    $pdf->Row(array("", "", "","","",""));
    $pdf->Row(array("", "", "","","",""));
    $pdf->Row(array("", "", "","","",""));
    $pdf->Row(array("", "", "","","",""));
    $pdf->SetWidths(array(165,30));
    $pdf->SetFont('Arial','B',12);
    $pdf->Row(array("TOTAL","{$t}"));
	$pdf->SetWidths(array(195));
    $pdf->SetFont('Arial','B',10);
    $pdf->Row(array("Purpose: _________________________________________________________________________________________ \n              _________________________________________________________________________________________\n "));
	$pdf->SetWidths(array(31,41,41,41,41));
    $pdf->SetFont('Times','B', 11);
    $pdf->Row(array("", "REQUESTED BY:", "APPROVED BY:","ISSUED BY:","RECEIVED BY:"));
    $pdf->SetFont('Times','', 11);
    $pdf->Row(array("Signature", "", "","",""));
    $pdf->Row(array("Printed Name", "", "","",""));
    $pdf->Row(array("Designation", "", "","",""));
$pdf->Ln();

$pdf->output();
?>