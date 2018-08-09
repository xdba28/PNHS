<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	//echo '<pre>'; echo print_r($_REQUEST); echo '</pre>'; die();
	if(isset($_SESSION['user_data'])) {
			if(isset($_POST['submit'])/* AND isset($_POST['id']) AND is_numeric($_POST['id']) AND isset($_POST['u']) AND is_string($_POST['u']) AND isset($_POST['p']) AND is_string($_POST['p'])*/) {
				//echo '<pre>'; echo print_r($_REQUEST); echo '</pre>'; die();
				$id = $mysqli->real_escape_string($_POST['id']);
				$u = $mysqli->real_escape_string($_POST['u']);
				$p = pcrypt($mysqli->real_escape_string($_POST['p']), 'ecrypt');
				$default = $mysqli->real_escape_string($_POST['default']);
				$cms_id = 0;
				$emp_query="SELECT * FROM `cms_account` WHERE `lrn` = '$id';";
				$get_emp = $mysqli->query($emp_query);
				while($emp = $get_emp->fetch_assoc()) {
					$cms_id = $emp['cms_account_ID'];
				}
				$stu_fname = $stu_mname = $stu_lname = $lrn = $job_title_code = $job_title_name = '';
				$pims_query="SELECT `lrn`, `stu_fname`, `stu_mname`, `stu_lname` FROM `sis_student` WHERE `lrn` = '$id';";
				$get_pims = $mysqli->query($pims_query);
				while($pims = $get_pims->fetch_assoc()) {
					$stu_fname = $pims['stu_fname'];
					$stu_mname = $pims['stu_mname'];
					$stu_lname = $pims['stu_lname'];
					$lrn = $pims['lrn'];
				}
				if(($default=='1')) {
					$p = pcrypt(substr($stu_fname, 0, 1).$stu_lname.'_pnhs', 'ecrypt');
				}
				$emp_query="UPDATE `cms_account` SET `cms_username` = '$u', `cms_password` = '$p' WHERE `cms_account`.`cms_account_ID` = '$cms_id'";
				$get_emp = $mysqli->query($emp_query);
				if($get_emp) {
					//$_SESSION['msg'] .= '1';
				}
				if($get_emp) {
					$_SESSION['msg'].='Successfully Updated Account';
					header('Location: ../student_accounts.php');
				}
				else {
					$_SESSION['msg'].='Account Update Failed';
					header('Location: ../student_accounts.php?id='.$id);
				}
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>