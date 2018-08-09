<?php
	session_start(); 
	include "db_conn.php";

	require('mc_table.php');
	$sy_id = $_SESSION['sy_id'];

	$print = unserialize($_SESSION['print_teacher']);

	if (!empty($_POST['name'])) {
		$name = $_POST['name'];
	}
	if (!empty($_POST['load'])) {
		$load = $_POST['load'];
	}
	if (!empty($_POST['yr'])) {
		$year = $_POST['yr'];
	}
	if (!empty($_POST['adv'])) {
		$adv = $_POST['adv'];
	}
	if (!empty($_POST['room'])) {
		$room = $_POST['room'];
	}


$time_sql = mysqli_query($conn, "SELECT am_s FROM css_time WHERE sy_id=$sy_id");
    foreach ($time_sql as $key) {
      $times[] = $key['am_s'];
    }
    $time_sql = mysqli_query($conn, "SELECT pm_s FROM css_time WHERE sy_id=$sy_id");
    foreach ($time_sql as $key) {
      $times[] = $key['pm_s'];
    }
    $time_sql = mysqli_query($conn, "SELECT am_e FROM css_time WHERE sy_id=$sy_id");
    foreach ($time_sql as $key) {
      $timee[] = $key['am_e'];
    }
    $time_sql = mysqli_query($conn, "SELECT pm_e FROM css_time WHERE sy_id=$sy_id");
    foreach ($time_sql as $key) {
      $timee[] = $key['pm_e'];
    }
 	for ($i=0; $i < count($times); $i++) { 
	   	$time[] = substr($times[$i], 0, -3)."-".substr($timee[$i], 0, -3); 
	}
//$time=array('06:30-07:20', '07:20-08:10', '08:10-09:00', '09:10-10:00', '10:00-10:50', '10:50-11:40', '11:40-12:30', '12:30-01:20', '01:20-02:10', '02:10-03:00', '03:10-04:00', '04:00-04:50', '04:50-05:40', '05:40-06:30');

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

	$pdf->SetTitle('Class Schedule S.Y. '.$year.'');


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
	$pdf->Cell(0,4,'TEACHER SCHEDULE OF CLASSES'.' (SY '.$year.')',0,0,'C',true);
    $pdf->SetFont('Times','B', 15);
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Image('pnhs_logo.jpg',55,10,20);
	$pdf->Ln();
	$pdf->Ln();
	$pdf->SetFont('Times','B',10);


//Table with 20 rows and 4 columns
	$pdf->SetWidths(array(95,95));
	//srand(microtime()*1000000);
	
	// Digdi so time na idispay mo jules so may laog lang pero sort pag wra sinda laog sa time na iba dae mo na pag display so may laog lang puro naka arange pa din time aga to hapon //
	$pdf->Row(array("TIME","CLASSES"));
	
	$pdf->SetFont('Times','B',9);
	for ($i=0; $i < count($time); $i++) { 
		if(empty($print[$i])){
			$print[$i]="--------";
		}
	}
	for ($i=0; $i < count($time); $i++) {
		$pdf->Row(array("\n".substr($time[$i], 0, -3)."\n ","\n$print[$i]"));
	}

	if (!empty($adv) && !empty($room)) {
		$pdf->Row(array("ADVISER",$adv." "."(ROOM $room)"));
	}
	else {
		$pdf->Row(array("ADVISER",""));
	}
	
	$pdf->Row(array("TOTAL LOADS",$load));

	
	$filename = $name." S.Y. ".$year.".pdf";
	$pdf->Output($filename, "I");

?>
