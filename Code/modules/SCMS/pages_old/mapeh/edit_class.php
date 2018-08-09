
<?php

include("../../db_connect.php");
session_start();



mysqli_query($mysqli, "LOCK TABLES sis_stu_rec, css_school_yr, css_section READ");

$sec_id = base64_url_decode($_GET['sec_id']);
									
$fetch_section = mysqli_query($mysqli, "SELECT * FROM sis_stu_rec, css_school_yr, css_section 
	WHERE css_school_yr.sy_id = sis_stu_rec.sy_id 
	AND css_section.SECTION_ID = sis_stu_rec.section_id
	AND sis_stu_rec.section_id = '".$sec_id."' 
	AND status = 'active'
	GROUP BY css_section.SECTION_ID")
or die(mysqli_error($mysqli));

$section = mysqli_fetch_array($fetch_section);
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
				<li><a href="student.php">Student Medical Records</a></li>
				<li><a onclick="goBack()">Grade <?php echo $section['YEAR_LEVEL']?> - <?php echo strtoupper($section['SECTION_NAME']);?></a></li>
				<li class="active">Edit Nutritional Status Record</li>
			</ol>
                <div class="container-fluid">
                    <h1 class="page-header">Nutritional Status Record <small><small><b>Section: </b> <?php echo strtoupper($section['SECTION_NAME']);?></small></small></h1>
                </div>

			
				<div class="col-lg-12">
						
				<div class="panel panel-primary">
                        <div class="panel-body tooltip-demo">
						<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="save_class.php" method="post">
                            <table width="100%" class="table table-striped table-bordered table-hover" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Height (cm)</th>
                                        <th>Weight (kg)</th>
                                    </tr>
                                </thead>
                                <tbody>
								<input type="hidden" name="sec_id"  required="required" value="<?php echo $sec_id;?>"class="form-control col-md-3 col-xs-3" >
									<?php
										mysqli_query($mysqli, "LOCK TABLES sis_student, cms_account, scms_bmi_rec, sis_stu_rec READ");
										$fetch_all = mysqli_query($mysqli, "SELECT * FROM sis_student, cms_account, scms_bmi_rec, sis_stu_rec
											WHERE sis_student.lrn = cms_account.lrn
											AND cms_account.cms_account_ID = scms_bmi_rec.cms_account_ID
											AND sis_student.lrn = sis_stu_rec.lrn
											AND section_id = '".$section['SECTION_ID']."'
											AND sy_id = '".$section['sy_id']."'")
											or die(mysqli_error($mysqli));
										$countall = 0;
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
											  

											$countall++;
											echo'
											<tr class="odd gradeX">
											<td>'.$countall.'</td>
											<td>'.strtoupper($all['stu_lname'].', '.$all['stu_fname']).'</td>	
											<input type="hidden" name="bmino[]"  required="required" value="'.$all['bmi_no'].'"class="form-control col-md-3 col-xs-3" >																						
											<td><input type="text" name="height[]"  required="required" value="'.$all['height'].'"class="form-control col-md-3 col-xs-3" ></td>
											<td><input type="text" name="weight[]"  required="required" value="'.$all['weight'].'"class="form-control col-md-3 col-xs-3" ></td>
											</tr>';
											
										}
										mysqli_query($mysqli, "UNLOCK TABLES");
									?>
                                </tbody>
                            </table>
							
																<div class="modal-footer">
																	<button type="submit" class="btn btn-primary " name="submit_class">Submit</button>
																	<a href = "view.php?sec_id=<?php echo base64_url_encode($sec_id);?>"><button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
																</div>
                            </form>
                            <!-- /.table-responsive -->

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    </div>
                    <!-- /.panel -->
	</div>		
	</div>		
		<br><br><br><?php include("../include/footer.php"); ?>
	<!--/.row-->

        </div></div>
<!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="../../js/index.js"></script>
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

<script>
    // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })
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
<script>
    // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })
    </script>
	<script>
	function goBack() {
    window.history.back();
	}
	</script>


<!-- Footer -->



</body>

</html>
