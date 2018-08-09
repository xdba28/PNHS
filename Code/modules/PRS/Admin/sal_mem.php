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
				<!--BODY CONTENT START--><br><br><br><br>
				<div class="container-fluid" style="height:auto;min-height:700px;max-width:100%;margin-right:20px;margin-left:20px;margin-bottom:10px">
        
		
				 <div class="a" style="position: fixed ; z-index: 2; opacity: 0; width: 1036px;; margin-left: 17px; top: 50px; ">
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
		  <h3 class="page-header"> <img  class="w3-hover-light-blue" style="margin-right: 2;border-radius: 50%;background-color: #fdfdfd " src="../assets/images/report.png" width="46px"><font face="helvetica" size="6px">Salary Memo List</font></h3>
				</div>
		       
			   
                 <div>    
                <div class="col-lg-12 col-md-12" style="box-sizing: border-box;">
                    <div class="panel panel-default" style="box-sizing: border-box;">
                        <div class="panel1">
						<a style="float:right; margin-right: 20;" href="salmemedit.php"><button class="btn btn-success btn-lg">EDIT</button></a>
						 <div>
						   <label class="col-sm-3 control-label"><font face="helvetica" size="6px">Salary&nbsp;Memo:</font></label>
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
                        <div class="panel-body" style="box-sizing: border-box;">
                            <table width="100%" class="table table-striped table-bordered table-hover" >
                                <thead>
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
									<tr class="gradeA">
									</tr>
								</tbody>
                            </table>
                            <!-- /.table-responsive -->

                        </div>
                        <!-- /.panel-body -->
                    </div>
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
						 url: "dataget/getsalmemo.php",
						 data: 'sal_memo_id='+val,
						 success: function(data)
						 {
							 $("#sal_memolist").html(data);
						 }
					 })
				}
				
	</script>
	
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
      
<script>
$('.openBtn').on('click',function(){
    $('.calculate').load('function_modal/generate_modal.php',function(){
        $('#calculate').modal({show:true});
    });
});
</script>
	
</body>

</html>
