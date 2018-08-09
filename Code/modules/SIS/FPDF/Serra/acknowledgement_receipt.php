<?php

	require('../fpdf.php');
	

	class PDF extends FPDF
	{
	
			function Header()
			{	
				$this->sety(-340);
				$this->SetFont('Arial','',10);
				$this->cell(0,3,'Daraga National High School',0,1,'C');
				$this->ln();
				$this->SetFont('Arial','B',10);
				$this->Cell(0,5,'ACKNOWLEDGEMENT RECEIPT FOR PROPERTY AND EQUIPMENT',0,1,"C");
				$this->ln();
			
			}
			function Footer()
			{		
					//
					$this->SetY(-85);
					$this->cell(91.3,60,'',1,0);
					$this->SetFont('Arial','',10);
					$this->SetY(-78);
					$this->cell(0,6,'                                 RECEIVED BY: ');	
					$this->ln(); $this->ln();
					//
					$this->SetFont('Arial','B', 10);
					$this->cell(0,4,'         ____________________________________');
					$this->ln(5);
					$this->Setfont('Arial','',10);
					$this->cell(0,4,'              SIGNATURE OVER PRINTED NAME ');
					$this->ln(10);
					//
					$this->SetFont('Arial','B',10);
					$this->cell(0,8,'                 _________________________');
					$this->ln();
					$this->SetFont('Arial','',10);
					$this->cell(1,1,'                        POSITION/DESIGNATION ');
					$this->ln(10);
					//
					$this->Setfont('arial','',10);	
					$this->cell(1,4,'  DATE & TIME RECEIVED: _______________ ');		
					$this->setXY(101.4,-85);
					$this->cell(98,60,'',1,0);
					$this->setXY(120,-78);
					$this->SetFont('Arial','',10);
					$this->cell(0,6,'                    RECEIVED FROM: ');	
					$this->ln(); $this->ln();
					//
					$this->setXY(120,-66);
					$this->SetFont('Arial','',10);
					$this->cell(0,4,' ____________________________________');
					$this->ln(5);
					//
					$this->setXY(118,-61);
					$this->SetFont('Arial','',10);
					$this->cell(0,4,'       SIGNATURE OVER PRINTED NAME ');
					$this->ln(5);
					//
					$this->setXY(118,-51);
					$this->SetFont('Arial','B',10);
					$this->cell(0,8,'      _____________________________');
					$this->ln();
					$this->setXY(118,-51);
					$this->SetFont('Arial','B',10);
					$this->cell(0,8,'      SCHOOL PROPERTY CUSTODIAN');
					//
					$this->setXY(118,-45);
					$this->SetFont('Arial','',10);
					$this->cell(1,6,'            POSITION/DESIGNATION ');
					$this->ln(10);
					//
					$this->setXY(118,-32);
					$this->Setfont('arial','',10);
					$this->cell(1,4,'DATE & TIME RECEIVED: _______________ ');
					
			
			}
			
				
			
	}
	
	//$pdf->SetFont('Arial','',11);
	$pdf = new PDF('P','mm','Legal');
	$pdf->AddPage();

		$pdf->Setfont('arial','B',9);
		$pdf->Cell(27,7,"QTY",1,0,"C");
		$pdf->Cell(22,7,"UNIT",1,0,"C");
		$pdf->Cell(70,7,"ITEM DESCRIPTION",1,0,"C");
		$pdf->Cell(35,7,"SERIAL NUMBER",1,0,"C");
		$pdf->Cell(36,7,"DNHS PROPERTY NO.",1,0,"C");
		$pdf->ln();
		//
		
		//main query
		
			//new line 2
		$pdf->Setfont('arial','B',9);
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(22,7,"",1,0,"C");
		$pdf->Cell(70,7,"",1,0,"C");
		$pdf->Cell(35,7,"",1,0,"C");
		$pdf->Cell(36,7,"",1,0,"C");
		$pdf->ln();
		$pdf->Setfont('arial','B',9);
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(22,7,"",1,0,"C");
		$pdf->Cell(70,7,"",1,0,"C");
		$pdf->Cell(35,7,"",1,0,"C");
		$pdf->Cell(36,7,"",1,0,"C");
		$pdf->ln();
		$pdf->Setfont('arial','B',9);
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(22,7,"",1,0,"C");
		$pdf->Cell(70,7,"",1,0,"C");
		$pdf->Cell(35,7,"",1,0,"C");
		$pdf->Cell(36,7,"",1,0,"C");
		$pdf->ln();
		$pdf->Setfont('arial','B',9);
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(22,7,"",1,0,"C");
		$pdf->Cell(70,7,"",1,0,"C");
		$pdf->Cell(35,7,"",1,0,"C");
		$pdf->Cell(36,7,"",1,0,"C");
		$pdf->ln();//5
		$pdf->Setfont('arial','B',9);
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(22,7,"",1,0,"C");
		$pdf->Cell(70,7,"",1,0,"C");
		$pdf->Cell(35,7,"",1,0,"C");
		$pdf->Cell(36,7,"",1,0,"C");
		$pdf->ln();
		$pdf->Setfont('arial','B',9);
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(22,7,"",1,0,"C");
		$pdf->Cell(70,7,"",1,0,"C");
		$pdf->Cell(35,7,"",1,0,"C");
		$pdf->Cell(36,7,"",1,0,"C");
		$pdf->ln();
		$pdf->Setfont('arial','B',9);
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(22,7,"",1,0,"C");
		$pdf->Cell(70,7,"",1,0,"C");
		$pdf->Cell(35,7,"",1,0,"C");
		$pdf->Cell(36,7,"",1,0,"C");
		$pdf->ln();
		$pdf->Setfont('arial','B',9);
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(22,7,"",1,0,"C");
		$pdf->Cell(70,7,"",1,0,"C");
		$pdf->Cell(35,7,"",1,0,"C");
		$pdf->Cell(36,7,"",1,0,"C");
		$pdf->ln();
		$pdf->Setfont('arial','B',9);
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(22,7,"",1,0,"C");
		$pdf->Cell(70,7,"",1,0,"C");
		$pdf->Cell(35,7,"",1,0,"C");
		$pdf->Cell(36,7,"",1,0,"C");
		$pdf->ln();//10
		$pdf->Setfont('arial','B',9);
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(22,7,"",1,0,"C");
		$pdf->Cell(70,7,"",1,0,"C");
		$pdf->Cell(35,7,"",1,0,"C");
		$pdf->Cell(36,7,"",1,0,"C");
		$pdf->ln();
		$pdf->Setfont('arial','B',9);
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(22,7,"",1,0,"C");
		$pdf->Cell(70,7,"",1,0,"C");
		$pdf->Cell(35,7,"",1,0,"C");
		$pdf->Cell(36,7,"",1,0,"C");
		$pdf->ln();
		$pdf->Setfont('arial','B',9);
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(22,7,"",1,0,"C");
		$pdf->Cell(70,7,"",1,0,"C");
		$pdf->Cell(35,7,"",1,0,"C");
		$pdf->Cell(36,7,"",1,0,"C");
		$pdf->ln();
		$pdf->Setfont('arial','B',9);
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(22,7,"",1,0,"C");
		$pdf->Cell(70,7,"",1,0,"C");
		$pdf->Cell(35,7,"",1,0,"C");
		$pdf->Cell(36,7,"",1,0,"C");
		$pdf->ln();
		$pdf->Setfont('arial','B',9);
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(22,7,"",1,0,"C");
		$pdf->Cell(70,7,"",1,0,"C");
		$pdf->Cell(35,7,"",1,0,"C");
		$pdf->Cell(36,7,"",1,0,"C");
		$pdf->ln();//15
		$pdf->Setfont('arial','B',9);
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(22,7,"",1,0,"C");
		$pdf->Cell(70,7,"",1,0,"C");
		$pdf->Cell(35,7,"",1,0,"C");
		$pdf->Cell(36,7,"",1,0,"C");
		$pdf->ln();
		$pdf->Setfont('arial','B',9);
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(22,7,"",1,0,"C");
		$pdf->Cell(70,7,"",1,0,"C");
		$pdf->Cell(35,7,"",1,0,"C");
		$pdf->Cell(36,7,"",1,0,"C");
		$pdf->ln();
		$pdf->Setfont('arial','B',9);
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(22,7,"",1,0,"C");
		$pdf->Cell(70,7,"",1,0,"C");
		$pdf->Cell(35,7,"",1,0,"C");
		$pdf->Cell(36,7,"",1,0,"C");
		$pdf->ln();
		$pdf->Setfont('arial','B',9);
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(22,7,"",1,0,"C");
		$pdf->Cell(70,7,"",1,0,"C");
		$pdf->Cell(35,7,"",1,0,"C");
		$pdf->Cell(36,7,"",1,0,"C");
		$pdf->ln();
		$pdf->Setfont('arial','B',9);
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(22,7,"",1,0,"C");
		$pdf->Cell(70,7,"",1,0,"C");
		$pdf->Cell(35,7,"",1,0,"C");
		$pdf->Cell(36,7,"",1,0,"C");
		$pdf->ln();//20
		$pdf->Setfont('arial','B',9);
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(22,7,"",1,0,"C");
		$pdf->Cell(70,7,"",1,0,"C");
		$pdf->Cell(35,7,"",1,0,"C");
		$pdf->Cell(36,7,"",1,0,"C");
		$pdf->ln();
		$pdf->Setfont('arial','B',9);
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(22,7,"",1,0,"C");
		$pdf->Cell(70,7,"",1,0,"C");
		$pdf->Cell(35,7,"",1,0,"C");
		$pdf->Cell(36,7,"",1,0,"C");
		$pdf->ln();
		$pdf->Setfont('arial','B',9);
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(22,7,"",1,0,"C");
		$pdf->Cell(70,7,"",1,0,"C");
		$pdf->Cell(35,7,"",1,0,"C");
		$pdf->Cell(36,7,"",1,0,"C");
		$pdf->ln();
		$pdf->Setfont('arial','B',9);
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(22,7,"",1,0,"C");
		$pdf->Cell(70,7,"",1,0,"C");
		$pdf->Cell(35,7,"",1,0,"C");
		$pdf->Cell(36,7,"",1,0,"C");
		$pdf->ln();
		$pdf->Setfont('arial','B',9);
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(22,7,"",1,0,"C");
		$pdf->Cell(70,7,"",1,0,"C");
		$pdf->Cell(35,7,"",1,0,"C");
		$pdf->Cell(36,7,"",1,0,"C");
		$pdf->ln();//25
		$pdf->Setfont('arial','B',9);
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(22,7,"",1,0,"C");
		$pdf->Cell(70,7,"",1,0,"C");
		$pdf->Cell(35,7,"",1,0,"C");
		$pdf->Cell(36,7,"",1,0,"C");
		$pdf->ln();
		$pdf->Setfont('arial','B',9);
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(22,7,"",1,0,"C");
		$pdf->Cell(70,7,"",1,0,"C");
		$pdf->Cell(35,7,"",1,0,"C");
		$pdf->Cell(36,7,"",1,0,"C");
		$pdf->ln();
		$pdf->Setfont('arial','B',9);
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(22,7,"",1,0,"C");
		$pdf->Cell(70,7,"",1,0,"C");
		$pdf->Cell(35,7,"",1,0,"C");
		$pdf->Cell(36,7,"",1,0,"C");
		$pdf->ln();//28 
		$pdf->Setfont('arial','B',9);
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(22,7,"",1,0,"C");
		$pdf->Cell(70,7,"",1,0,"C");
		$pdf->Cell(35,7,"",1,0,"C");
		$pdf->Cell(36,7,"",1,0,"C");
		$pdf->ln();
		$pdf->Setfont('arial','B',9);
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(22,7,"",1,0,"C");
		$pdf->Cell(70,7,"",1,0,"C");
		$pdf->Cell(35,7,"",1,0,"C");
		$pdf->Cell(36,7,"",1,0,"C");
		$pdf->ln();
		$pdf->Setfont('arial','B',9);
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(22,7,"",1,0,"C");
		$pdf->Cell(70,7,"",1,0,"C");
		$pdf->Cell(35,7,"",1,0,"C");
		$pdf->Cell(36,7,"",1,0,"C");
		$pdf->ln();
		
		
			//Right box cust_name
			
			
		
		
	$title = 'ACKNOWLEDGEMENT RECEIPT FOR PROPERTY AND EQUIPMENT';
	$pdf->SetTitle($title);
	$pdf->Output();

      ?>