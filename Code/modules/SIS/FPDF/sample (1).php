<?php
require('fpdf.php');
include("../db_con_i.php");

$get_sec = $mysqli->query("SELECT year_level section_name FROM css_section WHERE section_name = 'DILIGENCE' ")
						or die("<script>alert('bobo ka');</script>");

	$res = mysqli_fetch_assoc($get_sec);
	$lvl = $res['year_level'];
	$section = $res['section_name'];

$pdf = new FPDF('P', 'mm', 'Letter');
$pdf-0>AddPage();
$pdf->SetFont('Arial');
$pdf->SetFont('');
$pdf->SetFontSize(10);
$pdf->Ln();

$width = 45;
$heigh = 15;

$pdf->Cell(0, 4, 'PAG-ASA NATIONAL HIGH SCHOOL', 0, 0, 'C', false);
$pdf->Ln();
$pdf->Cell(0, 5, 'Student Accounts', 0, 0, 'C', false);
$pdf->Ln();
$pdf->Cell(0, 5, 'Section: ' );


$pdf->Output();

?>