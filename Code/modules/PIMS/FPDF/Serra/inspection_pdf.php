<?php
	require('../fpdf.php');

	
	class pdf extends fpdf{
		
		function header(){
			
			$this->setxy(15,-265);
			$this->cell(188,29,'',1,0);
			$this->setfont('Arial','B',12);
			$this->setxy(15,-265);
			$this->cell(0,7,'INSPECTION AND ACCEPTANCE REPORT',0,1,'C');
			$this->ln(5);
			$this->setfont('Arial','',9);
			$this->cell(0,0,'Republic of the Philippines',0,1,'C');
			$this->ln(4);
			$this->cell(0,0,'Department of Education',0,1,'C');
			$this->ln(4);
			$this->setfont('Arial','B',10);
			$this->cell(0,0,'DARAGA NATIONAL HIGH SCHOOL',0,1,'C');
			$this->ln(4);
			$this->setfont('Arial','',9);
			$this->cell(0,0,'Daraga, Albay',0,1,'C');
						
		}
		
		function footer(){
			
			$this->setxy(15,-140);
			$this->SetFont('arial','BI',9);
			$this->cell(98.1,7,'INSPECTION',1,0,'C');
			$this->setxy(15,-133);
			$this->cell(98.1,80,'',1,0);
			$this->setfont('Arial','',9);
			$this->cell(-100,20,'Date Received: _______________________________',0,1,'C');
			$this->setxy(15,-113);
			$this->setfont('times','I',9);
			$this->cell(100,0,'Inspected, verified and found in order as to quantity and specifications',0,1,'C');
			//
			$this->setfont('Arial','',9);
			$this->setxy(22,-103);
			$this->cell(12,7.5,'',1,0,'C');//1st box
			$this->cell(0,13,'      Inspection Officer/Inspection Committee','C');
			$this->setxy(39,-106);
			$this->cell(0,12,'________________________________',0,1,'c');
			//
			$this->setxy(22,-89);
			$this->cell(12,7.5,'',1,0,'C');//2nd box
			$this->cell(0,13,'      Inspection Officer/Inspection Committee','C');
			$this->setxy(39,-92);
			$this->cell(0,12,'________________________________',0,1,'c');
			//
			$this->setxy(22,-75);
			$this->cell(12,7.5,'',1,0,'C');//3rd box
			$this->cell(0,13,'      Inspection Officer/Inspection Committee','C');
			$this->setxy(39,-78);
			$this->cell(0,12,'________________________________',0,1,'c');
			
			//
			$this->setxy(113,-140);
			$this->SetFont('arial','BI',9);
			$this->cell(90,7,'ACCEPTANCE',1,0,'C');
			$this->setxy(113,-133);
			$this->cell(90,60,'',1,0);
			$this->setfont('arial','',9);
			$this->cell(-90,20,'Date Received: _______________________________',0,1,'C');
			$this->setxy(113,-73);
			$this->cell(90,20,'',1,0);
			$this->setx(142);
			$this->cell(0,28,'PROPERTY CUSTODIAN',0,1,'c');
			$this->cell(302,-35,'_____________________________',0,1,'C');
			//black box
			$this->setxy(134,-113);
			$this->cell(12,7.5,'',1,0,'C');
			$this->cell(-120,10,'Complete',0,1);
			$this->setx(146);
			$this->cell(0,19,'Partial (pls. Specify quantity)',0,1);
			
		}
		
	}
	
	$pdf = new PDF('P','mm','Letter');
	$pdf->AddPage();
	//header 2nd box data
	$pdf->setxy(15,-236);
	$pdf->cell(0,10,'Supplier:  ________________________________________________________________');
	$pdf->setx(145);
	$pdf->cell(0,10,'I&A No. ______________________',0,1);
	$pdf->setx(15);
	$pdf->cell(10,0,'P.O. No.: ________________________',0,1);
	$pdf->setx(145);
	$pdf->cell(10,0,'Date: ________________________',0,1);
	$pdf->setx(80);
	$pdf->cell(10,0,'Date:_______________________',0,1);
	$pdf->ln(5);
	$pdf->setx(15);
	$pdf->cell(0,0,'Requisitioning Office/Dept: _____________________________________________________________________');
	//
	//->header 2nd box
	$pdf->setxy(15,-235.8);
	$pdf->cell(188,19,'',1,0);

	//mid
	$pdf->setxy(15,-216.7);
	$pdf->setfont('Arial','',9);
	$pdf->cell(20,6,'Item No.',1,0,'C');
	$pdf->cell(15,6,'Unit',1,0,'C');
	$pdf->cell(110,6,'Description',1,0,'C');
	$pdf->cell(43,6,'Quantity',1,0,'C');
	//empty box
	$pdf->setx(15);
	$pdf->cell(20,76.55,'',1,0);//item no.
	$pdf->cell(15,76.55,'',1,0);//unit
	$pdf->cell(110,76.55,'',1,0);//desc
	$pdf->setxy(160,-210.6);
	$pdf->cell(30,70.55,'',1,0);//quantity first row
	$pdf->cell(13,70.55,'',1,0);//quantity second row	
	
	
	
	
	$title = 'INSPECTION AND ACCEPTANCE REPORT';
	$pdf->SetTitle($title);
	$pdf->output();

?>