<!DOCTYPE html>
<html lang="en">

<?php 
include("../../db_connect.php");
session_start();
include("../include/session.php"); 

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
		mysqli_query($mysqli, "LOCK TABLES sis_student READ");
		$q_getstud = mysqli_query($mysqli, "SELECT *, LEFT(stu_mname, 1) FROM sis_student
			WHERE lrn='".$accountstuper['lrn']."'")
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
		$statusacc = "Student";
		
		if ($row['sis_gender'] == "Male")
		{$image = "male.png";}
		else if($row['sis_gender'] == "Female")
		{$image = "female.png";}
	}
	else if($accountstuper['lrn'] == NULL)
	{
		mysqli_query($mysqli, "LOCK TABLES pims_personnel READ");
		$q_getper = mysqli_query($mysqli, "SELECT *, LEFT(P_mname, 1) FROM pims_personnel
			WHERE emp_No = '".$accountstuper['emp_no']."'")
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
		$temp = '<dt>Temporary Address</dt><dd>'.$row['temp_address_street'].' '.$row['temp_address_house_no'].' '.$row['temp_address_subdivision_village'].' '.$row['temp_address_barangay'].' '.$row['temp_address_municipality_city'].', '.$row['temp_address_province'].'</dd>';
		$perm = '<dt>Permanent Address</dt><dd>'.$row['perm_address_street'].' '.$row['perm_address_house_no'].' '.$row['perm_address_subdivision_village'].' '.$row['perm_address_barangay'].' '.$row['perm_address_municipality_city'].', '.$row['perm_address_province'].'</dd>';
		$place = ''.$temp.''.$perm.'';       
		$status = strtoupper($row['civil_status']);
        $religion = strtoupper($row['pims_religion']);
        $contact = strtoupper($row['pims_contact_no']);
        $email = $row['P_email'];
		$statusacc = "Personnel";
		
		if ($row['pims_gender'] == "Male")
		{$image = "male.png";}
		else if($row['pims_gender'] == "Female")
		{$image = "female.png";}
		
	}
mysqli_query($mysqli, "UNLOCK TABLES");

    

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

.dl-horizontal dt {
    float: left;
    width: 150px;
    overflow: hidden;
    clear: left;
    text-align: right;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.dl-horizontal dd {
    margin-left: 180px;
}
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
            <div class="container-fluid" style="margin-right:40px;margin-left:70px;">
			<ol class="breadcrumb">
				<li><a href="index.php">Health Monitoring</a></li>
				<li class="active">My Medical Record</li>
			</ol>
                <div class="container-fluid">
                    <h1 class="page-header">Profile <small><small> Personal Profile and Medical Record</small></small>
                   </h1>
                </div>
                <!-- /.col-lg-12 -->
				
                <div class="col-lg-12"  >
				<div class="col-lg-5">
                    <div class="panel panel-info" style="background-color:#d9edf7;">
                    <div class="panel-heading" style="background-color:#fffff; " align="left" >
					<img src="../../img/<?php echo $image;?>" align="right"; height="70"; width="70" >
					<br><b><?php echo $name;?></b><br>
					<b><?php echo $statusacc;?></b><br>
					</div>
                        
                    <dl class="dl-horizontal" ><br>
                      <dt>Last Name</dt>
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
							mysqli_query($mysqli, "LOCK TABLES css_school_yr, sis_student, cms_account, scms_medrec, pims_personnel, scms_illness_hist_line, scms_immune_rec_line, scms_immunization, scms_illness READ");
							
							$updateyear = mysqli_query($mysqli,"SELECT year from css_school_yr
								WHERE status = 'active'")
								or die(mysqli_error($mysqli));
								$fuyr = mysqli_fetch_assoc($updateyear);
								
								$explodeupdate =explode("-",$fuyr['year']); 
								$uyrstart = $explodeupdate['0'];
								$uyrend = $explodeupdate['1'];
							if($accountstuper['emp_no'] == NULL)
							{
								$fetch_medre = mysqli_query($mysqli, "SELECT *, DATE_FORMAT(date_of_update, '%M %e, %Y') AS date_update FROM sis_student, cms_account, scms_medrec
								WHERE cms_account.lrn = sis_student.lrn
								AND cms_account.cms_account_ID = scms_medrec.cms_account_ID
								AND cms_account.cms_account_ID = '".$_SESSION['user_data']['acct']['cms_account_ID']."'
								AND date_of_update NOT BETWEEN '".$uyrstart."-06-01' AND '".$uyrend."-03-30'
								ORDER BY medrec_id DESC")
								or die(mysqli_error($mysqli));
							}
							else if($accountstuper['lrn'] == NULL)
							{
								$fetch_medre = mysqli_query($mysqli, "SELECT *, DATE_FORMAT(date_of_update, '%M %e, %Y') AS date_update FROM pims_personnel, cms_account, scms_medrec
								WHERE cms_account.emp_no = pims_personnel.emp_No 
								AND cms_account.cms_account_ID = scms_medrec.cms_account_ID
								AND cms_account.cms_account_ID = '".$_SESSION['user_data']['acct']['cms_account_ID']."'
								AND date_of_update NOT BETWEEN '".$uyrstart."-06-01' AND '".$uyrend."-03-30'
								ORDER BY medrec_id DESC")
								or die(mysqli_error($mysqli));
							}
														
							while($medre = mysqli_fetch_array($fetch_medre))
							{
                                      

                                    $xeye = strtoupper($medre['eyeglass']);
                                    $xear = strtoupper($medre['ear_infection']);
                                    $xeyed = strtoupper($medre['eye_cond_desc']);
                                    $xeard = strtoupper($medre['ear_cond_desc']);


                                    if(empty($xeyed))
                                    {
                                        $xeyed = "N/A";
                                    }
                                    if(empty($xeard))
                                    {
                                        $xeard = "N/A";
                                    }
                                
					  echo '
                   <table class="table table-condensed">
                        <thead>
                            <tr>
                                <td >
                                    <h6 style="margin-top:5px;margin-left:10px;font-family:arial;font-size:13px;">'.$medre['date_update'].'</h6>
                                </td>
						
												
                                <td>
									<a href="#view'.$medre['medrec_id'].'" data-toggle="modal"><button type="button" class="btn btn-primary btn-sm" style="float:right;margin-bottom:10px;margin-right:10px" title="View Previous Medical Record" class="btn btn-success"><span class="fa fa-eye fa-fw" aria-hidden="true"></span> View</button></a>
                                </td>
                            </tr>
                        </thead> 
                        
                    </table>
                      ';
							}
							$prevrows = mysqli_num_rows($fetch_medre);
							if ($prevrows==0){
								echo'
									<div align="center"align="center"  class="col-lg-12 panel-heading">
									<h5>*No Previous Medical Record*</h5></div>';
							}
                        ?>

                    </div>
				</div>
			
				<?php
							if($accountstuper['emp_no'] == NULL)
							{
								$fetch_medr = mysqli_query($mysqli, "SELECT * FROM sis_student, cms_account, scms_medrec
								WHERE cms_account.lrn = sis_student.lrn
								AND cms_account.cms_account_ID = scms_medrec.cms_account_ID
								AND cms_account.cms_account_ID = '".$_SESSION['user_data']['acct']['cms_account_ID']."'
								ORDER BY medrec_id DESC")
								or die(mysqli_error($mysqli));
							}
							else if($accountstuper['lrn'] == NULL)
							{
								$fetch_medr = mysqli_query($mysqli, "SELECT * FROM pims_personnel, cms_account, scms_medrec
								WHERE cms_account.emp_no = pims_personnel.emp_No 
								AND cms_account.cms_account_ID = scms_medrec.cms_account_ID
								AND cms_account.cms_account_ID = '".$_SESSION['user_data']['acct']['cms_account_ID']."'
								ORDER BY medrec_id DESC")
								or die(mysqli_error($mysqli));
							}
					while($medr = mysqli_fetch_array($fetch_medr))
					{
						$fetch_m = mysqli_query($mysqli, "SELECT *, DATE_FORMAT(date_of_update, '%M %e, %Y') AS date_update FROM scms_medrec
								WHERE medrec_id = '".$medr['medrec_id']."'
								ORDER BY medrec_id DESC")
								or die(mysqli_error($mysqli));
								
						$m = mysqli_fetch_array($fetch_m);
                        

                                    $eye = strtoupper($m['eyeglass']);
                                    $ear = strtoupper($m['ear_infection']);
                                    $eyed = strtoupper($medre['eye_cond_desc']);
                                    $eard = strtoupper($m['ear_cond_desc']);


                                    if(empty($eyed))
                                    {
                                        $eyed = "N/A";
                                    }
                                    if(empty($eard))
                                    {
                                        $eard = "N/A";
                                    }
				?>
				
				
				            <!--View Patient Modal -->
            <div id="view<?php echo $m['medrec_id'];?>" class="modal fade" role="dialog">
			<div class="panel-body">
				<form role="form">
                <div class="modal-dialog modal-md">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h5 class="modal-title"><b>Medical Record - <?php echo $m['date_update'];?></b></h5>
                        </div>
                        <div class="modal-body"  style="margin-right:10px;">
							
                                <div class="col-lg-6">
                                   <h5><strong>Health Information</strong></h5><br>
                                    <form role="form">
                                        <div class="form-group">
 			                            <input type="hidden" name="acc_id" id = "acc_id" value="<?php echo $_SESSION['user_data']['acct']['cms_account_ID']; ?>">  
                                            <label>Allergies</label><br>
                                        <li><?php echo $m['allergies'];?></li>       
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
                                        <p><?php echo $eyed;?></p>
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
                                        <p><?php echo $eard; ?></p>
                                        </div><hr>
                                        <h5><strong>Illness History</strong></h5>

                                        <?php
                                                        $fetch_ill = mysqli_query($mysqli, "SELECT illness_name FROM scms_illness_hist_line,            scms_medrec, scms_illness
																WHERE scms_medrec.medrec_id = '".$medr['medrec_id']."' 
																AND scms_illness.illness_no = scms_illness_hist_line.illness_no
                                                                AND scms_medrec.medrec_id = scms_illness_hist_line.medrec_id")
                                                        or die(mysqli_error($mysqli));
                                                        while($ill = mysqli_fetch_array($fetch_ill))
                                                        {
                                                           
                                                                echo '<li>'.$ill['illness_name'].'</li>';
                                                        }
														$il = mysqli_num_rows($fetch_ill);
														if($il == 0){
															 echo'
																<center><h5>*No Illness History*</h5></center>
																';
														}
                                        ?>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
								<h5><strong>For Emergency</strong></h5><br>
                                        <div class="form-group">
                                            <label>Name<span class="required"></span></label>
                                            <p><?php echo $m['emer_contact_name'];?> </[p]>
                                           </div>
										<div class="form-group">
                                            <label>Relationship<span class="required"></span></label>
                                            <p><?php echo $m['relationship'];?></p>
                                        </div>
										<div class="form-group">
                                            <label>Contact Number<span class="required"></span></label>
                                            <p><?php echo $m['emer_contact_no'];?></p>
                                        </div><br><br><br><br><br><hr>															
                              							
                                    <h5><strong>Immunization Record</strong></h5>
                                                    <?php
													mysqli_query($mysqli, "scms_immune_rec_line, scms_immunization READ");
                                                    $fetch_immune = mysqli_query($mysqli, "SELECT DISTINCT(vaccine_name) as vacc FROM scms_immunization,                     scms_immune_rec_line, scms_medrec, scms_illness
																WHERE scms_medrec.medrec_id = '".$medr['medrec_id']."' 
																AND scms_immunization.vaccine_no = scms_immune_rec_line.vaccine_no
                                                                AND scms_medrec.medrec_id = scms_immune_rec_line.medrec_id")
                                                    or die(mysqli_error($mysqli));

                                                    while($im = mysqli_fetch_array($fetch_immune))
                                                    {
                                                                echo '<li>'.$im['vacc'].'</li>';
                                                               
                                                         
                                                    }
													$imm = mysqli_num_rows($fetch_immune);
														if($imm == 0){
															echo '<center><p>*Unknown Immunization Record*</p><center>';
														}
													
                                                    ?>
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
				
				<div class="col-lg-7">
                    <div class="panel panel-primary">
                            
                        <!-- /.panel-heading -->
                        <div class="panel-body tooltip-demo">
						<div class="panel panel-primary" >
						<figure>
							<h4>Medical Record</h4>
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
								AND scms_medrec.cms_account_ID = '".$_SESSION['user_data']['acct']['cms_account_ID']."'
								AND date_of_update BETWEEN '".$uyrstart."-06-01' AND '".$uyrend."-03-30'")
								or die(mysqli_error($mysqli));
								$u = mysqli_fetch_array($update);
							
							
							if(empty($u))
							{
									echo'<div align="center"><hr>
									<h5 >*No existing Medical Record*</h5>
									<a href="create_medrec.php?id='.base64_url_encode($accountstuper['cms_account_ID']).'">
									<button type="button" style="float:center;" class="btn btn-primary btn-square btn-n" data-toggle="tooltip" data-placement="left" title="Create Medical Record">
									<i class="fa fa-tasks"></i> Create</button></a>
									
								</div>
								</div>
								</div>
								</div>
								</div>';
							}
							
							
							else
							{
							echo'<h5>Last Updated:<button style="float:right" type="button" class="btn btn-primary btn-sm" title="View Medical Record" data-toggle="collapse" data-target="#viewdetails"><i class="fa fa-eye fa-fw"></i> View</button></h5>';
						mysqli_query($mysqli, "LOCK TABLES cms_account, scms_medrec READ");
							$fetch_medrec = mysqli_query($mysqli, "SELECT *, DATE_FORMAT(date_of_update, '%M %e, %Y') AS date_update FROM cms_account, scms_medrec
							WHERE cms_account.cms_account_ID = scms_medrec.cms_account_ID
							AND cms_account.cms_account_ID = '".$_SESSION['user_data']['acct']['cms_account_ID']."'
							AND date_of_update BETWEEN '".$uyrstart."-06-01' AND '".$uyrend."-03-30'
							ORDER BY medrec_id DESC")
							or die(mysqli_error($mysqli));
							
							$medrec = mysqli_fetch_array($fetch_medrec);
							mysqli_query($mysqli, "UNLOCK TABLES");
							
							echo'<h6>'.$medrec['date_update'].'
							</h6>
							</figcaption>
                            </figure>
						</div>
							<div class="span4 collapse-group">
							<div class="collapse" id="viewdetails">
							<div class="primary">
                        <div class="panel-body">
                            <div class="row">
							<div class="col-lg-6">
                                    <h5><strong>Health Information</strong></h5><br>
                                    <form role="form">
                                        <div class="form-group">
 			                            <input type="hidden" name="acc_id" id = "acc_id" value="'.$_SESSION['user_data']['acct']['cms_account_ID'].'">
                                           
                                            <label>Allergies</label><br>
                                        <li>'.$medrec['allergies'].'</li>
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
                                        <p>'.$eyed.'</p>                                 
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
                                        <p>'.$eard.'</p>                           
                                        </div> <hr>
                                       <h5><strong>Illness History</strong></h5>
                                      ';
                                                        $fetch_ill = mysqli_query($mysqli, "SELECT illness_name FROM scms_illness_hist_line,            scms_medrec, scms_illness
																WHERE scms_medrec.medrec_id = '".$medrec['medrec_id']."' 
																AND scms_illness.illness_no = scms_illness_hist_line.illness_no
                                                                AND scms_medrec.medrec_id = scms_illness_hist_line.medrec_id")
                                                        or die(mysqli_error($mysqli));

                                                        while($ill = mysqli_fetch_array($fetch_ill))
                                                        {
                                                                echo '<li>'.$ill['illness_name'].'</li>';
                                                        }
														
														$il = mysqli_num_rows($fetch_ill);
														if($il == 0){
															 echo'
																<center><h5>*No Illness History*</h5></center>
																';
														}
                                                        

                                                echo'  
                                       

                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
								<h5><strong>For Emergency</strong></h5><br>
                                        <div class="form-group">
                                            <label>Name<span class="required"></span></label>
											<p>'.$medrec['emer_contact_name'].'</p>
                                           <!-- <input type="text" name="name" required="required" value = "'.$medrec['emer_contact_name'].'" readonly class="form-control" placeholder="First Name/Last Name">-->
                                        </div>
										<div class="form-group">
                                            <label>Relationship<span class="required"></span></label>
                                            <p>'.$medrec['relationship'].' </p>
                                        </div>
										<div class="form-group">
                                            <label>Contact Number<span class="required"></span></label>
                                            <p>'.$medrec['emer_contact_no'].'</p>
                                        </div><br><br><br><br><br><hr>							
                                    </form>										
                              							
                                    <h5><strong>Immunization Record</strong></h5>';
                                                    
                                                    $fetch_immune = mysqli_query($mysqli, "SELECT DISTINCT(vaccine_name) as vacc  FROM scms_immunization,                     scms_immune_rec_line, scms_medrec, scms_illness
																WHERE scms_medrec.medrec_id = '".$medrec['medrec_id']."' 
																AND scms_immunization.vaccine_no = scms_immune_rec_line.vaccine_no
                                                                AND scms_medrec.medrec_id = scms_immune_rec_line.medrec_id")
                                                    or die(mysqli_error($mysqli));

                                                    while($im = mysqli_fetch_array($fetch_immune))
                                                    {
                                                                echo '<li>'.$im['vacc'].'</li>';
                                                               
                                                         
                                                    }
													$imm = mysqli_num_rows($fetch_immune);
														if($imm == 0){
															echo '<center><p>*Unknown Immunization Record*</p><center>';
														}
													
                                                    

                                            echo'    

						
                                        

						</div>
							</div><br>
							<a href="update_medrec_stuper.php">';
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
								AND scms_medrec.cms_account_ID = '".$_SESSION['user_data']['acct']['cms_account_ID']."'
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
						echo'
                                    <a href="../../fpdf/medform.php?id='.base64_url_encode($_SESSION['user_data']['acct']['cms_account_ID']).'"><button type="button" style="float:right" class="btn btn-info btn-square btn-n" data-toggle="tooltip" data-placement="left" title="Print medical record">            
									<i class="fa fa-print"></i> Print</button></a>';         
										}
										?>
                            </figcaption></figure>                
							</div>
							</div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
               
            </div>
	<!--/.row-->
			

    </div>
    
    </div>        <!-- Footer --> 
</div>   <br><br><br><br>
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