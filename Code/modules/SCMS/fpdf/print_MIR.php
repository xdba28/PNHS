
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
	$pdf->Cell(0,4,'MEDICINE INVENTORY REPORT',0,0,'C',true);
	$pdf->Ln();
	$pdf->Image('pnhs_logo.png',45,13,23);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(0,3,"As of: {$c}",0,1,'R',true);
$pdf->Ln();

        $pdf->SetFont('Arial','B',10);



	$pdf->SetWidths(array(65.1,65,25,40));
    $pdf->Row(array("Brand Name","Generic Name","Quantity","Expiration Date"));

    $fetch_medicine = mysqli_query($mysqli, "SELECT * FROM scms_medicine")
    or die(mysqli_error($mysqli));

    $medicine = mysqli_fetch_array($fetch_medicine);

    while($medicine = mysqli_fetch_array($fetch_medicine)){
        $pdf->SetFont('Arial','',10);       
        $bn = strtoupper($medicine['brand_name']);  
        $gn = strtoupper($medicine['gen_name']);    
        $pdf->Row(array("{$bn}","{$gn}","{$medicine['stocks']}","{$medicine['exp_date']}"));
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

$filename = 'Medicine Inventory Report.pdf';

$pdf->output($filename, "I");
?>