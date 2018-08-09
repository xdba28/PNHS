<?php

	require '../php/_Func.php';
	require 'connection.php';
	if(isset($_POST['u']) AND isset($_POST['p']) AND isset($_POST['login'])) {
		if(isset($_SESSION['hist'])) {
			$_hist = $_SESSION['hist'];
		}
		$username = $mysqli->real_escape_string(stripslashes(strip_tags($_POST['u'])));
		$ppassword = $mysqli->real_escape_string(stripslashes(strip_tags($_POST['p'])));
        $password=pcrypt("$ppassword",'ecrypt');
		if($query_run=$mysqli->query("SELECT * FROM cms_account WHERE cms_username='$username' AND cms_password='$password' AND status = '1' LIMIT 1;")) {
			$query_num_rows=$query_run->num_rows;
		}
		if($query_num_rows==1) {
			$data = $query_run->fetch_assoc();
			$id = $data['cms_account_ID'];
			$cpass = $data['cms_cpasswd'];
            $spadmin=$data['superadmin'];
            if($spadmin==0){
                ob_start();
                session_start();
                $_SESSION['user_data']['acct']['cms_account_ID'] = $data['cms_account_ID'];
                $_SESSION['user_data']['acct']['cms_username'] = $data['cms_username'];
                $_SESSION['user_data']['acct']['emp_no'] = $data['emp_no'];
                $_SESSION['user_data']['acct']['lrn'] = $data['lrn'];
                $current_date = $data['cms_current_log_date'];
                $current_time = $data['cms_current_log_time'];
                $prev_date = $data['cms_prev_log_date'];
                $prev_time = $data['cms_prev_log_time'];
                if($_SESSION['user_data']['acct']['lrn']==NULL AND !empty($_SESSION['user_data']['acct']['emp_no'])) {
                    $emp_escape = $mysqli->real_escape_string($_SESSION['user_data']['acct']['emp_no']);
                    $get_emp_query="SELECT job_title_code,pims_personnel.emp_No, pims_personnel.P_fname, pims_personnel.P_mname, pims_personnel.P_lname FROM pims_personnel,pims_employment_records WHERE pims_employment_records.emp_no=pims_personnel.emp_no AND pims_personnel.emp_No='$emp_escape';";
                    $get_emp = $mysqli->query($get_emp_query);
                    if($get_emp->num_rows > 0) {
                        $emp = $get_emp->fetch_assoc();
                        $cms_job=preg_replace('/[0-9]+/', '',$emp['job_title_code']);
                        $get_priv_query="SELECT * FROM cms_privilege WHERE job_title_code = '$cms_job' LIMIT 1;";
                        $get_priv = $mysqli->query($get_priv_query);
                        if($get_priv->num_rows > 0) {
                            $priv = $get_priv->fetch_assoc();
                            $has_sa_priv = $mysqli->real_escape_string($priv['superadmin_priv']);
                            if($has_sa_priv == '1') {	
                                $_SESSION['user_data']['priv']['job_title_code'] = $cms_job;
                                //$_SESSION['user_data']['priv']['cms_priv_ID'] = '';
                                $_SESSION['user_data']['priv']['cms_priv'] = '1';
                                $_SESSION['user_data']['priv']['frms_priv'] = '0';
                                $_SESSION['user_data']['priv']['frms2_priv'] = '1';
                                $_SESSION['user_data']['priv']['frms_user'] = '0';
                                $_SESSION['user_data']['priv']['ims_priv'] = '1';
                                $_SESSION['user_data']['priv']['ipcrms_priv'] = '1';
                                $_SESSION['user_data']['priv']['ipcrms2_priv'] = '0';
                                $_SESSION['user_data']['priv']['ipcrms_user'] = '0';
                                $_SESSION['user_data']['priv']['oes_priv'] = '1';
                                $_SESSION['user_data']['priv']['pms_priv'] = '0';
                                $_SESSION['user_data']['priv']['pms2_priv'] = '1';
                                $_SESSION['user_data']['priv']['pms_user'] = '0';
                                $_SESSION['user_data']['priv']['pims_priv'] = '1';
                                $_SESSION['user_data']['priv']['pims2_priv'] = '0';
                                $_SESSION['user_data']['priv']['pims_user'] = '0';
                                $_SESSION['user_data']['priv']['prs_priv'] = '0';
                                $_SESSION['user_data']['priv']['prs2_priv'] = '1';
                                $_SESSION['user_data']['priv']['css_priv'] = '1';
                                $_SESSION['user_data']['priv']['scms_priv'] = '1';
                                $_SESSION['user_data']['priv']['scms_user'] = '0';
                                $_SESSION['user_data']['priv']['sis_priv'] = '0';
                                $_SESSION['user_data']['priv']['sis2_priv'] = '1';
                                $_SESSION['user_data']['priv']['sis_user'] = '0';
                                $_SESSION['user_data']['priv']['superadmin'] = '1';
                            }
                            else {
                                $_SESSION['user_data']['priv']['job_title_code'] = $cms_job;
                                //$_SESSION['user_data']['priv']['cms_priv_ID'] = $priv['cms_priv_ID'];
                                $_SESSION['user_data']['priv']['cms_priv'] = $priv['cms_priv'];
                                $_SESSION['user_data']['priv']['frms_priv'] = $priv['frms_priv'];
                                $_SESSION['user_data']['priv']['frms2_priv'] = $priv['frms2_priv'];
                                $_SESSION['user_data']['priv']['frms_user'] = $priv['frms_user'];
                                $_SESSION['user_data']['priv']['ims_priv'] = $priv['ims_priv'];
                                $_SESSION['user_data']['priv']['ipcrms_priv'] = $priv['ipcrms_priv'];
                                $_SESSION['user_data']['priv']['ipcrms2_priv'] = $priv['ipcrms2_priv'];
                                $_SESSION['user_data']['priv']['ipcrms_user'] = $priv['ipcrms_user'];
                                $_SESSION['user_data']['priv']['oes_priv'] = $priv['oes_priv'];
                                $_SESSION['user_data']['priv']['pms_priv'] = $priv['pms_priv'];
                                $_SESSION['user_data']['priv']['pms2_priv'] = $priv['pms2_priv'];
                                $_SESSION['user_data']['priv']['pms_user'] = $priv['pms_user'];
                                $_SESSION['user_data']['priv']['pims_priv'] = $priv['pims_priv'];
                                $_SESSION['user_data']['priv']['pims2_priv'] = $priv['pims2_priv'];
                                $_SESSION['user_data']['priv']['pims_user'] = $priv['pims_user'];
                                $_SESSION['user_data']['priv']['prs_priv'] = $priv['prs_priv'];
                                $_SESSION['user_data']['priv']['prs2_priv'] = $priv['prs2_priv'];
                                $_SESSION['user_data']['priv']['prs_user'] = $priv['prs_user'];
                                $_SESSION['user_data']['priv']['css_priv'] = $priv['css_priv'];
                                $_SESSION['user_data']['priv']['scms_priv'] = $priv['scms_priv'];
                                $_SESSION['user_data']['priv']['scms_user'] = $priv['scms_user'];
                                $_SESSION['user_data']['priv']['sis_priv'] = $priv['sis_priv'];
                                $_SESSION['user_data']['priv']['sis2_priv'] = $priv['sis2_priv'];
                                $_SESSION['user_data']['priv']['sis_user'] = $priv['sis_user'];
                                $_SESSION['user_data']['priv']['superadmin'] = $priv['superadmin_priv'];
                            }
                        }
                        else {
                            session_destroy();
                            session_start();
                            $_SESSION['msg']='error';
                            $_SESSION['namu']=$username;
                            $_SESSION['pasu']=$ppassword;
                            if(empty($_hist)) {
                                header('Location: ../.php');
                                die();
                            }
                            else {
                                header('Location: '.$_hist);
                                die();
                            }
                        }
                    }
                    else {
                        session_destroy();
                        session_start();
                        $_SESSION['msg']='error';
                        $_SESSION['namu']=$username;
                        $_SESSION['pasu']=$ppassword;
                        if(empty($_hist)) {
                            header('Location: ../index.php');
                            die();
                        }
                        else {
                            header('Location: '.$_hist);
                            die();
                        }
                    }
                }
                else if($_SESSION['user_data']['acct']['emp_no']==NULL AND !empty($_SESSION['user_data']['acct']['lrn'])) {
                    $lrn_escape = $mysqli->real_escape_string($_SESSION['user_data']['acct']['lrn']);
                    $get_lrn_query="SELECT sis_student.lrn, sis_student.stu_fname, sis_student.stu_mname, sis_student.stu_lname FROM sis_student WHERE sis_student.lrn='$lrn_escape'";
                    $get_lrn = $mysqli->query($get_lrn_query);
                    if($get_lrn->num_rows > 0) {
                        $lrn = $get_lrn->fetch_assoc();
                        //$_SESSION['user_data']['priv']['job_title_code'] = '';
                        //$_SESSION['user_data']['priv']['cms_priv_ID'] = '';
                        $_SESSION['user_data']['priv']['cms_priv'] = '0';
                        $_SESSION['user_data']['priv']['frms_priv'] = '0';
                        $_SESSION['user_data']['priv']['frms2_priv'] = '0';
                        $_SESSION['user_data']['priv']['frms_user'] = '0';
                        $_SESSION['user_data']['priv']['ims_priv'] = '0';
                        $_SESSION['user_data']['priv']['ipcrms_priv'] = '0';
                        $_SESSION['user_data']['priv']['ipcrms2_priv'] = '0';
                        $_SESSION['user_data']['priv']['ipcrms_user'] = '0';
                        $_SESSION['user_data']['priv']['oes_priv'] = '1';
                        $_SESSION['user_data']['priv']['pms_priv'] = '0';
                        $_SESSION['user_data']['priv']['pms2_priv'] = '0';
                        $_SESSION['user_data']['priv']['pms_user'] = '0';
                        $_SESSION['user_data']['priv']['pims_priv'] = '0';
                        $_SESSION['user_data']['priv']['pims2_priv'] = '0';
                        $_SESSION['user_data']['priv']['pims_user'] = '0';
                        $_SESSION['user_data']['priv']['prs_priv'] = '0';
                        $_SESSION['user_data']['priv']['prs2_priv'] = '0';
                        $_SESSION['user_data']['priv']['css_priv'] = '1';
                        $_SESSION['user_data']['priv']['scms_priv'] = '1';
                        $_SESSION['user_data']['priv']['scms_user'] = '0';
                        $_SESSION['user_data']['priv']['sis_priv'] = '1';
                        $_SESSION['user_data']['priv']['sis2_priv'] = '0';
                        $_SESSION['user_data']['priv']['sis_user'] = '0';
                        $_SESSION['user_data']['priv']['superadmin'] = '0';
                    }
                    else {
                        session_destroy();
                        session_start();
                        $_SESSION['msg']='error';
                        $_SESSION['namu']=$username;
                        $_SESSION['pasu']=$password;
                        if(empty($_hist)) {
                            header('Location: ../index.php');
                            die();
                        }
                        else {
                            header('Location: '.$_hist);
                            die();
                        }
                    }
                }
                if($cpass==0 OR $cpass=='0') {
                    if(isset($emp)) {
                        $getFname = $emp['P_fname'];
                        $getMname = $emp['P_mname'];
                        $getLname = $emp['P_lname'];
                        $idi = $data['cms_account_ID'];
                        $_SESSION['msg']='Welcome '.$getFname;
                        $_SESSION['flogin']=1;
                    }
                    else if(isset($lrn)) {
                        $idi = $data['cms_account_ID'];
                        $getFname = $lrn['stu_fname'];
                        $getMname = $lrn['stu_mname'];
                        $getLname = $lrn['stu_lname'];
                        $_SESSION['msg']='Welcome '.$getFname;
                        $_SESSION['flogin']=1;
                    }
                    else {
                        $_SESSION['msg']='Welcome';
                        $_SESSION['flogin']=1;
                    }
                    header('Location: ../index.php');
                    die();
                }
                else if($cpass==1 OR $cpass=='1') {
                    if(isset($emp)) {
                        $getFname = $emp['P_fname'];
                        $getMname = $emp['P_mname'];
                        $getLname = $emp['P_lname'];
                        $idi = $data['cms_account_ID'];
                        $_SESSION['msg']='Welcome '.$getFname;
                        if(!empty($getMname)) {
                            $_SESSION['msg'].=' '.$getMname;
                            $_SESSION['flogin']=1;
                        }
                        if(!empty($getLname)) {
                            $_SESSION['msg'].=' '.$getLname;
                            $_SESSION['flogin']=1;
                        }
                    }
                    else if(isset($lrn)) {
                        $idi = $data['cms_account_ID'];
                        $getFname = $lrn['stu_fname'];
                        $getMname = $lrn['stu_mname'];
                        $getLname = $lrn['stu_lname'];
                        $_SESSION['msg']='Welcome '.$getFname;
                        if(!empty($getMname)) {
                            $_SESSION['msg'].=' '.$getMname;
                            $_SESSION['flogin']=1;
                        }
                        if(!empty($getLname)) {
                            $_SESSION['msg'].=' '.$getLname;
                            $_SESSION['flogin']=1;
                        }
                    }
                    else {
                        $_SESSION['msg']='Welcome';
                        $_SESSION['flogin']=1;
                    }
                    header('Location: ../admin/cpasswd.php');
                    die();
                }
            }else{
                ob_start();
                session_start();
                $_SESSION['user_data']['acct']['cms_account_ID'] = $data['cms_account_ID'];
                $_SESSION['user_data']['acct']['cms_username'] = $data['cms_username'];
                $_SESSION['user_data']['acct']['emp_no'] = "00";
                $_SESSION['user_data']['priv']['job_title_code'] = 'dummy';
                $_SESSION['user_data']['priv']['cms_priv'] = '1';
                $_SESSION['user_data']['priv']['frms_priv'] = '0';
                $_SESSION['user_data']['priv']['frms2_priv'] = '1';
                $_SESSION['user_data']['priv']['frms_user'] = '0';
                $_SESSION['user_data']['priv']['ims_priv'] = '1';
                $_SESSION['user_data']['priv']['ipcrms_priv'] = '0';
                $_SESSION['user_data']['priv']['ipcrms2_priv'] = '1';
                $_SESSION['user_data']['priv']['ipcrms_user'] = '0';
                $_SESSION['user_data']['priv']['oes_priv'] = '1';
                $_SESSION['user_data']['priv']['pms_priv'] = '0';
                $_SESSION['user_data']['priv']['pms2_priv'] = '1';
                $_SESSION['user_data']['priv']['pms_user'] = '0';
                $_SESSION['user_data']['priv']['pims_priv'] = '0';
                $_SESSION['user_data']['priv']['pims2_priv'] = '1';
                $_SESSION['user_data']['priv']['pims_user'] = '0';
                $_SESSION['user_data']['priv']['prs_priv'] = '0';
                $_SESSION['user_data']['priv']['prs2_priv'] = '1';
                $_SESSION['user_data']['priv']['css_priv'] = '1';
                $_SESSION['user_data']['priv']['scms_priv'] = '1';
                $_SESSION['user_data']['priv']['scms_user'] = '0';
                $_SESSION['user_data']['priv']['sis_priv'] = '0';
                $_SESSION['user_data']['priv']['sis2_priv'] = '1';
                $_SESSION['user_data']['priv']['sis_user'] = '0';
                $_SESSION['user_data']['priv']['superadmin'] = '1';
                //echo "<script>alert('".$_SESSION['user_data']['priv']['superadmin_priv']."');</script>";
                header('Location: ../index.php');
            }
			
		}
		else {
			session_destroy();
			session_start();
			$_SESSION['msg']="error";
			$_SESSION['namu']=$username;
			$_SESSION['pasu']=$ppassword;
			if(empty($_hist)) {
				header('Location: ../index.php');
				die();
			}
			else {
				header('Location: '.$_hist);
				die();
			}
		}
	}
	else {
		header('Location: ../index.php');
		die();
	}
?>