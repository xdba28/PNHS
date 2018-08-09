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
                    <h3 class="page-header" style= "color:#337ab7; font-size: 30px; font-family:Georgia;"><center>RIS REQUESTS</center></h3>	
		
	<div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                        </div>
                        <!-- /.panel-heading -->
						<br>

                                	 <div class="panel-body">
                            <div class="table-responsive">
                                 <table id="featured-datatable" class="table table-striped table-hover table-bordered">
                                    <thead>
									<tr class="success">

  										<th><center>Ris No.</th>
                                        <th><center>Requestor</th>
                                        <th><center>Date of Request</th>
                                        <th><center>View</th>
                                        
										</thead>
        <tbody>
          
		  <?php 
		  $fetch_risreq = mysqli_query($mysqli, "SELECT * FROM pms_ris, pims_personnel
			WHERE pms_ris.emp_no = pims_personnel.emp_no
			AND req_status = 'Pending'")
		  or die(mysqli_error($mysqli));
		  
		  while($risreq = mysqli_fetch_array($fetch_risreq))
		  {
			 $fetch_items = mysqli_query($mysqli, "SELECT * FROM pms_ris_req WHERE ris_no = '".$risreq['ris_no']."'")
			 or die(mysqli_error($mysqli));
			 $items = '';
			 while($item = mysqli_fetch_array($fetch_items))
			{
				$items = $item['req_qty'].' '.$item['req_unit'].' '.$item['req_item'].'<br>'.$items;
			}
			echo'
			<tr class="">
				<td><center>'.$risreq['ris_no'].'</center></td>
				<td><center>'.$risreq['P_fname'].' '.$risreq['P_lname'].'</center></td>
				<td><center>'.$risreq['req_date'].'</center></td>
				<td><center><a href="ris_request_view.php?ris='.$risreq['ris_no'].'" class="bbtn btn-outline btn btn-success btn"><i class="fa fa-eye fa-sm">View</i></button></center></td>			
			</tr>';
		  }
		  ?>
		   
			</tbody>
			<?php
				if(isset($_POST['approve']))
				{
					$risno = $_POST['ris'];
					mysqli_autocommit($mysqli, FALSE);
					$update_ris = mysqli_query($mysqli, "UPDATE pms_ris SET 
					req_status='Approved'
					WHERE ris_no='".$risno."'");
					if($update_ris)
					{
						echo '<script>
						alert("The data is saved in the ris records");
						window.location.href="ris_request.php";
						</script>';
						mysqli_commit($mysqli);
						
					 } 
					else
					{
						echo '<script>
						alert("Cannot save  record!");
						window.location.href="ris_request.php";
						</script>';
						mysqli_rollback($mysqli);
					}
				}
				if(isset($_POST['deny']))
				{
					$risno = $_POST['ris'];
					mysqli_autocommit($mysqli, FALSE);
					$update_ris = mysqli_query($mysqli, "UPDATE pms_ris SET 
					req_status='Denied'
					WHERE ris_no='".$risno."'");
					if($update_ris)
					{
						echo '<script>
						alert("The data is saved in the ris records");
						window.location.href="ris_request.php";
						</script>';
						mysqli_commit($mysqli);
						
					 } 
					else
					{
						echo '<script>
						alert("Cannot save  record!");
						window.location.href="ris_request.php";
						</script>';
						mysqli_rollback($mysqli);
					}
				}
			?>
									</table>
									
										</div>
										<!-- .panel-body -->
                            </table>
                            <!-- /.table-responsive -->
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