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
		<link href="../js/_tmp/tmp/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
		<link href="../js/_tmp/tmp/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
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
		<script src="../js/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
        <script src="../js/index.js"></script>
        <script src="../js/_tmp/tmp/datatables/js/jquery.dataTables.min.js"></script>
		<script src="../js/_tmp/tmp/datatables-plugins/dataTables.bootstrap.min.js"></script>
		<script src="../js/_tmp/tmp/datatables-responsive/dataTables.responsive.js"></script>
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
									<h1>Student Accounts</h1>
									<?php
									?>
									<hr>
									<div class="row">
										<form action="" method="GET">
											<div class="col-lg-8"> 
												<input type="search" class="form-control" name="q" placeholder="Search" value="<?php if(isset($_GET['q'])) {echo $_GET['q'];} ?>"/>
											</div>
											<div class="col-lg-4">
												<button type="submit" class="btn btn-primary form-control" name="s"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search </button>
											</div>
										</form>
									</div>
									<hr>
									<div class="row">
										<div class="col-lg-8">
										</div>
										<div class="col-lg-4">
											<a target="_blank" class="btn btn-primary form-control" href="print_s.php"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</a>
										</div>
									</div>
									<hr>
									<div class="row">
								<div class="col-lg-12">
									<div class="panel panel-default">
										<div class="panel-body">
											<table width="100%" class="table table-condensed table-striped table-bordered table-hover" id="dataTables-example">
												<thead>
													<tr>
														<th>First Name</th>
														<th>Middle Name</th>
														<th>Last Name</th>
														<th></th>
														<th></th>
													</tr>
												</thead>
												<tbody>
												<?php
													if(isset($_GET['s']) AND isset($_GET['q'])) {
														if(isset($_GET['q']) AND !is_null($_GET['q']) AND !empty($_GET['q']) AND $_GET['q']!=="") {
															$sis_query="SELECT `lrn`, `stu_fname`, `stu_mname`, `stu_lname` FROM `sis_student`;";
															$get_sis = $mysqli->query($sis_query);
															$cnt=1;
															while($sis = $get_sis->fetch_assoc()) {
																$stu_fname = $sis['stu_fname'];
																$stu_mname = $sis['stu_mname'];
																$stu_lname = $sis['stu_lname'];
																$lrn = $sis['lrn'];
																$stufname = strtolower($sis['stu_fname']);
																$stumname = strtolower($sis['stu_mname']);
																$stulname = strtolower($sis['stu_lname']);
																$search = strtolower($_GET['q']);
																if(strstr($stufname, $search) OR strstr($stumname, $search) OR strstr($stulname, $search)) {
																	echo '<tr>';
																	echo '<td id="sf_name_1-'.$cnt.'">'.$stu_fname.'</td>';
																	echo '<td id="sm_name_2-'.$cnt.'">'.$stu_mname.'</td>';
																	echo '<td id="sl_name_3-'.$cnt.'">'.$stu_lname.'</td>';
																	$cms_query="SELECT `cms_account_ID`, `lrn` FROM `cms_account` WHERE `lrn` = '$lrn' LIMIT 1;";
																	$get_cms = $mysqli->query($cms_query);
																	$ilrn = '';
																	while($data = $get_cms->fetch_assoc()) {
																		$ilrn = $data['cms_account_ID'];
																	}
																	if($get_cms->num_rows == 0) {
																		echo '<td class="success text-center"><a href="add_student_account.php?id='.$lrn.'"><span class="fa fa-edit"></span> create </a></td>';
																	}
																	else {
																		echo '<td class="info text-center"><a href="edit_student_account.php?id='.$lrn.'"><span class="fa fa-edit"></span> edit </a></td>';
																	}
																	if($get_cms->num_rows == 0) {
																		echo '<td class="success text-center"></td>';
																	}
																	else {
																		echo '<td class="danger text-center"><a id="delete-'.$cnt.'"><span class="glyphicon glyphicon-trash"></span> delete </a></td>';
																	}
																	echo '</tr>';
																}
															}
														}
														else {
															$sis_query="SELECT `lrn`, `stu_fname`, `stu_mname`, `stu_lname` FROM `sis_student`;";
															$get_sis = $mysqli->query($sis_query);
															$cnt=1;
															while($sis = $get_sis->fetch_assoc()) {
																$stu_fname = $sis['stu_fname'];
																$stu_mname = $sis['stu_mname'];
																$stu_lname = $sis['stu_lname'];
																$lrn = $sis['lrn'];
																echo '<tr>';
																echo '<td id="sf_name_1-'.$cnt.'">'.$stu_fname.'</td>';
																echo '<td id="sm_name_2-'.$cnt.'">'.$stu_mname.'</td>';
																echo '<td id="sl_name_3-'.$cnt.'">'.$stu_lname.'</td>';
																$cms_query="SELECT `cms_account_ID`, `lrn` FROM `cms_account` WHERE `lrn` = '$lrn' LIMIT 1;";
																$get_cms = $mysqli->query($cms_query);
																$ilrn = '';
																while($data = $get_cms->fetch_assoc()) {
																	$ilrn = $data['cms_account_ID'];
																}
																if($get_cms->num_rows == 0) {
																	echo '<td class="success text-center"><a href="add_student_account.php?id='.$lrn.'"><span class="fa fa-edit"></span> create </a></td>';
																}
																else {
																	echo '<td class="info text-center"><a href="edit_student_account.php?id='.$lrn.'"><span class="fa fa-edit"></span> edit </a></td>';
																}
																if($get_cms->num_rows == 0) {
																	echo '<td class="success text-center"></td>';
																}
																else {
																	echo '<td class="danger text-center"><a id="delete-'.$cnt.'"><span class="glyphicon glyphicon-trash"></span> delete </a></td>';
																}
																echo '</tr>';
															}
														}
													}
													else {
														$sis_query="SELECT `lrn`, `stu_fname`, `stu_mname`, `stu_lname` FROM `sis_student`;";
														$get_sis = $mysqli->query($sis_query);
														$cnt=1;
														while($sis = $get_sis->fetch_assoc()) {
															$stu_fname = $sis['stu_fname'];
															$stu_mname = $sis['stu_mname'];
															$stu_lname = $sis['stu_lname'];
															$lrn = $sis['lrn'];
															echo '<tr>';
															echo '<td id="sf_name_1-'.$cnt.'">'.$stu_fname.'</td>';
															echo '<td id="sm_name_2-'.$cnt.'">'.$stu_mname.'</td>';
															echo '<td id="sl_name_3-'.$cnt.'">'.$stu_lname.'</td>';
															$cms_query="SELECT `cms_account_ID`, `lrn` FROM `cms_account` WHERE `lrn` = '$lrn' LIMIT 1;";
															$get_cms = $mysqli->query($cms_query);
															$ilrn = '';
															while($data = $get_cms->fetch_assoc()) {
																$ilrn = $data['cms_account_ID'];
															}
															if($get_cms->num_rows == 0) {
																echo '<td class="success text-center"><a href="add_student_account.php?id='.$lrn.'"><span class="fa fa-edit"></span> create </a></td>';
															}
															else {
																echo '<td class="info text-center"><a href="edit_student_account.php?id='.$lrn.'"><span class="fa fa-edit"></span> edit </a></td>';
															}
															if($get_cms->num_rows == 0) {
																echo '<td class="success text-center"></td>';
															}
															else {
																echo '<td class="danger text-center"><a id="delete-'.$cnt.'"><span class="glyphicon glyphicon-trash"></span> delete </a></td>';
															}
															echo '</tr>';
															++$cnt;
														}
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
		<script src="../js/alert.js"></script>
		<script src="../js/slideshow.js"></script>
		<script src="../js/back-To-Top.js"></script>
		<script src="../js/side-Nav.js"></script>
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
				if(isset($_GET['s']) AND isset($_GET['q'])) {
					if(isset($_GET['q']) AND !is_null($_GET['q']) AND !empty($_GET['q']) AND $_GET['q']!=="") {
						$sis_query="SELECT `lrn`, `stu_fname`, `stu_mname`, `stu_lname` FROM `sis_student`;";
						$get_sis = $mysqli->query($sis_query);
						$cnt=1;
						while($sis = $get_sis->fetch_assoc()) {
							$stu_fname = $sis['stu_fname'];
							$stu_mname = $sis['stu_mname'];
							$stu_lname = $sis['stu_lname'];
							$lrn = $sis['lrn'];
							$stufname = strtolower($sis['stu_fname']);
							$stumname = strtolower($sis['stu_mname']);
							$stulname = strtolower($sis['stu_lname']);
							$search = strtolower($_GET['q']);
							if(strstr($stufname, $search) OR strstr($stumname, $search) OR strstr($stulname, $search)) {
								$cms_query="SELECT `cms_account_ID`, `lrn` FROM `cms_account` WHERE `lrn` = '$lrn' LIMIT 1;";
								$get_cms = $mysqli->query($cms_query);
								$ilrn = '';
								while($data = $get_cms->fetch_assoc()) {
									$ilrn = $data['cms_account_ID'];
								}
								if($get_cms->num_rows != 0) {
									echo 'document.getElementById("delete-'.$cnt.'").addEventListener("click",
										function() {
											$(\'#deletemsg\').modal(\'show\');
											var s1 = document.getElementById("sf_name_1-'.$cnt.'").innerHTML;
											var s2 = document.getElementById("sm_name_2-'.$cnt.'").innerHTML;
											var s3 = document.getElementById("sl_name_3-'.$cnt.'").innerHTML;
											document.getElementById("p_msg").innerHTML = "Are you sure you want to delete account:<br>" + s1 + " " + s2 + " " + s3 + "?";
											document.getElementById("p_link").href = "_SUb/delete_student_account.php?id='.$ilrn.'";
										}
									);';
								}
								++$cnt;
							}
						}
					}
					else {
						$sis_query="SELECT `lrn`, `stu_fname`, `stu_mname`, `stu_lname` FROM `sis_student`;";
						$get_sis = $mysqli->query($sis_query);
						$cnt=1;
						while($sis = $get_sis->fetch_assoc()) {
							$lrn = $sis['lrn'];
							$cms_query="SELECT `cms_account_ID`, `lrn` FROM `cms_account` WHERE `lrn` = '$lrn' LIMIT 1;";
							$get_cms = $mysqli->query($cms_query);
							$ilrn = '';
							while($data = $get_cms->fetch_assoc()) {
								$ilrn = $data['cms_account_ID'];
							}
							if($get_cms->num_rows != 0) {
								echo 'document.getElementById("delete-'.$cnt.'").addEventListener("click",
									function() {
										$(\'#deletemsg\').modal(\'show\');
										var s1 = document.getElementById("sf_name_1-'.$cnt.'").innerHTML;
										var s2 = document.getElementById("sm_name_2-'.$cnt.'").innerHTML;
										var s3 = document.getElementById("sl_name_3-'.$cnt.'").innerHTML;
										document.getElementById("p_msg").innerHTML = "Are you sure you want to delete account:<br>" + s1 + " " + s2 + " " + s3 + "?";
										document.getElementById("p_link").href = "_Sub/delete_student_account.php?id='.$ilrn.'";
									}
								);';
							}
							++$cnt;
						}
					}
				}
				else {
					$sis_query="SELECT `lrn`, `stu_fname`, `stu_mname`, `stu_lname` FROM `sis_student`;";
					$get_sis = $mysqli->query($sis_query);
					$cnt=1;
					while($sis = $get_sis->fetch_assoc()) {
						$lrn = $sis['lrn'];
						$cms_query="SELECT `cms_account_ID`, `lrn` FROM `cms_account` WHERE `lrn` = '$lrn' LIMIT 1;";
						$get_cms = $mysqli->query($cms_query);
						$ilrn = '';
						while($data = $get_cms->fetch_assoc()) {
							$ilrn = $data['cms_account_ID'];
						}
						if($get_cms->num_rows != 0) {
							echo 'document.getElementById("delete-'.$cnt.'").addEventListener("click",
								function() {
									$(\'#deletemsg\').modal(\'show\');
									var s1 = document.getElementById("sf_name_1-'.$cnt.'").innerHTML;
									var s2 = document.getElementById("sm_name_2-'.$cnt.'").innerHTML;
									var s3 = document.getElementById("sl_name_3-'.$cnt.'").innerHTML;
									document.getElementById("p_msg").innerHTML = "Are you sure you want to delete account:<br>" + s1 + " " + s2 + " " + s3 + "?";
									document.getElementById("p_link").href = "_Sub/delete_student_account.php?id='.$ilrn.'";
								}
							);';
						}
						++$cnt;
					}
				}
			?>
		</script>
	</body>
</html>