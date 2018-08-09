<?php
	ob_start();
	session_start();
	if(isset($_SESSION['user_data'])) {
		header('Location: ../index.php');
	}
	else {
		header("HTTP/1.0 404 Not Found");
	}
?>