<?php
    if(($_SESSION['user_data']['priv']['scms_priv']=="1" || $_SESSION['user_data']['priv']['scms_user']=="1") && isset($_SESSION['user_data']['acct']['emp_no']) && isset($_SESSION['user_data']['acct']['cms_account_ID'])){
        $emp=$_SESSION['user_data']['acct']['emp_no'];
        $aid=$_SESSION['user_data']['acct']['cms_account_ID'];
    }else if(($_SESSION['user_data']['priv']['scms_priv']=="1" || $_SESSION['user_data']['priv']['scms_user']=="1") && isset($_SESSION['user_data']['acct']['lrn']) && isset($_SESSION['user_data']['acct']['cms_account_ID'])){
        $lrn=$_SESSION['user_data']['acct']['lrn'];
        $aid=$_SESSION['user_data']['acct']['cms_account_ID'];
    }
    else{
        echo "<script>alert('Error! You do not have permission to access this site!'); window.location='../../../index.php';</script>";
    }
        
    ?>