<!DOCTYPE html>
<html lang="en" >
<?php 
    include("../func.php");
    include("../db/db.php");
    include("../sesh.php");
    include("../curr.php");
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
    <link href="../vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <script src='../js/jquery.min.js'></script>
<script src='../js/bootstrap.min.js'></script>
    <script src="../js/sweetalert.js"></script>
    <script type="text/javascript">
	$(document).ready(function(){
		var maxField = 10; //Input fields increment limitation
		var addButton = $('.add_button'); //Add button selector
		var wrapper = $('.field_wrapper'); //Input field wrapper
		var fieldHTML = '<div class="field_wrapper"><a href="javascript:void(0);" class="remove_button" title="Remove field"><img style="width:100px;padding-left:10px;" src="../docs/img/remove2.png"></a><div class="row"><div class="col-md-1"><br></div><div class="col-md-2"><label><h6><b>Inclusive date start</b></h6></label><input class="form-control" placeholder="yyyy-mm-dd" name="start[]" required></div><div class="col-md-2"><label><h6><b>Inclusive date end</b></h6></label><input class="form-control" placeholder="yyyy-mm-dd" name="end[]" required></div><div class="col-md-3"><label><h6><b>Source of Fund</b></h6></label><input class="form-control" placeholder="e.g.,BSP" type="text" name="fund[]" required></div><div class="col-md-3"><label><h6><b>Remarks</b></h6></label><input class="form-control" placeholder="e.g.,Promoted" type="text" name="remark[]" required></div></div><div class="row"><div class="col-md-1"><br></div><div class="col-md-2"><label><h6><b>Status</b></h6></label><input class="form-control" placeholder="e.g.,Permanent" type="text" name="stat[]" required></div><div class="col-md-2"><label><h6><b>Salary</b></h6></label><div class="input-group"><span class="input-group-addon" id="basic-addon1">&#8369;</span><input class="form-control" placeholder="1000.00" type="number" name="sal[]" required></div></div><div class="col-md-3"><label><h6><b>Designation</b></h6></label><input class="form-control" placeholder="e.g.,Teacher I" type="text" name="des[]" required></div><div class="col-md-3"><label><h6><b>Office Entry</b></h6></label><input class="form-control" placeholder="e.g.,PNHS" type="text" name="office[]" required></div><div class="col-md-1"><br></div></div><hr></div>'; //New input field html 
		var x = 1; //Initial field counter is 1
		$(addButton).click(function(){ //Once add button is clicked
			if(x < maxField){ //Check maximum number of input fields
				x++; //Increment field counter
				$(wrapper).append(fieldHTML); // Add field html
			}
		});
		$(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
			e.preventDefault();
			$(this).parent('div').remove(); //Remove field html
			x--; //Decrement field counter
		});
	});
	</script>
</head>

