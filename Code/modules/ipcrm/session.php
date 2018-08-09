<?php
    session_start();
    if($_SESSION['user_data']['priv']['ipcrms_priv']== "1" || $_SESSION['user_data']['priv']['ipcrms2_priv']== "1" || $_SESSION['user_data']['priv']['ipcrms_user']== "1" && isset($_SESSION['user_data']['acct']['emp_no']) && isset($_SESSION['user_data']['acct']['cms_account_ID'])){
        $emp=$_SESSION['user_data']['acct']['emp_no'];
        $aid=$_SESSION['user_data']['acct']['cms_account_ID'];
        $rec=mysqli_query($mysqli,"SELECT dms_receiver.rec_no FROM dms_receiver,cms_account WHERE cms_account.cms_account_id=dms_receiver.cms_account_id AND dms_receiver.cms_account_id=$aid");
        $recrow=mysqli_fetch_assoc($rec);
        $recid=$recrow['rec_no'];
    }else{
        echo "<script>alert('Error! You do not have permission to access this site!'); window.location='../../../index.php';</script>";
    }
        
    ?>