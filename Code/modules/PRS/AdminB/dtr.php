<!DOCTYPE html>
<?php 
include('../connection.php');
	$showmtr = mysqli_query($mysqli,"SELECT * FROM pims_personnel,prs_dtr_rec  where 
										month(date_import)=month(now()) and year(date_import)=year(now()) and pims_personnel.emp_No=prs_dtr_rec.personnel_id  order by pims_personnel.P_lname ASC");
										while($mtrrow = mysqli_fetch_assoc($showmtr))
										{
											$personnel = $mtrrow['personnel'];
											$department = $mtrrow['department'];
											$late_min = $mtrrow['late_min'];
											$late_times = $mtrrow['late_times'];
											$personnel_id = $mtrrow['personnel_id'];
											$fname = $mtrrow['P_fname'];
											$mname = $mtrrow['P_mname'];
											$lname = $mtrrow['P_lname'];
											$id = $mtrrow['emp_No'];
											$extension = $mtrrow['P_extension_name'];
											$date_import = date("F d, Y", strtotime($mtrrow['date_import']));
											$absent_day = $mtrrow['absent_day'];
											$afl_day = $mtrrow['afl_day'];
											$out_day = $mtrrow['out_day'];
											$onduty_day = $mtrrow['onduty_day'];
											$ot_workday = $mtrrow['ot_workday'];
											$ot_holiday = $mtrrow['ot_holiday'];
											$late_times = $mtrrow['late_times'];
											$late_min = $mtrrow['late_min'];
											$le_times = $mtrrow['le_times'];
											$le_min =$mtrrow['le_min'];
 
	  $output .= ' 

	 <table align="center"  nobr="true">
    <tr >
                <td border="1">DEPT.</td>
        <td border="1" colspan="4">'.$department.'</td>
        <td border="1">NAME</td>
        <td border="1" colspan="4">'.$lname.', '.$fname.' '.$mname.' '.$extension.'</td>
    </tr>
    <tr>
        <td border="1">DATE</td>
        <td border="1" colspan="4">'.$date_import.'</td>
        <td border="1">ID</td>
        <td border="1" colspan="4">'.$id.'</td>
    </tr>
    <tr>
        <td border="1" rowspan="2">Absent (Day)</td>
        <td border="1" rowspan="2">AFL (Day)</td>
        <td border="1" rowspan="2">Out (Day)</td>
        <td border="1" rowspan="2">On-duty (Day)</td>
        <td border="1" colspan="2">Overtime (h)</td>
        <td border="1" colspan="2">Late</td>
        <td border="1" colspan="2">Leave Early</td>
    </tr>
    <tr>
        <td border="1">Workday</td>
        <td border="1">Holiday</td>
        <td border="1">(TIMES)</td>
        <td border="1">(MIN)</td>
        <td border="1">(TIMES)</td>
        <td border="1">(MIN)</td>
    </tr>
    <tr>
        <td border="1">'.$absent_day.'</td>
        <td border="1">'.$afl_day.'</td>
        <td border="1">'.$out_day.'</td>
        <td border="1">'.$onduty_day.'</td>
        <td border="1">'.$ot_holiday.'</td>
        <td border="1">'.$ot_workday.'</td>
        <td border="1">'.$late_times.'</td>
        <td border="1">'.$late_min.'</td>
        <td border="1">'.$le_times.'</td>
        <td border="1">'.$le_min.'</td>
    </tr>
</table>
<br> <br>
	  ';
				
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
      $obj_pdf->SetMargins('3', '5', '3');  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(true);  
      $obj_pdf->SetFont('helvetica', '', 9);  
      
		$content = $output; 
		
	  
	$obj_pdf->SetAutoPageBreak(true, 5);
	$obj_pdf->AddPage(L); 
	
      $obj_pdf->writeHTML($content, true, false, true, false, '');  
      ob_end_clean();
	  
	  
	  $filename =  'DTR.pdf';
	  	  
	  $filelocation = "C:/xampp/htdocs/PNHS/modules/PRS/Admin/payrollreport";
	  $fileNL = $filelocation."/".$filename;

      
	  $obj_pdf->Output($filename, 'I'); 
      
	  
	  
	  
?>


