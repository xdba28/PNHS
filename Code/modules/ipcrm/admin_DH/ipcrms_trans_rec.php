<!DOCTYPE html>
<html lang="en" >
    <?php
    include("../func.php");
	include("../dbcon.php");
	include("../session.php");
	
	$name=mysqli_query($mysqli,"SELECT concat(p_fname,' ',p_lname) as Name,job_title_name, dept_ID FROM pims_personnel,pims_employment_records,pims_job_title
	WHERE pims_personnel.emp_no=pims_employment_records.emp_no
	AND pims_job_title.job_title_code=pims_employment_records.job_title_code
	AND pims_personnel.emp_no=$emp");
	$nrow=mysqli_fetch_assoc($name);
	$_SESSION['job_title']=$nrow['job_title_name'];	
	$jt=$_SESSION['job_title'];
	$dept_ID=$nrow['dept_ID'];	
	
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

			<div class="page-title" align="center"><span>Transaction Record</span></div>	
								<br><br>   			
								<div class="container-fluid" style="background-color:#bbb">
										<br>
										<!-- /.panel-heading -->
                                            <form method="POST">
											<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
												<thead style="background-color:#224867; color:white">
													<tr align="center" >
													  <th><strong><center>ID</strong></th></center>
													  <th><strong><center>Personnel's Name</strong></th></center>
													  <th><strong><center>Department</strong></th></center>
													  <th><strong><center>Form</strong></th></center>                           
													  <th><strong><center>Status</strong></th></center>
													  <th><strong><center>Action</strong></th></center>
													</tr>
												</thead>

													<tbody>
													<?php
													$pending = mysqli_query($mysqli,"SELECT distinct(pims_personnel.emp_No) as emp_No,Status, pims_personnel.P_fname, pims_personnel.P_mname, pims_personnel.P_lname, pims_department.dept_name, Status
													FROM pims_personnel, pims_department, pims_employment_records, ipcrms_content
													WHERE pims_personnel.emp_No = pims_employment_records.emp_No
													AND pims_employment_records.dept_ID = pims_department.dept_ID
													AND ipcrms_content.emp_No = pims_personnel.emp_No and pims_department.dept_ID=$dept_ID and Status='Pending'
													");
													$count = 1;
													while($pend = mysqli_fetch_assoc($pending))
													{
													?>
														<tr>
															<td><?php echo $count ?></td>
															<td><?php echo $pend['P_fname']; ?> <?php echo $pend['P_lname']; ?></td>
															<td><?php echo $pend['dept_name']; ?></td>
															<td>
																<div class="margin" align="center">
																	<div class="btn-group">
																		<a href="view2.php?emp=<?php echo $pend['emp_No']; ?>"> 
																		<button type="button" class="form-control btn btn-warning" >View</button>
																	</div>
																</div>
															</td>
																	
															<td><center><span class="label label-danger"><?php echo $pend['Status']; ?></span></center></td>
															<td>
																<div class="margin" align="center">
																	<?php 
																		if($pend['Status']=="Pending"){
																	?>
																		<div class="btn-group">
																			<input type="hidden" name="emp<?php echo $count; ?>" value="<?php echo $pend['emp_No']; ?>">
																			<button name="ver<?php echo $count; ?>" class="btn btn-primary">Verify</button>
																		</div>
																</div>
															</td>
																	<?php	
																		}else{ ?>
																			<div class="btn-group">
																				<button disabled  class="btn btn-primary">Verified!</button>
																			</div></td>
																	<?php		
																	}
																	?>
														</tr>        
																	<?php 
																	if(isset($_POST['ver'.$count])){
																		$emplo=$_POST['emp'.$count];
																		$upda=mysqli_query($mysqli,"UPDATE ipcrms_content SET Status='Verified' WHERE emp_no=$emplo ");
																		if($upda){
																			echo "<script>alert('Form Verified!'); window.location.href='ipcrms_trans_rec.php';</script>";
																		}else{
																			echo "<script>alert('Error! Form not Verified!'); window.location.href='ipcrms_trans_rec.php';</script>";
																		}
																	}
																	$count++;
																	
																	}
																	?>
																
																
												</tbody>
											</table>
                                            </form>		
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