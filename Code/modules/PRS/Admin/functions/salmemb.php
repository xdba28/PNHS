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
	$petmalu = sanitise($_POST['petmalu']);
	$salary_memo = $_POST['salarymemotitle'];
	 $title = $_POST['title'];
	
	$set = mysqli_query($mysqli,"select count(date_change) as countt from prs_salary_history where his_sal_memo='$petmalu' and year(date_change)= year(now()) and month(date_change)= month(now()) "); 
	$setrow = mysqli_fetch_assoc($set);
	$countt = $setrow['countt'];
	
 
	
	if($countt == 3)
	{
		$r=0;
		$w=0;
	$ids = array_keys($_POST['id']);
	mysqli_query($mysqli,"set automcommit=0");
	mysqli_query($mysqli,"start transaction");
	mysqli_query($mysqli,"LOCK TABLE prs_salary, prs_salary_history WRITE");
  foreach ($ids as $index) {
	  
	  
	  $sql = mysqli_query($mysqli,"UPDATE prs_salary 
	  SET amount ='".$_POST['step'][$index]."'
	  WHERE salary_id='".$_POST['id'][$index]."'") or die ("Error"); 
	  if($sql){
		  $r++;
	  }else{
		  $w++;
	  }
	 }
	
	  $memoinsert =mysqli_query($mysqli,"INSERT INTO prs_salary_history(his_sal_memo) 
	  values ( '$petmalu') ");
	
//Put Report on Table
//..............................................................................

   $content1 .= '
       <table border="1" align="center">
    <thead>
	<tr>
		<th colspan="9" ><font size="13"><b>'.$title.'</b></font></th>
	</tr>
	<tr>
        <th>Salary Grade</th>
        <th><b>Step 1</b></th>
        <th><b>Step 2</b></th>
		<th><b>Step 3</b></th>
		<th><b>Step 4</b></th>
		<th><b>Step 5</b></th>
		<th><b>Step 6</b></th>
		<th><b>Step 7</b></th>
		<th><b>Step 8</b></th>
			
	</tr>
    </thead>
	<tbody>
	
	';
	$qry = mysqli_query($mysqli,"select * from  prs_grade ");
					$grade="";
					$grade="";
					while ($row=mysqli_fetch_assoc($qry))
					{
						$id    = $row ['grade_id'];
						$grade = $row['grade'];
	$content1 .='
        <tr>
		<td>'.$grade.'</td>
		';
		$qry1 = mysqli_query($mysqli,"SELECT * FROM prs_salary, prs_grade, prs_salary_memo
													where prs_grade.grade_id=prs_salary.grade_id AND
													prs_salary_memo.sal_memo_id=prs_salary.sal_memo_id
													and prs_salary_memo.sal_memo_id='$salary_memo'
													and prs_grade.grade='$grade'");
								while($row1=mysqli_fetch_assoc($qry1))
								{
										$steps = $row1['step'];
										$grades = $row1['grade'];
										$memo = $row1['salary_memo'];
										$amount = $row1['amount'];
										$id    = $row1 ['salary_id'];
					
	$content1 .='	
        <td>'.$amount.'</td>
								'; }
		 
	$content1 .='	 
					</tr> '; }
					
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
      $obj_pdf->SetMargins('8', '8', '8');  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(true);  
      $obj_pdf->SetFont('helvetica', '', 11);  
      
		  $content = $content1;  
      
	  $obj_pdf->AddPage(P, 'A4'); 
	  
      $obj_pdf->writeHTML($content, true, false, true, false, '');  
      ob_end_clean();
	  
	  $dategeto = date('MdY-H-m-s');
	  $filename =  ''.$petmalu.'table'.$dategeto.'.pdf';
	  	  
	  $filelocation = "C:/xampp/htdocs/PNHS/modules/PRS/Admin/tablereport";
	  $fileNL = $filelocation."/".$filename;
	  $obj_pdf->Output($filename, 'I'); 
      $save1 = "tablereport";
	  $save2 = $save1."/".$filename;
		$obj_pdf->Output($fileNL,'F');
	  
      $query = mysqli_query($mysqli,"INSERT prs_save_report(filename, file_location, type ) values('$filename','$save2', 'salarymemotable')");
	 	
	
	
	
//...............................................................................
//	$idx = array_keys($_POST['his_grade']);
//  foreach ($idx as $index) {
	  
//	  $memoinsert = ("INSERT INTO prs_salary_history(his_step, his_amount, his_grade, his_sal_memo) 
//	  values ( '".$_POST['salsteps'][$index]."', '".$_POST['step'][$index]."', 
//	  '".$_POST['salgrade'][$index]."', '".$_POST['salmemo'][$index]."') ");
//	  $diedie=mysql_query($memoinsert)or 
		
//  }
	
	
  if($w>=1){
	  mysqli_query($mysqli,"ROLLBACK");
	  echo "<script>alert('Error!'); </script>";
  }else{
	  mysqli_query($mysqli,"COMMIT");
	  echo "<script>swal({ title:'Salary Memo Has Been Updated!',type:'success'}, function(){window.location.href='../../Admin/sal_mem.php'});</script>";
  }
mysqli_query($mysqli,"UNLOCK TABLES");
				
} else 
	{
			echo "<script>swal({ title:'You Already Updated Salary Memo!!',type:'warning'}, function(){window.location.href='../../Admin/salmemedit.php'});</script>";
	}
  
  }
  
  
						

?>

</body>
</html>
