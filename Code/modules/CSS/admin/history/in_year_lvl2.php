<?php
$sched_p=null;
$grade = 8;
//$room = mysqli_query($conn, "SELECT * FROM css_room");
$section = mysqli_query($conn, "SELECT SECTION_ID, SECTION_NAME FROM css_section, css_school_yr 
                                WHERE css_school_yr.SY_ID=$yr AND css_section.SY_ID=css_school_yr.SY_ID 
                                AND YEAR_LEVEL=8");
$teacher = mysqli_query($conn, "SELECT * FROM pims_personnel");
$subject = mysqli_query($conn, "SELECT * FROM css_subject");


    $time_sql = mysqli_query($conn, "SELECT pm_s FROM css_time WHERE sy_id=$yr");
    foreach ($time_sql as $key) {
      $times[] = $key['pm_s'];
    }
    $time_sql = mysqli_query($conn, "SELECT pm_e FROM css_time WHERE sy_id=$yr");
    foreach ($time_sql as $key) {
      $timee[] = $key['pm_e'];
    }
    $time_sql = mysqli_query($conn, "SELECT am_s FROM css_time WHERE sy_id=$yr");
    foreach ($time_sql as $key) {
      $timess[] = $key['am_s'];
    }

$query = mysqli_query($conn, "LOCK TABLES css_schedule, css_school_yr, pims_personnel, css_subject, pims_employment_records READ");
$sched = mysqli_query($conn, "SELECT subject_name,  P_fname, P_lname, SECTION_NAME, TIME_START, 
                              TIME_END, DAY, css_schedule.subject_id
                              FROM css_schedule, css_subject, pims_employment_records, pims_personnel,
                              css_section, css_school_yr
                              WHERE pims_employment_records.emp_rec_ID=css_schedule.emp_rec_ID
                              AND pims_employment_records.emp_No=pims_personnel.emp_No
                              AND css_schedule.SECTION_ID = css_section.SECTION_ID
                              AND css_schedule.subject_id = css_subject.subject_id
                              AND css_schedule.SY_ID = css_school_yr.SY_ID 
                              AND css_section.YEAR_LEVEL = 8
                              AND css_school_yr.SY_ID=$yr");
$query = mysqli_query($conn, "UNLOCK TABLES");

$ts = null;
$te = null;
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