<!DOCTYPE html>
<html lang="en" >
<?php 
    include("../db/dbcon.php");
    include("../session.php");
    

 

  

$id=$_GET['pcode'];
   $sql="SELECT pms_iar_con.received_qty,pms_po.po_no,ims_storage.emp_no,ims_storage.p_code,ims_storage.stor_id, pms_ris_req.req_item, pms_ris_req.req_item_id, pms_ris_req.req_desc, pms_ris_req.req_unit, pms_po_con.unit_cost,pims_personnel.P_lname,pims_personnel.P_fname, ims_storage.stor_qty, ims_storage.stor_date, pms_supplier.company_name,pims_personnel.emp_no,ims_storage.stor_id,ims_storage.stor_qty FROM pms_ris, pms_ris_req, pms_iar, pms_pr, pms_pr_con, pms_iar_con,pms_po_con,pms_po, pims_personnel, pms_supplier, ims_storage WHERE pms_ris.ris_no=pms_ris_req.ris_no AND pms_ris_req.req_item_id=pms_pr_con.req_item_id AND pms_pr.pr_no=pms_pr_con.pr_no AND pms_supplier.company_id=pms_po.company_id AND pms_po.po_no=pms_po_con.po_no AND pms_po_con.pr_id=pms_pr_con.pr_id AND pms_iar.iar_no=pms_iar_con.iar_no AND pms_iar_con.po_id=pms_po_con.po_id AND ims_storage.emp_no=pims_personnel.emp_No AND pms_iar_con.iar_id=ims_storage.iar_id AND pms_po.po_no='$id'
  ";
      $res=mysqli_query($mysqli,$sql);
     

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "class_db");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}



?>




    


<head>
  <meta charset="UTF-8">
  <title>PAG-ASA National High School</title>
    <link href="http://fonts.googleapis.com/css?family=Dosis:400,500,700" rel="stylesheet" type="text/css">
    <link rel='stylesheet prefetch' href='../css/bootstrap.min.css'>
    <link rel="icon" href="../img/pnhs_favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/w3.css">
    <link rel="stylesheet" href="../css/notif.css">

    <!-- MetisMenu CSS -->
    <link href="../vendor/dist/css/sb-admin-2.css" rel="stylesheet">
  
  <!-- Icons CSS -->
    <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css" type="text/css">
   
    
    <!-- Latest compiled and minified JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    
  <style>
    

table, td, tr,th
            {
                border: 1px solid #000000;
            }
    </style>
</head>
    
<body>
<?php include("../topnav.php");?>    
<div id="wrapper">
        
    
         <!-- Sidebar -->
        <?php include("../sidenav.php");?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
       
            <div class="container" style="margin-left: 15px">
                <br> <br> <br>
               
        <form>
          <input class="btn btn-primary btn" type="button" value="Go back" onclick="history.back()">
          </input>
        </form> 

   
        <div class="row"> </br>
        <div class="col-lg-12">
        <div class="panel panel-default">         
          
            <!-- Nav tabs -->
            
              <!-- Tab panes -->
              
                        
                        
                              <div class="panel-heading">
                                
              
                
                <center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<button onclick="location.href='pro.php?po=<?php echo $id; ?>'" name="print" class="btn btn-outline btn-primary btn"><h2><i class="fa fa-print">  Print</i></h2></center></button>
                <div class="container"> 
                
                  <div class="col-lg-11">
                     
                      
                      <!-- /.panel-heading -->
                      <div class="panel-body">
                      <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                      
                      <div class="table-responsive">
                      
                      <td class='hide_all'><center><h3>REQUISITION AND ISSUE SLIP</h3><br></center>
                      <center><h6>PAG-ASA NATIONAL HIGH SCHOOL</h6><br></center>
                      <br>
                      </div>
                      
                              <table>
                                  <tr>
                                      
                                      <th><center>Stock #</center></th>
                                      <th><center>Item Unit</center></th>
                                      <th width = "600"><center>Description</center></th>
                                      <th><center>Quantity</center></th>
                                      <th><center>Quantity</center></th>
                                      <th width = "115"><center>Remarks</center></th>
                                  </tr>





  
