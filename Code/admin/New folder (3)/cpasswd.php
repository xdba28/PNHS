<?php
	include('../func.php');
	include('../php/connection.php');
	include('../php/_Func.php');
	include('../php/_Def.php');
	$_SESSION['hist'] = $_SERVER['REQUEST_URI'];

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
		<link rel="shortcut icon" href="img/pnhs_favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="css/metisMenu.min.css" type="text/css">
		<link rel="icon" href="img/pnhs_favicon.ico" type="image/x-icon">
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
        <script src="js/index.js"></script>
        <script src="js/metisMenu.min.js"></script>
		<script src="js/sb-admin-2.min.js"></script>
		<style>
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
        	<div id="main" class="container-fluid">
            <?php 
                if(isset($_SESSION['user_data']['acct']['emp_no'])){
                    include("sidenav.php");
                }
            ?>
			<?php
				echo '<div class="modal fade" id="msg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title"></h4>
									</div>
									<div class="modal-body">';
										echo '<h3 class="text-center">'; echo $_SESSION['msg']; echo '</h3>';
										if(isset($_SESSION['flogin'])) {
											$sessionid = $_SESSION['user_data']['acct']['cms_account_ID'];
											$pdate = $ptime = $cdate = $ctime = NULL;
											$dt = $mysqli->query("SELECT * FROM `cms_account` WHERE `cms_account_ID` = '$sessionid' LIMIT 1;");
											if($dt->num_rows > 0) {
												$dtdata = $dt->fetch_assoc();
												$pdate = $dtdata['cms_prev_log_date'];
												$ptime = $dtdata['cms_prev_log_time'];
												$cdate = $dtdata['cms_current_log_date'];
												$ctime = $dtdata['cms_current_log_time'];
												$tttime = date("g:i A", strtotime($ptime));
												$dddate = dateFormat($pdate);
												echo '<br><p class="text-center">Your last log in was '.$dddate.' '.$tttime.'</p>';
											}
											date_default_timezone_set('Asia/Manila');
											$ddate = date('Y-m-d');
											$ttime = date('h:i:s');
											$udt = $mysqli->query("UPDATE `cms_account` SET `cms_current_log_date` = '$ddate', `cms_current_log_time` = '$ttime', `cms_prev_log_date` = '$cdate', `cms_prev_log_time` = '$ctime' WHERE `cms_account`.`cms_account_ID` = '$sessionid';");
											unset($_SESSION['flogin']);
										}
									echo '</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
							</div>
						</div>     
					</div>';
			?>
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
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="main-content">
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-primary">
								<div class="panel-body">
									<h1>Change Account Password</h1>
									<?php
										
										//echo '<pre>';
										//echo print_r($_SESSION);
										//echo '<br>';
										//echo print_r($_SESSION['user_data']['priv']['cms_acct_types']);
										//echo '<br><br>';
										//echo print_r($_SESSION['priva']);
										//echo '</pre>';
										
									?>
									<hr>
									<div class="row">
										<div class="col-lg-4">
										</div>
										<div class="col-lg-4">
											<form id="register" action="_Sub/process_cpasswd.php" method="POST">
												<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
													<input class="form-control" type="password" placeholder="Current Password" name="pswd" id="pswd"<?php if(isset($_SESSION['q'])) { echo ' value="'.$_SESSION['q'].'"'; } ?>>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
													<input class="form-control" type="password" placeholder="New Password" name="npswd" id="npswd"<?php if(isset($_SESSION['w'])) { echo ' value="'.$_SESSION['w'].'"'; } ?>>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
													<input class="form-control" type="password" placeholder="Re-type New Password" name="spswd" id="spswd"<?php if(isset($_SESSION['e'])) { echo ' value="'.$_SESSION['e'].'"'; } ?>>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
													<button class="form-control btn btn-primary" type="submit">Change Password</button>
												</div>
												<?php unset($_SESSION['q']); unset($_SESSION['w']); unset($_SESSION['e']); ?>
											</form>
										</div>
										<div class="col-lg-4">
										</div>
									</div>
									<br>
									<br>
									<br>
									<br>
									<?php
									?>
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
			$("#register").validate({
				ignore: [],
				debug: false,
				 rules: {
					pswd: {
						required: true
					},
					npswd: {
						required: true
					},
					spswd: {
						required: true,
						equalTo: '#npswd'
					}
				},
				messages: {
					pswd: {
						required: '<p class="text-danger">This field is required.</p>'
					},
					npswd: {
						required: '<p class="text-danger">This field is required.</p>'
					},
					spswd: {
						required: '<p class="text-danger">This field is required.</p>',
						equalTo: '<p class="text-danger">New Passwords do not match.</p>'
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