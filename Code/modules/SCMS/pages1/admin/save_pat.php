<?php

include("../../db_connect.php");
session_start();
include("../include/session.php");


	if(isset($_POST['submit_pat']))
	{
		$rec = $_POST["record"];
		$comp = $_POST["complaint"];
		$diag = $_POST["diagnosis"];
		$treat = $_POST["treatment"];
		$dispo = $_POST["dispo"];
		$tin = $_POST["timein"];
		$tout = $_POST["timeout"];
		$cdate = date('Y-m-d');
		$count = 1;
		
		if($tout != NULL && $dispo == "Stay in clinic")
		{
			echo '<script>
			alert("Do not put time out if disposition is not Stay in clinic");
			window.history.back();
			</script>';
		}
		else if($tout != NULL && strtotime($tout) < strtotime($tin))
		{
			echo '<script>
			alert("ERROR: The time out is less than time in.");
			window.history.back();
			</script>';			
		}
		else if($tout == NULL && $dispo != "Stay in clinic")
		{
			echo '<script>
			alert("Please fill the time out field!");
			window.history.back();
			</script>';
		}
		else
		{
			mysqli_autocommit($mysqli, FALSE);
			mysqli_query($mysqli, "start transaction");
			mysqli_query($mysqli, "LOCK TABLES scms_consultation, scms_prescription WRITE");  
			
			
			
			$q_insertpat = mysqli_query($mysqli, "INSERT INTO scms_consultation 
					(patient_id, complaint, diagnosis, treatment, disposition,  cons_date, cons_time_in, cons_time_out, cms_account_ID)
					VALUES ('NULL','".$comp."', '".$diag."','".$treat."','".$dispo."','".$cdate."','".$tin."','".$tout."','".$rec."')")
					or die("Error: ".mysqli_error($mysqli));
					
			$fetch_pat = mysqli_query($mysqli, "SELECT * FROM scms_consultation ORDER BY patient_id DESC")
				or die("Error: Could not fetch rows!".mysqli_error($mysqli));
			
				
			$pat = mysqli_fetch_array($fetch_pat);
			
			if(!empty($_POST['med'])){
			// Loop to store and display values of individual checked checkbox.
			foreach($_POST['med'] as $key => $med){
			//echo $selected."</br>";
			
			$q_insertpres = mysqli_query($mysqli, "INSERT INTO scms_prescription 
					(pre_id, patient_id, med_no, pres_qty)
					VALUES ('NULL', '".$pat['patient_id']."', '".$med."','".$_POST['qty'][$key]."')")
					or die("Error: ".mysqli_error($mysqli));
			
			$q_updatemed = mysqli_query($mysqli, "UPDATE scms_medicine 
					SET stocks = stocks - '".$_POST['qty'][$key]."'
					WHERE med_no = '".$med."'")
					or die(mysqli_error($mysqli));
			
			}
			}
			
			$sel_acc=mysqli_query($mysqli, "SELECT * FROM cms_account WHERE cms_account_ID = '".$rec."'")or die("Error: ".mysqli_error($mysqli));
			$f_acc = mysqli_fetch_assoc($sel_acc);
			
			if($f_acc['emp_no'] == NULL){
				if($q_insertpat && $q_insertpres && $q_updatemed && $tout == NULL && $dispo == "Stay in clinic")
				{
					mysqli_commit($mysqli);
					echo '<script>
					alert("Successfully saved!");
					window.location.href="daily.php";
					</script>';
				}
				else if($q_insertpat && $q_insertpres && $q_updatemed && $dispo == "Back to classroom")
				{
					mysqli_commit($mysqli);
					echo '<script>
					alert("Successfully saved!");
					window.location.href="../../fpdf/medcert1.php?patno='.base64_url_encode($pat['patient_id']).'";
					</script>';
				} 
				else if($q_insertpat && $q_insertpres && $q_updatemed && $dispo == "Send home")
				{
					mysqli_commit($mysqli);
					echo '<script>
					alert("Successfully saved!");
					window.location.href="../../fpdf/medcert2.php?patno='.base64_url_encode($pat['patient_id']).'";
					</script>';
				}
				else if($q_insertpat && $q_insertpres && $q_updatemed && $dispo == "Send to hospital")
				{
					mysqli_commit($mysqli);
					echo '<script>
					alert("Successfully saved!");
					window.location.href="daily.php";
					</script>';
				} 
				else
				{
					mysqli_rollback($mysqli);
					echo '<script>
					alert("Cannot save patient record!");
					window.history.back();
					</script>';
				}
			}else{
				if($q_insertpat && $q_insertpres && $q_updatemed){
					mysqli_commit($mysqli);
					echo '<script>
					alert("Successfully saved!");
					window.location.href="daily.php";
					</script>';
				}else {
					mysqli_rollback($mysqli);
					echo '<script>
					alert("Cannot save patient record!");
					window.history.back();
					</script>';
				}
			}
			mysqli_query("UNLOCK TABLES");
		}
	}
?>

