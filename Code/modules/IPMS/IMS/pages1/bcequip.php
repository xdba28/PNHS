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


?>

<!DOCTYPE HTML>
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

<script type="text/javascript">

window.onload = function () {
	var chart1 = new CanvasJS.Chart("chartContainer1", {
		title:{
			text: "Clinic"              
		},
		axisX:{
				interval: 1,
				gridThickness: 0,
				labelFontSize: 16,
				labelFontStyle: "normal",
				labelFontWeight: "normal",
				labelFontFamily: "Lucida Sans Unicode"

			},
			axisY2:{
				interlacedColor: "rgba(1,77,101,.2)",
				gridColor: "rgba(1,77,101,.1)"

			},
		data: [              
		{
				type: "bar",
                name: "companies",
				axisYType: "primary",
				color: "#014D65",
				
				
			// Change type to "doughnut", "line", "splineArea", etc.
			type: "bar",
			dataPoints: [
				<?php
					  $sql="SELECT *
							FROM pms_item,pms_app,pms_iar,ims_storage,pms_supplier,pms_po,pms_pr
							WHERE pms_iar.iar_no=ims_storage.iar_no 
							AND pms_app.item_id=pms_item.item_id 
							AND pms_iar.po_no=pms_po.po_no 
							AND pms_po.pr_no=pms_pr.pr_no 
							AND pms_pr.app_id=pms_app.app_id 
							AND pms_po.company_id=pms_supplier.company_id
                            AND pms_item.item_type='Clinic' 
							AND pms_item.equipment='1'
							ORDER BY item_name";
							$res=mysqli_query($mysqli,$sql);
					  while($row=mysqli_fetch_array($res))
					  { 
						$name=$row['item_name'];
						$qty=$row['stor_qty'];
					?>	
					
						{ label: "<?php echo $name; ?>",  y: <?php echo $qty; ?>, <?php if ($qty <= 10){ ?> color: '#680000', <?php }else{ ?> color: '#014D65', <?php } ?> },
					<?php	
						}
					?>
				
			]
		}
		]
	});
	
	var chart2 = new CanvasJS.Chart("chartContainer2", {
		title:{
			text: "Common"              
		},
		axisX:{
				interval: 1,
				gridThickness: 0,
				labelFontSize: 16,
				labelFontStyle: "normal",
				labelFontWeight: "normal",
				labelFontFamily: "Lucida Sans Unicode"

			},
			axisY2:{
				interlacedColor: "rgba(1,77,101,.2)",
				gridColor: "rgba(1,77,101,.1)"

			},
		data: [              
		{
				type: "bar",
                name: "companies",
				axisYType: "primary",
				color: "#014D65",
				
			
			// Change type to "doughnut", "line", "splineArea", etc.
			type: "bar",
			dataPoints: [
				<?php
					  $sql="SELECT *
							FROM pms_item,pms_app,pms_iar,ims_storage,pms_supplier,pms_po,pms_pr
							WHERE pms_iar.iar_no=ims_storage.iar_no 
							AND pms_app.item_id=pms_item.item_id 
							AND pms_iar.po_no=pms_po.po_no 
							AND pms_po.pr_no=pms_pr.pr_no 
							AND pms_pr.app_id=pms_app.app_id 
							AND pms_po.company_id=pms_supplier.company_id							
                            AND pms_item.item_type='Common' 
							AND pms_item.equipment='1'
							ORDER BY item_name";
							$res=mysqli_query($mysqli,$sql);
					  while($row=mysqli_fetch_array($res))
					  { 
						$name=$row['item_name'];
						$qty=$row['stor_qty'];
					?>
						{ label: "<?php echo $name; ?>",  y: <?php echo $qty; ?>, <?php if ($qty <= 10){ ?> color: '#680000', <?php }else{ ?> color: '#014D65', <?php } ?>  },
					<?php	
						}
					?>
				
			]
		}
		]
	});
	
	var chart3 = new CanvasJS.Chart("chartContainer3", {
		title:{
			text: "Electrical"              
		},
		axisX:{
				interval: 1,
				gridThickness: 0,
				labelFontSize: 16,
				labelFontStyle: "normal",
				labelFontWeight: "normal",
				labelFontFamily: "Lucida Sans Unicode"

			},
			axisY2:{
				interlacedColor: "rgba(1,77,101,.2)",
				gridColor: "rgba(1,77,101,.1)"

			},
		data: [              
		{
				type: "bar",
                name: "companies",
				axisYType: "primary",
				color: "#014D65",
				
			
			// Change type to "doughnut", "line", "splineArea", etc.
			type: "bar",
			dataPoints: [
				<?php
					  $sql="SELECT *
							FROM pms_item,pms_app,pms_iar,ims_storage,pms_supplier,pms_po,pms_pr
							WHERE pms_iar.iar_no=ims_storage.iar_no 
							AND pms_app.item_id=pms_item.item_id 
							AND pms_iar.po_no=pms_po.po_no 
							AND pms_po.pr_no=pms_pr.pr_no 
							AND pms_pr.app_id=pms_app.app_id 
							AND pms_po.company_id=pms_supplier.company_id							
                            AND pms_item.item_type='Electrical' 
							AND pms_item.equipment='1'
							ORDER BY item_name";
							$res=mysqli_query($mysqli,$sql);
					  while($row=mysqli_fetch_array($res))
					  { 
						$name=$row['item_name'];
						$qty=$row['stor_qty'];
					?>
						{ label: "<?php echo $name; ?>",  y: <?php echo $qty; ?>, <?php if ($qty <= 10){ ?> color: '#680000', <?php }else{ ?> color: '#014D65', <?php } ?>  },
					<?php	
						}
					?>
				
			]
		}
		]
	});
	
	var chart4 = new CanvasJS.Chart("chartContainer4", {
		title:{
			text: "Hardware"              
		},
		axisX:{
				interval: 1,
				gridThickness: 0,
				labelFontSize: 16,
				labelFontStyle: "normal",
				labelFontWeight: "normal",
				labelFontFamily: "Lucida Sans Unicode"

			},
			axisY2:{
				interlacedColor: "rgba(1,77,101,.2)",
				gridColor: "rgba(1,77,101,.1)"

			},
		data: [              
		{
				type: "bar",
                name: "companies",
				axisYType: "primary",
				color: "#014D65",
				
			
			// Change type to "doughnut", "line", "splineArea", etc.
			type: "bar",
			dataPoints: [
				<?php
					  $sql="SELECT *
							FROM pms_item,pms_app,pms_iar,ims_storage,pms_supplier,pms_po,pms_pr
							WHERE pms_iar.iar_no=ims_storage.iar_no 
							AND pms_app.item_id=pms_item.item_id 
							AND pms_iar.po_no=pms_po.po_no 
							AND pms_po.pr_no=pms_pr.pr_no 
							AND pms_pr.app_id=pms_app.app_id 
							AND pms_po.company_id=pms_supplier.company_id							
                            AND pms_item.item_type='Hardware' 
							AND pms_item.equipment='1'
							ORDER BY item_name";
							$res=mysqli_query($mysqli,$sql);
					  while($row=mysqli_fetch_array($res))
					  { 
						$name=$row['item_name'];
						$qty=$row['stor_qty'];
					?>
						{ label: "<?php echo $name; ?>",  y: <?php echo $qty; ?>, <?php if ($qty <= 10){ ?> color: '#680000', <?php }else{ ?> color: '#014D65', <?php } ?>  },
					<?php	
						}
					?>
				
			]
		}
		]
	});
	
	var chart5 = new CanvasJS.Chart("chartContainer5", {
		title:{
			text: "I.T."              
		},
		axisX:{
				interval: 1,
				gridThickness: 0,
				labelFontSize: 16,
				labelFontStyle: "normal",
				labelFontWeight: "normal",
				labelFontFamily: "Lucida Sans Unicode"

			},
			axisY2:{
				interlacedColor: "rgba(1,77,101,.2)",
				gridColor: "rgba(1,77,101,.1)"

			},
		data: [              
		{
				type: "bar",
                name: "companies",
				axisYType: "primary",
				color: '#014D65',
				
				
			
			// Change type to "doughnut", "line", "splineArea", etc.
			type: "bar",
			dataPoints: [
				<?php
					  $sql="SELECT *
							FROM pms_item,pms_app,pms_iar,ims_storage,pms_supplier,pms_po,pms_pr
							WHERE pms_iar.iar_no=ims_storage.iar_no 
							AND pms_app.item_id=pms_item.item_id 
							AND pms_iar.po_no=pms_po.po_no 
							AND pms_po.pr_no=pms_pr.pr_no 
							AND pms_pr.app_id=pms_app.app_id 
							AND pms_po.company_id=pms_supplier.company_id							
                            AND pms_item.item_type='I.T.' 
							AND pms_item.equipment='1'
							ORDER BY item_name";
							$res=mysqli_query($mysqli,$sql);
					  while($row=mysqli_fetch_array($res))
					  { 
						$name=$row['item_name'];						
						$qty=$row['stor_qty'];
						
										
					?>				
						{ label: "<?php echo $name; ?>",  y: <?php echo $qty; ?> , <?php if ($qty <= 10){ ?> color: '#680000', <?php }else{ ?> color: '#014D65', <?php } ?>},
					<?php	
						}
					?>
					

					

					

			]
		}
		]
	});
	
	var chart6 = new CanvasJS.Chart("chartContainer6", {
		title:{
			text: "Janitorial"              
		},
		axisX:{
				interval: 1,
				gridThickness: 0,
				labelFontSize: 16,
				labelFontStyle: "normal",
				labelFontWeight: "normal",
				labelFontFamily: "Lucida Sans Unicode"

			},
			axisY2:{
				interlacedColor: "rgba(1,77,101,.2)",
				gridColor: "rgba(1,77,101,.1)"

			},
		
		data: [              
		{
				type: "bar",
                name: "companies",
				axisYType: "primary",
				color: "#014D65",
				
			
			// Change type to "doughnut", "line", "splineArea", etc.
			type: "bar",
			dataPoints: [
				<?php
					  $sql="SELECT *
							FROM pms_item,pms_app,pms_iar,ims_storage,pms_supplier,pms_po,pms_pr
							WHERE pms_iar.iar_no=ims_storage.iar_no 
							AND pms_app.item_id=pms_item.item_id 
							AND pms_iar.po_no=pms_po.po_no 
							AND pms_po.pr_no=pms_pr.pr_no 
							AND pms_pr.app_id=pms_app.app_id 
							AND pms_po.company_id=pms_supplier.company_id							
                            AND pms_item.item_type='Janitorial' 
							AND pms_item.equipment='1'
							ORDER BY item_name";
							$res=mysqli_query($mysqli,$sql);
					  while($row=mysqli_fetch_array($res))
					  { 
						$name=$row['item_name'];
						$qty=$row['stor_qty'];
					?>
						{ label: "<?php echo $name; ?>",  y: <?php echo $qty; ?>, <?php if ($qty <= 10){ ?> color: '#680000', <?php }else{ ?> color: '#014D65', <?php } ?>  },
					<?php	
						}
					?>
				
				
			]
		}
		]
	});
	
	var chart7 = new CanvasJS.Chart("chartContainer7", {
		title:{
			text: "Sports"              
		},
		axisX:{
				interval: 1,
				gridThickness: 0,
				labelFontSize: 16,
				labelFontStyle: "normal",
				labelFontWeight: "normal",
				labelFontFamily: "Lucida Sans Unicode"

			},
			axisY2:{
				interlacedColor: "rgba(1,77,101,.2)",
				gridColor: "rgba(1,77,101,.1)"

			},
		data: [              
		{
				type: "bar",
                name: "companies",
				axisYType: "primary",
				color: "#014D65",
				
				
			// Change type to "doughnut", "line", "splineArea", etc.
			type: "bar",
			dataPoints: [
				<?php
					  $sql="SELECT *
							FROM pms_item,pms_app,pms_iar,ims_storage,pms_supplier,pms_po,pms_pr
							WHERE pms_iar.iar_no=ims_storage.iar_no 
							AND pms_app.item_id=pms_item.item_id 
							AND pms_iar.po_no=pms_po.po_no 
							AND pms_po.pr_no=pms_pr.pr_no 
							AND pms_pr.app_id=pms_app.app_id 
							AND pms_po.company_id=pms_supplier.company_id							
                            AND pms_item.item_type='Sports' 
							AND pms_item.equipment='1'
							ORDER BY item_name";
							$res=mysqli_query($mysqli,$sql);
					  while($row=mysqli_fetch_array($res))
					  { 
						$name=$row['item_name'];
						$qty=$row['stor_qty'];
					?>
						{ label: "<?php echo $name; ?>",  y: <?php echo $qty; ?>, <?php if ($qty <= 10){ ?> color: '#680000', <?php }else{ ?> color: '#014D65', <?php } ?>  },
					<?php	
						}
					?>
				
				
			]
		}
		]
	});
	
	chart1.render();
	chart2.render();
	chart3.render();
	chart4.render();
	chart5.render();
	chart6.render();
	chart7.render();

	
	
}
</script>
	
<style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 3050px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #a5d1f3;
      height: 100%;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
</style>

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
			  <li style="padding-bottom:1225%"></li>
            </ul>
        </div>
    </div>

	<div class="col-lg-10 col-md-9 col-sm-9">
        <div class="container-fluid" style="height:height:auto;min-height:700px;max-width:100%;margin-top:70px;margin-right:20px;margin-left:20px;margin-bottom:10px">
			<div class="col-sm-11"> </br>
				<h2><b>Equipment : </b> </h2> 
				<div id="chartContainer1" style="height: 400px; width: 100%;"></div> </br>
				<div id="chartContainer2" style="height: 400px; width: 100%;"></div> </br>
				<div id="chartContainer3" style="height: 400px; width: 100%;"></div> </br>
				<div id="chartContainer4" style="height: 400px; width: 100%;"></div> </br>
				<div id="chartContainer5" style="height: 400px; width: 100%;"></div> </br>
				<div id="chartContainer6" style="height: 400px; width: 100%;"></div> </br>
				<div id="chartContainer7" style="height: 400px; width: 100%;"></div> </br> </br>				
			</div>		
		</div>
    </div>
</div>
	
	
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/canvasjs.min.js"></script>
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