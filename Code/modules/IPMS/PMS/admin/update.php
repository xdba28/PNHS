<!DOCTYPE html>
<html lang="en" >
    <?php
	include("../connect.php");
	include("../include/session.php");
	$o=mysqli_query($mysqli, "SELECT dept_name
FROM pims_personnel, pims_employment_records, pims_department
WHERE pims_personnel.emp_No = pims_employment_records.emp_No
AND pims_employment_records.dept_id = pims_department.dept_id
AND pims_personnel.emp_no = $emp");
$no = mysqli_fetch_assoc($o);
$dept = $no['dept_name'];
    ?>
    <head>
        <meta charset="UTF-8">
        <title>PAG-ASA National High School</title>
        <link href="http://fonts.googleapis.com/css?family=Dosis:400,500,700" rel="stylesheet" type="text/css">
        <link rel='stylesheet prefetch' href='../css/bootstrap.min.css'>
        <link rel="icon" href="../img/pnhs_favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/w3.css">
            <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
        <!-- MetisMenu CSS -->
    <link href="../vendor/dist/css/sb-admin-2.css" rel="stylesheet">
    </head>
<body>
    
<?php 
include("../include/topnav.php"); 
?>
    
<div id="wrapper"> 

<?php include("../include/sidenav.php"); ?>
    
<div id="page-content-wrapper">

<div class="container">
                    
<div id="page-wrapper">
    <div class="row">
        <div class="col-sm-12"><br><br><br>
            <h3 class="page-header" style = "color:#337ab7; font-size: 30px; font-family:Georgia;"><center>Update Request</center></h3>	
           
		   <form role="form"  method="post" action = "" id="">
					<div class="box box-primary">    
						<div class="box-header with-border">
						<p><i><small></small></i></p>
						</div>
						
						</br>
						
						<div class="box-body">
							<div class="row" style="margin-left: 10px">
								
				
								<div class="col-xs-6">
									<div class="form-group">
										<label for="section">Name</label>
										<input type="text" value="<?php echo "$name" ?>" class="form-control" id="name" style="text-align:center"readonly>
									</div>
								</div>
				
								<div class="col-xs-6">
									<div class="form-group">
										<label for="department">Date</label>
										 <input type="text" style="text-align:center" class="form-control" id="date_rqst" value = "<?php date_default_timezone_set('Asia/Manila'); echo date('F j, Y') ?>"  name = "date_rqst"readonly>			
									</div>
								</div>
								</div>
								
								<div class="row" style="margin-left: 10px">
								<div class="col-xs-6">
									<div class="form-group">
										<label for="section">Department</label>
										<input type="text" value="<?php echo "$dept" ?>" class="form-control" id="name" style="text-align:center"readonly>
									</div>
								</div>
				
								<div class="col-xs-6">
									<div class="form-group">
										<label for="department">** Purpose **</label>
										<?php
						$id = $_GET['ris_no'];			
						
						$row = mysqli_query($mysqli, "SELECT reason FROM pms_ris where pms_ris.ris_no = $id")
							or die("Error: ".mysqli_error($mysqli));

					?>
					<?php while($kev = mysqli_fetch_array($row)){ ?>
					<input type="text" style="text-align:center" class="form-control" id="reason" name = "reason" value = "<?php echo $kev['reason'];?>" required>	<?php } ?>		
									</div>
								</div>
								</div>
								</div>
		
							</div> 
							
							<br><br>
							
							
							<div class="row">
								<div class="form-group">
									<div class="col-xs-11" style="margin-left: 30px">
										<table class="table table-responsive" id="dynamic_field">
											<thead>
												
												<tr>
													<td><center><label>Item Name</label></center></td>
													<td><center><label>Item Description</label></center></td>
													<td><center><label>Quantity</label></center></td>
													<td><center><label>Unit</label></center></td>
													
												</tr>
											</thead>
											
											<tbody>				
												<tr id="0">
												
												<?php
						$id = $_GET['ris_no'];			
						
						$row = mysqli_query($mysqli, "SELECT * FROM pms_ris , pims_personnel, pms_ris_req  
										WHERE pms_ris.ris_no = pms_ris_req.ris_no 
										AND pms_ris.emp_No = pims_personnel.emp_No
										AND pims_personnel.emp_No = $emp
										AND pms_ris_req.ris_no = $id")
							or die("Error: ".mysqli_error($mysqli));

					?>
				
					
					<?php while($kev = mysqli_fetch_array($row)){ ?>
					
													<td><input type = "text" style="text-align:center" class="form-control" name = "item_name[]" id = "item_name" placeholder = "Ex: Bond Paper" class = "form-control" value="<?php echo $kev['req_item'];?>" required></td>
													
													<td><input type="text" style="text-align:center" class="form-control" id="item_des" value = "<?php echo $kev['req_desc'];?>"  name = "item_des[]" placeholder = "Ex: Long" required></td>
													
													<td><input type="number" style="text-align:center" class="form-control" id="rqst_qty" value = "<?php echo $kev['req_qty'];?>" min=1 name = "rqst_qty[]" required></td>
													
													<td>
													<select class="form-control" style="text-align:center" id="item_unit" name="item_unit[]" value="<?php echo $kev['req_unit'];?>" required>
                                                            <option value="">Select</option>
                                                            <option value="Ream">Ream</option>
                                                            <option value="Box">Box</option>
                                                            <option value="Can">Can</option>
                                                            <option value="Piece">Piece</option>
                                                            <option value="Roll">Roll</option>
                                                            <option value="Unit">Unit</option>
                                                            <option value="Bundle">Bundle</option>
                                                    </select>

													
													<td style="width:15px"></td>
													  
												</tr>
											</tbody>
											<?php } ?>
										</table>
									</div><!--./col-xs-12 -->
				

									
									
									<div class="col-xs-11" style="margin-left: 25px">
										<center><button type="submit" id="submit" name = "btn" class="btn update btn-primary">Submit<i class="fa fa-send"></i></button></center>
									</div>	
									
									
									
								</div><!--./form-group -->
							</div><!-- row -->
						</div><!-- ./ box-body -->
						</div>
					</div><!--./box-primary -->		            
				</form>
				<div class="col-xs-11" style="margin-left: 25px">
										</br>
										<center><a href="trans.php"><button type="submit" id="cancel" name = "cancel_btn" class="btn update btn-danger">Cancel</i></button></a></center>
				</div>	
		   
		   <?php 
	
                                            if(isset($_POST['btn'])){
                                                $count=count($_POST['item_name']);
                                                $date=date("Y-m-d");
												$reason=$_POST['reason'];
                                                mysqli_query($mysqli,"set autocommit=0");
                                                mysqli_query($mysqli,"start transaction");
                                                mysqli_query($mysqli,"LOCK TABLES PMS_RIS_REQ,PMS_RIS WRITE");
                                                $ris=mysqli_query($mysqli,"UPDATE pms_ris SET emp_no='$emp', remarks='', req_date='$date', req_status='Pending', reason='$reason' where ris_no = $id");
												
                                                if($ris){
                                                    $id=mysqli_insert_id($mysqli);
                                                    $er=0;
                                                    $ok=0;
                                                    for($x=0;$x<$count;$x++){
                                                        $item=$_POST['item_name'];
                                                        $qty=$_POST['rqst_qty'];
                                                        $unit=$_POST['item_unit'];
                                                        $desc=$_POST['item_des'];
														$req=mysqli_query($mysqli,"UPDATE pms_ris_req SET ris_no='$id', req_item='$item[$x]', req_desc='$desc[$x]', req_qty='$qty[$x]', req_unit='$unit[$x]' where ris_no = $id");
														
                                                        if($req){
                                                            $ok+=1;
                                                        }else{
                                                            $er+=1;
                                                        }
                                                    }
                                                    if($er>=1){
                                                        mysqli_query($mysqli,"ROLLBACK");
                                                        echo "<script>alert('Item Error!');</script>";
                                                    }else{
                                                        mysqli_query($mysqli,"COMMIT");
														echo "<script>alert('Request Updated!'); window.location='trans.php?';</script>";
                                                    }
                                                }else{
                                                    mysqli_query($mysqli,"ROLLBACK");
                                                    echo "<script>alert('Error!');</script>";
                                                }
                                                mysqli_query($mysqli,"UNLOCK TABLES");

                                            }                            
                                        ?>
		   
        </div>
    </div>
</div>
                </div>
</div>

                <br>
                <br>
                <br>
                <br>
                <br>
          	<?php 	include("../include/footer.php"); ?>
            </div>

            
            <script src='../js/jquery.min.js'></script>
            <script src='../js/bootstrap.min.js'></script>
            <script src="../js/index.js"></script>
			<!-- DataTables JavaScript -->
    <script src=" vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src=" vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src=" vendor/datatables-responsive/dataTables.responsive.js"></script>
    <script src='../js/sb-admin-2.min.js'></script>
    <script src='../js/metisMenu.min.js'></script>


 <script>

		$(document).ready(function(){
			var i = 1;
			$('#add').click(function(){
				i++;
				$('#dynamic_field').append('<tr id="row'+i+'">'+
					'<td><input type = "text" style="text-align:center" class="form-control" name = "item_name[]" id = "item_name" placeholder = "Ex: Bond Paper" class = "form-control" required></td>'+
					'<td><input type="text" style="text-align:center" class="form-control" id="item_des" value = ""  name = "item_des[]" placeholder = "Ex: Long" required></td>'+
					'<td><input type="number" style="text-align:center" class="form-control" id="rqst_qty" value = "" min=1 name = "rqst_qty[]" required></td>'+
					'<td><select class="form-control" style="text-align:center" id="item_unit" name="item_unit[]" required><option value="">Select</option><option value="Ream">Ream</option><option value="Box">Box</option><option value="Can">Can</option><option value="Piece">Piece</option><option value="Roll">Roll</option><option value="Unit">Unit</option><option value="Bundle">Bundle</option></select></td>'+ 
					'<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove"><i class="glyphicon glyphicon-trash"></i></button></td></tr>	');
			});

			$(document).on('click','.btn_remove', function(){
				var button_id= $(this).attr("id");
				$('#row'+button_id+'').remove();
			});

			$('#submit').click(function(){
				$.ajax({
				url:"Reqform.php",
				method:"POST",
				data:$('#add_form').serialize(),
				success:function(data)
				{	
					$('#add_form')[0];			
				}	
				});	
			});
			
		});
	</script>	
 
<script>
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
<script type="text/javascript">
	function myFunction() {
		$.ajax({
			url: "view_notification.php",
			type: "POST",
			processData:false,
			success: function(data){
				$("#notification-count").remove();					
				$("#notification-latest").show();$("#notification-latest").html(data);
			},
			error: function(){}           
		});
	 }
	 
	 $(document).ready(function() {
		$('body').click(function(e){
			if ( e.target.id != 'notification-icon'){
				$("#notification-latest").hide();
			}
		});
	});
		 
	</script>
	<!--- Live search-->
<script src=" vendors/js/jquery-1.7.2.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var term = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(term.length){
            $.get("live_search.php", {query: term}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>
<!-- Live search end -->
<script>
	function add(str) {
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200) {
				document.getElementById("result1").innerHTML = this.responseText;
			}
		};
		
		xmlhttp.open("GET", "add_requiss.php?name=" + str, true);
		xmlhttp.send();
	}
</script>
        </body>
    </html>