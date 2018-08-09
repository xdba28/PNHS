<?php 
    
    function definePerson($id) {
        //Gamitin kung connected na sa database
        include("db_connect.php");
        $sql=$_SESSION['pims_data']['connection']->query("SELECT css_priv,frms_priv,ims_priv,ipcrms_priv,pims_priv,pms_priv,oes_priv,prs_priv,scms_priv,sis_priv,cms_account_type,cms_privilege.cms_account_id,cms_account.emp_no,pims_employment_records.job_title_code,faculty_type
        FROM pims_personnel,pims_employment_records,pims_job_title,cms_privilege,cms_account
        WHERE cms_account.emp_no=pims_personnel.emp_no
        AND cms_account.cms_account_id=cms_privilege.cms_account_id
        AND pims_personnel.emp_no=pims_employment_records.emp_no
        AND pims_employment_records.job_title_code=pims_job_title.job_title_code
        AND cms_account.cms_account_id=$id");
        $row=$sql->fetch_assoc();
        $sql2=$_SESSION['pims_data']['connection']->query("SELECT pims_employment_records.dept_id 
        FROM cms_account,pims_personnel,pims_employment_records,pims_department
        WHERE pims_employment_records.dept_id=pims_department.dept_id
        AND pims_personnel.emp_no=pims_employment_records.emp_no
        AND pims_personnel.emp_no=cms_account.emp_no
        AND cms_account_id=$id");
        $row2=$sql2->fetch_assoc();
        //Teaching User
        $css_priv=$row['css_priv'];//view scheds
        $dms_priv=$row['frms_priv'];//view docs
        $ims_priv=$row['ims_priv'];
        $ipcr_priv=$row['ipcrms_priv'];//fill form
        $pims_priv=$row['pims_priv'];//view profile
        $pms_priv=$row['pms_priv'];//request item
        $oes_priv=$row['oes_priv'];//special admin
        $prs_priv=$row['prs_priv'];
        $scms_priv=$row['scms_priv'];//view med rec
        $sis_priv=$row['sis_priv'];//view students
        $user_type=$row['cms_account_type'];
        $job_title=$row['job_title_code'];
        $emp_type=$row['faculty_type'];
        $dept=$row2['dept_id'];
        $pers=array("css"=>"$css_priv","dms"=>"$dms_priv","ims"=>"$ims_priv","ipcr"=>"$ipcr_priv","pims"=>"$pims_priv","pms"=>"$pms_priv","oes"=>"$oes_priv","prs"=>"$prs_priv","scms"=>"$scms_priv","sis"=>"$sis_priv","user_type"=>"$user_type"
                    ,"job"=>"$job_title","emp_type"=>"$emp_type","dept"=>"$dept");
        return $pers;
    }

    function defineStudent($id) {
        //Gamitin kung connected na sa database
        include("db_connect.php");
        $sql=$_SESSION['pims_data']['connection']->query("SELECT css_priv,frms_priv,ims_priv,ipcrms_priv,pims_priv,pms_priv,oes_priv,prs_priv,scms_priv,sis_priv,cms_account_type,
        cms_privilege.cms_account_id,cms_account.lrn
        FROM cms_privilege,cms_account,sis_student
        WHERE cms_account.cms_account_id=cms_privilege.cms_account_id
        AND cms_account.lrn=sis_student.lrn
        AND cms_account.cms_account_id=$id");
        $row=$sql->fetch_assoc();
        //Teaching User
        $css_priv=$row['css_priv'];//view scheds
        $oes_priv=$row['oes_priv'];//special admin
        $scms_priv=$row['scms_priv'];//view med rec
        $sis_priv=$row['sis_priv'];//view students
        $pers=array("css"=>"$css_priv","oes"=>"$oes_priv","scms"=>"$scms_priv","sis"=>"$sis_priv");
        return $pers;
    }
?>