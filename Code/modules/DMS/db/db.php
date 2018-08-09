<?php

    $mysqli=new mysqli("localhost","root","","class_db");
    if (mysqli_connect_error()) {
        die('<script>alert("Database Error!"); window.location="error.php";</script>');
    }
?>