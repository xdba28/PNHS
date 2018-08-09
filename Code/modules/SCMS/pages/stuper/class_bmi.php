
<?php 
include("../../db_connect.php");
session_start();
include("../include/session.php"); 


mysqli_query($mysqli, "LOCK TABLES cms_account, sis_student, pims_personnel READ");
	
$f_accountstuper = mysqli_query($mysqli, "SELECT * FROM cms_account
	WHERE cms_account_ID = '".$_SESSION['user_data']['acct']['cms_account_ID']."'")
	or die(mysqli_error($mysqli));
	
$accountstuper = mysqli_fetch_array($f_accountstuper);


$f_personnel = mysqli_query($mysqli, "SELECT *, LEFT(P_mname, 1) FROM pims_personnel
	WHERE emp_No = '".$accountstuper['emp_no']."'")
	or die(mysqli_error($mysqli));
	
$stuper = mysqli_fetch_array($f_personnel);
$lname = strtoupper($stuper['P_lname']);
$fname = strtoupper($stuper['P_fname']);
$mname = strtoupper($stuper['P_mname']);
$no = $stuper['emp_No'];
$nostat = "Employee Number";
$gender = strtoupper($stuper['pims_gender']);
$bday = strtoupper($stuper['pims_birthdate']);
$temp = '<dt>Temporary Address</dt><dd>'.$stuper['temp_address_street'].' '.$stuper['temp_address_house_no'].' '.$stuper['temp_address_subdivision_village'].' '.$stuper['temp_address_barangay'].', '.$stuper['temp_address_municipality_city'].', '.$stuper['temp_address_province'].'</dd>';
$perm = '<dt>Permanent Address</dt><dd>'.$stuper['perm_address_street'].' '.$stuper['perm_address_house_no'].' '.$stuper['perm_address_subdivision_village'].' '.$stuper['perm_address_barangay'].', '.$stuper['perm_address_municipality_city'].', '.$stuper['perm_address_province'].'</dd>';
$place = $temp.'<br/>'.$perm.'<br/>';
$status = strtoupper($stuper['civil_status']);
$religion = strtoupper($stuper['pims_religion']);
$statusacc = "Personnel";

if($stuper['P_mname'] == NULL)
{
	$name = strtoupper($stuper['P_lname'].', '.$stuper['P_fname']);

	}		
	else
	{
		$name = strtoupper($stuper['P_lname'].', '.$stuper['P_fname'].' '.$stuper['LEFT(P_mname, 1)']).' .';
	}
		$useru = strtoupper($stuper['P_fname'].' '.$stuper['P_lname']);

mysqli_query($mysqli, "UNLOCK TABLES");

$fetch_sectioname = mysqli_query($mysqli, "SELECT *, DATE_FORMAT(sis_b_day, '%b %e, %Y') as sis_day FROM sis_student, cms_account, sis_stu_rec, css_school_yr, css_section, pims_employment_records,pims_personnel
											WHERE sis_student.lrn = cms_account.lrn
											AND sis_student.lrn = sis_stu_rec.lrn
											AND css_school_yr.sy_id = sis_stu_rec.sy_id 
											AND css_section.SECTION_ID = sis_stu_rec.section_id
											AND css_school_yr.status = 'active'
											AND css_section.sy_id=css_School_yr.sy_id
											AND pims_employment_records.emp_rec_id=css_section.emp_rec_id
                    AND pims_employment_records.emp_no=pims_personnel.emp_no
											AND pims_employment_records.emp_no='".$accountstuper['emp_no']."'")
											or die(mysqli_error($mysqli));
											
		$secname = mysqli_fetch_assoc($fetch_sectioname);	
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Browser's Tab Title -->
    <title>PNHS</title>
      
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
    
    <!-- Documents Path --->
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
            <?php if(isset($_SESSION['user_data']['acct']['emp_no'])){
                include("../include/sidenav.php");
            }
            ?>
            <div class="container-fluid" style="margin-right:40px;margin-left:70px;">
			<ol class="breadcrumb">
				<li><a href="index.php">Health Monitoring</a></li>
				<li class="active">Consultation History</li>
			</ol>
                <div class="container-fluid">
                    <h1 class="page-header">BMI Record <small><small> SECTION: <?php echo $secname['SECTION_NAME'];?></small></small>
					<a href="../../fpdf/print_class_bmi.php?section=<?php echo base64_url_encode($secname['SECTION_ID']);?>"><button type="button" style="float:right;margin-left:10px" class="btn btn-primary btn-square btn-xl " data-toggle="tooltip" data-placement="left" title="Print Nutritional Status Record">Print <i class="fa fa-print"></i></button> </a>
                   </h1>
                </div>
                 <div class="col-lg-12">
					 <div class="panel panel-primary">                       
							<div class="panel-body tooltip-demo">
						
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><small>Name</small></th>
                                        <th><small>Birthday</small></th>
                                        <th><small>Sex</small></th>
                                        <th><small>Age</small></th>
                                        <th><small>Height (cm)</small></th>
                                        <th><small>Weight (kg)</small></th>
                                        <th><small>BMI</small></th>
                                        <th><small>Status</small></th>
                                    </tr>
                                </thead>
                                <tbody id = "txtHint">
									<?php 
									
									
									$fetch_all = mysqli_query($mysqli, "SELECT *, DATE_FORMAT(sis_b_day, '%b %e, %Y') as sis_day FROM sis_student, cms_account, sis_stu_rec, css_school_yr, css_section, pims_employment_records,pims_personnel
											WHERE sis_student.lrn = cms_account.lrn
											AND sis_student.lrn = sis_stu_rec.lrn
											AND css_school_yr.sy_id = sis_stu_rec.sy_id 
											AND css_section.SECTION_ID = sis_stu_rec.section_id
											AND css_school_yr.status = 'active'
											AND css_section.sy_id=css_School_yr.sy_id
											AND pims_employment_records.emp_rec_id=css_section.emp_rec_id
                    AND pims_employment_records.emp_no=pims_personnel.emp_no
											AND pims_employment_records.emp_no='".$accountstuper['emp_no']."'")
											or die(mysqli_error($mysqli));
										
									
									
									$countall = 1;
                                    
									while($all = mysqli_fetch_array($fetch_all))
									{
										 //date in mm/dd/yyyy format; or it can be in other formats as well
											  $birthDate = $all['sis_b_day'];
											  //explode the date to get month, day and year
											  $birthDate = explode("-", $birthDate);
											  //get age from date or birthdate
											  $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md")
												? ((date("Y") - $birthDate[0]) - 1)
												: (date("Y") - $birthDate[0]));
										
                                        $fetch_studs = mysqli_query($mysqli, "SELECT * FROM scms_bmi_rec WHERE cms_account_ID = '".$all['cms_account_ID']."'")
											or die(mysqli_error($mysqli));
											
										$studs=mysqli_fetch_assoc($fetch_studs);	
										if(empty($studs)){
											$h = "";
											$w = "";
											$bmi = "";
											$stat = "";
										}else{
											$h = $studs['height'];
											$w = $studs['weight'];
											$bmi = $studs['bmi'];
											$stat = $studs['nutri_status'];
										}
										
										$countall++;
											echo'
											<tr class="odd gradeX">
											<td><small>'.$countall.'</small></td>
											<td><small><p>'.strtoupper($all['stu_lname'].', '.$all['stu_fname']).'</p></small></td>
                                            <td><small>'.$all['sis_day'].'</small></td>
											<td><small>'.$all['sis_gender'].'</small></td>
											<td><small>'.$age.'</small></td>
											<td><small><p>'.$h.'</p></small></td>
											<td><small><p>'.$w.'</p></small></td>
											<td><small>'.$bmi.'</small></td>
											<td><small>'.$stat.'</small></td>
											</tr>';
									}
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

        <!-- /#page-content-wrapper -->
       	
	<!--/.row--> <br><br><br><br>
            <?php include "../../pages/include/footer.php"; ?>
    </div>
    
    <script src="../../js/index.js"></script>    
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../js/alert.js"></script>
<script src="../../js/slideshow.js"></script>
<script src="../../js/backToTop.js"></script>
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

<!-- Morris Charts JavaScript -->
    <script src="../../vendor/raphael/raphael.min.js"></script>
    <script src="../../vendor/morrisjs/morris.min.js"></script>
    <script src="../../data/morris-data.js"></script>
<script src="../../js/metisMenu.min.js"></script>    
<script src="../../js/sb-admin-2.min.js"></script>
<script>
$.sidebarMenu($('.sidebar-menu'))
</script>
<script>
    // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })
    </script>

</body>

</html>
