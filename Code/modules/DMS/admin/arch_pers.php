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
                            $esql=mysqli_query($mysqli,"SELECT concat(p_lname,', ',p_fname,' ',substring(ifnull(p_mname,''),'1','1')) as Name,faculty_type,dept_id,job_title_code FROM pims_personnel,pims_employment_records WHERE pims_personnel.emp_no=pims_employment_records.emp_no AND pims_personnel.emp_no=$eid");
                            $erow=mysqli_fetch_assoc($esql);
                            $ftype_d=$erow['faculty_type'];
                            echo $erow['Name']." ";
                            if(isset($_GET['dc'])){
                                $dc=$_GET['dc'];
                                $dsql=$mysqli->query("SELECT type_id,doc_type FROM dms_doc_type WHERE type_id=$dc");
                                $drow=$dsql->fetch_assoc();
                                echo "- ".$drow['doc_type'];
                            }
                            
                            ?></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Select Document</h3>
                            <div class="panel-group">
                                <?php 
                                $srq=$mysqli->query("SELECT dms_sr.doc_id FROM dms_sr,dms_document WHERE dms_sr.doc_id=dms_document.doc_id and dms_document.emp_no=$eid");
                                $srn=$srq->num_rows;
                                if($srn>=1){ ?>
                                <div class="panel" style="background-color:skyblue">
                                <?php
                                    while($srr=$srq->fetch_assoc()){ ?>   
                                    <div class="panel-heading">
                                      <h4 class="panel-title">
                                        <a href="arch_pers.php?emp=<?php echo $eid?>&dc=1&doc=<?php echo $srr['doc_id']?>">Service Record</a>
                                      </h4>
                                    </div>
                                <?php
                                    }
                                    ?>
                                </div>
                                <?php            
                                }
                                ?>
                                
                                <?php 
                                $pdsq=$mysqli->query("SELECT dms_pds.doc_id FROM dms_pds,dms_document WHERE dms_pds.doc_id=dms_document.doc_id and dms_document.emp_no=$eid");
                                $pdsn=$pdsq->num_rows;
                                if($pdsn>=1){ ?>
                                <div class="panel panel-danger">
                                <?php
                                    while($pdsr=$pdsq->fetch_assoc()){ ?>   
                                    <div class="panel-heading">
                                      <h4 class="panel-title">
                                        <a href="arch_pers.php?emp=<?php echo $eid?>&dc=2&doc=<?php echo $pdsr['doc_id']?>">Personal Data Sheet</a>
                                      </h4>
                                    </div>
                                <?php
                                    }
                                    ?>
                                </div>
                                <?php            
                                }
                                ?>
                                
                                <?php 
                                if($ftype_d=="Teaching" && strstr($erow['job_title_code'],"HTEACH") ){
                                    $dms_dept=$erow['dept_id'];
                                    $deptq=$mysqli->query("SELECT dms_list.doc_id,concat(dept_name,'(',year,')') as dept 
                                    FROM dms_list,dms_document,css_school_yr,pims_department 
                                    WHERE dms_list.doc_id=dms_document.doc_id 
                                    and css_school_yr.sy_id=dms_list.sy_id 
                                    AND dms_list.dept_id=pims_department.dept_id
                                    AND dms_document.emp_no=$eid");
                                    $deptn=$deptq->num_rows;
                                    if($deptn>=1){ ?>
                                <div class="panel" style="background-color:#b1deb0">  
                                    <div class="panel-heading">
                                      <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#collapse1">Department List</a>
                                      </h4>
                                    </div>
                                    <div id="collapse1" class="panel-collapse collapse">
                                        <ul class="list-group">
                                        <?php
                                        while($deptr=$deptq->fetch_assoc()){ ?>         
                                            <li class="list-group-item">
                                                <a href="arch_pers.php?emp=<?php echo $eid ?>&dc=7&doc=<?php echo $deptr['doc_id']?>">
                                                <?php echo $deptr['dept']; ?>
                                                </a>    
                                            </li>
                                    <?php
                                        }
                                        ?>
                                        </ul>
                                    </div>
                                
                                </div>
                                    <?php            
                                    }
                                }
                                ?>
                                
                                <?php 
                                if($ftype_d=="Teaching"){
                                    $mgq=$mysqli->query("SELECT dms_master_grade.doc_id,concat(year_level,'-',section_name,'(',year,')') as section FROM dms_master_grade,dms_document,css_section,css_school_yr WHERE dms_master_grade.doc_id=dms_document.doc_id and css_section.section_id=dms_master_grade.section_id AND css_section.sy_id=css_school_yr.sy_id AND dms_document.emp_no=$eid");
                                    $mgn=$mgq->num_rows;
                                    if($mgn>=1){ ?>
                                <div class="panel" style="background-color:lightsteelblue">  
                                    <div class="panel-heading">
                                      <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#collapse1">Master Grading Sheet</a>
                                      </h4>
                                    </div>
                                    <div id="collapse1" class="panel-collapse collapse">
                                        <ul class="list-group">
                                        <?php
                                        while($mgr=$mgq->fetch_assoc()){ ?>         
                                            <li class="list-group-item">
                                                <a href="arch_pers.php?emp=<?php echo $eid ?>&dc=3&doc=<?php echo $mgr['doc_id']?>">
                                                Section <?php echo $mgr['section']; ?>
                                                </a>    
                                            </li>
                                    <?php
                                        }
                                        ?>
                                        </ul>
                                    </div>
                                
                                </div>
                                    <?php            
                                    }
                                }
                                ?>
                                
                                <?php 
                                if($ftype_d=="Teaching"){
                                    $qgq=$mysqli->query("SELECT dms_quarter_grade.doc_id,concat(year_level,'-',section_name,': ',subject_name,'(',year,')') as handle 
                                    FROM dms_quarter_grade,dms_document,css_section,css_schedule,css_subject,css_school_yr 
                                    WHERE dms_quarter_grade.doc_id=dms_document.doc_id 
                                    and css_schedule.sched_id=dms_quarter_grade.sched_id 
                                    AND css_section.section_id=css_schedule.section_id AND css_subject.subject_id=css_schedule.subject_id 
                                    AND css_section.sy_id=css_school_yr.sy_id
                                    AND dms_document.emp_no=$eid");
                                    $qgn=$qgq->num_rows;
                                    if($qgn>=1){ ?>
                                <div class="panel" style="background-color:wheat">  
                                    <div class="panel-heading">
                                      <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#collapse2">Quarterly Grades</a>
                                      </h4>
                                    </div>
                                    <div id="collapse2" class="panel-collapse collapse">
                                        <ul class="list-group">
                                        <?php
                                        while($qgr=$qgq->fetch_assoc()){ ?>         
                                            <li class="list-group-item">
                                                <a href="arch_pers.php?emp=<?php echo $eid ?>&dc=4&doc=<?php echo $qgr['doc_id']?>">
                                                Section <?php echo $qgr['handle']; ?>
                                                </a>    
                                            </li>
                                    <?php
                                        }
                                        ?>
                                        </ul>
                                    </div>
                                
                                </div>
                                    <?php            
                                    }
                                }
                                ?>
                                
                                <?php 
                                if($ftype_d=="Teaching"){
                                    $sf1q=$mysqli->query("SELECT dms_sf1.doc_id,concat(year_level,'-',section_name,'(',year,')') as section FROM dms_sf1,dms_document,css_section,css_school_yr WHERE dms_sf1.doc_id=dms_document.doc_id 
                                    and css_section.section_id=dms_sf1.section_id AND css_section.sy_id=css_school_yr.sy_id AND dms_document.emp_no=$eid");
                                    $sf1n=$sf1q->num_rows;
                                    if($sf1n>=1){ ?>
                                <div class="panel" style="background-color:darkkhaki">  
                                    <div class="panel-heading">
                                      <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#collapse3">School File One</a>
                                      </h4>
                                    </div>
                                    <div id="collapse3" class="panel-collapse collapse">
                                        <ul class="list-group">
                                        <?php
                                        while($sf1r=$sf1q->fetch_assoc()){ ?>         
                                            <li class="list-group-item">
                                                <a href="arch_pers.php?emp=<?php echo $eid ?>&dc=5&doc=<?php echo $sf1r['doc_id']?>">
                                                Section <?php echo $sf1r['section']; ?>
                                                </a>    
                                            </li>
                                    <?php
                                        }
                                        ?>
                                        </ul>
                                    </div>
                                
                                </div>
                                    <?php            
                                    }
                                }
                                ?>
                                
                                <?php 
                                if($ftype_d=="Teaching"){
                                    $sf5q=$mysqli->query("SELECT dms_sf1.doc_id,concat(year_level,'-',section_name,'(',year,')') as section FROM dms_sf1,dms_document,css_section,css_school_yr WHERE dms_sf1.doc_id=dms_document.doc_id 
                                    and css_section.section_id=dms_sf1.section_id AND css_section.sy_id=css_school_yr.sy_id AND dms_document.emp_no=$eid");
                                    $sf5n=$sf5q->num_rows;
                                    if($sf5n>=1){ ?>
                                <div class="panel" style="background-color: thistle;">  
                                    <div class="panel-heading">
                                      <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#collapse4">School File Five</a>
                                      </h4>
                                    </div>
                                    <div id="collapse4" class="panel-collapse collapse">
                                        <ul class="list-group">
                                        <?php
                                        while($sf5r=$sf5q->fetch_assoc()){ ?>         
                                            <li class="list-group-item">
                                                <a href="arch_pers.php?emp=<?php echo $eid ?>&dc=6&doc=<?php echo $sf5r['doc_id']?>">
                                                Section <?php echo $sf5r['section']; ?>
                                                </a>    
                                            </li>
                                    <?php
                                        }
                                        ?>
                                        </ul>
                                    </div>
                                
                                </div>
                                    <?php            
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <!--View PDF-->
                    <div class="row">
                        <div class="col-lg-12">
                            <br><br>
                            <div class="panel panel-default">

                                <!-- /.panel-heading -->
                                <div id="ins" class="panel-body">
                                    <?php
                                if(isset($_GET['dc'])){    
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
                                    if($dc=='3'){
                                        //MG
                                        $secdoc=$_GET['doc'];
                                        $fi2=$mysqli->query("SELECT dms_document.doc_id,mg_file FROM dms_document,dms_master_grade 
                                        WHERE dms_master_grade.doc_id=dms_document.doc_id
                                        AND dms_master_grade.doc_id=$secdoc");
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
                                        $secdoc=$_GET['doc'];
                                        $fi2=$mysqli->query("SELECT dms_document.doc_id,qg_file FROM dms_document,dms_quarter_grade
                                        WHERE dms_quarter_grade.doc_id=dms_document.doc_id
                                        AND dms_quarter_grade.doc_id=$secdoc");
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
                                        $secdoc=$_GET['doc'];
                                        $fi2=$mysqli->query("SELECT dms_document.doc_id,sf1_file FROM dms_document,dms_sf1 
                                        WHERE dms_sf1.doc_id=dms_document.doc_id
                                        AND dms_sf1.doc_id=$secdoc");
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
                                        $secdoc=$_GET['doc'];
                                        $fi2=$mysqli->query("SELECT dms_document.doc_id,sf5_file FROM dms_document,dms_sf5
                                        WHERE dms_sf5.doc_id=dms_document.doc_id
                                        AND dms_sf5.doc_id=$secdoc");
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
                                    }else if($dc=='7'){
                                        //SF5
                                        $secdoc=$_GET['doc'];
                                        $fi2=$mysqli->query("SELECT dms_document.doc_id,list_file FROM dms_document,dms_list
                                        WHERE dms_list.doc_id=dms_document.doc_id
                                        AND dms_list.doc_id=$secdoc");
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
                                    
                                }else{
                                    echo "<br><center><h1><b>No Document Selected</b></h1></center><br>";
                                }
                                    ?>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                </div>
            </div>
            <?php if(!isset($_GET['dc'])){ ?>
            <br><br><br><br><br><br><br><br><br><br><br><br>  
            <?php } ?>
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
