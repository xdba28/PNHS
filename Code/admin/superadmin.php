<?php
	
	include('../php/connection.php');
	include('../php/_Func.php');
	include('../php/_Def.php');
	$_SESSION['hist'] = $_SERVER['REQUEST_URI'];
	// if(isset($_SESSION['user_data']['acct']['emp_no']) AND (in_array("superadmin", $_SESSION['user_data']['priv']['cms_account_type']) OR in_array("admin", $_SESSION['user_data']['priv']['cms_account_type']))) {
	// 	$keysa = array_search('superadmin', $_SESSION['user_data']['priv']['cms_account_type']);
	// 	$keya = array_search('admin', $_SESSION['user_data']['priv']['cms_account_type']);
 //        if($_SESSION['user_data']['priv']['cms_priv'][$keysa]==1 OR $_SESSION['user_data']['priv']['cms_priv'][$keya]==1) {

 //        }
 //        else {
 //        	header('Location: ../index.php');
	// 		die();
 //        }
 //    }
	// else {
	// 	header('Location: ../index.php');
	// 	die();
	// }

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
									<h1>New Personnel Account</h1>
									<?php
									?>
									<hr>
									<div class="row">
										<div class="col-md-1">
										</div>
										<div class="col-md-10">
											<form id="register" action="_Sub/superadmin.php" method="POST">
												<div class="form-group">
													<div class="row">
														<div class="col-lg-6">
															<label for="acc">Personnel Account: </label>
															<input type="text" value="" class="form-control" placeholder="" readonly="">
														</div>
													</div>
												</div>
												<br>
												<div class="form-group">
													<div class="row">
														<div class="col-lg-6">
															<label for="username">Username: </label>
															<input type="text" class="form-control" id="u" name="u">
														</div>
														<div class="col-lg-6">
															<label for="password">Password: </label>
															<input type="password" class="form-control" id="p" name="p">
															<input type="hidden" class="form-control" id="id" name="id" value="<?php if(isset($_GET['id'])) {echo $_GET['id'];} ?>">
															<br>
															<input type="checkbox" value="1" name="default"> Default Password
														</div>
													</div>
												</div>
												<!--<label for="acct">Select Account Type(s): </label>-->
												<br>
												<div class="form-group">
													<!--
													<input type="checkbox" name="at_sa" value="1"> Super Admin <span class="caret"></span>
													<br>
													<br>
													<div id="sa-cb" class="row">
														<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
															<center>DMS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="DMS-sa">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
															<center>IMS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="IMS-sa">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
															<center>IPCRMS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="IPCRMS-sa">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
															<center>OES</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="OES-sa">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
															<center>PMS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="PMS-sa">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
															<center>PIMS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="PIMS-sa">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
															<center>PRS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="PRS-sa">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
															<center>CSS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="CSS-sa">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
															<center>SCMS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="SCMS-sa">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
															<center>SIS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="SIS-sa">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
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
														<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
															<center>DMS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="DMS-a">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
															<center>IMS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="IMS-a">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
															<center>IPCRMS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="IPCRMS-a">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
															<center>OES</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="OES-a">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
															<center>PMS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="PMS-a">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
															<center>PIMS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="PIMS-a">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
															<center>PRS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="PRS-a">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
															<center>CSS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="CSS-a">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
															<center>SCMS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="SCMS-a">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
															<center>SIS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="SIS-a">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
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
														<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
															<center>DMS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="DMS-u">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
															<center>IMS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="IMS-u">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
															<center>IPCRMS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="IPCRMS-u">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
															<center>OES</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="OES-u">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
															<center>PMS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="PMS-u">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
															<center>PIMS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="PIMS-u">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
															<center>PRS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="PRS-u">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
															<center>CSS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="CSS-u">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
															<center>SCMS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="SCMS-u">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
															<center>SIS</center>
															<br>
															<center>
																<label class="switch">
																	<input type="checkbox" value="1" name="SIS-u">
																	<span class="slider round"></span>
																</label>
															</center>
														</div>
														<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
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
												-->
													<div class="row">
														<br>
														<div class="col-lg-4">
														</div>
														<div class="col-lg-4">
														</div>
														<div class="col-lg-4">
															<button type="submit" class="btn btn-primary form-control" name="submit">Create Account</button>
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
        <script src="js/_tmp/tmp/datatables/js/jquery.dataTables.min.js"></script>
		<script src="js/_tmp/tmp/datatables-plugins/dataTables.bootstrap.min.js"></script>
		<script src="js/_tmp/tmp/datatables-responsive/dataTables.responsive.js"></script>
		<script>
			$('#dataTables-example').DataTable({
				responsive: true,
				searching: false
			});
		</script>
		<script>
			$('input[name="default"]').change(function(e) {
				$('input[name="p"]').prop("disabled", !$('input[name="p"]').prop("disabled"));
				e.preventDefault();
			});
			$("#register").validate({
				ignore: [],
				debug: false,
				 rules: {
					u: {
						 required: true
					},
					p: {
						required: true
					}
				},
				messages: {
					u: {
						required: '<p class="text-danger">This field is required.</p>'
					},
					p: {
						required: '<p class="text-danger">This field is required.</p>'
					}
				}
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