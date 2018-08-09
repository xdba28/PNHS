<?php

include("../../db_connect.php");
session_start();
include("../include/session.php");


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
		
		mysqli_query($mysqli, "LOCK TABLES css_school_yr, scms_medrec, cms_account READ");
		$updateyear = mysqli_query($mysqli,"SELECT year from css_school_yr
		WHERE status = 'active'")
		or die(mysqli_error($mysqli));
		$fuyr = mysqli_fetch_assoc($updateyear);

		$explodeupdate =explode("-",$fuyr['year']); 
		$uyrstart = $explodeupdate['0'];
		$uyrend = $explodeupdate['1'];

		$update = mysqli_query($mysqli, "SELECT medrec_id FROM scms_medrec, cms_account
		WHERE scms_medrec.cms_account_ID = cms_account.cms_account_ID
		AND scms_medrec.cms_account_ID = '".$accID."'
		AND date_of_update BETWEEN '".$uyrstart."-06-01' AND '".$uyrend."-03-30'")
		or die(mysqli_error($mysqli));
		$u = mysqli_fetch_array($update);

		mysqli_query($mysqli, "UNLOCK TABLES");

		mysqli_autocommit($mysqli, FALSE);
		mysqli_query($mysqli, "start transaction");
		mysqli_query($mysqli, "LOCK TABLES scms_medrec, scms_immune_rec_line, scms_illness_hist_line WRITE");


			if(empty($u))
			{
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
			}
			else
			{
				$q_insertmedrec = mysqli_query($mysqli, "UPDATE scms_medrec
					SET eyeglass = '".$eye."', ear_infection = '".$ear."', allergies = '".$allergies."',
					eye_cond_desc = '".$eyedesc."', ear_cond_desc = '".$eardesc."', emer_contact_name = '".$name."', relationship = '".$rel."',
					emer_contact_no = '".$num."', date_of_update = '".$d."', cms_account_ID = '".$accID."'
					WHERE medrec_id = '".$u['medrec_id']."'");
					
				$q_deleteimmune = mysqli_query($mysqli, "DELETE FROM scms_immune_rec_line
				WHERE medrec_id = '".$u['medrec_id']."'");
						
				
				if(!empty($_POST['immune']))
				{
					// Loop to store and display values of individual checked checkbox.
					foreach($_POST['immune'] as $key => $immune)
					{
					//echo $selected."</br>";
					
						$q_insertimmune = mysqli_query($mysqli, "INSERT INTO scms_immune_rec_line 
								(rec_no, medrec_id, vaccine_no)
								VALUES ('', '".$u['medrec_id']."','".$immune."')")
								or die("Error: ".mysqli_error($mysqli));	
					
					}
				}
				else{
					$q_insertimmune = NULL;
				}
				
				$q_deleteillness = mysqli_query($mysqli, "DELETE FROM scms_illness_hist_line
				WHERE medrec_id = '".$u['medrec_id']."'");
						
				
				if(!empty($_POST['ill']))
				{
					// Loop to store and display values of individual checked checkbox.
					foreach($_POST['ill'] as $k => $ill)
					{
					//echo $selected."</br>";
					
						$q_insertillness = mysqli_query($mysqli, "INSERT INTO scms_illness_hist_line 
								(history_no, medrec_id, illness_no)
								VALUES ('', '".$u['medrec_id']."','".$ill."')")
								or die("Error: ".mysqli_error($mysqli));	
					
					}
				}
				else{
					$q_insertillness = NULL;
				}
			
			}
		
		
		
		if($q_insertimmune == NULL)
		{
			mysqli_rollback($mysqli);
			echo '<script>
			alert("Please fill the immunization fields.!");
			window.history.back();
			</script>';
			
		}
		else if(($q_insertmedrec && $q_insertillness && $q_insertimmune) || ($q_deleteimmune && $q_insertillness) || ($q_deleteimmune && $q_insertimmune))
		{
			mysqli_commit($mysqli);
			echo '<script>
			alert("Successfully saved!");
			window.location.href="medhist.php?id='.base64_encode($accID).'";
			</script>';
		 } 
		else
		{
			mysqli_rollback($mysqli);
			echo '<script>
			alert("Cannot save patient record!");
			window.location.href="medhist.php?id='.base64_encode($accID).'";
			</script>';
		}
		mysqli_query($mysqli, "UNLOCK TABLES");
	}
?>

