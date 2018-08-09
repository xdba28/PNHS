<?php
$query = mysqli_query($conn, "LOCK TABLES css_schedule, css_school_yr, css_subject READ");
$sched = mysqli_query($conn, "SELECT subject_name, SECTION_NAME, TIME_START, TIME_END, DAY
                              FROM css_schedule, css_subject, css_section, css_school_yr
                              WHERE css_schedule.emp_rec_ID is NULL
                              AND css_schedule.SECTION_ID = css_section.SECTION_ID
                              AND css_schedule.subject_id = css_subject.subject_id
                              AND css_subject.subject_id=50011
                              AND css_schedule.SY_ID = css_school_yr.SY_ID 
                              AND css_section.YEAR_LEVEL = $grade
                              AND status = 'used'");
$query = mysqli_query($conn, "UNLOCK TABLES");

foreach ($sched as $row) {
  $teach_str = "";
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

    if(empty($sched_p[$co][$ts])){
      $sched_p[$co][count($times)]="";
    }
    if($row['DAY']=='regular'){
      $sched_p[$co][count($times)] .= $row['subject_name'].'/'.$teach_str.'<br>'.$tss."-".$tee;
    }
    else{
      $sched_p[$co][count($times)] .= $row['subject_name'].'/'.$teach_str.'('.$row['DAY'].')<br>'.$tss."-".$tee;
    }
  }
  else{
    $query = mysqli_query($conn, "SELECT SCHED_ID FROM css_schedule, css_school_yr
                                  WHERE css_schedule.SY_ID=css_school_yr.SY_ID AND status='used' 
                                  GROUP BY subject_id, SECTION_ID");
    $_SESSION['count_checker'] = mysqli_num_rows($query);
    $query = mysqli_query($conn, "SELECT SECTION_ID FROM css_section, css_school_yr
                                  WHERE css_section.SY_ID=css_school_yr.SY_ID AND status='used'");
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
      if($row['subject_name']=='Specialization'){
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
?>