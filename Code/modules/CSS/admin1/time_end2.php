<?php
session_start(); 
include "db_conn.php";
$grade = $_SESSION['grade'];
$sub = $_SESSION['sub'];

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


if($grade==8 || $grade==10){
	$time_sql = mysqli_query($conn, "SELECT am_s FROM css_time WHERE sy_id=$yr_id");
    foreach ($time_sql as $key) {
      $times[] = $key['am_s'];
    }
    
    $time_sql = mysqli_query($conn, "SELECT am_e FROM css_time WHERE sy_id=$yr_id");
    foreach ($time_sql as $key) {
      $timee[] = $key['am_e'];
    }
	//$times=array('06:30:00', '07:20:00', '08:10:00', '09:10:00', '10:00:00', '10:50:00', '11:40:00');
    //$timee=array('07:20:00', '08:10:00', '09:00:00', '10:00:00', '10:50:00', '11:40:00', '12:30:00');
    //$timeee=array('07:20', '08:10', '09:00', '10:00', '10:50', '11:40', '12:30');
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
	//$times=array('12:30:00', '01:20:00', '02:10:00', '03:10:00', '04:00:00', '04:50:00', '05:40:00');
    //$timee=array('01:20:00', '02:10:00', '03:00:00', '04:00:00', '04:50:00', '05:40:00', '06:30:00');
    //$timeee=array('01:20', '02:10', '03:00', '04:00', '04:50', '05:40', '06:30');
}

if(!empty($_POST['time_s'])){
	$time = $_POST['time_s'];
	$_SESSION['time_s'] = $time;
	for ($i=0; $i < count($times); $i++) { 
		if($time==$times[$i]){
			break;
		}
	}

if($sub==50010){
	echo'<select class="form-control" name = "time_e" id="" onchange="teacher(this.value)" required>
		<option value="">Select</option>';
		echo '<option value='.$timee[$i].'>'.substr($timee[$i], 0, -3).'</option>';
		if($i!=count($times)-1){
			echo '<option value='.$timee[$i+1].'>'.substr($timee[$i+1], 0, -3).'</option>';
		}	
	echo'</select>';
}
else{
	echo'<select class="form-control" name = "time_e" id="" onchange="teacher(this.value)" required>
		<option value="">Select</option>';
	echo '<option value='.$timee[$i].'>'.substr($timee[$i], 0, -3).'</option>';	
	echo'</select>';
}
}
?>

<script type="text/javascript">
  function teacher(val){
		$.ajax({
			type: "POST",
			url: "select_teacher.php",
			data: "time_e="+val,
			success: function(data){
				$("#teacher").html(data);
			}
		});
	}
</script>
