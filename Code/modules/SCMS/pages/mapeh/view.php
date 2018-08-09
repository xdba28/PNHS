<?php

include("../../db_connect.php");
session_start();

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
	<link rel="stylesheet" href="../../css/metisMenu.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="../../css/w3.css">
    
    <!-- Documents Path --->
    <link rel="stylesheet" href="../../docs/docs.min.css">
    <link rel="stylesheet" href="../../css/sidebar-menu.css">
    <link rel="stylesheet" href="../../css/t.css">
    <script src="../../js/metisMenu.min.js"></script>     <script src="../../js/sb-admin-2.min.js"></script>
	
	    <!-- DataTables CSS -->
    <link href="../../Template (reference)/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../../Template (reference)/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    
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

<?php
	mysqli_query($mysqli, "LOCK TABLES sis_student, cms_account, scms_bmi_rec, sis_stu_rec READ");
	$fetch_wholesec = mysqli_query($mysqli, "SELECT * FROM sis_student, cms_account, sis_stu_rec
		WHERE sis_student.lrn = cms_account.lrn
		AND sis_student.lrn = sis_stu_rec.lrn
		AND section_id = '".$section['SECTION_ID']."'
		AND sy_id = '".$section['sy_id']."'")
		or die(mysqli_error($mysqli));
	$nmrow = 0;	
	while($wholesec = mysqli_fetch_array($fetch_wholesec))
	{
		$fetch_wbmi = mysqli_query($mysqli, "SELECT * FROM sis_student, cms_account, scms_bmi_rec, sis_stu_rec
						WHERE sis_student.lrn = cms_account.lrn
						AND cms_account.cms_account_ID = scms_bmi_rec.cms_account_ID
						AND sis_student.lrn = sis_stu_rec.lrn
						AND section_id = '".$section['SECTION_ID']."'
						AND sy_id = '".$section['sy_id']."'
						AND scms_bmi_rec.cms_account_ID = '".$wholesec['cms_account_ID']."'")
						or die(mysqli_error($mysqli));
						
		$num_rows = mysqli_num_rows($fetch_wbmi);
		
		if($num_rows == 0)
		{
			$nmrow++;
		}	
	}
	mysqli_query($mysqli, "UNLOCK TABLES");
	
	if($nmrow > 0)
	{echo'
		<script>
		$(document).ready(function(){
			// Show the Modal on load
			$("#myModal").modal("show");
			
			// Hide the Modal
			$("#myBtn").click(function(){
				$("#myModal").modal("hide");
			});
		});
		</script>';
		
		if($nmrow == 1)
		{
			$is = "needs";
			$student = "student";
		}
		else
		{
			$is = "need";
			$student = "students";
		}
	}
	
?>

<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"><b>Updating Nutritional Status Record</b></h5>
        </div>
        <div class="modal-body  col-lg-12" > 
            <p style="padding-left:60px;"><b><i>Reminder:<br></i></b> <strong> <?php echo $nmrow?> </strong> new <?php echo $student?> <?php echo $is?> to be added in the Nutritional Status Record.</p>
            <p style="padding-left:60px;"><i>Proceed to adding?</i></p>
		  
        </div>
		<div class="modal-footer ">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			<a href="#addstud" data-toggle="modal"><button type="button" class="btn btn-primary" name = "" data-dismiss="modal">Add</button></a>
		</div>
      </div>
      
    </div>
  </div>
</div>

<!-- Modal--> 
	<div class="modal fade" id="addstud" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<form method="post" action="save_bmi.php" class="form-horizontal form-label-left" role="form">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Insert Height and Weight</h4>
				</div>
				<div class="modal-body">
				
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
							$countal = 0;
								mysqli_query($mysqli, "LOCK TABLES sis_student, cms_account, scms_bmi_rec, sis_stu_rec READ");
								$fetch_wholese = mysqli_query($mysqli, "SELECT *  FROM sis_student, cms_account, sis_stu_rec
									WHERE sis_student.lrn = cms_account.lrn
									AND sis_student.lrn = sis_stu_rec.lrn
									AND section_id = '".$section['SECTION_ID']."'
									AND sy_id = '".$section['sy_id']."'")
									or die(mysqli_error($mysqli));
									
								while($wholese = mysqli_fetch_array($fetch_wholese))
								{
									$fetch_wbm = mysqli_query($mysqli, "SELECT * FROM sis_student, cms_account, scms_bmi_rec, sis_stu_rec
										WHERE sis_student.lrn = cms_account.lrn
										AND cms_account.cms_account_ID = scms_bmi_rec.cms_account_ID
										AND sis_student.lrn = sis_stu_rec.lrn
										AND section_id = '".$section['SECTION_ID']."'
										AND sy_id = '".$section['sy_id']."'
										AND scms_bmi_rec.cms_account_ID = '".$wholese['cms_account_ID']."'")
										or die(mysqli_error($mysqli));
													
									$num_row = mysqli_num_rows($fetch_wbm);
									
									if($num_row == 0)
									{
									
										//date in mm/dd/yyyy format; or it can be in other formats as well
										  $birthDate = $wholese['sis_b_day'];
										  //explode the date to get month, day and year
										  $birthDate = explode("-", $birthDate);
										  //get age from date or birthdate
										  $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md")
											? ((date("Y") - $birthDate[0]) - 1)
											: (date("Y") - $birthDate[0]));
										
										$countal++;
										echo'
										<tr class="odd gradeX">
										<td>'.$countal.'</td>
										<td>'.$wholese['stu_lname'].', '.$wholese['stu_fname'].'</td>
										<td>'.$wholese['sis_gender'].'</td>
										<td>'.$age.'</td>
										<input type="hidden" name="acc_id[]"  required="required" value="'.$wholese['cms_account_ID'].'"class="form-control col-md-3 col-xs-3" >
										<td><input type="text" name="height[]"  class="form-control col-md-3 col-xs-3" ></td>
										<td><input type="text" name="weight[]"  class="form-control col-md-3 col-xs-3" ></td>
										</tr>';
									}	
								}
								mysqli_query($mysqli, "UNLOCK TABLES");
							?>
						</tbody>
                    </table>
					
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success " name="submit_class">Submit</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
		</form>
	</div>
<!-- /.modal -->


            <?php include("../include/topnav.php"); ?>
    <div id="wrapper">
        <?php include("../include/sidenav.php"); ?>
        <div id="page-content-wrapper">
            <div class="container-fluid" style="margin-right:40px;margin-left:70px;">
			<ol class="breadcrumb">
				<li><a href="index.php">School Clinic</a></li>
				<li><a href="index.php">BMI Records</a></li>
				<li class="active">Grade <?php echo $section['YEAR_LEVEL']?> - <?php echo strtoupper($section['SECTION_NAME']);?></li>
			</ol>
                <div class="container-fluid">
                    <h1 class="page-header">Masterlist <small><small>Student Medical Records</small></small>
           					<a href="../../fpdf/print_NSR.php?section=<?php echo base64_url_encode($section['SECTION_ID']);?>"><button type="button" style="float:right;margin-left:10px" class="btn btn-primary btn-square btn-xl " data-toggle="tooltip" data-placement="left" title="Print Nutritional Status Record">Print <i class="fa fa-print"></i></button> </a>
                            <a href="edit_class.php?sec_id=<?php echo base64_url_encode($section['SECTION_ID'])?>"><button type="button" style="float:right;margin-left:10px" class="btn btn-primary btn-square btn-xl " data-toggle="tooltip" data-placement="left" title="Print Nutritional Status Record">Edit <i class="fa fa-edit"></i></button> </a>                        
                                
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
				
				<div class="col-lg-12">
				<div class="panel panel-primary">
				<div class="panel-heading">
					<h6>Section: <b> <?php echo strtoupper($section['SECTION_NAME']);?></b>
					<p style="float:right"> Grade <?php echo $section['YEAR_LEVEL']?> | <?php echo $section['year'];?></p></h6>
					</div>
					</div>
						<?php
						
						$fetch_overall = mysqli_query($mysqli, "SELECT * FROM sis_student, cms_account, scms_bmi_rec, sis_stu_rec
						WHERE sis_student.lrn = cms_account.lrn
						AND cms_account.cms_account_ID = scms_bmi_rec.cms_account_ID
						AND sis_student.lrn = sis_stu_rec.lrn
						AND section_id = '".$section['SECTION_ID']."'
						AND sy_id = '".$section['sy_id']."'")
						or die(mysqli_error($mysqli));
						
						
						$countoverall = 0;
						$countwasted = 0;
						$countsevwasted = 0;
						$countnormal = 0;
						$countoverweight = 0;
						$countobese = 0;
						while($overall = mysqli_fetch_array($fetch_overall))
						{
							if($overall['nutri_status'] == "Wasted")
							{
								$countwasted++;
							}
							if($overall['nutri_status'] == "Severely Waste")
							{
								$countsevwasted++;
							}
							if($overall['nutri_status'] == "Normal")
							{
								$countnormal++;
							}
							if($overall['nutri_status'] == "Overweight")
							{
								$countoverweight++;
							}
							if($overall['nutri_status'] == "Obese")
							{
								$countobese++;
							}
							$countoverall++;
						}
						
						?>
						<div class="col-xs-2">
							<div class="panel panel-info">
								<div class="panel-heading">
									<div class="row">
										<div class="col-xs-3">
											<i class="fa fa-bar-chart-o fa-3x"></i>
										</div>
										<div class="col-xs-9 text-right">
											<div class="huge"><?php echo $countoverall;?></div>
											<div><small>Overall Students</small></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-2">
							<div class="panel panel-warning">
								<div class="panel-heading">
									<div class="row">
										<div class="col-xs-3">
											<i class="fa fa-chevron-circle-down fa-3x"></i>
										</div>
										<div class="col-xs-9 text-right">
											<div class="huge"><?php echo $countsevwasted;?></div>
											<div><small>Sev. Wasted</small></div>
										</div>
									</div>
								</div>
							</div>
						</div><div class="col-xs-2">
							<div class="panel panel-warning">
								<div class="panel-heading">
									<div class="row">
										<div class="col-xs-3">
											<i class="fa fa-chevron-circle-down fa-3x"></i>
										</div>
										<div class="col-xs-9 text-right">
											<div class="huge"><?php echo $countwasted;?></div>
											<div><small>Wasted</small></div>
										</div>
									</div>
								</div>
							</div>
						</div><div class="col-xs-2">
							<div class="panel panel-success">
								<div class="panel-heading">
									<div class="row">
										<div class="col-xs-3">
											<i class="fa fa-child fa-3x"></i>
										</div>
										<div class="col-xs-9 text-right">
											<div class="huge"><?php echo $countnormal;?></div>
											<div><small>Normal</small></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-2">
							<div class="panel panel-danger">
								<div class="panel-heading">
									<div class="row">
										<div class="col-xs-3">
											<i class="fa fa-chevron-circle-up fa-3x"></i>
										</div>
										<div class="col-xs-9 text-right">
											<div class="huge"><?php echo $countoverweight;?></div>
											<div><small>Overweight</small></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-2">
							<div class="panel panel-danger">
								<div class="panel-heading">
									<div class="row">
										<div class="col-xs-3">
											<i class="fa fa-chevron-circle-up fa-3x"></i>
										</div>
										<div class="col-xs-9 text-right">
											<div class="huge"><?php echo $countobese;?></div>
											<div><small>Obese</small></div>
										</div>
									</div>
								</div>
							</div>
						</div>
				</div>
			
				<div class="col-lg-12">
						
						<!-- Modal -->
										<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content"></div>
											</div>
											<div class="modal-dialog">
												<div class="modal-content"></div>
											</div>
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal"> <span aria-hidden="true" class="">×   </span><span class="sr-only">Close</span>

														</button>
														 <h4 class="modal-title" id="myModalLabel">Modal title</h4>

													</div>
													<div class="modal-body"></div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														<button type="button" class="btn btn-primary">Save changes</button>
													</div>
												</div>
											</div>
										</div>
						
            </div>		
                        <!-- /.panel-heading -->
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
                                <tbody>
									<?php
										$fetch_all = mysqli_query($mysqli, "SELECT *, DATE_FORMAT(sis_b_day, '%b %e, %Y') as sis_day FROM sis_student, cms_account, scms_bmi_rec, sis_stu_rec
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
											<td><small>'.$countall.'</small></td>
											<td><small><p>'.strtoupper($all['stu_lname'].', '.$all['stu_fname']).'</p></small></td>
                                            <td><small>'.$all['sis_day'].'</small></td>
											<td><small>'.$all['sis_gender'].'</small></td>
											<td><small>'.$age.'</small></td>
											<td><small><p>'.$all['height'].'</p></small></td>
											<td><small><p>'.$all['weight'].'</p></small></td>
											<td><small>'.$all['bmi'].'</small></td>
											<td><small>'.$all['nutri_status'].'</small></td>
											</tr>';
											
										}
										mysqli_query($mysqli, "UNLOCK TABLES");
									?>
                                   
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->  
				
                        
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    </div>
                    <!-- /.panel -->
	</div>		
	</div>	<br><br><br>
	<!--/.row-->

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
<script src="../../js/metisMenu/metisMenu.min.js"></script>
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
	$(".btn[data-target='#myModal']").click(function() {
       var columnHeadings = $("thead th").map(function() {
                 return $(this).text();
              }).get();
       columnHeadings.pop();
       var columnValues = $(this).parent().siblings().map(function() {
                 return $(this).text();
       }).get();
  var modalBody = $('<div id="modalContent"></div>');
  var modalForm = $('<form role="form" name="modalForm" action="putYourPHPActionHere.php" method="post"></form>');
  $.each(columnHeadings, function(i, columnHeader) {
       var formGroup = $('<div class="form-group"></div>');
       formGroup.append('<label for="'+columnHeader+'">'+columnHeader+'</label>');
       formGroup.append('<input class="form-control" name="'+columnHeader+i+'" id="'+columnHeader+i+'" value="'+columnValues[i]+'" />'); 
       modalForm.append(formGroup);
  });
  modalBody.append(modalForm);
  $('.modal-body').html(modalBody);
});
$('.modal-footer .btn-primary').click(function() {
   $('form[name="modalForm"]').submit();
});
    </script>	
<?php include("../include/footer.php"); ?>

</body>

</html>
