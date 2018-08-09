<?php

 include('../connection.php');
 include('../sanitise.php');
 
	
 
 	$month = sanitise($_GET['month']);
	$year = sanitise($_GET['year']);	
	$type = sanitise($_GET['type']);

	


	$query = mysqli_query($mysqli,"SELECT * FROM prs_save_report 
						  where monthname(prs_save_report.date_create)= '$month'
						  AND year(prs_save_report.date_create)= '$year' 
						  AND prs_save_report.type = '$type';
						 ");
		
		while($row=mysqli_fetch_assoc($query))
		{
			$filename = $row['filename'];
			$file_location = $row['file_location'];
		}
	
  $file = $file_location;
  $filename = $file_name;
  header('Content-type: application/pdf');
  header('Content-Disposition: inline; filename="' . $filename . '"');
  header('Content-Transfer-Encoding: binary');
  header('Accept-Ranges: bytes');
  @readfile($file);
?>

	  
	
	
	

