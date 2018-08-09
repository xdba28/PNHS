<!DOCTYPE html>
<html lang="en" >
<?php 
    include("../db/dbcon.php");
    include("../session.php");



?>



<head>
  <meta charset="UTF-8">
  <title>PAG-ASA National High School</title>
    <link href="http://fonts.googleapis.com/css?family=Dosis:400,500,700" rel="stylesheet" type="text/css">
    <link rel='stylesheet prefetch' href='../css/bootstrap.min.css'>
    <link rel="icon" href="../img/pnhs_favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/w3.css">
    <link rel="stylesheet" href="../css/notif.css">

    <!-- MetisMenu CSS -->
    <link href="../vendor/dist/css/sb-admin-2.css" rel="stylesheet">
	
	<!-- Icons CSS -->
    <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css" type="text/css">
   
    
    <!-- Latest compiled and minified JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    
 
</head>

<body>
<?php include("../topnav.php");?>
      <div id="wrapper">
        
    
        <!-- Sidebar -->
        <?php include("../sidenav.php");?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
			 		
            <div class="container" style="margin-left: 30px">
                <br> <br> <br>
                    
				<form>
					<input class="btn btn-primary btn" type="button" value="Go back" onclick="history.back()">
					</input>
				</form> 
		
			<div class="col-sm-11"> </br>
				<h2><b>Supply : </b></h2>  
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
        
        <!-- /#page-content-wrapper -->

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
					  $sql="SELECT DISTINCT pms_ris_req.req_item_id,pms_po.po_no,P_lname,P_fname,pms_po_con.unit_cost,ims_storage.stor_id,pms_ris_req.req_unit,ims_storage.stor_qty,ims_storage.emp_no,ims_storage.stor_date,pms_ris_req.req_desc,pms_ris_req.req_item,ims_storage.p_code 
					  FROM pims_personnel,pms_po_con, pms_supplier, pms_pr_con, pms_ris_req, ims_storage, pms_ris, pms_pr, pms_po, pms_iar, pms_iar_con WHERE pms_ris.ris_no=pms_ris_req.ris_no 
					  AND pms_ris_req.req_item_id=pms_pr_con.req_item_id AND pms_pr.pr_no=pms_pr_con.pr_no AND pms_supplier.company_id=pms_po.company_id AND pms_po.po_no=pms_po_con.po_no 
					  AND pms_po_con.pr_id=pms_pr_con.pr_id AND pms_iar.iar_no=pms_iar_con.iar_no AND pms_iar_con.po_id=pms_po_con.po_id AND pms_iar_con.iar_id=ims_storage.iar_id 
					  AND ims_storage.emp_no=pims_personnel.emp_no 
					  AND ims_storage.item_type='Clinic' AND ims_storage.equipment='0' AND ims_storage.ins='0' ORDER BY req_item";
							$res=mysqli_query($mysqli,$sql);
					  while($row=mysqli_fetch_array($res))
					  { 
						$names=$row['req_item'];
						$qty=$row['stor_qty'];
					?>
						{ label: "<?php echo $names; ?>",  y: <?php echo $qty; ?>, <?php if ($qty <= 20){ ?> color: '#680000', <?php }else{ ?> color: '#014D65', <?php } ?>  },
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
					  $sql="SELECT DISTINCT pms_ris_req.req_item_id,pms_po.po_no,P_lname,P_fname,pms_po_con.unit_cost,ims_storage.stor_id,pms_ris_req.req_unit,ims_storage.stor_qty,ims_storage.emp_no,ims_storage.stor_date,pms_ris_req.req_desc,pms_ris_req.req_item,ims_storage.p_code 
					  FROM pims_personnel,pms_po_con, pms_supplier, pms_pr_con, pms_ris_req, ims_storage, pms_ris, pms_pr, pms_po, pms_iar, pms_iar_con WHERE pms_ris.ris_no=pms_ris_req.ris_no 
					  AND pms_ris_req.req_item_id=pms_pr_con.req_item_id AND pms_pr.pr_no=pms_pr_con.pr_no AND pms_supplier.company_id=pms_po.company_id AND pms_po.po_no=pms_po_con.po_no 
					  AND pms_po_con.pr_id=pms_pr_con.pr_id AND pms_iar.iar_no=pms_iar_con.iar_no AND pms_iar_con.po_id=pms_po_con.po_id AND pms_iar_con.iar_id=ims_storage.iar_id 
					  AND ims_storage.emp_no=pims_personnel.emp_no 
					  AND ims_storage.item_type='Common' AND ims_storage.equipment='0' AND ims_storage.ins='0' ORDER BY req_item";
							$res=mysqli_query($mysqli,$sql);
					  while($row=mysqli_fetch_array($res))
					  { 
						$names=$row['req_item'];
						$qty=$row['stor_qty'];
					?>
						{ label: "<?php echo $names; ?>",  y: <?php echo $qty; ?>, <?php if ($qty <= 20){ ?> color: '#680000', <?php }else{ ?> color: '#014D65', <?php } ?>  },
					<?php	
						}
					?>
				
			]
		}
		]
	});
	
	var chart3 = new CanvasJS.Chart("chartContainer3", {
		title:{
			text: "Electric"              
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
					  $sql="SELECT DISTINCT pms_ris_req.req_item_id,pms_po.po_no,P_lname,P_fname,pms_po_con.unit_cost,ims_storage.stor_id,pms_ris_req.req_unit,ims_storage.stor_qty,ims_storage.emp_no,ims_storage.stor_date,pms_ris_req.req_desc,pms_ris_req.req_item,ims_storage.p_code 
					  FROM pims_personnel,pms_po_con, pms_supplier, pms_pr_con, pms_ris_req, ims_storage, pms_ris, pms_pr, pms_po, pms_iar, pms_iar_con WHERE pms_ris.ris_no=pms_ris_req.ris_no 
					  AND pms_ris_req.req_item_id=pms_pr_con.req_item_id AND pms_pr.pr_no=pms_pr_con.pr_no AND pms_supplier.company_id=pms_po.company_id AND pms_po.po_no=pms_po_con.po_no 
					  AND pms_po_con.pr_id=pms_pr_con.pr_id AND pms_iar.iar_no=pms_iar_con.iar_no AND pms_iar_con.po_id=pms_po_con.po_id AND pms_iar_con.iar_id=ims_storage.iar_id 
					  AND ims_storage.emp_no=pims_personnel.emp_no 
					  AND ims_storage.item_type='Electric' AND ims_storage.equipment='0' AND ims_storage.ins='0'
    					  ORDER BY req_item";
							$res=mysqli_query($mysqli,$sql);
					  while($row=mysqli_fetch_array($res))
					  { 
						$names=$row['re_item'];
						$qty=$row['stor_qty'];
					?>
						{ label: "<?php echo $names; ?>",  y: <?php echo $qty; ?>, <?php if ($qty <= 20){ ?> color: '#680000', <?php }else{ ?> color: '#014D65', <?php } ?>  },
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
					  $sql="SELECT DISTINCT pms_ris_req.req_item_id,pms_po.po_no,P_lname,P_fname,pms_po_con.unit_cost,ims_storage.stor_id,pms_ris_req.req_unit,ims_storage.stor_qty,ims_storage.emp_no,ims_storage.stor_date,pms_ris_req.req_desc,pms_ris_req.req_item,ims_storage.p_code 
					  FROM pims_personnel,pms_po_con, pms_supplier, pms_pr_con, pms_ris_req, ims_storage, pms_ris, pms_pr, pms_po, pms_iar, pms_iar_con WHERE pms_ris.ris_no=pms_ris_req.ris_no 
					  AND pms_ris_req.req_item_id=pms_pr_con.req_item_id AND pms_pr.pr_no=pms_pr_con.pr_no AND pms_supplier.company_id=pms_po.company_id AND pms_po.po_no=pms_po_con.po_no 
					  AND pms_po_con.pr_id=pms_pr_con.pr_id AND pms_iar.iar_no=pms_iar_con.iar_no AND pms_iar_con.po_id=pms_po_con.po_id AND pms_iar_con.iar_id=ims_storage.iar_id 
					  AND ims_storage.emp_no=pims_personnel.emp_no 
					  AND ims_storage.item_type='Hardware' AND ims_storage.equipment='0' AND ims_storage.ins='0' ORDER BY req_item";
							$res=mysqli_query($mysqli,$sql);
					  while($row=mysqli_fetch_array($res))
					  { 
						$names=$row['req_item'];
						$qty=$row['stor_qty'];
					?>
						{ label: "<?php echo $names; ?>",  y: <?php echo $qty; ?>, <?php if ($qty <= 20){ ?> color: '#680000', <?php }else{ ?> color: '#014D65', <?php } ?> },
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
				color: "#014D65",
			
			// Change type to "doughnut", "line", "splineArea", etc.
			type: "bar",
			dataPoints: [
				<?php
					  $sql="SELECT DISTINCT pms_ris_req.req_item_id,pms_po.po_no,P_lname,P_fname,pms_po_con.unit_cost,ims_storage.stor_id,pms_ris_req.req_unit,ims_storage.stor_qty,ims_storage.emp_no,ims_storage.stor_date,pms_ris_req.req_desc,pms_ris_req.req_item,ims_storage.p_code 
					  FROM pims_personnel,pms_po_con, pms_supplier, pms_pr_con, pms_ris_req, ims_storage, pms_ris, pms_pr, pms_po, pms_iar, pms_iar_con WHERE pms_ris.ris_no=pms_ris_req.ris_no 
					  AND pms_ris_req.req_item_id=pms_pr_con.req_item_id AND pms_pr.pr_no=pms_pr_con.pr_no AND pms_supplier.company_id=pms_po.company_id AND pms_po.po_no=pms_po_con.po_no 
					  AND pms_po_con.pr_id=pms_pr_con.pr_id AND pms_iar.iar_no=pms_iar_con.iar_no AND pms_iar_con.po_id=pms_po_con.po_id AND pms_iar_con.iar_id=ims_storage.iar_id 
					  AND ims_storage.emp_no=pims_personnel.emp_no 
					  AND ims_storage.item_type='I.T.' AND ims_storage.equipment='0' AND ims_storage.ins='0' ORDER BY req_item";
							$res=mysqli_query($mysqli,$sql);
					  while($row=mysqli_fetch_array($res))
					  { 
						$names=$row['req_item'];
						$qty=$row['stor_qty'];
					?>
						{ label: "<?php echo $names; ?>",  y: <?php echo $qty; ?>, <?php if ($qty <= 20){ ?> color: '#680000', <?php }else{ ?> color: '#014D65', <?php } ?>  },
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
					  $sql="SELECT DISTINCT pms_ris_req.req_item_id,pms_po.po_no,P_lname,P_fname,pms_po_con.unit_cost,ims_storage.stor_id,pms_ris_req.req_unit,ims_storage.stor_qty,ims_storage.emp_no,ims_storage.stor_date,pms_ris_req.req_desc,pms_ris_req.req_item,ims_storage.p_code 
					  FROM pims_personnel,pms_po_con, pms_supplier, pms_pr_con, pms_ris_req, ims_storage, pms_ris, pms_pr, pms_po, pms_iar, pms_iar_con WHERE pms_ris.ris_no=pms_ris_req.ris_no 
					  AND pms_ris_req.req_item_id=pms_pr_con.req_item_id AND pms_pr.pr_no=pms_pr_con.pr_no AND pms_supplier.company_id=pms_po.company_id AND pms_po.po_no=pms_po_con.po_no 
					  AND pms_po_con.pr_id=pms_pr_con.pr_id AND pms_iar.iar_no=pms_iar_con.iar_no AND pms_iar_con.po_id=pms_po_con.po_id AND pms_iar_con.iar_id=ims_storage.iar_id 
					  AND ims_storage.emp_no=pims_personnel.emp_no 
					  AND ims_storage.item_type='Janitorial' AND ims_storage.equipment='0' AND ims_storage.ins='0' ORDER BY req_item";
							$res=mysqli_query($mysqli,$sql);
					  while($row=mysqli_fetch_array($res))
					  { 
						$names=$row['req_item'];
						$qty=$row['stor_qty'];
					?>
						{ label: "<?php echo $names; ?>",  y: <?php echo $qty; ?>, <?php if ($qty <= 20){ ?> color: '#680000', <?php }else{ ?> color: '#014D65', <?php } ?>  },
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
					  $sql="SELECT DISTINCT pms_ris_req.req_item_id,pms_po.po_no,P_lname,P_fname,pms_po_con.unit_cost,ims_storage.stor_id,pms_ris_req.req_unit,ims_storage.stor_qty,ims_storage.emp_no,ims_storage.stor_date,pms_ris_req.req_desc,pms_ris_req.req_item,ims_storage.p_code 
					  FROM pims_personnel,pms_po_con, pms_supplier, pms_pr_con, pms_ris_req, ims_storage, pms_ris, pms_pr, pms_po, pms_iar, pms_iar_con WHERE pms_ris.ris_no=pms_ris_req.ris_no 
					  AND pms_ris_req.req_item_id=pms_pr_con.req_item_id AND pms_pr.pr_no=pms_pr_con.pr_no AND pms_supplier.company_id=pms_po.company_id AND pms_po.po_no=pms_po_con.po_no 
					  AND pms_po_con.pr_id=pms_pr_con.pr_id AND pms_iar.iar_no=pms_iar_con.iar_no AND pms_iar_con.po_id=pms_po_con.po_id AND pms_iar_con.iar_id=ims_storage.iar_id 
					  AND ims_storage.emp_no=pims_personnel.emp_no 
					  AND ims_storage.item_type='Sports' AND ims_storage.equipment='0' AND ims_storage.ins='0' ORDER BY req_item";
							$res=mysqli_query($mysqli,$sql);
					  while($row=mysqli_fetch_array($res))
					  { 
						$names=$row['req_item'];
						$qty=$row['stor_qty'];
					?>
						{ label: "<?php echo $names; ?>",  y: <?php echo $qty; ?>, <?php if ($qty <= 20){ ?> color: '#680000', <?php }else{ ?> color: '#014D65', <?php } ?>  },
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
    .row.content {height: 2640px}
    
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


	
	  	
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/canvasjs.min.js"></script>
<script src="../js/alert.js"></script>
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script  src="../js/index.js"></script>
<script src="../js/metisMenu.min.js"></script>
<script src="../js/sb-admin-2.min.js"></script>



<footer class="w3-theme-bd5">
         <div class="container">
            <div class="col-lg-3 col-md-3">
               <h3 class="h3">PNHS</h3>
               <h6>All Rights Reserved &copy; 2018</h6>
            </div>
            <div class="col-lg-3 col-md-3">
               <h1 class="h3">ADDRESS</h1>
               <h6><b>Pag-asa National Highschool</b><br><span>PNHS Building, Rawis, East Service<br>  Road, Legazpi City, PH 2424</span></h6>
            </div>
            <div class="col-lg-3 col-md-3">
               <h3 class="h3">CONTACT US</h3>
               <h6 class="w3-justify">
                  <b>Phone:</b>
                  <span>(+632) 887-2232</span>
                  <br>
                  <b>E-mail:</b> 
                  <span>officialpnhs@pnhs.gov.ph</span>
                  <br>
               </h6>
            </div>
             <div class="col-lg-3 col-md-3">
               <h3 class="h3">FOLLOW US ON:</h3>
                  <a href="#"><i class="fa fa-bullseye w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-phone w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-facebook w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-twitter w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-google-plus w3-xlarge" aria-hidden="true"></i></a>
            </div>
         </div>
      </footer>
    </div>
    <!-- /#wrapper -->





</body>

</html>