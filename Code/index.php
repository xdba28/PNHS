<?php
	date_default_timezone_set('Asia/Manila');
	include('func.php');
	include('php/connection.php');
	include('php/_Func.php');
	include('php/_Def.php');
	$_SESSION['hist'] = $_SERVER['REQUEST_URI'];

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
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<title>Homepage | PAG-ASA National High School</title>
		<meta name="description" content="Homepage | PAG-ASA National High School">
		<meta http-equiv="Content-Type" content="text/html">
		<meta http-equiv="content-language" content="en" />
	    <meta http-equiv="content-script-type" content="text/javascript" />
	    <meta http-equiv="content-style-type" content="text/css" />
	    <meta property="og:locale" content="en_US" />
		<meta property="og:type" content="website" />
		<meta property="og:title" content="Homepage | PAG-ASA National High School" />
		<meta property="og:site_name" content="Homepage | PAG-ASA National High School" />
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
			#calendar {
				max-width: 900px;
				margin: 0 auto;
				background: white;
			}
			td {
				height: 50px;
			}
			.today {
				background-color: rgba(42,101,149,100);
				color: white;
			}
			#login {
				cursor: pointer;
			}
			#black {
				color: black;
			}
			#cap_black:hover {
				color: black;
			}
			.navbar-header {
			    float: !important;
			    text-align: center!important;
			}
			a:focus, a:hover {
		        color: white;
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
				//echo '<pre>'; echo var_export($_SESSION, true); echo '</pre>';
				//echo '<pre>'; echo session_id(); echo '</pre>';
				//unset($_SESSION['p9bvmh5b2nt818fuckt12vtk02']);
				echo '<div class="modal fade" id="msg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title"></h4>
									</div>
									<div class="modal-body">';
										echo '<h3 class="text-center">'; echo $_SESSION['msg']; echo '</h3>';
										if(isset($_SESSION['flogin'])) {
											$sessionid = $_SESSION['user_data']['acct']['cms_account_ID'];
											$pdate = $ptime = $cdate = $ctime = NULL;
											$dt = $mysqli->query("SELECT * FROM `cms_account` WHERE `cms_account_ID` = '$sessionid' LIMIT 1;");
											if($dt->num_rows > 0) {
												$dtdata = $dt->fetch_assoc();
												if(!$pdate == '0000-00-00' AND !$ptime == '00:00:00') {
													$pdate = $dtdata['cms_prev_log_date'];
													$ptime = $dtdata['cms_prev_log_time'];
													$cdate = $dtdata['cms_current_log_date'];
													$ctime = $dtdata['cms_current_log_time'];
													$tttime = date("g:i A", strtotime($ptime));
													$dddate = dateFormat($pdate);
													echo '<br><p class="text-center">Your last log in was '.$dddate.' '.$tttime.'</p>';
												}
											}
											date_default_timezone_set('Asia/Manila');
											$ddate = date('Y-m-d');
											$ttime = date('h:i:s');
											$udt = $mysqli->query("UPDATE `cms_account` SET `cms_current_log_date` = '$ddate', `cms_current_log_time` = '$ttime', `cms_prev_log_date` = '$cdate', `cms_prev_log_time` = '$ctime' WHERE `cms_account`.`cms_account_ID` = '$sessionid';");
											unset($_SESSION['flogin']);
										}
									echo '</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
							</div>
						</div>     
					</div>';
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

				$print_header = '';
				$proj_query="SELECT * FROM `cms_album` WHERE `gallery_type`='carousel';";
				$get_proj = $mysqli->query($proj_query);
				if($get_proj->num_rows > 0) {
					$set1_header = true;
					$proj = $get_proj->fetch_assoc();
					$idp = $proj['cms_album_ID'];
					$iname = $proj['cms_album_name'];
					$idesc = $proj['cms_album_desc'];
					$idate = $proj['cms_album_date_created'];
					$itime = $proj['cms_album_time_created'];  
					$getid = $idp;
					$print_header .= '<div class="w3-center">
					<section id="work"> 
						<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" class="">
							<ol class="carousel-indicators">';
					$img_query="SELECT * FROM `cms_image` WHERE `cms_album_ID`='$getid';";
					$get_img = $mysqli->query($img_query);
					if($get_img->num_rows > 0) {
						$set2_header = true;
						$cnt=1;
						$num=$get_img->num_rows;
						for($i=0; $i<$num; ++$i) {
							if($i==0) {
								$print_header .= '<li data-target="#carousel-example-generic" data-slide-to="'.$i.'" class="active"></li>';
							}
							else {
								$print_header .= '<li data-target="#carousel-example-generic" data-slide-to="'.$i.'"></li>';
							}
						}
						$print_header .= '</ol>
									<div class="carousel-inner" role="listbox">';
						$proj_query="SELECT * FROM `cms_album` WHERE `gallery_type`='carousel';";
						$get_proj = $mysqli->query($proj_query);
						if($get_proj->num_rows > 0) {
							$set3_header = true;
							$proj = $get_proj->fetch_assoc();
							$idp = $proj['cms_album_ID'];
							$iname = $proj['cms_album_name'];
							$idesc = $proj['cms_album_desc'];
							$idate = $proj['cms_album_date_created'];
							$itime = $proj['cms_album_time_created'];
							$getid = $idp;
							$img_query="SELECT * FROM `cms_image` WHERE `cms_album_ID`='$getid';";
							$get_img = $mysqli->query($img_query);
							if($get_img->num_rows > 0) {
								$set4_header = true;
								$cnt=1;
								$num=$get_img->num_rows;
								while($img = $get_img->fetch_assoc()) {
									$imgid = $img['cms_image_ID'];
									$id = $img['cms_album_ID'];
									$name = $img['cms_image_name'];
									$dir = $img['cms_image_dir'];
									$date = $img['cms_image_date'];
									if($cnt==1) {
										$print_header .= '<div class="item active">
																<img src="uploads/'.$dir.'/'.$name.'" alt="" class="img-responsive center-block">
																<div class="carousel-caption">
																</div>
															</div>'; 
									}
									else {
										$print_header .= '<div class="item">
																<img src="uploads/'.$dir.'/'.$name.'" alt="" class="img-responsive center-block">
																<div class="carousel-caption">
																</div>
															</div>';
									}
									++$cnt;
								}
								$print_header .= '</div>
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
							}
							else {

							}
						}
						else {

						}
					}
					else {

					}
				}
				else {

				}
				if(isset($set1_header) AND is_bool($set1_header) AND $set1_header==true) {
					if(isset($set2_header) AND is_bool($set2_header) AND $set2_header==true) {
						if(isset($set3_header) AND is_bool($set3_header) AND $set3_header==true) {
							if(isset($set4_header) AND is_bool($set4_header) AND $set4_header==true) {
								echo $print_header;
							}
						}
					}
				}
			?>
			<hr>
			<div class="row">
				<div class="col-md-4">
				<?php
					$print_news = '';
					$news_query="SELECT * FROM `cms_news` ORDER BY `cms_news_date` DESC, `cms_news_date_created` DESC, `cms_news_time_created` DESC LIMIT 4;";
					$get_news = $mysqli->query($news_query);
					if($get_news->num_rows > 0) {
						$set1_news = true;
						echo '<div class="w3-container w3-theme-bd5 w3-card-2">
								<h3 class="text-center"><a href="news.php">News</a></h3>
							</div>
							<br>';
						while($news = $get_news->fetch_assoc()) {
							$title = $news['cms_title'];
							$desc = $news['cms_news_description'];
							$date = $news['cms_news_date'];
							$id = $news['cms_news_ID'];
							$dir = $news['cms_news_img_dir'];
							$auth = $news['cms_news_writer'];
							$print_news .= '<div class="row">
												<div class="col-lg-12">
													<div class="thumbnail">';
							$print_news .= '			<div class="row">';
							if(!empty($dir)) {
								$print_news .= '			<div class="col-xs-12 col-sm-6 col-lg-12">
																<br>
																<img src="uploads/'.$dir.'" alt="" class="img-responsive center-block" style="height: 200px; width: auto;">';
								$print_news .= '			</div>';
								$print_news .= '			<div class="col-xs-12 col-sm-6 col-lg-12">';
							}
							else {
								$print_news .= '			<div class="col-xs-12 col-sm-12 col-lg-12">';
								// $print_news .= '<div class="col-xs-12 col-sm-6 col-lg-12">';
								// $print_news .= '</div>';
							}
							$print_news .= '					<div class="caption">
																	<h4><b>'.$title.'</b></h4>';
							$print_news .= '					<p><i>';
							if(!empty($auth)) {
								$print_news .= '				By: '.$auth.' ';
							}
							if(!empty($date)) {
								if(!empty($auth)) {
									$print_news .= '- ';
								}
								$print_news .= '				<small>'.dateFormat($date).'</small>';
							}
							$print_news .= '					</i></p>';
							$print_news .= '					<p><small><i>'.trim(substr(strip_tags($desc), 0, 300)).'...'.'</i></small></p>';
							$print_news .= '					<p><a href="news_view.php?id='.base64_encode($id).'" class="btn btn-xs btn-primary" role="button">See More</a></p>
															</div>
														</div>
													</div>
												</div>
											</div>';
							$print_news .= '</div>';
						}
					}
					else {

					}
					if(isset($set1_news) AND is_bool($set1_news) AND $set1_news==true) {
						echo $print_news;
					}
					else {
							echo '<div class="w3-container w3-theme-bd5 w3-card-2">
									<h3 class="text-center"><a href="news.php">News</a></h3>
								</div>
								<br>
								<div class="alert alert-info" role="alert">
									<a class="alert-link">This content is currently not available.</a>
								</div>';
						}
				?>
				</div>
				<div class="col-md-4">
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


						$print_documentation = '';
						$doc_query="SELECT * FROM `cms_album` WHERE `gallery_type` = 'documentation' ORDER BY `cms_album_time_created` DESC LIMIT 5;";
						$get_doc = $mysqli->query($doc_query);
						if($get_doc->num_rows > 0) {
							$set1_documentation = true;
							$print_documentation .= '<div class="w3-container w3-theme-bd5 w3-card-2">
							<h3 class="text-center"><a href="gallery.php">Gallery</a></h3>
						</div>
						<br>';
							$cnt=1;
							$num=$get_doc->num_rows;
							$id = $name = $desc = $gallery_type = $date = $time = '';
							while($doc = $get_doc->fetch_assoc()) {
								$id = $doc['cms_album_ID'];
								$name = $doc['cms_album_name'];
								$desc = $doc['cms_album_desc'];
								$gallery_type = $doc['gallery_type'];
								$date = $doc['cms_album_date_created'];
								$time = $doc['cms_album_time_created'];
								$album_name = $doc['cms_album_folder'];
								$print_documentation .= '<div class="thumbnail">';
								$print_documentation .= '<br><div id="'.$name.'" class="carousel slide" data-ride="carousel">';
								// $print_documentation .= '<ol class="carousel-indicators">';
								// for($i=0; $i<$num; ++$i) {
								// 	if($i==0) {
								// 		$print_documentation .= '<li data-target="#'.$name.'" data-slide-to="'.$i.'" class="active"></li>';
								// 	}
								// 	else {
								// 		$print_documentation .= '<li data-target="#'.$name.'" data-slide-to="'.$i.'"></li>';
								// 	}
								// }
								// $print_documentation .= '</ol>';
								$print_documentation .= '<div class="carousel-inner" role="listbox">';
								if($gallery_type == 'documentation') {
									$img_query="SELECT * FROM `cms_image` WHERE `cms_album_ID`='$id' LIMIT 5;";
									$get_img = $mysqli->query($img_query);
									//if($get_img->num_rows > 0) {
										$set2_documentation = true;
										$cnt=1;
										$num=$get_img->num_rows;
										while($img = $get_img->fetch_assoc()) {
											$imgid = $img['cms_image_ID'];
											$id2 = $img['cms_album_ID'];
											$name2 = $img['cms_image_name'];
											$dir2 = $img['cms_image_dir'];
											$date2 = $img['cms_image_date'];
											$alb = $img['cms_album_name'];
											if($cnt==1) {
												$print_documentation .= '<div class="item active">
																<img src="uploads/docu/'.$album_name.'/'.$name2.'" alt="" class="img-responsive center-block" style="height: 200px; width: auto;">
																<div class="carousel-caption">
																</div>
															</div>'; 
											}
											else {
												$print_documentation .= '<div class="item">
																<img src="uploads/docu/'.$album_name.'/'.$name2.'" alt="" class="img-responsive center-block" style="height: 200px; width: auto;">
																<div class="carousel-caption">
																</div>
															</div>';
											}
											++$cnt;
										}
									//}
								}
								$print_documentation .= '</div>';
								$print_documentation .= '</div>';
								$print_documentation .= '<div class="caption text-center">';
								$print_documentation .= '<h4><b>'.$name.'</b></h4>';
								$print_documentation .= '<p><i><small>'.dateFormat($date).'</small></i></p>';
								$print_documentation .= '<p><i><small>'.$desc.'</small></i></p>';
								$print_documentation .= '<a href="gallery_view.php?id='.base64_encode($id).'" class="btn btn-xs btn-primary" role="button">View</a>';
								$print_documentation .= '</div>';
								$print_documentation .= '</div>';
								if(fmod($cnt, 2)==0) {
									$print_documentation .= '';
								}
							}
						}
						if(isset($set1_documentation) AND is_bool($set1_documentation) AND $set1_documentation==true) {
						 	if(isset($set2_documentation) AND is_bool($set2_documentation) AND $set2_documentation==true) {
						 		echo $print_documentation;
						 	}
						 	else {
						 		echo '<div class="w3-container w3-theme-bd5 w3-card-2">
							<h3 class="text-center"><a href="gallery.php">Gallery</a></h3>
						</div>
						<br><div class="alert alert-info" role="alert">
									<a class="alert-link">This content is currently not available.</a>
								</div>';
						 	}
						}
						else {
							echo '<div class="w3-container w3-theme-bd5 w3-card-2">
							<h3 class="text-center"><a href="gallery.php">Gallery</a></h3>
						</div>
						<br><div class="alert alert-info" role="alert">
									<a class="alert-link">This content is currently not available.</a>
								</div>';
						}
					?>
				</div>
				<div class="col-md-4">
					<div class="row">
						<?php
							$print_principal = '';
							$img_query="SELECT * FROM `cms_principal` WHERE `cms_principal_ID` = 1 LIMIT 1;";
							$get_img = $mysqli->query($img_query);
							if($get_img->num_rows > 0) {
								$set1_principal = true;
								$print_principal .= '<div class="col-lg-12">
														<div class="thumbnail">
														<div class="row">';
								while($img = $get_img->fetch_assoc()) {
									$dir = $img['cms_principal_img_dir'];
									$name = $img['cms_principal_name'];
									$rank = $img['cms_principal_rank'];
									$cont = $img['cms_principal_content'];
									if(!empty($dir)) {
										$print_principal .= '<div class="col-xs-12 col-sm-6 col-lg-12">';
										$print_principal .= '<br><img src="uploads/'.$dir.'" class="center-block" style="height: 200px; width: auto;">';
										$print_principal .= '</div>';
									}
									if(!empty($name) OR !empty($rank) OR !empty($cont) OR !empty($dir)) {
										$print_principal .= '<div class="col-xs-12 col-sm-6 col-lg-12">
																<div class="caption text-justify">';
									}
									$insert = '<small><i>'.trim(substr(strip_tags($cont, '<p></p>'), 0, 200)).'...'.'</i></small>';
									if(!empty($name)) {
										$print_principal .= '<br><h4 class="text-center"><b>'.$name.'</b></h4>';
									}
									if(!empty($rank)) {
										$print_principal .= '<p class="text-center">'.$rank.'</p>';
									}
									//$print_principal .= '<h4 class="text-center"><b>'.$name.'</b></h4>';
									if(!empty($cont)) {
										$print_principal .= '<p>'.$insert.'</p>';
									}
									if(!empty($name) OR !empty($rank) OR !empty($cont) OR !empty($dir)) {
										$print_principal .= '</div>
															</div>';
									}
									$print_principal .= '</div>
														<div class="w3-container w3-theme-bd5 w3-card-2">
															<a href="principal.php"><h3 class="text-center">Principal\'s Corner</h3></a>
														</div>
														</div>
													</div>';
								}
							}
							if(isset($set1_principal) AND is_bool($set1_principal) AND $set1_principal==true) {
								echo $print_principal;
							}
							else {
								echo '<div class="col-lg-12">
								<div class="w3-container w3-theme-bd5 w3-card-2">
															<a href="principal.php"><h3 class="text-center">Principal\'s Corner</h3></a>
														</div><br><div class="alert alert-info" role="alert">
									<a class="alert-link">This content is currently not available.</a>
								</div></div>';
							}

							$print_projects = '';
							$proj_query="SELECT * FROM `cms_album` WHERE `gallery_type`='project';";
							$get_proj = $mysqli->query($proj_query);
							if($get_proj->num_rows > 0) {
								$set1_projects = true;
								$print_projects .= '<div class="col-lg-12">
							<div class="w3-container w3-theme-bd5 w3-card-2">
								<h3 class="text-center"><a href="projects.php">Projects</a></h3>
							</div>
							<br>
							<a href="projects.php">
							<div class="thumbnail">
							<div id="carousel-example-generic3" class="carousel slide" data-ride="carousel">';
								$proj = $get_proj->fetch_assoc();
								$idp = $proj['cms_album_ID'];
								$iname = $proj['cms_album_name'];
								$idesc = $proj['cms_album_desc'];
								$idate = $proj['cms_album_date_created'];
								$itime = $proj['cms_album_time_created'];          
								$getid = $idp;
								$img_query="SELECT * FROM `cms_image` WHERE `cms_album_ID`='$getid';";
								$get_img = $mysqli->query($img_query);
								if($get_img->num_rows > 0) {
									$set2_projects = true;
									$cnt=1;
									$num=$get_img->num_rows;
									// $print_projects .= '<ol class="carousel-indicators">';
									// for($i=0; $i<$num; ++$i) {
									// 	if($i==0) {
									// 		$print_projects .= '<li data-target="#carousel-example-generic" data-slide-to="'.$i.'" class="active"></li>';
									// 	}
									// 	else {
									// 		$print_projects .= '<li data-target="#carousel-example-generic" data-slide-to="'.$i.'"></li>';
									// 	}
									// }
									// $print_projects .= '</ol>';
									$print_projects .= '<div class="carousel-inner" role="listbox">';
									$proj_query="SELECT * FROM `cms_album` WHERE `gallery_type`='project';";
									$get_proj = $mysqli->query($proj_query);
									if($get_proj->num_rows > 0) {
										$set3_projects = true;
										$proj = $get_proj->fetch_assoc();
										$idp = $proj['cms_album_ID'];
										$iname = $proj['cms_album_name'];
										$idesc = $proj['cms_album_desc'];
										$idate = $proj['cms_album_date_created'];
										$itime = $proj['cms_album_time_created'];
										$getid = $idp;
										$img_query="SELECT * FROM `cms_image` WHERE `cms_album_ID`='$getid';";
										$get_img = $mysqli->query($img_query);
										if($get_img->num_rows > 0) {
											$set4_projects = true;
											$cnt=1;
											$num=$get_img->num_rows;
											while($img = $get_img->fetch_assoc()) {
												$imgid = $img['cms_image_ID'];
												$id = $img['cms_album_ID'];
												$name = $img['cms_image_name'];
												$dir = $img['cms_image_dir'];
												$date = $img['cms_image_date'];
												if($cnt==1) {
													$print_projects .= '<div class="item active">
																					<img src="uploads/'.$dir.'/'.$name.'" alt="" class="img-responsive center-block">
																					<div class="carousel-caption">
																					</div>
																				</div>';
												}
												else {
													$print_projects .= '<div class="item">
																					<img src="uploads/'.$dir.'/'.$name.'" alt="" class="img-responsive center-block">
																					<div class="carousel-caption">
																					</div>
																				</div>';
												}
												++$cnt;
											}
											$print_projects .= '</div>
													</div>
												</div>
											</a>
										</div>';
										}
									}
								}
							}
							if(isset($set1_projects) AND is_bool($set1_projects) AND $set1_projects==true) {
								if(isset($set2_projects) AND is_bool($set2_projects) AND $set2_projects==true) {
									if(isset($set3_projects) AND is_bool($set3_projects) AND $set3_projects==true) {
										if(isset($set4_projects) AND is_bool($set4_projects) AND $set4_projects==true) {
											echo $print_projects;
										}
										else {
											echo '<div class="col-lg-12">
													<div class="w3-container w3-theme-bd5 w3-card-2">
														<h3 class="text-center"><a href="projects.php">Projects</a></h3>
													</div>
													<br>
													<div class="alert alert-info" role="alert">
									<a class="alert-link">This content is currently not available.</a>
								</div>
												</div>';
										}
									}
									else {
										echo '<div class="col-lg-12">
												<div class="w3-container w3-theme-bd5 w3-card-2">
													<h3 class="text-center"><a href="projects.php">Projects</a></h3>
												</div>
												<br>
												<div class="alert alert-info" role="alert">
									<a class="alert-link">This content is currently not available.</a>
								</div>
											</div>';
									}
								}
								else {
									echo '<div class="col-lg-12">
											<div class="w3-container w3-theme-bd5 w3-card-2">
												<h3 class="text-center"><a href="projects.php">Projects</a></h3>
											</div>
											<br>
											<div class="alert alert-info" role="alert">
									<a class="alert-link">This content is currently not available.</a>
								</div>
										</div>';
								}
							}
							else {
								echo '<div class="col-lg-12">
										<div class="w3-container w3-theme-bd5 w3-card-2">
											<h3 class="text-center"><a href="projects.php">Projects</a></h3>
										</div>
										<br>
										<div class="alert alert-info" role="alert">
									<a class="alert-link">This content is currently not available.</a>
								</div>
									</div>';
							}

						//$link = "https://calendar.google.com/calendar/embed?src=4o0rdksh4farmaithk4v2pmr14%40group.calendar.google.com&ctz=Asia/Manila";
							$cont_query = "SELECT * FROM `cms_site_content` WHERE `cms_content_label` = 'calendar'";
							$get_cont = $mysqli->query($cont_query);
							while($cont = $get_cont->fetch_assoc()) {
								$get_content_link = $cont['cms_content_desc'];
							}
							echo '<div class="col-lg-12">
							<div class="w3-container w3-theme-bd5 w3-card-2">
								<h3 class="text-center"><a href="calendar.php">School Calendar</a></h3>
							</div>
							<br>
							<div class="embed-responsive embed-responsive-4by3">
							<iframe src="'.$get_content_link.'" style="border: 0" width="315" height="300" frameborder="0" scrolling="no"></iframe>    
							</div>
							</div>';

							echo '<br><div class="col-lg-12">';
							echo '<h3><strong>Total Visitors</strong></h3>';
							if(!isset($_COOKIE['visitor'])) {
								setcookie('visitor', 'ilovepnhs', time() + (10 * 365 * 24 * 60 * 60));
								$updateQuery = "UPDATE `cms_viewcount` SET `cms_viewcount_views` = `cms_viewcount_views`+1 WHERE `cms_viewcount_page` = 'index'";
								$upq = $mysqli->query($updateQuery);
							}
							$getQuery = $mysqli->query("SELECT * FROM `cms_viewcount` WHERE `cms_viewcount_page` = 'index' LIMIT 1;");
							$fetchQuery = $getQuery->fetch_assoc();
							echo '<p><b>'.$fetchQuery['cms_viewcount_views'].'</b></p>';
							// echo '<h3><strong>Total Visitors</strong></h3>
							// <a href="https://smallseotools.com/visitor-hit-counter/" target="_blank" title="Web Counter">
							// 	<img src="https://smallseotools.com/counterDisplay?code=dd18c4f2a42307be74ed009ef56db0a5&style=0006&pad=5&type=page&initCount=00000"  title="Web Counter" Alt="Web Counter" border="0">
							//  </a>';
						echo '</div>';

						?>
						<br>
						<div class="col-lg-12">
							<h3><strong>Rate this Site!!!</strong></h3>
							<div class="rw-ui-container"></div>
						</div>
					</div>
				</div>
			</div>
			<?php
			?>
			<br>
		</div>
            <?php 
                include("footer.php");
            ?>
        </div>
		<script>
            $('#u').click(function() { $('#pe').hide(); });
			$('#p').click(function() { $('#pe').hide(); });

			(function(d, t, e, m){
		    // Async Rating-Widget initialization.
		    window.RW_Async_Init = function(){
		                
		        RW.init({
		            huid: "386764",
		            uid: "c1e185b220307d39cd40569480adf017",
		            source: "website",
		            options: {
		                "advanced": {
		                    "layout": {
		                        "lineHeight": "16px"
		                    },
		                    "font": {
		                        "hover": {
		                            "color": "#3C68BB"
		                        },
		                        "size": "11px",
		                        "color": "#3C68BB",
		                        "type": "arial"
		                    }
		                },
		                "size": "medium",
		                "label": {
		                    "background": "#B6C3DB"
		                },
		                "style": "crystal",
		                "isDummy": false
		            } 
		        });
		        RW.render();
		    };
		        // Append Rating-Widget JavaScript library.
		    var rw, s = d.getElementsByTagName(e)[0], id = "rw-js",
		        l = d.location, ck = "Y" + t.getFullYear() + 
		        "M" + t.getMonth() + "D" + t.getDate(), p = l.protocol,
		        f = ((l.search.indexOf("DBG=") > -1) ? "" : ".min"),
		        a = ("https:" == p ? "secure." + m + "js/" : "js." + m);
		    if (d.getElementById(id)) return;              
		    rw = d.createElement(e);
		    rw.id = id; rw.async = true; rw.type = "text/javascript";
		    rw.src = p + "//" + a + "external" + f + ".js?ck=" + ck;
		    s.parentNode.insertBefore(rw, s);
		    }(document, new Date(), "script", "rating-widget.com/"));
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