<?php
include("fpdf.php");
include('dummyconnection.php');
class PDF extends FPDF
{
		function Header()
        {
            
            include('dummyconnection.php');
            $this->SetFont('Arial','B','14');
            $this->Cell(0,5,"PAG-ASA National High School",0,1,"C");
            $this->SetFont('Arial','','14');
            $this->Cell(0,5,"Student Account List",0,1,"C");
            $this->Ln();
            $this->Cell(0,8,"Section: Malolos",1,1,"C");
            
            $this->Cell(98,8,"Learner's Reference Number",1,0,"C");
            $this->Cell(98,8,"Student Name",1,0,"C");
            $this->ln();

        }
}

$pdf = new PDF('P','mm','Legal');
$pdf->SetFont('Arial','',12);
$pdf->AddPage();
$pdf->Cell(98,8,"0909090",1,0,"C");
$pdf->Cell(98,8,"Denver Tomm",1,0,"C");
$pdf->Output();
?>