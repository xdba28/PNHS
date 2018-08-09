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
						<h3 class="page-header" style= "color:#337ab7; font-size: 30px; font-family:Georgia;"><center>PO REQUESTS</center></h3>	
						<div class="col-lg-12">
							<div class="panel panel-info">
							<div class="panel-heading">
							</div>
							<br>
								<div class="panel-body">
									<div class="table-responsive">
										<table id="featured-datatable" class="table table-striped table-hover table-bordered">
											<?php
												  $sql = mysqli_query($mysqli, "SELECT * from pms_ris,pims_personnel, pms_pr, pms_pr_con, pms_ris_req, pms_po,     pms_po_con
													  WHERE pims_personnel.emp_no=pms_ris.emp_no 
													  AND pms_po.po_no = pms_po_con.po_no
													  AND pms_po_con.pr_id = pms_pr_con.pr_id
													  AND pms_ris.ris_no = pms_ris_req.ris_no
													  AND pms_ris_req.req_item_id = pms_pr_con.req_item_id
													  AND pms_pr_con.pr_no = pms_pr.pr_no
													  and po_status = 'Pending'");

												  ?>
											<thead>
											<tr class="info">
                                                <th><center>PO No.</center></th>
                                                <th><center>Requestor</center></th>
                                                <th><center>Date of Request</center></th>
                                                <th><center>View</center></th>
											</tr>
											</thead>
											
											<tbody>
											<?php  
											$po_no_prev = 0;
											while($row = mysqli_fetch_array($sql)){
											if ($po_no_prev != $row['po_no']) {?> 
											<tr>
												<td><center><?php echo $row['po_no'];?></center></td>
												<td><center><?php echo $row['P_fname'].' '.$row['P_lname'];?></center></td>
												<td><center><?php echo $row['po_date'];?></center></td>
												<td><center><a href="po_items.php?po=<?php echo $row['po_no']; ?>" class="bbtn btn-outline btn btn-success btn"><i class="fa fa-eye fa-sm">View</i></button></center></td>
											<?php }
											$po_no_prev = $row['po_no'];
											} ?>
											</br> </tr>
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