<?php
    define("HOST","localhost");
    define("USER","root");
    define("PASSWORD","");
    define("DATABASE","frms");

    $mysqli=new mysqli(HOST,USER,PASSWORD,DATABASE);
    if (mysqli_connect_error()) {
        die('<script>alert("Database Error!"); window.location="error.php";</script>');
    }
?>