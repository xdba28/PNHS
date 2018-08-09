<?php

	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	//echo print_r($_REQUEST); die();
			if(isset($_POST['submit'])) {
				$u = $mysqli->real_escape_string($_POST['u']);
				$p = $mysqli->real_escape_string($_POST['p']);
                $pp=pcrypt($p);
				if(!isset($_POST['default'])) { $default = 0; } else { $default = $mysqli->real_escape_string($_POST['default']); }
				//$default = $mysqli->real_escape_string($_POST['default']);
				if(!isset($_POST['at_sa'])) { $at_sa = 0; } else { $at_sa = $mysqli->real_escape_string($_POST['at_sa']); }
				if(!isset($_POST['at_a'])) { $at_a = 0; } else { $at_a = $mysqli->real_escape_string($_POST['at_a']); }
				if(!isset($_POST['at_u'])) { $at_u = 0; } else { $at_u = $mysqli->real_escape_string($_POST['at_u']); }
				//$at_sa = $mysqli->real_escape_string($_POST['at_sa']);
				//$at_a = $mysqli->real_escape_string($_POST['at_a']);
				//$at_u = $mysqli->real_escape_string($_POST['at_u']);
				
				if(($default=='1')) {
					$p .= substr($P_fname, 0, 1);
					$p .= $P_lname;
					$p .= '_pnhs';
				}
				$qry=$mysqli->query("INSERT INTO cms_account(cms_username,cms_password,cms_cpasswd,cms_current_log_date,cms_current_log_time,cms_prev_log_date,cms_prev_log_time) VALUES('$u','$pp','1','2018-03-24','00:00:00','0000-00-00','00:00:00' )");
                $acct=$mysqli->insert_id;
                if($qry){
                    echo "OK";
                }else{
                    echo "ERROR";
                }
			}
			else {
				header('Location: ../personnel_accounts.php');
			}
?>