<!DOCTYPE html>
<html lang="en" >
<?php 
    include("../db/dbcon.php");
    include("../session.php");



$id=$_GET['id'];
   $sql="SELECT ims_storage.stor_qty,ims_storage.stor_id, pms_ris_req.req_item, pms_ris_req.req_desc, pms_ris_req.req_unit, ims_borrow.borrow_qty, pims_personnel.P_fname,
   pims_personnel.P_lname, ims_borrow.borrow_date, ims_storage.p_code, ims_borrow.borrow_id FROM ims_borrow, pims_personnel, pms_po_con, pms_supplier,
   pms_pr_con, pms_ris_req, ims_storage, pms_ris, pms_pr, pms_po, pms_iar, pms_iar_con WHERE pms_ris.ris_no=pms_ris_req.ris_no AND pms_ris_req.req_item_id=pms_pr_con.req_item_id 
   AND pms_pr.pr_no=pms_pr_con.pr_no AND pms_supplier.company_id=pms_po.company_id AND pms_po.po_no=pms_po_con.po_no AND pms_po_con.pr_id=pms_pr_con.pr_id 
   AND pms_iar.iar_no=pms_iar_con.iar_no AND pms_iar_con.po_id=pms_po_con.po_id AND pms_iar_con.iar_id=ims_storage.iar_id AND ims_borrow.emp_no=pims_personnel.emp_no 
   AND ims_storage.stor_id=ims_borrow.stor_id
   AND ims_borrow.borrow_id='$id'";
      $res=mysqli_query($mysqli,$sql);
      while($row=mysqli_fetch_array($res))
      {
      	$sid=$row['stor_id'];
      	$id=$row['borrow_id'];
        $qty=$row['borrow_qty'];
        $date=$row['borrow_date'];
        $names=$row['req_item'];
        $sqty=$row['stor_qty'];

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
                <br> <br> <br>
				
				<form> &nbsp;&nbsp;
					<input class="btn btn-outline btn-primary btn" type="button" value="Go back" onclick="history.back()">
					</input>
				</form>	
	
						<div class="row">
						<div class="col-lg-10">
							<h1><center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Return Item</br></center></h1><br>
						</div>
							<!-- /.col-lg-11 -->
						</div>
				
				<div class="container">
					<div class="row">
						<div class="col-lg-11">
							<div class="well">
								<form name="insert-data" action=" " method="post">

								<div class="row">
									<div class="col-md-6 mb-3">
								  <label for="validationDefault01">ID</label>
								  <input type="text" name="sid" class="form-control" id="validationDefault01" placeholder="Item Name" value="<?php echo $id; ?>" id="usr" readonly >
								</div>
								<div class="col-md-6 mb-3">
								  <label for="validationDefault02">Item Name</label>
								  <input type="text" name="name" class="form-control" id="validationDefault02" placeholder="Item Name" value="<?php echo $names; ?>" id="usr" readonly >
								</div>
								</div>
								<br>
								<div class="row">
								<div class="col-md-6 mb-3">
								  <label for="validationDefault03">Borrowed Quantity</label>
								  <input type="number" name="qty" class="form-control" id="validationDefault03" placeholder="Borrowed Quantity" value="<?php echo $qty; ?>" id="usr" readonly >
								</div>		
								<div class="col-md-6 mb-3">
								  <label for="validationDefault03">Stored Quantity</label>
								  <input type="number" name="sqty" class="form-control" id="validationDefault07" placeholder="Stored Quantity" value="<?php echo $sqty; ?>" id="usr" readonly >
								</div>					  								
								<div class="col-md-6 mb-3">
								  <label for="validationDefault04">Borrowed Date</label>
								  <input type="date" name="date" class="form-control" id="validationDefault04" placeholder="Borrowed Date" value="<?php echo $date; ?>" id="usr" readonly >
								</div>
								</div>
								 <br>
								<div class="row">
								<div class="col-md-6 mb-3">
								  <label for="validationDefault05">Returned Quantity</label>
								  <input type="number" name="rqty" class="form-control" id="validationDefault05" placeholder="Returned Quantity" value="<?php echo $date; ?>" id="usr" required >
								</div>
								<div class="col-md-6 mb-3">
								  <label for="validationDefault06">Date Retuned</label>
								  <input type="date" name="rdate" class="form-control" id="validationDefault06" placeholder="Date Retuned" value="<?php echo date("Y-m-d") ?>" id="usr" readonly>
								  
								</div>

								  </div>



				<div class="form-group"><br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                
				  <input a href="borrowed.php" class="btn btn-outline btn-primary btn" type="submit" name='submit' class="form-control" id="pwd">
				</div>
			</div>	
			</div>
			</div>
		</div>
		</div>	
	  </form>
		<br><br><br>
	</div>
	
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
    //maga query ka d2? hin             bqty,code,emp,bdate
                                      
                          $rqty=$_POST['rqty'];
                          $emp=$_POST['emp'];
                          $rdate=$_POST['rdate'];
                          $qty=$_POST['qty'];
                          $sqty=$_POST['sqty'];
                          $total=$qty-$rqty;
                          $total1=$rqty+$sqty;                              //for($i=0, $count = count($courses);$i<$count;$i++) {
                                                             //$course  = $courses[$i];
                                                             //$section = $sections[$i];
                                                             //}
                          if($rqty>$qty){
                          echo "<script>alert('Returned Quantity Error!');</script>";
                          }
                          else{
                                                               
                          
                          $insql=mysqli_query($mysqli,"UPDATE ims_borrow set borrow_qty='$total',return_date='$rdate' where ims_borrow.borrow_id='$id'");
                          $insql1=mysqli_query($mysqli,"UPDATE ims_storage set stor_qty='$total1',ins='0' where ims_storage.stor_id='$sid'");
                          }                                       
                          if($insql1){
                          echo "<script>alert('Data Updated');window.location='borrowed.php'</script>";
                          }else{
                          echo "<script>alert('Error!)</script>";
                          }
                                                                
                         
	?>
	


	<?php
}


?>