<?php
	require '../php/connection.php';
	if(isset($_POST['u']) AND isset($_POST['p']) AND isset($_POST['login'])) {
		$username=$mysqli->real_escape_string(stripslashes(strip_tags($_POST['u'])));
		$password=$mysqli->real_escape_string(stripslashes(strip_tags($_POST['p'])));
		if($query_run=$mysqli->query("SELECT * FROM cms_account WHERE cms_username='$username' AND cms_password='$password'")) {
			$query_num_rows=$query_run->num_rows;
		}
		if($query_num_rows==1) {
			$data = $query_run->fetch_assoc();
			$id = $data['cms_account_ID'];
			ob_start();
			session_start();
			$_SESSION['user_data']['acct']['cms_account_ID'] = $data['cms_account_ID'];
			$_SESSION['user_data']['acct']['cms_username'] = $data['cms_username'];
			$_SESSION['user_data']['acct']['emp_no'] = $data['emp_no'];
			$_SESSION['user_data']['acct']['lrn'] = $data['lrn'];
			if($_SESSION['user_data']['acct']['lrn']==NULL AND !empty($_SESSION['user_data']['acct']['emp_no'])) {
				$emp_escape = $mysqli->real_escape_string($_SESSION['user_data']['acct']['emp_no']);
				$get_emp_query="SELECT pims_personnel.emp_No, pims_personnel.P_fname, pims_personnel.P_mname, pims_personnel.P_lname FROM pims_personnel WHERE pims_personnel.emp_No='$emp_escape';";
				$get_emp = $mysqli->query($get_emp_query);
				$emp = $get_emp->fetch_assoc();
			}
			if($_SESSION['user_data']['acct']['emp_no']==NULL AND !empty($_SESSION['user_data']['acct']['lrn'])) {
				$lrn_escape = $mysqli->real_escape_string($_SESSION['user_data']['acct']['lrn']);
				$get_lrn_query="SELECT sis_student.lrn, sis_student.stu_fname, sis_student.stu_mname, sis_student.stu_lname FROM sis_student WHERE sis_student.lrn='$lrn_escape'";
				$get_lrn = $mysqli->query($get_lrn_query);
				$lrn = $get_lrn->fetch_assoc();
			}
			$get_priv_query="SELECT * FROM `cms_privilege` WHERE `cms_account_id` = '$id';";
			$get_priv = $mysqli->query($get_priv_query);
			$priva = array();
			$cnt1 = 0;
			while($priv = $get_priv->fetch_assoc()) {
				$_SESSION['user_data']['priv']['cms_account_type'][$cnt1] = $priv['cms_account_type'];
				$_SESSION['user_data']['priv']['cms_priv_ID'][$cnt1] = $priv['cms_priv_id'];
				$_SESSION['user_data']['priv']['cms_priv'][$cnt1] = $priv['cms_priv'];
				$_SESSION['user_data']['priv']['frms_priv'][$cnt1] = $priv['frms_priv'];
				$_SESSION['user_data']['priv']['ims_priv'][$cnt1] = $priv['ims_priv'];
				$_SESSION['user_data']['priv']['ipcrms_priv'][$cnt1] = $priv['ipcrms_priv'];
				$_SESSION['user_data']['priv']['oes_priv'][$cnt1] = $priv['oes_priv'];
				$_SESSION['user_data']['priv']['pms_priv'][$cnt1] = $priv['pms_priv'];
				$_SESSION['user_data']['priv']['pims_priv'][$cnt1] = $priv['pims_priv'];
				$_SESSION['user_data']['priv']['prs_priv'][$cnt1] = $priv['prs_priv'];
				$_SESSION['user_data']['priv']['css_priv'][$cnt1] = $priv['css_priv'];
				$_SESSION['user_data']['priv']['scms_priv'][$cnt1] = $priv['scms_priv'];
				$_SESSION['user_data']['priv']['sis_priv'][$cnt1] = $priv['sis_priv'];
				++$cnt1;
			}
			$_SESSION['msg']='Welcome';
			header('Location: ../index.php');
		}
		else {
			session_destroy();
			session_start();
			$_SESSION['msg']='error';
			$_SESSION['namu']=$username;
			$_SESSION['pasu']=$password;
			header('Location: ../admin/index.php');
		}
	}
	else {
		header('Location: ../index.php');
	}
?>