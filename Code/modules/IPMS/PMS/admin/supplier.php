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
<?php
      include("../include/sidenav.php");
  ?>
    <div id="page-content-wrapper">

                <div class="container">
                    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header" style = "color:#337ab7; font-size: 30px; font-family:Georgia;"><center>SUPPLIER</center></h3>
					<center><button type="button" class="btn btn-outline btn-info btn" title="Add Supplier" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus">  Add</i></button>&nbsp;&nbsp;&nbsp;&nbsp;</br><br>
            
					<form action="insert_supplier.php" method="post">
					<div id="myModal" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myModalLabel">Add Supplier</h4>
						</div><br>
							<input required name="company_name" type="text" class="form-control" style="text-align: center;width:250px" placeholder="Supplier"><br>
							<input name="sup_address" type="text" class="form-control" style="text-align: center;width:250px" placeholder="Address"><br>
							<input name="sup_contact" type="text" class="form-control" style="text-align: center;width:250px" placeholder="Contact No."><br>
							<select class="form-control" name="supp_status"  style="text-align: center;width:250px">
								<option>Active</option>
								<option>Inactive</option>
							</select><br>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary" name="submit" id = "submit" >Submit</button>
							</div>

						</div>
					</div>
					</form>
					</div>
                </div>

				<div class="col-md-12">
				<div class="panel panel-default">
				<div class="panel-heading">
				</div><br>


				<?php
				$sql = mysqli_query($mysqli, "SELECT * FROM pms_supplier")
							or die("Error: ".mysqli_error($mysqli));
				$sql2 = mysqli_query($mysqli, "SELECT pms_ris_req.req_item 
					FROM pms_ris_req, pms_pr_con,pms_po_con, pms_po, pms_supplier
					WHERE 
					pms_ris_req.req_item_id  = pms_pr_con.req_item_id 
					AND pms_pr_con.pr_id = pms_po_con.pr_id 
					AND pms_po_con.po_no  = pms_po.po_no 
					AND pms_po.company_id  = pms_supplier.company_id")
					or die("Error: ".mysqli_error($mysqli));
				?>
					<div class="panel-body">
						<table id="featured-datatable" class="table table-striped table-hover table-bordered">
							<thead>
							<tr class="info">
                                <th><center>Company Name</center></th>
                                <th><center>Address</center></th>
                                <th><center>Contact Number</center></th>
                                <th><center>Status</center></th>
                                <th><center>Transaction</center></th>
							</tr>
							</thead>
							
							<tbody>				
							<?php
							while($supplier = mysqli_fetch_array($sql))
							{
							   $com = $supplier['company_id']; ?>
							   
							<tr>
                                <td><center><?php echo $supplier['company_name'];?></center></td>
                                <td><center><?php echo $supplier['sup_address'];?></center></td>
                                <td><center><?php echo $supplier['sup_contact'];?></center></td>
                                <td><center><?php echo $supplier['supp_status'];?></center></td>
								<td><center>    
								<?php 
								$query_items = mysqli_query($mysqli, "SELECT * FROM pms_po, pms_po_con, pms_pr_con, pms_ris_req
									WHERE pms_po.po_no = pms_po_con.po_no
									AND pms_pr_con.pr_id = pms_po_con.pr_id
									AND pms_pr_con.req_item_id = pms_ris_req.req_item_id
									AND pms_po.company_id = $com")or die(mysqli_error($mysqli));
									$rows = mysqli_num_rows($query_items);
								?>
								<?php if (!empty($rows)) {?>
								<center><button class= "btn btn-info btn-square btn-sm" value="<?php echo $com;?>" href="view.php" onclick="view(this.value)" data-toggle="modal" data-target="#myModal2"s><span class="fa fa-eye" aria-hidden="true" ></span> View</button>&nbsp;&nbsp;&nbsp;&nbsp;
								<?php } 
									else {?>
									<center><button class= "btn btn-info btn-square btn-sm disabled" value="<?php echo $com;?>" href="view.php"><span class="fa fa-eye" aria-hidden="true" ></span> View</button>&nbsp;&nbsp;&nbsp;&nbsp;
								<?php }?>
								</tr>
						</div>
							<?php } ?>
							</tbody>
						</table>
						
						<div id="myModal2" class="modal fade" role="dialog">
							<div id="display"></div>
						</div> 
					</div>
				</div><br>
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

  function view(val){
    $.ajax({
      type: "POST",
      url: "view.php",
      data: "id="+val,
      success: function(data){
        $("#display").html(data);
      }
    });
  }

</script>
<script src="assets/vendor/datatables/js-main/jquery.dataTables.min.js"></script>
	<script src="assets/vendor/datatables/js-bootstrap/dataTables.bootstrap.min.js"></script>
	<script src="assets/vendor/datatables-colreorder/dataTables.colReorder.js"></script>
	<script src="assets/vendor/datatables-tabletools/js/dataTables.tableTools.js"></script>
				<script>
	$(function() {

		// datatable column with reorder extension
		$('#datatable-column-reorder').dataTable({
			pagingType: "full_numbers",
			sDom: "RC" +
				"t" +
				"<'row'<'col-sm-6'i><'col-sm-6'p>>",
			colReorder: true,
		});

		// datatable with column filter enabled
		var dtTable = $('#datatable-column-filter').DataTable({ // use DataTable, not dataTable
			sDom: // redefine sDom without lengthChange and default search box
				"t" +
				"<'row'<'col-sm-6'i><'col-sm-6'p>>"
		});

		$('#datatable-column-filter thead').append('<tr class="row-filter"><th></th><th></th><th></th><th></th><th></th></tr>');
		$('#datatable-column-filter thead .row-filter th').each(function() {
			$(this).html('<input type="text" class="form-control input-sm" placeholder="Search...">');
		});

		$('#datatable-column-filter .row-filter input').on('keyup change', function() {
			dtTable
				.column($(this).parent().index() + ':visible')
				.search(this.value)
				.draw();
		});

		// datatable with paging options and live search
		$('#featured-datatable').dataTable({
			sDom: "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
		});

		$('#featured-datatable1').dataTable({
			sDom: "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
		});

		$('#featured-datatable2').dataTable({
			sDom: "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
		});

		$('#featured-datatable3').dataTable({
			sDom: "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
		});

		// datatable with export feature
		var exportTable = $('#datatable-data-export').DataTable({
			sDom: "T<'clearfix'>" +
				"<'row'<'col-sm-6'l><'col-sm-6'f>r>" +
				"t" +
				"<'row'<'col-sm-6'i><'col-sm-6'p>>",
			"tableTools": {
				"sSwfPath": "assets/vendor/datatables-tabletools/swf/copy_csv_xls_pdf.swf"
			}
		});

		// datatable with scrolling
		$('#datatable-basic-scrolling').dataTable({
			scrollY: "300px",
			scrollCollapse: true,
			paging: false
		});
	});
	</script>

        </body>
    </html>