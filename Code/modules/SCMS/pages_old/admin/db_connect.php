<?php

define("DB_SERVER", "localhost"); //host you want to connect
define("DB_USER", "root"); //database user
define("DB_PASS", ""); //db password
define("DB_NAME", "class_db"); //database name

$mysqli = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_NAME)
			or die('Error: '.mysqli_connect_error());



?>