<html>
	<head>
    <link href="../css/sweetalert.css" rel="stylesheet">
    <script src="../js/sweetalert-dev.js"></script>	</head>
</html>
<?php
include "db_conn.php";
include "../func.php";


$var = 0;

if(empty($_SESSION['count_checker']) && empty($_SESSION['cell_count'])){
		echo ("<SCRIPT LANGUAGE='JavaScript'>
				var r = confirm('Schedule is not complete. Finish it later!');
				if(r == true){
					window.location.href='index.php';
				}
				else{
					window.location.href='index.php';
				}
				</SCRIPT>");
}
else{
	$var = 1;
}

	if ($_SESSION['count_checker'] != $_SESSION['cell_count'] && $var==1) {
		echo ("<SCRIPT LANGUAGE='JavaScript'>
				var r = confirm('Schedule is not complete. Finish it later!');
				if(r == true){
					window.location.href='index.php';
				}
				else{
					window.location.href='index.php';
				}
				</SCRIPT>");
	} else if($_SESSION['adviser_checker']!=$_SESSION['adviser_checker_count']){
		echo ("<SCRIPT LANGUAGE='JavaScript'>
				var r = confirm('Adviser is not complete. Assign now?');
				if(r == true){
					window.location.href='adviser.php';
				}
				else{
					window.location.href='index.php';
				}
				</SCRIPT>");
	}
	else {
		echo ("<SCRIPT LANGUAGE='JavaScript'>
				var r = confirm('Schedule is Full. Save?');
				if(r == true){
					window.location.href='save_process.php';
				}
				else{
					window.location.href='index.php';
				}
				</SCRIPT>");
	}
?>
<