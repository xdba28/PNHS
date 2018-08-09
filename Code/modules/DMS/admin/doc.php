<!DOCTYPE html>
<html lang="en" >
<?php 
    include("../func.php");
    include("../db/db.php");
    include("../sesh.php");
    date_default_timezone_set('Asia/Manila');
    $date=date("Y-m-d");
    $yesterday=date("Y-m-d",time()-86400);
    function base64_url_encode($input) {
     return strtr(base64_encode($input), '+/=', '._-');
    }

    function base64_url_decode($input) {
     return base64_decode(strtr($input, '._-', '+/='));
    }

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
    <link href="../vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <script src="../js/sweetalert.js"></script>

</head>

<body>

      <div id="wrapper">
    
        <!-- Sidebar -->
        <?php include("../sidenav.php");?>
        <!-- /#sidebar-wrapper -->

            <?php include("../topnav.php");?>
            <div class="container">
                <?php
                    if(strstr($job_title,"HRM")){
                        $pers=mysqli_query($mysqli,"SELECT pims_employment_records.emp_no,concat(p_lname,', ',p_fname,' ',substring(ifnull(p_mname,''),'1','1')) as Name,emp_status,work_stat,role_type,faculty_type,job_title_name 
                        FROM pims_personnel,pims_employment_records,pims_job_title
                        WHERE pims_personnel.emp_no=pims_employment_records.emp_no
                        AND pims_job_title.job_title_code=pims_employment_records.job_title_code
                        AND pims_personnel.emp_no NOT IN (SELECT dms_archive.emp_no FROM dms_archive,pims_personnel WHERE pims_personnel.emp_no=dms_archive.emp_no)
                        ORDER by p_lname");
                    }else if(strstr($job_title,"ICTD")){
                        $pers=mysqli_query($mysqli,"SELECT pims_employment_records.emp_no,concat(p_lname,', ',p_fname,' ',substring(ifnull(p_mname,''),'1','1')) as Name,emp_status,work_stat,role_type,faculty_type,job_title_name 
                        FROM pims_personnel,pims_employment_records,pims_job_title
                        WHERE pims_personnel.emp_no=pims_employment_records.emp_no
                        AND pims_job_title.job_title_code=pims_employment_records.job_title_code
                        AND pims_personnel.emp_no NOT IN (SELECT dms_archive.emp_no FROM dms_archive,pims_personnel WHERE pims_personnel.emp_no=dms_archive.emp_no)
                        AND faculty_type!='Non Teaching'
                        ORDER by p_lname");
                    }
                    
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"> <img class="img-responsive" src="../docs/img/DocumentSecurity2.png"></h1>
                    </div>
                </div>
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <form method="POST">
                        
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th><center>Name</center></th>
                                        <th><center>Working Status</center></th>
                                        <th><center>Employment Status</center></th>
                                        <th><center>Role</center></th>
                                        <th><center>Job Title</center></th>
                                        <th><center>Browse</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $x=0;
                                        while($emprow=$pers->fetch_assoc()){ ?>
                                        <tr>
                                        <td><center><?php echo $emprow['Name']; ?></center></td>
                                        <td><center>
                                            <?php 
                                                
                                                if($emprow['work_stat']=="RETIRED"){
                                                    echo "<button name='ret".$x."' class='btn btn-sm btn-danger'>Employee ".$emprow['work_stat']." Archive?</button>";
                                                }else{
                                                    echo $emprow['work_stat'];
                                                }
                                            ?></center></td>
                                        <td><center><?php echo $emprow['emp_status']; ?></center></td>
                                        <td><center><?php echo $emprow['faculty_type']; ?></center></td>
                                        <td><center><?php echo $emprow['job_title_name']; ?></center></td>
                                        <td>
                                            <center>
                                                <a href="#myModal<?php echo $x;?>" role="button" class="btn btn-primary" data-toggle="modal">
                                                    &nbsp;&nbsp;&nbsp;Folder&nbsp;&nbsp;&nbsp;
                                                </a>
                                            </center>
                                        </td>
                                    </tr>    
                                    <div id="myModal<?php echo $x;?>" class="modal" data-easein="expandIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" style="opacity: 1; display: block; transform: perspective(400px) scaleX(1) scaleY(1) translateX(0px); transform-origin: calc(0px + 50%) 50% 0px;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title">Select The Desired Document To Browse:</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="emp[]" value="<?php echo $emprow['emp_no'];?>">
                                                    
                                                    <div  class="input-group">
                                                        <span class="input-group-addon" id="basic-addon2">Document&nbsp;</span>
                                                            <select id="docs[]" class="form-control" name="doc[]">
                                                                <option value="">Select Document</option>
                                                                <?php
                                                                    if(strstr($job_title,"HRM")){
                                                                        if($emprow['faculty_type']=="Teaching"){
                                                                            $doc=$mysqli->query("SELECT type_id,doc_type FROM dms_doc_type WHERE doc_type!='List' AND (doc_type!='School File 1' AND doc_type!='School File 5' AND doc_type!='Master Grading Sheet' AND doc_type!='Quarterly Grades')");
                                                                            while($dr=mysqli_fetch_assoc($doc)){
                                                                                echo "<option value='".$dr['type_id']."'>".$dr['doc_type']."</option>";
                                                                            }
                                                                        }else{
                                                                            $doc=$mysqli->query("SELECT type_id,doc_type FROM dms_doc_type 
                                                                            WHERE doc_type='Personal Data Sheet' ");
                                                                            while($dr=mysqli_fetch_assoc($doc)){
                                                                                echo "<option value='".$dr['type_id']."'>".$dr['doc_type']."</option>";
                                                                            }
                                                                        }
                                                                    }else if(strstr($job_title,"ICTD")){
                                                                        if($emprow['faculty_type']=="Teaching"){
                                                                            $doc=$mysqli->query("SELECT type_id,doc_type FROM dms_doc_type WHERE doc_type!='List' AND (doc_type!='Service Record' AND doc_type!='Personal Data Sheet')");
                                                                            while($dr=mysqli_fetch_assoc($doc)){
                                                                                echo "<option value='".$dr['type_id']."'>".$dr['doc_type']."</option>";
                                                                            }
                                                                        }
                                                                    }        
                                                                    
                                                                    
                                                                ?>
                                                            </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                                                    <button name="btn<?php echo $x;?>" class="btn btn-primary">Proceed</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>        
                                    <?php
                                        if(isset($_POST['btn'.$x])){
                                            $dc=$_POST['doc'];
                                            $emp=$_POST['emp'];
//                                            $dc=base64_url_encode($dc1[$x]);
//                                            $emp=base64_url_encode($emp1[$x]);
                                            echo "<script>window.location='personnel.php?emp=$emp[$x]&dc=$dc[$x]';</script>";
                                        }
                                                                            
                                        if(isset($_POST['ret'.$x])){
                                            echo "<script>swal('Hello World!');</script>";
                                            /*
                                            mysqli_query($mysqli,"set autocommit=0");
                                            mysqli_query($mysqli,"start transaction");
                                            mysqli_query($mysqli,"LOCK TABLE dms_archive WRITE");
                                            
                                            if($arch==true){
                                                mysqli_query($mysqli,"COMMIT");
                                                echo "<script>alert('All documents of $nname have been archived');</script>";
                                            }else{
                                                mysqli_query($mysqli,"ROLBACK");
                                                    echo "<script>alert('Error Archiving!');</script>";
                                            }
                                            mysqli_query($mysqli,"UNLOCK TABLES");*/
                                        }
                                        $x++;
                                        
                                        
                                        }
                                    ?>
                                        
                                       
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        </form>
                        <?php 
                            
                        ?>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            </div>
            <br><br><br><br><br><br><br><br>
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
<!-- velocity -->
<script src="../js/velocity.min.js.download"></script>
    <script src="../js/velocity.ui.min.js.download"></script>
<script>// add the animation to the popover
$('a[rel=popover]').popover().click(function(e) {
  e.preventDefault();
  var open = $(this).attr('data-easein');
  if (open == 'shake') {
    $(this).next().velocity('callout.' + open);
  } else if (open == 'pulse') {
    $(this).next().velocity('callout.' + open);
  } else if (open == 'tada') {
    $(this).next().velocity('callout.' + open);
  } else if (open == 'flash') {
    $(this).next().velocity('callout.' + open);
  } else if (open == 'bounce') {
    $(this).next().velocity('callout.' + open);
  } else if (open == 'swing') {
    $(this).next().velocity('callout.' + open);
  } else {
    $(this).next().velocity('transition.' + open);
  }

});

// add the animation to the modal
$(".modal").each(function(index) {
  $(this).on('show.bs.modal', function(e) {
    var open = $(this).attr('data-easein');
    if (open == 'shake') {
      $('.modal-dialog').velocity('callout.' + open);
    } else if (open == 'pulse') {
      $('.modal-dialog').velocity('callout.' + open);
    } else if (open == 'tada') {
      $('.modal-dialog').velocity('callout.' + open);
    } else if (open == 'flash') {
      $('.modal-dialog').velocity('callout.' + open);
    } else if (open == 'bounce') {
      $('.modal-dialog').velocity('callout.' + open);
    } else if (open == 'swing') {
      $('.modal-dialog').velocity('callout.' + open);
    } else {
      $('.modal-dialog').velocity('transition.' + open);
    }

  });
});
//# sourceURL=pen.js
</script>

       
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
