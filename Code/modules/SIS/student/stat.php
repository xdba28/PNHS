<?php
include_once('../db_con_i.php');
session_start();
include("../session.php");
?>
<!DOCTYPE html>
<html lang="en">
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

    <!-- Browser's Tab Image -->
    <link rel="shortcut icon" href="../docs/pnhs_img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../docs/img/pnhs_favicon.ico" type="image/x-icon">

<style>
#hv {  margin-bottom:10px;
        height:30px;
        width:180px;
        border:none;
        right:-10px;
        bottom:100px;
        padding-left:1px;
        border-radius:16px;
        background:#0a69b7;
        color:white;  
}
#hv:hover {
    background:#085ea4;
}
</style>
    
</head>

<body>
        <?php include("../topnav.php"); ?>
        <div id="wrapper" style="padding-top:60px"> 
            <?php 
                if(isset($_SESSION['user_data'])){
                    include("../sidenav.php");
                }
            ?>
            <div id="main" class="container">
		<!-- <button onclick="myFunction()" class="w3-theme-bd3" style="height:50px;width:50px;border:none;position:fixed;right:-10px;bottom:100px;padding-left:1px;border-radius:16px">
			<i class="fa fa-print"></i></button> -->
			
			<div class="container" style="max-width:1095px;margin-left:32px;font-size:12px">
        <!-- <h1 class="page-header w3-center">[Title Here]</h1> -->

		<center>
		<h3>Sections: </h3>
			<select id="stat_sel" name="stat_sel" style="margin-bottom:20px">
			<option value="-"> --</option>
			<?php

			$get_section = $mysqli->query("SELECT SECTION_NAME, YEAR_LEVEL FROM css_section, css_school_yr
											WHERE css_section.sy_id = css_school_yr.sy_id
											AND css_school_yr.status = 'active'")
									or die("Error get_section: " . $mysqli->error);

				while($row = $get_section->fetch_array())
				{
					echo
					"<option value=". $row['YEAR_LEVEL'] . "-" . $row['SECTION_NAME'] . ">". $row['YEAR_LEVEL'] . "-" . $row['SECTION_NAME'] . "</option>";
				}

			?>
			</select>
			<br>
			<button id="hv" onclick="stu_acc()">
				<i class="fa fa-print">&nbsp;&nbsp;Student Account</i></button>
			<button id="hv" onclick="sec_list()">
				<i class="fa fa-print">&nbsp;&nbsp;Section Master List</i></button>
			</center>
		<div class="row">
		<!-- <div class="dropdown" style="margin-bottom:10px">
          <button class="btn w3-theme-bd2 dropdown-toggle" type="button" data-toggle="dropdown">Section
          <span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
          </ul>
        </di> -->
                <div class="panel panel-default">
             
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-bordered table-striped table-hover" id="dataTables-example">
                            <thead class="w3-theme-bl1">
                                <tr>
                                    <th>LRN</th>
                                    <th>Lastname</th>
                                    <th>Firstname</th>
                                    <th>Middle Name</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="TableData">
                                    <?php
									$get_student = $mysqli->query("SELECT lrn, stu_lname, stu_fname, stu_mname, stu_status FROM sis_student");
									while($row = $get_student->fetch_array())
									{
										$lrn = $row['lrn'];
										echo '
										<center>
											<tr>
												<td>' . $row['lrn'] . '</td>
												<td>' . $row['stu_lname'] . '</td>
												<td>' . $row['stu_fname'] . '</td>
												<td>' . $row['stu_mname'] . '</td>
												<td>' . $row['stu_status'] . '</td>
											</tr>
										</center>';
									}
									?>
                            </tbody>
                        </table>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
                <div class="w3-left">
                    <div class="w3-center" style="font-size:20px;margin-bottom:10px">Printables:</div>
                    <!-- <button id="hv" onclick="master_list()" >
                        <i class="fa fa-print">&nbsp;&nbsp;PNHS Master List</i></button> -->
                    <button id="hv" onclick="year_list()" >
                        <i class="fa fa-print">&nbsp;&nbsp;Year Level Master List</i></button>
                </div>
                
                
            <div class="w3-right">
                <div class="w3-center" style="font-size:20px;margin-bottom:10px">Downloads:</div>
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
				?>
                    <button id="hv" onclick="add()">
                        <i class="fa fa-download">&nbsp;&nbsp;Add Student Excel Template</i></button>
                    <button id="hv" onclick="grade()">
						<i class="fa fa-download">&nbsp;&nbsp;Grade Excel Template</i></button>
					<!-- <button id="hv" onclick="past()">
                        <i class="fa fa-download">&nbsp;&nbsp;Past Grade Excel Template</i></button> -->
				<?php
				}
				else
				{
				?>
                    <button id="hv" onclick="myFunction()">
                        <i class="fa fa-download">&nbsp;&nbsp;Grade Form Excel Template</i></button>
				<?php
				}
				?>

            </div>
                <div class="col-lg-8" style="margin-top:40px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Annual Enrollment Rate
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">Action</a>
                                        </li>
                                        <li><a href="#">Another action</a>
                                        </li>
                                        <li><a href="#">Something else here</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="morris-area-chart"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Enrolled and Graduating Students
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">Action</a>
                                        </li>
                                        <li><a href="#">Another action</a>
                                        </li>
                                        <li><a href="#">Something else here</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                    <div id="morris-bar-chart"></div>
                        </div>
                        <!-- /.panel-body -->   
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <!-- /.panel -->
                    <div class="panel panel-default" style="margin-top:40px">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Enrolled Students
                        </div>
                        <div class="panel-body">
                            <div id="morris-donut-chart"></div>
                            <a href="#" class="btn btn-default btn-block">View Details</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Enrolled Boys/Girls
                        </div>
                        <div class="panel-body">
                            <div id="morris2-donut-chart"></div>
                            <a href="#" class="btn btn-default btn-block">View Details</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel --></div>
<script src='../js1/jquery.min.js'></script>
<script src='../js1/bootstrap.min.js'></script>
<script src="../js/index.js"></script>
<script src="../../../js/metisMenu.min.js"></script>
<script src="../../../js/sb-admin-2.min.js"></script>


<!-- DataTables JavaScript -->
<script src="../Template%20(reference)/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../Template%20(reference)/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../Template%20(reference)/vendor/datatables-responsive/dataTables.responsive.js"></script>


	<!-- CUSTOM JS SCRIPT DO NOT DELETE-->
	<script src="../mustache/mustache.js"></script>
	<script src="data_js/data_stat.js"></script>
	<script src="../js/sweetalert.js"></script>


<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });
});
</script>

<script>
function stu_acc()
{
	var section = $('#stat_sel').val();
	window.location = '../FPDF/stu_acct.php?lvl_sec=' + section;
}

function sec_list()
{
	var section = $('#stat_sel').val();
	window.location = '../reports/section_masterlist.php?section=' + section;
}

function master_list()
{
	window.location = '../reports/masterlist.php';
}

function year_list()
{
	window.location = '../reports/year_level_masterlist.php';
}

function add()
{
	window.location = '../reports/add_temp.php';
}

function grade()
{
	window.location = '../reports/grade_temp.php';
}

function past()
{
	window.location = '../reports/past_grade.php'
}
</script>
    
</div>
            </div>
            <!-- /.col-lg-12 -->
        </div><!-- /.row -->
</div>
<?php include('../footer.php');?>
</body>
</html>