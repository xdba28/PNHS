<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	if(isset($_SESSION['user_data'])) {
			if(isset($_POST['submit']) AND isset($_POST['id']) AND is_numeric($_POST['id']) AND isset($_POST['u']) AND is_string($_POST['u']) AND isset($_POST['p']) AND is_string($_POST['p'])) {
				$id = $mysqli->real_escape_string($_POST['id']);
				$u = $mysqli->real_escape_string($_POST['u']);
				$p = $mysqli->real_escape_string($_POST['p']);
				$default = $mysqli->real_escape_string($_POST['default']);
				$stu_fname = $stu_mname = $stu_lname = $lrn = '';
				$sis_query="SELECT `lrn`, `stu_fname`, `stu_mname`, `stu_lname` FROM `sis_student` WHERE `lrn` = '$id';";
				$get_sis = $mysqli->query($sis_query);
				while($sis = $get_sis->fetch_assoc()) {
					$stu_fname = $sis['stu_fname'];
					$stu_mname = $sis['stu_mname'];
					$stu_lname = $sis['stu_lname'];
					$lrn = $pims['lrn'];
				}
				if(($default=='1')) {
					$p = $stu_fname[0].$stu_lname.'_pnhs';
				}
				$cms_id = 0;
				$lrn_query="INSERT INTO `cms_account`(`cms_account_ID`, `cms_username`, `cms_password`, `emp_no`, `lrn`, `cms_cpasswd`) VALUES ('', '$u', '$p', NULL, '$id', '1');";
				$get_lrn = $mysqli->query($lrn_query);
				$cms_query="SELECT `cms_account_ID` FROM `cms_account` WHERE `lrn` = '$id';";
				$get_cms = $mysqli->query($cms_query);
				while($cms = $get_cms->fetch_assoc()) {
					$cms_id = $cms['cms_account_ID'];
				}
				$priv_query="INSERT INTO `cms_privilege`(`cms_priv_id`, `cms_priv`, `frms_priv`, `ims_priv`, `ipcrms_priv`, `oes_priv`, `pms_priv`, `pims_priv`, `prs_priv`, `css_priv`, `scms_priv`, `sis_priv`, `memo_priv`, `calendar_priv`, `news_priv`, `ach_priv`, `gallery_priv`, `project_priv`, `carousel_priv`, `cms_account_type`, `cms_account_id`) VALUES ('','1','0','0','0','1','0','0','0','0','1','1','0','0','0','0','0','0','0','user','$cms_id'); INSERT INTO `dms_receiver` (`rec_no`, `cms_account_id`) VALUES (NULL, '$cms_id');";
				$get_priv = $mysqli->multi_query($priv_query); 
				if($get_lrn AND $get_priv) {
					$_SESSION['msg']='Successful Account Creation';
					header('Location: ../student_accounts.php');
				}
				else {
					$_SESSION['msg']='Account Creation Failed';
					header('Location: ../student_accounts.php');
				}
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>