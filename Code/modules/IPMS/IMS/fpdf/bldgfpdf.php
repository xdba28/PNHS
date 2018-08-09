<?php
    include("../db/dbcon.php");
    include("../session.php");
	include("fpdf.php");
class PDF extends FPDF
{
	function Header()
	{
		// Logo
	$this->Image('..\img\deped.png',120,6,20);
	// Arial bold 15
	$this->SetFont('Arial','B',10);
	// Move to the right
	$this->Cell(80,5);
	$this->Cell(180,5,'REPUBLIC OF THE PHILIPPINES',0,1,'C');
	$this->Cell(80,5);
	$this->Cell(180,5,'DEPARTMENT OF EDUCATION',0,1,'C');
	$this->Cell(80,5);
	$this->Cell(180,5,'REGION V',0,1,'C');
	$this->Cell(80,5);
	$this->Cell(180,5,'SCHOOLS DIVISION ON LEGAZPI CITY',0,1,'C');
	$this->Cell(80,5);
	$this->Cell(180,5,'REPORT ON THE PHYSICAL COUNT OF PROPERTY, PLANT AND EQUIPMENT',0,1,'C');
	$this->Image('..\img\pnhs_logo.jpg',220,6,20);
	$this->Ln(20);
	$this->Cell(10,5,'#',1,0,'C');
	$this->Cell(100,5,'Building Name',1,0,'C');
	$this->Cell(65,5,'Fund Source',1,0,'C');
	$this->Cell(65,5,'Specific Fund',1,0,'C');
	$this->Cell(20,5,'Storey',1,0,'C');
	$this->Cell(30,5,'# of Rooms',1,0,'C');
	$this->Cell(30,5,'Year Completed',1,0,'C');
	$this->Cell(20,5,'Dimensions',1,1,'C');

	}

// Page footer
function Footer()
{
	// Position at 1.5 cm from bottom
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// Page number
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF('L','mm','Legal');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$query="SELECT *
	FROM ims_facility";
      $res=mysqli_query($mysqli,$query);
      while($row=mysqli_fetch_array($res))
      {
      	$id=$row['fac_id'];
        $type=$row['fac_type'];
        $fund=$row['fund_source'];
        $storey=$row['fac_storey'];
        $spec=$row['specfic_fund'];
        $room=$row['num_rooms'];
        $year=$row['year_completed'];
        $dim=$row['dimension'];

        $pdf->Cell(10,10,"$id",1,0,'C');
        $pdf->Cell(100,10,"$type",1,0,'C');
		$pdf->Cell(65,10,"$fund",1,0,'C');
		$pdf->Cell(65,10,"$spec",1,0,'C');
		$pdf->Cell(20,10,"$storey",1,0,'C');
		$pdf->Cell(30,10,"$room",1,0,'C');
		$pdf->Cell(30,10,"$year",1,0,'C');
		$pdf->Cell(20,10,"$dim",1,1,'C');

      }


$pdf->Output();


?>