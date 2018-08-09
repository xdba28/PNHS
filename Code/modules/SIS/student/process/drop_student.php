<?php
include_once('../../DB Con.php');
session_start();

if(!empty($_SESSION['user_data']['acct']['emp_no']))
{
    $_SESSION['user_data']['acct']['emp_no'];
}
elseif(empty($_SESSION['user_data']['acct']['emp_no']))
{
    $_SESSION['user_data']['acct']['lrn'];
}
else
{
    header('Location: ../../../admin_idx.php');
}

if(isset($_POST['lrn']))
{
	$lrn = $_POST['lrn'];
}
else
{
	header('Location: ../student_list.php');
}

$date = date('Y-m-d');

$drp_student = mysql_query("UPDATE sis_student SET drp = '$date', stu_status = 'Dropped' WHERE lrn = '$lrn'")
						or die("Error drp_student: " .mysql_error());

header('Location: ../student_list.php');
?>