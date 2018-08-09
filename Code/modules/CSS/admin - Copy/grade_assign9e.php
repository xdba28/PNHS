<?php
session_start();
include "db_conn.php";
$_SESSION['grade'] = 9;
$yr_id = $_SESSION['yr_id'];
$grade = 9;

    $time_sql = mysqli_query($conn, "SELECT am_s FROM css_time WHERE sy_id=$yr_id");
    foreach ($time_sql as $key) {
      $times[] = $key['am_s'];
    }
    
    $time_sql = mysqli_query($conn, "SELECT am_e FROM css_time WHERE sy_id=$yr_id");
    foreach ($time_sql as $key) {
      $timee[] = $key['am_e'];
    }
    $time_sql = mysqli_query($conn, "SELECT pm_s FROM css_time WHERE sy_id=$yr_id");
    foreach ($time_sql as $key) {
      $timess[] = $key['pm_s'];
    }
$section = mysqli_query($conn, "SELECT SECTION_ID, SECTION_NAME FROM css_section, css_school_yr 
                                WHERE css_school_yr.SY_ID=$yr_id AND css_section.SY_ID=css_school_yr.SY_ID 
                                AND YEAR_LEVEL=9");

$sched = mysqli_query($conn, "SELECT subject_name,  P_fname, P_lname, SECTION_NAME, TIME_START, 
                              TIME_END, DAY, css_schedule.subject_id
                              FROM css_schedule, css_subject, pims_employment_records, pims_personnel,
                              css_section, css_school_yr
                              WHERE pims_employment_records.emp_rec_ID=css_schedule.emp_rec_ID
                              AND pims_employment_records.emp_No=pims_personnel.emp_No
                              AND css_schedule.SECTION_ID = css_section.SECTION_ID
                              AND css_schedule.subject_id = css_subject.subject_id
                              AND css_schedule.SY_ID = css_school_yr.SY_ID 
                              AND css_section.YEAR_LEVEL = 9
                              AND css_school_yr.SY_ID=$yr_id");

$ts=null;
$te=null;
$c=0;
foreach ($sched as $row) {
  $teach_str = substr($row['P_fname'], 0, 1).". ".$row['P_lname'];
  $sub = $row['subject_id'];
  
  $co=0;
  foreach ($section as $key) {
    if($key['SECTION_NAME']==$row['SECTION_NAME']){
      break;
    }
    else
      $co++;
  }

  for($i=0; $i<count($times); $i++){
    if($times[$i]==$row['TIME_START']){
      $ts = $i;
    }
  }

  for($i=0; $i<count($times); $i++){
    if($timee[$i]==$row['TIME_END']){
      $te = $i;
    }
  }
  $check = 0;
  for($i=0; $i<count($times); $i++){
    if($timess[$i]==$row['TIME_START']){
      $check = 1;
    }
  }

  if($check==1){
    $tss=substr($row['TIME_START'], 0, -3);
    $tee=substr($row['TIME_END'], 0, -3);

    if(empty($sched_p[$co][count($times)])){
      $sched_p[$co][count($times)] = "";
    }

    if($row['DAY']=='regular'){
      if($sub==50010){
        if($sched_p[$co][count($times)]==""){
          $sched_p[$co][count($times)] .= $row['subject_name'].'<br>'.$tss."-".$tee.'<br>'.$teach_str.'<br>';
        }
        else{
          $sched_p[$co][count($times)] .= $teach_str.'<br>';
        }
      }
      else{
        $sched_p[$co][count($times)] .= $row['subject_name'].'/'.$teach_str.'<br>'.$tss."-".$tee;
      }
    }
    else{
      if($sub==50010){if($sched_p[$co][count($times)]==""){
          $sched_p[$co][count($times)] .= $row['subject_name'].'<br>'.$tss."-".$tee.' ('.$row['DAY'].')<br>'.$teach_str.'<br>';
        }
        else{
          $sched_p[$co][count($times)] .= $teach_str.'<br>';
        }
      }
      else{
        $sched_p[$co][count($times)] .= $row['subject_name'].'/'.$teach_str.'('.$row['DAY'].')<br>'.$tss."-".$tee;
      }
    }
  }
  else{
    $query = mysqli_query($conn, "SELECT SCHED_ID FROM css_schedule, css_school_yr
                                  WHERE css_schedule.SY_ID=css_school_yr.SY_ID AND css_school_yr.SY_ID=$yr_id
                                  GROUP BY subject_id, SECTION_ID");
    $_SESSION['count_checker'] = mysqli_num_rows($query);
    $query = mysqli_query($conn, "SELECT SECTION_ID FROM css_section, css_school_yr
                                  WHERE css_section.SY_ID=css_school_yr.SY_ID AND css_school_yr.SY_ID=$yr_id");
    $_SESSION['cell_count'] = mysqli_num_rows($query) * 7;
  }

  $day[$c] = $row['DAY'];
  
  while($ts<=$te){
    if($row['DAY']!='regular'){
      if(empty($sched_p[$co][$ts])){
        $sched_p[$co][$ts]=$row['subject_name'].'/'.$teach_str.'('.$row['DAY'].')<br>';
      }
      else{
        $sched_p[$co][$ts] .= $row['subject_name'].'/'.$teach_str.'('.$row['DAY'].')<br>';
      }
    }
    else{
      if($sub==50010){
        if(empty($sched_p[$co][$ts])){
          $sched_p[$co][$ts] = $row['subject_name']."<br>";
        }
        $sched_p[$co][$ts] .= $teach_str."<br>";
      }
      else{
        $sched_p[$co][$ts] = $row['subject_name']."<br>".$teach_str;
      }
    }
  $ts++;
  }
  $c++;
}
include "empty_teach.php";
?>

<div class=" pane--table1">
  <div class="pane-hScroll3">
  <br>
    <table>
    <thead>
      <tr class="headings">
        <th class="column-title" style="text-align:center;font-size:13px">Time </th>
        <?php for($i=0; $i<count($times); $i++){?>
        <th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center">
        <?php echo substr($times[$i], 0, -3)."-".substr($timee[$i], 0, -3);?></th>
        <?php  }?>
        <th rowspan="2" class="column-title" style="padding-bottom:20px;text-align:center"><button class="btn btn-default btn-circle-table" type="button" data-toggle="modal" data-target="#extend_sched" onclick="extend(this.value)">
        <i class="fa fa-plus"></i>
        </button></th>        
      </tr>
      <tr>
        <th class="time col-md-1 " style="font-size:13px; text-align:center; padding-top:10px">Room # & Section</th> 
      </tr>
    </thead>
    </table>

    <div class="pane-vScroll3">
      <table>
                        <tbody style="text-align: center; font-size: 15px">
                        <?php 
                          $x = 0;
                          foreach($section as $sec_name) {
                            $sec = mysqli_query($conn, "SELECT P_fname, P_lname
                                                        FROM css_section,
                                                        pims_employment_records, pims_personnel
                                                        WHERE pims_employment_records.emp_No=pims_personnel.emp_No
                                                        AND pims_employment_records.emp_rec_ID=css_section.emp_rec_ID
                                                        AND SECTION_ID=".$sec_name['SECTION_ID']."");
                            $rom = mysqli_query($conn, "SELECT ROOM_NO FROM css_section
                                                        WHERE SECTION_ID=".$sec_name['SECTION_ID']."");
                            $row = mysqli_fetch_row($sec);
                            $rowr = mysqli_fetch_row($rom);
                            if(empty($row)){
                              $adv = "";
                            }
                            else{
                              $adv = substr($row[0], 0, 1).". ".$row[1];
                            }
                          ?>
                          <td class="time" style="padding-top: 25px; text-align: center;"><?php echo $sec_name['SECTION_NAME']."<br>".$adv."<br>".$rowr[0]?>
                          </td>
                            <?php
                            for($y=0; $y<count($times)+1; $y++){?>
                            <td class="" style="padding-bottom:none">
                              
                              <div class="form-group">
                                <div class="search-box">
                                <?php
                                if(!empty($sched_p[$x][$y])){
                                  echo '<p align="center">'.$sched_p[$x][$y].'</p>';
                                }
                                ?>  
                                <div class="result"></div>  
                              </div>
                              </div>
                            </td>
                            <?php } ?>
                          </tr>
                          <?php $x++; } ?>
                        </tbody>
      </table>
    </div>
  </div>
</div>
<br><br><br>

<script  src="../js/index3.js"></script>

<script> 
  function extend(val){
    $.ajax({
      type: "POST",
      url: "extend_sched.php",
      data: "grade="+val,
      success: function(data){
        $("#extend_sched").html(data);
      }
    });
  }
</script>