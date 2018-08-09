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
				$accttype = $mysqli->real_escape_string($_POST['accttype']);
				$mod = $mysqli->real_escape_string($_POST['mod']);
				$cms_id = 0;
				$is_lrn = false;
				$is_emp = false;
				echo $id.'<br>';
				echo $u.'<br>';
				echo $p.'<br>';
				echo $accttype.'<br>';
				echo $mod.'<br>';
				$if_query="SELECT `emp_no` FROM `pims_personnel` WHERE `emp_no` = '$id';";
				$get_if = $mysqli->query($if_query);
				$fetch_emp = $get_if->fetch_assoc();
				$if2_query="SELECT `lrn` FROM `sis_student` WHERE `lrn` = '$id';";
				$get_if2 = $mysqli->query($if2_query);
				$fetch_lrn = $get_if2->fetch_assoc();
				if($fetch_emp AND empty($fetch_lrn)) {
					$emp_query="INSERT INTO `cms_account`(`cms_account_ID`, `cms_username`, `cms_password`, `emp_no`, `lrn`) VALUES ('', '$u', '$p', '$id', NULL);";
					$get_emp = $mysqli->query($emp_query);
					$emp_query="SELECT `cms_account_ID` FROM `cms_account` WHERE `emp_no` = '$id';";
					$get_emp = $mysqli->query($emp_query);
					while($emp = $get_emp->fetch_assoc()) {
						$cms_id = $emp['cms_account_ID'];
					}
					$is_emp = true;
				}
				if(empty($fetch_emp) AND $fetch_lrn) {
					$lrn_query="INSERT INTO `cms_account`(`cms_account_ID`, `cms_username`, `cms_password`, `emp_no`, `lrn`) VALUES ('', '$u', '$p', NULL, '$id');";
					$get_lrn = $mysqli->query($lrn_query);
					$lrn_query="SELECT `cms_account_ID` FROM `cms_account` WHERE `lrn` = '$id';";
					$get_lrn = $mysqli->query($lrn_query);
					while($lrn = $get_lrn->fetch_assoc()) {
						$cms_id = $lrn['cms_account_ID'];
					}
					$is_lrn = true;
				}
				$dms = $mysqli->real_escape_string($_POST['DMS']);
				$ims = $mysqli->real_escape_string($_POST['IMS']);
				$ipcrms = $mysqli->real_escape_string($_POST['IPCRMS']);
				$oes = $mysqli->real_escape_string($_POST['OES']);
				$pms = $mysqli->real_escape_string($_POST['PMS']);
				$pims = $mysqli->real_escape_string($_POST['PIMS']);
				$prs = $mysqli->real_escape_string($_POST['PRS']);
				$css = $mysqli->real_escape_string($_POST['CSS']);
				$scms = $mysqli->real_escape_string($_POST['SCMS']);
				$sis = $mysqli->real_escape_string($_POST['SIS']);
				$cms = $mysqli->real_escape_string($_POST['CMS']);
				$dms2 = $mysqli->real_escape_string($_POST['DMS2']);
				$ims2 = $mysqli->real_escape_string($_POST['IMS2']);
				$ipcrms2 = $mysqli->real_escape_string($_POST['IPCRMS2']);
				$oes2 = $mysqli->real_escape_string($_POST['OES2']);
				$pms2 = $mysqli->real_escape_string($_POST['PMS2']);
				$pims2 = $mysqli->real_escape_string($_POST['PIMS2']);
				$prs2 = $mysqli->real_escape_string($_POST['PRS2']);
				$css2 = $mysqli->real_escape_string($_POST['CSS2']);
				$scms2 = $mysqli->real_escape_string($_POST['SCMS2']);
				$sis2 = $mysqli->real_escape_string($_POST['SIS2']);
				$cms2 = $mysqli->real_escape_string($_POST['CMS2']);
				if($dms!=1 OR $dms!='1') { $dms='0'; } else { $dms='1'; }
				if($ims!=1 OR $ims!='1') { $ims='0'; } else { $ims='1'; }
				if($ipcrms!=1 OR $ipcrms!='1') { $ipcrms='0'; } else { $ipcrms='1'; }
				if($oes!=1 OR $oes!='1') { $oes='0'; } else { $oes='1'; }
				if($pms!=1 OR $pms!='1') { $pms='0'; } else { $pms='1'; }
				if($pims!=1 OR $pims!='1') { $pims='0'; } else { $pims='1'; }
				if($prs!=1 OR $prs!='1') { $prs='0'; } else { $prs='1'; }
				if($css!=1 OR $css!='1') { $css='0'; } else { $css='1'; }
				if($scms!=1 OR $scms!='1') { $scms='0'; } else { $scms='1'; }
				if($sis!=1 OR $sis!='1') { $sis='0'; } else { $sis='1'; }
				if($cms!=1 OR $cms!='1') { $cms='0'; } else { $cms='1'; }
				if($dms2!=1 OR $dms2!='1') { $dms2='0'; } else { $dms2='1'; }
				if($ims2!=1 OR $ims2!='1') { $ims2='0'; } else { $ims2='1'; }
				if($ipcrms2!=1 OR $ipcrms2!='1') { $ipcrms2='0'; } else { $ipcrms2='1'; }
				if($oes2!=1 OR $oes2!='1') { $oes2='0'; } else { $oes2='1'; }
				if($pms2!=1 OR $pms2!='1') { $pms2='0'; } else { $pms2='1'; }
				if($pims2!=1 OR $pims2!='1') { $pims2='0'; } else { $pims2='1'; }
				if($prs2!=1 OR $prs2!='1') { $prs2='0'; } else { $prs2='1'; }
				if($css2!=1 OR $css2!='1') { $css2='0'; } else { $css2='1'; }
				if($scms2!=1 OR $scms2!='1') { $scms2='0'; } else { $scms2='1'; }
				if($sis2!=1 OR $sis2!='1') { $sis2='0'; } else { $sis2='1'; }
				if($cms2!=1 OR $cms2!='1') { $cms2='0'; } else { $cms2='1'; }
				$ignore = $mysqli->real_escape_string($_POST['ignore']);
				switch($accttype) {
					case 'superadmin':
						if(is_emp) {
							$priv_query="INSERT INTO `cms_privilege`(`cms_priv_id`, `cms_priv`, `frms_priv`, `ims_priv`, `ipcrms_priv`, `oes_priv`, `pms_priv`, `pims_priv`, `prs_priv`, `css_priv`, `scms_priv`, `sis_priv`, `memo_priv`, `calendar_priv`, `news_priv`, `ach_priv`, `gallery_priv`, `project_priv`, `carousel_priv`, `cms_account_type`, `cms_account_id`) VALUES ('','1','1','1','1','1','1','1','1','1','1','1','0','0','0','0','0','0','0','superadmin','$cms_id');";
							$get_priv = $mysqli->query($priv_query);
						}
						break;
					case 'admin':
						if($is_emp) {
							$priv_query="INSERT INTO `cms_privilege`(`cms_priv_id`, `cms_priv`, `frms_priv`, `ims_priv`, `ipcrms_priv`, `oes_priv`, `pms_priv`, `pims_priv`, `prs_priv`, `css_priv`, `scms_priv`, `sis_priv`, `memo_priv`, `calendar_priv`, `news_priv`, `ach_priv`, `gallery_priv`, `project_priv`, `carousel_priv`, `cms_account_type`, `cms_account_id`) VALUES ('','1','$dms','$ims','$ipcrms','$oes','$pms','$pims','$prs','$css','$scms','$sis','0','0','0','0','0','0','0','admin','$cms_id');";
							$get_priv = $mysqli->query($priv_query);
							if($ignore!='1') {
								$priv_query="INSERT INTO `cms_privilege`(`cms_priv_id`, `cms_priv`, `frms_priv`, `ims_priv`, `ipcrms_priv`, `oes_priv`, `pms_priv`, `pims_priv`, `prs_priv`, `css_priv`, `scms_priv`, `sis_priv`, `memo_priv`, `calendar_priv`, `news_priv`, `ach_priv`, `gallery_priv`, `project_priv`, `carousel_priv`, `cms_account_type`, `cms_account_id`) VALUES ('','1','$dms2','$ims2','$ipcrms2','$oes2','$pms2','$pims2','$prs2','$css2','$scms2','$sis2','0','0','0','0','0','0','0','user','$cms_id');";
								$get_priv = $mysqli->query($priv_query);
							}
						}
						break;
					case 'user':
						if($is_emp) {
							$priv_query="INSERT INTO `cms_privilege`(`cms_priv_id`, `cms_priv`, `frms_priv`, `ims_priv`, `ipcrms_priv`, `oes_priv`, `pms_priv`, `pims_priv`, `prs_priv`, `css_priv`, `scms_priv`, `sis_priv`, `memo_priv`, `calendar_priv`, `news_priv`, `ach_priv`, `gallery_priv`, `project_priv`, `carousel_priv`, `cms_account_type`, `cms_account_id`) VALUES ('','1','1','1','1','0','1','1','0','1','1','1','0','0','0','0','0','0','0','user','$cms_id');";
							$get_priv = $mysqli->query($priv_query);
						}
						if($is_lrn) {
							$priv_query="INSERT INTO `cms_privilege`(`cms_priv_id`, `cms_priv`, `frms_priv`, `ims_priv`, `ipcrms_priv`, `oes_priv`, `pms_priv`, `pims_priv`, `prs_priv`, `css_priv`, `scms_priv`, `sis_priv`, `memo_priv`, `calendar_priv`, `news_priv`, `ach_priv`, `gallery_priv`, `project_priv`, `carousel_priv`, `cms_account_type`, `cms_account_id`) VALUES ('','1','0','0','0','1','0','0','0','0','1','1','0','0','0','0','0','0','0','user','$cms_id');";
							$get_priv = $mysqli->query($priv_query);
						}
						break;
				}
				if(($is_emp OR $is_lrn) AND $priv_query) {
					$_SESSION['msg']='Success';
					header('Location: admin_signup.php');
				}
				else {
					$_SESSION['msg']='Failed';
					header('Location: admin_signup.php');
				}
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>