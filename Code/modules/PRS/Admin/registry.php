<?php	
include('../connection1.php');
 include('../sanitise.php');
		$date = date_default_timezone_set('Asia/Manila');
		$date = date('MY');
		$filenames =  'PayrollRegistry'.$date.'.pdf';
		$check=mysql_query("select * from prs_save_report   where prs_save_report.filename='$filenames';");
		$checkrows=mysql_num_rows($check);

	if($checkrows>0) {	
		
		$filelocations = "./payrollreport";
		$fileNL = $filelocations."/".$filenames;
		
		$path = $fileNL;

	header('Content-Type: application/pdf');
	header('Content-Disposition: inline; filename='.$path);
	header('Content-Transfer-Encoding: binary');
	header('Accept-Ranges: bytes');
	readfile($path);
					} else{
		
		function fetch_data()
 {  
   	$output = '';  



$qry =  mysql_query (" SELECT * FROM pims_personnel, prs_report , prs_salary_record, prs_grade, prs_salary, 				
										pims_employment_records, pims_job_title, prs_allowance
										WHERE	month(prs_report.date_issued) = month(now()) 
										AND year(prs_report.date_issued) = year(now()) 
										AND pims_personnel.emp_No=prs_report.emp_No
                                        AND pims_personnel.emp_No=pims_employment_records.emp_No
                                        AND pims_job_title.job_title_code=pims_employment_records.job_title_code
                                        AND pims_personnel.emp_No=prs_salary_record.emp_No
                                        AND prs_grade.grade_id=prs_salary_record.grade_id
                                        AND prs_salary.salary_id=prs_salary_record.salary_id
			");
				
				while($row = mysql_fetch_assoc($qry))
				{
						$today="";
					$allowance = $row['allowance'];
											$allowance = number_format($allowance);
											$emp_No = $row['emp_No'];
											$fname = $row['P_fname'];
											$mname = $row['P_mname'];
											$lname = $row['P_lname'];
											$extension = $row['P_extension_name'];
											$netpay = $row['rep_net_pay'];
											$netpay = number_format($netpay,2);
											$id = $row['school_ID'];
											$no = $row['report_id'];
											
$output .= ' 											
 
 <br /> 
   
<table>

<thead>
<tr>
<th colspan="1">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../assets/images/pnhs_logo.png" width="40" height="40"/>
</th>
<th align="center" style="padding-top: 15px;" colspan="2"><font size="12">
PAGASA NATIONAL HIGHSCHOOL</font> <br /> <font size="12">PAGASA Annex, PNR Road, Legazpi City, Albay</font></th>
</tr>

<tr>
<th style=" border-bottom: solid;" colspan="3"></th>
</tr>
</thead>

<tbody>

<tr>
<td>&nbsp;</td>
</tr>

<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><font size="11"><u>&nbsp;No: &nbsp; '.$no.' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</u></font></td>
</tr>

<tr>
<td>&nbsp;</td>
</tr>

<tr>
<td><font size="11">&nbsp;Name:</font><font size="10" align="center">&nbsp; '.$lname.', '.$fname.' '.$mname.' '.$extension.'</font></td>
<td><font size="11">&nbsp;Account No:</font><font size="10">&nbsp; '.$id.'</font></td>
<td><font size="11">&nbsp;Amount:</font><font size="10">&nbsp; '.$netpay.' </font></td>
</tr>
<tr>
<td></td>
<td></td>
<td></td>
</tr>
<tr>
<td style="border-bottom: dashed;" colspan="3">&nbsp;</td>
</tr>

<tr>
<td>
<br />
<br />
</td>
</tr>


<tr>
<td></td>
<td></td>
<td></td>
</tr>

<tr>
<td></td>
<td></td>
<td></td>
</tr>




<tr>
<td align="center">_________________</td>
<td align="center">_________________</td>
<td align="center">_________________</td>
</tr>

<tr>
<td align="center"><font size="10">&nbsp;<b>Cashier</b></font></td>
<td align="center"><font size="10">&nbsp;<b>Principal</b></font></td>
<td align="center"><font size="10">&nbsp;<b>Accountant</b></font></td>
</tr>



<tr>
<td>&nbsp;</td>
</tr>

 </tbody>
</table>
</center>
<br />
<br />
<br />
<br />
<br />
<br />


';
				}
				
				  return $output;  
 }
 
 
 
   require_once('tcpdf/tcpdf.php');   

if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $obj_pdf->setLanguageArray($l);
}

      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      //$obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      //$obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins('3', '6', '3');  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(true);  
      $obj_pdf->SetFont('helvetica', '', 9);  
      
      $content = ''; 
	  $content .= fetch_data();  
  
	  $obj_pdf->AddPage(L, A6); 
	
      $obj_pdf->writeHTML($content, true, false, true, false, '');  
      ob_end_clean();
	  
	  $filename =  'PayrollRegistry'.$date.'.pdf';
	  $filelocation = "C:/xampp/htdocs/PNHS/modules/PRS/Admin/payrollreport";
	  $fileNL = $filelocation."/".$filename;

	  $obj_pdf->Output($filename, 'I'); 
	  
	  $save1 = "payrollreport";
	  $save2 = $save1."/".$filename;
	  
	  $obj_pdf->Output($fileNL,'F');
	//insert results from the form input
      $query = mysql_query("INSERT prs_save_report(filename, file_location, type ) values('$filename','$save2', 'registry')");
	     
					}
?>