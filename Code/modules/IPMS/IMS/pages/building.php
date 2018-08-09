<!DOCTYPE html>
<html lang="en" >
<?php 
    include("../db/dbcon.php");
    include("../session.php");




?>
<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query="SELECT *
	FROM ims_facility
	WHERE CONCAT(fac_type,fund_source,specfic_fund,fac_storey,num_rooms,year_completed) 
	LIKE '%".$valueToSearch."%'
	";
    $search_result = filterTable($query);
    

}
 else {
    $query="SELECT *
	FROM ims_facility";
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
    <link rel="icon" href="../img/pnhs_favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/w3.css">
    <link rel="stylesheet" href="../css/notif.css">
	
	<!-- MetisMenu CSS -->
    <link href="../vendor/dist/css/sb-admin-2.css" rel="stylesheet">
	
	<!-- Icons CSS -->
    <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css" type="text/css">
	
	<!-- DataTables CSS -->
	<link href="../css/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
		<link href="../css/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

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
					
						<div class="panel-heading">

								<br>		
								<div class="form-group">
								 &nbsp;<a href="bldgadd.php" class="btn btn-primary btn">Add New Building</a>
								</div>  
									<div class="container"><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									Pag-asa National High School</h3>
									<h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<p class="fa fa-building-o">Buildings</p></h3><br> 
									</div>
						
						<!-- /.panel-heading -->	
						<div class="row">
							<div class="col-lg-12">
							<div class="panel panel-default">
						<div class="panel-body">
							
								<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
									<thead class="w3-theme-bd4">
										<tr>
									                    <th><center>#</center></th>
									                    <th><center>Building/Structure Type</center></th>
									                    <th><center>Fund Source</center></th>
									                    <th><center>Specific Fund Source</center></th>
									                    <th><center>Number of Storeys</center></th>
									                    <th><center>Number of Rooms by Design/Intent</center></th>
									                    <th><center>Year Completed</center></th>
									                    <th><center>Building/Structure Dimension (WxL)</center></th>
									                    <th><center>Action</center></th>
									    </tr>

									</thead>



								<tbody>
								<?php while($row = mysqli_fetch_array($search_result)):?>
												<tr>
													<td><center><?php echo $row['fac_id'];?></center></td>
													<td><center><?php echo $row['fac_type'];?></center></td>
													<td><center><?php echo $row['fund_source'];?></center></td>
													<td><center><?php echo $row['specfic_fund'];?></center></td>
													<td><center><?php echo $row['fac_storey'];?></center></td>
													<td><center><?php echo $row['num_rooms'];?></center></td>
													<td><center><?php echo $row['year_completed'];?></center></td>
													<td><center><?php echo $row['dimension'];?></center></td>
													<td><br><center><a class="btn btn-primary btn" href='edit.php?id=<?php echo $row['fac_id']; ?>'>Update</a></center></td>

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
				</div>	
				</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a class="btn btn-outline btn-primary btn" href="building.php">Back to Top</a><br><br><br>
			</div> <br> <br>
		</div>
	</div>


<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/alert.js"></script>
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../js/backToTop.js"></script>
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