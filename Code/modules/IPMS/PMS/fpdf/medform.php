<?php

require('mc_table.php');

include_once('db_connect.php');
session_start();


//query to get MIR

	$id = $_GET['id'];

	$q_getacc = mysqli_query($connect, "SELECT * FROM cms_account 
		WHERE cms_account_ID='".$id."'")
		or die ("Error: ".mysqli_error($connect));

	$row =mysqli_fetch_array($q_getacc);
	
	if($row['emp_no'] == NULL)
	{
		$fetch_a = mysqli_query($connect,"SELECT * FROM scms_consultation, scms_medrec, sis_student WHERE sis_student.lrn = '".$row['lrn']."' ");
		$mr = mysqli_fetch_array($fetch_a);

		$birthDate = $mr['sis_b_day'];
		//explode the date to get month, day and year
		$birthDate = explode("-", $birthDate);
		//get age from date or birthdate
		$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md")
		? ((date("Y") - $birthDate[0]) - 1)
		: (date("Y") - $birthDate[0]));
		
		$lname = $mr['stu_lname'];
		$fname = $mr['stu_fname'];
		$mname = $mr['stu_mname'];
		$bday = $mr['sis_b_day'];
		$gender = $mr['sis_gender'];
	}
	else if($row['lrn'] == NULL)
	{
		$fetch_a = mysqli_query($connect,"SELECT * FROM scms_consultation, scms_medrec, pims_personnel WHERE pims_personnel.emp_No = '".$row['emp_no']."' ");
		$mr = mysqli_fetch_array($fetch_a);

		$birthDate = $mr['pims_birthdate'];
		//explode the date to get month, day and year
		$birthDate = explode("-", $birthDate);
		//get age from date or birthdate
		$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md")
		? ((date("Y") - $birthDate[0]) - 1)
		: (date("Y") - $birthDate[0]));
		
		$lname = $mr['P_lname'];
		$fname = $mr['P_fname'];
		$mname = $mr['P_mname'];
		$bday = $mr['pims_birthdate'];
		$gender = $mr['pims_gender'];
	}

    
  


$pdf=new PDF_MC_Table('P','mm','LEGAL');
$pdf->AddPage();
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0);
$pdf->SetDrawColor(0,0,0);
$pdf->SetLineWidth(.3);

    $pdf->SetFont('Times','B', 10);
    $pdf->Cell(0,3,'DEPARTMENT OF EDUCATION',0,0,'C',true);
    $pdf->SetFont('Times','', 10);
	$pdf->Ln();
	$pdf->Cell(0,4,'REGION V(Bicol)',0,0,'C',true);
    $pdf->SetFont('Arial','B', 10);
	$pdf->Ln();
	$pdf->Cell(0,4,'SCHOOLS DIVISION OF LEGAZPI CITY',0,0,'C',true);
	$pdf->SetFont('Times','', 10);
	$pdf->Ln();
	$pdf->Cell(0,4,'PAG-ASA NATIONAL HIGH SCHOOL',0,0,'C',true);
    $pdf->SetFont('Arial','B', 10);
	$pdf->Ln();
	$pdf->Cell(0,4,'Rawis, Legazpi City',0,0,'C',true);
	$pdf->Image('pnhs_logo.png',45,13,23);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
		$pdf->SetFont('Times','B',12);
		$pdf->SetFillColor(0, 10, 80);
	    $pdf->SetTextColor(255);
	    $pdf->SetDrawColor(0, 10, 80);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(196.1,7,'MEDICAL FORM',1,1,'C',true);

		$pdf->SetFont('Times','B',12);
		$pdf->SetFillColor(0, 10, 80);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(255,255,255);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','I');
$pdf->MultiCell(191,7,"The information on this form will be treated as confidential and will only \n be shared with school personnel on a need-to-know basis.",0,'C',false);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetFillColor(0, 10, 80);
	    $pdf->SetTextColor(255);
	    $pdf->SetDrawColor(0, 10, 80);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','');
$pdf->Cell(196.1,7,'FOR OFFICIAL USE',0,1,'C',true);
        $pdf->SetFillColor(210, 210, 210);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(0,0,0);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(0,1,'',0,1,'C',true);
		$pdf->SetFont('Times','B',12);
		$pdf->SetFillColor(0, 10, 80);
	    $pdf->SetTextColor(255);
	    $pdf->SetDrawColor(0, 10, 80);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');

$pdf->Cell(196.1,7,'STUDENT AND FAMILY INFORMATION',1,1,'C',true);
        $pdf->SetFillColor(210, 210, 210);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(0,0,0);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(0,1,'',0,1,'C',true);

        $pdf->SetFont('Times','B',12);
		$pdf->SetFillColor(155, 200, 230);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(155, 200, 230);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(55.1,5,'Last Name',1,0,'C',true);
