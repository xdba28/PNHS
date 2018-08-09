<?php
require('fpdf.php');
include "dbConfig.php";
session_start();
$username = $_SESSION["sess_user"];

$fullname_query=mysqli_query($mysqli,"SELECT emp_fname, emp_mname, emp_lname FROM employee_pis WHERE emp_fname ='$username'") or die ('ERROR: Cannot select user');
$fullname_row=mysqli_fetch_array($fullname_query);
$fullname= $fullname_row['emp_fname']." ".$fullname_row['emp_mname']." ".$fullname_row['emp_lname'];


if(!isset($_SESSION["sess_user"])){
 header("Location: page-login.php");
} 
$check = mysqli_query($mysqli, "SELECT * FROM account where username = '$username' and account_privileges = 'AAR' ") or die("Error: ".mysqli_error($mysqli));

$stataa = mysqli_num_rows($check);

if($stataa==0){
	header("Location: ../../index.php");
}

$ag_name = $_POST['multiselect'];	
	$ag1 = str_split($ag_name[0],3);
	if($ag1[0]=='LGS'){
			$ag = str_split($ag_name[0],5);
	}
	else if($ag1[0]=='CGS'){
			$ag = str_split($ag_name[0],7);	
	}
	$date1 = date("M-d-Y");
	$query = mysqli_query($mysqli, "SELECT * FROM AAR_report_transaction,AAR_monitoring where AAR_report_transaction.M_id = AAR_monitoring.M_id and AAR_monitoring.AG_name = '$ag[0]' and AAR_monitoring.AG_number = '$ag[1]' GROUP BY AAR_report_transaction.M_id;");
	while($row = mysqli_fetch_array($query)){
		$reviewer = $row['reviewer'];
	}
	if($ag1[0]=='LGS'){
			$sectorss =  "Local Government Sector";
			}else if($ag1[0]=='CGS'){
				$sectorss = "Corporate Government Sector";
			}else if($ag1[0]=='NGS'){
				$sectorss = "National Govenment Sector";
			}


$pdf = new FPDF('P','mm','Letter');
$pdf->AddPage();
$pdf->SetFont('Arial','B');
$pdf->SetFont('');
$pdf->SetFontSize(10);
$pdf->Ln();
	

