
<?php

require('mc_table.php');

include_once('db_connect.php');
session_start();

$date = (date("F d, Y"));
//query to get MIR

	$id = base64_url_decode($_GET['id']);
	mysqli_query($mysqli, "LOCK TABLES cms_account, scms_medrec, scms_bmi_rec READ");
	$q_getacc = mysqli_query($mysqli, "SELECT * FROM cms_account, scms_medrec
		WHERE cms_account.cms_account_ID='".$id."'
		AND cms_account.cms_account_ID = scms_medrec.cms_account_ID
		ORDER BY medrec_id DESC")
		or die ("Error: ".mysqli_error($mysqli));

        $fetch_bmi = mysqli_query($mysqli, "SELECT scms_bmi_rec.height, scms_bmi_rec.weight, scms_bmi_rec.nutri_status FROM scms_bmi_rec, cms_account WHERE cms_account.cms_account_ID = scms_bmi_rec.cms_account_ID AND scms_bmi_rec.cms_account_ID = '".$id."' ")
        or die ("Error: ".mysqli_error($mysqli));

        $bmi = mysqli_fetch_array($fetch_bmi);
        

	$row =mysqli_fetch_array($q_getacc);
	mysqli_query($mysqli, "UNLOCK TABLES");

    $h = $bmi['height'];
	$w = $bmi['weight'];
    $ns = strtoupper($bmi['nutri_status']);    
	$emer_g = strtoupper($row['emer_contact_name']);
	$emer_c = strtoupper($row['emer_contact_no']);
	$emer_r = strtoupper($row['relationship']);
	$allergies = strtoupper($row['allergies']);
	$eye = strtoupper($row['eyeglass']);
	$ear = strtoupper($row['ear_infection']);
	$eyed = strtoupper($row['eye_cond_desc']);
	$eard = strtoupper($row['ear_cond_desc']);
	

    if(empty($eyed))
    {
        $eyed = "N/A";
    }
    if(empty($eard))
    {
        $eard = "N/A";
    }


	if($row['emp_no'] == NULL)
	{
		mysqli_query($mysqli, "LOCK TABLES sis_student, sis_parent_guardian READ");
		$fetch_a = mysqli_query($mysqli,"SELECT * FROM sis_student WHERE sis_student.lrn = '".$row['lrn']."' ");
		$mr = mysqli_fetch_array($fetch_a);
		
		$fetch_b = mysqli_query($mysqli, "SELECT *, LEFT(sis_f_mname, 1), LEFT(sis_m_mname, 1), LEFT(sis_g_mname, 1) FROM sis_parent_guardian
		WHERE sis_parent_guardian.lrn = '".$mr['lrn']."'");
		$b = mysqli_fetch_array($fetch_b);
        
		
		mysqli_query($mysqli, "UNLOCK TABLES");
		$birthDate = $mr['sis_b_day'];
		//explode the date to get month, day and year
		$birthDate = explode("-", $birthDate);
		//get age from date or birthdate
		$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md")
		? ((date("Y") - $birthDate[0]) - 1)
		: (date("Y") - $birthDate[0]));
		$x = strtoupper($mr['stu_fname']).' ' .strtoupper($mr['stu_lname']);
		$lname = strtoupper($mr['stu_lname']);
		$fname = strtoupper($mr['stu_fname']);
		$mname = strtoupper($mr['stu_mname']);
		$bday = strtoupper($mr['sis_b_day']);
		$gender = strtoupper($mr['sis_gender']);
		
		if($b['sis_f_mname'] != ''){
			$father = strtoupper($b['sis_f_fname']).' '.strtoupper($b['LEFT(sis_f_mname, 1)']).'. '.strtoupper($b['sis_f_lname']);	
		} else {
			$father = strtoupper($b['sis_f_fname']).' '.strtoupper($b['sis_f_lname']);
		}
		
		if($b['sis_m_mname'] != ''){
			$mother = strtoupper($b['sis_m_fname']).' '.strtoupper($b['LEFT(sis_m_mname, 1)']).'. '.strtoupper($b['sis_m_lname']);
		} else {
			$mother = strtoupper($b['sis_m_fname']).' '.strtoupper($b['sis_m_lname']);
		}
		
		if($b['sis_g_mname'] != ''){
			$guardian = strtoupper($b['sis_g_fname']).' '.strtoupper($b['LEFT(sis_g_mname, 1)']).'. '.strtoupper($b['sis_g_lname']);
		} else {
			$guardian = strtoupper($b['sis_g_fname']).' '.strtoupper($b['sis_g_lname']);
		}
		$contact = strtoupper($b['g_contact']);
		$gn = strtoupper($b['guardian_relation']);
	}
	else if($row['lrn'] == NULL)
	{
		mysqli_query($mysqli, "LOCK TABLES pims_personnel, pims_family_background READ");

		$fetch_a = mysqli_query($mysqli,"SELECT * FROM pims_personnel WHERE pims_personnel.emp_No = '".$row['emp_no']."' ");
		$mr = mysqli_fetch_array($fetch_a);
		
		$fetch_b = mysqli_query($mysqli, "SELECT * FROM pims_family_background
		WHERE emp_No = '".$mr['emp_No']."'");
		$b = mysqli_fetch_array($fetch_b);

		mysqli_query($mysqli, "UNLOCK TABLES");
		$birthDate = $mr['pims_birthdate'];
		//explode the date to get month, day and year
		$birthDate = explode("-", $birthDate);
		//get age from date or birthdate
		$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md")
		? ((date("Y") - $birthDate[0]) - 1)
		: (date("Y") - $birthDate[0]));
		
		$x = strtoupper($mr['P_fname']).' ' .strtoupper($mr['P_lname']);		
		$lname = strtoupper($mr['P_lname']);
		$fname = strtoupper($mr['P_fname']);
		$mname = strtoupper($mr['P_mname']);
		$bday = strtoupper($mr['pims_birthdate']);
		$gender = strtoupper($mr['pims_gender']);
		$father = strtoupper($b['father_fname'].' '.$b['father_lname']);
		$mother = strtoupper($b['mother_fname'].' '.$b['mother_lname']);
		$guardian = strtoupper($b['spouse_firstname'].' '.$b['spouse_lastname']);
		$contact = strtoupper($mr['pims_contact_no']);
		$gn = "Spouse";
	}

    
  


$pdf=new PDF_MC_Table('P','mm','LEGAL');
$pdf->AddPage();
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0);
$pdf->SetDrawColor(0,0,0);
$pdf->SetLineWidth(.3);

