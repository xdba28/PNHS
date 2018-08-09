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
		<link rel="stylesheet" href="css/lightbox.min.css">
		<link href="js/_tmp/dist/css/sb-admin-2.css" rel="stylesheet">
		<link href="js/_tmp/tmp/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
		<link href="js/_tmp/tmp/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
		<style>
			.switch {
				position: relative;
				display: inline-block;
				width: 50px;
				height: 24px;
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
				height: 16px;
				width: 16px;
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
	</head>
	<body onload="myFunction()">
        <?php include("topnav.php"); ?>
        <div id="wrapper"> 
            <?php 
                if(isset($_SESSION['user_data'])){
                    include("sidenav.php");
                }
            ?>
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
							<div class="panel panel-primary sidepanel">
								<div class="panel-body">
									<?php
										$result_num = 20;
										if(isset($_GET['q'])) {
											$search = $mysqli->real_escape_string($_GET['q']);
											$result_num_rows_query = "SELECT `emp_no`, `P_fname`, `P_mname`, `P_lname` FROM `pims_personnel` WHERE `P_fname` LIKE '%$search%' OR `P_mname` LIKE '%$search%' OR `P_lname` LIKE '%$search%';";
										}
										else {
											$result_num_rows_query="SELECT * FROM `pims_personnel`;";
										}
										$get_result_num_rows = $mysqli->query($result_num_rows_query);
										$result_num_rows = $get_result_num_rows->num_rows;
										$page_num = ceil($result_num_rows / $result_num);
										if(!empty($_GET['q']) AND !empty($_GET['page'])) {
											$page = $_GET['page'];
										}
										else if(empty($_GET['q']) AND !empty($_GET['page'])) {
											$page = $_GET['page'];
										}
										else {
											$page = 1;
										}
										$this_page_num_result = ($page - 1) * $result_num;
									?>
									<h1>Usertype Settings</h1>
									<?php
									?>
									<hr>
									<form action="" method="GET">
										<div class="row">
											<div class="col-lg-4">
												<select name="j" id="j" class="form-control">
													<option disabled selected>Select Job Title</option>
													<?php
														$jt = $mysqli->query("SELECT cms_privilege.job_title_code, pims_job_title.job_title_name FROM pims_job_title, cms_privilege WHERE substr(pims_job_title.job_title_code,1,3)=substr(cms_privilege.job_title_code,1,3);");
														if($jt->num_rows > 0) {
															while($dt = $jt->fetch_assoc()) {
																$a = $dt['job_title_code'];
																$b = $dt['job_title_name'];
																echo '<option value='.$a.'>'.$b.'</option>';
															}
														}
													?>
												</select>
											</div>
											<div class="col-lg-4">
												<button class="btn btn-primary form-control" type="submit"> Edit Priviledges </button>
											</div>
											<div class="col-lg-4">
												
											</div>
										</div>
									</form>
									<br>
									<!-- <div class="row">
										<div class="col-lg-8">
										</div>
										<div class="col-lg-4">
											<a target="_blank" class="btn btn-primary form-control" href="print_p.php"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</a>
										</div>
									</div>
									<hr> -->
												<?php
													if(isset($_GET['j'])) {
														echo '<div class="row">
															<div class="col-lg-12">
																<div class="panel panel-default">
																	<div class="panel-body">';
														$jtesc = $mysqli->real_escape_string($_GET['j']);
														$get_priv_query="SELECT cms_privilege.*, pims_job_title.job_title_name FROM pims_job_title, cms_privilege WHERE pims_job_title.job_title_code LIKE '$jtesc%' AND cms_privilege.job_title_code LIKE '$jtesc%'";
														$get_priv = $mysqli->query($get_priv_query);
														$cnt1 = 1;
														while($priv = $get_priv->fetch_assoc()) {
															echo '<form action="_Sub/update_usertype.php" method="POST"><h4>'.strtoupper($priv['job_title_name']).'</h4>';
															echo '<div class="row">
																			<br>';
															if($priv['frms_priv'] == 1) {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>DMS</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="DMS" checked="">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															else {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>DMS</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="DMS">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															if($priv['ims_priv'] == 1) {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>IMS</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="IMS" checked="">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															else {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>IMS</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="IMS">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															if($priv['ipcrms_priv'] == 1) {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>IPCRMS</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="IPCRMS" checked="">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															else {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>IPCRMS</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="IPCRMS">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															if($priv['ipcrms2_priv'] == 1) {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>IPCRMS2</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="IPCRMS2" checked="">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															else {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>IPCRMS2</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="IPCRMS2">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															if($priv['oes_priv'] == 1) {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>OES</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="OES" checked="">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															else {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>OES</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="OES">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															if($priv['pms_priv'] == 1) {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>PMS</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="PMS" checked="">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															else {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>PMS</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="PMS">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															if($priv['pms2_priv'] == 1) {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>PMS2</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="PMS2" checked="">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															else {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>PMS2</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="PMS2">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															if($priv['pims_priv'] == 1) {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>PIMS</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="PIMS" checked="">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															else {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>PIMS</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="PIMS">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															if($priv['pims2_priv'] == 1) {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>PIMS2</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="PIMS2" checked="">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															else {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>PIMS2</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="PIMS2">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															if($priv['prs_priv'] == 1) {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>PRS</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="PRS" checked="">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															else {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>PRS</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="PRS">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															if($priv['prs2_priv'] == 1) {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>PRS2</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="PRS2" checked="">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															else {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>PRS2</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="PRS2">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															if($priv['css_priv'] == 1) {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>CSS</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="CSS" checked="">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															else {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>CSS</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="CSS">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															if($priv['scms_priv'] == 1) {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>SCMS</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="SCMS" checked="">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															else {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>SCMS</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="SCMS">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															if($priv['sis_priv'] == 1) {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>SIS</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="SIS" checked="">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															else {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>SIS</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="SIS">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															if($priv['sis2_priv'] == 1) {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>SIS2</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="SIS2" checked="">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															else {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>SIS2</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="SIS2">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															if($priv['cms_priv'] == 1) {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>CMS</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="CMS" checked="">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															else {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>CMS</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="CMS">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															echo '</div>';
															echo '<br>';
															echo '<div class="row">';
															if($priv['scms_user'] == 1) {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>SCMS User</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="SCMSuser" checked="">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															else {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>SCMS User</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="SCMSuser">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															if($priv['frms_user'] == 1) {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>DMS User</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="DMSuser" checked="">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															else {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>DMS User</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="DMSuser">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															if($priv['ipcrms_user'] == 1) {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>IPCRMS User</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="IPCRMSuser" checked="">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															else {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>IPCRMS User</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="IPCRMSuser">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															if($priv['pms_user'] == 1) {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>PMS User</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="PMSuser" checked="">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															else {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>PMS User</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="PMSuser">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															if($priv['pims_user'] == 1) {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>PIMS User</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="PIMSuser" checked="">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															else {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>PIMS User</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="PIMSuser">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															if($priv['sis_user'] == 1) {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>SIS User</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="SISuser" checked="">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															else {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>SIS User</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="SISuser">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															if($priv['superadmin_priv'] == 1) {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>Super Admin</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="superadmin" checked="">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															else {
																echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																				<center>Super Admin</center>
																				<br>
																				<center>
																					<label class="switch">
																						<input type="checkbox" value="1" name="superadmin">
																						<span class="slider round"></span>
																					</label>
																				</center>
																			</div>';
															}
															echo '</div>';
															echo '<br>';
															echo '<div class="form-group">
																<div class="row">
																	<div class="col-lg-4">
																	</div>
																	<div class="col-lg-4">
																	</div>
																	<div class="col-lg-4">
																		<button type="submit" name="update" value="'.$priv['job_title_code'].'" class="btn btn-primary form-control">Edit</button>
																	</div>
																</div>
															</div></form>';
															echo '<hr>';
															++$cnt1;
														}
														echo '</div>
																</div>
															</div>
														</div>';
													}
												?>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
								</div>
							</div>
						</div>
					</div>
					<br>
			<?php 
                include("footer.php");
            ?>
				</div>
			</div>
		</div>
			</div>
			</div>
		<script src="js/_tmp/tmp/datatables/js/jquery.dataTables.min.js"></script>
		<script src="js/_tmp/tmp/datatables-plugins/dataTables.bootstrap.min.js"></script>
		<script src="js/_tmp/tmp/datatables-responsive/dataTables.responsive.js"></script>
		<script>
			// $('#select_all_existent').on('click', function() {
			//     var rows = table.rows({ 'search': 'applied' }).nodes();
			//     $(':checkbox', rows).prop('checked', this.checked);
			// });
			$("#select_all_existent").change(function () {
			    $("input:checkbox").prop('checked', $(this).prop("checked"));
			});
			$('#dataTables-example').DataTable({
				responsive: true,
				searching: false,
				"ordering": true,
			    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			    "lengthChange": false,
			    "paging": false,
			    "bInfo": false
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