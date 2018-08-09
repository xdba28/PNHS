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
    <link href="../css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/sweetalert.css" rel="stylesheet">
    <script src='../js/jquery.min.js'></script>
    <script src='../js/bootstrap.min.js'></script>
    <script src="../js/index.js"></script>
    <script src="../js/sweetalert-dev.js"></script>
    <?php 
        $ynow=date("Y");
        $ynow1=$ynow+1;
        $toy=$ynow."-".$ynow1;
        $sy_q=$mysqli->query("SELECT arch_start,arch_end FROM dms_archive_date Where arch_sy='$toy' ");
        $sy_nn=$sy_q->num_rows;
        if($sy_nn!=0){
            $sy_r=$sy_q->fetch_assoc();
            $sy_s=$sy_r['arch_start'];
            $sy_e=$sy_r['arch_end'];    
        }else{
            $sy_s="00-00-00 00:00:00";
            $sy_e="00-00-00 00:00:00";
        }
        $arch_ch=$mysqli->query("SELECT count(emp_no) FROM dms_archive WHERE year(arch_date)>='$ynow'");
        $ar_row=$arch_ch->fetch_assoc();
        $ar_n=$ar_row['count(emp_no)'];
        $sad=$_SESSION['user_data']['priv']['superadmin'];
        
    ?>
    <script type="text/javascript">
        // Set the date we're counting down to
        var check=<?php echo $sy_nn;?>;;
        var ar=<?php echo $ar_n;?>;
        var sad=<?php echo $sad; ?>;
        if(check!=0){
            if(ar==0){
                if(sad==1){
                    var x = setInterval(function() {
                        clearInterval(x);
                        document.getElementById("arch").href="arch_disk.php";
                        swal("REMINDER: You can now archive documents!","","warning");
                    }, 1000); 
                }

                if(sad==0){

                    var yr="<?php echo $sy_s; ?> ";
                    var week="<?php echo $sy_e; ?>";
                    var countDownDate = new Date(yr).getTime();
                    var endweek = new Date(week).getTime();
                    var clr=0;
                    // Update the count down every 1 second
                    var x = setInterval(function() {

                      // Get todays date and time
                      var now = new Date().getTime();
                    var dweek=endweek-now;
                      // Find the distance between now an the count down date
                      var distance = countDownDate - now;

                      // Time calculations for days, hours, minutes and seconds
                      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                      // Display the result in the element with id="demo"
                    document.getElementById("demo").innerHTML = days + "d " + hours + "h "
                   + minutes + "m " + seconds + "s till the next archive.";

                      // If the count down is finished, write some text 
                      if (distance < 0 && now < endweek && dweek>0) {
                        //clearInterval(x);
                          var days1 = Math.floor(dweek / (1000 * 60 * 60 * 24));
                          var hours1 = Math.floor((dweek % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                          var minutes1 = Math.floor((dweek % (1000 * 60 * 60)) / (1000 * 60));
                          var seconds1 = Math.floor((dweek % (1000 * 60)) / 1000);
                          document.getElementById("demo").innerHTML = "You have "+days1+"d "+ hours1 + "h "
                   + minutes1 + "m " + seconds1 + "s to archive";
                        document.getElementById("arch").href="arch_disk.php";
                          if(clr==0){
                            swal("REMINDER: You can now archive documents!","","warning");
                            clr=1;
                        }

                      }   
                    }, 1000);
                }
            }    
        }else{
            if(ar==0){
                if(sad==1){
                    var x = setInterval(function() {
                        document.getElementById("demo").innerHTML = "Archive Date is not set for this year.";
                    }, 1000); 
                }

                if(sad==0){
                    // Update the count down every 1 second
                    var x = setInterval(function() {
                        document.getElementById("demo").innerHTML = "Archive Date is not set for this year.";
                    }, 1000);
                }
            }
        }
                                
        
        
    </script>
    
</head>

<body>

            <?php include("../topnav.php");?>
      <div id="wrapper">
    
        <!-- Sidebar -->
        <?php include("../sidenav.php");?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container">
                
                <?php
                    $pers=mysqli_query($mysqli,"SELECT pims_employment_records.emp_no,concat(p_lname,', ',p_fname,' ',substring(ifnull(p_mname,''),'1','1')) as Name,emp_status,work_stat,role_type,faculty_type,job_title_name 
                        FROM pims_personnel,pims_employment_records,pims_job_title
                        WHERE pims_personnel.emp_no=pims_employment_records.emp_no
                        AND pims_job_title.job_title_code=pims_employment_records.job_title_code
                        AND work_stat='RETIRED'
                        AND pims_personnel.emp_no NOT IN (SELECT dms_archive.emp_no FROM dms_archive,pims_personnel WHERE pims_personnel.emp_no=dms_archive.emp_no)
                        ORDER by p_lname");
                        $ct=$pers->num_rows;
                    
                ?>
                <div class="row">
                    <div  class="col-md-1">
                        <br>
                    </div>
                    <div class="col-lg-10">
                        <h1 class="page-header"><img class="img-responsive" src="../docs/img/ArchivedDocuments2.png"></h1>
                    </div>
                </div>
                <div class="row">
                    <div  class="col-md-1">
                        <br>
                    </div>
                    <div class="col-md-10">
                    <form method="post">
                    <a href="#myModal" role="button" data-toggle="modal" class="btn btn-primary"><i class="fa fa-fw fa-calendar"></i>Set Archive Date</a>
                    <h6><font color="red"><b><i id="demo"></i> </b></font></h6>    
                    <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3><i class="fa fa-user"></i><b>RETIRED PERSONNEL</b></h3>
                        
                    </div>    
                    <div class="panel-body">
                        <a id="arch" style="float: right;margin-bottom: 5px;margin-top: -10px;">
                        <img width="60px;" src="../docs/img/archivebutton.png"><i style="position:relative;left:-18px;bottom:-17px;"><span style="background-color:lightblue;" class="badge"><?php echo $ct;?></span></i>
                    </a>
                        <br>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th><center>Name</center></th>
                                        <th><center>Employment Status</center></th>
                                        <th><center>Role</center></th>
                                        <th><center>Job Title</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $x=0;
                                        while($emprow=$pers->fetch_assoc()){ ?>
                                        <tr>
                                            <td><center><?php echo $emprow['Name']; ?></center></td>
                                            <td><center><?php echo $emprow['emp_status']; ?></center></td>
                                            <td><center><?php echo $emprow['faculty_type']; ?></center></td>
                                            <td><center><?php echo $emprow['job_title_name']; ?></center></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                    </div>
                        <br><br><br><br>
                    </form>    
                    <?php 
//                        if(isset($_POST['arch'])){
//                            $syqry=$mysqli->query("SELECT year FROM css_school_yr WHERE status='active'");
//                            $syrow=$syqry->fetch_assoc();
//                            $synow=$syrow['year'];
//                            while($row=$pers->fetch_assoc()){
//                                $empp=$row['emp_no'];
//                                $emp_name_pro=$mysqli->query("SELECT concat(p_fname,' ',p_lname) as Name FROM pims_personnel WHERE emp_no=$empp");
//                                $emp_name=mysqli_fetch_assoc($emp_name_pro);
//                                $nname=$emp_name['Name'];
//                                if(!file_exists('../Archive_'.$synow)){
//                                    mkdir('../Archive_'.$synow, 0777, true);
//                                    if(!file_exists('../Archive_'.$synow.'/'.$nname)){
//                                        mkdir('../Archive_'.$synow.'/'.$nname, 0777, true);
//                                        echo "<script>window.open('fpdf/archive_sr.php?emp=".$empp."','_blank');</script>";
//                                    }else{
//                                        echo "<script>window.open('fpdf/archive_sr.php?emp=".$empp."','_blank');</script>";
//                                    }
//
//                                }else{
//                                    if(!file_exists('../Archive_'.$synow.'/'.$nname)){
//                                        mkdir('../Archive_'.$synow.'/'.$nname, 0777, true);
//                                        echo "<script>window.open('fpdf/archive_sr.php?emp=".$empp."','_blank');</script>";
//                                    }else{
//                                        echo "<script>window.open('fpdf/archive_sr.php?emp=".$empp."','_blank');</script>";
//                                    }
//                                }
//                            }
//                            
//                        }
                    ?>
                    </div>    
                </div>
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
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title"><i class="fa fa-fw fa-calendar"></i>Set Archiving Date</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label>School Year: </label>
                            <select class="form-control" name="sy">
                                <?php 
                                    $check_sy=$mysqli->query("SELECT arch_date_id FROM dms_archive_date WHERE arch_sy LIKE '%$ynow-%'");
                                    $check_sy_n=$check_sy->num_rows;
                                    if($check_sy_n=="1"){
                                        for($i=$ynow+1;$i<=$ynow+6;$i++){
                                            echo "<option value='".$i."-".($i+1)."'>".$i."-".($i+1)."</option>";
                                        }
                                    }else{
                                        for($i=$ynow;$i<=$ynow+5;$i++){
                                            echo "<option value='".$i."-".($i+1)."'>".$i."-".($i+1)."</option>";
                                        }    
                                    }
                                    
                                ?>
                            </select>
                        </div>
                    </div>
                    <label>Archiving Date: </label>
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon2">Start&nbsp;</span>
                        <input name="start" class="form-control" type="date">  
                        <span class="input-group-addon" id="basic-addon2">End&nbsp;</span>
                        <input name="end" class="form-control" type="date"> 
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button name="set" class="btn btn-primary">Proceed</button>
                </div>
            </div>
            </form>
        </div>
    </div> 
    <?php 
        if(isset($_POST['set'])){
            $start=$_POST['start'];
            $end=$_POST['end'];
            $syyy=$_POST['sy'];
            $ys=date("Y",strtotime($start));
            $ye=date("Y",strtotime($end));
            $ar_q=$mysqli->query("SELECT arch_date_id FROM dms_archive_date WHERE arch_sy='$syyy'");
            $ar_n=$ar_q->num_rows;
            $ar_v=$ar_q->fetch_assoc();
            $ar_id=$ar_v['arch_date_id'];
            $startn=date("Y-m-d");
            if($start>=$startn && ($end>$start && $end>$startn) ){
                mysqli_query($mysqli,"set autocommit=0");
                mysqli_query($mysqli,"start transaction");
                mysqli_query($mysqli,"LOCK TABLES dms_arch_date WRITE");
                if($ar_n==1){
                    ?><script>swal({
                    title:'Set Archiving Date',
                    text:'Overwrite date?',
                    type:'warning',
                    closeOnConfirm: false,
                    showCancelButton:true,},
                    function(decide){
                        if(decide==true){
                            <?php 
                                $up_arch=$mysqli->query("UPDATE dms_archive_date SET arch_start='$start',arch_end='$end' WHERE arch_date_id=$ar_id");
                                if($up_arch){
                                    mysqli_query($mysqli,"COMMIT");
                                    ?>swal({title:"Archive Date Overwritten!", text:"", type:"success"},function(){ window.location.href='archiving.php'});<?php
                                }else{
                                    mysqli_query($mysqli,"ROLLBACK");
                                    ?>swal("Error Overwritting Date!", "", "warning");<?php
                                }
                            ?>
                        }else{
                            window.location.href='archiving.php';
                        }

                    });</script><?php
                }else{
                    $in_arch=$mysqli->query("INSERT INTO dms_archive_date(arch_start,arch_end,arch_sy) Values('$start','$end','$syyy') ");
                    if($in_arch){
                        mysqli_query($mysqli,"COMMIT");
                        echo '<script>swal({title:"Archive Date Set!", text:"", type:"success"},function(){window.location.href="archiving.php"});</script>';           
                    }else{
                        mysqli_query($mysqli,"ROLLBACK");
                        echo '<script>swal("Error Setting Date!", "", "warning");</script>';
                    }
                }
                mysqli_query($mysqli,"UNLOCK TABLES");                
            }else{
                echo '<script>swal({title:"Error! Invalid Dates!", text:"", type:"warning"});</script>';
            }

        }      
    ?>
    </div>
    <!-- /#wrapper -->
    
<script src="../../../js/metisMenu.min.js"></script>
<script src="../../../js/sb-admin-2.min.js"></script>    
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
