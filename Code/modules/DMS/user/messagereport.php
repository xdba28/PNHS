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
                    <div class="col-md-1">
                        <br>
                    </div>
                    <div class="col-lg-10">
                        <h6 class="page-header"><img src="../docs/img/MessageReport2.png"></h6>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <form method="POST">
                    <div class="row">
                        <div class="col-md-1">
                            <br>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon">Report Type</span>
                                <select required name="rep" class="form-control">
                                    <option value="">Select Report Type</option>
                                    <option value="stat">Message Status</option>
                                    <option value="sent">Sent Messages</option>
                                    <option value="seen">Seen Messages</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <button name="btn" class="btn btn-primary">Go</button>
                        </div>
                    </div>
                </form>

                <br>
                <!-- /.row -->
                <?php 
                if(isset($_POST['btn'])){
                    $rep=$_POST['rep'];
                ?>    

                <div class="row">
                    <div class="col-lg-1">
                        <br>
                    </div>
                    <div class="col-lg-11">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <?php echo $emprow['Name']?>'s Message Report
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Message Report</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        if($rep=='stat'){
                                            $report=$mysqli->query("SELECT doc_type,mes_stat,state_date,concat(p_fname,' ',p_lname) as Name from dms_message,cms_account,dms_receiver,dms_doc_type,pims_personnel
                                            WHERE cms_account.emp_no=pims_personnel.emp_No
                                            AND dms_message.cms_account_id=cms_account.cms_account_ID
                                            AND dms_message.rec_no=dms_receiver.rec_no
                                            AND dms_doc_type.type_id=dms_message.type_id
                                            AND dms_message.rec_no=$recid
                                            AND (mes_stat='A' OR mes_stat='D')
                                            ORDER BY state_date");

                                            while($reprow=$report->fetch_assoc()){
                                                $dt=strtotime($reprow['state_date']);
                                                $time=date("h:i A",$dt);
                                                $date1=date("Y-m-d",$dt);               
                                                $now=date("Y-m-d");
                                                $m=date("F",$dt);
                                                $d=date("d",$dt);
                                                $y=date("Y",$dt);
                                                if($reprow['mes_stat']=='A'){

                                                    if($date1==$now){
                                                        echo "<tr>";
                                                            echo"<td>".$reprow['Name']." <span class='alert-success'><i>Approved</i></span> your request for ".$reprow['doc_type']." today at $time. </td>";
                                                        echo "</tr>";
                                                    }else if($date1==$yesterday){
                                                        echo "<tr>";
                                                            echo"<td>".$reprow['Name']." <span class='alert-success'><i>Approved</i></span> your request for ".$reprow['doc_type']." yesterday at $time. </td>";
                                                        echo "</tr>";
                                                    }else{
                                                        echo "<tr>";
                                                            echo"<td>".$reprow['Name']." <span class='alert-success'><i>Approved</i></span> your request for ".$reprow['doc_type']." last $m $d,$y at $time. </td>";
                                                        echo "</tr>";
                                                    }

                                                }else{
                                                    if($date1==$now){
                                                        echo "<tr>";
                                                            echo"<td>".$reprow['Name']." <span class='alert-danger'><i>Denied</i></span> your request for ".$reprow['doc_type']." today at $time. </td>";
                                                        echo "</tr>";
                                                    }else if($date1==$yesterday){
                                                        echo "<tr>";
                                                            echo"<td>".$reprow['Name']." <span class='alert-danger'><i>Denied</i></span> your request for ".$reprow['doc_type']." yesterday at $time. </td>";
                                                        echo "</tr>";
                                                    }else{
                                                        echo "<tr>";
                                                            echo"<td>".$reprow['Name']." <span class='alert-danger'><i>Denied</i></span> your request for ".$reprow['doc_type']." last $m $d,$y at $time. </td>";
                                                        echo "</tr>";
                                                    }
                                                }


                                            }
                                        }else if($rep=='sent'){
                                            $report=$mysqli->query("SELECT mes_content,mes_title, concat(p_fname,' ',p_lname) as Name,sent FROM dms_message,dms_receiver,cms_account,pims_personnel 
                                                    WHERE dms_receiver.rec_no=dms_message.rec_no
                                                    AND pims_personnel.emp_no=cms_account.emp_no
                                                    AND cms_account.cms_account_ID=dms_receiver.cms_account_id
                                                    AND dms_message.cms_account_id=$aid
                                                    AND mes_delete='0'");

                                            while($reprow=$report->fetch_assoc()){
                                                $dt=strtotime($reprow['sent']);
                                                $time=date("h:i A",$dt);
                                                $date1=date("Y-m-d",$dt);
                                                $now=date("Y-m-d");
                                                $m=date("F",$dt);
                                                $d=date("d",$dt);
                                                $y=date("Y",$dt);
                                                if($date1==$now){
                                                    echo "<tr>";
                                                        echo"<td>You sent a <a class='btn-primary btn-sm'  data-container='body' data-toggle='popover' data-placement='top' title='Subject: ".$reprow['mes_title']."' data-content='".$reprow['mes_content']."'>message</a> to <i>".$reprow['Name']."</i> today at $time. </td>";
                                                    echo "</tr>";
                                                }else if($date1==$yesterday){
                                                    echo "<tr>";
                                                        echo"<td>You sent a <a class='btn-primary btn-sm' data-container='body' data-toggle='popover' data-placement='top' title='Subject: ".$reprow['mes_title']."' data-content='".$reprow['mes_content']."'>message</a> to <i>".$reprow['Name']."</i> yesterday at $time. </td>";
                                                    echo "</tr>";
                                                }else{
                                                    echo "<tr>";
                                                        echo"<td>You sent a <a class='btn-primary btn-sm' data-container='body' data-toggle='popover' data-placement='top' title='Subject: ".$reprow['mes_title']."' data-content='".$reprow['mes_content']."'>message</a> to <i>".$reprow['Name']."</i> last $m $d,$y at $time. </td>";
                                                    echo "</tr>";
                                                }


                                            }
                                        }else if($rep=='seen'){
                                            $report=$mysqli->query("SELECT concat(p_fname,' ',p_lname) as Name,received FROM dms_message,dms_receiver,cms_account,pims_personnel 
                                                    WHERE dms_receiver.rec_no=dms_message.rec_no
                                                    AND pims_personnel.emp_no=cms_account.emp_no
                                                    AND cms_account.cms_account_ID=dms_receiver.cms_account_id
                                                    AND dms_message.cms_account_id=$aid
                                                    AND mes_delete='0'");

                                            while($reprow=$report->fetch_assoc()){
                                                $dt=strtotime($reprow['received']);
                                                $time=date("h:i A",$dt);
                                                $date1=date("Y-m-d",$dt);                
                                                $now=date("Y-m-d");
                                                $m=date("F",$dt);
                                                $d=date("d",$dt);
                                                $y=date("Y",$dt);
                                                if($dt==null){
                                                    echo "<tr>";
                                                        echo"<td>".$reprow['Name']." <i>hasn't seen</i> your message yet. </td>";
                                                    echo "</tr>";
                                                }else{
                                                    if($date1==$now){
                                                        echo "<tr>";
                                                            echo"<td>".$reprow['Name']." saw your message today at <i>$time</i>. </td>";
                                                        echo "</tr>";
                                                    }else if($date1==$yesterday){
                                                        echo "<tr>";
                                                            echo"<td>".$reprow['Name']." saw your message yesterday at <i>$time</i>. </td>";
                                                        echo "</tr>";
                                                    }else{
                                                        echo "<tr>";
                                                            echo"<td>".$reprow['Name']." saw your message last <i>$m $d,$y at $time</i>. </td>";
                                                        echo "</tr>";
                                                    }
                                                }



                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <?php
                }else{
                    echo "<br><br><br><br><br><br><br><br><br><br><br><br>";
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
    
    $(function () {
  $('[data-toggle="popover"]').popover()
})
</script>
</body>

</html>
