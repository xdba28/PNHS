<?php
require('mc_table.php');
include "connect.php";
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"ectrading");
	
	$po = $_GET['po'];
//query
    date_default_timezone_set('Asia/Manila');
    $date = date('y-m');
    $date1 = date('Y-M-d');

    if(isset($_POST['submit_po']))
	{
		$po = $_POST["po"];
    }

    $fetch_po = mysqli_query($mysqli, "SELECT po_no FROM pms_po")
										or die(mysqli_error($mysqli));
    $po_no = mysqli_fetch_array($fetch_po);

    $fetch_items = mysqli_query($mysqli, "SELECT * 
FROM pms_po, pms_po_con, pms_pr, pms_pr_con
WHERE pms_pr.pr_no = pms_pr_con.pr_no
and pms_pr_con.pr_id = pms_po_con.pr_id
and pms_po_con.po_no = pms_po.po_no
and pms_po.po_no = '".$po."'")
            or die(mysqli_error($mysqli));

    $var1="";
    $var2="";
	$var3="";
    while($row=mysqli_fetch_array($fetch_items))
    {
	$var1=strtoupper($row['po_no']);
    $var2=($row['po_date']);
	$var3=strtoupper($row['pr_no']);
    }

    $comp=mysqli_query($mysqli,"SELECT * FROM pms_po,pms_supplier WHERE pms_po.company_id=pms_supplier.company_id AND pms_po.po_no='".$po."'");
    $crow=mysqli_fetch_assoc($comp);
	
	 $sql3 = mysqli_query($mysqli, "SELECT * FROM  pms_ris, pims_personnel, pims_employment_records, pims_department
									where pims_department.dept_id = pims_employment_records.dept_id
									and pims_employment_records.emp_No =
                                    pims_personnel.emp_no = pms_ris.emp_no")
                                      or die("Error: ".mysqli_error($mysqli));
    $name = mysqli_fetch_array($sql3);

$pdf=new PDF_MC_Table('P','mm','LEGAL');
$pdf->AddPage();
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0);
$pdf->SetDrawColor(0,0,0);
$pdf->SetLineWidth(.3);

    $pdf->SetFont('Arial','', 10);
    $pdf->Cell(0,4,'Republic of the Philippines',0,1,'C',true);
    $pdf->SetFont('Times','B', 10);
    $pdf->Cell(0,4,'DEPARTMENT OF EDUCATION',0,0,'C',true);
    $pdf->SetFont('Arial','B', 11);
	$pdf->Ln();
	$pdf->Cell(0,4,'SCHOOLS DIVISION OF LEGAZPI CITY',0,0,'C',true);
	$pdf->Ln();
    $pdf->SetFont('Times','B', 12);
	$pdf->Ln();
    $pdf->Cell(0,10,'PURCHASE ORDER',0,0,'C',true);
    $pdf->Ln();
    $pdf->Ln();
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(90,5,"Supplier: {$crow['company_name']}",0,0,'L',true);
    $pdf->Cell(102,5,"Purchase Order No/Date: PO-{$date}-{$var1}/{$var2}",0,1,'R',true);
    $pdf->Cell(90,5,"Address: {$crow['sup_address']}",0,0,'L',true);
    $pdf->Cell(78,5,"Purchase Request No: PR-{$date}-{$var3}",0,1,'R',true);
    $pdf->Cell(0,5,'Mode of Procurement: _________________________',0,1,'R',true);
    $pdf->Ln();
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(255,255,255);
    $pdf->SetLineWidth(.3);    
    $pdf->SetFont('Arial','',10);
    $pdf->Multicell(0,5,"     Gentlemen :
                        Please furnish this office the following articles subject to the terms and conditions contained herein:",1,1,'C');
    $pdf->Ln();
    $pdf->SetFont('Arial','',10);    
    $pdf->Cell(110,5,'Place of Delivery: Pagasa National High School, Rawis Legazpi City',0,0,'L',true);
    $pdf->Cell(70,5,"Delivery Term: {$crow['delivery_term']}",0,1,'R',true);

    date_default_timezone_set('Asia/Manila');
    $date1 = date('Y-m-d');

    $pdf->Cell(100,5,"Date of Delivery: {$crow['delivery_date']}",0,0,'L',true);
    $pdf->Cell(77,5,"Payment Term: {$crow['payment_term']}",0,1,'R',true);
    $pdf->Ln();
    $pdf->SetFont('Arial','B',10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.3);

	$pdf->SetWidths(array(25,25,25,80,20,20));
    $pdf->Row(array("Stock No.","Unit","Quantity","Description","Unit Cost","Amount"));
    $pdf->SetFont('Arial','',10);

    $poitems=mysqli_query($mysqli,"SELECT req_item,req_unit,req_desc,req_qty,unit_cost,tot_amt
                                                            FROM pms_po,pms_po_con,pms_supplier,pms_pr,pms_pr_con,pms_ris_req,pms_ris
                                                            WHERE pms_ris.ris_no=pms_ris_req.ris_no
                                                            AND pms_pr_con.req_item_id=pms_ris_req.req_item_id
                                                            AND pms_pr.pr_no=pms_pr_con.pr_no
                                                            AND pms_supplier.company_id=pms_po.company_id
                                                            AND pms_po.po_no=pms_po_con.po_no
                                                            AND pms_po_con.pr_id=pms_pr_con.pr_id
                                                            AND pms_po_con.po_no='".$po."'");
    while($row=mysqli_fetch_assoc($poitems))
    {
    $pdf->Row(array("","{$row['req_unit']}","{$row['req_qty']}","{$row['req_item']} {$row['req_desc']}","{$row['unit_cost']}","{$row['tot_amt']}"));
    }
    $pdf->Row(array("","","","","",""));
    $pdf->Row(array("","","","","",""));
    $pdf->Row(array("","","","","",""));
    $pdf->Row(array("","","","","",""));
    $pdf->Row(array("","","","","",""));
    $pdf->Row(array("","","","","",""));
    $pdf->Row(array("","","","","",""));
    $pdf->Row(array("","","","","",""));
    $pdf->Row(array("","","","","",""));
    $pdf->Row(array("","","","","",""));
    $pdf->Row(array("","","","","",""));
    $pdf->Row(array("","","","","",""));
    $pdf->Row(array("","","","","",""));
    $pdf->Row(array("","","","","",""));

	$pdf->SetWidths(array(175,20));
    $pdf->SetFont('Arial','B',9);
    $pdf->Row(array("Total Amount in Words:","PHP{$crow['po_total']}"));
    $pdf->Ln();
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(255,255,255);
    $pdf->SetLineWidth(.3);    
    $pdf->SetFont('Arial','',10);
    $pdf->Multicell(0,5,"                          In case of failure to make the full delivery within the time specified above, penalty of one-tenth (1/10) of one percent for every day of delay shall be imposed.",1,1,'C');
	$pdf->Ln();
	$pdf->Ln();
    $pdf->Cell(230,10,'Very Truly yours, ',0,0,'C',true);
	$pdf->Ln();
	$pdf->SetFont('Arial','U',9);
    $pdf->Cell(302,5,'Jeremy Cruz',0,1,'C',true);
	$pdf->SetFont('Arial','I',9);
    $pdf->Cell(304,4,'Secondary School Principal',0,1,'C',true);
    $pdf->Cell(30,10,'Conforme:',0,1,'C',true);
	$pdf->SetFont('Arial','U',9);
    $pdf->Cell(100,5,"Lloyd Garcia",0,1,'C',true);
    $pdf->SetFont('Arial','I',9);
    $pdf->Cell(100,3,'(Singature over printed name)',0,1,'C',true);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(100,10,"{$date1}",0,1,'C',true);
    $pdf->Cell(100,4,'Date',0,1,'C',true);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
    $pdf->Cell(40,4,'Funds Available:',1,1,'C',true);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

    $pdf->Cell(100,5,'______________________________________',0,0,'C',true);
    $pdf->Cell(89,5,'Amount:                                      _________________',0,1,'C',true);
    $pdf->Cell(100,5,'Accountant',0,0,'C',true);
    $pdf->Cell(89,5,'Obligation Request No:              _________________',0,1,'C',true);











$pdf->output();
?>