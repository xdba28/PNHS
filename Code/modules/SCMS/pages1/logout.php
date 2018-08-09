
<?php 
    include_once('db_connect.php');
	session_start();
   
   if(session_destroy()) {
      header("Location: ../../../index.php");
   }
?>
