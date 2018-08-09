<?php
require('mc_table.php');
include_once('connect.php');
session_start();
$aid = $_SESSION['user_data']['acct']['cms_account_ID'];
$emp = $_SESSION['user_data']['acct']['emp_no'];

$iar = $_GET['iar'];



					$personnel = mysqli_query($mysqli, "SELECT * FROM  pms_ris, pims_personnel, pims_employment_records, pims_department
WHERE pims_personnel.emp_No = pms_ris.emp_No AND
      pims_personnel.emp_No = pims_employment_records.emp_No AND
      pims_department.dept_ID =pims_employment_records.dept_ID AND 
      pims_personnel.emp_No = emp")
        or die("Error: ".mysqli_error($mysqli));
                                      or die("Error: ".mysqli_error($mysqli));                           
    $name = mysqli_fetch_array($personnel);
								

$fetch_iar = mysqli_query($mysqli, "SELECT *
                                                            FROM pms_po,pms_po_con,pms_supplier,pms_pr,pms_pr_con,pms_ris_req,pms_ris,pms_iar,pms_iar_con
                                                            WHERE pms_ris.ris_no=pms_ris_req.ris_no
                                                            AND pms_pr_con.req_item_id=pms_ris_req.req_item_id
                                                            AND pms_pr.pr_no=pms_pr_con.pr_no
                                                            AND pms_supplier.company_id=pms_po.company_id
                                                            AND pms_po.po_no=pms_po_con.po_no
                                                            AND pms_po_con.pr_id=pms_pr_con.pr_id
                                                            AND pms_iar.iar_no=pms_iar_con.iar_no
                                                            AND pms_iar_con.po_id=pms_po_con.po_id
                                                            AND pms_iar.iar_no= $iar
                                                            ORDER BY pms_iar.iar_no")


                            or die(mysqli_error($mysqli));
$iar = mysqli_fetch_array($fetch_iar);
	
//query

$pdf=new PDF_MC_Table('P','mm','LEGAL');
$pdf->AddPage();
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0);
$pdf->SetDrawColor(0,0,0);
$pdf->SetLineWidth(.3);

	$pdf->Ln();
    $pdf->SetFont('Times','B', 14);
    $pdf->Cell(0,5,'INSPECTION AND ACCEPTANCE REPORT',0,1,'C',true);
    $pdf->SetFont('Arial','B', 11);
    $pdf->Cell(0,5,'PAG-ASA NATIONAL HIGH SCHOOL',0,1,'C',true);
    $pdf->SetFont('Arial','', 10);
    $pdf->Cell(0,5,'Rawis, Legazpi City',0,0,'C',true);
	$pdf->Ln();
    $pdf->Ln();

date_default_timezone_set('Asia/Manila');
    $date = date('y-m');

        $pdf->SetFont('Arial','B',10);
    $pdf->Cell(25,5,"Supplier: {$iar['company_name']}",0,1,'L',true);
    $pdf->Cell(69,5,"IAR No.: IAR-{$date}-{$iar['iar_no']}",0,1,'L',true);
    $pdf->Cell(36,5,"PO No.: PO-{$date}-{$iar['po_no']}",0,0,'R',true);
    $pdf->Cell(49,5,"Date: {$iar['iar_date']}",0,0,'R',true);
    $pdf->Cell(60,5,"Invoice No.: {$iar['inv_num']}",0,0,'R',true);
    $pdf->Cell(37,5,"Date: {$iar['iar_date']}",0,1,'R',true);
    $pdf->Cell(104,5,"Requisitioning Office/Department: {$name['dept_name']}\n ",0,1,'L',true);
    $pdf->Ln();
    $pdf->SetFont('Arial','B', 11);
    $pdf->SetWidths(array(30,30,105,30));
    $pdf->Row(array("Item No.", "Unit", "Description","Quantity"));

    
   

    $pdf->SetFont('Arial','', 11);
    $pdf->Row(array("", "{$iar['req_unit']}", "{$iar['req_desc']} {$iar['req_item']} ", "{$iar['received_qty']}"));
    $pdf->Row(array("", "", "",""));
    $pdf->Row(array("", "", "",""));
    $pdf->Row(array("", "", "",""));
    $pdf->Row(array("", "", "",""));
    $pdf->Row(array("", "", "",""));
    $pdf->Row(array("", "", "",""));
    $pdf->Row(array("", "", "",""));
    $pdf->Row(array("", "", "",""));
    $pdf->Row(array("", "", "",""));
    $pdf->Row(array("", "", "",""));
    $pdf->Row(array("", "", "",""));
    $pdf->Row(array("", "", "",""));
    $pdf->Row(array("", "", "",""));
    $pdf->Row(array("", "", "",""));
    $pdf->Row(array("", "", "",""));

	$pdf->SetWidths(array(97.5, 97.5));
    $pdf->SetFont('Times','B', 12);
    $pdf->Row(array("INSPECTION", "ACCEPTANCE"));
    $pdf->SetFont('Times','', 9);
    $pdf->Row(array("
    Date Inspected: {$iar['ins_date']}
    
    ______ Inspected, verified and found OK as to
           quantity and specifications.
      __________________      ___________________
Member, School Inspectorate Team   Member, School Inspectorate Team
    
       _______________________________
     Chairman, School Inspectorate Team
     ", "
     Date Received: {$iar['received_date']}

Remarks: {$iar['iar_status']}   

       _______________________________
     Chairman, School Inspectorate Team
     
"));

$pdf->Ln();

$pdf->output();
?>