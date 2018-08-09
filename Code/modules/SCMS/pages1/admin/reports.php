<?php

include("../../db_connect.php");
session_start();
include("../include/session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Browser's Tab Title -->
    <title>Admin</title>
      
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../../css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="../../css/w3.css">
    <link rel="stylesheet" href="../../css/style.css">
	<link rel="stylesheet" href="../../css/metisMenu.min.css" type="text/css">
    
    <!-- Documents Path -->
    <link rel="stylesheet" href="../../docs/docs.min.css">
    <link rel="stylesheet" href="../../css/sidebar-menu.css">
    <link rel="stylesheet" href="../../css/s.css">
    
    
    <!-- Icons CSS -->
    <link rel="stylesheet" href="../../css/font-awesome/css/font-awesome.min.css" type="text/css">
    
    <!-- Browser's Tab Image -->
    <link rel="shortcut icon" href="../../docs/img/pnhs_favicon.ico" type="image/x-icon">
    <link rel="icon" href="../../docs/img/pnhs_favicon.ico" type="image/x-icon">
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../../Template (reference)/vendor/jquery/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="../../Template (reference)/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Bootstrap -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
	body {
        color: #404E67;
        background: #FFFFFF;
		font-family: 'arial', sans-serif;
	}	
	.icon-background4 {
    color: #36f40b;
	}
	</style>
</head>
    <body>
                <?php include("../include/topnav.php"); ?>
        <div id="wrapper">
            <?php include("../include/sidenav.php"); ?>
            <div id="page-content-wrapper">
            <div class="container-fluid" style="margin-right:40px;margin-left:70px;">
                <div class="col-lg-12">
			<ol class="breadcrumb">
				<li><a href="index.php">School Clinic</a></li>
				<li class="active">Reports</li>
			</ol>
                    <h1 class="page-header">Reports <small><small> View, Print Clinic and Inventory Reports</small></small></h1><br>
                 </div>
                
				<div class="col-md-6">
                    <form method = "post" action = "../../fpdf/print_ASR.php">
                    <div class="panel panel-info container-fluid ">
					    <br><h6>ANNUAL STATISTICS REPORT

							<div class="col-xs-4" style="float:right">
							<select class="form-control" name = "sy" id = "sy"  class="form-control col-xl-1" style="margin-top:0px">
							
							<?php
							mysqli_query($mysqli, "LOCK TABLES css_school_yr READ");
							$fetch_sy = mysqli_query($mysqli, "SELECT * FROM css_school_yr");
							
							while($sy = mysqli_fetch_array($fetch_sy))
							{
								if($sy['status'] == "active")
								{
									echo'
									<option value="'.$sy['sy_id'].'" selected>'.$sy['year'].'</option>';
								}
								else
								{
									echo'
									<option value="'.$sy['sy_id'].'">'.$sy['year'].'</option>';
								}
							}
							mysqli_query($mysqli, "UNLOCK TABLES");
							?>
							</select>
							</div>                            
                        
                        </h6><br>
                        <!-- /.panel-body -->
                        <div class="panel-heading row" style="text-align:right">
 						                              
                                 <button type="submit" style="float:right;margin-right:15px" class="btn btn-primary btn-square btn-sm" title="View/Print" name = "submit_sy"><i class="fa fa-eye fa-fw"></i> View</button>							

                        </div>                        
                    </div>
					</form>
                    

                   <form action="../../fpdf/print_NSR2.php" method="post"> 
                    <div class="panel panel-info container-fluid ">

                        <br><h6>NUTRITIONAL STATUS RECORD
							<div class="col-xs-5" style="float:right">
							<select class="form-control" name="sec">
                            <?php
							mysqli_query($mysqli, "LOCK TABLES css_section, css_school_yr READ");
							$fetch_sect = mysqli_query($mysqli, "SELECT SECTION_ID, CONCAT(css_section.YEAR_LEVEL,'-',css_section.SECTION_NAME) AS YR_SEC FROM `css_section`, css_school_yr
									WHERE css_section.sy_id = css_school_yr.sy_id
									AND status = 'active'
									ORDER BY YEAR_LEVEL")
									or die(mysqli_error($mysqli));
									
									while($section = mysqli_fetch_array($fetch_sect))
									{
										echo'<option value="'.$section['SECTION_ID'].'">'.strtoupper($section['YR_SEC']).'</option>';
									}
							mysqli_query($mysqli, "UNLOCK TABLES");
							?>
							</select>
							</div>
							                       
                        </h6><br>
                        <div class="panel-heading row" style="text-align:right">
						<button type="submit" name="section" style="float:right;margin-right:15px" class="btn btn-primary btn-square btn-sm" title="View/Print"><i class="fa fa-eye fa-fw"></i> View</button>
                        </div>
                        
                        <!-- /.panel-body -->
                       </div> </form>                   
                </div>
				
				
				<div class="col-md-6" >
                    <div class="panel panel-info container-fluid " >
                        <center><h6 ><i>Manage Stocks</i></h6></center><hr>
 
                        <div class="panel-heading row" >
                            <h6>MEDICINE INVENTORY REPORT                                  
                            
                                <a href="../../fpdf/print_MIR.php"><button type="button" style="float:right;margin-right:15px" class="btn btn-primary btn-square btn-sm" title="View/Print"><i class="fa fa-eye fa-fw"></i> View</button></a>   
                                </h6>
                        </div><br>
                        <div class="panel-heading row" >
                            <h6>SUPPLY INVENTORY REPORT                                  
                            
                                 <a href="../../fpdf/print_SIR.php"><button type="button" style="float:right;margin-right:15px" class="btn btn-primary btn-square btn-sm" title="View/Print"><i class="fa fa-eye fa-fw"></i> View</button></a>   
                                </h6>
                        </div><br>
                        <div class="panel-heading row" >
                            <h6>EQUIPMENT INVENTORY REPORT                                  
                            
                                 <a href="../../fpdf/print_EIR.php"><button type="button" style="float:right;margin-right:15px" class="btn btn-primary btn-square btn-sm" title="View/Print"><i class="fa fa-eye fa-fw"></i> View</button></a>   
                                </h6>
                        </div>                         
                    </div>
                </div>
            <br><br><br>
                <div class="col-lg-12">
					<h1 class="page-header">Support <small><small> Downloadable Blank Forms</small></small></h1><br><br>
                 </div>	
				<div class="col-md-4" >
                    <div class="panel panel-primary container-fluid ">
                     <div class="panel-body" align="center">
						<h6>ANNUAL STATISTICS REPORT</h6><hr>
                            <a type="button" class="btn btn-primary btn-square btn-sm"  href="../../docs/dl/Annual%20Statistics%20Report.docx" class="fa fa-download fw"><i class="fa fa-download fa-fw"></i> Download</a> 
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>
            	<div class="col-md-4" >
                    <div class="panel panel-primary container-fluid ">
                        <div class="panel-body" align="center">
						<h6>MEDICAL FORM</h6><hr>
                            <a type="button" class="btn btn-primary btn-square btn-sm"  href="../../docs/dl/Medical%20Form.docx" class="fa fa-download fw"><i class="fa fa-download fa-fw"></i> Download</a> 
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>
 				<div class="col-md-4" >
                    <div class="panel panel-primary container-fluid ">
                        <div class="panel-body" align="center">
						<h6>NUTRITIONAL STATUS RECORD</h6><hr>
                            <a type="button" class="btn btn-primary btn-square btn-sm"  href="../../docs/dl/Nutritional%20Status%20Record.docx" class="fa fa-download fw"><i class="fa fa-download fa-fw"></i> Download</a> 
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>  				 
	</div>
	        <br><br><br>
            <!-- Footer --> 
            <?php include "../../pages/include/footer.php"; ?>
        </div>
    </div>
    
    <script src="../../js/index.js"></script>	
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../js/alert.js"></script>
<script src="../../js/slideshow.js"></script>
<script src="../../js/backToTop.js"></script>
<script src="../../js/sideNavII.js"></script>
<script src="../../js/showNav.js"></script>
<script src="../../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../../vendor/datatables-responsive/dataTables.responsive.js"></script>
<script src="../../js/metisMenu.min.js"></script>     
<script src="../../js/sb-admin-2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../Template%20(reference)/vendor/jquery/jquery-3.0.0.min.js"></script>
<script src="../../js/sidebar-menu.js"></script>
<script src="../../js/sideNav.js"></script>
<script>
$.sidebarMenu($('.sidebar-menu'))
</script>

<!-- Morris Charts JavaScript -->
    <script src="../../vendor/raphael/raphael.min.js"></script>
    <script src="../../vendor/morrisjs/morris.min.js"></script>
    <script src="../../data/morris-data.js"></script>
	

</body>

</html>

