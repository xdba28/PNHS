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
							<div class="panel panel-primary">
								<div class="panel-body">
									<?php
										$title = $desc = $date = $id = $dir = '';
										$newsid = $mysqli->real_escape_string($_GET['id']);
										$news_query="SELECT * FROM `cms_news` WHERE `cms_news_ID` = ".$newsid.";";
										$get_news = $mysqli->query($news_query);
										while($news = $get_news->fetch_assoc()) {
											$title = $news['cms_title'];
											$desc = $news['cms_news_description'];
											$date = $news['cms_news_date'];
											$id = $news['cms_news_ID'];
											$dir = $news['cms_news_img_dir'];
											$cap = $news['cms_news_img_cap'];
											$auth = $news['cms_news_writer'];
										}
									?>
									<div class="row">
										<div class="col-lg-12">
											<h1><b><?php echo $title; ?></b></h1>
											<?php
												echo '<p><i>';
												if(!empty($auth)) {
													echo 'By: '.$auth.' ';
												}
												if(!empty($date)) {
													if(!empty($auth)) {
														echo '- ';
													}
													echo dateFormat($date);
												}
												echo '</i></p>';
											?>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-lg-8">
											<a class="btn btn-primary form-control" href="edit_news.php?id=<?php echo $id; ?>">Edit</a>
											<hr>
											<p><?php echo $desc; ?></p>
										</div>
										<div class="col-lg-4">
											<img src="<?php echo '../uploads/'.$dir; ?>" class="img-responsive center-block">
											<br>
											<?php
												if(!empty($dir)) {
													echo '<blockquote><footer><p><i>'.$cap.'</i></p></footer></blockquote>';
												}
											?>
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
		</div>
			</div>
			</div>
		<script>
			$('#dataTables-example').DataTable({
				responsive: true,
				searching: false
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