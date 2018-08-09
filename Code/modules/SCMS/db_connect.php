<?php

	$mysqli = new mysqli("localhost","root","","class_db");
	if (mysqli_connect_error()) {
		die ('<script>alert("Database error!"); window.location="error.php";</script>');
	}


    function base64_url_encode($input) {
     return strtr(base64_encode($input), '+/=', '._-');
    }

    function base64_url_decode($input) {
     return base64_decode(strtr($input, '._-', '+/='));
    } 
?>