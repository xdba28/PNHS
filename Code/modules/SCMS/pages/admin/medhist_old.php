<?php
include("../../func.php");
include("../../db_connect.php");
session_start();
include("../include/session.php");
	$id = $_GET['id'];
	
	$q_getstudper = mysqli_query($mysqli, "SELECT * FROM cms_account
		WHERE cms_account_ID = '".$id."'");
		
	$studper = mysqli_fetch_array($q_getstudper);
	if($studper['emp_no'] == NULL)
	{
		mysqli_query($mysqli, "LOCK TABLES sis_student READ");
		$q_getstud = mysqli_query($mysqli, "SELECT *, LEFT(stu_mname, 1) FROM sis_student
			WHERE lrn='".$studper['lrn']."'")
			or die ("Error: ".mysqli_error($mysqli));

		$row =mysqli_fetch_array($q_getstud);
		mysqli_query($mysqli, "UNLOCK TABLES");

		
		if($row['stu_mname'] == NULL)
		{
			$name = strtoupper($row['stu_lname'].', '.$row['stu_fname']);
		}		
		else
		{
			$name = strtoupper($row['stu_lname'].', '.$row['stu_fname'].' '.$row['LEFT(stu_mname, 1)'].' .');
		}
		$lname = strtoupper ($row['stu_lname']);
		$fname = strtoupper ($row['stu_fname']);
		$mname = strtoupper ($row['stu_mname']);
	    $gender = strtoupper($row['sis_gender']);
        $bday = strtoupper($row['sis_b_day']);
        $place = '<dt>Address</dt><dd>'.ucfirst($row['street']).' '.ucfirst($row['brng']).', '.ucfirst($row['munic']).'</dd>';
        $status = strtoupper($row['stu_status']);
        $religion = strtoupper($row['sis_religion']);
        $contact = strtoupper($row['stu_contact']);
        $email = $row['sis_email'];
		$statusacc = "Student";
	}
	else if($studper['lrn'] == NULL)
	{
		mysqli_query($mysqli, "LOCK TABLES pims_personnel READ");
		$q_getper = mysqli_query($mysqli, "SELECT *, LEFT(P_mname, 1) FROM pims_personnel
			WHERE emp_No = '".$studper['emp_no']."'")
			or die(mysqli_error($mysqli));
		$row = mysqli_fetch_array($q_getper);
		mysqli_query($mysqli, "UNLOCK TABLES");
		
		if($row['P_mname'] == NULL)
		{
			$name = strtoupper($row['P_lname'].', '.$row['P_fname']);
		}		
		else
		{
			$name = strtoupper($row['P_lname'].', '.$row['P_fname'].' '.$row['LEFT(P_mname, 1)'].'.');
		}
		
		$lname = strtoupper ($row['P_lname']);
		$fname = strtoupper ($row['P_fname']);
		$mname = strtoupper ($row['P_mname']);
	    $gender = strtoupper($row['pims_gender']);
        $bday = strtoupper($row['pims_birthdate']);
		$temp = '<dt>Temporary Address</dt><dd>'.$row['temp_address_street'].' '.$row['temp_address_house_no'].' '.$row['temp_address_subdivision_village'].' '.$row['temp_address_barangay'].', '.$row['temp_address_municipality_city'].', '.$row['temp_address_province'].'</dd>';
		$perm = '<dt>Permanent Address</dt><dd>'.$row['perm_address_street'].' '.$row['perm_address_house_no'].' '.$row['perm_address_subdivision_village'].' '.$row['perm_address_barangay'].', '.$row['perm_address_municipality_city'].', '.$row['perm_address_province'].'</dd>';
		$place = '<br/>'.$temp.'<br/>'.$perm.'<br/>';       
		$status = strtoupper($row['civil_status']);
        $religion = strtoupper($row['pims_religion']);
        $contact = strtoupper($row['pims_contact_no']);
        $email = $row['P_email'];
		$statusacc = "Personnel";
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
    <title>Admin</title>
      
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../../css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="../../css/w3.css">
    
    <!-- Documents Path --->
    <link rel="stylesheet" href="../../docs/docs.min.css">
    <link rel="stylesheet" href="../../css/sidebar-menu.css">
    <link rel="stylesheet" href="../../css/s.css">
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
  margin: 40px 1px;
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
	
    <div id="wrapper">
        <?php include("../include/sidenav.php"); ?>
        <div id="page-content-wrapper">
            <?php include("../include/topnav.php"); ?>

            <div class="container-fluid" style="margin-right:100px;margin-left:100px;">
                <div class="col-lg-12">
                    <h1 class="page-header">Profile <small><small>Personnel Profile and Medical Record</small></small>       
                    </h1>
                 </div>
                <!-- /.col-lg-12 -->
				<div class="col-lg-12">
                    <div class="row row-ribbon bg-info text-default" style="padding-left: 20px">
                    <br><p><strong>Reminder </strong> These are the list of classes by year level with the students' Medical Records.</p><br>
                    </div><br>
                </div>				
                <div class="col-lg-12">
				<div class="col-lg-4" >
                    <figure class="snip1578">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/profile-sample1.jpg" height="100px" width="100px"/>
                        <figcaption>
							<small><h3>
                                <?php 	echo $name;
								
								?>
                            </h3></small>
                            <div style="padding-top:5px;font-size:12px;"><p><?php echo $statusacc;?></p></div>
                        </figcaption>
                    </figure>
                    <div class="panel panel-info" style="background-color:#d9edf7;">
                    <dl class="dl-horizontal" >
                      <br><dt>Last Name</dt>
                      <dd><?php echo $lname;?></dd>
                      <dt>First Name</dt>
                      <dd><?php echo $fname;?></dd>
                      <dt>Middle Name</dt>
                      <dd><?php echo $mname;?></dd>
                      <dt>Gender</dt>
                      <dd><?php echo $gender;?></dd>
					  <dt>Date of Birth</dt>
                      <dd><?php echo $bday;?></dd>
                      <?php echo $place;?>
                      <dt>Status</dt>
                      <dd><?php echo $status;?></dd>
                      <dt>Religion</dt>
                      <dd><?php echo $religion;?></dd>
                      <dt>Contact Number</dt>
                      <dd><?php echo $contact;?></dd>
                    </dl>
                    </div>
					
					<div class="panel panel-info" style="background-color:#d9edf7;">
                         <div class="panel-heading" style="background-color:#fffff;" align="left"><b>History</b></div>

                        <?php
							mysqli_query($mysqli, "LOCK TABLES sis_student, cms_account, scms_medrec, pims_personnel, scms_illness_hist_line, scms_immune_rec_line, scms_immunization, scms_illness READ");
							if($studper['emp_no'] == NULL)
							{
								$fetch_medre = mysqli_query($mysqli, "SELECT * FROM sis_student, cms_account, scms_medrec
								WHERE cms_account.lrn = sis_student.lrn
								AND cms_account.cms_account_ID = scms_medrec.cms_account_ID
								AND cms_account.cms_account_ID = '".$id."'
								ORDER BY medrec_id DESC")
								or die(mysqli_error($mysqli));
							}
							else if($studper['lrn'] == NULL)
							{
								$fetch_medre = mysqli_query($mysqli, "SELECT * FROM pims_personnel, cms_account, scms_medrec
								WHERE cms_account.emp_no = pims_personnel.emp_No 
								AND cms_account.cms_account_ID = scms_medrec.cms_account_ID
								AND cms_account.cms_account_ID = '".$id."'
								ORDER BY medrec_id DESC")
								or die(mysqli_error($mysqli));
							}
							
							while($medre = mysqli_fetch_array($fetch_medre))
							{
					  echo '
                   <table class="table table-condensed">
                        <thead>
                            <tr>
                                <td >
                                    <h6 style="margin-top:5px;margin-left:10px;font-family:arial;font-size:13px;">'.$medre['date_of_update'].'</h6>
                                </td>
						
												
                                <td>
									<a href="#view'.$medre['medrec_id'].'" data-toggle="modal"><button type="button" class="btn btn-primary" style="float:right;margin-bottom:10px;margin-right:10px" title="View Previous Medical Record"  class="btn btn-success"><span class="fa fa-eye fa-fw" aria-hidden="true"></span></button></a>
                                </td>
                            </tr>
                        </thead> 
                        
                    </table>
                      ';
							}

                        ?>

                    </div>
					
				</div>
				
				<?php
							if($studper['emp_no'] == NULL)
							{
								$fetch_medr = mysqli_query($mysqli, "SELECT * FROM sis_student, cms_account, scms_medrec
								WHERE cms_account.lrn = sis_student.lrn
								AND cms_account.cms_account_ID = scms_medrec.cms_account_ID
								AND cms_account.cms_account_ID = '".$id."'
								ORDER BY medrec_id DESC")
								or die(mysqli_error($mysqli));
							}
							else if($studper['lrn'] == NULL)
							{
								$fetch_medr = mysqli_query($mysqli, "SELECT * FROM pims_personnel, cms_account, scms_medrec
								WHERE cms_account.emp_no = pims_personnel.emp_No 
								AND cms_account.cms_account_ID = scms_medrec.cms_account_ID
								AND cms_account.cms_account_ID = '".$id."'
								ORDER BY medrec_id DESC")
								or die(mysqli_error($mysqli));
							}
					while($medr = mysqli_fetch_array($fetch_medr))
					{
						$fetch_m = mysqli_query($mysqli, "SELECT * FROM scms_medrec
								WHERE medrec_id = '".$medr['medrec_id']."'
								ORDER BY medrec_id DESC")
								or die(mysqli_error($mysqli));
								
						$m = mysqli_fetch_array($fetch_m);
				?>
				
								            <!--View Patient Modal -->
            <div id="view<?php echo $m['medrec_id'];?>" class="modal fade" role="dialog">
			<div class="panel-body">
				<form role="form">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h5 class="modal-title"><b>Medical Record - <?php $m['date_of_update'];?></b></h5>
                        </div>
                        <div class="modal-body"  style="margin-right:10px;">
							
                                <div class="col-lg-6">
                                    <h3>Health Information</h3><br>
                                    <form role="form">
                                        <div class="form-group">
 			                            <input type="hidden" name="acc_id" id = "acc_id" value="<?php echo $_SESSION['user_data']['acct']['cms_account_ID']; ?>">
                                         <div>  
                                            <label>Allergies</label><br>
                                        <textarea style = "resize: none"class="control-label col-md-12 col-sm-4 col-xs-12" placeholder = "" name = "allergies" id ="allergies" readonly><?php echo $m['allergies'];?></textarea>
                                        </div>                                           
                                           
                                        </div>
                                        <div class="form-group">
                                            <label>Do you wear eyeglasses?</label><span class="required"></span>
                                            
											<?php 
											if($m['eyeglass'] == "Yes")
											{
												echo '<br>
													<label class="radio-inline">
														<input type="radio" name="eye" id="eye1" value="Yes" checked disabled>Yes
													</label>
													<label class="radio-inline">
														<input type="radio" name="eye" id="eye2" value="No" disabled>No
													</label>
												';
											}
											else
											{
												echo '<br>
													<label class="radio-inline">
														<input type="radio" name="eye" id="eye1" value="Yes" disabled>Yes
													</label>
													<label class="radio-inline">
														<input type="radio" name="eye" id="eye2" value="No" checked disabled>No
													</label>
												';
											}
											?>
                                           
                                        </div> 
                                        <div class="form-group">
                                        <label>Description</label><br>
                                        <textarea class="control-label col-md-12 col-sm-4 col-xs-12" name = "eyedesc" id ="eyedesc" style = "resize: none" readonly><?php echo $m['eye_cond_desc'];?></textarea>
                                        
                                            <p class="help-block">Example: Nearsighted</p>                                    
                                        </div>
                                        <div class="form-group">
                                            <label>Do you have an ear condition?</label><span class="required"></span>
											<?php
												if($m['ear_infection'] == "Yes")
												{
													echo'<br>
													<label class="radio-inline">
														<input type="radio" name="ear" id="ear1" value="Yes" checked disabled>Yes
													</label>
													<label class="radio-inline">
														<input type="radio" name="ear" id="ear1" value="No" disabled>No
													</label>
													';
												}
												else
												{
													echo'<br>
													<label class="radio-inline">
														<input type="radio" name="ear" id="ear1" value="Yes" disabled>Yes
													</label>
													<label class="radio-inline">
														<input type="radio" name="ear" id="ear1" value="No" checked disabled>No
													</label>
													';
												}
											?>
                                            
                                        </div> 
                                        <div class="form-group">
                                        <label>Description</label><br>
                                        <textarea class="control-label col-md-12 col-sm-4 col-xs-12" name = "eardesc" id ="eardesc" style = "resize: none" readonly><?php echo $m['ear_cond_desc'];?></textarea>
                                        
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
																WHERE medrec_id = '".$m['medrec_id']."' 
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
																	<input type="checkbox" value="'.$ill['illness_no'].'" name="ill[]" readonly disabled>';
															}
															else
															{
																 echo'
																	<input type="checkbox" value="'.$ill['illness_no'].'" name="ill[]" readonly checked disabled>
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
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
								<h3>For Emergency</h3><hr>
                                        <div class="form-group">
                                             <label>Name<span class="required"></span></label>
                                            <textarea class="control-label col-md-12 col-sm-4 col-xs-12" required="required"  name = "name" style = "resize: none" readonly><?php echo $m['emer_contact_name'];?> </textarea>
                                           </div>
										<div class="form-group">
                                            <label>Relationship<span class="required"></span></label>
                                            <input type="text" name="rel" required="required" value =  <?php echo $m['relationship'];?> readonly class="form-control" placeholder="">
                                        </div>
										<div class="form-group">
                                            <label>Contact Number<span class="required"></span></label>
                                            <input type="text" maxlength="11" minlength="11" value =  <?php echo $m['emer_contact_no'];?> readonly name="num" required="required" class="form-control" placeholder="">
                                        </div><br><br><br><br><br><br><br><br><br><hr>																
                              							
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
															WHERE medrec_id = '".$m['medrec_id']."' 
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
															echo '<input type="checkbox" value="'.$immune['vaccine_no'].'" name="immune[]" checked disabled>';
														}
														else
														{
															echo '<input type="checkbox" value="'.$immune['vaccine_no'].'" name="immune[]" disabled>';
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
                                <div class="modal-footer"></div>
				        </div>					
                </div>
				</form>
				</div>
            </div> 
				
				
				<?php
					}
					mysqli_query($mysqli, "UNLOCK TABLES");
				?>
				
				<div class="col-lg-8">
                    <div class="panel panel-primary">
                            
                        <!-- /.panel-heading -->
                        <div class="panel-body tooltip-demo">
						<div class="panel panel-primary" >
						<figure>
							<h2>Medical Record</h2>
							<figcaption>
							<?php
							$updateyear = mysqli_query($mysqli,"SELECT year from css_school_yr
								WHERE status = 'active'")
								or die(mysqli_error($mysqli));
								$fuyr = mysqli_fetch_assoc($updateyear);
								
								$explodeupdate =explode("-",$fuyr['year']); 
								$uyrstart = $explodeupdate['0'];
								$uyrend = $explodeupdate['1'];
							
								$update = mysqli_query($mysqli, "SELECT medrec_id FROM scms_medrec, cms_account
								WHERE scms_medrec.cms_account_ID = cms_account.cms_account_ID
								AND cms_account.cms_account_ID = '".$id."'
								AND scms_medrec.cms_account_ID = '".$id."'
								AND date_of_update BETWEEN '".$uyrstart."-06-01' AND '".$uyrend."-03-30'")
								or die(mysqli_error($mysqli));
								$u = mysqli_fetch_array($update);
							
							
							if(empty($u))
							{
								echo'<div style="padding-left:125px; padding-top:15px;"class="col-lg-12">
									<h4 style="padding-bottom:10px">*No existing Medical Record*></h4>
									<a href="update_medrec.php?id='.$id.'">
									<button type="button" style="float:center;margin-left:85px;" class="btn btn-primary btn-square btn-n" data-toggle="tooltip" data-placement="left" title="Create medical record">
									<i class="fa fa-tasks"></i> Create</button></a>
									
								</div>
								</div>
								</div>
								</div>
								</div>';
							}
							
							
							else
							{
							echo'<h4>Last Updated:</h4>';
						mysqli_query($mysqli, "LOCK TABLES cms_account, scms_medrec READ");
							$fetch_medrec = mysqli_query($mysqli, "SELECT * FROM cms_account, scms_medrec
							WHERE cms_account.cms_account_ID = scms_medrec.cms_account_ID
							AND cms_account.cms_account_ID = '".$id."'
							ORDER BY medrec_id DESC")
							or die(mysqli_error($mysqli));
							
							$medrec = mysqli_fetch_array($fetch_medrec);
							mysqli_query($mysqli, "UNLOCK TABLES");
							
							echo'<p>'.$medrec['date_of_update'].'
							
							<button style="float:right" type="button" class="btn btn-primary" data-toggle="collapse" data-target="#viewdetails"><i class="fa fa-eye fa-fw"></i> View</button>
							</p>
							</figcaption>
                            </figure>
						</div>
							<div class="span4 collapse-group">
							<div class="collapse" id="viewdetails">
							<div class="primary">
                        <div class="panel-body">
                            <div class="row">
							<div class="col-lg-6">
                                    <h3>Health Information</h3><br>
                                    <form role="form">
                                        <div class="form-group">
 			                            <input type="hidden" name="acc_id" id = "acc_id" value="<'.$_SESSION['user_data']['acct']['cms_account_ID'].'>
                                           
                                            <label>Allergies</label><br>
                                        <input type="text" readonly value = "<'.$medrec['allergies'].'" name="allergies" id="allergies" required="required" class="form-control" placeholder="">
                                                                              
                                            <p class="help-block">Example: Pollen</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Do you wear eyeglasses?</label><span class="required"></span>';
										 
											if($medrec['eyeglass'] == "Yes")
											{
												echo '<br>
													<label class="radio-inline">
														<input type="radio" name="eye" id="eye1" value="Yes" checked disabled>Yes
													</label>
													<label class="radio-inline">
														<input type="radio" name="eye" id="eye2" value="No" disabled>No
													</label>
												';
											}
											else
											{
												echo '<br>
													<label class="radio-inline">
														<input type="radio" name="eye" id="eye1" value="Yes" disabled>Yes
													</label>
													<label class="radio-inline">
														<input type="radio" name="eye" id="eye2" value="No" checked disabled>No
													</label>
												';
											}
									echo'		</div> 
                                        <div class="form-group">
                                       <label>Description</label><br>
                                        <textarea class="control-label col-md-12 col-sm-4 col-xs-12" name = "eyedesc" id ="eyedesc" style = "resize: none" readonly>'.$medrec['eye_cond_desc'].'</textarea>
                                        
                                            <p class="help-block">Example: Nearsighted</p>                                    
                                        </div>
                                        <div class="form-group">
                                            <label>Do you have an ear condition?</label><span class="required"></span>';
                                       
												if($medrec['ear_infection'] == "Yes")
												{
													echo'<br>
													<label class="radio-inline">
														<input type="radio" name="ear" id="ear1" value="Yes" checked disabled>Yes
													</label>
													<label class="radio-inline">
														<input type="radio" name="ear" id="ear1" value="No" disabled>No
													</label>
													';
												}
												else
												{
													echo'<br>
													<label class="radio-inline">
														<input type="radio" name="ear" id="ear1" value="Yes" disabled>Yes
													</label>
													<label class="radio-inline">
														<input type="radio" name="ear" id="ear1" value="No" checked disabled>No
													</label>
													';
												}
                                        echo'</div> 
                                        <div class="form-group">
                                        <label>Description</label><br>
                                        <textarea class="control-label col-md-12 col-sm-4 col-xs-12" name = "eardesc" id ="eardesc" style = "resize: none" readonly>'.$medrec['ear_cond_desc'].'</textarea>

                                            <p class="help-block">Example: Middle ear infection</p>                                    
                                        </div> <hr>
                                       <h3>Illness History</h3>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th><small>#</small></th>
                                                            <th><small>Illness</small></th>
                                                            <th><small>Record</small></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>';
													   mysqli_query($mysqli , "LOCK TABLES scms_illness_hist_line, scms_illness READ");
                                                        $fetch_ill = mysqli_query($mysqli, "SELECT * FROM scms_illness")
                                                        or die(mysqli_error($mysqli));

                                                        $illcount = 0;
                                                        while($ill = mysqli_fetch_array($fetch_ill))
                                                        {
															$f_illness = mysqli_query($mysqli, "SELECT * FROM scms_illness_hist_line 
																WHERE medrec_id = '".$medrec['medrec_id']."' 
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
																	<input type="checkbox" value="'.$ill['illness_no'].'" name="ill[]" readonly disabled>';
															}
															else
															{
																 echo'
																	<input type="checkbox" value="'.$ill['illness_no'].'" name="ill[]" readonly checked disabled>
																';
															}
															echo'
															</label>
															</td>
															</tr>
															';
                                                           
                                                        }
														mysqli_query($mysqli, "UNLOCK TABLES");
                                                        

                                                echo'    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.table-responsive -->
                                        </div>  

                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
								<h3>For Emergency</h3><br>
                                        <div class="form-group">
                                            <label>Name<span class="required"></span></label>
											<textarea class="control-label col-md-12 col-sm-4 col-xs-12" required="required"  name = "name" style = "resize: none" readonly>'.$medrec['emer_contact_name'].'</textarea>
                                           <!-- <input type="text" name="name" required="required" value = "'.$medrec['emer_contact_name'].'" readonly class="form-control" placeholder="First Name/Last Name">-->
                                        </div>
										<div class="form-group">
                                            <label>Relationship<span class="required"></span></label>
                                            <input type="text" name="rel" required="required" value = "'.$medrec['relationship'].'" readonly class="form-control" placeholder="">
                                        </div>
										<div class="form-group">
                                            <label>Contact Number<span class="required"></span></label>
                                            <input type="text" maxlength="11" minlength="11" value =  "'.$medrec['emer_contact_no'].'" readonly name="num" required="required" class="form-control" placeholder="">
                                        </div><br><br><br><br><br><br><br><hr>									
                                    </form>								
                              							
                                    <h3>Immunization Record</h3>
                                    <div class="panel-body">
                                    <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th><small>#</small></th>
                                                        <th><small>Immunization</small></th>
                                                        <th><small>Record</small></th>
                                                    </tr>
                                                </thead>
                                                <tbody>.';
                                                    
													mysqli_query($mysqli, "scms_immune_rec_line, scms_immunization READ");
                                                    $fetch_immune = mysqli_query($mysqli, "SELECT * FROM scms_immunization")
                                                    or die(mysqli_error($mysqli));

                                                    $immunecount = 0;
                                                    while($immune = mysqli_fetch_array($fetch_immune))
                                                    {
														
														$_immune = mysqli_query($mysqli, "SELECT * FROM scms_immune_rec_line, scms_immunization
															WHERE medrec_id = '".$medrec['medrec_id']."' 
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
															echo '<input type="checkbox" value="'.$immune['vaccine_no'].'" name="immune[]" checked disabled>';
														}
														else
														{
															echo '<input type="checkbox" value="'.$immune['vaccine_no'].'" name="immune[]" disabled>';
														}
														echo'
                                                        </label>
                                                        </td>
                                                        </tr>
                                                        ';
                                                    }
													
													mysqli_query($mysqli, "UNLOCK TABLES");
                                                    

                                            echo'    </tbody>
                                            </table>
                                        </div> 
                                        </div>

										</form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
							
                                        

						</div>
							</div>
							<a href="update_medrec.php?id='.$id.'">';
								mysqli_query($mysqli, "LOCK TABLES css_school_yr, scms_medrec, cms_account READ");
								$updateyear = mysqli_query($mysqli,"SELECT year from css_school_yr
								WHERE status = 'active'")
								or die(mysqli_error($mysqli));
								$fuyr = mysqli_fetch_assoc($updateyear);
								
								$explodeupdate =explode("-",$fuyr['year']); 
								$uyrstart = $explodeupdate['0'];
								$uyrend = $explodeupdate['1'];
							
								$update = mysqli_query($mysqli, "SELECT medrec_id FROM scms_medrec, cms_account
								WHERE scms_medrec.cms_account_ID = cms_account.cms_account_ID
								AND scms_medrec.cms_account_ID = '".$id."'
								AND date_of_update BETWEEN '".$uyrstart."-06-01' AND '".$uyrend."-03-30'")
								or die(mysqli_error($mysqli));
								$u = mysqli_fetch_array($update);
								
								mysqli_query($mysqli, "UNLOCK TABLES");
								
								if(empty($u))
								{
									echo'
									<button type="button" style="float:right;margin-left:5px;" class="btn btn-primary btn-square btn-n" data-toggle="tooltip" data-placement="left" title="Update medical record">
									<i class="fa fa-tasks"></i> Update</button></a>';
								}
								else{
									echo'
									<button disabled type="button" style="float:right;margin-left:5px;" class="btn btn-primary btn-square btn-n" data-toggle="tooltip" data-placement="left" title="Update medical record">
									<i class="fa fa-tasks"></i> Update</button></a>';
								}
						echo'	<a href="../../fpdf/medform.php?id=<?php echo $id;?>"><button type="button" style="float:right;margin-right:5px;" class="btn btn-info btn-square btn-n" data-toggle="tooltip" data-placement="left" title="Print Medical Record">
							<i class="fa fa-print"></i> Print</button></a>';
							}
							?>
                                            
							</div>
							</div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
               
		</div>

        </div>
	</div>
            <br><br><br>
            <!-- Footer --> 
            <?php include "../../pages/include/footer.php"; ?>   
    <script src="../../js/index.js"></script>    
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
