<?php
	session_start();
	require 'php/connect.php';
	require 'php/func.php';
	$id = $_SESSION['user_data']['acct']['cms_account_ID'];
	require 'php/session_student.php';
	require 'php/subject_details_student.php';
	require 'php/update_exam_status.php';
	$username = $_SESSION['user_data']['acct']['cms_username'];
	if($det_rows > 0){
		foreach($subject_details as $details){
			$sub_desc = $details['sub_desc'];
			$subject_name = $details['subject_name'];
			$teacher = $details['P_fname']. " " . $details['P_lname'];
			$time_start = $details['TIME_START'];
			$time_end = $details['TIME_END'];
			$day = $details['DAY'];
			$section = $details['section_name'];
		}
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
    <link rel="stylesheet" href="css/subject_details.css">
    <link rel="icon" href="img/pnhs_favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/materialize-0.97.6/css/materialize.css">
    <script src="css/materialize-0.97.6/js/materialize.min.js"></script>
    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="css/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
</head>

<body>
    <?php include("topnav.php"); ?>
    <div class="student">
            <div class="headers">
            <div class="header__left">
				<!-- <img src="php/teacher_image.php?scid=<?php //echo $sched_id; ?>" /> -->
                <img src="img/person-icon.png">
            </div>
            <div class="header__right">
                <h1><?php echo $sub_desc; ?></h1>
                <div class="lib-header-seperator"></div>
                <span>Instructor:</span>
                <div class="link">
                    <p class="link4"><?php echo $teacher;?></p>
                </div>
                <br>
                <span>Class Schedule:</span>
                <div class="link">
                    <p class="link4"><?php echo date("g:i a", strtotime($time_start)) . " - " . date("g:i a", strtotime($time_end));?></p>
                </div>
            </div>
    </div>
            
<div class="det">
  <input id="tab2" type="radio" name="tabs" checked>
  <label for="tab2" class="tab">Exams</label>    
  <section class="sect" id="content2">
    <div class="main-box clearfix">
			<div class="table-responsive">
				<table class="table">
						<?php
							if($exam_row > 0){
								echo "<thead>
										<tr>
											<th><span>Exam Name</span></th>
											<th><span>Exam Type</span></th>
											
											<th><span>Duration</span></th>
											<th><span>Passing Grade</span></th>
											<th><span>State</span></th>
											<th><span>Status</span></th>
										</tr>
									</thead>
									<tbody class='exam_body'>";
								foreach($exam as $num => $rows){
									echo "<tr>
												<td>". $rows['exam_title']. "</td><td>" . $rows['exam_type'] .
												"</td><td>". $rows['exam_duration']." minute(s)</td>
												<td>". $rows['passing_grade']."%</td><td>". $rows['exam_status']."</td>";
									
									switch($rows[13]){
										case 'Start Exam':
											echo "<td><a onclick='exam_no(".'"'.$rows['exam_no'].'"'.")'>Start Exam</a></td></tr>";
											break;
										case 'View Result':
											echo "<td><a href='result.php?id=".$rows['exam_no']."' class='review'>View Result</a></td></tr>";
											break;
									}
									
								}
							} else{
								echo "<h3 style='color:gray;text-align:center'>There is no exam!<h3>";
							}
                            echo "</tbody>";
						?>
				</table>
			</div>
		</div>
  </section>
</div>
        <?php include("footer.php"); ?>
<div class="modal fade mods" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" align="center">
					<img class="img-circle" id="img_logo" src="img/pnhs_in_logo.png">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					</button>
                </div>
                <div id="div-forms">
                    <form id="login-form" class="attempt_exam"  action="student_exam.php" method="POST">
		                <div class="modal-body">
				    		<div id="div-login-msg">
                                <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-login-msg">Type the Examination Password</span><br>
                            </div>
							<input hidden type="text" name="exam_no" class="exam_no" readonly />
				    		<input id="login_username" class="form-control pass_input" type="password" placeholder="Examination Password" required>
							<p style="color:#FF6666;text-align:center">You only have 1 attempt to this exam.</p>
        		    	</div>
				        <div class="modal-footer">
                                <button type="button" class="btn btn-primary btn-lg btn-block attempt_btn" name="attempt_exam_btn">Start Exam Now</button>
				        </div>
                    </form>
                </div>
			</div>
		</div>
	</div>
    </div>
    <script src="js/backToTop.js"></script>
    <script src="js/subject_details.js"></script>
    <script src="js/loc.js"></script>
</body>
</html>