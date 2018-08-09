<?php
	session_start(); 
	include "db_conn.php";

	require('mc_table.php');
	$sy_id = $_SESSION['sy_id'];

	//$print = unserialize($_SESSION['print_teacher']);
	$print1 = unserialize($_SESSION['print_teacher1']);
	$print1 =  str_replace('<br>', '', $print1);
	$print2 = unserialize($_SESSION['print_teacher2']);
	$print3 = unserialize($_SESSION['print_teacher3']);
	$print4 = unserialize($_SESSION['print_teacher4']);
	$print5 = unserialize($_SESSION['print_teacher5']);
	$room_num1 = unserialize($_SESSION['print_room1']);
	$room_num2 = unserialize($_SESSION['print_room2']);
	$room_num3 = unserialize($_SESSION['print_room3']);
	$room_num4 = unserialize($_SESSION['print_room4']);
	$room_num5 = unserialize($_SESSION['print_room5']);
	$load = explode("-", $_SESSION['load_count']);

	if (!empty($_POST['name'])) {
		$name = $_POST['name'];
	}
	if (!empty($_POST['yr'])) {
		$year = $_POST['yr'];
	}
	if (!empty($_POST['adv'])) {
		$adv = $_POST['adv'];
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

$pdf = new PDF_MC_Table('L','mm','Legal');
	
for ($count=0; $count < 2; $count++) { 

	$pdf->SetTitle($_SESSION['teacher_name'].' S.Y. '.$year.'');


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
    $pdf->SetFont('Times','B', 14);
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Cell(0,4,''.$_SESSION['teacher_name'].'',0,2,'C',true);	
	if (!empty($adv) && !empty($_SESSION['ad_room'])) {
			$pdf->SetFont('Arial','', 12);
			$pdf->Cell(338,4,''.$adv.'',0,0,'C',true);
			$pdf->Ln();
			$pdf->SetFont('Times','I', 11);
			$pdf->Cell(338,4,''.$_SESSION['ad_room'].'',0,0,'C',true);
	}
	// else {
	// 		$pdf->SetFont('Times','I', 12);
	// 		$pdf->Cell(338,4,"",0,0,'C',true);
	// 		$pdf->Ln();
	// 		$pdf->SetFont('Times','', 11);
	// 		$pdf->Cell(338,4,"(Adviser)",0,0,'C',true);
	// }
    
	$pdf->Image('pnhs_logo.jpg',100,15,20);
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->SetFont('Times','B',11);


//Table with 20 rows and 4 columns
	$pdf->SetWidths(array(40,59,59,59,59,59));
	//srand(microtime()*1000000);
	
	// Digdi so time na idispay mo jules so may laog lang pero sort pag wra sinda laog sa time na iba dae mo na pag display so may laog lang puro naka arange pa din time aga to hapon //
	$pdf->Row(array("DAY","MONDAY","TUESDAY","WEDNESDAY","THURSDAY","FRIDAY"));
	
	$pdf->SetFont('Times','B',10);

	if($count==0){
		for ($i=0; $i < count($time)/2; $i++) { 
			if(empty($print[$i])){
				$print[$i]="--------";
			}
		}
		for ($i=0; $i < count($time)/2; $i++) {
			$pdf->Row(array("\n".$time[$i]."\n ","\n$print1[$i]\n$room_num1[$i]\n","\n$print2[$i]\n$room_num2[$i]\n","\n$print3[$i]\n$room_num3[$i]\n","\n$print4[$i]\n$room_num4[$i]\n","\n$print5[$i]\n$room_num5[$i]\n"));
		}
	}
	else {
		for ($i=count($time)/2; $i < count($time); $i++) { 
			if(empty($print[$i])){
				$print[$i]="--------";
			}
		}
		for ($i=count($time)/2; $i < count($time); $i++) {
			$pdf->Row(array("\n".$time[$i]."\n ","\n$print1[$i]\n$room_num1[$i]\n","\n$print2[$i]\n$room_num2[$i]\n","\n$print3[$i]\n$room_num3[$i]\n","\n$print4[$i]\n$room_num4[$i]\n","\n$print5[$i]\n$room_num5[$i]\n"));
		}
	}

	
	$pdf->Row(array("TOTAL LOADS",$load[0],$load[1],$load[2],$load[3],$load[4]));
}
	
	$filename = $_SESSION['teacher_name']." S.Y. ".$year.".pdf";
	$pdf->Output($filename, "I");

?>
