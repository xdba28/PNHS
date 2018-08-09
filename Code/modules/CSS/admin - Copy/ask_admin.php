<?php
session_start(); 
include "db_conn.php";

	echo ("<SCRIPT>
    	   	var r = confirm('Do you want to create new? ');
       		if(r == true){
        		window.location.href='check_sy.php';
    		}
    		else{
    			window.location.href='index.php';
    		}
        	</SCRIPT>");
?>