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
            echo "<script>alert('Error! You do not have permission to access this site!'); window.location='login.php';</script>";
        }
    ?>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Browser's Tab Title -->
    <title>PNHS - FRMS</title>
      
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="css/w3/w3.css">
    
    <!-- Documents Path --->
    <link rel="stylesheet" href="docs/docs.min.css">
    
    <!--Include your modified CSS below as needed-->
    <link rel="stylesheet" href="css/w3/blue.css">
    <link rel="stylesheet" href="css/w3/yellow.css">
    <link rel="stylesheet" href="css/w3/w3.css">
    <link rel="stylesheet" href="css/sidebar-menu.css">
    <link rel="stylesheet" href="css/awesomplete.css">
    
    <!-- Icons CSS -->
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css" type="text/css">
    
    <!-- Browser's Tab Image -->
    <link rel="shortcut icon" href="docs/img/pnhs_favicon.ico" type="image/x-icon">
    <link rel="icon" href="docs/img/pnhs_favicon.ico" type="image/x-icon">
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/jquery/jquery.ui.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Bootstrap -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="w3-theme-bd5 w3-card-4 navbar navbar-fixed-top" style="background-color:rgba(42,101,149,0.95)!important">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed fa fa-bars hidden-sm hidden-md hidden-lg" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
      </button>
      <a class="navbar-brand" style="padding-top:5px;margin-left:5px" href="index.php"><img src="docs/img/pnhs_logo.png" style="max-width:40px;margin-left:50px;margin-right:50px"></a>
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
                <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>

                <nav style="max-width:100%" class="hidden-xl hidden-lg hidden-md hidden-sm">
                    <ul class="sidebar-menu">
                        <li class="sidebar-header">MAIN NAVIGATION</li>
                        <li class="active"><a href="index.php"><i class="glyphicon glyphicon-home"></i> <span>Home</span></a></li>         
                                    
                        <li>
                            <a href="#">
                              <i class="glyphicon glyphicon-folder-open"></i> <span>Documents</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="sidebar-submenu">
                                <li><a href="form.php?dc=sr"><i class="fa fa-circle-o"></i> Service Record</a></li>
                                <li>
                                    <a href="#"><i class="fa fa-circle-o"></i> School File <i class="fa fa-angle-left pull-right"></i></a>
                                    <ul class="sidebar-submenu">
                                        <li><a href="form.php?dc=sf1"><i class="fa fa-circle-o"></i> School File One</a></li>    
                                        <li><a href="form.php?dc=sf2"><i class="fa fa-circle-o"></i> School File Two</a></li>
                                        <li><a href="form.php?dc=sf5"><i class="fa fa-circle-o"></i> School File Five</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-circle-o"></i> Grades<i class="fa fa-angle-left pull-right"></i></a>
                                    <ul class="sidebar-submenu">
                                        <li><a href="form.php?dc=qg"><i class="fa fa-circle-o"></i> Quarterly Grades</a></li>    
                                        <li><a href="form.php?dc=mg"><i class="fa fa-circle-o"></i> Master Grades</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                    <a href="#">
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
                    <ul class="sidebar-submenu" style="display: none;">
                        <li>
                            <a href="">
                                <i class="fa fa-circle-o"></i> View Request <span class="label label-primary pull-right">
                                              <?php $inbox=mysqli_query($mysqli,
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
                            <ul class="sidebar-submenu">
                                <?php
                                            $mes=mysqli_query($mysqli,"SELECT concat(p_fname,' ',p_lname) as Name,dms_message.mes_id,mes_title,sent FROM dms_message,dms_receiver,cms_account,dms_document,pims_personnel 
                                            WHERE dms_receiver.rec_no=dms_message.rec_no
                                            AND pims_personnel.emp_no=cms_account.emp_no
                                            AND dms_document.doc_id=dms_message.doc_id
                                            AND dms_message.cms_account_id=cms_account.cms_account_id
                                            AND dms_receiver.rec_no=$recid
                                            AND mes_status='0'");
                                            if($inboxrow['count(dms_message.mes_id)']>=1){
                                                            while($mesrow=mysqli_fetch_assoc($mes)){?>
                                                            <li>
                                                                <a href="mes_update.php?mid=<?php echo $mesrow['mes_id']; ?>">
                                                                    <i class="fa fa-circle-o"></i><?php echo $mesrow['Name']; ?>
                                                                        <span class="text-muted">
                                                                            <?php
                                                                                if($yesterday==$mesrow['sent']){
                                                                                    echo "<em>Yesterday</em>";
                                                                                }else{
                                                                                    echo "<em>".$mesrow['sent']."</em>";
                                                                                }
                                                                            ?>

                                                                        </span>
                                                                </a>
                                                            </li>      

                                                        <?php }

                                                        }else{ ?>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-circle-o"></i>
                                                        <strong>No New Messages</strong>
                                                    </a>
                                                </li>
                                            <?php } ?>
                                    <li><a href="inbox.php"><i class="fa fa-circle-o"></i> View All</a></li>
                                </ul>
                        </li> 
                                <li><a href="create.php"><i class="fa fa-circle-o"></i> Add Request</a></li>
                                <li><a href="docstat.php"><i class="fa fa-circle-o"></i> Status Request</a></li>
                              
                            </ul>
                        </li>
                     <li>  <a href="#">
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
                              <i class="fa fa-th"></i> <span>Archived</span>
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
</div>

<div class="row">
    <div class="col-lg-2 col-md-3 col-sm-3 hidden-xs">
        <div class="navbar navbar-fixed-top" style="width:200px; margin-top:56px">
            <ul class="sidebar-menu">
                <li class="sidebar-header">MAIN NAVIGATION</li>
                <li ><a href="index.php"><i class="glyphicon glyphicon-home"></i> <span>Home</span></a></li>
                <li>
                    <a href="#">
                      <i class="glyphicon glyphicon-folder-open"></i> <span>Documents</span> <i class="fa fa-angle-left pull-right"></i>
                                               
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="form.php?dc=sr"><i class="fa fa-circle-o"></i> Service Record</a></li>
                        <li>
                            <a href="#"><i class="fa fa-circle-o"></i> School File <i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="sidebar-submenu">
                                <li><a href="form.php?dc=sf1"><i class="fa fa-circle-o"></i> School File One</a></li>    
                                <li><a href="form.php?dc=sf2"><i class="fa fa-circle-o"></i> School File Two</a></li>
                                <li><a href="form.php?dc=sf5"><i class="fa fa-circle-o"></i> School File Five</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-circle-o"></i> Grades<i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="sidebar-submenu">
                                <li><a href="form.php?dc=qg"><i class="fa fa-circle-o"></i> Quarterly Grades</a></li>    
                                <li><a href="form.php?dc=mg"><i class="fa fa-circle-o"></i> Master Grades</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
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
                    <ul class="sidebar-submenu" style="display: none;">
                        <li>
                            <a href="">
                                <i class="fa fa-circle-o"></i> View Request <span class="label label-primary pull-right">
                                              <?php $inbox=mysqli_query($mysqli,
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
                            <ul class="sidebar-submenu">
                                <?php
                                            $mes=mysqli_query($mysqli,"SELECT concat(p_fname,' ',p_lname) as Name,dms_message.mes_id,mes_title,sent FROM dms_message,dms_receiver,cms_account,dms_document,pims_personnel 
                                            WHERE dms_receiver.rec_no=dms_message.rec_no
                                            AND pims_personnel.emp_no=cms_account.emp_no
                                            AND dms_document.doc_id=dms_message.doc_id
                                            AND dms_message.cms_account_id=cms_account.cms_account_id
                                            AND dms_receiver.rec_no=$recid
                                            AND mes_status='0'");
                                            if($inboxrow['count(dms_message.mes_id)']>=1){
                                                            while($mesrow=mysqli_fetch_assoc($mes)){?>
                                                            <li>
                                                                <a href="mes_update.php?mid=<?php echo $mesrow['mes_id']; ?>">
                                                                    <i class="fa fa-circle-o"></i><?php echo $mesrow['Name']; ?>
                                                                        <span class="text-muted">
                                                                            <?php
                                                                                if($yesterday==$mesrow['sent']){
                                                                                    echo "<em>Yesterday</em>";
                                                                                }else{
                                                                                    echo "<em>".$mesrow['sent']."</em>";
                                                                                }
                                                                            ?>

                                                                        </span>
                                                                </a>
                                                            </li>      

                                                        <?php }

                                                        }else{ ?>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-circle-o"></i>
                                                        <strong>No New Messages</strong>
                                                    </a>
                                                </li>
                                            <?php } ?>
                                    <li><a href="inbox.php"><i class="fa fa-circle-o"></i> View All</a></li>
                                </ul>
                        </li>  
                        <li><a href="create.php"><i class="fa fa-circle-o"></i> Add Request</a></li>
                        <li><a href="docstat.php"><i class="fa fa-circle-o"></i> Status Request</a></li>
                    </ul>
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
                              <i class="fa fa-th"></i> <span>Archived</span>
                              <small class="label pull-right label-info">new</small>
                            </a>
                        </li>

                <li class="sidebar-header">LABELS</li>
                <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
                <li style="padding-bottom:200%"></li>
            </ul>
        </div>
    </div>
   
    <div class="col-lg-10 col-md-9 col-sm-9">
        <div class="container-fluid" style="height:700px;max-width:100%;margin-top:70px;margin-right:20px;margin-left:20px;margin-bottom:10px">
            <Select id="colorselector">
   <option value="red">Red</option>
   <option value="yellow">Yellow</option>
   <option value="blue">Blue</option>
</Select>
<div id="red" class="colors" style="display:none"> gfhfhg </div>
<div id="yellow" class="colors" style="display:none"> ... </div>
<div id="blue" class="colors" style="display:none"> ... </div>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-plus"></i>Add Document</h1>
                </div>
                        <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <form method="POST">
                                    <div class="col-md-4">
                                    <br>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Personnel &nbsp; </label>
                                            <input data-list="#list1" class="awesomplete form-control" id="focusedInput" placeholder="Steve Jobs" type="text" name="adviser" required >
                                            <datalist id="list1">
                                            <?php

                                                $p=mysqli_query($mysqli,"SELECT concat(p_fname,' ',p_lname)as Name FROM pims_personnel");
                                                while($r=mysqli_fetch_assoc($p)){
                                                    echo "<option>".$r['Name']."</option>";
                                                }
                                                ?>
                                            </datalist>
                                        </div>
                                        <div class="form-group">
                                            <label>Document&nbsp;</label>
                                            <select id="colorselector" class="form-control" name="doc">
                                                <option value="">Service Record</option>
                                                <option value="">Personal Data Sheet</option>
                                                <option value=""></option>
                                            </select>
                                        </div><br>
                                        <div class="form-group">

                                            <textarea name="con" placeholder="Content" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <center>
                                                <button name="btn" class="btn btn-primary btn-block btn-lg">Send</button>
                                            </center>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                    <br>
                                    </div>
                                </form>
                                <?php
                                    if(isset($_POST['btn'])){
                                        $rec=$_POST['rec'];
                                        $doc=$_POST['doc'];
                                        $sub=$_POST['sub'];
                                        $con=$_POST['con'];

                                        $mes=mysqli_query($mysqli,"INSERT INTO dms_message (mes_title,mes_content,sent,mes_status,doc_status,doc_id,rec_no,acct_id) VALUES ('$sub','$con','$date','0','0','$doc','$rec','$aid')");
                                        if($mes){
                                            echo "<script>alert('Message Sent'); window.location='inbox.php'; </script>";
                                        }else{
                                            echo "<script>alert('Message not Sent')</script>";
                                        }
                                    }
                                ?>
                            </div>

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                    <!-- /.col-lg-12 -->
            </div>
        </div>
    </div>

    
    
    
</div>













    
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="vendor/jquery/jquery.min.js"></script>

<script src="js/sidebar-menu.js"></script>
<script src="js/sideNav.js"></script>
<script src="js/awesomplete.js" ></script>
<script>
$.sidebarMenu($('.sidebar-menu'))
</script>

<script>
    $(function() {
        $('#colorselector').change(function(){
            $('.colors').hide();
            $('#' + $(this).val()).show();
        });
    });
</script>
<!-- Footer -->
<footer class="container-fluid w3-theme-bd5 hidden-xs" style="padding-top:10px;padding-bottom:20px;margin-left:200px">
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
<footer class="container-fluid w3-theme-bd5 hidden-lg hidden-md hidden-sm" style="padding-top:10px;padding-bottom:20px">
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
