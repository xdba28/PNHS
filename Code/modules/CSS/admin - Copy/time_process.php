<?php
//session_start();
include "db_conn.php";
// $time = date('12:00:00');
// $new = strtotime('+15 minutes', strtotime($time));
// /echo date('h:i:s',$new)."\n";
date_default_timezone_set('GMT');
$sy = mysqli_query($conn, "SELECT sy_id FROM css_school_yr WHERE status = 'used'");
$row = mysqli_fetch_row($sy);
$yr = $row[0];
if(!empty($_POST['time'])){
	$pers = $_POST['pers'];
	$mins = $_POST['mins'];
	$time_temp =  explode(" ", date("h:i:s A",strtotime($_POST['time'])));
	$time = $time_temp[0];
	echo $pers."-".$mins."-".$time;
	// /$time_temp = $time_temp);
	if($time_temp[1]=='AM'){
		$sql = mysqli_query($conn, "SELECT time_id, am_s, am_e FROM css_time WHERE sy_id='$yr'");
		$c = 0;
		foreach ($sql as $key) {
			if($c==$pers){
				$time_id = $key['time_id'];
				$times = $key['am_s'];
				$timee = $key['am_e'];
				$new = strtotime('+'.$mins.' minutes', strtotime($time));
				$time2 = date('h:i:s', $new);
				$sql_u = mysqli_query($conn, "UPDATE css_time SET am_s='$time', am_e='$time2' WHERE time_id='$time_id'");
			}
			$c++;
		}
		$sched_del = mysqli_query($conn, "DELETE FROM css_schedule WHERE sy_id='$yr'");
		header("location: time.php");
	}
	else{
		$sql = mysqli_query($conn, "SELECT time_id, pm_s, pm_e FROM css_time WHERE sy_id='$yr'");
		$c = 0;
		foreach ($sql as $key) {
			if($c==$pers){
				$time_id = $key['time_id'];
				$times = $key['pm_s'];
				$timee = $key['pm_e'];
				$new = strtotime('+'.$mins.' minutes', strtotime($time));
				$time2 = date('h:i:s', $new);
				$sql_u = mysqli_query($conn, "UPDATE css_time SET pm_s='$time', pm_e='$time2' WHERE time_id='$time_id'");
			}
			$c++;
		}
		$sched_del = mysqli_query($conn, "DELETE FROM css_schedule WHERE sy_id='$yr'");
		header("location: time.php");
	}
}

