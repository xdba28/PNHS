<!DOCTYPE html>
<html lang="en" >
<?php 
    include("../func.php");
    include('../connection.php');
    include("../sesh.php");
	
	 $emp_No = $_GET['emp_id'];
				
				$qry = mysqli_query($mysqli,"SELECT * FROM pims_personnel,  pims_employment_records, pims_job_title, pims_department
									Where pims_personnel.emp_No= '$emp_No' AND
									pims_personnel.emp_No=pims_employment_records.emp_No AND
									pims_department.dept_ID=pims_employment_records.dept_ID	AND
                                    pims_job_title.job_title_code=pims_employment_records.job_title_code ");
									
				$qry1= mysqli_query($mysqli,"SELECT * FROM pims_personnel, prs_loan
									Where pims_personnel.emp_No= '$emp_No' AND
								    pims_personnel.emp_No=prs_loan.emp_no");
				
				
				$qry2 = mysqli_query($mysqli,"SELECT * FROM pims_personnel, pims_employment_records, pims_job_title, pims_department
									Where pims_personnel.emp_No= '$emp_No' AND
									pims_personnel.emp_No=pims_employment_records.emp_No AND
									pims_department.dept_ID=pims_employment_records.dept_ID	AND
                                    pims_job_title.job_title_code=pims_employment_records.job_title_code 
										");
				
				//OUTPUT SALARY: CHECKING
				$qry15 =mysqli_query($mysqli,"SELECT * FROM pims_personnel, prs_salary_record , prs_allowance, prs_salary where pims_personnel.emp_No = '$emp_No' AND pims_personnel.emp_No=prs_salary_record.emp_No AND prs_salary.salary_id=prs_salary_record.salary_id ");
					$row15 = mysqli_num_rows($qry15);
					
				// FOR CHECKING
				$qry4 = mysqli_query($mysqli,"SELECT * FROM pims_personnel, prs_report
									Where pims_personnel.emp_No= '$emp_No' AND
									pims_personnel.emp_No=prs_report.emp_No AND
									month(prs_report.date_issued) = month(now()) 
									");
						$row14 = mysqli_num_rows($qry4);

				//getting personnel step
				$qry11= mysqli_query($mysqli,"select  * from pims_personnel, pims_employment_records, pims_job_title, prs_grade, prs_salary
												Where pims_personnel.emp_No='$emp_No'
												AND pims_personnel.emp_No=pims_employment_records.emp_No
												AND pims_job_title.job_title_code=pims_employment_records.job_title_code 
												AND pims_job_title.job_title_code=prs_grade.job_title_code 
												AND prs_grade.grade_id=prs_salary.grade_id");
			
    
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
			  <div class="row">
		<div class="col-lg-12">
		<h3 class="page-header"><img   style="border-radius: 50%;background-color: #fdfdfd " src="../assets/images/profile.png" width="46px"> Profile</h3>
	 <ol class="breadcrumb">
	<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
	<li><i class="fa fa-laptop"></i><a href="employee.php">Employee</a></li>
	<li><i class="fa fa-user"></i>Profile</li>						
	 </ol>
		</div>
			</div>			
				
<div class="panel panel-default">
                       
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#profile" data-toggle="tab">Profile</a>
                                </li>
                                <li><a href="#loan" data-toggle="tab">Manage Loan</a>
                                </li>
                                <li><a href="#salary" data-toggle="tab">Manage Pay Info</a>
                                </li>
								<li><a href="#add" data-toggle="tab">Additional Information</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                
								<!--====PROFILE=====-->
                                <br>
                                <div class="tab-pane fade in active" id="profile">
							
						<div  class="col-lg-4  col-md-5">
						<?php
									while($row=mysqli_fetch_assoc($qry))
									{
										$fname = $row['P_fname'];
										$mname = $row['P_mname'];
										$lname = $row['P_lname'];
										$extension = $row['P_extension_name'];
										$jobcode   = $row['job_title_code'];
										$jobname   = $row['job_title_name'];
										$deptname = $row['dept_name'];
										
							?>
						   <div class="" style="  height: 400px; width: 300px; background-color:rgba(53, 109, 154, 0.81); width:auto; max-width:100%;border-left-style: solid;
							border-color: rgba(253, 228, 0, 0.78);">
							<br>
							<center><img src="../assets/images/users/5.jpg" class="img-circle" width="150" style="margin-bottom: 20px;"/> 
							  <br>
							  
								<h4 class="card-title m-t-10" style="font-family:Segoe UI,Arial,sans-serif;"><b><?php echo $fname." ".$mname." ".$lname." ".$extension; ?></b></h4>
								<h6 class="card-subtitle"><?php echo $deptname ?></h6>
                                    <div class="row text-center justify-content-md-center">
										<div class="col-4"><i class="icon-people"></i> <font class="font-medium"><?php echo $jobcode." ".$jobname ?></font></div>
                                    </div>
							</center>
							   <br>
							</div>
							<?php } ?>
						</div>
					
                 
					<!--===================-->
                    <!--=== SALARY INFO ===-->
							<div class="col-lg-8  col-md-7">
						<h3><i class="fa fa-user"></i> Profile </h3> 

    
						<div class="well" style="border-left-style: groove;background-color: rgba(208, 209, 210, 0.21);border-left-color: #fde400;
    border-left-width: 2;">
                        
						<table>
						<!--========================================================================================-->	
							<!--TO BE EDITED-->
							<tbody>
								<?php
								if(!empty($row15))
								{
								
								while($row16=mysqli_fetch_assoc($qry15))
								{
								$salary2 = $row16['amount'];
								$salary2 = number_format($salary2,2);
								$allowance2 = $row16['allowance'];
								$allowance2 = number_format($allowance2,2);
								
								
								?>
								
								
								<tr>
								<label class="col-sm-4 control-label">BASIC PAY</label>
                                     <div class="form-group input-group">                           
                                            <input type="text" class="form-control"  value="<?php echo $salary2?>" readonly>
											
                                     </div>
								</tr>
									
								<tr>
								<label class="col-sm-4 control-label">ALLOWANCE</label>
                                    <div class="form-group input-group">                           
                                            <input type="text" class="form-control" value="<?php echo $allowance2?>" readonly>
                                    </div>
								</tr>
								
								
								
								<?php
									}
								}
								else{
								?>	
								
								<center>
								
								<p class="w3-hover-light-blue"  style="border-style: dotted; margin-bottom: 5;text-shadow: 2px 2px #a99e9e"><font size="5" color="red">SETUP THE GRADE/STEP &nbsp;
								<a style="height: 16px; width: 50px;color: white;border: 2px solid white;border-radius: 50%;line-height: 14px;box-shadow: 0 0 3px #444;box-sizing: content-box;background-color: #2431b5;" href="#salary" data-toggle="tab">&nbsp;?&nbsp;</a></font><p>
                                     
								</center>
								
								
								<?php }?>
								
								
								
								<?php
									if (!empty($row14)){
											$qry3 = mysqli_query($mysqli,"SELECT * FROM pims_personnel, prs_report
									Where pims_personnel.emp_No= '$emp_No' AND
									pims_personnel.emp_No=prs_report.emp_No AND
									month(prs_report.date_issued) = month(now()) 
									");
									
									while ($row3=mysqli_fetch_assoc($qry3))
									{
										$basicpay = $row3['rep_basic_pay'];
										$basicpay = number_format($basicpay,2);
										$allowance = $row3['rep_allowance'];
										$allowance = number_format($allowance,2);
										$netpay = $row3['rep_net_pay'];
										$netpay = number_format($netpay,2);
										$ph     = $row3['total_ph'];
										$ph = number_format($ph,2);
										$pi	    = $row3['rep_pi_total'];
										$pi = number_format($pi,2);
										$gsis   = $row3['total_gsis'];
										$gsis = number_format($gsis,2);
										$loan   = $row3['loan'];
										$loan = number_format($loan,2);
										$cost   = $row3['absent_cost'];
										$cost = number_format($cost,2);
									?>
									
									<tr>
								<label class="col-sm-4 control-label">ABSENT COST</label>
                                    <div class="form-group input-group">                           
                                            <input type="text" class="form-control" value="<?php echo $cost?>" readonly>
                                    </div>
								</tr>
									
								<tr>
								<label class="col-sm-4 control-label">GSIS CONTRIBUTION</label>
                                    <div class="form-group input-group">                           
                                            <input type="text" class="form-control" value="<?php echo $gsis?>" readonly>
                                    </div>
								</tr>
								
								<tr>								
								<label class="col-sm-4 control-label">PAGIBIG</label>
                                    <div class="form-group input-group">                           
                                            <input type="text" class="form-control" value="<?php echo $pi?>" readonly>
                                    </div>
								</tr>
								
								<tr>
								<label class="col-sm-4 control-label">PHILHEALTH</label>
                                    <div class="form-group input-group">                           
                                            <input type="text" class="form-control" value="<?php echo $ph?>" readonly>
                                    </div>
								</tr>
								
								<tr>
								<label class="col-sm-4 control-label">TOTAL LOAN</label>
                                    <div class="form-group input-group">                
										<?php $getloantotalamount = mysqli_query($mysqli,"SELECT sum(prs_loan.loan_amount) as amounttotal1 FROM pims_personnel, prs_loan
																				Where pims_personnel.emp_No= '$emp_No' AND
																				pims_personnel.emp_No=prs_loan.emp_no AND
																				prs_loan.loan_status='ONGOING'");
												$showtotalloan = mysqli_fetch_assoc($getloantotalamount); ?>
                                            <input type="text" class="form-control" value="<?php echo $showtotalloan['amounttotal1'];?>" readonly>
                                    </div>
								</tr>
									
								<?php		
									}} else{
								?>	
								
							<center>
								<p class="w3-hover-light-blue" style="border-style: dotted; text-shadow: 2px 2px #a99e9e"><font size="5" color="red">Incomplete Data &nbsp;
							<a style="height: 16px; width: 50px;color: white;border: 2px solid white;border-radius: 50%;line-height: 14px;box-shadow: 0 0 3px #444;box-sizing: content-box;background-color: #2431b5;" data-toggle="modal" data-target="#popup1">&nbsp;?&nbsp;</a>
								</font><p>
                                </center>
								
								<!--============START MODAL===============-->		
									<!-- this modal is for GENERATE PAY -->
							<center>
							<div class="modal fade" id="popup1" role="dialog" style="top:130;">
								<div class="modal-dialog">
        
										<!-- Modal content-->
						<div class="modal-content" style="width: 400;background-color: rgb(222, 215, 249);">
						<div class="modal-header" style="padding:10px 50px;">
					<button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
						</div>
					<div class="modal-body" style="padding:20px 50px;">

					<p>*Payroll hasn’t been generated for this month.</p>
			   
					</div>
						</div>
              
								</div>
						  </div> 
							</center>
									<!--=======END MODAL========-->
	
								
								<?php }?>
								
								
								</tbody>							
						</table>
							
							</div>

							</div>
								
                            </div>
									
									
									<!--==PROFILE END==-->	
								
					 <!--==================-->		
						<!--====LOAN====-->
						
						<div class="tab-pane fade" id="loan">
                               					
				<p><font size="6"><img src="..\assets\images\loan1.png"  width="50" /><b>Loan</b></font></p>
                      
                    <div class="well col-lg-9" style="width:95%; margin-left:22; border-left-color: yellow;
						border-left-style: groove;border-left-width: 2;background-color:rgba(69, 138, 193, 0.44)"> 

							<div class="panel-body" >
						<form method="post" action="functions/loansubmit.php">		
                                <table class="table">
								<caption><center><label class="control-label"><font size="5" color="black" style="border-top-style: dotted;border-bottom-style: dotted">ADD LOAN</font></label><center></caption>
										<input hidden name="emp_id" value="<?php echo $emp_No?>" >
                                        <tr>
                                        <td><label class="col-sm-4 control-label">LOAN NAME</label>
                                        <div class="form-group input-group">                           
                                            <input type="text" name="loanname" class="form-control" placeholder="ENTER LOAN NAME" required>
										</div></td>
										
										<td><label class="col-sm-4 control-label">Monthly Deduction</label>
                                        <div class="form-group input-group">                           
                                            <input type="text" name="loanamount" class="form-control" placeholder="ENTER AMOUNT" required>
										</div></td>
                                        </tr>
										
                                        <tr>
										<td><h3><b>DATE</b><h3></td>
										<td>&nbsp;</td>
										<tr>
                                       
 
                                        <tr>
                                       <td><label class="col-sm-4 control-label">START</label>
                                        <div class="form-group input-group">                           
                                            <input type="date" name="start" class="form-control" required>
										</div></td>
										
										<td><label class="col-sm-4 control-label">END</label>
                                        <div class="form-group input-group">                           
                                            <input type="date" name="end" class="form-control" required>
										</div></td>
                                        </tr>
 
                                </table>
								
								<center><button type="submit" name="submit" class="btn btn-primary">ADD LOAN</button></center>
								
                        </form>
						</div>
						
						</div>

				<br>
			
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel1">
                           LOAN RECORDS
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Loan Name</th>
										<th>AMOUNT</th>
										<th>DATE START</th>
                                        <th>DATE END</th>
                                        <th>STATUS</th>
								   </tr>
                                </thead>
								
                                <tbody>
                      <?php
						while($row1=mysqli_fetch_assoc($qry1))
						{
								$loanname = $row1['loan_name'];
								$amount = $row1['loan_amount'];
								$amount = number_format($amount,2);
								$start = $row1['date_start'];
								$end = $row1['date_end'];
								$status = $row1['loan_status'];
								
								$status0 = 'ONGOING';
								$status1 = 'PAID';
								
						
							
								if($status==$status0)
								{
					  
					  ?>
                                    
									<tr class="gradeA">
										<td><?php echo $loanname?></td>
                                        <td><?php echo $amount?></td>
										<td><?php echo $start?></td>
                                        <td><?php echo $end?></td>
										<td><?php echo $status?></td>
									</tr>
                              <?php  }  
							  elseif($status == $status1)
							  {
							  ?> 
								
								
									<tr class="gradeC">
                                        <td><?php echo $loanname?></td>
                                        <td><?php echo $amount?></td>
										<td><?php echo $start?></td>
                                        <td><?php echo $end?></td>
										<td><?php echo $status?></td>
									</tr>
									

						<?php		} ?>
							
						<?php } ?>    
                                    
                                    
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->

                        </div>
                        <!-- /.panel-body -->
                    </div>
            </div>
                                </div>
                               <!--===LOAN END===-->
							   
				   	<!--===========================--> 
							<!--==SALARY START==-->
							<div class="tab-pane fade" id="salary">
								<div class="well" style="border-color: azure;border-left-style: groove;border-left-color: rgba(253, 228, 0, 0.34);border-left-width: 3;background-color: rgba(100, 181, 247, 0.42);" >
								<div style="width:auto">
								<center>
								<div class="well" style="width: 95%; background-color:rgba(69, 138, 193, 0.44);" >	
									
									<table class="table">
										
										<?php
									  $qry10= mysqli_query($mysqli,"select   pims_job_title.job_title_name as job_title ,pims_job_title.job_title_code as code
												from pims_personnel, pims_employment_records, pims_job_title
												Where pims_personnel.emp_No='$emp_No'
												AND pims_personnel.emp_No=pims_employment_records.emp_No
												AND pims_job_title.job_title_code=pims_employment_records.job_title_code 
												
												");
								
								while($row10=mysqli_fetch_assoc($qry10))
								{
									$position = $row10['job_title'];
									$code = $row10['code'];
									
									?>
									 
									 
									 <input hidden name="id" value="$emp_No">
									 
									<tr>
									 <td>
									 <label class="col-sm-4 ">POSITION: </label>
										<div class="form-group input-group">                           
											<input type="text" name="position" class="form-control" value="<?php echo $position?>" readonly>
										</div>
									</td>
									<td> <label class="col-sm-4 ">Code: </label>
										<div class="form-group input-group">                           
											<input type="text" name="position" class="form-control" value="<?php echo $code?>" readonly>
										</div>
									</td>
									</tr>
									
									<tr>
									 
										<?php } ?>
									
									<?php
										$qry13 = mysqli_query($mysqli,"SELECT prs_salary.step as step, prs_grade.grade as grade, prs_salary_record.sal_rec_ID as sal_rec FROM pims_personnel, prs_salary_record, prs_salary, prs_grade
															  where  pims_personnel.emp_No='$emp_No' 
															  AND pims_personnel.emp_No=prs_salary_record.emp_No
                                                              AND prs_grade.grade_id=prs_salary_record.grade_id
                                                              AND prs_salary.salary_id=prs_salary_record.salary_id
															");
										$row15 = mysqli_num_rows($qry13);
										
										$salary_rec="";
										
										if(!empty($row15))
										{
											
											while($row13=mysqli_fetch_assoc($qry13))
											{
													$salary_rec =$row13['sal_rec'];
													$step13 = $row13['step'];
													$grade13 = $row13['grade'];
							
									?>
									
									<td> <label class="col-sm-4 control-label">GRADE: </label>
										<div class="form-group input-group">                           
											<input type="text" name="position" class="form-control" value="<?php echo $grade13?>" readonly>
										</div> 
									</td>
									
									<td> <label class="col-sm-4 control-label">STEP: </label>
										<div class="form-group input-group">                           
											<input type="text" name="position" class="form-control" value="<?php echo $step13?>" readonly>
										</div> 
									</td>
									
									<?php
											}
										} else {?>
									
									<center><font size="4" color="red"> *GRADE AND STEP IS NOT YET SETUP </font></center>
									
										<?php } ?>
									</tr>
									
									</table>
									
									<br>
									
									<form method="post" action="functions/stepupdate.php">
									<table class="table">
									
				<caption style="margin-bottom:10px"><center><b><font size="6" color="black" >MANAGE GRADE/STEP</font></b></center></caption>
									
									<tr>
									<td>
									
									<input hidden name="emp_id" value="<?php echo $emp_No?>">
									<input hidden name="sal_id" value="<?php echo $salary_rec?>">
									
										<label class="col-sm-4 control-label">GRADE:</label>
                                        <div class="form-group input-group">                           
                                           <select name="grade" id="grade_list" onChange="getGrade(this.value)"  required>
										   
										   <option value=""> SELECT GRADE</option>
								
							<?php		$saldate = mysqli_query($mysqli,"SELECT * FROM prs_setting where special_attribute='Salary Memo' group by date_change DESC LIMIT 1 ");
										$saldaterow = mysqli_fetch_assoc($saldate);
										$changes = $saldaterow['changes'];
											
											 ?>
								
								<?php
									$qry12=mysqli_query($mysqli,"Select * from prs_grade  group by prs_grade.grade_id asc");
									while($row12=mysqli_fetch_array($qry12))
									{
										$grade_id = $row12['grade_id'];
										$grade = $row12['grade'];
								?>
										  
										  <option value="<?php echo $grade_id; ?>"><?php echo $grade; ?></option>
										
									<?php } ?>		   
										   </select>
										</div>
									</td>
								
									<td>		
											<label class="col-sm-4 control-label">STEP:</label>
										<div class="form-group input-group">
											<select id="step_list" name="step" class="form-control">
												
												
													
											</select>
										</div>
									</td>

								   
									</tr>
									
									<tr>
									<td> &nbsp </td>
									<td> <button  type="submit" name="submit3" class="btn btn-primary btn-lg">UPDATE</button> </td>
									</tr>
									
									</table>
									</form>
								</div>
								</center>
								</div>
								</div>
							  </div>
							  
                       
							 <!--==SALARY END==-->
								
							<!--===ADD INFO START===-->	
									<div class="tab-pane fade" id="add">
								<div class="well"  >
								
								
								<?php
								$add_infoview = mysqli_query($mysqli,"SELECT count(prs_add_info.emp_No) as count FROM prs_add_info where prs_add_info.emp_No='$emp_No'");
								$add_inforow = mysqli_fetch_assoc ($add_infoview);
								$add_infonum = $add_inforow['count'];
								
								if($add_infonum > 0)
								{
								?>                                  
								<div class="col-lg-12" style="border-color: azure;border-left-style: groove;border-left-color: rgba(253, 228, 0, 0.34);border-left-width: 3;background-color: white;">
								<table class="table">
										<caption><h2>Personal Information<h2><caption>
									
									<?php
									$spouseview = mysqli_query($mysqli,"select * from prs_add_info, prs_civil_status, pims_personnel 
																where pims_personnel.emp_No='$emp_No' and prs_civil_status.civil_id=prs_add_info.civil_id
																and pims_personnel.emp_No=prs_add_info.emp_No");
									
									while($spouserow= mysqli_fetch_assoc($spouseview))
									{
										$civil_status = $spouserow['status'];
										$spouse_name = $spouserow['spouse_name'];
										$career_status = $spouserow['career_status'];
										$register = $spouserow['register'];
										$no_of_dependents= $spouserow['no_of_dependents'];
										$q1 = $spouserow['Q1'];
										$q2 = $spouserow['Q2'];
									if($civil_status == 'Married' || $civil_status == 'Widowed')
									{
									?>
									
									<tr>
										<td><b>Civil Status:</b> <?php echo $civil_status?></td>
										<td><b>Tax Reg. Status:</b> <?php echo $register;?></td>
									</tr>
										
									<?php 
										if($no_of_dependents > 0){
											
									?>
									<tr>
										<td>&nbsp;</td>
										<td><b>No. Of Dependent(s):</b> <?php echo $no_of_dependents;?></td>
									</tr>
									
										<?php }?>
									
									<tr><td><h3>Spouse Info</h3></td><td>&nbsp;</td></tr>
									<tr>
										<td><b>Spouse Name:</b> <?php echo $spouse_name;?></td>
										<td><b>Career Status:</b> <?php echo $career_status;?></td>
									</tr>
									
									<tr>
									<?php if($q1 == 'Yes'){?>
									<td><font color="red">*</font>Spouse is engaged in a business.</td>
									<?php } else{?>
									<td> </td>
									<?php }?>
									<?php if($q2 == 'Yes'){?>
									<td><font color="red">*</font>Spouse is non-resident cirizen recieving income from a foreign sources.</td>
									<?php } else{?>
									<td> </td>
									<?php }?>
									</tr>
									
									
									<?php   } elseif($civil_status == 'Single') {?>
								
									<tr>
										<td><b>Civil Status:</b> <?php echo $civil_status;?></td>
										<td><b>Tax Reg. Status:</b> <?php echo $register;?></td>
									</tr>	
									<?php 
										if($no_of_dependents > 0){
											
									?>
										<tr>
											<td><b>No Of Depemdent(s):</b> <?php echo $no_of_dependents;?></td>
											<td>&nbsp;</td>
										</tr>
														   <?php } 			 } 
									
									}?>
								<tr> 
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								</tr>
								
								</table>
								
								<br>
								</div>
								<?php } ?>	

								<div class="col-lg-12" style="border-color: azure;border-left-style: groove;border-left-color: rgba(253, 228, 0, 0.34);border-left-width: 3;background-color: white;">
																  <h4>Additional Information</h4>
                                    <center>
										<form method="post" action="functions/single.php">
							<table style="width: 600px;" class="table">
									<thead>
									<tr>
									<td><font color="#F44336">&nbsp; Civil Status:</font></td>
										<td>
									<select class="form-control"  name="civil" id="civil" onChange="getCivil(this.value)"  required>
												
											   <option>SELECT STATUS</option>
                                                <?php 
												$selectstatus = mysqli_query($mysqli,"SELECT status from prs_civil_status");
												
												while($statusrow = mysqli_fetch_array($selectstatus))
												{
													$resultss = $statusrow['status'];
												
												?>
												<option value="<?php echo $resultss;?>"><?php echo $resultss;?></option>
												<?php }?>
												
												
                                     </select>
										</td>
											</tr>
									</thead>
									<input hidden name="emp_No" value="<?php echo $emp_No?>"/>
									<tbody  id="civil_list" name="step">
									
									
									
									</tbody>
								
								
								</table>
										
										
										</form>
										
									</center>
									</div>
								</div>
									</div>
								
								<!--===ADD INFO START===-->	
								
							<!--tab-content end-->	
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->				

						<br>
						<br>

			  
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
//# sourceURL=pen.js
</script>

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
				function getGrade(val)
				{
					 $.ajax({
						 type: "POST",
						 url: "dataget/getdata.php",
						 data: 'grade_id='+val,
						 success: function(data)
						 {
							 $("#step_list").html(data);
						 }
					 })
				}
				
	</script>
	
	<script>
				function getCivil(val)
				{
					 $.ajax({
						 type: "POST",
						 url: "dataget/getCivil.php",
						 data: 'status='+val,
						 success: function(data)
						 {
							 $("#civil_list").html(data);
						 }
					 })
				}
				
	</script>
</body>

</html>
