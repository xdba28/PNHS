<?php 
    ob_start();
    session_start();
    

    function definePerson($id) {
        //Gamitin kung connected na sa database
        include("php/connection.php");
        $sql=$mysqli->query("SELECT css_priv,frms_priv,ims_priv,ipcrms_priv,pims_priv,pms_priv,oes_priv,prs_priv,scms_priv,sis_priv,cms_account_type,cms_privilege.cms_account_id,cms_account.emp_no,pims_employment_records.job_title_code,faculty_type
        FROM pims_personnel,pims_employment_records,pims_job_title,cms_privilege,cms_account
        WHERE cms_account.emp_no=pims_personnel.emp_no
        AND cms_account.cms_account_id=cms_privilege.cms_account_id
        AND pims_personnel.emp_no=pims_employment_records.emp_no
        AND pims_employment_records.job_title_code=pims_job_title.job_title_code
        AND cms_account.cms_account_id=$id");
        $row=$sql->fetch_assoc();
        $sql2=$mysqli->query("SELECT pims_employment_records.dept_id 
        FROM cms_account,pims_personnel,pims_employment_records,pims_department
        WHERE pims_employment_records.dept_id=pims_department.dept_id
        AND pims_personnel.emp_no=pims_employment_records.emp_no
        AND pims_personnel.emp_no=cms_account.emp_no
        AND cms_account_id=$id");
        $row2=$sql2->fetch_assoc();
        //Teaching User
        $css_admin="";
        $dms1_admin="";
        $dms2_admin="";
        $ims_admin="";
        $ipcr1_admin="";
        $ipcr2_admin="";
        $pims1_admin="";
        $pims2_admin="";
        $pms1_admin="";
        $pms2_admin="";
        $oes_admin="";
        $prs1_admin="";
        $prs2_admin="";
        $scms1_admin="";
        $scms2_admin="";
        $sis_admin="";
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
        if($css_priv=="1"){
            $cons=$mysqli->query("SELECT * FROM cms_admin_cons WHERE admin_type='Class Scheduling Admin'");
            while($conr=$cons->fetch_assoc()){
                if(empty($conr['emp_no'])){
                    if(!empty($conr['job_title_code'])){
                        if($conr['job_title_code']==preg_replace('/[0-9]+/', '',$job_title) && $conr['faculty_type']==$emp_type){
                            $css_admin="true";
                        }else{
                            $css_admin="false";
                        }
                    }else{
                        if($conr['faculty_type']==$emp_type){
                            $css_admin="true";
                        }else{
                            $css_admin="false";
                        }
                    }
                }else{
                    if(!empty($conr['job_title_code'])){
                        if($conr['job_title_code']==preg_replace('/[0-9]+/', '',$job_title) && $conr['emp_no']==$_SESSION['user_data']['acct']['emp_no'] && $conr['faculty_type']==$emp_type){
                            $css_admin="true";
                        }else{
                            $css_admin="false";
                        }
                    }else{
                        if($conr['faculty_type']==$emp_type && $conr['emp_no']==$_SESSION['user_data']['acct']['emp_no']){
                            $css_admin="true";
                        }else{
                            $css_admin="false";
                        }
                    }
                }
                
            }    
        }
        if($dms_priv=="1"){
            $cons=$mysqli->query("SELECT * FROM cms_admin_cons WHERE admin_type='School Related Document Admin'");
            while($conr=$cons->fetch_assoc()){
                if(empty($conr['emp_no'])){
                    if(!empty($conr['job_title_code'])){
                        if($conr['job_title_code']==preg_replace('/[0-9]+/', '',$job_title) && $conr['faculty_type']==$emp_type){
                            $dms1_admin="true";
                        }else{
                            $dms1_admin="false";
                        }
                    }else{
                        if($conr['faculty_type']==$emp_type){
                            $dms1_admin="true";
                        }else{
                            $dms1_admin="false";
                        }
                    }
                }else{
                    if(!empty($conr['job_title_code'])){
                        if($conr['job_title_code']==preg_replace('/[0-9]+/', '',$job_title) && $conr['emp_no']==$_SESSION['user_data']['acct']['emp_no'] && $conr['faculty_type']==$emp_type){
                            $dms1_admin="true";
                        }else{
                            $dms1_admin="false";
                        }
                    }else{
                        if($conr['faculty_type']==$emp_type && $conr['emp_no']==$_SESSION['user_data']['acct']['emp_no']){
                            $dms1_admin="true";
                        }else{
                            $dms1_admin="false";
                        }
                    }
                }
                
            }
            
            $cons=$mysqli->query("SELECT * FROM cms_admin_cons WHERE admin_type='Personnel Information Document Admin'");
            while($conr=$cons->fetch_assoc()){
                if(empty($conr['emp_no'])){
                    if(!empty($conr['job_title_code'])){
                        if($conr['job_title_code']==preg_replace('/[0-9]+/', '',$job_title) && $conr['faculty_type']==$emp_type){
                            $dms2_admin="true";
                        }else{
                            $dms2_admin="false";
                        }
                    }else{
                        if($conr['faculty_type']==$emp_type){
                            $dms2_admin="true";
                        }else{
                            $dms2_admin="false";
                        }
                    }
                }else{
                    if(!empty($conr['job_title_code'])){
                        if($conr['job_title_code']==preg_replace('/[0-9]+/', '',$job_title) && $conr['emp_no']==$_SESSION['user_data']['acct']['emp_no'] && $conr['faculty_type']==$emp_type){
                            $dms2_admin="true";
                        }else{
                            $dms2_admin="false";
                        }
                    }else{
                        if($conr['faculty_type']==$emp_type && $conr['emp_no']==$_SESSION['user_data']['acct']['emp_no']){
                            $dms2_admin="true";
                        }else{
                            $dms2_admin="false";
                        }
                    }
                }
                
            }
        }
        if($ims_priv=="1"){
            $cons=$mysqli->query("SELECT * FROM cms_admin_cons WHERE admin_type='Inventory Management Admin'");
            while($conr=$cons->fetch_assoc()){
                if(empty($conr['emp_no'])){
                    if(!empty($conr['job_title_code'])){
                        if($conr['job_title_code']==preg_replace('/[0-9]+/', '',$job_title) && $conr['faculty_type']==$emp_type){
                            $ims_admin="true";
                        }else{
                            $ims_admin="false";
                        }
                    }else{
                        if($conr['faculty_type']==$emp_type){
                            $ims_admin="true";
                        }else{
                            $ims_admin="false";
                        }
                    }
                }else{
                    if(!empty($conr['job_title_code'])){
                        if($conr['job_title_code']==preg_replace('/[0-9]+/', '',$job_title) && $conr['emp_no']==$_SESSION['user_data']['acct']['emp_no'] && $conr['faculty_type']==$emp_type){
                            $ims_admin="true";
                        }else{
                            $ims_admin="false";
                        }
                    }else{
                        if($conr['faculty_type']==$emp_type && $conr['emp_no']==$_SESSION['user_data']['acct']['emp_no']){
                            $ims_admin="true";
                        }else{
                            $ims_admin="false";
                        }
                    }
                }
                
            }
        }
        if($ipcr_priv=="1"){
            $cons=$mysqli->query("SELECT * FROM cms_admin_cons WHERE admin_type='Evaluation Verification Admin'");
            while($conr=$cons->fetch_assoc()){
                if(empty($conr['emp_no'])){
                    if(!empty($conr['job_title_code'])){
                        if($conr['job_title_code']==preg_replace('/[0-9]+/', '',$job_title) && $conr['faculty_type']==$emp_type){
                            $ipcr1_admin="true";
                        }else{
                            $ipcr1_admin="false";
                        }
                    }else{
                        if($conr['faculty_type']==$emp_type){
                            $ipcr1_admin="true";
                        }else{
                            $ipcr1_admin="false";
                        }
                    }
                }else{
                    if(!empty($conr['job_title_code'])){
                        if($conr['job_title_code']==preg_replace('/[0-9]+/', '',$job_title) && $conr['emp_no']==$_SESSION['user_data']['acct']['emp_no'] && $conr['faculty_type']==$emp_type){
                            $ipcr1_admin="true";
                        }else{
                            $ipcr1_admin="false";
                        }
                    }else{
                        if($conr['faculty_type']==$emp_type && $conr['emp_no']==$_SESSION['user_data']['acct']['emp_no']){
                            $ipcr1_admin="true";
                        }else{
                            $ipcr1_admin="false";
                        }
                    }
                }
                
            }
            
            if($emp_type=="Teaching" && strstr(preg_replace('/[0-9]+/', '',$job_title),"HTEACH")){
                $ipcr2_admin="true";
            }else{
                $ipcr2_admin="false";
            }
        }
        if($pims_priv=="1"){
            $cons=$mysqli->query("SELECT * FROM cms_admin_cons WHERE admin_type='Leave Management Admin'");
            while($conr=$cons->fetch_assoc()){
                if(empty($conr['emp_no'])){
                    if(!empty($conr['job_title_code'])){
                        if($conr['job_title_code']==preg_replace('/[0-9]+/', '',$job_title) && $conr['faculty_type']==$emp_type){
                            $pims1_admin="true";
                        }else{
                            $pims1_admin="false";
                        }
                    }else{
                        if($conr['faculty_type']==$emp_type){
                            $pims1_admin="true";
                        }else{
                            $pims1_admin="false";
                        }
                    }
                }else{
                    if(!empty($conr['job_title_code'])){
                        if($conr['job_title_code']==preg_replace('/[0-9]+/', '',$job_title) && $conr['emp_no']==$_SESSION['user_data']['acct']['emp_no'] && $conr['faculty_type']==$emp_type){
                            $pims1_admin="true";
                        }else{
                            $pims1_admin="false";
                        }
                    }else{
                        if($conr['faculty_type']==$emp_type && $conr['emp_no']==$_SESSION['user_data']['acct']['emp_no']){
                            $pims1_admin="true";
                        }else{
                            $pims1_admin="false";
                        }
                    }
                }
                
            }
            
            $cons=$mysqli->query("SELECT * FROM cms_admin_cons WHERE admin_type='Personnel Management Admin'");
            while($conr=$cons->fetch_assoc()){
                if(empty($conr['emp_no'])){
                    if(!empty($conr['job_title_code'])){
                        if($conr['job_title_code']==preg_replace('/[0-9]+/', '',$job_title) && $conr['faculty_type']==$emp_type){
                            $pims2_admin="true";
                        }else{
                            $pims2_admin="false";
                        }
                    }else{
                        if($conr['faculty_type']==$emp_type){
                            $pims2_admin="true";
                        }else{
                            $pims2_admin="false";
                        }
                    }
                }else{
                    if(!empty($conr['job_title_code'])){
                        if($conr['job_title_code']==preg_replace('/[0-9]+/', '',$job_title) && $conr['emp_no']==$_SESSION['user_data']['acct']['emp_no'] && $conr['faculty_type']==$emp_type){
                            $pims2_admin="true";
                        }else{
                            $pims2_admin="false";
                        }
                    }else{
                        if($conr['faculty_type']==$emp_type && $conr['emp_no']==$_SESSION['user_data']['acct']['emp_no']){
                            $pims2_admin="true";
                        }else{
                            $pims2_admin="false";
                        }
                    }
                }
                
            }
        }
        if($pms_priv=="1"){
            $cons=$mysqli->query("SELECT * FROM cms_admin_cons WHERE admin_type='Procurement Management Admin'");
            while($conr=$cons->fetch_assoc()){
                if(empty($conr['emp_no'])){
                    if(!empty($conr['job_title_code'])){
                        if($conr['job_title_code']==preg_replace('/[0-9]+/', '',$job_title) && $conr['faculty_type']==$emp_type){
                            $pms1_admin="true";
                        }else{
                            $pms1_admin="false";
                        }
                    }else{
                        if($conr['faculty_type']==$emp_type){
                            $pms1_admin="true";
                        }else{
                            $pms1_admin="false";
                        }
                    }
                }else{
                    if(!empty($conr['job_title_code'])){
                        if($conr['job_title_code']==preg_replace('/[0-9]+/', '',$job_title) && $conr['emp_no']==$_SESSION['user_data']['acct']['emp_no'] && $conr['faculty_type']==$emp_type){
                            $pms1_admin="true";
                        }else{
                            $pms1_admin="false";
                        }
                    }else{
                        if($conr['faculty_type']==$emp_type && $conr['emp_no']==$_SESSION['user_data']['acct']['emp_no']){
                            $pms1_admin="true";
                        }else{
                            $pms1_admin="false";
                        }
                    }
                }
                
            }
            
            $cons=$mysqli->query("SELECT * FROM cms_admin_cons WHERE admin_type='Procurement Verification Admin'");
            while($conr=$cons->fetch_assoc()){
                if(empty($conr['emp_no'])){
                    if(!empty($conr['job_title_code'])){
                        if($conr['job_title_code']==preg_replace('/[0-9]+/', '',$job_title) && $conr['faculty_type']==$emp_type){
                            $pms2_admin="true";
                        }else{
                            $pms2_admin="false";
                        }
                    }else{
                        if($conr['faculty_type']==$emp_type){
                            $pms2_admin="true";
                        }else{
                            $pms2_admin="false";
                        }
                    }
                }else{
                    if(!empty($conr['job_title_code'])){
                        if($conr['job_title_code']==preg_replace('/[0-9]+/', '',$job_title) && $conr['emp_no']==$_SESSION['user_data']['acct']['emp_no'] && $conr['faculty_type']==$emp_type){
                            $pms2_admin="true";
                        }else{
                            $pms2_admin="false";
                        }
                    }else{
                        if($conr['faculty_type']==$emp_type && $conr['emp_no']==$_SESSION['user_data']['acct']['emp_no']){
                            $pms2_admin="true";
                        }else{
                            $pms2_admin="false";
                        }
                    }
                }
                
            }
        }
        if($oes_priv=="1"){
            if($emp_type=="Teaching"){
                $oes_admin="true";
            }else{
                $oes_admin="false";
            }
        }
        if($prs_priv=="1"){
            $cons=$mysqli->query("SELECT * FROM cms_admin_cons WHERE admin_type='Payroll Admin'");
            while($conr=$cons->fetch_assoc()){
                if(empty($conr['emp_no'])){
                    if(!empty($conr['job_title_code'])){
                        if($conr['job_title_code']==preg_replace('/[0-9]+/', '',$job_title) && $conr['faculty_type']==$emp_type){
                            $prs1_admin="true";
                        }else{
                            $prs1_admin="false";
                        }
                    }else{
                        if($conr['faculty_type']==$emp_type){
                            $prs1_admin="true";
                        }else{
                            $prs1_admin="false";
                        }
                    }
                }else{
                    if(!empty($conr['job_title_code'])){
                        if($conr['job_title_code']==preg_replace('/[0-9]+/', '',$job_title) && $conr['emp_no']==$_SESSION['user_data']['acct']['emp_no'] && $conr['faculty_type']==$emp_type){
                            $prs1_admin="true";
                        }else{
                            $prs1_admin="false";
                        }
                    }else{
                        if($conr['faculty_type']==$emp_type && $conr['emp_no']==$_SESSION['user_data']['acct']['emp_no']){
                            $prs1_admin="true";
                        }else{
                            $prs1_admin="false";
                        }
                    }
                }
                
            }
            
            $cons=$mysqli->query("SELECT * FROM cms_admin_cons WHERE admin_type='Time Record Admin'");
            while($conr=$cons->fetch_assoc()){
                if(empty($conr['emp_no'])){
                    if(!empty($conr['job_title_code'])){
                        if($conr['job_title_code']==preg_replace('/[0-9]+/', '',$job_title) && $conr['faculty_type']==$emp_type){
                            $prs2_admin="true";
                        }else{
                            $prs2_admin="false";
                        }
                    }else{
                        if($conr['faculty_type']==$emp_type){
                            $prs2_admin="true";
                        }else{
                            $prs2_admin="false";
                        }
                    }
                }else{
                    if(!empty($conr['job_title_code'])){
                        if($conr['job_title_code']==preg_replace('/[0-9]+/', '',$job_title) && $conr['emp_no']==$_SESSION['user_data']['acct']['emp_no'] && $conr['faculty_type']==$emp_type){
                            $prs2_admin="true";
                        }else{
                            $prs2_admin="false";
                        }
                    }else{
                        if($conr['faculty_type']==$emp_type && $conr['emp_no']==$_SESSION['user_data']['acct']['emp_no']){
                            $prs2_admin="true";
                        }else{
                            $prs2_admin="false";
                        }
                    }
                }
                
            }
        }
        if($scms_priv=="1"){
            $cons=$mysqli->query("SELECT * FROM cms_admin_cons WHERE admin_type='Health Record Admin'");
            while($conr=$cons->fetch_assoc()){
                if(empty($conr['emp_no'])){
                    if(!empty($conr['job_title_code'])){
                        if($conr['job_title_code']==preg_replace('/[0-9]+/', '',$job_title) && $conr['faculty_type']==$emp_type){
                            $scms1_admin="true";
                        }else{
                            $scms1_admin="false";
                        }
                    }else{
                        if($conr['faculty_type']==$emp_type){
                            $scms1_admin="true";
                        }else{
                            $scms1_admin="false";
                        }
                    }
                }else{
                    if(!empty($conr['job_title_code'])){
                        if($conr['job_title_code']==preg_replace('/[0-9]+/', '',$job_title) && $conr['emp_no']==$_SESSION['user_data']['acct']['emp_no'] && $conr['faculty_type']==$emp_type){
                            $scms1_admin="true";
                        }else{
                            $scms1_admin="false";
                        }
                    }else{
                        if($conr['faculty_type']==$emp_type && $conr['emp_no']==$_SESSION['user_data']['acct']['emp_no']){
                            $scms1_admin="true";
                        }else{
                            $scms1_admin="false";
                        }
                    }
                }
                
            }
            
            
            if($dept=="7" && $emp_type=="Teaching"){
                $scms2_admin="true";
            }else{
                $scms2_admin="false";
            }
        }
        if($sis_priv=="1"){
            $cons=$mysqli->query("SELECT * FROM cms_admin_cons WHERE admin_type='Student Record Admin'");
            while($conr=$cons->fetch_assoc()){
                if(empty($conr['emp_no'])){
                    if(!empty($conr['job_title_code'])){
                        if($conr['job_title_code']==preg_replace('/[0-9]+/', '',$job_title) && $conr['faculty_type']==$emp_type){
                            $sis_admin="true";
                        }else{
                            $sis_admin="false";
                        }
                    }else{
                        if($conr['faculty_type']==$emp_type){
                            $sis_admin="true";
                        }else{
                            $sis_admin="false";
                        }
                    }
                }else{
                    if(!empty($conr['job_title_code'])){
                        if($conr['job_title_code']==preg_replace('/[0-9]+/', '',$job_title) && $conr['emp_no']==$_SESSION['user_data']['acct']['emp_no'] && $conr['faculty_type']==$emp_type){
                            $sis_admin="true";
                        }else{
                            $sis_admin="false";
                        }
                    }else{
                        if($conr['faculty_type']==$emp_type && $conr['emp_no']==$_SESSION['user_data']['acct']['emp_no']){
                            $sis_admin="true";
                        }else{
                            $sis_admin="false";
                        }
                    }
                }
                
            }
        }
        
        $pers=array("css_admin"=>"$css_admin","dms1_admin"=>"$dms1_admin","dms2_admin"=>"$dms2_admin","ims_admin"=>"$ims_admin","ipcr1_admin"=>"$ipcr1_admin","ipcr2_admin"=>"$ipcr2_admin","pims1_admin"=>"$pims1_admin","pims2_admin"=>"$pims2_admin","pms1_admin"=>"$pms1_admin","pms2_admin"=>"$pms2_admin","oes_admin"=>"$oes_admin","prs1_admin"=>"$prs1_admin","prs2_admin"=>"$prs2_admin","scms1_admin"=>"$scms1_admin","scms2_admin"=>"$scms2_admin","sis_admin"=>"$sis_admin","job"=>"$job_title","user_type"=>"$user_type","emp_type"=>"$emp_type","dept"=>"$dept","css"=>"$css_priv","dms"=>"$dms_priv","ims"=>"$ims_priv","ipcr"=>"$ipcr_priv","pims"=>"$pims_priv","pms"=>"$pms_priv","oes"=>"$oes_priv","prs"=>"$prs_priv","scms"=>"$scms_priv","sis"=>"$sis_priv");
        return $pers;
    }

    function defineStudent($id) {
        //Gamitin kung connected na sa database
        include("php/connection.php");
        $sql=$mysqli->query("SELECT css_priv,frms_priv,ims_priv,ipcrms_priv,pims_priv,pms_priv,oes_priv,prs_priv,scms_priv,sis_priv,cms_account_type,
        cms_privilege.cms_account_id,cms_account.lrn
        FROM cms_privilege,cms_account,sis_student
        WHERE cms_account.cms_account_id=cms_privilege.cms_account_id
        AND cms_account.lrn=sis_student.lrn
        AND cms_account.cms_account_id=$id");
        $row=$sql->fetch_assoc();
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
        $pers=array("css"=>"$css_priv","dms"=>"$dms_priv","ims"=>"$ims_priv","ipcr"=>"$ipcr_priv","pims"=>"$pims_priv","pms"=>"$pms_priv","oes"=>"$oes_priv","prs"=>"$prs_priv","scms"=>"$scms_priv","sis"=>"$sis_priv");
        return $pers;
    }
?>