<?php

include("../../db_connect.php");
session_start();
include("../include/session.php");

$d = base64_url_decode($_GET['d']);
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
    
    <!-- Documents Path -->
    <link rel="stylesheet" href="../../docs/docs.min.css">
    <link rel="stylesheet" href="../../css/sidebar-menu.css">
    <link rel="stylesheet" href="../../css/s.css">
    <link rel="stylesheet" href="../../css/tabs.css">
    <link rel="stylesheet" href="../../css/tabstyles.css">
    <link rel="stylesheet" href="../../css/style.css">
	<link rel="stylesheet" href="../../css/metisMenu.min.css" type="text/css">
    
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
            <?php include("../include/sidenav.php"); ?>
                <?php include("../include/topnav.php"); ?>
        <div id="wrapper">
            <div id="page-content-wrapper">
            <div class="container-fluid" style="margin-right:40px;margin-left:70px;">
			<ol class="breadcrumb">
				<li><a href="index.php">School Clinic</a></li>
				<li><a href="patient.php">Patient Records</a></li>
				<li class="active">Month of 
				<?php 
							
							$revcon = chop($d, "%");
							$num =explode("-",$revcon);
							$monthName = date("F", mktime(0, 0, 0, $num[1], 10));
							echo strtoupper($monthName);?>
				</li>
			</ol>
				<form action="../../fpdf/print_monthly_pat.php" method="post">
                <div class="col-lg-12">
                    <h1 class="page-header">Patient Records <small><small>Student and Personnel Records</small></small>
					<button type="submit"  name = "submit_week" style="float:right" class="btn btn-primary btn-square btn-xl" data-toggle="tooltip" data-placement="left" title="Print Nutritional Status Record">Print <i class="fa fa-print"></i></button></h1>
                </div>

                <!-- /.col-lg-12 -->
                            <?php
							$revcon = chop($d, "%");
							$num =explode("-",$revcon);
							$monthName = date("F", mktime(0, 0, 0, $num[1], 10));
										
										
							$firstDayOfMonth = $revcon.'-01';    // Try also with first day of other months

										$week1 = $firstDayOfMonth;
										$week2 = date( "Y-m-d" ,strtotime('next Sunday', strtotime( $week1 ) ) );
										$week3 = date( "Y-m-d" ,strtotime('+1 week', strtotime( $week2 ) ) );
										$week4 = date( "Y-m-d" ,strtotime('+1 week', strtotime( $week3 ) ) );
										$week5 = date( "Y-m-d" ,strtotime('+1 week', strtotime( $week4 ) ) );
										
										$endof1 = date( "Y-m-d" ,strtotime('next Saturday', strtotime( $week1 ) ) );
										$endof2 = date( "Y-m-d" ,strtotime('+1 week', strtotime( $endof1 ) ) );
										$endof3 = date( "Y-m-d" ,strtotime('+1 week', strtotime( $endof2 ) ) );
										
										$lastday = date('Y-m-t',strtotime($firstDayOfMonth));

							mysqli_query($mysqli, "LOCK TABLES scms_consultation READ");			
							$fetchmo = mysqli_query($mysqli,"SELECT MONTHNAME(cons_date), YEAR(cons_date), MONTH(cons_date) FROM scms_consultation
										WHERE cons_date LIKE '".$d."'")
										or die(mysqli_error($mysqli));
							$mo = mysqli_fetch_array($fetchmo);
							mysqli_query($mysqli, "UNLOCK TABLES");
							?>
							
			<div class="col-lg-12">
                    <div class="row row-ribbon bg-info text-default" style="padding-left: 20px">
                    <br><p><strong>Note: </strong> These are the list of people who were taken in the clinic for this month.</p><br>
                    </div><br>
            </div> 
			<br>
			
            <div class="col-lg-12">
			
                <div class="col-lg-4">
					<div class="panel-heading">
                    <h3><small><i>Month of </i></small><b> <?php echo strtoupper($monthName);?></b></h3>
                    </div>  
                </div>
				
                <div class="col-xs-3" style="float:right"> 
					
                    <select  class="form-control" style="float:right;margin-top:20px" class="btn btn-default" name="week" onchange="showWeek(this.value)">
                        <option value = "<?php echo $week1.'-0';?>"><span>Choose Week</span></option>
						<option value = "<?php echo $week1.'-1';?>"><span>1st Week</span></option>
						<option value = "<?php echo $week2.'-2';?>"><span>2nd Week</span></option>
						<option value = "<?php echo $week3.'-3';?>"><span>3rd Week</span></option>
						<option value = "<?php echo $week4.'-4';?>"><span>4th Week</span></option>
                    </select>
					
                </div>        
				
			</div>  
			</form>
			
                 <div class="col-lg-12">
					 <div class="panel panel-primary">                       
							<div class="panel-body tooltip-demo">
						
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th><small>Name</small></th>
                                        <th><small>Date</small></th>
                                        <th><small>Complaint</small></th>
                                        <th><small>Diagnosis</small></th>
                                        <th><small>Treatment</small></th>
                                        <th><small>Medicine</small></th>
                                        <th><small>Quantity</small></th>
                                    </tr>
                                </thead>
                                <tbody  id = "txtHint">
									<?php 
									mysqli_query($mysqli, "LOCK TABLES scms_consultation, scms_prescription, cms_account, sis_student, pims_personnel READ");
									$fetch_consult = mysqli_query($mysqli, 
										"SELECT *, DATE_FORMAT(cons_date, '%b %e, %Y') as date FROM scms_consultation, scms_prescription, cms_account
										WHERE scms_consultation.patient_id = scms_prescription.patient_id
                                        AND cms_account.cms_account_ID = scms_consultation.cms_account_ID
										AND cons_date LIKE '".$d."'
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
											$n = $name['stu_lname'].', '.$name['stu_fname'];
										}
										else if($row['lrn'] == NULL)
										{
											$f_name = mysqli_query($mysqli, "SELECT * FROM pims_personnel, cms_account
											WHERE pims_personnel.emp_No = '".$row['emp_no']."'
											AND pims_personnel.emp_No = cms_account.emp_no")
											or die("Error: ".mysqli_error($mysqli));
											$name = mysqli_fetch_array($f_name);
											$n = $name['P_lname'].', '.$name['P_fname'];
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
											$med =  $pres['brand_name'].'<br/>'.$med ;
											$qty =  $pres['pres_qty'].'<br/>'.$qty ;
										}
										
										echo'
										<tr class="odd gradeX">
										
                                        <td><small>'.strtoupper($n).'</small></td>
										<td><small>'.$row['date'].'</small></td>
                                        <td><small>'.$row['complaint'].'</small></td>
                                        <td><small>'.$row['diagnosis'].'</small></td>
                                        <td><small>'.$row['treatment'].'</small></td>
                                        <td><small>'.$med.'</small></td>
                                         <td class="center"><small>'.$qty.'</small></td>
										</tr>
										';
									}
									mysqli_query($mysqli, "UNLOCK TABLES");
									?>                                    
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
					<!-- /.panel-primary -->
				</div>
                <!-- /.col-lg-12 -->   

	
	</div>
	<br><br><br>
        <?php include "../../pages/include/footer.php"; ?>	
	</div>
	</div>
	<!--/.row-->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../Template%20(reference)svendor/jquery/jquery-3.0.0.min.js"></script>
<script src="../../js/sidebar-menu.js"></script>
<script src="../../js/sideNav.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../js/alert.js"></script>
<script src="../../js/index.js"></script>    
<script src="../../js/slideshow.js"></script>
<script src="../../js/backToTop.js"></script>
<script src="../../js/sideNavII.js"></script>
<script src="../../js/showNav.js"></script>
<script src="../../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../../vendor/datatables-responsive/dataTables.responsive.js"></script>
<script src="../../js/metisMenu.min.js"></script>     
<script src="../../js/sb-admin-2.min.js"></script>
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

<!-- Footer -->


</body>

</html>
