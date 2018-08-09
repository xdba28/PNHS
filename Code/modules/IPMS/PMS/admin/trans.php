<!DOCTYPE html>
<html lang="en" >
    <?php

	include("../connect.php");
	include("../include/session.php");
    ?>
    <head>
        <meta charset="UTF-8">
        <title>PAG-ASA National High School</title>
        <link href="http://fonts.googleapis.com/css?family=Dosis:400,500,700" rel="stylesheet" type="text/css">
        <link rel='stylesheet prefetch' href='../css/bootstrap.min.css'>
        <link rel="icon" href="../img/pnhs_favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/w3.css">
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
                <div class="col-sm-12">
				<br></br>
                    <h3 class="page-header" style = "color:#337ab7; font-size: 30px; font-family:Georgia;"><center>TRANSACTIONS</center></h3>	
		
		
					<div class="col-lg-10" style="margin-left:100px;">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                        </div>
						  <div class="panel-body"><form action="" method="get">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-bordered table-striped table-hover" id="dataTables-example">
												<thead>
													<tr>
                                                        <th><center>RIS No.</center></th>
                                                        <th><center>Date Requested</center></th>
                                                        <th><center>Item</th>
														<th><center>Status</center></th>
														<th><center>Edit</center></th>
														<th><center>Cancel</center></th>
                                                        <th><center>Action</center></th>                                                    
													</tr>
												</thead>
												<tbody>
													<?php
														mysqli_query($mysqli, "LOCK TABLES pms_ris, pims_personnel, pms_ris_req, pms_pr_con, pms_pr, pms_po_con, pms_po READ");
														$fetch_ris = mysqli_query($mysqli, "SELECT * FROM pms_ris , pims_personnel, pms_ris_req  WHERE pms_ris.ris_no = pms_ris_req.ris_no AND pms_ris.emp_No = pims_personnel.emp_No AND pims_personnel.emp_No = $emp")
														or die(mysqli_error($mysqli));
														$ris_no_prev = 0;
														while($ris = mysqli_fetch_array($fetch_ris))
														{
                                                            $fetch_items = mysqli_query($mysqli, "SELECT * FROM pms_ris_req WHERE ris_no = '".$ris['ris_no']."'")
                                                             or die(mysqli_error($mysqli));
                                                             $items = '';
                                                             while($item = mysqli_fetch_array($fetch_items))
                                                            {
                                                                $items = $item['req_qty'].' '.$item['req_unit'].' '.$item['req_item'].'<br>'.$items;
                                                            }
															$fetch_prstat = mysqli_query($mysqli, "SELECT * FROM pms_ris_req, pms_pr_con, pms_pr
															WHERE pms_ris_req.req_item_id = pms_pr_con.req_item_id
															AND pms_pr_con.pr_no = pms_pr.pr_no
															AND ris_no = '".$ris['ris_no']."'
															GROUP BY ris_no");
															$prnum = mysqli_num_rows($fetch_prstat);
															$prstat = mysqli_fetch_array($fetch_prstat);
															$s = "RIS is ".$ris['req_status'].'<br/>';
															
															
														if ($ris['ris_no'] != $ris_no_prev) {
															?>
															<tr class="odd gradeX">
															<td><center><?php echo $ris['ris_no']; ?></center></td>
															<td><center><?php echo $ris['req_date']; ?></center></td>
															<td><center><?php echo $items;?></center></td>
															<td><center><a href="view.php?ris_no=<?php echo $ris['ris_no'];?>">
															<input type="hidden" name="id" value="<?php echo $ris['ris_no'];?>">
															<button type="button"  class= "btn btn-success btn-square btn-md"  title="Print RIS"><span class="fa fa-print" aria-hidden="true" ></span> View</button>
															</a>
															</center>
															</td>
															
															<td>
															<form action="update.php?ris_no=<?php echo $ris['ris_no'];?>" method="post">
															<input type="hidden" name="id" value="<?php echo $ris['ris_no'];?>">	
															<center><input class="btn btn-primary" <?php if ($ris['req_status']=='Approved' || $ris['req_status']=='Denied' || $ris['req_status']=='Finished'){ ?> Disabled <?php }?> type="submit" name="update" value="Edit">
															</center><p>
															</form>
															</td>
															
															<td>
															<form action="delete.php?ris_no=<?php echo $ris['ris_no'];?>" method="post">
															<input type="hidden" name="id" value="<?php echo $ris['ris_no'];?>">	
															<center><input class="btn btn-danger" name="btn" <?php if ($ris['req_status']=='Approved' || $ris['req_status']=='Denied' || $ris['req_status']=='Finished'){ ?> Disabled <?php }?> type="submit" name="delete" value="Cancel">
															</center><p>
															</form>
															</td>
															
															
															<td><center>
															<div class="btn-group" role="group" aria-label="...">
																<a href="../fpdf/ris.php?ris=<?php echo $ris['ris_no'];?>"> <button type="button"  class= "btn btn-info btn-square btn-md"  title="Print RIS"><span class="fa fa-print" aria-hidden="true" ></span> Print</button></a>
															</div></center></td>
															</tr>
															<?php
															$ris_no_prev = $ris['ris_no'];
														}
												}
											?>
											</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
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
            <script src='../js/sb-admin-2.min.js'></script>
            <script src='../js/metisMenu.min.js'></script>
			<script>
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
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
        </body>
    </html>