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
    <title>Faculty Records Management System</title>
      
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="../css/w3/w3.css">
    
    <!-- Documents Path --->
    <link rel="stylesheet" href=".docs/docs.min.css">
    
    <!--Include your modified CSS below as needed-->
    <link rel="stylesheet" href="../css/w3/blue.css">
    <link rel="stylesheet" href="../css/w3/yellow.css">
    <link rel="stylesheet" href="../css/w3/w3.css">
    <link rel="stylesheet" href="../css/sideNav.css">
    <link rel="stylesheet" href="../css/backToTop.css">
    <link rel="stylesheet" href="../css/awesomplete.css">  
    
    <!-- Icons CSS -->
    <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css" type="text/css">
    
    <!-- Browser's Tab Image -->
    <link rel="shortcut icon" href="../docs/img/pnhs_favicon.ico" type="image/x-icon">
    <link rel="icon" href="../docs/img/pnhs_favicon.ico" type="image/x-icon">
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

     <!-- Footer-->
<link href="../css/footer.css" rel="stylesheet">
    
    <!-- Bootstrap -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
<style>
body {
      position: relative; 
  }
  .affix {
      top:0;
      width: 100%;
      z-index: 9999 !important;
  }
  .navbar {
      margin-bottom: 0px;
  }
    
  .affix ~ .container-fluid {
     position: relative;
     top: 50%;
  }

