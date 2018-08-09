<?php

include_once('..//db_connect.php');
session_start();


	if(isset($_POST['submit_class']))
	{
		$date = date('Y-m-d');
		$sec_id = $_POST['sec_id'];
		foreach($_POST['bmino'] as $key => $bmino)
		{
		//echo $selected."</br>";
			$meter = $_POST['height'][$key] * 0.01;
			$fbmi = $_POST['weight'][$key] / ($meter * $meter);
			$bmi = round($fbmi, 2);
			
			if($bmi < 15)
			{
				$status = "Severely Wasted";
			}
			else if($bmi == 15 || $bmi < 18.5)
			{
				$status = "Wasted";
			}
			else if($bmi == 18.5 || $bmi <= 25)
			{
				$status = "Normal";
			}
			else if($bmi == 25 || $bmi <= 30)
			{
				$status = "Overweight";
			}
			else if($bmi > 30)
			{
				$status = "Obese";
			}
			
			mysqli_autocommit($mysqli, FALSE);
			mysqli_query($mysqli, "LOCK TABLES scms_bmi_rec WRITE");
			$updatehw = mysqli_query($mysqli, "UPDATE `scms_bmi_rec` SET `weight`='".$_POST['weight'][$key]."',`height`='".$_POST['height']{$key}."',
				bmi = '".$bmi."', nutri_status = '".$status."'
				WHERE bmi_no = '".$bmino."'")
				or die ("Error: ".mysqli_error($mysqli));	
		
		}
		if($updatehw)
		{
			mysqli_commit($mysqli);
			echo '<script>
			alert("Successfully saved!");
			window.location.href="view.php?sec_id='.base64_url_encode($sec_id).'";
			</script>';
		 } 
		else
		{
			mysqli_rollback($mysqli);
			echo '<script>
			alert("Cannot save class bmi record!");
			window.location.href="view.php?sec_id='.base64_url_encode($sec_id).'";
			</script>';
		}
		mysqli_query($mysqli, "UNLOCK TABLES");
	}
?>