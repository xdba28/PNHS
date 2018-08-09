<!DOCTYPE html>
<html lang="en" >
<?php 
    include("../db/dbcon.php");
    include("../session.php");



if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query="SELECT ims_borrow.emp_no,ims_borrow.trans_date,ims_borrow.return_date, ims_storage.stor_id, pms_ris_req.req_item, pms_ris_req.req_desc, pms_ris_req.req_unit, ims_borrow.borrow_qty, pims_personnel.P_fname, 
	pims_personnel.P_lname, ims_borrow.borrow_date, ims_storage.p_code, ims_borrow.borrow_id FROM ims_borrow, pims_personnel, pms_po_con, pms_supplier, pms_pr_con, pms_ris_req, 
	ims_storage, pms_ris, pms_pr, pms_po, pms_iar, pms_iar_con WHERE pms_ris.ris_no=pms_ris_req.ris_no AND pms_ris_req.req_item_id=pms_pr_con.req_item_id 
	AND pms_pr.pr_no=pms_pr_con.pr_no AND pms_supplier.company_id=pms_po.company_id AND pms_po.po_no=pms_po_con.po_no AND pms_po_con.pr_id=pms_pr_con.pr_id 
	AND pms_iar.iar_no=pms_iar_con.iar_no AND pms_iar_con.po_id=pms_po_con.po_id AND pms_iar_con.iar_id=ims_storage.iar_id AND ims_borrow.emp_no=pims_personnel.emp_no 
	AND ims_storage.stor_id=ims_borrow.stor_id
	AND (CONCAT(P_lname,' ',P_fname) 
	LIKE '%".$valueToSearch."%' || CONCAT(P_fname,' ',P_lname) LIKE '%".$valueToSearch."%' )

	";
    $search_result = filterTable($query);
    

}
 else {
    $query="SELECT ims_borrow.emp_no,ims_borrow.trans_date,ims_borrow.return_date, ims_storage.stor_id, pms_ris_req.req_item, pms_ris_req.req_desc, pms_ris_req.req_unit, ims_borrow.borrow_qty, pims_personnel.P_fname, 
  pims_personnel.P_lname, ims_borrow.borrow_date, ims_storage.p_code, ims_borrow.borrow_id FROM ims_borrow, pims_personnel, pms_po_con, pms_supplier, pms_pr_con, pms_ris_req, 
  ims_storage, pms_ris, pms_pr, pms_po, pms_iar, pms_iar_con WHERE pms_ris.ris_no=pms_ris_req.ris_no AND pms_ris_req.req_item_id=pms_pr_con.req_item_id 
  AND pms_pr.pr_no=pms_pr_con.pr_no AND pms_supplier.company_id=pms_po.company_id AND pms_po.po_no=pms_po_con.po_no AND pms_po_con.pr_id=pms_pr_con.pr_id 
  AND pms_iar.iar_no=pms_iar_con.iar_no AND pms_iar_con.po_id=pms_po_con.po_id AND pms_iar_con.iar_id=ims_storage.iar_id AND ims_borrow.emp_no=pims_personnel.emp_no 
  AND ims_storage.stor_id=ims_borrow.stor_id";
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




    <head>
        <meta charset="UTF-8">
        <title>PAG-ASA National High School</title>
        <link href="http://fonts.googleapis.com/css?family=Dosis:400,500,700" rel="stylesheet" type="text/css">
        <link rel='stylesheet prefetch' href="../css/bootstrap.min.css">
        <link rel="icon" href="../img/pnhs_favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/w3.css">
        <link rel="stylesheet" href="../css/notif.css">

        <!-- MetisMenu CSS -->
        <link href="../vendor/dist/css/sb-admin-2.css" rel="stylesheet">
		
        <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css" type="text/css">
		
		<!-- Latest compiled and minified JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../vendor/jquery/jquery.min.js"></script>
		
		<style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
		
    </head>
    

<body>
<?php include("../topnav.php");?>    
<div id="wrapper">
        
    
         <!-- Sidebar -->
        <?php include("../sidenav.php");?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
			 
            <div class="container" style="margin-left: 60px">
                <br> <br> <br>
				<form>
					<input class="btn btn-primary btn" type="button" value="Go back" onclick="history.back()">
					</input>
				</form>
				<div class="row"> </br>
				<div class="col-lg-11">
				<div class="panel panel-default">         
				  <div class="panel-body">
				  <div class="col-lg-10">
					  <!-- Nav tabs -->
						
						</br>
						  <!-- Tab panes -->
						  

												<form action="equiphistory.php" method="post">
									            <input type="text" name="valueToSearch"  placeholder="Search Personnel">
									            <input class="btn btn-primary btn" type="submit" name="search" value="Search"><br><br>
									            <div class="panel-heading">
  								<br><br><br>
								<div class="container" style="margin-left: 30px"> 
								<div class="row">
									<div class="col-lg-9">
									   <div class="panel panel-default">
										  
											<!-- /.panel-heading -->
											<div class="panel-body">
											<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">



											<div class="table-responsive" id="tbExport">
											<td class='hide_all'><img src="..\img\deped.png" width="100" height="100"></td>
											
											<td class='hide_all'><center>REPUBLIC OF THE PHILIPPINES<br></center>
											<center>DEPARTMENT OF EDUCATION<br></center>
											<center>REGION V<br></center>
											<center>SCHOOLS DIVISION ON LEGAZPI CITY<br></center>
											<center>REPORT ON THE PHYSICAL COUNT OF PROPERTY, PLANT AND EQUIPMENT 
											</center></td>
											<td class='hide_all'><img src="..\img\pnhs_logo.jpg" width="100" height="100"></td>
											</div>
									            <table>
									                <tr>
									                    <th><center>Product Code</center></th>
									                    <th><center>Item Name</center></th>
									                    <th><center>Description</center></th>
                                      <th><center>Qty</center></th>
									                    <th><center>Issued</center></th>
									                    <th><center>Returned</center></th>
                                      <th><center>Transferred</center></th>
									                    <th><center>&nbsp;&nbsp;Liable&nbsp;&nbsp;</center></th>
									                </tr>





  
<?php while($row = mysqli_fetch_array($search_result)):
$en=$row['emp_no'];?>

                <tr>
                    <td><center><?php echo $row['p_code'];?></center></td>
                    <td><center><?php echo $row['req_item'];?></center></td>
                    <td><center><?php echo $row['req_desc'];?></center></td>
                    <td><center><?php echo $row['borrow_qty'];?></center></td>
                    <td><center><?php echo $row['borrow_date'];?></center></td>
                    <td><center><?php echo $row['return_date'];?></center></td>
                    <td><center><?php echo $row['trans_date'];?></center></td>
                    <td><center><?php echo $row['P_lname'],',',$row['P_fname'];?></center></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>


 


  



											</table>

											</div>
											</div>
											</div>
											<!-- /.table-responsive -->			
											
											<!-- /.panel-body -->
										</div></div> <center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<a  class="btn btn-outline btn-primary btn" href='equiphistory.php'>Back to Top</a></center><br>
									<!-- /.col-lg-12 -->
									</div> </div><center><a href='../fpdf/hspdf.php?pcode=<?php echo $en; ?>' class="btn btn-outline btn-primary btn"><h2><i class="fa fa-print">  Print</h2></i></a></center>
								</div>
								
							</div>
							
							</div>
					
						</div> 				
					<!-- /.tab-content -->	
				
				<!-- /.panel-body -->
				</div>  </br> <br>
				<!-- /.panel -->
				
	

		

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/alert.js"></script>
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script  src="../js/index.js"></script>
<script src="../js/metisMenu.min.js"></script>
<script src="../js/sb-admin-2.min.js"></script>



<script>
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>


	<script>
		$(document).ready(function() {
			$('#dataTables-example').DataTable({
				responsive: true
			});
		});
	</script>
	

<script src="../js/bootstrap.min.js"></script>
<script  src="../js/index.js"></script>
  
<!-- Footer -->
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