<html>
<head>
 <link rel="stylesheet" href="../../css/sweetalert.css">
 <script src="../../jquery/jquery.min.js"></script>
 <script src="../../js/sweetalert-dev.js"></script>
</head>
<body>
<?php
include('../../connection.php');
 include('../../sanitise.php');

if (isset($_POST['submit'])) {
	
	
	$taxinsert = mysqli_query($mysqli,"INSERT INTO prs_setting(name_setting) VALUES('birtable')");

//	$idx = array_keys($_POST['amount']);
 // foreach ($idx as $index) {
//	$taxinsert = mysql_query("INSERT INTO prs_tax_change( change_fr, exemption,  tax_percentage, tax_number) VALUES('".$_POST['amount'][$index]."','".$_POST['exemption'][$index]."','".$_POST['percentage'][$index]."')");  
 // }

	//start of update
	//exemption='".$_POST['exemption'][$index]."',
	
	$ids = array_keys($_POST['stat_id']);
  foreach ($ids as $index) {

  $sql = mysqli_query($mysqli,"UPDATE  prs_stat_ex SET percentage='".$_POST['percentage'][$index]."',  exemption='".$_POST['exemption'][$index]."'
	WHERE stat_id='".$_POST['stat_id'][$index]."'") or 
    die ("Error"); ;
    
	}
	
	
	$id = array_keys($_POST['id']);
  foreach ($id as $index) {
	$sql1 = mysqli_query($mysqli,"UPDATE  prs_tax_amount SET amount_fr='".$_POST['amount'][$index]."'
	WHERE id='".$_POST['id'][$index]."'")or 
    die ("Error"); }
  
  
   //Make A Report :
   
   
   $content1 .= '
	
    <table border="1" align="center" >
      <tr>
	   <th colspan="10"><font size="20">BIR TABLE</font></th>
	  </tr>
	  
	  <tr>
        <th style="text-align:left;" colspan="2"bgcolor="#94FFFF" padding="19"> &nbsp;&nbsp;MONTHLY</th>
        <th style="text-align: center;" bgcolor="#94FFFF">1</th>
        <th style="text-align: center;" bgcolor="#94FFFF">2</th>
        <th style="text-align: center;" bgcolor="#94FFFF">3</th>
        <th style="text-align: center;" bgcolor="#94FFFF">4</th>
        <th style="text-align: center;" bgcolor="#94FFFF">5</th>
        <th style="text-align: center;" bgcolor="#94FFFF">6</th>
        <th style="text-align: center;" bgcolor="#94FFFF">7</th>
        <th style="text-align: center;" bgcolor="#94FFFF">8</th>
       </tr>
    <tr>
        <th text-align="left" colspan="2" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Exemption</th>
  ';
	
	$stat = mysqli_query ($mysqli,"Select * from prs_stat_ex group by number asc");
									while($statrow = mysqli_fetch_assoc($stat))
										{
											$exemption = $statrow['exemption'];
											$exemption = number_format($exemption,2);
											
    $content1 .='  
	 <td>'.$exemption.'</td>
										'; }
											
		$content1 .='
    </tr>
    <tr>
        <th text-align="left" colspan="2">Status</th>
        ';
			
		$stat1 = mysqli_query ($mysqli,"Select * from prs_stat_ex group by number asc");
									while($statrow = mysqli_fetch_assoc($stat1))
										{
											$percentage = $statrow['percentage'];
	
		
		$content1 .='
		<td>'.$percentage.'%</td>
										';}
    $content1 .='
	</tr>
    <tr>
        <th style="text-align:left;" colspan="10" bgcolor="#8B8B8B">A. Table for employees without qualified dependent</th>
    </tr>
	';
	
	$taxname = mysqli_query($mysqli,"Select * from  prs_withholding_tax limit 2 ");
								
								$tax_name="";
								while ($taxnamerow=mysqli_fetch_assoc($taxname))
									{
										$tax_name = $taxnamerow['tax_name'];
								
	$content1 .='
    <tr>
        <td colspan="2">'.$tax_name.' </td>
        
		';
		
		$taxselect = mysqli_query($mysqli,"select * from prs_withholding_tax, prs_tax_amount, prs_stat_ex
																where prs_stat_ex.stat_id=prs_tax_amount.stat_id and prs_withholding_tax.tax_id=prs_tax_amount.tax_id
																and prs_withholding_tax.tax_name='$tax_name'   ");
												while($taxselectrow = mysqli_fetch_assoc($taxselect))
												{
													$tax_amount = $taxselectrow['amount_fr'];
													$tax_amount = number_format($tax_amount,2);
		
		$content1 .='
		<td>'.$tax_amount.'</td>
        ';
												}
		$content1 .='
    </tr>
									'; }
     
	 $content1 .='	
	<tr>
        <th style="text-align:left;" colspan="10" bgcolor="#8B8B8B">B. Table for single/married employee with qualified dependent child(ren)</th>
    </tr>
	';
	
	$taxname1 = mysqli_query($mysqli,"SELECT * FROM `prs_withholding_tax` WHERE prs_withholding_tax.tax_name like 'ME%'");
								
								$tax_name1="";
								while ($taxnamerow=mysqli_fetch_assoc($taxname1))
									{
										$tax_name1 = $taxnamerow['tax_name'];
	$content1 .= '
    <tr>
        <td colspan="2">'.$tax_name1.'</td>
      ';  
	  
	  $taxselect1 = mysqli_query($mysqli,"select * from prs_withholding_tax, prs_tax_amount, prs_stat_ex
																where prs_stat_ex.stat_id=prs_tax_amount.stat_id and prs_withholding_tax.tax_id=prs_tax_amount.tax_id
																and prs_withholding_tax.tax_name='$tax_name1'   ");
												while($taxselectrow = mysqli_fetch_assoc($taxselect1))
												{
													$tax_amount = $taxselectrow['amount_fr'];
													$tax_amount = number_format($tax_amount,2);
		
	  
	  $content1 .='
        <td>'.$tax_amount.'</td>
        ';
												}
		$content1 .='
    </tr>
					
					'; }
	$content1 .='
					</table>
    ';
 
   require_once('../../Admin/tcpdf/tcpdf.php');   

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
      $obj_pdf->SetMargins('8', '8', '8');  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(true);  
      $obj_pdf->SetFont('helvetica', '', 13);  
      
		  $content = $content1;  
      
	  $obj_pdf->AddPage(L, 'A4'); 
	  
      $obj_pdf->writeHTML($content, true, false, true, false, '');  
      ob_end_clean();
	  
	  $dategeto = date('MdY-H-m-s');
	  $filename =  'BIRTable'.$dategeto.'.pdf';
	  	  
	  $filelocation = "C:/xampp/htdocs/PNHS/modules/PRS/Admin/tablereport";
	  $fileNL = $filelocation."/".$filename;
	  $save1 = "tablereport";
	  $save2 = $save1."/".$filename;
	  $obj_pdf->Output($fileNL,'F');
	 $query = mysqli_query($mysqli,"INSERT prs_save_report(filename, file_location, type ) values('$filename','$save2', 'taxtable')");
	
   if($query){		echo "<script>alert('Tax Table Has Been Updated')</script>";
					echo "<script>window.location.href='../../Admin/taxedit.php';</script>";
				}else{
					echo "<script>alert('Error!'); </script>";
				}
 }
  
							

?>
</body>
</html>