<body>

            <?php include("../topnav.php");?>
      <div id="wrapper">
    
        <!-- Sidebar -->
        <?php include("../sidenav.php");?>
        <!-- /#sidebar-wrapper -->

            <div class="container">
                <div class="row">
                    <div class="col-md-1">
                        <br>
                    </div>
                    <div class="col-md-10">
                        <div class="panel panel-default">
                            <div class="panel-body">
                            <?php
                                $emp_no=$_GET['emp'];
                                $person=$mysqli->query("SELECT faculty_type,concat(p_lname,', ',p_fname,' ',substring(ifnull(p_mname,''),'1','1')) as Name
                                FROM pims_personnel,pims_employment_records
                                WHERE pims_personnel.emp_no=pims_employment_records.emp_no
                                AND pims_employment_records.emp_rec_id=$emp_no
                                AND work_stat!='RETIRED'");
                                $per=$person->fetch_assoc();

                            ?>
                                <div class="row">   
                                    <div class="col-lg-12">
                                        <h1 class="page-header"> <img class="img-responsive" src="../docs/img/ServiceRecord2.png"></h1>
                                        <h3><b><?php echo $per['Name'];?></b><small><a style="float: right;margin-bottom: 5px;" class="btn btn-primary btn-sm" href="sr_input.php?emp=<?php echo $emp_no; ?>">Add new record</a></small></h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <form method="post">
                                    <table class="table table-responsive table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th><center><small>Inclusive Date Start</small></center></th>
                                                <th><center><small>Inclusive Date End</small></center></th>
                                                <th><center><small>Source of Fund</small></center></th>
                                                <th><center><small>Remarks</small></center></th>
                                                <th><center><small>Status</small></center></th>
                                                <th><center><small>Salary</small></center></th>
                                                <th><center><small>Designation</small></center></th>
                                                <th><center><small>Office Entry</small></center></th>
                                                <th><center><small>Update</small></center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $srq=$mysqli->query("SELECT * FROM pims_service_records WHERE emp_rec_id=$emp_no ORDER BY inclusive_date_start");
                                                $x=0;
                                                while($srr=$srq->fetch_assoc()){ ?>
                                            <tr>
                                                <td><center><?php echo $srr['inclusive_date_start']; ?></center></td>
                                                <td><center><?php echo $srr['inclusive_date_end']; ?></center></td>
                                                <td><center><?php echo $srr['srce_of_fund']; ?></center></td>
                                                <td><center><?php echo $srr['remarks']; ?></center></td>
                                                <td><center><?php echo $srr['sr_status']; ?></center></td>
                                                <td><center><?php echo money_format('%i ',$srr['salary']); ?></center></td>
                                                <td><center><?php echo $srr['designation']; ?></center></td>
                                                <td><center><?php echo $srr['place_of_assignment']; ?></center></td>
                                                <td><center><a href="#myModal<?php echo $x;?>" role="button" data-toggle="modal" class="btn btn-success btn-sm"><i class="fa fa-refresh fa-spin"></i></a></center></td>
                                            </tr>
                                            <div id="myModal<?php echo $x;?>" class="modal fade" data-easein="expandIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            <h4 class="modal-title">Update Record:</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" name="sr[]" value="<?php echo $srr['servRec_ID'];?>">

                                                            <div class="row">
                                                                <div class="col-md-1">
                                                                    <br>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label><h6><b>Inclusive date start</b></h6></label> 
                                                                    <input value="<?php echo $srr['inclusive_date_start']; ?>" class="form-control" placeholder="yyyy-mm-dd" name="start[]">
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label><h6><b>Inclusive date end</b></h6></label> 
                                                                    <input value="<?php echo $srr['inclusive_date_end']; ?>" class="form-control" placeholder="yyyy-mm-dd" name="end[]">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label><h6><b>Source of Fund<br>&nbsp;</b></h6></label> 
                                                                    <input value="<?php echo $srr['srce_of_fund']; ?>" class="form-control" placeholder="e.g.,BSP" type="text" name="fund[]">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label><h6><b>Remarks<br>&nbsp;</b></h6></label> 
                                                                    <input value="<?php echo $srr['remarks']; ?>" class="form-control" placeholder="e.g.,Promoted" type="text" name="remark[]">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-1">
                                                                    <br>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label><h6><b>Status</b></h6></label> 
                                                                    <input value="<?php echo $srr['sr_status']; ?>" class="form-control" placeholder="e.g.,Permanent" type="text" name="stat[]">
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label><h6><b>Salary</b></h6></label> 
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon" id="basic-addon1">&#8369;</span>
                                                                        <input value="<?php echo $srr['salary']; ?>" class="form-control" placeholder="1000.00" type="number" name="sal[]">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label><h6><b>Designation&nbsp;</b></h6></label> 
                                                                    <input value="<?php echo $srr['designation']; ?>" class="form-control" placeholder="e.g.,Teacher I" type="text" name="des[]">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label><h6><b>Office Entry&nbsp;</b></h6></label> 
                                                                    <input value="<?php echo $srr['place_of_assignment']; ?>" class="form-control" placeholder="e.g.,PNHS" type="text" name="office[]">
                                                                </div>
                                                                <div class="col-md-1">
                                                                    <br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancel</button>
                                                            <button name="btn<?php echo $x;?>" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>        
                                            <?php
                                                    if(isset($_POST['btn'.$x])){
                                                        $sr_id=$_POST['sr'];
                                                        $start=$_POST['start'];
                                                        $end=$_POST['end'];
                                                        $fund=$_POST['fund'];
                                                        $rem=$_POST['remark'];
                                                        $stat=$_POST['stat'];
                                                        $sal=$_POST['sal'];
                                                        $des=$_POST['des'];
                                                        $office=$_POST['office'];
                                                        $f_start=strtotime($start[$x]);
                                                        $f_end=strtotime($end[$x]);
                                                        mysqli_query($mysqli,"set autocommit=0");
                                                        mysqli_query($mysqli,"start transaction");
                                                        mysqli_query($mysqli,"LOCK TABLE pims_service_records WRITE");
                                                        if($f_start<$f_end){
                                                            $ins=$mysqli->query("UPDATE pims_service_records SET inclusive_date_start='$start[$x]',inclusive_date_end='$end[$x]',designation='$des[$x]',salary='$sal[$x]',place_of_assignment='$office[$x]',srce_of_fund='$fund[$x]',remarks='$rem[$x]',sr_status='$stat[$x]' WHERE servRec_ID=$sr_id[$x]");
                                                            if($ins){
                                                                mysqli_query($mysqli,"COMMIT");
                                                                echo "<script>alert('SUCCESS!');</script>";
                                                                echo "<script>window.location='sr_view.php?emp=$emp_no';</script>";
                                                            }else{
                                                                mysqli_query($mysqli,"ROLLBACK");
                                                                echo "<script>alert('ERROR!');</script>";
                                                                //echo "<script>window.location='sr_view.php?emp=$emp_no';</script>";
                                                            }
                                                        }else{
                                                            mysqli_query($mysqli,"ROLLBACK");
                                                            echo "<script>alert('Time Format Error!');</script>";
                                                            //echo "<script>window.location='sr_view.php?emp=$emp_no';</script>";
                                                        }
                                                        mysqli_query($mysqli,"UNLOCK TABLE");
                                                    }
                                                    $x++; 
                                                } ?>
                                        </tbody>
                                    </table>
                                    <!-- /.table-responsive -->
                                    </form>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="col-md-1">
                        <br>
                    </div>
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

<script src="../js/index.js"></script>
<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script> 
<script src="../../../js/metisMenu.min.js"></script>
<script src="../../../js/sb-admin-2.min.js"></script>    
<!-- velocity -->


       
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
            "scrollX": true
        });
    });
</script>
    



</body>

</html>