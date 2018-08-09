<?php
require 'fpdf.php';

include_once('db_connect.php');
session_start();
$session = $_SESSION['user_data']['acct']['cms_account_ID'];


//query to get NSR of a class

$section = base64_url_decode($_GET['section']);
					$account = mysqli_query($mysqli, "SELECT *, LEFT(P_mname, 1) FROM cms_account, pims_personnel 
								WHERE cms_account_ID = '".$session."'
								AND cms_account.emp_no = pims_personnel.emp_No");
								
							$acc = mysqli_fetch_array($account);
							
							
							$prep = strtoupper($acc['P_fname'].' '.$acc['P_lname']);

$fetch_sect = mysqli_query($mysqli, "SELECT SECTION_ID, CONCAT(css_section.YEAR_LEVEL,'-',css_section.SECTION_NAME) AS YR_SEC FROM `css_section`
            WHERE SECTION_ID = '".$section."'")
            or die(mysqli_error($mysqli));
$var1="";
while($row=mysqli_fetch_array($fetch_sect))
{
	$var1=strtoupper($row['YR_SEC']);
}

$fetch_section = mysqli_query($mysqli, "SELECT * FROM sis_stu_rec, css_school_yr, css_section 
	WHERE css_school_yr.sy_id = sis_stu_rec.sy_id 
	AND css_section.SECTION_ID = sis_stu_rec.section_id 
	AND sis_stu_rec.section_id = '".$section."' 
	AND status = 'active' 
	GROUP BY css_section.SECTION_ID")
or die(mysqli_error($mysqli));

$section = mysqli_fetch_array($fetch_section);

$pdf=new FPDF('P','mm','LEGAL');
$pdf->AddPage();
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0);
$pdf->SetDrawColor(0,0,0);
$pdf->SetLineWidth(.3);

$pdf->SetFont('Times','B', 12);
$pdf->Cell(0,3,'Department of Education',0,0,'C',true);
$pdf->Ln();
$pdf->Cell(0,5,'DIVISION OF LEGAZPI CITY',0,1,'C',true);
$pdf->SetFont('Times','', 12);
$pdf->Cell(0,7,'NUTRITIONAL STATUS RECORD',0,1,'C',true);
$pdf->Ln();
$pdf->Image('citydiv_logo.png',46,7,21);
$pdf->Image('pnhs_logo.png',150,7,21);
$pdf->SetFont('Arial','',9);
$pdf->Cell(110,3,'Town/City/Province: LEGAZPI',0,0,'L',true);
$pdf->Cell(80,4,'Date of Weighing:  ______________________',0,1,'R',true);
$pdf->Cell(110,3,"Grade/Year and Section: {$var1}",0,0,'L',true);
$pdf->Cell(80,4,'School: PAG-ASA NATIONAL HIGH SCHOOL',0,0,'R',true);
$pdf->Ln();
$pdf->Ln();
		$pdf->SetFont('Arial','B',8);
		$pdf->SetFillColor(255, 255, 255);
	    $pdf->SetTextColor(0);
	    $pdf->SetDrawColor(0,0,0);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');

	    $pdf->Cell(50.1,7,'Name',1,0,'C',true);
	    $pdf->Cell(23,7,'Birthday',1,0,'C',true);
	    $pdf->Cell(17,7,'Weight(kg)',1,0,'C',true);
	    $pdf->Cell(17,7,'Height(m)',1,0,'C',true);
	    $pdf->Cell(12.7,7,'Sex',1,0,'C',true);
	    $pdf->Cell(10,7,'Age',1,0,'C',true);
        $pdf->Cell(26,7,'Body Mass Index',1,0,'C',true);
	    $pdf->Cell(35,7,'Nutritional Status',1,0,'C',true);
$pdf->Ln();
        $pdf->SetFont('Arial','',10);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0);
	    $pdf->SetDrawColor(0,0,0);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','');

		$fetch_all = mysqli_query($mysqli, "SELECT *, DATE_FORMAT(sis_b_day, '%b %e, %Y') as sis_day FROM sis_student, cms_account, scms_bmi_rec, sis_stu_rec
											WHERE sis_student.lrn = cms_account.lrn
											AND cms_account.cms_account_ID = scms_bmi_rec.cms_account_ID
											AND sis_student.lrn = sis_stu_rec.lrn
											AND section_id = '".$section['section_id']."'
											AND sy_id = '".$section['sy_id']."'")
											or die(mysqli_error($mysqli));
		$countall = 1;
		while($all = mysqli_fetch_array($fetch_all) )
										{
											
		//date in mm/dd/yyyy format; or it can be in other formats as well
		$birthDate = $all['sis_b_day'];
		//explode the date to get month, day and year
		$birthDate = explode("-", $birthDate);
        //get age from date or birthdate
        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md")
		? ((date("Y") - $birthDate[0]) - 1)
		: (date("Y") - $birthDate[0]));
											  
        $n = $countall.'. '.strtoupper($all['stu_lname'].', '.$all['stu_fname']);
        $h = $all['height']/100;
        
        $pdf->Cell(50.1,7,"{$n}",1,0,'L',true);
	    $pdf->Cell(23,7,"{$all['sis_day']}",1,0,'C',true);
	    $pdf->Cell(17,7,"{$all['weight']}",1,0,'C',true);
	    $pdf->Cell(17,7,"{$h}",1,0,'C',true);
	    $pdf->Cell(12.7,7,"{$all['sis_gender']}",1,0,'C',true);
	    $pdf->Cell(10,7,"{$age}",1,0,'C',true);
        $pdf->Cell(26,7,"{$all['bmi']}",1,0,'C',true);
	    $pdf->Cell(35,7,"{$all['nutri_status']}",1,0,'C',true);
        $pdf->Ln();
        $countall++;

}

$pdf->Cell(110,5,'Body Mass Index = weight (in kilograms) / height2 (in meters)',0,1,'L',true);
$pdf->Ln(); 
$pdf->Ln(); 
 //summary
            
        $pdf->SetFont('Arial','B',8);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');            
$pdf->Cell(25);
	    $pdf->Cell(25,7,'',1,0,'C',true);
        $pdf->Cell(10,7,'M',1,0,'C',true);
        $pdf->Cell(10,7,'F',1,0,'C',true); 
        $pdf->Cell(10,7,'Total',1,0,'C',true);

$pdf->Ln();            
        $pdf->SetFont('Arial','B',8);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');

    $fetch_cases = mysqli_query($mysqli, "SELECT COUNT(CASE WHEN sis_student.sis_gender='Male' THEN 1 END) As Male, 
                                        COUNT(CASE WHEN sis_student.sis_gender='Female' THEN 1 END) As Female, COUNT(scms_bmi_rec.bmi_no) AS Total, CONCAT(css_section.year_level,'-',css_section.section_name) AS YR_SEC FROM scms_bmi_rec, cms_account, sis_student, sis_stu_rec, css_section WHERE cms_account.cms_account_ID = scms_bmi_rec.cms_account_ID AND cms_account.lrn = sis_student.lrn AND sis_student.lrn = sis_stu_rec.lrn AND sis_stu_rec.section_id = css_section.SECTION_ID AND css_section.SECTION_ID = '".$section['section_id']."'")
                                        or die(mysqli_error($mysqli)); 
$county = 0;
		while($cases = mysqli_fetch_array($fetch_cases))
										{
  $pdf->Cell(25);
	    $pdf->Cell(25,7,'No. of Cases',1,0,'C',true);
        $pdf->Cell(10,7,"{$cases['Male']}",1,0,'C',true);
        $pdf->Cell(10,7,"{$cases['Female']}",1,0,'C',true); 
        $pdf->Cell(10,7,"{$cases['Total']}",1,0,'C',true);
        $pdf->Ln();
            
        $county++;

}



        $pdf->SetFont('Arial','B',8);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0);
	    $pdf->SetDrawColor(0,0,0);
	    $pdf->SetLineWidth(.3);
	    $pdf->SetFont('','B');      

    $fetch_status = mysqli_query($mysqli, "SELECT scms_bmi_rec.nutri_status, 
                                            COUNT(CASE WHEN sis_student.sis_gender='Male' THEN 1 END) As Male, COUNT(CASE WHEN sis_student.sis_gender='Female' THEN 1 END) As Female, COUNT(scms_bmi_rec.bmi_no) AS Total, CONCAT(css_section.year_level,'-',css_section.section_name) AS YR_SEC FROM scms_bmi_rec, cms_account, sis_student, sis_stu_rec, css_section WHERE cms_account.cms_account_ID = scms_bmi_rec.cms_account_ID AND cms_account.lrn = sis_student.lrn AND sis_student.lrn = sis_stu_rec.lrn AND sis_stu_rec.section_id = css_section.SECTION_ID AND css_section.SECTION_ID = '".$section['section_id']."' 
                                            GROUP BY scms_bmi_rec.nutri_status")
                                            or die(mysqli_error($mysqli));

                                            $wasted = '';
                                            $sevwasted = '';
                                            $normal = '';
                                            $oweight = '';
                                            $obese = '';

        while($st = mysqli_fetch_array($fetch_status))
									{
										if($st['nutri_status'] == 'Severely Wasted')
										{
                                            $pdf->Cell(25);
											$sevwasted = $st['Total'];
                                            $pdf->Cell(25,7,"{$st['nutri_status']}",1,0,'C',true);
                                            $pdf->Cell(10,7,"{$st['Male']}",1,0,'C',true);
                                            $pdf->Cell(10,7,"{$st['Female']}",1,0,'C',true);
                                            $pdf->Cell(10,7,"{$st['Total']}",1,0,'C',true);
                                            $pdf->Ln();
										}
										else if($st['nutri_status'] == 'Wasted')
										{
                                            $pdf->Cell(25);
											$wasted = $st['Total'];
                                            $pdf->Cell(25,7,"{$st['nutri_status']}",1,0,'C',true);
                                            $pdf->Cell(10,7,"{$st['Male']}",1,0,'C',true);
                                            $pdf->Cell(10,7,"{$st['Female']}",1,0,'C',true);
                                            $pdf->Cell(10,7,"{$st['Total']}",1,0,'C',true);                                          
                                            $pdf->Ln();
										}
										else if($st['nutri_status'] == 'Normal')
										{
                                            $pdf->Cell(25);
											$normal = $st['Total'];
                                            $pdf->Cell(25,7,"{$st['nutri_status']}",1,0,'C',true);
                                            $pdf->Cell(10,7,"{$st['Male']}",1,0,'C',true);
                                            $pdf->Cell(10,7,"{$st['Female']}",1,0,'C',true);
                                            $pdf->Cell(10,7,"{$st['Total']}",1,0,'C',true);
                                            $pdf->Ln();
										}
										else if($st['nutri_status'] == 'Overweight')
										{
                                            $pdf->Cell(25);
											$oweight = $st['Total'];
                                            $pdf->Cell(25,7,"{$st['nutri_status']}",1,0,'C',true);
                                            $pdf->Cell(10,7,"{$st['Male']}",1,0,'C',true);
                                            $pdf->Cell(10,7,"{$st['Female']}",1,0,'C',true);
                                            $pdf->Cell(10,7,"{$st['Total']}",1,0,'C',true);
                                            $pdf->Ln();
                                        }
										else if($st['nutri_status'] == 'Obese')
										{
                                            $pdf->Cell(25);
											$obese = $st['Total'];
                                            $pdf->Cell(25,7,"{$st['nutri_status']}",1,0,'C',true);
                                            $pdf->Cell(10,7,"{$st['Male']}",1,0,'C',true);
                                            $pdf->Cell(10,7,"{$st['Female']}",1,0,'C',true);
                                            $pdf->Cell(10,7,"{$st['Total']}",1,0,'C',true);
                                            $pdf->Ln();
										}
                                    }
                                        if($sevwasted == '')
										{
                                            $pdf->Cell(25);
                                            $pdf->Cell(25,7,'Severely Wasted',1,0,'C',true);
                                            $pdf->Cell(10,7,'0',1,0,'C',true);
                                            $pdf->Cell(10,7,'0',1,0,'C',true);
                                            $pdf->Cell(10,7,'0',1,0,'C',true);
                                            $pdf->Ln();
										}
										if($wasted == '')
										{
                                            $pdf->Cell(25);
                                            $pdf->Cell(25,7,'Wasted',1,0,'C',true);
                                            $pdf->Cell(10,7,'0',1,0,'C',true);
                                            $pdf->Cell(10,7,'0',1,0,'C',true);
                                            $pdf->Cell(10,7,'0',1,0,'C',true);
                                            $pdf->Ln();
										}
										if($normal == '')
										{
                                            $pdf->Cell(25);
                                            $pdf->Cell(25,7,'Normal',1,0,'C',true);
                                            $pdf->Cell(10,7,'0',1,0,'C',true);
                                            $pdf->Cell(10,7,'0',1,0,'C',true);
                                            $pdf->Cell(10,7,'0',1,0,'C',true);
                                            $pdf->Ln();
										}
										if($oweight == '')
										{
                                            $pdf->Cell(25);
                                            $pdf->Cell(25,7,'Overweight',1,0,'C',true);
                                            $pdf->Cell(10,7,'0',1,0,'C',true);
                                            $pdf->Cell(10,7,'0',1,0,'C',true);
                                            $pdf->Cell(10,7,'0',1,0,'C',true);
                                            $pdf->Ln();
										}
										if($obese == '')
										{
                                            $pdf->Cell(25);
                                            $pdf->Cell(25,7,'Obese',1,0,'C',true);
                                            $pdf->Cell(10,7,'0',1,0,'C',true);
                                            $pdf->Cell(10,7,'0',1,0,'C',true);
                                            $pdf->Cell(10,7,'0',1,0,'C',true);
                                            $pdf->Ln();
										}
$pdf->Ln(); 
$pdf->SetFont('Arial','',10);                               
$pdf->Cell(135,5,'Prepared by: ',0,1,'R',true);
$pdf->SetFont('Arial','U',10);
$pdf->Cell(175,5,"   {$prep}   ",0,1,'R',true);

$filename = 'Nutritional Status Record - '.$var1.'.pdf';

$pdf->output($filename, "I");
?>