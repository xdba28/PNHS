<?php
session_start(); 
include "db_conn.php";

require('mc_table.php');
$print1 = unserialize($_SESSION['print_section1']);
$print2 = unserialize($_SESSION['print_section2']);
$print3 = unserialize($_SESSION['print_section3']);
$print4 = unserialize($_SESSION['print_section4']);
$print5 = unserialize($_SESSION['print_section5']);

$grade = $_GET['grade'];
$section = $_GET['section'];
$year = $_GET['yr'];
$adv = $_GET['adv'];
$room = $_GET['room'];
$yr = $_SESSION['sy_id'];


if($grade==7 || $grade==9){
	$time_sql = mysqli_query($conn, "SELECT am_s FROM css_time WHERE sy_id=$yr");
    foreach ($time_sql as $key) {
      $times[] = $key['am_s'];
    }
    $time_sql = mysqli_query($conn, "SELECT am_e FROM css_time WHERE sy_id=$yr");
    foreach ($time_sql as $key) {
      $timee[] = $key['am_e'];
    }
    for ($i=0; $i < count($times); $i++) { 
	  $time[] = substr($times[$i], 0, -3)."-".substr($timee[$i], 0, -3); 
	}
    array_push($time, '');
}
else{
    $time_sql = mysqli_query($conn, "SELECT pm_s FROM css_time WHERE sy_id=$yr");
    foreach ($time_sql as $key) {
      $times[] = $key['pm_s'];
    }
    $time_sql = mysqli_query($conn, "SELECT pm_e FROM css_time WHERE sy_id=$yr");
    foreach ($time_sql as $key) {
      $timee[] = $key['pm_e'];
    }
    for ($i=0; $i < count($times); $i++) { 
	  $time[] = substr($times[$i], 0, -3)."-".substr($timee[$i], 0, -3); 
	}
    array_push($time, '');
}

// if($grade==7 || $grade==9){
//     $time=array('06:30-07:20', '07:20-08:10', '08:10-09:00', '09:10-10:00', '10:00-10:50', '10:50-11:40', '11:40-12:30', '');
// }
// else{
//     $time=array('12:30-01:20', '01:20-02:10', '02:10-03:00', '03:10-04:00', '04:00-04:50', '04:50-05:40', '05:40-06:30', '');
// }


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

$pdf = new PDF_MC_Table('L','mm','Legal');
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
    $pdf->SetFont('Times','B', 13);
	$pdf->Ln();
	$pdf->Ln();	
	$pdf->Cell(338,4,'Grade '.$grade.' - '.$section.'',0,0,'C',true);
	$pdf->Ln();
	$pdf->Ln();
	if (!empty($adv) && !empty($room)) {
			$pdf->SetFont('Times','', 12);
			$pdf->Cell(338,4,''.$adv.'',0,0,'C',true);
			$pdf->Ln();
			$pdf->SetFont('Times','I', 11);
			$pdf->Cell(338,4,''.$room.'',0,0,'C',true);
			$pdf->Ln();
			$pdf->SetFont('Times','', 11);
			$pdf->Cell(338,4,"(Adviser)",0,0,'C',true);
	}
	else {
			$pdf->SetFont('Times','B', 11);
			$pdf->Cell(338,4,"No Adviser",0,0,'C',true);
			$pdf->Ln();
			
	}
	$pdf->Image('pnhs_logo.jpg',100,15,20);
	$pdf->Ln();
	$pdf->Ln();	
	$pdf->SetFont('Times','B',11);

//Table with 20 rows and 4 columns
	$pdf->SetWidths(array(40,59,59,59,59,59));
	//srand(microtime()*1000000);
	
	$subj = "Mapeh";
	
	$pdf->Row(array("DAY","MONDAY","TUESDAY","WEDNESDAY","THURSDAY","FRIDAY"));
	
	$pdf->SetFont('Times','B',10);
	for ($i=0; $i < count($time); $i++) { 
		$print1[$i]=str_replace("<br>", "\n", $print1[$i]);
		$print2[$i]=str_replace("<br>", "\n", $print2[$i]);
		$print3[$i]=str_replace("<br>", "\n", $print3[$i]);
		$print4[$i]=str_replace("<br>", "\n", $print4[$i]);
		$print5[$i]=str_replace("<br>", "\n", $print5[$i]);
		if(empty($print1[$i])){
			$print1[$i]= "\n\n";
		}
		if(empty($print2[$i])){
			$print2[$i]= "\n\n";
		}
		if(empty($print3[$i])){
			$print3[$i]= "\n\n";
		}
		if(empty($print4[$i])){
			$print4[$i]= "\n\n";
		}
		if(empty($print5[$i])){
			$print5[$i]= "\n\n";
		}
	}
	for ($i=0; $i < count($time); $i++) {
		$pdf->Row(array("\n$time[$i]", "$print1[$i]", "$print2[$i]", "$print3[$i]","$print4[$i]","$print5[$i]\n"));
		
	}
	// Pag wara man extended time jules dae mo na pag display yadi //
	//I know hahahah
	//$pdf->Row(array("","Mapeh\n(M-F)\nM. Bongais"));
		$filename = $grade."-".$section." S.Y. ".$year.".pdf";
	$pdf->Output($filename, "I");
?>
