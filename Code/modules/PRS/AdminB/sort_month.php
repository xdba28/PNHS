<!DOCTYPE html>
<html lang="en" >
<?php 
    include("../func.php");
    include('../connection.php');
    include("../sesh.php");
   
	$months = $_GET['month'];
	$years = $_GET['year'];		

?>
            <?php include("../include/headlink.php");?>
<body>

            <?php include("../include/topnav.php");?>
      <div id="wrapper">
    
        <!-- Sidebar -->
        <?php include("../include/sidenav.php");?>
        <!-- /#sidebar-wrapper -->

            <div class="container"><br><br><br><br>
				<!--BODY CONTENT START-->
						
				<div class="col-lg-12">
		 <h3 class="page-header"><i class="fa fa-laptop"></i> MTR Reports</h3>
			
				</div>
		        
     			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel1">
                           <font face="helvetica" size="5px"> MTR For The Month Of <?php echo $months;?> <?php echo $years;?> </font>
                        </div>
						<!-- /.panel-heading -->
					<div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
									<tr>
									 <th colspan="7"></th>
									 <th colspan="2"><center>Overtime</center></th>
									 <th colspan="2"><center>Late</center></th>
									 <th colspan="2"><center>Leave Early</center></th>
									 <th></th>
									</tr>
									<tr>
										<th>Name</th>
										<th>Department</th>
										<th>Date Import</th>
										<th>Absent Day</th>
										<th>AFL day</th>
										<th>Out Day</th>
										<th>Onduty Day</th>
										<th>Workday</th>
										<th>Holiday</th>
										<th>Times</th>
										<th>Min.</th>
										<th>Times</th>
										<th>Min.</th>
										<th>Action</th>
									</tr>
                                </thead>
							    
                                <tbody>
                            		 <?php
								$selectrecord = mysqli_query($mysqli,"SELECT * FROM prs_dtr_rec  where 
										monthname(date_import)='$months' and year(date_import)='$years'") or die("error!");
									while($recordrow = mysqli_fetch_assoc($selectrecord)){
										$personnel = $recordrow['personnel'];
										$department = $recordrow['department'];
										$absent_day = $recordrow['absent_day'];
										$afl_day = $recordrow['afl_day'];
										$out_day = $recordrow['out_day'];
										$onduty_day = $recordrow['onduty_day'];
										$ot_workday = $recordrow['ot_workday'];
										$ot_holiday = $recordrow['ot_holiday'];
										$late_times = $recordrow['late_times'];
										$late_min = $recordrow['late_min'];
										$le_times = $recordrow['le_times'];
										$le_min = $recordrow['le_min'];
										$date_import = date("F j Y", strtotime($recordrow['date_import']));
											
											
									?>			
                               <tr class="gradeA">
							<td><?php echo $personnel;?></td>
							<td><?php echo $department;?></td>
							<td><?php echo $date_import?></td>
							<td><?php echo $absent_day;?></td>
							<td><?php echo $afl_day;?></td>
							<td><?php echo $out_day;?></td>
							<td><?php echo $onduty_day;?></td>
							<td><?php echo $ot_workday;?></td>
							<td><?php echo $ot_holiday;?></td>
							<td><?php echo $late_times;?></td>
							<td><?php echo $late_min;?></td>
							<td><?php echo $le_times;?></td>
							<td><?php echo $le_min;?></td>
							<td><center><a href=""><button class="btn btn-hovers btn-primary">Print</button></a></center></td>
							 </tr> 
									<?php } ?>
								</tbody>
                            </table>
                            <!-- /.table-responsive -->

                        </div>
                        <!-- /.panel-body -->
                    </div>
				</div>
			 </div>
		  
				<!--BODY CONTENT END-->
            </div>
            <br><br><br><br><br><br><br><br>
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
