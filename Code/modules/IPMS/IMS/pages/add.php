<!DOCTYPE html>
<html lang="en" >
<?php 
    include("../db/dbcon.php");
    include("../session.php");
    






$id=$_GET['id'];
   $sql="SELECT pms_ris.emp_no,pms_iar_con.received_qty,pms_iar_con.iar_id,pms_ris_req.req_item, pms_ris_req.req_desc, pms_iar.iar_no, pms_iar.iar_status, pms_iar.received_date, pms_supplier.company_name FROM pms_po,
   pms_po_con, pms_supplier, pms_pr, pms_pr_con, pms_ris_req, pms_ris, pms_iar, pms_iar_con WHERE pms_iar_con.iar_no=pms_iar.iar_no AND pms_ris.ris_no=pms_ris_req.ris_no 
   AND pms_pr_con.req_item_id=pms_ris_req.req_item_id AND pms_po_con.pr_id=pms_pr_con.pr_id AND pms_pr.pr_no=pms_pr_con.pr_no AND pms_po.po_no=pms_po_con.po_no 
   AND pms_supplier.company_id=pms_po.company_id AND pms_iar.iar_no=pms_iar_con.iar_no AND pms_iar_con.po_id=pms_po_con.po_id AND pms_iar.iar_status= 'Complete' 
   AND pms_iar_con.inserted= '0' AND pms_iar_con.status= 'COMPLETE' AND pms_iar_con.iar_id='$id'";
      $res=mysqli_query($mysqli,$sql);
      while($row=mysqli_fetch_array($res))
      {
      	$id=$row['iar_id'];
        $status=$row['iar_status'];
        $date=$row['received_date'];
        $names=$row['req_item'];
        $des=$row['req_desc'];
        $qty=$row['received_qty'];
        $e=$row['emp_no'];

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
			
            <div class="container" style="margin-left: 40px">
                <br> <br><br>
                    
				<form> &nbsp;&nbsp;
					<input class="btn btn-primary btn" type="button" value="Go back" onclick="history.back()">
					</input>
				</form> 
			
		 
		
					
						<div class="row">
						<div class="col-lg-11">
							<h1><center>Add Item</br></center></h1><br>
						</div>
							<!-- /.col-lg-11 -->
						</div>
				
				<div class="container">
					<div class="row"> 
						<div class="col-lg-11">
							<div class="well">
								<form name="insert-data" action="" method="post">

								<div class="row">
									<div class="col-md-6 mb-3">				
									<input type="hidden" name="id" class="form-control" id="validationDefault01" placeholder="ID" value="<?php echo $e; ?>" id="usr" readonly>					
									  <label for="validationDefault01">ID</label>
									  <input type="number" name="id" class="form-control" id="validationDefault01" placeholder="ID" value="<?php echo $id; ?>" id="usr" readonly>
									</div>
									<div class="col-md-6 mb-3">									
									  <label for="validationDefault02">Item</label>
									  <input type="text" name="name" class="form-control" id="validationDefault02" placeholder="Item" value="<?php echo $names; ?>" id="usr" readonly>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-4 mb-3">
									  <label for="validationDefault03">Description:</label>
									  <input type="text" name="des" class="form-control" id="validationDefault03" placeholder="Description" value="<?php echo $des; ?>" id="usr" readonly>
									</div>
									<div class="col-md-4 mb-3">
									  <label for="validationDefault04">Date Received:</label>
									  <input type="date" name="date" class="form-control" id="validationDefault04" placeholder="Date Received" value="<?php echo $date; ?>" readonly>
									</div>
									<div class="col-md-4 mb-3">
									  <label for="validationDefault05">Quantity:</label>
									  <input type="number" name="quan" class="form-control" id="validationDefault05" placeholder="Quantity" value="<?php echo $qty; ?>" readonly>
									</div>
								</div>
									<br>
								<div class="row">
									<div class="col-md-6 mb-3">
									  <label for="validationDefault06">Date Inspected:</label>
									  <input type="text" name="ins"  class="form-control" id="validationDefault06" placeholder="Date Inspected" value="<?php echo date("Y-m-d") ?>" readonly>
									</div>
									<div class="col-md-6 mb-3">
									  <label for="validationDefault06">Product Code:</label>
									  <input type="text" name="code"  class="form-control" value="<?php echo 'PNHS'.'-'.date("Y-m-d").'-'.$names; ?>" id="validationDefault06" placeholder="Product Code" value="" readonly>
									</div>
									<div class="col-md-6 mb-3">
										<label for="validationDefault07" id="loc"  required>Location:</label>
										<select name="loc" class="form-control">                      
											<option value="Common">Common</option>
											<option value="Janitorial">Janitorial</option>
											<option value="I.T.">I.T.</option>
											<option value="Electric">Electric</option>
											<option value="Sports">Sports</option>
											<option value="Clinic">Clinic</option>
											<option value="Hardware">Hardware</option>
										</select>
									</div>
									<div class="col-md-6 mb-3">
										<label for="validationDefault08" id="type"  required>Item Type:</label>
										<select name="type" class="form-control">                      
											<option value="1">Equipment</option>
											<option value="0">Supply</option>
										</select>									
									</div>								
								</div>
								<br>	

				
				<div class="form-group">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  <input a href="inspection.php" class="btn btn-primary btn" type="submit" name='submit' value='Complete Inspection' class="form-control" >
				</div>
							</div>                                   
                                        
                                </form>													  
						</div>
						<!-- /.col-lg-4 -->
							</br>			
										
					</div>
					<!-- /.row -->			
				</div>
				<!-- /.container -->
				</div>
			</div> <br> <br> <br>
			</div>
			<!-- /.row -->	
		
    
	
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
		$type=mysqli_real_escape_string($mysqli,$_POST['type']);
		$name=mysqli_real_escape_string($mysqli,$_POST['name']);
		$des=mysqli_real_escape_string($mysqli,$_POST['des']);
		$date=mysqli_real_escape_string($mysqli,$_POST['date']);
		$loc=mysqli_real_escape_string($mysqli,$_POST['loc']);
		$stat=mysqli_real_escape_string($mysqli,$_POST['stat']);
		$quan=mysqli_real_escape_string($mysqli,$_POST['quan']);
		$ins=mysqli_real_escape_string($mysqli,$_POST['ins']);
		$id=mysqli_real_escape_string($mysqli,$_POST['id']);
		$code=mysqli_real_escape_string($mysqli,$_POST['code']);
	
	$sql="UPDATE pms_iar_con SET pms_iar_con.inserted='1' WHERE pms_iar_con.iar_id='$id'";

	$sql1="INSERT INTO `ims_storage`(`stor_date`, `iar_id`, `stor_qty`, `item_type`, `equipment`,`p_code`,`emp_no`) VALUES ('$ins','$id','$quan','$loc','$type','$code','$e')";
	
	mysqli_query($mysqli,$sql);
	mysqli_query($mysqli,$sql1);
	?>
<script type="text/javascript">

alert("Your Data Sucuessfully Updated");
window.location="inspection.php";


</script>

	<?php
}


?>