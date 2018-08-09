<?php
    session_start();
    session_unset();
    session_destroy();
    $_SESSION = array();
    echo '<script>alert("You have been logged out")</script>';
    header("Refresh:0; url=../../index.php");    
        
    
?>