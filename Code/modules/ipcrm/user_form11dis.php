<!DOCTYPE html>
<html lang="en" >
    <?php
    include("func.php");
	include("dbcon.php");
	include("session.php");
	
	$name=mysqli_query($mysqli, "SELECT concat(p_fname,' ',p_lname) as Name,job_title_name FROM pims_personnel,pims_employment_records,pims_job_title
	WHERE pims_personnel.emp_no=pims_employment_records.emp_no
	AND pims_job_title.job_title_code=pims_employment_records.job_title_code
	AND pims_personnel.emp_no=$emp");
	$nrow=mysqli_fetch_assoc($name);
	$_SESSION['job_title']=$nrow['job_title_name'];	
	$jt=$_SESSION['job_title'];
	
    ?>
    <head>
        <meta charset="UTF-8">
        <title>PAG-ASA National High School</title>
        <link href="http://fonts.googleapis.com/css?family=Dosis:400,500,700" rel="stylesheet" type="text/css">
        <link rel='stylesheet prefetch' href='pages/css/bootstrap.min.css'>
        <link rel="icon" href="docs/img/pnhs_favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="pages/css/style.css">
        <link rel="stylesheet" href="pages/css/w3.css">
		<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css" type="text/css">

    </head>
    <body>
	
	  <?php 
		include("topnav_user.php");
		?>
	
        <div id="wrapper">
            <?php 
				include("sidenav_user.php");
			?>

<br><br>
											<style>
											.update
											{
												border: 1px solid;
												border-radius: 6px;
												border-color: gray;
												height:150px;
											}
											.style3
											{
												color:white;
												font-size:30px;
											}
											</style>
			<br><br><br>
				
									<div id="update">
								<div class="container" style="max-width:600px;">
									<div class="content update">
										<div class="modal-header" style="background-color:#ff3030; height:80px; border-top-left-radius:6px; border-top-right-radius:6px; padding:5px" align="center">
												<b><label style="color:black; font-size:30px; margin-top:12px"><span class="style3 fa fa-ban" aria-hidden="true"></span>&nbsp;You've already responded</label><br></b>
										</div>
										<div class="modal-body" align="center">
										<label style="font-size:20px">You can only fill out this form once.</label>
										
											<br>
										</div>
									</div>
								</div>
							</div>
<br><br><br><br><br><br><br><br>
<div class="centermid1"><button disabled="true" id="myBtn1" title="Go to top" style="vertical-align:middle"></button></div>
<script>
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 320 || document.documentElement.scrollTop > 320) {
        document.getElementById("myBtn1").style.display = "block";
    } else {
        document.getElementById("myBtn1").style.display = "none";
    }

}
</script>				

<style>

#back-to-top {
  display: none;
  position: fixed;
  bottom: 10px;
  right: 610px;
  z-index: 99;
  border: none;
  outline: none;
  background-color: #0052cccc;
  color: white;
  cursor: pointer;
  padding: 15px;
  width: 120px;
  border-radius: 10px;
  font-size: 12px;
}

#back-to-top:hover {
  background-color: #0052cc;
}
#back-to-top span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

#back-to-top span:after {
  content: '\02191';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

#back-to-top:hover span {
  padding-right: 25px;
}

#back-to-top:hover span:after {
  opacity: 1;
  right: 0;
}
</style>

<button onclick="topFunction()" id="back-to-top" style="vertical-align:middle"><span>Back to Top</span></button>
						
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="./js/alert.js"></script>
<script src="./js/slideshow.js"></script>
<script src="./js/backToTop.js"></script>
<script src="./js/sideNav.js"></script>
<script src="./js/showNav.js"></script>

    <br><br><br><br>
		<?php include("footer.php"); ?>
            </div>
            <script src='pages/js/jquery.min.js'></script>
            <script src='pages/js/bootstrap.min.js'></script>
            <script  src="pages/js/index.js"></script>
			
			<script src='pages/js/sb-admin-2.min.js'></script>
            <script src='pages/js/metisMenu.min.js'></script>
        </body>
    </html>