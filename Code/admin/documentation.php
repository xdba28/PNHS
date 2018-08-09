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
									<h1>Documentation</h1>
									<?php
									?>
									<hr>
									<div class="row">
										<div class="col-lg-4">
											<a class="btn btn-primary form-control" data-toggle="modal" data-target="#myModal">New Album</a>
											<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<form id="register" action="_Sub/process_album.php" method="POST">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															</div>
															<div class="modal-body">
																<input type="text" class="form-control" name="newalbum" id="newalbum" placeholder="Album Name"/>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																<input type="submit" class="btn btn-primary" name="submit" value="Create Album"></input>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-4">
										</div>
										<div class="col-lg-2">
											<a id="max" class="btn btn-primary form-control"><span class="glyphicon glyphicon-th-large"></span></a>
										</div>
										<div class="col-lg-2">
											<a id="min" class="btn btn-primary form-control"><span class="glyphicon glyphicon-th"></span></a>
										</div>
									</div>
									<hr>
									<form action="_Sub/delete_mdocumentation.php" method="POST">
									<div class="row">
											<div class="col-lg-4 text-center">
												<input type="checkbox" id="select_all_existent"> <label>Mark All Images</label>
											</div>
											<div class="col-lg-4">
												<input type="submit" class="btn btn-danger form-control" name="s" value="Delete Selected Album(s)"></input>
											</div>
											<div class="col-lg-4">
												
											</div>
									</div>
									<br>
									<?php
										$result_num = 12;
										if(isset($_GET['q'])) {
											$search = $mysqli->real_escape_string($_GET['q']);
											$result_num_rows_query = "SELECT * FROM `cms_album` WHERE `cms_album_ID`;";
										}
										else {
											$result_num_rows_query="SELECT * FROM `cms_album` WHERE `cms_album_ID`;";
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
									<div class="row">
									<?php
										$doc_query="SELECT * FROM `cms_album` WHERE `cms_album_ID` NOT IN (5,7,12,13,20) ORDER BY `cms_album_date_created` DESC, `cms_album_time_created` DESC LIMIT ".$this_page_num_result.", ".$result_num.";";
										$get_doc = $mysqli->query($doc_query);
										if($get_doc->num_rows > 0) {
											$cnt=1;
											while($doc = $get_doc->fetch_assoc()) {
												$id = $doc['cms_album_ID'];
												$name = $doc['cms_album_name'];
												$desc = $doc['cms_album_desc'];
												$gallery_type = $doc['gallery_type'];
												$date = $doc['cms_album_date_created'];
												$time = $doc['cms_album_time_created'];
												$alfol = $doc['cms_album_folder'];
												if($gallery_type == 'documentation') {
													$img_query="SELECT * FROM `cms_image` WHERE `cms_album_ID`='$id';";
													$get_img = $mysqli->query($img_query);
													$cnt=1;
													while($img = $get_img->fetch_assoc()) {
														$imgid2 = $img['cms_image_ID'];
														$id2 = $img['cms_album_ID'];
														$name2 = $img['cms_image_name'];
														$dir2 = $img['cms_image_dir'];
														$date2 = $img['cms_image_date'];
														$alb = $img['cms_album_name'];
														break;
													}
													echo '<div class="col-lg-2 img-thumb">
																	<div class="thumbnail">
																		<div class="row">
																			<div class="col-lg-12">
																				<a href="_Sub/delete_documentation.php?id='.$id.'" class="btn btn-danger btn-xs pull-left"><span class="glyphicon glyphicon-trash"></span></a>
																				<div class="checkbox-inline pull-right text-center"><input class="pull-right" type="checkbox" name="delete_doc[]" value="'.$id.'"></div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-lg-12">';
																		echo '<a href="view_album.php?id='.$id.'">';
													if(!empty($dir2)) {
														echo '	<img src="../uploads/'.$dir2.'/'.$alfol.'/'.$name2.'" class="img-padding img-responsive center-block" style="height: 100px; width: auto;">';
													}
													else {
														echo '	<img src="../uploads/20170214_58a28e286fed2.png" class="img-padding img-responsive center-block" style="height: 100px; width: 100px;">';
													}
													echo      '</a>
																		</div>
																		</div>
																			<div class="caption text-center">';
																			if(strlen($name) > 11) {
																				echo '<small title="'.$name.'" class=""><b>'.trim(substr(strip_tags($name, '<p></p>'), 0, 11)).'...</b></small>';
																			}
																			else {
																				echo '<small title="'.$name.'" class=""><b>'.$name.'</b></small>';
																			}
																			echo '<br>
																			<small class="text-primary"><b>'.$date.'</b></small>
																			<br>
																		</div>
																	</div>
																</div>';
													if(fmod($cnt, 6)==0) {
														echo '</div><div class="row">';
													}
													++$cnt;
												}
												$dir2='';
											}
										}
										else {
											$printAlert = '<div class="row"><div class="col-lg-12"><div class="alert alert-danger" role="alert">
													  <a href="#" class="alert-link">No content saved.</a>
													</div></div></div>';
										}
									?>
									</div>
									<?php
										if(isset($printAlert)) {
											echo $printAlert;
										}
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
									</form>
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
		<script>
			$("#select_all_existent").change(function () {
			    $("input:checkbox").prop('checked', $(this).prop("checked"));
			});
			$('#max').click(function(e) {
				$(".img-thumb").removeClass( "col-lg-2" ).addClass( "col-lg-4" );
				e.preventDefault();
			});
			$('#min').click(function(e) {
				$(".img-thumb").removeClass( "col-lg-4" ).addClass( "col-lg-2" );
				e.preventDefault();
			});
			$.validator.addMethod('filesize', function (value, element, param) {
		        return this.optional(element) || (element.files[0].size <= param)
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
			}, "Charater not valid");
			$.validator.addMethod("loginRegex", function(value, element) {
		        return this.optional(element) || /^[a-z0-9\\-]+$/i.test(value);
		    }, "Username must contain only letters, numbers, or dashes.");
			$("#register").validate({
				ignore: [],
				debug: false,
				rules: {
					newalbum: {
						required: true,
						loginRegex: false
					}
				},
				messages: {
					newalbum: {
						required: '<p class="text-danger">This field is required.</p>',
						loginRegex: '<p class="text-danger">An album name can\'t contain any of the following characters: \\ / : * ? " < > | </p>'
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