<?php while($row = mysqli_fetch_array($res)):?>
                <tr>
                    
                    <td><center><?php echo $row['stor_id'];?></center></td>
                    <td><center><?php echo $row['req_unit'];?></center></td>
                    <td><center><?php echo $row['req_item'].' '.$row['req_desc'];?></center></td>
                    <td><center><?php echo $row['received_qty'];?></center></td>
                    <td><center><?php echo $row['received_qty'];?></center></td>
                    <td><center></center></td>
                </tr>
                <?php endwhile;?>
                
            </table>
            <br><br><br>
           
            <table>
              <td width = "1000">Purpose:___________________________________________________________________________________________<br>
              _________________________________________________________________________________________________</td>
            </table>
           
            <table>
            <tr>                          
                <th width = "200"><center>Data</center></th>
                <th width = "200"><center>Requested By:</center></th>
                <th width = "200"><center>Approved By:</center></th>
                <th width = "200"><center>Issued By:</center></th>
                <th width = "200"><center>Received By:</center></th>
            </tr>
        </table>
        <table>
            <tr>
            <td width = "200"><center>Signature</center></th>
            <td width = "190">__________________</th>
            <td width = "190">__________________</th>
            <td width = "190">__________________</th>
            <td width = "190">__________________</th>
            </tr>
        </table>

         <?php
{
            $qry="SELECT pims_personnel.P_lname,pims_personnel.P_fname FROM pms_po_con, pms_supplier, pms_pr_con, pms_ris_req, ims_storage, pms_ris, pms_pr, pms_po, pms_iar,pims_personnel, pms_iar_con WHERE pms_ris.ris_no=pms_ris_req.ris_no AND pms_ris_req.req_item_id=pms_pr_con.req_item_id AND pms_pr.pr_no=pms_pr_con.pr_no AND pms_supplier.company_id=pms_po.company_id AND pms_po.po_no=pms_po_con.po_no AND pms_po_con.pr_id=pms_pr_con.pr_id AND pms_iar.iar_no=pms_iar_con.iar_no AND pms_iar_con.po_id=pms_po_con.po_id AND ims_storage.emp_no=pims_personnel.emp_No AND pms_iar_con.iar_id=ims_storage.iar_id AND pms_po.po_no='$id' ";
                                  $p="SELECT pims_personnel.P_fname,pims_personnel.P_lname FROM pims_personnel,pims_employment_records,pims_job_title WHERE pims_employment_records.emp_no=pims_personnel.emp_no AND pims_employment_records.job_title_code=pims_job_title.job_title_code AND pims_job_title.job_title_code LIKE '%SP%'";
                                  $so="SELECT pims_personnel.P_fname,pims_personnel.P_lname FROM pims_personnel,pims_employment_records,pims_job_title WHERE pims_employment_records.emp_no=pims_personnel.emp_no AND pims_employment_records.job_title_code=pims_job_title.job_title_code AND pims_job_title.job_title_code LIKE '%SUO%'";
}

    $filter_Result = mysqli_query($mysqli, $qry);
        $row=mysqli_fetch_assoc($filter_Result);
    $filter_Result1 = mysqli_query($mysqli, $so);
          $sow=mysqli_fetch_assoc($filter_Result1);
    $filter_Result2 = mysqli_query($mysqli, $p);
          $sp=mysqli_fetch_assoc($filter_Result2);
            ?>
        <table>
            <tr>
            <td width = "194"><center>Printed Name</center></th>
            <td width = "200"><center><?php echo $row['P_lname'],',',$row['P_fname'];?></center></th>
            <td width = "196"><center><?php echo $sp['P_lname'],',',$sp['P_fname'];?></center></th>
            <td width = "197"><center><?php echo $sow['P_lname'],',',$sow['P_fname'];?></center></th>
            <td width = "196"><center><?php echo $row['P_lname'],',',$row['P_fname'];?></center></th>
            </tr>

        </table>
        <table>
            <tr>
            <td width = "200"><center>Date</center></th>
            <td width = "200"><center><?php echo date("Y-m-d") ?></center></th>
            <td width = "200"><center><?php echo date("Y-m-d") ?></center></th>
            <td width = "200"><center><?php echo date("Y-m-d") ?></center></th>
            <td width = "200"><center><?php echo date("Y-m-d") ?></center></th>
            </tr>
        </table>
        </form>
 


  



                      </table>
                      <!-- /.table-responsive -->     
                      </div>
                      <!-- /.panel-body -->
                      
                    </div>
                    </div> 
                  <!-- /.col-lg-12 -->
                  
                  </div>
                  
                  
                </div> <center>           
                <a  class="btn btn-outline btn-primary btn" href='eqpborrow.php'>Back to Top</a><br>
                  
              
          
            </div>        
          <!-- /.tab-content -->  
        
        <!-- /.panel-body -->
        </div>  </br>     
        <!-- /.panel -->
        </div> <br> <br> <br>
      </div>
      <!-- /.col-lg-6 -->
      
  

    

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/alert.js"></script>
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script  src="../js/index.js"></script>
<script src="../js/metisMenu.min.js"></script>
<script src="../js/sb-admin-2.min.js"></script>

<script>
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>



  <script>
    $(document).ready(function() {
      $('#dataTables-example').DataTable({
        responsive: true
      });
    });
  </script>
  
  
<footer class="w3-theme-bd5">
         <div class="container">
            <div class="col-lg-3 col-md-3">
               <h3 class="h3">PNHS</h3>
               <h6>All Rights Reserved &copy; 2018</h6>
            </div>
            <div class="col-lg-3 col-md-3">
               <h1 class="h3">ADDRESS</h1>
               <h6><b>Pag-asa National Highschool</b><br><span>PNHS Building, Rawis, East Service<br>  Road, Legazpi City, PH 2424</span></h6>
            </div>
            <div class="col-lg-3 col-md-3">
               <h3 class="h3">CONTACT US</h3>
               <h6 class="w3-justify">
                  <b>Phone:</b>
                  <span>(+632) 887-2232</span>
                  <br>
                  <b>E-mail:</b> 
                  <span>officialpnhs@pnhs.gov.ph</span>
                  <br>
               </h6>
            </div>
             <div class="col-lg-3 col-md-3">
               <h3 class="h3">FOLLOW US ON:</h3>
                  <a href="#"><i class="fa fa-bullseye w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-phone w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-facebook w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-twitter w3-xlarge" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-google-plus w3-xlarge" aria-hidden="true"></i></a>
            </div>
         </div>
      </footer>
    </div>
    <!-- /#wrapper -->
    
</body>
</html>


<?php

if(isset($_POST['print']))
{
  ?>
<script type="text/javascript">


window.location="pro.php";


</script>

  <?php
}


?>

