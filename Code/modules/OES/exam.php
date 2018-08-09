<?php
    session_start();
	require 'php/connect.php';
	require 'php/func.php';
	$id = $_SESSION['user_data']['acct']['cms_account_ID'];
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
	  <link rel="stylesheet" href="css/notif.css">   
      <link rel="icon" href="img/pnhs_favicon.ico" type="image/x-icon">
      <link rel="stylesheet" href="css/normalize.css">
      <link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/exam.css">
      <link rel="stylesheet" href="css/materialize-0.97.6/css/materialize.css">
      <link rel="stylesheet" href="css/materialize-0.97.6/css/materialize.clockpicker.css">
      <script src="js/jquery-1.12.4.min.js"></script>
      <script src="js/jquery-3.2.1.min.js"></script>
	  <script src="js/jquery-1.11.2-sortable.js"></script>
      <script src="css/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
      <script src='css/materialize-0.97.6/js/materialize.clockpicker.js'></script> 	
      <script src="css/materialize-0.97.6/js/materialize.min.js"></script>
      <script src="js/manage_exam.js"></script>
	  <script src="js/validate_form.js"></script>	
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
            <div id="mainLogin">
               <div id="logo">
                   <span class="glyphicon glyphicon-check" aria-hidden="true"></span>
                </div>
               <div id="title">Exam</div>
            </div>
            <div id="formContainer">
               <div class="det">
                  <input id="tab1" type="radio" name="tabs" checked>
                  <label for="tab1" class="tab">Create Exam</label>
                  <input id="tab2" type="radio" name="tabs">
                  <label for="tab2" class="tab">Manage Exams</label>
                  <div id="edit_call" class="edit_tab"></div>
                  <section class="sect" id="content1">
                     <form class="clearfx" action="php/create_exam.php" method="POST">
                        <div class="row">
                           <h4 class="header h4c">General</h4>
                           <div class="input-field col s12 m12 l6">
                              <i class="material-icons prefix">web</i>
                              <select name="exam_create_subject" class="exam_create_subject" >
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
                           <div class="input-field col s12 m12 l6">
                              <i class="material-icons prefix">create</i>
                              <input name="exam_name" id="exam_name" type="text" required aria-required="true" value="" autocomplete="off">
                              <label for="exam_name" class="active">Exam Name</label>
                           </div>
                           <div class="input-field col s12 m12 l6">
                              <i class="material-icons prefix">description</i>
                              <select required name="exam_type" class="examcreate_type">
                                 <option value="" disabled selected>Select Exam Type</option>
                                 <option value="Short Quiz">Short Quiz</option>
                                 <option value="Long Quiz">Long Quiz</option>
                                 <option value="PreTest">PreTest</option>
                                 <option value="PostTest">PostTest</option>
                                 <option value="Periodical Test">Periodical Test</option>
                              </select>
                              <label>Exam Type</label>
                           </div>
                           <div class="input-field col s12 m12 l5">
                              <i class="material-icons prefix">security</i>
                              <input name="password" id="password" type="password" required aria-required="true" autocomplete="off">
                              <label for="password">Password</label>
							  	<br>
                           </div>
						   <div class="input-field col s12 m12 l1">
							  <button type="button" id="eye" value="Show Password"class="w3-button w3-black right " method="post"
									onmousedown="password.type='text';" 
									onmouseup="password.type='password';" 
									onmouseout="password.type='password';"><i class="fa fa-eye fa-4 center" aria-hidden="true"></i></button>
                           </div>
						   <div class="input-field col s12 m12 l6 upper">
                              <i class="material-icons prefix">class</i>
                              <select required aria-required="true" name="exam_create_class[]" class="class_select">
                                 <option value="" disabled selected> Select Class Section</option>
                              </select>
                              <label>Class Section</label>
                           </div>
                           <div hidden class="input-field col s12 m12 l6">
                              <i class="material-icons prefix">dehaze</i>
                              <input name="no_items" type="text" class="no_items" value="0" />
                              <label for="no_items">Number of Items</label>
                           </div>
						   <div class="input-field col s12 m12 l6">
                              <i class="material-icons prefix">trending_up</i>
                              <input name="passing" id="passing" type="text" class="passing" required aria-required="true">
                              <label for="passing">Passing percentage</label>
                           </div>
                           
						   <div class="input-field col s12 m12 l6">
                              <i class="material-icons prefix">web</i>
                              <select required aria-required="true" name="review">
                                 <option value="No" selected>No</option>
                                 <option value="Yes">Yes</option>
                              </select>
                              <label>Reviewable</label>
                           </div>
						   <div class="input-field col s12 m12 l6">
                              <i class="material-icons prefix">access_time</i>
                              <input name="duration" type="text" class="duration" required aria-required="true">
                              <label for="duration">Duration (Minutes)</label>
                           </div>
                        </div>
                        <div class="row">
                           <h4 class="header">Timing</h4>
                           <h6 class="h6a col s12 m12 l2">Open the exam</h6>
                           <div class="input-field col s12 m12 l5">
                              <i class="material-icons prefix">date_range</i>
                              <input placeholder="Start date" class="datepicker" type="text" id="startdate" name="startdate">
                           </div>
                           <div class="input-field col s12 m12 l5">
                              <i class="material-icons prefix">access_time</i>
                              <input placeholder="Time" type="text" class="timepicker" name="starttime">
                           </div>
                           <h6 class="h6a col s12 m12 l2">Close the exam</h6>
                           <div class="input-field col s12 m12 l5">
                              <i class="material-icons prefix">date_range</i>
                              <input placeholder="End date" class="datepicker" type="text" id="enddate" name="enddate">
                           </div>
                           <div class="input-field col s12 m12 l5">
                              <i class="material-icons prefix">access_time</i>
                              <input placeholder="Time" type="text" class="timepicker" name="endtime">
                           </div>
                        </div>
                        <div class="row">
                           <h4 class="header">Question</h4>
                           <div class="input-field col s12 m12 l6">
                              <i class="material-icons prefix">reorder</i>
                              <select required aria-required="true" name="question_per_page">
                                 <option value="0" selected>All questions on one page</option>
                                 <option value="1">1 question per page</option>
                                 <option value="2">2 questions per page</option>
                                 <option value="3">3 questions per page</option>
                                 <option value="4">4 questions per page</option>
                                 <option value="5">5 questions per page</option>
                                 <option value="6">6 questions per page</option>
                                 <option value="7">7 questions per page</option>
                                 <option value="8">8 questions per page</option>
                                 <option value="9">9 questions per page</option>
                                 <option value="10">10 questions per page</option>
                              </select>
                              <label>Question per page</label>
                           </div>
                           <div class="input-field col s12 m12 l6">
                              <i class="material-icons prefix">web</i>
                              <select required aria-required="true" name="shuffle">
                                 <option value="No" selected>No</option>
                                 <option value="Yes">Yes</option>
                              </select>
                              <label>Shuffle questions</label>
                           </div>
                        </div>
                        <div class="row button_top">
                           <div class="col s12 m12 l6">
                              <button class="outline create_submit" name="submit_btn" type="submit" name="action">
                                 <div class="add">
                                    <div class="name_title">Save</div>
                                 </div>
                              </button>
                           </div>
                           <div class="col s12 m12 l6">
                              <button class="outline" type="reset" name="action">
                                 <div class="add add_blue">
                                    <div class="name_title">Reset</div>
                                 </div>
                              </button>
                           </div>
                        </div>
                     </form>
                  </section>
                  <section class="sect" id="content2">
                     <div class="clearfx">
                        <div class="row">
                           <div class="input-field col s12 m12 l12">
                              <i class="material-icons prefix">web</i>
                              <select class="exam_select_subject">
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
                        <div class="main-box clearfix">
                           <div class="table-responsive">
                              <table class="table">
                                 <thead class="exam_thead">
                                    <tr>
                                       <th><span>Exam Name</span></th>
										<th><span>Section</span></th>
										<th><span>Duration</span></th>
										<th><span>No. of Items</span></th>
										<th><span>Exam Type</span></th>
										<th><span>Status</span></th>
										<th><span>Date Created</span></th>
										<th><span>Action</span></th>
                                    </tr>
                                 </thead>
                                 <tbody class="exams">
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </section>
				  <!--EDIT EXAM CONTENT-->
                 <section class="sect" id="content3">
				 <form action="php/save_exam_contents3.php" method="POST">
						<input hidden type="text" name="exam_no" class="exam_no" readonly />
						<input hidden type="text" name="subject_id" class="subject_id" readonly />
						
						<center><h3 class="exam_title"></h3></center>
						<center><i><h4 class="cont_exam_type"></h4></i></center>
						<center><i><h4 class="subj_desc"></h4></i></center>
						<center><i><h4 class="exam_sect"></h4></i></center>
						
						
						<button type="button" class="print_out waves-effect waves-light btn open_print">Print Exam Questions</button>
						<hr>
						<ul class="row field_wrapper"></ul>
                        <div class="clearfx">
							<div class="row">
								<div class="input-field col s12 m12 l10"><i class="material-icons prefix">help</i>
									<select class="question_type">
										<option disabled selected>Select Question Type</option>
										<optgroup label="Field">
											<option>Identification</option>
											<option>Multiple Choice</option>
											<option>Enumeration</option>
										</optgroup>
										<optgroup label="Question Bank">
											<option>Add Question from Question Bank</option>
										</optgroup>
									</select>
									<label>Add</label>
								</div>
								<div class="input-field col s12 m12 l2">
									<button class="waves-effect waves-light btn-large add_b"><i class="material-icons right">add</i>Add</button>
								</div>
							</div>
							<div class="row button_top">
								<div class="col s12 m12 l12">
									<button type="submit" class="outline modal-outline save_content" name="save_content">
										<div class="add">
											<div class="name_title">SAVE</div>
										</div>
									</button>
									<button type="button" class="outline modal-outline close_exam" name="close_content">
										<div class="add add_red">
											<div class="name_title">Close</div>
										</div>
									</button>
								</div>
							</div>
							<div class="row button_top">
							<div class="col s12 m12 l12">
								</div>
								</div>
						</div>
	</form>
