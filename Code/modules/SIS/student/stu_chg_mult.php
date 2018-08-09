<!DOCTYPE html>
<html lang="en" >
    <?php
    session_start();
    include("../db_con_i.php");
	include("../func.php");
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

    <!-- Browser's Tab Image -->
    <link rel="shortcut icon" href="../docs/pnhs_img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../docs/img/pnhs_favicon.ico" type="image/x-icon">

    </head>
    <body>
		<?php include("../topnav.php"); ?>
        <div id="wrapper" style="padding-top:60px">
				<?php include("../sidenav.php");?>
            <div id="page-content-wrapper">
                <div class="container">
				<div id="main">

    
    <div class="container" style="max-width:1128px;margin-left:15px;font-size:12px">
        <h1 class="page-header w3-center">Assign Section</h1>
                <div class="panel panel-default ">
             
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example"> 
                            <center>
                            <h4>Section:</h4>
                            <select style="margin: 0px 0px 10px 5px" name="section" id="status" form="form_check">
                            <option value=""> -- </option>
                            <?php

							$get_all_section = $mysqli->query("SELECT SECTION_NAME, YEAR_LEVEL FROM css_section, css_school_yr
																WHERE css_section.sy_id = css_school_yr.sy_id");

                            while($row = $get_all_section->fetch_array())
                            {
                                echo
                                '<option value=' . $row['YEAR_LEVEL'] . "-" . $row['SECTION_NAME'] . '>' . $row['YEAR_LEVEL'] . "-" . $row['SECTION_NAME'];
                            }
                            ?>
                            </select>
                            </center>
                            <thead class="w3-theme-bl1">
                                <tr>
                                    <th>#</th>
                                    <th>LRN</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php

							$get_student = $mysqli->query("SELECT lrn, stu_lname, stu_fname, stu_mname, stu_status FROM sis_student
															")
                                                    or die("Error get_student: " .$mysqli->error);

                                while($rew = mysqli_fetch_array($get_student))
                                {
                                    $lrn = $rew['lrn'];
                                    echo '<td><center>
                                    <input form="form_check" type="checkbox" name="stu[] id="stu[]" value=' . $rew['lrn'] . '>
                                    <td>' . $rew['lrn'] . '</td>
                                    <td>' . $rew['stu_lname'] . ", " . $rew['stu_fname'] . " " . $rew['stu_mname'] . '</td>
                                    <td>' . $rew['stu_status'] . '</td></tr>';
                                }
                    ?>
                                
                            </tbody>
                        </table>
                        <center>
                        <form action="stu_chg_val.php" method="post" enctype="multipart/form-data" id="form_check">
                        <button form="form_check" type="submit" class="btn w3-hover-green btn-success w3-card-2">
                        <i class="fa fa-check">
                        </i>&nbsp;&nbsp;Submit&nbsp;</button>

                        <a href="student_list.php">
                        <button type="button" class="btn w3-hover-red w3-theme-rl1 w3-card-2">
                        <i class="fa fa-close"></i>&nbsp;&nbsp;Back&nbsp;
                        </button></a>
                        </form>
                        </center>
                            
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
    </div>
    
</div>
                <!-- /.row -->
                </div>
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
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });
});
</script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
    </body>
</html>
    
