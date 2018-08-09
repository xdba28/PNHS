<?php

    $mysqli=new mysqli("localhost","root","","class_db1");
    if (mysqli_connect_error()) {
        die('<script>alert("Database Error!"); window.location="error.php";</script>');
    }
?>