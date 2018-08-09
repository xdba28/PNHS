<?php
	session_start();
	require 'php/connect.php';
	require 'php/func.php';
	$id = $_SESSION['user_data']['acct']['cms_account_ID'];
	require 'php/session_student.php';
	require 'php/update_exam_status.php';
	require 'php/subject_student.php';
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
    <link rel="stylesheet" href="css/bootstrap-3.3.7/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap-select-1.6.2/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/subjects.css">
    <link rel="icon" href="img/pnhs_favicon.ico" type="image/x-icon">
    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="css/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
</head>
<body>
    <?php include("topnav.php"); ?>
        <div class="student">
        <div class="containers">
<?php
	if($num_rows > 0){
		foreach($student_subject as $subject){
			echo "<figure class='snip1091'><img src='" . $subject['img_loc'] ."'/>
					<figcaption>
					<h2 class='subjname'>". $subject['sub_desc'] . "</h2>
					<h2 class='teacher'>". $subject['P_fname']."<span> ".$subject['P_lname'] ."</span></h2>
					</figcaption><a href='subject_details.php?scid=". $subject['SCHED_ID']."'></a>
				</figure>";
		}
	}
?>
        </div>
        <?php include("footer.php"); ?>
            </div>
    <script src="js/subjects.js"></script>
    <script src="js/backToTop.js"></script>
    <script src="css/bootstrap-select-1.6.2/dist/js/bootstrap-select.js"></script>
</body>
</html>