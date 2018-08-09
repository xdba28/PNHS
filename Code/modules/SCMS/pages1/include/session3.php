<?php 
    $check="1";
    if(in_array($check,$_SESSION['user_data']['priv']['sis_priv']) && isset($_SESSION['user_data']['acct']['emp_no']) && isset($_SESSION['user_data']['acct']['cms_account_ID'])){
        $emp=$_SESSION['user_data']['acct']['emp_no'];
        $aid=$_SESSION['user_data']['acct']['cms_account_ID'];
        $rec=mysqli_query($mysqli,"SELECT dms_receiver.rec_no FROM dms_receiver,cms_account WHERE cms_account.cms_account_id=dms_receiver.cms_account_id AND dms_receiver.cms_account_id=$aid");
        $recrow=mysqli_fetch_assoc($rec);
        $recid=$recrow['rec_no'];
        foreach(definePerson($aid) as $key=>$val){
            if($key=="css") { $css_priv=$val; }
            else if($key=="dms") { $dms_priv=$val; }
            else if($key=="ims") { $ims_priv=$val; }
            else if($key=="ipcr") { $ipcr_priv=$val; }
            else if($key=="pims") { $pims_priv=$val; }
            else if($key=="pms") { $pms_priv=$val; }
            else if($key=="oes") { $oes_priv=$val; }
            else if($key=="prs") { $prs_priv=$val; }
            else if($key=="scms") { $scms_priv=$val; }
            else if($key=="sis") { $sis_priv=$val; }
            else if($key=="job") { $job_title=$val; }
            else if($key=="emp_type") { $emp_type=$val; }
            else if($key=="user_type") { $user_type=$val; }
            else if($key=="css_admin") { $css_admin=$val; }
            else if($key=="dms1_admin") { $dms1_admin=$val; }
            else if($key=="dms2_admin") { $dms2_admin=$val; }
            else if($key=="ims_admin") { $ims_admin=$val; }
            else if($key=="ipcr1_admin") { $ipcr1_admin=$val; }
            else if($key=="ipcr2_admin") { $ipcr2_admin=$val; }
            else if($key=="pims1_admin") { $pims1_admin=$val; }
            else if($key=="pims2_admin") { $pims2_admin=$val; }
            else if($key=="pms1_admin") { $pms1_admin=$val; }
            else if($key=="pms2_admin") { $pms2_admin=$val; }
            else if($key=="oes_admin") { $oes_admin=$val; }
            else if($key=="prs1_admin") { $prs1_admin=$val; }
            else if($key=="prs2_admin") { $prs2_admin=$val; }
            else if($key=="scms1_admin") { $scms1_admin=$val; }
            else if($key=="scms2_admin") { $scms2_admin=$val; }
            else if($key=="sis_admin") { $sis_admin=$val; }

        }
    }else if(in_array($check,$_SESSION['user_data']['priv']['sis_priv']) && isset($_SESSION['user_data']['acct']['lrn']) && isset($_SESSION['user_data']['acct']['cms_account_ID'])){
        $lrn=$_SESSION['user_data']['acct']['lrn'];
        $aid=$_SESSION['user_data']['acct']['cms_account_ID'];
        foreach(defineStudent($aid) as $key=>$val) {
            if($key=="css") { $css_priv=$val; }
            else if($key=="oes") { $oes_priv=$val; }
            else if($key=="scms") { $scms_priv=$val; }
            else if($key=="sis") { $sis_priv=$val; }
        }
        
    }else{
        echo "<script>alert('Error! You do not have permission to access this site!'); window.location='../../../index.php';</script>";
    }
	?>