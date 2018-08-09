<?php
include_once('..//db_connect.php');
session_start();

include_once('log.php');

mysqli_query($connect, "LOCK TABLES cms_account READ");
$f_accountstuper = mysqli_query($connect, "SELECT * FROM cms_account
	WHERE cms_account_ID = '".$_SESSION['user_data']['acct']['cms_account_ID']."'")
	or die(mysqli_error($connect));
	
$accountstuper = mysqli_fetch_array($f_accountstuper);
mysqli_query($connect, "UNLOCK TABLES");
if($accountstuper['emp_no'] == NULL)
{
	mysqli_query($connect, "LOCK TABLES sis_student READ");
	$f_student = mysqli_query($connect, "SELECT *, LEFT(stu_mname, 1) FROM sis_student
		WHERE lrn = '".$accountstuper['lrn']."'")
		or die(mysqli_error($connect));
		
	$stuper = mysqli_fetch_array($f_student);
	mysqli_query($connect, "UNLOCK TABLES");
	
	$lname = $stuper['stu_lname'];
	$fname = $stuper['stu_fname'];
	$mname = $stuper['stu_mname'];
	$no = $stuper['lrn'];
	$gender = $stuper['sis_gender'];
	$bday = $stuper['sis_b_day'];
	
	if($stuper['stu_mname'] == NULL)
	{
		$name = strtoupper($stuper['stu_lname'].', '.$stuper['stu_fname']);

	}		
	else
	{
		$name = strtoupper($stuper['stu_lname'].', '.$stuper['stu_fname'].' '.$stuper['LEFT(stu_mname, 1)']).'.';
	}
			$useru = strtoupper($stuper['stu_fname'].' '.$stuper['stu_lname']);
}
else if($accountstuper['lrn'] == NULL)
{
	mysqli_query($connect, "LOCK TABLES pims_personnel READ");
	$f_personnel = mysqli_query($connect, "SELECT *, LEFT(P_mname, 1) FROM pims_personnel
		WHERE emp_No = '".$accountstuper['emp_no']."'")
		or die(mysqli_error($connect));
		
	$stuper = mysqli_fetch_array($f_personnel);
	mysqli_query($connect, "UNLOCK TABLES");
	
	$lname = $stuper['P_lname'];
	$fname = $stuper['P_fname'];
	$mname = $stuper['P_mname'];
	$no = $stuper['emp_No'];
	$gender = $stuper['pims_gender'];
	$bday = $stuper['pims_birthdate'];
	
	if($stuper['P_mname'] == NULL)
	{
		$name = strtoupper($stuper['P_lname'].', '.$stuper['P_fname']);
	
	}		
	else
	{
		$name = strtoupper($stuper['P_lname'].', '.$stuper['P_fname'].' '.$stuper['LEFT(P_mname, 1)']).'.';
	}
		$useru = strtoupper($stuper['P_fname'].' '.$stuper['P_lname']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Browser's Tab Title -->
    <title>User</title>
      
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../../css/bootstrap/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="../../css/w3.css">
    
    <!-- Documents Path --->
    <link rel="stylesheet" href="../../docs/docs.min.css">
    <link rel="stylesheet" href="../../css/sidebar-menu.css">
    <link rel="stylesheet" href="../../css/t.css">
    
    
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
    .snip1578 {
  font-family: 'Open Sans', Arial, sans-serif;
  position: relative;
  display: inline-block;
  margin: 40px 15px;
  min-width: 230px;
  max-width: 315px;
  width: 100%;
  color: #000;
  text-align: left;
  font-size: 16px;
  background: #d9edf7;
  border-radius: 5px;
}

.snip1578 *,
.snip1578:before,
.snip1578:after {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-transition: all 0.4s ease;
  transition: all 0.4s ease;
}

.snip1578 img {
  max-width: 35%;
  margin-top: -15px;
  margin-left: 60%;
  margin-bottom: 15px;
  backface-visibility: hidden;
  vertical-align: top;
  border-radius: 5px;
}

.snip1578 figcaption {
  position: absolute;
  top: 0;
  right: 40%;
  left: 0;
  bottom: 0;
  padding: 15px;
}

.snip1578 h3 {
  margin: 0;
  font-size: 1.1em;
  font-weight: normal;
}



/* Demo purposes only */

</style>	
	<style>
	body {
        color: #404E67;
        background: #FFFFFF;
		font-family: 'arial', sans-serif;
	}	
	.icon-background4 {
    color: #36f40b;
	}
    dt{
            font-size: small;
        }        
	</style>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50%">
<?php include "../../pages/include/header_stuper.php"; ?>



<div class="row">
        <div class="container-fluid" style="height:700px;max-width:100%;margin-top:70px;margin-right:100px;margin-left:100px;margin-bottom:10px">
                <div class="col-lg-12">
                    <h1 class="page-header">Consultation History <small><small> My Patient Records</small></small>
                   </h1>
                 </div>
                <!-- /.col-lg-12 -->
                <!-- /.col-lg-12 -->
                            <?php
							
							?>
            <div class="col-lg-12">
                  
				
				<div class="panel-heading">
                </div>  
					</form>
                 <div class="col-lg-12">


					 <div class="panel panel-primary">                       
							<div class="panel-body">
						
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th><small>Date</small></th>
                                        <th><small>Complaint</small></th>
                                        <th><small>Diagnosis</small></th>
                                        <th><small>Treatment</small></th>
                                        <th><small>Medicine</small></th>
                                        <th><small>Quantity</small></th>
                                    </tr>
                                </thead>
                                <tbody id = "txtHint">
									<?php 
									
									mysqli_query($connect, "LOCK TABLES scms_consultation, scms_prescription, cms_account, sis_student, cms_account, pims_personnel, scms_prescription, scms_medicine READ");
									$fetch_consult = mysqli_query($connect, 
										"SELECT * FROM scms_consultation, scms_prescription, cms_account
										WHERE scms_consultation.patient_id = scms_prescription.patient_id
                                        AND cms_account.cms_account_ID = scms_consultation.cms_account_ID
                                        AND cms_account.cms_account_ID = '".$_SESSION['user_data']['acct']['cms_account_ID']."'
										GROUP BY scms_consultation.patient_id
										ORDER BY scms_consultation.patient_id DESC")
										or die("Error: Could not fetch rows!".mysqli_error($connect));
										
									
									
									$count = 1;
									while($row = mysqli_fetch_array($fetch_consult))
									{
										if($row['emp_no'] == NULL)
										{
											$f_name = mysqli_query($connect, "SELECT * FROM sis_student, cms_account
											WHERE sis_student.lrn = '".$row['lrn']."'
											AND sis_student.lrn = cms_account.lrn")
											or die("Error: ".mysqli_error($connect));
											$name = mysqli_fetch_array($f_name);
											$n = $name['stu_lname'].', '.$name['stu_fname'];
										}
										else if($row['lrn'] == NULL)
										{
											$f_name = mysqli_query($connect, "SELECT * FROM pims_personnel, cms_account
											WHERE pims_personnel.emp_No = '".$row['emp_no']."'
											AND pims_personnel.emp_No = cms_account.emp_no")
											or die("Error: ".mysqli_error($connect));
											$name = mysqli_fetch_array($f_name);
											$n = $name['P_lname'].', '.$name['P_fname'];
										}
										
										$patno = $row['patient_id'];
										
										$presc = mysqli_query($connect, "SELECT * FROM scms_prescription, scms_medicine 
											WHERE patient_id = '".$patno."' && scms_prescription.med_no = scms_medicine.med_no
											ORDER BY patient_id")
											or die("Error: ".mysqli_error($connect));
											
										$med = "";
										$qty = "";
										while ($pres = mysqli_fetch_array($presc))
										{
											$med =  $pres['gen_name'] . '<br/>'. $med ;
											$qty =  $pres['pres_qty'] . '<br/>'. $qty ;
										}
										
										echo'
										<tr class="odd gradeX">
										<td><small>'.$row['cons_date'].'</small></td>
                                        <td><small>'.$row['complaint'].'</small></td>
                                        <td><small>'.$row['diagnosis'].'</small></td>
                                        <td><small>'.$row['treatment'].'</small></td>
                                        <td><small>'.$med.'</small></td>
                                         <td class="center"><small>'.$qty.'</small></td>
										
										';
									}
									mysqli_query($connect, "UNLOCK TABLES");
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
		</div>	
		</div>	

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/alert.js"></script>
<script src="../js/slideshow.js"></script>
<script src="../js/backToTop.js"></script>
<script src="../js/sideNavII.js"></script>
<script src="../js/showNav.js"></script>
    
<!-- Footer -->
<?php include "../../pages/include/footer_user.php"; ?>

    
</body>
</html>