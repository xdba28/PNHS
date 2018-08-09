<!DOCTYPE html>
<html lang="en" >
<?php 
    include("../func.php");
    include("../db/db.php");
    include("../sesh.php");
    date_default_timezone_set('Asia/Manila');
    $date=date("Y-m-d");
    $yesterday=date("Y-m-d",time()-86400);
    
    

?>
<head>
  <meta charset="UTF-8">
  <title>PAG-ASA National High School</title>
    <link rel='stylesheet prefetch' href='../css/bootstrap.min.css'>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../docs/img/pnhs_favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/w3.css">
    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    
</head>

<body>

      <div id="wrapper">
    
        <!-- Sidebar -->
        <?php include("../sidenav.php");?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <?php include("../topnav.php");?>
            <div class="container">
                <?php
                    $pers=mysqli_query($mysqli,"SELECT pims_personnel.emp_no,concat(p_lname,', ',p_fname,' ',substring(ifnull(p_mname,''),'1','1')) as Name,work_stat,role_type FROM pims_personnel,pims_employment_records
                    WHERE pims_personnel.emp_no=pims_employment_records.emp_no
                    ORDER by p_lname");

                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <?php

                        ?>
                        <h1 class="page-header"><i class="fa fa-lock fa-fw"></i><?php 
                            $eid=$_GET['emp'];
                            $dc=$_GET['dc'];
                            $dsql=$mysqli->query("SELECT type_id,doc_type FROM dms_doc_type WHERE type_id=$dc");
                            $drow=$dsql->fetch_assoc();
                            $esql=mysqli_query($mysqli,"SELECT concat(p_lname,', ',p_fname,' ',substring(ifnull(p_mname,''),'1','1')) as Name FROM pims_personnel WHERE emp_no=$eid");
                            $erow=mysqli_fetch_assoc($esql);
                            echo $erow['Name']." ";
                            echo "- ".$drow['doc_type'];
                            ?></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            <div class="row">
                <div class="col-md-4">
                    <!--Form Group For MG,QG & SFs-->
                    <form method='POST'>
                    <div  class="input-group">    
                    <?php
                        
                        if($dc=='3' || $dc=='5' || $dc=='6'){
                            //If MG,SF
                            //select tag start 
                            echo "<select required name='yr' class='form-control'>";
                            //Section ID Query 
                            $secyr=$mysqli->query("SELECT css_section.SECTION_ID, concat(year_level,'-',section_name,' :: ',year) as sec FROM css_section,css_school_yr, pims_employment_records,pims_personnel
                            WHERE css_school_yr.sy_id=css_section.sy_id
                            AND css_section.emp_rec_id=pims_employment_records.emp_rec_ID
                            AND pims_employment_records.emp_No=pims_personnel.emp_No
                            AND pims_employment_records.emp_No=$eid");
                            $secnum=mysqli_num_rows($secyr);
                            //Checks if Faculty handles a section
                            if(!empty($secnum)){
                                echo "<option value=''>Select Year & Section</option>";
                                while($secrow=$secyr->fetch_array()){
                                    if(isset($_GET['yr'])){
                                        //if statement for selected value
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
                            //select tag close 
                            echo "</select>";
                            echo '<span class="input-group-addon"><input name="btn" value="View" type="submit" role="button" ></span>';
                            
                            if(isset($_POST['btn'])){
                                $yr=$_POST['yr'];
                                echo "<script> window.location='personnel.php?emp=$eid&dc=$dc&yr=$yr';</script>";
                            }
                        }else if($dc=='4'){
                            //If QG
                            //select tag start 
                            echo "<select name='yr' class='form-control'>";
                            //Section ID Query 
                            echo "<option value=''>Select Year & Section</option>";
                            $qg=$mysqli->query("SELECT css_schedule.SCHED_ID,concat(sub_desc,', ',year_level,'-',section_name,' :: ',year) as sec 
                            from css_schedule,css_school_yr,css_section,pims_employment_records,pims_personnel,css_subject
                            where css_schedule.SECTION_ID=css_section.SECTION_ID
                            AND css_schedule.sy_id=css_school_yr.sy_id
                            AND css_section.emp_rec_id=pims_employment_records.emp_rec_ID
                            AND pims_employment_records.emp_No=pims_personnel.emp_No
                            AND css_schedule.subject_id=css_subject.subject_id
                            AND pims_personnel.emp_No=$eid");
                            $qnum=mysqli_num_rows($qg);
                            //Checks if Faculty handles a section
                            if(empty($qnum)){
                                echo "<option value=''>No Section Handled</option>";
                            }else{
                                while($qgrow=$qg->fetch_assoc()){
                                    if(isset($_GET['yr'])){
                                        //if statement for selected value
                                        if($_GET['yr']==$qgrow['SCHED_ID']){
                                            echo "<option selected value='".$qgrow['SCHED_ID']."'>".$qgrow['sec']."</option>";
                                        }else{
                                            echo "<option value='".$qgrow['SCHED_ID']."'>".$qgrow['sec']."</option>";
                                        }

                                    }else{
                                        echo "<option value='".$qgrow['SCHED_ID']."'>".$qgrow['sec']."</option>"; 
                                    }
                                }
                            }
                            //select tag close
                            echo "</select>";
                            echo '<span class="input-group-addon"><input name="btn" value="View" type="submit" role="button" ></span>';
                            
                            if(isset($_POST['btn'])){
                                $yr=$_POST['yr'];
                                echo "<script> window.location='personnel.php?emp=$eid&dc=$dc&yr=$yr';</script>";
                            }
                        }
                    ?>
                    </div>
                    </form>    
                </div>
                
                <?php
                    //If MG,QG, Or SFs are selected
                    if(isset($_GET['yr'])){
                ?>
                <div class="col-md-4">
                    <div  class="input-group">
                        <?php 
                            if($dc=='3'){
                                //Master Grading sheet
                                $secdoc=$_GET['yr'];
                                //Checks if a file exist
                                $fi=$mysqli->query("SELECT mg_id FROM `dms_document`,dms_doc_type,dms_master_grade,pims_personnel,css_section 
                                WHERE dms_document.emp_no=pims_personnel.emp_No
                                AND dms_document.type_id=dms_doc_type.type_id
                                AND css_section.section_id=dms_master_grade.section_id
                                AND dms_document.doc_id=dms_master_grade.doc_id
                                AND dms_master_grade.section_id=$secdoc ");
                                $frow=$fi->fetch_assoc();
                                //Generate Button
                                echo '<a href="fpdf/master_pdf.php?dc='.$dc.'&sec='.$secdoc.'&emp='.$eid.'" class="btn btn-info">Generate</a> &nbsp;&nbsp;&nbsp;';
                                //Button change depending if the file exist
                                if(empty($frow)){
                                    echo '<a href="#myModal" role="button" class="btn btn-warning" data-toggle="modal" class="btn btn-warning">Add File</a>';
                                }else{
                                    echo '<a href="#myModal1" role="button" class="btn btn-warning" data-toggle="modal" class="btn btn-warning">Update File</a>';
                                }
                        }else if($dc=='5'){
                                //SF1
                                $secdoc=$_GET['yr'];
                                //Checks if a file exist
                                $fi=$mysqli->query("SELECT sf1_id FROM `dms_document`,dms_doc_type,dms_sf1,pims_personnel,css_section 
                                WHERE dms_document.emp_no=pims_personnel.emp_No
                                AND dms_document.type_id=dms_doc_type.type_id
                                AND css_section.section_id=dms_sf1.section_id
                                AND dms_document.doc_id=dms_sf1.doc_id
                                AND dms_sf1.section_id=$secdoc ");
                                $frow=$fi->fetch_assoc();
                                //Generate Button
                                echo '<a href="fpdf/sf1.php?dc='.$dc.'&sec='.$secdoc.'&emp='.$eid.'" class="btn btn-info">Generate</a> &nbsp;&nbsp;&nbsp;';
                                //Button change depending if the file exist
                                if(empty($frow)){
                                    echo '<a href="#myModal" role="button" class="btn btn-warning" data-toggle="modal" class="btn btn-warning">Add File</a>';
                                }else{
                                    echo '<a href="#myModal1" role="button" class="btn btn-warning" data-toggle="modal" class="btn btn-warning">Update File</a>';
                                }
                        }else if($dc=='6'){
                                //SF5
                                $secdoc=$_GET['yr'];
                                //Checks if a file exist
                                $fi=$mysqli->query("SELECT sf5_id FROM `dms_document`,dms_doc_type,dms_sf5,pims_personnel,css_section 
                                WHERE dms_document.emp_no=pims_personnel.emp_No
                                AND dms_document.type_id=dms_doc_type.type_id
                                AND css_section.section_id=dms_sf5.section_id
                                AND dms_document.doc_id=dms_sf5.doc_id
                                AND dms_sf5.section_id=$secdoc ");
                                $frow=$fi->fetch_assoc();
                                //Generate Button
                                echo '<a href="showsf5.php?dc='.$dc.'&sec='.$secdoc.'&emp='.$eid.'" class="btn btn-info">Generate</a> &nbsp;&nbsp;&nbsp;';
                                //Button change depending if the file exist
                                if(empty($frow)){
                                    echo '<a href="#myModal" role="button" class="btn btn-warning" data-toggle="modal" class="btn btn-warning">Add File</a>';
                                }else{
                                    echo '<a href="#myModal1" role="button" class="btn btn-warning" data-toggle="modal" class="btn btn-warning">Update File</a>';
                                }
                        }else if($dc=='4'){
                                //Quarterly Grades
                                $secdoc=$_GET['yr'];
                                //Checks if a file exist
                                $fi=$mysqli->query("SELECT qg_id FROM `dms_document`,dms_doc_type,dms_quarter_grade,pims_personnel,css_schedule 
                                WHERE dms_document.emp_no=pims_personnel.emp_No
                                AND dms_document.type_id=dms_doc_type.type_id
                                AND css_schedule.sched_id=dms_quarter_grade.sched_id
                                AND dms_document.doc_id=dms_quarter_grade.doc_id
                                AND dms_quarter_grade.sched_id=$secdoc ");
                                //Generate Button
                                echo '<a href="quarterly.php?emp='.$eid.'&sec='.$secdoc.'&dc='.$dc.'" class="btn btn-info">Generate</a> &nbsp;&nbsp;&nbsp;';
                                $frow=$fi->fetch_assoc();
                                //Button change depending if the file exist
                                if(empty($frow)){
                                    echo '<a href="#myModal" role="button" class="btn btn-warning" data-toggle="modal" class="btn btn-warning">Add File</a>';
                                }else{
                                    echo '<a href="#myModal1" role="button" class="btn btn-warning" data-toggle="modal" class="btn btn-warning">Update File</a>';
                                }
                        }
                            
                        ?>
                    </div>
                </div>
                <?php
                    //If Service Record
                    }else if($dc=='1'){ ?>
                <div class="col-md-4">
                    <div  class="input-group">
                    <?php
                        //Generate Button
                        echo '<a href="fpdf/service_record_pdf.php?emp='.$eid.'&dc='.$dc.'" class="btn btn-info">Generate</a> &nbsp;&nbsp;&nbsp;';
                        //Checks if file exsit
                        $fi=$mysqli->query("SELECT sr_id FROM `dms_document`,dms_doc_type,dms_sr,pims_personnel 
                            WHERE dms_document.emp_no=pims_personnel.emp_No
                            AND dms_document.type_id=dms_doc_type.type_id
                            AND dms_sr.emp_no=pims_personnel.emp_No
                            AND dms_document.doc_id=dms_sr.doc_id
                            AND dms_sr.emp_no=$eid ");
                            $frow=$fi->fetch_assoc();
                            //Add or Update File
                            if(empty($frow)){
                                echo '<a href="#myModal" role="button" class="btn btn-warning" data-toggle="modal" class="btn btn-warning">Add File</a>';
                            }else{
                                echo '<a href="#myModal1" role="button" class="btn btn-warning" data-toggle="modal" class="btn btn-warning">Update File</a>';
                            }
                    ?>
                    </div>
                </div>
                
                <?php
                    //If PDS    
                    }else if($dc=='2'){ ?>
                
                <div class="col-md-4">
                    <div  class="input-group">
                    <?php
                        //Generate Button
                        echo '<a href="fpdf/PDS_pdf.php?emp='.$eid.'&dc='.$dc.'" class="btn btn-info">Generate</a> &nbsp;&nbsp;&nbsp;';
                        //Checks if file exsit
                        $fi=$mysqli->query("SELECT pds_id FROM `dms_document`,dms_doc_type,dms_pds,pims_personnel 
                        WHERE dms_document.emp_no=pims_personnel.emp_No
                        AND dms_document.type_id=dms_doc_type.type_id
                        AND dms_pds.emp_no=pims_personnel.emp_No
                        AND dms_document.doc_id=dms_pds.doc_id
                        AND dms_pds.emp_no=$eid ");
                        $frow=$fi->fetch_assoc();
                        //Add or Update File
                        if(empty($frow)){
                            echo '<a href="#myModal" role="button" class="btn btn-warning" data-toggle="modal" class="btn btn-warning">Add File</a>';
                        }else{
                            echo '<a href="#myModal1" role="button" class="btn btn-warning" data-toggle="modal" class="btn btn-warning">Update File</a>';
                        }
                    ?>
                    </div>
                </div>
                
                <?php
                }
                ?>
            </div>
            <!--View PDF-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        
                        <!-- /.panel-heading -->
                        <div id="ins" class="panel-body">
                            <?php
                            if($dc=='1'){
                                //Service Record
                                $fi2=$mysqli->query("SELECT dms_document.doc_id,sr_file FROM dms_document,dms_doc_type,dms_sr,pims_personnel 
                                WHERE dms_sr.doc_id=dms_document.doc_id
                                AND dms_document.emp_no=pims_personnel.emp_No
                                AND dms_document.type_id=dms_doc_type.type_id
                                AND dms_sr.emp_no=pims_personnel.emp_no
                                AND dms_sr.emp_no=$eid ");
                                $frow2=$fi2->fetch_assoc();
                                if(!empty($frow2)){ 
                                $file=$frow2['sr_file']; ?> 
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe src="<?php echo $file; ?>" type="application/pdf" class="embed-responsive-item">
                                    </iframe>
                                </div>

                                <?php
                                }else{
                                    echo "<center><h1>No Document File Yet!</h1></center>";
                                }
    
                            }else if($dc=='2'){
                                //PDS
                                $fi2=$mysqli->query("SELECT dms_document.doc_id,pds_file FROM dms_document,dms_doc_type,dms_pds,pims_personnel 
                                WHERE dms_pds.doc_id=dms_document.doc_id
                                AND dms_document.emp_no=pims_personnel.emp_No
                                AND dms_document.type_id=dms_doc_type.type_id
                                AND dms_pds.emp_no=pims_personnel.emp_no
                                AND dms_pds.emp_no=$eid ");
                                $frow2=$fi2->fetch_assoc();
                                if(!empty($frow2)){ 
                                $file=$frow2['pds_file']; ?> 
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe src="<?php echo $file; ?>" type="application/pdf" class="embed-responsive-item">
                                    </iframe>
                                </div>
                                <?php
                                }else{
                                    echo "<center><h1>No Document File Yet!</h1></center>";
                                }
                            }
                            //If MG,QG, or SFs
                            if(isset($_GET['yr'])){
                                if($dc=='3'){
                                    //MG
                                    $secdoc=$_GET['yr'];
                                    $fi2=$mysqli->query("SELECT dms_document.doc_id,mg_file FROM dms_document,dms_doc_type,dms_master_grade,pims_personnel,css_section 
                                    WHERE dms_master_grade.doc_id=dms_document.doc_id
                                    AND dms_document.emp_no=pims_personnel.emp_No
                                    AND dms_document.type_id=dms_doc_type.type_id
                                    AND dms_master_grade.section_id=css_section.section_id
                                    AND dms_master_grade.section_id=$secdoc");
                                    $frow2=$fi2->fetch_assoc();
                                    if(!empty($frow2)){ 
                                    $file=$frow2['mg_file'];
                                ?> 
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe src="<?php echo $file; ?>" type="application/pdf" class="embed-responsive-item">
                                        </iframe>
                                    </div>
                                <?php
                                    }else{
                                        echo "<center><h1>No Document File Yet!</h1></center>";
                                    }
                            
                                }else if($dc=='4'){
                                    //QG
                                    $secdoc=$_GET['yr'];
                                    $fi2=$mysqli->query("SELECT dms_document.doc_id,qg_file FROM dms_document,dms_doc_type,dms_quarter_grade,pims_personnel,css_schedule 
                                    WHERE dms_quarter_grade.doc_id=dms_document.doc_id
                                    AND dms_document.emp_no=pims_personnel.emp_No
                                    AND dms_document.type_id=dms_doc_type.type_id
                                    AND dms_quarter_grade.sched_id=css_schedule.sched_id
                                    AND dms_quarter_grade.sched_id=$secdoc");
                                    $frow2=$fi2->fetch_assoc();
                                    if(!empty($frow2)){ 
                                    $file=$frow2['qg_file'];
                                ?> 
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe src="<?php echo $file; ?>" type="application/pdf" class="embed-responsive-item">
                                        </iframe>
                                    </div>
                                <?php
                                    }else{
                                        echo "<center><h1>No Document File Yet!</h1></center>";
                                    }
                           
                                }else if($dc=='5'){
                                    //SF1
                                    $secdoc=$_GET['yr'];
                                    $fi2=$mysqli->query("SELECT dms_document.doc_id,sf1_file FROM dms_document,dms_doc_type,dms_sf1,pims_personnel,css_section 
                                    WHERE dms_sf1.doc_id=dms_document.doc_id
                                    AND dms_document.emp_no=pims_personnel.emp_No
                                    AND dms_document.type_id=dms_doc_type.type_id
                                    AND dms_sf1.section_id=css_section.section_id
                                    AND dms_sf1.section_id=$secdoc");
                                    $frow2=$fi2->fetch_assoc();
                                    if(!empty($frow2)){ 
                                    $file=$frow2['sf1_file'];
                                ?> 
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe src="<?php echo $file; ?>" type="application/pdf" class="embed-responsive-item">
                                        </iframe>
                                    </div>
                                    <?php
                                    }else{
                                        echo "<center><h1>No Document File Yet!</h1></center>";
                                    }
                            
                                }else if($dc=='6'){
                                    //SF5
                                    $secdoc=$_GET['yr'];
                                    $fi2=$mysqli->query("SELECT dms_document.doc_id,sf5_file FROM dms_document,dms_doc_type,dms_sf5,pims_personnel,css_section 
                                    WHERE dms_sf5.doc_id=dms_document.doc_id
                                    AND dms_document.emp_no=pims_personnel.emp_No
                                    AND dms_document.type_id=dms_doc_type.type_id
                                    AND dms_sf5.section_id=css_section.section_id
                                    AND dms_sf5.section_id=$secdoc");
                                    $frow2=$fi2->fetch_assoc();
                                    if(!empty($frow2)){ 
                                    $file=$frow2['sf5_file'];
                                ?> 
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe src="<?php echo $file; ?>" type="application/pdf" class="embed-responsive-item">
                                        </iframe>
                                    </div>
                                    <?php
                                    }else{
                                        echo "<center><h1>No Document File Yet!</h1></center>";
                                    }
                                } 
                            }
                            ?>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <br><br><br><br><br><br><br>    
            </div>
        </div>
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
<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script> 
       
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
