<?php
include "db_conn.php";
session_start();
if(empty($_SESSION['sy'])){
  echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Create schedule or continue your work on creating schedule!.')
        window.location.href='index.php';
        </SCRIPT>");
        die();
  header("location: year_level.php");
}
$grade = $_SESSION['grade'];
$yr_id = $_SESSION['yr_id'];
$teach="";

if($grade==7 || $grade==9){
    $time_sql = mysqli_query($conn, "SELECT am_s FROM css_time WHERE sy_id=$yr_id");
    foreach ($time_sql as $key) {
      $times[] = $key['am_s'];
    }
    
    $time_sql = mysqli_query($conn, "SELECT am_e FROM css_time WHERE sy_id=$yr_id");
    foreach ($time_sql as $key) {
      $timee[] = $key['am_e'];
    }
}
else{
    $time_sql = mysqli_query($conn, "SELECT pm_s FROM css_time WHERE sy_id=$yr_id");
    foreach ($time_sql as $key) {
      $times[] = $key['pm_s'];
    }
    $time_sql = mysqli_query($conn, "SELECT pm_e FROM css_time WHERE sy_id=$yr_id");
    foreach ($time_sql as $key) {
      $timee[] = $key['pm_e'];
    }
}


// if($grade==7 || $grade==9){
//     $times=array('06:30:00', '07:20:00', '08:10:00', '09:10:00', '10:00:00', '10:50:00', '11:40:00');
//     $timee=array('07:20:00', '08:10:00', '09:00:00', '10:00:00', '10:50:00', '11:40:00', '12:30:00');
// }
// else{
//     $times=array('12:30:00', '01:20:00', '02:10:00', '03:10:00', '04:00:00', '04:50:00', '05:40:00');
//     $timee=array('01:20:00', '02:10:00', '03:00:00', '04:00:00', '04:50:00', '05:40:00', '06:30:00');
// }
$query1 = mysqli_query($conn, "LOCK TABLES css_school_yr, css_section, css_schedule, css_subject, pims_personnel, pims_employment_records READ");
$sy = mysqli_query($conn, "SELECT SY_ID FROM css_school_yr WHERE SY_ID=$yr_id");
$sy = mysqli_fetch_row($sy);

