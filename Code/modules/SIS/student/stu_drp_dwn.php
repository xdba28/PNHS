<!DOCTYPE html>
<html lang="en" >
    <?php
    session_start();
    include("../db_con_i.php");
	include("../func.php");
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
.objects {
    display:inline-block;
    background-color: rgb(255, 251, 251);
    border: rgb(255, 255, 255) 1px solid;
    width: 508px;
    height: 28px;
    margin: 3px;
    padding: 4px;
    font-size: 12px;
    text-align: center;
    box-shadow: 2px 2px 2px #999;
    cursor: move;
}
#drop_zone {
    background-color: #EEE; 
    border: #999 1px solid;
    /* width: 280px; 
    height: 200px; */
    padding: 8px;
    font-size: 18px;
}
#selection{
    background-color: #EEE; 
    border: #999 1px solid;
    /* width: 280px; 
    height: 200px; */
    padding: 8px;
    font-size: 18px;
}
</style>
    </head>
    <body>
    <?php include("../topnav.php"); ?>
        <div id="wrapper" style="padding-top:30px">
            <?php include("../sidenav.php"); ?>
            <div id="page-content-wrapper">    
                <div class="container" style="max-width:1128px;margin:0px 0px 20px 30px">
				<div id="main">
                    <div class="row" style="padding-top:55px">
                        <div class="col-lg-6">
                            <center><h3>Students without a section</h3><br></center>
                            <div id="selection" ondrop="remove_section(event)" ondragover="return false" class="container-fluid w3-theme-bl3" style="height:600px">

                            <?php

                                $get_stu_null_Section = $mysqli->query("SELECT sis_student.lrn as lrn, stu_fname, stu_lname, stu_mname 
                                                                    FROM sis_student, sis_stu_rec, css_school_yr
                                                                    WHERE sis_student.lrn = sis_stu_rec.lrn
                                                                    AND sis_stu_rec.sy_id = css_school_yr.sy_id
                                                                    AND sis_stu_rec.section_id is NULL
                                                                    AND css_school_yr.status = 'active'")
                                                                or die("Error get_stu_null_Section: " . $mysqli->error);

                                    while($row = $get_stu_null_Section->fetch_array())
                                    {
                                        echo 
                                        "<div data-id='" . $row['lrn'] . "' id='" . $row['lrn'] . "' class='objects' draggable='true' ondragstart='drag_start(event)'>" . $row['lrn'] . ": " . $row['stu_lname'] . ", " . $row['stu_fname'] . " " . $row['stu_mname'] . "</div>";
                                    }

                                $get_stu_noSection = $mysqli->query("SELECT sis_student.lrn as lrn, stu_fname, stu_lname, stu_mname 
                                                                    FROM sis_student, sis_stu_rec, css_school_yr
                                                                    WHERE sis_student.lrn = sis_stu_rec.lrn
                                                                    AND sis_stu_rec.sy_id = css_school_yr.sy_id
                                                                    AND sis_stu_rec.section_id is NOT NULL
                                                                    AND sis_student.stu_status = 'Pending Section'
                                                                    AND css_school_yr.status = 'inactive'")
                                                            or die("Error get_stu_noSection: " .$mysqli->error);

                                    while($row = $get_stu_noSection->fetch_array())
                                    {
                                        echo 
                                        "<div data-id='" . $row['lrn'] . "' id='" . $row['lrn'] . "' class='objects' draggable='true' ondragstart='drag_start(event)'>" . $row['lrn'] . ": " . $row['stu_lname'] . ", " . $row['stu_fname'] . " " . $row['stu_mname'] . "</div>";
                                    }


                            ?>

                        <!-- <h3 style="color:rgba(0, 0, 0, 0.35)">Drag Box</h3> -->
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h3>Sections: </h3><select id="ch" name="ch">
                                <option>--</option>
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

                            <div id="drop_zone" ondrop="add_student(event)" ondragover="return false" class="container-fluid w3-theme-bl2" style="height:600px">
                                <!-- <h3 style="color:rgba(0, 0, 0, 0.35)">Drop Box</h3> -->
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
            <?php include("../footer.php"); ?>
        				<!-- Metis Menu Plugin JavaScript -->
<script src='../js1/jquery.min.js'></script>
<script src='../js1/bootstrap.min.js'></script>
<script src="../js/index.js"></script>
<!-- DataTables JavaScript -->
<script src="../Template%20(reference)/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../Template%20(reference)/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../Template%20(reference)/vendor/datatables-responsive/dataTables.responsive.js"></script>

	<!-- CUSTOM JS SCRIPT DO NOT DELETE-->
    <script src="data_js/data_mal.js"></script>
    <script src="../mustache/mustache.js"></script>
	<script src="../../../js/metisMenu.min.js"></script>
	<script src="../../../js/sb-admin-2.min.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
    </body>
</html>
    
