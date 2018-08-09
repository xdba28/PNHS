<?php
	session_start();
	if(isset($_SESSION['user_data']['acct']['lrn'])){
		if(isset($_POST['exam_no'])){
			
			$exam_no_enc = $_POST['exam_no'];
			require 'php/connect.php';
			require 'php/func.php';
			require 'php/session_student.php';
			$exam_no = base64_url_decode($_POST['exam_no']);
			
			require 'php/get_student_exam.php';
			require 'php/update_exam_status.php';
			$mysqli->autocommit(false);
			$lrn = $_SESSION['user_data']['acct']['lrn'];
			$attempt = $mysqli->query("select * from oes_exam_result where lrn = '$lrn' and exam_no='$exam_no'");
			
			if($attempt->num_rows > 0){
				header("Location: result.php?id=".$exam_no);
			} else {
				date_default_timezone_set("Asia/Manila");
				$current_date = date('Y-m-d H:i:s');
				
				$ins = $mysqli->query("INSERT INTO `oes_exam_result` (`res_id`, `exam_no`, `lrn`, `exam_score`, `equivalent_grade`, `result_remarks`, exam_datetime) VALUES (NULL, '$exam_no', '$lrn', '0', '0', 'Failed.','$current_date')");
				$mysqli->commit();
				
			}
			$username = $_SESSION['user_data']['acct']['cms_username'];
		}else {
			header("location: my_subjects.php");
		}
	} else {
		header("Location: ../../index.php");
	}
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
    <link rel="icon" href="img/pnhs_favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap-select-1.6.2/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/student_exam.css">
	<link rel="stylesheet" href="css/materialize-0.97.6/css/materialize.css">
    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="css/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
	<script src="css/materialize-0.97.6/js/materialize.min.js"></script>
</head>


<body>
    <?php include("topnav.php"); ?>
	<div class="container student">
        <section class="content">
                <div class="outline-thread">
                    <div class="title-thread">
                        <div class="name-thread"><center><?php echo $exam_title; ?></center></div>
                        <div class="reply-thread">Prepared By: <?php echo $teacher; ?></div>
                    </div>
                </div>
				<div><h5><center>Please <b style="color:red">do not reload</b> this page or <b style="color:red">redirect</b> to other pages. Doing so will nullify your attempt on this quiz. Good Luck!</center></h5></div>
                <div class="left_pane">
                    <div class="gridbox">
                        <h2 class="w3-card-4">Exam Navigation</h2>
                        <div class="exam_nav">
							<?php
								$data_num = count($data);
								
								for($i= 1; $i <= $data_num; $i++){
									echo '<a href="#" class="sqr sqr'.$i.'">' . $i  .'</a>';
								}
							?>
                            <br>
                        </div>
                    </div>
                    <div class="symbol">
                        <h2 class="w3-card-4">Legend</h2>
                        <ul class="sym">
                            <li class="color"></li>
                            <span>Current</span>
                            <li class="color"></li>
                            <span>No Answer Yet</span>
                            <li class="color"></li>
                            <span>Answered</span>
                            <!--<li class="color"></li>
                            <span>Flagged</span>-->
                        </ul>
                    </div>
                    <div class="timer">
                        <input type="hidden" id="set-time" value="<?php echo $duration;?>"/>
                        <div id="countdown" class="w3-card-4">
                            <div class="countdown-label">Time Remaining</div>
                            <div id='tiles' class="color-full"></div>
                        </div>
                    </div>
                    </div>
                <div class="right_pane">
				<input hidden type = "text" class="question_per_page" value="<?php echo $question_per_page;?>">
				<input hidden type = "text" class="page" value="<?php echo $page;?>">
				<input hidden type = "text" class="page_total" value="<?php echo $question_page;?>">
				
				<form action="php/save_stud_answers.php" method="POST" name="form_exam" class="form_exam">
				<input hidden type="text" name="session_lrn" value="<?php echo $lrn;?>" readonly />
				<input hidden type="text" name="no_items" value="<?php echo $no_items;?>" readonly />
				<input hidden type="text" name="passing" value="<?php echo $passing;?>" readonly />
				
				<?php
					$i = 1;
					echo "<input hidden name='exam_no' value='".$exam_no_enc."' readonly>";
					
					foreach($data as $exam_cont){
						$cont_no = $exam_cont['content_no'];
						$question = $exam_cont['question'];
						$question_no = $exam_cont['question_no'];
						$question_type = $exam_cont['question_type'];
						$wrong_answer = $exam_cont['wrong_answer'];
						$key_answer = $exam_cont['key_answer'];
						switch($question_type){
							case 'Identification':
								echo " <div class='quiz_box div".$i."' hidden>
										<h4 class='custom-tweets'>
										<input hidden type='text' name='question_no[]' value='".$question_no."'><input hidden name='content_no[]' value='".$cont_no."'>
										<input hidden name='question_type[]' value='Identification' class='qtype'>
											<input class='custom-tweets_input ans' type='text' name='iden_answer[]' autocomplete='off'>
											". $i . ". " . $question."
										</h4>
									</div>";
								$i++;
								break;
							case 'Multiple Choice':
								echo '<div class="quiz_box div'.$i.'" hidden>
										<h3>'. $i . ". " . $question.'</h3><input hidden type="text" name="question_no[]" value="'.$question_no.'"><input hidden name="content_no[]" value="'.$cont_no.'" ><input hidden name="question_type[]" value="Multiple Choice" class="qtype"><input hidden class="ans" type="text" name="mul_answer[]" />
										<h5>Select one:</h5>
										<ul data-quiz-question="'.$i.'">';
								$choice = explode(" ",$wrong_answer);
								$elem = count($choice) - 1;
								$choice[$elem] = $key_answer;
								shuffle($choice);
								$let = 'a';
								foreach($choice as $choices){
									$choices = str_replace("_", " ", $choices);
									echo $let . ". " . '<li class="quiz-answer" data-quiz-answer="'.$let.'">'. $choices.'</li>';
									$let++;
								}
								echo "</ul></div>";
								$i++;
								break;
							case 'Enumeration':
								echo '<div class="quiz_box div'.$i.'" hidden>
								<h4 class="custom-tweets"><input hidden type="text" name="question_no[]" value="'.$question_no.'"><input hidden name="content_no[]" value="'.$cont_no.'"><input hidden name="question_type[]" value="Enumeration" class="qtype">';
								$let = 'a';
								echo $i . ". " . $question . "<br>";
								$answer = explode(" ", $key_answer);
								$elem = count($answer);
								$count = $elem - 1;
								echo '<input hidden type="text" name="enum_count[]" value="'.$count . '" readonly />';
								for($a = 1; $a < $elem; $a++ ){
									echo $let . ". <input class='custom-tweets_input ans answer".$i.$a."' type='text' name='enum_ans[]' autocomplete='off'>.<br>";
									$let++;
								}
								$i++;
								echo " </h4></div>";
								break;
						}
						
					}
					$mysqli->close();
				?>
				
 <button type="button" class="exam_submit_ans" name="finish_attempt">Submit Answers</button>
  <button type="button" class="next_page">Next Question(s)</button>
  <button type="button" class="prev_page">Previous Question(s)</button>
  </form>
                </div>
        </section>
    </div>
        <?php include("footer.php"); ?>
    <script src="js/backToTop.js"></script>
    <script src="js/student_exam.js"></script>
    <script src="js/loc.js"></script>
</body>
</html>