$pdf->Ln();
    $pdf->SetFont('Times','B', 10);
    $pdf->Cell(0,5,'DEPARTMENT OF EDUCATION',0,0,'C',true);
    $pdf->SetFont('Times','', 10);
	$pdf->Ln();
	$pdf->Cell(0,5,'REGION V(Bicol)',0,0,'C',true);
    $pdf->SetFont('Arial','B', 10);
	$pdf->Ln();
	$pdf->Cell(0,5,'SCHOOLS DIVISION OF LEGAZPI CITY',0,0,'C',true);
	$pdf->SetFont('Times','', 10);
	$pdf->Ln();
	$pdf->Cell(0,5,'PAG-ASA NATIONAL HIGH SCHOOL',0,0,'C',true);
    $pdf->SetFont('Arial','B', 10);
	$pdf->Ln();
	$pdf->Cell(0,5,'Rawis, Legazpi City',0,0,'C',true);
	$pdf->Image('pnhs_logo.png',45,13,23);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

		$pdf->SetFont('Times','B',12);
		$pdf->SetFillColor(180, 180, 180);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(255);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(196.1,7,'MEDICAL FORM',1,1,'C',true);

		$pdf->SetFont('Times','B',10);
		$pdf->SetFillColor(180, 180, 180);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(0);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','I');
