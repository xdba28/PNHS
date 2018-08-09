<?php
require('mc_table.php');
include "connect.php";
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"ectrading");

$pr = $_GET['pr'];
	
//query

    date_default_timezone_set('Asia/Manila');
    $date = date('y-m');
    $date1= date('Y-M-d');

    if(isset($_POST['submit_pr']))
	{
		$pr = $_POST["pr"];
    }

    $fetch_pr = mysqli_query($mysqli, "SELECT pr_no FROM pms_pr WHERE pms_pr.pr_status = 'Finished'")
										or die(mysqli_error($mysqli));
    $pr_no = mysqli_fetch_array($fetch_pr);

    $fetch_items = mysqli_query($mysqli, "SELECT pr_no, pr_date FROM pms_pr WHERE pr_no = '".$pr."'")
            or die(mysqli_error($mysqli));

    $var1="";
    $var2="";
    while($row=mysqli_fetch_array($fetch_items))
    {
	$var1=($row['pr_no']);
    $var2=($row['pr_date']);
    }

 $sql3 = mysqli_query($mysqli, "SELECT * FROM pms_ris, pms_ris_req, pms_pr, pms_pr_con, pims_personnel, pims_department, pims_employment_records
                                    WHERE pms_ris.ris_no = pms_ris_req.ris_no
                                    AND pms_ris.emp_no = pims_personnel.emp_no
                                    AND pims_personnel.emp_no = pims_employment_records.emp_No
                                    AND pims_employment_records.dept_ID = pims_department.dept_ID
                                    AND pms_ris.ris_no = pms_ris_req.ris_no
                                    AND pms_ris_req.req_item_id = pms_pr_con.req_item_id
                                    AND pms_pr.pr_no = pms_pr_con.pr_no
                                    AND pms_pr.pr_no = $pr")
                                      or die("Error: ".mysqli_error($mysqli));
    $name = mysqli_fetch_array($sql3);



$pdf=new PDF_MC_Table('P','mm','LEGAL');
$pdf->AddPage();
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0);
$pdf->SetDrawColor(0,0,0);
$pdf->SetLineWidth(.3);

	$pdf->Ln();
    $pdf->SetFont('Arial','', 11);
    $pdf->Cell(0,4,'Department of Education',0,1,'C',true);
    $pdf->Cell(0,4,'DIVISION OF LEGAZPI CITY',0,0,'C',true);
    $pdf->Ln();
    $pdf->SetFont('Times','B', 16);
    $pdf->Cell(0,7,'PURCHASE REQUEST',0,1,'C',true);
	$pdf->Ln();
    $pdf->Ln();
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(86,5,"Department/Section: {$name['dept_name']}",0,0,'C',true);
    $pdf->Cell(49,5,"PR No.: PR-{$date}-{$var1}",0,0,'R',true);
    $pdf->Cell(41,5,"Date: {$var2}",0,1,'R',true);    
    $pdf->Cell(135,5,'SAI No.: ________',0,0,'R',true);
    $pdf->Cell(41,5,"Date: {$var2}",0,1,'R',true);
    $pdf->Cell(95,5,'Name of School:  Pagasa National High School',0,0,'C',true);
    $pdf->Cell(40,5,'ALOBS No.: _______',0,0,'R',true);
    $pdf->Cell(41,5,"Date: {$var2}",0,1,'R',true);
    $pdf->Ln();
    $pdf->SetWidths(array(20,20,80,20,25,30));
    $pdf->SetFont('Times','B',10);
    //cell(width, height, text, border, end line, [align])
    //normal rowheight=5
    $pdf->Row(array("Quantity", "Unit of Issue", "Item Description","Stock Number","Estimated Unit Cost","Estimated Cost"));
    $pdf->SetFont('Arial','',10);

     $sql = mysqli_query($mysqli, "SELECT req_item,req_qty,req_unit,req_desc,est_unit_cost,est_cost FROM pms_pr_con,pms_pr,pms_ris_req,pms_ris 
                                WHERE pms_pr.pr_no=pms_pr_con.pr_no 
                                AND pms_ris_req.req_item_id=pms_pr_con.req_item_id
                                AND pms_ris.ris_no=pms_ris_req.ris_no
                                AND pms_pr_con.req_item_id = pms_ris_req.req_item_id
                                AND pms_pr.pr_no ='".$pr."'")
          or die(mysqli_error($mysqli));

     while($row=mysqli_fetch_array($sql))
    {

    $pdf->Row(array("{$row['req_qty']}", "{$row['req_unit']}", "{$row['req_item']} {$row['req_desc']}","","{$row['est_unit_cost']}","{$row['est_cost']}"));
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
    $pdf->Row(array("", "", "","","",""));
    $pdf->Row(array("", "", "","","",""));
    $pdf->Row(array("", "", "","","",""));
    $pdf->SetWidths(array(165,30));
    $pdf->SetFont('Arial','B',11);
	
	$total = mysqli_query($mysqli, "SELECT pr_total from pms_pr where pms_pr.pr_no = $pr")
                                      or die("Error: ".mysqli_error($mysqli));                           
    $tot = mysqli_fetch_array($total);
	
    $pdf->Row(array("TOTAL","PHP{$tot['pr_total']}"));
	$pdf->SetWidths(array(195));
    $pdf->SetFont('Arial','B',10);
	
	$purpose = mysqli_query($mysqli, "SELECT reason from pms_ris, pms_pr, pms_ris_req, pms_pr_con WHERE pms_pr.pr_no = pms_pr_con.pr_no
	AND pms_pr_con.req_item_id = pms_ris_req.req_item_id AND pms_ris_req.ris_no = pms_ris.ris_no and pms_pr.pr_no = $pr")
                                      or die("Error: ".mysqli_error($mysqli));                           
    $reason = mysqli_fetch_array($purpose);
	
    $pdf->Row(array("Purpose: {$reason['reason']}\n "));
	$pdf->SetWidths(array(31,41,41,41,41));
    $pdf->SetFont('Times','B', 11);
    $pdf->Row(array("", "REQUESTED BY:", "APPROVED BY:","ISSUED BY:","RECEIVED BY:"));
    
	
	 $status = mysqli_query($mysqli, "SELECT pr_status from pms_pr where pms_pr.pr_no = $pr")
                                      or die("Error: ".mysqli_error($mysqli));                           
    $stat = mysqli_fetch_array($status);
	
	if ($stat['pr_status']=='Approved') 
	{
		$pdf->setFillColor(230, 230, 230);
		$pdf->SetFont('Times','', 11, 'L');
		$pdf->Row(array("Signature", "", "...................................","",""));

	}
	
	else
		
	{
		$pdf->SetFont('Times','', 11);
		$pdf->Row(array("Signature", "", "","",""));
	}
 
   
	
    $pdf->Row(array("Printed Name", "{$name['P_fname']} {$name['P_lname']}", "Jeremy Cruz","Lloyd Garcia","{$name['P_fname']} {$name['P_lname']}"));
    $pdf->Row(array("Designation", "{$name['dept_name']}", "Principal's Office","Supply Office","{$name['dept_name']}"));
	$pdf->Ln();

$pdf->output();
?>