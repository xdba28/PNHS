<!DOCTYPE html>
<html lang="en" >
    <?php
    include("../func.php");
	include("../dbcon.php");
	include("../session.php");
	
	$name=mysqli_query($mysqli, "SELECT concat(p_fname,' ',p_lname) as Name,job_title_name, pims_job_title.job_title_code as job_title_code FROM pims_personnel,pims_employment_records,pims_job_title
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
		<!-- DataTables CSS -->
	    <link href="pages/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
	    <link href="pages/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
	    <!-- DataTables Responsive CSS -->
	    <link href="pages/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
		<!-- MetisMenu CSS -->
		<link href="pages/css/sb-admin-2.css" rel="stylesheet">
		<link href="pages/css/metisMenu.min.css" rel="stylesheet">

    </head>
    <body>
	  <?php 
		include("topnav.php");
		?>
	
        <div id="wrapper">
            <?php 
				include("sidenav.php");
			?>  	
<br>					


<br><br><br>	
<div class="page-title" align="center"><span>Update Form</span></div>	
								<br>
								
								<div id="toupdate">
								<div class="container" style="max-width:700px;">
									<div class="content update">
										<div class="modal-header" style="background-color:#356d9a; border-top-left-radius:6px; border-top-right-radius:6px; padding:5px" align="left">
												<b><label style="color:white; font-size:20px; margin-left:10px"><span class="fa fa-edit" aria-hidden="true"></span>&nbsp;To Update the Form</label><br></b>
										</div>
										<div class="modal-body" align="left" style="margin-left:35px"><br>
										• Click the field to edit
										<br>• Give the required information 
										<br>• Enter the new content for updates
										<br>• If done, Click the UPDATE button.    
										
											<br>
											<br>
											<a class="btn btn-danger" style="margin-left:510px" href="update_kra.php">Edit Form</a>
										</div>
									</div>
								</div>
							</div>
<br><br>
 

<!-- /.navbar-collapse -->
    
<br><br><br><br><br><br>


<?php include("footer.php"); ?>
</div>
            <script src='pages/js/jquery.min.js'></script>
            <script src='pages/js/bootstrap.min.js'></script>
            <script  src="pages/js/index.js"></script>

            <script src='pages/js/sb-admin-2.min.js'></script>
            <script src='pages/js/metisMenu.min.js'></script>
        
<style>
											.styleHEAD{
												font-family: 'Montserrat', sans-serif;
												font-size: 15px;
												}
											.styleBODY{
												background-color:#a0d0a0;font-family: 'Montserrat', sans-serif;
												font-size: 30px; color:white;
											}
											.update
											{
												border: 1px solid;
												border-radius: 6px;
												border-color: gray;
											}
											</style>
<?php
if(isset($_POST['submit'])){
	
	    $edit_startdate = $_POST['edit_startdate'];
		
 	
     $insert_pub="INSERT INTO ipcrms_due_date (rp_date) values 
  ('$edit_startdate')";
 
	$insert_pro = mysqli_query($insert_pub);
	
	if($insert_pro){
		echo "<script> alert('Deadline of Submission has been seen!')</script>";
		echo "<script>window.open('ipcrms_update.php', '_self')</script>";
		
	}
}

?></body>
    </html>