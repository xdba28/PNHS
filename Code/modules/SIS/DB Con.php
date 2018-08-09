<?php
$dbhost = "127.0.0.1";
$dbusername = "root";
$dbpassword = "";
$dbname = "class_db";

mysql_connect($dbhost, $dbusername, $dbpassword)
or die('Cannot connect to the server' . mysql_error());

mysql_select_db($dbname)
or die('Database selection problem');
?>