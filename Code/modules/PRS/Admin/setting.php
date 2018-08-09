<!DOCTYPE html>
<html lang="en" >
<?php 
    include("../func.php");
    include('../connection.php');
    include("../sesh.php");
		//Get Info Contribution
	$contriget = mysqli_query($mysqli,"SELECT prs_gsis.gsis_percentage as percentage, prs_gsis.gsis_id as gsis_id, prs_pagibig.pagibig_id as pagibig_id ,prs_pagibig.pi_amount as amount FROM prs_gsis, prs_pagibig");
	$contcount = mysqli_num_rows($contriget);
	$controw=mysqli_fetch_assoc($contriget);
	$percentage = $controw['percentage'];
	$amount = $controw['amount'];
	$gsis_id = $controw['gsis_id'];
	$pagibig_id = $controw['pagibig_id'];
	
	$per = "%";

    
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
		<h3 class="page-header"><img  class="w3-hover-light-blue" style="margin-right: 2;border-radius: 50%;background-color: #fdfdfd " src="../assets/images/setting.png" width="46px">SETTINGS</h3>
	 	</div>
			</div>


                <!--======== CONTENT STARTS HERE=============-->			
			 
			 			
			 <div class="col-lg-12">
                   <div class="panel panel-primary" style="width:700px; float:left;">
                        <div class="panel1">
                            <img  class="w3-hover-light-blue" style="margin-right: 2;border-radius: 50%;background-color: #fdfdfd " src="../assets/images/setting.png" width="40px">
							<font size="4"><b>SETTINGS</b></font>
                        </div>
                        <div class="panel-body">
                           <table>
									<tbody>
									<form method="post" action="functions/allowanceupdate.php">
									<tr>
									<td><b>Allowance:&nbsp;</b></td>
									<?php
										 $qry1 = mysqli_query($mysqli,"SELECT * FROM prs_allowance");
										 $num = mysqli_num_rows($qry1);
   
										while($row1 = mysqli_fetch_assoc($qry1))
										{
											$allowance = $row1['allowance'];
										}

									
										 if($num > 0)
										 {
									?>
									<td><input class="form-control" type="text" name="allowance" value="<?php echo $allowance;?>" required></td>
									<?php } else{?>
									
									<td><input class="form-control" type="text" name="allowance" placeholder="Insert Allowance"  required></td>
									<?php }?>

									<td>&nbsp;<button type="submit" name="allowancesubmit" class="btn btn-primary">Update</button></td>
									</tr>
									</form>
									
									</tbody>
						   </table>

                        </div>
						
                        
						
						<div class="divdivflat">
									<table>
							<tbody>
								<h4><font size="5"><b>SALARY MEMO</b></font></h4>

									<form method="post" action="functions/salmemoupdate.php">
								<tr>
										<td><b>Salary Memo:</b></td>
									<td>
									
										<select class="form-control" style="width:200px;" name="memo">
										<?php 
											$memo =mysqli_query ($mysqli,"Select * FROM prs_salary_memo");
												while($memorow=mysqli_fetch_assoc($memo))
												{
													$memoid = $memorow['sal_memo_id'];
													$memos = $memorow['salary_memo'];
										?>
                                                <option value="<?php echo $memoid; ?>"><?php echo $memos; ?></option>
										<?php } ?>
										</select>
									</td>
									<td>&nbsp;<button type="submit" name="memosubmit" class="btn btn-primary">Update</button></td>
								&nbsp;&nbsp; 
								<?php 
										$saldate = mysqli_query($mysqli,"SELECT * FROM prs_setting where special_attribute='Salary Memo' group by date_change DESC LIMIT 1 ");
										$saldaterow = mysqli_fetch_assoc($saldate);
											$changes = $saldaterow['changes'];
											$salname = $saldaterow['name_setting'];
											$salchange = date("m-d-Y", strtotime($saldaterow['date_change']));
										
								?>
										
								</tr>
								<font size="1" color="red">*Last Updated: <?php echo $salname ?> <?php echo $changes ?> | <?php echo $salchange ?> </font>
										</form>
							</tbody>
									</table>
						
						</div>
						<div class="divdivflat">
						<h4><font size="5"><b>Contribution</b></font></h4>
						 <blockquote>
                            <table>
									<tbody>
									<form method="post" action="functions/contriupdate.php">
									
									
									
									<?php 
									if($num > 0)
									{
							?>		
									<tr><td> &nbsp </td><td style="border-style: outset;border-color: #48a5f1;"><center><label class=" control-label">GSIS</td></label></center> </tr>
									<tr>
										<td><center><img src="..\assets\images\gsis.png"  width="55" />&nbsp&nbsp </center></td>
											<input hidden name="gsis_id" value="<?php echo $gsis_id;?>">
										<td><input class="form-control" type="text" name="gsis" value="<?php echo $percentage."%";?>"></td>
									</tr>
									<tr>
										<td>&nbsp;</td>
									</tr>
									<tr>
										<tr><td> &nbsp </td><td style="border-style: outset;border-color: #48a5f1;"><center> <label class=" control-label">PAGIBIG</td></label></center> </tr>
											<td><center><img src="..\assets\images\pibig.png"  width="55" /> &nbsp&nbsp</center></td> 
											<input hidden name="pagibig_id" value="<?php echo $pagibig_id;?>">
											<td><input class="form-control" name="pi" type="text" value="<?php echo $amount;?>"></td>
									</tr>
									<?php } else{?>
									
									<tr><td> &nbsp </td><td style="border-style: outset;border-color: #48a5f1;"><center><label class=" control-label">GSIS</td></label></center> </tr>
									<tr>
										<td><center><img src="..\assets\images\gsis.png"  width="55" />&nbsp&nbsp </center></td>
										
										<td><input class="form-control" type="text" name="gsis" value="" placeholder="GSIS PERCENTAGE"></td>
									</tr>
									<tr>
										<td>&nbsp;</td>
									</tr>
									<tr>
										<tr><td> &nbsp </td><td style="border-style: outset;border-color: #48a5f1;"><center> <label class=" control-label">PAGIBIG</td></label></center> </tr>
											<td><center><img src="..\assets\images\pibig.png"  width="55" /> &nbsp&nbsp</center></td> 
											<td><input class="form-control" name="pi" type="text" value="" placeholder="PAGIBIG AMOUNT"></td>
									</tr>
									
									<?php } ?>
								</tbody>
									</table>
									
									 <div class="panel-body">
                            <!-- Button trigger modal -->
                            <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i>
							<button class="btn btn-primary btn-lg" type="submit" name="submit1">
                                UPDATE
                            </button>
									
									
									</form>
									</tbody>
									</table>
						</blockquote>
				</div>
						</div>
						
						<!--====SIDEBAR TAB===-->
						
						<div class="panel-body" style="width:300px; float: right;">
                            <div class="list-group">
                                <a href="ph_table_edit.php" class="list-group-item">
                                    <i class="fa fa-table fa-fw"></i> PhilHealth
                                    
                                </a>
                                <a href="taxedit.php" class="list-group-item">
                                    <i class="fa fa-table fa-fw"></i> Tax (BIR)
                                    
                                </a>
                                <a href="salmemedit.php" class="list-group-item">
                                    <i class="fa fa-table fa-fw"></i> Salary Memo
                                   
                                </a>
                            </div>
						</div>

						<div>
							<div class="panel-body" style="width:300px; float: right;">
                           <b><i class="fa fa-long-arrow-right fa-fw"></i>REDIRECTION</b>
						   <div class="list-group">
                                <a target="_new" href="https://www.philhealth.gov.ph/partners/employers/contri_tbl.html
" class="list-group-item">
                                    <i class="fa fa-external-link fa-fw"></i> PhilHealth
                                    
                                </a>
                                <a target="_new" href="https://www.bir.gov.ph/index.php/tax-information/withholding-tax.html" class="list-group-item">
                                    <i class="fa fa-external-link fa-fw"></i> Tax (BIR)
                                    
                                </a>
                                <a target="_new" href="salmemedit.php" class="list-group-item">
                                    <i class="fa fa-external-link fa-fw"></i> Salary Memo
                                   
                                </a>
                            </div>
							</div>
						</div>
					</div>
			 </div>
			
			<!--======== CONTENT ENDS HERE=============-->		
       
         </div>
			  
				<!--BODY CONTENT END-->
            
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
