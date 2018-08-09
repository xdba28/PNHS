<?php
	include('connect-db.php');
	require('fpdf/fpdf.php');
	
	class PDF extends FPDF{
		
		function Header(){
			
			$this->SetFont('arial','',14);
			$this->cell(0,0,"REPORT ON THE PHYSICAL COUNT OF BOOKS",0,1,'C');
			$this->ln(7);
			$this->setxy(119,20);
			$this->SetFont('times','',10);
			$this->cell(0,0,"___________________________________________________________",0,1);
			$this->ln(3);
			$this->setxy(124,28);
			$this->cell(0,0,"As of _________________________________________________",0,1);
			$this->ln(3);
			$this->setxy(57,37);
			$this->cell(0,0,"For which _______________________ , _______________________ , _______________________ , is accountable, having assumed such accountability on __________________ . ",0,1);
			$this->ln();
			$this->setXY(77,41);
			$this->setfont('times','',7);
			$this->cell(0,0,"(Name of Accountable Officer)",0,1);
			$this->setXY(121.5,41);
			$this->cell(0,0,"(Official Designation)",0,1);
			$this->setXY(168,41);
			$this->cell(0,0,"(Agency/Office)",0,1);
			$this->setXY(282,41);
			$this->cell(0,0,"(Date of Assumption)",0,1);
			$this->ln();
			$this->setxy(30,50);
			$this->setfont('arial','',9);
			//(w,h,"string");
			//$this->cell(5,5,"id",1,0,'c');
			//$this->setxy(20,50);
			
		}			
		
	}
		
	
	
	$pdf = new PDF('L','mm','Legal');
	$pdf->AddPage();
		
		//header query
		
			
	
	
		//
	
		$pdf->Setfont('arial','B',8.5);
		$pdf->setxy(10,50);
		$pdf->cell(90,11,"Name of Book",1,0,'C');
		$pdf->Cell(27,11,"Source of Fund",1,0,"C");
		$pdf->Cell(27,11,"Book No.",1,0,"C");
		$pdf->Cell(27,11,"Quantity",1,0,"C");
		$pdf->Cell(27,11,"Unit Price",1,0,"C");
		$pdf->Cell(22,11,"Date",1,0,"C");
		$pdf->Cell(37,11,"Balance per card (QTY)",1,0,"C");
		$pdf->Cell(35,11,"ACCUMULATED ",1,0,"C");
		$pdf->ln();
		$pdf->setxy(222.5,59);
		$pdf->cell(0,0,"DEPRECIATION",0,0,"C");
		$pdf->setxy(302.2,50);
		$pdf->Cell(45,11,"REMARKS",1,0,"C");
		$pdf->ln();
		//main query
		$qry = mysql_query("SELECT * FROM bis_book ");
		//$sql = mysql_query('SELECT * FROM bis_books');
				
		while($data = mysql_fetch_assoc($qry))
		{
								
								$pdf->Setfont('arial','',10);
								$bis_book_id=$data['bis_book_id'];
								$pdf->Cell(10,7,"$bis_book_id",1,0,"C");
								
								$bis_book_name=$data['bis_book_name'];
								$pdf->Cell(80,7,"$bis_book_name",1,0,"C");
								
								$bis_book_source=$data['bis_book_source'];
								$pdf->Cell(27,7,"$bis_book_source",1,0,"C");
								
								$bis_book_number=$data['bis_book_number'];
								$pdf->Cell(27,7,"$bis_book_number",1,0,"C");
								
								$bis_book_qty=$data['bis_book_qty'];
								$pdf->Cell(27,7,"$bis_book_qty",1,0,"C");
								
								$pdf->Cell(27,7,"price",1,0,"C");//price
								$pdf->Cell(22,7,"date",1,0,"C");//date
								
								$bis_book_balance=$data['bis_book_balance'];
								$pdf->Cell(37,7,"$bis_book_balance",1,0,"C"); 
								
								$pdf->Cell(35,7,"depreciation",1,0,"C");//depreciation
								
								$pdf->Cell(45,7,"",1,0,"C");//remarks
								
								
								$pdf->ln();
			
		}
		
		
		//
		$pdf->Setfont('arial','',8.5);
		//$pdf->setxy(10,61.1);
		$pdf->cell(10,7,"",1,0,'C');//id
		$pdf->cell(80,7,"",1,0,'C');//name
		$pdf->Cell(27,7,"",1,0,"C");//fund
		$pdf->Cell(27,7,"",1,0,"C");//book no
		$pdf->Cell(27,7,"",1,0,"C");//qty 
		$pdf->Cell(27,7,"",1,0,"C");//price
		$pdf->Cell(22,7,"",1,0,"C");//date
		$pdf->Cell(37,7,"",1,0,"C");//balance
		$pdf->Cell(35,7,"",1,0,"C");//depreciation
		$pdf->Cell(45,7,"",1,0,"C");//remarks
		$pdf->ln();
		//
		$pdf->Setfont('arial','',8.5);
		$pdf->cell(10,7,"",1,0,'C');
		$pdf->cell(80,7,"",1,0,'C');
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(22,7,"",1,0,"C");
		$pdf->Cell(37,7,"",1,0,"C");
		$pdf->Cell(35,7,"",1,0,"C");
		$pdf->Cell(45,7,"",1,0,"C");
		$pdf->ln();
		//
		$pdf->Setfont('arial','',8.5);
		$pdf->cell(10,7,"",1,0,'C');
		$pdf->cell(80,7,"",1,0,'C');
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(22,7,"",1,0,"C");
		$pdf->Cell(37,7,"",1,0,"C");
		$pdf->Cell(35,7,"",1,0,"C");
		$pdf->Cell(45,7,"",1,0,"C");
		$pdf->ln();
		//
		$pdf->Setfont('arial','',8.5);
		$pdf->cell(10,7,"",1,0,'C');
		$pdf->cell(80,7,"",1,0,'C');
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(22,7,"",1,0,"C");
		$pdf->Cell(37,7,"",1,0,"C");
		$pdf->Cell(35,7,"",1,0,"C");
		$pdf->Cell(45,7,"",1,0,"C");
		$pdf->ln();
		//
		$pdf->Setfont('arial','',8.5);
		$pdf->cell(10,7,"",1,0,'C');
		$pdf->cell(80,7,"",1,0,'C');
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(22,7,"",1,0,"C");
		$pdf->Cell(37,7,"",1,0,"C");
		$pdf->Cell(35,7,"",1,0,"C");
		$pdf->Cell(45,7,"",1,0,"C");
		$pdf->ln();
		//
		$pdf->Setfont('arial','',8.5);
		$pdf->cell(10,7,"",1,0,'C');
		$pdf->cell(80,7,"",1,0,'C');
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(22,7,"",1,0,"C");
		$pdf->Cell(37,7,"",1,0,"C");
		$pdf->Cell(35,7,"",1,0,"C");
		$pdf->Cell(45,7,"",1,0,"C");
		$pdf->ln();
		//
		$pdf->Setfont('arial','',8.5);
		$pdf->cell(10,7,"",1,0,'C');
		$pdf->cell(80,7,"",1,0,'C');
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(22,7,"",1,0,"C");
		$pdf->Cell(37,7,"",1,0,"C");
		$pdf->Cell(35,7,"",1,0,"C");
		$pdf->Cell(45,7,"",1,0,"C");
		$pdf->ln();
		//
		$pdf->Setfont('arial','',8.5);
		$pdf->cell(10,7,"",1,0,'C');
		$pdf->cell(80,7,"",1,0,'C');
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(22,7,"",1,0,"C");
		$pdf->Cell(37,7,"",1,0,"C");
		$pdf->Cell(35,7,"",1,0,"C");
		$pdf->Cell(45,7,"",1,0,"C");
		$pdf->ln();
		//
		$pdf->Setfont('arial','',8.5);
		$pdf->cell(10,7,"",1,0,'C');
		$pdf->cell(80,7,"",1,0,'C');
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(22,7,"",1,0,"C");
		$pdf->Cell(37,7,"",1,0,"C");
		$pdf->Cell(35,7,"",1,0,"C");
		$pdf->Cell(45,7,"",1,0,"C");
		$pdf->ln();
		//
		$pdf->Setfont('arial','',8.5);
		$pdf->cell(10,7,"",1,0,'C');
		$pdf->cell(80,7,"",1,0,'C');
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(22,7,"",1,0,"C");
		$pdf->Cell(37,7,"",1,0,"C");
		$pdf->Cell(35,7,"",1,0,"C");
		$pdf->Cell(45,7,"",1,0,"C");
		$pdf->ln();
		//
		$pdf->Setfont('arial','',8.5);
		$pdf->cell(10,7,"",1,0,'C');
		$pdf->cell(80,7,"",1,0,'C');
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(22,7,"",1,0,"C");
		$pdf->Cell(37,7,"",1,0,"C");
		$pdf->Cell(35,7,"",1,0,"C");
		$pdf->Cell(45,7,"",1,0,"C");
		$pdf->ln();
		//
		$pdf->Setfont('arial','',8.5);
		$pdf->cell(10,7,"",1,0,'C');
		$pdf->cell(80,7,"",1,0,'C');
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(22,7,"",1,0,"C");
		$pdf->Cell(37,7,"",1,0,"C");
		$pdf->Cell(35,7,"",1,0,"C");
		$pdf->Cell(45,7,"",1,0,"C");
		$pdf->ln();
		//
		$pdf->Setfont('arial','',8.5);
		$pdf->cell(10,7,"",1,0,'C');
		$pdf->cell(80,7,"",1,0,'C');
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(22,7,"",1,0,"C");
		$pdf->Cell(37,7,"",1,0,"C");
		$pdf->Cell(35,7,"",1,0,"C");
		$pdf->Cell(45,7,"",1,0,"C");
		$pdf->ln();
		//
		$pdf->Setfont('arial','',8.5);
		$pdf->cell(10,7,"",1,0,'C');
		$pdf->cell(80,7,"",1,0,'C');
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(27,7,"",1,0,"C");
		$pdf->Cell(22,7,"",1,0,"C");
		$pdf->Cell(37,7,"",1,0,"C");
		$pdf->Cell(35,7,"",1,0,"C");
		$pdf->Cell(45,7,"",1,0,"C");
		$pdf->ln();
		//
		

		
	
	
	
	$title = 'REPORT ON THE PHYSICAL COUNT OF BOOKS';
	$pdf->SetTitle($title);
	$pdf->Output();



?>