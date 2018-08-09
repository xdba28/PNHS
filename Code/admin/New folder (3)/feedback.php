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
									<h1>Feedback</h1>
									<?php
										//echo '<pre>'; echo print_r($_SERVER); echo '<pre>';
									?>
									<hr>
									<div class="row">
										<form action="_Sub/ss_feedback.php" method="GET">
											<div class="col-lg-8">
												<select id="q" name="q" class="form-control">
	                                                <option disabled selected>Select Date</option>
	                                                <?php
	                                                	$date_run = $mysqli->query("SELECT DISTINCT `cms_site_feedback_date` FROM `cms_site_feedback` ORDER BY `cms_site_feedback_date` DESC");
	                                                	if($date_run->num_rows > 0) {
	                                                		while($getdate = $date_run->fetch_assoc()) {
	                                                			$search_op = $getdate['cms_site_feedback_date'];
	                                                			echo '<option value="'.$search_op.'">'.dateFormat($search_op).'</option>';
	                                                		}
	                                                	}
	                                                ?>
	                                            </select>
												<input type="hidden" name="page" value="<?php echo '1'; ?>">
											</div>
											<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
												<button type="submit" class="btn btn-primary form-control">Search</button>
											</div>
										</form>
									</div>
									<br>
									<div class="row">
										<div class="col-lg-12 text-justify">
											<div class="panel panel-default">
												<div class="panel-body">
													<?php
														$result_num = 20;
														if(isset($_GET['q'])) {
															$search = $mysqli->real_escape_string($_GET['q']);
															$result_num_rows_query = "SELECT * FROM `cms_site_feedback` WHERE `cms_site_feedback_date` LIKE '%$search%' ORDER BY `cms_site_feedback`.`cms_site_feedback_date` DESC, `cms_site_feedback`.`cms_site_feedback_time` DESC;";
														}
														else {
															$result_num_rows_query="SELECT * FROM `cms_site_feedback;";
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
													<table width="100%" class="table table-striped table-bordered table-hover">
														<thead hidden="">
															<tr>
																<th hidden="" valign=""></th>
															</tr>
														</thead>
														<tbody>
														<?php
															if(isset($_GET['q'])) {
																if(isset($_GET['q']) AND !empty($_GET['q'])) {
																	$search = $mysqli->real_escape_string($_GET['q']);
																	$proj_query="SELECT * FROM `cms_site_feedback` WHERE `cms_site_feedback_date` LIKE '%$search%' ORDER BY `cms_site_feedback`.`cms_site_feedback_date` DESC, `cms_site_feedback`.`cms_site_feedback_time` DESC LIMIT ".$this_page_num_result.", ".$result_num.";";
																	$get_proj = $mysqli->query($proj_query);
																	if($get_proj->num_rows > 0) {
																		while($proj = $get_proj->fetch_assoc()) {
																			if(empty($proj['cms_site_feedback_name'])) {
																				$iname = 'Anonymous';
																			}
																			else {
																				$iname = $proj['cms_site_feedback_name'];
																			}
																			$iemail = $proj['cms_site_feedback_email'];
																			$iphone = $proj['cms_site_feedback_phone'];
																			$imessage = $proj['cms_site_feedback_content'];
																			$dat = $proj['cms_site_feedback_date'];
																			echo '<tr><td><blockquote>
																					  <p>'.$iname.'</p>
																				  <small><i>'.dateFormat($dat).'</i></small>';
																			echo '<footer>'.$imessage.'</footer>';
																			echo '<div class="row">';
																			echo '<div class="col-lg-12">';
																			if(!empty($proj['cms_site_feedback_phone'])) {
																				echo '<small>Contact No.: '.$iphone.'</small>';
																			}
																			echo '</div>';
																			echo '<div class="col-lg-12">';
																			if(!empty($proj['cms_site_feedback_email'])) {
																				echo '<small>Email: '.$iemail.'</small>';
																			}
																			echo '</div>';
																			echo '</div>';
																			echo '</blockquote></td></tr>';
																		}
																	}
																	else {
																		echo '<tr><td><div class="row"><div class="col-lg-12"><div class="alert alert-danger" role="alert">
																				  <a href="#" class="alert-link">No content saved.</a>
																				</div></div></div></td></tr>';
																	}
																}
																else {
																	$proj_query="SELECT * FROM `cms_site_feedback` ORDER BY `cms_site_feedback`.`cms_site_feedback_date` DESC, `cms_site_feedback`.`cms_site_feedback_time` DESC LIMIT ".$this_page_num_result.", ".$result_num.";";
																	$get_proj = $mysqli->query($proj_query);
																	if($get_proj->num_rows > 0) {
																		while($proj = $get_proj->fetch_assoc()) {
																			if(empty($proj['cms_site_feedback_name'])) {
																				$iname = 'Anonymous';
																			}
																			else {
																				$iname = $proj['cms_site_feedback_name'];
																			}
																			$iemail = $proj['cms_site_feedback_email'];
																			$iphone = $proj['cms_site_feedback_phone'];
																			$imessage = $proj['cms_site_feedback_content'];
																			$dat = $proj['cms_site_feedback_date'];
																			echo '<tr><td><blockquote>
																					  <p>'.$iname.'</p>
																				  <small><i>'.dateFormat($dat).'</i></small>';
																			echo '<footer>'.$imessage.'</footer>';
																			echo '<div class="row">';
																			echo '<div class="col-lg-12">';
																			if(!empty($proj['cms_site_feedback_phone'])) {
																				echo '<small>Contact No.: '.$iphone.'</small>';
																			}
																			echo '</div>';
																			echo '<div class="col-lg-12">';
																			if(!empty($proj['cms_site_feedback_email'])) {
																				echo '<small>Email: '.$iemail.'</small>';
																			}
																			echo '</div>';
																			echo '</div>';
																			echo '</blockquote></td></tr>';
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
																$proj_query="SELECT * FROM `cms_site_feedback` ORDER BY `cms_site_feedback`.`cms_site_feedback_date` DESC, `cms_site_feedback`.`cms_site_feedback_time` DESC LIMIT ".$this_page_num_result.", ".$result_num.";";
																$get_proj = $mysqli->query($proj_query);
																if($get_proj->num_rows > 0) {
																	while($proj = $get_proj->fetch_assoc()) {
																		if(empty($proj['cms_site_feedback_name'])) {
																			$iname = 'Anonymous';
																		}
																		else {
																			$iname = $proj['cms_site_feedback_name'];
																		}
																		$iemail = $proj['cms_site_feedback_email'];
																		$iphone = $proj['cms_site_feedback_phone'];
																		$imessage = $proj['cms_site_feedback_content'];
																		$dat = $proj['cms_site_feedback_date'];
																		echo '<tr><td><blockquote>
																				  <p>'.$iname.'</p>
																				  <small><i>'.dateFormat($dat).'</i></small>';
																		echo '<footer>'.$imessage.'</footer>';
																		echo '<div class="row">';
																		echo '<div class="col-lg-12">';
																		if(!empty($proj['cms_site_feedback_phone'])) {
																			echo '<small>Contact No.: '.$iphone.'</small>';
																		}
																		echo '</div>';
																		echo '<div class="col-lg-12">';
																		if(!empty($proj['cms_site_feedback_email'])) {
																			echo '<small>Email: '.$iemail.'</small>';
																		}
																		echo '</div>';
																		echo '</div>';
																		echo '</blockquote></td></tr>';
																	}
																}
																else {
																	echo '<tr><td><div class="row"><div class="col-lg-12"><div class="alert alert-danger" role="alert">
																			  <a href="#" class="alert-link">No content saved.</a>
																			</div></div></div></td></tr>';
																}
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
				"columns": [
				    { "width": "100%" }
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