<?php 
    require('fpdf.php');
    
    class barbs extends FPDF
    {
        function Header(){
            $this->SetFont("Arial","",12);
            $this->Cell(30,6,"Item Name",1,0,"C");
            $this->Cell(35,6,"Item Description",1,0,"C");
            $this->Cell(30,6,"Item Type",1,0,"C");
            $this->ln();
        }
    }

    $jug= new barbs('P', 'mm', 'A4');
    //$pdf->AliasNbPages();
    $jug->SetFont('Arial','',10);
    $jug->SetAutoPageBreak("True",50);    
    $jug->AddPage();
    
    //Content
    
    $jug->Cell(20,6,"Yves Solis",1,1,"C");
    $jug->Cell(20,6,"Yves Solis",1,1,"C");
$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");$jug->Cell(20,6,"Yves Solis",1,1,"C");
    $jug->Output();
    
        
?>