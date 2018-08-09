<!-- Add Student(s) button Modal -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="add_excel_val.php" method="post" enctype="multipart/form-data" id="add_some">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <center><h4 class="modal-title" id="myModalLabel">Add Student(s)</h4></center>
      </div>
      <div class="modal-body">
        <center>
		<div class="row">
			<div class="col-md-6">
				<label class="btn-bs-file">
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
        </div>
    </form>        
    </div>
  </div>
</div>
<!-- Excel button Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
	  <form action="add_excel_val.php" method="post" enctype="multipart/form-data" id="add_some">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <center><h4 class="modal-title" id="myModalLabel">Assign Section</h4></center>
		</div>
		<div class="modal-body">
		  <center>
		  <div class="row">
			  <div class="col-md-6">
				  <label class="btn-bs-file">
						<a href="stu_chg_mult.php">
						  <div class="btn w3-card-4 w3-xlarge w3-theme-yd4" style="width:175px;margin:50px">
							  <i class="fa fa-users fa-5x"></i>
							  <p class="w3-medium">Assign Students</p>
						  </div>
					  </a>
				  </label>
			  </div>
			  <div class="col-md-6">
				  <a href="stu_drp_dwn.php">
					  <div class="btn w3-card-4 w3-theme-yd4 w3-xlarge" style="width:175px;margin:50px">
						  <i class="fa fa-user fa-5x"></i>
						  <p class="w3-medium">Assign Student</p>
					  </div>
				  </a>
			  </div>
		  </div>
		  </center>
		</div>
		  <div class="modal-footer">
		  </div>
	  </form>        
	  </div>
	</div>
  </div>
  