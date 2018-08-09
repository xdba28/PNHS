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
                <div class="col-sm-12">
				<br>
                <h3 class="page-header" style = "color:#337ab7; font-size: 30px; font-family:Georgia;"><center>PO RECORDS</center></h3>	
				</div>
			</div>
            <br>

			    		<div class="box col-md-12">
					<!-- DRAG/DROP COLUMNS REORDER -->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title"></h3>
						</div>


							<div style="float: right;">
							
									<ul class="nav nav-pills" role="tablist">
										<li class="active"><a href="#chart1" role="tab" data-toggle="tab"><i style="color:violet">All</i></a></li>
										<li><a href="#chart2" role="tab" data-toggle="tab"><i style="color:green">Approved</i></a></li>
										<li><a href="#chart3" role="tab" data-toggle="tab"><i style="color:blue">Pending</i></a></li>
										<li><a href="#chart4" role="tab" data-toggle="tab"><i style="color:red">Denied</i></a></li>
										&nbsp;&nbsp;&nbsp;
									</ul><br>
                			</div><br><br>


                			<!--chart1-->

                			<div class="tab-content">
								<div class="tab-pane fade in active" id="chart1">

										<?php
								include "po_rec/all.php";
								?>
										</div>
							<!--chart1-->

							<!--chart2-->
							<div class="tab-pane fade" id="chart2">

								<?php
								include "po_rec/approved.php";
								?>
								</div>
							<!--chart2-->

							
							<!--chart3-->
							<div class="tab-pane fade" id="chart3">
									<?php
								include "po_rec/pending.php";
								?>
										</div>
							<!--chart3-->


							<!--chart4-->
							<div class="tab-pane fade" id="chart4">
								<?php
								include "po_rec/denied.php";
								?>
										

										</div>
							<!--chart4-->
                			




						</div>
						<!--end-->
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
</div>
</div>
                </div>
                
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