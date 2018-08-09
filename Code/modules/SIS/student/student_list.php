<!DOCTYPE html>
<html lang="en" >
	<?php
	include("../db_con_i.php");
	session_start();
    include("../modal.php");
	include("../session.php");
    ?>
    <head>
        <meta charset="UTF-8">
        <title>PAG-ASA National High School</title>
        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css1/style.css">

    <!-- DataTables CSS -->
    <link href="../Template%20(reference)/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../Template%20(reference)/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="../Template%20(reference)/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    
    <!-- Custom Fonts -->
    <link href="../Template%20(reference)/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!--Include your modified CSS below as needed-->
    <link rel="stylesheet" href="../css/w3/blue.css">
    <link rel="stylesheet" href="../css/w3/yellow.css">
    <link rel="stylesheet" href="../css/w3/red.css">
    <link rel="stylesheet" href="../css/w3/w3.css">
    <link rel="stylesheet" href="../css/backToTop.css">
    <script src="../js/sweetalert.js"></script>

    <!-- Browser's Tab Image -->
    <link rel="shortcut icon" href="../docs/pnhs_img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../docs/img/pnhs_favicon.ico" type="image/x-icon">

    </head>
    <body>
	<?php include("../topnav.php"); ?>   
	<div id="wrapper" style="padding-top:60px">
            <?php include("../sidenav.php"); ?>
                
                <div class="container" style="max-width:1128px;font-size:12px;margin-left:30px">
				<h1 class="page-header w3-center">Student List</h1>
                        <div class="panel panel-default">

                            <!-- /.panel-heading -->
                            <div class="panel-body" id="data">
                                <table width="100%" class="table table-bordered table-striped table-hover" id="dataTables-example">
                                    <center>
									<?php
										$emp = $_SESSION['user_data']['acct']['emp_no'];
										$get_RK = $mysqli->query("SELECT pims_personnel.emp_No as emp_
																	FROM pims_personnel, pims_employment_records, pims_job_title
																	WHERE pims_personnel.emp_No = pims_employment_records.emp_No
																	AND pims_job_title.job_title_code = pims_employment_records.job_title_code
																	AND pims_job_title.job_title_name = 'Record Keeper'")
															or die("<script>alert('Error getting record keeper');</script>");
		
										$res = $get_RK->fetch_assoc();
										
										if($emp == $res['emp_'])
										{
											echo '
											<div class="w3-button w3-circle w3-card-4 w3-theme-bl1" title="Add Student(s)" style="height:50px;width:50px;padding:12px" data-toggle="modal" data-target="#myModal1">
												<i class="fa fa-user-plus fa-2x"> &nbsp;&nbsp;</i>
											</div>
											<a href="student_return.php">
												<div class="w3-button w3-circle w3-card-4 w3-theme-yd4" title="Change Status" style="height:50px;width:50px;padding:12px">
													<i class="fa fa-openid fa-2x"> &nbsp;&nbsp;</i>
												</div>
											</a>
											<div class="w3-button w3-circle w3-card-4 w3-theme-yd4" title="Assign Section" style="height:50px;width:50px;padding:12px" data-toggle="modal" data-target="#myModal3">
												<i class="fa fa-users fa-2x"> &nbsp;&nbsp;</i>
											</div>';
										}
									?>

                                    <div class="w3-button w3-circle w3-card-4 w3-green" title="Process Grade" style="height:50px;width:50px;padding:12px" data-toggle="modal" data-target="#myModal2">
                                        <i class="fa fa-files-o fa-2x"> &nbsp;&nbsp;</i>
									</div>
									
									<h3>School Year: </h3>
									<select id="sel_sy" name="sel_sy">
									<option value="-"> --</option>
									<?php

									$get_sy = $mysqli->query("SELECT year FROM css_school_yr");

										while($row = $get_sy->fetch_array())
										{
											echo
											"<option value=" . $row['year'] . ">". $row['year'] . "</option>";
										}

									?>
									</select>

                                    <thead class="w3-theme-bl1">
                                        <tr>
                                            <th>LRN</th>
                                            <th>Lastname</th>
                                            <th>Firstname</th>
                                            <th>Middlename</th>
                                            <th>Status</th>
                                            <th>Grade Level & Section</th>
                                            <th>School Year</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="TableData">
						<?php
						
							$get_student = $mysqli->query("SELECT sis_stu_rec.lrn, stu_fname, stu_status, stu_lname, stu_mname, year_level, section_name, year 
															FROM sis_student, css_school_yr, sis_stu_rec, css_section 
															WHERE sis_student.lrn = sis_stu_rec.lrn 
															AND sis_stu_rec.sy_id = css_school_yr.sy_id 
															AND sis_stu_rec.section_id = css_section.SECTION_ID 
															AND sis_stu_rec.section_id IS NOT NULL
															ORDER BY sis_stu_rec.lrn")
														or die("<script>alert('Error in getting students');</script>");

									while($row = $get_student->fetch_array())
									{
										$lrn = $row['lrn'];
										$lname = $row['stu_lname'];
										$fname = $row['stu_fname'];
										$mname = $row['stu_mname'];
										echo
										'<tr>
											<td>' . $lrn  . '</td>
											<td>' . $row['stu_lname'] . '</td>
											<td>' . $row['stu_fname'] . '</td>
											<td>' . $row['stu_mname'] . '</td>
											<td>' . $row['stu_status'] . '</td>';

										echo '
											<td>' . $row['year_level'] . " - " . $row['section_name'] . '</td>
											<td>' . $row['year'] . '</td>'; 

                                    ?>

                                    <td><center>
                                    <a href="student_pi.php?lrn=<?php echo base64_encode($lrn);?>">
                                    <button class="w3-card-4 w3-theme-bl1 w3-hover-blue w3-xsmall" style="border:0;margin-left:10px">
                                    <i class="fa fa-eye" Title="View"></i>
                                    </button>
                                    </a>

                                    <a href="#drp<?php echo $lrn;?>" data-toggle="modal">
                                    <button class="w3-card-4 w3-theme-rl1 w3-hover-red w3-xsmall" style="border:0">
                                    <i class="fa fa-user-times" Title="Drop" data-toggle="modal" data-target="#drp">
                                    </i>
                                    </button>
                                    </a>
									</center>

						<!-- Drop button Modal -->
                        <div class="modal fade" id="drp<?php echo $lrn;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <center><h4 class="modal-title" id="myModalLabel">Are you sure you want to drop this student?</h4></center>
                            </div>
                            <form action="process/drop_student.php" method="post">
                            <div class="modal-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>LRN</th>
                                        <th>Lastname</th>
                                        <th>Firstname</th>
                                        <th>Middlename</th>
                                        <th>Grade Level & Section</th>
                                        <th>School Year</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php 
                                        $modal_get_section = $mysqli->query("SELECT YEAR_LEVEL, SECTION_NAME, year FROM sis_stu_rec, css_section, css_school_yr
                                                                        WHERE sis_stu_rec.section_id = css_section.SECTION_ID
                                                                        AND sis_stu_rec.sy_id = css_school_yr.sy_id
                                                                        AND css_school_yr.status = 'active'
                                                                        AND lrn = $lrn")
                                                                or die("Error: modal_get_section: ".$mysqli->error);

                                        echo 
                                        '<td><input hidden name="lrn" id="lrn" value=' . $lrn . '>' . $lrn . '</td>
                                        <td>'  . $lname . '</td>
                                        <td>'  . $fname . '</td>
                                        <td>'  . $mname . '</td>';

                                        while($row = $modal_get_section->fetch_array())
                                        {
                                            echo
                                                '<td>'. $row['YEAR_LEVEL'] . " - " . $row['SECTION_NAME'] . '</td>
                                                <td>' . $row['year'] . '</td>'; 
                                        }//get_section while end

                                        ?>

                                    </tr>
                                </tbody>
                            </table>
                            </div>
                            <div class="modal-footer"><center>
                            <button type="submit" class="btn w3-hover-green btn-success w3-card-2">
                            &nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                            </button>
                            <button type="button" class="btn w3-hover-red w3-theme-rl1 w3-card-2" data-dismiss="modal">
                            Cancel</button>
                            </center>
                            </div>
                            </form>    
                        </div>
                        </div>
                        </div>  
									
									<?php
									}
									?>              





                                    </tbody>
                                    </center>
                                </table>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                </div>
            </div>    
            <?php include("../footer.php"); ?>
                
<!-- Metis Menu Plugin JavaScript -->
<script src='../js1/jquery.min.js'></script>
<script src='../js1/bootstrap.min.js'></script>
<script src="../js/index.js"></script>
<script src="../../../js/metisMenu.min.js"></script>
<script src="../../../js/sb-admin-2.min.js"></script>


<!-- DataTables JavaScript -->
<script src="../Template%20(reference)/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../Template%20(reference)/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../Template%20(reference)/vendor/datatables-responsive/dataTables.responsive.js"></script>

<script src="../mustache/mustache.js"></script>
<script src="data_js/data_stu_list.js"></script>


<?php
if(isset($_GET['m']))
{
	if($_GET['m'] == 1)
	{
		?>
		<script>
			$(window).on('load', function()
			{
				$('#myModal1').modal('show');
			});
		</script>
		<?php
	}
	elseif($_GET['m'] == 2)
	{
		?>
		<script>
			$(window).on('load', function()
			{
				$('#myModal2').modal('show');
			});
		</script>
		<?php
	
	}
	elseif($_GET['m'] == 3)
	{
		?>
		<script>
			$(window).on('load', function()
			{
				$('#myModal3').modal('show');
			});
		</script>
		<?php
	}	
}


?>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
	});
});
</script>
    </body>
</html>