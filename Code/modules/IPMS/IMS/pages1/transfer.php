<?php
include('connect.php');
session_start();
if (isset($_SESSION['user_data'])){
$emp_no=$_SESSION['user_data']['acct']['emp_no'];
$aid=$_SESSION['user_data']['acct']['cms_account_ID'];
$n=mysqli_query($mysqli, "SELECT concat(p_fname,' ',p_lname) as Name  FROM pims_personnel
WHERE pims_personnel.emp_No=$emp_no");

$na = mysqli_fetch_assoc($n);
$name = $na['Name'];
}else{
echo "<script>alert('You are not allowed in this module!'); window.location='../../../../admin_idx.php';</script>";
}  

$id=$_GET['id'];
   $sql="SELECT *
	FROM pms_item,pms_app,pms_iar,ims_storage,pms_supplier,pms_po,pms_pr,ims_borrow,pims_personnel
    WHERE pms_iar.iar_no=ims_storage.iar_no 
    AND pms_app.item_id=pms_item.item_id 
    AND pms_iar.po_no=pms_po.po_no 
    AND pms_po.pr_no=pms_pr.pr_no 
    AND pms_pr.app_id=pms_app.app_id 
    AND pms_po.company_id=pms_supplier.company_id
    AND ims_borrow.stor_id=ims_storage.stor_id
    AND pims_personnel.emp_No=ims_borrow.emp_no
    AND borrow_id='$id'";
      $res=mysqli_query($mysqli,$sql);
      while($row=mysqli_fetch_array($res))
      {
      	$sid=$row['stor_id'];
      	$id=$row['borrow_id'];
        $qty=$row['borrow_qty'];
        $date=$row['borrow_date'];
        $name=$row['item_name'];

      }
         
      
?>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Browser's Tab Title -->
    <title>PNHS - Inventory System</title>
      
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="../css/w3/w3.css">
    
    <!-- Documents Path --->
    <link rel="stylesheet" href="..docs/docs.min.css">
    
    <!--Include your modified CSS below as needed-->
    <link rel="stylesheet" href="../css/w3/blue.css">
    <link rel="stylesheet" href="../css/w3/yellow.css">
    <link rel="stylesheet" href="../css/w3/w3.css">
    <link rel="stylesheet" href="../css/sidebar-menu.css">
	<link rel="stylesheet" href="../css/footercss.css">
    
    <!-- Icons CSS -->
    <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css" type="text/css">
    
    <!-- Browser's Tab Image -->
    <link rel="shortcut icon" href="../docs/pnhs_img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../docs/img/pnhs_favicon.ico" type="image/x-icon">
    
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

<div class="w3-theme-bd5 w3-card-4 navbar navbar-fixed-top" style="background-color:rgba(42,101,149,0.95)!important">
<div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed fa fa-bars hidden-sm hidden-md hidden-lg" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
      </button>
      <a class="navbar-brand" style="padding-top:5px;margin-left:5px" href="../../../../admin_idx.php"><img src="../docs/img/pnhs_logo.png" style="max-width:40px;margin-left:50px;margin-right:50px"></a>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label><br>Pag-asa National High School</label>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	
    <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><i class="fa fa-user fa-fw"></i>Lloyd Garcia</a></li>
        <li class="divider"></li>
        <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>

	<nav style="max-width:100%" class="hidden-xl hidden-lg hidden-md hidden-sm">
		<ul class="nav navbar-nav navbar-right">
        <li><a href="#"><i class="fa fa-user fa-fw"></i>Lloyd Garcia</a></li>
        <li class="divider"></li>
        <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>

	<nav style="max-width:100%" class="hidden-xl hidden-lg hidden-md hidden-sm">
		<ul class="sidebar-menu">
		 <li class="sidebar-header">MAIN NAVIGATION</li>
         <li><a href="../pages/index.php"><i class="fa fa-home"></i> Home </a></li>
            
		  <li>
			<a href="#">
			  <i class="fa fa-table fa-fw"></i> <span>Tables</span> 
			  <i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="sidebar-submenu">
			  <li><a href="../pages/building.php"><i class="fa fa-building-o"></i> Building </a></li>
			  <li><a href="../pages/equip.php"><i class="fa fa-wrench"></i> Equipment </a></li>
			  <li><a href="../pages/supply.php"><i class="fa fa-th"></i> Supply </a></li>
			  <li><a href="../pages/borrowed.php"><i class="fa fa-copy"></i> Borrowed Items </a></li>
			</ul>
		  </li>
		  <li>
			<a href="#">
			  <i class="fa fa-bar-chart-o"></i> <span> Bar Chart</span>
			  <i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="sidebar-submenu">
			  <li><a href="../pages/bcbuilding.php"><i class="fa fa-building-o"></i> Building </a></li>
			  <li><a href="../pages/bcequip.php"><i class="fa fa-wrench"></i> Equipment </a></li>
			  <li><a href="../pages/bcsupply.php"><i class="fa fa-th"></i> Supply </a></li>
			</ul>
		  </li>	
		  <li>
			<a href="#">
			  <i class="fa fa-book"></i> <span> Reports</span>
			  <i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="sidebar-submenu">
			  <li><a href="../pages/bldgreport.php"><i class="fa fa-file-o"></i> Building Report </a></li>
			  <li><a href="../pages/borrowreport.php"><i class="fa fa-folder-open-o"></i> Borrow Report </a></li>
			  <li><a href="../pages/annreport.php"><i class="fa fa-folder-o"></i> Storage Report </a></li>	  
			</ul>
		  </li>
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
              <li><a href="../pages/index.php"><i class="fa fa-home"></i> Home </a></li>
            
			  <li>
				<a href="#">
				  <i class="fa fa-table fa-fw"></i> <span>Tables</span> 
				  <i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="sidebar-submenu">
				  <li><a href="../pages/building.php"><i class="fa fa-building-o"></i> Building </a></li>
				  <li><a href="../pages/equip.php"><i class="fa fa-wrench"></i> Equipment </a></li>
				  <li><a href="../pages/supply.php"><i class="fa fa-th"></i> Supply </a></li>
				  <li><a href="../pages/borrowed.php"><i class="fa fa-copy"></i> Borrowed Items </a></li>
				</ul>
			  </li>
			  <li>
				<a href="#">
				  <i class="fa fa-bar-chart-o"></i> <span> Bar Chart</span>
				  <i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="sidebar-submenu">
				  <li><a href="../pages/bcbuilding.php"><i class="fa fa-building-o"></i> Building </a></li>
				  <li><a href="../pages/bcequip.php"><i class="fa fa-wrench"></i> Equipment </a></li>
				  <li><a href="../pages/bcsupply.php"><i class="fa fa-th"></i> Supply </a></li>
				</ul>
			  </li>
			  <li>
				<a href="#">
					<i class="fa fa-book"></i> <span> Reports</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="sidebar-submenu">
				  <li><a href="../pages/bldgreport.php"><i class="fa fa-file-o"></i> Building Report </a></li>
				  <li><a href="../pages/borrowreport.php"><i class="fa fa-folder-open-o"></i> Borrow Report </a></li>
				  <li><a href="../pages/annreport.php"><i class="fa fa-folder-o"></i> Storage Report </a></li>	  
				</ul>
			  </li>
			  <li style="padding-bottom:300%"></li>
            </ul>
        </div>
    </div>

	<div class="col-lg-9 col-md-9 col-sm-9">
	<div class="container-fluid" style="height:auto;min-height:700px;max-width:100%;margin-top:70px;margin-right:20px;margin-left:20px;margin-bottom:10px">
      <br><br><br><br>
        <form name="insert-data" action="" method="post">
			<div class="panel panel-primary">
			
				<div class="panel-heading">Transfer Item</div>
			  <div class="panel-body">
			  <div class="col-lg-6 col-lg-push-3 text-center">

			  	  
				  <div class="form-group">
				  <label for="usr">Item Name:</label>
				  <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" id="usr" read only>
				  </div>
				  <div class="form-group">
				  <label for="usr">Item Quantity:</label>
				  <input type="text" class="form-control" name="qty" value="<?php echo $qty; ?>" id="usr" read only>
				  </div>
				  <div class="form-group">
				  <label for="usr">Transfer Quantity:</label>
				  <input type="number" class="form-control" name="tqty" id="usr">
				  </div>
				  <div class="form-group">
				  <label for="usr">Item Product Code:</label>
				  <input type="text" class="form-control" name="pcode" id="usr">
				  </div>
				  <div class="form-group">
				  <label for="usr">Transfer Date:</label>
				  <input type="date" class="form-control" name="tdate" id="usr">
				  </div>
					<div class="form-group">
						<label for="usr">Transfer to:</label>
						<select class="form-control" name="emp"> 
						<?php 
						$emp=mysqli_query($mysqli,"SELECT concat(p_lname,',',p_fname) as Name,emp_no FROM pims_personnel");
						while($emp_row=mysqli_fetch_assoc($emp)){ ?>
						<option value="<?php echo $emp_row['emp_no']; ?>"><?php echo $emp_row['Name']; ?></option> 
											
						<?php	}
						 ?>
						</select> 

					</div> 
					<div class="form-group"> 
					  <input a href="borrowed.php" class="btn btn-outline btn-info btn" type="submit" name='submit' class="form-control" id="pwd"> 
					</div>
					
			</div>
			</div>	
	  </form>
		
		
	  </div>	<br><br><br><br><br>	
</div>	
</div>
</div>	
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/alert.js"></script>
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../js/sidebar-menu.js"></script>
<script src="../js/sideNav.js"></script>

<script>
$.sidebarMenu($('.sidebar-menu'))
</script>

    
<!-- Footer -->
<!-- Footer -->
<footer class="container-fluid w3-theme-bd5 hidden-xs" style="padding-top:10px;padding-bottom:20px;margin-left:200px">
    <footer class="w3-theme-bd5">
         <div class="row">
            <div class="col-lg-3 col-md-3">
               <h1 class="h3">PNHS IMS</h1>
               <h6>All Rights Reserved &copy; 2017</h6>
            </div>
            <div class="col-lg-3 col-md-3">
               <h1 class="h3">ADDRESS</h1>
               <h6><b>Pag-asa National Highschool</b><br><span>PNHS Building, Rawis, East Service<br>  Road, Legazpi City, PH 2424</span></h6>
            </div>
            <div class="col-lg-3 col-md-3">
               <h1 class="h3">CONTACT US</h1>
               <h6 class="w3-justify">
                  <b>Phone:</b>
                  <span>(+632) 887-2232</span>
                  <br>
                  <b>E-mail:</b> 
                  <span>pnhsoes@pnhs.gov.ph</span>
                  <br>
                  
               </h6>
            </div>
             <div class="col-lg-3 col-md-3">
               <h1 class="h3">Follow Us On:</h1>
                  <a href="#"><i class="fa fa-bullseye w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-phone w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-facebook w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-twitter w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-google-plus w3-xlarge" aria-hidden="true"></i></a>
            </div>
         </div>
      </footer>
</footer>
<footer class="container-fluid w3-theme-bd5 hidden-lg hidden-md hidden-sm" style="padding-top:10px;padding-bottom:20px">
    <footer class="w3-theme-bd5">
         <div class="row">
            <div class="col-lg-3 col-md-3">
               <h1 class="h3">PNHS IMS</h1>
               <h6>All Rights Reserved &copy; 2017</h6>
            </div>
            <div class="col-lg-3 col-md-3">
               <h1 class="h3">ADDRESS</h1>
               <h6><b>Pag-asa National Highschool</b><br><span>PNHS Building, Rawis, East Service<br>  Road, Legazpi City, PH 2424</span></h6>
            </div>
            <div class="col-lg-3 col-md-3">
               <h1 class="h3">CONTACT US</h1>
               <h6 class="w3-justify">
                  <b>Phone:</b>
                  <span>(+632) 887-2232</span>
                  <br>
                  <b>E-mail:</b> 
                  <span>pnhsoes@pnhs.gov.ph</span>
                  <br>
                  
               </h6>
            </div>
             <div class="col-lg-3 col-md-3">
               <h1 class="h3">Follow Us On:</h1>
                  <a href="#"><i class="fa fa-bullseye w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-phone w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-facebook w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-twitter w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-google-plus w3-xlarge" aria-hidden="true"></i></a>
            </div>
         </div>
      </footer>
</footer>
	
</body>
</html>

<?php




if(isset($_POST['submit']))
{
    //maga query ka d2? hin             bqty,code,emp,bdate
     
                                                            
                                                            $tqty=$_POST['tqty'];
                                                            $code=$_POST['pcode'];
                                                            $emp=$_POST['emp'];
                                                            $tdate=$_POST['tdate'];
                                                            $qty=$_POST['qty'];
                                                             //for($i=0, $count = count($courses);$i<$count;$i++) {
                                                             //$course  = $courses[$i];
                                                             //$section = $sections[$i];
                                                             //}
                                                            if($tqty>$qty){
                                                                     echo "<script>alert('Transfer Quantity Error!');</script>";
                                                                }
                                                                else{
                                                               
                                                                    $total=$qty-$tqty;
                                                                   $insql=mysqli_query($mysqli,"UPDATE ims_borrow set borrow_qty='$total' where borrow_id='$id'");
                                                                
                                                                    }
                                                                    
                                                                    
                                                                
                                                                if($insql){
                                                                    echo "<script>alert('Success! Storage Updated');</script>";
                                                                    
                                                                }else{
                                                                    echo "<script>alert('Error!Failed to Update');</script>";
                                                                }
                                                            if($total=0){
                                                                        $sql="DELETE from ims_borrow where borrow_id='$id'";
                                                                    echo "<script>alert('All items are transferred');</script>";
                                                                    }
                                                            
                                                            
                                                              
                                                        
                                                        
                                                    
    
    //like dat? iyo
    
    ?>


    <?php
}
//hahah sala !! dapat bako td dapat form ung qty 
//dude kaya naga error su $qty kaya na variable di na sia mareread kasi hanggang dun lang sia sa while loop na pag display ng va
?>


<?php




if(isset($_POST['submit']))
{
    //maga query ka d2? hin             bqty,code,emp,bdate

                                                            
                                                            $tqty=$_POST['tqty'];
                                                            $code=$_POST['pcode'];
                                                            $emp=$_POST['emp'];
                                                            $tdate=$_POST['tdate'];
                                                            $qty=$_POST['qty'];
                                                            
                                                             //for($i=0, $count = count($courses);$i<$count;$i++) {
                                                             //$course  = $courses[$i];
                                                             //$section = $sections[$i];
                                                             //}
                                                            
                                                               
                                                                    

                                                                    $insql1="INSERT INTO ims_borrow (emp_no,borrow_date,borrow_qty,p_code,stor_id) VALUES ('$emp','$tdate','$tqty','$code','$sid')";
                                                                
                                                                    //$sql2="UPDATE ims_storage set stor_qty='$total' WHERE stor_id='$id'";
                                                                //mysqli_query($mysqli,$sql2);
                                                                if($tqty>$qty){
                                                                    echo "<script>alert('Input Right Quantity')";
                                                                }else{
                                                                mysqli_query($mysqli,$insql1);
                                                                    echo "<script>alert('Success! Item/s Transferred'); window.location='borrowed.php'</script>";
                                                                
                                                            
                                                            }
                                                            
                                                              
                                                        
                                                        
                                                    
    
    //like dat? iyo
    
    ?>


    <?php
}
//hahah sala !! dapat bako td dapat form ung qty 
//dude kaya naga error su $qty kaya na variable di na sia mareread kasi hanggang dun lang sia sa while loop na pag display ng va
?>