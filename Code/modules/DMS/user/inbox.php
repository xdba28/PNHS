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
    
    <link href="../vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

</head>

<body>
        <?php include("../topnav.php");?>
      <div id="wrapper">
    
        <!-- Sidebar -->
        <?php include("../sidenav.php") ?>
        <!-- /#sidebar-wrapper -->

            <div id="main" class="container">
                <div class="row">
                    <div class="col-lg-1">
                        <br>
                    </div>
                    <div class="col-lg-10">
                        <h1 class="page-header"><img src="../docs/img/inbox2.png"></h1>
                    </div>
                    <div class="col-lg-1">
                        <br>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-1">
                        <br>
                    </div>
                    <div class="col-lg-10">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <?php echo $emprow['Name']?>'s Inbox &nbsp; <a class="btn btn-primary" href="add.php"><i class="fa fa-plus">Create Message</i></a>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Name</th>
                                            <th>Subject</th>
                                            <th>Send Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $mes=mysqli_query($mysqli,"SELECT concat(p_fname,' ',p_lname) as Name,dms_message.mes_id,mes_title,sent,mes_status FROM dms_message,dms_receiver,cms_account,pims_personnel 
                                            WHERE dms_receiver.rec_no=dms_message.rec_no
                                            AND pims_personnel.emp_no=cms_account.emp_no
                                            AND dms_message.cms_account_id=cms_account.cms_account_id
                                            AND dms_receiver.rec_no=$recid
                                            AND mes_delete='0'");
                                            while($mesrow=mysqli_fetch_assoc($mes)){
                                                $dt=strtotime($mesrow['sent']); 
                                                $datetime=date("F d,Y h:i A",$dt);
                                                if($mesrow['mes_status']=='0'){
                                                    echo "  <tr>
                                                            <td><center><a href='mes_update.php?read=0&del=1&mid=".$mesrow['mes_id']."' class='btn btn-danger'><i class='fa fa-trash-o fa-fw'></i></a>&nbsp;<a href='mes_update.php?read=1&del=0&rid=$recid&mid=".$mesrow['mes_id']."' class='btn btn-primary'><i class='fa fa-level-up fa-fw'></i>OPEN</a></center></td>
                                                            <td><center>".$mesrow['Name']."</center></td>
                                                            <td><center>".$mesrow['mes_title']."</center></td>
                                                            <td><center>".$datetime."</center></td>
                                                            <td><center><span class='label label-default'>UNREAD</span></center></td>
                                                        </tr>";    
                                                }else{
                                                    echo "  <tr>
                                                            <td><center><a href='mes_update.php?read=0&del=1&mid=".$mesrow['mes_id']."' class='btn btn-danger'><i class='fa fa-trash-o fa-fw'></i></a>&nbsp;<a href='mes_update.php?read=1&del=0&rid=$recid&mid=".$mesrow['mes_id']."' class='btn btn-primary'><i class='fa fa-level-up fa-fw'></i>OPEN</a></center></td>
                                                            <td><center>".$mesrow['Name']."</center></td>
                                                            <td><center>".$mesrow['mes_title']."</center></td>
                                                            <td><center>".$datetime."</center></td>
                                                            <td><center><span class='label label-default'>READ</span></center></td>
                                                        </tr>";
                                                }

                                            }
                                        ?>
                                    </tbody>
                                </table>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-1">
                        <br>
                    </div>
                    <div class="col-lg-1">
                        <br>
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
