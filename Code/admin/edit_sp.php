<?php
	include('../func.php');
	include('../php/connection.php');
	include('../php/_Func.php');
	include('../php/_Def.php');
	$_SESSION['hist'] = $_SERVER['REQUEST_URI'];
	if(isset($_GET['page']) AND !is_numeric($_GET['page'])) {
		header('Location: '.$_SERVER['PHP_SELF']);
		die();
	}
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
        <link href="js/_tmp/tmp/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
		<link href="js/_tmp/tmp/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
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
									<h1>School Progress</h1>
									<?php
									?>
									<hr>
									<div class="row">
										<div class="col-lg-12">
											<form id="register" action="_Sub/process_sp.php" method="POST" enctype="multipart/form-data">
												<div class="form-group">
													<div class="row">
														<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
															<input type="file" id="file" name="file[]" multiple>
														</div>
														<br class="hidden-md hidden-lg">
														<br class="hidden-md hidden-lg">
														<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
															<button type="submit" class="btn btn-primary form-control" name="submit">Upload</button>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
									<hr>
									<div class="row">
									<div class="col-lg-12 text-justify">
										<div class="panel panel-default">
											<div class="panel-body">
												<?php
														$getid = NULL;
														$proj_query="SELECT * FROM `cms_album` WHERE `gallery_type`='schoolprogress';";
															$get_proj = $mysqli->query($proj_query);
															if($get_proj->num_rows > 0) {
																while($proj = $get_proj->fetch_assoc()) {
																	$getid = $proj['cms_album_ID'];
																}
															}
														$result_num = 10;
														if(isset($_GET['q'])) {
															$search = $mysqli->real_escape_string($_GET['q']);
															$result_num_rows_query = "SELECT * FROM `cms_image` WHERE `cms_album_ID`='$getid';";
														}
														else {
															$result_num_rows_query="SELECT * FROM `cms_image` WHERE `cms_album_ID`='$getid';";
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
													<div class="text-center">
																<nav aria-label="Page navigation">
																  <ul class="pagination">
																    <?php
																    	if(isset($_GET['page'])) {
																			$pg = $mysqli->real_escape_string($_GET['page']);
																		}
																		else {
																			$pg = 1;
																		}
																		if(isset($_GET['q'])) {
																			$qq = $mysqli->real_escape_string($_GET['q']);
																		}
																		else {
																			$qq = '';
																		}
																    	$act = '';
																    	for($ite=1; $ite <= $page_num; ++$ite, $act='') {
																    		if($pg == $ite) {
																    			$act = ' class="active"';
																    		}
																    		if(isset($_GET['q'])) {
																    			echo '<li'.$act.'><a href="?q='.$mysqli->real_escape_string($_GET['q']).'&page='.$ite.'">'.$ite.'</a></li>';
																    		}
																    		else {
																    			echo '<li'.$act.'><a href="?q='.$qq.'&page='.$ite.'">'.$ite.'</a></li>';
																    		}
																    	}
																    ?>
																  </ul>
																</nav>
															</div>
												<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example2">
													<thead>
														<tr>
															<th>School Progress</th>
															<th></th>
															<th></th>
														</tr>
														</thead>
														<tbody>
														<?php
															$proj_query="SELECT * FROM `cms_album` WHERE `gallery_type`='schoolprogress';";
															$get_proj = $mysqli->query($proj_query);
															if($get_proj->num_rows > 0) {
																while($proj = $get_proj->fetch_assoc()) {
																	$idp = $proj['cms_album_ID'];
																	$iname = $proj['cms_album_name'];
																	$idesc = $proj['cms_album_desc'];
																	$idate = $proj['cms_album_date_created'];
																	$itime = $proj['cms_album_time_created'];
																	$ialb = $proj['cms_album_folder'];
																	$getid = $idp;
																	$img_query="SELECT * FROM `cms_image` WHERE `cms_album_ID`='$getid' LIMIT ".$this_page_num_result.", ".$result_num.";";
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
																			$title = $img['cms_image_title'];
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
																											<div class="col-lg-12">
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
																												echo trim(substr(strip_tags($cap), 0, 80)).'...';
																											}
																											else {
																												echo '<p>No Available Caption</p>';
																											}
																												echo '</i></p>';
																											echo '</div>
																										</div>';
																									echo '</a>
																								</div>
																							</div>';
																						echo '<div class="modal fade" id="'.$imgid.'" tabindex="-1" role="dialog" aria-labelledby="'.$imgid.'">
																								<div class="modal-dialog modal-lg" role="document">
																									<div class="modal-content">
																										<div class="modal-header">
																											';
																						echo '				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
																						if(!empty($title)) {
																						echo '				<h4 class="modal-title" id="myModalLabel">'.$title.'</h4>';
																						}
																						else {
																							//echo '<br>';
																						}
																						echo '			</div>
																											<div class="modal-body">
																												<div class="row">
																													<div class="col-lg-6">
																														<img src="../uploads/'.$dir.'/'.$name.'" alt="..." class="img-responsive center-block" style="height: 400px; width: auto;">
																													</div>';
																						if(!empty($cap)) {
																						echo '
																													<div class="col-lg-6">
																														<blockquote>
																														<p>'.$cap.'</p>
																														</blockquote>
																													</div>
																												</div>';
																						}
																						echo '				</div>
																										<div class="modal-footer">
																											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																										</div>
																									</div>
																								</div>     
																							</div>';
																						echo '<td class="bg-info text-center"><a href="edit_sp_cap.php?id='.$imgid.'" class=""><span class="glyphicon glyphicon-edit"></span> Edit </a></td>';
																						echo '<td class="bg-danger text-center"><a href="_Sub/delete_sp.php?id='.$imgid.'" class=""><span class="glyphicon glyphicon-trash"></span> Delete </a></td>';
																			echo '</tr>';
																		}
																	}
																	else {
																		echo '<tr><td class="danger">No content saved.</td></tr>';
																	}
																}
															}
															else {
																echo '<tr><td class="danger">No content saved.</td></tr>';
															}
														?>
														</tbody>
													</table>
													<div class="text-center">
												<nav aria-label="Page navigation">
												  <ul class="pagination">
												    <?php
												    	if(isset($_GET['page'])) {
															$pg = $mysqli->real_escape_string($_GET['page']);
														}
														else {
															$pg = 1;
														}
														if(isset($_GET['q'])) {
															$qq = $mysqli->real_escape_string($_GET['q']);
														}
														else {
															$qq = '';
														}
												    	$act = '';
												    	for($ite=1; $ite <= $page_num; ++$ite, $act='') {
												    		if($pg == $ite) {
												    			$act = ' class="active"';
												    		}
												    		if(isset($_GET['q'])) {
												    			echo '<li'.$act.'><a href="?q='.$mysqli->real_escape_string($_GET['q']).'&page='.$ite.'">'.$ite.'</a></li>';
												    		}
												    		else {
												    			echo '<li'.$act.'><a href="?q='.$qq.'&page='.$ite.'">'.$ite.'</a></li>';
												    		}
												    	}
												    ?>
												  </ul>
												</nav>
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
				</div>
			</div>
			<br>
			<?php 
                include("footer.php");
            ?>
		</div>
			</div>
			</div>
        <script src="js/_tmp/tmp/datatables/js/jquery.dataTables.min.js"></script>
		<script src="js/_tmp/tmp/datatables-plugins/dataTables.bootstrap.min.js"></script>
		<script src="js/_tmp/tmp/datatables-responsive/dataTables.responsive.js"></script>
		<script>
			$('#dataTables-example2').DataTable({
				responsive: true,
				searching: false,
				"ordering": false,
			    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			    "lengthChange": false,
			    "paging": false,
			    "bInfo": false,
				"columns": [
				    { "width": "80%" },
				    { "width": "10%" },
				    { "width": "10%" }
				]
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
						maxupload: 10,
              			filesize: 2097152
					}
				},
				messages: {
					'file[]': {
						required: '<p class="text-danger">This field is required.</p>',
						extension: '<p class="text-danger">Invalid File Type. Must be in .jpg(.jpeg), .png extension.</p>',
						maxupload: '<p class="text-danger">Maximum number of files per upload is 10.</p>',
              			filesize: '<p class="text-danger">File must be less than 2MB</p>'
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