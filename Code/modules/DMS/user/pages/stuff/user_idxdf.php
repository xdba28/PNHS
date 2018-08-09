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
    <link rel="stylesheet" href="../docs/docs.min.css">
    
    <!--Include your modified CSS below as needed-->
    <link rel="stylesheet" href="../css/w3/blue.css">
    <link rel="stylesheet" href="../css/w3/yellow.css">
    <link rel="stylesheet" href="../css/w3/w3.css">
    <link rel="stylesheet" href="../css/sideNav.css">
    <link rel="stylesheet" href="../css/backToTop.css">
    
    <!-- Icons CSS -->
    <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css" type="text/css">
    
    <!-- Browser's Tab Image -->
    <link rel="shortcut icon" href="../docs/img/pnhs_favicon.ico" type="image/x-icon">
    <link rel="icon" href="../docs/img/pnhs_favicon.ico" type="image/x-icon">
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

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
      <a class="navbar-brand w3-card-4" href="user_idx.php"><img src="../docs/img/pnhs_logo.png" width="75px" height="75px"></a>
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
		<li><a href="add.php"><i class = "fa fa-paper-plane fa-sm"> Request</i></a></li>
		<li role="presentation" class="dropdown">
            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-envelope-o"> Messages</i>
                <span class="badge bg-green"><?php $inbox=mysqli_query($mysqli,
                                    "SELECT count(dms_message.mes_id) FROM dms_message,dms_receiver,cms_account,pims_personnel 
                                    WHERE dms_receiver.rec_no=dms_message.rec_no
                                    AND pims_personnel.emp_no=cms_account.emp_no
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
                    $mes=mysqli_query($mysqli,"SELECT concat(p_fname,' ',p_lname) as Name,dms_message.mes_id,mes_title,sent FROM dms_message,dms_receiver,cms_account,pims_personnel 
                    WHERE dms_receiver.rec_no=dms_message.rec_no
                    AND pims_personnel.emp_no=cms_account.emp_no
                    AND dms_message.cms_account_id=cms_account.cms_account_id
                    AND dms_receiver.rec_no=$recid
                    AND mes_status='0'");
                    if($inboxrow['count(dms_message.mes_id)']>=1){
                        while($mesrow=mysqli_fetch_assoc($mes)){?>
                
                <li>
                    <a href="mes_update.php?read=1&del=0&mid=<?php echo $mesrow['mes_id']; ?>">
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
        <div class="col-md-10">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Faculty Records Management System
                </div>
                <div class="panel-body">
                    <ul class="pagination">
            <?php
                $page1=(!isset($_GET['page1']))? 1: $_GET['page1'];
                    $pre1=($page1-1);
                    $next1=($page1+1);
                    $maxRes1=3;
                    $from1 = (($page1*$maxRes1)-$maxRes1);
                    $pro1=mysqli_query($mysqli,"SELECT doc_id FROM dms_document ");
                    $nRows1=mysqli_num_rows($pro1);
                    $totalPage1=ceil($nRows1/$maxRes1);
                    $pagination1= '';
                    if($page1>1){
                        $pagination1 .= '<li><a href="?dc=sr&page1='.$pre1.'" aria-label="Pre"><span aria-hidden="true">&laquo;</span></a></li>';
                    }
                    for($i=1;$i<=$totalPage1;$i++){
                        if($page1==$i){
                            $pagination1 .= '<li class="active"><a>'.$i.'</a></li>';
                        }else{                                
                            $pagination1 .= '<li><a href="form.php?dc=sr&page1='.$i.'">'.$i.'</a></li>';
                        }
                    }

                    if($page1<$totalPage1){
                        $pagination1 .= '<li><a href="?dc=sr&page1='.$next1.'" aria-label="Next"><span aria-hidden="true">&raquo;</span></a>';
                    }
                    $npage1=($page1-1)*$maxRes1;
                    $nmax1=$maxRes1;
                    $pro2=mysqli_query($mysqli,"select dms_document.doc_id,concat(p_fname,' ',p_lname) as Name,doc_file,doc_info,doc_lock 
                                        FROM pims_personnel,dms_document,dms_doc_file,dms_doc_type
                                        WHERE pims_personnel.emp_No=dms_document.emp_no
                                        AND dms_document.doc_id=dms_doc_file.doc_id
                                        AND dms_doc_type.type_id=dms_document.type_id
                                        AND dms_document.emp_no=$emp
                                        AND doc_type='Service Record' 
                                        ORDER BY doc_info ASC LIMIT $npage1,$nmax1");
                        echo $pagination1;
                    ?>
        </ul>
        </center>
        <div class="row mt">
            <?php
            $nrows=mysqli_num_rows($pro2);
            if($nrows>=1){
                while($pro=mysqli_fetch_assoc($pro2)){
                    $file=$pro['doc_file'];
                    $year=$pro['doc_info'];
                    $lock=$pro['doc_lock'];
                    $docid=$pro['doc_id'];
                    if(empty($file)){ ?>
            
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
                <div class="thumbnail">
                    <img  class="img-responsive" src="../docs/img/Nopreview.jpg" alt="...">
                    <div class="caption">
                        <h3>Service Record <?php echo $year;    ?></h3>
                        <p>No Service Record Data Yet.</p>
                        <p><a href="add.php" class="btn btn-primary" role="button">Request</a></p>
                    </div>
                </div>
            </div><!-- col-lg-4 -->        
            <?php
                    }else{ ?>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
                <div class="thumbnail">
                    <object style="width:100%;height:180px;" data="data:application/pdf;base64,<?php echo base64_encode($file); ?>" type="application/pdf">
                        <embed src="data:application/pdf;base64,<?php echo base64_encode($file); ?>" type="application/pdf" />
                    </object>
                    
                    <div class="caption">
                        <h3>Service Record <?php echo $year;    ?></h3>
                        <p>You can now view and download your Service Record</p>
                        <?php
                            if($lock=='1'){
                                echo '<p><a disabled href="#" class="btn btn-primary" role="button">Download</a></p>';
                            }else{
                                echo '<p><a href="download.php?id='.$docid.'"  class="btn btn-primary" role="button">Download</a> &nbsp;';
                            }
                        ?>
                        
                    </div>
                </div>
            </div><!-- col-lg-4 --> 
            
            <?php
                    }
             
                }
            }else{
                echo "<div class='col-md-12'><center><h1>No Records Yet</h1></center></div><br><br><br><br><br><br><br><br>";
            } ?>
                
        </div><!-- /row -->                             
                </div>
            </div>
        </div>
        <div class="col-md-1">
            <br>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1">
            <br>
        </div>
        <div class="col-md-4" style="max-width:400px">
            <img class="img-responsive" src="../docs/img/text1.png">
        </div>
        <div class="col-md-4" style="max-width:400px">
            <img class="img-responsive" src="../docs/img/text2.png">
        </div>
        <div class="col-md-4" style="max-width:400px">
            <img class="img-responsive" src="../docs/img/text3.png">
        </div>
        
    </div>
</div>
    


<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/alert.js"></script>
<script src="../js/slideshow.js"></script>
<script src="../js/backToTop.js"></script>
<script src="../js/sideNavII.js"></script>
<script src="../js/showNav.js"></script>
    
<!-- Footer -->
<footer class="container-fluid w3-theme-bd5 fixed" style="padding-top:10px;padding-bottom:20px;margin-top:150px">
    <div class="row">
        <div class="col-lg-4 col-md-4 w3-left">
            <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pagasa National High School</h3>
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