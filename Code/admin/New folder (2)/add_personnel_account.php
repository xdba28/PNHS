<?php
	include('../func.php');
	include('../php/connection.php');
	include('../php/_Func.php');
	include('../php/_Def.php');
	$_SESSION['hist'] = $_SERVER['REQUEST_URI'];
	if(isset($_SESSION['user_data']['acct']['emp_no']) AND (in_array("superadmin", $_SESSION['user_data']['priv']['cms_account_type']) OR in_array("admin", $_SESSION['user_data']['priv']['cms_account_type']))) {
		$keysa = array_search('superadmin', $_SESSION['user_data']['priv']['cms_account_type']);
		$keya = array_search('admin', $_SESSION['user_data']['priv']['cms_account_type']);
        if($_SESSION['user_data']['priv']['cms_priv'][$keysa]==1 OR $_SESSION['user_data']['priv']['cms_priv'][$keya]==1) {

        }
        else {
        	//$_SESSION['msg']='1';
        	header('Location: ../index.php');
			die();
        }
    }
	else {
		//$_SESSION['msg']='2';
		header('Location: ../index.php');
		die();
	}

	if(isset($_SESSION['user_data'])) {
        $emp=$_SESSION['user_data']['acct']['emp_no'];
        $aid=$_SESSION['user_data']['acct']['cms_account_ID'];
        $rec=mysqli_query($mysqli,"SELECT dms_receiver.rec_no FROM dms_receiver,cms_account WHERE cms_account.cms_account_id=dms_receiver.cms_account_id AND dms_receiver.cms_account_id=$aid");
        $recrow=mysqli_fetch_assoc($rec);
        $recid=$recrow['rec_no'];
		foreach(definePerson($aid) as $key=>$val) {
			if($key=="css") { $css_priv=$val; }
			else if($key=="dms") { $dms_priv=$val; }
			else if($key=="ims") { $ims_priv=$val; }
			else if($key=="ipcr") { $ipcr_priv=$val; }
			else if($key=="pims") { $pims_priv=$val; }
			else if($key=="pms") { $pms_priv=$val; }
			else if($key=="oes") { $oes_priv=$val; }
			else if($key=="prs") { $prs_priv=$val; }
			else if($key=="scms") { $scms_priv=$val; }
			else if($key=="sis") { $sis_priv=$val; }
			else if($key=="user_type") { $user_type=$val; }
			else if($key=="job") { $job_title=$val; }
			else if($key=="emp_type") { $emp_type=$val; }
			else if($key=="dept") { $dept=$val; }
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
		<link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
		<link rel="stylesheet" href="../css/w3/w3.css">
		<link rel="stylesheet" href="../docs/docs.min.css">
		<link rel="stylesheet" href="../css/w3/blue.css">
		<link rel="stylesheet" href="../css/w3/yellow.css">
<!--		<link rel="stylesheet" href="css/sideNav.css">-->
		<link rel="stylesheet" href="../css/backToTop.css">
		<link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css" type="text/css">
		<link rel="shortcut icon" href="../img/pnhs_favicon.ico" type="image/x-icon">
		<link rel="icon" href="../img/pnhs_favicon.ico" type="image/x-icon">
		<script src="../js/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
        <script src="../js/index.js"></script>
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
		</style>
		<script src="../js/_jv/dist/jquery.validate.min.js"></script>
		<script src="../js/_jv/dist/additional-methods.js"></script>
		<script src="../js/_ck/ckeditor.js"></script>
	</head>
	<body>
		<div id="wrapper">
			<?php 
                if(isset($_SESSION['user_data'])){
                    include("sidenav.php");
                }
                include("topnav.php");
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
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-primary">
								<div class="panel-body">
									<h1>New Personnel Account</h1>
									<?php
									?>
									<hr>
									<div class="row">
										<div class="col-md-1">
										</div>
										<div class="col-md-10">
											<form action="_Sub/process_personnel_account.php" method="POST">
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
															<input type="text" class="form-control" id="u" name="u" placeholder="" required="">
														</div>
														<div class="col-lg-6">
															<label for="password">Password: </label>
															<input type="password" class="form-control" id="p" name="p" placeholder="">
															<input type="hidden" class="form-control" id="id" name="id" placeholder="" value="<?php if(isset($_GET['id'])) {echo $_GET['id'];} ?>">
															<br>
															<input type="checkbox" value="1" name="default"> Default Password
														</div>
													</div>
												</div>
												<label for="acct">Select Account Type(s): </label>
												<br>
												<div class="form-group">
													<input type="checkbox" name="at_sa" value="1"> Super Admin <span class="caret"></span>
													<br>
													<br>
													<div id="sa-cb" class="row">
														<div class="col-lg-2">
															<center>DMS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="DMS-sa">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-lg-2">
															<center>IMS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="IMS-sa">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-lg-2">
															<center>IPCRMS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="IPCRMS-sa">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-lg-2">
															<center>OES</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="OES-sa">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-lg-2">
															<center>PMS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="PMS-sa">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-lg-2">
															<center>PIMS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="PIMS-sa">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-lg-2">
															<center>PRS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="PRS-sa">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-lg-2">
															<center>CSS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="CSS-sa">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-lg-2">
															<center>SCMS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="SCMS-sa">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-lg-2">
															<center>SIS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="SIS-sa">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-lg-2">
															<center>CMS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="CMS-sa">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
													</div>
													<input type="checkbox" name="at_a" value="1"> Admin <span class="caret"></span>
													<br>
													<br>
													<div id="a-cb" class="row">
														<div class="col-lg-2">
															<center>DMS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="DMS-a">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-lg-2">
															<center>IMS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="IMS-a">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-lg-2">
															<center>IPCRMS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="IPCRMS-a">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-lg-2">
															<center>OES</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="OES-a">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-lg-2">
															<center>PMS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="PMS-a">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-lg-2">
															<center>PIMS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="PIMS-a">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-lg-2">
															<center>PRS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="PRS-a">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-lg-2">
															<center>CSS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="CSS-a">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-lg-2">
															<center>SCMS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="SCMS-a">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-lg-2">
															<center>SIS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="SIS-a">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-lg-2">
															<center>CMS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="CMS-a">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
													</div>
													<input type="checkbox" name="at_u" value="1"> User <span class="caret"></span>
													<br>
													<br>
													<div id="u-cb" class="row">
														<div class="col-lg-2">
															<center>DMS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="DMS-u">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-lg-2">
															<center>IMS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="IMS-u">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-lg-2">
															<center>IPCRMS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="IPCRMS-u">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-lg-2">
															<center>OES</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="OES-u">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-lg-2">
															<center>PMS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="PMS-u">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-lg-2">
															<center>PIMS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="PIMS-u">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-lg-2">
															<center>PRS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="PRS-u">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-lg-2">
															<center>CSS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="CSS-u">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-lg-2">
															<center>SCMS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="SCMS-u">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-lg-2">
															<center>SIS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="SIS-u">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-lg-2">
															<center>CMS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="CMS-u">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
													</div>
													<div class="row">
														<br>
														<div class="col-lg-4">
															<button class="btn btn-danger form-control" name="cancel">Cancel</button>
														</div>
														<div class="col-lg-4">
															<button type="reset" class="btn btn-warning form-control" name="reset">Reset</button>
														</div>
														<div class="col-lg-4">
															<button type="submit" class="btn btn-info form-control" name="submit">Create Account</button>
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
			</div>
			<br>
			<?php 
                include("footer.php");
            ?>
		<script>
			$(document).ready(function() {
				$('#dataTables-example').DataTable({
					responsive: true,
					searching: false
				});

				<?php
					if(isset($_SESSION['msg']) AND $_SESSION['msg']!='' AND $_SESSION['msg'] != NULL) {
						echo "$('#msg').modal('show');";
						echo $_SESSION['msg']='';
					}
				?>

				$('input[name="default"]').change(function(e) {
					$('input[name="p"]').prop("disabled", !$('input[name="p"]').prop("disabled"));
					e.preventDefault();
				});
			});
		</script>
	</body>
</html>