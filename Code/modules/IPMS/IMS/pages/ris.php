<?php
require('mc_table.php');
include "connect.php";
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"ectrading");
	$ris = $_GET['ris'];
//query

if(isset($_POST['submit_ris']))
	{
		$ris = $_POST["ris"];
    }

$fetch_ris = mysqli_query($mysqli, "SELECT ris_no FROM pms_ris WHERE pms_ris.req_status = 'Approved'")
										or die(mysqli_error($mysqli));
$ris_no = mysqli_fetch_array($fetch_ris);

$fetch_items = mysqli_query($mysqli, "SELECT ris_no, CONCAT(req_item,' ',req_desc), req_unit, req_qty FROM pms_ris_req WHERE ris_no = '".$ris."'")
            or die(mysqli_error($mysqli));
$fetch_date = mysqli_query($mysqli, "SELECT ris_no, req_date FROM pms_ris WHERE ris_no = '".$ris."'")
            or die(mysqli_error($mysqli));

$var1="";
while($row=mysqli_fetch_array($fetch_items))
{
	$var1=strtoupper($row['ris_no']);
}

$var2="";
while($row=mysqli_fetch_array($fetch_date))
{
    $var2=($row['req_date']);
}

 $personnel = mysqli_query($mysqli, "SELECT * FROM  pms_ris, pims_personnel, pims_employment_records, pims_department
									where pims_department.dept_id = pims_employment_records.dept_id
									and pims_employment_records.emp_No =
                                    pims_personnel.emp_no = pms_ris.emp_no")
                                      or die("Error: ".mysqli_error($mysqli));                           
    $name = mysqli_fetch_array($personnel);



$pdf=new PDF_MC_Table('P','mm','LEGAL');
$pdf->AddPage();
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0);
$pdf->SetDrawColor(0,0,0);
$pdf->SetLineWidth(.3);

	$pdf->Ln();
    $pdf->SetFont('Times','B', 16);
    $pdf->Cell(0,7,'REQUISITION AND ISSUE SLIP',0,1,'C',true);
    $pdf->SetFont('Arial','', 11);
    $pdf->Cell(0,7,'PAG-ASA NATIONAL HIGH SCHOOL',0,0,'C',true);
	$pdf->Ln();
    $pdf->Ln();
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(80,5,'Division: Legazpi City Division, Region V',0,0,'C',true);
    $pdf->Cell(40,5,'Responsibility                ',0,0,'R',true);

    date_default_timezone_set('Asia/Manila');
    $date = date('y-m');

    $pdf->Cell(42,5,"RIS No.: RIS-{$date}-{$var1}",0,0,'R',true);
    $pdf->Cell(33,5,"Date: {$var2}",0,1,'R',true);
    $pdf->Cell(68,5,"Office:    {$name['dept_name']}",0,0,'C',true);
    $pdf->Cell(57,5,'  Center Code: ___________',0,0,'R',true);
    $pdf->Cell(37,5,'SAI No.: _______',0,0,'R',true);
    $pdf->Cell(34,5,"Date: {$var2}",0,1,'R',true);
    $pdf->Ln();        
	$pdf->SetWidths(array(144,51));
    $pdf->SetFont('Times','', 11);
    $pdf->Row(array("REQUISITION","ISSUANCE"));
    $pdf->SetWidths(array(20,22,80,22,22,29));
    $pdf->Row(array("Stock No.", "Unit", "Description","Quantity","Quantity","Remarks"));


    $fetch_details = mysqli_query($mysqli, "SELECT ris_no, req_item, req_desc, req_unit, req_qty FROM pms_ris_req WHERE ris_no = '".$ris."'")
            or die(mysqli_error($mysqli));
    while($row=mysqli_fetch_array($fetch_details))
    {

    $pdf->Row(array("", "{$row['req_unit']}", "{$row['req_item']} {$row['req_desc']}","{$row['req_qty']}","",""));
    }
    $pdf->Row(array("", "", "","","",""));
    $pdf->Row(array("", "", "","","",""));
    $pdf->Row(array("", "", "","","",""));
    $pdf->Row(array("", "", "","","",""));
    $pdf->Row(array("", "", "","","",""));
    $pdf->Row(array("", "", "","","",""));
    $pdf->Row(array("", "", "","","",""));
    $pdf->Row(array("", "", "","","",""));
    $pdf->Row(array("", "", "","","",""));
    $pdf->Row(array("", "", "","","",""));
    $pdf->Row(array("", "", "","","",""));
    $pdf->Row(array("", "", "","","",""));
    $pdf->Row(array("", "", "","","",""));
    $pdf->Row(array("", "", "","","",""));
    $pdf->Row(array("", "", "","","",""));
    $pdf->Row(array("", "", "","","",""));
    $pdf->Row(array("", "", "","","",""));
    $pdf->Row(array("", "", "","","",""));
    $pdf->Row(array("", "", "","","",""));

	$pdf->SetWidths(array(195));
    $pdf->Row(array("Purpose: _________________________________________________________________________________________ \n              _________________________________________________________________________________________\n "));
	$pdf->SetWidths(array(31,41,41,41,41));
    $pdf->SetFont('Times','B', 11);
    $pdf->Row(array("", "REQUESTED BY:", "APPROVED BY:","ISSUED BY:","RECEIVED BY:"));
    $pdf->SetFont('Times','', 11);
    $pdf->Row(array("Signature", "", "","",""));
 

   
	
    
    $pdf->Row(array("Printed Name", "{$name['P_fname']} {$name['P_lname']}", "Jeremy Cruz","Lloyd Garcia","{$name['P_fname']} {$name['P_lname']}"));
    $pdf->Row(array("Designation", "{$name['dept_name']}", "Principal's Office","Supply Office","{$name['dept_name']}"));
    $pdf->Row(array("Date", "{$var2}", "{$var2}","{$var2}","{$var2}"));
$pdf->Ln();
$pdf->output();
?>