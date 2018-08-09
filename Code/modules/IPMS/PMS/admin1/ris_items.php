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
                        <h3 class="page-header" style = "color:#337ab7; font-size: 30px; font-family:Georgia;">RIS | <i>Requested Items</i></h3>	
                        <br>
						
						<div class="row">
						<div class="col-md-1">
						<a href="ris_request.php" button type="button" class="bbtn btn-outline btn btn-success btn"><i class="fa fa-reply fa-sm"></i></button></a>
						</div>
						<div class="col-md-1"></div>
						<div class="col-md-1"></div>
						<div class="col-md-1"></div>
						<div class="col-md-1"></div>
						<div class="col-md-1"></div>
						<div class="col-md-1"></div>
						<div class="col-md-1"></div>
						<div class="col-md-1"></div>
						<div class="col-md-1"></div>
						<div class="col-md-1">
						</div>
						<div class="col-md-1"></div>
						</div>

						<br>
						<div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    
                                </div>
                                <br>
                                
                                <div class="panel-body">
                                    <form action="qty.php" method="get">
                                    <div class="table-responsive">
                                        <table width="100%" class="table table-striped table-bordered table-hover" border='2' id="dataTables-example">

                                            <thead>
                                            <tr class="info">
                                                <th class="col-xs-2"><center>Unit</center></th>
                                                <th class="col-xs-3"><center>Item Name</center></th>
                                                <th class="col-xs-1"><center>Quantity</center></th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            
                                                <tr>
                                                    <td><center></center></td>
                                                    <td><center><input value="" type="hidden" id="qty_"></center></td>
                                                    <td><center></center></td>
                                                </tr>
                                           
                                            </tbody>


                                        </table>
                                    </div>
                                    </form>
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
			<script>
    var x=document.getElementById('num').value;
    function cal($i)
    {
        var est = document.getElementById('est_'+$i+'').value;
        var quantity = document.getElementById('qty_'+$i+'').value;
        document.getElementById('tot_'+$i+'').value = (est*quantity).toFixed(2);
    }
    
 
$('.est').on('change', function(){

    var subtotal = 0;
    $('.est').each(function(){
        var $this = $(this);
        var quantity = parseInt($this.val());
        var price = parseFloat($this.siblings('.tot).val())
        subtotal+=quantity*price;
    })
    $('.total').text(total);

})
$('.est').trigger('change')
</script> 
        </body>
    </html>