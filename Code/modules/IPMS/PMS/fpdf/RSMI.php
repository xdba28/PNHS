<?php
require('mc_table.php');
include "connect.php";
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"ectrading");

      $ris =$_GET['ris'];	
//query

$pdf=new PDF_MC_Table('P','mm','LEGAL');
$pdf->AddPage();
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0);
$pdf->SetDrawColor(0,0,0);
$pdf->SetLineWidth(.3);

	$pdf->Ln();
    $pdf->SetFont('Times','B', 14);
    $pdf->Cell(0,5,'REPORT OF SUPPLIES AND MATERIALS ISSUED',0,1,'C',true);
    $pdf->SetFont('Times','B', 12);
    $pdf->Cell(0,5,'Pag-asa National High School',0,1,'C',true);
	$pdf->Ln();
    $pdf->Ln();
    $pdf->SetFont('Arial','B',10);
	    date_default_timezone_set('Asia/Manila');
    $date = date('y-m');
	$date1 = date('F j, Y');

    //$sql = mysqli_query($mysqli, "SELECT pms_ris.ris_no from pms_ris where emp_No = '1'");
    //while ($row = mysqli_fetch_array($sql)){
	   //$ris = $row['ris_no'];
    if(!empty($_GET['ris'])){ //echo $_GET['ris'];

    $pdf->Cell(65,5,'Date: '."$date1".'',0,0,'C',true);
    $pdf->Cell(165,5,'RSMI No.: RSMI-'."$date".'-'."{$_GET['ris']}".'',0,1,'C',true);}
	$pdf->Ln();
    $pdf->SetFont('Times','', 10);
    $pdf->SetWidths(array(137,58));
    $pdf->Row(array("To be filled up in the Supply and Property Unit", "To be filled up in the accounting unit"));
    $pdf->SetFont('Arial','', 9);
    $pdf->SetWidths(array(15,22,15,60,10,15,29,29));
    $pdf->Row(array("RIS No.", "Responsibility Code","Stock No.", "Item", "Unit","Quantity Issued","Unit Cost", "Amount"));

if(!empty($_GET['ris'])){
       
      $ris =$_GET['ris'];
       $sql5 = mysqli_query($mysqli, "SELECT * FROM pms_item, pms_ris_request,pms_ris where pms_item.item_id = pms_ris_request.item_id and                          pms_ris_request.ris_no = '$ris' and pms_ris_request.ris_no=pms_ris.ris_no")
                or die("Error: ".mysqli_error($mysqli));}

$count=0;
while($count<15){
while($row = mysqli_fetch_array($sql5)){
    
    $pdf->Row(array("{$row['ris_no']}", "","{$row['item_id']}", "{$row['item_name']} {$row['item_des']}", "{$row['item_unit']}","{$row['iss_qty']}","", ""));
    $count++;
}
while ($count<15){
    $pdf->Row(array("", "","", "", "","","", ""));
    $count++;
}

}

    
    $pdf->SetFont('Times','B',10);
    //cell(width, height, text, border, end line, [align])
    //normal rowheight=5
    $pdf->Cell(15,25,"",1,0,'C'); 
    $pdf->SetFont('Times','B',9);
    $pdf->Cell(37,5,"Recapitulation",1,0,'C');
    $pdf->Cell(60,25,"",1,0,'C'); 
    $pdf->Cell(10,25,"",1,0,'C');
    $pdf->Cell(73,5,"Recapitulation",1,0,'C');
    $pdf->Cell(0,5,'',0,1);
    //2nd line row
    $pdf->Cell(15,25,'',0,0);
    $pdf->SetFont('Times','B',7);
    $pdf->Cell(18.5,5,"Stock No",1,0,'C');
    $pdf->Cell(18.5,5,"Quantity",1,0,'C');
    $pdf->Cell(70,5,'',0,0);
    $pdf->Cell(15,5,"Unit Cost",1,0,'C');
    $pdf->Cell(29,5,"Total Cost",1,0,'C');
    $pdf->Cell(29,5,"Account Code",1,1,'C');

    $pdf->Cell(15,25,'',0,0);
    $pdf->SetFont('Times','B',7);
    $pdf->Cell(18.5,5,"",1,0,'C');
    $pdf->Cell(18.5,5,"",1,0,'C');
    $pdf->Cell(70,5,'',0,0);
    $pdf->Cell(15,5,"",1,0,'C');
    $pdf->Cell(29,5,"",1,0,'C');
    $pdf->Cell(29,5,"",1,1,'C');

    $pdf->Cell(15,25,'',0,0);
    $pdf->SetFont('Times','B',7);
    $pdf->Cell(18.5,5,"",1,0,'C');
    $pdf->Cell(18.5,5,"",1,0,'C');
    $pdf->Cell(70,5,'',0,0);
    $pdf->Cell(15,5,"",1,0,'C');
    $pdf->Cell(29,5,"",1,0,'C');
    $pdf->Cell(29,5,"",1,1,'C');

    $pdf->Cell(15,25,'',0,0);
    $pdf->SetFont('Times','B',7);
    $pdf->Cell(18.5,5,"",1,0,'C');
    $pdf->Cell(18.5,5,"",1,0,'C');
    $pdf->Cell(70,5,'',0,0);
    $pdf->Cell(15,5,"",1,0,'C');
    $pdf->Cell(29,5,"",1,0,'C');
    $pdf->Cell(29,5,"",1,1,'C');

    $pdf->SetWidths(array(195));
    $pdf->Row(array(""));
	$pdf->SetWidths(array(135, 60));
    $pdf->Row(array("
    I hereby certify to the corrections of the above information. 
     
     
                        _____________________________
                                Supply Officer
                                          ","
    Posted by/Date : 
    
            _____________________________
    Accounting Clerk
                                    "));



$pdf->Ln();

$pdf->output();
?>