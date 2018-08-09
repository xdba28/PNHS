<?php 
$sched = mysqli_query($conn, "SELECT subject_name,  P_fname, P_lname, TIME_START, TIME_END, 
                DAY, css_subject.subject_id
                              FROM css_schedule, css_subject, pims_employment_records, pims_personnel,
                              css_section, css_school_yr
                              WHERE css_schedule.emp_rec_ID is NULL
                              AND pims_employment_records.emp_No=pims_personnel.emp_No
                              AND css_schedule.SECTION_ID = css_section.SECTION_ID
                              AND css_schedule.subject_id = css_subject.subject_id
                              AND css_schedule.subject_id = 50011
                              AND css_schedule.SY_ID = css_school_yr.SY_ID
                              AND css_school_yr.SY_ID=$sy_id 
                              AND css_section.SECTION_ID=".$key['SECTION_ID']."");

    foreach ($sched as $rows) {
      $teach_str = "";
      for($i=0; $i<7; $i++){
          if($times[$i]==$rows['TIME_START']){
              $ts = $i;
          }
        }

      for($i=0; $i<7; $i++){
          if($timee[$i]==$rows['TIME_END']){
            $te = $i;
          }
      }
      $check = 0;
      for($i=0; $i<7; $i++){
          if($timess[$i]==$rows['TIME_START']){
            $check = 1;
          }
      }
    
    if($check==1){
        $tss=substr($rows['TIME_START'], 0, -3);
        $tee=substr($rows['TIME_END'], 0, -3);

        if(empty($sched_p[$c][$ts])){
          $sched_p[$c][7][$x]="";
        }
        if($rows['DAY']=='regular'){
            if($sub==50005||$sub==50009||$sub==50012){
              $sched_p[$c][7][$x] .= $rows['subject_name'].' '.$teach_str.'<br>'.$tss."-".$tee;
            }
            else{
              $sched_p[$c][7][$x] .= $rows['subject_name'].'/'.$teach_str.'<br>'.$tss."-".$tee;
            }
        }
        else{
            if($sub==50005||$sub==50009||$sub==50012){
              $sched_p[$c][7][$x] .= $rows['subject_name'].' '.$teach_str.'('.$rows['DAY'].')<br>'.$tss."-".$tee;
            }
            else{
              $sched_p[$c][7][$x] .= $rows['subject_name'].'/'.$teach_str.'('.$rows['DAY'].')<br>'.$tss."-".$tee;
            }
        }
    }

    while($ts<=$te){
        if($rows['DAY']!='regular'){
          if(empty($sched_p[$c][$ts][$x])){
            $sched_p[$c][$ts][$x]=$rows['subject_name'].'/'.$teach_str.'('.$rows['DAY'].')'."\n".'';
          }
          else{
            $sched_p[$c][$ts][$x] .= $rows['subject_name'].'/'.$teach_str.'('.$rows['DAY'].')'."\n".'';
          }
        }
        else{
          if($rows['subject_name']=='Specialization'){
            if(empty($sched_p[$c][$ts][$x])){
              $sched_p[$c][$ts][$x] = $rows['subject_name']."\n";
            }
            $sched_p[$c][$ts][$x] .= $teach_str."\n";
          }
          else{
            $sched_p[$c][$ts][$x] = $rows['subject_name']."\n".$teach_str;
          }
        }
    $ts++;
    }
    }

?>