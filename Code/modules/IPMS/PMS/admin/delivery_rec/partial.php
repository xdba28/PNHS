<div class="panel-body">


						<table id="featured-datatable2" class="table table-striped table-hover table-bordered">
								<thead>
									<tr>
										<th><center>Expected Delivery Date</th>
                                        <th><center>Received Date</th>
                                        <th><center>Supplier</th>
                                        <th><center>Expected Item</th>
                                        <th><center>Delivery Status</th>
                                        <th><center>Remarks</th>
										
									</tr>
								</thead>
								<tbody>
									
								<?php 
                $sql = mysqli_query($mysqli, "SELECT * FROM pms_iar, pms_iar_con, pms_po_con, pms_pr_con, pms_ris_req, pms_ris, pms_po, pms_supplier
                    WHERE pms_iar_con.iar_no = pms_iar.iar_no
                    AND pms_iar_con.po_id = pms_po_con.po_id
                    AND pms_pr_con.pr_id = pms_po_con.pr_id
                    AND pms_pr_con.req_item_id = pms_ris_req.req_item_id
                    AND pms_ris.ris_no = pms_ris_req.ris_no
                    AND pms_po.po_no = pms_po_con.po_no
                    AND pms_supplier.company_id = pms_po.company_id
					and pms_iar.iar_status = 'Partial'
                    ")
                or die("Error: ".mysqli_error($mysqli));

                  $iar_no_prev = 0;                    
                    while($row = mysqli_fetch_array($sql))
                    {
                        $fetch_items = mysqli_query($mysqli, "SELECT * FROM pms_iar, pms_iar_con, pms_po_con, pms_pr_con, pms_ris_req, pms_ris, pms_po, pms_supplier
                    WHERE pms_iar_con.iar_no = pms_iar.iar_no
                    AND pms_iar_con.po_id = pms_po_con.po_id
                    AND pms_pr_con.pr_id = pms_po_con.pr_id
                    AND pms_pr_con.req_item_id = pms_ris_req.req_item_id
                    AND pms_ris.ris_no = pms_ris_req.ris_no
                    AND pms_po.po_no = pms_po_con.po_no
                    AND pms_supplier.company_id = pms_po.company_id
                    AND pms_iar.iar_no = '".$row['iar_no']."'")
                            or die(mysqli_error($mysqli));
                            $items = '';
                            while($item = mysqli_fetch_array($fetch_items))
                            {
                            $items = $item['received_qty'].' '.$item['req_unit'].' '.$item['req_desc'].' '.$item['req_item'].'<br>'.$items;
                            }
                            if ($row['next_del_date'] == '0000-00-00' && $row['status'] == 'NOT COMPLETE') {
                                if($row['req_date'] == $row['req_date']){
                                    $remarks = 'Ontime';
                                }
                                else {
                                    $remarks = 'Delayed';
                                }
                                
                                if ($iar_no_prev != $row['iar_no']) {
                                    echo'
                                    <tr class="danger">
                                    <td><center>'.$row['delivery_date'].'</center></td>
                                    <td><center>'.$row['received_date'].'</center></td>
                                    <td><center>'.$row['company_name'].'</center></td>
                                    <td><center>'.$items.'</center></td>
                                    <td><center>'.$row['iar_status'].'</center></td>
                                    <td><center>'.$remarks.'</center></td>
                                    </tr>';
                                    $iar_no_prev = $row['iar_no'];
                                    }
                            }
                            if ($row['next_del_date'] == '0000-00-00' && $row['status'] == 'COMPLETE') {
                                $fetch_nxt_del_date = $row['delivery_date'];
                                if($fetch_nxt_del_date == $row['received_date']){
                                    $remarks = 'Ontime';
                                }
                                else {
                                    $remarks = 'Delayed';
                                }
                                
                                if ($iar_no_prev != $row['iar_no']) {
                                    echo'
                                    <tr class="danger">
                                    <td><center>'.$fetch_nxt_del_date.'</center></td>
                                    <td><center>'.$row['received_date'].'</center></td>
                                    <td><center>'.$row['company_name'].'</center></td>
                                    <td><center>'.$items.'</center></td>
                                    <td><center>'.$row['iar_status'].'</center></td>
                                    <td><center>'.$remarks.'</center></td>
                                    </tr>';
                                    $iar_no_prev = $row['iar_no'];
                                    }
                            }
                            else {
                                if ($iar_no_prev != $row['iar_no']) {
                                    if($row['req_date'] == $row['received_date']){
                                        $remarks = 'Ontime';
                                    }
                                    else {
                                        $remarks = 'Delayed';
                                    }                                   
                                    $fetch_nxt_del_date = $row['next_del_date'];
                                    echo'
                                    <tr class="danger">
                                    <td><center>'.$fetch_nxt_del_date .'</center></td>
                                    <td><center>'.$row['received_date'].'</center></td>
                                    <td><center>'.$row['company_name'].'</center></td>
                                    <td><center>'.$items.'</center></td>
                                    <td><center>'.$row['iar_status'].'</center></td>
                                    <td><center>'.$remarks.'</center></td>
                                    </tr>';
                                    $iar_no_prev = $row['iar_no'];
                                    }
                            }
                    }
                    ?>							
									
								</tbody>
								
							</table>
													
							<?php  ?>
							
									
								</tbody>
								
							</table>
													
							<?php  ?>

										</div>	
										
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