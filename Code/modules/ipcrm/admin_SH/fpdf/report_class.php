<?php
session_start(); 
include "db_conn.php";

require('mc_table.php');
$print = unserialize($_SESSION['print_section']);
$grade = $_GET['grade'];
$section = $_GET['section'];
$year = $_GET['yr'];
$adv = $_GET['adv'];
$room = $_GET['room'];

if($grade==7 || $grade==9){
    $time=array('06:30-07:20', '07:20-08:10', '08:10-09:00', '09:10-10:00', '10:00-10:50', '10:50-11:40', '11:40-12:30', '');
}
else{
    $time=array('12:30-01:20', '01:20-02:10', '02:10-03:00', '03:10-04:00', '04:00-04:50', '04:50-05:40', '05:40-06:30', '');
}


function GenerateWord()
{
	//Get a random word
		$w= "time";
	return $w;
}

function GenerateSentence()
{

	return $w;
}

$pdf = new PDF_MC_Table('P','mm','A4');
	$pdf->AddPage();
	$pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.3);

	// Logo
	//
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
    $pdf->SetFont('Times','B', 8);
	$pdf->Cell(0,4,'SCHEDULE OF CLASSES'.' (SY '.$year.')',0,0,'C',true);
    $pdf->SetFont('Times','B', 15);
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();	
	$pdf->Ln();
	$pdf->Cell(190,4,''.$grade.' - '.$section.'',0,0,'C',true);
	$pdf->Ln();
    $pdf->SetFont('Times','B', 10);
	$pdf->Cell(190,4,"($room)",0,0,'C',true);
	$pdf->Image('pnhs_logo.jpg',55,10,20);
	$pdf->Ln();
	$pdf->Ln();	
	$pdf->SetFont('Times','B',10);

//Table with 20 rows and 4 columns
	$pdf->SetWidths(array(95,95));
	//srand(microtime()*1000000);
	
	$subj = "Mapeh";
	
	$pdf->Row(array("TIME","SUBJECT AND TEACHER"));
	
	$pdf->SetFont('Times','B',9);
	for ($i=0; $i < 8; $i++) { 
		if(empty($print[$i])){
			$print[$i]="--------";
		}
		$print[$i]=str_replace("<br>", "\n", $print[$i]);
	}
	for ($i=0; $i < 8; $i++) {
		$pdf->Row(array("\n$time[$i]\n ", "\n$print[$i]\n "));
	}
	// Pag wara man extended time jules dae mo na pag display yadi //
	//I know hahahah
	//$pdf->Row(array("","Mapeh\n(M-F)\nM. Bongais"));
	$pdf->Row(array("ADVISER",$adv));
	$filename = $grade."-".$section." S.Y. ".$year.".pdf";
	$pdf->Output($filename, "I");
?>
