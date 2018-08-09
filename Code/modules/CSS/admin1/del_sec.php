<?php
session_start(); 
include "db_conn.php";


if(!empty($_SESSION['grade'])){
  $grade = $_SESSION['grade'];
}
else{
  $grade = 7;
  $_SESSION['grade'] = $grade;
}
$section = mysqli_query($conn, "SELECT SECTION_ID, SECTION_NAME FROM section, sy WHERE STATUS='used' AND section.SY_ID=sy.SY_ID AND YEAR_LEVEL=$grade");

?>

<div class="modal-dialog modal-lg">
    <div class="modal-content" style="background-color:#fff;">
      <div class="modal-header modal-info" style="background-color:#1e4f75">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:#FFF"><b>Delete Section</b></h4>
      </div>
      <div> 
           <br>
         
            <form action="del_sec_process.php" method="POST" class="form-horizontal custom-form">
              <div class="form-group">

                  <div class="col-md-10 col-md-offset-1">
                    <br>
                      <div>
                        <div class="form-group" style="text-align:right">
                          <div class="col-sm-4 label-column">
                            <label class="control-label" for="name-input-field" >Section &nbsp;&nbsp;&nbsp;&nbsp;:</label>
                          </div>
                          <div class="col-sm-5 input-column" style="text-align:right">
                             <select class="form-control" name = "del_sec" id = "">
                             	<?php
                             	foreach ($section as $key) {
                             		echo '<option value='.$key['SECTION_ID'].'>'.$key['SECTION_NAME'].'</option>';
                             	}
                                ?>
                                </select>
                          </div>
                          <br><br><br>
                          <center>
                            <button class="btn btn-primary save fa fa-check" name = "submit" type="submit"> Delete
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

?>