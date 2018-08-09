<!DOCTYPE html>
<html lang="en">
    
<head>
    <?php
        include("../db/dbcon.php");
        date_default_timezone_set('Asia/Manila');
        $date=date("Y-m-d");
        $yesterday=date("Y-m-d",time()-86400);
        session_start();
        if(isset($_SESSION['priv_data']['acct']['frms_priv']) && isset($_SESSION['acct_data']['acct']['emp_no']) && isset($_SESSION['user_data']['acct']['cms_account_ID']) && isset($_SESSION['user_data']['acct']['cms_password']) && isset($_SESSION['user_data']['acct']['cms_username']) ){
            $emp=$_SESSION['acct_data']['acct']['emp_no'];
            $aid=$_SESSION['user_data']['acct']['cms_account_ID'];
            $rec=mysqli_query($mysqli,"SELECT dms_receiver.rec_no FROM dms_receiver,cms_account WHERE cms_account.cms_account_id=dms_receiver.cms_account_id AND dms_receiver.cms_account_id=$aid");
            $recrow=mysqli_fetch_assoc($rec);
            $recid=$recrow['rec_no'];
        }else{
            echo "<script>alert('Error! You do not have permission to access this site!'); window.location='../login.php';</script>";
        }
    ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Browser's Tab Title -->
    <title>PNHS - FRMS</title>
      
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="../css/w3/w3.css">
    
    <!-- Documents Path --->
    <link rel="stylesheet" href="../docs/docs.min.css">
    
    <!--Include your modified CSS below as needed-->
    <link rel="stylesheet" href="../css/w3/blue.css">
    <link rel="stylesheet" href="../css/w3/yellow.css">
    <link rel="stylesheet" href="../css/w3/w3.css">
    <link rel="stylesheet" href="../css/sidebar-menu.css">
    
    <!-- Icons CSS -->
    <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css" type="text/css">
    
    <!-- Browser's Tab Image -->
    <link rel="shortcut icon" href="../docs/img/pnhs_favicon.ico" type="image/x-icon">
    <link rel="icon" href="../docs/img/pnhs_favicon.ico" type="image/x-icon">
    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap/css/bootstrap-switch.css">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>


    <!-- Bootstrap -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    
</head>

<body>

