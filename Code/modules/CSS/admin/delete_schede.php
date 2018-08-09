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
$yr_id = $_SESSION['yr_id'];
$section = mysqli_query($conn, "SELECT SECTION_ID, SECTION_NAME FROM css_section, css_school_yr 
                                WHERE css_school_yr.SY_ID=$yr_id AND css_section.SY_ID=css_school_yr.SY_ID 
                                AND YEAR_LEVEL=$grade");
?>

<div class="modal-dialog modal-lg">
    <div class="modal-content" style="background-color:#fff;">
      <div class="modal-header modal-info" style="background-color:#1e4f75">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:#FFF"><b>Delete Schedule</b></h4>
      </div>
      <div> 
           <br>
         
            <form class="form-horizontal custom-form" action="delete_processe.php" method="POST">
              <div class="form-group">
                  <div class="col-md-10 col-md-offset-1">
                    <br>
                      <div>
                        <div class="form-group" style="text-align:right">
                        <div class="col-sm-4 label-column">
                            <label class="control-label" for="name-input-field" >Section &nbsp;&nbsp;&nbsp;:</label>
                          </div>
                          <div class="col-sm-5 input-column" style="text-align:right">
                        		<select class="form-control" name = "sec" id = "" onchange="del_sub1(this.value)" required="">
                                  <option value="">Select</option>
                                  <?php
                                  $sec_count=0;
                                  foreach ($section as $sec) { ?>
                                    <option value="<?php echo $sec['SECTION_ID']?>" ><?php echo $sec['SECTION_NAME']?></option>
                                  <?php
                                  $sec_count++;
                                  }
                                  ?>  
                              </select>
                          </div>
                          <br> <br>

                        <div class="col-sm-4 label-column">
                             <label class="control-label" for="name-input-field">Subject &nbsp;&nbsp;&nbsp;&nbsp;:</label>
                          </div>
                          <div id = "sub">
                            <div class="col-sm-5 input-column" style="text-align:right">
                             <select class="form-control" name = "" required="">
                              <option value="">Select</option>
                            </select>                    
							</div>
							</div>
                          <br> <br>
                          <div class="col-sm-4 label-column">
                             <label class="control-label" for="name-input-field">Teacher &nbsp;&nbsp;&nbsp;&nbsp;:</label>
                          </div>
                          <div id = "teach">
                          <div class="col-sm-5 input-column" style="text-align:right">
                             <select class="form-control" name = "" required="">
                                  <option value="">Select</option>  
                                </select>                        
                          </div>
                          </div>
                          <br> <br>
                          
                         
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
</div>

<script type="text/javascript">
	function del_sub1(val){
		$.ajax({
			type: "POST",
			url: "delete_sched_sube.php",
			data: "sec_id="+val,
			success: function(data){
				$("#sub").html(data);
			}
		});
	}
	function del_teach(val){
		$.ajax({
			type: "POST",
			url: "delete_sched_teache.php",
			data: "sub_id="+val,
			success: function(data){
				$("#teach").html(data);
			}
		});
	}
	function time(val){
    	$.ajax({
      		type: "POST",
      		url: "time_end.php",
      		data: "time_s="+val,
      		success: function(data){
        		$("#time").html(data);
      		}
    	});
	}

</script>

