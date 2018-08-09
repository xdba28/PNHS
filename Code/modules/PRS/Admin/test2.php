<?php
include('connection.php');
 
	
	  $output .= ' 
<table border="0">
    <thead>
	<tr>
        <th colspan="9" border="1"><font size="15" align="center">MEMBERSHIP CONTRIBUTIONS REMITTANCE FORM (MCRF)</font></th>
    </tr>
    <tr>
        <th rowspan="2" border="1"><strong><br/>&nbsp;&nbsp;Pag-IBIG ID <br>&nbsp;&nbsp;No.</strong></th>
        <th colspan="5" border="1"><strong align="center">NAME OF EMPLOYEES</strong></th>
        <th colspan="3" border="1"><strong align="center">CONTRIBUTIONS</strong></th>
        <th rowspan="2" border="1"><strong align="center">REMARKS</strong></th>
    </tr>
    <tr>
        <th border="1" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Last Name</th>
        <th border="1" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;First Name</th>
        <th border="1" align="center">Name Extension <br /> (JR.,III,etc)</th>
        <th border="1" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Middle Name</th>
        <th border="1" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EMPLOYEE</th>
        <th border="1" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EMPLOYER</th>
        <th border="1" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TOTAL</th>
		<th border="1" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Remarks</th>
    </tr>
	<thead>
	<tbody>
    ';
	  
	  $queryemp = mysqli_query($mysqli,"SELECT pims_personnel.P_fname, pims_personnel.P_mname, pims_personnel.P_lname, pims_personnel.P_extension_name,  prs_report.rep_pi_total, pims_personnel.PAG_IBIG_id FROM pims_personnel, prs_report WHERE	monthname(prs_report.date_issued) = 'February'
										AND year(prs_report.date_issued) = '2018' 
										AND pims_personnel.emp_No=prs_report.emp_No");
		while($queryrow = mysqli_fetch_assoc($queryemp))
		{
											$fname = $queryrow['P_fname'];
											$mname = $queryrow['P_mname'];
											$lname = $queryrow['P_lname'];
											$extension = $queryrow['P_extension_name'];
											$pagibig_id = $queryrow['PAG_IBIG_id'];
											$pi_con = $queryrow['rep_pi_total'];
											$pi_con = number_format($pi_con,2);
											$pi_con1 = $queryrow['rep_pi_total'];
											$total_pi_con = $pi_con1 * 2;
											$total_pi_con = number_format($total_pi_con,2);
	$output .= '
	<tr>
		<td border="1" align="center">'.$pagibig_id.'</td>
        <td border="1" align="center">'.$lname.'</td>
        <td border="1" align="center">'.$fname.'</td>
        <td border="1" align="center">'.$extension.'</td>
        <td border="1" align="center">'.$mname.'</td>
        <td border="1" align="center">'.$pi_con.'</td>
        <td border="1" align="center">'.$pi_con.'</td>
        <td border="1" align="center">'.$total_pi_con.'</td>
        <td border="1" align="center"></td>
    </tr>
    ';
		}
	
	$querytotal = mysqli_query($mysqli, "SELECT sum(prs_report.rep_pi_total) as pi_total FROM pims_personnel, prs_report WHERE	monthname(prs_report.date_issued) = 'February'
										AND year(prs_report.date_issued) = '2018' 
										AND pims_personnel.emp_No=prs_report.emp_No");
		$total_row =  mysqli_fetch_assoc($querytotal);
		$pi_total_amount = $total_row['pi_total'];
		$pi_total_amount = number_format($pi_total_amount,2);
		$pi_amount = $total_row['pi_total'];
		$twoamount = $pi_amount * 2;
		$twoamount = number_format($twoamount,2);
	
	$output .= '
	<tr>
		<td ></td>
        <td ></td>
        <td ></td>
        <td ></td>
        <td border="1"><b>TOTAL FOR THIS PRICE</b></td>
        <td border="1" align="center">'.$pi_total_amount.'</td>
        <td border="1" align="center">'.$pi_total_amount.'</td>
        <td border="1" align="center">'.$twoamount.'</td>
		<td border="1" align="center"></td>
		<td border="1" align="center"></td>
    </tr>
	';
	
	$output .= '
    <tr>
		<td ></td>
        <td ></td>
        <td ></td>
        <td ></td>
        <td border="1"><b>GRAND TOTAL <br />(if last page)</b></td>
        <td border="1"></td>
        <td border="1"></td>
        <td border="1"></td>
		<td border="1"></td>
		<td border="1"></td>
    </tr>
    <tr>
		<td ></td>
        <td></td>
        <td></td>
        <td></td>
        <td colspan="5" border="1"><strong>CERTIFIED CORRECT BY:</strong></td>
		 <td></td>
	</tr>
    <tr>
		<td ></td>
        <td></td>
        <td></td>
        <td></td>
       <td colspan="3" border="1" align="center">SIGNATURE OVER PRINTED NAME</td>
        <td colspan="2" border="1">&nbsp;&nbsp;DATE</td>
		 <td></td>
     </tr>
    <tr>
		<td ></td>
        <td></td>
        <td></td>
        <td></td>
        <td colspan="3" border="1"><br><br></td>
        <td colspan="2" border="1"><br><br></td>
		<td></td>
	</tr>
    <tr>
		<td ></td>
        <td></td>
        <td></td>
        <td></td>
        <td colspan="5" border="1">&nbsp;&nbsp;OFFICIAL DESIGNATION
		<br/ ><br/ ></td>
        
    </tr>
    
	<tbody>
	
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
      $obj_pdf->SetMargins('2', '5', '2');  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(true,0);  
      $obj_pdf->SetFont('helvetica', '', 8);  
       
      
	  
	    
    
	$obj_pdf->AddPage(P); 
	
      $obj_pdf->writeHTML($output, true, false, false, false, '');  
      ob_end_clean();
	  
	  
	  $filename =  'pagibigremittance.pdf';
	  	  
	  $filelocation = "C:/xampp/htdocs/PNHS/modules/PRS/Admin/payrollreport";
	  $fileNL = $filelocation."/".$filename;

      
	  $obj_pdf->Output($filename, 'I'); 
      
	  $save1 = "payrollreport";
	  $save2 = $save1."/".$filename;
	
						?>		 
									