$pdf->MultiCell(191,9,"The information on this form will be treated as confidential and will only be shared with school personnel on a need-to-know basis.",0,'C',false);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetFillColor(180, 180, 180);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(0);
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
		$pdf->SetFillColor(180, 180, 180);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(255);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');

$pdf->Cell(196.1,7,'FAMILY INFORMATION',1,1,'C',true);
        $pdf->SetFillColor(210, 210, 210);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(0,0,0);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(0,1,'',0,1,'C',true);

        $pdf->SetFont('Times','B',12);
		$pdf->SetFillColor(220, 220, 220);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(255);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(55.1,5,'Last Name',1,0,'C',true);
$pdf->Cell(55,5,'First Name',1,0,'C',true);
$pdf->Cell(55,5,'Middle Name',1,0,'C',true);
$pdf->Cell(31,5,'Age',1,1,'C',true);

        $pdf->SetFont('Times','',12);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0);
	    $pdf->SetDrawColor(255);
	    $pdf->SetLineWidth(0);
	    $pdf->SetFont('','');
$pdf->Cell(55.1,5,"{$lname}",1,0,'C',true);
$pdf->Cell(55,5,"{$fname}",1,0,'C',true);
$pdf->Cell(55,5,"{$mname}",1,0,'C',true);
$pdf->Cell(31,5,"{$age}",1,1,'C',true);

        $pdf->SetFont('Times','',12);
		$pdf->SetFillColor(210, 210, 210);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(255);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(0,1,'',0,1,'C',true);

		$pdf->SetFillColor(220, 220, 220);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(255);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(46,5,'Gender',1,0,'C',true);
$pdf->Cell(80,5,'Date of Birth',1,0,'C',true);
$pdf->Cell(70,5,'Nationality',1,1,'C',true);
        $pdf->SetFont('Times','',12);
		$pdf->SetFillColor(210, 210, 210);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(255);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(0,1,'',0,1,'C',true);

		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0);
	    $pdf->SetDrawColor(255);
	    $pdf->SetLineWidth(0);
	    $pdf->SetFont('','');
$pdf->Cell(46,5,"{$gender}",1,0,'C',true);
$pdf->Cell(80,5,"{$bday}",1,0,'C',true);
$pdf->Cell(70,5,'FILIPINO',1,1,'C',true);

if($row['emp_no'] == NULL)
{
		$pdf->SetFillColor(220, 220, 220);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(255);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(63,5,'Height',1,0,'C',true);
$pdf->Cell(63,5,'Weight',1,0,'C',true);
$pdf->Cell(70,5,'Nutritional Status',1,1,'C',true);

		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0);
	    $pdf->SetDrawColor(255);
	    $pdf->SetLineWidth(0);
	    $pdf->SetFont('','');
$pdf->Cell(46,5,"{$h}",1,0,'C',true);
$pdf->Cell(80,5,"{$w}",1,0,'C',true);
$pdf->Cell(70,5,"{$ns}",1,1,'C',true);    
    
}
        $pdf->SetFont('Times','',12);
        $pdf->SetFillColor(210, 210, 210);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(255);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(0,1,'',0,1,'C',true);

		$pdf->SetFillColor(220, 220, 220);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(255);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(75,5,'Name of Father',1,0,'C',true);
$pdf->Cell(75,5,'Name of Mother',1,0,'C',true);
$pdf->Cell(46,5,'Contact Number',1,1,'C',true);

        $pdf->SetFont('Times','',12);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0);
	    $pdf->SetDrawColor(255);
	    $pdf->SetLineWidth(0);
	    $pdf->SetFont('','');
$pdf->Cell(75,5,"{$father}",1,0,'C',true);
$pdf->Cell(75,5,"{$mother}",1,0,'C',true);
$pdf->Cell(46,5,"{$contact}",1,1,'C',true);

        $pdf->SetFillColor(210, 210, 210);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(0,0,0);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(0,1,'',0,1,'C',true);

		$pdf->SetFont('Times','B',12);
		$pdf->SetFillColor(180, 180, 180);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(255);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(196.1,7,'FOR EMERGENCY',1,1,'C',true);

        $pdf->SetFillColor(210, 210, 210);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(255);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(0,1,'',0,1,'C',true);

        $pdf->SetFont('Times','',12);
		$pdf->SetFillColor(220, 220, 220);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(255);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(46,5,'Name',1,0,'C',true);