<!-- Navigation -->
<nav class="w3-theme-bd5 w3-card-4" style="background-color:rgba(42,101,149,0.95)!important">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed fa fa-bars hidden-sm hidden-md hidden-lg" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          </button>
          <a class="navbar-brand" style="padding-top:5px" href="index.php"><img src="docs/img/pnhs_logo.png" style="max-width:40px;margin-left:50px;margin-right:50px"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <form class="navbar-form navbar-left hidden-sm">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> <?php 
                        $empname=mysqli_query($mysqli,"SELECT concat(p_fname,' ',p_lname)as Name FROM pims_personnel WHERE emp_no=$emp");
                        $emprow=mysqli_fetch_assoc($empname);
                        echo $emprow['Name']." ";
                        ?></a></li>
                <li>
                    <a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>

                <nav style="max-width:100%" class="hidden-xl hidden-lg hidden-md hidden-sm">
                    <ul class="sidebar-menu">
                        <li class="sidebar-header">MAIN NAVIGATION</li>
                        <li ><a href="index.php"><i class="glyphicon glyphicon-home"></i> <span>Home</span></a></li>            
                        <li class="active">
                             <a href="doc.php">
                              <i class="glyphicon glyphicon-folder-open"></i> <span>Documents</span> 
                            </a>
                        </li>
                        <li>
                            <a href="inbox.php">
                              <i class="glyphicon glyphicon-envelope"></i>
                              <span>Requests</span>
                              <span class="label label-primary pull-right"><?php $inbox=mysqli_query($mysqli,
                                    "SELECT count(dms_message.mes_id) FROM dms_message,dms_receiver,cms_account,dms_document,pims_personnel 
                                    WHERE dms_receiver.rec_no=dms_message.rec_no
                                    AND pims_personnel.emp_no=cms_account.emp_no
                                    AND dms_document.doc_id=dms_message.doc_id
                                    AND dms_message.cms_account_id=cms_account.cms_account_id
                                    AND dms_receiver.rec_no=$recid
                                    AND mes_status='0' ");
                                    $inboxrow=mysqli_fetch_assoc($inbox);
                                    echo $inboxrow['count(dms_message.mes_id)'];
                                ?></span>
                            </a>
                        </li>
						<li>
                            <a href="#">
                              <i class="glyphicon glyphicon-list-alt"></i>
                              <span>Records</span>
                             
                            </a>
                            <ul class="sidebar-submenu" style="display: none;">
                                
                        
                                <li><a href="approved_req.php"><i class="fa fa-circle-o"></i> Approved Request</a></li>
                                <li class="">
                                    <a href="denied_req.php"><i class="fa fa-circle-o"></i> Denied Request</a>
                                </li>
                            </ul>
						</li>
 
                        <li>
                            <a href="Archiving.php">
                              <i class="fa fa-th"></i> <span>Archiving</span>
                              <small class="label pull-right label-info">new</small>
                            </a>
                        </li>

                        <li class="sidebar-header">LABELS</li>
                        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
                        <li style="padding-bottom:100%"></li>
                    </ul>
                </nav>
            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
    <hr class="w3-theme-yd2" style="height:3px; border:0; margin-top:0px; margin-bottom:0px;">
    <hr class="w3-theme-bd2" style="height:3px; border:0; margin-top:0px; margin-bottom:0px;">
</nav>
<div class="row">
    <div class="col-lg-2 col-md-3 col-sm-3 hidden-xs">
        <nav style="width:200px;height:100%">
            <ul class="sidebar-menu">
                <li class="sidebar-header">MAIN NAVIGATION</li>
                <li><a href="index.php"><i class="glyphicon glyphicon-home"></i> <span>Home</span></a></li>            
                <li class="active">
                     <a href="doc.php">
                         <i class="glyphicon glyphicon-folder-open"></i> <span>Documents</span>
                    </a>
                </li>
                <li>
                            <a href="inbox.php">
                              <i class="glyphicon glyphicon-envelope"></i>
                              <span>Requests</span>
                              <span class="label label-primary pull-right"><?php $inbox=mysqli_query($mysqli,
                                            "SELECT count(dms_message.mes_id) FROM dms_message,dms_receiver,cms_account,dms_document,pims_personnel 
                                            WHERE dms_receiver.rec_no=dms_message.rec_no
                                            AND pims_personnel.emp_no=cms_account.emp_no
                                            AND dms_document.doc_id=dms_message.doc_id
                                            AND dms_message.cms_account_id=cms_account.cms_account_id
                                            AND dms_receiver.rec_no=$recid
                                            AND mes_status='0' AND mes_delete='0'");
                                            $inboxrow=mysqli_fetch_assoc($inbox);
                                            echo $inboxrow['count(dms_message.mes_id)'];
                                        ?></span>
                            </a>
                        </li>
						<li>
                            <a href="#">
                              <i class="glyphicon glyphicon-list-alt"></i>
                              <span>Records</span>
                             
                            </a>
                            <ul class="sidebar-submenu" style="display: none;">
                                
                        
                                <li><a href="approved_req.php"><i class="fa fa-circle-o"></i> Approved Request</a></li>
                                <li class="">
                                    <a href="denied_req.php"><i class="fa fa-circle-o"></i> Denied Request</a>
                                </li>
                            </ul>
						</li>

                <li>
                    <a href="Archiving.php">
                      <i class="fa fa-th"></i> <span>Archiving</span>
                      <small class="label pull-right label-info">new</small>
                    </a>
                </li>

                <li class="sidebar-header">LABELS</li>
                <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
                <li style="padding-bottom:200%"></li>
            </ul>
        </nav>
    </div>
    <div class="col-lg-10 col-md-9 col-sm-9">
        
        <div class="container-fluid">
            
        </div>
    </div>
</div>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../vendor/jquery/jquery-3.0.0.min.js"></script>
<script src="../js/sidebar-menu.js"></script>
<script src="../js/sideNav.js"></script>
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
    
<script>
    $.sidebarMenu($('.sidebar-menu'))
</script>
<script src="../js/jQuery.print.js"></script>  
    
<script src="../js/bootstrap-switch.js"></script>
    
<script>
    $("[name='status']").bootstrapSwitch();      
</script>
    
<!-- Footer -->
<footer class="container-fluid w3-theme-bd5" style="padding-top:10px;padding-bottom:20px">
    <div class="row">
        <div class="col-lg-4 col-md-4 w3-left">
            <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PNHS</h2>
            <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alright Reserved &copy; 2017</h6>
        </div>
        <div class="col-lg-4 col-md-4 w3-right">
            <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contact Us:</h5>
            <a href="#"><i class="fa fa-bullseye w3-xlarge"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="#"><i class="fa fa-phone w3-xlarge"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="#"><i class="fa fa-facebook w3-xlarge"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="#"><i class="fa fa-twitter w3-xlarge"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="#"><i class="fa fa-google-plus w3-xlarge"></i></a>
        </div>
    </div>
</footer>
  
</body>
</html>