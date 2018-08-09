<?php
include("../../db_connect.php");
session_start();

include("../include/session.php");  



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
				<li class="active">BMI Records</li>
			</ol>
                <div class="container-fluid">
                    <h1 class="page-header">List Of Classes</h1>
                </div>
                <!-- /.col-lg-12 -->
				<div class="col-lg-12">
                    <div class="row row-ribbon bg-info text-default" style="padding-left: 20px">
                    <br><p><strong>Note: </strong> These are the list of classes by year level with the students' Medical Records.</p><br>
                    </div><br>
                </div> 
				<!-- /.col-lg-6 -->
                <div class="col-lg-12">
                        <div class="panel-heading">
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <?php
								$fetch_yrlvl = mysqli_query($mysqli, "SELECT DISTINCT(YEAR_LEVEL) FROM css_section ORDER BY YEAR_LEVEL")
								or die(mysqli_error($mysqli));
								
								$countyr = 1;
								while($yrlvl = mysqli_fetch_array($fetch_yrlvl))
								{	
									if($countyr == 1)
									{
										echo'
										<li class="active"><a href="#g'.$yrlvl['YEAR_LEVEL'].'" data-toggle="tab">Grade '.$yrlvl['YEAR_LEVEL'].'</a>
										</li>
										';
									}
									else
									{
										echo'
										<li><a href="#g'.$yrlvl['YEAR_LEVEL'].'" data-toggle="tab">Grade '.$yrlvl['YEAR_LEVEL'].'</a>
										</li>
										';
									}
									$countyr++;
									
								}
								?>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
								<?php
								$county = 0;
								mysqli_query($mysqli, "LOCK TABLES css_section, css_school_yr, sis_student, cms_account, scms_bmi_rec, sis_stu_rec READ");
								$yrlvl = mysqli_query($mysqli, "SELECT DISTINCT(`YEAR_LEVEL`) FROM css_section ORDER BY `YEAR_LEVEL`")
								or die(mysqli_error($mysqli));
								while($rlvl = mysqli_fetch_array($yrlvl))
								{	
									$county++;
							
									$fetch_section = mysqli_query($mysqli, "SELECT * FROM css_section, css_school_yr
										WHERE `YEAR_LEVEL` = '".$rlvl['YEAR_LEVEL']."'
										AND css_school_yr.sy_id = css_section.sy_id
										AND status = 'active'")
										or die(mysqli_error($mysqli));
										
									if($county == 1)
									{
										echo' 
										
										<div class="tab-pane fade in active" id="g'.$rlvl['YEAR_LEVEL'].'">
											<hr>
												<div class="row">';
												while($section = mysqli_fetch_array($fetch_section))
												{
													 $fetch_overall = mysqli_query($mysqli, "SELECT *, COUNT(sis_student.lrn) AS Total FROM sis_student, cms_account, sis_stu_rec
														WHERE sis_student.lrn = cms_account.lrn
														AND sis_student.lrn = sis_stu_rec.lrn
														AND section_id = '".$section['SECTION_ID']."'
														AND sy_id = '".$section['sy_id']."'")
														or die(mysqli_error($mysqli));
																
														$t_stud=mysqli_fetch_array($fetch_overall);
												        $sec = base64_url_encode($section['SECTION_ID']);
                                                    
													$fetch_all = mysqli_query($mysqli, "SELECT * FROM sis_student, cms_account, scms_bmi_rec, sis_stu_rec
														WHERE sis_student.lrn = cms_account.lrn
														AND cms_account.cms_account_ID = scms_bmi_rec.cms_account_ID
														AND sis_student.lrn = sis_stu_rec.lrn
														AND section_id = '".$section['SECTION_ID']."'
														AND sy_id = '".$section['sy_id']."'")
														or die(mysqli_error($mysqli));
													$countbmi = 0;
													while($all = mysqli_fetch_array($fetch_all))
													{
														$countbmi++;
													}
													
													if($countbmi == 0)
													{
														if($t_stud['Total'] == 0)
														{
															echo'
										<div class="col-lg-3 ">
											<div class="panel panel-primary">
											<a href = "view.php?sec_id='.$sec.'">
												<div class="panel-heading">
													<div class="row">
														<div class="col-xs-3">
															<img src="../../img/student.png" height=50; width=50;>
														</div>
														<div class="col-xs-9 text-right">
															<div class="huge"<strong>'.$t_stud['Total'].'</strong></div><br>
															<div><strong>'.strtoupper($section['SECTION_NAME']).'</strong></div>
														</div>
													</div>
												</div>
											</a>
											</div>
										</div>';
														}
														else
														{
															echo'
										<div class="col-lg-3 ">
											<div class="panel panel-primary">
											<a href = "view.php?sec_id='.$sec.'">
												<div class="panel-heading">
													<div class="row">
														<div class="col-xs-3">
															<img src="../../img/student.png" height=50; width=50;>
														</div>
														<div class="col-xs-9 text-right">
															<div class="huge"<strong>'.$t_stud['Total'].'</strong></div><br>
															<div><strong>'.strtoupper($section['SECTION_NAME']).'</strong></div>
														</div>
													</div>
												</div>
											</a>
											</div>
										</div>';
														}
													//<!--col-lg-4-->
													}
													else
													{
														if($t_stud['Total'] == 0)
														{
																echo'
										<div class="col-lg-3 ">
											<div class="panel panel-primary">
											<a href = "view.php?sec_id='.$sec.'">
												<div class="panel-heading">
													<div class="row">
														<div class="col-xs-3">
															<img src="../../img/student.png" height=50; width=50;>
														</div>
														<div class="col-xs-9 text-right">
															<div class="huge"<strong>'.$t_stud['Total'].'</strong></div><br>
															<div><strong>'.strtoupper($section['SECTION_NAME']).'</strong></div>
														</div>
													</div>
												</div>
											</a>
											</div>
										</div>';
														}
														else
														{
															echo'
										<div class="col-lg-3 ">
											<div class="panel panel-primary">
											<a href = "view.php?sec_id='.$sec.'">
												<div class="panel-heading">
													<div class="row">
														<div class="col-xs-3">
															<img src="../../img/student.png" height=50; width=50;>
														</div>
														<div class="col-xs-9 text-right">
															<div class="huge"<strong>'.$t_stud['Total'].'</strong></div><br>
															<div><strong>'.strtoupper($section['SECTION_NAME']).'</strong></div>
														</div>
													</div>
												</div>
											</a>
											</div>
										</div>';
														}
													}
												}
										echo'	</div>
										</div>';
									}
									else
									{
										echo' 
										
										<div class="tab-pane fade" id="g'.$rlvl['YEAR_LEVEL'].'">
											<hr>
												<div class="row">';
												while($section = mysqli_fetch_array($fetch_section))
												{
													  $fetch_overall = mysqli_query($mysqli, "SELECT *, COUNT(sis_student.lrn) AS Total FROM sis_student, cms_account, sis_stu_rec
														WHERE sis_student.lrn = cms_account.lrn
														AND sis_student.lrn = sis_stu_rec.lrn
														AND section_id = '".$section['SECTION_ID']."'
														AND sy_id = '".$section['sy_id']."'")
														or die(mysqli_error($mysqli));
																
														$t_stud=mysqli_fetch_array($fetch_overall);
													
													$fetch_all = mysqli_query($mysqli, "SELECT * FROM sis_student, cms_account, scms_bmi_rec, sis_stu_rec
														WHERE sis_student.lrn = cms_account.lrn
														AND cms_account.cms_account_ID = scms_bmi_rec.cms_account_ID
														AND sis_student.lrn = sis_stu_rec.lrn
														AND section_id = '".$section['SECTION_ID']."'
														AND sy_id = '".$section['sy_id']."'")
														or die(mysqli_error($mysqli));
													$countbmi = 0;
													while($all = mysqli_fetch_array($fetch_all))
													{
														$countbmi++;
													}
													
													if($countbmi == 0)
													{
														if($t_stud['Total'] == 0)
														{
															echo'
															<div class="col-lg-3 ">
											<div class="panel panel-primary">
											<a href = "view.php?sec_id='.$sec.'">
												<div class="panel-heading">
													<div class="row">
														<div class="col-xs-3">
															<img src="../../img/student.png" height=50; width=50;>
														</div>
														<div class="col-xs-9 text-right">
															<div class="huge"<strong>'.$t_stud['Total'].'</strong></div><br>
															<div><strong>'.strtoupper($section['SECTION_NAME']).'</strong></div>
														</div>
													</div>
												</div>
											</a>
											</div>
										</div>';
														}
														else
														{
															echo'
										<div class="col-lg-3 ">
											<div class="panel panel-primary">
											<a href = "view.php?sec_id='.$sec.'">
												<div class="panel-heading">
													<div class="row">
														<div class="col-xs-3">
															<img src="../../img/student.png" height=50; width=50;>
														</div>
														<div class="col-xs-9 text-right">
															<div class="huge"<strong>'.$t_stud['Total'].'</strong></div><br>
															<div><strong>'.strtoupper($section['SECTION_NAME']).'</strong></div>
														</div>
													</div>
												</div>
											</a>
											</div>
										</div>';	
														}
													//<!--col-lg-4-->
													}
													else
													{
														if($t_stud['Total'] == 0)
														{
																echo'
															<div class="col-lg-3 ">
											<div class="panel panel-primary">
											<a href = "view.php?sec_id='.$sec.'">
												<div class="panel-heading">
													<div class="row">
														<div class="col-xs-3">
															<img src="../../img/student.png" height=50; width=50;>
														</div>
														<div class="col-xs-9 text-right">
															<div class="huge"<strong>'.$t_stud['Total'].'</strong></div><br>
															<div><strong>'.strtoupper($section['SECTION_NAME']).'</strong></div>
														</div>
													</div>
												</div>
											</a>
											</div>
										</div>';
														}
														else
														{
															echo'
															<div class="col-lg-3 ">
											<div class="panel panel-primary">
											<a href = "view.php?sec_id='.$sec.'">
												<div class="panel-heading">
													<div class="row">
														<div class="col-xs-3">
															<img src="../../img/student.png" height=50; width=50;>
														</div>
														<div class="col-xs-9 text-right">
															<div class="huge"<strong>'.$t_stud['Total'].'</strong></div><br>
															<div><strong>'.strtoupper($section['SECTION_NAME']).'</strong></div>
														</div>
													</div>
												</div>
											</a>
											</div>
										</div>';
														}
														
													}
												}
										echo'	</div>
										</div>';
									}
									
								}
								mysqli_query($mysqli, "UNLOCK TABLES");
									
								?>
                                
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
	
	</div>	
	<br><br><br><br>
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
