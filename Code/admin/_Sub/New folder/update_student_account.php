<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	if(isset($_SESSION['user_data'])) {
			if(isset($_POST['submit'])) {
				$id = $mysqli->real_escape_string($_POST['id']);
				$u = $mysqli->real_escape_string($_POST['u']);
				$p = $mysqli->real_escape_string($_POST['p']);
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
					$p = $stu_fname[0].$stu_lname.'_pnhs';
				}
				$emp_query="UPDATE `cms_account` SET `cms_username` = '$u', `cms_password` = '$p' WHERE `cms_account`.`cms_account_ID` = '$cms_id'";
				$get_emp = $mysqli->query($emp_query);
				if($get_emp) {
					//$_SESSION['msg'] .= '1';
				}
				$emp_query="SELECT `cms_account_ID` FROM `cms_account` WHERE `lrn` = '$id';";
				$get_emp = $mysqli->query($emp_query);
				while($emp = $get_emp->fetch_assoc()) {
					$cms_id = $emp['cms_account_ID'];
				}
				$get_priv_query="SELECT * FROM `cms_privilege` WHERE `cms_account_id` = '$cms_id';";
				$get_priv = $mysqli->query($get_priv_query);
				$cnt1 = 0;
				$ids = array();
				while($priv = $get_priv->fetch_assoc()) {
					$ids[$cnt1] = $priv['cms_priv_id'];
					++$cnt1;
				}
				if(isset($ids[0])) {
					$ids1 = $ids[0];
					$DMS1 = $mysqli->real_escape_string($_POST['DMS1']);
					$IMS1 = $mysqli->real_escape_string($_POST['IMS1']);
					$IPCRMS1 = $mysqli->real_escape_string($_POST['IPCRMS1']);
					$OES1 = $mysqli->real_escape_string($_POST['OES1']);
					$PMS1 = $mysqli->real_escape_string($_POST['PMS1']);
					$PIMS1 = $mysqli->real_escape_string($_POST['PIMS1']);
					$PRS1 = $mysqli->real_escape_string($_POST['PRS1']);
					$CSS1 = $mysqli->real_escape_string($_POST['CSS1']);
					$SCMS1 = $mysqli->real_escape_string($_POST['SCMS1']);
					$SIS1 = $mysqli->real_escape_string($_POST['SIS1']);
					$priv1_query="UPDATE `cms_privilege` SET `frms_priv` = '$DMS1', `ims_priv` = '$IMS1', `ipcrms_priv` = '$IPCRMS1', `oes_priv` = '$OES1', `pms_priv` = '$PMS1', `pims_priv` = '$PIMS1', `prs_priv` = '$PRS1', `css_priv` = '$CSS1', `scms_priv` = '$SCMS1', `sis_priv` = '$SIS1'  WHERE `cms_privilege`.`cms_priv_id` = '$ids1';";
					$get_priv1 = $mysqli->query($priv1_query);
					if($get_priv1) {
						//$_SESSION['msg'] .= '2';
					}
				}
				if(isset($ids[1])) {
					$ids2 = $ids[1];
					$DMS2 = $mysqli->real_escape_string($_POST['DMS2']);
					$IMS2 = $mysqli->real_escape_string($_POST['IMS2']);
					$IPCRMS2 = $mysqli->real_escape_string($_POST['IPCRMS2']);
					$OES2 = $mysqli->real_escape_string($_POST['OES2']);
					$PMS2 = $mysqli->real_escape_string($_POST['PMS2']);
					$PIMS2 = $mysqli->real_escape_string($_POST['PIMS2']);
					$PRS2 = $mysqli->real_escape_string($_POST['PRS2']);
					$CSS2 = $mysqli->real_escape_string($_POST['CSS2']);
					$SCMS2 = $mysqli->real_escape_string($_POST['SCMS2']);
					$SIS2 = $mysqli->real_escape_string($_POST['SIS2']);
					$priv2_query="UPDATE `cms_privilege` SET `frms_priv` = '$DMS2', `ims_priv` = '$IMS2', `ipcrms_priv` = '$IPCRMS2', `oes_priv` = '$OES2', `pms_priv` = '$PMS2', `pims_priv` = '$PIMS2', `prs_priv` = '$PRS2', `css_priv` = '$CSS2', `scms_priv` = '$SCMS2', `sis_priv` = '$SIS2'  WHERE `cms_privilege`.`cms_priv_id` = '$ids2';";
					$get_priv2 = $mysqli->query($priv2_query);
					if($get_priv2) {
						$_SESSION['msg'] .= '3';
					}
				}
				//echo print_r($ids);
				//echo print_r($_REQUEST);
				if($get_emp AND ($get_priv1 OR $get_priv2)) {
					$_SESSION['msg'].='Success';
					header('Location: ../student_accounts.php');
				}
				else {
					$_SESSION['msg'].='Failed';
					header('Location: ../student_accounts.php?id='.$id);
				}
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>