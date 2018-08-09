<html lang="en" >
<?php 
    include("../func.php");
    include('../connection.php');
    include("../sesh.php");
	
	$qry= mysqli_query($mysqli,"SELECT  monthname(time_issued) as month FROM  prs_mtr group by monthname(time_issued)");
	$qry1= mysqli_query($mysqli,"SELECT year(date_import) as year FROM  prs_dtr_rec group by year(date_import)"); 
 
	
    
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
		<h3 class="page-header"><i class="fa fa-laptop"></i> SUMMARY REPORT</h3>
		</div>
			</div>


                <!--======== CONTENT STARTS HERE=============-->			
				
				       <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel1">
                           <div style="width: 30%;">
						   <label class="col-sm-4 control-label"><font face="helvetica" size="5px"><b>YEAR:</b></font></label>
										<div class="form-group input-group">
										
								<select id="year_list" onChange="getYear(this.value)" class="form-control" required>
								<option>Select Year</option>
								<?php
								$year="";
								 while($row=mysqli_fetch_assoc($qry1))
								 {	 
									 $year = $row['year'];
								?>
									<option value="<?php echo $year?>"><?php echo $year ?></option>
								 <?php }?>
								</select>
										</div>
							</div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

							    	<thead>
                                    <tr>
                                        <th><center>MONTH</center></th>
										<th><center>Total No. Of Recepients</center></th>
                                    </tr>
                                    </thead>
                                    <tbody id="month_list">
									<!--Body COntent here using Ajax-->
									</tbody>
                    </table>
                           <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
            </div>	
			
				<!--======== CONTENT ENDS HERE=============-->	

					
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

<script text="text/javascript" src="../jquery/jquery-migrate-1.4.1.js"></script>
	
	<script>
				function getYear(val)
				{
					 $.ajax({
						 type: "POST",
						 url: "getdata1.php",
						 data: 'year='+val,
						 success: function(data)
						 {
							 $("#month_list").html(data);
						 }
					 })
				}
				
	</script>
</body>

</html>
