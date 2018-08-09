<!DOCTYPE html>
<?php 

	include('../connection.php');
	$month = $_GET['month'];
	$year = $_GET['year'];
	 $totalemp = mysqli_query($mysqli,"Select count(pims_personnel.emp_No) as counted from pims_personnel");
	 $emprow = mysqli_fetch_assoc($totalemp);
	 $empcounted =  $emprow['counted'];
	
	  $output .= ' 

	 <table align="center">
    <tr>
        <td border="1" colspan="10"><font size="17px"><b>PHILHEALTH REMITTANCE REPORT</b></font></td>
    </tr>
    <tr>
        <td border="1" colspan="2" rowspan="2"><font size="13px"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO.</b></font></td>
        <td border="1" colspan="3"><b>NAME OF EMPLOYEES</b></td>
        <td border="1" rowspan="2"><font size="10px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>PHILHEALTH NO.</b></font></td>
        <td border="1" rowspan="2"><font size="11px"><b>MONTHLY SALARY BRACKET</b></font></td>
        <td border="1" colspan="2"><b>NHIP PREMIUM CONTRIBUTION</b></td>
        <td border="1" rowspan="2"><b>MEMBER STATUS S-Separated NE-No Earnings NH-Newly Hired</b></td>
    </tr>
    <tr>
        <td border="1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SURNAME</td>
        <td border="1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GIVEN NAME</td>
        <td border="1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MIDDLE NAME</td>
        <td border="1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PS</td>
        <td border="1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ES</td>
    </tr>
	';
    
	$queryemp = mysqli_query($mysqli,"SELECT pims_personnel.P_fname, pims_personnel.P_mname, pims_personnel.P_lname, pims_personnel.P_extension_name,  prs_report.total_ph, pims_personnel.PHILHEALTH_no FROM pims_personnel, prs_report WHERE	monthname(prs_report.date_issued) = '$month'
										AND year(prs_report.date_issued) = '$year' 
										AND pims_personnel.emp_No=prs_report.emp_No order by pims_personnel.P_lname asc");
		while($queryrow = mysqli_fetch_assoc($queryemp))
		{
											$fname = $queryrow['P_fname'];
											$mname = $queryrow['P_mname'];
											$lname = $queryrow['P_lname'];
											$extension = $queryrow['P_extension_name'];
											$ph_no = $queryrow['PHILHEALTH_no'];
											$total_ph = $queryrow['total_ph'];
											$total_ph = number_format($total_ph,2);
											
	 $output .= ' <tr>
        <td border="1" colspan="2">'.$ph_no.'</td>
        <td border="1">'.$lname.'</td>
        <td border="1">'.$fname.'</td>
        <td border="1">'.$mname.'</td>
        <td border="1">'.$ph_no.'</td>
        ';
		
		$querybracket = mysqli_query($mysqli, "Select * from prs_philhealth where ph_employee_share='$total_ph'");
		$bracketrow = mysqli_fetch_assoc($querybracket);
		$bracket1 = $bracketrow['philhealth_id'];
		
		$output .= '
		<td border="1">'.$bracket1.'</td>
        ';
		
		$output .= '
		<td border="1">'.$total_ph.'</td>
        <td border="1">'.$total_ph.'</td>
        <td border="1"></td>
    </tr>
    ';
	}
	 $output .= ' 
	<tr>
        <td border="1" colspan="5"><font size="14px"><b>ACKNOWLEDGEMENT RECEIPT (ME-5/POR/OR/PAR)</b></font></td>
        <td border="1" colspan="2" rowspan="2"><br><br><b>GRAND TOTAL (PS+ES) ===></b></td>
        ';
		$querytotal = mysqli_query($mysqli, "SELECT sum(prs_report.total_ph) as total_ph FROM pims_personnel, prs_report WHERE	monthname(prs_report.date_issued) = '$month'
										AND year(prs_report.date_issued) = '$year' 
										AND pims_personnel.emp_No=prs_report.emp_No");
		$total_row =  mysqli_fetch_assoc($querytotal);
		$ph_total_amount = $total_row['total_ph'];
		$ph_total_amount = number_format($ph_total_amount,2);
		$ph_total_amount1 = $total_row['total_ph'];
		$total_rem = $ph_total_amount1 * 2;
		$total_rem = number_format($total_rem,2);
		
	$output .= '
		<td border="1" rowspan="2"><br><br>'.$ph_total_amount.'</td>
        <td border="1" rowspan="2"><br><br>'.$ph_total_amount.'</td>
        <td border="1"><b>CERTIFIED CORRECT</b></td>
    </tr>
    <tr>
        <td border="1">APPLICABLE PERIOD</td>
        <td border="1">REMITTED AMOUNT</td>
        <td border="1">ACKNOWLEDGEMENT RECEIPT NO.</td>
        <td border="1">TRANSACTION DATE</td>
        <td border="1">NO. OF EMPLOYEES</td>
        <td border="1"></td>
    </tr>
    <tr>
        <td border="1">'.$month.' '.$year.'</td>
        <td border="1">'.$total_rem.'</td>
        <td border="1"></td>
        <td border="1"></td>
        <td border="1">'.$empcounted.'</td>
        <td border="1" colspan="3"></td>
		<td border="1" colspan="1"><b>OFFICIAL DESIGNATION</b></td>
        <td border="1"><b>SIGNATURE OVER PRINTED NAME</b></td>
    </tr>
    <tr>
        <td border="0" colspan="8"></td>
		<td border="1"><br><br><br><b>DATE</b></td>
		<td border="1"><br><br></td>
    </tr>
   
</table>

	  ';
				

  
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
      $obj_pdf->SetMargins('3', '3', '3');  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(true);  
      $obj_pdf->SetFont('helvetica', '', 8);  
      
		$content = $output; 
		
	  
	  
	 
	
	$obj_pdf->AddPage(L); 
	
      $obj_pdf->writeHTML($content, true, false, true, false, '');  
      ob_end_clean();
	  
	  
	  $filename =  'PHILHEALTH REMITTANCE REPORT.pdf';
	  	  
	  $filelocation = "C:/xampp/htdocs/PNHS/modules/PRS/Admin/payrollreport";
	  $fileNL = $filelocation."/".$filename;

      
	  $obj_pdf->Output($filename, 'I'); 
      
	  
	  
	  
?>


