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
                <div class="row">
                    <div  class="col-md-1">
                        <br>
                    </div>
                    <div class="col-lg-10">
                        <h1 class="page-header"> <img class="img-responsive" src="../docs/img/Message1.png"></h1>
                    </div>
                </div>
                <div class="row">
                    <div  class="col-md-1">
                        <br>
                    </div>
                    <div class="col-md-10">
                        <div class="chat-panel panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-comments fa-fw"></i> Request
                            </div>
                            <!-- /.panel-heading -->
                            <form enctype="multipart/form-data" method="POST">
                                <div class="panel-body">

                                <ul class="chat">
                                    <?php
                                        $mesid=$_GET['mid'];
                                        $mes=mysqli_query($mysqli,"SELECT pims_personnel.emp_no,dms_doc_type.type_id,doc_type,concat(p_fname,' ',p_lname) as Name,dms_message.cms_account_id,
                                        mes_title,mes_content,sent,mes_stat FROM dms_message,dms_receiver,cms_account,pims_personnel,dms_doc_type 
                                            WHERE dms_receiver.rec_no=dms_message.rec_no
                                            AND pims_personnel.emp_no=cms_account.emp_no
                                            AND dms_doc_type.type_id=dms_message.type_id
                                            AND dms_message.cms_account_id=cms_account.cms_account_id
                                            AND dms_receiver.rec_no=$recid
                                            AND dms_message.mes_id=$mesid");
                                    while($mesrow=mysqli_fetch_assoc($mes)){ 
                                        $type=$mesrow['doc_type'];
                                        $emp=$mesrow['emp_no'];
                                        switch($type){
                                            case 'Service Record':
                                                $link="service_record_pdf.php?emp=$emp&dc=1";
                                                break;
                                            case 'Personal Data Sheet':
                                                $link="PDS_pdf.php?emp=$emp&dc=2";
                                                break;
                                            case 'Master Grading Sheet':
                                                $docmg=$mysqli->query("SELECT css_section.section_id 
                                                FROM pims_personnel,pims_employment_records,css_section,css_school_yr
                                                WHERE css_section.sy_id=css_school_yr.sy_id
                                                AND pims_personnel.emp_no=pims_employment_records.emp_no
                                                AND pims_employment_records.emp_rec_id=css_section.emp_rec_id
                                                AND pims_employment_records.emp_no=$emp");
                                                $mg=mysqli_fetch_assoc($docmg);
                                                $sec=$mg['section_id'];
                                                $link="master_pdf.php?emp=$emp&sec=$sec&dc=3";
                                                break;
                                            case 'Quarterly Grades':
                                                $docqg=$mysqli->query("SELECT css_schedule.sched_id FROM pims_personnel,pims_employment_records,css_section,css_school_yr,css_subject,css_schedule
                                                WHERE css_section.sy_id=css_school_yr.sy_id
                                                AND css_schedule.section_id=css_section.section_id
                                                AND css_schedule.subject_id=css_subject.subject_id
                                                AND css_schedule.sy_id=css_school_yr.sy_id
                                                AND pims_employment_records.emp_rec_id=css_schedule.emp_rec_id
                                                AND pims_personnel.emp_no=pims_employment_records.emp_no
                                                AND pims_employment_records.emp_no=$emp");
                                                $mg=mysqli_fetch_assoc($docqg);
                                                $sec=$mg['sched_id'];
                                                $link="quarterly.php?emp=$emp&sec=$sec&dc=4";
                                                break;
                                            case 'School File 1':
                                                $docsf1=$mysqli->query("SELECT css_section.section_id 
                                                FROM pims_personnel,pims_employment_records,css_section,css_school_yr
                                                WHERE css_section.sy_id=css_school_yr.sy_id
                                                AND pims_personnel.emp_no=pims_employment_records.emp_no
                                                AND pims_employment_records.emp_rec_id=css_section.emp_rec_id
                                                AND pims_employment_records.emp_no=$emp");
                                                $sf1=mysqli_fetch_assoc($docsf1);
                                                $sec=$sf1['section_id'];
                                                $link="sf1.php?emp=$emp&sec=$sec&dc=5";
                                                break;
                                            case 'School File 5':
                                                $docsf5=$mysqli->query("SELECT css_section.section_id 
                                                FROM pims_personnel,pims_employment_records,css_section,css_school_yr
                                                WHERE css_section.sy_id=css_school_yr.sy_id
                                                AND pims_personnel.emp_no=pims_employment_records.emp_no
                                                AND pims_employment_records.emp_rec_id=css_section.emp_rec_id
                                                AND pims_employment_records.emp_no=$emp");
                                                $sf5=mysqli_fetch_assoc($docsf5);
                                                $sec=$sf5['section_id'];
                                                $link="sf5.php?emp=$emp&sec=$sec&dc=6";
                                                break;
                                            case 'List':
                                                $doclist=$mysqli->query("SELECT pims_employment_records.dept_id 
                                                FROM pims_personnel,pims_department,pims_employment_records
                                                WHERE pims_employment_records.dept_ID=pims_department.dept_ID
                                                AND pims_personnel.emp_No=pims_employment_records.emp_No
                                                AND pims_employment_records.emp_no=$emp");
                                                $list=mysqli_fetch_assoc($doclist);
                                                $deep=$list['dept_id'];
                                                $link="list.php?dep=$deep";
                                                break;
                                        }
                                    ?>
                                       <li class="left clearfix">
                                            <span class="chat-img pull-left">
                                                <img src="../docs/img/fr-05.jpg" alt="Users Avatar" class="img-circle" />&nbsp;&nbsp;&nbsp;&nbsp;
                                            </span>
                                            <div class="chat-body clearfix">
                                                <div class="header">
                                                    <small class="text-muted">
                                                        <i class="fa fa-clock-o fa-fw"></i> <?php echo date('M d, Y h:i A', strtotime($mesrow['sent'])); ?>
                                                    </small>
                                                    <h3><strong class="primary-font"><?php echo $mesrow['Name']; ?></strong></h3>
                                                    
                                                </div>&nbsp;<br>
                                                <input type="hidden" name="sub" value="<?php echo $mesrow['mes_title']; ?>">
                                                <input type="hidden" name="aid" value="<?php echo $mesrow['cms_account_id']; ?>">
                                                <b>Subject : </b><?php echo $mesrow['mes_title']." (".$mesrow['doc_type'].")"; ?><br>
                                                <b>Message : </b><br><i style="padding-left:5em"><?php echo $mesrow['mes_content']; ?></i>
                                                <input type="hidden" name="doc" value="<?php echo $mesrow['type_id']; ?>">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Action: </label>

                                                        <select required id="state" name="state" class="form-control">
                                                            <?php 
                                                                if($mesrow['mes_stat']=="P"){
                                                                    echo '<option selected value="">Select Action</option>
                                                                            <option value="1">Approve</option>
                                                                            <option value="0">Deny</option>';
                                                                }else if($mesrow['mes_stat']=="A"){
                                                                    echo '<option value="">Select Action</option>
                                                                            <option selected value="1">Approve</option>
                                                                            <option value="0">Deny</option>';
                                                                }else if($mesrow['mes_stat']=="D"){
                                                                    echo '<option  value="">Select Action</option>
                                                                            <option value="1">Approve</option>
                                                                            <option selected value="0">Deny</option>';
                                                                }
                                                            ?>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div id="res" style="display:none;" class="form-group">
                                                    <textarea id="MyTextArea" name="con" placeholder="Reason for Denying" class="form-control"></textarea>
                                                </div>
                                                <br>
                                                <center>
                                                    <button name="btn" type="submit" class="btn btn-warning btn-md" id="btn-chat">Send</button>
                                                    <a href="FPDF/<?php echo $link;?>" target="_blank" class="btn btn-primary">Check Document</a>
                                                </center>
                                                
                                            </div>
                                        </li> 

                                    <?php } ?>


                                </ul>
                            </div>
                            </form>
                            <?php
                                if(isset($_POST['btn'])){
                                    $state=$_POST['state'];
                                    $dt=date("Y-m-d H:i:s",time());
                                    $doc=$_POST['doc'];
                                    $sub="Re:".$_POST['sub'];
                                    $acc=$_POST['aid'];
                                    $receiver=mysqli_query($mysqli,"SELECT dms_receiver.rec_no FROM dms_receiver,cms_account WHERE dms_receiver.cms_account_id=cms_account.cms_account_id AND dms_receiver.cms_account_id=$acc");
                                    $rrow=mysqli_fetch_assoc($receiver);
                                    $recval=$rrow['rec_no'];
                                    if($state=='1'){
                                        $con="Your Request has been Approved, you can now check your document";

                                        mysqli_query($mysqli,"set autocommit=0");
                                        mysqli_query($mysqli,"start transaction");
                                        mysqli_query($mysqli,"LOCK TABLES dms_message,cms_account,dms_receiver WRITE");
                                        $sql=mysqli_query($mysqli,"UPDATE dms_message SET doc_lock='0', state_date='$dt' ,mes_stat='A' WHERE mes_id=$mesid");
//                                        $lock=mysqli_query($mysqli,"UPDATE dms_document SET doc_lock='0' WHERE doc_id=$doc");
                                        $rep=mysqli_query($mysqli,"INSERT INTO dms_message (mes_title,mes_content,sent,mes_status,mes_delete,doc_lock,mes_stat,type_id,rec_no,cms_account_id,state_date) VALUES ('$sub','$con','$dt','0','0','0','A','$doc','$recval','$aid','$dt')");

                                        if($sql){
                                            if($rep){
                                                mysqli_query($mysqli,"COMMIT");
                                                echo "<script>alert('Approval Sent');</script>";
                                                echo "<script>window.location='inbox.php'</script>"; 
                                            }else{
                                                mysqli_query($mysqli,"ROLLBACK");
                                                echo "<script>alert('Data Error!!')</script>";
                                                echo "<script>window.location='inbox.php'</script>";
                                            }
                                        }else{
                                            mysqli_query($mysqli,"ROLLBACK");
                                            echo "<script>alert('Data Error!')</script>"; 
                                            echo "<script>window.location='inbox.php'</script>";
                                        }
                                        mysqli_query($mysqli,"UNLOCK TABLES");



                                    }else{
                                        $con=$_POST['con'];
                                        mysqli_query($mysqli,"set autocommit=0");
                                        mysqli_query($mysqli,"start transaction");
                                        mysqli_query($mysqli,"LOCK TABLES dms_document,dms_message,cms_account,dms_receiver READ");
                                        $sql=mysqli_query($mysqli,"UPDATE dms_message SET state_date='$dt', mes_stat='D' WHERE mes_id=$mesid");
                                        $rep=mysqli_query($mysqli,"INSERT INTO dms_message (mes_title,mes_content,sent,mes_status,mes_delete,mes_stat,type_id,rec_no,cms_account_id,state_date) VALUES ('$sub','$con','$dt','0','0','D','$doc','$recval','$aid','$dt')");
                                        if($sql){
                                            mysqli_query($mysqli,"COMMIT");

                                            echo "<script>alert('Document Denied!')</script>"; 
                                            echo "<script>window.location='inbox.php'</script>";
                                        }else{
                                            mysqli_query($mysqli,"ROLLBACK");
                                            echo "<script>alert('Data Error!')</script>"; 
                                            echo "<script>window.location='inbox.php'</script>"; 
                                        }
                                        mysqli_query($mysqli,"UNLOCK TABLES");
                                    }


                                }
                            ?>
                            <!-- /.panel-body -->

                        </div>
                    </div>
                    <div  class="col-md-1">
                        <br>
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
    </div>
    <!-- /#wrapper -->
<script src='../js/jquery.min.js'></script>
<script src='../js/bootstrap.min.js'></script>
<script src="../js/index.js"></script>
<script src="../../../js/metisMenu.min.js"></script>
<script src="../../../js/sb-admin-2.min.js"></script>    
<script>
    $('#state').on('change',function(){
         var selection = $(this).val();
        
        switch(selection){
        case "0":
        $("#res").show();
        $('#MyTextArea').attr('required',true);
       break;
        default:
        $("#res").hide();
        $('#MyTextArea').removeAttr('required');        
        }
    });    
    </script>    

</body>

</html>
