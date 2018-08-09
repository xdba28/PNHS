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
				<div class="container-fluid" style="height:auto;min-height:700px;max-width:100%;margin-right:20px;margin-left:20px;margin-bottom:10px">
        
				<div class="a" style="position: fixed ; z-index: 2; width: 1036px;opacity:0; margin-left: 17px; top: 50px;">
							<div class="panel-body" style="position: sticky;">
								<table   class="table table-striped table-bordered table-hover" style="background-color: white;">
								<thead>
								    
									<tr>
                                        <th style="border: 1px solid #fffefe;">GRADE</th>
										<th style="border: 1px solid #fffefe;">STEP 1</th>
										<th style="border: 1px solid #fffefe;">STEP 2</th>
                                        <th style="border: 1px solid #fffefe;">STEP 3</th>
                                        <th style="border: 1px solid #fffefe;">STEP 4</th>
                                        <th style="border: 1px solid #fffefe;">STEP 5</th>
										<th style="border: 1px solid #fffefe;">STEP 6</th>
                                        <th style="border: 1px solid #fffefe;">STEP 7</th>
										<th style="border: 1px solid #fffefe;">STEP 8</th>
									 </tr>
									
                                </thead>
								</table>
							</div>
		   		</div>
		
				<div class="col-lg-12">
		  <h3 class="page-header"> <img  class="w3-hover-light-blue" style="margin-right: 2;border-radius: 50%;background-color: #fdfdfd " src="../assets/images/report.png" width="46px"><font face="helvetica" size="6px"><b>SALARY MEMO<b></font></h3>
				</div>
		       
		         <div>    
                <div class="col-lg-12 col-md-12" style="box-sizing: border-box;">
                  
				  <form method="post" action="functions/salmemb.php">

				  <div class="panel panel-default" style="box-sizing: border-box;">
                        <div class="panel1">
                         <button  type="button" class="btn btn-primary btn-lg" style="float:right" data-toggle="modal" data-target="#SAL">UPDATE</button> 
						 <div>
						   <label class="col-sm-3 control-label"><font face="helvetica" size="6px">Salary&nbsp;Memo:</font> </label>
										
										<div class="col-sm-3 form-group input-group">
										
								<select id="Memo_list" onChange="getMemo(this.value)" class="form-control" required>
								<option>Select Memo</option>
								<?php
								 $query = mysqli_query($mysqli,"SELECT * from prs_salary_memo");
								
								 while($row=mysqli_fetch_assoc($query))
								 {	 
									 $sal_memo_id =$row['sal_memo_id'];
									 $salary_memo = $row['salary_memo'];

								?> 
									<option value="<?php echo $sal_memo_id;?>"><?php echo $salary_memo; ?></option>
								 <?php }?>
								</select>
										</div>
							</div>
							
						</div>
						
                        <center>
			<!--============START MODAL===============-->		
	 		<!-- this modal is for Philhealth -->
      <div class="modal fade" id="SAL" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:18px 50px;">
			            
			  <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center"><b>ARE YOU SURE YOU WANT TO UPDATE SALARY MEMO?</b></h3>
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
						</div>
                        
						<div class="panel-body" style="box-sizing: border-box;">
						<table width="100%" class="table table-striped table-bordered table-hover">
                                <thead>
									<tr>
										<th colspan="2"></th>
										<th colspan="5"><input value="" name="title"  class="form-control" placeholder="Insert Title Here...">
										</th>
										<th colspan="2"></th>
									</tr>
                                   <tr>
                                        <th>GRADE</th>
										<th>STEP 1</th>
										<th>STEP 2</th>
                                        <th>STEP 3</th>
                                        <th>STEP 4</th>
                                        <th>STEP 5</th>
										<th>STEP 6</th>
                                        <th>STEP 7</th>
										<th>STEP 8</th>
									</tr>
								</thead>
                               <tbody id="sal_memolist">
									<tr>
										<caption></caption>
									</tr>
									<tr class="gradeA">
									</tr>
								</tbody>
                            </table>
                            <!-- /.table-responsive -->
<a href="javascript:void(0);" id="scroll" title="Scroll to Top" style="display: none;">Top<span></span></a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
					</form>
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
	<script text="text/javascript" src="../jquery/jquery-migrate-1.4.1.js"></script>
	
	<script>
				function getMemo(val)
				{
					 $.ajax({
						 type: "POST",
						 url: "dataget/getsalmemoA.php",
						 data: 'sal_memo_id='+val,
						 success: function(data)
						 {
							 $("#sal_memolist").html(data);
						 }
					 })
				}
				
	</script>
  
	
		<!--====BACK TO TOP ====--->
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

    if ($(this).scrollTop()>210)
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
	
<script>
$('.openBtn').on('click',function(){
    $('.calculate').load('function_modal/generate_modal.php',function(){
        $('#calculate').modal({show:true});
    });
});
</script>

</body>

</html>
