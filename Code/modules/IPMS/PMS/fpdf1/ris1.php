<?php
require('mc_table.php');

include_once('connect.php');
session_start();
$aid = $_SESSION['user_data']['acct']['cms_account_ID'];


//query to get MIR
$ris = $_GET['ris'];

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
    $pdf->SetFont('Times','B', 16);
    $pdf->Cell(0,7,'REQUISITION AND ISSUE SLIP',0,1,'C',true);
    $pdf->SetFont('Arial','', 11);
    $pdf->Cell(0,7,'PAG-ASA NATIONAL HIGH SCHOOL',0,0,'C',true);
	$pdf->Ln();
    $pdf->Ln();
        $pdf->SetFont('Arial','B',10);
    $pdf->Cell(80,5,'Division: _____________________________',0,0,'C',true);
    $pdf->Cell(40,5,'Responsibility                ',0,0,'R',true);
    $pdf->Cell(40,5,'RIS No.: _______',0,0,'R',true);
    $pdf->Cell(34,5,'Date: _________',0,1,'R',true);
    $pdf->Cell(79,5,'Office:    _____________________________',0,0,'C',true);
    $pdf->Cell(46,5,'  Center Code: ___________',0,0,'R',true);
    $pdf->Cell(35,5,'SAI No.: _______',0,0,'R',true);
    $pdf->Cell(34,5,'Date: _________',0,1,'R',true);

    $pdf->Ln();
	$pdf->SetWidths(array(144,51));
    $pdf->SetFont('Times','', 11);
    $pdf->Row(array("REQUISITION","ISSUANCE"));
    $pdf->SetWidths(array(20,80,22,22,22,29));

    $pdf->Row(array("Stock No.", "Description", "Unit","Quantity","Quantity","Remarks"));
$fetch_r = mysqli_query($mysqli, "SELECT * FROM pms_ris_req WHERE ris_no = '".$ris."'")
    or die(mysqli_error($mysqli));
    while($r = mysqli_fetch_array($fetch_r)){
        $pdf->Row(array("","{$r['req_desc']} {$r['req_item']}","{$r['req_unit']}","{$r['req_qty']}","",""));
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
	$pdf->SetWidths(array(195));
    $pdf->Row(array("Purpose: _________________________________________________________________________________________ \n              _________________________________________________________________________________________\n "));
	$pdf->SetWidths(array(31,41,41,41,41));
    $pdf->SetFont('Times','B', 11);
    $pdf->Row(array("", "REQUESTED BY:", "APPROVED BY:","ISSUED BY:","RECEIVED BY:"));
    $pdf->SetFont('Times','', 11);
    $pdf->Row(array("Signature", "", "","",""));
    $pdf->Row(array("Printed Name", "", "","",""));
    $pdf->Row(array("Designation", "", "","",""));
    $pdf->Row(array("Date", "", "","",""));
$pdf->Ln();

$pdf->output();
?>