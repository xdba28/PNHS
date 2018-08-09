<?php
session_start();
include_once('../db_con_i.php');
include('../session.php');

$get_section = $mysqli->query("SELECT SECTION_NAME, YEAR_LEVEL FROM css_section, css_school_yr
								WHERE css_section.sy_id = css_school_yr.sy_id
								AND css_school_yr.status = 'active'")
                        or die("<script>alert('Error fetching sections');</script>");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Browser's Tab Title -->
	<title>PAG-ASA National High School</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">
    <!-- Optional theme -->
	<link rel="stylesheet" href="../css/w3/w3.css">
	<link rel="stylesheet" href="../css1/style.css">
    
    <!-- MetisMenu CSS -->
    <link href="../Template%20(reference)/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../Template%20(reference)/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../Template%20(reference)/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../Template%20(reference)/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!--Include your modified CSS below as needed-->
    <link rel="stylesheet" href="../css/w3/blue.css">
    <link rel="stylesheet" href="../css/w3/yellow.css">
    <link rel="stylesheet" href="../css/w3/red.css">
    <link rel="stylesheet" href="../css/w3/w3.css">
    <link rel="stylesheet" href="../css/sideNav.css">
    <link rel="stylesheet" href="../css/backToTop.css">
    <link rel="stylesheet" href="../css/button.css">

    <!-- Browser's Tab Image -->
    <link rel="shortcut icon" href="../docs/pnhs_img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../docs/img/pnhs_favicon.ico" type="image/x-icon">
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script href="../Template%20(reference)/vendor/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script href="../Template%20(reference)/vendor/bootstrap/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!-- jQuery -->
	<script src="../Template%20(reference)/vendor/jquery/jquery.min.js"></script>
</head>

<body>
<?php include("../topnav.php");?>
	<div style="padding-top:30px;" id="wrapper">
		<?php include("../sidenav.php");?>
   
<div class="container-fluid w3-card-2" style="max-width:1105px; height:70px; margin:50px 0px 0px 40px; border-radius:8px;background-color:#356d9a; color:#dfe7ef;">
    <ul class="nav">
        <li><center><h1>Student Information Form</h1></center></li>
    </ul>
</div>

<!-- form -->
<form name="stu" action="process/add_process.php" method="post" enctype="multipart/form-data">


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-md-4 w3-center">
            <div class="container thumbnail w3-card-4" style="max-width:200px; height:200px; margin-top:25px;position:relative">
                <img src="../docs/img/2x2.png">
                <!-- <button type="button" class="button button5"><i class="fa fa-camera"></i></button> -->
            </div>
			<center>
			<input type="file" name="pic" id="pic" style="margin-left:30px">
			</center>
        </div>
        
        <div class="col-lg-9 col-md-8">
            <div class="panel-body" style="max-width:750px; height:100%; margin-top:10px">
                <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#General" data-toggle="tab"><h3>General</h3></a></li>
                    <li><a href="#Parents" data-toggle="tab"><h3>Parents/Guardian</h3></a></li>
                    <li><a href="#AcRec" data-toggle="tab"><h3>Academic Record</h3></a></li>
                </ul>
                
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="General">
                        <h4><b>General Information</b></h4> 
                        <div class="table-responsive">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>LRN</td>
                                        <td><input type="text" maxlength="10" required class="form-control" name="lrn" id="lrn"></td>
                                    </tr>
                                    <tr>
                                        <td>Name</td>
                                        <td><input required class="form-control" placeholder="First" name="first" id="first"></td>
                                        <td><input required class="form-control" placeholder="Middle" name="middle" id="middle"></td>
                                        <td><input required class="form-control" placeholder="Last" name="last" id="last"></td>
                                    </tr>
                                    <tr>
                                        <td>Date of Birth</td>
                                        <td><input required class="form-control" type="date" name="birth"></td>
                                    </tr>
                                    <tr>
                                        <td>Place of Birth</td>
                                        <td><input required class="form-control" name="plc_birth" id="plc_birth"></td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td><input class="form-control" placeholder="House number" name="house_no" id="house_no"></td>
                                        <td><input class="form-control" placeholder="Street" name="street" id="street"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input required class="form-control" placeholder="Barangay" name="brng" id="brng"></td>
                                        <td><input required class="form-control" placeholder="Municipality" name="munic" id="munic"></td>
                                    </tr>
                                    <tr>
                                        <td>Sex</td>
                                        <td><select class="form-control" name="gender" id="gender">
                                                <option value="none">--</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                </select></td>
                                    </tr>
                                    <tr>
                                        <td>Religion</td>
                                        <td><input required class="form-control" name="religion" id="religion"></td>
                                    </tr>
                                    <tr>
                                        <td>Mother Tongue</td>
                                        <td><input required class="form-control" name="m_tounge" id="m_tounge"></td>
                                    </tr>
                                    <tr>
                                        <td>Ethnic</td>
                                        <td><input class="form-control" name="ethnic" id="ethnic"></td>
                                    </tr>
                                    <tr>
                                        <td>Grade Level & Section</td>
                                        <td>
											<select class="form-control" name="section" id="section">
                                            <option value="none">--</option>
                                            <?php
                                                while($row = mysqli_fetch_array($get_section))
                                                {
                                                    echo '<option value='. $row['YEAR_LEVEL'] ."-". $row['SECTION_NAME'] . '>' . $row['YEAR_LEVEL'] . " - " . $row['SECTION_NAME'] . '</option>'; 
                                                }
                                                ?>
											</select>
										</td>
                                    </tr>
                                    <tr>
                                        <td>School Year</td>
                                        <td>
											<?php
												$get_sy = $mysqli->query("SELECT year FROM css_school_yr WHERE status = 'active'")
																		or die("<script>alert('Error geting School Year');</script>");

												$res = $get_sy->fetch_assoc();
											?>
											<input readonly required class="form-control" value="<?php echo $res['year']?>">
											<input hidden required class="form-control" name="sy" value="<?php echo $res['year']?>">
										</td>
                                    </tr>
                                    <tr>
                                        <td>Transfer In Date</td>
                                        <td><input class="form-control" type="date" name="transfer_date"></td>
                                        <td><small><sup>*To be filled only if the student is transferee</sup></small></td>
									</tr>
									<tr>
										<td>Elementary School</td>
										<td><input type="text" required class="form-control" name="elem"></td>
									</tr>
									<tr>
                                        <td>Cellphone Number &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
                                        <td><input type="number" class="form-control" name="contact" id="contact"></td>
									</tr>
									<tr>
										<td>Accelerated</td>
										<td>
											<select class="form-control" name="acce" id="acce">
												<option> --</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
										</td>
									</tr>
									<tr>
										<td>CCT Recepient</td>
										<td><input class="form-control" type="text" name="cct">
										</td>
									</tr>
                                </tbody>
							</table>
							<br>
                            <button class="btn w3-hover-green btn-success w3-card-2" type="submit" >
                            <i class="fa fa-check">
							</i>&nbsp;Submit</button>

							<form action="student_list.php" id="cancel">
							<a href="student_list.php">
                            <button form="cancel" class="btn w3-hover-red w3-theme-rl1 w3-card-2">
                            <i class="fa fa-close"></i>&nbsp;Cancel
							</button></a>
							</form>
						</div>

                                            
                            

                    </div>
                    <div class="tab-pane" id="Parents">
                        <h4><b>Parents Information</b></h4>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Father's Name</td>
                                        <td><input class="form-control" required placeholder="First" name="f_fname" id="f_fname"></td>
                                        <td><input class="form-control" required placeholder="Middle" name="f_mname" id="f_mname"></td>
										<td><input class="form-control" required placeholder="Last" name="f_lname" id="f_lname"></td>
									</tr>
									<tr>
										<td>Father's Extention Name</td>
										<td><input type="text" class="form-control" placeholder="eg. Jr. Sr." name="F_ext"></td>
									</tr>
                                    <tr>
										<td>Father's Occupation</td>
										<td><input type="text" class="form-control" name="f_work"></td>
                                    </tr>
									<tr>
										<td>Father's Contact</td>
                                        <td><input type="number" class="form-control" placeholder="###" name="cont_f" id="cont_f"></td>
									</tr>
                                    <tr>
                                        <td>Mother's Name</td>
                                        <td><input class="form-control" required placeholder="First" name="m_fname" id="m_fname"></td>
                                        <td><input class="form-control" required placeholder="Middle" name="m_mname" id="m_mname"></td>
                                        <td><input class="form-control" required placeholder="Last" name="m_lname" id="m_lname"></td>
									</tr>
									<tr>
										<td>Mother's Extention Name</td>
										<td><input type="text" class="form-control" placeholder="eg. Jr. Sr." name="M_ext"></td>
									</tr>
									<tr>
										<td>Mother's Occupation</td>
										<td><input type="text" class="form-control" name="m_work" id="m_work"></td>
									</tr>
                                    <tr>
                                        <td>Mother's Conctact</td>
                                        <td><input type="number" class="form-control" placeholder="###" name="cont_m" id="cont_m"></td>
                                    </tr>
                                    <tr>
                                        <td>Guardian's Name</td>
                                        <td><input class="form-control" placeholder="First" name="g_fname" id="g_fname"></td>
                                        <td><input class="form-control" placeholder="Middle" name="g_mname" id="g_mname"></td>
                                        <td><input class="form-control" placeholder="Last" name="g_lname" id="g_lname"></td>
                                        <td><small><sup>*To be filled only if the student is in guardianship</sup></small></td>
									</tr>
									<tr>
										<td>Guardian's Extention Name</td>
										<td><input type="text" class="form-control" placeholder="eg. Jr. Sr." name="G_ext"></td>
									</tr>
                                    <tr>
                                        <td>Guardian's Relationship</td>
                                        <td><input class="form-control" name="rela" id="rela"></td>
                                    </tr>
                                    <tr>
                                        <td>Guardian's Contact</td>
                                        <td><input class="form-control" type="number" placeholder="###" name="cont_g" id="cont_g"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <button class="btn w3-hover-green btn-success w3-card-2" type="submit" >
                            <i class="fa fa-check">
                            </i>&nbsp;Submit</button>
                            
                            <a href="student_list.php">
                            <button form="cancel" class="btn w3-hover-red w3-theme-rl1 w3-card-2">
                            <i class="fa fa-close"></i>&nbsp;Cancel
                            </button></a>
                        </div>
                    </div>

                    <div class="tab-pane" id="AcRec">
                        <h4><b>Input Past Grade</b></h4>
                        <div class="table-responsive">

							
							<input type="file" name="past" id="past">

                            <br>
                            <button class="btn w3-hover-green btn-success w3-card-2" type="submit" >
                            <i class="fa fa-check">
                            </i>&nbsp;Submit</button>
                            
                            <a href="student_list.php">
                            <button form="cancel" class="btn w3-hover-red w3-theme-rl1 w3-card-2">
                            <i class="fa fa-close"></i>&nbsp;Cancel
                            </button></a>
                        </div>
					</div>

					<div class="tab-pane" id="Parents">
                        <h4><b>Parents Information</b></h4>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Father's Name</td>
                                        <td><input class="form-control" required placeholder="First" name="f_fname" id="f_fname"></td>
                                        <td><input class="form-control" required placeholder="Middle" name="f_mname" id="f_mname"></td>
										<td><input class="form-control" required placeholder="Last" name="f_lname" id="f_lname"></td>
									</tr>
									<tr>
										<td>Father's Extention Name</td>
										<td><input type="text" class="form-control" placeholder="eg. Jr. Sr." name="F_ext"></td>
									</tr>
                                    <tr>
										<td>Father's Occupation</td>
										<td><input type="text" class="form-control" name="f_work"></td>
                                    </tr>
									<tr>
										<td>Father's Contact</td>
                                        <td><input type="number" class="form-control" placeholder="###" name="cont_f" id="cont_f"></td>
									</tr>
                                    <tr>
                                        <td>Mother's Name</td>
                                        <td><input class="form-control" required placeholder="First" name="m_fname" id="m_fname"></td>
                                        <td><input class="form-control" required placeholder="Middle" name="m_mname" id="m_mname"></td>
                                        <td><input class="form-control" required placeholder="Last" name="m_lname" id="m_lname"></td>
									</tr>
									<tr>
										<td>Mother's Extention Name</td>
										<td><input type="text" class="form-control" placeholder="eg. Jr. Sr." name="M_ext"></td>
									</tr>
									<tr>
										<td>Mother's Occupation</td>
										<td><input type="text" class="form-control" name="m_work" id="m_work"></td>
									</tr>
                                    <tr>
                                        <td>Mother's Conctact</td>
                                        <td><input type="number" class="form-control" placeholder="###" name="cont_m" id="cont_m"></td>
                                    </tr>
                                    <tr>
                                        <td>Guardian's Name</td>
                                        <td><input class="form-control" placeholder="First" name="g_fname" id="g_fname"></td>
                                        <td><input class="form-control" placeholder="Middle" name="g_mname" id="g_mname"></td>
                                        <td><input class="form-control" placeholder="Last" name="g_lname" id="g_lname"></td>
                                        <td><small><sup>*To be filled only if the student is in guardianship</sup></small></td>
									</tr>
									<tr>
										<td>Guardian's Extention Name</td>
										<td><input type="text" class="form-control" placeholder="eg. Jr. Sr." name="G_ext"></td>
									</tr>
                                    <tr>
                                        <td>Guardian's Relationship</td>
                                        <td><input class="form-control" name="rela" id="rela"></td>
                                    </tr>
                                    <tr>
                                        <td>Guardian's Contact</td>
                                        <td><input class="form-control" type="number" placeholder="###" name="cont_g" id="cont_g"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <button class="btn w3-hover-green btn-success w3-card-2" type="submit" >
                            <i class="fa fa-check">
							</i>&nbsp;Submit</button>
							
                            <a href="student_list.php">
                            <button form="cancel" class="btn w3-hover-red w3-theme-rl1 w3-card-2">
                            <i class="fa fa-close"></i>&nbsp;Cancel
                            </button></a>
							</form>
                        </div>
					</div>
                </div>
            </div>
		</div>
	
    </div>
<script src='../js1/jquery.min.js'></script>
<script src='../js1/bootstrap.min.js'></script>
<script src="../js/index.js"></script>
<script src="../../../js/metisMenu.min.js"></script>
<script src="../../../js/sb-admin-2.min.js"></script>


<script src="../js/sweetalert.js"></script>

<script>
	// function validate()
	// {
	// 	var lrn = document.forms["stu"]["lrn"].value;
	// 	var f_fname = document.forms["stu"]["f_fname"].value;
	// 	var f_mname = document.forms["stu"]["f_mname"].value;
	// 	var f_lname = document.forms["stu"]["f_lname"].value;
	// 	var m_fname = document.forms["stu"]["m_fname"].value;
	// 	var m_mname = document.forms["stu"]["m_mname"].value;
	// 	var m_lname = document.forms["stu"]["m_lname"].value;
	// 	if(!isNaN(lrn));
	// 	else
	// 	{
	// 		swal('LRN is not numeric!');
	// 		return false
	// 	}

	// 	if(f_fname == '' || f_mname == '' || f_lname == '')
	// 	{
	// 		swal('Father\'s full name input required');
	// 		return false;
	// 	}

	// 	if(m_mname == '' || m_mname == '' || m_lname == '')
	// 	{
	// 		swal('Mother\'s full name input required');
	// 		return false;
	// 	}
	// }
</script>
    
<!-- Bootstrap Core JavaScript -->
<script src="../Template%20(reference)/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });
});
</script>
</div>
	</div>
<?php include("../footer.php"); ?>
</body>

</html>
