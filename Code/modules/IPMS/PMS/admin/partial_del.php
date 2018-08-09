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
    <body>
        
<?php 
include("../include/topnav.php"); 
?>
        
<div id="wrapper">
    
     <?php
        include("../include/sidenav.php");
  ?>
                <div class="container">
                  <div id="page-wrapper">
            <div class="row">
                <div class="col-sm-12">
				<br>
                <h3 class="page-header" style = "color:#337ab7; font-size: 30px; font-family:Georgia;"><center>IAR RECORDS OF PARTIAL DELIVERY</center></h3>	
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
                                        <th><center>IAR No.</center></th>
                                        <th><center>PO No.</center></th>
                                        <th><center>Date of Last Delivery</center></th>
                                        <th><center>Date of Next Delivery</center></th>
                                        <th><center>Date of Inspection</center></th>
                                        <th><center>Status</th>
                                        <th><center>Action</center></th>
                                    </tr>
                                    </thead>
                                    <tbody>
									

                                      <?php 
                                      $fetch_iar = mysqli_query($mysqli, "SELECT * FROM pms_iar, pms_iar_con, pms_po, pms_po_con, pms_pr_con, pms_ris_req
                                      WHERE pms_iar_con.po_id = pms_po_con.po_id
                                      AND pms_po.po_no = pms_po_con.po_no
                                      AND pms_iar.iar_no = pms_iar_con.iar_no
									  AND pms_iar.iar_status = 'Partial'
                                      AND pms_pr_con.pr_id = pms_po_con.pr_id
                                      AND pms_ris_req.req_item_id = pms_pr_con.req_item_id
									  AND pms_iar_con.status = 'NOT COMPLETE'")
                                      or die(mysqli_error($mysqli));
                                        
                                      $iar_no_prev = 0;      
                                      while($preq = mysqli_fetch_array($fetch_iar))
                                      {
                                        if ($iar_no_prev != $preq['iar_no']) {
											echo'
											<tr class="warning">
											<td><center>'.$preq['iar_no'].'</center></td>
											<td><center>'.$preq['po_no'].'</center></td>
											<td><center>'.$preq['received_date'].'</center></td>
											<td><center>'.$preq['next_del_date'].'</center></td>
											<td><center>'.$preq['ins_date'].'</center></td>
											<td><center>'.$preq['status'].'</center></td>
											<td><center><div class="btn-group" role="group" aria-label="...">
											<a href="add_iar_partial.php?ris='.$preq['ris_no'].'&pr='.$preq['pr_no'].'&po='.$preq['po_no'].'" class="btn btn-primary"><span class="fa fa-edit" title="New IAR"></span> New IAR</a></div></center></td>
											</tr>';
											$iar_no_prev = $preq['iar_no'];
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
 </div>              </div>
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