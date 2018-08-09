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
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
        <script src="js/index.js"></script>
        <script src="js/metisMenu.min.js"></script>
		<script src="js/sb-admin-2.min.js"></script>
        <script src="js/_jv/dist/jquery.validate.min.js"></script>
		<script src="js/_jv/dist/additional-methods.js"></script>
        <script src="js/_tmp/tmp/datatables/js/jquery.dataTables.min.js"></script>
		<script src="js/_tmp/tmp/datatables-plugins/dataTables.bootstrap.min.js"></script>
		<script src="js/_tmp/tmp/datatables-responsive/dataTables.responsive.js"></script>
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
									<h1>Student Accounts</h1>
									<?php
									?>
									<hr>
									<div class="row">
										<form action="_Sub/ss_student_accounts.php" method="GET">
											<div class="col-lg-4">
												<input type="search" class="form-control" name="q" placeholder="Search" value="<?php if(isset($_GET['q'])) {echo $_GET['q'];} ?>"/>
												<input type="hidden" name="page" value="<?php echo '1'; ?>">
											</div>
											<div class="col-lg-2">
												<button type="submit" class="btn btn-primary form-control"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search </button>
											</div>
										</form>
										<form action="stu_acct.php" method="GET">
											<div class="col-lg-4">
												<select name="lvl_sec" id="lvl_sec" class="form-control">
												  <option disabled selected>Year and Section</option>
												  <?php
											  		$q = "SELECT SECTION_NAME, YEAR_LEVEL FROM css_section, css_school_yr WHERE css_section.sy_id = css_school_yr.sy_id AND css_school_yr.status = 'active' ORDER BY YEAR_LEVEL ASC;";
											  		$q_run = $mysqli->query($q);
											  		if($q_run->num_rows > 0) {
											  			while($select = $q_run->fetch_assoc()) {
											  				$a = $select['YEAR_LEVEL'];
											  				$b = $select['SECTION_NAME'];
											  				echo '<option value='.$a."-".$b.'>'.$a."-".$b.'</option>';
											  			}
											  		}
											  	?>
												</select>
											</div>
											<div class="col-lg-2">
												<button class="btn btn-primary form-control" type="submit"> Print </button>
											</div>
										</form>
									</div>
									<hr>
									<div class="row">
								<div class="col-lg-12">
									<div class="panel panel-default">
										<div class="panel-body">
											<?php
												$result_num = 20;
												if(isset($_GET['q'])) {
													$search = strtolower($_GET['q']);
													$result_num_rows_query = "SELECT `lrn`, `stu_fname`, `stu_mname`, `stu_lname` FROM `sis_student` WHERE `stu_fname` LIKE '%$search%' OR `stu_mname` LIKE '%$search%' OR `stu_lname` LIKE '%$search%';";
												}
												else {
													$result_num_rows_query="SELECT * FROM `sis_student`;";
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
											<table width="100%" class="table table-condensed table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th>Last Name</th>
														<th>First Name</th>
														<th>Middle Name</th>
														<!-- <th class="text-center"><input type="checkbox" id="select_all_existent"></th> -->
														<th>Year and Section</th>
														<th></th>
														<th></th>
													</tr>
												</thead>
												<tbody>
												<?php
													if(isset($_GET['q'])) {
														if(isset($_GET['q']) AND !empty($_GET['q'])) {
															$search = $mysqli->real_escape_string($_GET['q']);
															$sis_query="SELECT `cms_account`.`cms_account_ID`, `cms_account`.`lrn`, `cms_account`.`status`, `stu_fname`, `stu_mname`, `stu_lname`, `year_level`, `section_name`, `year` FROM `cms_account`, `sis_student`, `css_school_yr`, `sis_stu_rec`, `css_section` WHERE (`stu_fname` LIKE '%$search%' OR `stu_mname` LIKE '%$search%' OR `stu_lname` LIKE '%$search%') AND `cms_account`.`lrn` = `sis_student`.`lrn` AND sis_student.lrn = sis_stu_rec.lrn AND sis_stu_rec.sy_id = css_school_yr.sy_id AND sis_stu_rec.section_id = css_section.SECTION_ID AND sis_stu_rec.section_id IS NOT NULL ORDER BY `stu_lname` ASC, `stu_fname` ASC, `stu_mname` ASC LIMIT ".$this_page_num_result.", ".$result_num.";";
															$get_sis = $mysqli->query($sis_query);
															if($get_sis->num_rows > 0) {
																$cnt=1;
																while($sis = $get_sis->fetch_assoc()) {
																	$stu_fname = $sis['stu_fname'];
																	$stu_mname = $sis['stu_mname'];
																	$stu_lname = $sis['stu_lname'];
																	$lrn = $sis['lrn'];
																	$ilrn = $sis['cms_account_ID'];
																	$istat = $sis['status'];
																	$isyr = $sis['year_level'];
																	$isec = $sis['section_name'];
																	echo '<tr>';
																	echo '<td id="sf_name_1-'.$cnt.'">'.$stu_lname.'</td>';
																	echo '<td id="sm_name_2-'.$cnt.'">'.$stu_fname.'</td>';
																	echo '<td id="sl_name_3-'.$cnt.'">'.$stu_mname.'</td>';
																	echo '<td>'.$isyr.'-'.$isec.'</td>';
																	//echo '<td class="text-center mark"><input class="check" type="checkbox" name="delete_paccounts[]" value="'.$lrn.'"></td>';
																	if($get_sis->num_rows == 0) {
																		echo '<td class="" text-center"></td>';
																	}
																	else {
																		echo '<td class="info text-center"><a href="edit_student_account.php?id='.$lrn.'"><span class="fa fa-edit"></span> edit </a></td>';
																	}
																	if($istat == 1) {
																		echo '<td class="warning text-center"><a href="_Sub/update_student_account_status.php?do=0&id='.$lrn.'"><span class="fa fa-edit"></span> deactivate </a></td>';
																	}
																	else {
																		echo '<td class="success text-center"><a href="_Sub/update_student_account_status.php?do=1&id='.$lrn.'"><span class="fa fa-edit"></span> activate </a></td>';
																	}
																	// if($get_cms->num_rows == 0) {
																	// 	echo '<td class="success text-center"></td>';
																	// }
																	// else {
																	// 	echo '<td class="danger text-center"><a href="_Sub/delete_student_account.php?id='.$ilrn.'" id="delete-'.$cnt.'"><span class="glyphicon glyphicon-trash"></span> delete </a></td>';
																	// }
																	echo '</tr>';
																}
															}
															else {
																echo '<tr><td class="bg-danger" colspan="5">No Match Found.</td></tr>';
															}
														}
														else {
															$sis_query="SELECT `cms_account`.`cms_account_ID`, `cms_account`.`lrn`, `cms_account`.`status`, `stu_fname`, `stu_mname`, `stu_lname`, `year_level`, `section_name`, `year` FROM `cms_account`, `sis_student`, `css_school_yr`, `sis_stu_rec`, `css_section` WHERE `cms_account`.`lrn` = `sis_student`.`lrn` AND sis_student.lrn = sis_stu_rec.lrn AND sis_stu_rec.sy_id = css_school_yr.sy_id AND sis_stu_rec.section_id = css_section.SECTION_ID AND sis_stu_rec.section_id IS NOT NULL ORDER BY `stu_lname` ASC, `stu_fname` ASC, `stu_mname` ASC LIMIT ".$this_page_num_result.", ".$result_num.";";
															$get_sis = $mysqli->query($sis_query);
															$cnt=1;
															while($sis = $get_sis->fetch_assoc()) {
																$stu_fname = $sis['stu_fname'];
																$stu_mname = $sis['stu_mname'];
																$stu_lname = $sis['stu_lname'];
																$lrn = $sis['lrn'];
																$ilrn = $sis['cms_account_ID'];
																$istat = $sis['status'];
																$isyr = $sis['year_level'];
																$isec = $sis['section_name'];
																echo '<tr>';
																echo '<td id="sf_name_1-'.$cnt.'">'.$stu_lname.'</td>';
																echo '<td id="sm_name_2-'.$cnt.'">'.$stu_fname.'</td>';
																echo '<td id="sl_name_3-'.$cnt.'">'.$stu_mname.'</td>';
																echo '<td>'.$isyr.'-'.$isec.'</td>';
																//echo '<td class="text-center mark"><input class="check" type="checkbox" name="delete_paccounts[]" value="'.$lrn.'"></td>';
																if($get_sis->num_rows == 0) {
																	echo '<td class="" text-center"></td>';
																}
																else {
																	echo '<td class="info text-center"><a href="edit_student_account.php?id='.$lrn.'"><span class="fa fa-edit"></span> edit </a></td>';
																}
																if($istat == 1) {
																	echo '<td class="warning text-center"><a href="_Sub/update_student_account_status.php?do=0&id='.$lrn.'"><span class="fa fa-edit"></span> deactivate </a></td>';
																}
																else {
																	echo '<td class="success text-center"><a href="_Sub/update_student_account_status.php?do=1&id='.$lrn.'"><span class="fa fa-edit"></span> activate </a></td>';
																}
																// if($get_cms->num_rows == 0) {
																// 	echo '<td class="success text-center"></td>';
																// }
																// else {
																// 	echo '<td class="danger text-center"><a href="_Sub/delete_student_account.php?id='.$ilrn.'" id="delete-'.$cnt.'"><span class="glyphicon glyphicon-trash"></span> delete </a></td>';
																// }
																echo '</tr>';
															}
														}
													}
													else {
														$sis_query="SELECT `cms_account`.`cms_account_ID`, `cms_account`.`lrn`, `cms_account`.`status`, `stu_fname`, `stu_mname`, `stu_lname`, `year_level`, `section_name`, `year` FROM `cms_account`, `sis_student`, `css_school_yr`, `sis_stu_rec`, `css_section` WHERE `cms_account`.`lrn` = `sis_student`.`lrn` AND sis_student.lrn = sis_stu_rec.lrn AND sis_stu_rec.sy_id = css_school_yr.sy_id AND sis_stu_rec.section_id = css_section.SECTION_ID AND sis_stu_rec.section_id IS NOT NULL ORDER BY `stu_lname` ASC, `stu_fname` ASC, `stu_mname` ASC LIMIT ".$this_page_num_result.", ".$result_num.";";
														$get_sis = $mysqli->query($sis_query);
														$cnt=1;
														while($sis = $get_sis->fetch_assoc()) {
															$stu_fname = $sis['stu_fname'];
															$stu_mname = $sis['stu_mname'];
															$stu_lname = $sis['stu_lname'];
															$lrn = $sis['lrn'];
															$ilrn = $sis['cms_account_ID'];
															$istat = $sis['status'];
															$isyr = $sis['year_level'];
															$isec = $sis['section_name'];
															echo '<tr>';
															echo '<td id="sf_name_1-'.$cnt.'">'.$stu_lname.'</td>';
															echo '<td id="sm_name_2-'.$cnt.'">'.$stu_fname.'</td>';
															echo '<td id="sl_name_3-'.$cnt.'">'.$stu_mname.'</td>';
															echo '<td>'.$isyr.'-'.$isec.'</td>';
															//echo '<td class="text-center mark"><input class="check" type="checkbox" name="delete_paccounts[]" value="'.$lrn.'"></td>';
															if($get_sis->num_rows == 0) {
																echo '<td class="" text-center"></td>';
															}
															else {
																echo '<td class="info text-center"><a href="edit_student_account.php?id='.$lrn.'"><span class="fa fa-edit"></span> edit </a></td>';
															}
															if($istat == 1) {
																echo '<td class="warning text-center"><a href="_Sub/update_student_account_status.php?do=0&id='.$lrn.'"><span class="fa fa-edit"></span> deactivate </a></td>';
															}
															else {
																echo '<td class="success text-center"><a href="_Sub/update_student_account_status.php?do=1&id='.$lrn.'"><span class="fa fa-edit"></span> activate </a></td>';
															}
															// if($get_cms->num_rows == 0) {
															// 	echo '<td class="success text-center"></td>';
															// }
															// else {
															// 	echo '<td class="danger text-center"><a href="_Sub/delete_student_account.php?id='.$ilrn.'" id="delete-'.$cnt.'"><span class="glyphicon glyphicon-trash"></span> delete </a></td>';
															// }
															echo '</tr>';
															++$cnt;
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
		<script>
			$("#select_all_existent").change(function () {
			    $("input:checkbox").prop('checked', $(this).prop("checked"));
			});
			$('#dataTables-example').DataTable({
				responsive: true,
				searching: false,
				"ordering": true
			});
			$("#register").validate({
				ignore: [],
				debug: false,
				 rules: {
					lvl_sec: {
						 required: true
					}
				},
				messages: {
					lvl_sec: {
						required: '<p class="text-danger">Please Select a Section.</p>'
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