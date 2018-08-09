<?php
	// session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/w3.css">
		<link rel="stylesheet" href="css/w3/blue.css">
		<link rel="stylesheet" href="css/w3/yellow.css">
    <link rel="stylesheet" href="css/w3/red.css">
    <link rel="stylesheet" href="css/w3/w3.css">
    <link rel="stylesheet" href="css/sideNav.css">
    <link rel="stylesheet" href="css/backToTop.css">
		<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">

    <script src="js1/alert.js"></script>
    <script src="js1/slideshow.js"></script>
    <script src="js1/backToTop.js"></script>
    <script src="js1/sideNav.js"></script>
    <script src="js1/showNav.js"></script>

    <!-- jQuery -->
    <script src="../Template%20(reference)/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../Template%20(reference)/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../Template%20(reference)/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../Template%20(reference)/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../Template%20(reference)/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../Template%20(reference)/vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../Template%20(reference)/dist/js/sb-admin-2.js"></script>

		<!-- Optional theme -->
		<link rel="stylesheet" href="css/w3/w3.css">

</head>
<!-- Add Student(s) button Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <center><h4 class="modal-title" id="myModalLabel">Add Student(s)</h4></center>
      </div>
      <div class="modal-body">
        <center>
		<div class="row">
			<div class="col-md-6">
				<label class="btn-bs-file">
					<form action="add_excel_val.php" method="post" enctype="multipart/form-data" id="add_some">
						<div class="btn w3-card-4 w3-theme-bd3 w3-hover-blue w3-xlarge" style="width:175px;margin:50px">
							<i class="fa fa-users fa-5x"></i>
							<p class="w3-medium">Add Multiple<input type="file" name="sample" id="sample" form="add_some" style="display:none"></p>
						</div>
					
				</label>
			</div>
			<div class="col-md-6">
				<a href="add.php">
					<div class="btn w3-card-4 w3-theme-bd3 w3-hover-blue w3-xlarge" style="width:175px;margin:50px">
						<i class="fa fa-user fa-5x"></i>
						<p class="w3-medium">Add Single</p>
					</div>
				</a>
			</div>
		</div>
        </center>
      </div>
        
      <div class="modal-footer">
          <center><button type="submit" class="btn w3-hover-green btn-success w3-card-2" form="add_some">Submit</button></center>
      </form>
      </div>
        
    </div>
  </div>
</div><!-- Excel button Modal -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <center><h4 class="modal-title" id="myModalLabel">Process Grade</h4></center>
      </div>
      <div class="modal-body">
        <center>
        <label class="btn-bs-file">
            <form action="grade_excel_val.php" method="post" enctype="multipart/form-data" id="grade">
                <div class="btn w3-card-4 w3-theme-bd3 w3-hover-blue w3-xlarge" style="width:175px;margin:50px">
                    <i class="fa fa-files-o fa-5x"></i>
                    <p class="w3-medium">Select File<input type="file" name="sample" id="sample" form="grade" style="display:none"></p>
                </div>
            </form>
        </label>
        </center>
      </div>
        
      <div class="modal-footer">
          <center><button type="submit" class="btn w3-hover-green btn-success w3-card-2" form="grade">Submit</button></center>
      
      </div>
        
    </div>
  </div>
</div>