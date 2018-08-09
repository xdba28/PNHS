<!DOCTYPE html>
<html lang="en" >
    <?php
    include("func.php");
	include("dbcon.php");
	include("session.php");
	
	$name=mysql_query("SELECT concat(p_fname,' ',p_lname) as Name,job_title_name FROM pims_personnel,pims_employment_records,pims_job_title
	WHERE pims_personnel.emp_no=pims_employment_records.emp_no
	AND pims_job_title.job_title_code=pims_employment_records.job_title_code
	AND pims_personnel.emp_no=$emp");
	$nrow=mysql_fetch_assoc($name);
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
    </head>
    <body>
        <div id="wrapper">
            <?php 
				include("sidenav.php");
				include("../navbar.php");

				?>
				

				
				
				
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="./js/alert.js"></script>
<script src="./js/slideshow.js"></script>
<script src="./js/backToTop.js"></script>
<script src="./js/sideNav.js"></script>
<script src="./js/showNav.js"></script>
</div>


<!-- Footer -->
<?php include("footer.php"); ?>
            </div>
            <script src='pages/js/jquery.min.js'></script>
            <script src='pages/js/bootstrap.min.js'></script>

        </body>
    </html>