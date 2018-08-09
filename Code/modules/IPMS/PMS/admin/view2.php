<?php
include "../connect.php";

if(!empty($_POST['id'])){
  $id = $_POST['id'];
}

$query_items = mysqli_query($mysqli, "SELECT * FROM pms_po, pms_po_con, pms_pr_con, pms_ris_req
				WHERE pms_po.po_no = pms_po_con.po_no
				AND pms_pr_con.pr_id = pms_po_con.pr_id
				AND pms_pr_con.req_item_id = pms_ris_req.req_item_id
				AND pms_po.company_id = $id")or die(mysqli_error($mysqli));
				
$query_name = mysqli_query($mysqli, "SELECT company_name FROM pms_supplier WHERE company_id = $id")or die(mysqli_error($mysqli));
$modal_name = mysqli_fetch_row($query_name);
?>

<div class="modal-dialog" style="width:1000px">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title"><?php echo $modal_name[0]?></h4>
	  </div>
	  <div class="modal-body">
		<table id="featured-datatable" class="table table-striped table-hover table-bordered">
		<thead>
		<tr class="info">
			<th><center>PO No.</center></th>
			<th><center>Date Requested</center></th>
			<th><center>Item Requested</th>
			<th><center>Total</center></th>
			<th><center>Status</center></th>                                                    
		</tr>
		</thead>
		<tbody>
			<?php 
				$po_no_prev = 0;
				while($row=mysqli_fetch_array($query_items)) {	
					if ($po_no_prev != $row['po_no']) {
					echo '<tr>';
					$query_item_name = mysqli_query($mysqli, "SELECT * FROM pms_ris_req WHERE ris_no = '".$row['ris_no']."'")
					or die(mysqli_error($mysqli));
					$items = '';
					while($item = mysqli_fetch_array($query_item_name))
					{
						$items = $item['req_qty'].' '.$item['req_unit'].' '.$item['req_item'].'<br>'.$items;
					}
					
					echo '<td><center>'.$row['po_no'].'</center></td>';
					echo '<td><center>'.$row['po_date'].'</center></td>';
					echo '<td><center>'.$items.'</center></td>';
					echo '<td><center>'.$row['po_total'].'</center></td>';
					echo '<td><center>'.$row['po_status'].'</center></td>';
					echo '</tr>';		
					$po_no_prev = $row['po_no'];
					}
				}
			?>
		</tbody>
		</table>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	  </div>
	</div>
</div>

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
