
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
						<h3 class="page-header" style= "color:#337ab7; font-size: 30px; font-family:Georgia;"><center>Purchase Order Check Requests</center></h3>	
						<div class="col-lg-12">
							<div class="panel panel-info">
							<div class="panel-heading">
							</div>
							<br>
								<div class="panel-body">
									<div class="table-responsive">
										<table id="featured-datatable" class="table table-striped table-hover table-bordered">
											

											<thead>
											<tr class="success">
                                                <th><center>PO No.</center></th>
                                        <th><center>PR No.</center></th>
                                        <th><center>Personnel</center></th>
                                        <th><center>Item Requested</th>
                                        <th><center>Payment Term</center></th>
                                        <th><center>Delivery Term</center></th>
                                        <th><center>Delivery Date</center></th>
                                        <th><center>Total Cost</center></th>
                                        <th><center>Check Number</th>
											</tr>
											</thead>
											
											<tbody>
											
											
												 <?php 
                                      $fetch_po = mysqli_query($mysqli, "SELECT * FROM pims_personnel, pms_ris, pms_ris_req, pms_pr_con, pms_pr, pms_po_con, pms_po
                                WHERE pms_ris.emp_no = pims_personnel.emp_no 
                                AND pms_ris.ris_no = pms_ris_req.ris_no 
                                AND pms_pr.pr_no = pms_pr_con.pr_no 
                                AND pms_ris_req.req_item_id = pms_pr_con.req_item_id
                                AND pms_pr_con.pr_id = pms_po_con.pr_id
                                AND pms_po_con.po_no = pms_po.po_no
								AND pms_po.check_no != 'NULL'
                                AND po_status = 'Approved'
                                group by pms_po.po_no")

                                        ?>
            <?php while($po = mysqli_fetch_array($fetch_po)){ ?>
                                     
                                        <tr class="success">
                                        <td><center><?php echo ($po['po_no'])?></center></td>
                                        <td><center><?php echo ($po['pr_no'])?></center></td>
                                        <td><center><?php echo ($po['P_fname'].' '.$po['P_lname'])?></center></td>
                                        <td><center><?php echo ($po['req_qty'].' '.$po['req_unit'].' '.$po['req_desc'].' '.$po['req_item'])?></center></td>
                                        <td><center><?php echo ($po['payment_term'])?></center></td>
                                        <td><center><?php echo ($po['delivery_term'])?></center></td>
                                        <td><center><?php echo ($po['delivery_date'])?></center></td>
                                        <td><center><?php echo ($po['po_total'])?></center></td>
                                         <td><center><?php echo ($po['check_no'])?></center></td>
                                       
                                        </tr>
                                        <?php }  ?>

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
                <br>
                <br>
                <br>
                <br>
                <br>
                <?php  include("../include/footer.php"); ?>
            </div>

            
            <script src='../js/jquery.min.js'></script>
            <script src='../js/bootstrap.min.js'></script>
            <script src="../js/index.js"></script>
            <script src='../js/sb-admin-2.min.js'></script>
            <script src='../js/metisMenu.min.js'></script>
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