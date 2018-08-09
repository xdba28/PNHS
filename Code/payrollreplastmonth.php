<!DOCTYPE html>
<html lang="en" >
<?php 
    include("../func.php");
    include('../connection.php');
    include("../sesh.php");
	include("session.php");
    $prevmonthsnamelastpayroll = date('F', strtotime('-1 months'));
	$prevmonthlastpayroll = date('m', strtotime('-1 months'));
	$prevyearlastpayroll = date('Y', strtotime('-1 months'));
    
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
			  				<div class="row" >
   
   
		<div class="col-lg-12 col-md-9 col-sm-9">
        <div class="container-fluid" style="height:auto;min-height:700px;max-width:100%;margin-right:20px;margin-left:20px;margin-bottom:10px">
        
		
		<!--============START MODAL===============-->		 
	  <!-- this modal is for GENERATE PAY -->
      <center>
	  <div class="modal fade" id="printrec" role="dialog" style="top: 100;">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content" style="width: 400;" >
            <div class="modal-header" style="padding:10px 20px;">
				<button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
				
            </div>
            <div class="modal-body" style="padding:20px 40px;">

							<table class="table">
								<thead>
                                    <tr>
										<th><center>TABLE</center></th>
										<th><center>PAYROLL REGISTER</center></th>
										<th><center>PAYSLIP</center></th>
									</tr>
                                </thead>
                            <tbody>
								<tr>
									<td><center><a href="paytableB.php" target="_blank"><img src="../assets/images/payslip3.png" width="55px"></a></center></td>
									<td><center><a href="registryA.php" target="_blank"><img src="../assets/images/payslip2.png" width="55px"></a></center></td>
									<td><center><a href="printA.php" target="_blank"><img src="../assets/images/payslip1.png" width="55px"></a></center></td>
								</tr>
							</tbody>
						</table>
            </div>
          </div>
              
        </div>
      </div>
	  </center>
	<!--=======END MODAL========-->
		
		
						
					<div class="col-lg-12">
				<h3 class="page-header"> <img  class="w3-hover-light-blue" style="margin-right: 2;border-radius: 50%;background-color: #fdfdfd " src="../assets/images/report.png" width="50px"><font size="6px" face="helvetica"><b><?php echo $prevmonthsnamelastpayroll;?> Payroll Report </b></font>
				</h3>
					</div>
		        
     			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel1">
                           <font size="6px" face="helvetica"><?php echo $prevmonthsnamelastpayroll;?> Pay's Report </font>
							<div  style="margin-right:20px; float:right;" data-toggle="modal" data-target="#printrec" ><img src="..\assets\images\print.png"  class="img-circle w3-hover-light-blue" width="40" style="background-color:white;" align="center"></div>
                        </div>
						<!-- /.panel-heading -->
						
							
                    
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
					
                                        <th>Name</th>
										<th>Date Issued</th>
										<th>Gross Pay</th>
                                        <th>Late Cost</th>
										<th>GSIS</th>
                                        <th>PhilHealth</th>
                                        <th>PAGIBIG</th>
										<th>Total Loan</th>
                                        <th>Total Deduction</th>
										<th>Taxes</th>
										<th>Net Pay</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 
                                    
                             <?php 
							$querylastpayroll= mysqli_query($mysqli," SELECT * FROM pims_personnel, prs_report
												WHERE pims_personnel.emp_No=prs_report.emp_No AND
												month(prs_report.date_issued) = '$prevmonthlastpayroll'
												AND year(prs_report.date_issued) = '$prevyearlastpayroll'
											 ");
							while($row=mysql_fetch_assoc($querylastpayroll))
							{
								$fname     = $row['P_fname'];
								$mname     = $row['P_mname'];
								$lname 	   = $row['P_lname'];
								$extension = $row['P_extension_name'];
								$basic_pay 	   = $row['rep_basic_pay'];
								$basic_pay = number_format($basic_pay,2);
								$allowance	   = $row['rep_allowance'];
								$allowance = number_format($allowance,2);
								$grosspay	   = $row['rep_gross_pay'];
								$grosspay = number_format($grosspay,2);
								$netpay		   = $row['rep_net_pay'];
								$netpay = number_format($netpay,2);
								$date_issued   = $row['date_issued'];
								$date_issued = date("F j, Y");
								$ph        = $row['total_ph'];
								$ph = number_format($ph,2);
								$pi 	   = $row['rep_pi_total'];
								$pi = number_format($pi,2);
								$gsis      = $row['total_gsis'];
								$gsis = number_format($gsis,2);
								$tax       = $row['total_tax'];
								$tax = number_format($tax,2);
								$deduction = $row['total_deduction'];
								$deduction = number_format($deduction,2);
								$loan	   = $row['loan'];
								$loan = number_format($loan,2);
								$absent_cost = $row['absent_cost'];
								$absent_cost = number_format($absent_cost,2);
								
					?>          <tr class="gradeA">
									    <td><?php echo $lname ?>, <?php echo $fname ?> <?php echo $mname ?> <?php echo $extension ?></td>
										<td><?php echo $date_issued ?></td>
										<td><?php echo $grosspay ?></td>
										<td><?php echo $absent_cost ?></td>
                                        <td><?php echo $gsis ?></td>
                                        <td><?php echo $ph ?></td>
                                        <td><?php echo $pi ?></td>
										<td><?php echo $loan ?></td>
                                        <td><?php echo $deduction ?></td>
										<td><?php echo $tax ?></td>
										<td><?php echo $netpay ?></td>
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
		  </div>
                
		
		

        <br>
       
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
