
<!DOCTYPE html>
<html lang="en">

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
    
mysqli_query($mysqli, "LOCK TABLES cms_account, sis_student, pims_personnel READ");

$fetch_wholename = mysqli_query($mysqli, "SELECT * FROM pims_personnel, cms_account
			WHERE cms_account.emp_no = pims_personnel.emp_No
			AND cms_account.cms_account_ID = '".$_SESSION['user_data']['acct']['cms_account_ID']."'")
			or die(mysqli_error($mysqli));
			
$wholename = mysqli_fetch_array($fetch_wholename);	
	
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
	$lname = strtoupper($stuper['stu_lname']);
	$fname = strtoupper($stuper['stu_fname']);
	$mname = strtoupper($stuper['stu_mname']);
	$no = $stuper['lrn'];
	$nostat = "LRN ";
	$gender = strtoupper($stuper['sis_gender']);
	$bday = strtoupper($stuper['sis_b_day']);
	$place = '<dt>Address</dt><dd>'.$stuper['street'].' '.$stuper['brng'].', '.$stuper['munic'].'</dd>';
	$status = strtoupper($stuper['stu_status']);
	$religion = strtoupper($stuper['sis_religion']);
	$statusacc = "Student";
	
	if($stuper['stu_mname'] == NULL)
	{
		$name = strtoupper($stuper['stu_lname'].', '.$stuper['stu_fname']);

	}		
	else
	{
		$name = strtoupper($stuper['stu_lname'].', '.$stuper['stu_fname'].' '.$stuper['LEFT(stu_mname, 1)']).' .';
	}
			$useru = strtoupper($stuper['stu_fname'].' '.$stuper['stu_lname']);
}
else if($accountstuper['lrn'] == NULL)
{
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
}
mysqli_query($mysqli, "UNLOCK TABLES");

include("../include/session.php");  
    

?>
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
                dd{
            font-size: small;
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
            <div id="page-content-wrapper">
            <div class="container-fluid"  style="margin-right:40px;margin-left:70px;">
            <ol class="breadcrumb">
				<li><a href="index.php">Health Monitoring</a></li>
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
							   <form action = "update_mr_stuper.php" method = "post">
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
 								<div style="float:right">
							            <button type="submit" name = "submit_medrec" class="btn btn-primary" style="float:right;">Submit</button>
                                        <button type="reset" class="btn btn-info" style="float:right;margin-right:10px">Reset</button>
										</div>
										</form>           	
							  
						</div>
                        <!-- /.panel-body -->
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div> 


    </div>
</div>

 <br><br><br><br>
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
