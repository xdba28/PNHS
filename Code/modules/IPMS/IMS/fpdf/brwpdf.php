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
				$txt=str_split($t,30);
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
		include("../db/dbcon.php");
		$id=$_GET['pcode'];
   $sql1="SELECT DISTINCT pims_personnel.P_fname, 
	pims_personnel.P_lname FROM ims_borrow, pims_personnel, pms_po_con, pms_supplier, pms_pr_con, pms_ris_req, 
	ims_storage, pms_ris, pms_pr, pms_po, pms_iar, pms_iar_con WHERE pms_ris.ris_no=pms_ris_req.ris_no AND pms_ris_req.req_item_id=pms_pr_con.req_item_id 
	AND pms_pr.pr_no=pms_pr_con.pr_no AND pms_supplier.company_id=pms_po.company_id AND pms_po.po_no=pms_po_con.po_no AND pms_po_con.pr_id=pms_pr_con.pr_id 
	AND pms_iar.iar_no=pms_iar_con.iar_no AND pms_iar_con.po_id=pms_po_con.po_id AND pms_iar_con.iar_id=ims_storage.iar_id AND ims_borrow.emp_no=pims_personnel.emp_no 
	AND ims_storage.stor_id=ims_borrow.stor_id AND ims_borrow.emp_no='$id'";
      $res=mysqli_query($mysqli,$sql1);
      $row=mysqli_fetch_assoc($res);
      	$l=$row['P_lname'];
      	$f=$row['P_fname'];
		// Logo
	$this->Image('..\img\deped.png',120,6,20);
	// Arial bold 15
	$this->SetFont('Arial','B',10);
	// Move to the right
	$this->Cell(80,5);
	$this->Cell(180,5,'REPUBLIC OF THE PHILIPPINES',0,1,'C');
	$this->Cell(80,5);
	$this->Cell(180,5,'DEPARTMENT OF EDUCATION',0,1,'C');
	$this->Cell(80,5);
	$this->Cell(180,5,'REGION V',0,1,'C');
	$this->Cell(80,5);
	$this->Cell(180,5,'SCHOOLS DIVISION ON LEGAZPI CITY',0,1,'C');
	$this->Cell(80,5);
	$this->Cell(180,5,'ISSUED ITEMS REPORT',0,1,'C');
	$this->Image('..\img\pnhs_logo.jpg',220,6,20);
	$this->Ln(30);
	$this->Cell(30,15,'Personnel Name:',0,0,'C');
	$this->SetFont('Arial','',10);
	$this->Cell(30,15,$l.','.$f,0,1,'C');
	$this->SetFont('Arial','B',10);
	$this->Cell(60,15,'Product Code',1,0,'C');
	$this->Cell(40,15,'Item Name',1,0,'C');
	$this->Cell(100,15,'Description',1,0,'C');
	$this->Cell(15,15,'Unit',1,0,'C');
	$this->Cell(20,15,'Unit Value',1,0,'C');
	$this->Cell(10,15,'Qty',1,0,'C');
	$this->Cell(25,15,'Date Issued',1,0,'C');
	$this->Cell(60,15,'Supplier',1,1,'C');

	}

// Page footer
function Footer()
{
	// Position at 1.5 cm from bottom
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// Page number
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF('L','mm','Legal');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$id=$_GET['pcode'];
   $sql="SELECT ims_borrow.emp_no,pms_supplier.company_name,pms_po_con.unit_cost, ims_storage.stor_id, pms_ris_req.req_item, pms_ris_req.req_desc, pms_ris_req.req_unit, ims_borrow.borrow_qty,
	pims_personnel.P_fname, pims_personnel.P_lname, ims_borrow.borrow_date, ims_storage.p_code, ims_borrow.borrow_id FROM ims_borrow, pims_personnel, pms_po_con, pms_supplier, 
	pms_pr_con, pms_ris_req, ims_storage, pms_ris, pms_pr, pms_po, pms_iar, pms_iar_con WHERE pms_ris.ris_no=pms_ris_req.ris_no AND pms_ris_req.req_item_id=pms_pr_con.req_item_id 
	AND pms_pr.pr_no=pms_pr_con.pr_no AND pms_supplier.company_id=pms_po.company_id AND pms_po.po_no=pms_po_con.po_no AND pms_po_con.pr_id=pms_pr_con.pr_id 
	AND pms_iar.iar_no=pms_iar_con.iar_no AND pms_iar_con.po_id=pms_po_con.po_id AND pms_iar_con.iar_id=ims_storage.iar_id AND ims_borrow.emp_no=pims_personnel.emp_no 
	AND ims_storage.stor_id=ims_borrow.stor_id AND ims_storage.equipment='1' AND ims_borrow.borrow_qty > '0' AND ims_borrow.emp_no='$id'";
      $res=mysqli_query($mysqli,$sql);
      while($row=mysqli_fetch_array($res))
      {
      	$code=$row['p_code'];
        $item=$row['req_item'];
        $des=$row['req_desc'];
        $qty=$row['borrow_qty'];
        $b=$row['borrow_date'];
        $s=$row['company_name'];
        $val=$row['unit_cost'];
        $unit=$row['req_unit'];

$h=16;

$x=$pdf->GetX();
$pdf->myCell(60,$h,$x,$code);
$x=$pdf->GetX();
$pdf->myCell(40,$h,$x,$item);
$x=$pdf->GetX();
$pdf->myCell(100,$h,$x,$des);
$x=$pdf->GetX();
$pdf->myCell(15,$h,$x,$unit);
$x=$pdf->GetX();
$pdf->myCell(20,$h,$x,$val);
$x=$pdf->GetX();
$pdf->myCell(10,$h,$x,$qty);
$x=$pdf->GetX();
$pdf->myCell(25,$h,$x,$b);
$x=$pdf->GetX();
$pdf->myCell(60,$h,$x,$s);
$pdf->Ln();



}
$pdf->Output();
?>