<!DOCTYPE html>
<html lang="en" >
    <?php
    include_once('db_connect.php');;
    session_start();

    if(isset($_SESSION['user_data'])) {
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
    <head>
        <meta charset="UTF-8">
        <title>PAG-ASA National High School</title>
        <link href="http://fonts.googleapis.com/css?family=Dosis:400,500,700" rel="stylesheet" type="text/css">
        <link rel='stylesheet prefetch' href='css/bootstrap.min.css'>
        <link rel="icon" href="img/pnhs_favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/w3.css">
    </head>
    <body>
        <div id="wrapper">
            <?php include("sidenav.php"); ?>
                <?php
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
										<a href="logout.php" class="btn btn-danger">Log Out</a>
									</div>
							</div>
						</div>     
					</div>';
						if(isset($_SESSION['msg']) AND $_SESSION['msg']=='error') {
							echo "<script>$('#myModal').modal('show');</script>";
							unset($_SESSION['msg']);
						}
						unset($_SESSION['namu']); unset($_SESSION['pasu']);
                ?>               
                <?php include("topnav.php"); ?>
                <div class="container">
                    <br>
                    <div class="row" style="min-height: 50em;">
                        <h2>
							<a href="index.php?id=1">Teacher User</a>
							<a href="index.php?id=2">ICT Director</a>
							<a href="index.php?id=3">MAPEH Teacher Admin</a>
							<a href="index.php?id=4">NURSE Admin</a>
							<a href="index.php?id=5">STUPER user</a>
                        </h2>
                    </div>
                </div>
                <footer class="w3-theme-bd5">
                    <div class="container">
                        <div class="col-lg-3 col-md-3">
                            <h3 class="h3">PNHS</h3>
                            <h6>All Rights Reserved &copy; 2018</h6>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <h1 class="h3">ADDRESS</h1>
                            <h6><b>Pag-asa National Highschool</b><br><span>PNHS Building, Rawis, East Service<br>  Road, Legazpi City, PH 2424</span></h6>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <h3 class="h3">CONTACT US</h3>
                            <h6 class="w3-justify">
                            <b>Phone:</b>
                            <span>(+632) 887-2232</span>
                            <br>
                            <b>E-mail:</b>
                            <span>officialpnhs@pnhs.gov.ph</span>
                            <br>
                            </h6>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <h3 class="h3">FOLLOW US ON:</h3>
                            <a href="#"><i class="fa fa-bullseye w3-xlarge" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-phone w3-xlarge" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-facebook w3-xlarge" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter w3-xlarge" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-google-plus w3-xlarge" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </footer>
            </div>
            <script src='js/jquery.min.js'></script>
            <script src='js/bootstrap.min.js'></script>
            <script  src="js/index.js"></script>
        </body>
    </html>