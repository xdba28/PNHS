
<?php
require('mc_table.php');

include_once('db_connect.php');
session_start();
$session = $_SESSION['user_data']['acct']['cms_account_ID'];


//query to get MIR

    $current = mysqli_query($mysqli,"SELECT CURRENT_DATE");
	$rowss = mysqli_fetch_array($current);
	$c = date("F j, Y");

						$account = mysqli_query($mysqli, "SELECT *, LEFT(P_mname, 1) FROM cms_account, pims_personnel 
								WHERE cms_account_ID = '".$session."'
								AND cms_account.emp_no = pims_personnel.emp_No");
								
							$acc = mysqli_fetch_array($account);
							
							if($acc['P_mname'] == NULL)
							$prep = strtoupper($acc['P_fname'].' '.$acc['P_lname']);

$pdf=new PDF_MC_Table('P','mm','LEGAL');
$pdf->AddPage();
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0);
$pdf->SetDrawColor(0,0,0);
$pdf->SetLineWidth(.3);

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
    $pdf->SetFont('Times','B', 10);
    $pdf->Cell(0,4,'SCHOOL CLINIC',0,0,'C',true);
	$pdf->Ln();
	$pdf->Cell(0,4,'EQUIPMENT INVENTORY REPORT',0,0,'C',true);
	$pdf->Ln();
	$pdf->Image('pnhs_logo.png',45,13,23);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(0,3,"As of: {$c}",0,1,'R',true);
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
	$pdf->SetWidths(array(35.1,90,26,45));
    $pdf->Row(array("Code","Name of Equipment","Quantity","Status"));

$fetch_eq = mysqli_query($mysqli, "SELECT * FROM scms_equipment")
    or die(mysqli_error($mysqli));
    while($eq = mysqli_fetch_array($fetch_eq)){
        $pdf->SetFont('Arial','',10);
        $xx = strtoupper($eq['equip_name']);
        $pdf->Row(array("{$eq['equip_code']}","{$xx}","{$eq['equip_stocks']}","{$eq['equip_status']}"));
    ;}

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,5,'Prepared by: ',0,1,'C',true);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','U',10);
$pdf->Cell(0,5,"      {$prep}      ",0,1,'C',true);

$filename = 'Equipment Inventory Report.pdf';

$pdf->output($filename, "I");
?>