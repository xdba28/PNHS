<?php
    include("../db/dbcon.php");
    include("../session.php");
	include("fpdf.php");
class PDF extends FPDF
{
	function Header()
	{
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
	$this->Cell(180,5,'REPORT ON THE PHYSICAL COUNT OF PROPERTY, PLANT AND EQUIPMENT',0,1,'C');
	$this->Image('..\img\pnhs_logo.jpg',220,6,20);
	$this->Ln(20);
	$this->Cell(40,5,'Product Code',1,0,'C');
	$this->Cell(40,5,'Item Name',1,0,'C');
	$this->Cell(85,5,'Description',1,0,'C');
	$this->Cell(15,5,'Unit',1,0,'C');
	$this->Cell(20,5,'Value',1,0,'C');
	$this->Cell(15,5,'Quantity',1,0,'C');
	$this->Cell(25,5,'Date Borrowed',1,0,'C');
	$this->Cell(70,5,'Supplier',1,0,'C');
	$this->Cell(25,5,'Liable',1,1,'C');

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

$query="SELECT pms_supplier.company_name,pms_po_con.unit_cost, ims_storage.stor_id, pms_ris_req.req_item, pms_ris_req.req_desc, pms_ris_req.req_unit, ims_borrow.borrow_qty, pims_personnel.P_fname, pims_personnel.P_lname, ims_borrow.borrow_date, ims_borrow.p_code, ims_borrow.borrow_id FROM ims_borrow, pims_personnel, pms_po_con, pms_supplier, pms_pr_con, pms_ris_req, ims_storage, pms_ris, pms_pr, pms_po, pms_iar, pms_iar_con WHERE pms_ris.ris_no=pms_ris_req.ris_no AND pms_ris_req.req_item_id=pms_pr_con.req_item_id AND pms_pr.pr_no=pms_pr_con.pr_no AND pms_supplier.company_id=pms_po.company_id AND pms_po.po_no=pms_po_con.po_no AND pms_po_con.pr_id=pms_pr_con.pr_id AND pms_iar.iar_no=pms_iar_con.iar_no AND pms_iar_con.po_id=pms_po_con.po_id AND pms_iar.iar_no=ims_storage.iar_no AND ims_borrow.emp_no=pims_personnel.emp_no AND ims_storage.stor_id=ims_borrow.stor_id AND ims_storage.equipment='1' AND ims_borrow.borrow_qty > '0'";
      $res=mysqli_query($mysqli,$query);
      while($row=mysqli_fetch_array($res))
      {
      	$code=$row['p_code'];
        $name=$row['req_item'];
        $des=$row['req_desc'];
        $unit=$row['req_unit'];
        $cost=$row['unit_cost'];
        $qty=$row['borrow_qty'];
        $date=$row['borrow_date'];
        $com=$row['company_name'];
        $l=$row['P_lname'];
        $f=$row['P_fname'];

        $pdf->Cell(40,10,"$code",1,0,'C');
        $pdf->Cell(40,10,"$name",1,0,'C');
		$pdf->Cell(85,10,"$des",1,0,'C');
		$pdf->Cell(15,10,"$unit",1,0,'C');
		$pdf->Cell(20,10,"Php $cost",1,0,'C');
		$pdf->Cell(15,10,"$qty",1,0,'C');
		$pdf->Cell(25,10,"$date",1,0,'C');
		$pdf->Cell(70,10,"$com",1,0,'C');
		$pdf->Cell(25,10,"$l. $f",1,1,'C');

      }


$pdf->Output();


?>