<?php

include_once('..//db_connect.php');
session_start();



	if(isset($_POST['submit_class']))
	{
		$date = date('Y-m-d');
		$sec_id = $_POST['sec_id'];
		foreach($_POST['acc_id'] as $key => $acc_id)
		{
		//echo $selected."</br>";
			if(empty($_POST['height'][$key]) || empty($_POST['weight'][$key]))
			{
				$bmi = '';
				$status = '';
			}
			else
			{
				
				$meter = $_POST['height'][$key] * 0.01;
				$fbmi = $_POST['weight'][$key] / ($meter * $meter);
				$bmi = round($fbmi, 1);
				
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
			}
			mysqli_autocommit($mysqli, FALSE);
			mysqli_query($mysqli, "LOCK TABLES scms_bmi_rec WRITE");
			
			$q_insertbmi = mysqli_query($mysqli, "INSERT INTO scms_bmi_rec
				(bmi_no, height, weight, bmi, nutri_status, cms_account_ID, bmi_date_of_update)
				VALUES('', '".$_POST['height'][$key]."', '".$_POST['weight'][$key]."', '".$bmi."', '".$status."', '".$acc_id."', '".$date."')")
				or die ("Error: ".mysqli_error($mysqli));	
		
		}
		if($q_insertbmi)
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
			alert("Cannot save patient record!");
			window.location.href="view.php?sec_id='.base64_url_encode($sec_id).'";
			</script>';
		}
		mysqli_query($mysqli, "UNLOCK TABLES");
	}
	
?>