<!DOCTYPE html>
<html lang="en" >
<?php 
    include("../db/dbcon.php");
    include("../session.php");






if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];

    $query="SELECT DISTINCT pms_iar_con.received_qty,pims_personnel.P_lname,pims_personnel.P_fname,pms_po.po_no,pms_supplier.company_name,pms_iar_con.iar_id,pms_ris_req.req_item, pms_ris_req.req_desc, pms_iar.iar_no, pms_iar.iar_status, pms_iar.received_date, pms_ris.emp_no,pms_iar_con.inserted,pms_iar_con.status FROM pms_ris, pms_ris_req, pms_iar, pms_pr, pms_pr_con, pms_iar_con,pms_po_con,pms_po, pims_personnel, pms_supplier
                                    WHERE pms_ris.ris_no = pms_ris_req.ris_no
                                    AND pms_ris.emp_no = pims_personnel.emp_no
                                    AND pms_ris.ris_no = pms_ris_req.ris_no
                                    AND pms_ris_req.req_item_id = pms_pr_con.req_item_id
                                    AND pms_pr.pr_no = pms_pr_con.pr_no
                                    AND pms_pr_con.pr_id = pms_po_con.pr_id
                                    AND pms_po_con.po_id = pms_iar_con.po_id
                                    AND pms_po.po_no=pms_po_con.po_no
                                    AND pms_po.company_id = pms_supplier.company_id
                                    AND pms_iar.iar_no = pms_iar_con.iar_no
                                    AND pms_iar.iar_status= 'Complete' 
                                    AND pms_iar_con.inserted= '0' 
                                    AND pms_iar_con.status= 'COMPLETE'
                                    AND (CONCAT(P_lname,' ',P_fname) 
									LIKE '%".$valueToSearch."%' || CONCAT(P_fname,' ',P_lname) LIKE '%".$valueToSearch."%' )
	";
    $search_result = filterTable($query);
	
    }
 else {
   $query="SELECT DISTINCT pms_iar_con.received_qty,pims_personnel.P_lname,pims_personnel.P_fname,pms_po.po_no,pms_supplier.company_name,pms_iar_con.iar_id,pms_ris_req.req_item, pms_ris_req.req_desc, pms_iar.iar_no, pms_iar.iar_status, pms_iar.received_date, pms_ris.emp_no,pms_iar_con.inserted,pms_iar_con.status FROM pms_ris, pms_ris_req, pms_iar, pms_pr, pms_pr_con, pms_iar_con,pms_po_con,pms_po, pims_personnel, pms_supplier
                                    WHERE pms_ris.ris_no = pms_ris_req.ris_no
                                    AND pms_ris.emp_no = pims_personnel.emp_no
                                    AND pms_ris.ris_no = pms_ris_req.ris_no
                                    AND pms_ris_req.req_item_id = pms_pr_con.req_item_id
                                    AND pms_pr.pr_no = pms_pr_con.pr_no
                                    AND pms_pr_con.pr_id = pms_po_con.pr_id
                                    AND pms_po_con.po_id = pms_iar_con.po_id
                                    AND pms_po.po_no=pms_po_con.po_no
                                    AND pms_po.company_id = pms_supplier.company_id
                                    AND pms_iar.iar_no = pms_iar_con.iar_no
                                    AND pms_iar.iar_status= 'Complete' 
                                    AND pms_iar_con.inserted= '0' 
                                    AND pms_iar_con.status= 'COMPLETE'";
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
    <link rel='stylesheet prefetch' href='../css/bootstrap.min.css'>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/w3.css">
    <link rel="stylesheet" href="../css/notif.css">

    <!-- MetisMenu CSS -->
    <link href="../vendor/dist/css/sb-admin-2.css" rel="stylesheet">
	
	<!-- Icons CSS -->
    <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css" type="text/css">
	
	<!-- DataTables CSS -->
	<link href="../css/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
	
    <!-- DataTables Responsive CSS -->
    <link href="../css/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
	
	<!-- Latest compiled and minified JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    
  <style>
    
	.table table-striped table-bordered table-hover{
		border: 2px solid #003E7C;
	}
	.table, thead, tbody, tr, td, th{
		border: 2px solid #003E7C;
		text-align: center;
	}
	table, td, th{
		border: 2px solid #003E7C;
		text-align: center;
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
                <br> <br>
                    
				<form>  
					<input class="btn btn-primary btn" type="button" value="Go back" onclick="history.back()">
					</input>

				</form> 
			
			<div class="row"> </br>
				<div class="col-lg-11">
					<div class="panel panel-default">
					
						<div class="panel-heading w3-theme-bdark">

								<h3><p class="fa fa-file-text-o">&nbsp;&nbsp;Inspect Items</p></h3>  
							</div>

										
								
									            <div class="panel-heading">
									</div>
						
						<!-- /.panel-heading -->	
						<div class="row">
							<div class="col-lg-12">
							<div class="panel">
						<div class="panel-body">
							
								<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
									<thead class="w3-theme-bd4">
										<tr>
														<th><center>Requested By</center></th>
									                    <th><center>Supplier</center></th>
									                    <th><center>Date Received</center></th>
									                    <th><center>Quantity</center></th>
									                    <th><center>Item Name</center></th>
									                    <th><center>Description</center></th>
									                    <th><center>Action</center></th>
									    </tr>

									</thead>



								<tbody>
								<?php while($row = mysqli_fetch_array($search_result)):?>
												<tr>
													<td><br><center><?php echo $row['P_lname'],',',$row['P_fname'];?></center></td>
													<td><br><center><?php echo $row['company_name'];?></center></td>
													<td><br><center><?php echo $row['received_date'];?></center></td>
													<td><br><center><?php echo $row['received_qty'];?></center></td>
													<td><br><center><?php echo $row['req_item'];?></center></td>
													<td><br><center><?php echo $row['req_desc'];?></center></td>
													<td><br><center><a class="btn btn-outline btn-primary btn" href='add.php?id=<?php echo $row['iar_id']; ?>'>Update</a></center><br></td>

												</tr>
												<?php endwhile;?>
										
								</tbody>
								</table>
							</div>
							<!-- /.panel-body -->
							</div>
							<!-- /.col-lg-6 -->
						</div> 
						<!-- /.row --> 
					</div>
						<!-- /.container -->
				</div>  <br>	
				</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a class="btn btn-outline btn-primary btn" href="inspection.php">Back to Top</a><br><br>
			</div> <br> <br> 
		</div>
	</div>
</div>


<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/alert.js"></script>
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script  src="../js/index.js"></script>
<script src="../js/metisMenu.min.js"></script>
<script src="../js/sb-admin-2.min.js"></script>

<!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>


<!-- DataTables JavaScript -->
   
	<script>
		$(document).ready(function() {
			$('#dataTables-example').DataTable({
				responsive: true
			});
		}); 
		
	</script>

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