<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	if(isset($_SESSION['user_data'])) {
			if(isset($_POST['submit']) AND isset($_POST['id']) AND is_numeric($_POST['id']) AND isset($_POST['u']) AND is_string($_POST['u']) AND isset($_POST['p']) AND is_string($_POST['p'])) {
				$id = $mysqli->real_escape_string($_POST['id']);
				$u = $mysqli->real_escape_string($_POST['u']);
				$p = pcrypt($mysqli->real_escape_string($_POST['p']), 'ecrypt');
				$default = $mysqli->real_escape_string($_POST['default']);
				$cms_id = 0;
				$emp_query="SELECT * FROM `cms_account` WHERE `emp_no` = '$id';";
				$get_emp = $mysqli->query($emp_query);
				while($emp = $get_emp->fetch_assoc()) {
					$cms_id = $emp['cms_account_ID'];
					//echo $cms_id;
				}
				$P_fname = $P_mname = $P_lname = $emp_no = $job_title_code = $job_title_name = '';
				$pims_query="SELECT `emp_no`, `P_fname`, `P_mname`, `P_lname` FROM `pims_personnel` WHERE `emp_no` = '$id';";
				$get_pims = $mysqli->query($pims_query);
				while($pims = $get_pims->fetch_assoc()) {
					$P_fname = $pims['P_fname'];
					$P_mname = $pims['P_mname'];
					$P_lname = $pims['P_lname'];
					$emp_no = $pims['emp_no'];
					//echo $emp_no;
					$emp_rec_query="SELECT `job_title_code`, `dept_ID`, `faculty_type` FROM `pims_employment_records` WHERE `emp_no` = '$emp_no' LIMIT 1;";
					$get_emp_rec = $mysqli->query($emp_rec_query);
					$emp_rec = $get_emp_rec->fetch_assoc();
					$job_title_code = $emp_rec['job_title_code'];
					$dept_ID = $emp_rec['dept_ID'];
					$faculty_type = $emp_rec['faculty_type'];
					$job_title_query="SELECT `job_title_name` FROM `pims_job_title` WHERE `job_title_code` = '$job_title_code' LIMIT 1;";
					$get_job_title = $mysqli->query($job_title_query);
					$job_title = $get_job_title->fetch_assoc();
					$job_title_name = $job_title['job_title_name'];
				}
				if(($default=='1')) {
					$p = pcrypt(substr($P_fname, 0, 1).$P_lname.'_pnhs', 'ecrypt');
				}
				$emp_query="UPDATE `cms_account` SET `cms_username` = '$u', `cms_password` = '$p' WHERE `cms_account`.`cms_account_ID` = '$cms_id'";
				$get_emp = $mysqli->query($emp_query);
				
				$emp_query="SELECT `cms_account_ID` FROM `cms_account` WHERE `emp_no` = '$emp_no';";
				$get_emp = $mysqli->query($emp_query);
				while($emp = $get_emp->fetch_assoc()) {
					$cms_id = $emp['cms_account_ID'];
				}
				if($get_emp) {
					$_SESSION['msg']='Successfully Updated Account';
					header('Location: ../personnel_accounts.php');
				}
				else {
					$_SESSION['msg']='Account Update Failed';
					header('Location: ../personnel_accounts.php?id='.$id);
				}
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>