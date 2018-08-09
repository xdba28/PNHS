<?php
$dbhost = "127.0.0.1";
$dbusername = "root";
$dbpassword = "";
$dbname = "class_db";

$mysqli = new mysqli("$dbhost", "$dbusername", "$dbpassword", "$dbname")
			or die("Can't connect to database: " .mysqli_error());
?>