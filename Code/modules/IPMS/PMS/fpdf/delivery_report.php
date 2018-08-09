<?php
require('mc_table.php');
include "connect.php";
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"ectrading");
session_start();
$aid = $_SESSION['user_data']['acct']['cms_account_ID'];	
//query
					$account = mysqli_query($mysqli, "SELECT *, LEFT(P_mname, 1) FROM cms_account, pims_personnel 
								WHERE cms_account_ID = '".$aid."'
								AND cms_account.emp_no = pims_personnel.emp_No");
								
							$acc = mysqli_fetch_array($account);
							
							
							$prep = strtoupper($acc['P_fname'].' '.$acc['LEFT(P_mname, 1)'].'. '.$acc['P_lname']);		

    date_default_timezone_set('Asia/Manila');
    $date = date('y-m');
    $date1 = date('Y-M-d');



$pdf=new PDF_MC_Table('L','mm','LETTER');
$pdf->AddPage();
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0);
$pdf->SetDrawColor(0,0,0);
$pdf->SetLineWidth(.3);

    $pdf->SetFont('Times','B', 10);
    $pdf->Cell(0,3,'DEPARTMENT OF EDUCATION',0,0,'C',true);
    $pdf->SetFont('Times','B', 8);
	$pdf->Ln();
	$pdf->Cell(0,4,'REGION V(Bicol)',0,0,'C',true);
    $pdf->SetFont('Arial','B', 10);
	$pdf->Ln();
	$pdf->Cell(0,4,'SCHOOLS DIVISION OF LEGAZPI CITY',0,0,'C',true);
	$pdf->SetFont('Times','B', 11);
	$pdf->Ln();
	$pdf->Cell(0,4,'PAG-ASA NATIONAL HIGH SCHOOL',0,0,'C',true);
    $pdf->SetFont('Arial','B', 10);
	$pdf->Ln();
	$pdf->Cell(0,4,'Rawis, Legazpi City',0,0,'C',true);
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->SetFont('Arial','B', 15);
	$pdf->Cell(0,4,'PROCUREMENT DELIVERY REPORT',0,0,'C',true);
	$pdf->Ln();
	$pdf->Image('pnhs_logo.png',55,10,23);
    $pdf->Ln();
    $pdf->Ln();
    
    date_default_timezone_set('Asia/Manila');
    $date = date('M. d, Y');

    $pdf->SetFont('Arial','B', 10);
    $pdf->Cell(0,3,"Date: {$date1}",0,1,'R',true);
    $pdf->Ln();
    $pdf->SetWidths(array(40,40,40,56,40,40));
    $pdf->Ln();
    $pdf->Row(array("Expected Delivery Date","Delivery Date","Supplier","Expected Item","Delivered Quantity","Remarks"));

 
                $sql = mysqli_query($mysqli, "SELECT * FROM pms_iar, pms_iar_con, pms_po_con, pms_pr_con, pms_ris_req, pms_ris, pms_po, pms_supplier
                    WHERE pms_iar_con.iar_no = pms_iar.iar_no
                    AND pms_iar_con.po_id = pms_po_con.po_id
                    AND pms_pr_con.pr_id = pms_po_con.pr_id
                    AND pms_pr_con.req_item_id = pms_ris_req.req_item_id
                    AND pms_ris.ris_no = pms_ris_req.ris_no
                    AND pms_po.po_no = pms_po_con.po_no
                    AND pms_supplier.company_id = pms_po.company_id
                    ")
                or die("Error: ".mysqli_error($mysqli));

                  $iar_no_prev = 0;                    
                    while($row = mysqli_fetch_array($sql))
                    {
                        $fetch_items = mysqli_query($mysqli, "SELECT * FROM pms_iar, pms_iar_con, pms_po_con, pms_pr_con, pms_ris_req, pms_ris, pms_po, pms_supplier
                    WHERE pms_iar_con.iar_no = pms_iar.iar_no
                    AND pms_iar_con.po_id = pms_po_con.po_id
                    AND pms_pr_con.pr_id = pms_po_con.pr_id
                    AND pms_pr_con.req_item_id = pms_ris_req.req_item_id
                    AND pms_ris.ris_no = pms_ris_req.ris_no
                    AND pms_po.po_no = pms_po_con.po_no
                    AND pms_supplier.company_id = pms_po.company_id
                    AND pms_iar.iar_no = '".$row['iar_no']."'")
                            or die(mysqli_error($mysqli));
                            $items = '';
                            while($item = mysqli_fetch_array($fetch_items))
                            {
                            $items = $item['received_qty'].' '.$item['req_unit'].' '.$item['req_desc'].' '.$item['req_item'].'<br>'.$items;
                            }
                            if ($row['next_del_date'] == '0000-00-00' && $row['status'] == NULL) {
                                if($row['req_date'] == $row['req_date']){
                                    $remarks = 'Ontime';
                                }
                                else {
                                    $remarks = 'Delayed';
                                }
         
    $pdf->Row(array("{$row['received_date']}","{$row['delivery_date']}","{$row['company_name']}","{$items}","{$row['received_qty']}","{$row['iar_status']}"));
					}}
    $pdf->Row(array("","","","","",""));
    $pdf->Row(array("","","","","",""));
    $pdf->Row(array("","","","","",""));


    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Cell(0,5,'Prepared by: ',0,1,'C',true);
    $pdf->Ln();
    $pdf->SetFont('Arial','U',10);  
    $pdf->Cell(0,3,"      $prep       ",0,1,'C',true);


$pdf->output();
					?>