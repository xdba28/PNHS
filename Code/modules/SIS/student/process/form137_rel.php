<?php
include_once('../../db_con_i.php');
session_start();
include("../../func.php");
include("../../session.php");

if(isset($_POST['lrn']))
{
	$lrn = $_POST['lrn'];
	$date_rel = $_POST['date'];
}
else
{
	header('Location: ../student_list.php');
}

$autocommit = $mysqli->query("SET AUTOCOMMIT = 1");
$start_transac = $mysqli->query("START TRANSACTION");

$save_f137 = $mysqli->query("INSERT INTO sis_f137_rel(lrn, date_rel)
							VALUES('$lrn', '$date_rel')")
						or die("<script>alert('Error in inserting F137 release data');</script>");

$commit = $mysqli->query("COMMIT");

?>
<script>
	window.location=  "../student_f137.php?l=<?php echo $lrn;?>&d=<?php echo $date_rel;?>"
</script>