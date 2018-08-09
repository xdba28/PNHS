<?php
    session_start();
    $check="1";
    if(in_array($check,$_SESSION['user_data']['priv']['frms_priv']) && isset($_SESSION['user_data']['acct']['emp_no']) && isset($_SESSION['user_data']['acct']['cms_account_ID'])){
        $emp=$_SESSION['user_data']['acct']['emp_no'];
        $aid=$_SESSION['user_data']['acct']['cms_account_ID'];
        $rec=mysqli_query($mysqli,"SELECT dms_receiver.rec_no FROM dms_receiver,cms_account WHERE cms_account.cms_account_id=dms_receiver.cms_account_id AND dms_receiver.cms_account_id=$aid");
        $recrow=mysqli_fetch_assoc($rec);
        $recid=$recrow['rec_no'];
        foreach(definePerson($aid) as $key=>$val){
            if($key=="css"){
                $css_priv=$val;
            }else if($key=="dms"){
                $dms_priv=$val;
            }else if($key=="ims"){
                $ims_priv=$val;
            }else if($key=="ipcr"){
                $ipcr_priv=$val;
            }else if($key=="pims"){
                $pims_priv=$val;
            }else if($key=="pms"){
                $pms_priv=$val;
            }else if($key=="oes"){
                $oes_priv=$val;
            }else if($key=="prs"){
                $prs_priv=$val;
            }else if($key=="scms"){
                $scms_priv=$val;
            }else if($key=="sis"){
                $sis_priv=$val;
            }else if($key=="user_type"){
                $user_type=$val;
            }else if($key=="job"){
                $job_title=$val;
            }else if($key=="emp_type"){
                $emp_type=$val;
            }else if($key=="dept"){
                $dept=$val;
            }

        }
    }else{
        echo "<script>alert('Error! You do not have permission to access this site!'); window.location='../../../admin_idx.php';</script>";
    }
        
    ?>