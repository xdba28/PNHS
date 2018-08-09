<div class="panel-body">


						<table id="featured-datatable1" class="table table-striped table-hover table-bordered">
								<thead>
									<tr>
										<th><center>RIS No.</center></th>
										<th><center>Personnel</center></th>
										<th><center>Department</center></th>
										<th><center>Requested Item</center></th>
										<th><center>Date Requested</center></th>
										<th><center>Status</center></th>
										<th><center>Action</center></th>
										
									</tr>
								</thead>
								<tbody>
									
								<?php 
                                      $fetch_risreq = mysqli_query($mysqli, "SELECT * FROM pms_ris, pims_personnel
                                        WHERE pms_ris.emp_no = pims_personnel.emp_no and pms_ris.req_status = 'Approved'
                                        ")
                                      or die(mysqli_error($mysqli));
                                        

                                      while($risreq = mysqli_fetch_array($fetch_risreq))
                                      {
                                         $fetch_items = mysqli_query($mysqli, "SELECT * FROM pms_ris_req WHERE ris_no = '".$risreq['ris_no']."'")
                                         or die(mysqli_error($mysqli));
                                         $items = '';
                                        
                                          $o=mysqli_query($mysqli, "SELECT dept_name
                                                FROM pims_personnel, pims_employment_records, pims_department
                                                WHERE pims_personnel.emp_no = pims_employment_records.emp_No
                                                AND pims_employment_records.dept_id = pims_department.dept_id
                                                AND pims_personnel.emp_no = '".$risreq['emp_No']."'");
                                                $no = mysqli_fetch_array($o);
                                                $dept = $no['dept_name'];
                                          
                                         while($item = mysqli_fetch_array($fetch_items))
                                        {
                                            $items = $item['req_qty'].' '.$item['req_unit'].' '.$item['req_item'].'<br>'.$items;
                                        }
                                        echo'
                                        <tr class="success">
                                        <td><center>'.$risreq['ris_no'].'</center></td>
                                        <td><center>'.$risreq['P_fname'].' '.$risreq['P_lname'].'</center></td>
                                        <td><center>'.$dept.'</center></td>
                                        <td><center>'.$items.'</center></td>
                                        <td><center>'.$risreq['req_date'].'</center></td>
                                        <td><center>'.$risreq['req_status'].'</center></td>
                                        <td><center><div class="btn-group" role="group" aria-label="...">
                                        <a href="../fpdf/ris.php?ris='.$risreq['ris_no'].'" class="btn btn-primary"><span class="fa fa-print" title="Print PR"></span> Print RIS</a></div></center></td>
                                        </tr>';
                                      }
                                      ?>
							
									
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