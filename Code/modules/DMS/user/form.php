<!DOCTYPE html>
<html lang="en" >
<?php 
    include("../db/db.php");
    include("../func.php");
    include("../sesh.php");
    date_default_timezone_set('Asia/Manila');
    $date=date("Y-m-d");
    $yesterday=date("Y-m-d",time()-86400);
    

?>
<head>
  <meta charset="UTF-8">
  <title>PAG-ASA National High School</title>
    <link href="http://fonts.googleapis.com/css?family=Dosis:400,500,700" rel="stylesheet" type="text/css">
    <link rel='stylesheet prefetch' href='../css/bootstrap.min.css'>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../docs/img/pnhs_favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/w3.css">
    <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css" type="text/css">
    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

</head>

<body>

      <div id="wrapper">
    
        <!-- Sidebar -->
        <?php include("../sidenav.php") ?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <?php include("../topnav.php");?>
            <div class="container">
                <div class="row">
                    <div class="col-md-1">
                        <br>
                    </div>
                    <div class="col-lg-10">
                        <!-- Single button -->
                        <?php 
                                if($emp_type=="Teaching"){ 
                                    if(strstr($job_title,"HTEACH")){ ?>
                            <div class="btn-group">
                                <a href="form.php?dc=fi" type="button" class="btn btn-info" >
                                    Department List
                                </a>
                            </div>            
                                <?php        
                                    }
                        ?>

                            <div class="btn-group">
                              <a href="form.php?dc=sr" type="button" class="btn btn-primary" >
                                Service Records
                              </a>
                            </div>
                            <div class="btn-group">
                              <a href="form.php?dc=pds" type="button" class="btn btn-success" >
                                Personal Data Sheet
                              </a>
                            </div>
                            <div class="btn-group">
                              <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                School Files <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu">
                                <li><a href="form.php?dc=sf1">School File One</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="form.php?dc=sf5">School File Five</a></li>
                              </ul>
                            </div>
                            <div class="btn-group">
                              <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Grade Files <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu">
                                <li><a href="form.php?dc=qg">Quarterly Grades</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="form.php?dc=mg">Master Grading Sheet</a></li>
                              </ul>
                            </div>
                            <?php        
                                }else{ ?>
                            <div class="btn-group">
                              <a href="form.php?dc=pds" type="button" class="btn btn-info" >
                                Personal Data Sheet
                              </a>
                            </div>
                            <?php        
                                }
                            ?>

                    </div>
                    <div class="col-md-1">
                        <br>
                    </div>
                                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-md-1">
                        <br>
                    </div>
                    <div class="col-lg-10">
                        <h1 class="page-header"><?php $doc=$_GET['dc'];
                            if($doc=="sr"){
                                echo "<img class='img-responsive' src='../docs/img/ServiceRecord2.png'>";
                            }else if($doc=="pds"){
                                echo "<img class='img-responsive' src='../docs/img/PersonalDataSheet2.png'>";
                            }else if($doc=="fi"){
                                echo "Employee Department List";
                                echo "<div class='row'><div class='col-md-4'>";
                                echo "<form method='POST'>";
                                echo "<div class='input-group'>";
                                echo "<select name='yr' class='form-control'>";
                                    echo "<option value=''>Select School Year</option>";
                                    $sy=mysqli_query($mysqli,"SELECT sy_id,year FROM css_school_yr");
                                    while($syrow=mysqli_fetch_assoc($sy)){
                                        echo "<option value='".$syrow['sy_id']."'>".$syrow['year']."</option>";
                                    }
                                        echo "</select>";
                                        echo '<span class="input-group-addon"><input name="btn" value="View" type="submit" role="button" ></span>';

                                        if(isset($_POST['btn'])){
                                            $yr=$_POST['yr'];
                                            echo "<script> window.location='form.php?dc=$doc&yr=$yr';</script>";
                                        }
                                echo "</div>";
                                echo "</form>";
                                echo "</div></div>";
                            }else if($doc=="sf1"){
                                echo '<img class="img-responsive" src="../docs/img/SchoolFile1.png">';
                                echo "<div class='row'><div class='col-md-4'>";
                                echo "<form method='POST'>";
                                echo "<div class='input-group'>";
                                    echo "<select required name='yr' class='form-control'>";
                                        $secyr=$mysqli->query("SELECT css_section.SECTION_ID, concat(year_level,'-',section_name,' :: ',year) as sec FROM css_section,css_school_yr, pims_employment_records,pims_personnel
                                        WHERE css_school_yr.sy_id=css_section.sy_id
                                        AND css_section.emp_rec_id=pims_employment_records.emp_rec_ID
                                        AND pims_employment_records.emp_No=pims_personnel.emp_No
                                        AND css_section.emp_rec_id=$emp");
                                        $secnum=mysqli_num_rows($secyr);
                                        if(!empty($secnum)){
                                            echo "<option value=''>Select Year & Section</option>";
                                            while($secrow=$secyr->fetch_array()){
                                                if(isset($_GET['yr'])){
                                                    if($_GET['yr']==$secrow['SECTION_ID']){
                                                        echo "<option selected value='".$secrow['SECTION_ID']."'>".$secrow['sec']."</option>";
                                                    }else{
                                                        echo "<option value='".$secrow['SECTION_ID']."'>".$secrow['sec']."</option>";
                                                    }

                                                }else{
                                                    echo "<option value='".$secrow['SECTION_ID']."'>".$secrow['sec']."</option>"; 
                                                } 
                                            }
                                        }else{
                                            echo "<option value=''>No Section Handled</option>"; 
                                        }

                                        echo "</select>";

                                        echo '<span class="input-group-addon"><input name="btn" value="View" type="submit" role="button" ></span>';

                                        if(isset($_POST['btn'])){
                                            $yr=$_POST['yr'];
                                            echo "<script> window.location='form.php?dc=$doc&sec=$yr';</script>";
                                        }
                                echo "</div>";
                                echo "</form>";
                                echo "</div></div>";
                            }else if($doc=="sf5"){
                                echo '<img class="img-responsive" src="../docs/img/SchoolFile5_2.png">';
                                echo "<div class='row'><div class='col-md-4'>";
                                echo "<form method='POST'>";
                                echo "<div class='input-group'>";
                                    echo "<select required name='yr' class='form-control'>";
                                        $secyr=$mysqli->query("SELECT css_section.SECTION_ID, concat(year_level,'-',section_name,' :: ',year) as sec FROM css_section,css_school_yr, pims_employment_records,pims_personnel
                                        WHERE css_school_yr.sy_id=css_section.sy_id
                                        AND css_section.emp_rec_id=pims_employment_records.emp_rec_ID
                                        AND pims_employment_records.emp_No=pims_personnel.emp_No
                                        AND pims_personnel.emp_no=$emp");
                                        $secnum=mysqli_num_rows($secyr);
                                        if(!empty($secnum)){
                                            echo "<option value=''>Select Year & Section</option>";
                                            while($secrow=$secyr->fetch_array()){
                                                if(isset($_GET['yr'])){
                                                    if($_GET['yr']==$secrow['SECTION_ID']){
                                                        echo "<option selected value='".$secrow['SECTION_ID']."'>".$secrow['sec']."</option>";
                                                    }else{
                                                        echo "<option value='".$secrow['SECTION_ID']."'>".$secrow['sec']."</option>";
                                                    }

                                                }else{
                                                    echo "<option value='".$secrow['SECTION_ID']."'>".$secrow['sec']."</option>"; 
                                                } 
                                            }
                                        }else{
                                            echo "<option value=''>No Section Handled</option>"; 
                                        }

                                        echo "</select>";

                                        echo '<span class="input-group-addon"><input name="btn" value="View" type="submit" role="button" ></span>';

                                        if(isset($_POST['btn'])){
                                            $yr=$_POST['yr'];
                                            echo "<script> window.location='form.php?dc=$doc&sec=$yr';</script>";
                                        }
                                echo "</div>";
                                echo "</form>";
                                echo "</div></div>";
                            }else if($doc=="qg"){
                                echo '<img class="img-responsive" src="../docs/img/QuarterlyGrades2.png">';
                                echo "<div class='row'><div class='col-md-4'>";
                                echo "<form method='POST'>";
                                echo "<div class='input-group'>";
                                echo "<select name='yr' class='form-control'>";
                                        echo "<option value=''>Select Year & Section</option>";
                                        $qg=$mysqli->query("SELECT css_schedule.SCHED_ID,concat(sub_desc,', ',year_level,'-',section_name,' :: ',year) as sec from css_schedule,css_school_yr,css_section,pims_employment_records,pims_personnel,css_subject
                                        where css_schedule.SECTION_ID=css_section.SECTION_ID
                                        AND css_schedule.sy_id=css_school_yr.sy_id
                                        AND css_section.emp_rec_id=pims_employment_records.emp_rec_ID
                                        AND pims_employment_records.emp_No=pims_personnel.emp_No
                                        AND css_schedule.subject_id=css_subject.subject_id
                                        AND pims_personnel.emp_No=$emp");
                                        $qnum=mysqli_num_rows($qg);
                                        if(empty($qnum)){
                                            echo "<option value=''>No Section Handled</option>";
                                        }else{
                                            while($qgrow=$qg->fetch_assoc()){ 
                                                echo "<option value='".$qgrow['SCHED_ID']."'>".$qgrow['sec']."</option>";
                                            }
                                        }

                                        echo "</select>";
                                        echo '<span class="input-group-addon"><input name="btn" value="View" type="submit" role="button" ></span>';

                                        if(isset($_POST['btn'])){
                                            $yr=$_POST['yr'];
                                            echo "<script> window.location='form.php?dc=$doc&sec=$yr';</script>";
                                        }
                                echo "</div>";
                                echo "</form>";
                                echo "</div></div>";
                            }else if($doc=="mg"){
                                echo '<img class="img-responsive" src="../docs/img/MasterGradingSheets2.png">';
                                echo "<div class='row'><div class='col-md-4'>";
                                echo "<form method='POST'>";
                                echo "<div class='input-group'>";
                                    echo "<select required name='yr' class='form-control'>";
                                        $secyr=$mysqli->query("SELECT css_section.SECTION_ID, concat(year_level,'-',section_name,' :: ',year) as sec FROM css_section,css_school_yr, pims_employment_records,pims_personnel
                                        WHERE css_school_yr.sy_id=css_section.sy_id
                                        AND css_section.emp_rec_id=pims_employment_records.emp_rec_ID
                                        AND pims_employment_records.emp_No=pims_personnel.emp_No
                                        AND pims_personnel.emp_no=$emp");
                                        $secnum=mysqli_num_rows($secyr);
                                        if(!empty($secnum)){
                                            echo "<option value=''>Select Year & Section</option>";
                                            while($secrow=$secyr->fetch_array()){
                                                if(isset($_GET['yr'])){
                                                    if($_GET['yr']==$secrow['SECTION_ID']){
                                                        echo "<option selected value='".$secrow['SECTION_ID']."'>".$secrow['sec']."</option>";
                                                    }else{
                                                        echo "<option value='".$secrow['SECTION_ID']."'>".$secrow['sec']."</option>";
                                                    }

                                                }else{
                                                    echo "<option value='".$secrow['SECTION_ID']."'>".$secrow['sec']."</option>"; 
                                                } 
                                            }
                                        }else{
                                            echo "<option value=''>No Section Handled</option>"; 
                                        }

                                        echo "</select>";

                                        echo '<span class="input-group-addon"><input name="btn" value="View" type="submit" role="button" ></span>';

                                        if(isset($_POST['btn'])){
                                            $yr=$_POST['yr'];
                                            echo "<script> window.location='form.php?dc=$doc&sec=$yr';</script>";
                                        }
                                echo "</div>";
                                echo "</form>";
                                echo "</div></div>";
                            }else{
                                echo "<br><br>";
                            }
                                    ?>
                        </h1>
                    </div>
                    <div class="col-md-1">
                        <br>
                    </div>
                                    <!-- /.col-lg-12 -->
                </div>
                <div class="container-fluid">
                     <!-- /.row -->
                    <div class="row">
                        <div class="col-md-1">
                            <br>
                        </div>
                        <div class="col-md-10">
                            <?php
                            if($doc=="sr"){
                                include("pages/sr.php");
                            }else if($doc=="sf1"){
                                if(isset($_GET['sec'])){
                                    include("pages/sf1.php");
                                }else{
                                    echo "<br><br><br><br><br>";
                                }
                            }else if($doc=="pds"){

                                include("pages/pds.php");
                            }else if($doc=="fi"){
                                if(isset($_GET['yr'])){
                                    include("pages/dep.php");
                                }else{
                                    echo "<br><br><br><br><br>";
                                }
                            }else if($doc=="sf5"){
                                if(isset($_GET['sec'])){
                                    include("pages/sf5.php");
                                }else{
                                    echo "<br><br><br><br><br>";
                                }
                            }else if($doc=="mg"){
                                if(isset($_GET['sec'])){
                                    include("pages/mg.php");
                                }else{
                                    echo "<br><br><br><br><br>";
                                }
                            }else if($doc=="qg"){

                                if(isset($_GET['sec'])){
                                    if($_GET['sec']!=""){
                                        include("pages/qg.php");
                                    }else{
                                        echo "<br><br><br><br><br>";
                                    }

                                }else{
                                    echo "<br><br><br><br><br>";
                                }
                            }
                        ?>    
                        </div>
                        <div class="col-md-1">
                            <br>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <br><br><br>
          
        <!-- /#page-content-wrapper -->
        <footer class="w3-theme-bd5">
         <div class="container">
            <div class="col-lg-3 col-md-3">
               <h3 class="h3">PNHS</h3>
               <h6>All Rights Reserved &copy; 2018</h6>
            </div>
            <div class="col-lg-3 col-md-3">
               <h1 class="h3">ADDRESS</h1>
               <h6><b>Pag-asa National Highschool</b><br><span>PNHS Building, Rawis, East Service<br>  Road, Legazpi City, PH 2424</span></h6>
            </div>
            <div class="col-lg-3 col-md-3">
               <h3 class="h3">CONTACT US</h3>
               <h6 class="w3-justify">
                  <b>Phone:</b>
                  <span>(+632) 887-2232</span>
                  <br>
                  <b>E-mail:</b> 
                  <span>officialpnhs@pnhs.gov.ph</span>
                  <br>
               </h6>
            </div>
             <div class="col-lg-3 col-md-3">
               <h3 class="h3">FOLLOW US ON:</h3>
                  <a href="#"><i class="fa fa-bullseye w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-phone w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-facebook w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-twitter w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-google-plus w3-xlarge" aria-hidden="true"></i></a>
            </div>
         </div>
      </footer>
    </div>
    <!-- /#wrapper -->
<script src='../js/jquery.min.js'></script>
<script src='../js/bootstrap.min.js'></script>
<script src="../js/index.js"></script>
</body>

</html>
