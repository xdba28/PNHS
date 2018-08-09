<?php
include 'connect.php';
session_start();
if (isset($_SESSION['user_data'])){
$emp_no=$_SESSION['user_data']['acct']['emp_no'];
$aid=$_SESSION['user_data']['acct']['cms_account_ID'];
$n=mysqli_query($mysqli, "SELECT concat(p_fname,' ',p_lname) as Name,dept_name  FROM pims_personnel,pims_employment_records,pims_department
WHERE pims_personnel.emp_No=pims_employment_records.emp_No
AND pims_employment_records.dept_id=pims_department.dept_id
AND pims_personnel.emp_No=$emp_no");

$na = mysqli_fetch_assoc($n);
$name = $na['Name'];
}else{
echo "<script>alert('You are not allowed in this module!'); window.location='../../../../admin_idx.php';</script>";
}	




$sql1="DELETE FROM ims_borrow
WHERE ims_borrow.borrow_qty = 0";
mysqli_query($mysqli,$sql1);



?>



<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Browser's Tab Title -->
    <title>PNHS - Inventory System</title>
      
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
	<link rel="stylesheet" href="../css/sidebar-menu.css">
	
	<!-- DataTables CSS -->
    <link href="../css/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
	
    <!-- DataTables Responsive CSS -->
    <link href="../css/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    
    <!-- Icons CSS -->
    <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css" type="text/css">
    
    <!-- Browser's Tab Image -->
    <link rel="shortcut icon" href="../docs/pnhs_img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../docs/img/pnhs_favicon.ico" type="image/x-icon">
	
	<link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    
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
        <li><a href="#"><i class="fa fa-user fa-fw"></i><?php echo $name;?></a></li>
        <li class="divider"></li>
        <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
	
	<nav style="max-width:100%" class="hidden-xl hidden-lg hidden-md hidden-sm">
		<ul class="nav navbar-nav navbar-right">
        <li><a href="#"><i class="fa fa-user fa-fw"></i><?php echo $name;?></a></li>
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

	 <div class="col-lg-10 col-md-9 col-sm-9">
			<div class="container-fluid" style="height:auto;min-height:700px;max-width:100%;margin-top:70px;margin-right:20px;margin-left:20px;margin-bottom:10px">
				<div class="row"> </br>
					<div class="col-lg-12">
						<div class="panel panel-default">

												<form action="borrowed.php" method="post">
												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<br><br>
												&nbsp;&nbsp;&nbsp;
												<input type="text" name="valueToSearch" placeholder="">
									            <input class="btn btn-outline btn-info btn" type="submit" name="search" value="Search"><br>
									            <div class="panel-heading">

							

							<div class="w3-theme-bdark panel-heading">

								<h3><p class="fa fa-file-text-o">&nbsp;&nbsp;Borrowed Items</p></h3>  
							</div>
							
												

							<!-- /.panel-heading -->
							<div class="panel-body">
								<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
									<thead>
										<tr>
											<th><center>#</center></th>
											<th><center>Item Type</center></th>
											<th><center>Item <br>Description</center></th>
											<th><center>Quantity</center></th>
											<th><center>Liable <br>Officer</center></th>
											<th><center>Date Borrowed</center></th>
											<th><center>Product <br>Code</center></th>
											<th><center>Action</center></th>														
										</tr>
									</thead>
									
									<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query="SELECT *
	FROM pms_item,pms_app,pms_iar,ims_storage,pms_supplier,pms_po,pms_pr,ims_borrow,pims_personnel
    WHERE pms_iar.iar_no=ims_storage.iar_no 
    AND pms_app.item_id=pms_item.item_id 
    AND pms_iar.po_no=pms_po.po_no 
    AND pms_po.pr_no=pms_pr.pr_no 
    AND pms_pr.app_id=pms_app.app_id 
    AND pms_po.company_id=pms_supplier.company_id
    AND ims_borrow.stor_id=ims_storage.stor_id
    AND pims_personnel.emp_No=ims_borrow.emp_no
    AND equipment='1'
	AND CONCAT(item_name,P_lname,P_fname,borrow_date,item_des,p_code) 
	LIKE '%".$valueToSearch."%'
	";
    $search_result = filterTable($query);
    

}
 else {
    $query="SELECT *
	FROM pms_item,pms_app,pms_iar,ims_storage,pms_supplier,pms_po,pms_pr,ims_borrow,pims_personnel
    WHERE pms_iar.iar_no=ims_storage.iar_no 
    AND pms_app.item_id=pms_item.item_id 
    AND pms_iar.po_no=pms_po.po_no 
    AND pms_po.pr_no=pms_pr.pr_no 
    AND pms_pr.app_id=pms_app.app_id 
    AND pms_po.company_id=pms_supplier.company_id
    AND ims_borrow.stor_id=ims_storage.stor_id
    AND pims_personnel.emp_No=ims_borrow.emp_no
    AND equipment='1'";

    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "class_db");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}


                                                            
    




                                                              
                                                                



?>

<?php while($row = mysqli_fetch_array($search_result)):

?>
                <tr>

										              
                    <td><center><?php echo $row['borrow_id'];?></center></td>
                    <td><center><?php echo $row['item_name'];?></center></td>
                    <td><center><?php echo $row['item_des'];?></center></td>
                    <td><center><?php echo $row['borrow_qty'];?></center></td>
                    <td><center><?php echo $row['P_lname'],',',$row['P_fname'];?></center></td>
                    <td><center><?php echo $row['borrow_date'];?></center></td>
                    <td><center><?php echo $row['p_code'];?></center></td>
                    <td><center><a class="btn btn-outline btn-info btn" href='return.php?id=<?php echo $row['borrow_id'] ?>'>Return</a><br><br>
                    <a class="btn btn-outline btn-info btn" href='transfer.php?id=<?php echo $row['borrow_id'] ?>'>Transfer</a></center></td>
                </tr>

                <?php endwhile;?>
										
									</tbody>
								</table>
								 
							</div> 
							<!-- /.panel-body -->
						</div>
						</div></br>
						<!-- /.panel --> 
					</div>
					<!-- /.col-lg-12 -->
				</div>	
			</div>	
			
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

<!-- DataTables JavaScript -->
   
	<script>
		$(document).ready(function() {
			$('#dataTables-example').DataTable({
				responsive: true
			});
		}); 
		
	</script>
    
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

