<?php
	session_start();
	require 'php/connect.php';
	$id = $_SESSION['user_data']['acct']['cms_account_ID'];
	if(isset($_SESSION['user_data']['acct']['emp_no'])){
		require 'php/session_teacher.php';
	} elseif(isset($_SESSION['user_data']['acct']['lrn'])){
		require 'php/session_student.php';
	} else {
		header('Location: ../../index.php');
	}
	$username = $_SESSION['user_data']['acct']['cms_username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PNHS OES</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/bootstrap-3.3.7/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="icon" href="img/pnhs_favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/normalize.css">
    <link href="css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/materialize-0.97.6/css/materialize.css">
    <script src="css/materialize-0.97.6/js/materialize.min.js"></script>
    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="css/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
</head>
<body>
    <?php include("topnav.php"); 
			if(isset($_SESSION['user_data']['acct']['lrn'])){
				echo '<div class="student">
        <div class="containers">';
			}
	?>
    <div id="wrapper">
        <?php 
                if(isset($_SESSION['user_data']['acct']['emp_no'])){
                    include("sidenav.php");
                }
        ?>
        <div class="container">
        <section class="content">
            <div class="clearfx">
                <div class="col s12 m12">
                    <p class="z-depth-2">
                        <img src="img/banner.jpg">
                    </p>
                </div>
			</div>
			<div class="heading">
				<h2>Welcome to PNHS Online Examination System, <p><?php echo $username; ?></p>!</h2>
			</div>
			<article class="intro">
				<p>The OES or Online Examination System is a web-based system for PAG-ASA NATIONAL HIGH SCHOOL (PNHS). The said system provides paperless examination to bonafide students of the school; thus, providing more security, less leakage of test questions, and easier grade computation for the teachers.</p>
                <h4>OES features an easier approach of conducting and distributing exams for the teachers:</h4>
				<ul>
					<li>Create a web-friendly software that enables the teachers to create, modify and delete
					examinations online and the students to access the exams;</li>
					<li>Automate the computation of scores and grades;</li>
					<li>Store all the details regarding the exam and its result on the web and,</li>
					<li>Generate a printable list of the result of an exam taken by a class; including the
					students’ names, scores, grades, etc.</li>
				</ul>
			</article>
		</section>
    </div>
   <?php include("footer.php"); ?>
    </div>
    <script src="js/backToTop.js"></script>
    <script src="js/loc.js"></script>
</body>
</html>