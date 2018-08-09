<!DOCTYPE html>
<html lang="en" >
<?php 
    include("../db/dbcon.php");
    include("../session.php");




$id=$_GET['pcode'];
   $sql="SELECT ims_storage.stor_id, pms_ris_req.req_item, pms_ris_req.req_item_id, pms_ris_req.req_desc, pms_ris_req.req_unit, pms_po_con.unit_cost, ims_storage.stor_qty, 
   ims_storage.stor_date, pms_supplier.company_name FROM pms_po_con, pms_supplier, pms_pr_con, pms_ris_req, ims_storage, pms_ris, pms_pr, pms_po, pms_iar, pms_iar_con 
   WHERE pms_ris.ris_no=pms_ris_req.ris_no AND pms_ris_req.req_item_id=pms_pr_con.req_item_id AND pms_pr.pr_no=pms_pr_con.pr_no AND pms_supplier.company_id=pms_po.company_id 
   AND pms_po.po_no=pms_po_con.po_no AND pms_po_con.pr_id=pms_pr_con.pr_id AND pms_iar.iar_no=pms_iar_con.iar_no AND pms_iar_con.po_id=pms_po_con.po_id 
   AND pms_iar_con.iar_id=ims_storage.iar_id AND ims_storage.stor_id='$id'
	";
      $res=mysqli_query($mysqli,$sql);
      while($row=mysqli_fetch_array($res))
      {
		
        $id=$row['stor_id'];
        $names=$row['req_item'];
		$qty=$row['stor_qty'];
      }
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
			 
            <div class="container" style="margin-left: 20px">
                <br> <br>
                    
				<form>
					<input class="btn btn-primary btn" type="button" value="Go back" onclick="history.back()">
					</input>
				</form> 
					
						<div class="row">
						<div class="col-lg-10">
							<h1><center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Request Supply</br></center></h1><br>
						</div>
							<!-- /.col-lg-11 -->
						</div>
				
				<div class="container">
					<div class="row">
						<div class="col-lg-11">
							<div class="well">
								<form name="insert-data" action="" method="post">

								<div class="row">
								<div class="col-md-4 mb-3">
								  <label for="validationDefault01">ID</label>
								  <input type="text" name="id" class="form-control" id="validationDefault01" placeholder="ID" value="<?php echo $id; ?>" id="usr" readonly>
								</div>
								<div class="col-md-4 mb-3">
								  <label for="validationDefault02">Name</label>
								  <input type="text" name="name" class="form-control" id="validationDefault02" placeholder="Item Name" value="<?php echo $names; ?>" id="usr" readonly>
								</div>
								<div class="col-md-4 mb-3">
								  <label for="validationDefault03">Current Quantity</label>
								  <input type="number" name="qty" class="form-control" id="validationDefault03" placeholder="Current Quantity" value="<?php echo $qty; ?>" id="usr" readonly>
								</div>
							  </div>
							  <br>
								<div class="row">
								<div class="col-md-4 mb-3">
								  <label for="validationDefault04">Request Quantity</label>
								  <input type="number" name="bqty" class="form-control" id="validationDefault04" placeholder="Request Quantity" value="" id="usr" required>
								</div>
								<div class="col-md-4 mb-3">
								  <label for="validationDefault05">Request Date</label>
								  <input type="text" name="bdate" class="form-control" id="validationDefault05" placeholder="Request Date" value="<?php echo date("Y-m-d") ?>" id="usr" readonly>
								</div>
								<div class="col-md-4 mb-3">
								  <label for="validationDefault07">Personnel Information</label>
								  <select class="form-control" name="emp">
									  <?php 
										$emp=mysqli_query($mysqli,"SELECT concat(p_lname,' ',p_fname) as Name,emp_no FROM pims_personnel");
										while($emp_row=mysqli_fetch_assoc($emp)){ ?>
										<option value="<?php echo $emp_row['emp_no']; ?>"><?php echo $emp_row['Name']; ?></option>

									  <?php	}
									  ?>
								  </select><br>								 
								</div>
								</div>
								<div class="form-group"><br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  <input href="supply.php" type="submit" class="btn btn-primary btn" name='submit' class="form-control" id="pwd">
				</div>
				</div>
				</div>
				</div>
			  </div>
			</div>
		</form>
		</div>	
    
    <br><br><br><br><br><br><br><br><br>
    
<!-- Include all compiled plugins (below), or include individual files as needed -->
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


<?php

if(isset($_POST['submit']))
{
		$id=mysqli_real_escape_string($mysqli,$_POST['id']);
		$bdate=mysqli_real_escape_string($mysqli,$_POST['bdate']);
		$bqty=mysqli_real_escape_string($mysqli,$_POST['bqty']);
		$emp=mysqli_real_escape_string($mysqli,$_POST['emp']);
		$qty=mysqli_real_escape_string($mysqli,$_POST['qty']);
		$total=$qty-$bqty;

	$sql1="INSERT into ims_borrow (stor_id,emp_no,borrow_qty,borrow_date) values ('$id','$emp','$bqty','$bdate')";
	$sql2="UPDATE ims_storage set stor_qty='$total' WHERE stor_id='$id'";
	
    if ($bqty <= "0") {
    echo "<script>alert('Cannot be Zero!')</script>";
} elseif ($bqty > $qty) {
    echo "<script>alert('Quantity Error!')</script>";
} else {
    mysqli_query($mysqli,$sql1);
    mysqli_query($mysqli,$sql2);
        echo "<script>alert('Requesting Success!')</script>";
}
	
    

	
	?>
	<script type="text/javascript">

	window.location="supply.php";

	</script>
	<?php
}


?>
