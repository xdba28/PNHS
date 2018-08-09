<?php

$query = mysqli_query($conn, "SELECT * FROM css_school_yr WHERE STATUS='used'");
$row = mysqli_fetch_row($query);
$rows = mysqli_num_rows($query);
if($rows!=0){
?>
 <div class="modal-dialog modal-lg">
    <div class="modal-content" style="background-color:#fff;">
      <div class="modal-header modal-info" style="background-color:#1e4f75">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:#FFF"><b>School Year</b></h4>
      </div>
      <div> 
           <br>
         
            <form class="form-horizontal custom-form" action="index.php">
              <div class="form-group">

                  <div class="col-md-10 col-md-offset-1">
                    <br>
                      <div>
                        <div class="form-group" style="text-align:right">
                        	<p style="text-align: center;"><?php echo $row[1]?> School Year is still in use.</p>
                          <br>
                          <center>
                            <button class="btn btn-primary save fa fa-check" type="submit"> Go
                            </button>
                          </center>
                        </div>
                      </div>
                  
                  </div>
              </div> 
            </form>
      </div>
    </div><br>
  </div><br>

<?php
$_SESSION['sy'] = 1;
}
else{
  $query = mysqli_query($conn, "SELECT year FROM css_school_yr WHERE STATUS='active'");
  $row = mysqli_fetch_row($query);
  $yr = explode("-", $row[0]);
  $yr1 = (int)$yr[0];
  $yr2 = (int)$yr[1];
  $yr1++;
  $yr2++;
  $str = $yr1."-".$yr2;
?>

 <div class="modal-dialog modal-lg">
    <div class="modal-content" style="background-color:#fff;">
      <div class="modal-header modal-info" style="background-color:#1e4f75">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:#FFF"><b>School Year</b></h4>
      </div>
      <div> 
           <br>
         
            <form class="form-horizontal custom-form" onsubmit="tbn.disabled = true; return true;" action="school_year.php" method="POST">
              <div class="form-group">

                  <div class="col-md-10 col-md-offset-1">
                    <br>
                      <div>
                        <div class="form-group" style="text-align:right">
                          <div class="col-sm-4 label-column">
                            <label class="control-label" for="name-input-field">School Year &nbsp;&nbsp;&nbsp;&nbsp;:</label>
                          </div>
                          <div class="col-sm-5 input-column" style="text-align:right">
                             <input name="sy_year" value="<?php echo $str?>" class="form-control" type="text" required></input>
                          </div>
                          <br><br><br>
                          <center>
                            <button class="btn btn-primary save fa fa-check" id="tbn" name = "submit" type="submit" onclick="this.form.submit(); this.disabled=true;"> Save
                            </button>
                          </center>
                        </div>
                      </div>
                  
                  </div>
              </div> 
            </form>
      </div>
    </div><br>
  </div><br>

<?php
}
?>
