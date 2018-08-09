<?php
include_once('../db_con_i.php');
session_start();
include("../func.php");
include("../session.php");
if(isset($_GET['f']))
{
	$file = base64_decode($_GET['f']);
}
else
{
	header('Location: ../student_list.php');
}
$target_dir = "../../excel/Add Student/";
$target_file = $target_dir . $file;
unlink($target_file);
header('Location: ../student_list.php');
?>