$pdf->Cell(55,5,'First Name',1,0,'C',true);
$pdf->Cell(55,5,'Middle Name',1,0,'C',true);
$pdf->Cell(31,5,'Age',1,1,'C',true);

        $pdf->SetFont('Times','',12);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0);
	    $pdf->SetDrawColor(155, 200, 230);
	    $pdf->SetLineWidth(0);
	    $pdf->SetFont('','');
$pdf->Cell(55.1,5,"{$lname}",1,0,'C',true);
$pdf->Cell(55,5,"{$fname}",1,0,'C',true);
$pdf->Cell(55,5,"{$mname}",1,0,'C',true);
$pdf->Cell(31,5,"{$age}",1,1,'C',true);

        $pdf->SetFont('Times','',12);
		$pdf->SetFillColor(210, 210, 210);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(0,0,0);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(0,1,'',0,1,'C',true);

        $pdf->SetFont('Times','',12);
		$pdf->SetFillColor(155, 200, 230);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(155, 200, 230);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(46,5,'Gender',1,0,'C',true);
$pdf->Cell(80,5,'Date of Birth',1,0,'C',true);
$pdf->Cell(70,5,'Nationality',1,1,'C',true);

        $pdf->SetFont('Times','',12);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0);
	    $pdf->SetDrawColor(155, 200, 230);
	    $pdf->SetLineWidth(0);
	    $pdf->SetFont('','');
$pdf->Cell(46,5,"{$gender}",1,0,'C',true);
$pdf->Cell(80,5,"{$bday}",1,0,'C',true);
$pdf->Cell(70,5,'FILIPINO',1,1,'C',true);

        $pdf->SetFillColor(210, 210, 210);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(0,0,0);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(0,1,'',0,1,'C',true);

		$pdf->SetFillColor(155, 200, 230);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(155, 200, 230);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(50,5,'Name of Father',1,0,'C',true);
$pdf->Cell(50,5,'Name of Mother',1,0,'C',true);
$pdf->Cell(50,5,'Name of Guardian',1,0,'C',true);
$pdf->Cell(46,5,'Contact Number',1,1,'C',true);

        $pdf->SetFont('Times','',12);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0);
	    $pdf->SetDrawColor(155, 200, 230);
	    $pdf->SetLineWidth(0);
	    $pdf->SetFont('','');
$pdf->Cell(50,5,'OSCAR TORRE',1,0,'C',true);
$pdf->Cell(50,5,'ZENAIDA TORRE',1,0,'C',true);
$pdf->Cell(50,5,' ',1,0,'C',true);
$pdf->Cell(46,5,'09125894921',1,1,'C',true);

        $pdf->SetFillColor(210, 210, 210);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(0,0,0);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(0,1,'',0,1,'C',true);

		$pdf->SetFont('Times','B',12);
		$pdf->SetFillColor(0, 10, 80);
	    $pdf->SetTextColor(255);
	    $pdf->SetDrawColor(0, 10, 80);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(196.1,7,'FOR EMERGENCY',1,1,'C',true);

        $pdf->SetFillColor(210, 210, 210);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(0,0,0);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(0,1,'',0,1,'C',true);

        $pdf->SetFont('Times','',12);
		$pdf->SetFillColor(155, 200, 230);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(155, 200, 230);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(46,5,'Name',1,0,'C',true);
$pdf->Cell(80,5,'Relationship',1,0,'C',true);
$pdf->Cell(70,5,'Contact Number',1,1,'C',true);

        $pdf->SetFont('Times','',12);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0);
	    $pdf->SetDrawColor(155, 200, 230);
	    $pdf->SetLineWidth(0);
	    $pdf->SetFont('','');
$pdf->Cell(46,5,'LEE JONG SUK',1,0,'C',true);
$pdf->Cell(80,5,'BOYFRIEND',1,0,'C',true);
$pdf->Cell(70,5,'09953458954',1,1,'C',true);

        $pdf->SetFillColor(210, 210, 210);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(0,0,0);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(0,1,'',0,1,'C',true);

        $pdf->SetFont('Times','B',12);
		$pdf->SetFillColor(0, 10, 80);
	    $pdf->SetTextColor(255);
	    $pdf->SetDrawColor(0, 10, 80);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(196.1,7,'MEDICAL INFORMATION AND HEALTH HISTORY',1,1,'C',true);

        $pdf->SetFillColor(210, 210, 210);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(0,0,0);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(0,1,'',0,1,'C',true);

        $pdf->SetFont('Times','',12);
		$pdf->SetFillColor(155, 200, 230);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(155, 200, 230);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(55,5,'Allergies',1,0,'C',true);
        $pdf->SetFont('Times','',12);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0);
	    $pdf->SetDrawColor(155, 200, 230);
	    $pdf->SetLineWidth(0);
	    $pdf->SetFont('','');
