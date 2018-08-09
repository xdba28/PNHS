<?php
	require('../../func.php');
	require('../../php/connection.php');
	require('../../php/_Func.php');
	require('../../php/_Def.php');
	//echo '<pre>'; echo var_export($_POST); echo '</pre>'; die();
	if(isset($_SESSION['user_data'])) {
			if(isset($_POST['update']) AND is_string($_POST['update'])) {
				//echo '<pre>'; echo print_r($_REQUEST); echo '</pre>'; die();
				$update = $mysqli->real_escape_string($_POST['update']);
				if(isset($_POST['DMS'])) { $dms = 1; } else { $dms = 0; }
				if(isset($_POST['DMSuser'])) { $dmsuser = 1; } else { $dmsuser = 0; }
				if(isset($_POST['IMS'])) { $ims = 1; } else { $ims = 0; }
				if(isset($_POST['IPCRMS']) AND ($_POST['IPCRMS']=='1' OR $_POST['IPCRMS']=='2')) { 
					if($_POST['IPCRMS']=='1') {
						$ipcrms = 1; 
					}
					else {
						$ipcrms = 0; 
					}
					if($_POST['IPCRMS']=='2') {
						$ipcrms2 = 1; 
					}
					else {
						$ipcrms2 = 0; 
					}
				} 
				//if(isset($_POST['IPCRMS2'])) { $ipcrms2 = 1; } else { $ipcrms2 = 0; }
				if(isset($_POST['IPCRMSuser'])) { $ipcrmsuser = 1; } else { $ipcrmsuser = 0; }
				if(isset($_POST['OES'])) { $oes = 1; } else { $oes = 0; }
				if(isset($_POST['PMS']) AND ($_POST['PMS']=='1' OR $_POST['PMS']=='2')) { 
					if($_POST['PMS']=='1') {
						$pms = 1; 
					}
					else {
						$pms = 0; 
					}
					if($_POST['PMS']=='2') {
						$pms2 = 1; 
					}
					else {
						$pms2 = 0; 
					}
				} 
				//if(isset($_POST['PMS2'])) { $pms2 = 1; } else { $pms2 = 0; }
				if(isset($_POST['PMSuser'])) { $pmsuser = 1; } else { $pmsuser = 0; }
				if(isset($_POST['PIMS']) AND ($_POST['PIMS']=='1' OR $_POST['PIMS']=='2')) { 
					if($_POST['PIMS']=='1') {
						$pims = 1; 
					}
					else {
						$pims = 0; 
					}
					if($_POST['PIMS']=='2') {
						$pims2 = 1; 
					}
					else {
						$pims2 = 0; 
					}
				} 
				//if(isset($_POST['PIMS2'])) { $pims2 = 1; } else { $pims2 = 0; }
				if(isset($_POST['PIMSuser'])) { $pimsuser = 1; } else { $pimsuser = 0; }
				if(isset($_POST['PRS']) AND ($_POST['PRS']=='1' OR $_POST['PRS']=='2')) { 
					if($_POST['PRS']=='1') {
						$prs = 1; 
					}
					else {
						$prs = 0; 
					}
					if($_POST['PRS']=='2') {
						$prs2 = 1; 
					}
					else {
						$prs2 = 0; 
					}
				} 
				//if(isset($_POST['PRS2'])) { $prs2 = 1; } else { $prs2 = 0; }
				if(isset($_POST['CSS'])) { $css = 1; } else { $css = 0; }
				if(isset($_POST['SCMS'])) { $scms = 1; } else { $scms = 0; }
				if(isset($_POST['SCMSuser'])) { $scmsuser = 1; } else { $scmsuser = 0; }
				if(isset($_POST['SIS']) AND ($_POST['SIS']=='1' OR $_POST['SIS']=='2')) { 
					if($_POST['SIS']=='1') {
						$sis = 1; 
					}
					else {
						$sis = 0; 
					}
					if($_POST['SIS']=='2') {
						$sis2 = 1; 
					}
					else {
						$sis2 = 0; 
					}
				} 
				//if(isset($_POST['SIS2'])) { $sis2 = 1; } else { $sis2 = 0; }
				if(isset($_POST['SISuser'])) { $sisuser = 1; } else { $sisuser = 0; }
				if(isset($_POST['CMS'])) { $cms = 1; } else { $cms = 0; }
				if(isset($_POST['superadmin'])) { $superadmin = 1; } else { $superadmin = 0; }
				//$cms_id = 0;
				//$emp_query="UPDATE `cms_privilege` SET `cms_priv` = '$cms', `frms_priv` = '$dms', `frms2_priv` = '$dms2', `ipcrms_priv` = '$ipcrms', `ipcrms2_priv` = '$ipcrms2', `pms_priv` = '$pms', `pms2_priv` = '$pms2', `pims_priv` = '$pims', `pims2_priv` = '$pims2', `prs_priv` = '$prs', `prs2_priv` = '$prs2', `sis_priv` = '$sis', `sis2_priv` = '$sis2', `oes_priv` = '$oes', `scms_priv` = '$scms', `ims_priv` = '$ims', `css_priv` = '$css' WHERE `cms_privilege`.`job_title_code` = '$update';";
				$emp_query="UPDATE `cms_privilege` SET `cms_priv` = '$cms', `frms_priv` = '$dms', `frms_user` = '$dmsuser', `ipcrms_priv` = '$ipcrms', `ipcrms2_priv` = '$ipcrms2', `ipcrms_user` = '$ipcrmsuser', `pms_priv` = '$pms', `pms2_priv` = '$pms2', `pms_user` = '$pmsuser', `pims_priv` = '$pims', `pims2_priv` = '$pims2', `pims_user` = '$pimsuser', `prs_priv` = '$prs', `prs2_priv` = '$prs2', `sis_priv` = '$sis', `sis2_priv` = '$sis2', `sis_user` = '$sisuser', `oes_priv` = '$oes', `scms_priv` = '$scms', `scms_user` = '$scmsuser', `ims_priv` = '$ims', `css_priv` = '$css', `superadmin_priv` = '$superadmin' WHERE `cms_privilege`.`job_title_code` = '$update';";
				$get_emp = $mysqli->query($emp_query);
				
				if($get_emp) {
					$_SESSION['msg'].='Successfully Updated Account';
					header('Location: ../usertype_settings.php');
				}
				else {
					$_SESSION['msg'].='Account Update Failed';
					header('Location: ../usertype_settings.php');
				}
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>