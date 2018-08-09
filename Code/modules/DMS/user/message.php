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
    <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css" type="text/css">
    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="../vendor/dist/css/sb-admin-2.css" rel="stylesheet">
</head>

<body>

        <?php include("../topnav.php");?>
      <div id="wrapper">
    
        <!-- Sidebar -->
        <?php include("../sidenav.php") ?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1">
                        <br>
                    </div>
                    <div class="col-lg-10">
                        <h1 class="page-header"><img src="../docs/img/Message1.png"></h1>
                    </div>
                    <div class="col-lg-1">
                        <br>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div  class="col-md-1">
                        <br>
                    </div>
                    <div class="col-md-10">
                        <div class="chat-panel panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-comments fa-fw"></i> Message
                            </div>
                            <!-- /.panel-heading -->
                            <form method="POST">
                                <div class="panel-body">
                                    <ul class="chat">
                                            <?php
                                                $mesid=$_GET['mid'];
                                                $mes=mysqli_query($mysqli,"SELECT concat(p_fname,' ',p_lname) as Name,mes_title,mes_content,sent,mes_stat,dms_doc_type.type_id,doc_type,doc_lock 
                                                FROM dms_message,dms_receiver,cms_account,pims_personnel,dms_doc_type 
                                                    WHERE dms_receiver.rec_no=dms_message.rec_no
                                                    AND pims_personnel.emp_no=cms_account.emp_no
                                                    AND dms_doc_type.type_id=dms_message.type_id
                                                    AND dms_message.cms_account_id=cms_account.cms_account_id
                                                    AND dms_receiver.rec_no=$recid
                                                    AND dms_message.mes_id=$mesid
                                                    ");
                                            while($mesrow=mysqli_fetch_assoc($mes)){ ?>
                                               <li class="left clearfix">
                                                    <span class="chat-img pull-left">
                                                        <img src="../docs/img/fr-05.jpg" alt="Users Avatar" class="img-circle" />
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
                                                        <input type="hidden" name="doc" value="<?php echo $mesrow['doc_id']; ?>">

                                                        <br>
                                                        <?php 
                                                            if($mesrow['doc_lock']=='0'){
                                                                if($mesrow['doc_type']=="Service Record"){?>
                                                                    <center><a href="viewed.php?emp=<?php echo $emp; ?>&mes=<?php echo $mesid?>&dc=1" class="btn btn-warning btn-md" id="btn-chat">View Document</a></center>
                                                            <?php        
                                                                }else if($mesrow['doc_type']=="Personal Data Sheet"){ ?>
                                                                    <center><a href="viewed.php?emp=<?php echo $emp; ?>&mes=<?php echo $mesid?>&dc=2" class="btn btn-warning btn-md" id="btn-chat">View Document</a></center>
                                                            <?php        
                                                                }else if($mesrow['doc_type']=="Master Grading Sheet"){ ?>
                                                                    <center><a href="viewed.php?emp=<?php echo $emp; ?>&mes=<?php echo $mesid?>&dc=3" class="btn btn-warning btn-md" id="btn-chat">View Document</a></center>
                                                            <?php        
                                                                }else if($mesrow['doc_type']=="Quarterly Grades"){ ?>
                                                                    <center><a href="viewed.php?emp=<?php echo $emp; ?>&mes=<?php echo $mesid?>&dc=4" class="btn btn-warning btn-md" id="btn-chat">View Document</a></center>
                                                            <?php        
                                                                }else if($mesrow['doc_type']=="School File 1"){ ?>
                                                                    <center><a href="viewed.php?emp=<?php echo $emp; ?>&mes=<?php echo $mesid?>&dc=5" class="btn btn-warning btn-md" id="btn-chat">View Document</a></center>
                                                            <?php        
                                                                }else if($mesrow['doc_type']=="School File 2"){ ?>
                                                                    <center><a href="viewed.php?emp=<?php echo $emp; ?>&mes=<?php echo $mesid?>&dc=6" class="btn btn-warning btn-md" id="btn-chat">View Document</a></center>
                                                            <?php        
                                                                }else if($mesrow['doc_type']=="List"){ ?>
                                                                    <center><a href="viewed.php?emp=<?php echo $emp; ?>&mes=<?php echo $mesid?>&dc=7" class="btn btn-warning btn-md" id="btn-chat">View Document</a></center>
                                                            <?php        
                                                                }

                                                            }else{ ?>
                                                                    <center><a href="add.php" class="btn btn-warning btn-md" id="btn-chat">Request</a></center>
                                                        <?php
                                                            }

                                                        ?>

                                                    </div>
                                                </li> 

                                            <?php } ?>


                                        </ul>
                                </div>
                            </form>

                            <!-- /.panel-body -->
                        </div>
                    </div>
                    <div class="col-md-1">
                        <br>
                    </div>
                </div>
            </div>
            
        </div>
          <br><br><br><br>
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
<!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>
</body>

</html>
