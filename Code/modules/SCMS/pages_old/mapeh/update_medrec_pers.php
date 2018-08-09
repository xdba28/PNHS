<?php

include("../../db_connect.php");
session_start();

$fetch_schoolyr = mysqli_query($mysqli, "SELECT year FROM      css_school_yr
    WHERE status = 'active'");
    $syr = mysqli_fetch_assoc($fetch_schoolyr);
    $explodeupdate =explode("-",$syr['year']); 
    $syrstart = $explodeupdate['0'];
    $syrend = $explodeupdate['1'];

  $update = mysqli_query($mysqli, "SELECT * FROM scms_medrec
    WHERE scms_medrec.cms_account_ID = '".$_SESSION['user_data']['acct']['cms_account_ID']."'
    AND date_of_update BETWEEN '".$syrstart."-06-01' AND '".$syrend."-03-30'")
    or die(mysqli_error($mysqli));
    $u = mysqli_fetch_assoc($update);

mysqli_query($mysqli, "LOCK TABLES cms_account, pims_personnel READ");
$fetch_map_teach = mysqli_query($mysqli, "SELECT * FROM cms_account, pims_personnel
	WHERE cms_account.emp_no = pims_personnel.emp_No
	AND cms_account_ID = '".$_SESSION['user_data']['acct']['cms_account_ID']."'")
	or die(mysqli_error($mysqli));
	
$mapteach = mysqli_fetch_array($fetch_map_teach);
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
				<li><a href="medhist_pers.php">Health Monitoring</a></li>
				<li class="active">Update Medical Record</li>                  
			</ol>  
                <div class="col-lg-12">
                    <h1 class="page-header">Update <small><small> Medical History and Health Information</small></small>
                   </h1>
                </div>

  
  <!-- Row start -->
             <div class="row">
                <div class="col-lg-12">					
                        <div class="panel-body">
                            <div class="row">
							   <form action = "update_mr.php" method = "post">
                                <div class="col-lg-6">
								
                                    <h3>Health Information</h3><br>
                                    
                                        <div class="form-group">
 			                            <input type="hidden" name="id" id = "id" value="<?php echo $_SESSION['user_data']['acct']['cms_account_ID']; ?>">
                                        <label>Allergies</label><br>
                                        <textarea class="control-label col-md-12 col-sm-4 col-xs-12" name = "allergies" id ="allergies"><?php echo $u['allergies'];?></textarea>
                                        </div>
										<div>
                                            <p class="help-block">Example: Pollen</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Do you wear eyeglasses?</label><span class="required"></span>
                                            <?php 
											if(empty($u)){
												echo '<br>
													<label class="radio-inline">
														<input type="radio" name="eye" id="eye1" value="Yes" >Yes
													</label>
													<label class="radio-inline">
														<input type="radio" name="eye" id="eye2" value="No" >No
													</label>
												';
											} else {
												if($u['eyeglass'] == "Yes")
												{
													echo '<br>
														<label class="radio-inline">
															<input type="radio" name="eye" id="eye1" value="Yes" checked >Yes
														</label>
														<label class="radio-inline">
															<input type="radio" name="eye" id="eye2" value="No" >No
														</label>
													';
												}
												else
												{
													echo '<br>
														<label class="radio-inline">
															<input type="radio" name="eye" id="eye1" value="Yes" >Yes
														</label>
														<label class="radio-inline">
															<input type="radio" name="eye" id="eye2" value="No" checked >No
														</label>
													';
												}	
											}
											?>
                                           
                                        </div> 
										<div>
                                        <div class="form-group">
                                        <label>Description</label><br>
                                        <textarea class="control-label col-md-12 col-sm-4 col-xs-12" name = "eyedesc" id ="eyedesc"><?php echo $u['eye_cond_desc'];?></textarea>
                                        </div>
                                            <p class="help-block">Example: Nearsighted</p>                                    
                                        </div>
                                        <div class="form-group">
                                            <label>Do you have an ear condition?</label><span class="required"></span>
                                            <?php
												if(empty($u)){
													echo'<br>
													<label class="radio-inline">
														<input type="radio" name="ear" id="ear1" value="Yes" >Yes
													</label>
													<label class="radio-inline">
														<input type="radio" name="ear" id="ear1" value="No" >No
													</label>
													';
												} else {
													if($u['ear_infection'] == "Yes")
													{
														echo'<br>
														<label class="radio-inline">
															<input type="radio" name="ear" id="ear1" value="Yes" checked >Yes
														</label>
														<label class="radio-inline">
															<input type="radio" name="ear" id="ear1" value="No" >No
														</label>
														';
													}
													else
													{
														echo'<br>
														<label class="radio-inline">
															<input type="radio" name="ear" id="ear1" value="Yes" >Yes
														</label>
														<label class="radio-inline">
															<input type="radio" name="ear" id="ear1" value="No" checked >No
														</label>
														';
													}
												}
											?>
                                        </div> 
                                        <div class="form-group">
                                        <label>Description</label><br>
                                        <textarea class="control-label col-md-12 col-sm-4 col-xs-12" name = "eardesc" id ="eardesc"><?php echo $u['ear_cond_desc'];?></textarea>
                                        
                                            <p class="help-block">Example: Middle ear infection</p>                                    
                                        </div> <hr>
                                       <h3>Illness History</h3>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Illness</th>
                                                            <th>Record</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                         <?php
                                                        $fetch_ill = mysqli_query($mysqli, "SELECT * FROM scms_illness")
                                                        or die(mysqli_error($mysqli));

                                                        $illcount = 0;
                                                        while($ill = mysqli_fetch_array($fetch_ill))
                                                        {
															$f_illness = mysqli_query($mysqli, "SELECT * FROM scms_illness_hist_line
																WHERE medrec_id = '".$u['medrec_id']."' 
																AND illness_no = '".$ill['illness_no']."'")
																or die(mysqli_error($mysqli));
															$illness = mysqli_fetch_array($f_illness);
																
                                                            $illcount++;
															
															echo'
																<tr>
																<td>'.$illcount.'</td>
																<td>'.$ill['illness_name'].'</td>
																<td>
																<label>
																';
																
															if($illness == NULL)
															{
																 echo'
																	<input type="checkbox" value="'.$ill['illness_no'].'" name="ill[]" >';
															}
															else
															{
																 echo'
																	<input type="checkbox" value="'.$ill['illness_no'].'" name="ill[]" checked>
																';
															}
															echo'
															</label>
															</td>
															</tr>
															';
                                                           
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.table-responsive -->
                                        </div>  

                                </div>
									<!-- /.col-lg-6 (nested) -->
									<div class="col-lg-6">
									<h3>For Emergency</h3><hr>
											<div class="form-group">
												<label>Name<span class="required"></span></label>
												<input type="text" name="name" required="required" value = "<?php echo $u['emer_contact_name'];?>" class="form-control" placeholder="First Name/Last Name">
											</div>
											<div class="form-group">
												<label>Relationship<span class="required"></span></label>
												<input type="text" name="rel" required="required" value = "<?php echo $u['relationship'];?>" class="form-control" placeholder="">
											</div>
											<div class="form-group">
												<label>Contact Number<span class="required"></span></label>
												<input type="text" maxlength="11" minlength="11" value = "<?php echo $u['emer_contact_no'];?>" name="num" required="required" class="form-control" placeholder="">
											</div><br><br><br><br><br><br><br><br><hr>									
																		
															
												<h3>Immunization Record</h3>
												<div class="panel-body">
												<div class="table-responsive">
												<table class="table table-striped">
													<thead>
														<tr>
															<th>#</th>
															<th>Immunization</th>
															<th>Record</th>
														</tr>
													</thead>
													<tbody>
														<?php
                                                    $fetch_immune = mysqli_query($mysqli, "SELECT * FROM scms_immunization")
                                                    or die(mysqli_error($mysqli));

                                                    $immunecount = 0;
                                                    while($immune = mysqli_fetch_array($fetch_immune))
                                                    {
														$_immune = mysqli_query($mysqli, "SELECT * FROM scms_immune_rec_line, scms_immunization
															WHERE medrec_id = '".$u['medrec_id']."' 
															AND scms_immune_rec_line.vaccine_no = scms_immunization.vaccine_no
															AND scms_immune_rec_line.vaccine_no = '".$immune['vaccine_no']."'")
															or die(mysqli_error($mysqli));
														
														$im = mysqli_fetch_array($_immune);
														
                                                        $immunecount++;
														
														echo'
                                                        <tr>
                                                        <td>'.$immunecount.'</td>
                                                        <td>'.$immune['vaccine_name'].'</td>
                                                        <td>
														<label>';
														
														if($immune['vaccine_no'] == $im['vaccine_no'])
														{
															echo '<input type="checkbox" value="'.$immune['vaccine_no'].'" name="immune[]" checked >';
														}
														else
														{
															echo '<input type="checkbox" value="'.$immune['vaccine_no'].'" name="immune[]" >';
														}
														echo'
                                                        </label>
                                                        </td>
                                                        </tr>
                                                        ';
                                                    }
                                                    ?>
													</tbody>
												</table>
											     </div> 
											     </div>		
								    </div>
                                    <!-- /.col-lg-6 (nested) -->		

                            </div>
                            <!-- /.row (nested) -->
							            
                        								<button type="submit" name = "submit_medrec" class="btn btn-primary" style="float:right;margin-right:30px">Submit</button>
                                <button type="reset" class="btn btn-info" style="float:right;margin-right:10px">Reset</button>
										</form>           	
							  
						</div>
                        <!-- /.panel-body -->
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div> 


    </div>
</div>


    <br><br>  <br>
    <?php include("../include/footer.php"); ?></div>
    </div>
	
                 
		</div>		
		</div>	
		</div>	

        <!-- /#page-content-wrapper -->
       	
	<!--/.row-->
</div>
        <!-- /#col -->

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../js/index.js"></script>
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