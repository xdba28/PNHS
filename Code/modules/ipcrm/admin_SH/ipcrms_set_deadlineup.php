<!DOCTYPE html>
<html lang="en" >
    <?php
    include("func.php");
	include("dbcon.php");
	include("../session.php");
	
	$name=mysql_query("SELECT concat(p_fname,' ',p_lname) as Name,job_title_name, pims_job_title.job_title_code as job_title_code FROM pims_personnel,pims_employment_records,pims_job_title
	WHERE pims_personnel.emp_no=pims_employment_records.emp_no
	AND pims_job_title.job_title_code=pims_employment_records.job_title_code
	AND pims_personnel.emp_no=$emp");
	$nrow=mysql_fetch_assoc($name);
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
    </head>
    <body>
		<div id="wrapper">
						
			<?php 
			include("../sidenav.php");
            include("../navbar.php");

			?>
			
<br><br>
		<div class="container-fluid" style="max-width:100%;margin-right:100px;margin-left:100px">
		<article>
				<div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="display:none">
                            </div>
<div class="container-fluid" align="center">                   
					<thead>							
	<div class="container-fluid">
					<!-- Page Heading -->
					<div class="row">
						<div class="col-lg-13">
							<h3 class="page-header">
								<center>
                        <ul class="w3-ul w3-border-top">
                            <li class="w3-theme-bd4">
                                    <strong>Set Deadline</strong> 
                            </li>
                        </ul>    
                                 </center>
                            </h3> 
						</div>
					</div>
    </div>
    <article>	
    			
    <div class="panel-body">
                    <div class="modal-body" style="padding:20px 80px;">

                        <form method="post" action="../admin_SH/ipcrms_set_deadlineup.php" >
                       <p><font size="4" color="black">
                            <strong>UPDATE DEADLINE</strong> </font></p>
                                <br>
                            <p>
                                
                                <?php
                                $ifded=mysql_query("Select * from ipcrms_due_date");
                                while ($ifd=mysql_fetch_assoc($ifded)) {
                                $uodt=$ifd['rp_date'];
                                echo $uodt;
                            }
                                ?>


                            </p>
                        <font size="2" color="black">
                                <strong>Set Date: </strong>
                                    <input type="date" id="up_startdate" name="up_startdate">
                                &nbsp;&nbsp;&nbsp;
                                             </font>
                        <br><br><br>
                        <button type="submit" name="update" class="btn btn-primary">UPDATE</button>
                        <?php

                        if(isset($_POST['update'])){
                            $date=$_POST['up_startdate'];
                            $upd=mysql_query("UPDATE ipcrms_due_date SET rp_date='$date'  ");


                        }
                    
                    
                
                ?>
                    </form>

                       
                        
 <!--
                        <p><font size="4" color="black">
                            <strong>DEADLINE OF SUBMISSION</strong> </font></p>
                  
                        <font size="2" color="black">
                                <strong>Date Setted:</strong>
                        </font>
                        <br>                   
                        <font size="2" color="black">
                            <strong>January 18,2018</strong>
                            <br> (on or before)
                        </font>
                        <br><br><br>
                        <button type="edit" name="edit" class="btn btn-primary">UPDATE</button>  
                        -->


                         
                       
					</div>
            </div>
		</div>
    </div>
   </center>
</div>
</div>	
</article>

    </div>
    </div>
			
		</div>
			
<br><br><br><br>	

			<?php include("footer.php"); ?>

		
						<script src='pages/js/jquery.min.js'></script>
						<script src='pages/js/bootstrap.min.js'></script>
						<script  src="pages/js/index.js"></script>
    </body>
</html>

<?php
if(isset($_POST['submit'])){
	$edit_startdate = $_POST['edit_startdate'];
	   
		
 	$sy=mysql_query("Select * from css_school_yr where status='active'");
    while($syid = mysql_fetch_assoc($sy)){
    $sid=$syid['sy_id'];


     $insert_pub="INSERT INTO ipcrms_due_date (rp_date,sy_id) values 
     
  ('$edit_startdate','$sid')";

 
	$insert_pro = mysql_query($insert_pub);
	
	if($insert_pro){
		echo "<script>alert('Deadline of Submission has been send!');window.location.href='../admin_SH/ipcrms_set_deadline.php';</scipt>";
		
		
	}
}
}
?>


