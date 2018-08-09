<?php
	//mysqli_connect('localhost', 'root', '', 'class_db');
    ob_start();
    session_start();
	$mysqli = new mysqli('localhost', 'root', '', 'class_db');
?>