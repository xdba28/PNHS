<?php
    include('../func.php');
    include('../php/connection.php');
    include('../php/_Func.php');
    include('../php/_Def.php');
    $_SESSION['hist'] = $_SERVER['REQUEST_URI'];
    // if(isset($_SESSION['user_data']['acct']['emp_no']) AND (in_array("superadmin", $_SESSION['user_data']['priv']['cms_account_type']) OR in_array("admin", $_SESSION['user_data']['priv']['cms_account_type']))) {
    //     $keysa = array_search('superadmin', $_SESSION['user_data']['priv']['cms_account_type']);
    //     $keya = array_search('admin', $_SESSION['user_data']['priv']['cms_account_type']);
    //     if($_SESSION['user_data']['priv']['cms_priv'][$keysa]==1 OR $_SESSION['user_data']['priv']['cms_priv'][$keya]==1) {

    //     }
    //     else {
    //         header('Location: ../index.php');
    //         die();
    //     }
    // }
    // else {
    //     header('Location: ../index.php');
    //     die();
    // }

    if(isset($_SESSION['user_data'])) {
        if(isset($_SESSION['user_data']['acct']['lrn'])){
            $lrn=$_SESSION['user_data']['acct']['lrn'];
            $aid=$_SESSION['user_data']['acct']['cms_account_ID'];
            foreach(defineStudent($aid) as $key=>$val) {
                if($key=="css") { $css_priv=$val; }
                else if($key=="oes") { $oes_priv=$val; }
                else if($key=="scms") { $scms_priv=$val; }
                else if($key=="sis") { $sis_priv=$val; }
            }
        }else if(isset($_SESSION['user_data']['acct']['emp_no'])){
            $emp=$_SESSION['user_data']['acct']['emp_no'];
            $aid=$_SESSION['user_data']['acct']['cms_account_ID'];
            $rec=mysqli_query($mysqli,"SELECT dms_receiver.rec_no FROM dms_receiver,cms_account WHERE cms_account.cms_account_id=dms_receiver.cms_account_id AND dms_receiver.cms_account_id=$aid");
            $recrow=mysqli_fetch_assoc($rec);
            $recid=$recrow['rec_no'];
            foreach(definePerson($aid) as $key=>$val) {
                if($key=="css") { $css_priv=$val; }
                else if($key=="dms") { $dms_priv=$val; }
                else if($key=="ims") { $ims_priv=$val; }
                else if($key=="ipcr") { $ipcr_priv=$val; }
                else if($key=="pims") { $pims_priv=$val; }
                else if($key=="pms") { $pms_priv=$val; }
                else if($key=="oes") { $oes_priv=$val; }
                else if($key=="prs") { $prs_priv=$val; }
                else if($key=="scms") { $scms_priv=$val; }
                else if($key=="sis") { $sis_priv=$val; }
                else if($key=="job") { $job_title=$val; }
                else if($key=="emp_type") { $emp_type=$val; }
                else if($key=="user_type") { $user_type=$val; }
                else if($key=="css_admin") { $css_admin=$val; }
                else if($key=="dms1_admin") { $dms1_admin=$val; }
                else if($key=="dms2_admin") { $dms2_admin=$val; }
                else if($key=="ims_admin") { $ims_admin=$val; }
                else if($key=="ipcr1_admin") { $ipcr1_admin=$val; }
                else if($key=="ipcr2_admin") { $ipcr2_admin=$val; }
                else if($key=="pims1_admin") { $pims1_admin=$val; }
                else if($key=="pims2_admin") { $pims2_admin=$val; }
                else if($key=="pms1_admin") { $pms1_admin=$val; }
                else if($key=="pms2_admin") { $pms2_admin=$val; }
                else if($key=="oes_admin") { $oes_admin=$val; }
                else if($key=="prs1_admin") { $prs1_admin=$val; }
                else if($key=="prs2_admin") { $prs2_admin=$val; }
                else if($key=="scms1_admin") { $scms1_admin=$val; }
                else if($key=="scms2_admin") { $scms2_admin=$val; }
                else if($key=="sis_admin") { $sis_admin=$val; }
            }
        }
    }
    else {
        header('Location: ../index.php');
        die('');
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php
    //Identify if Teaching or Non Teaching
    //! If teaching get dept_id
    //Identify job title if regular teacher(TCH1-4), master teacher(MTCHR1-4), Department Head(HTEACH1-6), ICT Director(ICTD1)
    //Modules if regualr teacher OR Master Teacher OR Department Head: FRMS, PMS, SCMS,SIS,OES,PIMS,IPCR [User Type:User]
    //Modules if ICT Director : FRMS, PMS, SCMS,SIS,OES,PIMS,IPCR [User Type:Admin]
    
    //! If non teaching
    //Identify the job title: Supply Officer(SUO1),Record Keeper(RK1),Human Resource(HRM1),Registrar(REG),Cashier(CASH),Nurse(NURS),Secondary School Principal(SECSP1-2),School Principal(SP1-4)
    //If SUO: FRMS,PMS,SCMS,PIMS,IMS [User Type:Admin]
    //If RK: FRMS,PMS,SCMS,PIMS,SIS [User Type:Admin]
    //If HRM: FRMS,PMS,SCMS,PIMS,PRS [User Type:Admin]
    //If REG: FRMS,PMS,SCMS,PIMS,PMS [User Type:Admin]
    //If CASH: FRMS,PMS,SCMS,PIMS [User Type:Admin]
    //If NURS: FRMS,PMS,SCMS,PIMS [User Type:Admin]
    //If SECSP: FRMS,PMS,SCMS,PIMS [User Type:Admin]
    //If SP: FRMS,PMS,SCMS,PIMS,IMS,IPCR,IMS [User Type:Superadmin]

    //! CSS Admin cannot be identified if teaching or non teaching but the principal assigns the person and that person should only have the css priv set as 1
    
    
    //Administrator names should be identified
    //FRMS: School Related Document Admin(ICTD), Personnel Information Document Admin(HRM)
    //PMS: Procurement Admin(SUO), Verification Admin(SP)
    //IMS: Inventory Admin(SUO)
    //SCMS: Main Health Record Admin(NURS)
    //SIS: Record Admin(RK)
    //OES: *All Teaching Faculty*
    //PIMS: Leave Management Admin(SECSP), Personnel Managemnet Admin(ICTD)
    //IPCR: Evaluation Verification Admin(SP), Department Evaluation Admin(HTEACH1-6)
    //PRS: Time Record Admin(HRM), Payroll Admin(REG || CASH)
    //CSS: *Appointed*
    /*
    $css_priv=$row['css_priv'];//view scheds
        $dms_priv=$row['frms_priv'];//view docs
        $ims_priv=$row['ims_priv'];
        $ipcr_priv=$row['ipcrms_priv'];//fill form
        $pims_priv=$row['pims_priv'];//view profile
        $pms_priv=$row['pms_priv'];//request item
        $oes_priv=$row['oes_priv'];//special admin
        $prs_priv=$row['prs_priv'];
        $scms_priv=$row['scms_priv'];//view med rec
        $sis_priv=$row['sis_priv'];//view students
    */
    ?>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <title>PAG-ASA National High School</title>
        <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/w3/w3.css">
        <link rel="stylesheet" href="docs/docs.min.css">
        <link rel="stylesheet" href="css/w3/blue.css">
        <link rel="stylesheet" href="css/w3/yellow.css">
<!--        <link rel="stylesheet" href="css/sideNav.css">-->
        <link rel="stylesheet" href="css/backToTop.css">
        <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css" type="text/css">
        <link rel="shortcut icon" href="../img/pnhs_favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="css/metisMenu.min.css" type="text/css">
        <link rel="icon" href="../img/pnhs_favicon.ico" type="image/x-icon">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/index.js"></script>
        <script src="js/metisMenu.min.js"></script>
        <script src="js/sb-admin-2.min.js"></script>
        <link rel="stylesheet" href="css/lightbox.min.css">
        <link href="js/_tmp/tmp/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
        <link href="js/_tmp/tmp/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
        <script src="js/_jv/dist/jquery.validate.min.js"></script>
        <script src="js/_jv/dist/additional-methods.js"></script>
        <style>
            .navbar-header {
                float: !important;
                text-align: center!important;
            }

            <?php if(isset($_SESSION['user_data']['acct']['emp_no'])){ ?>
            #wrapper{
                padding-left: 16%!important;
            }
            <?php } ?>
        </style>
        <script src="js/jquery.min.js"></script>
        <script>
                function per(val){
                    $.ajax({
                        
                        type:"post",
                        url:"cons_ajax.php",
                        data:{
                            emp_val:val
                        },
                        success: function (response){
                            document.getElementById("ftype").innerHTML=response;
                        }
                    });
                }
            
                function ft(val){
                    $.ajax({
                        
                        type:"post",
                        url:"cons_ajax.php",
                        data:{
                            emp_val1:val
                        },
                        success: function (response){
                            document.getElementById("jt").innerHTML=response;
                        }
                    });
                }
        </script>
    </head>
    <body onload="myFunction()">
        <?php include("topnav.php"); ?>
        <div id="wrapper"> 
            <?php 
                if(isset($_SESSION['user_data'])){
                    include("sidenav.php");
                }
            ?>
            <br>
            <br>
            <br>
            <div id="main" class="container-fluid">
                <div class="modal fade" id="msg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title"></h4>
                                    </div>
                                    <div class="modal-body">
                                        <h3 class="text-center"><?php echo $_SESSION['msg']; ?></h3>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                            </div>
                        </div>     
                    </div>
                    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title"></h4>
                                    </div>
                                    <div class="modal-body">
                                        <h3 class="text-center">Log Out?</h3>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <a href="../php/_logout.php" class="btn btn-danger">Log Out</a>
                                    </div>
                            </div>
                        </div>     
                    </div>
                    <?php
                        if(isset($_SESSION['msg']) AND $_SESSION['msg']!='' AND $_SESSION['msg'] != NULL) {
                            echo "<script>$('#msg').modal('show');</script>";
                            echo $_SESSION['msg']='';
                        }
                    ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary sidepanel">
                            <div class="panel-body">
                                <h1>Account Constraints</h1>
                                <hr>
                                <!--
                                <h6><a href="create.php">Create Account</a></h6>
                                <h4>Select Module:</h4>
                                <a href="cons.php?m=CSS">CSS</a>
                                <a href="cons.php?m=FRMS">DMS</a>
                                <a href="cons.php?m=IMS">IMS</a>
                                <a href="cons.php?m=IPCRMS">IPCRMS</a>
                                <a href="cons.php?m=OES">OES</a>
                                <a href="cons.php?m=PIMS">PIMS</a>
                                <a href="cons.php?m=PMS">PMS</a>
                                <a href="cons.php?m=PRS">PRS</a>
                                <a href="cons.php?m=SCMS">SCMS</a>
                                <a href="cons.php?m=SIS">SIS</a>
                                -->
                                <form id="register" action="_Sub/process_constraint.php" method="post" class="form-group">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <select id="mod" name="mod" class="form-control">
                                                <option disabled selected>Select Module</option>
                                                <option value="CSS">CSS</option>
                                                <option value="DMS">DMS</option>
                                                <option value="FRMS">FRMS</option>
                                                <option value="IMS">IMS</option>
                                                <option value="IPCRMS">IPCRMS</option>
                                                <option value="OES">OES</option>
                                                <option value="PIMS">PIMS</option>
                                                <option value="PMS">PMS</option>
                                                <option value="PRS">PRS</option>
                                                <option value="SCMS">SCMS</option>
                                                <option value="SIS">SIS</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <select id="admin" name="admin" class="form-control">
                                                <option disabled selected>Select Admin Type</option>
                                                <option value="School Related Document Admin">School Related Document Admin</option>
                                                <option value="Personnel Information Document Admin">Personnel Information Document Admin</option>
                                                <option value="Procurement Admin">Procurement Management Admin</option>
                                                <option value="Verification Admin">Verification Admin</option>
                                                <option value="Inventory Admin">Inventory Management Admin</option>
                                                <option value="Main Health Record Admin">Health Record Admin</option>
                                                <option value="Student Record Admin">Student Record Admin</option>
                                                <option value="Leave Management Admin">Leave Management Admin</option>
                                                <option value="Personnel Managemnet Admin">Personnel Managemnet Admin</option>
                                                <option value="Evaluation Verification Admin">Evaluation Verification Admin</option>
                                                <option value="Time Record Admin">Time Record Admin</option>
                                                <option value="Payroll Admin">Payroll Admin</option>
                                                <option value="Class Scheduling Admin">Class Scheduling Admin</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <select id="ftype" name="ftype" class="form-control">
                                                <option disabled selected>Select Faculty Type</option>
                                                <option value="Teaching">Teaching</option>
                                                <option value="Non Teaching">Non Teaching</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <select id="jt" name="jt" class="form-control">
                                                <option disabled selected>Select Job Title</option>
                                                <?php 
                                                    $jtq=$mysqli->query("SELECT job_title_code,job_title_name FROM pims_job_title");
                                                    while($jtr=$jtq->fetch_assoc()){
                                                        echo "<option value='".$jtr['job_title_code']."'>".$jtr['job_title_name']."</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-3">
                                        </div>
                                        <div class="col-lg-3">
                                        </div>
                                        <div class="col-lg-3">
                                        </div>
                                        <div class="col-lg-3">
                                            <button type="submit" name="submit" class="btn btn-primary form-control">Confirm</button>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                                <table class="table table-bordered table-condensed table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Module</th>
                                            <th>Faculty Type</th>
                                            <th>Job Title</th>
                                            <th>Admin Type</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php 
                                            $cons=$mysqli->query("SELECT * FROM cms_admin_cons ORDER BY module");
                                            while($consr=$cons->fetch_assoc()){ ?>
                                        <tr>
                                            <td><?php echo $consr['module'];?></td>
                                            <td><?php echo $consr['faculty_type'];?></td>
                                            <td><?php echo $consr['job_title_code'];?></td>
                                            <td><?php echo $consr['admin_type'];?></td>
                                            <td class="info text-center"><a href="edit_constraint.php?id=<?php echo $consr['cons_id']; ?>"><span class="glyphicon glyphicon-edit"></span> edit </a></td>
                                            <td class="danger text-center"><a href="_Sub/delete_constraint.php?id=<?php echo $consr['cons_id']; ?>"><span class="glyphicon glyphicon-trash"></span> delete </a></td>
                                        </tr>            
                                            <?php
                                                }
                                            ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        <?php 
            include("footer.php");
        ?>
        </div>
        <script src="js/_tmp/tmp/datatables/js/jquery.dataTables.min.js"></script>
        <script src="js/_tmp/tmp/datatables-plugins/dataTables.bootstrap.min.js"></script>
        <script src="js/_tmp/tmp/datatables-responsive/dataTables.responsive.js"></script>
        <script>
            $('#dataTables-example').DataTable({
                responsive: true,
                searching: false
            });
            $("#register").validate({
                ignore: [],
                debug: false,
                 rules: {
                    mod: {
                         required: true
                    },
                    admin: {
                        required: true
                    },
                    ftype: {
                        required: true
                    },
                    jt: {
                        required: true
                    }
                },
                messages: {
                    mod: {
                        required: '<p class="text-danger">This field is required.</p>'
                    },
                    admin: {
                        required: '<p class="text-danger">This field is required.</p>'
                    },
                    ftype: {
                        required: '<p class="text-danger">This field is required.</p>'
                    },
                    jt: {
                        required: '<p class="text-danger">This field is required.</p>'
                    }
                }
            });
        </script>
        <script type="text/javascript">
            function myFunction(val) {
            var w = window.innerWidth;
                $.ajax({
                  type: "POST",
                  url: "modules/css/admin/get_screen_width.php",
                  data: "width="+w,
                  success: function(data){
                  }
                }); 
            }
        </script>
    </body>
</html>