$pdf->Cell(80,5,'Relationship',1,0,'C',true);
$pdf->Cell(70,5,'Contact Number',1,1,'C',true);

        $pdf->SetFont('Times','',12);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0);
	    $pdf->SetDrawColor(255);
	    $pdf->SetLineWidth(0);
	    $pdf->SetFont('','');
$pdf->Cell(46,5,"{$emer_g}",1,0,'C',true);
$pdf->Cell(80,5,"{$emer_r}",1,0,'C',true);
$pdf->Cell(70,5,"{$emer_c	}",1,1,'C',true);

        $pdf->SetFillColor(210, 210, 210);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(255);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(0,1,'',0,1,'C',true);

        $pdf->SetFont('Times','B',12);
		$pdf->SetFillColor(180, 180, 180);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(255);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(196.1,7,'MEDICAL INFORMATION AND HEALTH HISTORY',1,1,'C',true);

        $pdf->SetFillColor(210, 210, 210);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(255);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(0,1,'',0,1,'C',true);

        $pdf->SetFont('Times','',12);
		$pdf->SetFillColor(220, 220, 220);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(255);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(55,5,'Allergies',1,0,'C',true);
        $pdf->SetFont('Times','',12);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0);
	    $pdf->SetDrawColor(255);
	    $pdf->SetLineWidth(0);
	    $pdf->SetFont('','');
$pdf->Cell(141,5,"{$allergies}",1,1,'C',true);

        $pdf->SetFillColor(210, 210, 210);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(255);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(0,1,'',0,1,'C',true);

        $pdf->SetFont('Times','',12);
		$pdf->SetFillColor(220, 220, 220);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(255);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(55,5,'Do you wear eyeglasses?',1,0,'C',true);
        $pdf->SetFont('Times','',12);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0);
	    $pdf->SetDrawColor(255);
	    $pdf->SetLineWidth(0);
	    $pdf->SetFont('','');

        $pdf->SetFont('Times','',12);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0);
	    $pdf->SetDrawColor(255);
	    $pdf->SetLineWidth(0);
	    $pdf->SetFont('','');
$pdf->Cell(20,5,"{$eye}",1,0,'C',true);

        $pdf->SetFont('Times','',12);
		$pdf->SetFillColor(220, 220, 220);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(255);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(40,5,'Description',1,0,'C',true);
        $pdf->SetFont('Times','',12);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0);
	    $pdf->SetDrawColor(255);
	    $pdf->SetLineWidth(0);
	    $pdf->SetFont('','');
$pdf->Cell(81,5,"{$eyed}",1,1,'C',true);

        $pdf->SetFillColor(220, 220, 220);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(255);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(0,1,'',0,1,'C',true);
        $pdf->SetFont('Times','',12);
		$pdf->SetFillColor(220, 220, 220);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(255);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(55,5,'Do you have an ear condition?',1,0,'C',true);
        $pdf->SetFont('Times','',12);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0);
	    $pdf->SetDrawColor(255);
	    $pdf->SetLineWidth(0);
	    $pdf->SetFont('','');

        $pdf->SetFont('Times','',12);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0);
	    $pdf->SetDrawColor(255);
	    $pdf->SetLineWidth(0);
	    $pdf->SetFont('','');
$pdf->Cell(20,5,"{$ear}",1,0,'C',true);

        $pdf->SetFont('Times','',12);
		$pdf->SetFillColor(220, 220, 220);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(255);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(40,5,'Description',1,0,'C',true);
        $pdf->SetFont('Times','',12);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0);
	    $pdf->SetDrawColor(255);
	    $pdf->SetLineWidth(0);
	    $pdf->SetFont('','');
