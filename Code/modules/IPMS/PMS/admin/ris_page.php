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
        
<?php                                  
if(isset($_GET['seen'])){

  $update_ris_seen = mysqli_query($mysqli,"UPDATE pms_ris SET ris_admin_seen = '1'"); 
    
}
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
                <h3 class="page-header" style = "color:#337ab7; font-size: 30px; font-family:Georgia;"><center>Requisition and Issuance Slip</center></h3>	
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
                                        <th><center>RIS No.</center></th>
                                        <th><center>Personnel</center></th>
                                        <th><center>Department</center></th>
                                        <th><center>Date Requested</center></th>
                                        <th><center>Print</center></th>
                                        <th><center>Action</center></th>
                                    </tr>
                                    </thead>
                                    <tbody>
									
									<?php  

                                        $sql = mysqli_query($mysqli, "SELECT *, pms_ris.emp_no,concat(p_fname,' ',p_lname) as Name,req_date from pms_ris,pms_ris_req,pims_personnel 
                                        WHERE NOT EXISTS (SELECT req_item_id FROM pms_pr_con WHERE pms_ris_req.req_item_id = pms_pr_con.req_item_id) AND pims_personnel.emp_no=pms_ris.emp_no AND req_status='Approved'
                                        AND pms_ris.ris_no = pms_ris_req.ris_no
                                        ")
										or die(mysqli_error($mysqli));

                                        $ris_no_prev = 0;
                                        while($row = mysqli_fetch_array($sql)){
                                            
											$o=mysqli_query($mysqli, "SELECT dept_name
													FROM pims_personnel, pims_employment_records, pims_department
													WHERE pims_personnel.emp_no = pims_employment_records.emp_No
													AND pims_employment_records.dept_id = pims_department.dept_id
													AND pims_personnel.emp_no = '".$row['emp_No']."'");
													$no = mysqli_fetch_array($o);
													$dept = $no['dept_name'];
											if ($row['ris_no'] != $ris_no_prev) {
											echo'
											<tr class="">
												<td><center>'.($row['ris_no']).'</center></td>
												<td><center>'.($row['Name']).'</center></td> 								
												<td><center>'.$dept.'</center></td>
												<td><center>'.($row['req_date']).'</center></td>
                                                <td><center><div class="btn-group" role="group" aria-label="...">
                                            <a href="../fpdf/ris.php?ris='.$row['ris_no'].'"class="btn btn-primary"><span class="fa fa-print" title="Print PR"></span> Print RIS</a></div></center></td>
												<td><center><div class="btn-group" role="group" aria-label="..."><a href="pr_page.php?ris='.$row['ris_no'].'" class="btn btn-success"><span class="fa fa-edit" title="Create PR"></span> Create PR</a></div></center></td>
											</tr>';
											$ris_no_prev = $row['ris_no'];
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
                
			
    </div>
    <?php include("../include/footer.php");   ?>
</div>

            <script src='../js/jquery.min.js'></script>
            <script src='../js/bootstrap.min.js'></script>
            <script src="../js/index.js"></script>
        
            <script src='../../../../js/sb-admin-2.min.js'></script>
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