$section_q = mysqli_query($conn, "SELECT SECTION_ID, SECTION_NAME FROM css_section, css_school_yr 
                                WHERE css_school_yr.SY_ID=$yr_id AND css_section.SY_ID=css_school_yr.SY_ID 
                                AND YEAR_LEVEL=$grade");
$sched = mysqli_query($conn, "SELECT subject_name,  P_fname, P_lname, SECTION_NAME, TIME_START, TIME_END, DAY
                              FROM css_schedule, css_subject, pims_employment_records, pims_personnel,
                              css_section, css_school_yr
                              WHERE pims_employment_records.emp_rec_ID=css_schedule.emp_rec_ID
                              AND pims_employment_records.emp_No=pims_personnel.emp_No
                              AND css_schedule.SECTION_ID = css_section.SECTION_ID
                              AND css_schedule.subject_id = css_subject.subject_id
                              AND css_schedule.SY_ID = css_school_yr.SY_ID 
                              AND css_section.YEAR_LEVEL = $grade
                              AND css_school_yr.SY_ID=$yr_id");
$query1 = mysqli_query($conn, "UNLOCK TABLES");




    if(!empty($_POST['time_s']) && !empty($_POST['time_e'])){
        $ts = $_POST['time_s'];
        $te = $_POST['time_e'];
		$ts_d = substr($ts, 0, -3);
		$te_d = substr($te, 0, -3);
    }
    if(!empty($_POST['sec'])){
        $sec=$_POST['sec'];
    }
    

    if(!empty($_POST['sub'])){
    	$sub=$_POST['sub'];
		
		$s_name_query = mysqli_query($conn, "SELECT sub_desc FROM css_subject WHERE subject_id = $sub");
		$s_name = mysqli_fetch_row($s_name_query);
		
        if(!empty($_POST['day'])){
            $day=$_POST['day'];
            $query1 = mysqli_query($conn, "LOCK TABLES css_schedule, css_school_yr READ");
            $query = mysqli_query($conn, "SELECT * FROM css_schedule, css_school_yr  
                                        WHERE DAY != 'regular'
                                        AND css_schedule.SY_ID=css_school_yr.SY_ID
                                        AND SECTION_ID = $sec
                                        AND css_school_yr.SY_ID=$yr_id AND TIME_START='$ts' AND TIME_END='$te'
                                        ");
            $query1 = mysqli_query($conn, "UNLOCK TABLES");
            $rows = mysqli_num_rows($query);
            if($rows!=0){
                
                foreach ($query as $key) {
                    if(empty($qday)){
                        $qday = $key['DAY'];
                        continue;   
                    }
                    $qday .= "-".$key['DAY'];
                }
                $qday = explode("-", $qday);
                $count=0;
                $day_error="";
				$f = count($day);						
				$f--;
                for($i=0; $i<count($day); $i++){
                    for($j=0; $j<count($qday); $j++){
                        if($day[$i]==$qday[$j]){
                            $day_error .= $qday[$j];
                            $count++;
                        }
                    }
					if ($i != $f) 
					$day_error .= "-";
                }
                
                if($count!=0){
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                            window.alert('Sorry, (".$day_error.") is/are not available in selected time.')
                            window.history.go(-1);
                            </SCRIPT>");
                            die();
                }
            }
            //print_r($day);
            //print_r($qday);
            $day=implode("-", $day);
        }
        else{
            $day='regular';
        }

        if(!empty($_POST['teach'])){
            $teach=$_POST['teach'];
            if($sub!=50010){
                if(count($teach)==1){
                    $teach=implode("", $teach);
                    $query1 = mysqli_query($conn, "LOCK TABLES css_schedule, css_school_yr, pims_personnel, pims_employment_records");
                    if($day=='regular'){
                        $query = mysqli_query($conn, "SELECT * FROM css_schedule, css_school_yr
                                        WHERE css_schedule.SY_ID = css_school_yr.SY_ID 
                                        AND emp_rec_ID=$teach
                                        AND TIME_START='$ts' AND TIME_END='$te' 
                                        AND css_school_yr.SY_ID=$yr_id AND (DAY='regular' OR DAY!='regular')");
                        $rows = mysqli_num_rows($query);
                        if($rows!=0){
                            echo ("<SCRIPT LANGUAGE='JavaScript'>
                                window.alert('Sorry, teacher is not available.')
                                window.history.go(-1);
                                </SCRIPT>");
                                die();
                        }
                    }
                    else{
                        $query = mysqli_query($conn, "SELECT * FROM css_schedule, css_school_yr
                                        WHERE css_schedule.SY_ID = css_school_yr.SY_ID
                                        AND (TIME_START='$ts' OR TIME_END='$te') 
                                        AND css_school_yr.SY_ID=$yr_id AND emp_rec_ID=$teach
                                        AND DAY!='regular' ");
                        $rows = mysqli_num_rows($query);
                        if($rows!=0){
                            foreach ($query as $key) {
                                if(empty($qday)){
                                    $qday = $key['DAY'];
                                    continue;   
                                }
                                $qday .= "-".$key['DAY'];
                            }
                            $qday = explode("-", $qday);
                            $day=explode("-", $day);
                            $count=0;
                            for($i=0; $i<count($day); $i++){
                                for($j=0; $j<count($qday); $j++){
                                    if($day[$i]==$qday[$j]){
                                        $count++;
                                    }
                                }
                            }
                            $day=implode("-", $day);
                            $qday = implode("-", $qday);
                            $teacher_q = mysqli_query($conn, "SELECT P_fname, P_lname FROM pims_personnel, pims_employment_records 
                                    WHERE pims_employment_records.emp_No=pims_personnel.emp_No
                                    AND emp_rec_ID=$teach");
                            $row = mysqli_fetch_row($teacher_q);
                            if($count!=0){
                                echo ("<SCRIPT LANGUAGE='JavaScript'>
                                        window.alert('Sorry, teacher ".$row[0]." ".$row[1]." is not available in ".$qday."')
                                        window.history.go(-1);
                                        </SCRIPT>");
                                        die();
                            }
                        }
                    $query1 = mysqli_query($conn, "UNLOCK TABLES");
                    }
                }
                else{
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                            window.alert('Error: Many teachers are selected.')
                            window.history.go(-1);
                            </SCRIPT>");
                            die();
                }
            }
        }
        else{
            include "check_sched_sub.php";
        }
        
		
		$sql = mysqli_query($conn, "START TRANSACTION;");
		$sql = mysqli_query($conn, "SET AUTOCOMMIT=0;");
		
        if($day=='regular'){
			$dup_subj = mysqli_query($conn, "SELECT * FROM css_schedule, css_school_yr
                                            WHERE css_schedule.SY_ID=css_school_yr.SY_ID
                                            AND css_school_yr.SY_ID=$yr_id
                                            AND SECTION_ID = $sec
                                            AND subject_id = $sub");
            $rows_dup_subj = mysqli_num_rows($dup_subj);

			if ($rows_dup_subj!=0) {
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Sorry, selected subject $s_name[0] is already scheduled.')
                window.history.go(-1);
                </SCRIPT>");
			}
			
            $query1 = mysqli_query($conn, "LOCK TABLES css_schedule, css_school_yr READ");
            $query = mysqli_query($conn, "SELECT * FROM css_schedule, css_school_yr
                                            WHERE css_schedule.SY_ID=css_school_yr.SY_ID
                                            AND css_school_yr.SY_ID=$yr_id
                                            AND SECTION_ID = $sec
                                            AND (TIME_START = '$ts'
                                            OR TIME_END = '$te'
                                            OR subject_id = $sub)");
            $rows = mysqli_num_rows($query);
            $query1 = mysqli_query($conn, "UNLOCK TABLES");
            $query1 = mysqli_query($conn, "LOCK TABLES css_schedule WRITE");
            if($rows==0){
                if($sub==50010){
                    for($i=0; $i<count($teach); $i++){
                
                        $sql = mysqli_query($conn, "INSERT INTO css_schedule VALUES (null, $sub, $teach[$i], $sy[0], $sec, '$day', '$ts', '$te')");
						
                        header("location: edit_sched.php?yr=".$yr_id."");    
                    }
                }
                else{
                    if(!empty($teach)){
                        $sql = mysqli_query($conn, "INSERT INTO css_schedule VALUES (null, $sub, $teach, $sy[0], $sec, '$day', '$ts', '$te')");
                    }
                    else{
                        $sql = mysqli_query($conn, "INSERT INTO css_schedule VALUES (null, $sub, null, $sy[0], $sec, '$day', '$ts', '$te')");
                    }
                    header("location: edit_sched.php?yr=".$yr_id."");
                }
				
            }
            else{
				$sql = mysqli_query($conn, "ROLLBACK;");
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Sorry, selected time $ts_d - $te_d is not vacant.')
                window.history.go(-1);
                </SCRIPT>");
            }
            $query1 = mysqli_query($conn, "UNLOCK TABLES");
			$sql = mysqli_query($conn, "COMMIT;");
        }
		
        else{
			$dup_subj = mysqli_query($conn, "SELECT * FROM css_schedule, css_school_yr
                                            WHERE css_schedule.SY_ID=css_school_yr.SY_ID
                                            AND css_school_yr.SY_ID=$yr_id
                                            AND SECTION_ID = $sec
                                            AND subject_id = $sub");
            $rows_dup_subj = mysqli_num_rows($dup_subj);

			if ($rows_dup_subj!=0) {
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Sorry, selected subject $s_name[0] is already scheduled.')
                window.history.go(-1);
                </SCRIPT>");
			}
			
			
            $query1 = mysqli_query($conn, "LOCK TABLES css_school_yr, css_schedule READ");
            $query = mysqli_query($conn, "SELECT * FROM css_schedule, css_school_yr 
                                            WHERE css_schedule.SY_ID=css_school_yr.SY_ID
                                            AND css_school_yr.SY_ID=$yr_id
                                            AND SECTION_ID = $sec
                                            AND DAY = 'regular'
                                            AND (TIME_START = '$ts'
                                            OR TIME_END = '$te'
                                            OR subject_id = $sub)");
            $rows = mysqli_num_rows($query);
            $query1 = mysqli_query($conn, "UNLOCK TABLES");
            $query1 = mysqli_query($conn, "LOCK TABLES css_schedule WRITE");
			
            if($rows==0){
                if($sub==50010){
                    for($i=0; $i<count($teach); $i++){
                
                        $sql = mysqli_query($conn, "INSERT INTO css_schedule VALUES (null, $sub, $teach[$i], $sy[0], $sec, '$day', '$ts', '$te')");
                        header("location: edit_sched.php?yr=".$yr_id."");    
                    }
                }
                else{
                    if(!empty($teach)){
                        $sql = mysqli_query($conn, "INSERT INTO css_schedule VALUES (null, $sub, $teach, $sy[0], $sec, '$day', '$ts', '$te')");
                    }
                    else{
                        $sql = mysqli_query($conn, "INSERT INTO css_schedule VALUES (null, $sub, null, $sy[0], $sec, '$day', '$ts', '$te')");
                    }
                    header("location: edit_sched.php?yr=".$yr_id."");
                }
				$sql = mysqli_query($conn, "COMMIT");
            }
            else{
				$sql = mysqli_query($conn, "ROLLBACK;");
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Sorry, selected time $ts_d - $te_d is not vacant.')
                window.history.go(-1);
                </SCRIPT>");
            }
            $query1 = mysqli_query($conn, "UNLOCK TABLES");
        }
    }
    
?>