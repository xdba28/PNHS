<link rel="stylesheet" href="../../swal/sweetalert.css">
<script src="../../swal/sweetalert.js"></script>

<?php
include("../../db_connect.php");
session_start();



	if(isset($_POST['submit_medrec']))
	{
		$accID = $_POST['id'];
		$allergies = $_POST["allergies"];
		$eye = $_POST["eye"];
		$eyedesc = $_POST["eyedesc"];
		$ear = $_POST["ear"];
		$eardesc = $_POST["eardesc"];
		$name = $_POST["name"];
		$rel = $_POST["rel"];
		$num = $_POST["num"];
		$d = date('Y-m-d');
		
		mysqli_autocommit($mysqli, FALSE);
		mysqli_query($mysqli, "start transaction");
		mysqli_query($mysqli, "LOCK TABLES scms_medrec, scms_immune_rec_line, scms_illness_hist_line WRITE");
		
		
			$q_insertmedrec = mysqli_query($mysqli, "INSERT INTO scms_medrec
			(medrec_id, eyeglass, ear_infection, allergies, eye_cond_desc, ear_cond_desc, emer_contact_name, relationship, emer_contact_no, date_of_update, cms_account_ID)
			VALUES ('', '".$eye."', '".$ear."', '".$allergies."', '".$eyedesc."', '".$eardesc."', '".$name."', '".$rel."', '".$num."', '".$d."', '".$accID."')")
			or die(mysqli_error($mysqli));
				
			$save_id = mysqli_insert_id($mysqli);
			
			if(!empty($_POST['immune']))
			{
				// Loop to store and display values of individual checked checkbox.
				foreach($_POST['immune'] as $key => $immune)
				{
				//echo $selected."</br>";
				
					$q_insertimmune = mysqli_query($mysqli, "INSERT INTO scms_immune_rec_line 
							(rec_no, medrec_id, vaccine_no)
							VALUES ('', '".$save_id."','".$immune."')")
							or die("Error: ".mysqli_error($mysqli));	
				
				}
			}
			else{
				$q_insertimmune = NULL;
			}
			
			
			if(!empty($_POST['ill']))
			{
				// Loop to store and display values of individual checked checkbox.
				foreach($_POST['ill'] as $k => $ill)
				{
				//echo $selected."</br>";
				
					$q_insertillness = mysqli_query($mysqli, "INSERT INTO scms_illness_hist_line 
							(history_no, medrec_id, illness_no)
							VALUES ('', '".$save_id."','".$ill."')")
							or die("Error: ".mysqli_error($mysqli));	
				
				}
			}
			else{
				$q_insertillness = NULL;
			}
		
		
	
		if($q_insertimmune == NULL)
		{
			mysqli_rollback($mysqli);
			echo '<script>
			alert("Please fill the immunization field.!");
			window.history.back();
			</script>';
			
		}
		
		else if(($q_insertmedrec && $q_insertillness && $q_insertimmune) || ($q_insertmedrec && $q_insertimmune))
		{
			mysqli_commit($mysqli);
			echo '<script>
			alert("Successfully saved!");
			window.location.href="index.php";
			</script>';
			
		} 
		else
		{
			mysqli_rollback($mysqli);
			echo '<script>
			alert("Cannot save patient record.!");
			</script>';
			
		}
		mysqli_query($mysqli, "UNLOCK TABLES");
	}
?>

