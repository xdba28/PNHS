<!DOCTYPE html>
<html lang="en" >
<?php
date_default_timezone_set('Asia/Manila');
        $date=date("Y-m-d");
?>
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
    
<?php 
include("../include/topnav.php"); 
?>

<?php                                  
if(isset($_GET['seen'])){

  $update_po_seen = mysqli_query($mysqli,"UPDATE pms_po SET po_seen = '1'"); 
    
}
?>
    
    <body>
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
                <h3 class="page-header" style = "color:#337ab7; font-size: 30px; font-family:Georgia;"><center>Purchase Orders</center></h3>	
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
            <br>

				        <div class="panel-body"><form action="qty.php" method="get">
                            <div class="table-responsive">
                                <table id="featured-datatable" class="table table-striped table-hover table-bordered">
                                    
                                    <thead>
                                    <tr class="info">
                                        <th><center>PO No.</center></th>
                                        <th><center>PR No.</center></th>
                                        <th><center>Supplier</center></th>
                                        <th><center>Total Cost</center></th>
                                        <th><center>Print</center></th>
                                        <th><center>Action</center></th>
                                    </tr>
                                    </thead>
                                    <tbody>
									

									<?php 
									$fetch_po = mysqli_query($mysqli, "SELECT * FROM pms_ris, pms_ris_req, pms_pr, pms_pr_con, pms_po_con, pms_po, pims_personnel, pms_supplier 
									WHERE NOT EXISTS (SELECT po_id FROM pms_iar_con WHERE pms_iar_con.po_id = pms_po_con.po_id) AND pms_ris.ris_no = pms_ris_req.ris_no
									AND pms_pr.pr_no = pms_pr_con.pr_no
									AND pms_po.po_no = pms_po_con.po_no
									AND pms_ris_req.req_item_id = pms_pr_con.req_item_id
									AND pms_pr_con.pr_id  = pms_po_con.pr_id
									AND pms_po.po_status = 'Approved' AND pims_personnel.emp_No = pms_ris.emp_no AND pms_po.company_id  = pms_supplier.company_id ORDER BY pms_po.po_no")or die(mysqli_error($mysqli));
                                        
									$po_no_prev = 0;
                                      while($preq = mysqli_fetch_array($fetch_po))
                                      {
										  if ($po_no_prev != $preq['po_no']) {
											echo'
											<tr class="">
											<td><center>'.$preq['po_no'].'</center></td>
											<td><center>'.$preq['pr_no'].'</center></td>
											<td><center>'.$preq['company_name'].'</center></td>
											<td><center>'.$preq['po_total'].'</center></td>
                                            <td><center><div class="btn-group" role="group" aria-label="...">
                                            <a href="../fpdf/purchase_order.php?po='.$preq['po_no'].'" class="btn btn-primary"><span class="fa fa-print" title="Print PR"></span> Print PO</a></div></center></td>
											<td><center><div class="btn-group" role="group" aria-label="...">
											<a href="iar_page.php?ris='.$preq['ris_no'].'&pr='.$preq['pr_no'].'&po='.$preq['po_no'].'" class="btn btn-success"><span class="fa fa-edit" title="Create IAR"></span> Create IAR</a></div></center></td>
											</tr>';
											$po_no_prev = $preq['po_no'];
										  }
                                      }
                                      ?>
							
                                    </tbody>

                                
                            </table>
				            </div>
				            <br><br>
    
                            </form><br>
                            <br>
                            <!-- Button trigger modal -->
                            <!-- Modal -->
                            <!-- /.table-responsive -->
                       

							</div>
							</div>
							</div>
							
				
</div>
  
  
</div>
</div> 
</div>                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
    <?php   include("../include/footer.php"); ?>
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