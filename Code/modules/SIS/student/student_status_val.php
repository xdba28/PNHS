<?php
    session_start();
    include("../db_con_i.php");
    include("../session.php");


if(isset($_POST['stu'])) 
{
    $stu = $_POST['stu'];
}
else
{
	?>
	<script>
		alert('No Student Selected!');
		window.location = "student_return.php";
	</script>
	<?php
}

if($_POST['status'] != "")
{
    $status = $_POST['status'];
    // $sec_exp = explode("-", $section);  
    // $lvl_q = $sec_exp[0];
    // $sec_name_q = $sec_exp[1];
}
else
{
    ?>
    <script>
        alert('No Status Selected!');
        window.location = "student_return.php";
    </script>
    <?php
}

// $cur_year = date('Y');
// $nxt_year = $cur_year + 1;
// $year = array($cur_year, $nxt_year);
// $sy = implode("-", $year);

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
</head>

<body>

	<?php include("../topnav.php"); ?>   
	<div id="wrapper">
            <?php include("../sidenav.php"); ?>

<div id="main">

    
    <div class="container">
        <h1 class="page-header w3-center">Validation</h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
             
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead class="w3-theme-bl1">
                                <tr>
                                    <th>LRN</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
      
                    <?php

                foreach($stu as $lrn)
                {

                $get_stu_name = $mysqli->query("SELECT lrn, stu_lname, stu_fname, stu_mname FROM sis_student WHERE lrn = $lrn")
                                        or die("Error get_stu_name: " . $mysqli->error);

                    $res = mysqli_fetch_assoc($get_stu_name);
                    $id = $res['lrn'];
                    $last = $res['stu_lname'];
                    $first = $res['stu_fname'];
                    $middle = $res['stu_mname'];

                    echo 
                    '<td><input form="val_form" type="hidden" name="lrn[]" id="lrn[]" value=' . $id . '>' . $id . '</td>
                    <td>' . $last . ", " . $first . " " . $middle . '</td>
                    <td>' . $status . '</td></tr>';

                // $get_section = $mysqli->query("SELECT SECTION_NAME, YEAR_LEVEL FROM css_section
                //                             WHERE YEAR_LEVEL = $lvl_q
                //                             AND SECTION_NAME = '$sec_name_q'")
                //                     or die("Error get_section: " . $mysqli->error);

                //     $res = mysqli_fetch_assoc($get_section);
                //     $lvl = $res['YEAR_LEVEL'];
                //     $sec = $res['SECTION_NAME'];
                    
                //     echo
                //     '<td>' . $lvl . " - " . $sec . '</td>
                //     <td>' . $sy . '</td></tr>';

                }

                    ?>
                                
                            </tbody>
                        </table>
                        <center>
                        <form action="process/status_process.php?s=<?php echo $status;?>" method="post" enctype="multipart/form-data" id="val_form">
                        <button form="val_form" type="submit" class="btn w3-hover-green btn-success w3-card-2">
                        <i class="fa fa-check">
                        </i>&nbsp;&nbsp;Submit&nbsp;</button>

                        <a href="student_return.php">
                        <button type="button" class="btn w3-hover-red w3-theme-rl1 w3-card-2">
                        <i class="fa fa-close"></i>&nbsp;&nbsp;Cancel&nbsp;
                        </button></a>
                        </center>
                            
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
</div>
</div>
<?php include("../footer.php"); ?>
</body>

</html>
