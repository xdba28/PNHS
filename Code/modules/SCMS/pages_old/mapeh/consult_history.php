<?php

include("../../db_connect.php");
session_start();

mysqli_query($mysqli, "LOCK TABLES cms_account, sis_student, pims_personnel READ");
$f_accountstuper = mysqli_query($mysqli, "SELECT * FROM cms_account
	WHERE cms_account_ID = '".$_SESSION['user_data']['acct']['cms_account_ID']."'")
	or die(mysqli_error($mysqli));
	
$accountstuper = mysqli_fetch_array($f_accountstuper);

if($accountstuper['emp_no'] == NULL)
{
	$f_student = mysqli_query($mysqli, "SELECT *, LEFT(stu_mname, 1) FROM sis_student
		WHERE lrn = '".$accountstuper['lrn']."'")
		or die(mysqli_error($mysqli));
		
	$stuper = mysqli_fetch_array($f_student);
	$lname = $stuper['stu_lname'];
	$fname = $stuper['stu_fname'];
	$mname = $stuper['stu_mname'];
	$no = $stuper['lrn'];
	$gender = $stuper['sis_gender'];
	$bday = $stuper['sis_b_day'];
	
	if($stuper['stu_mname'] == NULL)
	{
		$name = $stuper['stu_lname'].', '.$stuper['stu_fname'];
	}		
	else
	{
		$name = $stuper['stu_lname'].', '.$stuper['stu_fname'].' '.$stuper['LEFT(stu_mname, 1)'].'.';
	}
	
}
else if($accountstuper['lrn'] == NULL)
{
	$f_personnel = mysqli_query($mysqli, "SELECT *, LEFT(P_mname, 1) FROM pims_personnel
		WHERE emp_No = '".$accountstuper['emp_no']."'")
		or die(mysqli_error($mysqli));
		
	$stuper = mysqli_fetch_array($f_personnel);
	$lname = $stuper['P_lname'];
	$fname = $stuper['P_fname'];
	$mname = $stuper['P_mname'];
	$no = $stuper['emp_No'];
	$gender = $stuper['pims_gender'];
	$bday = $stuper['pims_birthdate'];
	
	if($stuper['P_mname'] == NULL)
	{
		$name = $stuper['P_lname'].', '.$stuper['P_fname'];
	}		
	else
	{
		$name = $stuper['P_lname'].', '.$stuper['P_fname'].' '.$stuper['LEFT(P_mname, 1)'].' .';
	}
}

mysqli_query($mysqli, "UNLOCK TABLES");

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
	<link rel="stylesheet" href="../../css/style.css">
    <!-- DataTables CSS -->
    <link href="../../Template (reference)/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../../Template (reference)/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="../../Template (reference)/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <!-- Optional theme -->
    <link rel="stylesheet" href="../../css/w3.css">
    
    <!-- Documents Path -->
    <link rel="stylesheet" href="../../docs/docs.min.css">
    <link rel="stylesheet" href="../../css/sidebar-menu.css">
    <link rel="stylesheet" href="../../css/t.css">
    <link rel="stylesheet" href="../../css/style.css">
	<link rel="stylesheet" href="../../css/metisMenu.min.css" type="text/css">
    
    
    <!-- Icons CSS -->
    <link rel="stylesheet" href="../../css/font-awesome/css/font-awesome.min.css" type="text/css">
    
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

                <?php include("../include/topnav.php"); ?>
        <div id="wrapper">
                        <?php include("../include/sidenav.php"); ?>
            <div id="page-content-wrapper">
            <div class="container-fluid" style="margin-right:40px;margin-left:70px;">
			<ol class="breadcrumb">
				<li><a href="index.php">School Clinic</a></li>
				<li class="active">Consultation History</li>
			</ol>
                <div class="container-fluid">
                    <h1 class="page-header">Consultation History <small><small> Clinic Visitations</small></small>
                   </h1>
                </div>

                 <div class="col-lg-12">
					 <div class="panel panel-primary">                       
							<div class="panel-body">
						
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th><small>Date</small></th>
                                        <th><small>Time In-Out</small></th>
                                        <th><small>Complaint</small></th>
                                        <th><small>Diagnosis</small></th>
                                        <th><small>Treatment</small></th>
                                        <th><small>Medicine</small></th>
                                        <th><small>Quantity</small></th>
                                    </tr>
                                </thead>
                                <tbody id = "txtHint">
									<?php 
									
									mysqli_query($mysqli, "LOCK TABLES scms_consultation, scms_prescription, cms_account, sis_student, cms_account, pims_personnel, scms_prescription, scms_medicine READ");
									$fetch_consult = mysqli_query($mysqli, 
										"SELECT *, TIME_FORMAT(cons_time_in, '%h:%i') AS time_in,  TIME_FORMAT(cons_time_out, '%h:%i') AS time_out, DATE_FORMAT(cons_date, '%a, %M %d, %Y') AS date  FROM scms_consultation, scms_prescription, cms_account
										WHERE scms_consultation.patient_id = scms_prescription.patient_id
                                        AND cms_account.cms_account_ID = scms_consultation.cms_account_ID
                                        AND cms_account.cms_account_ID = '".$_SESSION['user_data']['acct']['cms_account_ID']."'
										GROUP BY scms_consultation.patient_id
										ORDER BY scms_consultation.patient_id DESC")
										or die("Error: Could not fetch rows!".mysqli_error($mysqli));
										
									
									
									$count = 1;
									while($row = mysqli_fetch_array($fetch_consult))
									{
                                        $time = $row['time_in'].'-'.$row['time_out'];
                                        $date = $row['date'];
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
											$med =  $pres['gen_name'] . '<br/>'. $med ;
											$qty =  $pres['pres_qty'] . '<br/>'. $qty ;
										}
										
										echo'
										<tr class="odd gradeX">
										<td><small>'.$date.'</small></td>
										<td><small>'.$time.'</small></td>
                                        <td><small>'.$row['complaint'].'</small></td>
                                        <td><small>'.$row['diagnosis'].'</small></td>
                                        <td><small>'.$row['treatment'].'</small></td>
                                        <td><small>'.$med.'</small></td>
                                         <td class="center"><small>'.$qty.'</small></td>
										
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
                    <!-- /.panel -->

                </div> 
               
	</div>
<br><br><br><br><br><br>	
    <?php include("../include/footer.php"); ?>

        <!-- /#page-content-wrapper -->
       	
	<!--/.row-->
	
	</div>		
	</div>
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
<script src="../../js/index.js"></script>
<script src="../../js/metisMenu.min.js"></script>    
<script src="../../js/sb-admin-2.min.js"></script>
<script>
$.sidebarMenu($('.sidebar-menu'))
</script>

 
</body>

</html>