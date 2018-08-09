<!DOCTYPE html>
<html lang="en">
    
<head>
    <?php
        include("../sesh.php");
        $id=$_GET['id'];
        $show=$mysqli->query("SELECT doc_file FROM dms_document where doc_id=$id");
        $pdf=$show->fetch_assoc();
        $file=$pdf['doc_file'];
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
    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    
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
                                <a>
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
          <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class = "fa fa-user fa-sm"> <?php 
                $empname=mysqli_query($mysqli,"SELECT concat(p_fname,' ',p_lname)as Name FROM pims_personnel WHERE emp_no=$emp");
                $emprow=mysqli_fetch_assoc($empname);
                echo $emprow['Name']." ";
                ?></i><span class="caret"></span></a>
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
    <br><br><br>
    
    <div class="row">
        <div class="col-md-1">
            <br>
        </div>
        <div class="col-md-10">
            <div class="panel panel-primary">
                <div class="panel-body" style="opacity:1.0">
                    <object style="width:600px;height:500px;" data="data:application/pdf;base64,<?php echo base64_encode($file); ?>" type="application/pdf">
                        <embed src="data:application/pdf;base64,<?php echo base64_encode($file); ?>" type="application/pdf" />
                    </object>
                </div>
                
            </div>
            
        </div>
    </div><!-- /row --> 
</div>
    


<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/alert.js"></script>
<script src="../js/slideshow.js"></script>
<script src="../js/backToTop.js"></script>
<script src="../js/sideNavII.js"></script>
<script src="../js/showNav.js"></script>
<script src="../js/pdfobject.js"></script>
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
    
<!-- Footer -->
<?php include('../footer.php'); ?>
    
</body>
</html>