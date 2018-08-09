<?php
require('mc_table.php');
include "connect.php";
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"ectrading");
	
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
    $pdf->Cell(0,10,'REQUEST FOR QUOTATION',0,0,'C',true);
$pdf->Ln();
$pdf->Ln();
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(90,5,'Name of Company: _____________________________________________________________',0,0,'L',true);
    $pdf->Cell(70,5,'PR No: ________________',0,1,'C',true);
    $pdf->Cell(94,5,'Address: _____________________________________',0,0,'L',true);
    $pdf->Cell(65,5,'Date: ___________________',0,1,'C',true);
    $pdf->Cell(90,5,'Telephone No: _________________________________',0,0,'L',true);
    $pdf->Cell(38,5,'Fax No: _____',0,0,'R',true);
    $pdf->Cell(0,5,'Email Address: ____________________',0,1,'R',true);
    $pdf->Cell(90,5,'TIN: ________________________________________________________________',0,0,'L',true);
    $pdf->Cell(115,5,'PhilGEPS Registration No: ______________________',0,1,'C',true);
$pdf->Ln();
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(255,255,255);
    $pdf->SetLineWidth(.3);    
    $pdf->SetFont('Arial','',9);
    $pdf->Multicell(0,5,"               Please quote your best offer for item described below, subject to the terms and conditions provided at the down portion                      of this request for quotation.        ",1,1,'C');
    $pdf->Multicell(0,5,"               Submit your quotation duly signed by you or your duly representative and copies of the following eligibility requirements                      not later than ______________________________. ",1,1,'C');
$pdf->Ln();
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(80,5,'1. Business Permit (DTI/SEC/CDA)',0,0,'R',true);
    $pdf->Cell(90,5,'3. Mayors Permit',0,1,'C',true);
    $pdf->Cell(70,5,'2. Tax Clearance Certificate',0,0,'R',true);
    $pdf->Cell(143,5,'4. PhilGEPS Certificate of Registration',0,1,'C',true);
$pdf->Ln();
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.3);

    $pdf->SetFont('Times','B',10);
    //cell(width, height, text, border, end line, [align])
    //normal rowheight=5
    $pdf->Cell(30,20,"Item\nDescription",1,0,'C');
    $pdf->Cell(15,20,"Quantity",1,0,'C');
    $pdf->Cell(15,20,"Unit",1,0,'C');
    $pdf->Cell(22,20,"AppBudCon",1,0,'C');
    $pdf->Cell(60,5,"Price",1,0,'C');
    $pdf->Cell(34,5,"CompTech",1,0,'C');
    $pdf->Cell(20,20,"REMARKS",1,0,'C');
    $pdf->Cell(0,5,'',0,1);
    //2nd line row
    $pdf->Cell(82,10,'',0,0);
    $pdf->SetFont('Times','B',7);
    $pdf->Cell(20,15,"Quantity",1,0,'C');
    $pdf->Cell(20,15,"Unit Price",1,0,'C');
    $pdf->Cell(20,15,"Total Price",1,0,'C');
    $pdf->Cell(17,15,"YES",1,0,'C');
    $pdf->Cell(17,15,"NO",1,1,'C');

	$pdf->SetWidths(array(30,15,15,22,20,20,20,17,17,20));
    $pdf->Row(array("","","","","","","","","",""));
    $pdf->Row(array("","","","","","","","","",""));
    $pdf->Row(array("","","","","","","","","",""));
    $pdf->Row(array("","","","","","","","","",""));
    $pdf->Row(array("","","","","","","","","",""));
    $pdf->Row(array("","","","","","","","","",""));
    $pdf->Row(array("","","","","","","","","",""));
    $pdf->Row(array("","","","","","","","","",""));
    $pdf->Row(array("","","","","","","","","",""));
    $pdf->Row(array("","","","","","","","","",""));
    $pdf->Row(array("","","","","","","","","",""));
    $pdf->Row(array("","","","","","","","","",""));
    $pdf->Row(array("","","","","","","","","",""));
    $pdf->Row(array("","","","","","","","","",""));
    $pdf->Row(array("","","","","","","","","",""));
    $pdf->Row(array("","","","","","","","","",""));   
    $pdf->Row(array("","","","","","","","","",""));
    $pdf->Row(array("","","","","","","","","",""));
    $pdf->Row(array("","","","","","","","","",""));
    $pdf->Row(array("","","","","","","","","",""));
    $pdf->Row(array("","","","","","","","","",""));
    $pdf->Row(array("","","","","","","","","",""));
    $pdf->Row(array("","","","","","","","","",""));

$pdf->Ln();
    $pdf->SetFont('Arial','B',10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(255,255,255);
    $pdf->SetLineWidth(.3);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(120,5,"Supplier's Authorized Representative:",1,0,'L');
    $pdf->Cell(0,5,"Canvassed by:",1,0,'');
    $pdf->Ln(); 
    $pdf->Ln(); 
    $pdf->Cell(120,5,"_______________________________",1,0,'C');
    $pdf->Cell(80,5,"____________________________",1,1,'C');
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(120,5,"Signature over Printed Name",1,0,'C');
    $pdf->Cell(80,5,"Canvasser",1,0,'C');





















$pdf->output();
?>