<?php
	class Content {
		public function __construct() {

		}
		public function __get($name) {
			if(is_string($name)) {
				if(property_exists($this, $name)) {
					return $this->$name;
				}
			}
			else {
				trigger_error("Class: Content; Function: __get; Error: Arg not String;<br>");
			}
		}
		public function __set($var, $val) {
			switch ($var) {

				default: trigger_error("Unknown Attribute<br>"); break;
			}
		}
		public function displayNavbar() {
			//$out = array();
			echo '<nav class="navbar navbar-default nav-color w3-theme-bd5 w3-card-4">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand nav-color-text" href="index.php">
							<img id="nav-logo" src="docs/img/pnhs_logo 2.png">
						</a>
					</div>
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-left">
						</ul>
						<ul class="nav navbar-nav navbar-left">
							<li><a href="index.php">Home</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> About Us <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="history.php">History</a></li>
									<li><a href="vision_and_mission.php">Vision & Mission</a></li>
									<li><a href="hymn.php">PNHS Hymn</a></li>
									<li><a href="achievements.php">Achievements</a></li>
									<li><a href="gpta.php">PNHS GPTA Officers</a></li>
									<li><a href="map.php">Location and Campus Map</a></li>
									<li><a href="orgchart.php">Organizational Chart</a></li>
									<li ><a href="acknowledgement.php">Acknowledgement</a></li>
								</ul>
							</li>
						</ul>
						<ul class="nav navbar-nav navbar-left">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Programs <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="hs.php">High School</a></li>
									<li><a href="shs.php">Senior High School</a></li>
								</ul>
							</li>
						</ul>
						<ul class="nav navbar-nav navbar-left">
							 <li> <a href="sp.php"><span> School Progress </span></a></li>
						</ul>
						<ul class="nav navbar-nav navbar-left">
							<li><a href="contact.php">Feedback</a></li>
						</ul>
						<ul id="login" class="nav navbar-nav navbar-right">
							<li data-toggle="modal" data-target="#myModal">
								<a>Log In</a>
							</li> 
						</ul>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
			<hr class="w3-theme-yd2" style="height:3px; border:0; margin-top:0px; margin-bottom:0px;">
			<hr class="w3-theme-bd2" style="height:3px; border:0; margin-top:0px; margin-bottom:0px;">';
		}
		public function displayBackToTop() {
			echo '<a id="back-to-top" href="#" class="w3-circle w3-card-4" data-placement="left">
				<span class="glyphicon glyphicon-chevron-up"></span>
			</a>';
		}
		public function displayCarousel($cms) {
			if(is_object($cms)) {
				echo '<div class="w3-center">
					<section id="work"> 
						<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" class="">
							<ol class="carousel-indicators">';
								$proj_query="SELECT * FROM `cms_album` WHERE `gallery_type`='carousel';";
								$get_proj = $cms->__get("mysqli")->query($proj_query);
								$proj = $get_proj->fetch_assoc();
								$idp = $proj['cms_album_ID'];
								$iname = $proj['cms_album_name'];
								$idesc = $proj['cms_album_desc'];
								$idate = $proj['cms_album_date_created'];
								$itime = $proj['cms_album_time_created'];  
								$getid = $idp;
								$img_query="SELECT * FROM `cms_image` WHERE `cms_album_ID`='$getid';";
								$get_img = $cms->__get("mysqli")->query($img_query);
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
								$get_proj = $cms->__get("mysqli")->query($proj_query);
								$proj = $get_proj->fetch_assoc();
								$idp = $proj['cms_album_ID'];
								$iname = $proj['cms_album_name'];
								$idesc = $proj['cms_album_desc'];
								$idate = $proj['cms_album_date_created'];
								$itime = $proj['cms_album_time_created'];
								$getid = $idp;
								$img_query="SELECT * FROM `cms_image` WHERE `cms_album_ID`='$getid';";
								$get_img = $cms->__get("mysqli")->query($img_query);
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
												<img src="'.$dir.'" alt="" height="200" class="img-responsive center-block">
												<div class="carousel-caption">
												</div>
											</div>'; 
									}
									else {
										echo '<div class="item">
												<img src="'.$dir.'" alt="" height="200" class="img-responsive center-block">
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
			}
		}
		public function displayNews($cms) {
			echo '<div class="w3-container w3-theme-bd5 w3-card-2">
						<h3 class="text-center"><a href="news.php">News</a></h3>
					</div>
					<br>
					<div class="row">';
						$news_query="SELECT * FROM `cms_news` ORDER BY `cms_news_ID` DESC LIMIT 4;";
						$get_news = $cms->__get("mysqli")->query($news_query);
						while($news = $get_news->fetch_assoc()) {
							$title = $news['cms_title'];
							$desc = $news['cms_news_description'];
							$date = $news['cms_news_date'];
							$id = $news['cms_news_ID'];
							$dir = $news['cms_news_img_dir'];
							$auth = $news['cms_news_writer'];
							echo '<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
									<div class="thumbnail">
										<img src="'.$dir.'" alt="" class="img-responsive center-block">
										<div class="caption">
											<h4><b>'.$title.'</b></h4>';
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
											echo '<p>
												'.substr(strip_tags($desc, '<p>'), 0, 300).'...'.'
											</p>
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
					echo '</div>';
		}
		public function displayMemo($cms) {
			echo '<div class="w3-container w3-theme-bd5 w3-card-2">
						<h3 class="text-center"><a href="memo.php">Memo</a></h3>
					</div>
					<br>
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
							<div class="thumbnail">';
								$subj = $desc = $date = $recipient = $id = '';
								$memo_query="SELECT * FROM `cms_memo` ORDER BY `cms_memo_date` DESC LIMIT 1;";
								$get_memo = $cms->__get("mysqli")->query($memo_query);
								while($memo = $get_memo->fetch_assoc()) {
									$subj = $memo['cms_subject'];
									$desc = $memo['cms_memo_description'];
									$date = $memo['cms_memo_date'];
									$recipient = $memo['cms_recipient'];
									$id = $memo['cms_memo_ID'];
									$dir = $memo['cms_memo_pdf_dir'];
									$img = $memo['cms_memo_img_dir'];
								}
								echo '
								<div class="caption">
									<div class="row">
										<div class="col-lg-6">
											<a id="cap_black" href="memo_view.php?id=';
											echo $id; 
											echo '">
											<h6 class="pull-left"><b>';
											echo $subj;
											echo'</b></h6></a>
										</div>
										<div class="col-lg-6">
											<h6 class="pull-right">';
											echo dateFormat($date);
											echo '</h6>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>';
		}
		public function displayGallery($cms) {
			echo '<div class="w3-container w3-theme-bd5 w3-card-2">
						<h3 class="text-center"><a href="gallery.php">Gallery</a></h3>
					</div>
					<br>';
						$doc_query="SELECT * FROM `cms_album` WHERE `gallery_type` = 'documentation' ORDER BY `cms_album_time_created` DESC LIMIT 5;";
						$get_doc = $cms->__get("mysqli")->query($doc_query);
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
							echo '<div class="thumbnail">';
							echo '<div id="'.$name.'" class="carousel slide" data-ride="carousel">';
							echo '<ol class="carousel-indicators">';
							for($i=0; $i<$num; ++$i) {
								if($i==0) {
									echo '<li data-target="#'.$name.'" data-slide-to="'.$i.'" class="active"></li>';
								}
								else {
									echo '<li data-target="#'.$name.'" data-slide-to="'.$i.'"></li>';
								}
							}
							echo '</ol>';
							echo '<div class="carousel-inner" role="listbox">';
							if($gallery_type == 'documentation') {
								$img_query="SELECT * FROM `cms_image` WHERE `cms_album_ID`='$id' LIMIT 5;";
								$get_img = $cms->__get("mysqli")->query($img_query);
								$cnt=1;
								$num=$get_img->num_rows;
								while($img = $get_img->fetch_assoc()) {
									$imgid = $img['cms_image_ID'];
									$id2 = $img['cms_album_ID'];
									$name2 = $img['cms_image_name'];
									$dir2 = $img['cms_image_dir'];
									$date2 = $img['cms_image_date'];
									if($cnt==1) {
										echo '<div class="item active">
														<img src="'.$dir2.'" alt="" class="img-responsive center-block">
														<div class="carousel-caption">
														</div>
													</div>'; 
									}
									else {
										echo '<div class="item">
														<img src="'.$dir2.'" alt="" class="img-responsive center-block">
														<div class="carousel-caption">
														</div>
													</div>';
									}
									++$cnt;
								}
							}
							echo '</div>';
							echo '</div>';
							echo '<div class="caption">';
							echo '<h4><b>'.$name.'</b></h4>';
							echo '<p><i>'.dateFormat($date).'</i></p>';
							echo '<p>'.$desc.'</p>';
							echo '<a href="gallery_view.php?id='.$id.'" class="btn btn-xs btn-primary" role="button">View</a>';
							echo '</div>';
							echo '</div>';
							if(fmod($cnt, 2)==0) {
								echo '<br>';
							}
						}
		}
		public function displayPrincipal($cms) {
			echo '<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
							<div class="thumbnail">';
									$proj_query="SELECT * FROM `cms_album` WHERE `gallery_type`='principal';";
									$get_proj = $cms->__get("mysqli")->query($proj_query);
									$proj = $get_proj->fetch_assoc();
									$idp = $proj['cms_album_ID'];
									$iname = $proj['cms_album_name'];
									$idesc = $proj['cms_album_desc'];
									$idate = $proj['cms_album_date_created'];
									$itime = $proj['cms_album_time_created'];
									$getid = $idp;
									$img_query="SELECT * FROM `cms_image` WHERE `cms_album_ID`='$getid';";
									$get_img = $cms->__get("mysqli")->query($img_query);
									$num=$get_img->num_rows;
									$img = $get_img->fetch_assoc();
									$imgid = $img['cms_image_ID'];
									$id = $img['cms_album_ID'];
									$name = $img['cms_image_name'];
									$dir = $img['cms_image_dir'];
									$date = $img['cms_image_date'];
									echo '<img src="'.$dir.'" alt="" class="center-block">';
								echo '<br>
								<div class="caption text-justify">';
									$cont_query = "SELECT * FROM `cms_site_content` WHERE `cms_content_label` = 'principal';";
									$get_cont = $cms->__get("mysqli")->query($cont_query);
									while($cont = $get_cont->fetch_assoc()) {
										$insert = trim(substr(strip_tags($cont['cms_content_desc'], '<p></p>'), 0, 200)).'...';
									}
								echo '<p>'.$insert.'</p>
								</div>
								<div class="w3-container w3-theme-bd5 w3-card-2">
									<a href="principal.php"><h3 class="text-center">Principal\'s Corner</h3></a>
								</div>
							</div>
						</div>';
		}
		public function displayProject($cms) {
			echo '<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
							<div class="w3-container w3-theme-bd5 w3-card-2">
								<h3 class="text-center"><a href="projects.php">Projects</a></h3>
							</div>
							<br>
							<a href="projects.php">
							<div class="thumbnail">
								<br>
								<div id="carousel-example-generic3" class="carousel slide" data-ride="carousel">
									<ol class="carousel-indicators">';
											$proj_query="SELECT * FROM `cms_album` WHERE `gallery_type`='project';";
											$get_proj = $cms->__get("mysqli")->query($proj_query);
											$proj = $get_proj->fetch_assoc();
											$idp = $proj['cms_album_ID'];
											$iname = $proj['cms_album_name'];
											$idesc = $proj['cms_album_desc'];
											$idate = $proj['cms_album_date_created'];
											$itime = $proj['cms_album_time_created'];          
											$getid = $idp;
											$img_query="SELECT * FROM `cms_image` WHERE `cms_album_ID`='$getid';";
											$get_img = $cms->__get("mysqli")->query($img_query);
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
											$proj_query="SELECT * FROM `cms_album` WHERE `gallery_type`='project';";
											$get_proj = $cms->__get("mysqli")->query($proj_query);
											$proj = $get_proj->fetch_assoc();
											$idp = $proj['cms_album_ID'];
											$iname = $proj['cms_album_name'];
											$idesc = $proj['cms_album_desc'];
											$idate = $proj['cms_album_date_created'];
											$itime = $proj['cms_album_time_created'];
											$getid = $idp;
											$img_query="SELECT * FROM `cms_image` WHERE `cms_album_ID`='$getid';";
											$get_img = $cms->__get("mysqli")->query($img_query);
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
																	<img src="'.$dir.'" alt="" class="img-responsive center-block">
																	<div class="carousel-caption">
																	</div>
																</div>'; 
												}
												else {
													echo '<div class="item">
																	<img src="'.$dir.'" alt="" class="img-responsive center-block">
																	<div class="carousel-caption">
																	</div>
																</div>';
												}
												++$cnt;
											}
										echo '</div>
									</div>
								</div>
							</a>
						</div>';
		}
		public function displayCalendar($link) {
			echo '<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
							<div class="w3-container w3-theme-bd5 w3-card-2">
								<h3 class="text-center"><a href="calendar.php">School Calendar</a></h3>
							</div>
							<br>
							<div class="embed-responsive embed-responsive-4by3">
							<iframe src="'.$link.'" style="border: 0" width="315" height="300" frameborder="0" scrolling="no"></iframe>    
							</div>
						</div>';
		}
		public function displayCounter() {
			echo '<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
							<h3><strong>Total Visitors</strong></h3>
							<a href="https://smallseotools.com/visitor-hit-counter/" target="_blank" title="Web Counter">
								<img src="https://smallseotools.com/counterDisplay?code=dd18c4f2a42307be74ed009ef56db0a5&style=0006&pad=5&type=page&initCount=00000"  title="Web Counter" Alt="Web Counter" border="0">
							</a>
						</div>';
		}
		public function displayFooter() {
			echo '<nav class="navbar navbar-default nav-color w3-theme-bd5 w3-card-4">
				<div class="container-fluid">
					<div class="row">
						<br>
						<div class="col-lg-4">
							<img class="img-responsive" src="docs/img/pnhs_logo 2.png">
						</div>
						<div class="col-lg-4">
							<center> <p> Pag-Asa National High School &reg; </p></center>
							<center> <p> &copy; PNHS, All rights reserved 2017 </p></center>
							<center> <p><a href="PNHS@gmail.com">Pag-AsaNationalHighSchool@gmail.com</a></p></center>
						</div>
						<div class="col-lg-4">
						</div>
						<br>
					</div>
					<br>
			</nav>';
		}
		public function displayModalLogIn() {
			echo '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header panel-primary">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="myModalLabel" style="color: black;">Log In</h4>
									</div>
									<form action="_login.php" method="POST">
										<div class="modal-body">
												<input class="form-control" type="" name="u" placeholder="Username" required="" autofocus="">
												<br>
												<input class="form-control" type="password" name="p" placeholder="Password" required="">
										</div>
										<div class="modal-footer">
											<div class="modal-group">
												<input type="submit" class="btn btn-primary pull-right" name="login" value="Log In"></input>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>';
		}
	}
?>