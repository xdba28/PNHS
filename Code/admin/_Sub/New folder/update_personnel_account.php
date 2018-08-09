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
				$emp_query="SELECT * FROM `cms_account` WHERE `emp_no` = '$id';";
				$get_emp = $mysqli->query($emp_query);
				while($emp = $get_emp->fetch_assoc()) {
					$cms_id = $emp['cms_account_ID'];
					echo $cms_id;
				}
				$P_fname = $P_mname = $P_lname = $emp_no = $job_title_code = $job_title_name = '';
				$pims_query="SELECT `emp_no`, `P_fname`, `P_mname`, `P_lname` FROM `pims_personnel` WHERE `emp_no` = '$id';";
				$get_pims = $mysqli->query($pims_query);
				while($pims = $get_pims->fetch_assoc()) {
					$P_fname = $pims['P_fname'];
					$P_mname = $pims['P_mname'];
					$P_lname = $pims['P_lname'];
					$emp_no = $pims['emp_no'];
					echo $emp_no;
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
					$p = substr($P_fname, 0, 1).$P_lname.'_pnhs';
				}
				$emp_query="UPDATE `cms_account` SET `cms_username` = '$u', `cms_password` = '$p' WHERE `cms_account`.`cms_account_ID` = '$cms_id'";
				$get_emp = $mysqli->query($emp_query);
				
				$emp_query="SELECT `cms_account_ID` FROM `cms_account` WHERE `emp_no` = '$emp_no';";
				$get_emp = $mysqli->query($emp_query);
				while($emp = $get_emp->fetch_assoc()) {
					$cms_id = $emp['cms_account_ID'];
					echo $cms_id;
				}
				echo $id;
				$get_priv_query="SELECT * FROM `cms_privilege` WHERE `cms_account_id` = '$cms_id';";
				$get_priv = $mysqli->query($get_priv_query);
				$ids = array();
				$data = array();
				$cnt1 = 0;
				while($priv = $get_priv->fetch_assoc()) {
					//$ids[$cnt1] = $priv['cms_priv_id'];
					//$accttype[$cnt1] = $priv['cms_account_type'];
					$data[$cnt1] = $priv['cms_account_type'];
					//echo $data[$cnt1];
					echo '<br>'; echo print_r($data); echo '</br>';
					$data2[$cnt1] = $priv['cms_priv_id'];
					//echo $data[$cnt1][0];
					echo '<br>'; echo print_r($data2); echo '</br>';
					++$cnt1;
				}
				echo '<pre>'; echo print_r($data); echo '</pre>';
				$del_priv1 = $del_priv2 = $del_priv3 = false;
				$add_priv1 = $add_priv2 = $add_priv3 = false;
				if(isset($_POST['at-sa-edit'])) {
					$at_sa_edit = $_POST['at-sa-edit'];
					if($at_sa_edit == 1) {
						$said = $data2[array_search("superadmin", $data)];
						//echo $said;
						$del_query1 = "DELETE FROM `cms_privilege` WHERE `cms_privilege`.`cms_priv_id` = '$said';";
						$del_priv1 = $mysqli->query($del_query1);
					}
				}
				else {
						$said = $data2[array_search("superadmin", $data)];
						echo '<br>'.$said.'ncjidghcisdhicihb<br>';
						if(isset($_POST['DMS-sa-edit'])) { $dms = 1; } else { $dms = 0; }
						if(isset($_POST['IMS-sa-edit'])) { $ims = 1; } else { $ims = 0; }
						if(isset($_POST['IPCRMS-sa-edit'])) { $ipcrms = 1; } else { $ipcrms = 0; }
						if(isset($_POST['OES-sa-edit'])) { $oes = 1; } else { $oes = 0; }
						if(isset($_POST['PMS-sa-edit'])) { $pms = 1; } else { $pms = 0; }
						if(isset($_POST['PIMS-sa-edit'])) { $pims = 1; } else { $pims = 0; }
						if(isset($_POST['PRS-sa-edit'])) { $prs = 1; } else { $prs = 0; }
						if(isset($_POST['CSS-sa-edit'])) { $css = 1; } else { $css = 0; }
						if(isset($_POST['SCMS-sa-edit'])) { $scms = 1; } else { $scms = 0; }
						if(isset($_POST['SIS-sa-edit'])) { $sis = 1; } else { $sis = 0; }
						if(isset($_POST['CMS-sa-edit'])) { $cms = 1; } else { $cms = 0; }
						$add_query1 = "UPDATE `cms_privilege` SET `cms_priv` = '$cms', `frms_priv` = '$dms', `ims_priv` = '$ims', `ipcrms_priv` = '$ipcrms', `oes_priv` = '$oes', `pms_priv` = '$pms', `pims_priv` = '$pims', `prs_priv` = '$prs', `css_priv` = '$css', `scms_priv` = '$scms', `sis_priv` = '$sis'  WHERE `cms_privilege`.`cms_priv_id` = '$said' AND `cms_account_type` = 'superadmin';";
						$add_priv1 = $mysqli->query($add_query1);
						//echo var_export($add_priv1);
					}
				if(isset($_POST['at-a-edit'])) {
					$at_a_edit = $_POST['at-a-edit'];
					if($at_a_edit == 1) {
						$aid = $data2[array_search("admin", $data)];
						echo '<br>'.$aid.'<br>';
						$del_query2 = "DELETE FROM `cms_privilege` WHERE `cms_privilege`.`cms_priv_id` = '$aid';";
						$del_priv2 = $mysqli->query($del_query2);
					}
				}
				else {
						$aid = $data2[array_search("admin", $data)];
						if(isset($_POST['DMS-a-edit'])) { $dms = 1; } else { $dms = 0; }
						if(isset($_POST['IMS-a-edit'])) { $ims = 1; } else { $ims = 0; }
						if(isset($_POST['IPCRMS-a-edit'])) { $ipcrms = 1; } else { $ipcrms = 0; }
						if(isset($_POST['OES-a-edit'])) { $oes = 1; } else { $oes = 0; }
						if(isset($_POST['PMS-a-edit'])) { $pms = 1; } else { $pms = 0; }
						if(isset($_POST['PIMS-a-edit'])) { $pims = 1; } else { $pims = 0; }
						if(isset($_POST['PRS-a-edit'])) { $prs = 1; } else { $prs = 0; }
						if(isset($_POST['CSS-a-edit'])) { $css = 1; } else { $css = 0; }
						if(isset($_POST['SCMS-a-edit'])) { $scms = 1; } else { $scms = 0; }
						if(isset($_POST['SIS-a-edit'])) { $sis = 1; } else { $sis = 0; }
						if(isset($_POST['CMS-a-edit'])) { $cms = 1; } else { $cms = 0; }
						$add_query2 = "UPDATE `cms_privilege` SET `cms_priv` = '$cms', `frms_priv` = '$dms', `ims_priv` = '$ims', `ipcrms_priv` = '$ipcrms', `oes_priv` = '$oes', `pms_priv` = '$pms', `pims_priv` = '$pims', `prs_priv` = '$prs', `css_priv` = '$css', `scms_priv` = '$scms', `sis_priv` = '$sis'  WHERE `cms_privilege`.`cms_priv_id` = '$aid' AND `cms_account_type` = 'admin';"; 
						$add_priv2 = $mysqli->query($add_query2);
					}
				if(isset($_POST['at-u-edit'])) {
					$at_u_edit = $_POST['at-u-edit'];
					if($at_u_edit == 1) {
						$uid = $data2[array_search("user", $data)];
						//echo '<br>'.$uid.'<br>';
						$del_query3 = "DELETE FROM `cms_privilege` WHERE `cms_privilege`.`cms_priv_id` = '$uid';";
						$del_priv3 = $mysqli->query($del_query3);
					}
				}
				else {
						$uid = $data2[array_search("user", $data)];
						if(isset($_POST['DMS-u-edit'])) { $dms = 1; } else { $dms = 0; }
						if(isset($_POST['IMS-u-edit'])) { $ims = 1; } else { $ims = 0; }
						if(isset($_POST['IPCRMS-u-edit'])) { $ipcrms = 1; } else { $ipcrms = 0; }
						if(isset($_POST['OES-u-edit'])) { $oes = 1; } else { $oes = 0; }
						if(isset($_POST['PMS-u-edit'])) { $pms = 1; } else { $pms = 0; }
						if(isset($_POST['PIMS-u-edit'])) { $pims = 1; } else { $pims = 0; }
						if(isset($_POST['PRS-u-edit'])) { $prs = 1; } else { $prs = 0; }
						if(isset($_POST['CSS-u-edit'])) { $css = 1; } else { $css = 0; }
						if(isset($_POST['SCMS-u-edit'])) { $scms = 1; } else { $scms = 0; }
						if(isset($_POST['SIS-u-edit'])) { $sis = 1; } else { $sis = 0; }
						if(isset($_POST['CMS-u-edit'])) { $cms = 1; } else { $cms = 0; }
						$add_query3 = "UPDATE `cms_privilege` SET `cms_priv` = '$cms', `frms_priv` = '$dms', `ims_priv` = '$ims', `ipcrms_priv` = '$ipcrms', `oes_priv` = '$oes', `pms_priv` = '$pms', `pims_priv` = '$pims', `prs_priv` = '$prs', `css_priv` = '$css', `scms_priv` = '$scms', `sis_priv` = '$sis'  WHERE `cms_privilege`.`cms_priv_id` = '$uid' AND `cms_account_type` = 'user';";
						$add_priv3 = $mysqli->query($add_query3);
					}
				//echo 'whee';
				echo '<br>'.$said.' '.$aid.' '.$uid.'<br>';
				if(isset($_POST['at_sa_add'])) {
					$at_sa_add = $_POST['at_sa_add'];
					//echo 'whee2';
					if($at_sa_add == 1) {
						echo 'whee3';
						if(isset($_POST['DMS-sa-edit'])) { $dms = 1; } else { $dms = 0; }
						if(isset($_POST['IMS-sa-edit'])) { $ims = 1; } else { $ims = 0; }
						if(isset($_POST['IPCRMS-sa-edit'])) { $ipcrms = 1; } else { $ipcrms = 0; }
						if(isset($_POST['OES-sa-edit'])) { $oes = 1; } else { $oes = 0; }
						if(isset($_POST['PMS-sa-edit'])) { $pms = 1; } else { $pms = 0; }
						if(isset($_POST['PIMS-sa-edit'])) { $pims = 1; } else { $pims = 0; }
						if(isset($_POST['PRS-sa-edit'])) { $prs = 1; } else { $prs = 0; }
						if(isset($_POST['CSS-sa-edit'])) { $css = 1; } else { $css = 0; }
						if(isset($_POST['SCMS-sa-edit'])) { $scms = 1; } else { $scms = 0; }
						if(isset($_POST['SIS-sa-edit'])) { $sis = 1; } else { $sis = 0; }
						if(isset($_POST['CMS-sa-edit'])) { $cms = 1; } else { $cms = 0; }
						$add_query1 = "INSERT INTO `cms_privilege`(`cms_priv_id`, `cms_priv`, `frms_priv`, `ims_priv`, `ipcrms_priv`, `oes_priv`, `pms_priv`, `pims_priv`, `prs_priv`, `css_priv`, `scms_priv`, `sis_priv`, `memo_priv`, `calendar_priv`, `news_priv`, `ach_priv`, `gallery_priv`, `project_priv`, `carousel_priv`, `cms_account_type`, `cms_account_id`) VALUES ('','".$cms."','".$dms."','".$ims."','".$ipcrms."','".$oes."','".$pms."','".$pims."','".$prs."','".$css."','".$scms."','".$sis."','0','0','0','0','0','0','0','superadmin','$cms_id');";
						$add_priv1 = $mysqli->query($add_query1);
					}
				}
				if(isset($_POST['at_a_add'])) {
					$at_a_add = $_POST['at_a_add'];
					if($at_a_add == 1) {
						if(isset($_POST['DMS-a-edit'])) { $dms = 1; } else { $dms = 0; }
						if(isset($_POST['IMS-a-edit'])) { $ims = 1; } else { $ims = 0; }
						if(isset($_POST['IPCRMS-a-edit'])) { $ipcrms = 1; } else { $ipcrms = 0; }
						if(isset($_POST['OES-a-edit'])) { $oes = 1; } else { $oes = 0; }
						if(isset($_POST['PMS-a-edit'])) { $pms = 1; } else { $pms = 0; }
						if(isset($_POST['PIMS-a-edit'])) { $pims = 1; } else { $pims = 0; }
						if(isset($_POST['PRS-a-edit'])) { $prs = 1; } else { $prs = 0; }
						if(isset($_POST['CSS-a-edit'])) { $css = 1; } else { $css = 0; }
						if(isset($_POST['SCMS-a-edit'])) { $scms = 1; } else { $scms = 0; }
						if(isset($_POST['SIS-a-edit'])) { $sis = 1; } else { $sis = 0; }
						if(isset($_POST['CMS-a-edit'])) { $cms = 1; } else { $cms = 0; }
						$add_query2 = "INSERT INTO `cms_privilege`(`cms_priv_id`, `cms_priv`, `frms_priv`, `ims_priv`, `ipcrms_priv`, `oes_priv`, `pms_priv`, `pims_priv`, `prs_priv`, `css_priv`, `scms_priv`, `sis_priv`, `memo_priv`, `calendar_priv`, `news_priv`, `ach_priv`, `gallery_priv`, `project_priv`, `carousel_priv`, `cms_account_type`, `cms_account_id`) VALUES ('','".$cms."','".$dms."','".$ims."','".$ipcrms."','".$oes."','".$pms."','".$pims."','".$prs."','".$css."','".$scms."','".$sis."','0','0','0','0','0','0','0','admin','$cms_id');";
						$add_priv2 = $mysqli->query($add_query2);
					}
				}
				if(isset($_POST['at_u_add'])) {
					$at_u_add = $_POST['at_u_add'];
					if($at_u_add == 1) {
						if(isset($_POST['DMS-u-edit'])) { $dms = 1; } else { $dms = 0; }
						if(isset($_POST['IMS-u-edit'])) { $ims = 1; } else { $ims = 0; }
						if(isset($_POST['IPCRMS-u-edit'])) { $ipcrms = 1; } else { $ipcrms = 0; }
						if(isset($_POST['OES-u-edit'])) { $oes = 1; } else { $oes = 0; }
						if(isset($_POST['PMS-u-edit'])) { $pms = 1; } else { $pms = 0; }
						if(isset($_POST['PIMS-u-edit'])) { $pims = 1; } else { $pims = 0; }
						if(isset($_POST['PRS-u-edit'])) { $prs = 1; } else { $prs = 0; }
						if(isset($_POST['CSS-u-edit'])) { $css = 1; } else { $css = 0; }
						if(isset($_POST['SCMS-u-edit'])) { $scms = 1; } else { $scms = 0; }
						if(isset($_POST['SIS-u-edit'])) { $sis = 1; } else { $sis = 0; }
						if(isset($_POST['CMS-u-edit'])) { $cms = 1; } else { $cms = 0; }
						$add_query3 = "INSERT INTO `cms_privilege`(`cms_priv_id`, `cms_priv`, `frms_priv`, `ims_priv`, `ipcrms_priv`, `oes_priv`, `pms_priv`, `pims_priv`, `prs_priv`, `css_priv`, `scms_priv`, `sis_priv`, `memo_priv`, `calendar_priv`, `news_priv`, `ach_priv`, `gallery_priv`, `project_priv`, `carousel_priv`, `cms_account_type`, `cms_account_id`) VALUES ('','".$cms."','".$dms."','".$ims."','".$ipcrms."','".$oes."','".$pms."','".$pims."','".$prs."','".$css."','".$scms."','".$sis."','0','0','0','0','0','0','0','user','$cms_id');";
						$add_priv3 = $mysqli->query($add_query3);
					}
				}
				//echo print_r($ids);
				//echo '<pre>'; echo print_r($_REQUEST); echo '</pre>';
				//echo '<pre>'; echo var_export($add_query1); echo '</pre>';
				//echo $add_priv1;
				if($get_emp AND ((($del_priv1 OR $add_priv1) OR ($del_priv2 OR $add_priv2) OR ($del_priv3 OR $add_priv3)) AND ($add_priv1 OR $add_priv2 OR $add_priv3))) {
					$_SESSION['msg']='Success';
					header('Location: ../personnel_accounts.php');
				}
				else {
					$_SESSION['msg']='Failed';
					header('Location: ../personnel_accounts.php?id='.$id);
				}
			}
	}
	else {
		header('Location: ../../index.php');
	}
?>