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
									<h1>Projects</h1>
									<?php
									?>
									<hr>
									<div class="row">
										<div class="col-lg-12">
											<form id="register" action="_Sub/process_projects.php" method="POST" enctype="multipart/form-data">
												<div class="form-group">
													<div class="row">
														<div class="col-xs-6 col-sm-12 col-md-12 col-lg-3">
															<input type="file" id="file" name="file[]" multiple>
														</div>
														<br class="hidden-lg">
														<br class="hidden-lg">
														<div class="col-xs-6 col-sm-4 col-md-4 col-lg-1">
															<button type="submit" class="btn btn-primary form-control" name="submit">Upload</button>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12 text-justify">
											<div class="panel panel-default">
												<div class="panel-body">
													<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example2">
														<thead hidden="">
															<tr>
																<th hidden="" valign=""></th>
															</tr>
														</thead>
														<tbody>
														<?php
															$proj_query="SELECT * FROM `cms_album` WHERE `gallery_type`='project';";
															$get_proj = $mysqli->query($proj_query);
															if($get_proj->num_rows > 0) {
																while($proj = $get_proj->fetch_assoc()) {
																	$idp = $proj['cms_album_ID'];
																	$iname = $proj['cms_album_name'];
																	$idesc = $proj['cms_album_desc'];
																	$idate = $proj['cms_album_date_created'];
																	$itime = $proj['cms_album_time_created'];
																	$getid = $idp;
																	$img_query="SELECT * FROM `cms_image` WHERE `cms_album_ID`='$getid';";
																	$get_img = $mysqli->query($img_query);
																	if($get_img->num_rows > 0) {
																		$cnt=1;
																		while($img = $get_img->fetch_assoc()) {
																			$imgid = $img['cms_image_ID'];
																			$id = $img['cms_album_ID'];
																			$name = $img['cms_image_name'];
																			$dir = $img['cms_image_dir'];
																			$date = $img['cms_image_date'];
																			$cap = $img['cms_img_cap'];
																			echo '<tr>';
																			echo '<td>
																							<div class="media">
																								<div class="media-left">
																									<a id="mediatable">
																										<img class="media-object" src="../uploads/'.$dir.'/'.$name.'" alt="" height="64" width="64">
																									</a>
																								</div>
																								<div class="media-body">
																									<a id="mediatable">
																										<div class="row" data-toggle="modal" data-target="#'.$imgid.'">
																											<div class="col-lg-10">
																												<h4 class="media-heading">';
																		if(!empty($title)) {
																			echo '<p><b>'.$title.'</b> - <small>'; echo dateFormat($date); echo'</small></p>';
																		}
																		else {
																			echo '<p><b>Untitled</b> - <small>'; echo dateFormat($date); echo'</small></p>';
																		}
																												echo '</h4>
																												<p><i>';
																												if(!empty($cap)) {
																												echo trim(substr(strip_tags($cap), 0, 650)).'...';
																											}
																											else {
																												echo '<p>No Available Caption</p>';
																											}
																												echo '</i></p>';
																											echo '</div>
																											<div class="col-lg-2">
																												<a href="edit_proj_cap.php?id='.$imgid.'" class="btn btn-info form-control"><span class="glyphicon glyphicon-edit"></span> Edit </a>
																												<a href="_Sub/delete_projects.php?id='.$imgid.'" class="btn btn-danger form-control"><span class="glyphicon glyphicon-trash"></span> Delete </a>
																											</div>
																										</div>';
																									echo '</a>
																								</div>
																							</div>
																							<div class="modal fade" id="'.$imgid.'" tabindex="-1" role="dialog" aria-labelledby="'.$imgid.'">
																										<div class="modal-dialog modal-lg" role="document">
																											<div class="modal-content">
																												<div class="modal-header">';
																								if(!empty($title)) {
																									echo '<p>'.$title.'</p>';
																								}
																								else {
																									//echo '<br>';
																								}
																													echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																												</div>
																												<div class="modal-body">
																													<div class="row">
																														<div class="col-lg-4">
																															<img src="../uploads/'.$dir.'/'.$name.'" alt="'.$name.'" class="img-responsive center-block">
																														</div>
																													</div>';
																								if(!empty($cap)) {
																									echo '<div class="row">
																												<div class="col-lg-12">
																													<blockquote>
																													<p>'.$cap.'</p>
																													</blockquote>
																												</div>
																											</div>';
																								}
																												echo '</div>
																												<div class="modal-footer">
																													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																												</div>
																											</div>
																										</div>     
																									</div>
																						</td>';
																			echo '</tr>';
																		}
																	}
																	else {
																		echo '<tr><td><div class="row"><div class="col-lg-12"><div class="alert alert-danger" role="alert">
																				  <a href="#" class="alert-link">No content saved.</a>
																				</div></div></div></td></tr>';
																	}
																}
															}
															else {
																echo '<tr><td><div class="row"><div class="col-lg-12"><div class="alert alert-danger" role="alert">
																		  <a href="#" class="alert-link">No content saved.</a>
																		</div></div></div></td></tr>';
															}
														?>
														</tbody>
													</table>
												</div>
											</div>
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
					$('#dataTables-example2').DataTable({
							responsive: true,
							searching: false
					});
			});

			$.validator.addMethod('maxupload', function( value, element, param ) {
			    var length = ( element.files.length );
			    return this.optional( element ) || length <= param;
			}, 'maximum of 20 files per upload {0}');

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

			$("#register").validate({
				ignore: [],
				debug: false,
				rules: {
					'file[]': {
						required: true,
						extension: "png|jpg|jpeg",
						maxupload: 20,
              			filesize: 2097152
					}
				},
				messages: {
					'file[]': {
						required: '<p class="text-danger">This field is required.</p>',
						extension: '<p class="text-danger">Invalid File Type(s) (png, jpg(jpeg)).</p>',
						maxupload: '<p class="text-danger">Maximum number of files per upload is 20.</p>',
              			filesize: '<p class="text-danger">File(s) must be less than 2MB</p>'
					}
				}
			});
		</script>
	</body>
</html>