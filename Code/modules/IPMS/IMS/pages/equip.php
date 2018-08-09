<!DOCTYPE html>
<html lang="en" >
<?php
    include("../db/dbcon.php");
    include("../session.php");
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
	
	<!-- DataTables CSS -->
	<link href="../css/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
		<link href="../css/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../css/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
	
	<!-- Latest compiled and minified JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    
  <style>
   
	.table table-striped table-bordered table-hover{
		border: 2px solid #003E7C;
	}
	.table, thead, tbody, tr, td, th{
		border: 2px solid #003E7C;
		text-align: center;
	}
	.thead, tr, th{
		border: 2px solid #003E7C;
		text-align: center;
	}
	.tbody, tr, td{
		border: 2px solid #003E7C;
		text-align: center;
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
			 
            <div class="container-fluid" style="margin-left: 30px">
                <br> <br>
               
                    
				<form>
					<input class="btn btn-primary btn" type="button" value="Go back" onclick="history.back()">
					</input>
				</form> 
				
				<div class="row"> </br>
				<div class="col-lg-16">
				<div class="panel panel-default">         
				  <div class="panel-body">
					  <!-- Nav tabs -->
						<ul class="nav nav-pills">
							<li class="active"><a href="#clinic-pills" data-toggle="tab">Clinic</a>
							</li>
							<li><a href="#common-pills" data-toggle="tab">Common</a>
							</li>
							<li><a href="#electrics-pills" data-toggle="tab">Electric</a>
							</li>
							<li><a href="#hardware-pills" data-toggle="tab">Hardware</a>
							</li>
							<li><a href="#IT-pills" data-toggle="tab">I.T.</a>
							</li>
							<li><a href="#janitorials-pills" data-toggle="tab">Janitorial</a>
							</li>
							<li><a href="#sports-pills" data-toggle="tab">Sports</a>
							</li>
							
							 
						</ul>
						</br>
						  <!-- Tab panes -->
						  <div class="tab-content">
							<div class="tab-pane fade in active" id="clinic-pills">
								<div class="row">
									<div class="col-lg-12">
									   <div class="panel panel-default">
										  <div class="panel-heading w3-theme-bd5">
											<h4><p class="fa fa-medkit"> Clinic Equipment </p></h4>
											</div>
  
											
											<!-- /.panel-heading -->
											<div class="panel-body">
											<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
  
<?php
if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];

    $query="SELECT DISTINCT pms_ris_req.req_item_id,pms_po.po_no,P_lname,P_fname,pms_po_con.unit_cost,ims_storage.stor_id,pms_ris_req.req_unit,ims_storage.stor_qty,ims_storage.emp_no,ims_storage.stor_date,pms_ris_req.req_desc,pms_ris_req.req_item,ims_storage.p_code FROM pims_personnel,pms_po_con, pms_supplier, pms_pr_con, pms_ris_req, ims_storage, pms_ris, pms_pr, pms_po, pms_iar, pms_iar_con WHERE pms_ris.ris_no=pms_ris_req.ris_no AND pms_ris_req.req_item_id=pms_pr_con.req_item_id AND pms_pr.pr_no=pms_pr_con.pr_no AND pms_supplier.company_id=pms_po.company_id AND pms_po.po_no=pms_po_con.po_no AND pms_po_con.pr_id=pms_pr_con.pr_id AND pms_iar.iar_no=pms_iar_con.iar_no AND pms_iar_con.po_id=pms_po_con.po_id AND pms_iar_con.iar_id=ims_storage.iar_id AND ims_storage.emp_no=pims_personnel.emp_no AND ims_storage.item_type='Clinic' AND ims_storage.equipment='1' AND ims_storage.ins='0'
	AND CONCAT(req_item,stor_qty,stor_date,unit_cost,p_code,req_desc,company_name) 
	LIKE '%".$valueToSearch."%'
	";
    $search_result = filterTable($query);
	
    }
 else {
    $query="SELECT DISTINCT pms_ris_req.req_item_id,pms_po.po_no,P_lname,P_fname,pms_po_con.unit_cost,ims_storage.stor_id,pms_ris_req.req_unit,ims_storage.stor_qty,ims_storage.emp_no,ims_storage.stor_date,pms_ris_req.req_desc,pms_ris_req.req_item,ims_storage.p_code FROM pims_personnel,pms_po_con, pms_supplier, pms_pr_con, pms_ris_req, ims_storage, pms_ris, pms_pr, pms_po, pms_iar, pms_iar_con WHERE pms_ris.ris_no=pms_ris_req.ris_no AND pms_ris_req.req_item_id=pms_pr_con.req_item_id AND pms_pr.pr_no=pms_pr_con.pr_no AND pms_supplier.company_id=pms_po.company_id AND pms_po.po_no=pms_po_con.po_no AND pms_po_con.pr_id=pms_pr_con.pr_id AND pms_iar.iar_no=pms_iar_con.iar_no AND pms_iar_con.po_id=pms_po_con.po_id AND pms_iar_con.iar_id=ims_storage.iar_id AND ims_storage.emp_no=pims_personnel.emp_no AND ims_storage.item_type='Clinic' AND ims_storage.equipment='1' AND ims_storage.ins='0'
    ";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "class_db");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}



?>


		
  
  		
  			
									<thead class="w3-theme-bdark">
										<tr>
									                    <th><center>#</center></th>
									                    <th><center>Item Name</center></th>
									                    <th width="1%"><center>Description</center></th>
									                    <th><center> Item Unit</center></th>
									                    <th><center>Qty</center></th>
									                    <th><center>Product Code</center></th>
									                    <th><center>Date Acquired</center></th>
                                                        <th><center>Requested By</center></th>
                                                        <th><center>PO #</center></th>
									                    <th><center>Action</center></th>
									                </tr>

									</thead>
									<tbody>


  
<?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><center><?php echo $row['stor_id'];?></center></td>
                    <?php 
						if ($row['stor_qty'] <= 20){
							 echo "<td style='background-color:tomato;'><center><span>".$row['req_item']."</span></center></td>";			 
							}
						else{
							echo "<td><center><span >".$row['req_item']."</span></center></td>";
							} 
						?>
                    <td width="1%"><center><?php echo $row['req_desc'];?></center></td>
                    <td><center><?php echo $row['req_unit'];?></center></td>
                    <td><center><?php echo $row['stor_qty'];?></center></td>
                    <td><center><?php echo $row['p_code'];?></center></td>
                    <td><center><?php echo $row['stor_date'];?></center></td>
                    <td><center><?php echo $row['P_lname'].','.$row['P_fname'];?></center></td>
                    <td><center><?php echo $row['po_no'];?></center></td>
                    <td><center><a class="btn btn-primary btn" href='edit-data1.php?pcode=<?php echo $row['req_item_id']; ?>'>Update</a></center><br>
                    <center>
                        <a class="btn btn-primary btn" href='eqpborrow.php?pcode=<?php echo $row['po_no']; ?>'>Issuance</a></center></td>

                </tr>
                <?php endwhile;?>
										
									</tbody>
  



  



											</table>
											</form>
											<!-- /.table-responsive -->			
											</div>
											<!-- /.panel-body -->
										</div>
										<!-- /.panel -->
									</div>
									<!-- /.col-lg-9 -->
									</div>
									<!-- /.row -->
								</div>
								<!-- /.tab-pane -->
							
					
							
							<div class="tab-pane fade" id="common-pills">
								<div class="row">
									<div class="col-lg-12">
									   <div class="panel panel-default">
										  <div class="panel-heading w3-theme-bd5">
											<h4><p class="fa fa-pencil"> Common Equipment </p></h4>
											</div>
											
											
											<!-- /.panel-heading -->
											<div class="panel-body">
											<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example1">
  
<?php
if(isset($_POST['search1']))
{
    $valueToSearch1 = $_POST['valueToSearch1'];

    $query1="SELECT DISTINCT pms_ris_req.req_item_id,pms_po.po_no,P_lname,P_fname,pms_po_con.unit_cost,ims_storage.stor_id,pms_ris_req.req_unit,ims_storage.stor_qty,ims_storage.emp_no,ims_storage.stor_date,pms_ris_req.req_desc,pms_ris_req.req_item,ims_storage.p_code FROM pims_personnel,pms_po_con, pms_supplier, pms_pr_con, pms_ris_req, ims_storage, pms_ris, pms_pr, pms_po, pms_iar, pms_iar_con WHERE pms_ris.ris_no=pms_ris_req.ris_no AND pms_ris_req.req_item_id=pms_pr_con.req_item_id AND pms_pr.pr_no=pms_pr_con.pr_no AND pms_supplier.company_id=pms_po.company_id AND pms_po.po_no=pms_po_con.po_no AND pms_po_con.pr_id=pms_pr_con.pr_id AND pms_iar.iar_no=pms_iar_con.iar_no AND pms_iar_con.po_id=pms_po_con.po_id AND pms_iar_con.iar_id=ims_storage.iar_id AND ims_storage.emp_no=pims_personnel.emp_no 
        AND ims_storage.item_type='Common' AND ims_storage.equipment='1' AND ims_storage.ins='0'
	AND CONCAT(req_item,stor_qty,stor_date,unit_cost,p_code,req_desc,company_name) 
	LIKE '%".$valueToSearch1."%'
	";
    $search_result1 = filterTable1($query1);
	
    }
 else {
    $query1="SELECT DISTINCT pms_ris_req.req_item_id,pms_po.po_no,P_lname,P_fname,pms_po_con.unit_cost,ims_storage.stor_id,pms_ris_req.req_unit,ims_storage.stor_qty,ims_storage.emp_no,ims_storage.stor_date,pms_ris_req.req_desc,pms_ris_req.req_item,ims_storage.p_code FROM pims_personnel,pms_po_con, pms_supplier, pms_pr_con, pms_ris_req, ims_storage, pms_ris, pms_pr, pms_po, pms_iar, pms_iar_con WHERE pms_ris.ris_no=pms_ris_req.ris_no AND pms_ris_req.req_item_id=pms_pr_con.req_item_id AND pms_pr.pr_no=pms_pr_con.pr_no AND pms_supplier.company_id=pms_po.company_id AND pms_po.po_no=pms_po_con.po_no AND pms_po_con.pr_id=pms_pr_con.pr_id AND pms_iar.iar_no=pms_iar_con.iar_no AND pms_iar_con.po_id=pms_po_con.po_id AND pms_iar_con.iar_id=ims_storage.iar_id AND ims_storage.emp_no=pims_personnel.emp_no 
        AND ims_storage.item_type='Common' AND ims_storage.equipment='1' AND ims_storage.ins='0'";
    $search_result1 = filterTable1($query1);
}

// function to connect and execute the query
function filterTable1($query1)
{
    $connect = mysqli_connect("localhost", "root", "", "class_db");
    $filter_Result1 = mysqli_query($connect, $query1);
    return $filter_Result1;
}



?>


		
  
  		
  			
									<thead class="w3-theme-bdark">
										<tr>
									                    <th><center>#</center></th>
									                    <th><center>Item Name</center></th>
									                    <th width="1%"><center>Description</center></th>
									                    <th><center> Item Unit</center></th>
									                    <th><center>Qty</center></th>
									                    <th><center>Product Code</center></th>
									                    <th><center>Date Acquired</center></th>
                                                        <th><center>Requested By</center></th>
                                                        <th><center>PO #</center></th>
									                    <th><center>Action</center></th>
									                </tr>

									</thead>
									<tbody>


  
<?php while($row = mysqli_fetch_array($search_result1)):?>
                <tr>
                    <td><center><?php echo $row['stor_id'];?></center></td>
                    <?php 
						if ($row['stor_qty'] <= 20){
							 echo "<td style='background-color:tomato;'><center><span>".$row['req_item']."</span></center></td>";			 
							}
						else{
							echo "<td><center><span >".$row['req_item']."</span></center></td>";
							} 
						?>
                    <td width="1%"><center><?php echo $row['req_desc'];?></center></td>
                    <td><center><?php echo $row['req_unit'];?></center></td>
                    <td><center><?php echo $row['stor_qty'];?></center></td>
                    <td><center><?php echo $row['p_code'];?></center></td>
                    <td><center><?php echo $row['stor_date'];?></center></td>
                    <td><center><?php echo $row['P_lname'].','.$row['P_fname'];?></center></td>
                    <td><center><?php echo $row['po_no'];?></center></td>
                    <td><center><a class="btn btn-primary btn" href='edit-data1.php?pcode=<?php echo $row['req_item_id']; ?>'>Update</a></center><br>
                    <center><a class="btn btn-primary btn" href='eqpborrow.php?pcode=<?php echo $row['po_no']; ?>'>Issuance</a></center></td>

                </tr>
                <?php endwhile;?>
										
									</tbody>
  



  



											</table>
											</form>
											<!-- /.table-responsive -->			
											</div>
											<!-- /.panel-body -->
										</div>
										<!-- /.panel -->
									</div>
									<!-- /.col-lg-9 -->
									</div>
									<!-- /.row -->						
									</div>
									<!-- /.tab-pane -->

							
							
							<div class="tab-pane fade" id="electrics-pills">
								<div class="row">
									<div class="col-lg-12">
									   <div class="panel panel-default">
										  <div class="panel-heading w3-theme-bd5">
											<h4><p class="fa fa-flash"> Electric Equipment </p></h4>
											</div>									
            
											
											<!-- /.panel-heading -->
											<div class="panel-body">
											<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example2">
  
<?php
if(isset($_POST['search2']))
{
    $valueToSearch2 = $_POST['valueToSearch2'];

    $query2="SELECT DISTINCT pms_ris_req.req_item_id,pms_po.po_no,P_lname,P_fname,pms_po_con.unit_cost,ims_storage.stor_id,pms_ris_req.req_unit,ims_storage.stor_qty,ims_storage.emp_no,ims_storage.stor_date,pms_ris_req.req_desc,pms_ris_req.req_item,ims_storage.p_code FROM pims_personnel,pms_po_con, pms_supplier, pms_pr_con, pms_ris_req, ims_storage, pms_ris, pms_pr, pms_po, pms_iar, pms_iar_con WHERE pms_ris.ris_no=pms_ris_req.ris_no AND pms_ris_req.req_item_id=pms_pr_con.req_item_id AND pms_pr.pr_no=pms_pr_con.pr_no AND pms_supplier.company_id=pms_po.company_id AND pms_po.po_no=pms_po_con.po_no AND pms_po_con.pr_id=pms_pr_con.pr_id AND pms_iar.iar_no=pms_iar_con.iar_no AND pms_iar_con.po_id=pms_po_con.po_id AND pms_iar_con.iar_id=ims_storage.iar_id AND ims_storage.emp_no=pims_personnel.emp_no 
        AND ims_storage.item_type='Electric' AND ims_storage.equipment='1' AND ims_storage.ins='0'
	AND CONCAT(req_item,stor_qty,stor_date,unit_cost,p_code,req_desc,company_name) 
	LIKE '%".$valueToSearch2."%'
	";
    $search_result2 = filterTable2($query2);
	
    }
 else {
    $query2="SELECT DISTINCT pms_ris_req.req_item_id,pms_po.po_no,P_lname,P_fname,pms_po_con.unit_cost,ims_storage.stor_id,pms_ris_req.req_unit,ims_storage.stor_qty,ims_storage.emp_no,ims_storage.stor_date,pms_ris_req.req_desc,pms_ris_req.req_item,ims_storage.p_code FROM pims_personnel,pms_po_con, pms_supplier, pms_pr_con, pms_ris_req, ims_storage, pms_ris, pms_pr, pms_po, pms_iar, pms_iar_con WHERE pms_ris.ris_no=pms_ris_req.ris_no AND pms_ris_req.req_item_id=pms_pr_con.req_item_id AND pms_pr.pr_no=pms_pr_con.pr_no AND pms_supplier.company_id=pms_po.company_id AND pms_po.po_no=pms_po_con.po_no AND pms_po_con.pr_id=pms_pr_con.pr_id AND pms_iar.iar_no=pms_iar_con.iar_no AND pms_iar_con.po_id=pms_po_con.po_id AND pms_iar_con.iar_id=ims_storage.iar_id AND ims_storage.emp_no=pims_personnel.emp_no 
        AND ims_storage.item_type='Electric' AND ims_storage.equipment='1' AND ims_storage.ins='0'";
	$search_result2 = filterTable2($query2);
}

// function to connect and execute the query
function filterTable2($query2)
{
    $connect = mysqli_connect("localhost", "root", "", "class_db");
    $filter_Result2 = mysqli_query($connect, $query2);
    return $filter_Result2;
}



?>


		
  
  		
  			
									<thead class="w3-theme-bdark">
										<tr>
									                    <th><center>#</center></th>
									                    <th><center>Item Name</center></th>
									                    <th width="1%"><center>Description</center></th>
									                    <th><center> Item Unit</center></th>
									                    <th><center>Qty</center></th>
									                    <th><center>Product Code</center></th>
									                    <th><center>Date Acquired</center></th>
                                                        <th><center>Requested By</center></th>
                                                        <th><center>PO #</center></th>
									                    <th><center>Action</center></th>
									                </tr>

									</thead>
									<tbody>


  
<?php while($row = mysqli_fetch_array($search_result2)):?>
                <tr>
                    <td><center><?php echo $row['stor_id'];?></center></td>
                    <?php 
						if ($row['stor_qty'] <= 20){
							 echo "<td style='background-color:tomato;'><center><span>".$row['req_item']."</span></center></td>";			 
							}
						else{
							echo "<td><center><span >".$row['req_item']."</span></center></td>";
							} 
						?>
                    <td width="1%"><center><?php echo $row['req_desc'];?></center></td>
                    <td><center><?php echo $row['req_unit'];?></center></td>
                    <td><center><?php echo $row['stor_qty'];?></center></td>
                    <td><center><?php echo $row['p_code'];?></center></td>
                    <td><center><?php echo $row['stor_date'];?></center></td>
                    <td><center><?php echo $row['P_lname'].','.$row['P_fname'];?></center></td>
                    <td><center><?php echo $row['po_no'];?></center></td>
                    <td><center><a class="btn btn-primary btn" href='edit-data1.php?pcode=<?php echo $row['req_item_id']; ?>'>Update</a></center><br>
                    <center>
                    <a class="btn btn-primary btn" href='eqpborrow.php?pcode=<?php echo $row['po_no']; ?>'>Issuance</a></center></td>

                </tr>
                <?php endwhile;?>
										
									</tbody>
  



  



											</table>
											</form>
											<!-- /.table-responsive -->			
											</div>
											<!-- /.panel-body -->
										</div>
										<!-- /.panel -->
									</div>
									<!-- /.col-lg-9 -->
									</div>
									<!-- /.row -->
									</div>
									<!-- /.tab-pane -->
							
							
							<div class="tab-pane fade" id="hardware-pills">
								<div class="row">
									<div class="col-lg-12">
									   <div class="panel panel-default">
										  <div class="panel-heading w3-theme-bd5">
											<h4><p class="fa fa-legal"> Hardware Equipment </p></h4>
											</div>											
            
											
											<!-- /.panel-heading -->
											<div class="panel-body">
											<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example3">
  
<?php
if(isset($_POST['search3']))
{
    $valueToSearch3 = $_POST['valueToSearch3'];

    $query3="SELECT DISTINCT pms_ris_req.req_item_id,pms_po.po_no,P_lname,P_fname,pms_po_con.unit_cost,ims_storage.stor_id,pms_ris_req.req_unit,ims_storage.stor_qty,ims_storage.emp_no,ims_storage.stor_date,pms_ris_req.req_desc,pms_ris_req.req_item,ims_storage.p_code FROM pims_personnel,pms_po_con, pms_supplier, pms_pr_con, pms_ris_req, ims_storage, pms_ris, pms_pr, pms_po, pms_iar, pms_iar_con WHERE pms_ris.ris_no=pms_ris_req.ris_no AND pms_ris_req.req_item_id=pms_pr_con.req_item_id AND pms_pr.pr_no=pms_pr_con.pr_no AND pms_supplier.company_id=pms_po.company_id AND pms_po.po_no=pms_po_con.po_no AND pms_po_con.pr_id=pms_pr_con.pr_id AND pms_iar.iar_no=pms_iar_con.iar_no AND pms_iar_con.po_id=pms_po_con.po_id AND pms_iar_con.iar_id=ims_storage.iar_id AND ims_storage.emp_no=pims_personnel.emp_no 
        AND ims_storage.item_type='Hardware' AND ims_storage.equipment='1' AND ims_storage.ins='0'
	AND CONCAT(req_item,stor_qty,stor_date,unit_cost,p_code,req_desc,company_name) 
	LIKE '%".$valueToSearch3."%'
	";
    $search_result3 = filterTable3($query3);
	
    }
 else {
    $query3="SELECT DISTINCT pms_ris_req.req_item_id,pms_po.po_no,P_lname,P_fname,pms_po_con.unit_cost,ims_storage.stor_id,pms_ris_req.req_unit,ims_storage.stor_qty,ims_storage.emp_no,ims_storage.stor_date,pms_ris_req.req_desc,pms_ris_req.req_item,ims_storage.p_code FROM pims_personnel,pms_po_con, pms_supplier, pms_pr_con, pms_ris_req, ims_storage, pms_ris, pms_pr, pms_po, pms_iar, pms_iar_con WHERE pms_ris.ris_no=pms_ris_req.ris_no AND pms_ris_req.req_item_id=pms_pr_con.req_item_id AND pms_pr.pr_no=pms_pr_con.pr_no AND pms_supplier.company_id=pms_po.company_id AND pms_po.po_no=pms_po_con.po_no AND pms_po_con.pr_id=pms_pr_con.pr_id AND pms_iar.iar_no=pms_iar_con.iar_no AND pms_iar_con.po_id=pms_po_con.po_id AND pms_iar_con.iar_id=ims_storage.iar_id AND ims_storage.emp_no=pims_personnel.emp_no 
        AND ims_storage.item_type='Hardware' AND ims_storage.equipment='1' AND ims_storage.ins='0'";
	$search_result3 = filterTable3($query3);
}

// function to connect and execute the query
function filterTable3($query3)
{
    $connect = mysqli_connect("localhost", "root", "", "class_db");
    $filter_Result3 = mysqli_query($connect, $query3);
    return $filter_Result3;
}



?>


		
  
  		
  			
									<thead class="w3-theme-bdark">
										<tr>
									                    <th><center>#</center></th>
									                    <th><center>Item Name</center></th>
									                    <th width="1%"><center>Description</center></th>
									                    <th><center> Item Unit</center></th>
									                    <th><center>Qty</center></th>
									                    <th><center>Product Code</center></th>
									                    <th><center>Date Acquired</center></th>
                                                        <th><center>Requested By</center></th>
                                                        <th><center>PO #</center></th>
									                    <th><center>Action</center></th>
									                </tr>

									</thead>
									<tbody>


  
<?php while($row = mysqli_fetch_array($search_result3)):?>
                <tr>
                    <td><center><?php echo $row['stor_id'];?></center></td>
					<?php 
						if ($row['stor_qty'] <= 20){
							 echo "<td style='background-color:tomato;'><center><span>".$row['req_item']."</span></center></td>";			 
							}
						else{
							echo "<td><center><span >".$row['req_item']."</span></center></td>";
							} 
						?>
                    <td width="1%"><center><?php echo $row['req_desc'];?></center></td>
                    <td><center><?php echo $row['req_unit'];?></center></td>
                    <td><center><?php echo $row['stor_qty'];?></center></td>
                    <td><center><?php echo $row['p_code'];?></center></td>
                    <td><center><?php echo $row['stor_date'];?></center></td>
                    <td><center><?php echo $row['P_lname'].','.$row['P_fname'];?></center></td>
                    <td><center><?php echo $row['po_no'];?></center></td>
                    <td><center><a class="btn btn-primary btn" href='edit-data1.php?pcode=<?php echo $row['req_item_id']; ?>'>Update</a></center><br>
                    <center>
                    <a class="btn btn-primary btn" href='eqpborrow.php?pcode=<?php echo $row['po_no']; ?>'>Issuance</a></center></td>

                </tr>
                <?php endwhile;?>
										
									</tbody>
  



  



											</table>
											</form>
											<!-- /.table-responsive -->			
											</div>
											<!-- /.panel-body -->
										</div>
										<!-- /.panel -->
									</div>
									<!-- /.col-lg-9 -->
									</div>
									<!-- /.row -->
									</div>
									<!-- /.tab-pane -->
							
							
							<div class="tab-pane fade" id="IT-pills">
								<div class="row">
									<div class="col-lg-12">
									   <div class="panel panel-default">
										  <div class="panel-heading w3-theme-bd5">
											<h4><p class="fa fa-desktop"> I.T. Equipment </p></h4>
											</div>											
            
											
											<!-- /.panel-heading -->
											<div class="panel-body">
											<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example4">
  
<?php
if(isset($_POST['search4']))
{
    $valueToSearch4 = $_POST['valueToSearch4'];

    $query4="SELECT DISTINCT pms_ris_req.req_item_id,pms_po.po_no,P_lname,P_fname,pms_po_con.unit_cost,ims_storage.stor_id,pms_ris_req.req_unit,ims_storage.stor_qty,ims_storage.emp_no,ims_storage.stor_date,pms_ris_req.req_desc,pms_ris_req.req_item,ims_storage.p_code FROM pims_personnel,pms_po_con, pms_supplier, pms_pr_con, pms_ris_req, ims_storage, pms_ris, pms_pr, pms_po, pms_iar, pms_iar_con WHERE pms_ris.ris_no=pms_ris_req.ris_no AND pms_ris_req.req_item_id=pms_pr_con.req_item_id AND pms_pr.pr_no=pms_pr_con.pr_no AND pms_supplier.company_id=pms_po.company_id AND pms_po.po_no=pms_po_con.po_no AND pms_po_con.pr_id=pms_pr_con.pr_id AND pms_iar.iar_no=pms_iar_con.iar_no AND pms_iar_con.po_id=pms_po_con.po_id AND pms_iar_con.iar_id=ims_storage.iar_id AND ims_storage.emp_no=pims_personnel.emp_no 
        AND ims_storage.item_type='I.T.' AND ims_storage.equipment='1' AND ims_storage.ins='0'
	AND CONCAT(req_item,stor_qty,stor_date,unit_cost,p_code,req_desc,company_name) 
	LIKE '%".$valueToSearch4."%'
	";
    $search_result4 = filterTable4($query4);
	
    }
 else {
    $query4="SELECT DISTINCT pms_ris_req.req_item_id,pms_po.po_no,P_lname,P_fname,pms_po_con.unit_cost,ims_storage.stor_id,pms_ris_req.req_unit,ims_storage.stor_qty,ims_storage.emp_no,ims_storage.stor_date,pms_ris_req.req_desc,pms_ris_req.req_item,ims_storage.p_code FROM pims_personnel,pms_po_con, pms_supplier, pms_pr_con, pms_ris_req, ims_storage, pms_ris, pms_pr, pms_po, pms_iar, pms_iar_con WHERE pms_ris.ris_no=pms_ris_req.ris_no AND pms_ris_req.req_item_id=pms_pr_con.req_item_id AND pms_pr.pr_no=pms_pr_con.pr_no AND pms_supplier.company_id=pms_po.company_id AND pms_po.po_no=pms_po_con.po_no AND pms_po_con.pr_id=pms_pr_con.pr_id AND pms_iar.iar_no=pms_iar_con.iar_no AND pms_iar_con.po_id=pms_po_con.po_id AND pms_iar_con.iar_id=ims_storage.iar_id AND ims_storage.emp_no=pims_personnel.emp_no 
        AND ims_storage.item_type='I.T.' AND ims_storage.equipment='1' AND ims_storage.ins='0'";
	$search_result4 = filterTable4($query4);
}

// function to connect and execute the query
function filterTable4($query4)
{
    $connect = mysqli_connect("localhost", "root", "", "class_db");
    $filter_Result4 = mysqli_query($connect, $query4);
    return $filter_Result4;
}



?>


		

  		
  			
									<thead class="w3-theme-bdark">
										<tr>
									                    <th><center>#</center></th>
									                    <th><center>Item Name</center></th>
									                    <th width="1%"><center>Description</center></th>
									                    <th><center> Item Unit</center></th>
									                    <th><center>Qty</center></th>
									                    <th><center>Product Code</center></th>
									                    <th><center>Date Acquired</center></th>
                                                        <th><center>Requested By</center></th>
                                                        <th><center>PO #</center></th>
									                    <th><center>Action</center></th>
									                </tr>

									</thead>
									<tbody>


  
<?php while($row = mysqli_fetch_array($search_result4)):?>
                <tr>
                    <td><center><?php echo $row['stor_id'];?></center></td>
					<?php 
						if ($row['stor_qty'] <= 20){
							 echo "<td style='background-color:tomato;'><center><span>".$row['req_item']."</span></center></td>";			 
							}
						else{
							echo "<td><center><span >".$row['req_item']."</span></center></td>";
							} 
						?>
                    <td width="1%"><center><?php echo $row['req_desc'];?></center></td>
                    <td><center><?php echo $row['req_unit'];?></center></td>
                    <td><center><?php echo $row['stor_qty'];?></center></td>
                    <td><center><?php echo $row['p_code'];?></center></td>
                    <td><center><?php echo $row['stor_date'];?></center></td>
                    <td><center><?php echo $row['P_lname'].','.$row['P_fname'];?></center></td>
                    <td><center><?php echo $row['po_no'];?></center></td>
                    <td><center><a class="btn btn-primary btn" href='edit-data1.php?pcode=<?php echo $row['req_item_id']; ?>'>Update</a></center><br>
                    <center>
                    <a class="btn btn-primary btn" href='eqpborrow.php?pcode=<?php echo $row['po_no']; ?>'>Issuance</a></center></td>

                </tr>
                <?php endwhile;?>
										
									</tbody>
  



  



											</table>
											</form>
											<!-- /.table-responsive -->			
											</div>
											<!-- /.panel-body -->
										</div>
										<!-- /.panel -->
									</div>
									<!-- /.col-lg-9 -->
									</div>
									<!-- /.row -->							
									</div>
									<!-- /.tab-pane -->
							
							
							<div class="tab-pane fade" id="janitorials-pills">
								<div class="row">
									<div class="col-lg-12">
									   <div class="panel panel-default">
										  <div class="panel-heading w3-theme-bd5">
											<h4><p class="fa fa-scissors"> Janitorial Equipment </p></h4>
											</div>											
            
											
											<!-- /.panel-heading -->
											<div class="panel-body">
											<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example5">
  
<?php
if(isset($_POST['search5']))
{
    $valueToSearch5 = $_POST['valueToSearch5'];

    $query5="SELECT DISTINCT pms_ris_req.req_item_id,pms_po.po_no,P_lname,P_fname,pms_po_con.unit_cost,ims_storage.stor_id,pms_ris_req.req_unit,ims_storage.stor_qty,ims_storage.emp_no,ims_storage.stor_date,pms_ris_req.req_desc,pms_ris_req.req_item,ims_storage.p_code FROM pims_personnel,pms_po_con, pms_supplier, pms_pr_con, pms_ris_req, ims_storage, pms_ris, pms_pr, pms_po, pms_iar, pms_iar_con WHERE pms_ris.ris_no=pms_ris_req.ris_no AND pms_ris_req.req_item_id=pms_pr_con.req_item_id AND pms_pr.pr_no=pms_pr_con.pr_no AND pms_supplier.company_id=pms_po.company_id AND pms_po.po_no=pms_po_con.po_no AND pms_po_con.pr_id=pms_pr_con.pr_id AND pms_iar.iar_no=pms_iar_con.iar_no AND pms_iar_con.po_id=pms_po_con.po_id AND pms_iar_con.iar_id=ims_storage.iar_id AND ims_storage.emp_no=pims_personnel.emp_no 
        AND ims_storage.item_type='Janitorial' AND ims_storage.equipment='1' AND ims_storage.ins='0'
	AND CONCAT(req_item,stor_qty,stor_date,unit_cost,p_code,req_desc,company_name) 
	LIKE '%".$valueToSearch5."%'
	";
    $search_result5 = filterTable5($query5);
	
    }
 else {
    $query5="SELECT DISTINCT pms_ris_req.req_item_id,pms_po.po_no,P_lname,P_fname,pms_po_con.unit_cost,ims_storage.stor_id,pms_ris_req.req_unit,ims_storage.stor_qty,ims_storage.emp_no,ims_storage.stor_date,pms_ris_req.req_desc,pms_ris_req.req_item,ims_storage.p_code FROM pims_personnel,pms_po_con, pms_supplier, pms_pr_con, pms_ris_req, ims_storage, pms_ris, pms_pr, pms_po, pms_iar, pms_iar_con WHERE pms_ris.ris_no=pms_ris_req.ris_no AND pms_ris_req.req_item_id=pms_pr_con.req_item_id AND pms_pr.pr_no=pms_pr_con.pr_no AND pms_supplier.company_id=pms_po.company_id AND pms_po.po_no=pms_po_con.po_no AND pms_po_con.pr_id=pms_pr_con.pr_id AND pms_iar.iar_no=pms_iar_con.iar_no AND pms_iar_con.po_id=pms_po_con.po_id AND pms_iar_con.iar_id=ims_storage.iar_id AND ims_storage.emp_no=pims_personnel.emp_no 
        AND ims_storage.item_type='Janitorial' AND ims_storage.equipment='1' AND ims_storage.ins='0'";
	$search_result5 = filterTable5($query5);
}

// function to connect and execute the query
function filterTable5($query5)
{
    $connect = mysqli_connect("localhost", "root", "", "class_db");
    $filter_Result5 = mysqli_query($connect, $query5);
    return $filter_Result5;
}



?>


		
  
  		
  			
									<thead class="w3-theme-bdark">
										<tr>
									                    <th><center>#</center></th>
									                    <th><center>Item Name</center></th>
									                    <th width="1%"><center>Description</center></th>
									                    <th><center> Item Unit</center></th>
									                    <th><center>Qty</center></th>
									                    <th><center>Product Code</center></th>
									                    <th><center>Date Acquired</center></th>
                                                        <th><center>Requested By</center></th>
                                                        <th><center>PO #</center></th>
									                    <th><center>Action</center></th>
									    </tr>

									</thead>
									<tbody>


 
<?php while($row = mysqli_fetch_array($search_result5)):?>
                <tr>
                    <td><center><?php echo $row['stor_id'];?></center></td>
					<?php 
						if ($row['stor_qty'] <= 20){
							 echo "<td style='background-color:tomato;'><center><span>".$row['req_item']."</span></center></td>";			 
							}
						else{
							echo "<td><center><span >".$row['req_item']."</span></center></td>";
							} 
						?>
                    <td width="1%"><center><?php echo $row['req_desc'];?></center></td>
                    <td><center><?php echo $row['req_unit'];?></center></td>
                    <td><center><?php echo $row['stor_qty'];?></center></td>
                    <td><center><?php echo $row['p_code'];?></center></td>
                    <td><center><?php echo $row['stor_date'];?></center></td>
                    <td><center><?php echo $row['P_lname'].','.$row['P_fname'];?></center></td>
                    <td><center><?php echo $row['po_no'];?></center></td>
                    <td><center><a class="btn btn-primary btn" href='edit-data1.php?pcode=<?php echo $row['req_item_id']; ?>'>Update</a></center><br>
                    <center>
                    <a class="btn btn-primary btn" href='eqpborrow.php?pcode=<?php echo $row['po_no']; ?>'>Issuance</a></center></td>

                </tr>
                <?php endwhile;?>
										
									</tbody>
  



  



											</table>
											</form>
											<!-- /.table-responsive -->			
											</div>
											<!-- /.panel-body -->
										</div>
										<!-- /.panel -->
									</div>
									<!-- /.col-lg-9 -->
									</div>
									<!-- /.row -->
									</div>
									<!-- /.tab-pane -->
							
							<div class="tab-pane fade" id="sports-pills">
								<div class="row">
									<div class="col-lg-12">
									   <div class="panel panel-default">
										  <div class="panel-heading w3-theme-bd5">
											<h4><p class="fa fa-dribbble"> Sports Equipment </p></h4>
											</div>											
            
											
											<!-- /.panel-heading -->
											<div class="panel-body">
											<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example6">
  
<?php
if(isset($_POST['search6']))
{
    $valueToSearch6 = $_POST['valueToSearch6'];

    $query6="SELECT DISTINCT pms_ris_req.req_item_id,pms_po.po_no,P_lname,P_fname,pms_po_con.unit_cost,ims_storage.stor_id,pms_ris_req.req_unit,ims_storage.stor_qty,ims_storage.emp_no,ims_storage.stor_date,pms_ris_req.req_desc,pms_ris_req.req_item,ims_storage.p_code FROM pims_personnel,pms_po_con, pms_supplier, pms_pr_con, pms_ris_req, ims_storage, pms_ris, pms_pr, pms_po, pms_iar, pms_iar_con WHERE pms_ris.ris_no=pms_ris_req.ris_no AND pms_ris_req.req_item_id=pms_pr_con.req_item_id AND pms_pr.pr_no=pms_pr_con.pr_no AND pms_supplier.company_id=pms_po.company_id AND pms_po.po_no=pms_po_con.po_no AND pms_po_con.pr_id=pms_pr_con.pr_id AND pms_iar.iar_no=pms_iar_con.iar_no AND pms_iar_con.po_id=pms_po_con.po_id AND pms_iar_con.iar_id=ims_storage.iar_id AND ims_storage.emp_no=pims_personnel.emp_no 
        AND ims_storage.item_type='Sports' AND ims_storage.equipment='1' AND ims_storage.ins='0'
	AND CONCAT(req_item,stor_qty,stor_date,unit_cost,p_code,req_desc,company_name) 
	LIKE '%".$valueToSearch6."%'
	";
    $search_result6 = filterTable6($query6);
	
    }
 else {
    $query6="SELECT DISTINCT pms_ris_req.req_item_id,pms_po.po_no,P_lname,P_fname,pms_po_con.unit_cost,ims_storage.stor_id,pms_ris_req.req_unit,ims_storage.stor_qty,ims_storage.emp_no,ims_storage.stor_date,pms_ris_req.req_desc,pms_ris_req.req_item,ims_storage.p_code FROM pims_personnel,pms_po_con, pms_supplier, pms_pr_con, pms_ris_req, ims_storage, pms_ris, pms_pr, pms_po, pms_iar, pms_iar_con WHERE pms_ris.ris_no=pms_ris_req.ris_no AND pms_ris_req.req_item_id=pms_pr_con.req_item_id AND pms_pr.pr_no=pms_pr_con.pr_no AND pms_supplier.company_id=pms_po.company_id AND pms_po.po_no=pms_po_con.po_no AND pms_po_con.pr_id=pms_pr_con.pr_id AND pms_iar.iar_no=pms_iar_con.iar_no AND pms_iar_con.po_id=pms_po_con.po_id AND pms_iar_con.iar_id=ims_storage.iar_id AND ims_storage.emp_no=pims_personnel.emp_no 
        AND ims_storage.item_type='Sports' AND ims_storage.equipment='1' AND ims_storage.ins='0'";
	$search_result6 = filterTable6($query6);
}

// function to connect and execute the query
function filterTable6($query6)
{
    $connect = mysqli_connect("localhost", "root", "", "class_db");
    $filter_Result6 = mysqli_query($connect, $query6);
    return $filter_Result6;
}



?>


		
  
  		
  			
									<thead class="w3-theme-bdark">
										<tr>
									                    <th><center>#</center></th>
									                    <th><center>Item Name</center></th>
									                    <th width="1%"><center>Description</center></th>
									                    <th><center> Item Unit</center></th>
									                    <th><center>Qty</center></th>
									                    <th><center>Product Code</center></th>
									                    <th><center>Date Acquired</center></th>
                                                        <th><center>Requested By</center></th>
                                                        <th><center>PO #</center></th>
									                    <th><center>Action</center></th>
									                </tr>

									</thead>
									<tbody>


  
<?php while($row = mysqli_fetch_array($search_result6)):?>
                <tr>
                    <td><center><?php echo $row['stor_id'];?></center></td>
					<?php 
						if ($row['stor_qty'] <= 20){
							 echo "<td style='background-color:tomato;'><center><span>".$row['req_item']."</span></center></td>";			 
							}
						else{
							echo "<td><center><span >".$row['req_item']."</span></center></td>";
							} 
						?>
                    <td width="1%"><center><?php echo $row['req_desc'];?></center></td>
                    <td><center><?php echo $row['req_unit'];?></center></td>
                    <td><center><?php echo $row['stor_qty'];?></center></td>
                    <td><center><?php echo $row['p_code'];?></center></td>
                    <td><center><?php echo $row['stor_date'];?></center></td>
                    <td><center><?php echo $row['P_lname'].','.$row['P_fname'];?></center></td>
                    <td><center><?php echo $row['po_no'];?></center></td>
                    <td><center><a class="btn btn-primary btn" href='edit-data1.php?pcode=<?php echo $row['req_item_id']; ?>'>Update</a></center><br>
                    <center>
                        <a class="btn btn-primary btn" href='eqpborrow.php?pcode=<?php echo $row['po_no']; ?>'>Issuance</a></center></td>

                </tr>
                <?php endwhile;?>
										
									</tbody>
  



  



											</table>
											</form>
											<!-- /.table-responsive -->			
											</div>
											<!-- /.panel-body -->
										</div>
										<!-- /.panel -->
									</div>
									<!-- /.col-lg-9 -->
									</div>
									<!-- /.row -->
									</div>
									<!-- /.tab-pane -->
							
						</div>
						<!-- /.tab-content -->
					
				</div> 
				<!-- /.col-lg-9 -->
				</div>  </br>   
				<!-- /.panel -->
				</div>
				<!-- /.panel-panel-default -->
			</div> 
			<!-- /.col-lg-12 -->
			</div> 
			<!-- /.row -->
			</div> <br> <br> <br> <br> <br> 
			<!-- /.container-fluid -->
		<br> <br> <br> <br> <br>
						




<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/alert.js"></script>
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script  src="../js/index.js"></script>
<script src="../js/metisMenu.min.js"></script>
<script src="../js/sb-admin-2.min.js"></script>

<!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>




	<script>
		$(document).ready(function() {
			$('#dataTables-example').DataTable({
				responsive: true
			});
		});
		$(document).ready(function() {
			$('#dataTables-example1').DataTable({
				responsive: true
			});
		});
		$(document).ready(function() {
			$('#dataTables-example2').DataTable({
				responsive: true
			});
		});
		$(document).ready(function() {
			$('#dataTables-example3').DataTable({
				responsive: true
			});
		});
		$(document).ready(function() {
			$('#dataTables-example4').DataTable({
				responsive: true
			});
		});
		$(document).ready(function() {
			$('#dataTables-example5').DataTable({
				responsive: true
			});
		});
		$(document).ready(function() {
			$('#dataTables-example6').DataTable({
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