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
		<script src="js/jv/dist/jquery.validate.min.js"></script>
		<script src="js/jv/dist/additional-methods.js"></script>
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
									<h1>New Account</h1>
									<?php
									?>
									<hr>
									<div class="row">
										<div class="col-md-1">
										</div>
										<div class="col-md-10">
											<form action="_Sub/update_student_account.php" method="POST">
												<div class="form-group">
													<label for="acc">Student Account: </label>
														<?php
															$id = $mysqli->real_escape_string($_GET['id']);
															$stu_fname = $stu_mname = $stu_lname = '';
															$sis_query="SELECT `stu_fname`, `stu_mname`, `stu_lname` FROM `sis_student` WHERE `lrn` = '$id';";
															$get_sis = $mysqli->query($sis_query);
															while($sis = $get_sis->fetch_assoc()) {
																$stu_fname = $sis['stu_fname'];
																$stu_mname = $sis['stu_mname'];
																$stu_lname = $sis['stu_lname'];
															}
															$cms_account_ID = '';
															$cms_query="SELECT * FROM `cms_account` WHERE `lrn` = '$id';";
															$cms = $mysqli->query($cms_query);
															$cnt1 = 1;
															while($data = $cms->fetch_assoc()) {
																$username = $data['cms_username'];
																$password = pcrypt($data['cms_password'], 'dcrypt');
															}
														?>
													<input type="text" value="<?php echo $stu_fname.' '.$stu_mname.' '.$stu_lname; ?>" class="form-control" placeholder="" readonly="">
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
													$get_cms_query="SELECT `cms_account_ID` FROM `cms_account` WHERE `lrn` = '$id';";
													$get_cms = $mysqli->query($get_cms_query);
													$cnt1 = 1;
													while($cms = $get_cms->fetch_assoc()) {
														$cms_account_ID = $cms['cms_account_ID'];
													}
													$get_priv_query="SELECT * FROM `cms_privilege` WHERE `cms_account_id` = '$cms_account_ID';";
													$get_priv = $mysqli->query($get_priv_query);
													$cnt1 = 1;
													while($priv = $get_priv->fetch_assoc()) {
														echo '<h4>'.strtoupper($priv['cms_account_type']).'</h4><hr>';
														echo '<div class="row" id="priv'.$cnt1.'">
																		<br>';
														if($priv['frms_priv'] == 1) {
															echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																			<center>DMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="DMS'.$cnt1.'" checked="">
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
																					<input type="checkbox" value="1" name="DMS'.$cnt1.'">
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
																					<input type="checkbox" value="1" name="IMS'.$cnt1.'" checked="">
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
																					<input type="checkbox" value="1" name="IMS'.$cnt1.'">
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
																					<input type="checkbox" value="1" name="IPCRMS'.$cnt1.'" checked="">
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
																					<input type="checkbox" value="1" name="IPCRMS'.$cnt1.'">
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
																					<input type="checkbox" value="1" name="OES'.$cnt1.'" checked="">
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
																					<input type="checkbox" value="1" name="OES'.$cnt1.'">
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
																					<input type="checkbox" value="1" name="PMS'.$cnt1.'" checked="">
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
																					<input type="checkbox" value="1" name="PMS'.$cnt1.'">
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
																					<input type="checkbox" value="1" name="PIMS'.$cnt1.'" checked="">
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
																					<input type="checkbox" value="1" name="PIMS'.$cnt1.'">
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
																					<input type="checkbox" value="1" name="PRS'.$cnt1.'" checked="">
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
																					<input type="checkbox" value="1" name="PRS'.$cnt1.'">
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
																					<input type="checkbox" value="1" name="CSS'.$cnt1.'" checked="">
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
																					<input type="checkbox" value="1" name="CSS'.$cnt1.'">
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
																					<input type="checkbox" value="1" name="SCMS'.$cnt1.'" checked="">
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
																					<input type="checkbox" value="1" name="SCMS'.$cnt1.'">
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
																					<input type="checkbox" value="1" name="SIS'.$cnt1.'" checked="">
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
																					<input type="checkbox" value="1" name="SIS'.$cnt1.'">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														/*
														if($priv['cms_priv'] == 1) {
															echo '<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
																			<center>CMS</center>
																			<br>
																			<center>
																				<label class="switch">
																					<input type="checkbox" value="1" name="CMS'.$cnt1.'" checked="">
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
																					<input type="checkbox" value="1" name="CMS'.$cnt1.'">
																					<span class="slider round"></span>
																				</label>
																			</center>
																		</div>';
														}
														echo  '</div>'; 
														++$cnt1;
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
			$('input[name="default"]').change(function(e) {
				$('input[name="p"]').prop("disabled", !$('input[name="p"]').prop("disabled"));
				e.preventDefault();
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