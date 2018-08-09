<!DOCTYPE html>
<html lang="en" >
   <?php
    //include("func.php");
    include("session.php");
	
	
  $qry= mysql_query(" SELECT * FROM pims_personnel, pims_employment_records, prs_salary_record, prs_allowance, prs_salary
						Where pims_personnel.emp_No=pims_employment_records.emp_No
						AND pims_employment_records.faculty_type='Non Teaching'
						AND pims_personnel.emp_No=prs_salary_record.emp_No
						AND prs_salary.salary_id = prs_salary_record.salary_id
					")
	
    ?>
   <?php include("pages/headlink.php");?>
    <body>
        <div id="wrapper">
            <?php include("pages/sidenav.php"); ?>
            <?php include("pages/topnav.php")?>    
            <!---Start Content---->
				<div class="container">
                    
                    <!--Body Start Here-->
					
        <div class="container-fluid" style="height:700px;max-width:100%;margin-right:20px;margin-left:20px;margin-bottom:10px">
        
		
						
				
			<div class="row">
		<div class="col-lg-12">
		<h3 class="page-header"><i class="fa fa-laptop"></i> PERSONNEL LIST</h3>
	 <ol class="breadcrumb">
	<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
	<li><i class="fa fa-laptop"></i><a href="employee.php">Personnel Type</a></li>

	 </ol>
		</div>
			</div>


                <!--======== CONTENT STARTS HERE=============-->			
			

			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel1">
                            TEACHING PERSONNEL
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
						<form method="post" action="functions/clearall1.php">
	<button style="float:left; margin-right:5px;" type="button" data-toggle="modal" data-target="#ph" class="btn btn-info btn-lg"><i class="fa fa-asterisk"></i> Clear All</button>
	
						
						<center>
			<!--============START MODAL===============-->		
	   
	  
			<!-- this modal is for Philhealth -->
      <div class="modal fade" id="ph" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:10px 20px;">
			            
			  <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              
			</div>
            <div class="modal-body" style="padding:10px 30px;">

               <center>
			 <table>
		<tr>
			   <td> <button type="submit" name="submit" class="btn btn-success btn-lg">COMFIRM</button></td>
			   <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <td>
			   <td>or</td>
			   <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <td>
					<td>
				<button type="submit" name="No" class="btn btn-danger btn-lg" data-dismiss="modal" title="Close">
			  <font><b>CANCEL</b></font>
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

	</form>
						
   <form method="post" action="functions/addamount1.php">                     
			<button type="submit" name="submit" class="btn btn-primary btn-lg" style="margin-bottom: 10;">SUBMIT</button>

					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

							    	<thead>
                                    <tr>
                                        <th><center>Name</center></th>
										<th><center>Late</center></th>
                                        
                                    </tr>
                                    </thead>
                                    
                                    
				
									<tbody>
     						
								<tr class="gradeA">
                                       <!--input hidden name="employee_id" id="employee_id" ></input-->
						<?php
							while($row= mysql_fetch_assoc($qry))
							{
								$emp_No = $row['emp_No'];
								$fname = $row['P_fname'];
								$mname = $row['P_mname'];
								$lname = $row['P_lname'];
								$extension = $row['P_extension_name'];
								$amount = $row['amount'];
								$allowance =$row['allowance'];
								
							
								
						?>				
								<input hidden name="amount[]" value="<?php echo $amount?>" >
								<input hidden name="allowance[]" value="<?php echo $allowance?>" >
								<input hidden name="id[]" value="<?php echo $emp_No?>" >
								<td><font face="helvetica" size="4px"><?php echo $lname ?>, <?php echo $fname ?> <?php echo $mname ?> <?php echo $extension ?></font></td>
                                <td align="center">
						         <input type="text" class="form-control" name="time[]"  required>
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
			
			</div>
 
         </div>
					
					<!--End Body Here-->
                </div> <br><br><br>
           <!--End Content--->
			   
			   <?php include("pages/footer.php")?> <!--Footer-->
            </div>
            <script src='../js/jquery.min.js'></script>
            <script src='../js/bootstrap.min.js'></script>
            <script  src="../js/index.js"></script>
			
				<!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

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