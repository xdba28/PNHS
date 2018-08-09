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
    <link href="../vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
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
                        <h1 class="page-header"> <img class="img-responsive" src="../docs/img/YD1.png"></h1>
                    </div>
                </div>        
                <form method="POST">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <select class="form-control" name="yr">
                                    <option value="">Select Year Retired</option>
                                    <?php
                                        $start=2006;
                                        $now=date("Y");
                                        $add=0;
                                        for($ctr=$start;$ctr<=$now;$ctr++){
                                            $yr=$start+$add;
                                            echo "<option value='".$yr."'>".$yr." </option>";
                                            $add++;
                                        }

                                    ?>

                                </select>

                            </div>
                        </div>
                    
                        <div class="col-md-4">
                            <?php
                                $dep=mysqli_query($mysqli,"SELECT dept_id,dept_name FROM pims_department");    
                            ?>
                            <div class="form-group">
                                <select required class="form-control" name="department">
                                    <option value="">Select Department</option>
                                    <option value="NULL">Non-Teaching</option>
                                    <?php
                                        while($deprow=mysqli_fetch_assoc($dep)){ ?>

                                        <option value="<?php echo $deprow['dept_id']?>"><?php echo $deprow['dept_name']?></option>  

                                     <?php   }
                                    ?>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button name="botn" class="btn btn-primary" type="submit">Go</button>
                        </div>
                    </div>
                </form>
            <?php
                if(isset($_POST['botn'])){
                    $yr=$_POST['yr'];
                    $dept=$_POST['department'];
                    echo "<script>window.location='archiving.php?yr=$yr&dept=$dept';</script>";
                }
            
            ?>
            
            
            <?php
                if(isset($_GET['yr']) && isset($_GET['dept'])){ ?>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><img class="img-responsive" src="../docs/img/ArchivedDocuments2.png"></h1>
                    </div>
                            <!-- /.col-lg-12 -->
                </div>
            <!-- /.row -->
            <?php
                $yr=$_GET['yr'];
                
                $dep=$_GET['dept'];
                $list=mysqli_query($mysqli,"SELECT dms_archive.emp_no,concat(p_lname,', ',p_fname,' ',substring(ifnull(p_mname,''),'1','1')) as Name,emp_status,role_type,faculty_type,job_title_name,date_retired,arch_date 
                FROM pims_personnel,pims_employment_records,pims_job_title,pims_department,dms_archive
                WHERE pims_personnel.emp_no=pims_employment_records.emp_no
                AND pims_job_title.job_title_code=pims_employment_records.job_title_code
                AND pims_department.dept_ID=pims_employment_records.dept_ID
                AND dms_archive.emp_no=pims_personnel.emp_no
                AND pims_department.dept_id='$dep'
                AND year(date_retired)='$yr'
                ORDER by p_lname");
                $nlist=mysqli_num_rows($list);
            ?>
            
            
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <span>List of Faculties</span>
                            </div>
                            <!-- /.panel-heading -->
                            <form name="f2" method="POST">
                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th><center>Name</center></th>
                                            <th><center>Working Status</center></th>
                                            <th><center>Role</center></th>
                                            <th><center>Job Title</center></th>
                                            <th><center>Date Retired</center></th>
                                            <th><center>Date Archived</center></th>
                                            <th><center>Action</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            while($emprow=$list->fetch_assoc()){ ?>
                                            <tr>
                                                <td><center><?php echo $emprow['Name']; ?></center></td>
                                                <td><center><?php echo $emprow['emp_status']; ?></center></td>
                                                <td><center><?php echo $emprow['faculty_type']; ?></center></td>  
                                                <td><center><?php echo $emprow['job_title_name']; ?></center></td>
                                                <td><center><?php echo $emprow['date_retired']; ?></center></td>    
                                                <td><center><?php echo $emprow['arch_date']; ?></center></td>      
                                                <td>
                                                    <center>
                                                        <a class="btn btn-primary" href="arch_pers.php?emp=<?php echo $emprow['emp_no']; ?>">
                                                            &nbsp;&nbsp;&nbsp;Document&nbsp;&nbsp;&nbsp;
                                                        </a>
                                                    </center>
                                                </td>
                                            </tr>  
                                        <?php

                                            }
                                        ?>


                                    </tbody>
                                </table>
                                <!-- /.table-responsive -->
                            </div>
                            </form>    
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div> 
            <?php    
                }else{
                    echo "<br><br><br><br><br><br><br><br><br><br>";
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
