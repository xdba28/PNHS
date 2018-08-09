<?php
include('../connection1.php');
 include('../sanitise.php');

		$lastmonthdate = date('MY', strtotime('-1 months'));
	    $filename =  'PayrollSlip'.$lastmonthdate.'.pdf';
		$check=mysql_query("select * from prs_save_report   where prs_save_report.filename='$filename';");
		$checkrows=mysql_num_rows($check);

	if($checkrows>0) {	
		
		$filelocation = "./payrollreport";
		$fileNL = $filelocation."/".$filename;
		
		$path = $fileNL;

	header('Content-Type: application/pdf');
	header('Content-Disposition: inline; filename='.$path);
	header('Content-Transfer-Encoding: binary');
	header('Accept-Ranges: bytes');
	readfile($path);
					} else{
						
		$prevyear = date('Y', strtotime('-1 months'));
		$prevmonth = date('m', strtotime('-1 months'));
		$lastmonthdates = date('MY', strtotime('-1 months'));
					
   	
        $qry = mysql_query("SELECT * FROM pims_personnel, prs_report , prs_salary_record, prs_grade, prs_salary, pims_employment_records, pims_job_title, prs_allowance
										WHERE	month(prs_report.date_issued) = '$prevmonth' 
										AND year(prs_report.date_issued) = '$prevyear' 
										AND pims_personnel.emp_No=prs_report.emp_No
                                        AND pims_personnel.emp_No=pims_employment_records.emp_No
                                        AND pims_job_title.job_title_code=pims_employment_records.job_title_code
                                        AND pims_personnel.emp_No=prs_salary_record.emp_No
                                        AND prs_grade.grade_id=prs_salary_record.grade_id
                                        AND prs_salary.salary_id=prs_salary_record.salary_id
                                        AND prs_salary.salary_id=prs_salary_record.salary_id order by pims_personnel.P_lname asc");
										
		while($row=mysql_fetch_assoc($qry))
										{       
											set_time_limit(0);
											$allowance = $row['allowance'];
											$allowance = number_format($allowance);
											$emp_No = $row['emp_No'];
											$fname = $row['P_fname'];
											$mname = $row['P_mname'];
											$lname = $row['P_lname'];
											$extension = $row['P_extension_name'];
											$title_code = $row['job_title_code'];
											$job_name = $row['job_title_name'];
											$date_joined = $row['date_joined'];
											$step = $row['step'];
											$grade = $row['grade'];
											$basicpay = $row['rep_basic_pay'];
											$basicpay = number_format($basicpay,2);
											$netpay = $row['rep_net_pay'];
											$netpay = number_format($netpay,2);
											$grosspay = $row['rep_gross_pay'];
											$grosspay = number_format($grosspay,2);
											$today = date("F Y", strtotime($row['date_issued']));
											
											$total_ph = $row['total_ph'];
											$total_ph = number_format($total_ph,2);
											$total_pi = $row['rep_pi_total'];
											$total_pi = number_format($total_pi,2);
											$total_tax = $row['total_tax'];
											$total_tax = number_format($total_tax,2);
											$total_gsis = $row['total_gsis'];
											$total_gsis = number_format($total_gsis,2);
											$absent_cost = $row['absent_cost'];
											$absent_cost = number_format($absent_cost,2);
											$total_deduction = $row['total_deduction'];
											$total_deduction = number_format($total_deduction,2);
											$school_id = $row['school_ID'];
											$absent_cost = $row['absent_cost'];
											$absent_cost = number_format($absent_cost,2);
											$datepayrollshow = date('F d, Y', strtotime('-1 months'));
	   
	  $output .= ' 

    
   
										   
 <i style="border-top-style: dotted;"> </i>  

 
<table  cellpadding="0" cellspacing="0" nobr="true">

<tbody>

<tr>
<td  border="0"></td>
<td colspan="2" border="0" style="font-size:12px;" align="center"><h3>PAYROLL SLIP</h3></td>
<td border="0" align="right"><font size="8"> Date Issued: '.$datepayrollshow.'</font></td>
</tr>


<tr>
<td colspan="4" style="font-size:12px; border-color: black;
    border-top-style: dotted;
    border-bottom-style: dotted; " align="center"><h3><b>For the Month of '.$today.'</b></h3></td>
</tr>
<tr><td>&nbsp; </td></tr>

<tr>
<td colspan="2">&nbsp;Name: '.$lname.' , '.$fname.'  '.$mname.' '.$extension.'</td>
<td>&nbsp;</td>
<td colspan="2">&nbsp;Basic Salary: '.$basicpay.'</td>
</tr>
<tr>
<td colspan="2">&nbsp;Employee No.: '.$school_id.'</td>
<td>&nbsp;</td>
<td colspan="2">&nbsp;P.E.R.A.: '.$allowance.'</td>
</tr>
<tr>
<td colspan="2">&nbsp;Position: '.$title_code.' '.$job_name.'</td>
<td>&nbsp;</td>
<td colspan="2">&nbsp;Gross Compensation: '.$grosspay.'</td>
</tr>
<tr>
<td>&nbsp;Grade: '.$grade.'</td>
<td>&nbsp;Step: '.$step.'</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>


<tr>
<td>&nbsp;</td>
</tr>

<tr>
<td colspan="4" style="font-size:12px; border-color: black;
    border-top-style: dotted;
    border-bottom-style: dotted;  " align="center"><h3>DEDUCTIONS</h3></td>
</tr>

<tr>
<td>&nbsp;</td>
</tr>

<tr>
<th align="center">&nbsp;Deduction&nbsp;</th>
<th align="center">&nbsp;Effectivity&nbsp;Date&nbsp;</th>
<th align="center">&nbsp;Termination&nbsp;Date&nbsp;</th>
<th align="center">&nbsp;Amount&nbsp;Of&nbsp;Deduction&nbsp;</th>
</tr>
<tr>
<td>&nbsp;</td>
</tr>

<tr>
<td>Absence Eduction</td>
<td align="center"><center>-- ----</center></td>
<td align="center"><center>-- ----</center></td>
<td align="right"><center>'.$row["absent_cost"].'</center></td>
</tr>


<tr>
<td>GSIS PERSONNAL SHARE</td>
<td align="center"><center>-- ----</center></td>
<td align="center"><center>-- ----</center></td>
<td align="right"><center>'.$row["total_gsis"].'</center></td>
</tr>

<tr>
<td>MEDICARE(PHILHEALTH)</td>
<td align="center"><center>-- ----</center></td>
<td align="center"><center>-- ----</center></td>
<td align="right"><center>'.$total_ph.'</center></td>
</tr>

<tr>
<td>PAGIBIG FUND</td>
<td align="center"><center>-- ----</center></td>
<td align="center"><center>-- ----</center></td>
<td align="right"><center>'.$total_pi.'</center></td>
</tr>

<tr>
<td>BIR WITHHOLDING TAX</td>
<td align="center"><center>-- ----</center></td>
<td align="center"><center>-- ----</center></td>
<td align="right"><center>'.$total_tax.'</center></td>
</tr>
';

 
 $loancheck = mysql_query("SELECT * FROM pims_personnel, prs_loan_pay
								WHERE pims_personnel.emp_No= '$emp_No'
								AND   pims_personnel.emp_No=prs_loan_pay.emp_No
								AND   month(prs_loan_pay.pay_date) = '$prevmonth'
								AND   year(prs_loan_pay.pay_date) = '$prevyear'
								;");
								
while($row1=mysql_fetch_assoc($loancheck))
										{       									

											$loan_name = $row1["pay_loan_name"];
											$date_start = $row1["date_start"];
											$date_start1 = date("m-Y", strtotime($date_start));
											$date_end = $row1["date_end"];
											$date_end1 = date("m-Y", strtotime($date_end));
											$amount_pay = $row1["pay_loan_amount"];
											$amount_pay = number_format($amount_pay,2);
											
 $output .='
<tr>
<td> '.$loan_name.'</td>
<td align="center"><center>'.$date_start1.'</center></td>
<td align="center"><center>'.$date_end1.'</center></td>
<td align="right"><center>'.$amount_pay.'</center></td>
</tr>
';										 }

	$output .='									
<tr>
<td>&nbsp;Total&nbsp;Deduction:</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td align="right"><center>'.$total_deduction.'</center></td>
</tr>
<tr>
<td>&nbsp;Net&nbsp;Pay&nbsp;&nbsp;:</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td align="right"><center>'.$netpay.'</center></td>
</tr>

</tbody>

</table>

<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
	  ';  
 
   }  
 


  
	  
	  require_once('tcpdf/tcpdf.php');   

if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $obj_pdf->setLanguageArray($l);
}

       
	   

			
      $obj_pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      //$obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      //$obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins('4', '5', '4');  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(true,0);  
      $obj_pdf->SetFont('helvetica', '', 9);  
       
      
	  $content = ''; 
	  $content .= $output;  
    
	$obj_pdf->SetAutoPageBreak(true, 5);
	$obj_pdf->AddPage(L, A5); 
	
      $obj_pdf->writeHTML($content, true, false, false, false, '');  
      ob_end_clean();
	  
	  
	  $filenames =  'PayrollSlip'.$lastmonthdates.'.pdf';
	  	  
	  $filelocation = "C:/xampp/htdocs/PNHS/modules/PRS/Admin/payrollreport";
	  $fileNL = $filelocation."/".$filenames;

      
	  $obj_pdf->Output($filename, 'I'); 
      
	  $save1 = "payrollreport";
	  $save2 = $save1."/".$filename;
	
	  $obj_pdf->Output($fileNL,'F');
	  
      $query = mysql_query("INSERT prs_save_report(filename, file_location, type ) values('$filename','$save2', 'Slip')");
	  
					}


						?>		 
									