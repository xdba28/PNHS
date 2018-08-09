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
	 <script>
	  var url = window.location.href;
	  if(url.indexOf("#") != -1){
		  var new_url = url.split("#");
		  location.href = new_url[0];
	  }
	  </script>
	<link rel="stylesheet" href="css/bootstrap-3.3.7/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="css/w3.css">
	<link rel="icon" href="img/pnhs_favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="css/normalize.css">
	<link href="css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/exam.css">
	<link rel="stylesheet" href="css/materialize-0.97.6/css/materialize.css">
	<link rel="stylesheet" href="css/select.dataTables.min.css">
	<script src="js/jquery-1.12.4.min.js"></script>
	<script src="js/jquery-3.2.1.min.js"></script>
    <script src='js/jquery.dataTables.min.js'></script>
    <script src='js/dataTables.select.min.js'></script>
    <script src='js/dataTables.buttons.min.js'></script>
    <script src='js/dataTables.bootstrap4.min.js'></script>
	<script src="css/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
	<script src="css/materialize-0.97.6/js/materialize.min.js"></script>
    <script src="js/Chart.min.js"></script>
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
			<div id="mainLogin" class="r_mainLogin">
				<div id="logo"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
				</div>
				<div id="title" class="r_title">Exam Report</div>
			</div>
        	<form id="form_save" action="php/table.php" method="POST">
			<div class="container">
				<div class="det">
                    <div class="clearfx">
							<div class="row">
								<div class="input-field col s12 m4 l4">
									<i class="material-icons prefix">web</i>
									<select required class="select_subject" name="questioncreate_subject" >
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
								<div class="input-field col s12 m4 l4 bts">
									<i class="material-icons prefix">format_list_numbered</i>
									<select name="exam" class="exam_name">
									<option value="" disabled selected>Select Exam</option>
									</select> 
									<label>Exam Name</label>
								</div>
								<div class="input-field col s12 m4 l4 section">
									<i class="material-icons prefix">folder_shared</i>
									<select class="sect_name" name="sect_name">
									<option value="" disabled selected>Select Section</option>
									</select> 
									<label>Section Name</label>
								</div>
                                
							</div>
						</div>
						<br>
					<input id="tab6" type="radio" name="tabs" checked>
                  <label for="tab6" class="tab">Exam Result Table</label>
                  <input id="tab7" type="radio" name="tabs">
                  <label for="tab7" class="tab">Exam Result Chart</label>
                    <section class="sect" id="content6">
                        <table id="datatable_subject" class="table table-striped table-bordered" width="100%" cellspacing="0">
							<thead class="table_title">
								<tr>
									<th></th>
									<th>Exam Name</th>
									<th>Number of Passed</th>
									<th>Number of Failed</th>
									<th>Number of Taker</th>
								</tr>
							</thead>
						</table>
						
					</section>
					<section class="sect" id="content7">
						<br>
						<h2><center>No chart to display</center></h2>
						 <br>
					</section>
				</div>
			</div>
            </form>
             </div>
		</section>
            </div>
	<?php include("footer.php"); ?>
    </div>
    </div>
      <script src="js/backToTop.js"></script>
    <script src="js/index.js"></script>
</body>
</html>