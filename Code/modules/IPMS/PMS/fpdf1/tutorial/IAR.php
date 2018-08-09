<?php
require('mc_table.php');
include "connect.php";
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"ectrading");
	
	
//query
    date_default_timezone_set('Asia/Manila');
    $date = date('y-m');
    $date1 = date('Y-M-d');

    if(isset($_POST['submit_iar']))
	{
		$iar = $_POST["iar"];
    }

    $fetch_iar = mysqli_query($mysqli, "SELECT iar_no FROM pms_iar")
										or die(mysqli_error($mysqli));
    $iar_no = mysqli_fetch_array($fetch_iar);

    $fetch_items = mysqli_query($mysqli, "SELECT iar_no, iar_date FROM pms_iar WHERE iar_no = '".$iar."'")
            or die(mysqli_error($mysqli));

    $var1="";
    $var2="";
    while($row=mysqli_fetch_array($fetch_items))
    {
	$var1=($row['iar_no']);
    $var2=($row['iar_date']);
    }

    $comp=mysqli_query($mysqli,"SELECT company_name,po_total FROM pms_po,pms_supplier WHERE pms_po.company_id=pms_supplier.company_id AND pms_po.po_no='".$iar."'");
    $crow=mysqli_fetch_assoc($comp);

    $iarcon=mysqli_query($mysqli,"SELECT iar_status,received_date,ins_date,inv_num,iar_date from pms_iar WHERE iar_no='".$iar."'");
    $iar3=mysqli_fetch_assoc($iarcon);

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
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(0,5,"Supplier: {$crow['company_name']}",0,0,'L',true);
    $pdf->Cell(0,5,"IAR No.: IAR-{$date}-{$var1}",0,1,'R',true);
    $pdf->Cell(37,5,"PO No.: __________",0,0,'R',true);
    $pdf->Cell(50,5,'Date: ___________',0,0,'R',true);
    $pdf->Cell(55,5,"Invoice No.: {$iar3['inv_num']}",0,0,'R',true);
    $pdf->Cell(47,5,"Date: {$iar3['iar_date']}",0,1,'R',true);
    $pdf->Cell(142,5,"Requisitioning Office/Department:\n _________________________________________",0,1,'C',true);
    $pdf->Ln();
    $pdf->SetFont('Arial','B', 11);
    $pdf->SetWidths(array(30,30,105,30));
    $pdf->Row(array("Item No.", "Unit", "Description","Quantity"));
    $pdf->SetFont('Arial','', 11);


    $iaritems=mysqli_query($mysqli,"SELECT req_item,req_unit,req_desc,received_qty
                                                            FROM pms_po,pms_po_con,pms_supplier,pms_pr,pms_pr_con,pms_ris_req,pms_ris,pms_iar,pms_iar_con
                                                            WHERE pms_ris.ris_no=pms_ris_req.ris_no
                                                            AND pms_pr_con.req_item_id=pms_ris_req.req_item_id
                                                            AND pms_pr.pr_no=pms_pr_con.pr_no
                                                            AND pms_supplier.company_id=pms_po.company_id
                                                            AND pms_po.po_no=pms_po_con.po_no
                                                            AND pms_po_con.pr_id=pms_pr_con.pr_id
                                                            AND pms_iar.iar_no=pms_iar_con.iar_no
                                                            AND pms_iar_con.po_id=pms_po_con.po_id
                                                            AND pms_iar.iar_no= $iar_no");

    while($row=mysqli_fetch_assoc($iaritems)){
    $pdf->Row(array("", "{$row['req_unit']}", "{$row['req_item']} {$row['req_desc']}", "{$row['received_qty']}"));
     }
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
    $pdf->Row(array("", "", "",""));
    $pdf->Row(array("", "", "",""));
    $pdf->Row(array("", "", "",""));
    $pdf->Row(array("", "", "",""));
	$pdf->SetWidths(array(97.5, 97.5));
    $pdf->SetFont('Times','B', 12);
    $pdf->Row(array("INSPECTION", "ACCEPTANCE"));
    $pdf->SetFont('Times','', 9);
    $pdf->Row(array("
    Date Inspected: {$iar3['ins_date']}
    Inspected, verified and found OK as to
           quantity and specifications.
 __________________                 ___________________
Member, School Inspectorate Team   Member, School Inspectorate Team
    
       _______________________________
     Chairman, School Inspectorate Team
     ", "
     Date Received: {$iar3['received_date']}

________  Complete
________  Partial   

       _______________________________
     Chairman, School Inspectorate Team
     
"));

$pdf->Ln();

$pdf->output();
?>