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
                    <h3 class="page-header" style = "color:#337ab7; font-size: 30px; font-family:Georgia;"><center>Issuance and Acceptance Report</center></h3>
                </div>

                        <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                        <!-- /.panel-heading -->
            <br>

              <div class="panel-body">
                                <div class="table-responsive">
                                <table class="table" border='1'>
                                    <thead>
                                        <tr>

                      <th><center>IAR No.</th>
                                        <th><center>Date of Transaction</th>
                                        <th><center>Transaction</th>
                                        </tr>
                                    </thead>

                  <?php  while($row = mysqli_fetch_array($sql)){
                    
                    ?>
                    
                                        <tr>
                      <td><center><input onchange="myfunction1()" name="iar_no[]" style="text-align:center" <?php if($row['iar_no']==0){ echo "disabled"; }?> value="<?php echo $row['iar_no'];?>"></td>
                      <td><center><?php echo $row['received_date'];?></center></td>
                    <td><center><i class="fa fa-shopping-cart fa-fw-o btn btn-info btn"></center></i></td>
                      <!-- <td><center><?php if($row['iar_no']!=0){?><span style="color:green"><span class="fa fa-check-circle"></span> Success</span><?php }else{?><span style="color:red"><span class="fa fa-times-circle"></span> Wara pa sya</span><?php }?></center></td> -->
                                        </tr>
                  <?php } ?>

                                

                   

                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
    
    
              </div>
              </div>
              </div>
              <br>
   <center>
    </button></center><br></br>

              
        
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
        </body>
    </html>