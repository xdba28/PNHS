<?php
        include("../sesh.php");
        $jt=mysqli_query($mysqli,"SELECT pims_employment_records.job_title_code,faculty_type FROM pims_personnel,pims_employment_records,pims_job_title WHERE pims_personnel.emp_no=pims_employment_records.emp_no AND pims_job_title.job_title_code=pims_employment_records.job_title_code AND pims_employment_records.emp_no=$emp");
        $jrow=mysqli_fetch_assoc($jt);
        $job=$jrow['job_title_code'];
        $fac=$jrow['faculty_type'];
    ?>
<!DOCTYPE html>
<html lang="en">

    
<head>
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
    
    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    
    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!--Include your modified CSS below as needed-->
    <link rel="stylesheet" href="../css/w3/blue.css">
    <link rel="stylesheet" href="../css/w3/yellow.css">
    <link rel="stylesheet" href="../css/w3/w3.css">
    <link rel="stylesheet" href="../css/sideNav.css">
    
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
body{
    background-image: url(../docs/img/mayon.png);
    background-repeat: no-repeat;
    background-position: top;
}
h3{
    text-align: left;
    font-family: "times new roman";
    margin-top:0px;
    margin-bottom:0px;
}
h4{
    text-align: left;
    margin-top:5px;
    margin-bottom:0px;
}
h1{
    text-align: left;
    font-family: "times new roman";
    margin-bottom:0px;
}
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
    
<section id="work"> 
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding:0px">
            <img class="w3-right" src="../docs/img/pnhs_logo.png" style="margin-top:20px">
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding:0px">
            <div data-spy="container-fluid" style="height:140px">
                <div class="container-fluid w3-left" style="max-width:500px;margin-top:10px" style="color: white">
                    <h1 style="color: white">PAG-ASA</h1> <h3 style="color: white">NATIONAL HIGH SCHOOL</h3>
                    <h4 style="color: white">(Faculty Records Management System)</h4>
                </div>
            </div>
        </div>
    </div>
</section>

