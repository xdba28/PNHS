<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	if(isset($_SESSION['user_data'])) {
			if(isset($_GET['page'])) {
				if(!empty($_GET['page'])) {
					if(is_numeric($_GET['page'])) {
						$page = $mysqli->real_escape_string($_GET['page']);
					}
					else {
						$page = 1;
					}
				}
				else {
					$page = 1;
				}
			}
			if(isset($_GET['q'])) {
				if(!empty($_GET['q'])) {
					if(is_string($_GET['q'])) {
						$q = $mysqli->real_escape_string($_GET['q']);
					}
					else {
						$q = "";
					}
				}
				else {
					$q = "";
				}
			}
			header('Location: ../achievements.php?q='.$q.'&page='.$page);
	}
	else {
		header('Location: ../../index.php');
	}
?>