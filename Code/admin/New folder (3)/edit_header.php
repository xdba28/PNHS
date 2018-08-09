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
		<link rel="stylesheet" href="css/lightbox.min.css">
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
		<script src="js/lightbox-plus-jquery.min.js"></script>
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
									<h1>Header</h1>
									<?php
									?>
									<hr>
									<div class="row">
										<div class="col-lg-12">
											<form id="register" action="_Sub/process_carousel.php" method="POST" enctype="multipart/form-data">
												<div class="form-group">
													<div class="row">
														<div class="col-lg-3">
															<input type="file" id="file" name="file[]" multiple required="">
														</div>
														<div class="col-lg-1">
															<button type="submit" class="btn btn-primary" name="submit">Upload</button>
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
												</div>
											</form>
										</div>
									</div>
									<div class="row">
									<?php
										$proj_query="SELECT * FROM `cms_album` WHERE `gallery_type`='carousel';";
										$get_proj = $mysqli->query($proj_query);
										while($proj = $get_proj->fetch_assoc()) {
											$idp = $proj['cms_album_ID'];
											$iname = $proj['cms_album_name'];
											$idesc = $proj['cms_album_desc'];
											$idate = $proj['cms_album_date_created'];
											$itime = $proj['cms_album_time_created'];
											$getid = $idp;
											$img_query="SELECT * FROM `cms_image` WHERE `cms_album_ID`='$getid';";
											$get_img = $mysqli->query($img_query);
											$cnt=1;
											while($img = $get_img->fetch_assoc()) {
												$imgid = $img['cms_image_ID'];
												$id = $img['cms_album_ID'];
												$name = $img['cms_image_name'];
												$dir = $img['cms_image_dir'];
												$date = dateFormat($img['cms_image_date']);
												echo '<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 img-thumb">
																<div class="thumbnail">
																	<a href="_Sub/delete_carousel.php?id='.$imgid.'" class="btn btn-danger btn-xs pull-right"><span class="glyphicon glyphicon-trash"></span></a>
																	<a href="../uploads/'.$dir.'/'.$name.'" data-lightbox="'.$iname.'" data-title="">
																		<img src="../uploads/'.$dir.'/'.$name.'" alt="..." class="img-padding img-responsive center-block">
																	</a>
																	<div class="caption">
																		<p class=" text-right date-font">'.$date.'</p>
																	</div>
																</div>
															</div>';
												if(fmod($cnt, 6)==0) {
													echo '</div><div class="row">';
												}
												++$cnt;
											}
										}
									?>
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
		<script>
		<?php
			if(isset($_SESSION['msg']) AND $_SESSION['msg']!='' AND $_SESSION['msg'] != NULL) {
				echo "$('#msg').modal('show');";
				echo $_SESSION['msg']='';
			}
		?>
		$('#max').click(function(e) {
				$(".img-thumb").removeClass( "col-xs-4 col-sm-4 col-md-4 col-lg-4" ).addClass( "col-xs-6 col-sm-6 col-md-6 col-lg-6" );
				e.preventDefault();
			});
			$('#min').click(function(e) {
				$(".img-thumb").removeClass( "col-xs-6 col-sm-6 col-md-6 col-lg-6" ).addClass( "col-xs-4 col-sm-4 col-md-4 col-lg-4" );
				e.preventDefault();
			});

			$.validator.addMethod('filesize', function (value, element, param) {
	          var totalSize = 0;
	          for (var i = 0; i < element.files.length; i++) {
	            totalSize += element.files[i].size;
	          }
	          return this.optional(element) || (totalSize <= param)
	        }, 'File size must be less than {0}');

			$(function() {
		        $("#register").validate({
		          rules: {
		            "file[]": {
		              required: true,
		              extension: "png|jpg|jpeg",
		              filesize: 5242880,
		              filenumber: 10
		            }     
		          },
		          messages: {
		            "file[]": {
		              required: '<p class="text-danger">This field is required.</p>',
		              extension: '<p class="text-danger">Invalid File Type(s) (png, jpg(jpeg))</p>',
		              filenumber: '<p class="text-danger">Maximum File Upload: 10</p>'
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