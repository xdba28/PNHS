<?php 
include "db_conn.php";
if(!empty($_POST['teach_load']) && !empty($_POST['num_load'])){
	$emp = $_POST['teach_load'];
	$num = $_POST['num_load'];
	$load = mysqli_query($conn, "SELECT * FROM css_loads WHERE emp_rec_id='$emp'");
	if(mysqli_num_rows($load)==0){
		$ins = mysqli_query($conn, "INSERT INTO css_loads VALUES($emp, $num)");
	}
	else{
		$ins = mysqli_query($conn, "UPDATE css_loads SET max_load=$num WHERE emp_rec_id=$emp"); 
	}

	if($ins===true){
		echo ("<SCRIPT LANGUAGE='JavaScript'>
					window.location.href='teacher_loads.php';
					</SCRIPT>");
					die();
	}
	else{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('Error')
					window.location.href='teacher_loads.php';
					</SCRIPT>");
					die();

	}
}

?>