$pdf->Cell(81,5,"{$eard}",1,1,'C',true);
        $pdf->SetFont('Times','B',12);
		$pdf->SetFillColor(180, 180, 180);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(255);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(98.05,7,'ILLNESS HISTORY',1,0,'C',true);
        $pdf->SetFont('Times','B',12);
		$pdf->SetFillColor(180);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(180);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
$pdf->Cell(98.05,7,'IMMUNIZATION RECORD',1,1,'C',true);

	    $pdf->SetFont('Times','B',12);
		$pdf->SetFillColor(180);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(180);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');
//Table with 20 rows and 4 columns
	$pdf->SetWidths(array(75,23.05,75,23.05));
	    $pdf->SetFont('Times','',12);
	mysqli_query($mysqli, "LOCK TABLES scms_immunization, scms_immune_rec_line READ");
	$fetch_immune = mysqli_query($mysqli, "SELECT * FROM scms_immunization")
        or die(mysqli_error($mysqli));

	$immunecount = 0;
	while($immune = mysqli_fetch_array($fetch_immune))
	{
		$_immune = mysqli_query($mysqli, "SELECT * FROM scms_immune_rec_line, scms_immunization
			WHERE medrec_id = '".$row['medrec_id']."' 
			AND scms_immune_rec_line.vaccine_no = scms_immunization.vaccine_no
			AND scms_immune_rec_line.vaccine_no = '".$immune['vaccine_no']."'")
			or die(mysqli_error($mysqli));
		
		$im = mysqli_fetch_array($_immune);
		
		if($immune['vaccine_no'] == $im['vaccine_no'])
		{
			$imname[$immunecount] = "          ".$immune['vaccine_name'];
			$imstat[$immunecount] = "    (/)   ( )";
		}
		else
		{
			$imname[$immunecount] = "          ".$immune['vaccine_name'];
			$imstat[$immunecount] = "    ( )   (x)";
		}
		$immunecount++;
	}
	mysqli_query($mysqli, "UNLOCK TABLES");
	
	mysqli_query($mysqli, "LOCK TABLES scms_illness, scms_illness_hist_line READ");	
	$fetch_ill = mysqli_query($mysqli, "SELECT * FROM scms_illness")
	or die(mysqli_error($mysqli));

	$illcount = 0;
	while($ill = mysqli_fetch_array($fetch_ill))
	{
		$f_illness = mysqli_query($mysqli, "SELECT * FROM scms_illness_hist_line 
			WHERE medrec_id = '".$row['medrec_id']."' 
			AND illness_no = '".$ill['illness_no']."'")
			or die(mysqli_error($mysqli));
		$illness = mysqli_fetch_array($f_illness);
        
		if($illness == NULL)
		{
			$illname[$illcount] = "          ".$ill['illness_name'];
			$illstat[$illcount] = "    ( )   (x)";
		}
		else
		{
			$illname[$illcount] = "          ".$ill['illness_name'];
			$illstat[$illcount] = "    (/)   ( )";
		}
		$illcount++;
	}
	mysqli_query($mysqli, "UNLOCK TABLES");

	
	$count = 0;
	while($count < $immunecount)
	{
		$pdf->Row(array("{$illname[$count]}","{$illstat[$count]}","{$imname[$count]}","{$imstat[$count]}"));
		$count++;
	}
	while($count < $illcount)
	{
		$pdf->Row(array("{$illname[$count]}","{$illstat[$count]}","",""));
		$count++;
	}

		$pdf->SetFont('Times','',12);
		$pdf->SetFillColor(255);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(180);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','');

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
	
$pdf->Multicell(196.1,5,'
                         I verify that all information provided on this form is complete and correct. I acknowledge that it is my responsibilty to inform the Pag-asa National High School authorities of any changes in my health, physical condition and medical needs.
                         ',1,1,'C',true);
$pdf->Ln();
$pdf->Ln();

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(185,7,"Date:  $date",0,1,'R',true);

$filename = 'Medical Record-'.$x.'.pdf';

$pdf->output($filename, "I");
?>