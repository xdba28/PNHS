<?php
include_once('../../DB Con.php');
session_start();

if(isset($_SESSION['user_data']['acct']['cms_username']) && isset($_SESSION['user_data']['acct']['cms_password']) && $_SESSION['user_data']['acct']['cms_account_type']=='admin')
{
	$_SESSION['user_data']['acct']['cms_account_ID'];
	$_SESSION['user_data']['acct']['cms_account_type'];
}
else
{
	header('Location: ../../login.php');
}

if(isset($_GET['f']))
{
	$file = $_GET['f'];
}
else
{
	header('Location: student_list.php');
}

$target_dir = "Grades/";
$target_file = $target_dir . $file;

echo $target_file;

unlink($target_file);

header('Location: student_list.php');
?>