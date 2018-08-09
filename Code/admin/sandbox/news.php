<?php
	include('func.php');
	include('php/connection.php');
	include('php/_Func.php');
	include('php/_Def.php');
	$_SESSION['hist'] = $_SERVER['REQUEST_URI'];
	if(isset($_GET['page']) AND !is_numeric($_GET['page'])) {
		header('Location: '.$_SERVER['PHP_SELF']);
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
?>
<!DOCTYPE html>
<html lang="en" >
	<head>
	  	<meta charset="UTF-8">
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	  	<title>News | PAG-ASA National High School</title>
	  	<meta http-equiv="Content-Type" content="text/html">
	  	<meta http-equiv="content-language" content="en" />
	    <meta http-equiv="content-script-type" content="text/javascript" />
	    <meta http-equiv="content-style-type" content="text/css" />
	    <meta property="og:locale" content="en_US" />
		<meta property="og:type" content="website" />
		<meta property="og:title" content="News | PAG-ASA National High School" />
		<meta property="og:site_name" content="News | PAG-ASA National High School" />
	  	<meta name="description" content="News | PAG-ASA National High School">
	  	<meta name="keywords" content="PNHS, PAG-ASA National High School, university, legazpi, legazpi city, institutions, school, official, public, public schools, public school">
		<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/w3/w3.css">
		<link rel="stylesheet" href="docs/docs.min.css">
		<link rel="stylesheet" href="css/w3/blue.css">
		<link rel="stylesheet" href="css/w3/yellow.css">
		<link rel="stylesheet" href="css/backToTop.css">
		<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css" type="text/css">
		<link rel="shortcut icon" href="img/pnhs_favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="css/metisMenu.min.css" type="text/css">
		<link rel="icon" href="img/pnhs_favicon.ico" type="image/x-icon">
		<link href="js/_tmp/tmp/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
		<link href="js/_tmp/tmp/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
        <script src="js/index.js"></script>
        <script src="js/metisMenu.min.js"></script>
		<script src="js/sb-admin-2.min.js"></script>
		<style>
			body {
				position: relative; 
			}
			.affix {
				top:0;
				width: 100%;
				z-index: 9999 !important;
			}
			.navbar {
				margin-bottom: 0px;
			}
			.affix ~ .container-fluid {
				position: relative;
				top: 50%;
			}
			#main {
				padding: 0px 35px;
			}
			.p-padding {
				padding: 15px;
			}
			#myCarousel {
				height: 400px;
				width: 100%;
			}
			.carousel-img {
				height: 400px;
			}
			#close-btn {
				background-color: #356d9a;
			}
			#nav-logo {
				height: 50px;
				width: 211px;
				padding: 0px;
				margin: 0px;
			}
			body {
				background-color: white; /* #fdff3d */
			}
			.nav-color {
				color: white;
				border-color: #074b83;
			}
			.navbar-default .navbar-nav > li > a {
				color: white;
			}
			.navbar-default .navbar-nav > li > a:focus, 
			.navbar-default .navbar-nav > li > a:hover {
				color: white;
				background-color: #063c68;
			}
			.navbar-default .navbar-toggle {
				color: white;
				border-color: white;
				background-color: #074b83;
			}
			.navbar-default .navbar-toggle .icon-bar {
				background-color: white;
			}
			.carousel-size {
				height: 300px !important;
			}
			.navbar-default .navbar-text {
				background-color: #074b83;
				color: white;
				border-color: #074b83;
			}
			.navbar-header {
			    float: !important;
			    text-align: center!important;
			}
			a:focus, a:hover {
		        color: white;
		    }
		    #cap_black:hover {
				color: black;
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
                if(isset($_SESSION['user_data']['acct']['emp_no'])){
                    include("sidenav.php");
                }
            ?>
            <br>
            <br>
            <br>
			<div id="main" class="container-fluid">
				<?php
				echo '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header panel-primary">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="myModalLabel" style="color: black;">Log In</h4>
									</div>
									<form action="php/_login.php" method="POST">
										<div class="modal-body">';
												if(isset($_SESSION['namu'])) {
													$un = $mysqli->real_escape_string($_SESSION['namu']);
													echo '<input id="u" class="form-control" type="" name="u" placeholder="Username" required="" autofocus="" value="'.$un.'">';
												}
												else {
													echo '<input id="u" class="form-control" type="" name="u" placeholder="Username" required="" autofocus="">';
												}
												echo '<br>';
												if(isset($_SESSION['pasu'])) {
													$pw = $mysqli->real_escape_string($_SESSION['pasu']);
													echo '<input id="p" class="form-control" type="password" name="p" placeholder="Password" required="" value="'.$pw.'">';
												}
												else {
													echo '<input id="p" class="form-control" type="password" name="p" placeholder="Password" required="">';
												}
												if(isset($_SESSION['namu']) AND isset($_SESSION['pasu'])) {
													echo '<p id="pe" class="text-danger"><b>Username or Password is Incorrect</b></p>';
												}
										echo '</div>
										<div class="modal-footer">
											<div class="modal-group">
												<input type="submit" class="btn btn-primary pull-right" name="login" value="Log In"></input>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>';
						echo '<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
										<a href="php/_logout.php" class="btn btn-danger">Log Out</a>
									</div>
							</div>
						</div>     
					</div>';
						if(isset($_SESSION['msg']) AND $_SESSION['msg']=='error') {
							echo "<script>$('#myModal').modal('show');</script>";
							unset($_SESSION['msg']);
						}
						unset($_SESSION['namu']); unset($_SESSION['pasu']);
						if(isset($_SESSION['msg']) AND $_SESSION['msg']!='' AND $_SESSION['msg'] != NULL) {
							echo "<script>$('#msg').modal('show');</script>";
							echo $_SESSION['msg']='';
						}
						echo '<div class="w3-center">
					<section id="work"> 
						<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" class="">
							<ol class="carousel-indicators">';
								$proj_query="SELECT * FROM `cms_album` WHERE `gallery_type`='carousel';";
								$get_proj = $mysqli->query($proj_query);
								$proj = $get_proj->fetch_assoc();
								$idp = $proj['cms_album_ID'];
								$iname = $proj['cms_album_name'];
								$idesc = $proj['cms_album_desc'];
								$idate = $proj['cms_album_date_created'];
								$itime = $proj['cms_album_time_created'];  
								$getid = $idp;
								$img_query="SELECT * FROM `cms_image` WHERE `cms_album_ID`='$getid';";
								$get_img = $mysqli->query($img_query);
								$cnt=1;
								$num=$get_img->num_rows;
								for($i=0; $i<$num; ++$i) {
									if($i==0) {
										echo '<li data-target="#carousel-example-generic" data-slide-to="'.$i.'" class="active"></li>';
									}
									else {
										echo '<li data-target="#carousel-example-generic" data-slide-to="'.$i.'"></li>';
									}
								}
							echo '</ol>
							<div class="carousel-inner" role="listbox">';
								$proj_query="SELECT * FROM `cms_album` WHERE `gallery_type`='carousel';";
								$get_proj = $mysqli->query($proj_query);
								$proj = $get_proj->fetch_assoc();
								$idp = $proj['cms_album_ID'];
								$iname = $proj['cms_album_name'];
								$idesc = $proj['cms_album_desc'];
								$idate = $proj['cms_album_date_created'];
								$itime = $proj['cms_album_time_created'];
								$getid = $idp;
								$img_query="SELECT * FROM `cms_image` WHERE `cms_album_ID`='$getid';";
								$get_img = $mysqli->query($img_query);
								$cnt=1;
								$num=$get_img->num_rows;
								while($img = $get_img->fetch_assoc()) {
									$imgid = $img['cms_image_ID'];
									$id = $img['cms_album_ID'];
									$name = $img['cms_image_name'];
									$dir = $img['cms_image_dir'];
									$date = $img['cms_image_date'];
									if($cnt==1) {
										echo '<div class="item active">
												<img src="uploads/'.$dir.'/'.$name.'" alt="" height="200" class="img-responsive center-block">
												<div class="carousel-caption">
												</div>
											</div>'; 
									}
									else {
										echo '<div class="item">
												<img src="uploads/'.$dir.'/'.$name.'" alt="" height="200" class="img-responsive center-block">
												<div class="carousel-caption">
												</div>
											</div>';
									}
									++$cnt;
								}
							echo '</div>
							<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
								<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
								<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>
					</section>
				</div>';
			?>
			<hr>
			<ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li class="active">News</li>
			</ol>
			<div class="row">
				<div class="col-lg-8">
					<div class="w3-container w3-theme-bd5 w3-card-2">
						<center><h2>News</h2></center>
					</div>
					<br>
					<div class="row">
						<form action="admin/_Sub/ss_news_idx.php" method="GET">
											<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
												<input type="text" class="form-control" name="q" placeholder="Search" value=""/>
												<input type="hidden" name="page" value="<?php echo '1'; ?>">
											</div>
											<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
												<button type="submit" class="btn btn-primary form-control">Search</button>
											</div>
										</form>
					</div>
					<hr>
					<div class="row">
						<div class="col-lg-12 text-justify">
							<div class="panel panel-default">
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
									<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example2">
										<thead hidden="">
											<tr>
												<th hidden="" valign=""></th>
											</tr>
										</thead>
										<tbody>
										<?php
											if(isset($_GET['q'])) {
												if(isset($_GET['q'])) {
													$search = $mysqli->real_escape_string($_GET['q']);
													$news_query="SELECT * FROM `cms_news` WHERE `cms_title` LIKE '%$search%' OR `cms_news_description` LIKE '%$search%' OR `cms_news_date` LIKE '%$search%' ORDER BY `cms_news_date` DESC LIMIT ".$this_page_num_result.", ".$result_num.";";
													$get_news = $mysqli->query($news_query);
													if($get_news->num_rows > 0) {
														while($news = $get_news->fetch_assoc()) {
															$title = $news['cms_title'];
															$desc = $news['cms_news_description'];
															$date = $news['cms_news_date'];
															$id = $news['cms_news_ID'];
															$dir = $news['cms_news_img_dir'];
															echo '<tr>';
															echo '<td>
																	<div class="media">
																		<div class="media-left">
																			<a href="news_view.php?id='.base64_encode($id).'" id="mediatable">
																				<img class="media-object" src="uploads/'.$dir.'" alt="" height="64" width="64">
																			</a>
																		</div>
																		<div class="media-body">
																			<a href="news_view.php?id='.base64_encode($id).'" id="mediatable">
																				<h4 class="media-heading"><b>'.$title.'</b></h4>
																				'.substr(strip_tags($desc), 0, 250).'...'.'
																				</a>
																			</div>
																		</div>
																	</td>';
															echo '</tr>';
														}
													}
													else {
														echo '<tr>';
															echo '<td class="info">No Match Found.</td>';
															echo '</tr>';
													}
												}
												else {
													$news_query="SELECT * FROM `cms_news` ORDER BY `cms_news_date` DESC LIMIT ".$this_page_num_result.", ".$result_num.";";
													$get_news = $mysqli->query($news_query);
													if($get_news->num_rows > 0) {
														while($news = $get_news->fetch_assoc()) {
															$title = $news['cms_title'];
															$desc = $news['cms_news_description'];
															$date = $news['cms_news_date'];
															$id = $news['cms_news_ID'];
															$dir = $news['cms_news_img_dir'];
															echo '<tr>';
															echo '<td>
																	<div class="media">
																		<div class="media-left">
																			<a href="news_view.php?id='.base64_encode($id).'" id="mediatable">
																				<img class="media-object" src="uploads/'.$dir.'" alt="" height="64" width="64">
																			</a>
																		</div>
																		<div class="media-body">
																			<a href="news_view.php?id='.base64_encode($id).'" id="mediatable">
																				<h4 class="media-heading"><b>'.$title.'</b></h4>
																				'.substr(strip_tags($desc), 0, 250).'...'.'
																				</a>
																			</div>
																		</div>
																	</td>';
															echo '</tr>';
														}
													}
													else {
														echo '<tr>';
															echo '<td class="info">This content is currently not available.</td>';
															echo '</tr>';
													}
												}
											}
											else {
												$news_query="SELECT * FROM `cms_news` ORDER BY `cms_news_date` DESC LIMIT ".$this_page_num_result.", ".$result_num.";";
												$get_news = $mysqli->query($news_query);
												if($get_news->num_rows > 0) {
													while($news = $get_news->fetch_assoc()) {
														$title = $news['cms_title'];
														$desc = $news['cms_news_description'];
														$date = $news['cms_news_date'];
														$id = $news['cms_news_ID'];
														$dir = $news['cms_news_img_dir'];
														echo '<tr>';
														echo '<td>
																<div class="media">
																	<div class="media-left">
																		<a href="news_view.php?id='.base64_encode($id).'" id="mediatable">
																			<img class="media-object" src="uploads/'.$dir.'" alt="" height="64" width="64">
																		</a>
																	</div>
																	<div class="media-body">
																		<a href="news_view.php?id='.base64_encode($id).'" id="mediatable">
																			<h4 class="media-heading"><b>'.$title.'</b></h4>
																			'.substr(strip_tags($desc), 0, 80).'...'.'
																			</a>
																		</div>
																	</div>
																</td>';
														echo '</tr>';
													}
												}
												else {
													echo '<tr>';
														echo '<td class="info">No Content Available.</td>';
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
				</div>
				<div class="col-lg-4">
					<div class="row">
						<div class="col-lg-12">
							<?php
								$cont_query = "SELECT * FROM `cms_site_content` WHERE `cms_content_label` = 'calendar'";
								$get_cont = $mysqli->query($cont_query);
								while($cont = $get_cont->fetch_assoc()) {
									$get_content_link = $cont['cms_content_desc'];
								}
								echo '<div class="w3-container w3-theme-bd5 w3-card-2">
									<h3 class="text-center"><a href="calendar.php">School Calendar</a></h3>
								</div>
								<br>
								<div class="embed-responsive embed-responsive-4by3">
								<iframe src="'.$get_content_link.'" style="border: 0" width="315" height="300" frameborder="0" scrolling="no"></iframe>    
								</div>';
							?>
							<br>
							<?php
								$print_memo = '';
						$memo_query="SELECT * FROM `cms_memo` ORDER BY `cms_memo_date` DESC, `cms_memo_date_created` DESC, `cms_memo_time_created` DESC LIMIT 5;";
						$get_memo = $mysqli->query($memo_query);
						if($get_memo->num_rows > 0) {
							$set1_memo = true;
							$print_memo .= '<div class="w3-container w3-theme-bd5 w3-card-2">
							<h3 class="text-center"><a href="memo.php">Memo</a></h3>
						</div>
						<br>
						<div class="row">
							<div class="col-lg-12">
							<ul class="list-group">';
							$subj = $desc = $date = $recipient = $id = '';
							while($memo = $get_memo->fetch_assoc()) {
							$subj = $memo['cms_subject'];
							$desc = $memo['cms_memo_description'];
							$date = $memo['cms_memo_date'];
							$id = $memo['cms_memo_ID'];
							$dir = $memo['cms_memo_pdf_dir'];
							$img = $memo['cms_memo_img_dir'];
							$print_memo .= '<button class="list-group-item"><a id="cap_black" href="memo_view.php?id=';
							$print_memo .= base64_encode($id);
							$print_memo .= '"><b>';
							$print_memo .= $subj;
							$print_memo .='</b> - <small><i>';
							$print_memo .= dateFormat($date);
							$print_memo .= '</i></small></a></button>';
									}
							$print_memo .= '</ul>
							</div>
						</div>';
						}
						else {

						}
						if(isset($set1_memo) AND is_bool($set1_memo) AND $set1_memo==true) {
							echo $print_memo;
						}
						else {
							echo '<div class="w3-container w3-theme-bd5 w3-card-2">
									<h3 class="text-center"><a href="memo.php">Memo</a></h3>
								</div>
								<br>
								<div class="alert alert-info" role="alert">
									<a class="alert-link">This content is currently not available.</a>
								</div>';
						}
							?>
						</div>
					</div>
				</div>
			</div>
			<br>
		</div>
		<?php 
                include("footer.php");
            ?>
		<script src="js/_tmp/tmp/datatables/js/jquery.dataTables.min.js"></script>
		<script src="js/_tmp/tmp/datatables-plugins/dataTables.bootstrap.min.js"></script>
		<script src="js/_tmp/tmp/datatables-responsive/dataTables.responsive.js"></script>
		<script>
			$('#u').click(function() { $('#pe').hide(); });
			$('#p').click(function() { $('#pe').hide(); });
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