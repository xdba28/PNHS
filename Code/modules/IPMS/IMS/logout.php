<?php
session_start();
$log = session_destroy();
if($log)
{
	header('Location: ../../../admin_idx.php');
}
?>