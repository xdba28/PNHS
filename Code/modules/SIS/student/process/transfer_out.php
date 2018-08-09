<?php
include_once('../../db_con_i.php');
session_start();
include("../../func.php");
include("../../session.php");

if(isset($_GET['n']))
{
	$data = $_GET['n'];
	$lrn = base64_decode($data);
}
else
{
	header('Location: ../student_list.php');
}

$cur_date = date('Y-m-d');

$autocommit = $mysqli->query("SET AUTOCOMMIT = 1");
$start_transac = $mysqli->query("START TRANSACTION");

$trnsf_out = $mysqli->query("UPDATE sis_student SET stu_status = 'Transferred Out', trnf_out_date = '$cur_date'
							WHERE lrn = $lrn")
					or die("<script>alert('Error in changing status of student');</script>");

$commit = $mysqli->query("COMMIT");
?>
<script>
	alert('Successfully Transferred out LRN <?php echo $lrn?>');
	window.location = '../student_list.php';
</script>