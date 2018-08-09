<?php
	include('../func.php');
	include('../php/connection.php');
	include('../php/_Func.php');
	include('../php/_Def.php');
	$_SESSION['hist'] = $_SERVER['REQUEST_URI'];
	if(isset($_SESSION['user_data']['acct']['emp_no']) AND $_SESSION['user_data']['priv']['cms_priv']==1 OR $_SESSION['user_data']['priv']['superadmin']==1) {

    }
	else {
 	header('Location: ../index.php');
	 	die();
	}

	if(isset($_SESSION['user_data']['acct']['emp_no'])) {
        if(isset($_SESSION['user_data']['acct']['lrn'])){
            $lrn=$_SESSION['user_data']['acct']['lrn'];
            $aid=$_SESSION['user_data']['acct']['cms_account_ID'];
            
        }else if(isset($_SESSION['user_data']['acct']['emp_no'])){
            $emp=$_SESSION['user_data']['acct']['emp_no'];
            $aid=$_SESSION['user_data']['acct']['cms_account_ID'];
            $rec=mysqli_query($mysqli,"SELECT dms_receiver.rec_no FROM dms_receiver,cms_account WHERE cms_account.cms_account_id=dms_receiver.cms_account_id AND dms_receiver.cms_account_id=$aid");
            $recrow=mysqli_fetch_assoc($rec);
            $recid=$recrow['rec_no'];
        }
	}
	else {
		header('Location: ../index.php');
		die('');
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	  	<meta charset="UTF-8">
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	  	<title>PAG-ASA National High School</title>
		<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/w3/w3.css">
		<link rel="stylesheet" href="docs/docs.min.css">
		<link rel="stylesheet" href="css/w3/blue.css">
		<link rel="stylesheet" href="css/w3/yellow.css">
<!--		<link rel="stylesheet" href="css/sideNav.css">-->
		<link rel="stylesheet" href="css/backToTop.css">
		<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css" type="text/css">
		<link rel="shortcut icon" href="../img/pnhs_favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="css/metisMenu.min.css" type="text/css">
		<link rel="icon" href="../img/pnhs_favicon.ico" type="image/x-icon">
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
        <script src="js/index.js"></script>
        <script src="js/metisMenu.min.js"></script>
		<script src="js/sb-admin-2.min.js"></script>
		<style>
			.switch {
				position: relative;
				display: inline-block;
				width: 60px;
				height: 34px;
			}
			.switch input {
				display:none;
			}
			.slider {
				position: absolute;
				cursor: pointer;
				top: 0;
				left: 0;
				right: 0;
				bottom: 0;
				background-color: #ccc;
				-webkit-transition: .4s;
				transition: .4s;
			}
			.slider:before {
				position: absolute;
				content: "";
				height: 26px;
				width: 26px;
				left: 4px;
				bottom: 4px;
				background-color: white;
				-webkit-transition: .4s;
				transition: .4s;
			}
			input:checked + .slider {
				background-color: #2196F3;
			}
			input:focus + .slider {
				box-shadow: 0 0 1px #2196F3;
			}
			input:checked + .slider:before {
				-webkit-transform: translateX(26px);
				-ms-transform: translateX(26px);
				transform: translateX(26px);
			}
			.slider.round {
				border-radius: 34px;
			}
			.slider.round:before {
				border-radius: 50%;
			}
			.navbar-header {
			    float: !important;
			    text-align: center!important;
			}

            <?php if(isset($_SESSION['user_data']['acct']['emp_no'])){ ?>
            #wrapper{
                padding-left: 16%!important;
            }
    		<?php } ?>
		</style>
		<script src="js/_jv/dist/jquery.validate.min.js"></script>
		<script src="js/_jv/dist/additional-methods.js"></script>
		<script src="js/_ck/ckeditor.js"></script>
	</head>
	<body onload="myFunction()">
        <?php include("topnav.php"); ?>
        <div id="wrapper"> 
            <?php 
                if(isset($_SESSION['user_data'])){
                    include("sidenav.php");
                }
            ?>
            <br>
            <br>
            <br>
			<div id="main" class="container-fluid">
				<div class="col-xs-12 col-sm-12 col-md-12" id="main-content">
					<div class="modal fade" id="msg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title"></h4>
									</div>
									<div class="modal-body">
										<h3 class="text-center"><?php echo $_SESSION['msg']; ?></h3>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
							</div>
						</div>     
					</div>
					<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title"></h4>
									</div>
									<div class="modal-body">
										<h3 class="text-center">Log Out?</h3>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										<a href="../php/_logout.php" class="btn btn-danger">Log Out</a>
									</div>
							</div>
						</div>     
					</div>
					<?php
						if(isset($_SESSION['msg']) AND $_SESSION['msg']!='' AND $_SESSION['msg'] != NULL) {
							echo "<script>$('#msg').modal('show');</script>";
							echo $_SESSION['msg']='';
						}
					?>
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-primary">
								<div class="panel-body">
									<h1>Edit Account</h1>
									<?php
									?>
									<hr>
									<div class="row">
										<div class="col-md-1">
										</div>
										<div class="col-md-10">
											<form action="_Sub/update_personnel_account.php" method="POST">
												<div class="form-group">
													<div class="row">
														<div class="col-lg-6">
															<label for="acc">Personnel Account: </label>
																<?php
																	$id = $mysqli->real_escape_string($_GET['id']);
																	$P_fname = $P_mname = $P_lname = $emp_no = '';
																	$pims_query="SELECT `emp_no`, `P_fname`, `P_mname`, `P_lname` FROM `pims_personnel` WHERE `emp_no` = '$id';";
																	$get_pims = $mysqli->query($pims_query);
																	while($pims = $get_pims->fetch_assoc()) {
																		$P_fname = $pims['P_fname'];
																		$P_mname = $pims['P_mname'];
																		$P_lname = $pims['P_lname'];
																		$emp_no = $pims['emp_no'];
																	}
																?>
															<input type="text" value="<?php echo $P_fname.' '.$P_mname.' '.$P_lname; ?>" class="form-control" placeholder="" readonly="">
														</div>
														<div class="col-lg-6">
															<label for="acc">Job Title: </label>
																<?php
																	$emp_rec_query="SELECT `job_title_code` FROM `pims_employment_records` WHERE `emp_no` = '$emp_no' LIMIT 1;";
																	$get_emp_rec = $mysqli->query($emp_rec_query);
																	$emp_rec = $get_emp_rec->fetch_assoc();
																	$job_title_code = $emp_rec['job_title_code'];
																	$job_title_query="SELECT `job_title_name` FROM `pims_job_title` WHERE `job_title_code` = '$job_title_code' LIMIT 1;";
																	$get_job_title = $mysqli->query($job_title_query);
																	$job_title = $get_job_title->fetch_assoc();
																	$job_title_name = $job_title['job_title_name'];
																	$username = $password = '';
																	$cms_query="SELECT * FROM `cms_account` WHERE `emp_no` = '$id';";
																	$cms = $mysqli->query($cms_query);
																	$cnt1 = 1;
																	while($data = $cms->fetch_assoc()) {
																		$username = $data['cms_username'];
																		$password = pcrypt($data['cms_password'], 'dcrypt');
																		$cms_id = $data['cms_account_ID'];
																	}
																?>
															<input type="text" value="<?php echo $job_title_name; ?>" class="form-control" placeholder="" readonly="">
														</div>
													</div>
												</div>
												<br>
												<div class="form-group">
													<div class="row">
														<div class="col-lg-6">
															<label for="username">Username: </label>
															<input type="text" class="form-control" id="u" name="u" placeholder="" required="" value="<?php echo $username; ?>">
														</div>
														<div class="col-lg-6">
															<label for="password">Password: </label>
															<input type="password" class="form-control" id="p" name="p" placeholder="" value="<?php echo $password; ?>">
															<input type="hidden" class="form-control" id="id" name="id" placeholder="" value="<?php if(isset($_GET['id'])) {echo $_GET['id'];} ?>">
															<br>
															<input type="checkbox" value="1" name="default"> Default Password
														</div>
													</div>
												</div>
												<br>
												<?php
													/*
													$cms_account_ID = '';
													$get_cms_query="SELECT `cms_account_ID` FROM `cms_account` WHERE `emp_no` = '$id';";
													$get_cms = $mysqli->query($get_cms_query);
													$cnt1 = 1;
													while($cms = $get_cms->fetch_assoc()) {
														$cms_account_ID = $cms['cms_account_ID'];
													}
													$get_priv_query="SELECT * FROM `cms_privilege` WHERE `cms_account_id` = '$cms_account_ID';";
													$get_priv = $mysqli->query($get_priv_query);
													$accttype = [];
													$cnt1 = 0;
													while($priv = $get_priv->fetch_assoc()) {
														array_push($accttype, $priv['cms_account_type']);
														//echo '<pre>'.print_r($priv).'</pre>';
														switch($priv['cms_account_type']) {
															case 'superadmin':
																$type = '-sa-edit';
																$nameaccttype = 'Super Admin';
																$namecb = 'at-sa-edit';
																break;
															case 'admin':
																$type = '-a-edit';
																$nameaccttype = 'Admin';
																$namecb = 'at-a-edit';
																break;
															case 'user':
																$type = '-u-edit';
																$nameaccttype = 'User';
																$namecb = 'at-u-edit';
																break;
														}
														echo '<input type="checkbox" name="'.$namecb.'" value="1"> Delete '.$nameaccttype.' Priviledges<span class="caret"></span>';
														echo '<div class="row" id="priv'.$cnt1.'"><br>';
														if($priv['frms_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>DMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="DMS'.$type.'" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>DMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="DMS'.$type.'">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														if($priv['ims_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>IMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="IMS'.$type.'" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>IMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="IMS'.$type.'">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														if($priv['ipcrms_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>IPCRMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="IPCRMS'.$type.'" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>IPCRMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="IPCRMS'.$type.'">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														if($priv['oes_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>OES</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="OES'.$type.'" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>OES</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="OES'.$type.'">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														if($priv['pms_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>PMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="PMS'.$type.'" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>PMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="PMS'.$type.'">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														if($priv['pims_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>PIMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="PIMS'.$type.'" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>PIMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="PIMS'.$type.'">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														if($priv['prs_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>PRS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="PRS'.$type.'" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>PRS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="PRS'.$type.'">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														if($priv['css_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>CSS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="CSS'.$type.'" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>CSS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="CSS'.$type.'">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														if($priv['scms_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>SCMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="SCMS'.$type.'" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>SCMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="SCMS'.$type.'">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														if($priv['sis_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>SIS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="SIS'.$type.'" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>SIS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="SIS'.$type.'">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														if($priv['cms_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>CMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="CMS'.$type.'" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>CMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="CMS'.$type.'">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														echo  '</div>';
													}
													echo '<br>';
													//echo '<pre>'.print_r($accttype).'</pre>';
													if(!in_array("superadmin", $accttype)) {
														echo '<input type="checkbox" name="at_sa_add" value="1"> Add Super Admin Priviledges<span class="caret"></span>';
														echo '<div id="sa-cb-add" class="row"><br>';
														if($priv['frms_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>DMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="DMS-sa-edit" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>DMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="DMS-sa-edit">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														if($priv['ims_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>IMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="IMS-sa-edit" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>IMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="IMS-sa-edit">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														if($priv['ipcrms_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>IPCRMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="IPCRMS-sa-edit" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>IPCRMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="IPCRMS-sa-edit">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														if($priv['oes_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>OES</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="OES-sa-edit" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>OES</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="OES-sa-edit">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														if($priv['pms_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>PMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="PMS-sa-edit" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>PMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="PMS-sa-edit">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														if($priv['pims_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>PIMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="PIMS-sa-edit" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>PIMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="PIMS-sa-edit">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														if($priv['prs_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>PRS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="PRS-sa-edit" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>PRS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="PRS-sa-edit">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														if($priv['css_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>CSS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="CSS-sa-edit" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>CSS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="CSS-sa-edit">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														if($priv['scms_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>SCMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="SCMS-sa-edit" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>SCMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="SCMS-sa-edit">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														if($priv['sis_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>SIS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="SIS-sa-edit" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>SIS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="SIS-sa-edit">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														if($priv['cms_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>CMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="CMS-sa-edit" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>CMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="CMS-sa-edit">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														echo  '</div>';
														echo '<br>';
													}
													
													if(!in_array("admin", $accttype)) {
														echo '<input type="checkbox" name="at_a_add" value="1"> Add Admin Priviledges<span class="caret"></span>';
														echo '<div id="a-cb-add" class="row"><br>';
														if($priv['frms_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>DMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="DMS-a-edit" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>DMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="DMS-a-edit">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														if($priv['ims_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>IMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="IMS-a-edit" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>IMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="IMS-a-edit">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														if($priv['ipcrms_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>IPCRMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="IPCRMS-a-edit" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>IPCRMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="IPCRMS-a-edit">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														if($priv['oes_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>OES</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="OES-a-edit" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>OES</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="OES-a-edit">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														if($priv['pms_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>PMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="PMS-a-edit" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>PMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="PMS-a-edit">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														if($priv['pims_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>PIMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="PIMS-a-edit" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>PIMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="PIMS-a-edit">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														if($priv['prs_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>PRS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="PRS-a-edit" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>PRS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="PRS-a-edit">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														if($priv['css_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>CSS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="CSS-a-edit" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>CSS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="CSS-a-edit">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														if($priv['scms_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>SCMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="SCMS-a-edit" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>SCMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="SCMS-a-edit">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														if($priv['sis_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>SIS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="SIS-a-edit" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>SIS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="SIS-a-edit">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														if($priv['cms_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>CMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="CMS-a-edit" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>CMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="CMS-a-edit">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														echo  '</div>';
														echo '<br>';
													}
													if(!in_array("user", $accttype)) {
														echo '<input type="checkbox" name="at_u_add" value="1"> Add User Priviledges<span class="caret"></span>';
														echo '<div id="u-cb-add" class="row"><br>';
														if($priv['frms_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>DMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="DMS-u-edit" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>DMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="DMS-u-edit">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														if($priv['ims_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>IMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="IMS-u-edit" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>IMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="IMS-u-edit">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														if($priv['ipcrms_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>IPCRMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="IPCRMS-u-edit" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>IPCRMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="IPCRMS-u-edit">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														if($priv['oes_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>OES</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="OES-u-edit" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>OES</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="OES-u-edit">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														if($priv['pms_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>PMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="PMS-u-edit" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>PMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="PMS-u-edit">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														if($priv['pims_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>PIMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="PIMS-u-edit" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>PIMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="PIMS-u-edit">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														if($priv['prs_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>PRS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="PRS-u-edit" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>PRS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="PRS-u-edit">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														if($priv['css_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>CSS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="CSS-u-edit" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>CSS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="CSS-u-edit">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														if($priv['scms_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>SCMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="SCMS-u-edit" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>SCMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="SCMS-u-edit">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														if($priv['sis_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>SIS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="SIS-u-edit" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>SIS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="SIS-u-edit">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														if($priv['cms_priv'] == 1) {
															echo '<div class="col-lg-2">
																			<center>CMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="CMS-u-edit" checked="">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														else {
															echo '<div class="col-lg-2">
																			<center>CMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="CMS-u-edit">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														echo  '</div>';
														echo '<br>';
													}
													*/
												?>
												<br>
												<div class="form-group">
													<div class="row">
														<div class="col-lg-4">
														</div>
														<div class="col-lg-4">
														</div>
														<div class="col-lg-4">
															<button type="submit" name="submit" class="btn btn-primary form-control">Update Account</button>
														</div>
													</div>
												</div>
											</form>
										</div>
										<div class="col-md-1">
										</div>
									</div>
							</div>
						</div>
				</div>
			</div>
		</div>
			</div>
			<br>
			<?php 
                include("footer.php");
            ?>
			</div>
		<script>
			$('#dataTables-example').DataTable({
				responsive: true,
				searching: false
			});
		</script>
		<script type="text/javascript">
			function myFunction(val) {
			var w = window.innerWidth;
				$.ajax({
				  type: "POST",
				  url: "modules/css/admin/get_screen_width.php",
				  data: "width="+w,
				  success: function(data){
				  }
				});	
			}
		</script>
	</body>
</html>