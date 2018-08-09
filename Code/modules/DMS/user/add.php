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
    <link href="http://fonts.googleapis.com/css?family=Dosis:400,500,700" rel="stylesheet" type="text/css">
    <link rel='stylesheet prefetch' href='../css/bootstrap.min.css'>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../docs/img/pnhs_favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/w3.css">
    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="../vendor/dist/css/sb-admin-2.css" rel="stylesheet">
    <script>
        function doc_rec(val){
            $.ajax({

                type:"post",
                url:"add_doc.php",
                data:{
                    doc_val:val
                },
                success: function (response){
                    document.getElementById("rec").innerHTML=response;
                }
            });
        }
    </script>
</head>

<body>
    
        <?php include("../topnav.php");?>
      <div id="wrapper">
        <!-- Sidebar -->  
        <?php include("../sidenav.php"); ?>
        <!-- /#sidebar-wrapper -->
        <div id="main" class="container">
                <div class="row">
                    <div class="col-md-1">
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1">
                        <br>
                    </div>
                    <div class="col-lg-10">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Send Message 
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="row">
                                    <form method="POST">
                                        <div class="col-md-2">
                                            <br>
                                        </div>
                                        <div class="col-md-8">
                                            <div  class="input-group">
                                                <span class="input-group-addon" id="basic-addon2">Document&nbsp;</span>
                                                    <select onchange="doc_rec(this.value)" required id="docs" class="form-control" name="doc">
                                                        <option value="">Select Document</option>
                                                        <?php
                                                            echo "<option value='1'>Service Record</option>";
                                                            
                                                            echo "<option value='2'>Personal Data Sheet</option>";
                                                            $emp_type="Teaching";
                                                            if($emp_type=="Teaching"){
                                                                $adv=$mysqli->query("SELECT css_section.emp_rec_id 
                                                                FROM css_section,pims_employment_records,pims_personnel,css_school_yr 
                                                                WHERE pims_employment_records.emp_rec_id=css_section.emp_rec_id
                                                                AND pims_employment_records.emp_no=pims_personnel.emp_no
                                                                AND css_section.sy_id=css_School_yr.sy_id
                                                                AND pims_employment_records.emp_no=$emp");
                                                                $ch=$adv->num_rows;
                                                                if($ch>=1){
                                                                    
                                                                    $docmg=$mysqli->query("SELECT concat('SY:',year,' ',year_level,'-',section_name) as Sec 
                                                                    FROM pims_personnel,pims_employment_records,css_section,css_school_yr
                                                                    WHERE css_section.sy_id=css_school_yr.sy_id
                                                                    AND pims_personnel.emp_no=pims_employment_records.emp_no
                                                                    AND pims_employment_records.emp_rec_id=css_section.emp_rec_id
                                                                    AND pims_employment_records.emp_no=$emp");
                                                                    $mgnum=mysqli_num_rows($docmg);
                                                                    while($mg=mysqli_fetch_assoc($docmg)){
                                                                        echo "<option value='3'>Master Grading Sheet ( ".$mg['Sec']." ) </option>";
                                                                    }


                                                                    $docqg=$mysqli->query("SELECT concat('SY:',year,' ',year_level,'-',section_name,',',subject_name) as Sec FROM pims_personnel,pims_employment_records,css_section,css_school_yr,css_subject,css_schedule
                                                                    WHERE css_section.sy_id=css_school_yr.sy_id
                                                                    AND css_schedule.section_id=css_section.section_id
                                                                    AND css_schedule.subject_id=css_subject.subject_id
                                                                    AND css_schedule.sy_id=css_school_yr.sy_id
                                                                    AND pims_employment_records.emp_rec_id=css_schedule.emp_rec_id
                                                                    AND pims_personnel.emp_no=pims_employment_records.emp_no
                                                                    AND pims_employment_records.emp_no=$emp");
                                                                    $qgnum=mysqli_num_rows($docqg);  
                                                                    while($qg=mysqli_fetch_assoc($docqg)){
                                                                        echo "<option value='4'>Quarterly Grades ( ".$qg['Sec']." ) </option>";
                                                                    }


                                                                    $docsf1=$mysqli->query("SELECT concat('SY:',year,' ',year_level,'-',section_name) as Sec 
                                                                    FROM pims_personnel,pims_employment_records,css_section,css_school_yr
                                                                    WHERE css_section.sy_id=css_school_yr.sy_id
                                                                    AND pims_personnel.emp_no=pims_employment_records.emp_no
                                                                    AND pims_employment_records.emp_rec_id=css_section.emp_rec_id
                                                                    AND pims_employment_records.emp_no=$emp");
                                                                    $sf1num=mysqli_num_rows($docsf1);
                                                                    while($sf1=mysqli_fetch_assoc($docsf1)){
                                                                        echo "<option value='5'>School File One ( ".$sf1['Sec']." ) </option>";
                                                                    }

                                                                    $docsf5=$mysqli->query("SELECT concat('SY:',year,' ',year_level,'-',section_name) as Sec 
                                                                    FROM pims_personnel,pims_employment_records,css_section,css_school_yr
                                                                    WHERE css_section.sy_id=css_school_yr.sy_id
                                                                    AND pims_personnel.emp_no=pims_employment_records.emp_no
                                                                    AND pims_employment_records.emp_rec_id=css_section.emp_rec_id
                                                                    AND pims_employment_records.emp_no=$emp");
                                                                    $sf5num=mysqli_num_rows($docsf5);
                                                                    while($sf5=mysqli_fetch_assoc($docsf5)){
                                                                        echo "<option value='6'>School File five ( ".$sf5['Sec']." ) </option>";
                                                                    }    
                                                                }
                                                                
                                                                if(strstr($job_title,"HTEACH")){
                                                                    $doclist=$mysqli->query("SELECT dept_name 
                                                                    FROM pims_personnel,pims_department,pims_employment_records
                                                                    WHERE pims_employment_records.dept_ID=pims_department.dept_ID
                                                                    AND pims_personnel.emp_No=pims_employment_records.emp_No
                                                                    AND pims_employment_records.emp_no=$emp");
                                                                    $listnum=mysqli_num_rows($doclist);
                                                                    while($list=mysqli_fetch_assoc($doclist)){
                                                                        echo "<option value='7'>Department List ( ".$list['dept_name']." ) </option>";
                                                                    }
                                                                }
                                                            }
                                                        ?>
                                                    </select>

                                            </div><br>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon2">Recipient &nbsp;</span>
                                                <select id="rec" required class="form-control" name="rec">
                                                    <option value="">Select Document First</option>
                                                </select>
                                                <span class="input-group-addon" id="basic-addon2">Subject</span><input placeholder="Subject" name="sub" class="form-control">
                                            </div><br>
                                            <div class="form-group">
                                                <textarea required name="con" placeholder="Content" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <center>
                                                    <button name="btn" class="btn btn-primary btn-block btn-lg">Send</button>
                                                </center>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <br>
                                        </div>
                                    </form>
                                    <?php
                                        if(isset($_POST['btn'])){
                                            $rec=$_POST['rec'];
                                            $doc=$_POST['doc'];
                                            $sub=$_POST['sub'];
                                            $in_con=$_POST['con'];
                                            $con=mysqli_real_escape_string($mysqli,$in_con);
                                            $datesent=date("Y-m-d H:i:s");
                                            mysqli_query($mysqli,"set autocommit=0");
                                            mysqli_query($mysqli,"start transaction");
                                            mysqli_query($mysqli,"LOCK TABLES dms_message WRITE");
                                            $mes=mysqli_query($mysqli,"INSERT INTO dms_message (mes_title,mes_content,sent,mes_status,mes_delete,mes_stat,type_id,rec_no,cms_account_id) VALUES ('$sub','$con','$datesent','0','0','P',$doc,'$rec','$aid')");
                                            if($mes){
                                                mysqli_query($mysqli,"COMMIT");
                                                echo "<script>alert('Message Sent'); window.location='add.php'; </script>";
                                            }else{
                                                mysqli_query($mysqli,"ROLLBACK");
                                                echo "<script>alert('Message not Sent')</script>";
                                            }
                                            mysqli_query($mysqli,"UNLOCK TABLES");
                                        }
                                        ?>
                                </div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <div class="col-md-1">
                        <br>
                    </div>
                </div>
                <br><br><br><br><br><br><br>
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

<script src="../../../js/metisMenu.min.js"></script>
<script src="../../../js/sb-admin-2.min.js"></script>    
</body>

</html>
