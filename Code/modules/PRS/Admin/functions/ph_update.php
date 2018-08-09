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

if (isset($_POST['submit1'])) {
	
	
	$phcheck= mysqli_query($mysqli,"Select count(date_change) as count from prs_setting where month(date_change)=month(now()) and year(date_change)=year(now()) ");
	$phrow = mysqli_fetch_assoc($phcheck);
	$phnum = $phrow['count'];
	
	if ($phnum >= 3)
	{
	
			 
	$ids = array_keys($_POST['ph_range_fr']);
  foreach ($ids as $index) {
		
	  
	$sql1 = mysql_query("INSERT INTO prs_ph_change(change_range_fr, change_range_to, change_salary_base, change_monthly_premium, change_share, change_share1) VALUES ('".$_POST['ph_range_fr'][$index]."','".$_POST['ph_range_to'][$index]."','".$_POST['ph_salary_base'][$index]."','".$_POST['ph_total_monthly_premium'][$index]."','".$_POST['ph_share'][$index]."','".$_POST['ph_share1'][$index]."')");  
	  
    
	$sql = mysqli_query($mysqli,"UPDATE prs_philhealth SET ph_range_fr='".$_POST['ph_range_fr'][$index]."', ph_range_to='".$_POST['ph_range_to'][$index]."',
	ph_salary_base='".$_POST['ph_salary_base'][$index]."', ph_total_monthly_premium='".$_POST['ph_total_monthly_premium'][$index]."', 
	ph_employee_share='".$_POST['ph_share'][$index]."', ph_employee_share1='".$_POST['ph_share1'][$index]."'
	WHERE philhealth_id='".$_POST['ph_id'][$index]."'") or 
    die ("Error");
							}
				
$getdate = mysqli_query($mysqli,"Select * from prs_setting where name_setting='PhilHealth' order by date_change DESC LIMIT 1" );
	while($getdate_row = mysqli_fetch_assoc($getdate))
	{
		$date_change = date("Y", strtotime($getdate_row['date_change'])); 
	}
  $content1 .= '
  
    <table border="1" align="center">
    
	<thead>
	<tr><td colspan="6"><font size="16">PhilHealth Table of Year '.$date_change.' </font></td></tr>
	<tr>
        <th>Salary Bracket</th>
        <th>Salary Range</th>
        <th>Salary Base</th>
        <th>Total Monthly Premium</th>
        <th>Employee Share*</th>
        <th>Employer Share</th>
    </tr>
	</thead>
 ';
	$qry = mysqli_query($mysqli,"SELECT * FROM  prs_philhealth");
						           
								   while ($row = mysqli_fetch_array($qry))
								   {
									
									$ph_id 						= $row['philhealth_id'];
									$ph_range_fr				= $row['ph_range_fr'];
									$ph_range_fr = number_format($ph_range_fr);
									$ph_range_to				= $row['ph_range_to'];
									$ph_range_to = number_format($ph_range_to);
									$ph_salary_base				= $row['ph_salary_base'];
									$ph_salary_base = number_format($ph_salary_base);
									$ph_total_monthly_premium 	= $row['ph_total_monthly_premium'];
									$ph_total_monthly_premium = number_format($ph_total_monthly_premium);
									$ph_employee_share			= $row['ph_employee_share'];
									$ph_employee_share1			= $row['ph_employee_share1'];
           

	$content1 .='
	<tr> 
        <td>'.$ph_id.'</td>
        <td>'.$ph_range_fr.'-'.$ph_range_to.'</td>
        <td>'.$ph_salary_base.'</td>
        <td>'.$ph_total_monthly_premium.'</td>
        <td>'.$ph_employee_share.'</td>
        <td>'.$ph_employee_share1.'</td>
    </tr>
    
	
								   '; }
	$content1 .='
	</tbody>
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
      $obj_pdf->SetMargins('8', '5', '8');  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(true);  
      $obj_pdf->SetFont('helvetica', '', 9);  
      
		  $content = $content1;  
      
$obj_pdf->AddPage(P, 'A4'); 
	
      $obj_pdf->writeHTML($content, true, false, true, false, '');  
      ob_end_clean();
	  
	  $dateoutput = date('MdY');
	  $filename =  'PhilHealth'.$dateoutput.'.pdf';
	  	  
	  $filelocation = "C:/xampp/htdocs/PNHS/modules/PRS/Admin/tablereport";
	  $fileNL = $filelocation."/".$filename;

	  $save1 = "tablereport";
	  $save2 = $save1."/".$filename;
	
	  $obj_pdf->Output($fileNL,'F');
	  
      $query = mysqli_query($mysqli,"INSERT prs_save_report(filename, file_location, type ) values('$filename','$save2', 'phtable')");
	  $sql1 = mysqli_query($mysqli,"INSERT INTO prs_setting (name_setting) VALUES ('PhilHealth')");  

  

				
							
							 if($query){
					echo "<script>alert('PhilHealth Table Has Been Updated')</script>";
					echo "<script>window.location.href='../../Admin/ph_table_edit.php';</script>";
					
				}else{
					echo "<script>swal({ title:'Error!',type:'warning'}, function(){window.location.href='../../Admin/ph_table_edit.php'});</script>";
				}
								
	} else {
				echo "<script>swal({ title:'You Can Only Update PhilHealth Table 3 times!!',type:'warning'}, function(){window.location.href='../../Admin/ph_table_edit.php'});</script>";
					
			}
								}
							

?>
</body>
</head>
