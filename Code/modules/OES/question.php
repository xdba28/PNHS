<?php
	session_start();
	require 'php/connect.php';
	$id = $_SESSION['user_data']['acct']['cms_account_ID'];
	require 'php/func.php';
	require 'php/session_teacher.php';
	require 'php/subject_teacher.php';
	require 'php/update_exam_status.php';
	$username = $_SESSION['user_data']['acct']['cms_username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PNHS OES</title>
	<link rel="stylesheet" href="css/bootstrap-3.3.7/dist/css/bootstrap.css">
	<link rel="stylesheet" href="css/w3.css">
	<link rel="icon" href="img/pnhs_favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/exam.css">
	<link rel="stylesheet" href="css/notif.css">
	<link rel="stylesheet" href="css/materialize-0.97.6/css/materialize.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel='stylesheet' href='css/jquery.alertable.css'>
    <link rel="stylesheet" href="css/materialize-0.97.6/css/materialize.css">
    <script src="css/materialize-0.97.6/js/materialize.min.js"></script>
	<script src="js/jquery-1.12.4.min.js"></script>
	<script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/jquery-3.2.1.js"></script>
    <script src='js/velocity.min.js'></script>
    <script src='js/jquery.alertable.min.js'></script>
	<script src="css/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
	<script src="css/materialize-0.97.6/js/materialize.min.js"></script>
    <script src="js/manage_question.js"></script>	
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
			<div id="mainLogin" class="q_mainLogin">
				<div id="logo"><i class="fa fa-th" aria-hidden="true"></i>
				</div>
				<div id="title" class="q_title">Question Bank</div>
			</div>
			<div id="formContainer">
				<div class="det">
					<input id="tab4" type="radio" name="tabs" checked>
					<label for="tab4" class="tab">Add Questions</label>
					<input id="tab5" type="radio" name="tabs">
					<label for="tab5" class="tab">Manage Question Bank</label>
					<section class="sect" id="content4">
					<form name="question_form" action="php/create_new_question.php" method="POST">
						<div class="clearfx">
							<div class="row">
								<div class="input-field col s12 m12 l12">
									<i class="material-icons prefix">web</i>
									<select required class="questioncreate_subject" name="questioncreate_subject" >
									<option value="" disabled selected>Select Subject</option>
									<?php
									if($num_rows > 0){
									foreach($teacher_subject as $subject){
									echo "<option value='". $subject['subject_id'] . "'>" . $subject['sub_desc'] . "</option>";
									}
									}
									?>
									</select> 
									<label>Subject</label>
								</div>
							</div>
						</div>
						<div class="row field_wrapper"></div>
						<div class="clearfx">
							<div class="row">
								<div class="input-field col s12 m12 l9">
									<i class="material-icons prefix">help</i>
									<select required aria-required="true" class="question_type">
										<option value="" disabled selected>Question Type</option>
										<option>Identification</option>
                                        <option>Multiple Choice</option>
                                        <option>Enumeration</option>
									</select>
									<label>Subject</label>
								</div>
								<div class="input-field col s12 m12 l3">
									<button class="waves-effect waves-light btn-large add_b"><i class="material-icons right">add</i>Add Field</button>
								</div>
							</div>
							<div class="row button_top">
								<div class="col s12 m12 l12">
									<button class="add_q outline" type="submit" name="submit_btn">
										<div class="add">
											<div class="name_title">SAVE</div>
										</div>
									</button>
								</div>
							</div>
						</div>
						</form>
					</section>
					
					<section class="sect" id="content5">
						<div class="clearfx">
                        <div class="row">
                           <div class="input-field col s12 m12 l12">
                              <i class="material-icons prefix">web</i>
                              <select class="questionmanage_subject">
                                 <option value="" disabled selected>Select Subject</option>
                                 <?php
                                    if($num_rows > 0){
                                        foreach($teacher_subject as $subject){
                                    echo "<option value='". $subject['subject_id'] . "'>" . $subject['sub_desc'] . "</option>";
                                    }
                                    }
                                    ?>
                              </select>
                              <label>Subject</label>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                         <div class="clearfx">
                        <blockquote>Identification</blockquote>
                         </div>
                        <div class="main-box clearfix">
                           <div class="table-responsive">
                              <table class="table">
                                 <thead>
                                    <tr>
                                       <th><span>Question</span>
												</th>
												<th><span>Correct Answer</span>
												</th>
												<th><span>Action</span>
												</th>
                                    </tr>
                                 </thead>
                                 <tbody class="iden_body"></tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                         <div class="clearfx">
                         <blockquote>Multiple Choice</blockquote>
                         </div>
                        <div class="main-box clearfix">
                           <div class="table-responsive">
                              <table class="table">
                                 <thead>
                                    <tr>
                                       <th><span>Question</span>
												</th>
												<th><span>Correct Answer</span>
												</th>
												<th><span>Action</span>
												</th>
                                    </tr>
                                 </thead>
                                 <tbody class="mul_body"></tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="clearfx">
                             <blockquote>Enumeration</blockquote>
                        </div>
                        <div class="main-box clearfix">
                           <div class="table-responsive">
                              <table class="table">
                                 <thead>
                                    <tr>
                                      <th><span>Question</span>
												</th>
												<th><span>Correct Answer</span>
												</th>
												<th><span>Action</span>
												</th>
                                    </tr>
                                 </thead>
                                 <tbody class="enum_body"></tbody>
                              </table>
                           </div>
                        </div>
                     </div>
					</section>
				</div>
			</div>
            </div>
		</section>
	</div>
	<div id="edit_question" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header clearfx">
          <button type="button" class="close" data-dismiss="modal"><i class="small material-icons">close</i></button>
        <h5 class="modal-title h4b"><i class="fa fa-pencil" aria-hidden="true"> </i>  Edit Question</h5>
      </div>
      <div class="modal-body">
          <form class="question_body" action="php/update_question.php" method="POST"></form>
      </div>
      
    </div>

  </div>
</div>
      <?php include("footer.php"); ?>
         </div>
    </div>
	<script src="js/backToTop.js"></script>
	<script src="js/question.js"></script>
	<script src="js/loc.js"></script>
</body>

</html>