</style>
    
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50%">

    
<nav class="w3-theme-bd5 w3-card-4" style="background-color:rgba(42,101,149,0.95)!important" role="navigation" data-spy="affix">
    <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed fa fa-bars hidden-sm hidden-md hidden-lg" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
      </button>
      <a class="navbar-brand w3-card-4"  href="../../../admin_idx.php"><img src="../docs/img/pnhs_logo.png" width="75px" height="75px"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <hr class="hidden-sm hidden-md hidden-lg" style="height:10px; border:0">
        <form class="navbar-form navbar-left hidden-sm">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
              </span>
          </div>
        </form>

       <ul class="nav navbar-nav navbar-right">
        <li><a href="user_idx.php"><i class = "fa fa-home fa-sm"> Home</i></a></li>
		<li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                <i class = "fa fa-folder fa-sm"> Documents</i><span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="form.php?dc=sr"><i class="fa fa-circle-o fa-fw"></i> Service Records &nbsp;</a></li>
              <li><a href="form.php?dc=sf"><i class="fa fa-circle-o fa-fw"></i> School Files</a ></li>
              <li><a href="form.php?dc=gd"><i class="fa fa-circle-o fa-fw"></i> Grade Files</a></li>
            </ul>
        </li>
		<li><a href="add.php"><i class = "fa fa-table fa-sm"> Request</i></a></li>
		<li role="presentation" class="dropdown">
            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-envelope-o"> Messages</i>
                <span class="badge bg-green"><?php $inbox=mysqli_query($mysqli,
                                    "SELECT count(dms_message.mes_id) FROM dms_message,dms_receiver,cms_account,dms_document,pims_personnel 
                                    WHERE dms_receiver.rec_no=dms_message.rec_no
                                    AND pims_personnel.emp_no=cms_account.emp_no
                                    AND dms_document.doc_id=dms_message.doc_id
                                    AND dms_message.cms_account_id=cms_account.cms_account_id
                                    AND dms_receiver.rec_no=$recid
                                    AND mes_status='0' AND mes_delete='0' ");
                                    $inboxrow=mysqli_fetch_assoc($inbox);
                                    echo $inboxrow['count(dms_message.mes_id)'];
                                ?>
                </span>
            </a>
            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
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
                        <span class="image"><?php echo $mesrow['Name']; ?></span>
                        <span class="message">
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
                            
                        <?php } ?>
                            <li>
                                <a href="#">
                                    <span class="image">
                                      <i class="fa fa-ban"></i>
                                    </span>
                                    <span class="message">
                                      No new messages
                                    </span>
                                </a>
                            </li>
                <li>
                    <a href="inbox.php">
                        <span class="image">
                            <i class="fa fa-eye"></i>
                        </span>
                        <span class="message">
                          View All Message
                        </span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <i class = "fa fa-user fa-sm"> 
              <?php 
                $empname=mysqli_query($mysqli,"SELECT concat(p_fname,' ',p_lname)as Name FROM pims_personnel WHERE emp_no=$emp");
                $emprow=mysqli_fetch_assoc($empname);
                echo $emprow['Name']." ";
                ?>
              </i>
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href=""><i class="fa fa-user fa-fw"></i> User Profile&nbsp;</a></li>
              <li><a href=""><i class="fa fa-gear fa-fw"></i> Settings</a ></li>
              <li class="divider"></li>
              <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
            </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div id="page-wrapper">
    <br><br><br><br><br>
    <div class="row">
        <div class="col-md-1">
            <br>
        </div>
        <div class="col-md-8">
            <h3><a class="label btn btn-info"><i class="fa fa-edit"></i> Use Template</a></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1">
            <br>
        </div>
        <div class="col-lg-10">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Send Message 
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <form method="POST">
                            <div class="col-md-2">
                                <br>
                            </div>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon2">Recipient &nbsp;</span>
                                    <select class="form-control" name="rec"><?php 
                                        $rec=mysqli_query($mysqli,"SELECT concat(p_fname,' ',p_lname) as Name,job_title_name,dms_receiver.rec_no FROM dms_receiver,cms_account,pims_personnel,pims_employment_records,pims_department 
                                        WHERE pims_personnel.emp_no=cms_account.emp_no
                                        AND cms_account.cms_account_ID=dms_receiver.cms_account_id
                                        AND pims_department.dept_ID=pims_employment_records.dept_ID
                                        And pims_employment_records.emp_No=pims_personnel.emp_No
                                        AND dms_receiver.rec_no!=$recid");
                                        while($recrow=mysqli_fetch_assoc($rec)){
                                            echo "<option value='".$recrow['rec_no']."'>".$recrow['Name']." - ".$recrow['job_title_name']."</option>";
                                        }

                                        ?>
                                    </select>
                                </div><br>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon2">Document&nbsp;</span>
                                        <select class="form-control" name="doc"><?php 
                                            $rec=mysqli_query($mysqli,"SELECT p_lname,doc_type,doc_id FROM dms_document,pims_personnel WHERE pims_personnel.emp_No=dms_document.emp_no");
                                            $recnum=mysqli_num_rows($rec);
                                            
                                            if($recnum!=0){
                                                echo "<option value=''>Select Document</option>";
                                                while($recrow=mysqli_fetch_assoc($rec)){
                                                    echo "<option value='".$recrow['doc_id']."'>".$recrow['p_lname']." - ".$recrow['doc_type']."</option>";
                                                }

                                            }else{
                                                echo "<option value=''>No Available Document</option>";
                                            }
                                            
                                            ?>
                                        </select>
                                        <span class="input-group-addon" id="basic-addon2">Subject</span><input placeholder="Subject" name="sub" class="form-control">
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
                            <div class="col-md-2">
                                <br>
                            </div>
                        </form>
                        <?php
                            if(isset($_POST['btn'])){
                                $rec=$_POST['rec'];
                                $doc=$_POST['doc'];
                                $sub=$_POST['sub'];
                                $in_con=$_POST['con'];
                                $con=mysqli_real_escape_string($mysqli,$in_con);
                                mysqli_query($mysqli,"set autocommit=0");
                                mysqli_query($mysqli,"start transaction");
                                mysqli_query($mysqli,"LOCK TABLES dms_message,dms_document,dms_receiver,cms_account,dms_mes_temp READ");
                                $mes=mysqli_query($mysqli,"INSERT INTO dms_message (mes_title,mes_content,sent,mes_status,mes_delete,mes_stat,doc_id,rec_no,cms_account_id) VALUES ('$sub','$con','$date','0','0','P','$doc','$rec','$aid')");
                                if($mes){
                                    mysqli_query($mysqli,"COMMIT");
                                    echo "<script>alert('Message Sent'); window.location='inbox.php'; </script>";
                                }else{
                                    mysqli_query($mysqli,"ROLLBACK");
                                    echo "<script>alert('Message not Sent')</script>";
                                }
                                mysqli_query($mysqli,"UNLOCK TABLES");
                            }
                            ?>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <div class="col-md-1">
            <br>
        </div>
    </div>
</div>
    


<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/alert.js"></script>
<script src="../js/slideshow.js"></script>
<script src="../js/backToTop.js"></script>
<script src="../js/sideNavII.js"></script>
<script src="../js/showNav.js"></script>
<script src="../js/awesomplete.js" ></script>
    
<!-- Footer -->
<?php include('../footer.php'); ?>
    
</body>
</html>