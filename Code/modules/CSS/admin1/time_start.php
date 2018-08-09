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

if(!empty($_POST['sub_id'])){
  $_SESSION['sub'] = $_POST['sub_id'];
}

if($_SESSION['c_e']==1){
  $sql = mysqli_query($conn, "SELECT sy_id FROM css_school_yr WHERE status='used'");
  $row = mysqli_fetch_row($sql);
  $yr_id = $row[0];
}
else if ($_SESSION['c_e']==2){
  $yr_id = $_SESSION['yr_id'];
}
else{
  echo 'error';
  die();
}

if($grade==7 || $grade==9){
  $time_sql = mysqli_query($conn, "SELECT am_s FROM css_time WHERE sy_id=$yr_id");
    foreach ($time_sql as $key) {
      $times[] = $key['am_s'];
  }
  //$times=array('06:30:00', '07:20:00', '08:10:00', '09:10:00', '10:00:00', '10:50:00', '11:40:00');
  //$timee=array('06:30', '07:20', '08:10', '09:10', '10:00', '10:50', '11:40');
}
else{
  $time_sql = mysqli_query($conn, "SELECT pm_s FROM css_time WHERE sy_id=$yr_id");
    foreach ($time_sql as $key) {
      $times[] = $key['pm_s'];
  }
  //$times=array('12:30:00', '01:20:00', '02:10:00', '03:10:00', '04:00:00', '04:50:00', '05:40:00');
  //$timee=array('12:30', '01:20', '02:10', '03:10', '04:00', '04:50', '05:40');
}
$sec_id = $_SESSION['sec_id_t'];
$time_ex = mysqli_query($conn, "SELECT TIME_START, subject_id FROM css_schedule, css_section
                            WHERE css_section.SECTION_ID=css_schedule.section_id
                            AND css_section.SECTION_ID=$sec_id");
//$_SESSION['sec_id_t'] = null;
// foreach ($time_ex as $key) {
//   $time_ex_n[] = $key['TIME_START'];
// }
foreach ($time_ex as $key) {
  $time__ex = $key['TIME_START'];
  $sub_id = $key['subject_id'];
  $sub_str = "";
  $time_ex_sql = mysqli_query($conn, "SELECT DAY FROM css_schedule WHERE SECTION_ID=$sec_id 
                                      AND TIME_START='$time__ex'");
  foreach ($time_ex_sql as $bus) {
    if($bus['DAY']=="regular"){
      $time_ex_n[] = $key['TIME_START'];
    }
    else{
      $sub_str .= $bus['DAY'];
    }
    $sub_str = str_replace("-","",$sub_str);
      if(strlen($sub_str)==6){
        $time_ex_n[] = $key['TIME_START'];
      }
    } 
  }
?>

                       
                        <div class="label-column">
                             <label class="control-label" for="name-input-field">Start Time:</label>
                          </div>
                        <div class="input-column" style="text-align:right; padding-right: 55px">
                             <select class="form-control" name = "time_s" id = "" onchange="time(this.value)" required>
                                <option value="">Select</option>
                                <?php
                                  for($i=0; $i<count($times); $i++) { 
                                    if(!empty($time_ex_n)){
                                      $c=0;
                                      for($j=0; $j<count($time_ex_n); $j++){
                                        if($time_ex_n[$j]==$times[$i]){
                                          $c++;
                                        }
                                      }
                                      if($c==0){
                                        echo '<option value='.$times[$i].'>'.substr($times[$i], 0, -3).'</option>';
                                      }
                                    }
                                    else{
                                      echo '<option value='.$times[$i].'>'.substr($times[$i], 0, -3).'</option>';
                                    }
                                  }
                                
                                ?>
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

<script type="text/javascript">
  function time(val){
    $.ajax({
      type: "POST",
      url: "time_end.php",
      data: "time_s="+val,
      success: function(data){
        $("#time_s").html(data);
      }
    });
  }
</script>