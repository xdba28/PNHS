<!DOCTYPE html>
<html lang="en" >
    <?php
    include("../func.php");
	include("../dbcon.php");
	include("../session.php");
	
	$name=mysqli_query($mysqli,"SELECT concat(p_fname,' ',p_lname) as Name,job_title_name, pims_job_title.job_title_code as job_title_code FROM pims_personnel,pims_employment_records,pims_job_title
	WHERE pims_personnel.emp_no=pims_employment_records.emp_no
	AND pims_job_title.job_title_code=pims_employment_records.job_title_code
	AND pims_personnel.emp_no=$emp");
	$nrow=mysqli_fetch_assoc($name);
	$_SESSION['job_title']=$nrow['job_title_name'];
	$_SESSION['job_code']=$nrow['job_title_code'];
	
    ?>
    <head>
        <meta charset="UTF-8">
        <title>PAG-ASA National High School</title>
        <link href="http://fonts.googleapis.com/css?family=Dosis:400,500,700" rel="stylesheet" type="text/css">
        <link rel='stylesheet prefetch' href='pages/css/bootstrap.min.css'>
        <link rel="icon" href="docs/img/pnhs_favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="pages/css/style.css">
        <link rel="stylesheet" href="pages/css/w3.css">
		<link rel="stylesheet" href="css/ayuson.css">
		<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css" type="text/css">
    </head>
    <body>
	  <?php 
		include("topnav.php");
		?>
	
        <div id="wrapper">
            <?php 
				include("sidenav.php");
			?>
			
			<br><br><br><br>
			<div class="page-title" align="center"><span>Set Deadline</span></div>
					<div class="container-fluid" align="center">                   											
					<div class="modal-body" style="padding:20px 80px;">
                        <p><font size="4" color="black">
                            <strong>SETTING DEADLINE</strong> </font></p>
                                <br>
                        <font size="2" color="black">
                                <strong>Set Date: </strong>
                                    <input type="date" id="edit_startdate" name="edit_startdate">
                                &nbsp;&nbsp;&nbsp;
                                             </font>
                        <br><br>
                        <button type="submit" name="submit" class="btn btn-primary">SUBMIT</button>
                         <!--p><font size="4" color="black">
						   <br><br>
                            <strong>DEADLINE OF SUBMISSION</strong> </font></p>
                  
                        <font size="2" color="black">
                                <strong>Date Setted:</strong>
                        </font>
                        <br>                   
                        <font size="2" color="black">
                            <strong>January 18,2018</strong>
                            <br> (on or before)
                        </font>
                        <br><br>
                        <button type="edit" name="edit" class="btn btn-primary">UPDATE</button--->
    
					</div>
		</div>
<br><br><br><br><br><br><br><br><br><br><br><br>

			<?php include("footer.php"); ?>
    </div>	


		
						<script src='pages/js/jquery.min.js'></script>
						<script src='pages/js/bootstrap.min.js'></script>
						<script  src="pages/js/index.js"></script>
						
						<script src='pages/js/sb-admin-2.min.js'></script>
            <script src='pages/js/metisMenu.min.js'></script>
    </body>
</html>

<?php
if(isset($_POST['submit'])){
	
	    $edit_startdate = $_POST['edit_startdate'];
		
 	
     $insert_pub=mysqli_query($mysqli,"INSERT INTO ipcrms_due_date (rp_date) values 
  ('$edit_startdate')");
 
	$insert_pro = mysqli_query($insert_pub);
	
	if($insert_pro){
		echo "<script> alert('Deadline of Submission has been seen!')</script>";
		echo "<script>window.open('ipcrms_index2.php', '_self')</script>";
		
	}
}

?>