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
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"> <img class="img-responsive" src="../docs/img/Department.png"></h1>
                    </div>
                </div>
                <form method="POST">
            <div class="row">        
                <?php
                    $dep=mysqli_query($mysqli,"SELECT dept_id,dept_name FROM pims_department");    
                ?>
                <div class="col-md-4">
                    <div class="form-group">
                        <select class="form-control" name="department">
                            <?php
                                while($deprow=mysqli_fetch_assoc($dep)){ ?>

                                <option value="<?php echo $deprow['dept_id']?>"><?php echo $deprow['dept_name']?></option>  

                             <?php   }
                            ?>

                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <button name="btn" class="btn btn-primary" type="submit">Go</button>
                    <?php if(isset($_POST['department'])){ ?>
                    <a href="#myModal1" role="button" class="btn btn-warning" data-toggle="modal" class="btn btn-warning">Add File</a>
                    <?php
                        }
                    ?>
                    
                </div>
            </div>
            </form>
        <br>
        <?php 
            if(isset($_POST['btn'])){ 
            $dept=$_POST['department'];
        ?>
        
        <div id="main" class="container-fluid">
            <form method="POST">
            <input value="<?php echo $dept; ?>" name="department" type="hidden">    
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <td style="width:50px"><center>Employee Number</center></td>
                        <td><center>Employee Name</center></td>
                        <td><center>Role Type</center></td>
                        <td><center>Job Title</center></td>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $pers=mysqli_query($mysqli,"SELECT pims_personnel.emp_no,concat(p_lname,', ',p_fname,' ',substring(ifnull(p_mname,''),'1','1')) as Name,role_type,job_title_name FROM pims_personnel,pims_employment_records,pims_department,pims_job_title
                            WHERE pims_personnel.emp_no=pims_employment_records.emp_no
                            AND pims_department.dept_id=pims_employment_records.dept_id
                            AND pims_employment_records.job_title_code=pims_job_title.job_title_code
                            AND work_stat!='RETIRED' AND pims_employment_records.dept_id=$dept
                            ORDER by emp_no");
                        
                        while($rp=mysqli_fetch_assoc($pers)){
                            echo '<tr>
                                    <td><center>'.$rp['emp_no'].'</center></td>
                                    <td><center>'.$rp['Name'].'</center></td>
                                    <td><center>'.$rp['role_type'].'</center></td>
                                    <td><center>'.$rp['job_title_name'].'</center></td>
                                </tr>';  
                        }
                    ?>
                    
                </tbody>
            </table>
            <h6><p>*This is a list of active personnels in the <?php $dep1=mysqli_query($mysqli,"SELECT dept_id,dept_name FROM pims_department WHERE dept_id=$dept"); $deprow1=mysqli_fetch_assoc($dep1);   echo $deprow1['dept_name']; ?> for School Year 2016-2017. Issued today <?php echo $date;?> </p></h6>
            <button name="pdf" type="submit" class="btn btn-primary no-print">Print PDF</button>
            </form>
            <br><br><br><br><br><br><br>
        </div>
        <?php        
            }else{
                echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
            }
        ?>
        <?php 
            if(isset($_POST['pdf'])){ 
            $dept=$_POST['department'];
            echo "<script>window.open('fpdf/list.php?dep=$dept','_new');</script>"; 
            }
        ?>
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
    
    
    <!-- ADD FILE MODAL -->
    <div id="myModal1" class="modal" data-easein="expandIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="opacity: 1; display: block; transform: perspective(400px) scaleX(1) scaleY(1) translateX(0px); transform-origin: calc(0px + 50%) 50% 0px;">
            <form enctype="multipart/form-data" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Select Document:</h4>
                </div>
                <div class="modal-body">
                        <div  class="input-group">
                            <div class="ImageUpload">
                                <center>
                                   <label for="FileInput">
                                        <img src="../docs/img/choosefile2.png">
                                   </label>
                                </center>
                                <input type="hidden" name="depp" value="<?php echo $dept; ?>">
                                <input name="file" id="FileInput" type="file" onchange="readURL(this,'Picture')" style="  display: none"/>
                            </div>    
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button name="btnFile" class="btn btn-primary">Proceed</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    <?php
    
        if(isset($_POST['btnFile'])){
            $dir="../docs/pdf/";
            $ext=".pdf";
            $dept=$_POST['depp'];
            $dp=$mysqli->query("SELECT dept_name FROM pims_department where dept_id=$dept");
            $dr=$dp->fetch_assoc();
            $pdf=$_FILES['file']['name'];
            $pdf_tmp = $_FILES['file']['tmp_name'];
            $pdf_per=$dr['dept_name']."_List";
            $sy=$mysqli->query("SELECT sy_id FROM css_school_yr WHERE status='active' ");
            $syr=$sy->fetch_assoc();
            $year=$syr['sy_id'];
            mysqli_query($mysqli,"set autocommit=0");
            mysqli_query($mysqli,"start transaction");
            mysqli_query($mysqli,"LOCK TABLES dms_document,dms_list WRITE");
            $doc=$mysqli->query("INSERT INTO dms_document(emp_no,doc_lock,type_id) VALUES($emp,'1','7') ");
            if($doc=== true){
                $docid=$mysqli->insert_id;
                if(move_uploaded_file($pdf_tmp, $dir.$pdf_per.$ext)){
                    
                    $file=$mysqli->query("INSERT INTO dms_list(list_file,list_name,sy_id,doc_id,dept_id) VALUES('".$dir.$pdf_per.$ext."','".$pdf_per.$ext."',$year,$docid,$dept)");
                    if($file===true){
                        mysqli_query($mysqli,"COMMIT");
                        echo "<script>alert('SUCCESS!');</script>";
                        echo "<script>window.location='list.php';</script>";
                    }else{
                        mysqli_query($mysqli,"ROLBACK");
                        echo "<script>alert('Error Inserting New File!!! $year');</script>";
                    }
                    
                }else{
                    mysqli_query($mysqli,"ROLBACK");
                    echo "<script>alert('Error Inserting New Document!!');</script>";
                }

            }else{
                mysqli_query($mysqli,"ROLBACK");
                echo "<script>alert('Error Inserting New Document!');</script>";
            }

            mysqli_query($mysqli,"UNLOCK TABLES");
        }
    ?>
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
