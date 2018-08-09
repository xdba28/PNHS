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
				<br><br><br><br><br><br>
			   <div class="container-fluid" style="height:700px;max-width:100%;margin-right:20px;margin-left:20px;margin-bottom:10px">
        
		
                <!--======== CONTENT STARTS HERE=============-->
			<div class="row">
		
				<div class="a" style="position: fixed ; z-index: 100; top: 50px ; opacity: 0; width:1100px">
						<div class="panel-body" style="position: sticky;">
								<table   class="table table-striped table-bordered table-hover" style="background-color: white;">
							<thead>
									<tr>
                                        <!--th>Bracket</th-->
										<th style="border: 1px solid #fffefe;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Range From &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                        <th style="border: 1px solid #fffefe;">Range To&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
										<th style="border: 1px solid #fffefe;">Salary Base &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
										<th style="border: 1px solid #fffefe;">Total Monthly <br /> Premium&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
										<th style="border: 1px solid #fffefe;">Employee Share&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
										<th style="border: 1px solid #fffefe;">Employee Share&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
									 </tr>
							</thead>
								</table>
						</div>
		   		</div>
		
		
			<form method="post" action="functions/ph_update.php">
                <div class="col-lg-12">
                    <div class="panel panel-default" >
                        <div class="panel1">
                          <img  class="w3-hover-light-blue" style="border-radius: 50%;background-color: #fdfdfd " src="../assets/images/ph.png" width="46px"> <font face="helvetica" size="6px"> PhilHealth Contribution Table</font>
						  <div style="float: right; margin-top:12;">
						<a class="delete" data-toggle="modal" data-target="#popup1" style="top: 4">&nbsp;?&nbsp;</a>
						  </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        
		
						<center>
			<!--============START MODAL===============-->		
	   
	  
			<!-- this modal is for Philhealth -->
      <div class="modal fade" id="ph" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:18px 50px;">
			            
			  <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center"><b>ARE YOU SURE YOU WANT TO UPDATE PHILHEALTH TABLE?</b></h3>
				<font color="red" size="1">*Please check your inputs</font>
			</div>
            <div class="modal-body" style="padding:20px 50px;">

               <center>
			 <table>
		<tr>
			   <td> <button type="submit" name="submit1" class="btn btn-success btn-lg">YES</button></td>
			   <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <td>
			   <td>or</td>
			   <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <td>
					<td>
				<button type="submit" name="No" class="btn btn-danger btn-lg" data-dismiss="modal" title="Close">
			  <font><b>NO</b></font>
				</button>
					</td>
		</tr>
		</table>
			   </center>
					</div>
                </div>
            </div>
          </div> 
				<!--=======END MODAL========-->
			</center>
			
				<table width="100%" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
                                        <!--th>Bracket</th-->
										<th>Range From</th>
                                        <th>Range To</th>
										<th>Salary Base</th>
										<th>Total Monthly Premium</th>
										<th>Employee Share</th>
										<th>Employee Share</th>
									 </tr>
								</thead>
                                  <tbody>
     							
           <?php

			//database connection
			include('../connection.php');

			//view record	
			$qry = mysqli_query($mysqli,"SELECT * FROM  prs_philhealth");
						           
								   while ($row = mysqli_fetch_array($qry))
								   {
									
									$ph_id 						= $row['philhealth_id'];
									$ph_range_fr				= $row['ph_range_fr'];
									$ph_range_to				= $row['ph_range_to'];
									$ph_salary_base				= $row['ph_salary_base'];
									$ph_total_monthly_premium 	= $row['ph_total_monthly_premium'];
									$ph_employee_share			= $row['ph_employee_share'];
									$ph_employee_share1			= $row['ph_employee_share1'];
            ?>
								<tr class="gradeA">
								
										<input hidden name="ph_id[]" value="<?php echo $ph_id?>">
									
                                        <td><input type="text" class="form-control" name="ph_range_fr[]" value="<?php echo $ph_range_fr ?>"></td>
										
										<td><input type="text" class="form-control" name="ph_range_to[]" value="<?php echo $ph_range_to ?>"></td>
                                
										<td><input type="text" class="form-control" name="ph_salary_base[]" value="<?php echo $ph_salary_base ?>"></td>
								
										<td><input type="text" class="form-control" name="ph_total_monthly_premium[]" value="<?php echo $ph_total_monthly_premium ?>"></td>
								
										<td><input type="text" class="form-control" name="ph_share[]" value="<?php echo $ph_employee_share ?>"></td>
								
										<td><input type="text" class="form-control" name="ph_share1[]" value="<?php echo $ph_employee_share1 ?>"></td>
								
								</tr> 
                                	
                                <?php } ?>
								
								<div style="margin-bottom: 10px; margin-right:25px" align="right" >	<button  type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ph">UPDATE</button> </div>
                              </tbody>
                            
							</table>
                           <!-- /.table-responsive -->

                        </div>
                        <!-- /.panel-body -->
					</div>
            </div>
			</form>
            
			
 </div>
 
<a href="javascript:void(0);" id="scroll" title="Scroll to Top" style="display: none;">Top<span></span></a>

        <br>
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
<script type="text/javascript">
$(document).ready(function(){
    $(window).scroll(function(){
        if($(this).scrollTop() > 100){
            $('#scroll').fadeIn();
        }else{
            $('#scroll').fadeOut();
        }
    });
    $('#scroll').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });
});
     </script>

			<!--====Show Table Header when Scroll====-->
<script>
	$(window).scroll(function() {
if ($(this).scrollTop()>200)
     {
	  $('.a').css("opacity",1);
      $('.a').fadeIn();  
     }
    else
     {
      
     $('.a').fadeOut();
	 }
 });

</script>
	 
       
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
