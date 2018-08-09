<?php
	include('../func.php');
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

	if(isset($_SESSION['user_data'])) {
        if(isset($_SESSION['user_data']['acct']['lrn'])){
            $lrn=$_SESSION['user_data']['acct']['lrn'];
            $aid=$_SESSION['user_data']['acct']['cms_account_ID'];
            foreach(defineStudent($aid) as $key=>$val) {
                if($key=="css") { $css_priv=$val; }
                else if($key=="oes") { $oes_priv=$val; }
                else if($key=="scms") { $scms_priv=$val; }
                else if($key=="sis") { $sis_priv=$val; }
            }
        }else if(isset($_SESSION['user_data']['acct']['emp_no'])){
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
                else if($key=="job") { $job_title=$val; }
                else if($key=="emp_type") { $emp_type=$val; }
                else if($key=="user_type") { $user_type=$val; }
                else if($key=="css_admin") { $css_admin=$val; }
                else if($key=="dms1_admin") { $dms1_admin=$val; }
                else if($key=="dms2_admin") { $dms2_admin=$val; }
                else if($key=="ims_admin") { $ims_admin=$val; }
                else if($key=="ipcr1_admin") { $ipcr1_admin=$val; }
                else if($key=="ipcr2_admin") { $ipcr2_admin=$val; }
                else if($key=="pims1_admin") { $pims1_admin=$val; }
                else if($key=="pims2_admin") { $pims2_admin=$val; }
                else if($key=="pms1_admin") { $pms1_admin=$val; }
                else if($key=="pms2_admin") { $pms2_admin=$val; }
                else if($key=="oes_admin") { $oes_admin=$val; }
                else if($key=="prs1_admin") { $prs1_admin=$val; }
                else if($key=="prs2_admin") { $prs2_admin=$val; }
                else if($key=="scms1_admin") { $scms1_admin=$val; }
                else if($key=="scms2_admin") { $scms2_admin=$val; }
                else if($key=="sis_admin") { $sis_admin=$val; }
            }
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
							<div class="panel panel-primary sidepanel">
								<div class="panel-body">
									<h1>Contacts</h1>
									<?php
									?>
									<?php
										$cont_query = "SELECT * FROM `cms_site_content`;";
										$get_cont = $mysqli->query($cont_query);
										$get_content = array();
										$cnt = 0;
										while($cont = $get_cont->fetch_assoc()) {
											$get_content[$cnt] = $cont['cms_content_desc'];
											++$cnt;
										}
									?>
									<hr>
									<div class="row">
										<div class="col-lg-12">
											<form id="register" action="_Sub/process_contacts.php" method="POST" enctype="multipart/form-data">
												<div class="form-group">
													<label for="hist">Description</label>
													<textarea class="ckeditor form-control" name="contacts" id="contacts"> <?php echo $get_content[6]; ?> </textarea>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-lg-4">
														</div>
														<div class="col-lg-4">
														</div>
														<div class="col-lg-4">
															<button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#confirmation">Save</button>
													</div>
												</div>
												<div class="modal fade" id="confirmation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																	<h4 class="modal-title"></h4>
																</div>
																<div class="modal-body">
																	<h3 class="text-center">Save Changes?</h3>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																	<button type="submit" class="btn btn-primary" name="submit">Save</button>
																</div>
														</div>
													</div>     
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<br>
				</div>
			</div>
		</div>
		<br>
			<?php 
                include("footer.php");
            ?>
			</div>
			</div>
		<script>
			CKEDITOR.config.toolbar = [
				['Styles','Format','Font','FontSize',],
				['Bold','Italic','Underline','StrikeThrough','-','Undo','Redo','-','Cut','Copy','Paste','Find','Replace','-','Outdent','Indent','-','Print'],
				['NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
				['Table','-','Link','Smiley','TextColor','BGColor','Source']
			];
			$.validator.addMethod("cke_required", function(value, element) {
				var idname = $(element).attr('id');
				var editor = CKEDITOR.instances[idname];
				$(element).val(editor.getData());
				return $(element).val().length > 0;
			}, "This field is required");
			$(function() {
		        $("#register").validate({
		        	ignore: [],
					debug: false,
		          	rules: {
		            	contacts: {
		              		cke_required: true
		            	}     
		          	},
		          	messages: {
		            	contacts: {
		              		cke_required: '<p class="text-danger">This field is required.</p>'
		            	}
		          	}
		        });
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