else if(!empty($_POST['per'])){
	$sql = mysqli_query($conn, "SELECT am_s, am_e, pm_s, pm_e FROM css_time WHERE sy_id='$yr'");
	$nr = mysqli_num_rows($sql);
	$per = $_POST['per'];
	foreach ($sql as $key) {
		$times[] = $key['am_s'];
		$timee[] = $key['am_e'];
		$times1[] = $key['pm_s'];
		$timee1[] = $key['pm_e'];
	}
	if($per>$nr){
		$count = $per - $nr;
		for ($i=0; $i < $count; $i++) { 
			$times[] = '';
			$timee[] = '';
			$times1[] = '';
			$timee1[] = '';
		}
		$sql_d = mysqli_query($conn," DELETE FROM css_time WHERE sy_id='$yr'");
		for ($i=0; $i < $per; $i++) { 
			$sql_i = mysqli_query($conn, "INSERT INTO css_time VALUES(null, $yr, '$times[$i]', '$timee[$i]', '$times1[$i]', '$timee1[$i]')");
		}
	}
	else if($per<$nr){
		$sql_d = mysqli_query($conn," DELETE FROM css_time WHERE sy_id='$yr'");
		for ($i=0; $i < $per; $i++) { 
			$sql_i = mysqli_query($conn, "INSERT INTO css_time VALUES(null, $yr, '$times[$i]', '$timee[$i]', '$times1[$i]', '$timee1[$i]')");
		}
	}
	$sched_del = mysqli_query($conn, "DELETE FROM css_schedule WHERE sy_id='$yr'");
	
	$times1 = null;
	$timee1 = null;
	$timea = null;
	$timep = null;
	echo '
	<thead>
                                  <tr>
                                    <th style="width:70px">Periods</th>
                                    <th>AM</th>
                                    <th>PM</th>
                                  </tr>
                                </thead>';
                                
                                $sy2 = mysqli_query($conn, "SELECT sy_id FROM css_school_yr WHERE status = 'used'");
                                $rr = mysqli_fetch_row($sy2);
                                $yr = $rr[0];
                                    $time_sql = mysqli_query($conn, "SELECT am_s FROM css_time WHERE sy_id=$yr");
                                    foreach ($time_sql as $key) {
                                      $times1[] = $key['am_s'];
                                    }
                                    $time_sql = mysqli_query($conn, "SELECT am_e FROM css_time WHERE sy_id=$yr");
                                    foreach ($time_sql as $key) {
                                      $timee1[] = $key['am_e'];
                                    }
                                    for ($i=0; $i < count($times1); $i++) { 
                                      $timea[] = substr($times1[$i], 0, -3)."-".substr($timee1[$i], 0, -3); 
                                    }

                                    $time_sql = mysqli_query($conn, "SELECT pm_s FROM css_time WHERE sy_id=$yr");
                                    foreach ($time_sql as $key) {
                                      $times2[] = $key['pm_s'];
                                    }
                                    $time_sql = mysqli_query($conn, "SELECT pm_e FROM css_time WHERE sy_id=$yr");
                                    foreach ($time_sql as $key) {
                                      $timee2[] = $key['pm_e'];
                                    }
                                    for ($i=0; $i < count($times2); $i++) { 
                                      $timep[] = substr($times2[$i], 0, -3)."-".substr($timee2[$i], 0, -3); 
                                    }
                                    for ($i=0; $i < count($times1); $i++) { 
                                        $t = $i+1;
                                        if($t==1){
                                            $t .= "st";
                                        }
                                        else if($t==2){
                                            $t .= "nd";
                                        }
                                        else{
                                            $t .= "th";
                                        }
                                        echo '
                                        <tr>
                                            <th>'.$t.'</th>
                                            <th>'.$timea[$i].'</th>
                                            <th>'.$timep[$i].'</th>
                                        </tr>
                                            ';
                                    }
                                
}
else if(!empty($_POST['persy'])){
	$sql = mysqli_query($conn, "SELECT * FROM css_school_yr, css_time WHERE css_school_yr.sy_id=css_time.sy_id AND status='used'");
    $per = mysqli_num_rows($sql);
    for ($i=0; $i < $per; $i++) { 
        $ti = $i+1;
        if($ti==1){
            $ti .= "st";
        }
        else if($ti==2){
            $ti .= "nd";
        }
        else{
            $ti .= "th";
        }
        echo '
            <option value="'.$i.'">'.$ti.'</option>';
    }
}
else if(isset($_POST['update'])){
	$pers = $_POST['pers4']+1;
	$mins = $_POST['inter4'];
	$recess = $_POST['yey'];
	$time_temp =  explode(" ", date("h:i:s A",strtotime($_POST['time4'])));
	$time = $time_temp[0];
	//$_POST['time4']
	if($time_temp[1]=='AM'){
		$sql = mysqli_query($conn, "SELECT time_id, am_s, am_e FROM css_time WHERE sy_id='$yr'");
		$c = 0;
		$time2 = null;
		foreach ($sql as $key) {
			if($c==$pers){
				$time = strtotime('+'.$recess.' minutes', strtotime($time));
				$time = date('h:i:s', $time);
			}
			$time_id = $key['time_id'];
			$times = $key['am_s'];
			$timee = $key['am_e'];
			$time2 = strtotime('+'.$mins.' minutes', strtotime($time));
			$time2 = date('h:i:s', $time2);
			$sql_u = mysqli_query($conn, "UPDATE css_time SET am_s='$time', am_e='$time2' WHERE time_id='$time_id'");
			$time = $time2;
			$c++;
		}
		$sched_del = mysqli_query($conn, "DELETE FROM css_schedule WHERE sy_id='$yr'");
		header("location: time.php");
	}
	else{
		$sql = mysqli_query($conn, "SELECT time_id, pm_s, pm_e FROM css_time WHERE sy_id='$yr'");
		$c = 0;
		$time2 = null;
		foreach ($sql as $key) {
			if($c==$pers){
				$time = strtotime('+'.$recess.' minutes', strtotime($time));
				$time = date('H:i:s', $time);
			}
			$time_id = $key['time_id'];
			$times = $key['pm_s'];
			$timee = $key['pm_e'];
			$time2 = strtotime('+'.$mins.' minutes', strtotime($time));
			$time2 = date('H:i:s', $time2);

			$time2 = date('h:i:s', strtotime($time2));
			$sql_u = mysqli_query($conn, "UPDATE css_time SET pm_s='$time', pm_e='$time2' WHERE time_id='$time_id'");
			$time = $time2;
			$c++;
		}
		$sched_del = mysqli_query($conn, "DELETE FROM css_schedule WHERE sy_id='$yr'");
		header("location: time.php");
	}

}
?>