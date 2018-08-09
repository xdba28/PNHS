<?php
	session_start();
	if(isset($_GET['id'])){
		require 'php/connect.php';
		require 'php/func.php';
		require 'php/session_teacher.php';
		$exam_no = base64_url_decode($_GET['id']);
		$lrn = base64_url_decode($_GET['lrn']);
		$get_lrn = $mysqli->query("select concat(stud.stu_fname, ' ',stud.stu_mname, ' ', stud.stu_lname) as stud_name, sect.section_name, sy.year from sis_stu_rec stu_rec, sis_student stud, css_section sect, css_school_yr sy where stu_rec.section_id = sect.SECTION_ID and stu_rec.sy_id = sy.sy_id and stu_rec.lrn = stud.lrn and stu_rec.lrn = '$lrn'");
		if($get_lrn){
			if($get_lrn->num_rows > 0){
				$lrn_det = $get_lrn->fetch_assoc();
				$stud_name = $lrn_det['stud_name'];
				$stud_sect = $lrn_det['section_name'];
				$stud_year = $lrn_det['year'];
			}
		} else {
			header("location: report.php?tab=6");
		}
		$attempt = $mysqli->query("select * from oes_exam_result where lrn = '$lrn' and exam_no='$exam_no'");
		if($attempt->num_rows == 0){
			header("location: report.php?tab=6");
		} else {
			$get_res = $attempt->fetch_assoc();
				$res_score = $get_res['exam_score'];
				$res_equivalent = $get_res['equivalent_grade'];
		}
		require 'php/get_student_exam1.php';
		require 'php/update_exam_status.php';
		$username = $_SESSION['user_data']['acct']['cms_username'];
	
	}else {
		header("location: index.php");
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
    <link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap-select-1.6.2/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/student_exam.css">
    <link rel="icon" href="img/pnhs_favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/materialize-0.97.6/css/materialize.css">
    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="css/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
	<script src="css/materialize-0.97.6/js/materialize.min.js"></script>
</head>

<body>
    <?php include("topnav.php"); ?>
    <div id="wrapper">
        <?php 
                if(isset($_SESSION['user_data'])){
                    include("sidenav.php");
                }
        ?>
    <div class="student">
        <div class="container-full">
         <section class="content">
             <div class="container">
                <div class="outline-thread">
                    <div class="title-thread">
                        <div class="name-thread"><center><?php echo $exam_title; ?></center></div>
                        <div class="reply-thread">Answered By: <?php echo $stud_name; echo "<br>"."Section: ".$stud_sect;?></div>
                    </div>
                </div>
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
                            <span>Not Answered</span>
                            <li class="color"></li>
                            <span>Correct Answer</span>
                            <li class="color"></li>
                            <span>Wrong Answer</span>
                        </ul>
                    </div>
                    
                    </div>
                <div class="right_pane">
				<input hidden type = "text" class="question_per_page" value="<?php echo $question_per_page;?>">
				<input hidden  type = "text" class="page" value="<?php echo $page;?>">
				<input hidden type = "text" class="page_total" value="<?php echo ceil($data_num/$question_per_page);?>">
				
				<form action="php/save_stud_answers.php" method="POST">
				<input hidden type="text" name="session_lrn" value="<?php echo $lrn;?>" readonly />
				<input hidden type="text" name="no_items" value="<?php echo $no_items;?>" readonly />
				<input hidden type="text" name="passing" value="<?php echo $passing;?>" readonly />
				<?php
					$i = 1;
					echo "<input hidden name='exam_no' value=".$exam_no.">";
					$count = count($data);
					$cou = count($data[0]);
					for($k=0; $k<$count; $k++){
						$cont_no = $data[$k]['content_no'];
						$question = $data[$k]['question'];
						$question_no = $data[$k]['question_no'];
						$question_type = $data[$k]['question_type'];
						$wrong_answer = $data[$k]['wrong_answer'];
						$key_answer = $data[$k]['key_answer'];
						$answer = $data[$k]['answer'];
						$earned = $data[$k]['earned'];
						$points = $data[$k]['mark'];
						
								switch($question_type){
									case 'Identification':
										$answer = explode("_", $answer);
										$answer = implode(" ", $answer);
										echo " <div class='quiz_box div".$i."' hidden disabled>
												<p style='color:dark gray; font-size:15px;text-align: right'>Earned Points: <span class='earned'>".$earned."</span> /<span class='points'>".$points."</span></p>
												<h4 class='custom-tweets'>
												<input hidden type='text' name='question_no[]' value='".$question_no."'><input hidden name='content_no[]' value='".$cont_no."'>
												<input hidden name='question_type[]' class='q_type'  value='Identification'>
													<input class='custom-tweets_input ans' type='text' value='".$answer."' readonly>
													". $i . ". " . $question."
												</h4>
											</div>";
										$i++;
										break;
									case 'Multiple Choice':
										echo '<div class="quiz_box div'.$i.'" hidden readonly>
										<p style="color:dark gray; font-size:15px;text-align:right">Earned Points: <span class="earned">'.$earned.'</span> / <span class="points">'.$points.'</span></p>
												<h3>'. $i . ". " . $question.'</h3><input hidden type="text" name="question_no[]" value="'.$question_no.'"><input hidden name="content_no[]" value="'.$cont_no.'" ><input hidden name="question_type[]" class="q_type" value="Multiple Choice"><input hidden type="text" class="ans" value="'.$answer.'"/>
												
												<ul data-quiz-question="'.$i.'">';
										$choice = explode(" ",$wrong_answer);
										$elem = count($choice) - 1;
										$choice[$elem] = $key_answer;
										shuffle($choice);
										$let = 'a';
										$answer = explode("_", $answer);
										$answer = implode(" ", $answer);
										foreach($choice as $choices){
											$choices = str_replace("_", " ", $choices);
											if($choices == $answer){
												echo $let . ". " . '<li disabled class="quiz-answer active" data-quiz-answer="'.$let.'">'. $choices.'</li>';
											} else {
												echo $let . ". " . '<li disabled class="quiz-answer" data-quiz-answer="'.$let.'" >'. $choices.'</li>';
											}
											
											$let++;
										}
										echo "</ul></div>";
										$i++;
										break;
									case 'Enumeration':
											$key_answer = explode(" ", $key_answer);
											$elem = count($key_answer);
											
											if(!empty($answer)){
												$answer = explode(" ", $answer);
											}
											
											
											echo '<div class="quiz_box div'.$i.'" hidden>
											<p style="color:dark gray; font-size:15px;text-align:right">Earned Points: <span class="earned">'.$earned.'</span> / <span class="points">'.$points.'</span></p>
											<h4 class="custom-tweets"><input hidden type="text" name="question_no[]" value="'.$question_no.'"><input hidden name="content_no[]" value="'.$cont_no.'"><input hidden name="question_type[]" class="q_type" value="Enumeration">';
											$let = 'a';
											echo $i . ". " . $question . "<br>";
											echo '<input hidden type="text" name="enum_count[]" value="'.$count . '" readonly />';
											$a = '';
											
											for($a = 0; $a < $elem - 1; $a++ ){
												if(!empty($answer)){
												$answer[$a] = explode("_", $answer[$a]);
												$answer[$a] = implode(" ", $answer[$a]);
												echo $let . ". <input class='custom-tweets_input ans' type='text' name='enum_ans[]' value='".$answer[$a]."' readonly>.<br>";
												
												} else {
													echo $let . ". <input class='custom-tweets_input ans' type='text' name='enum_ans[]' value='' readonly>.<br>";
												}
												$let++;
											}
											$i++;
											echo " </h4></div>";
											
										
										break;
							}
						} 
				?>
				

  <button type="button" class="next_page">Next Question</button>
  <button type="button" class="prev_page">Previous Question</button>
  </form>
                </div>
             </div>
        </section>
        </div>
        <?php include("footer.php"); ?>
        </div>
    </div>
    <script src="js/backToTop.js"></script>
    <script src="js/student_exam1.js"></script>
    <script src="js/loc.js"></script>
</body>
</html>