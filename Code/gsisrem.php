<!DOCTYPE html>
<?php 
		include('../connection.php');
		$month = $_GET['month'];
		$year = $_GET['year'];
 
	  $output .= ' 

	 <table align="center">
    <tr>
        <td border="1" colspan="7"><font size="15px"><b>GSIS REMITTANCE FORM</b></font></td>
    </tr>
    <tr>
        <td border="1" rowspan="2"><font size="11px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GSIS ID NO.</font></td>
        <td border="1" colspan="4">NAME OF EMPLOYEES</td>
        <td border="1">CONTRIBUTIONS</td>
        <td border="1" rowspan="2"><font size="11px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;REMARKS</font></td>
    </tr>
    <tr>
        <td border="1" align="center">Last Name</td>
        <td border="1" align="center">First Name</td>
        <td border="1" align="center">Name Extension (Jr., III, etc)</td>
        <td border="1" align="center">Middle Name</td>
        <td border="1" align="center">Amount</td>
    </tr>
    ';
	
	 $queryemp = mysqli_query($mysqli,"SELECT pims_personnel.P_fname, pims_personnel.P_mname, pims_personnel.P_lname, pims_personnel.P_extension_name,  prs_report.total_gsis, pims_personnel.GSIS_No FROM pims_personnel, prs_report WHERE	monthname(prs_report.date_issued) = '$month'
										AND year(prs_report.date_issued) = '$year' 
										AND pims_personnel.emp_No=prs_report.emp_No order by pims_personnel.P_lname asc");
		while($queryrow = mysqli_fetch_assoc($queryemp))
		{
											$fname = $queryrow['P_fname'];
											$mname = $queryrow['P_mname'];
											$lname = $queryrow['P_lname'];
											$extension = $queryrow['P_extension_name'];
											$gsis_no = $queryrow['GSIS_No'];
											$total_gsis = $queryrow['total_gsis'];
											$total_gsis = number_format($total_gsis,2);
											
	$output .= ' 
	<tr>
        <td border="1">'.$gsis_no.'</td>
        <td border="1">'.$lname.'</td>
        <td border="1">'.$fname.'</td>
        <td border="1">'.$extension.'</td>
        <td border="1">'.$mname.'</td>
        <td border="1">'.$total_gsis.'</td>
        <td border="1"></td>
    </tr>
	';
		}
	  
	  $querytotal = mysqli_query($mysqli, "SELECT sum(prs_report.total_gsis) as gsis_total FROM pims_personnel, prs_report WHERE	monthname(prs_report.date_issued) = '$month'
										AND year(prs_report.date_issued) = '$year' 
										AND pims_personnel.emp_No=prs_report.emp_No");
		$total_row =  mysqli_fetch_assoc($querytotal);
		$gsis_total_amount = $total_row['gsis_total'];
		$gsis_total_amount = number_format($gsis_total_amount,2);
		
	  $output .= ' 
    <tr>
        <td border="1" colspan="4"></td>
        <td border="1">Total Amount</td>
        <td border="1"><b>'.$gsis_total_amount.'<b></td>
        <td border="1"></td>
    </tr>
	';
	$output .= ' 
    <tr>
        <td border="1" colspan="5"></td>
        <td border="1" colspan="2">CERTIFIED CORRECT BY</td>
    </tr>
    <tr>
        <td border="1" colspan="5"></td>
        <td border="1">SIGNATURE OVER PRINTED NAME</td>
        <td border="1" rowspan="3"><font size="12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DATE </font></td>
    </tr>
    <tr>
        <td border="1" colspan="5"></td>
        <td border="1"></td>
    </tr>
    <tr>
        <td border="1" colspan="5"></td>
        <td border="1">OFFICIAL DESIGNATION</td>
    </tr>
    <tr>
        <td border="1" colspan="5"></td>
        <td border="1"><br><br></td>
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
      $obj_pdf->SetMargins('3', '5', '3');  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(true);  
      $obj_pdf->SetFont('helvetica', '', 8);  
      
		$content = $output; 
		
	  
	  
	 
	
	$obj_pdf->AddPage(L); 
	
      $obj_pdf->writeHTML($content, true, false, true, false, '');  
      ob_end_clean();
	  
	  
	  $filename =  'GSISREMITTANCEFORM.pdf';
	  	  
	  $filelocation = "C:/xampp/htdocs/PNHS/modules/PRS/Admin/payrollreport";
	  $fileNL = $filelocation."/".$filename;

      
	  $obj_pdf->Output($filename, 'I'); 
      
	  
	  
	  
?>


