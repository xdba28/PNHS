<?php
require('mc_table.php');

	
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
	$pdf->Ln();
    $pdf->Ln();
    $pdf->Cell(0,10,'ABSTRACT OF QUOTATION',0,0,'C',true);
$pdf->Ln();

    $pdf->SetFont('Times','B',10);
//cell(width, height, text, border, end line, [align])
//normal rowheight=5
$pdf->Cell(15,20,"Item\nNo.",1,0,'C');
$pdf->Cell(81,20,"ARTICLES",1,0,'C');
$pdf->Cell(99,5,"Unit Price as Allowed by Corresponding Dealers",1,0,'C');
$pdf->Cell(0,5,'',0,1);
//2nd line row
$pdf->Cell(96,10,'',0,0);
$pdf->SetFont('Times','B',7);
$pdf->Cell(33,15,"Name of Qualified Supplier",1,0,'C');
$pdf->Cell(33,15,"Name of Qualified Supplier",1,0,'C');
$pdf->Cell(33,15,"Name of Qualified Supplier",1,1,'C');

$pdf->SetFont('Times','',10);
$pdf->SetWidths(array(15,81,33,33,33));
$pdf->Row(array("", "", "","",""));
$pdf->Row(array("", "", "","",""));
$pdf->Row(array("", "", "","",""));
$pdf->Row(array("", "", "","",""));
$pdf->Row(array("", "", "","",""));
$pdf->Row(array("", "", "","",""));
$pdf->Row(array("", "", "","",""));
$pdf->Row(array("", "", "","",""));
$pdf->Row(array("", "", "","",""));
$pdf->Row(array("", "", "","",""));
$pdf->Row(array("", "", "","",""));
$pdf->Row(array("", "", "","",""));
$pdf->Row(array("", "", "","",""));
$pdf->Row(array("", "", "","",""));
$pdf->Row(array("", "", "","",""));
$pdf->Row(array("", "", "","",""));
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
		$pdf->SetFillColor(255, 255, 255);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(255,255,255);
	    $pdf->SetLineWidth(.3);
$pdf->Cell(0,5,"Certificate of Committee on Bids and Awards",1,1,'C');
$pdf->SetFont('Arial','',10);
$pdf->Ln();
$pdf->Ln();
$pdf->Multicell(0,5,"               Based on the above abstract of price quotation offered by dealers/biders on various materials as stated above, this committee considering the lowest and reasonable quotation hereby makes the following awards to:",1,1,'C');
$pdf->Ln();
$pdf->Cell(0,5,"_________________________________",1,1,'C');
$pdf->Ln();
$pdf->Multicell(0,5,"               Done at this Office on this _______ day of ________, 2017.",1,1,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(65,5,"____________________________",1,0,'C');
$pdf->Cell(65,5,"____________________________",1,0,'C');
$pdf->Cell(65,5,"____________________________",1,1,'C');
$pdf->SetFont('Arial','',9);
$pdf->Cell(65,5,"Member, Bids & Awards Commitee",1,0,'C');
$pdf->Cell(65,5,"Chairman, Bids & Awards Committee",1,0,'C');
$pdf->Cell(65,5,"Member, Bids & Awards Committee",1,1,'C');
$pdf->Ln();
$pdf->SetFont('Arial','B',9);
$pdf->Cell(140,5,"APPROVED:",1,1,'C');
$pdf->Ln(); 
$pdf->Cell(200,5,"____________________________",1,1,'C');
$pdf->SetFont('Arial','',9);
$pdf->Cell(200,5,"Secondary School Principal III",1,0,'C');


$pdf->output();
?>