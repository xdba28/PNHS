<?php
require('mc_table.php');

	
//query

$pdf=new PDF_MC_Table('L','mm','LEGAL');
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
	$pdf->Ln();
    $pdf->Cell(0,10,'ANNUAL PROCUREMENT PLAN CY ______',0,0,'C',true);
$pdf->Ln();

	$pdf->SetWidths(array(170,100,65));
    $pdf->SetFont('Times','', 11);
    $pdf->Row(array("Name of Agency:                                                                                                                                          \n        Rawis, Legazpi City","Planned Amount - COMMON SUPPLIES","Page & of & Pages"));
	$pdf->SetWidths(array(170,33.33,33.33,33.33,65));
    $pdf->Row(array("Plan Control No.:                                                                                                                                          ","Regular","Contingency 10% increase in unit price","TOTAL","Date Submitted:\n"));
    $pdf->SetWidths(array(170,33.33,33.33,33.33,65));
    $pdf->Row(array("Department/Office:                                                                                                                                          ","","","",""));
    $pdf->SetWidths(array(10,70,40,10,40,25,35,35,35,35));
    $pdf->Row(array("Item No.","Item Description","Unit Cost","Qty","Unit","Total Cost","1st Quarter\n(Jan, Feb, Mar)", "2nd Quarter\n(Apr, May, June)","3rd Quarter\n(July, Aug, Sept)","4th Quarter\n(Oct, Nov, Dec)"));
    $pdf->SetWidths(array(170,25,10,25,10,25,10,25,10,25));
    $pdf->Row(array("","","Qty","Amount","Qty","Amount","Qty","Amount","Qty","Amount"));
    $pdf->SetWidths(array(10,70,40,10,40,25,10,25,10,25,10,25,10,25));
    $pdf->Row(array("","","","","","","","","","","","","",""));
    $pdf->Row(array("","","","","","","","","","","","","",""));
    $pdf->Row(array("","","","","","","","","","","","","",""));
    $pdf->Row(array("","","","","","","","","","","","","",""));
    $pdf->Row(array("","","","","","","","","","","","","",""));
    $pdf->Row(array("","","","","","","","","","","","","",""));
    $pdf->Row(array("","","","","","","","","","","","","",""));
    $pdf->Row(array("","","","","","","","","","","","","",""));
    $pdf->Row(array("","","","","","","","","","","","","",""));
    $pdf->Row(array("","","","","","","","","","","","","",""));
    $pdf->Row(array("","","","","","","","","","","","","",""));
    $pdf->Row(array("","","","","","","","","","","","","",""));
    $pdf->Row(array("","","","","","","","","","","","","",""));
    $pdf->Row(array("","","","","","","","","","","","","",""));
    $pdf->Row(array("","","","","","","","","","","","","",""));
    $pdf->Row(array("","","","","","","","","","","","","",""));
    $pdf->Row(array("","","","","","","","","","","","","",""));
    $pdf->Row(array("","","","","","","","","","","","","",""));
    

$pdf->Ln();
$pdf->SetFont('','',12);
$pdf->Cell(35,5,'Prepared by:',0,0,'C',true);
$pdf->Cell(130,5,'Certified as Funds Availability:',0,0,'R',true);
$pdf->Cell(120,5,'Approved by:',0,0,'R',true);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(100,5,'__________________________________',0,0,'C',true);
$pdf->Cell(130,5,'__________________________________',0,0,'C',true);
$pdf->Cell(0,5,'__________________________________',0,0,'R',true);





















$pdf->output();
?>