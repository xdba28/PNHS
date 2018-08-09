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
				<!--BODY CONTENT START-->
			  			<div class="container-fluid" style="height:700px;max-width:100%;margin-right:20px;margin-left:20px;margin-bottom:20">
        
						
				
			<div class="row">
		<div class="col-lg-12">
		<h3 class="page-header"><img  class="w3-hover-light-blue" style="border-radius: 50%;background-color: #fdfdfd " src="../assets/images/ph.png" width="35px"></i> <font size="6px" face="helvetica"><b>PhilHealth Contrbution Table</b></font></h3>
		</div>
			</div>
                <!--======== CONTENT STARTS HERE=============-->			
			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel1">
                            <img  class="w3-hover-light-blue" style="border-radius: 50%;background-color: #fdfdfd " src="../assets/images/ph.png" width="46px"><font size="6px" face="helvetica">PhilHealth Contribution Table</font>
							
							<a href="ph_table_edit.php" ><button style="float: right; margin-right: 10;" class="btn btn-success btn-lg" >EDIT</button></a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        
			

					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

								<thead>
								    <tr>
                                        <th><center>Bracket</center></th>
										<th><center>Salary Range</center></th>
                                        <th><center>Salary Base</center></th>
										<th><center>Total Monthly Premium</center></th>
										<th><center>Employee Share</center></th>
										<th><center>Employee Share</center></th>
									</tr>
                                </thead>
					<tbody>
     							
           <?php

			
			//view record	
			$qry = mysqli_query($mysqli,"SELECT * FROM  prs_philhealth");
						           
								   while ($row = mysqli_fetch_array($qry))
								   {
									
									$ph_id 						= $row['philhealth_id'];
									$ph_range_fr				= $row['ph_range_fr'];
									$ph_range_fr = number_format($ph_range_fr);
									$ph_range_to				= $row['ph_range_to'];
									$ph_range_to = number_format($ph_range_to);
									$ph_salary_base				= $row['ph_salary_base'];
									$ph_salary_base = number_format($ph_salary_base);
									$ph_total_monthly_premium 	= $row['ph_total_monthly_premium'];
									$ph_total_monthly_premium = number_format($ph_total_monthly_premium);
									$ph_employee_share			= $row['ph_employee_share'];
									$ph_employee_share1			= $row['ph_employee_share1'];
            ?>
								<tr class="gradeA">
                                        <td><center><?php echo $ph_id ?></center></td>
                                        
										<td><center><?php echo $ph_range_fr ?> - <?php echo $ph_range_to ?></center></td>
                                
										<td><center> <?php echo $ph_salary_base ?> </center></td>
								
										<td><center> <?php echo $ph_total_monthly_premium ?></center></td>
								
										<td><center> <?php echo $ph_employee_share ?> </center></td>
								
										<td><center> <?php echo $ph_employee_share1 ?> </center></td>
								
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
 

        <br>
       
         
	   
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
