<?php

include("../../db_connect.php");
session_start();
include("../include/session.php");

$sec_id = base64_url_decode($_GET['sec_id']);


mysqli_query($mysqli, "LOCK TABLES sis_stu_rec, css_school_yr, css_section READ");
$fetch_section = mysqli_query($mysqli, "SELECT * FROM sis_stu_rec, css_school_yr, css_section 
	WHERE css_school_yr.sy_id = sis_stu_rec.sy_id 
	AND css_section.SECTION_ID = sis_stu_rec.section_id
	AND sis_stu_rec.section_id = '".$sec_id."' 
	AND status = 'active' 
	GROUP BY css_section.SECTION_ID")
or die(mysqli_error($mysqli));

$section = mysqli_fetch_array($fetch_section);
mysqli_query($mysqli, "UNLOCK TABLES");
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
    <link rel="stylesheet" href="../../css/w3/w3.css">
    
    
    <!--Include your modified CSS below as needed-->
    <link rel="stylesheet" href="../../css/w3/blue.css">
    <link rel="stylesheet" href="../../css/w3/yellow.css">
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
	
	<style>
	body {
        color: #404E67;
        background: #FFFFFF;
		font-family: 'Open Sans', sans-serif;
	}	
	.icon-background4 {
    color: #36f40b;
	}
	</style>
</head>

<body>
        <?php 
        include("../include/topnav.php");
        ?>
    <div id="wrapper">
        <?php 
            include("../include/sidenav.php");
        ?>
        <div class="container-fluid" style="height:700px;max-width:100%;margin-top:70px;margin-right:20px;margin-left:20px;margin-bottom:10px">
                    <h1 class="page-header">Insert Height & Weight Class <small><small><b>Section: </b> <?php echo $section['SECTION_NAME'];?></small></small></h1>
				<br>
				
			
				<div class="col-lg-12">
						
				<div class="panel panel-primary">
                        <div class="panel-body tooltip-demo">
						<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="save_bmi.php" method="post">
                            <table width="100%" class="table table-striped table-bordered table-hover" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
										<th>Sex</th>
                                        <th>Age</th>
                                        <th>Height (cm)</th>
                                        <th>Weight (kg)</th>
                                    </tr>
                                </thead>
                                <tbody>
								<input type="hidden" name="sec_id"  required="required" value="<?php echo $sec_id;?>"class="form-control col-md-3 col-xs-3" >
									<?php
										mysqli_query($mysqli, "LOCK TABLES sis_student, cms_account, sis_stu_rec READ");
										$fetch_all = mysqli_query($mysqli, "SELECT * FROM sis_student, cms_account, sis_stu_rec
											WHERE sis_student.lrn = cms_account.lrn
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
											<td>'.$all['stu_lname'].', '.$all['stu_fname'].'</td>
											<td>'.$all['sis_gender'].'</td>
											<td>'.$age.'</td>
											<input type="hidden" name="acc_id[]"  required="required" value="'.$all['cms_account_ID'].'"class="form-control col-md-3 col-xs-3" >
											<td><input type="text" name="height[]"  class="form-control col-md-3 col-xs-3" ></td>
											<td><input type="text" name="weight[]"  class="form-control col-md-3 col-xs-3" ></td>
											</tr>';
										}
										mysqli_query($mysqli, "UNLOCK TABLES");
									?>
                                </tbody>
                            </table>
							
																<div class="modal-footer">
																	<button type="submit" class="btn btn-success " name="submit_class">Submit</button>
																	<a href = "index.php"><button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button></a>
																</div>
                            </form>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    </div>
                    <!-- /.panel -->
	</div>
        <br><br><br><br>
    <?php include("../include/footer.php"); ?>
    </div>    
    	
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../js/alert.js"></script>
<script src="../../js/index.js"></script>
<script src="../../js/slideshow.js"></script>
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
