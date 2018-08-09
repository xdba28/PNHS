<?php
	include('../func.php');
	include('../php/connection.php');
	include('../php/_Func.php');
	include('../php/_Def.php');
	$_SESSION['hist'] = $_SERVER['REQUEST_URI'];

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
			.sidebar {
				height: 100%;
				position: relative;
				overflow-y: scroll;

			}
			#style-4::-webkit-scrollbar-track
			{
				-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
				background-color: #F5F5F5;
			}
			#style-4::-webkit-scrollbar
			{
				width: 10px;
				background-color: #F5F5F5;
			}
			#style-4::-webkit-scrollbar-thumb
			{
				background-color: #000000;
				border: 2px solid #555555;
			}
			body {
				background-color: rgba(42,101,149,100);
			}
			footer {
				margin-top: 0px;
				padding-top: 0px;
			}
			#container-fluid {
				padding-left: 10px;
				padding-right: 10px;
			}
			#sidebar_css {
				overflow-y: scroll;
			}
			#content {
				margin-top: 65px;
			}
			#sidebar {
				padding-right: 0px;
				padding-left: 0px;
				background-color: rgba(42,101,149,100);
			}
			#sidebar2 {
				padding-right: 0px;
				padding-left: 0px;
				background-color: rgba(42,101,149,100);
			}
			#main-content {
				padding-left: 5px;
				padding-right: 5px;
			}
			#darkblue {
				background-color: rgba(42,101,149,100);
			}
			.sidepanel {
				margin-top: 1px;
				margin-bottom: 1px;
			}
			.sidegroup {
				margin-bottom: 0px;
			}
			#title {
				text-align: center;
				color: black;
			}
			.white {
				background: white;
			}
			.navbar-nav li a#black {
				color: black !important;
			}
		</style>
		<script src="../js/_jv/dist/jquery.validate.min.js"></script>
		<script src="../js/_jv/dist/additional-methods.js"></script>
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
		<script>
			<?php
				if(isset($_SESSION['msg']) AND $_SESSION['msg']!='' AND $_SESSION['msg'] != NULL) {
					echo "$('#msg').modal('show');";
					echo $_SESSION['msg']='';
				}
			?>
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
							equalTo: '<p class="text-danger">Does not match the Current Password.</p>'
						}
					}
				});
		</script>
	</body>
</html>