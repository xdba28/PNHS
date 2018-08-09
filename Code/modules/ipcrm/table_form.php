<!DOCTYPE html>
<html lang="en" >
    <?php
    include("func.php");
    include("dbcon.php");
    include("session.php");
    
    $name=mysqli_query($mysqli, "SELECT concat(p_fname,' ',p_lname) as Name,job_title_name,pims_employment_records.job_title_code FROM pims_personnel,pims_employment_records,pims_job_title
    WHERE pims_personnel.emp_no=pims_employment_records.emp_no
    AND pims_job_title.job_title_code=pims_employment_records.job_title_code
    AND pims_personnel.emp_no=$emp");
    $nrow=mysqli_fetch_assoc($name);
    $_SESSION['job_title']=$nrow['job_title_code']; 
    $jt=$_SESSION['job_title'];
    $jtn=$nrow['job_title_name'];   
    ?>
    
    <head>
        <meta charset="UTF-8">
        <title>PAG-ASA National High School</title>
        <link href="http://fonts.googleapis.com/css?family=Dosis:400,500,700" rel="stylesheet" type="text/css">
        <link rel='stylesheet prefetch' href='pages/css/bootstrap.min.css'>
        <link rel="icon" href="docs/img/pnhs_favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="pages/css/style.css">
        <link rel="stylesheet" href="pages/css/w3.css">
        <link rel="stylesheet" href="admin_SH/css/ayuson.css">
        <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css" type="text/css">
        <!-- MetisMenu CSS -->
        <link href="pages/css/sb-admin-2.css" rel="stylesheet">
        <link href="pages/css/metisMenu.min.css" rel="stylesheet">
        <style>
            table {
                background-color: #ccddff;
            }
            table,th,td{
                border: 1px solid #8f8f8f !important;
                border-collapse: collapse !important;
            }
            .centermid1
            {
                width: 1020px;
                margin:auto;

            }
            #deadline
            {
              display: show;
              position: fixed;
              bottom: 150px;
              opacity:0.5;
            }
            #deadline:hover {
             opacity:1;
            }
        </style>
    </head>
    
      
<body>  

<?php 
        include("topnav_user.php");
        ?>
    
        <div id="wrapper">
            <?php 
                include("sidenav_user.php");
            ?>


 <br><br><br><br><br><br><br>
								<div id="toupdate">
								<div class="container" style="max-width:500px;">
									<div class="content update">
										<div class="modal-header" style="background-color:#356d9a; border-top-left-radius:6px; border-top-right-radius:6px; padding:5px" align="left">
												<b><label style="color:white; font-size:20px; margin-left:10px"><span class="fa fa-edit" aria-hidden="true"></span>&nbsp;IPCR HISTORY</label><br></b>
										</div>
										<div class="modal-body" align="left" style="margin-left:35px"><br>
										<?php 
										$date = mysqli_query($mysqli,"SELECT distinct(date_submitted) as date from ipcrms_content where emp_no=$emp");
										while($dt = mysqli_fetch_assoc($date)){
											$ds = $dt['date'];
											echo'<strong>Date Submitted: '.$ds.'</strong>  ';
										}
										?>
										
										
											<br><br><br>
											<a class="btn btn-danger" style="margin-left:140px" href="../ipcrm/form_history.php">View Form</a>
										</div>
									</div>
								</div>
							</div>
<br><br><br>
 

<!-- /.navbar-collapse -->
    
<br><br><br><br><br><br><br>


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
           

    </body>                                       

<SCRIPT>
 function checkButton(element){
  element.checked = true;
}
 </SCRIPT>
 

       
            <script src='pages/js/jquery.min.js'></script>
            <script src='pages/js/bootstrap.min.js'></script>
            <script  src="pages/js/index.js"></script>

            <script src='pages/js/sb-admin-2.min.js'></script>
            <script src='pages/js/metisMenu.min.js'></script>
    </body>
</html>