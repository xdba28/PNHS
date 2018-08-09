<?php
    if($_SESSION['user_data']['priv']['oes_priv']=="1" && isset($_SESSION['user_data']['acct']['lrn']) && isset($_SESSION['user_data']['acct']['cms_account_ID'])){
        $lrn=$_SESSION['user_data']['acct']['lrn'];
        $aid=$_SESSION['user_data']['acct']['cms_account_ID'];
    }else{
        echo "<script>alert('Error! You do not have permission to access this site!'); window.location='../../index.php';</script>";
    }
        
    ?>