$w=45;
$h=15;
	
	/*$pdf->Ln();
	$pdf->SetFont('Times','', 8);
    $pdf->Cell(0,4,'REPUBLIC OF THE PHILIPPINES',0,0,'C',false);
    $pdf->SetFont('Times','B', 15);
	$pdf->Ln();
	$pdf->Cell(0,4,'COMMISSION ON AUDIT',0,0,'C',false);
	$pdf->SetFont('Times','', 8);
	$pdf->Ln();
	$pdf->Cell(0,4,'REGION V(Bicol)',0,0,'C',false);
	$pdf->SetFont('Arial','B', 8);
	$pdf->Ln();
	$pdf->Cell(0,4,'Rawis, Legazpi City',0,0,'C',false);*/
	
	$pdf->Image('Commission_on_Audit.svg.png',175,10,22);
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->SetFont('Arial','B', 18);
	$pdf->Cell(0,4,'PURCHASE REQUEST',0,0,'C',false);
	
	
	
	
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->SetFont('Times','', 12);
    $pdf->Cell(0,4,'Regional Office No. V',0,0,'C',false);
	$pdf->Ln();
	$pdf->SetFont('Times','', 12);
    $pdf->Cell(0,4,'Rawis, Legazpi City',0,0,'C',false);
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->SetFont('Times','', 12);
	$pdf->Cell(170,4,'PR No. :',0,0,'C',false);
	$pdf->SetFont('Times','B', 12);
	$pdf->Cell(-137,4,'12345',0,0,'C',false);
	$pdf->SetFont('Times','', 12);
	$pdf->Cell(275,4,'Date :',0,0,'C',false);
	$pdf->SetFont('Times','B', 12);
	$pdf->Cell(-250,4,'1-19-18',0,0,'C',false);
	$pdf->Ln();
	
	$pdf->SetFont('Times','', 12);
	$pdf->Cell(22,4,'Department :',0,0,'C',false);
	$pdf->SetFont('Times','B', 12);
	$pdf->Cell(15,4,'ATFS',0,0,'C',false);
	$pdf->SetFont('Times','', 12);
	$pdf->Cell(97,4,'SAI No. :',0,0,'C',false);
	$pdf->SetFont('Times','B', 12);
	$pdf->Cell(-63,4,'678910',0,0,'C',false);
	$pdf->SetFont('Times','', 12);
	$pdf->Cell(199,4,'Date :',0,0,'C',false);
	$pdf->SetFont('Times','B', 12);
	$pdf->Cell(-174,4,'1-19-18',0,0,'C',false);
	$pdf->Ln();
	$pdf->SetFont('Times','', 12);
	$pdf->Cell(15,4,'Section :',0,0,'C',false);
	$pdf->SetFont('Times','B', 12);
	$pdf->Cell(29,4,'ATFS',0,0,'C',false);
	$pdf->SetFont('Times','', 12);
	$pdf->Cell(90,4,'ALOBS No. :',0,0,'C',false);
	$pdf->SetFont('Times','B', 12);
	$pdf->Cell(-52,4,'54321',0,0,'C',false);
	$pdf->SetFont('Times','', 12);
	$pdf->Cell(177,4,'Date :',0,0,'C',false);
	$pdf->SetFont('Times','B', 12);
	$pdf->Cell(-152,4,'1-19-18',0,0,'C',false);
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	
	
	
	$pdf->SetFont('Arial','B',8);
	$pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
	$pdf->SetLineWidth(.3);
	$pdf->SetFont('','B');
	$x=$pdf->GetX();
	$y=$pdf->GetY();
	$w = 17;
	$pdf->MultiCell($w,7,'Quantity',1,'C',true);
	$pdf->SetXY($x+$w,$y);
	$x=$pdf->GetX();
	$y=$pdf->GetY();
	$w = 23;
	$pdf->MultiCell($w,7,'Unit of Issue',1,'C',true);
	$pdf->SetXY($x+$w,$y);
	$x=$pdf->GetX();
	$y=$pdf->GetY();
	$w = 75;
	$pdf->MultiCell($w,7,'Item Description',1,'C',true);
	$pdf->SetXY($x+$w,$y);
	$x=$pdf->GetX();
	$y=$pdf->GetY();
	$w = 16;
	$pdf->MultiCell($w,7,'Stock No.',1,'C',true);
	$pdf->SetXY($x+$w,$y);
	$x=$pdf->GetX();
	$y=$pdf->GetY();
	$pdf->SetFont('Arial','B',7);
	$w = 32;
	$pdf->MultiCell($w,7,'Estimated Unit Cost',1,'C',true);
	$pdf->SetXY($x+$w,$y);
	$x=$pdf->GetX();
	$y=$pdf->GetY();
	$w = 32;
	$pdf->MultiCell($w,7,'Estimated Cost',1,'C',true);
	$pdf->SetXY($x+$w,$y);
	$x=$pdf->GetX();
	$y=$pdf->GetY();
	$pdf->Ln();
	
	$pdf->SetFont('Arial','',9);
	$x=$pdf->GetX();
	$y=$pdf->GetY();
	$h = 10;
	$w = 17;
	$pdf->MultiCell($w,$h,"1","LTR",'C',true);
	$pdf->MultiCell($w,90,'',"LRB",'C',true);
	$pdf->SetXY($x+$w,$y);
	$x=$pdf->GetX();
	$y=$pdf->GetY();
	$w = 23;
	$pdf->MultiCell($w,$h,"unit","LTR",'C',true);
	$pdf->SetXY($x+$w,$y);
	$x=$pdf->GetX();
	$y=$pdf->GetY();
	$w = 75;
	$pdf->SetFont('Arial','B',9);
	$pdf->MultiCell($w,$h,"Inkjet with Tank System Printer","LRT",'L',true);
	$pdf->SetXY($x,$y+$h);
	$x=$pdf->GetX();
	$y=$pdf->GetY();
	$pdf->MultiCell($w,80," ","LR",'L',true);
	$pdf->SetXY($x,$y+80);
	$x=$pdf->GetX();
	$y=$pdf->GetY();
	$pdf->MultiCell($w,10,"Total","LR",'L',true);
	$pdf->SetXY($x+$w,$y-90);
	$x=$pdf->GetX();
	$y=$pdf->GetY();
	$pdf->SetFont('Arial','',9);
	$w = 16;
	$pdf->MultiCell($w,$h,"","LTR",'C',true);
	$pdf->SetXY($x+$w,$y);
	$x=$pdf->GetX();
	$y=$pdf->GetY();
	$w = 32;
	$pdf->MultiCell($w,$h,"6,000.00\n\n\n\n\n\n\n\n\n\n",1,'R',true);
	$pdf->SetXY($x+$w,$y);
	$x=$pdf->GetX();
	$y=$pdf->GetY();
	$w = 32;
	$pdf->MultiCell($w,$h,"12,000.00","LRT",'R',true);
	$pdf->SetXY($x,$y+$h);
	$x=$pdf->GetX();
	$y=$pdf->GetY();
	$pdf->MultiCell($w,80," ","LR",'L',true);
	$pdf->SetXY($x,$y+80);
	$x=$pdf->GetX();
	$y=$pdf->GetY();
	$pdf->MultiCell($w,10,"12,000.00","LR",'R',true);
	$pdf->SetXY($x+$w,$y-90);
	$x=$pdf->GetX();
	$y=$pdf->GetY();
	
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$x=$pdf->GetX();
	$y=$pdf->GetY();
	$w = 195;
	$pdf->MultiCell($w,$h,"   Purpose :\n\n",1,'L',true);
	$x=$pdf->GetX();
	$y=$pdf->GetY();
	$w = 40;
	$pdf->MultiCell($w,7,'',1,'C',true);
	$pdf->SetXY($x,$y+7);
	$x=$pdf->GetX();
	$y=$pdf->GetY();
	$pdf->MultiCell($w,14,'Signature',"LR",'L',true);
	$pdf->SetXY($x,$y+13);
	$x=$pdf->GetX();
	$y=$pdf->GetY();
	$pdf->MultiCell($w,7,'Printed Name',"LR",'L',true);
	$pdf->SetXY($x,$y+7);
	$x=$pdf->GetX();
	$y=$pdf->GetY();
	$pdf->MultiCell($w,9,'Designation',"LBR",'L',true);
	$pdf->SetXY($x+$w,$y-27);
	$x=$pdf->GetX();
	$y=$pdf->GetY();
	$w = 75;
	$pdf->MultiCell($w,7,'Requested by:',1,'L',true);
	$pdf->SetXY($x,$y+7);
	$x=$pdf->GetX();
	$y=$pdf->GetY();
	$pdf->MultiCell($w,20,"________________________________","LR",'C',true);
	$pdf->SetXY($x,$y+14);
	$x=$pdf->GetX();
	$y=$pdf->GetY();
	$pdf->SetFont('Arial','B',9);
	$pdf->MultiCell($w,7,'Supervisor Name',"LR",'C',true);
	$pdf->SetXY($x,$y+7);
	$x=$pdf->GetX();
	$y=$pdf->GetY();
	$pdf->SetFont('Arial','',9);
	$pdf->MultiCell($w,8,"Position","LRB",'C',true);
	$pdf->SetXY($x+$w,$y-28);
	$x=$pdf->GetX();
	$y=$pdf->GetY();
	$w = 80;
	$pdf->MultiCell($w,7,'Approved by:',1,'L',true);
		$pdf->SetXY($x,$y+7);
	$x=$pdf->GetX();
	$y=$pdf->GetY();
	$pdf->MultiCell($w,20,"________________________________","LR",'C',true);
	$pdf->SetXY($x,$y+14);
	$x=$pdf->GetX();
	$y=$pdf->GetY();
	$pdf->SetFont('Arial','B',9);
	$pdf->MultiCell($w,7,'Roland A. Rey',"LR",'C',true);
	$pdf->SetXY($x,$y+7);
	$x=$pdf->GetX();
	$y=$pdf->GetY();
	$pdf->SetFont('Arial','',9);
	$pdf->MultiCell($w,8,"Regional Director","LRB",'C',true);
	$pdf->SetXY($x+$w,$y-28);
	$x=$pdf->GetX();
	$y=$pdf->GetY();

	/*
	
	
	$sql = mysqli_query($mysqli, "SELECT * FROM AAR_report_transaction,AAR_monitoring where AAR_report_transaction.M_id = AAR_monitoring.M_id and AAR_monitoring.AG_name = '$ag[0]' and AAR_monitoring.AG_number = '$ag[1]' GROUP BY AAR_report_transaction.M_id;")
												or die("Error: ".mysqli_error($mysqli));
		$count=1;
			while($row = mysqli_fetch_array($sql)){
			$id = $row['M_id'];
	
	$sssa = mysqli_query($mysqli, "SELECT * FROM aar_report_transaction where (RT_status = 'Submitted' or RT_status = 'Reviewed') and M_id = '$id' ")
	or die("Error: ".mysqli_error($mysqli));
	$stats = mysqli_num_rows($sssa);
	$qq1 = mysqli_query($mysqli, "SELECT * FROM AAR_reviewer,account where M_id = '$id' and AAR_reviewer.account_id = account.account_id")
	or die("Error: ".mysqli_error($mysqli));
	$statas = mysqli_num_rows($qq1);
	if($stats>$statas){
	if($stats>=1){
		$h = 7 * $stats;
	}
	else{
		$h=7;
	}
	}else{
		if($statas>=1){
			$h = 7 * $statas;
	}
		else{
			$h=7;
		}
	}
	$pdf->SetFont('Arial','',9);
	$x=$pdf->GetX();
	$y=$pdf->GetY();
	$w = 17;
	$pdf->MultiCell($w,$h,500,1,'C',true);
	$pdf->SetXY($x+$w,$y);
	$x=$pdf->GetX();
	$y=$pdf->GetY();
	$w = 23;
	$pdf->MultiCell($w,$h,$row['LA_name'],1,'C',true);
	$pdf->SetXY($x+$w,$y);
	$x=$pdf->GetX();
	$y=$pdf->GetY();
	$w = 75;
	$pdf->MultiCell($w,$h,$row['AG_name'],1,'C',true);
	$pdf->SetXY($x+$w,$y);
	
	$sss = mysqli_query($mysqli, "SELECT * FROM aar_report_transaction where (RT_status = 'Submitted' or RT_status = 'Reviewed') and M_id = '$id' ")
	or die("Error: ".mysqli_error($mysqli));
	$stat = mysqli_num_rows($sss);
	$cont = 0;
	while($rows = mysqli_fetch_array($sss)){
		$date_sub = $rows['date_sub_RO'];
		$date_initital = $rows['date_received_ORD'];
		if($stat>=1){
			if($cont==0){
				$date[$cont] = $rows['date_sub_RO'];
			}
			else{
				$date[$cont] = $rows['date_sub_RO'] . " " . $date[$cont-1];
			}
			$cont++;
		}
	}
	if($stat==0){
		$date[$cont] = "N/A";
		$cont++;
	}
	
	
	$x=$pdf->GetX();
	$y=$pdf->GetY();
	$w = 40;
	$pdf->MultiCell($w,$h,$date_sub,1,'C',true);
	$pdf->SetXY($x+$w,$y);
	$x=$pdf->GetX();
	$y=$pdf->GetY();
	$w = 35;
	$pdf->MultiCell($w,$h,$date_initital,1,'C',true);
	$pdf->SetXY($x+$w,$y);
	
	
	
	$x=$pdf->GetX();
	$y=$pdf->GetY();
	$w = 35;
	$pdf->MultiCell($w,7,$date[$cont-1],1,'C',true);
	$pdf->SetXY($x+$w,$y);
	
	$x=$pdf->GetX();
	$y=$pdf->GetY();
	$w = 35;
	$pdf->MultiCell($w,$h,$row['Date_finalized'],1,'C',true);
	$pdf->SetXY($x+$w,$y);
	
	$qq = mysqli_query($mysqli, "SELECT * FROM AAR_reviewer,account where M_id = '$id' and AAR_reviewer.account_id = account.account_id")
	or die("Error: ".mysqli_error($mysqli));
	$stata = mysqli_num_rows($qq);
	$cant = 0;	
	
	while($rowz = mysqli_fetch_array($qq)){
		if($stata>=1){
			if($cant==0){
				$rev[$cant] = $row['Reviewed_by'] . " , "  . $rowz['username'];
			}
			else{
				$rev[$cant] = $rowz['username'] . " " . $rev[$cant-1];
			}
			$cant++;
		}
		
	}
	if($stata==0){
		
		$rev[$cant] = $row['Reviewed_by']; 
		$cant = 1;
	}
	
	
	
	$x=$pdf->GetX();
	$y=$pdf->GetY();
	$w = 35;
	$pdf->MultiCell($w,$h,$rev[$cant-1],1,'C',true);
	$pdf->SetXY($x+$w,$y);
	
	
	
	$count++;
	$pdf->Ln();
	}
    */
$pdf->Output();
?>