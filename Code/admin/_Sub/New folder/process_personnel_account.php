<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	//echo print_r($_REQUEST); die();
	if(isset($_SESSION['user_data'])) {
			if(isset($_POST['submit'])) {
				$id = $mysqli->real_escape_string($_POST['id']);
				$u = $mysqli->real_escape_string($_POST['u']);
				$p = $mysqli->real_escape_string($_POST['p']);
				if(!isset($_POST['default'])) { $default = 0; } else { $default = $mysqli->real_escape_string($_POST['default']); }
				//$default = $mysqli->real_escape_string($_POST['default']);
				if(!isset($_POST['at_sa'])) { $at_sa = 0; } else { $at_sa = $mysqli->real_escape_string($_POST['at_sa']); }
				if(!isset($_POST['at_a'])) { $at_a = 0; } else { $at_a = $mysqli->real_escape_string($_POST['at_a']); }
				if(!isset($_POST['at_u'])) { $at_u = 0; } else { $at_u = $mysqli->real_escape_string($_POST['at_u']); }
				//$at_sa = $mysqli->real_escape_string($_POST['at_sa']);
				//$at_a = $mysqli->real_escape_string($_POST['at_a']);
				//$at_u = $mysqli->real_escape_string($_POST['at_u']);
				$P_fname = $P_mname = $P_lname = $emp_no = $job_title_code = $job_title_name = '';
				$pims_query="SELECT `emp_no`, `P_fname`, `P_mname`, `P_lname` FROM `pims_personnel` WHERE `emp_no` = '$id';";
				$get_pims = $mysqli->query($pims_query);
				while($pims = $get_pims->fetch_assoc()) {
					$P_fname = $pims['P_fname'];
					$P_mname = $pims['P_mname'];
					$P_lname = $pims['P_lname'];
					$emp_no = $pims['emp_no'];
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
					$p .= substr($P_fname, 0, 1);
					$p .= $P_lname;
					$p .= '_pnhs';
				}
				$cms_id = 0;
				$emp_query="INSERT INTO `cms_account`(`cms_account_ID`, `cms_username`, `cms_password`, `emp_no`, `lrn`, `cms_cpasswd`) VALUES ('', '$u', '$p', NULL, '$id', '1');";
				$get_emp = $mysqli->query($emp_query);
				$emp_query="SELECT `cms_account_ID` FROM `cms_account` WHERE `emp_no` = '$id';";
				$get_emp = $mysqli->query($emp_query);
				while($emp = $get_emp->fetch_assoc()) {
					$cms_id = $emp['cms_account_ID'];
				}
				if($dept_ID == '6' OR $dept_ID == 6) {
					$set_SCMS = '1';
				}
				else {
					$set_SCMS = '0';
				}
				if(isset($_POST['at_sa']) AND ($at_sa=='1' OR $at_sa==1)) {
					if(isset($_POST['DMS-sa'])) { $dms = 1; } else { $dms = 0; }
					if(isset($_POST['IMS-sa'])) { $ims = 1; } else { $ims = 0; }
					if(isset($_POST['IPCRMS-sa'])) { $ipcrms = 1; } else { $ipcrms = 0; }
					if(isset($_POST['OES-sa'])) { $oes = 1; } else { $oes = 0; }
					if(isset($_POST['PMS-sa'])) { $pms = 1; } else { $pms = 0; }
					if(isset($_POST['PIMS-sa'])) { $pims = 1; } else { $pims = 0; }
					if(isset($_POST['PRS-sa'])) { $prs = 1; } else { $prs = 0; }
					if(isset($_POST['CSS-sa'])) { $css = 1; } else { $css = 0; }
					if(isset($_POST['SCMS-sa'])) { $scms = 1; } else { $scms = 0; }
					if(isset($_POST['SIS-sa'])) { $sis = 1; } else { $sis = 0; }
					if(isset($_POST['CMS-sa'])) { $cms = 1; } else { $cms = 0; }
					$priv_query1 = "INSERT INTO `cms_privilege`(`cms_priv_id`, `cms_priv`, `frms_priv`, `ims_priv`, `ipcrms_priv`, `oes_priv`, `pms_priv`, `pims_priv`, `prs_priv`, `css_priv`, `scms_priv`, `sis_priv`, `memo_priv`, `calendar_priv`, `news_priv`, `ach_priv`, `gallery_priv`, `project_priv`, `carousel_priv`, `cms_account_type`, `cms_account_id`) VALUES ('','".$cms."','".$dms."','".$ims."','".$ipcrms."','".$oes."','".$pms."','".$pims."','".$prs."','".$css."','".$scms."','".$sis."','0','0','0','0','0','0','0','superadmin','$cms_id');";
					$get_priv1 = $mysqli->query($priv_query1);
				}
				if(isset($_POST['at_a']) AND ($at_a=='1' OR $at_a==1)) {
					if(isset($_POST['DMS-a'])) { $dms = 1; } else { $dms = 0; }
					if(isset($_POST['IMS-a'])) { $ims = 1; } else { $ims = 0; }
					if(isset($_POST['IPCRMS-a'])) { $ipcrms = 1; } else { $ipcrms = 0; }
					if(isset($_POST['OES-a'])) { $oes = 1; } else { $oes = 0; }
					if(isset($_POST['PMS-a'])) { $pms = 1; } else { $pms = 0; }
					if(isset($_POST['PIMS-a'])) { $pims = 1; } else { $pims = 0; }
					if(isset($_POST['PRS-a'])) { $prs = 1; } else { $prs = 0; }
					if(isset($_POST['CSS-a'])) { $css = 1; } else { $css = 0; }
					if(isset($_POST['SCMS-a'])) { $scms = 1; } else { $scms = 0; }
					if(isset($_POST['SIS-a'])) { $sis = 1; } else { $sis = 0; }
					if(isset($_POST['CMS-a'])) { $cms = 1; } else { $cms = 0; }
					$priv_query2 = "INSERT INTO `cms_privilege`(`cms_priv_id`, `cms_priv`, `frms_priv`, `ims_priv`, `ipcrms_priv`, `oes_priv`, `pms_priv`, `pims_priv`, `prs_priv`, `css_priv`, `scms_priv`, `sis_priv`, `memo_priv`, `calendar_priv`, `news_priv`, `ach_priv`, `gallery_priv`, `project_priv`, `carousel_priv`, `cms_account_type`, `cms_account_id`) VALUES ('','".$cms."','".$dms."','".$ims."','".$ipcrms."','".$oes."','".$pms."','".$pims."','".$prs."','".$css."','".$scms."','".$sis."','0','0','0','0','0','0','0','admin','$cms_id');";
					$get_priv2 = $mysqli->query($priv_query2);
				}
				if(isset($_POST['at_u']) AND ($at_u=='1' OR $at_u==1)) {
					if(isset($_POST['DMS-u'])) { $dms = 1; } else { $dms = 0; }
					if(isset($_POST['IMS-u'])) { $ims = 1; } else { $ims = 0; }
					if(isset($_POST['IPCRMS-u'])) { $ipcrms = 1; } else { $ipcrms = 0; }
					if(isset($_POST['OES-u'])) { $oes = 1; } else { $oes = 0; }
					if(isset($_POST['PMS-u'])) { $pms = 1; } else { $pms = 0; }
					if(isset($_POST['PIMS-u'])) { $pims = 1; } else { $pims = 0; }
					if(isset($_POST['PRS-u'])) { $prs = 1; } else { $prs = 0; }
					if(isset($_POST['CSS-u'])) { $css = 1; } else { $css = 0; }
					if(isset($_POST['SCMS-u'])) { $scms = 1; } else { $scms = 0; }
					if(isset($_POST['SIS-u'])) { $sis = 1; } else { $sis = 0; }
					if(isset($_POST['CMS-u'])) { $cms = 1; } else { $cms = 0; }
					$priv_query3 = "INSERT INTO `cms_privilege`(`cms_priv_id`, `cms_priv`, `frms_priv`, `ims_priv`, `ipcrms_priv`, `oes_priv`, `pms_priv`, `pims_priv`, `prs_priv`, `css_priv`, `scms_priv`, `sis_priv`, `memo_priv`, `calendar_priv`, `news_priv`, `ach_priv`, `gallery_priv`, `project_priv`, `carousel_priv`, `cms_account_type`, `cms_account_id`) VALUES ('','".$cms."','".$dms."','".$ims."','".$ipcrms."','".$oes."','".$pms."','".$pims."','".$prs."','".$css."','".$scms."','".$sis."','0','0','0','0','0','0','0','user','$cms_id');";
					$get_priv3 = $mysqli->query($priv_query3);
				}//die();
				if($get_priv1 OR $get_priv2 OR $get_priv3) {
					$_SESSION['msg'].='Acccount Created';
					header('Location: ../personnel_accounts.php');
				}
				else {
					$_SESSION['msg'].='Failed';
					header('Location: ../personnel_accounts.php?=id'.$id);
				}
			}
			else {
				header('Location: ../personnel_accounts.php');
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>