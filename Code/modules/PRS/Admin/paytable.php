<!DOCTYPE html>
<?php 
include('connection.php');
 include('../sanitise.php');
 
		$date = date_default_timezone_set('Asia/Manila');
		$date = date('MY');
		$filenames =  'PayrollTable'.$date.'.pdf';
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
        $qry = mysql_query("SELECT * FROM pims_personnel, prs_report , prs_salary_record, prs_grade, prs_salary, pims_employment_records, pims_job_title, prs_allowance
										WHERE	month(prs_report.date_issued) = month(now()) 
										AND year(prs_report.date_issued) = year(now()) 
										AND pims_personnel.emp_No=prs_report.emp_No
                                        AND pims_personnel.emp_No=pims_employment_records.emp_No
                                        AND pims_job_title.job_title_code=pims_employment_records.job_title_code
                                        AND pims_personnel.emp_No=prs_salary_record.emp_No
                                        AND prs_grade.grade_id=prs_salary_record.grade_id
                                        AND prs_salary.salary_id=prs_salary_record.salary_id
                                        
										AND prs_salary.salary_id=prs_salary_record.salary_id group by pims_personnel.P_lname asc");
										
		while($row=mysql_fetch_assoc($qry))
										{       
      
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
											$date_issued = $row['date_issued'];
											$today = $date_issued;
											$today = date("F  Y"); 
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
	  
	    $qry5 = mysql_query("SELECT sum(prs_loan_pay.pay_loan_amount) as loan FROM pims_personnel, prs_loan_pay
						WHERE 
						pims_personnel.emp_No='$emp_No'
						AND   pims_personnel.emp_No=prs_loan_pay.emp_No
						AND   month(prs_loan_pay.pay_date) = month(now())
						AND   year(prs_loan_pay.pay_date) = year(now())
						AND   prs_loan_pay.loan_status ='ONGOING' limit 1
						");
				
				while($row1=mysql_fetch_assoc($qry5))
				{
					$loan_amount = $row1['loan'];
					$loan_amount = number_format($loan_amount,2);
	  
	  $output .= ' 

	<tbody>		
    <tr>
        <td  border="1"><font size="8" align="center">'.$school_id.'</font></td>
        <td  colspan="2"  border="1"><font size="8" align="center" border="1">'.$lname.' , '.$fname.'  '.$mname.' '.$extension.'</font></td>
        <td  border="1"><font size="8" align="center">'.$job_name.'</font></td>
        <td  border="1"><font size="8" align="center">'.$grosspay.'</font></td>
        <td  border="1"><font size="8" align="center">'.$allowance.'</font></td>
        <td  border="1"><font size="8" align="center">'.$row["absent_cost"].'</font></td>
        <td  border="1"><font size="8" align="center">'.$row["total_gsis"].'</font></td>
        <td  border="1"><font size="8" align="center">'.$total_ph.'</font></td>
        <td  border="1"><font size="8" align="center">'.$total_pi.'</font></td>
        <td  border="1"><font size="8" align="center">'.$loan_amount.'</font></td>
		<td  border="1"><font size="8" align="center">'.$total_tax.'</font></td>
        <td  border="1"><font size="8" align="center"></font>'.$netpay.'</td>
        <td  border="1"><font size="8" align="center"></font></td>
        
    </tr>
   </tbody>
    

  </center>



		



	  ';
				}
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
      $obj_pdf->SetMargins('3', '5', '3', '3');  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(true);  
      $obj_pdf->SetFont('helvetica', '', 9);  
      
		$content = ''; 
		
    
	  
	  
	  $content .= '
					<center>
	  <table  cellspacing="0" cellpadding="1" nobr="true">
    <thead>
	<tr>
		<th colspan="5">
		&nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
		<img src="../assets/images/pnhs_logo.png" width="40" height="40" />
		</th>
		<th colspan="9">
				
				<b>
				<font size="13">MONTHLY PAYROLL WORKSHEET</font>  
				<br />  
				<font size="10">&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;For the Month of '.$date.' </font>
				</b>
			<br />  
		</th>
	</tr>
	<tr>
	<th colspan="14" align="left"  border="1">  Station/School: PAGASA NATIONAL HIGHSCHOOL &nbsp; &nbsp; PAGASA annex, PNR Rd, Legazpi City, Albay</th> 
    </tr>
    <tr>
        <th rowspan="2" align="center" border="1">Emp. No..</th>
        <th colspan="2" align="center" border="1">Employee Name</th>
        <th rowspan="2" align="center" border="1">Position Title</th>
        <th rowspan="2" align="center" border="1">Basic Salary</th>
        <th rowspan="2" align="center" border="1">PERA</th>
        <th colspan="6" align="center" border="1">DEDUCTIONS</th>
        <th rowspan="2" align="center" border="1">Net Pay</th>
        <th rowspan="2" align="center" border="1">REMARKS</th>
    </tr>
    <tr>
		<td colspan="2" align="center" border="1"><font size="7">(Lastname/Firstname/Middlename)</font></td>
        <td rowspan="1" align="center" border="1">Absence</td>
        <td rowspan="1" align="center" border="1">GSIS</td>
        <td rowspan="1" align="center" border="1">PhilHealth</td>
        <td rowspan="1" align="center" border="1">PAGIBIG</td>
        <td rowspan="1" align="center" border="1">Total Loan</td>
        <td rowspan="1" align="center" border="1">Taxes</td>
    </tr>
   </thead>
	  
	  ';
	  
	  
	  $content .= fetch_data();  
    
	$content .= '
	 <tfoot>
	 <tr>
	
        <td colspan="14" border="1">
		<br />
		<br />
		
        <b>&nbsp; &nbsp; &nbsp; &nbsp; Certified Correct: &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </b>
        
        <b>Approved By:</b>
		
		<br />
		
		<b>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ________________________&nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </b>
		
		<b>________________________</b>
		
		<br />
		
		<b>&nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;  School Division Supervisor</b>
		
		
		</td>
		
	</tr>
   </tfoot>
</table>
	
	';
	
	
	$obj_pdf->SetAutoPageBreak(true, 5);
	$obj_pdf->AddPage(L); 
	
      $obj_pdf->writeHTML($content, true, false, true, false, '');  
      ob_end_clean();
	  
	  
	  $filename =  'PayrollTable'.$date.'.pdf';
	  	  
	  $filelocation = "C:/xampp/htdocs/PNHS/modules/PRS/Admin/payrollreport";
	  $fileNL = $filelocation."/".$filename;

      
	  $obj_pdf->Output($filename, 'I'); 
      
	  $save1 = "payrollreport";
	  $save2 = $save1."/".$filename;
	
	  $obj_pdf->Output($fileNL,'F');
	 //$query = mysql_query("INSERT prs_save_report(filename, file_location, type ) values('$filename','$save2', 'table')");
	     
		 }
	  
	  
?>


