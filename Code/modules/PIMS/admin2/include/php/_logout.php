<?php
	ob_start();
	session_start();
	require 'connection.php';
	if(isset($_SESSION['user_data'])) {
		session_destroy();
		header('Location: ../index.php');
	}
	else {
		header('Location: ../index.php');
	}
?>