<?php

include("../../db_connect.php");
session_start();
include("../include/session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Browser's Tab Title -->
    <title>Admin</title>
      
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../../css/bootstrap/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="../../css/w3.css">
    
    <!-- Documents Path --->
    <link rel="stylesheet" href="../../docs/docs.min.css">
    <link rel="stylesheet" href="../../css/sidebar-menu.css">
    <link rel="stylesheet" href="../../css/s.css">
    <link rel="stylesheet" href="../../css/tabs.css">
    <link rel="stylesheet" href="../../css/tabstyles.css">
    
	    <!-- DataTables CSS -->
    <link href="../../Template (reference)/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../../Template (reference)/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
	
    
    <!-- Icons CSS -->
    <link rel="stylesheet" href="../../css/font-awesome/css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
    <!-- Browser's Tab Image -->
    <link rel="shortcut icon" href="../../docs/img/pnhs_favicon.ico" type="image/x-icon">
    <link rel="icon" href="../../docs/img/pnhs_favicon.ico" type="image/x-icon">
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../../Template (reference)/vendor/jquery/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="../../Template (reference)/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Bootstrap -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<script>
	function showWeek(str) {
	  if (str=="") {
		document.getElementById("txtHint").innerHTML="";
		return;
	  } 
	  if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	  } else { // code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  xmlhttp.onreadystatechange=function() {
		if (this.readyState==4 && this.status==200) {
		  document.getElementById("txtHint").innerHTML=this.responseText;
		}
	  }
	  xmlhttp.open("GET","getweek.php?q="+str,true);
	  xmlhttp.send();
	}
	</script>
	<style>
body {
        color: #404E67;
        background: #FFFFFF;
		font-family: 'arial', sans-serif;
	}	

	.icon-background4 {
    color: #36f40b;
	}
	</style>
</head>

<body>

<?php
$q = strval($_GET['q']);

$num =explode("-",$q);  
	if($num[3] == 0)
	{
		$start = $num[0].'-'.$num[1].'-'.$num[2];
		$end = date('Y-m-t',strtotime($start));
	}
	else if($num[3] == 1)
	{
		$start = $num[0].'-'.$num[1].'-'.$num[2];
		$end = date( "Y-m-d" ,strtotime('next Saturday', strtotime($start)));
	}
	else if($num[3] == 4)
	{
		$start = $num[0].'-'.$num[1].'-'.$num[2];
		$end = date('Y-m-t',strtotime($start));
	}
	else
	{
		$start = $num[0].'-'.$num[1].'-'.$num[2]; 
		$end = date( "Y-m-d" ,strtotime('+6 day', strtotime($start )));
	}
	
	mysqli_query($mysqli, "LOCK TABLES scms_consultation, scms_prescription, cms_account, scms_medicine READ");

	$fetch_consult = mysqli_query($mysqli, 
		"SELECT * FROM scms_consultation, scms_prescription, cms_account
		WHERE scms_consultation.patient_id = scms_prescription.patient_id
		AND cms_account.cms_account_ID = scms_consultation.cms_account_ID
		AND cons_date BETWEEN '".$start."' AND '".$end."'
		GROUP BY scms_consultation.patient_id
		ORDER BY scms_consultation.patient_id DESC")
		or die("Error: Could not fetch rows!".mysqli_error($mysqli));
		
	
	
	$count = 1;
	while($row = mysqli_fetch_array($fetch_consult))
	{
		if($row['emp_no'] == NULL)
		{
			$f_name = mysqli_query($mysqli, "SELECT * FROM sis_student, cms_account
			WHERE sis_student.lrn = '".$row['lrn']."'
			AND sis_student.lrn = cms_account.lrn")
			or die("Error: ".mysqli_error($mysqli));
			$name = mysqli_fetch_array($f_name);
			$n = strtoupper($name['stu_lname'].', '.$name['stu_fname']);
		}
		else if($row['lrn'] == NULL)
		{
			$f_name = mysqli_query($mysqli, "SELECT * FROM pims_personnel, cms_account
			WHERE pims_personnel.emp_No = '".$row['emp_no']."'
			AND pims_personnel.emp_No = cms_account.emp_no")
			or die("Error: ".mysqli_error($mysqli));
			$name = mysqli_fetch_array($f_name);
			$n = strtoupper($name['P_lname'].', '.$name['P_fname']);
		}
		
		$patno = $row['patient_id'];
		
		$presc = mysqli_query($mysqli, "SELECT * FROM scms_prescription, scms_medicine 
			WHERE patient_id = '".$patno."' && scms_prescription.med_no = scms_medicine.med_no
			ORDER BY patient_id")
			or die("Error: ".mysqli_error($mysqli));
			
		$med = "";
		$qty = "";
		while ($pres = mysqli_fetch_array($presc))
		{
			$med =  $pres['brand_name'] . '<br/>'. $med ;
			$qty =  $pres['pres_qty'] . '<br/>'. $qty ;
		}
		
		echo'
		<tr class="odd gradeX">
		
		<td><small>'.$n.'</small></td>
		<td><small>'.$row['cons_date'].'</small></td>
		<td><small>'.$row['complaint'].'</small></td>
		<td><small>'.$row['diagnosis'].'</small></td>
		<td><small>'.$row['treatment'].'</small></td>
		<td><small>'.$med.'</small></td>
        <td class="center"><small>'.$qty.'</small></td>
		</tr>
		';
	}
	
	mysqli_query($mysqli, "UNLOCK TABLES");
						  
mysqli_close($mysqli);
?>
 
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../js/alert.js"></script>
<script src="../../js/slideshow.js"></script>
<script src="../../js/backToTop.js"></script>
<script src="../../js/sideNavII.js"></script>
<script src="../../js/showNav.js"></script>
<script src="../../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../../vendor/datatables-responsive/dataTables.responsive.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../Template%20(reference)/vendor/jquery/jquery-3.0.0.min.js"></script>
<script src="../../js/sidebar-menu.js"></script>
<script src="../../js/sideNav.js"></script>
<script>
$.sidebarMenu($('.sidebar-menu'))
</script>
<script src="../../js/cbpFWTabs.js"></script>
		<script>
			(function() {

				[].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
					new CBPFWTabs( el );
				});

			})();
		</script>
</body>
</html>