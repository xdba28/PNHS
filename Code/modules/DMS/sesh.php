<?php
    session_start();
    if( ($_SESSION['user_data']['priv']['frms_priv']=="1" || $_SESSION['user_data']['priv']['frms_user']=="1" || $_SESSION['user_data']['priv']['superadmin']=="1") && isset($_SESSION['user_data']['acct']['emp_no']) && isset($_SESSION['user_data']['acct']['cms_account_ID'])){
        $emp=$_SESSION['user_data']['acct']['emp_no'];
        $aid=$_SESSION['user_data']['acct']['cms_account_ID'];
    }else{
        echo "<script>alert('Error! You do not have permission to access this site!'); window.location='../../../index.php';</script>";
    }
        
    ?>