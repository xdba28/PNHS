<!DOCTYPE html>
<html lang="en" >
<?php 
    include("../func.php");
    include('../connection.php');
    include("../sesh.php");
    $qry= mysqli_query($mysqli,"SELECT * FROM pims_personnel, pims_employment_records 
						Where pims_personnel.emp_No=pims_employment_records.emp_No
					")
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
			     
                <!--======== CONTENT STARTS HERE=============-->			
		 <div class="row">
			 <div class="col-lg-9" style="margin-left: 20px">
                    <div class="panel panel-default">
                        <div class="panel1">
                          <font face="helvetica" size="6px">  PERSONNEL LIST </font>
						</div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
            <form>
					<table width="95%" class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
                                    <tr>
									    <th><center><font size="4">Name</font></center></th>
										<th><center>Employee Type</center></th>
                                        <th><center>Action</center></th>
                                    </tr>
                                    </thead>
                                    <tbody>
     						
								<tr class="gradeA">
                                       <!--input hidden name="employee_id" id="employee_id" ></input-->
						<?php
							while($row= mysqli_fetch_assoc($qry))
							{
								$emp_No = $row['emp_No'];
								$fname = $row['P_fname'];
								$mname = $row['P_mname'];
								$lname = $row['P_lname'];
								$extension = $row['P_extension_name'];
								$role  = $row['faculty_type'];
								
							
								
						?>				
										<td><font face="helvetica" size="4px"><?php echo $lname ?>, <?php echo $fname ?> <?php echo $mname ?> <?php echo $extension ?>
						<?php				
						$new = mysqli_query($mysqli,"SELECT * FROM pims_personnel, prs_salary_record, prs_salary, prs_grade
															  where  pims_personnel.emp_No='$emp_No' 
															  AND pims_personnel.emp_No=prs_salary_record.emp_No
                                                              AND prs_grade.grade_id=prs_salary_record.grade_id
                                                              AND prs_salary.salary_id=prs_salary_record.salary_id");
											$new1=mysqli_num_rows($new);
											
						$infonew = mysqli_query($mysqli,"Select count(register) as counts from prs_add_info, pims_personnel where pims_personnel.emp_No=prs_add_info.emp_No and pims_personnel.emp_No='$emp_No'");
						$inforow = mysqli_fetch_assoc($infonew);
						$infonum = $inforow['counts'];
											if($new1 == 0 && $infonum == 0)
											{
					     ?>
										<font size="2" style="color: red; text-shadow: 2px 2px #a99e9e"><b>NEW</b></font>
											<?php } elseif($new1 == 0) { ?>
												<img src="../assets/images/purple.png" style="width: 20px;height: 20px;border-radius: 50%;">
											<?php }  elseif ($infonum == 0){ ?>
												<img src="../assets/images/blue.png" style="width: 20px;height: 20px;border-radius: 50%;">
											<?php } ?>
										</font>
										</td>
                        				
										<td><center><font face="helvetica" size="4px"><?php echo $role ?></font></center></td>
                                        
								<td align="center">
						         <a class="btn btn-primary"  href="profile.php?emp_id=<?php echo $row["emp_No"]; ?>">View Account</a>
                                </td>
							    </tr> 
								
						 <?php } ?>        
                          
                              </tbody>
                            
							</table>
                           <!-- /.table-responsive -->
</form>
                        </div>
                        <!-- /.panel-body -->
                    </div>
            </div>	
			
			<div class="col-md-2" style="float: right;">
				<div   class="panel1" style="position: fixed; padding: 5px">
					
					<font>New Employee: </font>
					<font size="2" style="color: red; text-shadow: 2px 2px #a99e9e"><b>NEW</b></font>
						<br />
					<font>Basic Salary :</font>
					<img src="../assets/images/purple.png" style=" width: 20px;height: 20px;border-radius: 50%;">
						<br />
					<font>Tax Information :</font>
					<img src="../assets/images/blue.png" style=" width: 20px;height: 20px;border-radius: 50%;">
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
    
<?php include("../include/bottomscript.php");?>
       
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>
  <?php 
            if(isset($_GET['gen'])){
                if($_GET['gen']=="1"){
                    echo "<script>$('#generatelast').modal('show');</script>";
                }else if($_GET['gen']=="2"){
                    echo "<script>$('#generatelast').modal('show');</script>";
                }
            }
    ?>
 
</body>

</html>
