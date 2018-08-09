
<!DOCTYPE html>
<html lang="en" >
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
    <link rel="stylesheet" href="../../css/style.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="../../css/w3.css">
    <link rel="stylesheet" href="../../css/sidebar-menu.css">
    <link rel="stylesheet" href="../../css/s.css">
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
                    
                <div class="col-lg-12">
			<ol class="breadcrumb">
				<li><a href="index.php">School Clinic</a></li>
				<li class="active">Daily Visit Log</li>
			</ol>
				<?php
				$current = mysqli_query($mysqli,"SELECT CURRENT_DATE");
				$rowss = mysqli_fetch_array($current);
				$c = date("F j, Y");
				$d = date("Y");

				mysqli_query($mysqli, "LOCK TABLES css_school_yr, scms_consultation, scms_prescription, cms_account, scms_medicine, pims_personnel, sis_student READ");
				$year = mysqli_query($mysqli, "SELECT * FROM `css_school_yr` WHERE `status`= 'active'");
				$sy = mysqli_fetch_array($year);
				?>
                    <h1 class="page-header">Daily Visit Log <small><small><?php echo $c.' | S.Y. '.$sy['year'];?></small></small>
									<a href="#addpat" data-toggle="modal" ><button type="button" style="float:right;margin-bottom:10px" title="Add Patient Record" class="btn btn-success"><span class='fa fa-plus' aria-hidden='true'></span></button></a>
					</h1>
                    <div class="panel panel-primary">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
										<th><small>#<br></small></th>
                                        <th><small>Name<br></small></th>
                                        <th><small>Complaint</small></th>
                                        <th><small>Diagnosis</small></th>
                                        <th><small>Treatment/s</small></th>
                                        <th><small>Disposition</small></th>
                                        <th><small>Time In<br></small></th>
										<th><small>Time Out</small></th>
                                        <th><small>Medicine</small></th>
                                        <th><small>Qty<br></small></th>
                                        <th><small>Edit<br></small></th>                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
									$cdate = date('Y-m-d'); 
									$fetch_consult = mysqli_query($mysqli, 
										"SELECT * FROM scms_consultation, scms_prescription, cms_account
										WHERE scms_consultation.patient_id = scms_prescription.patient_id
                                        AND cms_account.cms_account_ID = scms_consultation.cms_account_ID
										AND cons_date = '".$cdate."'
										AND cons_time_out = ''
										GROUP BY scms_consultation.patient_id
										ORDER BY scms_consultation.cons_time_in DESC")
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
										$t_in = $row['cons_time_in'];
										
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
										<td><small><center>'.$count.'</center></small></td>
                                        <td><small>'.$n.'</small></td>
                                        <td><small>'.$row['complaint'].'</small></td>
                                        <td><small>'.$row['diagnosis'].'</small></td>
                                        <td><small>'.$row['treatment'].'</small></td>
                                        <td><small>'.$row['disposition'].'</small></td>
                                        <td><small>'.$row['cons_time_in'].'</small></td>
										<td><small>'.$row['cons_time_out'].'</small></td>
                                        <td><small>'.$med.'</small></td>
                                         <td class="center">'.$qty.'</small></td>
                                       <td>
											<div class="btn-group" role="group" aria-label="...">
												<a href="#edit'.$patno.'" data-toggle="modal"><button type="button" style="float:right" title="Edit Patient Record" class= "btn btn-info btn-square btn-n"><span class="fa fa-edit" aria-hidden="true"></span></button></a>
											</div>
										</td>
										</tr>
										';
										
										$count++;
									?>
									<!-- Modal--> 
										<div class="modal fade" id="edit<?php echo $patno; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<form method="post" class="form-horizontal form-label-left" role="form">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h4 class="modal-title" id="myModalLabel">Edit Patient Record</h4>
													</div>
													<div class="modal-body">
													<input type="hidden" name="edit_item_id" value="<?php echo $patno; ?>">
													<input type="hidden" name="t_in" value="<?php echo $t_in; ?>">
													  <div class="form-group">
													  <label class="control-label col-md-4 col-sm-6 col-xs-6" style="text-align:right">Disposition:<span class="required"></span>
														</label>
													  <div class="col-md-6 col-sm-6 col-xs-12">
													  <select name="disposition" id="disposition" required class="form-control col-md-7 col-xs-12">
															<option value="Stay in clinic" disabled>Stay in clinic</option>
															<option value="Back to classroom">Back to classroom</option>
															<option value="Send home">Send home</option>
															<option value="Send to hospital">Send to hospital</option>
														</select>
													  </div>
													  </div>
													  <br>
													  <div class="form-group">
														<label class="control-label col-md-4 col-sm-6 col-xs-6" style="text-align:right">Time Out:<span class="required"></span>
														</label>
														<div class="col-md-6 col-sm-6 col-xs-12">
														  <input type="time" name="time_out" required="required" value="<?php echo $row['time_out'];?>"  placeholder="" class="form-control col-md-7 col-xs-12" >
														</div>
													  </div>
													  <br>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														<button type="submit" class="btn btn-primary" name = "save_changes">Save Changes</button>
													</div>
												</div>
												<!-- /.modal-content -->
											</div>
											<!-- /.modal-dialog -->
											</form>
										</div>
									<!-- /.modal -->
									
										
										<?php
													}
													
										$fetch_consult = mysqli_query($mysqli, 
										"SELECT * FROM scms_consultation, scms_prescription, cms_account
										WHERE scms_consultation.patient_id = scms_prescription.patient_id
                                        AND cms_account.cms_account_ID = scms_consultation.cms_account_ID
										AND cons_date = '".$cdate."'
										AND cons_time_out != ''
										GROUP BY scms_consultation.patient_id
										ORDER BY scms_consultation.cons_time_in DESC")
										or die("Error: Could not fetch rows!".mysqli_error($mysqli));
										
									
									
									
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
											$med =  $pres['brand_name'] . '<br/>'. $med ;
											$qty =  $pres['pres_qty'] . '<br/>'. $qty ;
										}
										
										echo'
										<tr class="odd gradeX">
										<td><small><center>'.$count.'</center></small></td>
                                        <td><small>'.$n.'</small></td>
                                        <td><small>'.$row['complaint'].'</small></td>
                                        <td><small>'.$row['diagnosis'].'</small></td>
                                        <td><small>'.$row['treatment'].'</small></td>
                                        <td><small>'.$row['disposition'].'</small></td>
                                        <td><small>'.$row['cons_time_in'].'</small></td>
										<td><small>'.$row['cons_time_out'].'</small></td>
                                        <td><small>'.$med.'</small></td>
                                         <td class="center">'.$qty.'</small></td>
                                       <td>
											
										</td>
										</tr>
										';
										$count++;
										
										
									}
										mysqli_query($mysqli, "UNLOCK TABLES");
															 //Update time out
												if(isset($_POST['save_changes'])){
													$patno = $_POST['edit_item_id'];
													$time_in = $_POST['t_in'];
													$dispo = $_POST['disposition'];
													$tiout = $_POST['time_out'];
													
													if($tiout == NULL)
													{
															echo '<script>
															alert("Fill the time out field!");
															window.history.back();
															</script>';
													}
													else if(strtotime($tiout) < strtotime($time_in))
													{
														echo '<script>
														alert("ERROR: The time must be greater than time in.");
														window.history.back();
														</script>';
													}
													else
													{
														mysqli_autocommit($mysqli, FALSE);
														mysqli_query($mysqli, "LOCK TABLES scms_consultation WRITE");
													
														$sql = mysqli_query($mysqli, "UPDATE scms_consultation SET 
															disposition='".$dispo."',
															cons_time_out='".$tiout."'
															WHERE patient_id='".$patno."'")
															or die(mysqli_error($mysqli));
														
														
														
														if($sql && $dispo == "Back to classroom")
														{
															mysqli_commit($mysqli);
															echo '<script>
															alert("Successfully saved!");
															window.location.href="../../fpdf/medcert1.php?patno='.base64_url_encode($patno).'";
															</script>';
														 } 
														 else if($sql && $dispo == "Send home")
														{
															mysqli_commit($mysqli);
															echo '<script>
															alert("Successfully saved!");
															window.location.href="../../fpdf/medcert2.php?patno='.base64_url_encode($patno).'";
															</script>';
														 } 
														else
														{
															mysqli_rollback($mysqli);
															echo '<script>
															alert("Cannot save patient record!");
															window.location.href="daily.php";
															</script>';
														}
														
														mysqli_query($mysqli, "UNLOCK TABLES");
														
													}
													
												}
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
            <!--Add Patient Modal -->
            <div id="addpat" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <form id= data-parsley-validate class="form-horizontal form-label-left" action="save_pat.php" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h5 class="modal-title"><b>Add Patient</b></h5>
                        </div>
                        <div class="modal-body"  style="margin-right:10px;">
			         
						
					  <div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Name:<span class="required"></span></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						<!--combobox-->
						<script src="../../js/bootstrap-combobox.js"></script>
						<script>
						$(document).ready(function(){
								  $('.combobox').combobox()
								});
						</script>
						<!--/combobox-->						
							<?php 
							
							mysqli_query($mysqli, "LOCK TABLES cms_account, sis_student, pims_personnel READ");
							$fetch_students = mysqli_query($mysqli, "SELECT *
							FROM cms_account, sis_student
							WHERE sis_student.lrn = cms_account.lrn")
							or die("Error: Could not fetch rows!".mysqli_error($mysqli));
							
							$fetch_personnel = mysqli_query($mysqli, "SELECT *
							FROM cms_account, pims_personnel
							WHERE pims_personnel.emp_No = cms_account.emp_no")
							or die("Error: Could not fetch rows!".mysqli_error($mysqli));
							
							echo'<select name="record" id="combobox" class="combobox input-large form-control col-md-7 col-xs-12" required="required">';
							
							while($rowstud = mysqli_fetch_array($fetch_students))
							{
								echo'
								<option value="'.$rowstud['cms_account_ID'].'">'.$rowstud['stu_fname']." ".$rowstud['stu_mname']." ".$rowstud['stu_lname'].'</option>';
							}
							
							while($rowper = mysqli_fetch_array($fetch_personnel))
							{
								echo'
								<option value="'.$rowper['cms_account_ID'].'">'.$rowper['P_fname']." ".$rowper['P_lname'].'&nbsp&nbsp&nbsp'.'</option>';
							}
							
							mysqli_query($mysqli, "UNLOCK TABLES");
							
						  ?>
						  <?php echo "</select>"; ?>
						</div>
					  </div>
					  <div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Complaint:<span class="required"></span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						  <input type="text" name="complaint" id="complaint" required=""  placeholder="" class="form-control col-md-7 col-xs-12" >
						</div>
					  </div>
					  <div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Diagnosis:<span class="required"></span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						  <input type="text" name="diagnosis" id = "diagnosis" required="required" placeholder="" class="form-control col-md-7 col-xs-12" >
						</div>
					  </div>
					  <div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Treatment:<span class="required"></span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						  <input type="text" name="treatment" id = "treatment" required="required"  placeholder="" class="form-control col-md-7 col-xs-12" >
						</div>
					  </div>
					  <div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Disposition:<span class="required"></span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						  <select name = "dispo" id = "dispo" placeholder="" class="form-control col-md-7 col-xs-12">
							<option value="Stay in clinic">Stay in clinic</option>
							<option value="Back to classroom">Back to classroom</option>
							<option value="Send home">Send home</option>
							<option value="Send to hospital">Send to hospital</option>
						  </select>
						</div>
					  </div>
					  <div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-4">Time In:<span class="required"></span>
						</label>
						<div class="col-md-2 col-sm-2 col-xs-6">
						  <input type="time" name="timein" id = "timein" required="required" placeholder="" class="form-control col-md-7 col-xs-12" >
						</div>
						<label class="control-label col-md-2 col-sm-2 col-xs-4">Time Out:<span class="required"></span>
						</label>
						<div class="col-md-2 col-sm-2 col-xs-6">
						  <input type="time" name="timeout" id = "timeout" placeholder="" class="form-control col-md-7 col-xs-12" >
						</div>                          
					  </div>
					  <div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Medicine:<span class="required"></span>
						</label>
						<div id="education_fields">
						<div class="col-sm-2 nopadding" style="padding-left:29px"><div class="form-group">
						
						<?php
						 $fetch_med = mysqli_query($mysqli, "SELECT * FROM scms_medicine ORDER BY gen_name ASC")
							or die("Error: Could not fetch rows!".mysqli_error($mysqli));
						 $count = 0;
							echo'
							<input type="number" class="form-control" id="qty" name="qty[]" placeholder="Qty" required min="1"></div></div>
							<div class="col-sm-4" style="padding-left:24px;padding-right:29px"><div class="form-group">
							<select class="form-control" id="med" name="med[]">
							<option value="NO" selected></option>';
						 while($row = mysqli_fetch_array($fetch_med))
						 {
							$medno = $row['med_no'];
							echo'
							<option value="'.$medno.'">'.$row{'brand_name'}.'</option>
							';
							$count++;
						 }
						?>
						      <?php echo "</select>"; ?>
							  </div>
							  </div>
						
						<div class="col-sm-2 nopadding" style="padding-left:29px">
                            <div class="form-group">
						      <button class="btn btn-info" type="button"  onclick="education_fields();"> <span class="fa fa-plus" aria-hidden="true"></span> </button>
						  </div> 
                        </div>
						
						</div>
					</div>	
					</div>	
					<div class="modal-footer" >
						<button  type="submit" class="btn btn-primary " name="submit_pat">Submit</button>
						<button style="margin-right:15px;margin-left:5px" type="reset" class="btn btn-info">Reset</button>
					</div>
					
					
					</div>
			         </form>
                </div>
            </div> 

    <div id='para'style="visibility: hidden;">
						<div class="col-sm-2 nopadding" style="padding-left:28px;margin-top:5px;"><div class="form-group">
	<?php
						 $fetch_med1 = mysqli_query($mysqli, "SELECT * FROM scms_medicine ORDER BY gen_name ASC")
							or die("Error: Could not fetch rows!".mysqli_error($mysqli));
						 $count = 1;
							echo'
							<input type="number" class="form-control" id="qty" name="qty[]" placeholder="Qty" required min="1"></div></div>
							<div class="col-sm-4" style="padding-left:24px;padding-right:29px"><div class="form-group">
							<select class="form-control" id="med" name="med[]">';
						 while($row = mysqli_fetch_array($fetch_med1))
						 {
							$medno = $row['med_no'];
							echo'
							<option name="med['.$count.']" value="'.$medno.'">'.$row{'brand_name'}.'</option>
							';
							$count++;
						 }
							?>
						      <?php echo "</select>"; ?>
							  </div>
							  </div>
							  
							  
</div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <?php include "../../pages/include/footer.php"; ?>
 </div>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../js/alert.js"></script>
    <script src="../../js/index.js"></script>
<script src="../../js/slideshow.js"></script>
<script src="../../js/backToTop.js"></script>
<script src="../../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../../vendor/datatables-responsive/dataTables.responsive.js"></script>
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

<script type="text/javascript">
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
	var actions = $("table td:last-child").html();
	// Append table with add row form on add new button click
    $(".add-new").click(function(){
		$(this).attr("disabled", "disabled");
		var index = $("table tbody tr:last-child").index();
        var row = '<tr>' +
			'<td class="f"><select class="form-control"><option>Acetaminophen</option><option>Albuterol</option><option>Aspirin</option><option>Brethine</option></select></td>' +
            '<td class="sed"><input type="number" name="quantity" min="1" max="5" value="1"></td>' +
			'<td>' + actions + '</td>' +
        '</tr>';
    	$("table").append(row);		
		$("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
        $('[data-toggle="tooltip"]').tooltip();
    });
	// Add row on add button click
	$(document).on("click", ".add", function(){
		var empty = false;
		var input = $(this).parents("tr").find('input[type="number"]');
        input.each(function(){
			if(!$(this).val()){
				$(this).addClass("error");
				empty = true;
			} else{
                $(this).removeClass("error");
            }
		});
		$(this).parents("tr").find(".error").first().focus();
		if(!empty){
			input.each(function(){
				$(this).parent("td").html($(this).val());
			});			
		}		
		var empty = false;
		var input2 = $(this).parents("tr").find('select[class="form-control"]');
        input2.each(function(){
			if(!$(this).val()){
				$(this).addClass("error");
				empty = true;
			} else{
                $(this).removeClass("error");
            }
		});
		$(this).parents("tr").find(".error").first().focus();
		if(!empty){
			input2.each(function(){
				$(this).parent("td").html($(this).val());
			});			
		}		
		
			$(this).parents("tr").find(".add, .edit").toggle();
			$(".add-new").removeAttr("disabled");
    });
	// Edit row on edit button click
	$(document).on("click", ".edit", function(){	 
		$(this).parents("tr").find("td.f").each(function(){
			$(this).html('<select class="form-control"><option>Acetaminophen</option><option>Albuterol</option><option>Aspirin</option><option>Brethine</option></select>');
		});		
        $(this).parents("tr").find("td.sed").each(function(){
			$(this).html('<input type="number" name="quantity" min="1" max="5" value="' + $(this).text() + '">');
		});		
		$(this).parents("tr").find(".add, .edit").toggle();
		$(".add-new").attr("disabled", "disabled");
    });
	// Delete row on delete button click
	$(document).on("click", ".delete", function(){
        $(this).parents("tr").remove();
		$(".add-new").removeAttr("disabled");
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
<script>
    // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })
    </script>
<script>
var room = 1;
function education_fields() {
 
    room++;
    var objTo = document.getElementById('education_fields')
    var divtest = document.createElement("div");
	divtest.setAttribute("class", "form-group removeclass"+room);
	var rdiv = 'removeclass'+room;
	var oldHTML = document.getElementById('para').innerHTML;
    divtest.innerHTML = '<div class="col-md-12" style="margin-left:24%">'+oldHTML+'<div class="col-sm-2 nopadding" style="padding-left:29px"><div class="form-group"><button class="btn btn-danger" type="button" onclick="remove_education_fields('+ room +');"><span class="fa fa-minus" aria-hidden="true"></span> </button></div></div> </div>';
    objTo.appendChild(divtest)
}
   function remove_education_fields(rid) {
	   $('.removeclass'+rid).remove();
   }
</script>

</body>

</html>