</section>
               </div>
            </div>
                 </div>
         </section>
       <div id="edit_details" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header clearfx">
          <button type="button" class="close" data-dismiss="modal"><i class="small material-icons">close</i></button>
        <h5 class="modal-title h4b"><i class="fa fa-pencil" aria-hidden="true"> </i>  Edit Exam Details</h5>
      </div>
      <div class="modal-body">
          <form class="clearfx" action="php/update_exam.php" method="POST">
                       <div class="row">
                           <h4 class="header h4c">General</h4>
						   <input hidden type="text" class="edit_exam_no" name="exam_no" readonly />
                           <div class="input-field col s12 m12 l6">
                              <i class="material-icons prefix active">web</i>
                             <select name="edit_subject" class="edit_subject" >
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
                           <div class="input-field col s12 m12 l6">
                              <i class="material-icons prefix">create</i>
                              <input name="edit_exam_name" id="edit_exam_name" type="text" required aria-required="true" class="edit_exam_name" value="">
                              <label for="exam_name">Exam Name</label>
                           </div>
						   <div class="input-field col s12 m12 l6">
                              <i class="material-icons prefix">description</i>
                              <select required name="exam_edit_type" class="exam_edit_type">
                                 <option value="" disabled>Select Exam Type</option>
                                 <option value="Short Quiz">Short Quiz</option>
                                 <option value="Long Quiz">Long Quiz</option>
                                 <option value="PreTest">PreTest</option>
                                 <option value="PostTest">PostTest</option>
                                 <option value="Periodical Test">Periodical Test</option>
                              </select>
                              <label>Exam Type</label>
                           </div>
                           <div class="input-field col s12 m12 l5">
                              <i class="material-icons prefix">security</i>
                              <input name="edit_password" id="edit_password" type="password" required aria-required="true" class="edit_password" autocomplete="off">
                              <label for="password">Password</label>
                           </div>
						   <div class="input-field col s12 m12 l1">
								<button type="button" id="edit_eye" value="Show Password" class="w3-button w3-black right " method="post"
									onmousedown="edit_password.type='text';" 
									onmouseup="edit_password.type='password';" 
									onmouseout="edit_password.type='password';"><i class="fa fa-eye fa-4 center" aria-hidden="true"></i></button>
                           </div>
                           <div class="input-field col s12 m12 l6 edit_upper">
                              <i class="material-icons prefix">class</i>
                              <select required aria-required="true" name="edit_class[]" class="edit_class">
                                 <option value="" disabled selected> Select Class Section</option>
                              </select>
                              <label>Class Section</label>
                           </div>
                        
						   <div class="input-field col s12 m12 l6">
                              <i class="material-icons prefix">trending_up</i>
                              <input name="edit_passing" id="edit_passing" type="text" class="edit_passing" required aria-required="true">
                              <label for="passing">Passing Percentage</label>
                           </div>
						   <div class="input-field col s12 m12 l6">
                              <i class="material-icons prefix">web</i>
                              <select required aria-required="true" name="edit_review" class="edit_review">
                                 <option value="No" selected>No</option>
                                 <option value="Yes">Yes</option>
                              </select>
                              <label>Reviewable</label>
                           </div>
						   <div class="input-field col s12 m12 l6">
                              <i class="material-icons prefix">timer_10</i>
                              <input name="edit_duration" type="text" class="edit_duration" required aria-required="true">
                              <label for="duration">Duration (Minutes)</label>
                           </div>
                        </div>
                        <div class="row">
                           <h4 class="header">Timing</h4>
                           <h6 class="h6a col s12 m12 l2">Open the exam</h6>
                           <div class="input-field col s12 m12 l5">
                              <i class="material-icons prefix">date_range</i>
                              <input placeholder="Start date" class="datepicker edit_startdate" type="text" id="edit_startdate" name="edit_startdate">
                           </div>
                           <div class="input-field col s12 m12 l5">
                              <i class="material-icons prefix">access_time</i>
                              <input placeholder="Time" type="text" class="timepicker edit_starttime" name="edit_starttime">
                           </div>
                           <h6 class="h6a col s12 m12 l2">Close the exam</h6>
                           <div class="input-field col s12 m12 l5">
                              <i class="material-icons prefix">date_range</i>
                              <input placeholder="End date" class="datepicker edit_enddate" type="text" id="edit_enddate" name="edit_enddate">
                           </div>
                           <div class="input-field col s12 m12 l5">
                              <i class="material-icons prefix">access_time</i>
                              <input placeholder="Time" type="text" class="timepicker edit_endtime" id="edit_endtime" name="edit_endtime" >
                           </div>
                        </div>
                        <div class="row">
                           <h4 class="header">Question</h4>
                           <div class="input-field col s12 m12 l6">
                              <i class="material-icons prefix">reorder</i>
                              <select required aria-required="true" class="edit_question_per_page" name="edit_question_per_page">
                                 <option value="0">All questions on one page</option>
                                 <option value="1">1 question per page</option>
                                 <option value="2">2 questions per page</option>
                                 <option value="3">3 questions per page</option>
                                 <option value="4">4 questions per page</option>
                                 <option value="5">5 questions per page</option>
                                 <option value="6">6 questions per page</option>
                                 <option value="7">7 questions per page</option>
                                 <option value="8">8 questions per page</option>
                                 <option value="9">9 questions per page</option>
                                 <option value="10">10 questions per page</option>
                              </select>
                              <label>Question per page</label>
                           </div>
                           <div class="input-field col s12 m12 l6">
                              <i class="material-icons prefix">web</i>
                              <select required aria-required="true" class="edit_shuffle" name="edit_shuffle">
                                 <option value="No" selected>No</option>
                                 <option value="Yes">Yes</option>
                              </select>
                              <label>Shuffle questions</label>
                           </div>
                        </div>
                        <div class="row button_top">
                           <div class="col s12 m12 l4">
                              <button class="edit_submit_btn outline" name="edit_save_btn" type="submit">
                                 <div class="add">
                                    <div class="name_title">Save Changes</div>
                                 </div>
                              </button>
                           </div>
                            <div class="col s12 m12 l4">
                              <button class="outline reset_btn" type="button" name="action">
                                 <div class="add add_blue">
                                    <div class="name_title">Reset</div>
                                 </div>
                              </button>
                           </div>
                           <div class="col s12 m12 l4">
                              <button class="outline" data-dismiss="modal">
                                 <div class="add add_red">
                                    <div class="name_title">Cancel</div>
                                 </div>
                              </button>
                           </div>
                        </div>
                     </form>
      </div>
    </div>
  </div>
</div>       
    <div id="add_from_qb" class="modal fade" role="dialog">
         <div class="modal-dialog modal-md">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header">
                   <button type="button" class="close close_qb" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"><i class="fa fa-question-circle " aria-hidden="true"></i> Add From Question Bank</h4>
               </div>
               <div class="modal-body modal-body-sm">
                   <ul class="row qb_wrapper">
                   </ul>
                   <div class="clearfx">
                   <div class="row button_top">
                        <div class="col s12 m12 l12">
                           <button disabled type="button" class="outline add_qb">
                              <div class="add">
                                 <div class="name_title">add selected questions to the exam</div>
                              </div>
                           </button>
                        </div>
                     </div>
                     </div>
               </div>
            </div>
         </div>
      </div>
            </div>
      <?php include("footer.php"); ?>
        </div>
       </div>
      <script src="js/backToTop.js"></script>
      <script src="js/loc.js"></script>
      <script src="js/exam.js"></script>
		 <script src="js/print_exam_question.js"></script>	
   </body>
</html>