<?php
	session_start();
	require 'php/connect.php';
	require 'php/func.php';
	$id = $_SESSION['user_data']['acct']['cms_account_ID'];
	require 'php/session_student.php';
	require 'php/update_exam_status.php';
	$username = $_SESSION['user_data']['acct']['cms_username'];
	$exam_no = base64_url_decode($_GET['id']);
	$lrn = $_SESSION['user_data']['acct']['lrn'];
	$result = $mysqli->query("select res.*, ex_g.sched_id, ex.no_of_items, ex.exam_title, ex.passing_grade, ex.exam_review from oes_exam_result res, oes_exam ex, oes_exam_group ex_g where res.exam_no = ex.exam_no and ex.exam_no = ex_g.exam_no and res.exam_no = '$exam_no' and res.lrn = '$lrn'");
	if($result->num_rows == 0){
		header('Location: my_subjects.php');
	} else {
		$res = $result->fetch_assoc();
		$score = $res['exam_score'];
		$remark = $res['result_remarks'];
		$equiv = $res['equivalent_grade'];
		$no_items = $res['no_of_items'];
		$exam_title = $res['exam_title'];
		$sched_id = $res['sched_id'];
		$review = $res['exam_review'];
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
    <link rel="stylesheet" href="css/bootstrap-3.3.7/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap-select-1.6.2/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/result.css">
    <link rel="icon" href="img/pnhs_favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/materialize-0.97.6/css/materialize.css">
    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="css/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
    <script src="css/materialize-0.97.6/js/materialize.min.js"></script>
</head>
<body>
    <?php include("topnav.php"); ?>
    <div class="student">
    <div class="main-section">
        <div class="containers">
            <div class="test-completion">
                    <img class="trophy" src="img/exam_result.svg" alt="award"/>
					<span class="title"><?php echo $exam_title; ?><br> Test Completed! </span>
                  
                    <span class="score">Your score: 
                        <span class="a"><?php echo $score; ?></span>
                        <span class="b"><?php echo $no_items; ?></span>
                        <span class="percent"></span>
                    </span>
                    <?php 
								switch($remark){ 
									case 'Passed!': 
										echo "<p style='color: blue'>".$remark."</p>"; 
										echo "<p style='color: #6666FF'>Congratulations, you have passed the exam! Keep up the good work!</p>"; 
										break;
									case 'Failed.':
										echo "<p style='color: red'>".$remark."</p>"; 
										echo "<p style='color: #FF6666'>You did not pass the exam. <br>Study harder next time. Goodluck!</p>";
										break;
								}?>
								<br>
                <div class="buttons">
				<?php
					if($review == "Yes"){
						echo '<a class="button dark" href="student_review.php?id='.base64_url_encode($exam_no).'"><span>Review Exam <span>&#8594;</span></span></a>';
					} else {
						echo '<a class="button dark disabled"><span>Review Exam(Not Permitted)</span></a>';
					}
				?>
                    
					 <a class="button light" href="subject_details.php?scid=<?php echo base64_url_encode($sched_id);?>">
                        <span><span>&#8592;</span> Back to Subject Details</span>
                    </a>
                </div>
            </div>
        </div>
    
      <?php include("footer.php"); ?>
    </div>
    </div>
    <script src="js/result.js"></script>
    <script src="js/backToTop.js"></script>
    <script src='js/jquery-3.2.1.min.js'></script>
</body>
</html>