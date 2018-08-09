<?php
session_start(); 
include "db_conn.php";
$_SESSION['c_e'] = 1;
if(!empty($_SESSION['grade'])){
  $grade = $_SESSION['grade'];
}
else{
  $grade = 7;
  $_SESSION['grade'] = $grade;
}
$room = mysqli_query($conn, "SELECT * FROM room");
$section = mysqli_query($conn, "SELECT SECTION_ID, SECTION_NAME FROM css_section, css_school_yr 
                                WHERE status='used' AND css_section.SY_ID=css_school_yr.SY_ID 
                                AND YEAR_LEVEL=$grade");
$teacher = mysqli_query($conn, "SELECT * FROM teacher WHERE TEACHER_LVL=$grade");
$subject = mysqli_query($conn, "SELECT * FROM css_subject");?>




<div class="modal-dialog modal-lg">
    <div class="modal-content" style="width:1000px">
      <div class="modal-header modal-info" style="background-color:#1e4f75">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:#FFF"><b>Add Schedule</b></h4>
      </div>
           <br>
            
            <form class="form-horizontal custom-form" action="process.php" method="POST">
              <div class="form-group">
                <div class="col-md-10 col-md-offset-1">
                      <label class="control-label" for="name-input-field" style="padding-left: 200px">Day/s: &nbsp;</label>
                        <div class="btn-group" data-toggle="buttons">
                          <label class="btn btn-info">
                            <input type="checkbox" value="M" name="day[]" autocomplete="off">Mon
                          </label>
                          <label class="btn btn-info">
                            <input type="checkbox" value="T" name="day[]" autocomplete="off">Tues
                          </label>
                          <label class="btn btn-info">
                            <input type="checkbox" value="W" name="day[]" autocomplete="off">Wed
                          </label>
                          <label class="btn btn-info">
                            <input type="checkbox" value="Th" name="day[]" autocomplete="off">Thurs
                          </label>                    
                          <label class="btn btn-info">
                            <input type="checkbox" value="F" name="day[]" autocomplete="off">Fri
                          </label>
                        </div><br>
                    
                      <div class="form-group" style="float: left;width:350px">

                        <div class="label-column">
                            <label class="control-label" for="name-input-field">Section:</label>
                          </div>
                          <div class="input-column" style="text-align:right; padding-right: 55px">
                             <select class="form-control" name = "sec" id = "" " onchange="sec5(this.value)" required="">
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


                          <?php
                            if(!empty($_SESSION['sec_id'])){
                              $sec_id = $_SESSION['sec_id'];
                              $sub_ex = mysqli_query($conn, "SELECT css_subject.subject_id FROM css_subject, css_schedule, css_section
                                                      WHERE css_subject.subject_id=css_schedule.subject_id
                                                      AND css_section.SECTION_ID=css_schedule.section_id
                                                      AND YEAR_LEVEL = $grade
                                                      AND css_section.SECTION_ID='".$sec_id."'");
                              foreach ($sub_ex as $key) {
                                $sub_ex_id[] = $key['subject_id'];
                              }
                              $_SESSION['sec_id_t'] = $sec_id;
                              $_SESSION['sec_id'] = null; 
                            }
                          ?>

                          <div class="label-column">
                             <label class="control-label" for="name-input-field">Subject:</label>
                          </div>
                          <div class="input-column" style="text-align:right; padding-right: 55px">
                            <select class="form-control" name = "sub" id = "select_subj" onchange="time_start(this.value)" required>
                              <option value="">Select</option>
                             
                            </select>
                          </div>
                          
                          <div id="time_start">
                            <div class="label-column">
                             <label class="control-label" for="name-input-field">Start Time:</label>
                          </div>
                        <div class="input-column" style="text-align:right; padding-right: 55px">
                             <select class="form-control" name = "time_s" id = "" onchange="time(this.value)" required="">
                                <option value="">Select</option>
                             </select>
                          </div> 
                          <div class="label-column">
                             <label class="control-label" for="name-input-field">End Time:</label>
                          </div>
                          <div id="time_s" class="input-column" style="text-align:right; padding-right: 55px">
                             <select class="form-control" name = "time_e" id="">
                                <option>Select</option>
                             </select>
                          </div> 
                      <br>
                          </div>
                          
                          
                      </div><br>
<!-- TEACHER INFORMATION START -->            
          <div class="form-group" style="float: right;width: 480px;">
            <div class="panel panel-default">
            <div class="panel-heading">Teacher's Information</div>
             <div class="panel-body">
            <!--<table>
                                      <tr>
                            <td style="text-align:center"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Major &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Minor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Related&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                          </tr>
            </table><br>-->
            <div id="teacher"></div>
            
            </div>
            </div>
            </div>
            </div>
                    </div> 
<!-- TEACHER INFORMATION END -->            
            <center>
                          <div style="padding-bottom:30px">
                            <button class="btn save fa fa-check" name = "submit" type="submit"> Save</button>
                            </div> 
                          </center>
                    </form>
                </div>            
    </div>
 


<script type="text/javascript">


  function time_start(val){
    $.ajax({
      type: "POST",
      url: "time_start2.php",
      data: "sub_id="+val,
      success: function(data){
        $("#time_start").html(data);
      }
    });
  }

  function sec5(val){
    $.ajax({
      type: "POST",
      url: "sec_session.php",
      data: "sec_id="+val,
      success: function(data){
        $("#select_subj").html(data);
      }
    });
  }

</script>