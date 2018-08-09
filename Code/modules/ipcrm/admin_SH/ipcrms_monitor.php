
<!DOCTYPE html>
<html lang="en" >
    <?php
	
	date_default_timezone_set('Asia/Manila');
	$date=date("F-t-Y");
	
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
		<br><br><br><br>	
		<div class="container-fluid" style="max-width:100%;margin-right:100px;margin-left:100px">

			<div class="page-title" align="center"><span>Submissions</span></div>	
								<br><br>   			
								<div class="container-fluid" style="background-color:#bbb">
										<br>
										<!-- /.panel-heading -->
                                            <form method="POST">
											<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
												<thead style="background-color:#224867; color:white">
													<tr align="center" >
													<th>ID</th>
													<th>Personnel's Name</th>
													<th>Department</th>
													<th>Date Submitted</th>
													<th>Deadline</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>
												<?php 
												$pers=mysqli_query($mysqli,"SELECT distinct(emp_no) fROM ipcrms_content");
												
												$count = 1;
												while($prow=mysqli_fetch_assoc($pers)){
													$n=mysqli_query($mysqli,"SELECT count(score) as cn FROM ipcrms_content WHERE emp_no=".$prow['emp_no']."");
													while($nrow=mysqli_fetch_assoc($n)){
															$score=mysqli_query($mysqli,"SELECT (sum(score)/".$nrow['cn'].") as tot,concat(p_fname,' ',p_lname) as Name,ipcrms_content.emp_no, pims_department.dept_name,  date_submitted FROM ipcrms_content,pims_personnel, pims_department, pims_employment_records WHERE ipcrms_content.emp_no=pims_personnel.emp_no AND ipcrms_content.emp_no=".$prow['emp_no']."
															AND pims_employment_records.emp_No = pims_personnel.emp_No
															and pims_employment_records.dept_ID = pims_department.dept_ID");
															while($scrow=mysqli_fetch_assoc($score)){
															?>
															<tr class="gradeC">
																<td><?php echo $count ?></td>
																<td><?php echo $scrow['Name']; ?></td>
																<td><?php echo $scrow['dept_name']; ?></td>
																<td class="center"><?php echo $scrow['date_submitted']; ?></td>
																<?php $ded=mysqli_query($mysqli,"SELECT css_school_yr.sy_id FROM css_school_yr, ipcrms_due_date where css_school_yr.sy_id=ipcrms_due_date.sy_id");?>
																<td class="center">
																<?php
																	$ded=mysqli_query($mysqli,"SELECT rp_date from ipcrms_due_date, css_school_yr where css_school_yr.sy_id=ipcrms_due_date.sy_id and css_school_yr.status='active'");
																	$line=mysqli_fetch_assoc($ded);
																	echo $line['rp_date'];
																	
																?></td>
																</td>
																<td <div class="margin" align="center">
																	<div class="btn-group">
																		<?php
																			if($scrow['date_submitted']<=$line['rp_date']){
																				echo "<span class='alert-sm alert-success'>ON TIME</span>";
																			}else{
																				echo "<span class='alert-sm alert-danger'>LATE</span>";
																			}
																		?>
																	</div>
																	</div>
																</td>
													
															</tr>
														<?php
												
																			
																		}
																}
																
															
															$count++;
															}
														?>

											</tbody>
										</table>
										<!-- /.table-responsive -->
									</div>	
								</div>
			<br><br><br><br><br><br><br><br>
					<?php include("footer.php");?>
			</div>
    </body>
							
  <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>
	
	<script src="../dist/js/sb-admin-2.js"></script>
	
	<!-- DataTables JavaScript -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>


    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
	
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
    <style>
.table-hover>thead>tr:hover {
    background-color: #224867;
}
table {
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid black!important;
}  
    </style>
	
</html>