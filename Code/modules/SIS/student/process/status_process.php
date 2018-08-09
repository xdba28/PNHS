<?php
include_once('../../db_con_i.php');
session_start();
include('../../func.php');
include('../../session.php');

if(isset($_POST['lrn']))
{
	$stu = $_POST['lrn'];
	$status = $_GET['s'];
} 
else
{
	?>
	<script>
		alert('No Student Selected!');
		window.location = "../student_return.php";
	</script>
	<?php
	exit();
}

$auto_commit = $mysqli->query("SET AUTOCOMMIT = 1");
$start_transaction = $mysqli->query("START TRANSACTION");

foreach($stu as $lrn)
{
	$update_status = $mysqli->query("UPDATE sis_student SET stu_status = '$status' WHERE lrn = '$lrn'")
								or die("Error update_status: " . $mysqli->error);

	// $get_section = $mysqli->query("SELECT SECTION_ID, css_school_yr.sy_id FROM css_section, css_school_yr
	// 							WHERE SECTION_NAME = '$sec_g'
	// 							AND year = '$sy_g'")
	// 						or die("Error get_section: " .$mysqli->error);
	// $res = mysqli_fetch_assoc($get_section);
	// $sec_id_q = $res['SECTION_ID'];
	// $sy_id_q = $res['sy_id'];

	// $stu_new_section = $mysqli->query("INSERT INTO sis_stu_rec(lrn, section_id, sy_id)
	
	// 								VALUES('$lrn', '$sec_id_q', '$sy_id_q')")
	// 						or die("Error stu_new_section: " .$mysqli->error);

}

$commit = $mysqli->query("COMMIT");
?>
<script>
	window.alert("Successfully changed status");
	window.location = "../student_list.php";
</script>