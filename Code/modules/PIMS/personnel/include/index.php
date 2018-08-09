<?php
	include("func.php");
	error_reporting(0);
    $_SESSION['hist'] = $_SERVER['REQUEST_URI'];
	if(isset($_SESSION['user_data'])) {
        if(isset($_SESSION['user_data']['acct']['lrn'])){
            $lrn=$_SESSION['user_data']['acct']['lrn'];
            $aid=$_SESSION['user_data']['acct']['cms_account_ID'];
            foreach(defineStudent($aid) as $key=>$val) {
                if($key=="css") { $css_priv=$val; }
                else if($key=="oes") { $oes_priv=$val; }
                else if($key=="scms") { $scms_priv=$val; }
                else if($key=="sis") { $sis_priv=$val; }
            }
        }else if(isset($_SESSION['user_data']['acct']['emp_no'])){
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
                else if($key=="job") { $job_title=$val; }
                else if($key=="emp_type") { $emp_type=$val; }
                else if($key=="user_type") { $user_type=$val; }
                else if($key=="css_admin") { $css_admin=$val; }
                else if($key=="dms1_admin") { $dms1_admin=$val; }
                else if($key=="dms2_admin") { $dms2_admin=$val; }
                else if($key=="ims_admin") { $ims_admin=$val; }
                else if($key=="ipcr1_admin") { $ipcr1_admin=$val; }
                else if($key=="ipcr2_admin") { $ipcr2_admin=$val; }
                else if($key=="pims1_admin") { $pims1_admin=$val; }
                else if($key=="pims2_admin") { $pims2_admin=$val; }
                else if($key=="pms1_admin") { $pms1_admin=$val; }
                else if($key=="pms2_admin") { $pms2_admin=$val; }
                else if($key=="oes_admin") { $oes_admin=$val; }
                else if($key=="prs1_admin") { $prs1_admin=$val; }
                else if($key=="prs2_admin") { $prs2_admin=$val; }
                else if($key=="scms1_admin") { $scms1_admin=$val; }
                else if($key=="scms2_admin") { $scms2_admin=$val; }
                else if($key=="sis_admin") { $sis_admin=$val; }
            }
        }
        
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<title>PNHS</title>
		<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/w3/w3.css">
		<link rel="stylesheet" href="docs/docs.min.css">
		<link rel="stylesheet" href="css/w3/blue.css">
		<link rel="stylesheet" href="css/w3/yellow.css">
