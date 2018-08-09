<?php 
    
    function definePerson($id){
        //Gamitin kung connected na sa database
        
        include("../db/dbcon.php");
        $sql=$mysqli->query("SELECT css_priv,frms_priv,ims_priv,ipcrms_priv,pims_priv,pms_priv,oes_priv,prs_priv,scms_priv,sis_priv,cms_account_type,cms_privilege.cms_account_id,cms_account.emp_no,pims_employment_records.job_title_code,faculty_type,pims_employment_Records.dept_id
        FROM pims_personnel,pims_department,pims_employment_records,pims_job_title,cms_privilege,cms_account
        WHERE cms_account.emp_no=pims_personnel.emp_no
        AND cms_account.cms_account_id=cms_privilege.cms_account_id
        AND pims_personnel.emp_no=pims_employment_records.emp_no
        AND pims_employment_records.dept_id=pims_department.dept_id
        AND pims_employment_records.job_title_code=pims_job_title.job_title_code
        AND cms_account.cms_account_id=$id");
        $row=$sql->fetch_assoc();

        //Teaching User
        $css_priv=$row['css_priv'];//view scheds
        $dms_priv=$row['frms_priv'];;//view docs
        $ims_priv=$row['ims_priv'];;
        $ipcr_priv=$row['ipcrms_priv'];;//fill form
        $pims_priv=$row['pims_priv'];;//view profile
        $pms_priv=$row['pms_priv'];//request item
        $oes_priv=$row['oes_priv'];;//special admin
        $prs_priv=$row['prs_priv'];;
        $scms_priv=$row['scms_priv'];;//view med rec
        $sis_priv=$row['sis_priv'];;//view students
        $user_type=$row['cms_account_type'];;
        $job_title=$row['job_title_code'];;
        $emp_type=$row['faculty_type'];;
        $dept=$row['dept_id'];;
        $pers=array("css"=>"$css_priv","dms"=>"$dms_priv","ims"=>"$ims_priv","ipcr"=>"$ipcr_priv","pims"=>"$pims_priv","pms"=>"$pms_priv","oes"=>"$oes_priv","prs"=>"$prs_priv","scms"=>"$scms_priv","sis"=>"$sis_priv","user_type"=>"$user_type"
                    ,"job"=>"$job_title","emp_type"=>"$emp_type","dept"=>"$dept");
        return $pers;
        
        
        
        //gamitin kung itetest yung redirectionedit niyo lang id ng index tapos yung mga privilege
        /*
        if($id==2){
            //Teaching admin
            $css_priv=0;
            $dms_priv=1;//Generate docs - ICT
            $ims_priv=0;
            $ipcr_priv=0;//evaluate lower teachers - Dep heads & Master Teacher 
            $pims_priv=1;//approvals, Manage personnel - ICT
            $pms_priv=1;//special User
            $oes_priv=1;//special admin
            $prs_priv=0;
            $scms_priv=1;//mapeh teacher students - MAPEH
            $sis_priv=0;
            $user_type="admin";
            $job_title="ICT";
            $emp_type="TEACHING";
            $dept="1";
            $pers=array("css"=>"$css_priv","dms"=>"$dms_priv","ims"=>"$ims_priv","ipcr"=>"$ipcr_priv","pims"=>"$pims_priv","pms"=>"$pms_priv","oes"=>"$oes_priv","prs"=>"$prs_priv","scms"=>"$scms_priv","sis"=>"$sis_priv","user_type"=>"$user_type"
                        ,"job"=>"$job_title","emp_type"=>"$emp_type","dept"=>"$dept");
            return $pers;
        }
        
        if($id==3){
            //MAPEH Teaching admin
            $css_priv=0;
            $dms_priv=1;//Generate docs
            $ims_priv=0;
            $ipcr_priv=1;//Dep heads & Master Teacher evaluate lower teachers
            $pims_priv=0;//approvals, Manage personnel
            $pms_priv=1;//special user
            $oes_priv=1;//special admin
            $prs_priv=0;
            $scms_priv=1;//mapeh teacher students
            $sis_priv=0;
            $user_type="admin";
            $job_title="HTEACH1";
            $emp_type="TEACHING";
            $dept="7";
            $pers=array("css"=>"$css_priv","dms"=>"$dms_priv","ims"=>"$ims_priv","ipcr"=>"$ipcr_priv","pims"=>"$pims_priv","pms"=>"$pms_priv","oes"=>"$oes_priv","prs"=>"$prs_priv","scms"=>"$scms_priv","sis"=>"$sis_priv","user_type"=>"$user_type"
                        ,"job"=>"$job_title","emp_type"=>"$emp_type","dept"=>"$dept");
            return $pers;
        } 
        */
    }
?>