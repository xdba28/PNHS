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
		<div class="container-fluid" style="height:700px;max-width:100%;margin-right:20px;margin-left:20px;margin-bottom:10px">
        
		
	
			<div class="row">
		<div class="col-lg-12">
		<h3 class="page-header"> <img style="border-radius: 50%;background-color: #fdfdfd " src="../assets/images/tax1.png" width="46px"><font size="6px" face="helvetica"><b>TAX TABLE</b></font></h3>
	 	</div> 
			</div>

					<br>

                <!--======== CONTENT STARTS HERE=============-->			
		
			<div class="row" style=" margin-left: 50px">
			
			<form method="post" action="functions/taxupdate.php">
                <div class="col-lg-12">
                    <div class="panel panel-default" >
                        <div class="panel1" >
                            <img   style="border-radius: 50%;background-color: #fdfdfd " src="../assets/images/tax1.png" width="46px"><font size="6px" face="helvetica">TAX TABLE</font> 
						<a href="taxedit.php"><button type="submit" name="submit" class="btn btn-primary btn-lg" style="float: right;margin-right: 15;"> UPDATE</button></a>
						</div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        
			
				
					<table width="100%" class="table table-striped table-bordered table-hover">

										<thead>
								<tr>
									
									<th>
										<p><center>Monthly</center></p>
										<p  style="border-top-style: solid; border-width: 2;"><center>Exemption</center></p>
										<p><center>Percentage</center></p>
									</th>
									
									
									<?php 
									$stat = mysqli_query ($mysqli,"Select * from prs_stat_ex group by number asc");
									while($statrow = mysqli_fetch_assoc($stat))
										{
											$stat_id = $statrow['stat_id'];
											$exemption = $statrow['exemption'];
											$percentage = $statrow['percentage'];
											$number = $statrow['number'];
									?>
									<th>
										<p><center><?php echo $number;?></center></p>
										<input hidden name="number[]" value="<?php echo $number;?>">
										<input hidden name="stat_id[]" value="<?php echo $stat_id;?>">
										<p><input class="form-control" name="exemption[]" value="<?php echo $exemption;?>"></p>
										<p><input class="form-control" name="percentage[]" value="<?php echo $percentage;?>"></p>
									</th>	
										<?php } ?>
									
								</tr>
										</thead>
                                
									<tbody>
     							
								<?php
								$taxname = mysqli_query($mysqli,"Select * from  prs_withholding_tax ");
								
								$tax_name="";
								while ($taxnamerow=mysqli_fetch_assoc($taxname))
									{
										$tax_name = $taxnamerow['tax_name'];
								?>
								<tr>
									<input hidden name="name[]" value="<?php echo $tax_name;?>">
									<td><center><?php echo $tax_name; ?></center></td>
								
								
								<?php 
									$taxselect = mysqli_query($mysqli,"select * from prs_withholding_tax, prs_tax_amount, prs_stat_ex
																where prs_stat_ex.stat_id=prs_tax_amount.stat_id and prs_withholding_tax.tax_id=prs_tax_amount.tax_id
																and prs_withholding_tax.tax_name='$tax_name'   ");
												while($taxselectrow = mysqli_fetch_assoc($taxselect))
												{
													$tax_amount = $taxselectrow['amount_fr'];
													$id = $taxselectrow['id'];
								?>
									<input hidden name="id[]" value="<?php echo $id;?>">
									<td><input class="form-control" name="amount[]" value="<?php echo $tax_amount;?>"></td>
												<?php }?>
								
								</tr>
								<?php }?>		
								
									</tbody>
                            </table>
                         <!-- /.table-responsive -->

                        </div>
                        <!-- /.panel-body -->
                    </div>
            </div>
			</form>
            </div>


        <br>
       
         
	   
    </div>				<!--BODY CONTENT START-->
			  
			  
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
