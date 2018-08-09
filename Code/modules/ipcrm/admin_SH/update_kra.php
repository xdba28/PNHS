
<!DOCTYPE html>
<html lang="en" >
    <?php
    include("../func.php");
	include("../dbcon.php");
	include("../session.php");
	
	$name=mysqli_query($mysqli,"SELECT concat(p_fname,' ',p_lname) as Name,job_title_name, pims_job_title.job_title_code as job_title_code FROM pims_personnel,pims_employment_records,pims_job_title
	WHERE pims_personnel.emp_no=pims_employment_records.emp_no
	AND pims_job_title.job_title_code=pims_employment_records.job_title_code
	AND pims_personnel.emp_no=$emp");
	$nrow=mysqli_fetch_assoc($name);
	$_SESSION['job_title']=$nrow['job_title_name'];
	$_SESSION['job_code']=$nrow['job_title_code'];
	
    ?>
    <head>
        <meta charset="UTF-8">
        <title>PAG-ASA National High School</title>
        <link href="http://fonts.googleapis.com/css?family=Dosis:400,500,700" rel="stylesheet" type="text/css">
        <link rel='stylesheet prefetch' href='pages/css/bootstrap.min.css'>
        <link rel="icon" href="docs/img/pnhs_favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="pages/css/style.css">
        <link rel="stylesheet" href="pages/css/w3.css">
		<link rel="stylesheet" href="css/ayuson.css">
		<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css" type="text/css">
		<!-- DataTables CSS -->
	    <link href="pages/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
	    <link href="pages/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
	    <!-- DataTables Responsive CSS -->
	    <link href="pages/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
		<!-- MetisMenu CSS -->
		<link href="pages/css/sb-admin-2.css" rel="stylesheet">
		<link href="pages/css/metisMenu.min.css" rel="stylesheet">

    </head>
    <body>
	  <?php 
		include("topnav.php");
		?>
	
        <div id="wrapper">
            <?php 
				include("sidenav.php");
			?>

<br><br><br>
<br><div class="page-title" align="center"><span>Update Form</span></div>
<br><br>	
<div class="container-fluid" style="max-width:100%>
		
			<div id="page-wrapper">
				<div class="container-fluid">
					<!-- Page Heading -->

						
						<table align="center" id="fadein" class="tbl"> 
							<tr>
								<td style="background-color:#73acda"><b>MFO</b></td>
								<td style="background-color:#73acda" align="center"><b>Action</b></td>
							</tr>
							<form method="get" action="up_mfo.php">
								<?php
									$qry = mysqli_query($mysqli,"Select * from ipcrms_mfo");
									if($qry){
										while($row=mysqli_fetch_array($qry)){
											$id=$row['MFO_ID'];
											$mfo_desc=$row['MFO_Description'];
											
											echo"<tr>
												<td>".$mfo_desc."</td>
												<td align=center><button type='submit' name='id' value=".$id." class='btn btn-danger'>Select</button></td>
												
											</tr>";
										}
										
									}
								?>
							
						</table>
						</form>
            <div class="container"><!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
      <!-- Modal content-->
                        <div class="row center">
				            <div class="modalbox success col-sm-8 col-md-6 col-lg-5 center animate">
						      <div class="icon">
								<span class="glyphicon glyphicon-ok"></span>
						      </div>
						<!--/.icon-->
						    <h1>Success!</h1>
						    <p>KRA <br>has been updated.</p>
                            <a href="ipcrms_index.php"> <button type="button" class="redo btn">Ok</button></a>
							<span class="change">-- Click to see opposite state --</span>
				            </div>
				<!--/.success-->
		                  </div>
		<!--/.row-->
		  <div class="row">
				<div class="modalbox error col-sm-8 col-md-6 col-lg-5 center animate">
						<div class="icon">
								<span class="glyphicon glyphicon-thumbs-down"></span>
						</div>
						<!--/.icon-->
						<h1>Oh no!</h1>
						<p>Oops! Something went wrong,
								<br> You should try again.</p>
						<button type="button" class="redo btn">Try again</button>
					<span class="change">-- Click to see opposite state --</span>
				</div>
				<!--/.success-->
		  </div>
		<!--/.row-->

      </div>
    </div>
</div>
  </div>    
    </div>    

 <br><br><br><br><br><br><br><br><br><br><br><br>   
<?php 
include("footer.php");
?>

</div>
            <script src='pages/js/jquery.min.js'></script>
            <script src='pages/js/bootstrap.min.js'></script>
            <script  src="pages/js/index.js"></script>

            <script src='pages/js/sb-admin-2.min.js'></script>
            <script src='pages/js/metisMenu.min.js'></script>

</body>
</html>