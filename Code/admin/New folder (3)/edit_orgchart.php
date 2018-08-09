<?php
	include('../func.php');
	include('../php/connection.php');
	include('../php/_Func.php');
	include('../php/_Def.php');
	$_SESSION['hist'] = $_SERVER['REQUEST_URI'];
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
									<h1>Edit Organizational Chart</h1>
									<hr>
									<?php
										$id = $sy1 = $sy2 = $title = '';
										$orgid = $mysqli->real_escape_string($_GET['id']);
										$org_query="SELECT * FROM `cms_orgchart` WHERE `cms_orgchart_ID` = '$orgid';";
										$get_org = $mysqli->query($org_query);
										while($org = $get_org->fetch_assoc()) {
											$id = $org['cms_orgchart_ID'];
											$sy1 = $org['cms_orgchart_year1'];
											$sy2 = $org['cms_orgchart_year2'];
											$title = $org['cms_orgchart_title'];
											$img = $org['cms_orgchart_img_name'];
										}
									?>
									<form id="register" action="_Sub/update_orgchart.php" method="POST" enctype="multipart/form-data">
											<div class="row">
												<div class="col-lg-6">
													<label for="title">Title: </label>
													<div class="row">
														<div class="col-lg-12">
															<input type="text" class="form-control" id="title" name="title" value="<?php echo $title; ?>">
															<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<label for="title">S.Y.: </label>
													<div class="row">
														<div class="col-lg-6">
															<input type="text" class="form-control" id="sy1" name="sy1" value="<?php echo $sy1; ?>">
														</div>
														<div class="col-lg-6">
															<input class="form-control" type="text" id="sy2" name="sy2" value="<?php echo $sy2; ?>">
														</div>
													</div>
												</div>
											</div>
											<br>
		                            	<div class="row">
		                            		<div class="col-lg-12">
		                              			<label for="file">File: </label>
		                                		<input type="file" id="file" name="file">
		                              		</div>
		                            	</div>
		                            	<br>
		                            	<div class="row">
		                              		<div class="col-lg-4">
											</div>
											<div class="col-lg-4">
											</div>
											<div class="col-lg-4">
											<button type="submit" class="btn btn-primary form-control" name="submit">Save</button>
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
			<br>
			<?php 
                include("footer.php");
            ?>
		</div>
			</div>
			</div>
		<script>
			$.validator.addMethod('filesize', function (value, element, param) {
	          	var totalSize = 0;
	          	for (var i = 0; i < element.files.length; i++) {
	            	totalSize += element.files[i].size;
	        }
	          	return this.optional(element) || (totalSize <= param)
	        }, 'File size must be less than {0}');
			$(function() {
		        $("#register").validate({
		        	ignore: [],
					debug: false,
		          	rules: {
		          		sy1: {
		          			required: true,
		          			digits: true,
		          			maxlength: 4
		          		},
		          		sy2: {
		          			required: true,
		          			digits: true,
		          			maxlength: 4
		          		},
		          		title: {
		          			required: true
		          		},
		            	file: {
		              		extension: "png|jpg|jpeg",
		              		filesize: 2097152
		            	}     
		          	},
		          	messages: {
		          		sy1: {
		          			required: '<p class="text-danger">This field is required.</p>',
		          			digits: '<p class="text-danger">Please enter a valid year.</p>',
		          			maxlength: '<p class="text-danger">Please enter no more than 4 characters.</p>'
		          		},
		          		sy2: {
		          			required: '<p class="text-danger">This field is required.</p>',
		          			digits: '<p class="text-danger">Please enter a valid year.</p>',
		          			maxlength: '<p class="text-danger">Please enter no more than 4 characters.</p>'
		          		},
		          		title: {
		          			required: '<p class="text-danger">This field is required.</p>'
		          		},
		            	file: {
		              		extension: '<p class="text-danger">Invalid File Type. Must be in .jpg(.jpeg), .png extension.</p>',
		              		filesize: '<p class="text-danger">File must be less than 2MB</p>'
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