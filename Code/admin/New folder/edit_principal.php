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
			.responsiveCal{
				position: relative; padding-bottom: 70%; height: 0; overflow: hidden;
			}
			.responsiveCal iframe {
				position: absolute; top: 0; left: 0; width: 100%; height: 100%;
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
							<div class="panel panel-primary sidepanel">
								<div class="panel-body">
									<h1>Principal's Corner</h1>
									<hr>
									<form action="_Sub/process_principal.php" method="POST" enctype="multipart/form-data">
										<div class="row">
											<div class="form-group">
													<div class="col-lg-4">
														<input type="file" id="file" name="file">
													</div>
													<div class="col-lg-4">
													</div>
													<div class="col-lg-4">
														<button type="submit" class="btn btn-primary form-control" name="p_file">Update Profile Image</button>
													</div>
											</div>
										</div>
										<div class="row">
										<?php
											$img_query="SELECT * FROM `cms_principal` WHERE `cms_principal_ID` = 1;";
											$get_img = $mysqli->query($img_query);
											while($img = $get_img->fetch_assoc()) {
												$dir = $img['cms_principal_img_dir'];
												$name = $img['cms_principal_name'];
												echo '<div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
														<div class="thumbnail">';
															//echo '<a href="_Sub/delete_principal.php?id='.$imgid.'" class="btn btn-danger btn-xs pull-right"><span class="glyphicon glyphicon-trash"></span></a>';
															echo '<a href="../uploads/'.$dir.'" data-lightbox="p" data-title="">
																<img src="../uploads/'.$dir.'" alt="" class="img-responsive center-block">
															</a>
															<div class="caption">
																<p></p>
															</div>
														</div>
													</div>';
											}
										?>
										</div>
									</form>
									<hr>
									<form action="_Sub/process_principal.php" method="POST" enctype="multipart/form-data">
									<div class="row">
										<div class="col-lg-6">
											<label for="name">Name: </label>
											<input type="text" class="form-control" id="name" placeholder="" name="name" value="<?php echo $name; ?>">
										</div>
									</div>
									<?php
										$cont_query = "SELECT * FROM `cms_principal` WHERE `cms_principal_ID` = 1;";
										$get_cont = $mysqli->query($cont_query);
										while($cont = $get_cont->fetch_assoc()) {
											$get_content = $cont['cms_principal_content'];
										}
									?>
									<br>
									<div class="row">
									  <div class="col-lg-12">
									  	<label for="prin">Content: </label>
										<textarea class="ckeditor form-control" name="prin" id="prin"> <?php echo $get_content; ?> </textarea>
									  </div>
									</div>
									<div class="row">
									  <div class="col-lg-8">
										
									  </div>
									  <div class="col-lg-4">
										<br>
										<button type="submit" class="btn btn-primary form-control" name="p_con">Update Content</button>
									  </div>
									</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<br>
				</div>
			</div>
		</div>
			</div>
			</div>
			<br>
			<?php 
				include("footer.php");
			?>
		<script src="../js/alert.js"></script>
		<script src="../js/slideshow.js"></script>
		<script src="../js/back-To-Top.js"></script>
		<script src="../js/side-Nav.js"></script>
		<script>
			<?php
				if(isset($_SESSION['msg']) AND $_SESSION['msg']!='' AND $_SESSION['msg'] != NULL) {
					echo "$('#msg').modal('show');";
					echo $_SESSION['msg']='';
				}
			?>
		</script>
	</body>
</html>