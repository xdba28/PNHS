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
    
 <!-- Footer-->
<link href="../css/footer.css" rel="stylesheet">
    
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
                    if($fac=="Teaching"){ ?>
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
<div id="main" class="container"></div>
<div class="container-fluid">
    <br><br>
    <div class="row">
        <div class="col-md-1">
            <br>
        </div>
        <div class="col-lg-10">
            <!-- Single button -->
            <?php 
                    if($fac=="Teaching"){ 
                        if(strstr($job,"HTEACH")){ ?>
                <div class="btn-group">
                    <a href="form.php?dc=fi" type="button" class="btn btn-info" >
                        Department List
                    </a>
                </div>            
                    <?php        
                        }
            ?>
            
                <div class="btn-group">
                  <a href="form.php?dc=sr" type="button" class="btn btn-primary" >
                    Service Records
                  </a>
                </div>
                <div class="btn-group">
                  <a href="form.php?dc=pds" type="button" class="btn btn-success" >
                    Personal Data Sheet
                  </a>
                </div>
                <div class="btn-group">
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    School Files <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a href="form.php?dc=sf1">School File One</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="form.php?dc=sf5">School File Five</a></li>
                  </ul>
                </div>
                <div class="btn-group">
                  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Grade Files <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a href="form.php?dc=qg">Quarterly Grades</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="form.php?dc=mg">Master Grading Sheet</a></li>
                  </ul>
                </div>
                <?php        
                    }else{ ?>
                <div class="btn-group">
                  <a href="form.php?dc=pds" type="button" class="btn btn-info" >
                    Personal Data Sheet
                  </a>
                </div>
                <?php        
                    }
                ?>
            
        </div>
        <div class="col-md-1">
            <br>
        </div>
                        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-md-1">
            <br>
        </div>
        <div class="col-lg-10">
            <h1 class="page-header"><?php $doc=$_GET['dc'];
                if($doc=="sr"){
                    echo "<img class='img-responsive' src='../docs/img/ServiceRecord2.png'>";
                }else if($doc=="pds"){
                    echo "<img class='img-responsive' src='../docs/img/PersonalDataSheet2.png'>";
                }else if($doc=="fi"){
                    echo "Employee Department List";
                    echo "<div class='row'><div class='col-md-4'>";
                    echo "<form method='POST'>";
                    echo "<div class='input-group'>";
                    echo "<select name='yr' class='form-control'>";
                        echo "<option value=''>Select School Year</option>";
                        $sy=mysqli_query($mysqli,"SELECT sy_id,year FROM css_school_yr");
                        while($syrow=mysqli_fetch_assoc($sy)){
                            echo "<option value='".$syrow['sy_id']."'>".$syrow['year']."</option>";
                        }
                            echo "</select>";
                            echo '<span class="input-group-addon"><input name="btn" value="View" type="submit" role="button" ></span>';
                            
                            if(isset($_POST['btn'])){
                                $yr=$_POST['yr'];
                                echo "<script> window.location='form.php?dc=$doc&yr=$yr';</script>";
                            }
                    echo "</div>";
                    echo "</form>";
                    echo "</div></div>";
                }else if($doc=="sf1"){
                    echo '<img class="img-responsive" src="../docs/img/SchoolFile1.png">';
                    echo "<div class='row'><div class='col-md-4'>";
                    echo "<form method='POST'>";
                    echo "<div class='input-group'>";
                        echo "<select required name='yr' class='form-control'>";
                            $secyr=$mysqli->query("SELECT css_section.SECTION_ID, concat(year_level,'-',section_name,' :: ',year) as sec FROM css_section,css_school_yr, pims_employment_records,pims_personnel
                            WHERE css_school_yr.sy_id=css_section.sy_id
                            AND css_section.emp_rec_id=pims_employment_records.emp_rec_ID
                            AND pims_employment_records.emp_No=pims_personnel.emp_No
                            AND css_section.emp_rec_id=$emp");
                            $secnum=mysqli_num_rows($secyr);
                            if(!empty($secnum)){
                                echo "<option value=''>Select Year & Section</option>";
                                while($secrow=$secyr->fetch_array()){
                                    if(isset($_GET['yr'])){
                                        if($_GET['yr']==$secrow['SECTION_ID']){
                                            echo "<option selected value='".$secrow['SECTION_ID']."'>".$secrow['sec']."</option>";
                                        }else{
                                            echo "<option value='".$secrow['SECTION_ID']."'>".$secrow['sec']."</option>";
                                        }

                                    }else{
                                        echo "<option value='".$secrow['SECTION_ID']."'>".$secrow['sec']."</option>"; 
                                    } 
                                }
                            }else{
                                echo "<option value=''>No Section Handled</option>"; 
                            }

                            echo "</select>";

                            echo '<span class="input-group-addon"><input name="btn" value="View" type="submit" role="button" ></span>';

                            if(isset($_POST['btn'])){
                                $yr=$_POST['yr'];
                                echo "<script> window.location='form.php?dc=$doc&sec=$yr';</script>";
                            }
                    echo "</div>";
                    echo "</form>";
                    echo "</div></div>";
                }else if($doc=="sf5"){
                    echo '<img class="img-responsive" src="../docs/img/SchoolFile5_2.png">';
                    echo "<div class='row'><div class='col-md-4'>";
                    echo "<form method='POST'>";
                    echo "<div class='input-group'>";
                        echo "<select required name='yr' class='form-control'>";
                            $secyr=$mysqli->query("SELECT css_section.SECTION_ID, concat(year_level,'-',section_name,' :: ',year) as sec FROM css_section,css_school_yr, pims_employment_records,pims_personnel
                            WHERE css_school_yr.sy_id=css_section.sy_id
                            AND css_section.emp_rec_id=pims_employment_records.emp_rec_ID
                            AND pims_employment_records.emp_No=pims_personnel.emp_No
                            AND pims_personnel.emp_no=$emp");
                            $secnum=mysqli_num_rows($secyr);
                            if(!empty($secnum)){
                                echo "<option value=''>Select Year & Section</option>";
                                while($secrow=$secyr->fetch_array()){
                                    if(isset($_GET['yr'])){
                                        if($_GET['yr']==$secrow['SECTION_ID']){
                                            echo "<option selected value='".$secrow['SECTION_ID']."'>".$secrow['sec']."</option>";
                                        }else{
                                            echo "<option value='".$secrow['SECTION_ID']."'>".$secrow['sec']."</option>";
                                        }

                                    }else{
                                        echo "<option value='".$secrow['SECTION_ID']."'>".$secrow['sec']."</option>"; 
                                    } 
                                }
                            }else{
                                echo "<option value=''>No Section Handled</option>"; 
                            }

                            echo "</select>";

                            echo '<span class="input-group-addon"><input name="btn" value="View" type="submit" role="button" ></span>';

                            if(isset($_POST['btn'])){
                                $yr=$_POST['yr'];
                                echo "<script> window.location='form.php?dc=$doc&sec=$yr';</script>";
                            }
                    echo "</div>";
                    echo "</form>";
                    echo "</div></div>";
                }else if($doc=="qg"){
                    echo '<img class="img-responsive" src="../docs/img/QuarterlyGrades2.png">';
                    echo "<div class='row'><div class='col-md-4'>";
                    echo "<form method='POST'>";
                    echo "<div class='input-group'>";
                    echo "<select name='yr' class='form-control'>";
                            echo "<option value=''>Select Year & Section</option>";
                            $qg=$mysqli->query("SELECT css_schedule.SCHED_ID,concat(sub_desc,', ',year_level,'-',section_name,' :: ',year) as sec from css_schedule,css_school_yr,css_section,pims_employment_records,pims_personnel,css_subject
                            where css_schedule.SECTION_ID=css_section.SECTION_ID
                            AND css_schedule.sy_id=css_school_yr.sy_id
                            AND css_section.emp_rec_id=pims_employment_records.emp_rec_ID
                            AND pims_employment_records.emp_No=pims_personnel.emp_No
                            AND css_schedule.subject_id=css_subject.subject_id
                            AND pims_personnel.emp_No=$emp");
                            $qnum=mysqli_num_rows($qg);
                            if(empty($qnum)){
                                echo "<option value=''>No Section Handled</option>";
                            }else{
                                while($qgrow=$qg->fetch_assoc()){ 
                                    echo "<option value='".$qgrow['SCHED_ID']."'>".$qgrow['sec']."</option>";
                                }
                            }
                            
                            echo "</select>";
                            echo '<span class="input-group-addon"><input name="btn" value="View" type="submit" role="button" ></span>';
                            
                            if(isset($_POST['btn'])){
                                $yr=$_POST['yr'];
                                echo "<script> window.location='form.php?dc=$doc&sec=$yr';</script>";
                            }
                    echo "</div>";
                    echo "</form>";
                    echo "</div></div>";
                }else if($doc=="mg"){
                    echo '<img class="img-responsive" src="../docs/img/MasterGradingSheets2.png">';
                    echo "<div class='row'><div class='col-md-4'>";
                    echo "<form method='POST'>";
                    echo "<div class='input-group'>";
                        echo "<select required name='yr' class='form-control'>";
                            $secyr=$mysqli->query("SELECT css_section.SECTION_ID, concat(year_level,'-',section_name,' :: ',year) as sec FROM css_section,css_school_yr, pims_employment_records,pims_personnel
                            WHERE css_school_yr.sy_id=css_section.sy_id
                            AND css_section.emp_rec_id=pims_employment_records.emp_rec_ID
                            AND pims_employment_records.emp_No=pims_personnel.emp_No
                            AND pims_personnel.emp_no=$emp");
                            $secnum=mysqli_num_rows($secyr);
                            if(!empty($secnum)){
                                echo "<option value=''>Select Year & Section</option>";
                                while($secrow=$secyr->fetch_array()){
                                    if(isset($_GET['yr'])){
                                        if($_GET['yr']==$secrow['SECTION_ID']){
                                            echo "<option selected value='".$secrow['SECTION_ID']."'>".$secrow['sec']."</option>";
                                        }else{
                                            echo "<option value='".$secrow['SECTION_ID']."'>".$secrow['sec']."</option>";
                                        }

                                    }else{
                                        echo "<option value='".$secrow['SECTION_ID']."'>".$secrow['sec']."</option>"; 
                                    } 
                                }
                            }else{
                                echo "<option value=''>No Section Handled</option>"; 
                            }

                            echo "</select>";

                            echo '<span class="input-group-addon"><input name="btn" value="View" type="submit" role="button" ></span>';

                            if(isset($_POST['btn'])){
                                $yr=$_POST['yr'];
                                echo "<script> window.location='form.php?dc=$doc&sec=$yr';</script>";
                            }
                    echo "</div>";
                    echo "</form>";
                    echo "</div></div>";
                }else{
                    echo "<br><br>";
                }
                        ?>
            </h1>
        </div>
        <div class="col-md-1">
            <br>
        </div>
                        <!-- /.col-lg-12 -->
    </div>
    <div class="container-fluid">
         <!-- /.row -->
        <div class="row">
            <div class="col-md-1">
                <br>
            </div>
            <div class="col-md-10">
                <?php
                if($doc=="sr"){
                    include("pages/sr.php");
                }else if($doc=="sf1"){
                    if(isset($_GET['sec'])){
                        include("pages/sf1.php");
                    }else{
                        echo "<br><br><br><br><br>";
                    }
                }else if($doc=="pds"){
                    
                    include("pages/pds.php");
                }else if($doc=="fi"){
                    if(isset($_GET['yr'])){
                        include("pages/dep.php");
                    }else{
                        echo "<br><br><br><br><br>";
                    }
                }else if($doc=="sf5"){
                    if(isset($_GET['sec'])){
                        include("pages/sf5.php");
                    }else{
                        echo "<br><br><br><br><br>";
                    }
                }else if($doc=="mg"){
                    if(isset($_GET['sec'])){
                        include("pages/mg.php");
                    }else{
                        echo "<br><br><br><br><br>";
                    }
                }else if($doc=="qg"){
                    
                    if(isset($_GET['sec'])){
                        if($_GET['sec']!=""){
                            include("pages/qg.php");
                        }else{
                            echo "<br><br><br><br><br>";
                        }
                        
                    }else{
                        echo "<br><br><br><br><br>";
                    }
                }
            ?>    
            </div>
            <div class="col-md-1">
                <br>
            </div>
        </div>
            
    </div>
           
    <br>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/alert.js"></script>
<script src="../js/slideshow.js"></script>
<script src="../js/sideNav.js"></script>
<script src="../js/showNav.js"></script>

<!-- Morris Charts JavaScript -->
<script src="../vendor/raphael/raphael1.min.js"></script>
<script src="../vendor/morrisjs/morris1.min.js"></script>
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
        
</div>
    
<!-- Footer -->
<?php include('../footer.php'); ?>
    
</body>
</html>
