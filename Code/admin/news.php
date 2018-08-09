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
									</div>
									<div class="modal-body">
										<h3 id="msg-content" class="text-center"></h3>
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
										<h3 class="text-center"><?php echo $_SESSION['msg']; ?></h3>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
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
							echo "<script>$('#smsg').modal('show');</script>";
							echo $_SESSION['msg']='';
						}
					?>
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-primary">
								<div class="panel-body">
									<?php
										$result_num = 20;
										if(isset($_GET['q'])) {
											$search = $mysqli->real_escape_string($_GET['q']);
											$result_num_rows_query = "SELECT * FROM `cms_news` WHERE `cms_title` LIKE '%$search%' OR `cms_news_description` LIKE '%$search%' OR `cms_news_date` LIKE '%$search%' ORDER BY `cms_news_date` DESC;";
										}
										else {
											$result_num_rows_query="SELECT * FROM `cms_news`;";
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
									<h1>News</h1>
									<?php
									?>
									<hr>
									<div class="row">
										<div class="col-lg-4">
											<a class="btn btn-primary form-control" href="add_news.php">Add News</a>
										</div>
									</div>
									<hr>
									<div class="row">
										<form action="_Sub/ss_news.php" method="GET">
											<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
												<input type="text" class="form-control" name="q" placeholder="Search" value=""/>
												<input type="hidden" name="page" value="<?php echo '1'; ?>">
											</div>
											<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
												<button type="submit" class="btn btn-primary form-control">Search</button>
											</div>
										</form>
									</div>
									<br>
									<form action="_Sub/delete_mnews.php" method="POST">
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
													<table width="100%" class="table table-condensed table-striped table-bordered table-hover" id="dataTables-example">
														<thead>
															<tr>
																<th>Date</th>
																<th>Title</th>
																<th class="text-center"><input type="checkbox" id="select_all_existent"></th>
																<th></th>
																<th></th>
																<th class="d-none"></th>
																<th class="d-none"></th>
																<th class="d-none"></th>
															</tr>
														</thead>
														<tbody>
														<?php
															if(isset($_GET['q'])) {
																if(isset($_GET['q']) AND !empty($_GET['q'])) {
																	$search = $mysqli->real_escape_string($_GET['q']);
																	$news_query="SELECT * FROM `cms_news` WHERE `cms_title` LIKE '%$search%' OR `cms_news_description` LIKE '%$search%' OR `cms_news_date` LIKE '%$search%' ORDER BY `cms_news_date` DESC LIMIT ".$this_page_num_result.", ".$result_num.";";
																	$get_news = $mysqli->query($news_query);
																	if($get_news->num_rows > 0) {
																		while($news = $get_news->fetch_assoc()) {
																			$title = $news['cms_title'];
																			$desc = $news['cms_news_description'];
																			$date = $news['cms_news_date'];
																			$id = $news['cms_news_ID'];
																			echo '<tr>';
																			echo '<td>'.$date.'</td>';
																			echo '<td>'.$title.'</td>';
																			//echo '<td>'.substr(strip_tags($desc), 0, 35).'...'.'</td>';
																			echo '<td class="text-center mark"><input class="check" type="checkbox" name="delete_news[]" value="'.$id.'"></td>';
																			echo '<td class="info text-center">
																									<a href="view_news.php?id='.$id.'"><span class="fa fa-edit"></span> view </a>
																								</td>';
																			echo '<td class="danger text-center delete">
																									<a class="delete mc-pointer"><span class="glyphicon glyphicon-trash"></span> delete </a>
																								</td>';
																			echo	'<td hidden="hidden">'.$title.'</td>
																					<td hidden="hidden">'.$id.'</td>
																					<td hidden="hidden"></td>';
																			echo '</tr>';
																		}
																	}
																	else {
																		echo '<tr><td class="bg-danger" colspan="5">No Match Found.</td></tr>';
																	}
																}
																else {
																	$news_query="SELECT * FROM `cms_news` ORDER BY `cms_news_date` DESC LIMIT ".$this_page_num_result.", ".$result_num.";";
																	$get_news = $mysqli->query($news_query);
																	while($news = $get_news->fetch_assoc()) {
																		$title = $news['cms_title'];
																		$desc = $news['cms_news_description'];
																		$date = $news['cms_news_date'];
																		$id = $news['cms_news_ID'];
																		echo '<tr>';
																		echo '<td>'.$date.'</td>';
																		echo '<td>'.$title.'</td>';
																		//echo '<td>'.substr(strip_tags($desc), 0, 35).'...'.'</td>';
																		echo '<td class="text-center mark"><input class="check" type="checkbox" name="delete_news[]" value="'.$id.'"></td>';
																		echo '<td class="info text-center">
																								<a href="view_news.php?id='.$id.'"><span class="fa fa-edit"></span> view </a>
																							</td>';
																		echo '<td class="danger text-center delete">
																								<a class="delete mc-pointer"><span class="glyphicon glyphicon-trash"></span> delete </a>
																							</td>';
																		echo	'<td hidden="hidden">'.$title.'</td>
																				<td hidden="hidden">'.$id.'</td>
																				<td hidden="hidden"></td>';
																		echo '</tr>';
																	}
																}
															}
															else {
																$news_query="SELECT * FROM `cms_news` ORDER BY `cms_news_date` DESC LIMIT ".$this_page_num_result.", ".$result_num.";";
																$get_news = $mysqli->query($news_query);
																while($news = $get_news->fetch_assoc()) {
																	$title = $news['cms_title'];
																	$desc = $news['cms_news_description'];
																	$date = $news['cms_news_date'];
																	$id = $news['cms_news_ID'];
																	echo '<tr>';
																	echo '<td>'.$date.'</td>';
																	echo '<td>'.$title.'</td>';
																	//echo '<td>'.substr(strip_tags($desc), 0, 35).'...'.'</td>';
																	echo '<td class="text-center mark"><input class="check" type="checkbox" name="delete_news[]" value="'.$id.'"></td>';
																	echo '<td class="info text-center">
																							<a href="view_news.php?id='.$id.'"><span class="fa fa-edit"></span> view </a>
																						</td>';
																	echo '<td class="danger text-center delete">
																							<a class="delete mc-pointer"><span class="glyphicon glyphicon-trash"></span> delete </a>
																						</td>';
																	echo	'<td hidden="hidden">'.$title.'</td>
																			<td hidden="hidden">'.$id.'</td>
																			<td hidden="hidden"></td>';
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
									</form>
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
		<script src="js/_tmp/tmp/datatables/js/jquery.dataTables.min.js"></script>
		<script src="js/_tmp/tmp/datatables-plugins/dataTables.bootstrap.min.js"></script>
		<script src="js/_tmp/tmp/datatables-responsive/dataTables.responsive.js"></script>
		<script>
			$('#select_all_existent').on('click', function() {
			    var rows = table.rows({ 'search': 'applied' }).nodes();
			    $(':checkbox', rows).prop('checked', this.checked);
			});
			$(".d-none").css("display", "none");
			$(".mc-pointer").css("cursor", "pointer");
			$('#dataTables-example').DataTable({
				responsive: true,
				searching: false,
				columnDefs: [
			        {"targets": [ 5 ],"visible": false},
			        {"targets": [ 6 ],"visible": false},
			        {"targets": [ 7 ],"visible": false}
			    ],
			    "ordering": false,
			    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			    "lengthChange": false,
			    "paging": false,
			    "bInfo": false,
			    "columns": [
				    { "width": "10%" },
				    { "width": "65%" },
				    { "width": "5%" },
				    { "width": "10%" },
				    { "width": "10%" },
				    null,
				    null,
				    null
				]
			});
			var table = $('#dataTables-example').DataTable();
			$('#dataTables-example > tbody').on('click', 'tr > td > a.delete', function() {
			    var data = table.row( $(this).parents('tr') ).data();
			    var insert = 'Are you sure you want to delete this article: <br>' + data[5] + "?";
				$("#del-link").attr("href", "_Sub/delete_news.php?id=" + data[6]);
				$('#msg-content').html(insert);
				$('#msg').modal('show');
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