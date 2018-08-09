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
		<link href="../_tmp/tmp/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
		<link href="../_tmp/tmp/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
		<style>
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
									</div>
									<div class="modal-body">
										<h3 id="msg-content" class="text-center"><?php echo $_SESSION['msg']; ?></h3>
									</div>
									<div class="modal-footer">
										<a id="del-link" href="" class="btn btn-primary"> Yes </a>
										<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
									</div>
							</div>
						</div>     
					</div>
					<div class="modal fade" id="smsg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									</div>
									<div class="modal-body">
										<h3 id="msg-content" class="text-center"><?php echo $_SESSION['msg']; ?></h3>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
									</div>
							</div>
						</div>     
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-primary sidepanel">
								<div class="panel-body">
									<h1>Achievements</h1>
									<?php
									?>
									<hr>
									<div class="row">
										<div class="col-lg-4">
											<a class="btn btn-primary form-control" href="add_achievement.php">Add Achievement</a>
										</div>
									</div>
									<hr>
									<div class="row">
										<form action="" method="GET">
											<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
												<input type="text" class="form-control" name="q" placeholder="Search" value="<?php if(isset($_GET['q'])) {echo $_GET['q'];} ?>"/>
											</div>
											<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
												<input type="submit" class="btn btn-primary form-control" name="s" value="Search"></input>
											</div>
										</form>
									</div>
									<br>
									<form action="_Sub/delete_machievement.php" method="POST">
									<div class="row">
											<div class="col-lg-4">
											</div>
											<div class="col-lg-4">
											</div>
											<div class="col-lg-4">
												<input type="submit" class="btn btn-danger form-control" name="s" value="Delete Selected Articles"></input>
											</div>
									</div>
									<br>
									<div class="row">
										<div class="col-lg-12">
											<div class="panel panel-default">
												<div class="panel-body">
													<table width="100%" class="table table-condensed table-striped table-bordered table-hover" id="dataTables-example">
														<thead>
															<tr>
																<th>Date</th>
																<th>Title</th>
																<th>Description</th>
																<th class="text-center"><input type="checkbox" id="select_all_existent"></th>
																<th></th>
																<th></th>
																<th class="d-none"></th>
																<th class="d-none"></th>
															</tr>
														</thead>
													<tbody>
													<?php
														if(isset($_GET['s']) AND isset($_GET['q'])) {
															if(isset($_GET['q']) AND !is_null($_GET['q']) AND !empty($_GET['q']) AND $_GET['q']!=="") {
																$ach_query="SELECT * FROM `cms_achievement`;";
																$get_ach = $mysqli->query($ach_query);
																while($ach = $get_ach->fetch_assoc()) {
																	$name = $ach['cms_achievement_name'];
																	$about = $ach['cms_achievement_about'];
																	$date = $ach['cms_achievement_date'];
																	$id = $ach['cms_achievement_ID'];
																	$q = $mysqli->real_escape_string($_GET['q']);
																	$name2 = strtolower($name);
																	$about2 = strtolower($about);
																	$date2 = strtolower($date);
																	$search = strtolower($q);
																	if(strstr($name2, $search) OR strstr($about2, $search) OR strstr($date2, $search)) {
																		echo '<tr>';
																		echo '<td>'.$date.'</td>';
																		echo '<td>'.strip_tags($name).'</td>';
																		echo '<td>'.strip_tags($about).'</td>';
																		echo '<td class="text-center mark"><input class="check" type="checkbox" name="delete_achievement[]" value="'.$id.'"></td>';
																		echo '<td hidden="hidden">'.$name.'</td>
																		<td hidden="hidden">'.$id.'</td>';
																		echo '<td class="info text-center">
																						<a href="edit_achievement.php?id='.$id.'"><span class="fa fa-edit"></span> edit </a>
																					</td>';
																		echo '<td class="danger text-center">
																						<a class="delete mc-pointer"><span class="glyphicon glyphicon-trash"></span> delete </a>
																					</td>';
																		echo '</tr>';
																	}
																}
															}
															else {
																$ach_query="SELECT * FROM `cms_achievement`;";
																$get_ach = $mysqli->query($ach_query);
																while($ach = $get_ach->fetch_assoc()) {
																	$name = $ach['cms_achievement_name'];
																	$about = $ach['cms_achievement_about'];
																	$date = $ach['cms_achievement_date'];
																	$id = $ach['cms_achievement_ID'];
																	echo '<tr>';
																	echo '<td>'.$date.'</td>';
																	echo '<td>'.strip_tags($name).'</td>';
																	echo '<td>'.strip_tags($about).'</td>';
																	echo '<td class="text-center mark"><input class="check" type="checkbox" name="delete_achievement[]" value="'.$id.'"></td>';
																	echo '<td hidden="hidden">'.$name.'</td>
																	<td hidden="hidden">'.$id.'</td>';
																	echo '<td class="info text-center">
																					<a href="edit_achievement.php?id='.$id.'"><span class="fa fa-edit"></span> edit </a>
																				</td>';
																	echo '<td class="danger text-center">
																					<a class="delete mc-pointer"><span class="glyphicon glyphicon-trash"></span> delete </a>
																				</td>';
																	echo '</tr>';
																}
															}
														}
														else {
															$ach_query="SELECT * FROM `cms_achievement`;";
															$get_ach = $mysqli->query($ach_query);
															while($ach = $get_ach->fetch_assoc()) {
																$name = $ach['cms_achievement_name'];
																$about = $ach['cms_achievement_about'];
																$date = $ach['cms_achievement_date'];
																$id = $ach['cms_achievement_ID'];
																echo '<tr>';
																echo '<td>'.$date.'</td>';
																echo '<td>'.strip_tags($name).'</td>';
																echo '<td>'.strip_tags($about).'</td>';
																echo '<td class="text-center mark"><input class="check" type="checkbox" name="delete_achievement[]" value="'.$id.'"></td>';
																echo '<td hidden="hidden">'.$name.'</td>
																<td hidden="hidden">'.$id.'</td>';
																echo '<td class="info text-center">
																				<a href="edit_achievement.php?id='.$id.'"><span class="fa fa-edit"></span> edit </a>
																			</td>';
																echo '<td class="danger text-center">
																				<a class="delete mc-pointer"><span class="glyphicon glyphicon-trash"></span> delete </a>
																			</td>';
																echo '</tr>';
															}
														}
													?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
								</form>
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
		<script src="../js/alert.js"></script>
		<script src="../js/slideshow.js"></script>
		<script src="../js/back-To-Top.js"></script>
		<script src="../js/side-Nav.js"></script>
		<script src="../js/_tmp/tmp/datatables/js/jquery.dataTables.min.js"></script>
		<script src="../js/_tmp/tmp/datatables-plugins/dataTables.bootstrap.min.js"></script>
		<script src="../js/_tmp/tmp/datatables-responsive/dataTables.responsive.js"></script>
		<script>
			<?php
				if(isset($_SESSION['msg']) AND $_SESSION['msg']!='' AND $_SESSION['msg'] != NULL) {
					echo "$('#smsg').modal('show');";
					echo $_SESSION['msg']='';
				}
			?>
			$('#select_all_existent').on('click', function(){
			    var rows = table.rows({ 'search': 'applied' }).nodes();
			    $(':checkbox', rows).prop('checked', this.checked);
			});
			$(".d-none").css("display", "none");
			$(".mc-pointer").css("cursor", "pointer");
			$('#dataTables-example').DataTable({
				responsive: true,
				searching: false,
				columnDefs: [
			        {"targets": [ 4 ],"visible": false},
			        {"targets": [ 5 ],"visible": false}
			    ]
			});
			var table = $('#dataTables-example').DataTable();
			$('#dataTables-example > tbody').on('click', 'tr > td > a.delete', function() {
			    var data = table.row( $(this).parents('tr') ).data();
			    var insert = 'Are you sure you want to delete this achievement: <br>' + data[4] + "?";
				$("#del-link").attr("href", "_Sub/delete_achievement.php?id=" + data[5]);
				$('#msg-content').html(insert);
				$('#msg').modal('show');
			});
		</script>
	</body>
</html>