<nav class="w3-theme-bd5 w3-card-4" style="background-color:rgba(42,101,149,0.95)!important" role="navigation" data-spy="affix" data-offset-top="140" data-offset-top="140">
    <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed fa fa-bars hidden-sm hidden-md hidden-lg" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
      </button>
      <a class="navbar-brand w3-card-4" href="../../../admin_idx.php"><img src="../docs/img/pnhs_logo.png" width="75px" height="75px"></a>
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
              <?php 
                    if($fac=="Teaching"){ 
                        if($fac)
                ?>
                
                <li><a href="form.php?dc=sr"><i class="fa fa-circle-o fa-fw"></i> Service Records &nbsp;</a></li>
                <li><a href="form.php?dc=pds"><i class="fa fa-circle-o fa-fw"></i> Personal Data Sheet &nbsp;</a></li>
                <li><a href="form.php?dc=sf"><i class="fa fa-circle-o fa-fw"></i> School Files</a ></li>
                <li><a href="form.php?dc=gd"><i class="fa fa-circle-o fa-fw"></i> Grade Files</a></li>
                <?php        
                    }else{ ?>
                <li><a href="form.php?dc=pds"><i class="fa fa-circle-o fa-fw"></i> Personal Data Sheet &nbsp;</a></li>
                <?php        
                    }
                ?>
              
                <?php if(strstr($job,"HTEACH")){ 
            echo "<li><a href=form.php?dc=fi><i class='fa fa-circle-o fa-fw'></i>Employee List</a></li>";
                    }
                ?>
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
                        while($mesrow=mysqli_fetch_assoc($mes)){
                        $dt=strtotime($mesrow['sent']);
                        $datetime=date("M d,Y h:i A",$dt);
                ?>
                
                <li>
                    <a href="mes_update.php?read=1&del=0&mid=<?php echo $mesrow['mes_id']; ?>">
                        <span class="image"><?php echo $mesrow['Name']; ?></span>
                        <span class="message">
                             <?php
                                if($yesterday==$mesrow['sent']){
                                    echo "<em>Yesterday</em>";
                                }else{
                                    echo "<em>".$datetime."</em>";
                                }
                            ?>
                        </span>
                    </a>
                </li>      

                            <?php }

                        }else{ ?>
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
                        <?php } ?>
                            
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
                <li>
                    <a href="messagereport.php">
                        <span class="image">
                            <i class="fa fa-pencil"></i>
                        </span>
                        <span class="message">
                          Message Report
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
<div class="container" style="padding:35px; background:rga(0,0,0,0.5)"></div>



    <div class="row">
        <div class="col-md-1">
            <br>
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
                                        $rec=mysqli_query($mysqli,"SELECT concat(p_fname,' ',p_lname) as Name,job_title_name,dms_receiver.rec_no FROM dms_receiver,cms_account,pims_personnel,pims_employment_records,pims_job_title,cms_privilege 
                                        WHERE pims_personnel.emp_no=cms_account.emp_no
                                        AND cms_account.cms_account_ID=dms_receiver.cms_account_id
                                        And pims_employment_records.emp_No=pims_personnel.emp_No
                                        AND pims_employment_records.job_title_code=pims_job_title.job_title_code
                                        AND cms_account.cms_account_id=cms_privilege.cms_account_id
                                        AND (cms_account_type='admin' AND frms_priv='1')
                                        AND dms_receiver.rec_no!=$recid");
                                        while($recrow=mysqli_fetch_assoc($rec)){
                                            echo "<option value='".$recrow['rec_no']."'>".$recrow['Name']." - ".$recrow['job_title_name']."</option>";
                                        }

                                        ?>
                                    </select>
                                    <span class="input-group-addon" id="basic-addon2">Subject</span><input required placeholder="Subject" name="sub" class="form-control">
                                </div><br>
                                <div  class="input-group">
                                    <span class="input-group-addon" id="basic-addon2">Document&nbsp;</span>
                                        <select id="docs" class="form-control" name="doc">
                                            <option value="">Select Document</option>
                                            <?php
                                                $num=0;
                                                $docsr=$mysqli->query("SELECT dms_document.doc_id,doc_type FROM pims_personnel,dms_document,dms_doc_type,dms_sr
                                                WHERE dms_document.type_id=dms_doc_type.type_id
                                                AND dms_document.emp_no=pims_personnel.emp_no
                                                AND dms_document.doc_id=dms_sr.doc_id 
                                                AND dms_document.emp_no=$emp");
                                                $srnum=mysqli_num_rows($docsr);
                                                $num+=$srnum;
                                            
                                                $docpds=$mysqli->query("SELECT dms_document.doc_id,doc_type FROM pims_personnel,dms_document,dms_doc_type,dms_pds
                                                WHERE dms_document.type_id=dms_doc_type.type_id
                                                AND dms_document.emp_no=pims_personnel.emp_no
                                                AND dms_document.doc_id=dms_pds.doc_id
                                                AND dms_document.emp_no=$emp");
                                                $pdsnum=mysqli_num_rows($docpds);
                                                $num+=$pdsnum;
                                            
                                                $docmg=$mysqli->query("SELECT dms_document.doc_id,doc_type,concat('SY:',year,' ',year_level,'-',section_name) as Sec FROM pims_personnel,dms_document,dms_doc_type,dms_master_grade,css_section,css_school_yr
                                                WHERE dms_document.type_id=dms_doc_type.type_id
                                                AND css_section.sy_id=css_school_yr.sy_id
                                                AND dms_document.emp_no=pims_personnel.emp_no
                                                AND dms_document.doc_id=dms_master_grade.doc_id
                                                AND dms_master_grade.section_id=css_section.section_id
                                                AND dms_document.emp_no=$emp");
                                                $mgnum=mysqli_num_rows($docmg);
                                                $num+=$mgnum;
                                            
                                                $docqg=$mysqli->query("SELECT dms_document.doc_id,doc_type,concat('SY:',year,' ',year_level,'-',section_name,',',subject_name) as Sec FROM pims_personnel,dms_document,dms_doc_type,dms_master_grade,css_section,css_school_yr,css_subject
                                                WHERE dms_document.type_id=dms_doc_type.type_id
                                                AND css_section.sy_id=css_school_yr.sy_id
                                                AND dms_document.emp_no=pims_personnel.emp_no
                                                AND dms_document.doc_id=dms_master_grade.doc_id
                                                AND dms_master_grade.section_id=css_section.section_id
                                                AND css_schedule.section_id=css_section.section_id
                                                AND css_schedule.subject_id=css_subject.subject_id
                                                AND css_schedule.sy_id=css_school_yr.sy_id
                                                AND dms_document.emp_no=$emp");
                                                $qgnum=mysqli_num_rows($docqg);
                                                $num+=$qgnum;    
                                            
                                                $docsf1=$mysqli->query("SELECT dms_document.doc_id,doc_type,concat('SY:',year,' ',year_level,'-',section_name) as Sec FROM pims_personnel,dms_document,dms_doc_type,dms_sf1,css_section,css_school_yr
                                                WHERE dms_document.type_id=dms_doc_type.type_id
                                                AND css_section.sy_id=css_school_yr.sy_id
                                                AND dms_document.emp_no=pims_personnel.emp_no
                                                AND dms_document.doc_id=dms_sf1.doc_id
                                                AND dms_sf1.section_id=css_section.section_id
                                                AND dms_document.emp_no=$emp");
                                                $sf1num=mysqli_num_rows($docsf1);
                                                $num+=$sf1num;
                                            
                                                $docsf5=$mysqli->query("SELECT dms_document.doc_id,doc_type,concat('SY:',year,' ',year_level,'-',section_name) as Sec FROM pims_personnel,dms_document,dms_doc_type,dms_sf1,css_section,css_school_yr
                                                WHERE dms_document.type_id=dms_doc_type.type_id
                                                AND css_section.sy_id=css_school_yr.sy_id
                                                AND dms_document.emp_no=pims_personnel.emp_no
                                                AND dms_document.doc_id=dms_sf5.doc_id
                                                AND dms_sf5.section_id=css_section.section_id
                                                AND dms_document.emp_no=$emp");
                                                $sf5num=mysqli_num_rows($docsf5);
                                                $num+=$sf5num; 
                                            
                                                if($num>=1){
                                                    while($sr=mysqli_fetch_assoc($docsr)){
                                                        echo "<option value='".$sr['doc_id']."'>".$sr['doc_type']." </option>";
                                                    }


                                                    while($pds=mysqli_fetch_assoc($docpds)){
                                                        echo "<option value='".$pds['doc_id']."'>".$pds['doc_type']." </option>";
                                                    }


                                                    while($mg=mysqli_fetch_assoc($docmg)){
                                                        echo "<option value='".$mg['doc_id']."'>".$mg['doc_type']." ( ".$mg['Sec']." ) </option>";
                                                    }


                                                    while($qg=mysqli_fetch_assoc($docqg)){
                                                        echo "<option value='".$qg['doc_id']."'>".$qg['doc_type']." ( ".$qg['Sec']." ) </option>";
                                                    }


                                                    while($sf1=mysqli_fetch_assoc($docsf1)){
                                                        echo "<option value='".$sf1['doc_id']."'>".$sf1['doc_type']." ( ".$sf1['Sec']." ) </option>";
                                                    }
                                                    
                                                    while($sf1=mysqli_fetch_assoc($docsf5)){
                                                        echo "<option value='".$sf5['doc_id']."'>".$sf5['doc_type']." ( ".$sf5['Sec']." ) </option>";
                                                    }
                                                }else{
                                                    echo "<option value=''>No available Document</option>";
                                                }
                                                
                                            ?>
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
                                mysqli_query($mysqli,"LOCK TABLES dms_message,dms_receiver,cms_account,dms_mes_temp READ");
                                $mes=mysqli_query($mysqli,"INSERT INTO dms_message (mes_title,mes_content,sent,mes_status,mes_delete,mes_stat,doc_id,rec_no,cms_account_id) VALUES ('$sub','$con','$date','0','0','P',$doc,'$rec','$aid')");
                                if($mes){
                                    mysqli_query($mysqli,"COMMIT");
                                    echo "<script>alert('Message Sent'); window.location='add.php'; </script>";
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
    <br><br>
    
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/alert.js"></script>
<script src="../js/slideshow.js"></script>
<script src="../js/sideNav.js"></script>
<script src="../js/showNav.js"></script>

<!-- Morris Charts JavaScript -->
<script src="../vendor/raphael/raphael1.min.js"></script>
<script src="../vendor/morrisjs/morris1.min.js"></script>
<script>
    
</script>
    
<!-- Footer -->
<?php include('../footer.php'); ?>
    
</body>
</html>