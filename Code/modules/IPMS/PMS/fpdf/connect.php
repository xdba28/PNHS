<?php
define("HOST", "localhost"); // The host you want to connect to.
define("USER", "root"); // The database username.
define("PASSWORD", ""); // The database password. 
define("DATABASE", "class_db"); // The database name.

$mysqli = new mysqli(HOST,USER,PASSWORD,DATABASE);

if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}

?>