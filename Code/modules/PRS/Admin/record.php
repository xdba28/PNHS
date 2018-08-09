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

            <div class="container">
				<!--BODY CONTENT START--><br><br><br><br>
			  
	   <div class="container-fluid" style="height:700px;max-width:100%;margin-right:20px;margin-left:20px;margin-bottom:10px">
        	
			<div class="row">
		<div class="col-lg-12">
		<h3 class="page-header"><img  class="w3-hover-light-blue" style="margin-right: 2;border-radius: 50%;background-color: #fdfdfd " src="../assets/images/tablem.png" width="46px"><font face="helvetica" size="6px">REPORTS</b></font></h3>
	 		</div>
			</div>

                <!--======== CONTENT STARTS HERE=============-->			
			
				 <div class="col-lg-12">
			 
			 <!--    NAV BAR    -->
			 <div class="panel panel-default" style="width:300px;  height: auto; float: left; margin-right:10px;" >
                   <div style="size="10px" class="panelh2">
                            <i style="margin-left: 2.5px; size: 10px;"class="fa fa-file fa-fw"></i><b><font face="helvetica" size="5px">Saved Reports</font></b>
                        </div>
                        <!-- /.panel-heading -->
                        
						
						
						<div class="panel-body" style="width:300px; float: left; height:auto;">
                            <div class="list-group" style="height:auto;">
                                <h3>Payroll</h3>
								
								<a href="#slip" data-toggle="tab" class="list-group-item">
                                    <i class="fa fa-circle-o fa-fw"></i> <b>Payroll Slip</b>
                                    <span class="pull-right text-muted small">
									</span>
                                </a>
								
								<a href="#table" data-toggle="tab" class="list-group-item">
                                    <i class="fa fa-circle-o fa-fw"></i> <b>Payroll Table</b>
                                    <span class="pull-right text-muted small">
									</span>
                                </a>
								
								<a href="#register" data-toggle="tab" class="list-group-item">
                                    <i class="fa fa-circle-o fa-fw"></i> <b>Payroll Register</b>
                                    <span class="pull-right text-muted small">
									</span>
                                </a>
								
								<h3>Tables</h3>
                                <a href="#bir" data-toggle="tab" class="list-group-item">
                                    <i class="fa fa-circle-o fa-fw"></i> <b>Tax Table</b>
                                    <span class="pull-right text-muted small">
									</span>
                                </a>
								
								<a href="#ph" data-toggle="tab" class="list-group-item">
                                    <i class="fa fa-circle-o fa-fw"></i> <b>PhilHealth</b>
                                    <span class="pull-right text-muted small">
									</span>
                                </a>
								
								<a href="#memo" data-toggle="tab" class="list-group-item">
                                    <i class="fa fa-circle-o fa-fw"></i> <b>Salary Memo</b>
                                    <span class="pull-right text-muted small">
									</span>
                                </a>
								
								
                            </div>
                            <!-- /.list-group -->
                            
                        </div>
                        <!-- /.panel-body -->
                        <!-- /.panel-body -->
					</div>
				
			 
			 <!--  NAV BAR END --->
			 
				<div class="panel panel-default" style="width:700px; float: left; position: static">
                        <div class="panel-body">
								<!--TAB CONTENT-->	
								  <div class="tab-content">
								
                             <!--=== Payroll slip Tab ===-->

							<div class="tab-pane fade in active" id="slip">
								<div class="panel1">
									<img  class="w3-hover-light-blue" style="margin-right: 2;border-radius: 50%;background-color: #fdfdfd " src="../assets/images/payslip2.png" width="46px"> <font face="helvetica" size="5px">Payroll Slip</font>
								</div>
							
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Filename</th>
                                        <th>Date Created</th>
										<th>Action</th>
								    </tr>
                                </thead>
                                
								<tbody id="allowance_list">
                                
								
                                        
										<?php
										$query = mysqli_query($mysqli,"Select * FROM prs_save_report where type='Slip'");
										 while($row=mysqli_fetch_array($query))
										 {
											 $today = date("F d Y", strtotime($row['date_create']));
										?>
										<tr  class="gradeA">
										<td><?php echo $row['filename']; ?></td>
										<td><center><?php echo $today;   ?></center></td>
										<td><center><a href="download.php?file=<?php echo urlencode($row['file_location']); ?>"><img  class="w3-hover-light-blue" style="margin-right: 2;border-radius: 50%;background-color: #fdfdfd " src="../assets/images/download.png" width="30px"></a></center></td>
										 </tr>
										 <?php } ?>
                                    
                                    </tbody>
                            </table>
							</div>
							
                                </div>
								<!--  End Payroll Tab -->
								
								 <!--=== Payroll slip Tab ===-->

							<div class="tab-pane fade in" id="table">
								<div class="panel1">
									<img  class="w3-hover-light-blue" style="margin-right: 2;border-radius: 50%;background-color: #fdfdfd " src="../assets/images/tablet.png" width="46px"> <font face="helvetica" size="5px">Payroll Table</font>
								</div>
							
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example1">
                                <thead>
                                    <tr>
                                        <th>Filename</th>
                                        <th>Date Created</th>
										<th>Action</th>
								    </tr>
                                </thead>
                                
								<tbody>
                                
								
                                        
										<?php
										$query = mysqli_query($mysqli,"Select * FROM prs_save_report where type='table'");
										 while($row=mysqli_fetch_array($query))
										 {
											 $today = date("F d Y", strtotime($row['date_create']));
										?>
										<tr  class="gradeA">
										<td><?php echo $row['filename']; ?></td>
										<td><center><?php echo $today;   ?></center></td>
										<td><center><a href="download.php?file=<?php echo urlencode($row['file_location']); ?>"><img  class="w3-hover-light-blue" style="margin-right: 2;border-radius: 50%;background-color: #fdfdfd " src="../assets/images/download.png" width="30px"></a></center></td>
										 </tr>
										 <?php } ?>
                                    
                                    </tbody>
                            </table>
							</div>
							
                                </div>
								<!--  End Payroll Tab -->
										
								 <!--=== Payroll slip Tab ===-->

							<div class="tab-pane fade in" id="register">
								<div class="panel1">
									<img  class="w3-hover-light-blue" style="margin-right: 2;border-radius: 50%;background-color: #fdfdfd " src="../assets/images/cheque.png" width="46px"> <font face="helvetica" size="5px">Payroll Registry</font>
								</div>
							
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example2">
                                <thead>
                                    <tr>
                                        <th>Filename</th>
                                        <th>Date Created</th>
										<th>Action</th>
								    </tr>
                                </thead>
                                
								<tbody>
                                
								
                                        
										<?php
										$query = mysqli_query($mysqli,"Select * FROM prs_save_report where type='registry'");
										 while($row=mysqli_fetch_array($query))
										 {
											 $today = date("F d Y", strtotime($row['date_create']));
										?>
										<tr  class="gradeA">
										<td><?php echo $row['filename']; ?></td>
										<td><center><?php echo $today;   ?></center></td>
										<td><center><a href="download.php?file=<?php echo urlencode($row['file_location']); ?>"><img  class="w3-hover-light-blue" style="margin-right: 2;border-radius: 50%;background-color: #fdfdfd " src="../assets/images/download.png" width="30px"></a></center></td>
										 </tr>
										 <?php } ?>
                                    
                                    </tbody>
                            </table>
							</div>
							
                                </div>
								<!--  End Payroll Tab -->
										
										 <!--=== Payroll Tax Tab ===-->

							<div class="tab-pane fade in" id="bir">
								<div class="panel1">
									<img  class="w3-hover-light-blue" style="margin-right: 2;border-radius: 50%;background-color: #fdfdfd " src="../assets/images/tablet.png" width="46px"> <font face="helvetica" size="5px">BIR TAX TABLE</font>
								</div>
							
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example3">
                                <thead>
                                    <tr>
                                        <th>Filename</th>
                                        <th>Date Created</th>
										<th>Action</th>
								    </tr>
                                </thead>
                                
								<tbody>
                                
								
                                        
										<?php
										$query = mysqli_query($mysqli,"Select * FROM prs_save_report where type='taxtable'");
										 while($row=mysqli_fetch_array($query))
										 {
											 $today = date("F d Y", strtotime($row['date_create']));
										?>
										<tr  class="gradeA">
										<td><?php echo $row['filename']; ?></td>
										<td><center><?php echo $today;   ?></center></td>
										<td><center><a href="download.php?file=<?php echo urlencode($row['file_location']); ?>"><img  class="w3-hover-light-blue" style="margin-right: 2;border-radius: 50%;background-color: #fdfdfd " src="../assets/images/download.png" width="30px"></a></center></td>
										 </tr>
										 <?php } ?>
                                    
                                    </tbody>
                            </table>
							</div>
							
                                </div>
								<!--  End Tax Tab -->
								
										 <!--=== Payroll PhilHealth Tab ===-->

							<div class="tab-pane fade in" id="ph">
								<div class="panel1">
									<img  class="w3-hover-light-blue" style="margin-right: 2;border-radius: 50%;background-color: #fdfdfd " src="../assets/images/tablet.png" width="46px"> <font face="helvetica" size="5px">PhilHealth Table</font>
								</div>
							
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example4">
                                <thead>
                                    <tr>
                                        <th>Filename</th>
                                        <th>Date Created</th>
										<th>Action</th>
								    </tr>
                                </thead>
                                
								<tbody>
                                
								
                                        
										<?php
										$query = mysqli_query($mysqli,"Select * FROM prs_save_report where type='phtable' order by date_create ASC");
										 while($row=mysqli_fetch_array($query))
										 {
											 $today = date("F d Y", strtotime($row['date_create']));
										?>
										<tr  class="gradeA">
										<td><?php echo $row['filename']; ?></td>
										<td><center><?php echo $today;   ?></center></td>
										<td><center><a href="download.php?file=<?php echo urlencode($row['file_location']); ?>"><img  class="w3-hover-light-blue" style="margin-right: 2;border-radius: 50%;background-color: #fdfdfd " src="../assets/images/download.png" width="30px"></a></center></td>
										 </tr>
										 <?php } ?>
                                    
                                    </tbody>
                            </table>
							</div>
							
                                </div>
								<!--  End PH Tab -->
								
								<!--=== Payroll Salary Memo Table Tab ===-->

							<div class="tab-pane fade in" id="memo">
								<div class="panel1">
									<img  class="w3-hover-light-blue" style="margin-right: 2;border-radius: 50%;background-color: #fdfdfd " src="../assets/images/tablet.png" width="46px"> <font face="helvetica" size="5px">PhilHealth Table</font>
								</div>
							
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example5">
                                <thead>
                                    <tr>
                                        <th>Filename</th>
                                        <th>Date Created</th>
										<th>Action</th>
								    </tr>
                                </thead>
                                
								<tbody>
                                
								
                                        
										<?php
										$query = mysqli_query($mysqli,"Select * FROM prs_save_report where type='salarymemotable' order by date_create ASC");
										 while($row=mysqli_fetch_array($query))
										 {
											 $today = date("F d Y", strtotime($row['date_create']));
										?>
										<tr  class="gradeA">
										<td><?php echo $row['filename']; ?></td>
										<td><center><?php echo $today;   ?></center></td>
										<td><center><a href="download.php?file=<?php echo urlencode($row['file_location']); ?>"><img  class="w3-hover-light-blue" style="margin-right: 2;border-radius: 50%;background-color: #fdfdfd " src="../assets/images/download.png" width="30px"></a></center></td>
										 </tr>
										 <?php } ?>
                                    
                                    </tbody>
                            </table>
							</div>
							
                                </div>
								<!--  End PH Tab -->
								
								
								
								
								<!--tab content End-->	
								  </div>
								<!---END--->
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
				
				
				
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
<script>
    $(document).ready(function() {
        $('#dataTables-example1').DataTable({
            responsive: true
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#dataTables-example2').DataTable({
            responsive: true
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#dataTables-example3').DataTable({
            responsive: true
        });
    });
</script>	
<script>
    $(document).ready(function() {
        $('#dataTables-example4').DataTable({
            responsive: true
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#dataTables-example5').DataTable({
            responsive: true
        });
    });
</script>

</script>


</body>

</html>
