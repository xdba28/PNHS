<!DOCTYPE html>
<html lang="en" >
<?php 
    include("../func.php");
    include('../connection.php');
    include("../sesh.php");
?>
            <?php include("../include/headlink.php");?>
<body>

            <?php include("../include/topnav.php");?>
      <div id="wrapper">
    
        <!-- Sidebar -->
        <?php include("../include/sidenav.php");?>
        <!-- /#sidebar-wrapper -->

            <div class="container"><br><br><br><br>
			<div class="container-fluid" style="height:auto;min-height:700px;max-width:100%;margin-right:20px;margin-left:20px;margin-bottom:10px">

			<div class="row">
		<div class="col-lg-12">
		<h3 class="page-header"><img  class="w3-hover-light-blue" style="margin-right: 2;border-radius: 50%;background-color: #fdfdfd " src="../assets/images/setting.png" width="46px"><font size="6"><b>MTR IMPORT</b></font></h3>
	 	</div>
			</div>
			
			<div class="col-md-8">		
				<div class="panel panel-primary" style="width:700px;" >
                        <div class="panel1">
                            <img  class="w3-hover-light-blue" style="margin-right: 2;border-radius: 50%;background-color: #fdfdfd " src="../assets/images/setting.png" width="40px">
							<font size="4"><b>IMPORT MTR</b></font>
                        </div>
					<form class ="" enctype="multipart/form-data" method="POST" action="import.php" role="form">
                        <div class="panel-body">
                           <center>
						   <table>
									<tbody>
									<tr>
									<td><input class="form-control"  name="xls_file" type="file" accept=".xls"/></td>
									<td>&nbsp;&nbsp;&nbsp;<button  type="submit" class="btn btn-hovers btn-primary" name="upload">Upload</button></td>
									</tr>
									</tbody>
						   </table>
						   </center>
						</div>
					</form>
				</div>
			</div>	
					
			<div class="col-md-3">
				<div class="panel panel-primary" style="width:300px;" >
                        <div class="panel1">
                            <img  class="w3-hover-light-blue" style="margin-right: 2;border-radius: 50%;background-color: #fdfdfd " src="../assets/images/excel.png" width="40px">
							<font size="4"><b>Download Excel File</b></font>
                        </div>
					    <div class="panel-body">
                           <center>
						   <table>
									<tbody>
									<td><a href="excel/download.php?link=MTRxlsformat.xls"><button  class="btn btn-hovers btn-primary" name="upload">DOWNLOAD FILE</button></a></td>
									
									</tbody>
						   </table>
						   </center>
						</div>
				</div>
			</div>
			  <div class="col-md-12">
			  <br><br><br>
			  </div>
		        <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel1">
                           <font face="helvetica" size="5px">Monthly Time Records</font><a href="dtr.php" target="_new"><img  class="w3-hover-light-blue" style="margin-right: 2;border-radius: 50%;background-color: #fdfdfd; float:right; margin-right: 50px; " src="../assets/images/print.png" width="50px"></a>
                        </div>
						<!-- /.panel-heading -->
						<div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                   <tr>
										<th>Name</th>
										<th>Department</th>
										<th>Late Times</th>
										<th>Late Minute</th>
										<th>Action</th>
                                    </tr>
							    </thead>
                                <tbody>
                            		 <?php
										$showmtr = mysqli_query($mysqli,"SELECT * FROM prs_dtr_rec  where 
										month(date_import)=month(now()) and year(date_import)=year(now())  order by personnel ASC");
										while($mtrrow = mysqli_fetch_assoc($showmtr))
										{
											$personnel = $mtrrow['personnel'];
											$department = $mtrrow['department'];
											$late_min = $mtrrow['late_min'];
											$late_times = $mtrrow['late_times'];
											$personnel_id = $mtrrow['personnel_id'];
									?>			
                               <tr class="gradeA">
							    <td><center><?php echo $personnel; ?></center></td>
								<td><center><?php echo $department; ?></center></td>
								<td><center><?php echo $late_times; ?></center></td>
								<td><center><?php echo $late_min; ?></center></td>
								<td><center><a href="viewrecord.php?id=<?php echo $personnel_id;?>"><button class="btn btn-hovers btn-primary"> View All Record</button></a></center></td>
						       </tr> 
									<?php } ?>
								</tbody>
                            </table>
                            <!-- /.table-responsive -->

                        </div>
                        <!-- /.panel-body -->
                    </div>
				</div>
			
			  
			  
			  
			  
				<!--BODY CONTENT END-->
            </div>
			</div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <!-- /#page-content-wrapper -->
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
<?php include("../include/bottomscript.php");?>     
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>
</body>

</html>