<!--		<link rel="stylesheet" href="css/sideNav.css">-->
		<link rel="stylesheet" href="css/backToTop.css">
		<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css" type="text/css">
		<link rel="stylesheet" href="css/metisMenu.min.css" type="text/css">
		<link rel="shortcut icon" href="docs/img/pnhs_favicon.ico" type="image/x-icon">
		<link rel="icon" href="docs/img/pnhs_favicon.ico" type="image/x-icon">
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
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
			.w3-card-4, .w3-hover-shadow:hover {
				box-shadow: none;
			}
			.w3-card-4, .w3 hover-shadow:hover {
				box-shadow: none;
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
				font-size: 13px;
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

            <?php if(isset($_SESSION['user_data']['acct']['emp_no'])){ ?>
            #wrapper{
                padding-left: 14%!important;
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
            <div id="main" class="container">
			<?php
				//echo '<pre>'; 
				//echo var_export($_SESSION, true); echo '</pre>';
				echo '<div class="modal fade" id="msg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title"></h4>
									</div>
									<div class="modal-body">
										<h3 class="text-center">'; echo $_SESSION['msg']; echo '</h3>
									</div>
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
					$news_query="SELECT * FROM `cms_news` ORDER BY `cms_news_ID` DESC LIMIT 4;";
					$get_news = $mysqli->query($news_query);
					if($get_news->num_rows > 0) {
						$set1_news = true;
						echo '<div class="w3-container w3-theme-bd5 w3-card-2">
						<h3 class="text-center"><a href="news.php">News</a></h3>
					</div>
					<br>
					<div class="row">';
						while($news = $get_news->fetch_assoc()) {
							$title = $news['cms_title'];
							$desc = $news['cms_news_description'];
							$date = $news['cms_news_date'];
							$id = $news['cms_news_ID'];
							$dir = $news['cms_news_img_dir'];
							$auth = $news['cms_news_writer'];
							$print_news .= '<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
										<div class="thumbnail">';
							if(!empty($dir)) {
								$print_news .= '<img src="uploads/'.$dir.'" alt="" class="img-responsive center-block" style="height: 200px; width: auto;">';
							}
							$print_news .= '<div class="caption">
												<h4><b>'.$title.'</b></h4>';
							$print_news .= '<p><i>';
							if(!empty($auth)) {
								$print_news .= 'By: '.$auth.' ';
							}
							if(!empty($date)) {
								if(!empty($auth)) {
									$print_news .= '- ';
								}
								$print_news .= '<small>'.dateFormat($date).'</small>';
							}
							$print_news .= '</i></p>';
							$print_news .= '<p>'.substr(strip_tags($desc, '<p>'), 0, 300).'...'.'</p>
												<p>
													<a href="news_view.php?id='.$id.'" class="btn btn-xs btn-primary" role="button">See More</a>
													<!--
														<a href="news_view.php?id='.$id.'" class="btn btn-default" role="button">Button</a>
													-->
												</p>
											</div>
										</div>
									</div>';
						}
						$print_news .= '</div>';
					}
					else {

					}
					if(isset($set1_news) AND is_bool($set1_news) AND $set1_news==true) {
						echo $print_news;
					}
				?>
				</div>
				<div class="col-md-4">
					<?php
						$print_memo = '';
						$memo_query="SELECT * FROM `cms_memo` ORDER BY `cms_memo_date` DESC LIMIT 5;";
						$get_memo = $mysqli->query($memo_query);
						if($get_memo->num_rows > 0) {
							$set1_memo = true;
							$print_memo .= '<div class="w3-container w3-theme-bd5 w3-card-2">
							<h3 class="text-center"><a href="memo.php">Memo</a></h3>
						</div>
						<br>
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
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
							$print_memo .= $id;
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
								<div class="alert alert-danger" role="alert">
									<a href="#" class="alert-link">No content saved.</a>
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
								$print_documentation .= '<div class="thumbnail">';
								$print_documentation .= '<div id="'.$name.'" class="carousel slide" data-ride="carousel">';
								$print_documentation .= '<ol class="carousel-indicators">';
								for($i=0; $i<$num; ++$i) {
									if($i==0) {
										$print_documentation .= '<li data-target="#'.$name.'" data-slide-to="'.$i.'" class="active"></li>';
									}
									else {
										$print_documentation .= '<li data-target="#'.$name.'" data-slide-to="'.$i.'"></li>';
									}
								}
								$print_documentation .= '</ol>';
								$print_documentation .= '<div class="carousel-inner" role="listbox">';
								if($gallery_type == 'documentation') {
									$img_query="SELECT * FROM `cms_image` WHERE `cms_album_ID`='$id' LIMIT 5;";
									$get_img = $mysqli->query($img_query);
									if($get_img->num_rows > 0) {
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
																<img src="uploads/'.$dir2.'/'.$alb.'/'.$name2.'" alt="" class="img-responsive center-block" style="height: 200px; width: auto;">
																<div class="carousel-caption">
																</div>
															</div>'; 
											}
											else {
												$print_documentation .= '<div class="item">
																<img src="uploads/'.$dir2.'/'.$alb.'/'.$name2.'" alt="" class="img-responsive center-block" style="height: 200px; width: auto;">
																<div class="carousel-caption">
																</div>
															</div>';
											}
											++$cnt;
										}
									}
								}
								$print_documentation .= '</div>';
								$print_documentation .= '</div>';
								$print_documentation .= '<div class="caption">';
								$print_documentation .= '<h4><b>'.$name.'</b></h4>';
								$print_documentation .= '<p><i><small>'.dateFormat($date).'</small></i></p>';
								$print_documentation .= '<p>'.$desc.'</p>';
								$print_documentation .= '<a href="gallery_view.php?id='.$id.'" class="btn btn-xs btn-primary" role="button">View</a>';
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
								$print_principal .= '<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
								<div class="thumbnail">';
								while($img = $get_img->fetch_assoc()) {
									$dir = $img['cms_principal_img_dir'];
									$name = $img['cms_principal_name'];
									$print_principal .= '<img src="uploads/'.$dir.'" alt="" class="center-block">';
								}
								$print_principal .= '<div class="caption text-justify">';
								$cont_query = "SELECT * FROM `cms_site_content` WHERE `cms_content_label` = 'principal';";
								$get_cont = $mysqli->query($cont_query);
								if($get_cont->num_rows  > 0) {
									$set2_principal = true;
									while($cont = $get_cont->fetch_assoc()) {
										$insert = trim(substr(strip_tags($cont['cms_content_desc'], '<p></p>'), 0, 200)).'...';
									}
									$print_principal .= '<h4 class="text-center"><b>'.$name.'</b></h4>';
									//$print_principal .= '<h4 class="text-center"><b>'.$name.'</b></h4>';
									$print_principal .= '<p>'.$insert.'</p>
										</div>
										<div class="w3-container w3-theme-bd5 w3-card-2">
											<a href="principal.php"><h3 class="text-center">Principal\'s Corner</h3></a>
										</div>
									</div>
								</div>';
								}
							}
							if(isset($set1_principal) AND is_bool($set1_principal) AND $set1_principal==true) {
								if(isset($set2_principal) AND is_bool($set2_principal) AND $set2_principal==true) {
									echo $print_principal;
								}
							}

							$print_projects = '';
							$proj_query="SELECT * FROM `cms_album` WHERE `gallery_type`='project';";
							$get_proj = $mysqli->query($proj_query);
							if($get_proj->num_rows > 0) {
								$set1_projects = true;
								$print_projects .= '<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
							<div class="w3-container w3-theme-bd5 w3-card-2">
								<h3 class="text-center"><a href="projects.php">Projects</a></h3>
							</div>
							<br>
							<a href="projects.php">
							<div class="thumbnail">
							<div id="carousel-example-generic3" class="carousel slide" data-ride="carousel">
									<ol class="carousel-indicators">';
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
									for($i=0; $i<$num; ++$i) {
										if($i==0) {
											$print_projects .= '<li data-target="#carousel-example-generic" data-slide-to="'.$i.'" class="active"></li>';
										}
										else {
											$print_projects .= '<li data-target="#carousel-example-generic" data-slide-to="'.$i.'"></li>';
										}
									}
									$print_projects .= '</ol>
											<div class="carousel-inner" role="listbox">';
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
											echo '<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
													<div class="w3-container w3-theme-bd5 w3-card-2">
														<h3 class="text-center"><a href="projects.php">Projects</a></h3>
													</div>
													<br>
													<div class="alert alert-danger" role="alert">
														<a href="#" class="alert-link">No content saved.</a>
													</div>
												</div>';
										}
									}
									else {
										echo '<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
												<div class="w3-container w3-theme-bd5 w3-card-2">
													<h3 class="text-center"><a href="projects.php">Projects</a></h3>
												</div>
												<br>
												<div class="alert alert-danger" role="alert">
													<a href="#" class="alert-link">No content saved.</a>
												</div>
											</div>';
									}
								}
								else {
									echo '<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
											<div class="w3-container w3-theme-bd5 w3-card-2">
												<h3 class="text-center"><a href="projects.php">Projects</a></h3>
											</div>
											<br>
											<div class="alert alert-danger" role="alert">
												<a href="#" class="alert-link">No content saved.</a>
											</div>
										</div>';
								}
							}
							else {
								echo '<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
										<div class="w3-container w3-theme-bd5 w3-card-2">
											<h3 class="text-center"><a href="projects.php">Projects</a></h3>
										</div>
										<br>
										<div class="alert alert-danger" role="alert">
											<a href="#" class="alert-link">No content saved.</a>
										</div>
									</div>';
							}

						$link = "https://calendar.google.com/calendar/embed?src=4o0rdksh4farmaithk4v2pmr14%40group.calendar.google.com&ctz=Asia/Manila";
							echo '<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
							<div class="w3-container w3-theme-bd5 w3-card-2">
								<h3 class="text-center"><a href="calendar.php">School Calendar</a></h3>
							</div>
							<br>
							<div class="embed-responsive embed-responsive-4by3">
							<iframe src="'.$link.'" style="border: 0" width="315" height="300" frameborder="0" scrolling="no"></iframe>    
							</div>
						</div>';

							echo '<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
							<h3><strong>Total Visitors</strong></h3>
							<a href="https://smallseotools.com/visitor-hit-counter/" target="_blank" title="Web Counter">
								<img src="https://smallseotools.com/counterDisplay?code=dd18c4f2a42307be74ed009ef56db0a5&style=0006&pad=5&type=page&initCount=00000"  title="Web Counter" Alt="Web Counter" border="0">
							</a>
						</div>';

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
		
		
        
        <script src="js/alert.js"></script>
		<script src="js/slideshow.js"></script>
		<script src="js/back-To-Top.js"></script>
		<script src="js/side-Nav.js"></script>
		<script src="js/metisMenu.min.js"></script>
		<script src="js/sb-admin-2.min.js"></script>
		<script>
            $('#u').click(function() { $('#pe').hide(); });
			$('#p').click(function() { $('#pe').hide(); });
        	<?php
				if(isset($_SESSION['msg']) AND $_SESSION['msg']!='' AND $_SESSION['msg'] != NULL) {
					echo "$('#msg').modal('show');";
					echo $_SESSION['msg']='';
				}
			?>
        </script>
        <script type="text/javascript">
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