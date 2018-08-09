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
				<div class="col-xs-12 col-sm-12 col-md-10" id="main-content">
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
									<?php
										$name = $about = $date = $id = '';
										$achid = $mysqli->real_escape_string($_GET['id']);
										$ach_query="SELECT * FROM `cms_achievement` WHERE `cms_achievement_ID` = ".$achid.";";
										$get_ach = $mysqli->query($ach_query);
										while($ach = $get_ach->fetch_assoc()) {
											$name = $ach['cms_achievement_name'];
											$about = $ach['cms_achievement_about'];
											$date = $ach['cms_achievement_date'];
											$id = $ach['cms_achievement_ID'];
										}
									?>
									<h1><?php echo $name; ?></h1>
									<p><?php echo $date; ?></p>
									<hr>
									<div class="row">
										<div class="col-lg-4">
											<a class="btn btn-primary form-control" href="edit_achievement.php?id=<?php echo $id; ?>">Edit</a>
										</div>
									</div>
									<hr>
									<div class="row">
											<div class="col-lg-12">
												<p><?php echo $about; ?></p>
											</div>
									</div>
							</div>
						</div>
				</div>
				<!--
				<div class="col-xs-4 col-sm-4 col-md-2" id="sidebar2">
					<div class="thumbnail">
						<img src="docs/img/principal.png" alt="..." class="center-block img-responsive">
						<div class="caption">
							<h3>Thumbnail label</h3>
							<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
							<p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
						</div>
					</div>
				</div>
				-->
			</div>
		</div>
			</div>
			</div>
			<br>
			<?php 
                include("footer.php");
            ?>
		<script>
			$(document).ready(function() {
					$('#dataTables-example').DataTable({
							responsive: true,
							searching: false
					});
			});
			<?php
				if(isset($_SESSION['msg']) AND $_SESSION['msg']!='' AND $_SESSION['msg'] != NULL) {
					echo "$('#msg').modal('show');";
					echo $_SESSION['msg']='';
				}
			?>
		</script>
	</body>
</html>