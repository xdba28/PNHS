<?php
    include("../db/dbcon.php");
    include("../session.php");
	include("fpdf.php");
class PDF extends FPDF
{


	function myCell($w,$h,$x,$t){
		$height= $h/3;
		$first = $height+2;
		$second= $height+$height+$height+3;
		$len = strlen($t);
			if($len>30){
				$txt=str_split($t,50);
				$this->SetX($x);
				$this->Cell($w,$first,$txt[0]);
				$this->SetX($x);
				$this->Cell($w,$second,$txt[1]);
				$this->SetX($x);
				$this->Cell($w,$h,'','LTRB',0,'L',0);
			}else{
				$this->SetX($x);
				$this->Cell($w,$h,$t,'LTRB',0,'L',0);
		}
	}






	function Header()
	{
		// Logo
	// Arial bold 15
	$this->SetFont('Arial','B',15);
	// Move to the right
	$this->Ln(20);
	$this->Cell(80,5);
	$this->Cell(40,5,'REQUISITION AND ISSUE SLIP',0,1,'C');
	$this->Ln(10);
	$this->SetFont('Arial','',10);
	$this->Cell(80,5);
	$this->Cell(40,5,'PAG-ASA NATIONAL HIGH SCHOOL',0,1,'C');
	$this->Ln(30);
	$this->SetFont('Arial','B',10);
	$this->Cell(17,15,'Stock No.',1,0,'C');
	$this->Cell(17,15,'Unit',1,0,'C');
	$this->Cell(100,15,'Description',1,0,'C');
	$this->Cell(15,15,'Qty',1,0,'C');
	$this->Cell(15,15,'Qty',1,0,'C');
	$this->Cell(30,15,'Remarks',1,0,'C');
	$this->Ln(15);
	}

// Page footer
function Footer()
{
	include("../db/dbcon.php");

	$id=$_GET['pcode'];
	$qry="SELECT pims_personnel.P_lname,pims_personnel.P_fname FROM pms_po_con, pms_supplier, pms_pr_con, pms_ris_req, ims_storage, pms_ris, pms_pr, pms_po, pms_iar,pims_personnel, pms_iar_con WHERE pms_ris.ris_no=pms_ris_req.ris_no AND pms_ris_req.req_item_id=pms_pr_con.req_item_id AND pms_pr.pr_no=pms_pr_con.pr_no AND pms_supplier.company_id=pms_po.company_id AND pms_po.po_no=pms_po_con.po_no AND pms_po_con.pr_id=pms_pr_con.pr_id AND pms_iar.iar_no=pms_iar_con.iar_no AND pms_iar_con.po_id=pms_po_con.po_id AND ims_storage.emp_no=pims_personnel.emp_No AND pms_iar_con.iar_id=ims_storage.iar_id
            	AND pms_po.po_no=$id ";
	$so="SELECT pims_personnel.P_fname,pims_personnel.P_lname FROM pims_personnel,pims_employment_records,pims_job_title WHERE pims_employment_records.emp_no=pims_personnel.emp_no AND pims_employment_records.job_title_code=pims_job_title.job_title_code AND pims_job_title.job_title_code LIKE '%SUO%'";
    $p="SELECT pims_personnel.P_fname,pims_personnel.P_lname FROM pims_personnel,pims_employment_records,pims_job_title WHERE pims_employment_records.emp_no=pims_personnel.emp_no AND pims_employment_records.job_title_code=pims_job_title.job_title_code AND pims_job_title.job_title_code LIKE '%SP%'";

	$date=date('Y-m-d');
	$filter_Result = mysqli_query($mysqli, $qry);
    $row=mysqli_fetch_assoc($filter_Result);
	$filter_Result1 = mysqli_query($mysqli, $so);
    $sow=mysqli_fetch_assoc($filter_Result1);
    $filter_Result2 = mysqli_query($mysqli, $p);
    $sp=mysqli_fetch_assoc($filter_Result2);

    $ln=$row['P_lname'];
    $fn=$row['P_fname'];
    $sln=$sow['P_lname'];
    $sfn=$sow['P_fname'];
    $pln=$sp['P_lname'];
    $pfn=$sp['P_fname'];


	// Position at 1.5 cm from bottom
	$this->SetY(-100);
	$this->SetFont('Arial','',10);
	$this->Cell(80,5);
	$this->Cell(35,5,'Purpose:______________________________________________________________________________________________',0,1,'C');
	$this->Ln(1);
	$this->SetFont('Arial','B',10);
	$this->Cell(35,11,' ',1,0,'C');
	$this->Cell(40,11,'Requested By:',1,0,'C');
	$this->Cell(40,11,'Approved By:',1,0,'C');
	$this->Cell(40,11,'Issued By:',1,0,'C');
	$this->Cell(40,11,'Received By:',1,0,'C');
	$this->Ln(11);
	$this->Cell(35,8,'Signature',1,0,'C');
	$this->Cell(40,8,'',1,0,'C');
	$this->Cell(40,8,'',1,0,'C');
	$this->Cell(40,8,'',1,0,'C');
	$this->Cell(40,8,'',1,0,'C');
	$this->Ln(8);
	$this->SetFont('Arial','B',10);
	$this->Cell(35,8,'Printed Name',1,0,'C');
	$this->SetFont('Arial','',10);
	$this->Cell(40,8,$ln.','.$fn,1,0,'C');
	$this->Cell(40,8,$pln.','.$pfn,1,0,'C');
	$this->Cell(40,8,$sln.','.$sfn,1,0,'C');
	$this->Cell(40,8,$ln.','.$fn,1,0,'C');
	$this->Ln(8);
	$this->SetFont('Arial','B',10);
	$this->Cell(35,8,'Date',1,0,'C');
	$this->SetFont('Arial','',10);
	$this->Cell(40,8,$date,1,0,'C');
	$this->Cell(40,8,$date,1,0,'C');
	$this->Cell(40,8,$date,1,0,'C');
	$this->Cell(40,8,$date,1,0,'C');
	$this->Ln(50);
	// Page number
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF('P','mm','Legal');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$id=$_GET['pcode'];
   $sql="SELECT pms_iar_con.received_qty,pms_po.po_no,ims_storage.emp_no,ims_storage.p_code,ims_storage.stor_id, pms_ris_req.req_item, pms_ris_req.req_item_id, pms_ris_req.req_desc, pms_ris_req.req_unit, pms_po_con.unit_cost,pims_personnel.P_lname,pims_personnel.P_fname, ims_storage.stor_qty, ims_storage.stor_date, pms_supplier.company_name,pims_personnel.emp_no,ims_storage.stor_id,ims_storage.stor_qty FROM pms_ris, pms_ris_req, pms_iar, pms_pr, pms_pr_con, pms_iar_con,pms_po_con,pms_po, pims_personnel, pms_supplier, ims_storage WHERE pms_ris.ris_no=pms_ris_req.ris_no AND pms_ris_req.req_item_id=pms_pr_con.req_item_id AND pms_pr.pr_no=pms_pr_con.pr_no AND pms_supplier.company_id=pms_po.company_id AND pms_po.po_no=pms_po_con.po_no AND pms_po_con.pr_id=pms_pr_con.pr_id AND pms_iar.iar_no=pms_iar_con.iar_no AND pms_iar_con.po_id=pms_po_con.po_id AND ims_storage.emp_no=pims_personnel.emp_No AND pms_iar_con.iar_id=ims_storage.iar_id AND pms_po.po_no='$id'";
      $res=mysqli_query($mysqli,$sql);
      while($row=mysqli_fetch_array($res))
      {
      	$sid=$row['stor_id'];
        $qty=$row['received_qty'];
        $item=$row['req_item'];
        $des=$row['req_desc'];
        $unit=$row['req_unit'];

$h=8;

$x=$pdf->GetX();
$pdf->myCell(17,$h,$x,$sid);
$x=$pdf->GetX();
$pdf->myCell(17,$h,$x,$unit);
$x=$pdf->GetX();
$pdf->myCell(100,$h,$x,$item.','.$des);
$x=$pdf->GetX();
$pdf->myCell(15,$h,$x,$qty);
$x=$pdf->GetX();
$pdf->myCell(15,$h,$x,$qty);
$x=$pdf->GetX();
$pdf->myCell(30,$h,$x,' ');
$pdf->Ln();


}
$pdf->Output();
?>