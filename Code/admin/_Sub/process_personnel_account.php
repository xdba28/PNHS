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
				$cons=$mysqli->query("SELECT faculty_type,pims_employment_records.job_title_code FROM pims_personnel,pims_employment_records,pims_job_title WHERE pims_employment_records.emp_no=pims_personnel.emp_no AND pims_employment_records.job_title_code=pims_job_title.job_title_code AND pims_employment_records.emp_no=$id");
                $consr=$cons->fetch_assoc();
                $ftype=$consr['faculty_type'];
                $jt=$consr['job_title_code'];
                if($ftype=="Teaching") {
                    $tchs=$mysqli->query("SELECT pims_employment_records.dept_id FROM pims_personnel,pims_employment_records,pims_department WHERE pims_employment_records.emp_no=pims_personnel.emp_no AND pims_employment_records.dept_id=pims_department.dept_id AND pims_employment_records.emp_no=$id");
                    $tchr=$tchs->fetch_assoc();
                    $dept=$tchr['dept_id'];
                    if(strstr($jt,"TCH") || strstr($jt,"MTCHR") || strstr($jt,"HTEACH")) {
                        $qry=$mysqli->query("INSERT INTO cms_account(cms_username,cms_password,cms_cpasswd,emp_no) VALUES('$u','$p','1','$id')");
                        $acct=$mysqli->insert_id;
                        if($qry) {
                            $dms=$mysqli->query("INSERT INTO dms_receiver(cms_account_id) VALUES($acct)");
                            $qry2=$mysqli->query("INSERT INTO cms_privilege(cms_priv,frms_priv,pms_priv,scms_priv,pims_priv,ims_priv,ipcrms_priv,oes_priv,prs_priv,css_priv,sis_priv,cms_account_type,cms_account_id) VALUES('1','1','1','1','1','0','1','1','0','0','1','user',$acct)");
                            if($qry2) {
                                echo "<script>alert('Success');</script>";
                            }
                            else {
                                echo "<script>alert('Error');</script>";
                                echo $uname." ".$pw." ".$ftype." ".$dept." ".$jt;
                            }
                        }
                        else {
                            echo "<script>alert('Error');</script>";
                            echo $uname." ".$pw." ".$ftype." ".$dept." ".$jt;
                        }
                    }
                    else if(strstr($jt,"ICTD")) {
                        $qry=$mysqli->query("INSERT INTO cms_account(cms_username,cms_password,cms_cpasswd,emp_no) VALUES('$u','$p','1','$id')");
                        $acct=$mysqli->insert_id;
                        if($qry) {
                            $dms=$mysqli->query("INSERT INTO dms_receiver(cms_account_id) VALUES($acct)");
                            $qry2=$mysqli->query("INSERT INTO cms_privilege(cms_priv,frms_priv,pms_priv,scms_priv,pims_priv,ims_priv,ipcrms_priv,oes_priv,prs_priv,css_priv,sis_priv,cms_account_type,cms_account_id) VALUES('1','1','1','1','1','0','1','1','0','0','1','Admin',$acct)");
                            if($qry2) {
                                echo "<script>alert('Success');</script>";
                            }
                            else {
                                echo "<script>alert('Error');</script>";
                                echo $uname." ".$pw." ".$ftype." ".$dept." ".$jt;
                            }
                        }
                        else {
                            echo "<script>alert('Error');</script>";
                            echo $uname." ".$pw." ".$ftype." ".$dept." ".$jt;
                        }
                    }
                }
                else {
                    $pers=$mysqli->query("SELECT pims_employment_records.dept_id 
                    FROM pims_personnel,pims_employment_records,pims_department 
                    WHERE pims_employment_records.emp_no=pims_personnel.emp_no 
                    AND pims_employment_records.dept_id=pims_department.dept_id
                    AND pims_employment_records.emp_no=$id");
                    $perr=$pers->fetch_assoc();
                    if(strstr($jt,"SUO")) {
                        $qry=$mysqli->query("INSERT INTO cms_account(cms_username,cms_password,cms_cpasswd,emp_no) VALUES('$u','$p','1','$id')");
                        $acct=$mysqli->insert_id;
                        if($qry) {
                            $dms=$mysqli->query("INSERT INTO dms_receiver(cms_account_id) VALUES($acct)");
                            $qry2=$mysqli->query("INSERT INTO cms_privilege(cms_priv,frms_priv,pms_priv,scms_priv,pims_priv,ims_priv,ipcrms_priv,oes_priv,prs_priv,css_priv,sis_priv,cms_account_type,cms_account_id) VALUES('1','1','1','1','1','1','0','0','0','0','0','Admin',$acct)");
                            if($qry2) {
                                echo "<script>alert('Success');</script>";
                            }
                            else {
                                echo "<script>alert('Error');</script>";
                                echo $uname." ".$pw." ".$ftype." ".$dept." ".$jt;
                            }
                        }
                        else {
                            echo "<script>alert('Error');</script>";
                            echo $uname." ".$pw." ".$ftype." ".$dept." ".$jt;
                        }
                    }
                    else if(strstr($jt,"RK")) {
                        $qry=$mysqli->query("INSERT INTO cms_account(cms_username,cms_password,cms_cpasswd,emp_no) VALUES('$u','$p','1','$id')");
                        $acct=$mysqli->insert_id;
                        if($qry) {
                            $dms=$mysqli->query("INSERT INTO dms_receiver(cms_account_id) VALUES($acct)");
                            $qry2=$mysqli->query("INSERT INTO cms_privilege(cms_priv,frms_priv,pms_priv,scms_priv,pims_priv,ims_priv,ipcrms_priv,oes_priv,prs_priv,css_priv,sis_priv,cms_account_type,cms_account_id) VALUES('1','1','1','1','1','0','0','0','0','0','1','Admin',$acct)");
                            if($qry2) {
                                echo "<script>alert('Success');</script>";
                            }
                            else {
                                echo "<script>alert('Error');</script>";
                                echo $uname." ".$pw." ".$ftype." ".$dept." ".$jt;
                            }
                        }
                        else {
                            echo "<script>alert('Error');</script>";
                            echo $uname." ".$pw." ".$ftype." ".$dept." ".$jt;
                        }
                    }
                    else if(strstr($jt,"HRM")) {
                        $qry=$mysqli->query("INSERT INTO cms_account(cms_username,cms_password,cms_cpasswd,emp_no) VALUES('$u','$p','1','$id')");
                        $acct=$mysqli->insert_id;
                        if($qry) {
                            $dms=$mysqli->query("INSERT INTO dms_receiver(cms_account_id) VALUES($acct)");
                            $qry2=$mysqli->query("INSERT INTO cms_privilege(cms_priv,frms_priv,pms_priv,scms_priv,pims_priv,ims_priv,ipcrms_priv,oes_priv,prs_priv,css_priv,sis_priv,cms_account_type,cms_account_id) VALUES('1','1','1','1','1','0','0','0','1','0','0','Admin',$acct)");
                            if($qry2) {
                                echo "<script>alert('Success');</script>";
                            }
                            else {
                                echo "<script>alert('Error');</script>";
                                echo $uname." ".$pw." ".$ftype." ".$dept." ".$jt;
                            }
                        }
                        else {
                            echo "<script>alert('Error');</script>";
                            echo $uname." ".$pw." ".$ftype." ".$dept." ".$jt;
                        }
                    }
                    else if(strstr($jt,"REG")) {
                        $qry=$mysqli->query("INSERT INTO cms_account(cms_username,cms_password,cms_cpasswd,emp_no) VALUES('$u','$p','1','$id')");
                        $acct=$mysqli->insert_id;
                        if($qry) {
                            $dms=$mysqli->query("INSERT INTO dms_receiver(cms_account_id) VALUES($acct)");
                            $qry2=$mysqli->query("INSERT INTO cms_privilege(cms_priv,frms_priv,pms_priv,scms_priv,pims_priv,ims_priv,ipcrms_priv,oes_priv,prs_priv,css_priv,sis_priv,cms_account_type,cms_account_id) VALUES('1','1','1','1','1','0','0','0','1','0','0','Admin',$acct)");
                            if($qry2) {
                                echo "<script>alert('Success');</script>";
                            }
                            else {
                                echo "<script>alert('Error');</script>";
                                echo $uname." ".$pw." ".$ftype." ".$dept." ".$jt;
                            }
                        }
                        else {
                            echo "<script>alert('Error');</script>";
                            echo $uname." ".$pw." ".$ftype." ".$dept." ".$jt;
                        }
                    }
                    else if(strstr($jt,"CASH")) {
                        $qry=$mysqli->query("INSERT INTO cms_account(cms_username,cms_password,cms_cpasswd,emp_no) VALUES('$u','$p','1','$id')");
                        $acct=$mysqli->insert_id;
                        if($qry) {
                            $dms=$mysqli->query("INSERT INTO dms_receiver(cms_account_id) VALUES($acct)");
                            $qry2=$mysqli->query("INSERT INTO cms_privilege(cms_priv,frms_priv,pms_priv,scms_priv,pims_priv,ims_priv,ipcrms_priv,oes_priv,prs_priv,css_priv,sis_priv,cms_account_type,cms_account_id) VALUES('1','1','1','1','1','0','0','0','1','0','0','Admin',$acct)");
                            if($qry2) {
                                echo "<script>alert('Success');</script>";
                            }
                            else {
                                echo "<script>alert('Error');</script>";
                                echo $uname." ".$pw." ".$ftype." ".$dept." ".$jt;
                            }
                        }
                        else {
                            echo "<script>alert('Error');</script>";
                            echo $uname." ".$pw." ".$ftype." ".$dept." ".$jt;
                        }
                    }
                    else if(strstr($jt,"NURS")) {
                        $qry=$mysqli->query("INSERT INTO cms_account(cms_username,cms_password,cms_cpasswd,emp_no) VALUES('$u','$p','1','$id')");
                        $acct=$mysqli->insert_id;
                        if($qry) {
                            $dms=$mysqli->query("INSERT INTO dms_receiver(cms_account_id) VALUES($acct)");
                            $qry2=$mysqli->query("INSERT INTO cms_privilege(cms_priv,frms_priv,pms_priv,scms_priv,pims_priv,ims_priv,ipcrms_priv,oes_priv,prs_priv,css_priv,sis_priv,cms_account_type,cms_account_id) VALUES('1','1','1','1','1','0','0','0','0','0','0','Admin',$acct)");
                            if($qry2) {
                                echo "<script>alert('Success');</script>";
                            }
                            else {
                                echo "<script>alert('Error');</script>";
                                echo $uname." ".$pw." ".$ftype." ".$dept." ".$jt;
                            }
                        }
                        else {
                            echo "<script>alert('Error');</script>";
                            echo $uname." ".$pw." ".$ftype." ".$dept." ".$jt;
                        }
                    }
                    else if(strstr($jt,"ACCT")) {
                        $qry=$mysqli->query("INSERT INTO cms_account(cms_username,cms_password,cms_cpasswd,emp_no) VALUES('$u','$p','1','$id')");
                        $acct=$mysqli->insert_id;
                        if($qry) {
                            $dms=$mysqli->query("INSERT INTO dms_receiver(cms_account_id) VALUES($acct)");
                            $qry2=$mysqli->query("INSERT INTO cms_privilege(cms_priv,frms_priv,pms_priv,scms_priv,pims_priv,ims_priv,ipcrms_priv,oes_priv,prs_priv,css_priv,sis_priv,cms_account_type,cms_account_id) VALUES('1','1','1','1','1','0','0','0','0','0','0','Admin',$acct)");
                            if($qry2) {
                                echo "<script>alert('Success');</script>";
                            }
                            else {
                                echo "<script>alert('Error');</script>";
                                echo $uname." ".$pw." ".$ftype." ".$dept." ".$jt;
                            }
                        }
                        else {
                            echo "<script>alert('Error');</script>";
                            echo $uname." ".$pw." ".$ftype." ".$dept." ".$jt;
                        }
                    }
                    else if(strstr($jt,"SECSP")) {
                        $qry=$mysqli->query("INSERT INTO cms_account(cms_username,cms_password,cms_cpasswd,emp_no) VALUES('$u','$p','1','$id')");
                        $acct=$mysqli->insert_id;
                        if($qry) {
                            $dms=$mysqli->query("INSERT INTO dms_receiver(cms_account_id) VALUES($acct)");
                            $qry2=$mysqli->query("INSERT INTO cms_privilege(cms_priv,frms_priv,pms_priv,scms_priv,pims_priv,ims_priv,ipcrms_priv,oes_priv,prs_priv,css_priv,sis_priv,cms_account_type,cms_account_id) VALUES('1','1','1','1','1','0','0','0','0','0','0','Admin',$acct)");
                            if($qry2) {
                                echo "<script>alert('Success');</script>";
                            }
                            else {
                                echo "<script>alert('Error');</script>";
                                echo $uname." ".$pw." ".$ftype." ".$dept." ".$jt;
                            }
                        }
                        else {
                            echo "<script>alert('Error');</script>";
                            echo $uname." ".$pw." ".$ftype." ".$dept." ".$jt;
                        }
                    }
                    else if(strstr($jt,"SP")) {
                        $qry=$mysqli->query("INSERT INTO cms_account(cms_username,cms_password,cms_cpasswd,emp_no) VALUES('$u','$p','1','$id')");
                        $acct=$mysqli->insert_id;
                        if($qry) {
                            $dms=$mysqli->query("INSERT INTO dms_receiver(cms_account_id) VALUES($acct)");
                            $qry2=$mysqli->query("INSERT INTO cms_privilege(cms_priv,frms_priv,pms_priv,scms_priv,pims_priv,ims_priv,ipcrms_priv,oes_priv,prs_priv,css_priv,sis_priv,cms_account_type,cms_account_id) VALUES('1','1','1','1','1','1','1','0','1','0','1','Superadmin',$acct)");
                            if($qry2) {
                                echo "<script>alert('Success');</script>";
                            }
                            else {
                                echo "<script>alert('Error');</script>";
                                echo $uname." ".$pw." ".$ftype." ".$dept." ".$jt;
                            }
                        }
                        else {
                            echo "<script>alert('Error');</script>";
                            echo $uname." ".$pw." ".$ftype." ".$dept." ".$jt;
                        }
                    }
                }
				if($qry AND $dms AND $qry2) {
					$_SESSION['msg'].='Successful Account Creation';
					header('Location: ../personnel_accounts.php');
				}
				else {
					$_SESSION['msg'].='Account Creation Failed';
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