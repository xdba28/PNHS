<?php	
include('../connection.php');
 include('../sanitise.php');

 $date = date_default_timezone_set('Asia/Manila');
		$date = date('M Y');

 function fetch_data()
 {  
   	$output = '';  
$a = '&#8369;';
$b = iconv('UTF-8', 'windows-1252', $a);
$output .= ' 
 <table border="0">
    <tr>
        <td colspan="13" align="right">HQP-PFF-053</td>
    </tr>
    <tr>
        <td colspan="2" rowspan="2" >img</td>
        <td colspan="6" rowspan="2" ><h2><b>MEMBERS CONTRIBUTION <br> REMITTANCE FORM (MCRF)</b></h2></td>
        <td colspan="5" border="1" style=" background: #0038A8;">&nbsp;Pag-IBIG EMPLOYERS ID NUMBER</td>
    </tr>
    <tr>
        <td colspan="5" border="1"></td>
    </tr>
    <tr>
        <td colspan="13"><i>NOTE:PLEASE READ INSTRUCTIONS AT THE BACK. </i></td>
    </tr>
    <tr>
        <td height="24" colspan="13" border="1">EMPLOYER/BUSINESS NAME
		<br /> insert shit here</td>
    </tr>
    
    <tr>
        <td colspan="13" border="1">EMPLOYER/BUSINESS ADDRESS</td>
    </tr>
    <tr>
        <td colspan="3" height="24px" border="1">Unit/Room No., Floor</td>
        <td colspan="3" height="24px" border="1">Building Name</td>
        <td colspan="4" height="24px" border="1">Lot No., Block No., Phase No., House No.</td>
        <td colspan="3" height="24px" border="1">Street Name</td>
    </tr>
    <tr>
        <td colspan="2" height="24px" border="1">Subdivision</td>
        <td height="24px" border="1" colspan="2">Barangay</td>
        <td height="24px"colspan="3" border="1">Municipality/City</td>
        <td height="24px" colspan="3" border="1">Province/State/Country (if abroad)</td>
        <td height="24px"colspan="3" border="1">ZIP Code</td>
    </tr>
    <tr>
        <td rowspan="2" align="center" border="1">Pag-IBIG MID <br> No./<b>RTN</b></td>
        <td rowspan="2" align="center" border="1">ACCOUNT NO.</td>
        <td rowspan="2" align="center" border="1">MEMBERSHIP <br> PROGRAM</td>
        <td colspan="4" align="center" border="1">NAME OF MEMBERS</td>
        <td rowspan="2" align="center" border="1">PERIOD <br> COVERED</td>
        <td rowspan="2" align="center" border="1"> MONTHLY <br> COMPENSATION</td>
        <td colspan="3" align="center" border="1"> MEMBERSHIP CONTRIBUTIONS</td>
        <td rowspan="2" align="center" border="1"> REMARKS</td>
    </tr>
    <tr>
        <td align="center" ><i>Last Name</i></td>
        <td align="center" ><i>First Name</i></td>
        <td align="center" ><i>Name Ext. <br> (Jr., III, etc)</i></td>
        <td align="center" ><i>Middle Name</i></td>
        <td align="center" border="1">EE SHARE</td>
        <td align="center" border="1">ER SHARE</td>
        <td align="center" border="1">Total</td>
    </tr>
    <tr>
        <td border="1"></td>
        <td border="1"></td>
        <td border="1"></td>
        <td border="1"></td>
        <td border="1"></td>
        <td border="1"></td>
        <td border="1"></td>
        <td border="1"></td>
        <td border="1"></td>
        <td border="1"></td>
        <td border="1"></td>
        <td border="1"></td>
        <td border="1"></td>
    </tr>
    <tr>
        <td colspan="9" border="1">TOTAL FOR THIS PAGE</td>
        <td border="1">&#8369;</td>
        <td border="1">&#8369;</td>
        <td colspan="2" border="1">'.$b.'</td>
    </tr>
    <tr>
        <td colspan="9" border="1">GRAND TOTAL (if last page)</td>
        <td border="1">&#8369;</td>
        <td border="1">&#8369;</td>
        <td colspan="2" border="1">&#8369;</td>
    </tr>
    <tr>
        <td colspan="13" align="center" border="1"><b>EMPLOYER CERTIFICATION</b></td>
    </tr>
    <tr>
        <td colspan="13" align="center" border="1">I hereby certify under pain of perjury that the information given and all statements made herein are true and correct to the best of my knowledge and belief. I further <br> certify that my signature appearing herein is genuine and authentic,</td>
    </tr>
    <tr>
		
        <td colspan="5" align="center" >&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;</td>
        <td colspan="4" align="center" >&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;</td>
        <td colspan="4" align="center" >&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;&#95;</td>
    </tr>
    
	<tr>
        <td colspan="5" align="center" >HEAD OF OFFICE OR AUTHORIZED REPRESENTATIVE</td>
        <td colspan="4" align="center" >DESIGNATION/POSITION</td>
        <td colspan="4" align="center" >DATE</td>
    </tr>
	
    <tr>
        <td colspan="5" align="center"><i>(Signature Over Printed Name)</i></td>
        <td colspan="8" ></td>
    </tr>
    <tr>
        
    </tr>
        
</table>
 
';
				
				
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
      $obj_pdf->SetMargins('3', '3', '3');  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(true);  
      $obj_pdf->SetFont('helvetica', '', 6);  
      
		$content = ''; 
		  $content .= fetch_data();  
      
	  
  
$obj_pdf->AddPage(); 
	
      $obj_pdf->writeHTML($content, true, false, true, false, '');  
      ob_end_clean();
	  
	  
	  $filename =  'PayrollRegistry'.$date.'.pdf';
	  	  
	  $filelocation = "C:/xampp/htdocs/payroll/Admin/payrollreport";
	  $fileNL = $filelocation."/".$filename;

      
	  $obj_pdf->Output($filename, 'I'); 
	  
	  $save1 = "payrollreport";
	  $save2 = $save1."/".$filename;
	
		
	  
      
	
  
?>