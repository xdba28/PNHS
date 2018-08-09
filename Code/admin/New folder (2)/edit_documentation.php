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
									<h1>Edit: <i>
										<?php 
											$name = $desc = '';
											$getid = $mysqli->real_escape_string($_GET['id']);
											$doc_query="SELECT * FROM `cms_album` WHERE `cms_album_ID`='$getid';";
											$get_doc = $mysqli->query($doc_query);
											while($doc = $get_doc->fetch_assoc()) {
												$id = $doc['cms_album_ID'];
												$name = $doc['cms_album_name'];
												$desc = $doc['cms_album_desc'];
												$gallery_type = $doc['gallery_type'];
												$date = $doc['cms_album_date_created'];
												$time = $doc['cms_album_time_created'];
											}
											echo $name; 
										?></i></h1>
									<?php
									?>
									<hr>
									<div class="row">
										<div class="col-md-1">
										</div>
										<div class="col-md-10">
											<form id="register" action="_Sub/update_album.php" method="POST" enctype="multipart/form-data">
												<div class="form-group">
													<label for="name">Album Name: </label>
													<input type="text" class="form-control" id="name" placeholder="" name="name" value="<?php echo $name; ?>">
													<input type="hidden" name="id" value="<?php echo $getid; ?>">
												</div>
												<br>
												<div class="form-group">
													<label for="desc">Description: </label>
													<textarea class="ckeditor form-control" name="desc" id="desc"><?php echo $desc; ?></textarea>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-lg-4">
														</div>
														<div class="col-lg-4">
														</div>
														<div class="col-lg-4">
															<button type="submit" class="btn btn-info form-control" name="submit">Save</button>
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
			<?php
				if(isset($_SESSION['msg']) AND $_SESSION['msg']!='' AND $_SESSION['msg'] != NULL) {
					echo "$('#msg').modal('show');";
					echo $_SESSION['msg']='';
				}
			?>
			$(document).ready(function() {
					$('#dataTables-example').DataTable({
							responsive: true,
							searching: false
					});
			});
			$.validator.addMethod('filesize', function (value, element, param) {
        		var totalSize = 0;
        		for (var i = 0; i < element.files.length; i++) {
            		totalSize += element.files[i].size;
          		}
          		return this.optional(element) || (totalSize <= param)
        	}, 'File size must be less than {0}');

		    $.validator.addMethod("cke_required", function(value, element) {
				var idname = $(element).attr('id');
				var editor = CKEDITOR.instances[idname];
				$(element).val(editor.getData());
				return $(element).val().length > 0;
			}, "This field is required");

			$.validator.addMethod("dir_valid", function(value, element, param) {
				var re = /^[a-zA-Z]:\\(((?![<>:"/\\|?*]).)+((?<![ .])\\)?)*$/;
      			if(!re.test(value)) {
          			return false;
        		}
        		else {
        			return true;
        		}
			}, "");

			$("#register").validate({
				ignore: [],
				debug: false,
				rules: {
					name: {
						required: true,
						dir_valid: false
					},
					desc: {
						cke_required: true
					}
				},
				messages: {
					name: {
						required: '<p class="text-danger">This field is required.</p>',
						dir_valid: '<p class="text-danger">An album name can\'t contain any of the following characters: \\ / : * ? " < > | </p>'
					},
					desc: {
						cke_required: '<p class="text-danger">This field is required.</p>'
					}
				}
			});
		</script>
	</body>
</html>