$pdf->Cell(141,5,"{$mr['allergies']}",1,1,'C',true);

        $pdf->SetFillColor(210, 210, 210);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(0,0,0);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(0,1,'',0,1,'C',true);

        $pdf->SetFont('Times','',12);
		$pdf->SetFillColor(155, 200, 230);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(155, 200, 230);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(55,5,'Do you wear eyeglasses?',1,0,'C',true);
        $pdf->SetFont('Times','',12);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0);
	    $pdf->SetDrawColor(155, 200, 230);
	    $pdf->SetLineWidth(0);
	    $pdf->SetFont('','');

        $pdf->SetFont('Times','',12);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0);
	    $pdf->SetDrawColor(155, 200, 230);
	    $pdf->SetLineWidth(0);
	    $pdf->SetFont('','');
$pdf->Cell(20,5,'YES',1,0,'C',true);

        $pdf->SetFont('Times','',12);
		$pdf->SetFillColor(155, 200, 230);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(155, 200, 230);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(40,5,'Description',1,0,'C',true);
        $pdf->SetFont('Times','',12);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0);
	    $pdf->SetDrawColor(155, 200, 230);
	    $pdf->SetLineWidth(0);
	    $pdf->SetFont('','');
$pdf->Cell(81,5,'NEARSIGHTEDNESS',1,1,'C',true);

        $pdf->SetFillColor(210, 210, 210);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(0,0,0);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(0,1,'',0,1,'C',true);
        $pdf->SetFont('Times','',12);
		$pdf->SetFillColor(155, 200, 230);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(155, 200, 230);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(55,5,'Do you have an ear condition?',1,0,'C',true);
        $pdf->SetFont('Times','',12);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0);
	    $pdf->SetDrawColor(155, 200, 230);
	    $pdf->SetLineWidth(0);
	    $pdf->SetFont('','');

        $pdf->SetFont('Times','',12);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0);
	    $pdf->SetDrawColor(155, 200, 230);
	    $pdf->SetLineWidth(0);
	    $pdf->SetFont('','');
$pdf->Cell(20,5,'YES',1,0,'C',true);

        $pdf->SetFont('Times','',12);
		$pdf->SetFillColor(155, 200, 230);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(155, 200, 230);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(40,5,'Description',1,0,'C',true);
        $pdf->SetFont('Times','',12);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0);
	    $pdf->SetDrawColor(155, 200, 230);
	    $pdf->SetLineWidth(0);
	    $pdf->SetFont('','');
$pdf->Cell(81,5,'MIDDLE EAR INFECTION',1,1,'C',true);
        $pdf->SetFont('Times','B',12);
		$pdf->SetFillColor(0, 10, 80);
	    $pdf->SetTextColor(255);
	    $pdf->SetDrawColor(0, 10, 80);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(98.05,7,'ILLNESS HISTORY',1,0,'C',true);
        $pdf->SetFont('Times','B',12);
		$pdf->SetFillColor(0, 10, 80);
	    $pdf->SetTextColor(255);
	    $pdf->SetDrawColor(0, 10, 80);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(98.05,7,'IMMUNIZATION RECORD',1,1,'C',true);

	    $pdf->SetFont('Times','B',12);
		$pdf->SetFillColor(255, 255, 255);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(0, 0, 0);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
//Table with 20 rows and 4 columns
	$pdf->SetWidths(array(60,38.05,60,38.05));

	
	$pdf->Row(array("DIABETES","YES","DPT/DT","SPA"));

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
	$pdf->SetWidths(array(196.2));
	$pdf->Row(array("I verify that all information provided on this form is complete and correct. \n I acknowledge that it is my responsibility to inform the Pag-asa National High School authorities of any changes in the student's health, physical condition and medical needs."));
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('','U',12);
$pdf->Cell(50,5,'       ZENICA B. TORRE        ',0,0,'L',true);
$pdf->SetFont('','B',12);
$pdf->Cell(100,5,'Date ',0,0,'R',true);
$pdf->SetFont('','U',12);
$pdf->Cell(0,5,'     October 15, 2017    ',0,1,'R',true);
$pdf->SetFont('','I',10);
$pdf->Cell(50,5,'     Signature over printed name',0,1,'L',true);

$pdf->output();
?>