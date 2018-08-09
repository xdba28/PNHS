<?php
session_start(); 
include "db_conn.php";

if(!empty($_POST['cred'])){
	$cred = $_POST['cred'];
	$query = mysqli_query($conn, "SELECT css_subject.subject_id, subject_name FROM css_subject, css_credentials
								WHERE css_subject.subject_id=css_credentials.subject_id
								AND cred_title='$cred'");
	echo '<select class="form-control " name="sub_id" onchange="teach2(this.value)" required>
			<option value="">Select</option>';
	foreach ($query as $key) {
		echo '<option value="'.$key['subject_id'].'">'.$key['subject_name'].'</option>';
	}
	echo '</select>';
	$_SESSION['cred'] = $cred;	
}
else{
	echo '<select class="form-control " name="sub_id" onchange="teach2(this.value)" required>
			<option value="">Select</option>';
	echo '</select>';
	$_SESSION['cred'] = "";
}

?>

<script type="text/javascript">
	
</script>