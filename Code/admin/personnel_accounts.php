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
		<link rel="stylesheet" href="css/lightbox.min.css">
		<link href="js/_tmp/dist/css/sb-admin-2.css" rel="stylesheet">
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
									<?php
										$result_num = 20;
										if(isset($_GET['q'])) {
											$search = $mysqli->real_escape_string($_GET['q']);
											$result_num_rows_query = "SELECT `cms_account`.`cms_account_ID`, `cms_account`.`status`, `cms_account`.`emp_no`, `P_fname`, `P_mname`, `P_lname`, `pims_employment_records`.`job_title_code`, `pims_employment_records`.`faculty_type`, `pims_job_title`.`job_title_name` FROM `cms_account`, `pims_personnel`, `pims_job_title`, `pims_employment_records` WHERE ( `P_fname` LIKE '%$search%' OR `P_mname` LIKE '%$search%' OR `P_lname` LIKE '%$search%' OR `pims_job_title`.`job_title_name` LIKE '%$search%' OR `pims_employment_records`.`faculty_type` LIKE '%$search%' ) AND `cms_account`.`emp_no` = `cms_account`.`emp_no` AND `cms_account`.`emp_no` = `pims_personnel`.`emp_no` AND `cms_account`.`emp_no` = `pims_employment_records`.`emp_no` AND `pims_employment_records`.`job_title_code` = `pims_job_title`.`job_title_code` ORDER BY `P_lname` ASC, `P_fname` ASC, `P_mname` ASC;";
										}
										else {
											$result_num_rows_query = "SELECT `cms_account`.`cms_account_ID`, `cms_account`.`status`, `cms_account`.`emp_no`, `P_fname`, `P_mname`, `P_lname`, `pims_employment_records`.`job_title_code`, `pims_employment_records`.`faculty_type`, `pims_job_title`.`job_title_name` FROM `cms_account`, `pims_personnel`, `pims_job_title`, `pims_employment_records` WHERE `cms_account`.`emp_no` = `cms_account`.`emp_no` AND `cms_account`.`emp_no` = `pims_personnel`.`emp_no` AND `cms_account`.`emp_no` = `pims_employment_records`.`emp_no` AND `pims_employment_records`.`job_title_code` = `pims_job_title`.`job_title_code` ORDER BY `P_lname` ASC, `P_fname` ASC, `P_mname` ASC;";
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
									<h1>Personnel Accounts</h1>
									<?php
									?>
									<hr>
									<div class="row">
										<form action="_Sub/ss_personnel_accounts.php" method="GET">
											<div class="col-xs-8 col-sm-8 col-lg-4"> 
												<input type="search" class="form-control" name="q" placeholder="Search" value="<?php if(isset($_GET['q'])) {echo $_GET['q'];} ?>"/>
												<input type="hidden" name="page" value="<?php echo '1'; ?>">
											</div>
											<div class="col-xs-4 col-sm-4 col-lg-2">
												<button type="submit" class="btn btn-primary form-control"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search </button>
											</div>
										</form>
										<br class="hidden-lg">
										<br class="hidden-lg">
										<form id="register" action="per_acct.php" method="GET" target="_blank">
											<div class="col-xs-8 col-sm-8 col-lg-4">
												<select name="dep" id="dep" class="form-control">
												  <option disabled selected>Select Department</option>
												  <option value="All">All</option>
												<?php
											  		$q = "SELECT dept_name, dept_ID FROM pims_department ORDER BY dept_name ASC;";
											  		$q_run = $mysqli->query($q);
											  		if($q_run->num_rows > 0) {
											  			while($select = $q_run->fetch_assoc()) {
											  				$a = $select['dept_name'];
											  				$b = $select['dept_ID'];
											  				echo '<option value="'.$b.'">'.$a.'</option>';
											  			}
											  		}
											  	?>
												</select>
											</div>
											<div class="col-xs-4 col-sm-4 col-lg-2">
												<button class="btn btn-primary form-control" type="submit"> Print </button>
											</div>
										</form>
									</div>
									<div class="collapse" id="print_p">
										<br>
									  	<div class="well">
											<div class="row">
												<?php
											  		$q = "SELECT dept_name, dept_ID FROM pims_department ORDER BY dept_name ASC;";
											  		$q_run = $mysqli->query($q);
											  		if($q_run->num_rows > 0) {
											  			while($select = $q_run->fetch_assoc()) {
											  				$a = $select['dept_name'];
											  				$b = $select['dept_ID'];
											  				echo '<div class="col-lg-2 text-center">
																		<a target="_blank" href="per_acct.php?dep='.$b.'">'.$a.'</a>
																	</div>';
											  			}
											  		}
											  		else {
											  			echo '<option value=""></option>';
											  		}
											  	?>
											</div>
									  	</div>
									</div>
									<hr>
									<!-- <div class="row">
										<div class="col-lg-8">
										</div>
										<div class="col-lg-4">
											<a target="_blank" class="btn btn-primary form-control" href="print_p.php"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</a>
										</div>
									</div>
									<hr> -->
									<div class="row">
								<div class="col-lg-12">
									<div class="panel panel-default">
										<div class="panel-body">
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
											<table width="100%" class="table table-condensed table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th>Last Name</th>
														<th>First Name</th>
														<th>Middle Name</th>
														<th>Job Title</th>
														<th>Faculty Type</th>
														<!-- <th class="text-center"><input type="checkbox" id="select_all_existent"></th> -->
														<th></th>
														<th></th>
													</tr>
												</thead>
												<tbody>
												<?php
													if(isset($_GET['q'])) {
														if(isset($_GET['q']) AND !empty($_GET['q'])) {
															$search = $mysqli->real_escape_string($_GET['q']);
															$pims_query="SELECT `cms_account`.`cms_account_ID`, `cms_account`.`status`, `cms_account`.`emp_no`, `P_fname`, `P_mname`, `P_lname`, `pims_employment_records`.`job_title_code`, `pims_employment_records`.`faculty_type`, `pims_job_title`.`job_title_name` FROM `cms_account`, `pims_personnel`, `pims_job_title`, `pims_employment_records` WHERE ( `P_fname` LIKE '%$search%' OR `P_mname` LIKE '%$search%' OR `P_lname` LIKE '%$search%' OR `pims_job_title`.`job_title_name` LIKE '%$search%' OR `pims_employment_records`.`faculty_type` LIKE '%$search%' ) AND `cms_account`.`emp_no` = `cms_account`.`emp_no` AND `cms_account`.`emp_no` = `pims_personnel`.`emp_no` AND `cms_account`.`emp_no` = `pims_employment_records`.`emp_no` AND `pims_employment_records`.`job_title_code` = `pims_job_title`.`job_title_code` ORDER BY `P_lname` ASC, `P_fname` ASC, `P_mname` ASC LIMIT ".$this_page_num_result.", ".$result_num.";";
															$get_pims = $mysqli->query($pims_query);
															if($get_pims->num_rows > 0) {
																while($pims = $get_pims->fetch_assoc()) {
																	$P_lname = $pims['P_lname'];
																	$P_fname = $pims['P_fname'];
																	$P_mname = $pims['P_mname'];
																	$emp_no = $pims['emp_no'];
																	$job_title_code = $pims['job_title_code'];
																	$faculty_type = $pims['faculty_type'];
																	$job_title_name = $pims['job_title_name'];
																	echo '<tr>';
																	echo '<td>'.$P_lname.'</td>';
																	echo '<td>'.$P_fname.'</td>';
																	echo '<td>'.$P_mname.'</td>';
																	echo '<td>'.$job_title_name.'</td>';
																	echo '<td>'.$faculty_type.'</td>';
																	//echo '<td class="text-center mark"><input class="check" type="checkbox" name="delete_paccounts[]" value="'.$emp_no.'"></td>';
																	$iemp = $istat = '';
																	$iemp = $pims['cms_account_ID'];
																	$istat = $pims['status'];
																	if($get_pims->num_rows == 0) {
																		echo '<td class="" text-center"></td>';
																	}
																	else {
																		echo '<td class="info text-center"><a href="edit_personnel_account.php?id='.$emp_no.'"><span class="fa fa-edit"></span> edit </a></td>';
																	}
																	if($istat == 1) {
																		echo '<td class="warning text-center"><a href="_Sub/update_personnel_account_status.php?do=0&id='.$emp_no.'"><span class="fa fa-edit"></span> deactivate </a></td>';
																	}
																	else {
																		echo '<td class="success text-center"><a href="_Sub/update_personnel_account_status.php?do=1&id='.$emp_no.'"><span class="fa fa-edit"></span> activate </a></td>';
																	}
																	// if($get_cms->num_rows == 0) {
																	// 	echo '<td class="success text-center"></td>';
																	// }
																	// else {
																	// 	echo '<td class="danger text-center"><a href="_Sub/delete_personnel_account.php?id='.$iemp.'"><span class="glyphicon glyphicon-trash"></span> delete </a></td>';
																	// }
																	echo '</tr>';
																}
															}
															else {
																echo '<tr><td class="bg-danger" colspan="5">No Match Found.</td></tr>';
															}
														}
														else {
															$pims_query="SELECT `cms_account`.`cms_account_ID`, `cms_account`.`status`, `cms_account`.`emp_no`, `P_fname`, `P_mname`, `P_lname`, `pims_employment_records`.`job_title_code`, `pims_employment_records`.`faculty_type`, `pims_job_title`.`job_title_name` FROM `cms_account`, `pims_personnel`, `pims_job_title`, `pims_employment_records` WHERE `cms_account`.`emp_no` = `cms_account`.`emp_no` AND `cms_account`.`emp_no` = `pims_personnel`.`emp_no` AND `cms_account`.`emp_no` = `pims_employment_records`.`emp_no` AND `pims_employment_records`.`job_title_code` = `pims_job_title`.`job_title_code` ORDER BY `P_lname` ASC, `P_fname` ASC, `P_mname` ASC LIMIT ".$this_page_num_result.", ".$result_num.";";
															$get_pims = $mysqli->query($pims_query);
															while($pims = $get_pims->fetch_assoc()) {
																$P_lname = $pims['P_lname'];
																$P_fname = $pims['P_fname'];
																$P_mname = $pims['P_mname'];
																$emp_no = $pims['emp_no'];
																$job_title_code = $pims['job_title_code'];
																$faculty_type = $pims['faculty_type'];
																$job_title_name = $pims['job_title_name'];
																echo '<tr>';
																echo '<td>'.$P_lname.'</td>';
																echo '<td>'.$P_fname.'</td>';
																echo '<td>'.$P_mname.'</td>';
																echo '<td>'.$job_title_name.'</td>';
																echo '<td>'.$faculty_type.'</td>';
																//echo '<td class="text-center mark"><input class="check" type="checkbox" name="delete_paccounts[]" value="'.$emp_no.'"></td>';
																$iemp = $istat = '';
																$iemp = $pims['cms_account_ID'];
																$istat = $pims['status'];
																if($get_pims->num_rows == 0) {
																	echo '<td class="" text-center"></td>';
																}
																else {
																	echo '<td class="info text-center"><a href="edit_personnel_account.php?id='.$emp_no.'"><span class="fa fa-edit"></span> edit </a></td>';
																}
																if($istat == 1) {
																	echo '<td class="warning text-center"><a href="_Sub/update_personnel_account_status.php?do=0&id='.$emp_no.'"><span class="fa fa-edit"></span> deactivate </a></td>';
																}
																else {
																	echo '<td class="success text-center"><a href="_Sub/update_personnel_account_status.php?do=1&id='.$emp_no.'"><span class="fa fa-edit"></span> activate </a></td>';
																}
																// if($get_cms->num_rows == 0) {
																// 	echo '<td class="success text-center"></td>';
																// }
																// else {
																// 	echo '<td class="danger text-center"><a href="_Sub/delete_personnel_account.php?id='.$iemp.'"><span class="glyphicon glyphicon-trash"></span> delete </a></td>';
																// }
																echo '</tr>';
															}
														}
													}
													else {
														$pims_query="SELECT `cms_account`.`cms_account_ID`, `cms_account`.`status`, `cms_account`.`emp_no`, `P_fname`, `P_mname`, `P_lname`, `pims_employment_records`.`job_title_code`, `pims_employment_records`.`faculty_type`, `pims_job_title`.`job_title_name` FROM `cms_account`, `pims_personnel`, `pims_job_title`, `pims_employment_records` WHERE `cms_account`.`emp_no` = `cms_account`.`emp_no` AND `cms_account`.`emp_no` = `pims_personnel`.`emp_no` AND `cms_account`.`emp_no` = `pims_employment_records`.`emp_no` AND `pims_employment_records`.`job_title_code` = `pims_job_title`.`job_title_code` ORDER BY `P_lname` ASC, `P_fname` ASC, `P_mname` ASC LIMIT ".$this_page_num_result.", ".$result_num.";";
														$get_pims = $mysqli->query($pims_query);
														while($pims = $get_pims->fetch_assoc()) {
															$P_lname = $pims['P_lname'];
															$P_fname = $pims['P_fname'];
															$P_mname = $pims['P_mname'];
															$emp_no = $pims['emp_no'];
															$job_title_code = $pims['job_title_code'];
															$faculty_type = $pims['faculty_type'];
															$job_title_name = $pims['job_title_name'];
															echo '<tr>';
															echo '<td>'.$P_lname.'</td>';
															echo '<td>'.$P_fname.'</td>';
															echo '<td>'.$P_mname.'</td>';
															echo '<td>'.$job_title_name.'</td>';
															echo '<td>'.$faculty_type.'</td>';
															//echo '<td class="text-center mark"><input class="check" type="checkbox" name="delete_paccounts[]" value="'.$emp_no.'"></td>';
															$iemp = $istat = '';
															$iemp = $pims['cms_account_ID'];
															$istat = $pims['status'];
															if($get_pims->num_rows == 0) {
																echo '<td class="" text-center"></td>';
															}
															else {
																echo '<td class="info text-center"><a href="edit_personnel_account.php?id='.$emp_no.'"><span class="fa fa-edit"></span> edit </a></td>';
															}
															if($istat == 1) {
																echo '<td class="warning text-center"><a href="_Sub/update_personnel_account_status.php?do=0&id='.$emp_no.'"><span class="fa fa-edit"></span> deactivate </a></td>';
															}
															else {
																echo '<td class="success text-center"><a href="_Sub/update_personnel_account_status.php?do=1&id='.$emp_no.'"><span class="fa fa-edit"></span> activate </a></td>';
															}
															// if($get_cms->num_rows == 0) {
															// 	echo '<td class="success text-center"></td>';
															// }
															// else {
															// 	echo '<td class="danger text-center"><a href="_Sub/delete_personnel_account.php?id='.$iemp.'"><span class="glyphicon glyphicon-trash"></span> delete </a></td>';
															// }
															echo '</tr>';
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
							<div class="row">
								<div class="col-lg-12">
								</div>
							</div>
						</div>
					</div>
					<br>
				</div>
			</div>
		</div>
			</div>
			<br>
			<?php 
                include("footer.php");
            ?>
			</div>
		<script src="js/_tmp/tmp/datatables/js/jquery.dataTables.min.js"></script>
		<script src="js/_tmp/tmp/datatables-plugins/dataTables.bootstrap.min.js"></script>
		<script src="js/_tmp/tmp/datatables-responsive/dataTables.responsive.js"></script>
		<script>
			// $('#select_all_existent').on('click', function() {
			//     var rows = table.rows({ 'search': 'applied' }).nodes();
			//     $(':checkbox', rows).prop('checked', this.checked);
			// });
			$("#select_all_existent").change(function () {
			    $("input:checkbox").prop('checked', $(this).prop("checked"));
			});
			$('#dataTables-example').DataTable({
				responsive: true,
				searching: false,
				"ordering": true,
			    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			    "lengthChange": false,
			    "paging": false,
			    "bInfo": false
			});
			$(function() {
				$.validator.addMethod("srequired", function(value, element, arg){
					return arg !== value;
				}, "");

		        $("#register").validate({
		        	ignore: [],
					debug: false,
		          	rules: {
		            	dep: {
		              		srequired: ""
		            	}     
		          	},
		          	messages: {
		            	dep: {
		              		srequired: '<p class="text-danger">This field is required.</p>'
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