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

    <!-- Browser's Tab Image -->
    <link rel="shortcut icon" href="../docs/pnhs_img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../docs/img/pnhs_favicon.ico" type="image/x-icon">

    </head>
    <body>
	<?php include("../topnav.php"); ?>
        <div id="wrapper">
            <?php include("../sidenav.php"); ?>
            <div id="page-content-wrapper">    
                <div class="container">
        <h1 class="page-header w3-center">F-137 Release History</h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
             
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead class="w3-theme-bl1">
                                <tr>
                                    <th>LRN</th>
                                    <th>Lastname</th>
                                    <th>Firstname</th>
                                    <th>Middlename</th>
                                    <th>Date of Release</th>
                                </tr>
                            </thead>
                            <tbody>

                    <?php

                        $get_history_f137 = mysqli_query($mysqli,"SELECT sis_f137_rel.lrn AS lrn,
                                                        stu_fname, stu_lname, stu_mname, date_rel 
                                                        FROM sis_f137_rel, sis_student
                                                        WHERE sis_student.lrn = sis_f137_rel.lrn")
                                                or die("Error get_history_f137: " .mysqli_error($mysqli));

                        while($row = mysqli_fetch_array($get_history_f137))
                        {

                            $date_exp = explode("-", $row['date_rel']);
                            
                            $month_full = date('F', mktime(0, 0, 0, $date_exp[1]));

                            echo 
                            '<tr>
                                <td>' . $row['lrn'] . '</td>
                                <td>' . $row['stu_lname'] . '</td>
                                <td>' . $row['stu_fname'] . '</td>
                                <td>' . $row['stu_mname'] . '</td>
                                <td>' . $month_full . " " . $date_exp[2] . ", " . $date_exp[0] . '</td>
                            </tr>';
                        }

                    ?>

                            </tbody>
                        </table>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
            </div>
            <br><br><br><br><br><br><br><br><br>
            <?php include("../footer.php"); ?>
                
        </div>
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
    </body>
</html>
